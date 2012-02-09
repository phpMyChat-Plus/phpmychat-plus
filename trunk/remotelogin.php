<?php
// This script is an example of display, in another page of your website, the login frame to your chat

/* Call this file in a iframe like this:
 <iframe name="Chat Login frame" id="Chat Login frame" height="175" scroll="no" frameborder="no" src="plus/remotelogin.php"></iframe>
*/

// Lines below must be at the top of your file and completed according to your settings (path to your chat or plus directory)
// Set relative path from this page to your chat directory (it ends with a trailing slash like: "../chat/" or empty "")
// Considering /plus/ is in a path like http://www.website.com/plus/ (/public_html/plus/)
// Note:	./ = current directory = /plus/;
//				../ = parent directory = /folders/ (one folder up);
if (!isset($ChatPath)){
//$ChatPath = "../../plus/";	//use it if the output page is in a path like this: http://www.website.com/private/phpbb (/public_html/private/phpbb/)
//$ChatPath = "../plus/";	//use it if the output page is in a path like this: http://www.website.com/phpbb/ (/public_html/phpbb/)
//$ChatPath = "plus/";	//(most often) use it if the output page is in a path like this: http://www.website.com/ (root, /public_html/)
$ChatPath = "";	//use it if the output page is in the same directory with /plus/
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
	};
};

require("./${ChatPath}/lib/remotelogin.lib.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
window.name="login";
//-->
</SCRIPT>
<?php
// You can put html head statements right after the "<HEAD>" tag.
// Both values are boolean. See explanations in 'remotelogin.lib.php' file.
send_headers(1,1);
?>
</HEAD>
<BODY<?php echo((C_FILLED_LOGIN) ? " CLASS=\"ChatBody\"" : ""); ?><?php echo((C_BACKGR_IMG && C_BACKGR_IMG_PATH != "") ? " style=\"background-image: url(".C_BACKGR_IMG_PATH."); background-attachment: fixed;\"" : ""); ?>>
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
	if (isset($_COOKIE["CookieHash"])) $RemMe = $_COOKIE["CookieHash"];
};
$Username = (isset($CookieUsername) ? $CookieUsername : "");
$Room_name = (isset($CookieRoom) ? $CookieRoom : "");
$Room_type = (isset($CookieRoomType) ? $CookieRoomType : "");
$Color = (isset($CookieColor) ? $CookieColor : "");
$Status = (isset($CookieStatus) ? $CookieStatus : "");
$RemMe = (isset($CookieHash) ? $CookieHash : "");

layout($Is_Error,$Username,$Room_name,$Room_type,$Color,$Status,$RemMe);
// The following line is required
?>
</CENTER>
</BODY>
</HTML>
<?php
$DbLink->close();
?>