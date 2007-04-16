<?php
// Get the names and values for vars sent to this script
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
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
if (isset($HTTP_COOKIE_VARS["CookieFontSize"])) $FontSize = $HTTP_COOKIE_VARS["CookieFontSize"];

header("Content-Type: text/html; charset=${Charset}");

// Avoid server configuration for magic quotes
set_magic_quotes_runtime(0);

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset == "iso-8859-1");
function special_char($str,$lang,$slash_on)
{
	$str = ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
	return ($slash_on ? addslashes($str) : $str);
};

function special_char2($str,$lang)
{
	return ($lang ? htmlentities(addslashes($str)) : htmlspecialchars(addslashes($str)));
}

// Text direction
$textDirection = ($Charset == "windows-1256") ? "RTL" : "LTR";

function setImageSize($image_file) {

require("./config/config.lib.php");
$maxSize = MAX_PIC_SIZE;

$image_size = getimagesize($image_file,&$image_info);
$width = $image_size[0];
$height = $image_size[1];

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

$DbLink = new DB;
	$DbLink->query("SELECT perms,rooms,allowpopup FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	$reguser = ($DbLink->num_rows() != 0);
	if ($reguser) list($perms, $rooms, $allowpopup) = $DbLink->next_record();
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
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1,1)."\")', '', '')");
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
	$DbLink->query("SELECT perms,rooms,allowpopup,avatar FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	$reguser = ($DbLink->num_rows() != 0);
	if ($reguser) list($perms, $rooms, $allowpopup, $avatar) = $DbLink->next_record();
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
			case 'moderator':
				$roomsTab = explode(",",$rooms);
				for (reset($roomsTab); $room_name=current($roomsTab); next($roomsTab))
				{
					if (strcasecmp(stripslashes($R), $room_name) == 0)
					{
						$status = "m";
						break;
					};
				};
			default:
				$status = "r";
		};
		$DbLink->query("INSERT INTO ".C_USR_TBL." VALUES ('$R', '$U', '$Latin1', ".time().", '$status', '$IP', '0', ".time().")");
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
	$DbLink->query("SELECT DISTINCT m_time FROM ".C_MSG_TBL." WHERE m_time > '$LastCheck' AND username IN ('SYS enter','SYS exit','SYS promote','SYS demote','SYS delreg')".$QueryRoom."ORDER BY m_time DESC LIMIT 1");
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
$CondForQuery .= "(address = ' *' OR ((address = '$U' OR username = '$U') AND (room = '$R' OR room_from='$R' OR room = 'Offline PMs' OR username = 'SYS inviteTo')) OR ((room = '$R' OR room = 'Offline PMs') AND (address = '' OR username = '$U')) OR room = '*' OR (room = '$R' AND (username = 'SYS room' OR username = 'SYS image' OR username LIKE 'SYS top%' OR username='SYS dice1' OR username='SYS dice2' OR username='SYS dice3')))";
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
		$Message = eregi_replace('target="_blank"></a>','target="_blank">'.L_CLICK.'</a>',$Message);
		if (C_USE_AVATARS)
		{
			$DbAvatar = new DB;
			$DbAvatar->query("SELECT avatar FROM ".C_REG_TBL." WHERE username = '$User'");
			if($DbAvatar->num_rows()!=0) list($avatar) = $DbAvatar->next_record();
			else $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
			$DbAvatar->clean_results();
		}
		if(COLOR_NAMES)
		{
			$DbColor = new DB;
			$DbColor->query("SELECT colorname FROM ".C_REG_TBL." WHERE username = '$User'");
			if($DbColor->num_rows()!=0)
			{
					list($colorname) = $DbColor->next_record();
					$colorname_tag = "<FONT color=".$colorname.">";
				  $colorname_endtag = "<\/FONT>";
					$DbColor->clean_results();
			}
			else
			{
				$colorname_tag = "<FONT color=".COLOR_CD.">";
			  $colorname_endtag = "<\/FONT>";
			}
			$DbColor->query("SELECT colorname FROM ".C_REG_TBL." WHERE username = '$Dest'");
			if($DbColor->num_rows()!=0)
			{
					list($colornamedest) = $DbColor->next_record();
					$colornamedest_tag = "<FONT color=".$colornamedest.">";
					$colornamedest_endtag = "<\/FONT>";
					$DbColor->clean_results();
			}
			else
			{
				$colornamedest_tag = "<FONT color=".COLOR_CD.">";
				$colornamedest_endtag = "<\/FONT>";
			}
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
			if($User != stripslashes($U))
			{
				if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopup || $status = "u"))
				{
					$User = "<A HREF=\"#\" onClick=\"window.parent.send_popup('/to ".special_char($User,$Latin1,1)."');\" title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\" CLASS=\"sender\">".$colorname_tag."".special_char($User,$Latin1,0)."".$colorname_endtag."<\/A>";
				}
				elseif (C_ENABLE_PM)
				{
					$User = "<A HREF=\"#\" onClick=\"window.parent.userClick('".special_char($User,$Latin1,1)."',true);\" title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\" CLASS=\"sender\">".$colorname_tag."".special_char($User,$Latin1,0)."".$colorname_endtag."<\/A>";
				}
				else
				{
					$User = "<A HREF=\"#\" onClick=\"window.parent.userClick('".special_char($User,$Latin1,1)."',false); return false\" title=\"Use this name\" onMouseOver=\"window.status='Reffer to this username.'; return true\" CLASS=\"sender\">".$colorname_tag."".special_char($User,$Latin1,0)."".$colorname_endtag."<\/A>";
				}
			}
			if($Dest != "" && $Dest != stripslashes($U))
			{
				$Dest = htmlspecialchars(stripslashes($Dest));
				if (C_ENABLE_PM && C_PRIV_POPUP && ($allowpopup || $status = "u"))
				{
					$Dest = "<A HREF=\"#\" onClick=\"window.parent.send_popup('/to ".special_char($Dest,$Latin1,1)."');\" title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\" CLASS=\"sender\">".$colornamedest_tag."".special_char($Dest,$Latin1,0)."".$colornamedest_endtag."<\/A>";
				}
				elseif (C_ENABLE_PM)
				{
					$Dest = "<A HREF=\"#\" onClick=\"window.parent.userclick('".special_char($Dest,$Latin1,1)."',true);\" title=\"Send PM\" onMouseOver=\"window.status='Send a Private message.'; return true\" CLASS=\"sender\">".$colornamedest_tag."".special_char($Dest,$Latin1,0)."".$colornamedest_endtag."<\/A>";
				}
				else
				{
					$Dest = "<A HREF=\"#\" onClick=\"window.parent.userClick('".special_char($Dest,$Latin1,1)."',false); return false\" title=\"Use this name\" onMouseOver=\"window.status='Reffer to this username.'; return true\" CLASS=\"sender\">".$colornamedest_tag."".special_char($Dest,$Latin1,0)."".$colornamedest_endtag."<\/A>";
				}
			}
			if ($Dest != "") $Dest = "]<BDO dir=\"${textDirection}\"><\/BDO>".$colorname_endtag."<\/B><\/td><td valign=\"top\"><B>&gt;<\/B><\/td><td valign=\"top\"><B>".$colornamedest_tag."[".$Dest;
			$Message = str_replace("</FONT>","<\\/FONT>",$Message);	// slashes the closing HTML font tag
 // Avatar System Start:
      if (C_USE_AVATARS)
      {
          if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
       		$avatar = "<a href=\"#\" onClick=\"window.parent.runCmd('whois','".special_char2(stripslashes($Userx),$Latin1)."'); return false\" onMouseOver=\"window.status='".L_PROFILE.".'; return true\" title=\"".L_PROFILE."\"><img align=\"center\" src=\"$avatar\" width=".C_AVA_WIDTH." height=".C_AVA_HEIGHT." alt=\"".L_PROFILE."\" border=0><\/a>";
					if ($ST != 1) $NewMsg .= "<\/td><td nowrap=\"nowrap\" valign=\"top\">".$avatar."<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colorname_tag."[${User}${Dest}]".$colornamedest_endtag."<BDO dir=\"${textDirection}\"><\/BDO><\/B><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
   				else $NewMsg .= $avatar."<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colorname_tag."[${User}${Dest}]".$colornamedest_endtag."<BDO dir=\"${textDirection}\"><\/BDO><\/B><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
	    }
      else
      {
					if ($ST != 1) $NewMsg .= "<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colorname_tag."[${User}${Dest}]".$colornamedest_endtag."<BDO dir=\"${textDirection}\"><\/BDO><\/B><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
					else $NewMsg .= "<B>".$colorname_tag."[${User}${Dest}]".$colornamedest_endtag."<BDO dir=\"${textDirection}\"><\/BDO><\/B><\/td><td width=\"99%\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
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
				$Message = "<nobr>".$Dest."&nbsp;".L_TOPIC."<BDO dir=\"${textDirection}\"><\/BDO><\/nobr><\/td><td CLASS=\"notify\" valign=\"top\">".$Message."<\/td><\/tr><\/table>";
				$noteclass = "notify";
			}
			elseif ($User == "SYS topic reset")
			{
				$Message = "".$Dest."&nbsp;".L_TOPIC_RESET."<\/td><\/tr><\/table>";
				$noteclass = "notify";
			}
			elseif ($User == "SYS image")
			{
				$imgSize = setImageSize($Message);
				$Pic = L_PIC;
				$maxSize = MAX_PIC_SIZE;
				if($imgSize[0] == $maxSize || $imgSize[1] == $maxSize)
				$Resized = "<br \/>(".L_PIC_RESIZED." <B>".round($imgSize[0],-1)."<\/B> x <B>".round($imgSize[1],-1)."<\/B>)";
				else $Resized = '';
        $NewMsg .= "$Pic"." <B>".$Dest."<\/B>:<\/td><td width=\"99%\" valign=\"top\"><A href=".$Message." onMouseOver=\"window.status='Click to open the full size picture.'; return true\" title=\"Click to open the full size picture\" target=_blank><img src=".$Message." width=".$imgSize[0]." height=".$imgSize[1]." border=0 alt=\"Click to open the full size picture\"><\/A>".$Resized."<\/td><\/tr><\/table>";
      }
			elseif ($User == "SYS room")
			{
        $Message = "<I>".ROOM_SAYS." <FONT class=\"notify\">".$Message."<\/FONT><\/FONT><\/I><\/td><\/tr><\/table>";
        $noteclass = "notify2";
      }
			else
			{
				if ($Dest != "" && substr($User,0,8) != "SYS dice") $NewMsg .= "<\/td><td nowrap=\"nowrap\" valign=\"top\"><B>".$colornamedest_tag."[".htmlspecialchars(stripslashes($Dest))."]<BDO dir=\"${textDirection}\"><\/BDO>".$colornamedest_endtag."><\/B> ";
				$Message = str_replace("$","\\$",$Message);	// avoid '$' chars in nick to be parsed below
				eval("\$Message = $Message;");
				$noteclass = "notify";
			};
	    if ($User != "SYS image")
	    {
				if(substr($User,0,8) == "SYS dice")
				{
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
	if ($First) $Messages[] = "<table cellspacing=0 cellpading=0><tr><td valign=\"top\"><SPAN CLASS=\"notify\"  style=\"background-color:yellow;\">".L_NO_MSG."<\/SPAN><\/td><\/tr><\/table>";
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
// Bob Dickow mod for /away command
           $xxx = $message_nb-1-$i;
           if (($xxx < 2) AND (substr_count($Messages[$xxx],C_UPDTUSRS)>0))
           {
              ?>
                 window.parent.frames['users'].window.location.replace("usersH.php?<?php echo((isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING")); ?>");
              <?php
           }
// end Bob Dickow mod for /away command.
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
};
// end Bob Dickow mod for buzzes and hellos.
	// doubles backslashes except the ones for closing HTML tags
	$ToSend = ereg_replace("([^<]+)[\]","\\1\\\\",$Messages[$message_nb-1-$i]);
	// slashes the quotes that should be displayed
	$ToSend = str_replace("\"","\\\"",$ToSend);
	?>
	window.parent.frames['banner'].window.location.replace("banner.php?<?php echo( (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING")); ?>");
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
$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username = '$U'");
if($DbLink->num_rows() != 0) list($allowpopupu) = $DbLink->next_record();
else $allowpopupu = 1;
$DbLink->clean_results();
	if (substr($User,0,4) != "SYS " && C_ENABLE_PM && C_PRIV_POPUP && $allowpopupu)
	{
		$DbLink->query("SELECT username, address, room, pm_read FROM ".C_MSG_TBL." WHERE (room = '$R' OR room = 'Offline PMs') AND address = '$U' AND (pm_read = 'New' OR pm_read = 'Neww') ORDER BY m_time DESC");
		if($DbLink->num_rows() > 0)
		{
			$NewPMs = $DbLink->num_rows();
			list($Sender,$Destin,$Room,$Read) = $DbLink->next_record();
			$DbLink->clean_results();
			if (($Read == "New" && ($R = $Room || $R == "Offline PMs") && $U = $Destin && $U != $Sender) || ($Read == "Neww" && ($R = $Room || $R == "Offline PMs") && $U = $Destin && $U != $Sender))
			{
					// add this for /away command modification by R Dickow (adapted by Ciprian for priv popup):
					$DbLink = new DB;
					$DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$Destin' AND awaystat!='0'");
					if($DbLink->num_rows() == 0)
					{
						$height = ($NewPMs == "1" ? 320 : 440);
						?>
								<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
								<!--
								if ((!window.parent.is_priv_popup || window.parent.is_priv_popup.closed) && (!window.parent.is_send_popup || window.parent.is_send_popup.closed))
								{
								if (window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].value == '') window.parent.is_priv_popup = window.open("priv_popup.php","priv_popup","width=430,height=<?php echo($height) ?>,scrollbars=yes,resizable=no");
								};
								// -->
								</SCRIPT>
						<?php
						$IsPopup = true;
					}
		    $DbLink->clean_results();
			}
		}
	$DbLink->close();
	}
?>
</BODY>
</HTML>