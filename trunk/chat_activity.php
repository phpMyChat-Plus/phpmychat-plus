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
$ChatPath = "../plus/";	//use it if the output page is in a path like this: http://www.website.com/phpbb/ (/public_html/phpbb/)
//$ChatPath = "plus/";	//(most often) use it if the output page is in a path like this: http://www.website.com/ (root, /public_html/)
//$ChatPath = "";	//use it if the output page is in the same directory with /plus/

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);
if (!isset($R)) $skin == "style1";	//you can use any style in your pluschat/config folder (style1, style2, ..., style7)

if (!isset($L) && isset($_COOKIE["CookieLang"])) $L = $_COOKIE["CookieLang"]; 

//Fix a security hole
if (isset($L) && !is_dir("${ChatPath}localization/".$L)) exit();

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}lib/release.lib.php");
if (!isset($L) || $L == "") $L = C_LANGUAGE;
require("./${ChatPath}localization/".$L."/localized.chat.php");

// Configure here:
$ShowPrivate = 0;     // 1 to display users even if they are in a private room,
												// 0 else

$DisplayUsers = 0;    // 0 to display only the number of connected users
                        // 1 to display a list of users
// End configuration
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>

<HEAD>
<META HTTP-EQUIV="Refresh" CONTENT="10">
<TITLE>Integration of chat activity into your own web page</TITLE>
<!-- To integrate this page into a different designed page and remove the style sheet, either comment out the line bellow or change the .css style sheet to be used (and the Body class)-->
<LINK REL="stylesheet" HREF="<?php echo("${ChatPath}".$skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
	<CENTER>
<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 CLASS="table">
<TR>
	<TD ALIGN=CENTER colspan=3>
		<?php
		require("./${ChatPath}/lib/connected_users.lib.php");
		display_connected($ShowPrivate,$DisplayUsers,$NbUsers,($NbUsers != 1 ? $NbUsers." ".NB_USERS_IN : USERS_LOGIN),NO_USER,$DbLink);
		?>
	</TD>
</TR>
</TABLE>
</CENTER>
</BODY>
</HTML>