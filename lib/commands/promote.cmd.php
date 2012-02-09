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

function room_in($what, $in, $Charset)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}

$UU = $Cmd[2];

// Check for invalid characters
#if (ereg("[\, \']", stripslashes($UU)))
if (preg_match("/[ |,|'|\\\\]/", $UU))
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
	else
	{
		list($password,$perms,$rooms) = $DbLink->next_record();
		$DbLink->clean_results();
		if (($password != $PWD_Hash) || (($perms != "moderator") && ($perms != "admin") && ($perms != "topmod")) || (($perms == "moderator") && (!room_in(stripslashes($R), $rooms, $Charset) && !room_in("*", $rooms, $Charset))))
		{
			$Error = L_NO_MODERATOR;
		}
		else
		{
			// Ensure the user to be promoted is a registered one
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
				// Promote the user if is not already moderator for the current room or admin
				if ($perms == "admin" || $perms == "topmod")
				{
					$Error = sprintf(L_ADMIN, stripslashes($UU));
				}
				elseif (!room_in($R,addslashes($rooms), $Charset) && !room_in("*",addslashes($rooms), $Charset))
				{
					$rooms .= stripslashes($rooms == "" ? $R:",${R}");
					$DbLink->query("UPDATE ".C_REG_TBL." SET perms='moderator', rooms='".addslashes($rooms)."' WHERE username='$UU'");
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='m' WHERE username='$UU'");
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS promote', '$Latin1', ".time().", '', 'sprintf(L_MODERATOR, \"".special_char($UU,$Latin1_UU)."\")', '', '')");
					$IsCommand = true;
					$RefreshMessages = true;
					$CleanUsrTbl = 1;
				}
				else
				{
					$Error = sprintf(L_IS_MODERATOR, stripslashes($UU));
				};
			};
		};
	};
};

?>