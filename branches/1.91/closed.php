<?php
if (isset($HTTP_COOKIE_VARS["CookieLang"])) $L = urldecode($HTTP_COOKIE_VARS["CookieLang"]);
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);
if (!isset($R)) $skin == "style1";	//you can use any style in your pluschat/config folder (style1, style2, ..., style7)
require("./config/config.lib.php");
require("./lib/release.lib.php");
if (!isset($L)) $L = C_LANGUAGE;
require("./localization/".$L."/localized.chat.php");
?>
<html>
<head>
<title><?php echo(APP_NAME); ?> is closed</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="stylesheet" HREF="<?php echo("${ChatPath}".$skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
<!--
	// Open popup for administration menu
	function adm_popup()
	{
		window.focus();
		url = "<?php echo($ChatPath); ?>admin.php?L=<?php echo($L); ?>&Link=1";
		param = "width=820,height=550,resizable=yes,scrollbars=yes";
		window.open(url,"admin_popup",param);
	}
// -->
</SCRIPT>
</head>

<body class="frame" onLoad="adm_popup();">
<center>
<br /><br /><br /><br /><br /><br /><center><font size="+2"><b><?php echo(APP_NAME); ?> is closed.<br /><br /><font color=green>Our open schedule is<?php if (C_OPEN_DAYLY) echo(" daily,"); else { C_OPEN_MONDAY ? " ".L_MONDAY."," : ""; C_OPEN_TUESDAY ? " ".L_TUESDAY."," : ""; C_OPEN_WEDNESDAY ? " ".L_WEDNESDAY."," : ""; C_OPEN_THURSDAY ? " ".L_THURSDAY."," : ""; C_OPEN_FRIDAY ? " ".L_FRIDAY."," : ""; C_OPEN_SATURDAY ? " ".L_SATURDAY."," : ""; C_OPEN_SUNDAY ? " ".L_SUNDAY."," : ""; }; ?><br />from <?php echo(C_OPEN_TIME_BEGIN); ?> to <?php echo(C_OPEN_TIME_END); ?>.</font><br />
<br /><br />Sorry you missed us.<br />Please come back at our regular times. Thank you!</font>
	<br><br>You will be redirected in 15 seconds,<br />or click <a href=../ onMouseOver="window.status='Click to open the homepage.'; return true;" title="Click to open the homepage" target=_blank>here</a> to go to the homepage.</b>
		<br><br><A HREF="admin.php?L=<?php echo($L); ?>&Link=1" CLASS="ChatReg" onClick="adm_popup(); return false" onMouseOver="window.status='Administration panel.'; return true" TARGET="_blank"><?php echo(L_REG_35); ?></A>
</center>
<meta http-equiv="refresh" content="15; url=../">
</body>
</html>