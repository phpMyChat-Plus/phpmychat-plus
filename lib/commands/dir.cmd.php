<?php

// Check for swear words in the message to be sent if there is one
if (trim($Cmd[1]) != "")
{
	$opentag = trim($Cmd[1]) == "rtl" ? "<BDO dir=rtl>" : "<BDO dir=ltr>";
	AddMessage($opentag.stripslashes($Cmd[2])."</BDO>", $T, $R, $U, $C, '', '', '', $Charset);
}
$IsCommand = true;
?>