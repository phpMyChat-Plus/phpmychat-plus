<?php

// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
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
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin); ?>.css.php" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
<CENTER>
<?php
if ($Ver != "H")
{
	?>
<table align="center"><tr>
	<?php
}
?>
<A HREF="http://sourceforge.net/projects/phpmychat/" title="phpMyChat homepage" onMouseOver="window.status='Visit the phpMyChat homepage.'; return true" TARGET="_blank"><IMG SRC="images/icon.gif" WIDTH=88 HEIGHT=31 BORDER=0></A>
<?php
if ($Ver != "H")
{
	?>
</tr></table>
	<?php
}
?>
</CENTER>
</BODY>
</HTML>
<?php
?>