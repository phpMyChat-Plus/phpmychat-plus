<?php
// Check for swear words in the message to be sent if there is one
if (trim($Cmd[3]) != "")
{
	if (C_NO_SWEAR)
	{
		include("./lib/swearing.lib.php");
		$Cmd[3] = checkwords($Cmd[3], false, $Charset);
 		if(C_EN_STATS && isset($Found) && $b>0)
		{
			$DbLink->query("UPDATE ".C_STS_TBL." SET swears_posted=swears_posted+$b WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
		}
		unset($Found, $b);
	}
	AddMessage(stripslashes($Cmd[3]), $T, $R, $U, $C, '', '', '', $Charset);
}
$M1 = $Cmd[0];
$IsCommand = true;
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
if (window.parent.frames['loader'] && !window.parent.frames['loader'].closed)
{
	if (typeof(window.parent.leaveChat) != 'undefined') window.parent.leaveChat = true;
	window.parent.frames['loader'].close();
};
window.parent.frames['exit'].close_popups();
window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&EN=$T"); ?>';
// -->
</SCRIPT>
<?php
exit;
?>