<?php
// Check for swear words in the message if necessary
if (C_NO_SWEAR)
{
	include("./lib/swearing.lib.php");
	$Cmd[1] = checkwords($Cmd[1], false, $Charset);
 	if(C_EN_STATS && isset($Found) && $b>0)
	{
		$DbLink->query("UPDATE ".C_STS_TBL." SET swears_posted=swears_posted+$b WHERE stat_date='".date("Y-m-d")."' AND room='$R' AND username='$U'");
	}
	unset($Found, $b);
};

$DbLink->query("SELECT gender FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");

list($gender) = $DbLink->next_record();
$DbLink->clean_results();
if ($gender == 2) $salutation = "L_HELP_MS";
elseif ($gender == 1) $salutation = "L_HELP_MR";
else $salutation = "* *";

$M = "<B>* ".$salutation." ".$U."</B> ".stripslashes($Cmd[1]);
AddMessage($M, $T, $R, $U, $C, '', '', '', $Charset);

$IsCommand = true;
$RefreshMessages = true;
?>