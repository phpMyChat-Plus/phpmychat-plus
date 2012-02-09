<?php
// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	}
};

// Check for invalid characters in the user name
#if ($Cmd[3] != "" && ereg("[\ \']", stripslashes($Cmd[3])))
if ($Cmd[3] != "" && preg_match("/[ |,|'|\\\\]/", $Cmd[3]))
{
	$Error = L_ERR_USR_16;
}
elseif ((mb_convert_case($Cmd[3],MB_CASE_LOWER,$Charset) == mb_convert_case($U,MB_CASE_LOWER,$Charset)) || $Cmd[3] == $U)
{
	$Error = L_ERR_USR_19;
}
else
{
	$IsCommand = true;
	$TimeSend = time();
	// Message to add if user need to be registered to enter the current room
	$ReqRegist = (($T == "0" && !C_REQUIRE_REGISTER) ? ".\" \".L_INVITE_REG" : "");
		// Don't send self-invitations - by Ciprian
#		if (eregi(mb_convert_case($U,MB_CASE_LOWER,$Charset),mb_convert_case($Cmd[3],MB_CASE_LOWER,$Charset)))
		if (stripos(mb_convert_case($Cmd[3],MB_CASE_LOWER,$Charset),mb_convert_case($U,MB_CASE_LOWER,$Charset)) !== false)
		{
			$Cmd[31] = str_replace($U, '', $Cmd[3]);
			$Cmd[31] = str_replace(',,', ',', $Cmd[31]);
			$Cmd[31] = rtrim($Cmd[31], ',');
			$Cmd[3] = ltrim($Cmd[31], ',');
			$Error = L_ERR_USR_19;
		}
	// Get all addressee and insert a message for each one
	$NotInvited = "";
	$Invited = explode (",", $Cmd[3]);
	for ($i = 0; $i < count($Invited); $i++)
	{
		$Invited[$i] = trim($Invited[$i]);
		if ($Invited[$i] == "") continue;
		$DbLink->query("SELECT username FROM ".C_USR_TBL." WHERE username='$Invited[$i]' || username='".mb_convert_case($Invited[$i],MB_CASE_LOWER,$Charset)."'");
		if($DbLink->num_rows() != 0)
		{
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS inviteTo', '$Latin1', '$TimeSend', '$Invited[$i]', 'sprintf(L_INVITE, \"".special_char($U,$Latin1)."\", \"join\", \"$T #".addslashes(special_char($R,0))."\", \"".special_char($R,0)."\")$ReqRegist', '', '')");
			// Insert a message for the sender
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS inviteFrom', '$Latin1', '$TimeSend', '$U', 'sprintf(L_INVITE_DONE, \"".special_char($Invited[$i],0)."\")', '', '')");
		}
		// User off-line - don't send invitation - by Ciprian
		else
		{
			if($NotInvited == "")
			{
				$NotInvited = $Invited[$i];
			}
			else
			{
				$NotInvited .= ",".$Invited[$i];
			}
			$Error = sprintf(L_NOT_ONLINE, special_char($NotInvited,$Latin1));
		};
	};
	unset($Invited,$NotInvited);
};

?>