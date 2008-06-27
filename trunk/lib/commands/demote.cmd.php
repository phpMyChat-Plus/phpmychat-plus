<?php
// This command will remove the moderator permissions for an user in any room

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
		return $str;
	}
};

// Ensure a moderator have such a status for the current room
function room_in($what, $in, $Charset)
{
	$rooms = (is_array($in) ? $in : explode(",",$in));
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}

$UU = $Cmd[2];

// Check for invalid characters
if (ereg("[\, \']", stripslashes($UU)))
{
	$Error = L_ERR_USR_16;
}
else
{
	$DbLink->query("SELECT password,perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	// Ensure the current user is moderator for the current room or admin.
	if ($DbLink->num_rows() == 0)
	{
		$Error = L_NO_MODERATOR;
		$DbLink->clean_results();
	}
	elseif (C_DEMOTE_MOD == 1)				// moderators can demote
	{
		list($password,$perms,$rooms) = $DbLink->next_record();
		$DbLink->clean_results();
		if (($password != $PWD_Hash) || (($perms != "moderator") && ($perms != "admin") && ($perms != "topmod")) || (($perms == "moderator") && (!room_in(stripslashes($R), $rooms, $Charset) && !room_in("*", $rooms, $Charset))))
		{
			$Error = L_NO_MODERATOR;
		}
		else
		{
			// Ensure the user to be demoted is a registered one
			$DbLink->query("SELECT latin1,perms,rooms FROM ".C_REG_TBL." WHERE username='$UU' LIMIT 1");
			if ($DbLink->num_rows() == 0)
			{
				$Error = sprintf(L_NONREG_USER, stripslashes($UU));
				$DbLink->clean_results();
			}
			else
			{
				$IsCommand = true;
				$RefreshMessages = true;
				list($Latin1_UU,$perms,$rooms) = $DbLink->next_record();
				$DbLink->clean_results();
				// Demote the user if is not already an ordinary user for the current room or admin
				if ($perms == "admin" || $perms == "topmod")
				{
					$Error = sprintf(L_ERR_IS_ADMIN, stripslashes($UU));
				}
				// Have been demoted from all rooms?
				elseif (($perms == "moderator")&&($Cmd[1] == "* "))
				{
					$DbLink->query("UPDATE ".C_REG_TBL." SET perms='user', rooms='' WHERE username='$UU'");
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE username='$UU'");
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '*', 'SYS demote', '$Latin1', ".time().", '', 'sprintf(L_IS_NO_MOD_ALL, \"".special_char($UU,$Latin1_UU)."\")', '', '')");
				}
				elseif (($perms == "moderator") && (room_in($R,addslashes($rooms), $Charset) || room_in("*",addslashes($rooms), $Charset)))
				{
					$rooms_new .= ($Cmd[1] == "* ") ? $rooms = "" : str_replace($R, "", $rooms);
					if ($rooms_new == "" ||$Cmd[1] == "* ")
					{
						$DbLink->query("UPDATE ".C_REG_TBL." SET perms='user', rooms='".addslashes($rooms_new)."' WHERE username='$UU'");
					}
					else
					{
					$rooms_new_clean .= str_replace(",,", ",", ereg_replace("^,|,$","", $rooms_new));
					$DbLink->query("UPDATE ".C_REG_TBL." SET rooms='".addslashes($rooms_new_clean)."' WHERE username='$UU'");
					}
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE username='$UU' AND room='$R'");
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS demote', '$Latin1', ".time().", '', 'sprintf(L_ADM_1, \"".special_char($UU,$Latin1_UU)."\")', '', '')");
				}
				else
				{
					$Error = sprintf(L_IS_NO_MODERATOR, stripslashes($UU));
				}
			}
		}
	}
	else
	{
		list($password,$perms,$rooms) = $DbLink->next_record();
		$DbLink->clean_results();
		if (($password != $PWD_Hash) || ($perms != "admin" && $perms != "topmod"))
		{
			$Error = L_NO_ADMIN;
		}
		else					// just the administrator can demote
		{
			// Ensure the user to be demoted is a registered one
			$DbLink->query("SELECT latin1,perms,rooms FROM ".C_REG_TBL." WHERE username='$UU' LIMIT 1");
			if ($DbLink->num_rows() == 0)
			{
				$Error = sprintf(L_NONREG_USER, stripslashes($UU));
				$DbLink->clean_results();
			}
			else
			{
				list($Latin1_UU,$perms,$rooms) = $DbLink->next_record();
				$DbLink->clean_results();
				// Demote the user if is not already an ordinary user for the current room or admin
				if ($perms == "admin" && $perms == "topmod")
				{
					$Error = sprintf(L_ERR_IS_ADMIN, stripslashes($UU));
				}
				// Have been demoted from all rooms?
				elseif (($perms == "moderator")&&($Cmd[1] == "* "))
				{
					$DbLink->query("UPDATE ".C_REG_TBL." SET perms='user', rooms='' WHERE username='$UU'");
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE username='$UU'");
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '*', 'SYS demote', '$Latin1', ".time().", '', 'sprintf(L_IS_NO_MOD_ALL, \"".special_char($UU,$Latin1_UU)."\")', '', '')");
					$IsCommand = true;
					$RefreshMessages = true;
					$CleanUsrTbl = 1;
				}
				elseif (($perms == "moderator") && (room_in($R,addslashes($rooms), $Charset) || room_in("*",addslashes($rooms), $Charset)))
				{
					$rooms_new .= ($Cmd[1] == "* ") ? $rooms = "" : str_replace($R, "", $rooms);
					if ($rooms_new == "" ||$Cmd[1] == "* ")
					{
						$DbLink->query("UPDATE ".C_REG_TBL." SET perms='user', rooms='".addslashes($rooms_new)."' WHERE username='$UU'");
					}
					else
					{
					$rooms_new_clean .= str_replace(",,", ",", ereg_replace("^,|,$","", $rooms_new));
					$DbLink->query("UPDATE ".C_REG_TBL." SET rooms='".addslashes($rooms_new_clean)."' WHERE username='$UU'");
					}
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE username='$UU' AND room='$R'");
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS demote', '$Latin1', ".time().", '', 'sprintf(L_ADM_1, \"".special_char($UU,$Latin1_UU)."\")', '', '')");
					$IsCommand = true;
					$RefreshMessages = true;
					$CleanUsrTbl = 1;
				}
				else
				{
					$Error = sprintf(L_IS_NO_MODERATOR, stripslashes($UU));
				}
			}
		}
	}
}
?>