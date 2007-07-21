<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

if (isset($_COOKIE["CookieStatus"])) $statusu = $_COOKIE["CookieStatus"];
if (isset($_COOKIE["CookieUserSort"])) $sort_order = $_COOKIE["CookieUserSort"];

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=".$Charset);

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(APP_NAME); ?></TITLE>
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

// Open the tutorial popup
	function tutorial_popup()
	{
		window.focus();
		tutorial_popupWin = window.open("<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver="); ?>"+ver4,"tutorial_popup","width=700,height=800,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,status=yes");
		tutorial_popupWin.focus();
	}

	// Open popup for registration stuff
	function reg_popup_room()
	{
		window.focus();
		url = "<?php echo($ChatPath); ?>register.php?L=<?php echo($L); ?>&Link=1";
		param = "width=400,height=640,resizable=yes,scrollbars=yes";
		window.open(url,"register_popup",param);
	}

// Initialize the collapsible outline;
onload = window.parent.initIt;
// -->
</SCRIPT>
</HEAD>

<BODY CLASS="frame" onUnload="GetY();">
<P>
<?php
// Special formats depending on users status
function special_char($str,$lang,$type)
{
	$tag_open = (($type == 'a' || $type == 'm') ? "<I>":"");
	$tag_close = ($tag_open != "" ? "</I>":"");
	return $tag_open.($lang ? htmlentities($str) : htmlspecialchars($str)).$tag_close;
}

// Special colors for usernames depending on users choise and status
function userColor($type,$colorname)
{
	if (COLOR_FILTERS)
	{
		if (COLOR_NAMES)
		{
			$color = ($colorname != '' ? $colorname:($type == 'a' ? COLOR_CA:($type == 'm' ? COLOR_CM:COLOR_CD)));
			return $color;
		}
		else
		{
			$color = ($type == 'a' ? COLOR_CA:($type == 'm' ? COLOR_CM:""));
			return $color;
		};
	}
	elseif (COLOR_NAMES)
	{
			$color = ($colorname != '' ? $colorname:COLOR_CD);
			return $color;
	}
	else
	{
			$color = "";
			return $color;
	};
};

// Special classes for usernames depending on users status (other users)
function userClass($type)
{
	if (COLOR_FILTERS)
	{
		if (COLOR_NAMES)
		{
			 $class = "";
		}
		else
		{
			$class = ($type == 'a' ? "Class=\"admin\"":($type == 'm' ? "Class=\"mod\"":"Class=\"user\""));
		}
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

$DbLink = new DB;

// Ghost Control mod by Ciprian
$Hide = (C_HIDE_ADMINS && C_HIDE_MODERS) ? " AND (usr.status != 'a' OR reg.email = 'bot@bot.com') AND usr.status != 'm'" : (C_HIDE_ADMINS ? " AND (usr.status != 'a' OR reg.email = 'bot@bot.com')" : (C_HIDE_MODERS ? " AND usr.status !='m'" : ""));

//** Build users list for the current room **
if (C_DB_TYPE == 'mysql')
{
// Modified next line by R Dickow for /away command:
  $currentRoomQuery = 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
						. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
						. 'WHERE usr.room = \'' . $R . '\'' . $Hide . ' '
						. 'ORDER BY ' . ($sort_order == "1" ? "username" : "r_time") . '';
}
else if (C_DB_TYPE == 'pgsql')
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\'' . $Hide . ' AND usr.username = reg.username '
						. 'UNION '
						. 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time,  NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr '
						. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . $R . '\'' . $Hide . ' '
						. 'ORDER BY ' . ($sort_order == "1" ? "username" : "r_time") . '';
}
else
{
	$currentRoomQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar NULL AS gender '
						. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
						. 'WHERE usr.room = \'' . $R . '\'' . $Hide . ' '
						. 'ORDER BY ' . ($sort_order == "1" ? "username" : "r_time") . '';
}

$DbLink->query($currentRoomQuery);
echo("<B>".htmlspecialchars(stripslashes($R))."</B><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$DbLink->num_rows().")</SPAN><br />\n");
while(list($User, $Latin1, $status, $awaystat, $room_time, $gender, $allowpopup, $colorname, $avatar) = $DbLink->next_record())
{
	if (C_USE_AVATARS)
   {
          if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
          $ava_none = $avatar;
          $ava_width = C_AVA_WIDTH;
          $ava_height = C_AVA_HEIGHT;
   }
	else
	{
	// Put an icon when there is a profile for the user
	if($gender == 0)
		$gender = 'undefined';
	elseif($gender == 1)
		$gender = 'boy';
	elseif($gender == 2)
		$gender = 'girl';
	else
		$gender = 'none';
// Avatar System Start: Inserted:
    $avatar = "images/gender_".$gender.".gif";
		$ava_none = "images/gender_none.gif";
		$ava_width = 14;
		$ava_height = 14;
   }
// Avatar System End.
  // add for /away command modification by R Dickow.
  if ($awaystat == 1) {
  		$Usera = $User;
    	$User = "(".$User.")";
  }
  // end add for /away command
	$title1 = ($User == stripslashes($U) ? L_REG_4 : L_PROFILE);
	if ($status != "u" && $status != "k" && $status != "d" && $status != "b" && $awaystat == 0)
	{
		$Cmd2Send = ($User == stripslashes($U) ? "'profile',''" : "'whois','".special_char2(stripslashes($User),$Latin1)."'");
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" onMouseOver="window.status=\''.$title1.'\'; return true;" title="'.$title1.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.$title1.'"></a>&nbsp;');
	}
	elseif ($status != "u" && $status != "k" && $status != "d" && $status != "b" && $awaystat == 1)
	{
		$Cmd2Send = ($User == stripslashes("(".$U.")") ? "'profile',''" : "'whois','".special_char2(stripslashes($Usera),$Latin1)."'");
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" onMouseOver="window.status=\''.$title1.'\'; return true;" title="'.$title1.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.$title1.'"></a>&nbsp;');
	}
	else
	{
// Avatar System Start.
    if (C_USE_AVATARS && ($User == stripslashes($U)))
    {
			echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '" onClick="alert(\'You must be registered to change your avatar icon.\'); return false;">&nbsp;');
    }
    else
    {
			echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '">&nbsp;');
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
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></a>&nbsp;");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($User,$Latin1,$status)."</a>&nbsp;");
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
			echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="Highlight/Un-Highlight" onMouseOver="window.status=\'Highlight/Un-Highlight messages sent by this user.\'; return true"><img src="'.$highlight.'" border="0"></a><br />');
			//-------------------------------End HighLight Mod
  }
  else
  {
		$Cmd2Send = ($User == stripslashes($U) ? "'high',''" : "'high','".special_char2($Usera,$Latin1)."'");
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($Usera,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></a>&nbsp;");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($Usera,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($User,$Latin1,$status)."</a>&nbsp;");
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
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="Highlight/Un-Highlight" onMouseOver="window.status=\'Highlight/Un-Highlight messages sent by this user.\'; return true"><img src="'.$highlight.'" border="0"></a><br />');
		//---------------------------End HighLight Mod
  }
// end /away mod alteration.
	}
	else
	{
		$Cmd2Send = ($User != stripslashes($U) ? "'high',''" : "'high','".special_char2($User,$Latin1)."'");
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($User,$Latin1,$status)."</span></a>&nbsp;");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick('".special_char2($User,$Latin1)."',false,'".special_char2($U,$Latin1)."');\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($User,$Latin1,$status)."</a>&nbsp;");
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
		echo('<a onClick="window.parent.runCmd('.$Cmd2Send.'); return false;" title="Highlight/Un-Highlight" onMouseOver="window.status=\'Highlight/Un-Highlight messages sent by this user.\'; return true"><img src="'.$highlight.'" border="0"></a><br />');
		//-------------------------------End HighLight Mod
	}
}
echo("</DIV><br />\n");
$DbLink->clean_results();

//** Build users list for other rooms **
$AddPwd2Link = (isset($PWD_Hash) && $PWD_Hash != "") ? "&PWD_Hash=$PWD_Hash" : "";
$DbLink->query("SELECT DISTINCT room FROM ".C_MSG_TBL." WHERE room != '$R' AND type = 1 ORDER BY room");
if($DbLink->num_rows() > 0)
{
	$i = 0;
	$ChildNb = Array();
	$OthersUsers = new DB;
	// Ghost Control mod by Ciprian
	$Hide = (C_HIDE_ADMINS && C_HIDE_MODERS) ? " AND (usr.status != 'a' OR reg.email = 'bot@bot.com') AND usr.status != 'm'" : (C_HIDE_ADMINS ? " AND (usr.status != 'a' OR reg.email = 'bot@bot.com')" : (C_HIDE_MODERS ? " AND usr.status !='m'" : ""));
	while(list($Other) = $DbLink->next_record())
	{
		if (C_DB_TYPE == 'mysql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
								. 'FROM ' . C_USR_TBL . ' usr LEFT JOIN ' . C_REG_TBL . ' reg ON usr.username = reg.username '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' '
								. 'ORDER BY ' . ($sort_order == "1" ? "username" : "r_time") . '';
		}
		else if (C_DB_TYPE == 'pgsql')
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' AND usr.username = reg.username '
								. 'UNION '
								. 'SELECT usr.username, usr.latin1, usr.status, usr.r_time, NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr '
								. 'WHERE usr.username NOT IN (SELECT reg.username FROM ' . C_REG_TBL . ' reg) AND usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' '
								. 'ORDER BY ' . ($sort_order == "1" ? "username" : "r_time") . '';
		}
		else
		{
			$otherRoomsQuery	= 'SELECT usr.username, usr.latin1, usr.status, usr.awaystat, usr.r_time, reg.gender, reg.allowpopup, reg.colorname, reg.avatar NULL AS gender '
								. 'FROM ' . C_USR_TBL . ' usr, ' . C_REG_TBL . ' reg '
								. 'WHERE usr.room = \'' . addslashes($Other) . '\'' . $Hide . ' '
								. 'ORDER BY ' . ($sort_order == "1" ? "username" : "r_time") . '';
		}
		$OthersUsers->query($otherRoomsQuery);
		if($OthersUsers->num_rows() > 0)
		{
			$i++;
			$id = md5($Other);
			if ($i == 1) $FirstOtherRoom = "Parent".$id;
			echo("<DIV ID=\"Parent${id}\" CLASS=\"parent\" CURSOR: pointer\">");
			echo("<a href=\"#\" onClick=\"window.parent.expandIt('${id}'); return false\" onMouseOver=\"window.status='".L_EXPCOL."'; return true;\" title=\"".L_EXPCOL."\">");
			echo("<IMG NAME=\"imEx\" SRC=\"images/closed.gif\" WIDTH=9 HEIGHT=9 BORDER=0 ALT=\"".L_EXPCOL."\"></a>");
			echo("&nbsp;<a href=\"$From?Ver=H&L=$L&U=".urlencode(stripslashes($U))."$AddPwd2Link&R1=".urlencode($Other)."&T=1&D=$D&N=$N&E=".urlencode(stripslashes($R))."&EN=$T\" TARGET=\"_parent\" onMouseOver=\"window.status='Join this room'; return true;\" title=\"Join this room\">".htmlspecialchars($Other)."</a><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$OthersUsers->num_rows().")</SPAN>");
			echo("</DIV>\n");
			echo("<DIV ID=\"Child${id}\" CLASS=\"child\" STYLE=\"margin-left: 12px\">\n");
			$j = 0;
			while(list($OtherUser, $Latin1, $status, $awaystat, $room_time, $gender, $allowpopup, $colorname, $avatar) = $OthersUsers->next_record())
			{
				$j++;
	if (C_USE_AVATARS)
   {
          if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
          $ava_none = $avatar;
          $ava_width = C_AVA_WIDTH;
          $ava_height = C_AVA_HEIGHT;
   }
	else
	{
	// Put an icon when there is a profile for the user
	if($gender == 0)
		$gender = 'undefined';
	elseif($gender == 1)
		$gender = 'boy';
	elseif($gender == 2)
		$gender = 'girl';
	else
		$gender = 'none';
// Avatar System Start: Inserted:
    $avatar = "images/gender_".$gender.".gif";
		$ava_none = "images/gender_none.gif";
		$ava_width = 14;
		$ava_height = 14;
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
					echo('<a onClick="window.parent.runCmd(\'whois\',\''.special_char2($OtherUser,$Latin1).'\'); return false;" onMouseOver="window.status=\''.L_PROFILE.'\'; return true;" title="'.L_PROFILE.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.L_PROFILE.'"></a>&nbsp;');
				}
				else
				{
					echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '">&nbsp;');
				}
  			if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopup || $status == "u"))
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUser,$Latin1)."');\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUser,$Latin1)."');\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			elseif (C_ENABLE_PM)
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',true);\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',true);\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			else
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUser,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
		}
	else
	{
				if ($status != "u" && $status != "k" && $status != "d" && $status != "b")
				{
					echo('<a onClick="window.parent.runCmd(\'whois\',\''.special_char2($OtherUsera,$Latin1).'\'); return false;" onMouseOver="window.status=\''.L_PROFILE.'\'; return true;" title="'.L_PROFILE.'"><img src="'.$avatar.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="'.L_PROFILE.'"></a>&nbsp;');
				}
				else
				{
					echo('<img src="'.$ava_none.'" width="'.$ava_width.'" height="'.$ava_height.'" border="0" alt="' . L_NO_PROFILE . '">&nbsp;');
				}
  			if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopup || $status == "u"))
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUsera,$Latin1)."');\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.send_popup('/wisp ".special_char2($OtherUsera,$Latin1)."');\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			elseif (C_ENABLE_PM)
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',true);\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',true);\" ".userClass($status)." title=\"Whisper\" onMouseOver=\"window.status='Send a Whisper.'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
			else
			{
				if (COLOR_NAMES)
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\"><span style=color:".userColor($status,$colorname).";>".special_char($OtherUser,$Latin1,$status)."</span></a><br />\n");
				}
				else
				{
					echo("<a onClick=\"window.parent.userClick2('".special_char2($OtherUsera,$Latin1)."',false);\" ".userClass($status)." title=\"Use this name\" onMouseOver=\"window.status='Use this username.'; return true\">".special_char($OtherUser,$Latin1,$status)."</a><br />\n");
				}
			}
		}
	}
			echo("</DIV>");
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

	// Display this room name when it hadn't been displayed yet
	if (strcasecmp($tmpRoom, stripslashes($R)) != 0 && (!isset($ChildNb) || !isset($ChildNb[$id])))
	{
		if (!isset($FirstOtherRoom))
				$FirstOtherRoom = "Parent".$id;
        echo("<DIV ID=\"Parent${id}\" CLASS=\"parent\" CURSOR: pointer\">");
        echo("<a href=\"$From?Ver=H&L=$L&U=".urlencode(stripslashes($U))."$AddPwd2Link&R0=".urlencode($tmpRoom)."&T=1&D=$D&N=$N&E=".urlencode(stripslashes($R))."&EN=$T\" TARGET=\"_parent\" onMouseOver=\"window.status='Join this room'; return true;\" title=\"Join this room\">".htmlspecialchars($tmpRoom)."</a><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(0)</SPAN>");
        echo("</DIV>\n");
   }
}
?>
</P>
<P valign=bottom>
	<TD><B><?php echo(L_EXTRA_OPT); ?></B></TD>
<?php
if ($statusu == "u"  && !C_REQUIRE_REGISTER)
{
$Cmd2Send = ("'quit','".special_char2(stripslashes($U),$Latin1)." - brb (need to register first :p)'");
?>
<br /><TD valign=bottom><a href="<?php echo($ChatPath); ?>register.php" onClick="reg_popup_room(); window.parent.runCmd(<?php echo($Cmd2Send); ?>); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_3); ?>.'; return true;" title="<?php echo(L_REG_3); ?>"><?php echo(L_REG_3); ?></a></TD>
<?php
}
if (C_CHAT_LOGS && (C_SHOW_LOGS_USR || $statusu == "a"))
{
?>
<br /><TD valign=bottom><a href="<?php echo($ChatPath); ?>logs.php" TARGET="_blank" onMouseOver="window.status='<?php echo(L_ARCHIVE); ?>.'; return true;" title="<?php echo(L_ARCHIVE); ?>"><?php echo(L_ARCHIVE); ?></a></TD>
<?php
}
if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $statusu == "a"))
{
	$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
	@mysql_select_db(C_DB_NAME,$handler);
	$timeout = "15";
	$closetime = $time-($timeout);
	$result = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
	$result = @mysql_query("SELECT DISTINCT ip,browser FROM ".C_LRK_TBL."",$handler);
	$online_users = @mysql_numrows($result);
	@mysql_close();
	$lurklink = "<a href=\"lurking.php?D=".$D."\" CLASS=\"ChatLink\" TARGET=\"_blank\" onMouseOver=\"window.status='Open the lurking page.'; return true;\" title=\"Lurking page\">";
	echo("<br /><TD valign=bottom>".$lurklink.$online_users." ".($online_users != 1 ? L_LURKERS : L_LURKER)."</a></TD>");
	$CleanUsrTbl = 1;
}
?>
<br /><TD valign=bottom><a href="<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver=H"); ?>" onClick="tutorial_popup(); return false" TARGET="_blank" onMouseOver="window.status='Open <?php echo(L_TUTORIAL); ?>.'; return true;" title="<?php echo(L_TUTORIAL); ?>"><?php echo(L_TUTORIAL); ?></a></TD>
<br /><TD valign=bottom><a href="<?php echo($ChatPath); ?>extra/fixes/fixes.zip" TARGET="_blank" onMouseOver="window.status='Download the sound fix for IE.'; return true;" title="Download the sound fix for IE">Sound fix for IE</a></TD>
</P>
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