<?php
// ** Check for messages to be saved **

// Define the SQL query (depends on values for ignored users list and on whether to display
// notification messages or not)

$CondForQuery = "";
$IgnoreList = "'SYS enter','SYS exit','SYS delreg','SYS promote','SYS demote','SYS inviteTo','SYS inviteFrom','SYS topic','SYS announce','SYS welcome'";
if (isset($Ign) && $Ign != "") $IgnoreList .= ",'".str_replace(",","','",addslashes(urldecode($Ign)))."'";
if ($IgnoreList != "") $CondForQuery = "username NOT IN (${IgnoreList}) AND ";
$CondForQuery .= "(address IN ('$U',' *') OR (room = '$R' AND (address = '' OR username = '$U')) OR (room = '$R' AND username = 'SYS room'))";

$DbLink->query("SELECT Count(*) FROM ".C_MSG_TBL." WHERE ".$CondForQuery." LIMIT 1");
list($Count) = $DbLink->next_record();
$DbLink->clean_results();

if ($Count != "0")
{
	$IsCommand = true;
	$Save_URL_Query = isset($Ign) ? "&Ign=".urlencode(stripslashes($Ign)) : "";
	if (C_SAVE != "*" && ($Cmd[3] > C_SAVE || $Cmd[3] == "")) $Cmd[3] = C_SAVE;
	if ($Cmd[3] != "") $Save_URL_Query .= "&Limit=".$Cmd[3];

	// Define a table that contains JavaScript instructions to be ran
	$jsTbl = array(
		"<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">",
		"<!--",
		"// Save messages to a file",
		"window.open(\"export.php?L=$L&U=".urlencode(stripslashes($U))."&R=".urlencode(stripslashes($R))."&ST=$ST".$Save_URL_Query."\",\"save_popup\",\"width=400,height=400,scrollbars=yes,resizable=no\");",
		"// -->",
		"</SCRIPT>"
	);
}
else
{
	$Error = L_NO_SAVE;
};

?>