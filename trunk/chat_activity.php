<?php
// This script is an example of display, in another page of your website,
// the list or number of users connected to the chat

/* Call this file in a iframe like this:
<iframe name="PlusFrame" id="PlusFrame" height="30" scroll="no" frameborder="no" src="../plus/chat_activity.php"></iframe>
*/

// Lines below must be at the top of your file and completed according to your settings (path to your chat or plus directory)
// Set relative path from this page to your chat directory (it ends with a trailing slash like: "../chat/" or empty "")
// Considering /plus/ is in a path like http://www.website.com/plus/ (/public_html/plus/)
// Note:	./ = current directory = /plus/;
//				../ = parent directory = /folders/ (one folder up);
//$ChatPath = "../../plus/";	//use it if the output page is in a path like this: http://www.website.com/private/phpbb (/public_html/private/phpbb/)
$ChatPath = "";	//use it if the output page is in a path like this: http://www.website.com/phpbb/ (/public_html/phpbb/)
//$ChatPath = "plus/";	//(most often) use it if the output page is in a path like this: http://www.website.com/ (root, /public_html/)
//$ChatPath = "";	//use it if the output page is in the same directory with /plus/

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/release.lib.php");

// Configure here:
$ShowPrivate = 0;     // 1 to display users even if they are in a private room,
$DisplayUsers = 0;    // 0 to display only the number of connected users
// End configuration

// Special cache instructions for IE5+
header("Cache-Control: public");
header("Content-Type: text/html; charset=${Charset}");

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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
<META HTTP-EQUIV="Refresh" CONTENT="10">
<TITLE>Integration of chat activity into your own web page</TITLE>
<!-- To integrate this page into a different designed page and remove the style sheet, either comment out the line below or change the .css style sheet to be used (and the Body class)-->
<LINK REL="stylesheet" HREF="<?php echo("${ChatPath}".$skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
	<CENTER>
<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 CLASS="table">
<TR>
	<TD ALIGN=CENTER colspan=3>
		<?php
		require("./${ChatPath}/lib/connected_users.lib.php");
		display_connected($ShowPrivate,$DisplayUsers,$NbUsers,($NbUsers != 1 ? $NbUsers." ".NB_USERS_IN : USERS_LOGIN),NO_USER,$DbLink,$Charset);
		?>
	</TD>
</TR>
</TABLE>
</CENTER>
</BODY>
</HTML>