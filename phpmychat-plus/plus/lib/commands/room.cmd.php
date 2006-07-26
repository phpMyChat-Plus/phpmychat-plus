<?php

// Ensure a moderator have such a status for the current room
function room_in($what, $in)
{
	$rooms = (is_array($in) ? $in : explode(",",$in));
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp($what, $room_name) == 0) return true;
	}
	return false;
};

if (ereg("[\, ]", stripslashes($U)))
{
	$Error = L_ERR_USR_16;
}
else
{
	// Ensure the current user is moderator for the current room or admin.
	$DbLink->query("SELECT password,perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	if ($DbLink->num_rows() == 0)
	{
		$Error = L_NO_MODERATOR;
		$DbLink->clean_results();
	}
	else
	{
		list($password,$perms,$rooms) = $DbLink->next_record();
		$DbLink->clean_results();
		if (($password != $PWD_Hash) || (($perms != "moderator")&&($perms != "admin")) || (($perms == "moderator")&&(!room_in(stripslashes($R), $rooms))))
		{
			$Error = L_NO_MODERATOR;
		}
		else
		{
			// Check for swear words in the message to be sent if there is one
			if (trim($Cmd[1]) != "")
			{
				if (C_NO_SWEAR == 1 && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
				{
				include("./lib/swearing.lib.php");
				$Cmd[1] = checkwords($Cmd[1], false);
				}
			}

// with avatar system
//   $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS room', '$Latin1', ".time().", '$U', '".stripslashes($Cmd[1])."', '', '')");
// without avatar system
   $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS room', '$Latin1', ".time().", '$U', '".addslashes(stripslashes($Cmd[1]))."', '')");

   $IsCommand = true;
   $RefreshMessages = true;
   $First = 1;
		};
	};
};
?>