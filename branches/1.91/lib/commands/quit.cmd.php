<?php

// Check for swear words in the message to be sent if there is one
if (trim($Cmd[3]) != "")
{
	if (C_NO_SWEAR == 1)
	{
		include("./lib/swearing.lib.php");
		$Cmd[3] = checkwords($Cmd[3], false);
	}
	AddMessage(stripslashes($Cmd[3]), $T, $R, $U, $C, '', '', '');
}
$IsCommand = true;
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
if (window.parent.frames['loader'] && !window.parent.frames['loader'].closed)
{
	if (typeof(window.parent.leaveChat) != 'undefined') window.parent.leaveChat = true;
	window.parent.frames['loader'].close();
};

window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&EN=$T"); ?>';
// -->
</SCRIPT>
<?php
exit;

?>