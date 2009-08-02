<?php
// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)) ?>" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
<CENTER>
<?php
if ($Ver != "H")
{
	?>
<table align="center"><tr><td align="center">
	<?php
}
?>
<A HREF="http://sourceforge.net/projects/phpmychat/" title="<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>.'; return true" TARGET="_blank"><IMG SRC="images/icon.gif" WIDTH=88 HEIGHT=31 BORDER=0 ALT="<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>"></A>
<?php
if ($Ver != "H")
{
	?>
<?php echo ("<div align=\"center\" class=\"small\">".sprintf(L_SKINS_COPY,$SKIN_DATE,$SKIN_BY)."</div>"); ?>
</td></tr></table>
	<?php
}
else echo ("<div align=\"center\" class=\"small\">".sprintf(L_SKINS_COPY,$SKIN_DATE,$SKIN_BY)."</div>");
?>
</CENTER>
</BODY>
</HTML>
<?php
?>