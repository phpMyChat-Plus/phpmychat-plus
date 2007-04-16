<?php

// Get the names and values for vars sent by the script that called this one
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

require("./config/config.lib.php");

header("Content-Type: text/html; charset=${Charset}");

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">
<HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin); ?>.css.php" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
<CENTER>
<A HREF="http://sourceforge.net/projects/phpmychat/" title="phpMyChat homepage" onMouseOver="window.status='Visit the phpMyChat homepage.'; return true" TARGET="_blank"><IMG SRC="images/icon.gif" WIDTH=88 HEIGHT=31 BORDER=0></A>
</CENTER>
</BODY>
</HTML>
<?php
?>