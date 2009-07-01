<?php
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

function room_in($what, $in, $Charset)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}

$UU = $Cmd[1];

// Check for invalid characters
if (ereg("[\, \']", stripslashes($UU)))
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
			if ($UU != "*" && $UU != "")
			{
				// Define an additional condition for moderators so they can only kick an user from their current room
				$Query4Moder = (($perms != "admin" && $perms != "topmod") ? "room='$R' AND " : "");
				// Ensure the user to be kicked is logged in (into the current room for moderators)
				$DbLink->query("SELECT status FROM ".C_USR_TBL." WHERE ".$Query4Moder."username='$UU' LIMIT 1");
				if ($DbLink->num_rows() == 0)
				{
					$DbLink->clean_results();
					$Error = sprintf(L_NONEXIST_USER, stripslashes($UU));
				}
				else
				{
					list($status) = $DbLink->next_record();
					$DbLink->clean_results();
					// Ensure the user to be kicked is not a more powerfull user (admin>moderator)
					if ($status == "a" || $status == "t" || ($status == "m" && ($perms != "admin" && $perms != "topmod" )))
					{
						$Error = sprintf(L_NO_KICKED, stripslashes($UU));
					}
					else
					{
						$DbLink->query("UPDATE ".C_USR_TBL." SET u_time='".time()."', status='k' WHERE ".$Query4Moder."username='$UU'");
						if ($Cmd[2] != "")
						{
							$Reason = trim($Cmd[2]);
							$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_KICKED_REASON, \"".special_char($UU,$Latin1)."\", \"".$Reason."\")', '', '')");
						}
						else
						{
							$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_KICKED, \"".special_char($UU,$Latin1)."\")', '', '')");
						}
						// Statistics mod by Ciprian
				 		if(C_EN_STATS)
						{
							$curtime = time();
							$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$R' AND username='$UU' AND last_away!='0'");
							$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='', kicks_rcvd=kicks_rcvd+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$UU' AND last_in!='0'");
							$DbLink->query("UPDATE ".C_STS_TBL." SET kicks_sent=kicks_sent+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
						}
						$IsCommand = true;
						$RefreshMessages = true;
						$CleanUsrTbl = 1;
					}
				}
			}
			elseif ($UU == "*")
			{
				$DbLink->query("SELECT username FROM ".C_USR_TBL." WHERE username!='$U' AND room='$R'");
				if($DbLink->num_rows() != 0)
				{
					$DelLink = new DB;
					$DelLink->query("UPDATE ".C_USR_TBL." SET u_time='".time()."', status='k' WHERE username!='$U'");
					$DelLink->close;
					if(C_EN_STATS)
					{
						$curtime = time();
						while(list($UUU) = $DbLink->next_record())
						{
							$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$R' AND username='$UUU' AND last_away!='0'");
							$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='', kicks_rcvd=kicks_rcvd+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$UUU' AND last_in!='0'");
						}
						$DbLink->query("UPDATE ".C_STS_TBL." SET kicks_sent=kicks_sent+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
					}
					if ($Cmd[2] != "")
					{
						$Reason = trim($Cmd[2]);
						$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_KICKED_ALL_REASON, \"".$Reason."\")', '', '')");
					}
					else
					{
						$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'L_KICKED_ALL', '', '')");
					}

					// Statistics mod by Ciprian
					$IsCommand = true;
					$RefreshMessages = true;
					$CleanUsrTbl = 1;

				};
			};
		};
	};
};
?>