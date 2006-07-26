<?php

function room_in($what, $in)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp($what, $room_name) == 0) return true;
	}
	return false;
}

$UU = $Cmd[2];
$DbLink = new DB;
// Check for invalid characters
if (ereg("[\, ]", stripslashes($UU)))
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
			// Define an additional condition for moderators so they can only kick an user from their current room
			$Query4Moder = ($perms != "admin" ? "room='$R' AND " : "");
			// Ensure the user to be kicked is logged in (into the current room for moderators)
			$DbLink->query("SELECT status FROM ".C_USR_TBL." WHERE ".$Query4Moder."username='$U' LIMIT 1");
			if ($DbLink->num_rows() == 0)
			{
				$DbLink->clean_results();
				$Error = sprintf(L_NONEXIST_USER, stripslashes($U));
			}
			else
			{
				list($status) = $DbLink->next_record();
				$DbLink->clean_results();
				// Ensure the user to be kicked is not a more powerfull user (admin>moderator)
					if ($status == "a" || ($status == "m" && $perms != "admin"))
					{
					// Check for invalid characters in the addressee name
						if (ereg("[\, ]", stripslashes($Cmd[2])))
						{
							$Error = L_ERR_USR_16;
						}
					elseif (trim($Cmd[2]) != "" && trim($Cmd[3]) != "")
					{
					// Check for swear words in the message if necessary
						if (C_NO_SWEAR == 1)
						{
							include("./lib/swearing.lib.php");
							$Cmd[3] = checkwords($Cmd[3], false);
							$Cmd[2] = checkwords($Cmd[2], false);
						}
					$Top = trim($Cmd[2])." ".trim($Cmd[3]);
if (strcasecmp($Top, "top reset") == 0)
{
					$DbLink = new DB;
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS topic', '', ".time().", '*', '', '')");
					global $Top;
 					AddMessage(stripslashes(L_TOPIC_RESET), $T, $R, $U, $C, '', '');
}
else
{
					$DbLink = new DB;
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS topic', '', ".time().", '*', '$Top', '')");
					global $Top;
 					AddMessage(stripslashes(L_TOPIC).$Cmd[2]." ".$Cmd[3], $T, $R, $U, $C, '', '');
}
					$IsCommand = true;
					$RefreshMessages = true;
					}
				}
			}
		}
	}
}

?>