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

// Ensure a moderator have such a status for the current room
function room_in($what, $in, $Charset)
{
	$rooms = (is_array($in) ? $in : explode(",",$in));
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
};

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
		if (($password != $PWD_Hash) || (($perms != "moderator") && ($perms != "admin") && ($perms != "topmod")) || (($perms == "moderator") && (!room_in(stripslashes($R), $rooms, $Charset) && !room_in("*", $rooms, $Charset))))
		{
			$Error = L_NO_MODERATOR;
		}
		else
		{
			// Check for swear words in the message to be sent if there is one
			if (trim($Cmd[3]) != "")
			{
			$room_mess = $Cmd[3];
				if (C_NO_SWEAR && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
				{
					include("./lib/swearing.lib.php");
					$room_mess = checkwords($room_mess, false, $Charset);
			 		if(C_EN_STATS && isset($Found) && $b>0)
					{
						$DbLink->query("UPDATE ".C_STS_TBL." SET swears_posted=swears_posted+$b WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
					}
					unset($Found, $b);
				}
				if (C_USE_SMILIES)
				{
					include("./lib/smilies.lib.php");
					$ss = Check4Smilies($room_mess,$SmiliesTbl);
					if(C_EN_STATS && $ss > 0)
					{
						$DbLink->query("UPDATE ".C_STS_TBL." SET smilies_posted=smilies_posted+$ss WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
					}
					unset($SmiliesTbl, $ss);
				};
			}
		if (trim($Cmd[2]) == "*")
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '*', 'SYS room', '$Latin1', ".time().", '$U', '".addslashes(stripslashes($room_mess))."', '', '')");
		else
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS room', '$Latin1', ".time().", '$U', '".addslashes(stripslashes($room_mess))."', '', '')");
		$IsCommand = true;
		$RefreshMessages = true;
		};
	};
?>