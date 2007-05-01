<?php

$ShowPrivate = "0";     // 1 to display users even if they are in a private room, 0 else
$DisplayUsers = "1";    // 0 to display only the number of connected users
                        // 1 to display a list of users
$N = 50;									//Set the last number of messages to be displayed
$Type = " AND type='1'";	//This is to display only the public rooms
//$Type = "";							//This is to display either public or private rooms

if (isset($HTTP_COOKIE_VARS["CookieUsername"])) $U = urldecode($HTTP_COOKIE_VARS["CookieUsername"]);
if (!isset($L) && isset($HTTP_COOKIE_VARS["CookieLang"])) $L = $HTTP_COOKIE_VARS["CookieLang"]; 
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $status = $HTTP_COOKIE_VARS["CookieStatus"];
if (!isset($U)) $U = "Guest";

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

// Added for Skin mod
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $statusu = $HTTP_COOKIE_VARS["CookieStatus"];
if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);
if (!isset($R)) $skin == "style1";

require("config/config.lib.php");
require("./${ChatPath}lib/release.lib.php");
if (!isset($L)) $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");
require("lib/connected_users.lib.php");


if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $statusu == "a"))
{
// Avoid server configuration for magic quotes
set_magic_quotes_runtime(0);

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset == "iso-8859-1");
function special_char($str,$lang)
{
	return ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
}

// ** Get messages **

// Define the SQL query (depends on values for ignored users list and on whether to display
// notification messages or not

$CondForQuery	= "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";

$DbLink1 = new DB;
$DbLink1->query("SELECT m_time, room, username, latin1, address, message FROM ".C_MSG_TBL." WHERE ".$CondForQuery.$Type." ORDER BY m_time DESC LIMIT $N");

// Format and display new messages
if($DbLink1->num_rows() > 0)
{
	$MessagesString = "";
	while(list($Time, $Room, $User, $Latin1, $Dest, $Message) = $DbLink1->next_record())
	{
		$Message = stripslashes($Message);
		$NewMsg = "<tr align=texttop valign=top>";
		$NewMsg .= "<td width=1% nowrap=\"nowrap\">".date("d-M, H:i:s", $Time + C_TMZ_OFFSET*60*60)."</td><td width=1% nowrap=\"nowrap\">".$Room."</td>";
		if ($Dest != " *" && $User != "SYS room" && $User != "SYS image" && $User != "SYS topic" && $User != "SYS topic reset" && substr($User,0,8) != "SYS dice")
		{
			$User = special_char($User,$Latin1);
			if ($Dest != "") $Dest = "]>[".htmlspecialchars(stripslashes($Dest));
			$NewMsg .= "<td width=1% nowrap=\"nowrap\"><B>[${User}${Dest}]</B></td><td>$Message</td>";
		}
		if ($User == "SYS image")
		{
        $NewMsg .= "<td width=1% nowrap=\"nowrap\"><B>[${Dest}]</B></td><td>".L_PIC." ${Dest}: <A href=".$Message." onMouseOver=\"window.status='Click to open the full size picture.'; return true\" title=\"Click to open the full size picture\" target=_blank>".$Message."</A></td>";
    }
		if ($User == "SYS announce")
		{
			if ($Message == 'L_RELOAD_CHAT') $Message = L_RELOAD_CHAT;
			$NewMsg .= "<td colspan=2><SPAN CLASS=\"notify2\">[".L_ANNOUNCE."] $Message</SPAN></td>";
		}
		if ($User == "SYS room")
		{
 			$NewMsg .= "<td width=1% nowrap=\"nowrap\"><B>[${Dest}]</B></td><td><FONT class=\"notify2\"><I>".ROOM_SAYS."<FONT class=\"notify\">".$Message."</FONT></FONT></I></td>";
    }
		if ($User == "SYS topic")
		{
 			$NewMsg .= "<td colspan=2><FONT class=\"notify\">".$Dest." ".L_TOPIC." ".$Message."</FONT></td>";
		}
		if ($User == "SYS topic reset")
		{
 			$NewMsg .= "<td colspan=2><FONT class=\"notify\">".$Dest." ".L_TOPIC_RESET." ".$Message."</FONT></td>";
		}
		if (substr($User,0,8) == "SYS dice")
		{
 			$NewMsg .= "<td colspan=2 valign=\"top\"><FONT class=\"notify\">".$Dest." ".DICE_RESULTS."</FONT> ".$Message."</td>";
		}

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != date("j", time() +  C_TMZ_OFFSET*60*60))
		{
			$day_separator = "<td valign=top colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></td>";
		};

			$MessagesString .= ((isset($day_separator) && $day_separator != "") ? $day_separator."" : "").$NewMsg."</tr>";
			if (isset($day_separator)) $day_separator = "";		// Today separator already printed
	};
}
else
{
	$MessagesString = "<td><SPAN CLASS=\"notify\" style=\"background-color:yellow;\">".L_NO_MSG."</SPAN></td>";
};


$DbLink1->clean_results();
$DbLink1->close();
$CleanUsrTbl = 1;

if (isset($MessagesString) && $MessagesString != "")
{
// Special cache instructions for IE5+
header("Cache-Control: public");
header("Content-Type: text/html; charset=${Charset}");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">
<HEAD>
<META HTTP-EQUIV="Refresh" CONTENT="<?php echo($D); ?>" CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(APP_NAME." - ".stripslashes($U)." is lurking - ".date("r")); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>
	<BODY>
<hr />
<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 CLASS="table">
<TR>
	<TD ALIGN=CENTER colspan=3>
		<?php
		display_connected($ShowPrivate,$DisplayUsers,$NbUsers,($NbUsers != 1 ? $NbUsers." ".NB_USERS_IN : USERS_LOGIN),NO_USER,$DbLink);
		?>
	</TD>
</TR>
</TABLE><br />
<?php
	include("lib/useronline.lib.php");
	echo("<hr />");
	echo("<TABLE BORDER=1 WIDTH=100% CELLSPACING=0 CELLPADDING=0 CLASS=table>".$MessagesString."</table>");
	unset($MessagesString);
	?>
	</BODY>
	</HTML>
	<?php
	exit;
}
}
else
{
?>
<html>
<head>
<title>Invalid address - Lurking feature disabled</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</head>

<body class="frame">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center><font size="+2"><b>You don't have access to this file.<br>Lurking feature has been disabled<br>Press <a href=./>here</a> to go to the index page or just wait...</b><font>
<br /><br /><br /><br>Hacking attempt! Redirection to the index page in 5 seconds.</center>
<meta http-equiv="refresh" content="5; url=./">
</body>
</html>
<?php
}
?>