<?php
// Color Input Box mod by Ciprian - v.1.5 - 19.08.2005
if (isset($HTTP_GET_VARS["L"])) $L = $HTTP_GET_VARS["L"];
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $CookieStatus = $HTTP_COOKIE_VARS["CookieStatus"];
if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);

// Fix a security hole
if (isset($L) && !is_dir('./localization/'.$L)) exit();

if (isset($HTTP_GET_VARS["Ver"])) $Ver = $HTTP_GET_VARS["Ver"];

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");

header("Content-Type: text/html; charset=${Charset}");

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";

// Text direction and horizontal alignment for cells topic
$TextDir = ($Charset == "windows-1256" ? "RTL" : "LTR");
$CellAlign = ($Charset != "windows-1256" ? "LEFT" : "RIGHT");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($TextDir); ?>">
<HEAD><TITLE><?php echo(L_COL_HELP_TITLE); ?></TITLE>
</HEAD>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="MSHTML 6.00.2900.2722" name=GENERATOR></HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<BODY CLASS="frame" onLoad="setTimeout('window.close()',60000); window.status='Welcome to the Color Mod Mini-Help Page.';">
<TD><SPAN style="font-family:Arial, Helvetica, Geneva, sans-serif; color:#FFD700; font-size: 8pt"><i>&copy; 2005-<?php echo(date(Y)); ?> - by Ciprian Murariu</i></SPAN></TD>
<CENTER><br><TD><SPAN style="font-family:Arial, Helvetica, Geneva, sans-serif; color:#FFD700; font-size: 14pt"><U><B><?php echo(L_COL_HELP_TITLE); ?></B></U></SPAN></TD>
<br><TD><SPAN style="font-family:Arial, Helvetica, Geneva, sans-serif; color:#00FF00; font-size: 8pt"><?php echo(L_COL_HELP_SUBTITLE); ?></SPAN></TD></CENTER>
<SPAN style="font-family:Arial, Helvetica, sans-serif; font-size: 10pt">
<br>
<P>
<SPAN style="color:#FFA500"><b><?php echo(L_COL_HELP_SUB1); ?></b></SPAN><br><?php echo(L_COL_HELP_P1); ?><br><br>
<SPAN style="color:#FFA500"><b><?php echo(L_COL_HELP_SUB2); ?></b></SPAN><br><?php echo(L_COL_HELP_P2); ?><br><br><center><?php echo(COLOR_LIST); ?></center><br><?php echo(L_COL_HELP_P2a); ?><br><br>
<SPAN style="color:#FFA500"><b><?php echo(L_COL_HELP_SUB3); ?></b></SPAN><br><?php echo(L_COLOR_HEAD_SETTINGS); ?><br><?php if (COLOR_FILTERS == 1) echo(L_COLOR_HEAD_SETTINGSa."<br>"); ?><u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("Administrator"); elseif ($CookieStatus == "m") echo("Moderator"); elseif ($CookieStatus == "u") echo("Guest (Normal)"); else echo("Registered (Normal)");?></b><br><?php if (COLOR_FILTERS == 1) echo("<br>".L_COL_HELP_P3."<br>"); ?><?php echo(L_COL_HELP_P3a); ?></SPAN>
</P>
<br>
<HR>
<center>
<SPAN style="color:#FFD700; font-size:12pt"><b><?php echo(L_COL_GO); ?></b></SPAN>
<br><br><input type="submit" value="Gotcha. Lets Colorize!" name="GO" onClick="window.close();" onMouseOver="window.status='Close and return to Color Chart.'; return false;">
<br>
<HR>
<br>
<SPAN CLASS="mainframe" style="font-family:Arial, Helvetica, sans-serif; font-size: 8pt">
<TD><?php echo(L_COL_HELP_SUPP1); ?><br><A HREF="http://ciprianmp.com/atm" onMouseOver="window.status='Click to join the mod/file support page.'; return true" TARGET="_blank">PHP Advanced Transfer Manager on Ciprianmp.com</A>.<br><?php echo(L_COL_HELP_SUPP2); ?></TD><br>
<br><HR><br><TD>&copy; 2005-<?php echo(date(Y)); ?> - <A HREF="http://groups.yahoo.com/subscribe/phpmychat" target="_blank" onMouseOver="window.status='Click to join the phpMyChat Yahoo Group.'; return true">phpMyChat Community</A> - <?php echo(L_COL_HELP_CREDITS1); ?><br><a href=mailto:ciprianmp@yahoo.com onMouseOver="window.status='Click to email Ciprian Murariu.'; return true;">Ciprian Murariu</a> - <?php echo(L_COL_HELP_CREDITS2); ?><br><a href=mailto:ealdwulf@yahoo.com onMouseOver="window.status='Click to email Ealdwulf.'; return true">Ealdwulf</a> - <A HREF="<?php echo($ChatPath); ?>colorchart.htm" onMouseOver="window.status='Click to open the HTML Color Chat.'; return true" TARGET="_blank" CLASS="ChatLink"><?php echo(L_COL_HELP_CREDITS3); ?><br><hr><br><?php echo(L_COL_HELP_THKS); ?></TD>
</SPAN>
</BODY>
</HTML>