<?php

// Match a string in a list
function cmd_in($what, $in, $Charset)
{
	$cmds = (is_array($in) ? $in : explode(",",$in));
	for (reset($cmds); $cmd_name=current($cmds); next($cmds))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($cmd_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	};
	return false;
};

// Check for swear words in the message to be sent if there is one
if (trim($Cmd[1]) != "")
{
	$opentag = trim($Cmd[1]) == "rtl" || cmd_in(trim($Cmd[1]),L_CMD_RTL,$Charset) ? "bdo_rtl" : (trim($Cmd[1]) == "ltr" || cmd_in(trim($Cmd[1]),L_CMD_LTR,$Charset) ? "bdo_ltr" : "");
	AddMessage($opentag.stripslashes($Cmd[2]), $T, $R, $U, $C, '', '', '', $Charset);
}

$M1 = $Cmd[0];
$IsCommand = true;

?>