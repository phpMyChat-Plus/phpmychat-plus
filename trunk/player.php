<?php
// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
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
<?php
/*
if (stripos(C_WMP_STREAM,"mp3") !== false)
{
?>
<!--
<!-- Adobe Flash player TYPE 1 -->
	<embed src="http://fpdownload.adobe.com/strobe/FlashMediaPlayback.swf" type="application/x-shockwave-flash"
	allowscriptaccess="always"
	allowfullscreen="true"
	width="180"
	height="<?php echo(C_EN_WMPLAYER == 2 ? "195" : "57"); ?>"
	flashvars="src=<?php echo(C_WMP_STREAM); ?>">

<!-- Google Reader player TYPE 2 -->
	<embed type="application/x-shockwave-flash"
	flashvars="audioUrl=<?php echo(C_WMP_STREAM); ?>"
	src="http://www.google.com/reader/ui/3523697345-audio-player.swf"
	width="180"
	height="<?php echo(C_EN_WMPLAYER == 2 ? "195" : "27"); ?>"
	quality="best"
	wmode="transparent">
-->
<!-- jwplayer TYPE 3 -->
	<div id="player_preview" style="float:left;">Streaming solutions by <a href="http://www.serverroom.us">Server Room - Shoutcast hosting, Flash Streaming</a></div>
	<script type="text/javascript" src="http://www.serverroom.us/jwplayer/swfobject.js"></script>
		<script type="text/javascript">
			var so = new SWFObject('http://www.serverroom.us/jwplayer5/player.swf','mpl',290,35,'9');
			so.addParam('allowscriptaccess','always');
			so.addParam('allowfullscreen','true');
			so.addParam('flashvars','&autostart=true&duration=-1&skin=http://www.serverroom.us/jwplayer5/beelden.zip&file=<?php echo(C_WMP_STREAM); ?>');
			so.write('player_preview');
		</script>
<div id="container">
<script type="text/javascript" src="http://www.shoutcheap.com/flashplayer/swfobject.js"></script>
	<script type="text/javascript">
		var s1 = new SWFObject("http://www.shoutcheap.com/flashplayer/player.swf", "ply","180","20","9","#FFFFFF");
		s1.addParam("allowfullscreen","true"); s1.addParam("allowscriptaccess","always");
		s1.addParam("flashvars", "file=<?php echo(C_WMP_STREAM); ?>&volume=50&autostart=true");
		s1.write("container");
	</script>
</div>
<?php
}
else
{
*/
?>
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
<?php
#}
?>
</td></tr>
</table>
</center>
</body>
</html>
<?php
?>