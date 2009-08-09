<?php

// Check for swear words in the message to be sent if there is one
if (trim($Cmd[1]) != "")
{
	$opentag = trim($Cmd[1]) == "rtl" ? "bdo_rtl" : "bdo_ltr";
	AddMessage($opentag.stripslashes($Cmd[2]), $T, $R, $U, $C, '', '', '', $Charset);
}
$IsCommand = true;
?>