<?php
// Get the names and values for vars sent by index.lib.php
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./config/config.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");

// avoid server configuration for magic quotes
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

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<head>
<title>MediaPlayer frame</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</head>
<body CLASS="frame" topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
<center>
<table width=100% cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="top">
<embed type="application/x-mplayer2"
name="MediaPlayer"
clsid:6BF52A52-394A-11D3-B153-00C04F79FAA6
width="180"
height="<?php echo(C_EN_WMPLAYER == 2 ? "195" : "65"); ?>"
src="<?php echo(C_WMP_STREAM); ?>"
fullscreenmode="1"
autoSize="1"
animationatstart="1"
autostart="1"
loop="1"
showcontrols="1"
showpositioncontrols="0"
showstatusbar="<?php echo(C_EN_WMPLAYER == 2 ? "0" : "1"); ?>"
showaudiocontrols="1"
align="bottom"
pluginspage="http://microsoft.com/windows/mediaplayer/en/download/">
</embed>
</td></tr>
</table>
</center>
</body>
</html>
<?php
?>