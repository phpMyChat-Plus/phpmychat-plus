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
if (isset($L) && !is_dir("./localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./config/config.lib.php");
require("./${ChatPath}lib/release.lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
if (!C_SUPPORT_PAID)
{
	$pptype = "small";
	require("./${ChatPath}lib/support.lib.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin); ?>.css.php" TYPE="text/css">
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo(str_replace("sr_CS","sr_RS",str_replace("es_AR","es_ES",L_LANG))); ?>/all.js#xfbml=1&appId=49226597181";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
</HEAD>
<BODY CLASS="frame">
<CENTER>
<?php
if ($Ver != "H") echo("<table align=\"center\"><tr><td align=\"center\">");
?>
<span class="fb-like" data-href="https://www.facebook.com/pages/phpMyChat-Plus/112950852062055" data-send="false" data-layout="button_count" data-show-faces="false" data-font="tahoma"></span>
<?php
if ($Ver != "H") echo("</td></tr>");
if (!C_SUPPORT_PAID)
{
if ($Ver != "H") echo("<tr><td align=\"center\">");
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="support" target="_blank" onSubmit="return confirm('<?php echo(L_SUPP_WARN); ?>');">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?php echo($ppbutton); ?>">
<input type="image" style="background-color: transparent;" src="<?php echo($donate); ?>" border="0" name="submit" alt="<?php echo($ppalt."&#10;".L_SUPP_ALT); ?>" title="<?php echo($ppalt."&#10;".L_SUPP_ALT); ?>" onMouseOver="window.status='<?php echo($ppalt); ?>'; return true;">
</form>
<?php
if ($Ver != "H") echo("</td></tr></table>");
}
?>
</CENTER>
</BODY>
</HTML>
<?php
?>