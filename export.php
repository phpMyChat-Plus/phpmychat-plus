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

require("config/config.lib.php");
require("localization/".$L."/localized.chat.php");
require("lib/database/".C_DB_TYPE.".lib.php");
require("lib/release.lib.php");
require("lib/clean.lib.php");

// Avoid server configuration for magic quotes
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
$Latin1 = ($Charset != "utf-8");
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
		$Message = str_replace("L_DEL_BYE",L_DEL_BYE,$Message);
		$Message = str_replace("L_REG_BRB",L_REG_BRB,$Message);
		$Message = str_replace("L_HELP_MR",L_HELP_MR,$Message);
		$Message = str_replace("L_HELP_MS",L_HELP_MS,$Message);
		$Message = str_replace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
		if ($Align == "right") $Message = str_replace("arrowr","arrowl",$Message);
#		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
		if (C_POPUP_LINKS || stripos($Message,'target="_blank"></a>') !== false)
		{
			$Message = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$Message);
		}
		else $Message = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$Message);

		$Message = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$Message);

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
			$day_separator = "<P CLASS=\"msg\"><SPAN CLASS=\"notify\" style=\"background-color:yellow;\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></P>";
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
	<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
	<HEAD>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
		<TITLE><?php echo(htmlspecialchars(stripslashes($R))." - ".date("F j, Y")." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">

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