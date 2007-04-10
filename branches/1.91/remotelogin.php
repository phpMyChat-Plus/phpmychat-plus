<?php
// This script is an example of display, in another page of your website,
// the login frame to your chat

/* Call this file in a iframe like this:
 <iframe name="Chat Login frame" id="Chat Login frame" height="170" scroll="no" frameborder="no" src="plus/remotelogin.php"></iframe>
*/

// Lines below must be at the top of your file and completed according to your settings (path to your chat or plus directory)
// Set relative path from this page to your chat directory (it ends with a trailing slash like: "../chat/" or empty "")
// Considering /plus/ is in a path like http://www.website.com/plus/ (/public_html/plus/)
// Note:	./ = current directory = /plus/;
//				../ = parent directory = /folders/ (one folder up);
//$ChatPath = "../../plus/";	//use it if the output page is in a path like this: http://www.website.com/private/phpbb (/public_html/private/phpbb/)
$ChatPath = "../plus/";	//use it if the output page is in a path like this: http://www.website.com/phpbb/ (/public_html/phpbb/)
//$ChatPath = "plus/";	//(most often) use it if the output page is in a path like this: http://www.website.com/ (root, /public_html/)
//$ChatPath = "";	//use it if the output page is in the same directory with /plus/

require("./${ChatPath}/lib/remotelogin.lib.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

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
<BODY>
<?php
// If nothing other than phpMyChat is loaded in this page, or if you want
// to have the same background color as phpMyChat for the whole page,
// you have to modify the BODY tag to '<BODY CLASS="ChatBody">'
// You can put html statements right after the "<BODY>" tag or add
// php code here.

$Is_Error = (isset($Error));

if (isset($HTTP_COOKIE_VARS))
{
	if (isset($HTTP_COOKIE_VARS["CookieUsername"])) $CookieUsername = $HTTP_COOKIE_VARS["CookieUsername"];
	if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $CookieRoom = $HTTP_COOKIE_VARS["CookieRoom"];
	if (isset($HTTP_COOKIE_VARS["CookieRoomType"])) $CookieRoomType = $HTTP_COOKIE_VARS["CookieRoomType"];
	if (isset($HTTP_COOKIE_VARS["CookieColor"])) $CookieColor = $HTTP_COOKIE_VARS["CookieColor"];
	if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $CookieStatus = $HTTP_COOKIE_VARS["CookieStatus"];
};
$Username = (isset($CookieUsername) ? $CookieUsername : "");
$Room_name = (isset($CookieRoom) ? $CookieRoom : "");
$Room_type = (isset($CookieRoomType) ? $CookieRoomType : "");
$Color = (isset($CookieColor) ? $CookieColor : "");
$Status = (isset($CookieStatus) ? $CookieStatus : "");

layout($Is_Error,$Username,$Room_name,$Room_type,$Color,$Status);
?>
</BODY>
</HTML>
<?php
// The following line is required
$DbLink->close();
?>