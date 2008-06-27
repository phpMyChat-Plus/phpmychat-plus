<?php
// This is an example of what may be done to include phpMyChat into an
// existing web page, regardless of its name.
// You can also include such a file in a frameset.

// Lines below must be at the top of your file because 'index.lib.php'
// sets headers and cookies.
$ChatPath = "";		// relative path to chat dir, empty value if this
					// file is in the same dir than the chat;
// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
		return $str;
	};
};

require("./${ChatPath}lib/index.lib.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
window.name="login";
<?php
// Display & remove the server time in the status bar
if (C_WORLDTIME == 2)
{
	include_once("./${ChatPath}lib/worldtime.lib.php");
?>
	clock(gap);
<?php
}
?>
//-->
</SCRIPT>
<?php
// You can put html head statements right after the "<HEAD>" tag.

// Both values are boolean. See explanations in 'index.lib.php' file.
send_headers(1,1);
?>
</HEAD>
<BODY<?php echo((C_FILLED_LOGIN) ? " CLASS=\"ChatBody\"" : ""); ?><?php echo((C_BACKGR_IMG && C_BACKGR_IMG_PATH != "") ? " background=\"".C_BACKGR_IMG_PATH."\"" : ""); ?>>
	<CENTER>
<?php
// You can put html statements right after the "<BODY>" tag or add php code here.

$Is_Error = (isset($Error));

if (isset($_COOKIE))
{
	if (isset($_COOKIE["CookieUsername"])) $CookieUsername = urldecode($_COOKIE["CookieUsername"]);
	if (isset($_COOKIE["CookieRoom"])) $CookieRoom = urldecode($_COOKIE["CookieRoom"]);
	if (isset($_COOKIE["CookieRoomType"])) $CookieRoomType = $_COOKIE["CookieRoomType"];
	if (isset($_COOKIE["CookieColor"])) $CookieColor = $_COOKIE["CookieColor"];
	if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];
};
$Username = (isset($CookieUsername) ? $CookieUsername : "");
$Room_name = (isset($CookieRoom) ? $CookieRoom : "");
$Room_type = (isset($CookieRoomType) ? $CookieRoomType : "");
$Color = (isset($CookieColor) ? $CookieColor : "");
$Status = (isset($CookieStatus) ? $CookieStatus : "");

layout($Is_Error,$Username,$Room_name,$Room_type,$Color,$Status);

// You can add php code here, or add html statements before the "</BODY>" tag.
if ($S)
{
	echo("<TD><SPAN style=\"color:yellow; background-color:black;\"><b>Debug data:</b><br />Admin name: <b>".C_ADMIN_NAME."</b><br />Admin email: <b>".C_ADMIN_EMAIL."</b><br />App name: <b>".APP_NAME."</b><br />Chat name: <b>".C_CHAT_NAME."</b><br />App version: <b>".APP_VERSION.APP_MINOR."</b></SPAN></TD>");
}
?>
</CENTER>
</BODY>
</HTML>
<?php
// The following line is required
$DbLink->close();
?>