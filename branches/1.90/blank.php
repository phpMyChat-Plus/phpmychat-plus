<?php
if (isset($HTTP_GET_VARS["L"])) $L = $HTTP_GET_VARS["L"];

// Fix a security hole
if (isset($L) && !is_dir('./localization/'.$L)) exit();

require("./localization/".$L."/localized.chat.php");
header("Content-Type: text/html; charset=${Charset}");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">
<HEAD>
	<TITLE>Blank title</TITLE>
<HEAD>
<BODY>
	<!-- Not a blank document ;) -->
</BODY>
</HTML>