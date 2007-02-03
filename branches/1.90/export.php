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
if (isset($L) && !is_dir('./localization/'.$L)) exit();

require("config/config.lib.php");
require("localization/".$L."/localized.chat.php");
require("lib/database/".C_DB_TYPE.".lib.php");
require("lib/release.lib.php");
require("lib/clean.lib.php");

// Avoid server configuration for magic quotes
set_magic_quotes_runtime(0);

// Get IP address and check for hackers
require("./lib/get_IP.lib.php");
$DbLink = new DB;
$DbLink->query("SELECT count(*) FROM ".C_USR_TBL." WHERE username = '$U' AND ip = '$IP' LIMIT 1");
list($isNotHack) = $DbLink->next_record();
if (!$isNotHack)
{
	$DbLink->close();
	exit();
}
else
{
	$DbLink->clean_results();
}

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset == "iso-8859-1");
function special_char($str,$lang)
{
	return ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
}

// ** Get messages **

// Define the SQL query (depends on values for ignored users list and on whether to display
// notification messages or not

$CondForQuery = "username NOT LIKE 'SYS %' AND ";
if (isset($Ign))
{
	$IgnoreList = "'".str_replace(",","','",addslashes(urldecode($Ign)))."'";
	$CondForQuery .= "username NOT IN (${IgnoreList}) AND ";
};
$CondForQuery .= "(address = ' *' OR (room = '$R' AND (address IN ('$U','') OR username = '$U')))";

$LimitForQuery = (isset($Limit) && $Limit != "") ? " LIMIT ".$Limit : "";

$DbLink = new DB;
$DbLink->query("SELECT m_time, username, latin1, address, message FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC".$LimitForQuery);

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$MessagesString = "";
	while(list($Time, $User, $Latin1, $Dest, $Message) = $DbLink->next_record())
	{
		$NewMsg = "<P CLASS=\"msg\">";
		if ($ST == 1) $NewMsg .= "<SPAN CLASS=\"time\">".date("d-M, H:i:s", $Time + C_TMZ_OFFSET*60*60)."</SPAN> ";
		if ($Dest != " *")
		{
			$User = special_char($User,$Latin1);
			if ($Dest != "") $Dest = "]>[".htmlspecialchars(stripslashes($Dest));
			$NewMsg .= "<B>[${User}${Dest}]</B> $Message</P>";
		}
		else
		{
			$NewMsg .= " <SPAN CLASS=\"notify\">[".L_ANNOUNCE."] $Message</SPAN>";
		};

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != date("j", time() +  C_TMZ_OFFSET*60*60))
		{
			$day_separator = "<P CLASS=\"msg\"><SPAN CLASS=\"notify\">--------- ".($O == 0 ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></P>";
		};

		$MessagesString = $NewMsg.((isset($day_separator) && $day_separator != "") ? "\n".$day_separator : "")."\n".$MessagesString;

		if (isset($day_separator)) $day_separator = "";		// Today separator already printed
	};
};

$DbLink->clean_results();
$DbLink->close();


if (isset($MessagesString) && $MessagesString != "")
{
	// Save messages to a file
	header("Content-Type: application/octetstream");
	header("Content-Disposition: attachement; filename=\"chat_save_".date("mdY").".htm\"");
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">
	<HEAD>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
		<TITLE><?php echo(APP_NAME." - ".htmlspecialchars(stripslashes($R))." - ".date("F j, Y")); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
	<HEAD>

	<BODY CLASS="mainframe">
	<?php
	echo($MessagesString);
	unset($MessagesString);
	?>
	</BODY>
	</HTML>
	<?php
	exit;
}
?>