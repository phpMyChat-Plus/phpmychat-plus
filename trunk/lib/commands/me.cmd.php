<?php

// Check for swear words in the message if necessary
if (C_NO_SWEAR)
{
	include("./lib/swearing.lib.php");
	$Cmd[1] = checkwords($Cmd[1], false, $Charset);
};


$M = "<B>* ".$U."</B> ".stripslashes($Cmd[1]);

AddMessage($M, $T, $R, $U, $C, '', '', '', $Charset);

$IsCommand = true;
$RefreshMessages = true;

?>