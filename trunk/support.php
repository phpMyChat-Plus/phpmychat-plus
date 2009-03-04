<?php
# PayPal donation module add-on
# This file is intended to keep this software freeware and is not part of the open-source code of this software.
# It comes as a plugin which should bring a few cents to the developer of this Plus version of phpMyChat,  as a reward for his work.
# Please be kind and don't alter in any way this script.
# On the other hand, changing or removing it from this chat may result in getting you suspended from using this chat version!
# You will also not get any future support if you'll need it.
# If you have questions or comments about this, please contact the developer of this chat.
# Thank you for your understanding. I appreciate it!

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./${ChatPath}config/config.lib.php");
if (!C_SUPPORT_PAID)
{
	require("./${ChatPath}localization/languages.lib.php");
	require("./${ChatPath}localization/".$L."/localized.chat.php");
	$pptype = "small";
	require("./${ChatPath}lib/support.lib.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin); ?>.css.php" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
<CENTER>
<?php
if (!C_SUPPORT_PAID)
{
if ($Ver != "H")
{
	?>
<table align="center"><tr><td align="center">
	<?php
}
require("./${ChatPath}lib/release.lib.php");
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="support" target="_blank" onSubmit="return confirm('You have chosen to contribute to the free development of\n<?php echo(APP_NAME); ?> by making a donation to the developer.\nThank you for your support!\n\nNote: the recipient is not the owner of this chat.\nPlease enter the amount on the next page.\n\nContinue?');">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?php echo($ppbutton); ?>">
<input type="image" style="background-color: transparent;" src="<?php echo($donate); ?>" border="0" name="submit" alt="<?php echo($ppalt); ?> Support with PayPal the development of <?php echo(APP_NAME); ?> - it's Fast, Free and Secure!" title="<?php echo($ppalt); ?> Support with PayPal the development of <?php echo(APP_NAME); ?> - it's Fast, Free and Secure!" onMouseOver="window.status='<?php echo($ppalt); ?>'; return true;">
</form>
<?php
if ($Ver != "H")
{
	?>
</td></tr></table>
	<?php
}
}
?>
</CENTER>
</BODY>
</HTML>
<?php
?>