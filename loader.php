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

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

// Size command by Ciprian
if (isset($_COOKIE["CookieFontSize"])) $FontSize = $_COOKIE["CookieFontSize"];

header("Content-Type: text/html; charset=${Charset}");

// Avoid server configuration for magic quotes
set_magic_quotes_runtime(0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

// Text direction
$textDirection = ($Align == "right") ? "RTL" : "LTR";

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset != "utf-8");
function special_char($str,$lang,$slash_on)
{
	$str = ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
	return ($slash_on ? addslashes($str) : $str);
};

function special_char2($str,$lang)
{
	return ($lang ? htmlentities(addslashes($str)) : htmlspecialchars(addslashes($str)));
}

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
		return $str;
	}
};

if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if (function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};

function setImageSize($image_file,$maxSize) {

if (function_exists("getimagesize"))
{
	$image_size = getimagesize($image_file);
	$width = $image_size[0];
	$height = $image_size[1];
	if (!$width || $width == "") $width = $maxSize;
}
else
{
	$width = $maxSize;
	$height = "";
}


if($width > $maxSize || $height > $maxSize) {

if($width > $height) {
$i = $width - $maxSize;
$imgSizeArray[0] = $maxSize;
$imgSizeArray[1] = $height - ($height * ($i / $width));

} else {

$i = $height - $maxSize;
$imgSizeArray[0] = $width - ($width * ($i / $height));
$imgSizeArray[1] = $maxSize;
}

} else {

$imgSizeArray[0] = $width;
$imgSizeArray[1] = $height;
}

return $imgSizeArray;
}

// Ghost Control mod by Ciprian
function ghosts_in($what, $in, $Charset)
{
	$ghosts = explode(",",$in);
	for (reset($ghosts); $ghost_name=current($ghosts); next($ghosts))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($ghost_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}

// Ensure a room ($what) is include in a rooms list ($in)
function room_in($what, $in, $Charset)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	};
	return false;
};

if(C_EN_STATS)
{
	$curtime = time();
}

$DbLink = new DB;
	$DbLink->query("SELECT perms,rooms,allowpopup,join_room FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	$reguser = ($DbLink->num_rows() != 0);
	if ($reguser) list($perms, $rooms, $allowpopupu, $join_room) = $DbLink->next_record();
	$DbLink->clean_results();

// Get IP address
require("./lib/get_IP.lib.php");		// Set the $IP var

// ** Updates user info in connected users tables **
// Fixed a security issue thanks to SeazoN
if (C_REQUIRE_REGISTER && (!isset($PWD_Hash) || $PWD_Hash == ''))
{
	exit(); // hack attack
}
else if (isset($PWD_Hash) && $PWD_Hash != '')
{
	$DbLink->query(	'SELECT ' . C_USR_TBL . '.room, ' . C_USR_TBL . '.status, ' . C_USR_TBL . '.ip'
					. ' FROM ' . C_USR_TBL . ', ' . C_REG_TBL
					. ' WHERE ' . C_USR_TBL . '.username = \'' . $U . '\''
					. ' AND ' . C_REG_TBL . '.username = \'' . $U . '\''
					. ' AND ' . C_REG_TBL . '.password = \'' . $PWD_Hash . '\''
					. ' LIMIT 1');
}
else // C_REQUIRE_REGISTER == 0 && $PWD_Hash is empty
{
	$DbLink->query('SELECT username FROM ' . C_REG_TBL . ' WHERE username = \'' . $U . '\' LIMIT 1');
	if ($DbLink->num_rows() == 0)
	{
		$DbLink->query('SELECT room, status, ip FROM ' . C_USR_TBL . ' WHERE username = \'' . $U . '\' LIMIT 1');
	}
	else
	{
		$DbLink->clean_results();
		$DbLink->close();
		exit(); // hack attack
	}
}
// End of SeazoN Fix
if($DbLink->num_rows() != 0)
{
	// There is a row for the user in the users table
	list($room,$status,$knownIp) = $DbLink->next_record();
	$DbLink->clean_results();
	$kicked = 0;
	if ($room != stripslashes($R))	// Same nick in another room
	{
	// Ghost Control mod by Ciprian
	if (C_SPECIAL_GHOSTS != "")
	{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
	}
	if (($sghosts != "" && ghosts_in(stripslashes($U), $sghosts, $Charset)) || (C_HIDE_ADMINS && ($status == "a" || $status == "t")) || (C_HIDE_MODERS && $status == "m"))
	{
	}
	else
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1,1)."\")', '', '')");
	}
	if(C_EN_STATS)
	{
		$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$R' AND username='$U' AND last_away!='0'");
		$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='' WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U' AND last_in!='0'");
	}
		$kicked = 3;
	}
	elseif ($status == "k")			// Kicked by a moderator or the admin.
	{
		$kicked = 1;
	}
	elseif ($status == "d")			// The admin just deleted the room
	{
		$kicked = 2;
	}
	elseif ($status == "b")			// Banished by a moderator or the admin.
	{
		$DbLink->clean_results();
		$DbLink->query("SELECT reason FROM ".C_BAN_TBL." WHERE username='$U' LIMIT 1");
		$Nb = $DbLink->num_rows();
		// IP is banished from some rooms
		if ($Nb != "0")
		{
			list($Reason) = $DbLink->next_record();
			$DbLink->clean_results();
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_BANISHED_REASON, \"".special_char($U,$Latin1)."\", \"".$Reason."\")', '', '')");
		}
		else
		{
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_BANISHED, \"".special_char($U,$Latin1)."\")', '', '')");
		}
		if(C_EN_STATS)
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$R' AND username='$U' AND last_away!='0'");
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='' WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U' AND last_in!='0'");
			$DbLink->query("UPDATE ".C_STS_TBL." SET bans_rcvd=bans_rcvd+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
		}
		$kicked = 4;
	}
	else if ($knownIp != $IP)
	{
		$kicked = 5;
	}
	if (!$kicked)
	{
		// Updates the time to ensure the user won't be cleaned from the users table
		$DbLink->query("UPDATE ".C_USR_TBL." SET u_time = ".time()." WHERE room = '$R' AND username = '$U'");
	}
}
else
{
	// User hasn't been found in the users table -> add a row if he is registered
	$DbLink->clean_results();
	$DbLink->query("SELECT perms,rooms,allowpopup,join_room FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	$reguser = ($DbLink->num_rows() != 0);
	if ($reguser) list($perms, $rooms, $allowpopupu, $join_room) = $DbLink->next_record();
	$DbLink->clean_results();
	// Kick unreg users
	if (!$reguser)
	{
		$kicked = 6;
	}
	// Add reg users
	else
	{
		// Get user status
		switch ($perms)
		{
			case 'admin':
				$status = "a";
				break;
			case 'topmod':
				$status = "t";
				break;
			case 'moderator':
				$roomsTab = explode(",",$rooms);
				for (reset($roomsTab); $room_name=current($roomsTab); next($roomsTab))
				{
					if (strcasecmp(mb_convert_case(stripslashes($R),MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0 || $room_name == "*")
					{
						$status = "m";
						break;
					};
				};
			default:
				$status = "r";
		};
		$DbLink->query("INSERT INTO ".C_USR_TBL." VALUES ('$R', '$U', '$Latin1', ".time().", '$status', '$IP', '0', ".time().", '$email')");
	}
}

if (!empty($kicked))
{
	// Kick the user from the current room
	$kickedUrl = "$From?L=$L&U=" . urlencode(stripslashes($U));
	if ($kicked < 5) $kickedUrl .= "&E=$R&KK=$kicked";
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	window.parent.window.location = '<?php echo($kickedUrl); ?>';
	// -->
	</SCRIPT>
	<?php
	$DbLink->close();
	exit;
}

// ** Check for updates in users list **
if ($First) $LastCheck = 0;
if ($CleanUsrTbl)
{
	$Users_Refresh = "1";
}
else
{
	$QueryRoom = " AND (type = 1".($T == "0" ? " OR (type = 0 AND room = '$R')" : "").") ";
	$DbLink->query("SELECT DISTINCT m_time FROM ".C_MSG_TBL." WHERE m_time > '$LastCheck' AND username IN ('SYS enter','SYS exit','SYS promote','SYS demote','SYS delreg','SYS away')".$QueryRoom."ORDER BY m_time DESC LIMIT 1");
	$Users_Refresh = ($DbLink->num_rows() > 0);
	if ($Users_Refresh) list($LastCheck) = $DbLink->next_record();
	$DbLink->clean_results();
};


// ** Check for updates in messages list and get new messages **
if ($First) $LastLoad = 0;

// Define the SQL query (depends on values for ignored users list and on whether to display notification messages or not)
$CondForQuery	= "";
$IgnoreList	= "";
if (isset($Ign)) $IgnoreList = "'".str_replace(",","','",addslashes(urldecode($Ign)))."'";
if ($NT == "0") $IgnoreList .= ($IgnoreList != "" ? ",":"")."'SYS enter','SYS exit'";
if ($IgnoreList != "") $CondForQuery = "username NOT IN (${IgnoreList}) AND ";
// Ghost Control mod by Ciprian
if (C_SPECIAL_GHOSTS != "")
{
	$sghosts = "";
	$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
	$sghosts = str_replace(" AND username != ",",",$sghosts);
}
if ($sghosts != "" && ghosts_in(stripslashes($U), $sghosts, $Charset) && ($status == "a" || $status == "t"))
{
  $CondForQuery .= "(address = ' *' OR room = '$R' OR room = '*' OR room_from='$R' OR room = 'Offline PMs')";
}
else
{
	$CondForQuery .= "(address = ' *' OR ((address = '$U' OR username = '$U') AND (room = '$R' OR room_from='$R' OR room = 'Offline PMs' OR username = 'SYS inviteTo')) OR ((room = '$R' OR room = 'Offline PMs') AND (address = '' OR username = '$U')) OR room = '*' OR (room = '$R' AND (username = 'SYS room' OR username = 'SYS image' OR username = 'SYS video' OR username = 'SYS utube' OR username LIKE 'SYS top%' OR username='SYS dice1' OR username='SYS dice2' OR username='SYS dice3')))";
}
$LimitForQuery = ($First ? " LIMIT $N" : "");

$DbLink->query("SELECT m_time, username, latin1, address, message FROM ".C_MSG_TBL." WHERE m_time > '$LastLoad' AND ".$CondForQuery." ORDER BY m_time DESC".$LimitForQuery);

// Format and store new messages
$Messages = Array();
if($DbLink->num_rows() > 0)
{
	$i = "1";
	$today = date('j', time() +  C_TMZ_OFFSET*60*60);
	while(list($Time, $User, $Latin1, $Dest, $Message) = $DbLink->next_record())
	{
		$Message = stripslashes($Message);
		$Message = str_replace("L_DEL_BYE",L_DEL_BYE,$Message);
		$Message = str_replace("L_REG_BRB",L_REG_BRB,$Message);
		$Message = str_replace("L_HELP_MR",sprintf(L_HELP_MR,$User),$Message);
		$Message = str_replace("L_HELP_MS",sprintf(L_HELP_MS,$User),$Message);
		$Message = str_replace("L_PRIV_PM",L_PRIV_PM,$Message);
		$Message = str_replace("L_PRIV_WISP",L_PRIV_WISP,$Message);
		$Message = str_replace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
		if ($Align == "right") $Message = str_replace("arrowr","arrowl",$Message);
		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
		{
			$Message = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$Message);
		}
		else $Message = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$Message);

		$Message = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$Message);
		if (C_USE_AVATARS)
		{
			// Gravatars initialization
			unset($email);
			unset($use_gravatar);
			unset($avatar);
			$DbAvatar = new DB;
			$DbAvatar->query("SELECT email, avatar, use_gravatar FROM ".C_REG_TBL." WHERE username = '$User'");
			if($DbAvatar->num_rows()!=0) list($email, $avatar, $use_gravatar) = $DbAvatar->next_record();
			if (empty($avatar) || $avatar == "") $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
			$DbAvatar->clean_results();
			// Gravatar mod added by Ciprian
			if ((ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && (!isset($use_gravatar) || $use_gravatar))) && !ereg("SYS ", $User))
			{
				if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
				else $local_avatar = 0;
				require("plugins/gravatars/get_gravatar.php");
			}
		}
		if(COLOR_NAMES)
		{
			$colorname_tag = "";
			$colorname_endtag = "";
			$colornamedest_tag = "";
			$colornamedest_endtag = "";
			$DbColor = new DB;
			if (isset($User))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$User'");
				list($perms_user,$colorname) = $DbColor->next_record();
				$DbColor->clean_results();
			}
			if (isset($Dest))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$Dest'");
				list($perms_dest,$colornamedest) = $DbColor->next_record();
				$DbColor->clean_results();
			}
			if(isset($colorname) && $colorname != "")
			{
				$colorname_tag = "<FONT color=".$colorname.">";
				unset($colorname);
			}
			elseif(C_ITALICIZE_POWERS)
			{
				if (($perms_user == "admin" && $User != C_BOT_NAME) || $perms_user == "topmod") $colorname_tag = "<FONT color=".COLOR_CA.">";
				elseif ($perms_user == "moderator") $colorname_tag = "<FONT color=".COLOR_CM.">";
				else $colorname_tag = "<FONT color=".COLOR_CD.">";
			}
			else
			{
				$colorname_tag = "<FONT color=".COLOR_CD.">";
			}
			if(isset($colornamedest) && $colornamedest != "")
			{
				$colornamedest_tag = "<FONT color=".$colornamedest.">";
				unset($colornamedest);
			}
			elseif (C_ITALICIZE_POWERS)
			{
				if (($perms_dest == "admin" && $Dest != C_BOT_NAME) || $perms_dest == "topmod") $colornamedest_tag = "<FONT color=".COLOR_CA.">";
				elseif ($perms_dest == "moderator") $colornamedest_tag = "<FONT color=".COLOR_CM.">";
				else $colornamedest_tag = "<FONT color=".COLOR_CD.">";
			}
			else
			{
				$colornamedest_tag = "<FONT color=".COLOR_CD.">";
			}
			$colorname_endtag = "<\/FONT>";
			$colornamedest_endtag = "<\/FONT>";
		}
		else
		{
			$colorname_tag = "";
			$colornamedest_tag = "";
			$colorname_endtag = "";
			$colornamedest_endtag = "";
		}
		// Skip the oldest message if the day seperator has been added
		if (isset($day_separator) && $First && $i == $N) continue;

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != $today)
		{
			$Messages[] = "<tr class=\"msg\"><td valign=\"top\"><SPAN CLASS=\"notify\" style=\"background-color:yellow;\">--------- ".L_TODAY_DWN." ---------<\/SPAN><\/td><\/tr><\/table>";
			$day_separator = "1";
		};

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
	$NewMsg = "<table cellspacing=0 cellpading=0><tr class=\"msg2\"><td nowrap=\"nowrap\" valign=\"top\">";
}
else
{
	$NewMsg = "<table cellspacing=0 cellpading=0><tr class=\"msg\"><td nowrap=\"nowrap\" valign=\"top\">";
}
//-------------------------------End HighLight Mod
		if ($ST == 1) $NewMsg .= "<SPAN CLASS=\"time\">".date("H:i:s", $Time + C_TMZ_OFFSET*60*60)."<\/SPAN><\/td><td nowrap=\"nowrap\" valign=\"top\">";
		// "Standard" messages
		if (substr($User,0,4) != "SYS ")
		{
			$Userx = $User;  // Avatar System insered only.
			if($User != stripslashes($U) && $User != $QUOTE_NAME)
			{
				if (C_ENABLE_PM && C_PRIV_POPUP && $allowpopupu)
				{
					$User = "<a onClick=\"window.parent.send_popup('/to ".special_char($User,$Latin1,1)."');\" title='".L_SEND_PM_1."' onMouseOver=\"window.status='".L_SEND_PM_2."'; return true\" CLASS=\"sender\">".$colorname_tag."[".special_char($User,$Latin1,0)."]".$colorname_endtag."<\/a>";
				}
				elseif (C_ENABLE_PM)
				{
					$User = "<a onClick=\"window.parent.userClick('".special_char($User,$Latin1,1)."',true);\" title='".L_SEND_PM_1."' onMouseOver=\"window.status='".L_SEND_PM_2."'; return true\" CLASS=\"sender\">".$colorname_tag."[".special_char($User,$Latin1,0)."]".$colorname_endtag."<\/a>";
				}
				else
				{
					$User = "<a onClick=\"window.parent.userClick('".special_char($User,$Latin1,1)."',false); return false\" title='".L_USE_NAME."' onMouseOver=\"window.status='".L_USE_NAME1."'; return true\" CLASS=\"sender\">".$colorname_tag."[".special_char($User,$Latin1,0)."]".$colorname_endtag."<\/a>";
				}
			}
			elseif($User == stripslashes($U))
			{
				$User = "<a onClick=\"window.parent.userClick('".special_char($User,$Latin1,1)."',false,'".special_char($U,$Latin1,1)."'); return false\" title='".L_USE_NAME."' onMouseOver=\"window.status='".L_USE_NAME1."'; return true\" CLASS=\"sender\">".$colorname_tag."[".special_char($User,$Latin1,0)."]".$colorname_endtag."<\/a>";
			}
			elseif($User == $QUOTE_NAME)
			{
				$User = "<a onClick=\"window.parent.userClick('".special_char($User,$Latin1,1)."',false); return false\" title='".L_USE_NAME."' onMouseOver=\"window.status='".L_USE_NAME1."'; return true\" CLASS=\"sender\">".$colorname_tag."[".special_char($User,$Latin1,0)."]".$colorname_endtag."<\/a>";
			}
			if($Dest != "" && $Dest != stripslashes($U) && $Dest != $QUOTE_NAME)
			{
				$Dest = htmlspecialchars(stripslashes($Dest));
				if (C_ENABLE_PM && C_PRIV_POPUP && $allowpopupu)
				{
					$Dest = "<a onClick=\"window.parent.send_popup('/to ".special_char($Dest,$Latin1,1)."');\" title='".L_SEND_PM_1."' onMouseOver=\"window.status='".L_SEND_PM_2."'; return true\" CLASS=\"sender\">".$colornamedest_tag."[".special_char($Dest,$Latin1,0)."]".$colornamedest_endtag."<\/a>";
				}
				elseif (C_ENABLE_PM)
				{
					$Dest = "<a onClick=\"window.parent.userClick('".special_char($Dest,$Latin1,1)."',true);\" title='".L_SEND_PM_1."' onMouseOver=\"window.status='".L_SEND_PM_2."'; return true\" CLASS=\"sender\">".$colornamedest_tag."[".special_char($Dest,$Latin1,0)."]".$colornamedest_endtag."<\/a>";
				}
				else
				{
					$Dest = "<a onClick=\"window.parent.userClick('".special_char($Dest,$Latin1,1)."',false); return false\" title='".L_USE_NAME."' onMouseOver=\"window.status='".L_USE_NAME1."'; return true\" CLASS=\"sender\">".$colornamedest_tag."[".special_char($Dest,$Latin1,0)."]".$colornamedest_endtag."<\/a>";
				}
			}
			elseif($Dest == stripslashes($U))
			{
				$Dest = "<a onClick=\"window.parent.userClick('".special_char($Dest,$Latin1,1)."',false,'".special_char($U,$Latin1,1)."'); return false\" title='".L_USE_NAME."' onMouseOver=\"window.status='".L_USE_NAME1."'; return true\" CLASS=\"sender\">".$colornamedest_tag."[".special_char($Dest,$Latin1,0)."]".$colornamedest_endtag."<\/a>";
			}
			if ($Dest != "") $Dest = "<\/B><BDO dir=\"${textDirection}\"><\/BDO><\/td><td valign=\"top\"><B>><\/B><\/td><td valign=\"top\"><B>".$colornamedest_tag."".$Dest;
			$Message = str_replace("</FONT>","<\\/FONT>",$Message);	// slashes the closing HTML font tag
 // Avatar System Start:
		    if (C_USE_AVATARS)
		    {
	       		$avatar = "<a onClick=\"window.parent.runCmd('whois','".special_char2(stripslashes($Userx),$Latin1)."'); return false\" onMouseOver=\"window.status='".L_PROFILE.".'; return true\" title=\"".L_PROFILE."\"><img align=\"center\" src=\"$avatar\" width=".C_AVA_WIDTH." height=".C_AVA_HEIGHT." alt=\"".L_PROFILE."\" border=0><\/a>";
				if ($ST != 1) $NewMsg .= "<\/td><td nowrap=\"nowrap\" valign=\"top\">".$avatar."<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colorname_tag."${User}${Dest}".$colornamedest_endtag."<\/B><BDO dir=\"${textDirection}\"><\/BDO><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
	   			else $NewMsg .= $avatar."<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colorname_tag."${User}${Dest}".$colornamedest_endtag."<\/B><BDO dir=\"${textDirection}\"><\/BDO><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
			}
			else
			{
						if ($ST != 1) $NewMsg .= "<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>${User}${Dest}<\/B><BDO dir=\"${textDirection}\"><\/BDO><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
						else $NewMsg .= "<B>${User}${Dest}<\/B><BDO dir=\"${textDirection}\"><\/BDO><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
			}
	    }
// Avatar System end.

		// "System" messages
		else
		{
			if ($User == "SYS announce")
			{
				if ($Message == 'L_RELOAD_CHAT') $Message = L_RELOAD_CHAT;
				$Message = "[".L_ANNOUNCE."]<BDO dir=\"${textDirection}\"><\/BDO><\/td><td CLASS=\"notify2\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
				$noteclass = "notify2";
			}
			elseif ($Dest == "*" || $Room == "*")
			{
				$Message = "[".L_ANNOUNCE."]<BDO dir=\"${textDirection}\"><\/BDO><\/td><td CLASS=\"notify\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
				$noteclass = "notify";
			}
			elseif ($User == "SYS topic")
			{
				$Message = "<nobr>".$Dest."&nbsp;".L_TOPIC."<\/nobr><BDO dir=\"${textDirection}\"><\/BDO><\/td><td CLASS=\"notify\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
				$noteclass = "notify";
			}
			elseif ($User == "SYS topic reset")
			{
				$Message = $Dest."&nbsp;".L_TOPIC_RESET."<\/td><\/tr><\/table>";
				$noteclass = "notify";
			}
			elseif ($User == "SYS image")
			{
				$imgSize = setImageSize($Message,MAX_PIC_SIZE);
				if($imgSize[0] == MAX_PIC_SIZE || $imgSize[1] == MAX_PIC_SIZE)
				$Resized = "<br \/>(".L_PIC_RESIZED." <B>".round($imgSize[0],-1)."<\/B>".((isset($imgSize[1]) && $imgSize[1] != "") ? " x <B>".round($imgSize[1],-1)."<\/B>" : "").")";
				else $Resized = '';
        		$NewMsg .= "<font class=\"notify\"><a href='".$Message."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_FULLSIZE_PIC).".'; return true\" title='".sprintf(L_CLICK,L_FULLSIZE_PIC)."' target=_blank>".L_PIC."<\/a> ".$Dest.":<\/font><\/td><td width=\"99%\" valign=\"top\"><a href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_FULLSIZE_PIC).".'; return true\" title='".sprintf(L_CLICK,L_FULLSIZE_PIC)."' target=_blank><img src=".$Message.((isset($imgSize[0]) && $imgSize[0] != "") ? " width=".$imgSize[0] : "").((isset($imgSize[1]) && $imgSize[1] != "") ? " height=".$imgSize[1] : "")." border=0 alt='".sprintf(L_CLICK,L_FULLSIZE_PIC)."'><\/a>".$Resized."<\/td><\/tr><\/table>";
      		}
			elseif ($User == "SYS utube")
			{
				include_once('./plugins/video/youtube.class.php');
				$jutjub = new YouTube();
				$youtube = $jutjub->EmbedVideo($Message,C_VIDEO_WIDTH,C_VIDEO_HEIGHT);
        		$NewMsg .= "<font class=\"notify\"><img src=\"images/icons/youtube.png\" border=0 alt='YouTube' title='YouTube'>&nbsp;<a href='".$Message."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title='".sprintf(L_CLICK,L_ORIG_VIDEO)."' target=_blank>".L_VIDEO."<\/a> ".$Dest.":<\/font><\/td><td width=\"99%\" valign=\"top\">".$youtube."<\/td><\/tr><\/table>";
      		}
			elseif ($User == "SYS video")
			{
				//require EmbeVi Class
				include_once('plugins/video/embevi.class.php');
				//instantiate EmbeVi class
				$embevi = new EmbeVi();
				$embevi->setAcceptShortUrl();
				$embevi->setProviderIconLocal();
				$embevi->setProviderIconUrl('images/icons/');
				$embevi->setAcceptExtendedSupport();
				if($embevi->parseUrl($Message))
				{
					//set embeded width
					$embevi->setWidth(C_VIDEO_WIDTH);
					//set embeded height
					$embevi->setHeight(C_VIDEO_HEIGHT);
					//get the icon from the provider info
					$ealt = $embevi->getEmbeddedInfo();
#					$eicon = $embevi->getEmbeddedIcon();
					$eicon = $embevi->getProviderImageIdentifier();
					//display video and embeded code
					$video = $embevi->getCode();
					$NewMsg .= "<font class=\"notify\"><img src=\"".$eicon."\" border=0 width='16' alt='&copy; ".$ealt."' title='&copy; ".$ealt."'>&nbsp;<a href='".$Message."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title='".sprintf(L_CLICK,L_ORIG_VIDEO)."' target=_blank>".L_VIDEO."<\/a> ".$Dest.":<\/font><\/td><td width=\"99%\" valign=\"top\">".$video."<\/td><\/tr><\/table>";
				}
      		}
			elseif ($User == "SYS room")
			{
		  		$Message = "<I>".ROOM_SAYS." <FONT class=\"notify\">".$Message."<\/FONT><\/FONT><\/I><\/td><\/tr><\/table>";
		 		$noteclass = "notify2";
      		}
			elseif (substr($User,0,8) != "SYS dice")
			{
				if ($Dest != "") $NewMsg .= "<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colornamedest_tag."[".htmlspecialchars(stripslashes($Dest))."]".$colornamedest_endtag."><\/B><BDO dir=\"${textDirection}\"><\/BDO> ";
				$Message = str_replace("$","\\$",$Message);	// avoid '$' chars in nick to be parsed below
				eval("\$Message = $Message;");
				$noteclass = "notify";
			};
		    if ($User != "SYS image" && $User != "SYS video" && $User != "SYS utube")
		    {
				if(substr($User,0,8) == "SYS dice")
				{
//					eval("\$Message = \"$Message\";");
					$NewMsg .="<\/td><td nowrap=\"nowrap\" valign=\"top\"><FONT class=\"notify\">".$Dest." ".DICE_RESULTS."<\/FONT><\/td><td nowrap=\"nowrap\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
				}
			    else
			    {
					$NewMsg .= "<\/td><td valign=\"top\"><SPAN CLASS=\"$noteclass\">".$Message."<\/SPAN><\/td><\/tr><\/table>";
				};
			}
		};
		$Messages[] = $NewMsg;
		if ($Time > $LastLoad) $LastLoad = $Time;
		$i++;
	};
$DbLink->clean_results();
}
else
{
	if ($First) $Messages[] = "<table cellspacing=0 cellpading=0><tr><td valign=\"top\" style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_NO_MSG."<\/SPAN><\/td><\/tr><\/table>";
};


// ** Define the URL query part of the http refresh header **
if ($First)
{
	$Refresh = str_replace("First=1","First=0", (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING"))."&LastLoad=${LastLoad}&LastCheck=${LastCheck}";
}
else
{
	$Refresh = ereg_replace("&LastLoad=([0-9]+)&LastCheck=([0-9]+)","&LastLoad=".$LastLoad."&LastCheck=".$LastCheck, (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING"));
};


// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($textDirection); ?>">
<HEAD>
<TITLE>Loader hidden frame</TITLE>
<?php
if ($D > 0)
	echo('<meta HTTP-EQUIV="Refresh" CONTENT="' . $D . '; URL=loader.php?' . $Refresh . '">' . "\n");
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
// Update the time values for last check and last loaded message in the main page
window.parent.time4LastLoadedMsg = "<?php echo($LastLoad); ?>";
window.parent.time4LastCheckedUser = "<?php echo($LastCheck); ?>";

<?php
// ** Refresh users frame if necessary **
if ($First || $Users_Refresh)
{
	?>
	window.parent.frames['users'].window.location.replace("usersH.php?<?php echo( (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING")); ?>");
	<?php
};


// ** Refresh messages frame **

// Set the stylesheet for the messages frame at first load
if ($First)
{
	// For translations with an explicit charset (not the 'x-user-defined' one)
	if (!isset($FontName)) $FontName = "";
	?>
	with (window.parent.frames['messages'].window.document)
	{
		open("text/html", "replace");
		write("<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">");
		write("<HTML dir=\"<?php echo($textDirection); ?>\">\n<HEAD>\n");
		write("<TITLE>Dynamic messages frame<\/TITLE>\n");
 		write("<LINK REL=\"stylesheet\" HREF=\"<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>\" TYPE=\"text/css\">\n");
		write("<\/HEAD>\n\n");
		write("<BODY CLASS=\"mainframe\">\n");
	};
	<?php
};

// Send new message(s) if there is at least one, else an empty string to ensure the message
// frame isn't closed because of too long inactive delay
$message_nb = count($Messages);
for ($i = 0; $i < $message_nb; $i++)
{
// Bob Dickow mod for /away command - modified by Ciprian for Plus behaviour
           $xxx = $message_nb-1-$i;
           if (($xxx < 2) AND (substr_count($Messages[$xxx],C_UPDTUSRS)>0))
           {
              ?>
                 window.parent.frames['users'].window.location.replace("usersH.php?<?php echo((isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING")); ?>");
              <?php
           }
// end Bob Dickow mod for /away command - modified by Ciprian for Plus behaviour.
// Bob Dickow mod: only buzz or 'hello' on last displayed message.
// Revised version 1.0 April 2003. Improved, compatible with /away.
           $xxx = $message_nb-1-$i;
// Commented out by Ciprian because of the change of /buzz command (clean.lib.php does the job):
//           if ($xxx <> 0) {
//            $Messages[$xxx] = str_replace(L_BUZZ_SND,"",$Messages[$xxx]);
//           };
// Altered by ciprian for Notify & Welcome feature
if (ALLOW_ENTRANCE_SOUND == "3" && WELCOME_SOUND)
{
 	$DbLink->query("SELECT address, message FROM ".C_MSG_TBL." WHERE username = 'SYS welcome' AND address = '$U' ORDER BY m_time DESC LIMIT 1");
	if($DbLink->num_rows() > 0)
	{
    if ($xxx = 1)
    {
			$tmpstr = stripslashes(L_ENTER_SND);
			$Messages[$xxx] = str_replace($tmpstr,"",$Messages[$xxx]);
    };
	}
}
if ($xxx > 1)
{
	$tmpstr = stripslashes(L_ENTER_SND);
	$Messages[$xxx] = str_replace($tmpstr,"",$Messages[$xxx]);
	$tmpstr1 = stripslashes(L_WELCOME_SND);
	$Messages[$xxx] = str_replace($tmpstr1,"",$Messages[$xxx]);
};
// end Bob Dickow mod for buzzes and hellos.
	// doubles backslashes except the ones for closing HTML tags
	$ToSend = ereg_replace("([^<]+)[\]","\\1\\\\",$Messages[$message_nb-1-$i]);
	// slashes the quotes that should be displayed
	$ToSend = str_replace("\"","\\\"",$ToSend);
	?>
	window.parent.frames['topic'].window.location.replace("topic.php?<?php echo( (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING")); ?>");
	window.parent.frames['messages'].window.document.write("<?php echo($ToSend); ?>\n");
	<?php
};
if ($message_nb < 1)
{
	?>
	window.parent.frames['messages'].window.document.write("");
	<?php
}
else
{
	?>
	// Scrolls to the bottom of the message frame
	with (window.parent.frames['messages'].window)
	{
		if (typeof(scrollBy) != 'undefined')
		{
			scrollBy(0, 65000);
			scrollBy(0, 65000);
		}
		else if (typeof(scroll) != 'undefined')
		{
			scroll(0, 65000);
			scroll(0, 65000);
		};
	}
	<?php
};
?>
// -->
</SCRIPT>
</HEAD>
<BODY onUnload="if (typeof(window.parent.frames['exit']) != 'undefined' && typeof(window.parent.leaveChat) != 'undefined' && !window.parent.leaveChat) window.parent.Connecting(window.parent.connect + 1);">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
if (typeof(window.parent.frames['exit']) != 'undefined'
	&& typeof(window.parent.ConnectDone) != 'undefined')
	window.parent.ConnectDone();
// -->
</SCRIPT>
<?php
// Private Message Popup mod by Ciprian
if (C_ENABLE_PM)
{
	if (!isset($allowpopupu))
	{
		$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username = '$U'");
		if($DbLink->num_rows() != 0) list($allowpopupu) = $DbLink->next_record();
		else $allowpopupu = 0;
		$DbLink->clean_results();
	}
	if (substr($User,0,4) != "SYS ")
	{
		$who = "$L&U=".urlencode(stripslashes($U))."&R=".urlencode(stripslashes($R));
		$DbLink->query("SELECT username, address, room, pm_read FROM ".C_MSG_TBL." WHERE (room = '$R' OR room = 'Offline PMs') AND address = '$U' AND pm_read LIKE 'New%' ORDER BY username AND m_time DESC LIMIT 1");
		if($DbLink->num_rows() > 0)
		{
			$NewPMs = $DbLink->num_rows();
			list($Sender,$Destin,$Room,$Read) = $DbLink->next_record();
			$DbLink->clean_results();
			if (($Read == "New" && ($R = $Room || $Room == "Offline PMs") && $U = $Destin && $U != $Sender) || ($Read == "Neww" && ($R = $Room || $Room == "Offline PMs") && $U = $Destin && $U != $Sender))
			{
				// add this for /away command modification by R Dickow (adapted by Ciprian for priv popup):
				$DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$Destin' AND awaystat='0'");
				if($DbLink->num_rows() == 1 && ($allowpopupu || $Room == "Offline PMs"))
				{
					$height = ($NewPMs == "1" ? 320 : 440);
					?>
						<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
						<!--
						if ((!window.parent.is_priv_popup || window.parent.is_priv_popup.closed) && (!window.parent.is_send_popup || window.parent.is_send_popup.closed))
						{
							if (window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].value == '') window.parent.is_priv_popup = window.open("priv_popup.php?L=<?php echo($who); ?>","priv_popup","width=430,height=<?php echo($height) ?>,scrollbars=yes,resizable=no,status=yes");
						};
						// -->
						</SCRIPT>
					<?php
					$IsPopup = true;
				}
				$DbLink->clean_results();
			}
		}
	}
}

// Random Quote mod by Ciprian
if (C_QUOTE)
{
	if (!C_QUOTE_TIME) settype($quotetime = 60, "integer");
	else settype($quotetime = C_QUOTE_TIME*60, "integer");
	if (time() % $quotetime < C_MSG_REFRESH*2)
	{
		$quotecolor = C_QUOTE_COLOR; // change to the font size of your choice
		$quotes = file(C_QUOTE_PATH);
		$quote = rand(0, sizeof($quotes)-1);
		$quotetext = "<div class=\"quote\">";
		if($quotecolor != "") $quotetext .= "<font color=\"$quotecolor\">";
		$quotetext .= $quotes[$quote];
		if($quotecolor != "") $quotetext .= "</font>";
		$quotetext .= "</div>";
		$quotetext = ereg_replace("\r", "", $quotetext);
		$quotetext = ereg_replace("\n", "", $quotetext);
		if ($R != "1")
		{
		$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE username='$QUOTE_NAME' AND room = '$R' AND m_time > ".(time() - $quotetime)." ORDER BY m_time DESC LIMIT 1");
			if ($DbLink->num_rows() == 0)
			{
				$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '$QUOTE_NAME', '', ".time().", '', '$quotetext', '', '')");
			}
		}
	}
}
if(C_CHAT_BOOT)
{
	$CondForQueryM = "(username='$U' OR message='stripslashes(sprintf(L_ENTER_ROM, \"".$U."\"))' OR message='stripslashes(sprintf(L_ENTER_ROM_NOSOUND, \"".$U."\"))' OR ((username='SYS welcome' OR username LIKE 'SYS top%' OR username='SYS room' OR username='SYS image' OR username='SYS video' OR username='SYS utube' OR username='SYS dice1' OR username='SYS dice2' OR username='SYS dice3' OR username='SYS away') AND address='$U'))";
	$DbLink->query("SELECT type,m_time,room FROM ".C_MSG_TBL." WHERE ".$CondForQueryM." ORDER BY m_time DESC LIMIT 1");
	list($m_type, $m_time, $m_room) = $DbLink->next_record();
	$DbLink->clean_results();
	$CondForQueryU = "status!='a' AND status!='t' AND status!='m' AND username='$U' AND username!='".C_BOT_NAME."' AND awaystat='0' AND (u_time > ".($m_time + C_USR_DEL * 60)." OR (status ='k' AND u_time <  ".(time() - 20)."))".$Hide."";
	$DbLink->query("DELETE FROM ".C_USR_TBL." WHERE ".$CondForQueryU."");
	$CleanUsrTbl = ($DbLink->affected_rows() > 0);
	if($DbLink->affected_rows() > 0)
	{
		// Ghost Control mod by Ciprian
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
		}
	 	if (($sghosts != "" && ghosts_in(stripslashes($U), $sghosts, $Charset)) || (C_HIDE_ADMINS && ($status == "a" || $status == "t")) || (C_HIDE_MODERS && $status == "m")) {}
		else $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('".$m_type."', '".$m_room."', 'SYS exit', '', ".time().", '', 'sprintf(L_BOOT_ROM, \"$U\")', '', '')");
		if(C_EN_STATS)
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$m_room' AND username='$U' AND last_away!='0'");
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='' WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$m_room' AND username='$U' AND last_in!='0'");
		}
	$DbLink->clean_results();
	$botpath = "botfb/".$U;         // file is in DIR "botfb" and called "username"
	if (file_exists($botpath)) unlink($botpath); // checks to see if user file exists.
	                                     // if it does delete it.
	$botpathbot = "botfb/".$U.".txt";   // file is in DIR "botfb" and called "username.txt"
	if (file_exists($botpathbot)) unlink($botpathbot); // checks to see if user file exists.
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
		if (window.parent.frames['loader'] && !window.parent.frames['loader'].closed)
		{
			if (typeof(window.parent.leaveChat) != 'undefined') window.parent.leaveChat = true;
			window.parent.frames['loader'].close();
		};
		window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&EN=$T&BT=1"); ?>';
	// -->
	</SCRIPT>
	<?php
	exit();
	}
}
// **	Ensures the user has no restrictions to the room he chooses to enter, create or join - Rooms Restriction mod by Ciprian
	if ($join_room == "*" || $perms == "admin" || $perms == "topmod" || ($perms == "moderator" && (room_in(stripslashes($R), $rooms, $Charset) || room_in("*", $rooms, $Charset)))) $restriction = 0;
	elseif ($R == ROOM1 && $EN_ROOM1 && $RES_ROOM1 && $join_room != "ROOM1") $restriction = 1;
	elseif ($R == ROOM2 && $EN_ROOM2 && $RES_ROOM2 && $join_room != "ROOM2") $restriction = 1;
	elseif ($R == ROOM3 && $EN_ROOM3 && $RES_ROOM3 && $join_room != "ROOM3") $restriction = 1;
	elseif ($R == ROOM4 && $EN_ROOM4 && $RES_ROOM4 && $join_room != "ROOM4") $restriction = 1;
	elseif ($R == ROOM5 && $EN_ROOM5 && $RES_ROOM5 && $join_room != "ROOM5") $restriction = 1;
	if ($restriction)
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('".$m_type."', '".$m_room."', 'SYS exit', '', ".time().", '', 'sprintf(L_RESTRICTED_ROM, \"$U\")', '', '')");
		if(C_EN_STATS)
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$m_room' AND username='$U' AND last_away!='0'");
			$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='' WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$m_room' AND username='$U' AND last_in!='0'");
		}
	$DbLink->clean_results();
	setcookie("CookieRoom", '', time());        // cookie expires in one year
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
		if (window.parent.frames['loader'] && !window.parent.frames['loader'].closed)
		{
			if (typeof(window.parent.leaveChat) != 'undefined') window.parent.leaveChat = true;
			window.parent.frames['loader'].close();
		};
		window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&EN=$T&RES=1"); ?>';
	// -->
	</SCRIPT>
	<?php
	exit();
	}
?>
</BODY>
</HTML>