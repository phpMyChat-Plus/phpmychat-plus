<?php

// Check for swear words in the message if necessary
if (C_NO_SWEAR == 1)
{
	include("./lib/swearing.lib.php");
	$Cmd[1] = checkwords($Cmd[1], false);
};

$DbLink->query("SELECT gender FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");


list($gender) = $DbLink->next_record();
$DbLink->clean_results();
if ($gender == 2) $salutation = "Ms";
elseif ($gender == 1) $salutation = "Mr";
else $salutation = "*";

$M = "<B>* ".$salutation." ".$U." </B>".stripslashes($Cmd[1]);

AddMessage($M, $T, $R, $U, $C, '', '', '');

$IsCommand = true;
$RefreshMessages = true;

?>