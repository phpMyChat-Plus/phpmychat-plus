<?php
// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

$L="";
$M="";
$U="";
$PWD_Hash="";
$R="";
$PASSWORD="";
$Ver="";

if (isset($HTTP_COOKIE_VARS["CookieLang"])) $L = urldecode($HTTP_COOKIE_VARS["CookieLang"]);
require("./config/config.lib.php");
if (!isset($L) || $L == "") $L = C_LANGUAGE;
require("./localization/".$L."/localized.chat.php");

$link=htmlentities($_GET['link']);
$purl=urldecode($link);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<head>
<title><? echo(((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)." - ".L_LINKS_1); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=${Charset}">
<LINK REL="stylesheet" HREF="<?php echo($skin); ?>.css.php" TYPE="text/css">
</head>
<body class="frame">
<SPAN CLASS="mainframe" style="font-family:Arial, Helvetica, Geneva, Verdana, sans-serif;">
<p align="center" class="title"><? echo (L_LINKS_2); ?></p>
<table align="center" width="100%" height="50%">
  <tr>
<td>
<?php
$urlarray = explode("||",$purl);
for($x=0;$x<count($urlarray);$x++)
{
	echo "<p align=\"center\"><a href=\"".$urlarray[$x]."\" title=\"".sprintf(L_CLICK,L_LINKS_3)."\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_3).".'; return true\" target=_blank>".wordwrap($urlarray[$x], 40, " ", 1)."</a></p>";
}
?>
</td>
</tr>
</table>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2006-<?php echo(date(Y)); ?> - by <a href="http://www.xaex.de" onMouseOver="window.status='<?php echo (sprintf(L_CLICK,L_LINKS_4)); ?>.'; return true;" title="<?php echo (sprintf(L_CLICK,L_LINKS_4)); ?>" target=_blank>xaex.de</a></span></div></P>
</SPAN>
</body>
</html>
<?php
?>