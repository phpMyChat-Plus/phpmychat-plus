<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

if (isset($_COOKIE["CookieStatus"])) $statusu = $_COOKIE["CookieStatus"];
if (isset($_COOKIE["CookieHash"])) $RemMe = $_COOKIE["CookieHash"];

// Sort order by Ciprian
require("./config/config.lib.php");
if (!isset($sort_order)) $sort_order = isset($_COOKIE["CookieUserSort"]) ? $_COOKIE["CookieUserSort"] : C_USERS_SORT_ORD;
if ($sort_order) $ordquery = "usr.username";
else $ordquery = "usr.r_time";

require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=".$Charset);

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime') && version_compare(PHP_VERSION, '5.3.0') < 0) set_magic_quotes_runtime(0);
else ini_set("magic_quotes_runtime", 0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
	// Add styles for positioned layers;
	if (window.parent.ver4)
	{
		with (document) {
			write("<STYLE TYPE=\"text/css\">");
			if (parent.NS4) {
				write(".parent {position:absolute; visibility:visible}");
				write(".child {position:absolute; visibility:visible}");
				write(".regular {position:absolute; visibility:visible}")
			} else {
				write(".child {display:none}")
			};
			write("<\/STYLE>");
		}
	}

	// Get the Y scrolling position of the users frame;
	function GetY()
	{
		window.parent.Y = (window.parent.NS4 ? window.pageYOffset : document.body.scrollTop);
	};

	// Initialize the collapsible outline;
	onload = window.parent.initIt;

	// Colapsible Extra Options menu (drop-up)
	window.onload=show;
	function show(id) {
	var d = document.getElementById(id);
		for (var i = 1; i<=10; i++) {
			if (document.getElementById('smenu'+i)) document.getElementById('smenu'+i).style.display='none';
		}
	if (d) d.style.display='block';
	}
	function hide(id) {
	var d = document.getElementById(id);
	if (d) d.style.display='none';
	}
	//-->
</SCRIPT>

<STYLE TYPE="text/css" MEDIA="screen">
<!--
body {
position: relative;
margin: 0;
padding: 0;
font: 80%;
}
dl, dt, dd, ul, li {
text-align: center;
margin: 0;
padding: 0;
list-style-type: none;
z-index: 100;
}
#menu {
position: absolute; /* Menu position that can be changed at will */
bottom: 0;
z-index: 100;
width: 95%; /* precision for Opera */
margin-left: 5px;
margin-right: 5px;
}
#menu dl {
//float: right;
//width: 13em;
display: inline;
z-index: 100;
}
#menu dt {
cursor: pointer;
text-align: center;
font-weight: bold;
background: <?php echo($COLOR_BK); ?>;
border: 1px solid gray;
margin: 0;
}
#menu dl.nav{
//float: right;
width: 6em;
z-index: 100;
}
#menu dd {
display: none;
border: 1px solid gray;
}
#menu li {
text-align: center;
background: <?php echo($COLOR_TB); ?>;
position:static; /*safer*/
}
#menu li a, #menu dt a {
//color: #000;
color: <?php echo(COLOR_CD); ?>;
text-decoration: none;
display: block;
height: 100%;
border: 0 none;
position:static; /*safer*/
}
#menu li a:hover, #menu li a:focus, #menu dt a:hover, #menu dt a:focus {
//background: #eee;
background: <?php echo($COLOR_LINK); ?>;
position:static; /*safer*/
}
#site {
position: absolute;
z-index: 100;
top : 70px;
left : 10px;
color: <?php echo(COLOR_CD); ?>;
//background-color: #ddd;
background-color: <?php echo($COLOR_BK); ?>;
padding: 5px;
border: 1px solid gray;
}
#container {
position: relative;
top: 20px;
left: auto;
width: 800px;
height: 480px;
margin-left:10px;
z-index: 0;
overflow:auto;
}
-->
</STYLE>
</HEAD>

<BODY CLASS="frame" onUnload="GetY();">
<?php
// Special formats depending on users status
function special_char($str,$lang,$type)
{
	$tag_open = (((($type == 'a' && $str != C_BOT_NAME) || $type == 't' || $type == 'm') && C_ITALICIZE_POWERS) ? "<I>":"");
	$tag_close = ($tag_open != "" ? "</I>":"");
	return $tag_open.($lang ? htmlentities($str) : htmlspecialchars($str)).$tag_close;
}

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	}
};

if (!function_exists("utf8_substr"))
{
	function utf8_substr($str,$start)
	{
	   preg_match_all("/./su", $str, $ar);
	   if(func_num_args() >= 3) {
	       $end = func_get_arg(2);
	       return join("",array_slice($ar[0],$start,$end));
	   } else {
	       return join("",array_slice($ar[0],$start));
	   }
	};
};

// Special colors for usernames depending on users choise and status
function userColor($type,$colorname)
{
	global $COLOR_BK;
	if (C_ITALICIZE_POWERS)
	{
		if (COLOR_FILTERS)
		{
			if (COLOR_NAMES)
			{
				return $color = ($colorname != '' && strcasecmp($colorname, $COLOR_BK) != 0 ? $colorname:(($type == 'a' || $type == 't') ? COLOR_CA:($type == 'm' ? COLOR_CM:COLOR_CD)));
			}
			else
			{
				return $color = (($type == 'a' || $type == 't') ? COLOR_CA:($type == 'm' ? COLOR_CM:""));
			};
		}
		elseif (COLOR_NAMES)
		{
			return $color = ($colorname != '' && strcasecmp($colorname, $COLOR_BK) != 0 ? $colorname:COLOR_CD);
		}
		else
		{
			return $color = "";
		}
	}
	elseif (COLOR_NAMES)
	{
		return $color = ($colorname != '' && strcasecmp($colorname, $COLOR_BK) != 0 ? $colorname:COLOR_CD);
	}
	else
	{
		return $color = "";
	}
};

// Special classes for usernames depending on users status (other users)
function userClass($type,$name)
{
		if (C_ITALICIZE_POWERS)
		{
			$class = ((($type == 'a' && $name != C_BOT_NAME) || $type == 't') ? "Class=\"admin\"":($type == 'm' ? "Class=\"mod\"":"Class=\"user\""));
		}
		else
		{
			$class = "Class=\"user\"";
		}
	return $class;
}

// Used inside javascript links
function special_char2($str,$lang)
{
	return ($lang ? htmlentities(addslashes($str)) : htmlspecialchars(addslashes($str)));
}

// Ghost Control mod by Ciprian
$Hide = "";
if (C_HIDE_ADMINS) $Hide .= " AND (usr.status != 'a' OR usr.username = '".C_BOT_NAME."') AND usr.status != 't'";
if (C_HIDE_MODERS) $Hide .=  " AND usr.status !='m'";
if (C_SPECIAL_GHOSTS != "")
{
	$sghosts = str_replace("username","usr.username",C_SPECIAL_GHOSTS);
	$Hide .= " AND usr.username != ".$sghosts."";
}

$DbLink = new DB;

if (C_ENABLE_PM && C_PRIV_POPUP && !isset($allowpopupu))
{
	$DbLink = new DB;
	$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username = '$U'");
	if($DbLink->num_rows() != 0) list($allowpopupu) = $DbLink->next_record();
	else $allowpopupu = 0;
	$DbLink->clean_results();
}

// Gravatars initialization
unset($email);
unset($use_gravatar);
unset($avatar);

// Restricted rooms mod by Ciprian
$res_init = utf8_substr(L_RESTRICTED, 0, 1);

//** Build users list for the current room **
if (C_DB_TYPE == 'mysql')
{
// Modified next line by R Dickow for /away command:
  $currentRoomQuery = 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar, reg.email, reg.use_gravatar '
						. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
						. 'WHERE usr.room = \'' . $R . '\'' . $Hide . ' '
						. 'ORDER BY ' . $ordquery . '';
}
else if (C_DB_TYPE == 'pgsql')
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar, reg.email, reg.use_gravatar '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\'' . $Hide . ' AND usr.username = reg.username '
						. 'UNION '
						. 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time,  NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr '
						. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . $R . '\'' . $Hide . ' '
						. 'ORDER BY ' . $ordquery . '';
}
else
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar, reg.email, reg.use_gravatar NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\'' . $Hide . ' '
						. 'ORDER BY ' . $ordquery . '';
}

$DbLink->query($currentRoomQuery);

// Restricted rooms mod by Ciprian
$tmpDispR = $R;
if (is_array($DefaultDispChatRooms) && in_array($R." [R]",$DefaultDispChatRooms)) $tmpDispR .= " [".$res_init."]";

echo("<B>".htmlspecialchars(stripslashes($tmpDispR))."</B><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$DbLink->num_rows().")</SPAN>\n");
while(list($User, $Latin1, $status, $awaystat, $room_time, $gender, $allowpopup, $colorname, $avatar, $email, $use_gravatar) = $DbLink->next_record())
{
	echo("<DIV STYLE=\"margin-top: 1px\">\n");
	$title1 = ($User == stripslashes($U) ? L_REG_4 : L_PROFILE);
	if (C_USE_AVATARS && !C_DISP_GENDER)
	{
	    if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
		// Gravatar mod added by Ciprian
		if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && (!isset($use_gravatar) || $use_gravatar)))
		{
#			if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
			if (stripos($avatar,C_AVA_RELPATH) !== false) $local_avatar = 1;
			else $local_avatar = 0;
			require("plugins/gravatars/get_gravatar.php");
		}
		$ava_none = $avatar;
	    $ava_width = C_AVA_WIDTH;
	    $ava_height = C_AVA_HEIGHT;
		$avatar = "<img src=\"$avatar\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"$title1\" title=\"$title1\">";
		$ava_none = "<img src=\"$ava_none\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">&nbsp;";
	}
	elseif (!C_USE_AVATARS && C_DISP_GENDER)
	{
		// Put an icon when there is a profile for the user
		if($gender == 0) $gender = 'undefined';
		elseif($gender == 1) $gender = 'boy';
		elseif($gender == 2) $gender = 'girl';
		elseif($gender == 3) $gender = 'couple';
		else $gender = 'none';
		// Avatar System Start: Inserted:
    $avatar = "images/gender_".$gender.".gif";
		$ava_none = "images/gender_none.gif";
		if ($gender != "couple") $ava_width = 14;
		else $ava_width = 28;
		$ava_height = 14;
		$avatar = "<img src=\"$avatar\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"$title1\" title=\"$title1\">";
		$ava_none = "<img src=\"$ava_none\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">&nbsp;";
	}
	elseif (C_USE_AVATARS && C_DISP_GENDER)
	{
		// Put an icon when there is a profile for the user
		if($gender == 0)
		{
			$gender = 'undefined';
			$title2 = L_REG_43;
		}
		elseif($gender == 1)
		{
			$gender = 'boy';
			$title2 = L_REG_46;
		}
		elseif($gender == 2)
		{
			$gender = 'girl';
			$title2 = L_REG_47;
		}
		elseif($gender == 3)
		{
			$gender = 'couple';
			$title2 = L_REG_44;
		}
		else
		{
			$gender = 'none';
			$title2 = L_REG_48;
		}
		// Avatar System Start: Inserted:
	    if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
		// Gravatar mod added by Ciprian
		if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && (!isset($use_gravatar) || $use_gravatar)))
		{
#			if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
			if (stripos($avatar,C_AVA_RELPATH) !== false) $local_avatar = 1;
			else $local_avatar = 0;
			require("plugins/gravatars/get_gravatar.php");
		}
    $avatar1 = $avatar;
    $ava_none1 = $avatar1;
    $ava_width1 = C_AVA_WIDTH;
    $ava_height1 = C_AVA_HEIGHT;
    $avatar2 = "images/gender_".$gender.".gif";
		$ava_none2 = "images/gender_none.gif";
		if ($gender != "couple") $ava_width2 = 14;
		else $ava_width2 = 28;
		$ava_height2 = 14;
		$avatar = "<img src=\"$avatar1\" width=\"$ava_width1\" height=\"$ava_height1\" border=\"0\" alt=\"$title1\" title=\"$title1\">&nbsp;<img src=\"$avatar2\" width=\"$ava_width2\" height=\"$ava_height2\" border=\"0\" alt=\"$title2\" title=\"$title2\">";
		$ava_none = "<img src=\"$ava_none1\" width=\"$ava_width1\" height=\"$ava_height1\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">&nbsp;<img src=\"$ava_none2\" width=\"$ava_width2\" height=\"$ava_height2\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">&nbsp;";
	}
	else
	{
    $ava_width = "";
    $ava_height = "";
		$avatar = "";
		$ava_none = "";
	}
// Avatar System End.
  // add for /away command modification by R Dickow.
  if ($awaystat == 1) {
  		$Usera = $User;
    	$User = "(".$User.")";
  }
  // end add for /away command
	if ($status != "u" && $status != "k" && $status != "d" && $status != "b" && $awaystat == 0)
	{
		$Cmd2Send = ($User == stripslashes($U) ? "'profile',''" : "'whois','".special_char2(stripslashes($User),$Latin1)."'");
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" onMouseOver="window.status=\''.$title1.'\'; return true;" title="'.$title1.'">'.$avatar.'</a>&nbsp;');
	}
	elseif ($status != "u" && $status != "k" && $status != "d" && $status != "b" && $awaystat == 1)
	{
		$Cmd2Send = ($User == stripslashes("(".$U.")") ? "'profile',''" : "'whois','".special_char2(stripslashes($Usera),$Latin1)."'");
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" onMouseOver="window.status=\''.$title1.'\'; return true;" title="'.$title1.'">'.$avatar.'</a>&nbsp;');
	}
	else
	{
// Avatar System Start.
    if (C_USE_AVATARS && ($User == stripslashes($U)))
    {
			$script = " onClick=\"alert('".L_AVA_REG.".'); return false;\">&nbsp;<img src=";
			echo(str_replace('>&nbsp;<img src=',$script,$ava_none));
    }
    else
    {
			echo($ava_none);
    }
// Avatar System End.
	}
	if($User != stripslashes($U))
	{
// R Dickow /away mod alteration:
  if ($awaystat == 0) {
//--------------------------Begin HighLight command by R.Worley
		$Cmd2Send = ($User == stripslashes($U) ? "'high',''" : "'high','".special_char2($User,$Latin1)."'");
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status,$User)." title='".L_USE_NAME." ($User)' onMouseOver=\"window.status='".L_USE_NAME." ($User)'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></a>&nbsp;");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status,$User)." title='".L_USE_NAME." ($User)' onMouseOver=\"window.status='".L_USE_NAME." ($User)'; return true\">".special_char($User,$Latin1,$status)."</a>&nbsp;");
				}
			//------------------------------Begin HighLight command by R.Worley
			global $contents ;
			$highpath = "botfb/" .$U ;
			if (file_exists ($highpath))
			{
				$fd = fopen ($highpath, "rb");
				$contents = fread ($fd, filesize ($highpath));
				fclose ($fd);
			}
			if($contents == $User)
			{
				$highlight = "images/highlightOn.gif";
			}
			else
			{
				$highlight = "images/highlightOff.gif";
			}
			echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="'.L_HIGHLIGHT.'" onMouseOver="window.status=\''.L_HIGHLIGHT_SB.'.\'; return true"><img src="'.$highlight.'" border="0"></a><br />');
			//-------------------------------End HighLight Mod
  }
  else
  {
		$Cmd2Send = ($User == stripslashes($U) ? "'high',''" : "'high','".special_char2($Usera,$Latin1)."'");
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($Usera,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status,$Usera)." title='".L_USE_NAME." $User' onMouseOver=\"window.status='".L_USE_NAME." $User'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></a>&nbsp;");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($Usera,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status,$Usera)." title='".L_USE_NAME." $User' onMouseOver=\"window.status='".L_USE_NAME." $User'; return true\">".special_char($User,$Latin1,$status)."</a>&nbsp;");
				}
		//------------------------------Begin HighLight command by R.Worley
		global $contents ;
		$highpath = "botfb/" .$U ;
		if (file_exists ($highpath))
		{
			$fd = fopen ($highpath, "rb");
			$contents = fread ($fd, filesize ($highpath));
			fclose ($fd);
		}
		if($contents == $Usera)
		{
			$highlight = "images/highlightOn.gif";
		}
		else
		{
			$highlight = "images/highlightOff.gif";
		}
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="'.L_HIGHLIGHT.'" onMouseOver="window.status=\''.L_HIGHLIGHT_SB.'.\'; return true"><img src="'.$highlight.'" border="0"></a><br />');
		//---------------------------End HighLight Mod
  }
// end /away mod alteration.
	}
	else
	{
		$Cmd2Send = ($User != stripslashes($U) ? "'high',''" : "'high','".special_char2($User,$Latin1)."'");
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status,$User)." title='".L_USE_NAME." $User' onMouseOver=\"window.status='".L_USE_NAME." $User'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></a>&nbsp;");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status,$User)." title='".L_USE_NAME." $User' onMouseOver=\"window.status='".L_USE_NAME." $User'; return true\">".special_char($User,$Latin1,$status)."</a>&nbsp;");
				}
		//------------------------------Begin HighLight command by R.Worley
		global $contents ;
		$highpath = "botfb/" .$U ;
		if (file_exists ($highpath))
		{
			$fd = fopen ($highpath, "rb");
			$contents = fread ($fd, filesize ($highpath));
			fclose ($fd);
		}
		if($contents == $User)
		{
			$highlight = "images/highlightOn.gif";
		}
		else
		{
			$highlight = "images/highlightOff.gif";
		}
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="'.L_HIGHLIGHT.'" onMouseOver="window.status=\''.L_HIGHLIGHT_SB.'.\'; return true"><img src="'.$highlight.'" border="0"></a><br />');
		//-------------------------------End HighLight Mod
	}
echo("\n</DIV>\n");
}
$DbLink->clean_results();

// Gravatars initialization
unset($email);
unset($use_gravatar);
unset($avatar);
//** Build users list for other rooms **
$AddPwd2Link = (isset($PWD_Hash) && $PWD_Hash != "") ? "&PWD_Hash=$PWD_Hash" : "";
$DbLink->query("SELECT DISTINCT room FROM ".C_MSG_TBL." WHERE room != '$R' AND type = 1 ORDER BY room");
if($DbLink->num_rows() > 0)
{
	$i = 0;
	$ChildNb = Array();
	$OthersUsers = new DB;
	while(list($Other) = $DbLink->next_record())
	{
		if (C_DB_TYPE == 'mysql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar, reg.email, reg.use_gravatar '
								. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' '
								. 'ORDER BY ' . $ordquery . '';
		}
		else if (C_DB_TYPE == 'pgsql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar, reg.email, reg.use_gravatar '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' AND usr.username = reg.username '
								. 'UNION '
								. 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr '
								. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' '
								. 'ORDER BY ' . $ordquery . '';
		}
		else
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar, reg.email, reg.use_gravatar NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' '
								. 'ORDER BY ' . $ordquery . '';
		}
		$OthersUsers->query($otherRoomsQuery);
		if($OthersUsers->num_rows() > 0)
		{
			$i++;
			$id = md5($Other);
			// Restricted rooms mod by Ciprian
			$tmpDispOther = $Other;
			$tmpDispOtherRes = "";
			if (is_array($DefaultDispChatRooms) && in_array($Other." [R]",$DefaultDispChatRooms))
			{
				$tmpDispOther .= " [".$res_init."]";
				$tmpDispOtherRes = " (".L_RESTRICTED.")";
			}
			if ($i == 1) $FirstOtherRoom = "Parent".$id;
			echo("<DIV ID=\"Parent${id}\" CLASS=\"parent\" style=\"margin-top: 1px;\">");
#			if (eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))
			if (stripos($_SERVER['HTTP_USER_AGENT'], "MSIE") !== false)
			{
				echo("<a href=\"#\" onClick=\"window.parent.expandIt('${id}'); return false\" onMouseOver=\"window.status='".L_EXPCOL."'; return true;\" title=\"".L_EXPCOL."\">");
				echo("<IMG NAME=\"imEx\" SRC=\"images/closed.gif\" WIDTH=9 HEIGHT=9 BORDER=0 ALT=\"".L_EXPCOL."\"></a>");
			}
			echo("&nbsp;<a href=\"$From?Ver=H&L=$L&U=".stripslashes($U)."$AddPwd2Link&R1=".urlencode(stripslashes($Other))."&T=1&D=$D&N=$N&E=".urlencode(stripslashes($R))."&EN=$T".(isset($RemMe) ? "&RM=1" : "")."\" TARGET=\"_parent\" onMouseOver=\"window.status='".L_JOIN_ROOM.$tmpDispOtherRes."'; return true;\" title='".L_JOIN_ROOM.$tmpDispOtherRes."'>".htmlspecialchars($tmpDispOther)."</a><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$OthersUsers->num_rows().")</SPAN><br />\n");
			echo("</DIV>\n");
			echo("<DIV ID=\"Child${id}\" CLASS=\"child\" style=\"margin-top: 1px;\">\n");
			$j = 0;
			while(list($OtherUser, $Latin1, $status, $awaystat, $room_time, $gender, $allowpopup, $colorname, $avatar, $email, $use_gravatar) = $OthersUsers->next_record())
			{
			echo("<DIV style=\"margin-top: 1px; margin-left: 12px\">\n");
				$j++;
	if (C_USE_AVATARS && !C_DISP_GENDER)
	{
		// Avatar System Start: Inserted:
	    if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
		// Gravatar mod added by Ciprian
		if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && (!isset($use_gravatar) || $use_gravatar)))
		{
#			if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
			if (stripos($avatar,C_AVA_RELPATH) !== false) $local_avatar = 1;
			else $local_avatar = 0;
			require("plugins/gravatars/get_gravatar.php");
		}
    $ava_none = $avatar;
    $ava_width = C_AVA_WIDTH;
    $ava_height = C_AVA_HEIGHT;
		$avatar = "<img src=\"$avatar\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"".L_PROFILE."\" title=\"".L_PROFILE."\">";
		$ava_none = "<img src=\"$ava_none\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">";
	}
	elseif (!C_USE_AVATARS && C_DISP_GENDER)
	{
		// Put an icon when there is a profile for the user
		if($gender == 0) $gender = 'undefined';
		elseif($gender == 1) $gender = 'boy';
		elseif($gender == 2) $gender = 'girl';
		elseif($gender == 3) $gender = 'couple';
		else $gender = 'none';
		// Avatar System Start: Inserted:
    $avatar = "images/gender_".$gender.".gif";
		$ava_none = "images/gender_none.gif";
		if ($gender != "couple") $ava_width = 14;
		else $ava_width = 28;
		$ava_height = 14;
		$avatar = "<img src=\"$avatar\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"".L_PROFILE."\" title=\"".L_PROFILE."\">";
		$ava_none = "<img src=\"$ava_none\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">";
	}
	elseif (C_USE_AVATARS && C_DISP_GENDER)
	{
		// Put an icon when there is a profile for the user
		if($gender == 0)
		{
			$gender = 'undefined';
			$title2 = L_REG_43;
		}
		elseif($gender == 1)
		{
			$gender = 'boy';
			$title2 = L_REG_46;
		}
		elseif($gender == 2)
		{
			$gender = 'girl';
			$title2 = L_REG_47;
		}
		elseif($gender == 3)
		{
			$gender = 'couple';
			$title2 = L_REG_44;
		}
		else
		{
			$gender = 'none';
			$title2 = L_REG_48;
		}
		// Avatar System Start: Inserted:
	    if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
		// Gravatar mod added by Ciprian
		if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && (!isset($use_gravatar) || $use_gravatar)))
		{
#			if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
			if (stripos($avatar,C_AVA_RELPATH) !== false) $local_avatar = 1;
			else $local_avatar = 0;
		 	require("plugins/gravatars/get_gravatar.php");
		}
    $avatar1 = $avatar;
    $ava_none1 = $avatar1;
    $ava_width1 = C_AVA_WIDTH;
    $ava_height1 = C_AVA_HEIGHT;
    $avatar2 = "images/gender_".$gender.".gif";
		$ava_none2 = "images/gender_none.gif";
		if ($gender != "couple") $ava_width2 = 14;
		else $ava_width2 = 28;
		$ava_height2 = 14;
		$avatar = "<img src=\"$avatar1\" width=\"$ava_width1\" height=\"$ava_height1\" border=\"0\" alt=\"".L_PROFILE."\" title=\"".L_PROFILE."\">&nbsp;<img src=\"$avatar2\" width=\"$ava_width2\" height=\"$ava_height2\" border=\"0\" alt=\"".$title2."\" title=\"".$title2."\">";
		$ava_none = "<img src=\"$ava_none1\" width=\"$ava_width1\" height=\"$ava_height1\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">&nbsp;<img src=\"$ava_none2\" width=\"$ava_width2\" height=\"$ava_height2\" border=\"0\" alt=\"".L_NO_PROFILE."\" title=\"".L_NO_PROFILE."\">";
	}
	else
	{
    $ava_width = "";
    $ava_height = "";
		$avatar = "";
		$ava_none = "";
	}
// Avatar System End.
  // add for /away command modification by R Dickow.
  if ($awaystat == 1) {
  		$OtherUsera = $OtherUser;
    	$OtherUser = "(".$OtherUser.")";
  }
  // end add for /away command
	if ($awaystat == 0) {
				if ($status != "u" && $status != "k" && $status != "d" && $status != "b")
				{
					echo('<a onClick="window.parent.runCmd(\'whois\',\''.special_char2($OtherUser,$Latin1).'\'); return false;" onMouseOver="window.status=\''.L_PROFILE.'\'; return true;" title="'.L_PROFILE.'">'.$avatar.'</a>&nbsp;');
				}
				else
				{
					echo($ava_none.'&nbsp;');
				}
  		if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopupu || $statusu == "u"))
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUser,$Latin1)."');\" ".userClass($status,$OtherUser)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUser,$Latin1)."');\" ".userClass($status,$OtherUser)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			elseif (C_ENABLE_PM)
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',true);\" ".userClass($status,$OtherUser)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',true);\" ".userClass($status,$OtherUser)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			else
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',false);\" ".userClass($status,$OtherUser)." title='".L_USE_NAME." ($OtherUser)' onMouseOver=\"window.status='".L_USE_NAME." ($OtherUser)'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',false);\" ".userClass($status,$OtherUser)." title='".L_USE_NAME." ($OtherUser)' onMouseOver=\"window.status='".L_USE_NAME." ($OtherUser)'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
		}
	else
	{
				if ($status != "u" && $status != "k" && $status != "d" && $status != "b")
				{
					echo('<a onClick="window.parent.runCmd(\'whois\',\''.special_char2($OtherUsera,$Latin1).'\'); return false;" onMouseOver="window.status=\''.L_PROFILE.'\'; return true;" title="'.L_PROFILE.'">'.$avatar.'</a>&nbsp;');
				}
				else
				{
					echo($ava_none.'&nbsp;');
				}
  			if (C_ENABLE_PM && (C_PRIV_POPUP && ($allowpopupu || $statusu == "u")))
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUsera,$Latin1)."');\" ".userClass($status,$OtherUsera)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUsera,$Latin1)."');\" ".userClass($status,$OtherUsera)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			elseif (C_ENABLE_PM)
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',true);\" ".userClass($status,$OtherUsera)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',true);\" ".userClass($status,$OtherUsera)." title='".L_WHSP."' onMouseOver=\"window.status='".L_SEND_WHSP."'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			else
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',false);\" ".userClass($status,$OtherUsera)." title='".L_USE_NAME." $OtherUser' onMouseOver=\"window.status='".L_USE_NAME." $OtherUser'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',false);\" ".userClass($status,$OtherUsera)." title='".L_USE_NAME." $OtherUser' onMouseOver=\"window.status='".L_USE_NAME." $OtherUser'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
		}
			echo("</DIV>\n");
	}
			echo("</DIV>\n");
			$ChildNb[$id] = $j;
		}
		$OthersUsers->clean_results();
	}
}
$DbLink->clean_results();
$DbLink->close();

// Display all rest default rooms
for($k = 0; $k < count($DefaultChatRooms); $k++)
{
	$tmpRoom = stripslashes($DefaultChatRooms[$k]);
	$id = md5($tmpRoom);
	$tmpDispRoom = $tmpRoom;
	$tmpDispRes = "";
	// Restricted rooms mod by Ciprian
	if (is_array($DefaultDispChatRooms) && in_array($tmpRoom." [R]",$DefaultDispChatRooms))
	{
		$tmpDispRoom .= " [".$res_init."]";
		$tmpDispRes = " (".L_RESTRICTED.")";
	}

	// Display this room name when it hadn't been displayed yet
	if (strcasecmp(mb_convert_case($tmpRoom,MB_CASE_LOWER,$Charset), mb_convert_case(stripslashes($R),MB_CASE_LOWER,$Charset)) != 0 && (!isset($ChildNb) || !isset($ChildNb[$id])))
	{
		if (!isset($FirstOtherRoom))
				$FirstOtherRoom = "Parent".$id;
        echo("<DIV ID=\"Parent${id}\" CLASS=\"parent\" style=\"margin-top: 1px;\">");
        echo("<a href=\"$From?Ver=H&L=$L&U=".stripslashes($U)."$AddPwd2Link&R0=".urlencode(stripslashes($tmpRoom))."&T=1&D=$D&N=$N&E=".urlencode(stripslashes($R))."&EN=$T".(isset($RemMe) ? "&RM=1" : "")."\" TARGET=\"_parent\" onMouseOver=\"window.status='".L_JOIN_ROOM.$tmpDispRes."'; return true;\" title='".L_JOIN_ROOM.$tmpDispRes."'>".htmlspecialchars($tmpDispRoom)."</a><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(0)</SPAN>\n");
        echo("</DIV>\n");
   }
}
?>
<hr />
<div id="menu">
	<dl>
		<dt onmouseover="javascript:show('smenu1');"><?php echo(L_EXTRA_OPT); ?></dt>
		<dd id="smenu1" onmouseover="javascript:show('smenu1');" onmouseout="javascript:show('');">
			<ul>
<?php
if ($statusu == "a")
{
?>
				<li><a href="<?php echo($ChatPath."admin.php?L=".$L."&pmc_username=".$U."&LIMIT=1&Link=1"); ?>" onClick="window.parent.reg_popup('admin','<?php echo(urlencode(stripslashes($U))."&LIMIT=1"); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_35); ?>.'; return true;" title="<?php echo(L_REG_35); ?>"><?php echo(L_REG_35); ?></a></li>
<?php
}
if ($statusu != "a" && $statusu != "t" && $statusu != "m" && $statusu != "r" && C_ALLOW_REGISTER)
{
$Cmd2Send = ("'quit','".special_char2(stripslashes($U),$Latin1)." - L_REG_BRB :p'");
?>
				<li><a href="<?php echo($ChatPath."register.php?L=".$L."&U=".$U."&Link=1"); ?>" onClick="window.parent.reg_popup('register','<?php echo(urlencode(stripslashes($U))."&LIMIT=1"); ?>'); window.parent.runCmd(<?php echo($Cmd2Send); ?>); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_3); ?>.'; return true;" title="<?php echo(L_REG_3); ?>"><?php echo(L_REG_3); ?></a></li>
<?php
}
if ($statusu == "a" || $statusu == "t" || $statusu == "m" || $statusu == "r")
{
?>
				<li><a href="<?php echo($ChatPath."edituser.php?L=".$L."&pmc_username=".$U."&LIMIT=1&Link=1"); ?>" onClick="window.parent.reg_popup('edituser','<?php echo(urlencode(stripslashes($U))."&LIMIT=1"); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_4); ?>.'; return true;" title="<?php echo(L_REG_4); ?>"><?php echo(L_REG_4); ?></a></li>
<?php
}
if ($statusu != "a" && $statusu != "t" && $statusu != "u")
{
$Cmd2Send = ("'quit','".special_char2(stripslashes($U),$Latin1)." - L_DEL_BYE :('");
?>
				<li><a href="<?php echo($ChatPath."deluser.php?L=".$L."&pmc_username=".$U."&Link=1"); ?>" onClick="window.parent.reg_popup('deluser','<?php echo(urlencode(stripslashes($U))."&LIMIT=1"); ?>'); window.parent.runCmd(<?php echo($Cmd2Send); ?>); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_5); ?>.'; return true;" title="<?php echo(L_REG_5); ?>"><?php echo(L_REG_5); ?></a></li>
<?php
}
// Private Message Popup mod by Ciprian
if (C_ENABLE_PM && isset($PWD_Hash))
{
	$NewPMs = 0;
	$TotalPMs = 0;
	$DbLink->query("SELECT username, address, room, pm_read FROM ".C_MSG_TBL." WHERE address = '$U' AND pm_read LIKE 'New%' ORDER BY m_time DESC");
	if($DbLink->num_rows() > 0)
	{
		$NewPMs = $DbLink->num_rows();
		$DbLink->clean_results();
	}
	else
	{
		$DbLink->query("SELECT username, address, room, pm_read FROM ".C_MSG_TBL." WHERE address = '$U' AND username NOT LIKE 'SYS%' ORDER BY m_time DESC");
		if($DbLink->num_rows() > 0)
		{
			$TotalPMs = $DbLink->num_rows();
			$DbLink->clean_results();
		}
	}
	if ($NewPMs || $TotalPMs)
	{
	?>
				<li><a href="<?php echo($ChatPath."pm_manager.php?L=".$L.""); ?>" onClick="window.parent.reg_popup('pm_manager','<?php echo(urlencode(stripslashes($U))."&LIMIT=1"); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(($NewPMs == 1) ? L_PRIV_MSG : ($NewPMs ? sprintf(L_PRIV_MSGS,$NewPMs) : ($TotalPMs == 1 ? L_PRIV_READ_MSG : ($TotalPMs ? sprintf(L_PRIV_READ_MSGS,$TotalPMs) : L_PRIV_NO_MSGS)))); ?>'; return true;" title="<?php echo(($NewPMs == 1) ? L_PRIV_MSG : ($NewPMs ? sprintf(L_PRIV_MSGS,$NewPMs) : ($TotalPMs == 1 ? L_PRIV_READ_MSG : ($TotalPMs ? sprintf(L_PRIV_READ_MSGS,$TotalPMs) : L_PRIV_NO_MSGS)))); ?>"><?php echo(!$NewPMs ? L_EXTRA_PRIV1 : "<font class=error>".L_EXTRA_PRIV2."</font>"); ?></a></li>
	<?php
	}
};
if (C_CHAT_LOGS && (C_SHOW_LOGS_USR || $statusu == "a" || $statusu == "t"))
{
?>
				<li><a href="<?php echo($ChatPath); ?>logs.php?<?php echo("L=$L"); ?>" onClick="window.parent.logs_popup(); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_ARCHIVE); ?>.'; return true;" title="<?php echo(L_ARCHIVE); ?>"><?php echo(L_ARCHIVE); ?></a></li>
<?php
}
if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $statusu == "a" || $statusu == "t"))
{
	$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
	@@mysql_query("SET CHARACTER SET utf8");
	@mysql_query("SET NAMES 'utf8'");
	@mysql_select_db(C_DB_NAME,$handler);
	$timeout = "15";
	$closetime = $time-($timeout);
	// Ghost Control mod by Ciprian
	$Hide1 = "";
	if (C_HIDE_ADMINS) $Hide1 .= ($Hide1 == "") ? " WHERE status != 'a' AND status != 't'" : " AND status != 'a' AND status != 't'";
	if (C_HIDE_MODERS) $Hide1 .= ($Hide1 == "") ? " WHERE status != 'm'" : " AND status != 'm'";
	if (C_SPECIAL_GHOSTS != "") $Hide1 .= ($Hide1 == "") ?  " WHERE username != ".C_SPECIAL_GHOSTS."" : " AND username != ".C_SPECIAL_GHOSTS."";
	$delete = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
	$result = @mysql_query("SELECT DISTINCT ip,browser,username FROM ".C_LRK_TBL.$Hide1."",$handler);
	$online_users = @mysql_numrows($result);
	@mysql_close();
	$lurklink = "<li><a href=\"lurking.php?L=".$L."&D=".$D."\" CLASS=\"ChatLink\" TARGET=\"_blank\" onMouseOver=\"window.status='".L_LURKING_1.".'; return true;\" title='".L_LURKING_2."'>";
	echo($lurklink.$online_users." ".($online_users != 1 ? L_LURKERS : L_LURKER)."</a></li>");
	$CleanUsrTbl = 1;
}
?>
				<li><a href="<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver=$Ver"); ?>" onClick="window.parent.tutorial_popup(); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_TUTORIAL); ?>.'; return true;" title="<?php echo(L_TUTORIAL); ?>"><?php echo(L_TUTORIAL); ?></a></li>
				<li><a href="<?php echo($ChatPath); ?>bday_popup.php?<?php echo("L=$L"); ?>" onClick="window.parent.bday_popup(); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_L_DOB_TIT_1); ?>.'; return true;" title="<?php echo(L_DOB_TIT_1); ?>"><?php echo(L_DOB_TIT_1); ?></a></li>
				<li><a href="<?php echo($ChatPath); ?>extra/fixes/fixes.zip" TARGET="_blank" onMouseOver="window.status='<?php echo (stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") ? L_SOUNDFIX_IE_2 : str_replace("IE","FF",L_SOUNDFIX_IE_2)) ?>'; return true;" title="<?php echo (stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") ? L_SOUNDFIX_IE_2 : str_replace("IE","FF",L_SOUNDFIX_IE_2)) ?>"><?php echo (stristr($_SERVER['HTTP_USER_AGENT'],"MSIE") ? L_SOUNDFIX_IE_1 : str_replace("IE","FF",L_SOUNDFIX_IE_1)) ?></a></li>
				<li><a href="privacy.html" TARGET=_blank CLASS="ChatLink" title="<?php echo(sprintf(L_CLICK,L_PRIVACY)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_PRIVACY)); ?>'; return true">Our Privacy Policy</a></li>
				<li><a href="<?php echo($ChatPath); ?>help_popup.php?<?php echo("L=$L&Ver=$Ver"); ?>" onClick="window.parent.help_popup(); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_HLP); ?>.'; return true" onClick="window.parent.frames['input'].forms['MsgForm'].elements['M'].focus();" title="<?php echo(L_HLP); ?>"><?php echo(L_HLP); ?></a></li>
				<li><a onClick="javascript:alert('<?php echo (APP_NAME." - ".APP_VERSION.APP_MINOR); ?>\n\nReleased on:\n<?php echo(RELEASE_DATE); ?>.\n\n&copy; 2001-<?php echo(date('Y')); ?>\nPlus Developer: <?php echo(PLUS_DEVELOPER); ?>\n\nBig thanks to all the contributors\nto the phpHeaven Team work\nand the phpMyChat groups on\nYahoo! and Sourceforge.\n\nThank you for using our work!')" Title="What is this?" onMouseOver="window.status='What is this?'; return true"><?php echo (APP_NAME); ?></a></li>
			</ul>
		</dd>
	</dl>
</div>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
<!--
window.parent.rooms_number = <?php echo(isset($i) ? "$i" : "0"); ?>;
window.parent.usersFrame = window;
window.parent.exitFrame = window.parent.frames['exit'].window;

<?php
if (isset($ChildNb) && count($ChildNb) > 0)
{
	?>
	// Set the table containing number of users per 'others' rooms
	window.parent.ChildNb = new Array;
	<?php
	while(list($key, $nb) = each($ChildNb))
	{
		echo("window.parent.ChildNb['$key'] = '$nb';\n");
	};
	unset($ChildNb);
};
?>

// Get the index of the first expandable/collapsible room under NN4+
if (window.parent.NS4)
{
	<?php
	if (isset($FirstOtherRoom))
	{
		?>
		firstEl = "<?php echo($FirstOtherRoom); ?>";
		firstInd = window.parent.getIndex(firstEl);
		window.parent.arrange();
		<?php
	}
	else
	{
		?>
		firstInd = null;
		<?php
	}
	?>
};

// Scrolls to the position where the frame was before reloading
if (window.parent.Y != null)
{
	scrollTo(0, window.parent.Y);
	if (window.parent.IE4) scrollBy(0, window.parent.Y-document.body.scrollTop);
};
//-->
</SCRIPT>
</BODY>
</HTML>
<?php
?>