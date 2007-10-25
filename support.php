<?php
# PayPal donation module add-on
# This file is intended to keep this software freeware and is not part of the open-source code of this software.
# It comes as a plugin which should bring a few cents to the developer of this Plus version of phpMyChat,  as a reward for his work.
# Please be kind and don't alter in any way this script.
# On the other hand, changing or removing it from this chat may result in getting you suspended from using this chat version!
# You will also not get any future support if you'll need it.
# If you have questions or comments about this, please contact the developer of this chat.
# Thank you for your understanding. I appreciate it!

require("./config/config.lib.php");
if (file_exists("./localization/".$L."/images/make_a_donation.gif")) $donation = "./localization/".$L."/images/make_a_donation.gif";
else $donation = "https://www.paypal.com/en_US/i/btn/x-click-but21.gif";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
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
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="support" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src=<?php echo($donation); ?> border="0" name="submit" alt="Support with PayPal the development of phpMyChat Plus - it's fast, free and secure! And we'll be grateful to you!" title="Support with PayPal the development of phpMyChat Plus - it's fast, free and secure! And we'll be grateful to you!">
<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
</form>
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