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

// Returns true if the room to check ($what) is in the string ($in), false else
function room_in($what, $in, $Charset)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	};
	return false;
};

// Returns 0 if the room to check ($what) is in the string ($in), the
// number of rooms else
function room_not_in($what, $in, $Charset)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return "0";
	};
	return count($rooms);
};

$UU = stripslashes($Cmd[3]);
// Check for invalid characters
#if (ereg("[\, \']", $UU))
if (preg_match("/[ |,|'|\\\\]/", $UU))
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
		if (($password != $PWD_Hash) || (($perms != "moderator") && ($perms != "admin") && ($perms != "topmod")) || (($perms == "moderator") && (!room_in(stripslashes($R), $rooms, $Charset) && !room_in("*", $rooms, $Charset))))
		{
			$Error = L_NO_MODERATOR;
		}
		else
		{
			// Define an additional condition for moderators so they can only banish an user from their current room
			$Query4Moder = (($perms != "admin" && $perms != "topmod") ? "room='$R' AND " : "");
			// Ensure the user to be banished is logged in (into the current room for moderators)
			$DbLink->query("SELECT latin1,room,status,ip FROM ".C_USR_TBL." WHERE ".$Query4Moder."username='$UU' LIMIT 1");
			if ($DbLink->num_rows() == 0)
			{
				$DbLink->clean_results();
				$Error = sprintf(L_NONEXIST_USER, stripslashes($UU));
			}
			else
			{
				list($UULatin1,$UURoom,$status,$IP) = $DbLink->next_record();
				$DbLink->clean_results();
				// Ensure the user to be banished is not a more powerfull user (admin>moderator)
				if ($status == "a" || $status == "t" || ($status == "m" && $perms != "admin" && $perms != "topmod"))
				{
					$Error = sprintf(L_NO_BANISHED, stripslashes($UU));
				}
				else
				{
					if ($Cmd[2] == "* " && $perms != "admin" && $perms != "topmod") $Cmd[2] = "";
					$Reason = trim($Cmd[4]);

					// Define the duration of the banishment
					$Until = ($Cmd[2] == "* ") ? "2222222222" : time() + round(C_BANISH * 60 * 60 * 24);
					if ($Until > 2222222222) $Until = "2222222222";

					$DbLink->query("SELECT ip,rooms FROM ".C_BAN_TBL." WHERE username='$UU' LIMIT 1");
					// User is already banished from some rooms -> Update the banished table
					if ($DbLink->num_rows() != 0)
					{
						list($Old_IP,$Old_ban_rooms) = $DbLink->next_record();
						$DbLink->clean_results();
						// Define rooms that the user will be banished from (if they are more
						// than 3, user will be banished from the whole chat)
						if ($Cmd[2] == "* ") $New_ban_rooms = "*";
						else
						{
							$UURoom = addslashes($UURoom);
							$Old_ban_rooms = addslashes($Old_ban_rooms);
							$NbAlrBanished = room_not_in($UURoom, $Old_ban_rooms, $Charset);
							$New_ban_rooms = ($NbAlrBanished > 2 ? "*" : $Old_ban_rooms.",".$UURoom);
						};
						// IP needs to be updated ?
						if (substr($IP, 0, 1) == "p" && substr($Old_IP, 0, 1) != "p") $IP = $Old_IP;
						// Update the table
						$DbLink->query("UPDATE ".C_BAN_TBL." SET ip='$IP',rooms='$New_ban_rooms',ban_until='$Until',reason='$Reason',country_code='$COUNTRY_CODE',country_name='$COUNTRY_NAME' WHERE username='$UU'");
					}
					// User isn't already banished from any room -> Insert into the banished table
					else
					{
						$DbLink->clean_results();
						$New_ban_rooms = ($Cmd[2] == "* ") ? "*" : addslashes($UURoom);
						$DbLink->query("INSERT INTO ".C_BAN_TBL." VALUES ('$UU', '$UULatin1', '$IP', '$New_ban_rooms', '$Until', '$Reason', '$COUNTRY_CODE', '$COUNTRY_NAME')");
					};

					// Modify the status of the banished user in users table
					$DbLink->query("UPDATE ".C_USR_TBL." SET u_time='".time()."', status='b' WHERE username='$UU'");
			 		if(C_EN_STATS)
					{
						$DbLink->query("UPDATE ".C_STS_TBL." SET bans_sent=bans_sent+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
					}
					$IsCommand = true;
					$RefreshMessages = true;
				    $CleanUsrTbl = 1;
				};
			};
		};
	};
};

?>