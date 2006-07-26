<?php

// Check for invalid characters in the user name
if ($Cmd[2] != "" && ereg("[\ ]", stripslashes($Cmd[2])))
{
	$Error = L_ERR_USR_16;
}
else
{
	$IsCommand = true;
	$TimeSend = time();
	// Message to add if user need to be registered to enter the current room
	$ReqRegist = (($T == "0" && !C_REQUIRE_REGISTER) ? ".\" \".L_INVITE_REG" : "");
	// Get all addressee and insert a message for each one
	$Invited = explode (",", $Cmd[2]);
	for ($i = 0; $i < count($Invited); $i++)
	{
		$Invited[$i] = trim($Invited[$i]);
		if ($Invited[$i] == "") continue;
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS inviteTo', '$Latin1', '$TimeSend', '$Invited[$i]', 'sprintf(L_INVITE, \"".special_char($U,$Latin1)."\", \"JOIN\", \"$T #".addslashes(special_char($R,0))."\", \"".special_char($R,0)."\")$ReqRegist', '')");
	};
	unset($Invited);
	// Insert a message for the sender
	$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS inviteFrom', '$Latin1', '$TimeSend', '$U', 'sprintf(L_INVITE_DONE, \"".special_char($Cmd[2],0)."\")', '')");
};

?>