<?php
// This script is an example of display, in another page of your website,
// the list or number of users connected to the chat

// Lines below must be at the top of your file and completed according
// to your settings

// Set relative path from this page to your chat directory (it ends with a trailing slash like: "../chat/" or empty "")
$ChatPath = "";

if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);
if (!isset($R)) $skin == "style";

if (isset($HTTP_COOKIE_VARS["CookieLang"])) $L = $HTTP_COOKIE_VARS["CookieLang"];

require("./${ChatPath}/config/config.lib.php");
require("./${ChatPath}/lib/release.lib.php");
if (!isset($L)) $L = C_LANGUAGE;
require("./${ChatPath}/localization/".$L."/localized.chat.php");

// Configure here:
$ShowPrivate = "0";     // 1 to display users even if they are in a private room,
												// 0 else

$DisplayUsers = "1";    // 0 to display only the number of connected users
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
<hr>
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
<hr>
</CENTER>
</BODY>

</HTML>