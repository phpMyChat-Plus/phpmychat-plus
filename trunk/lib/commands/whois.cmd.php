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
	$in = explode(",",$in);
	for (reset($in); $room_name=current($in); next($in))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}
$UU = stripslashes($Cmd[1]);
// Check for invalid characters in the user name
if (ereg("[\, \']", $UU))
{
	$Error = L_ERR_USR_16;
}
else
{
	$IsCommand = true;

	$DbLink->query("SELECT perms,rooms FROM ".C_REG_TBL." WHERE username='".$U."' LIMIT 1");
	if ($DbLink->num_rows() > 0)
	{
		list($perms,$rooms) = $DbLink->next_record();
		$DbLink->clean_results();
	}
	// Define what can see the current user:
	// - the whole profile including e-mail and IP address if he is admin or moderator of the current room
	//   if this room is one of the default rooms;
	// - e-mail only if the registered user accepted this to be displayed and no IP
	if ($status == "a" || $status == "t")
	{
		$power = "all";
	}
	elseif ($status == "m" && (room_in(stripslashes($R), $DefaultChatRooms, $Charset) || room_in("*", $rooms, $Charset) || room_in(stripslashes($R), $rooms, $Charset)))
	{
		$power = "medium";
	}
	else
	{
		$power = "weak";
	};

	// Ensure the user whose profile is required is a registered one
	$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='".$UU."' LIMIT 1");
	list($count) = $DbLink->next_record();
	$DbLink->clean_results();
	if ($count == 0)
	{
		$Error = sprintf(L_NONREG_USER, $UU);
		if ($power != "weak")
		{
			$DbLink->query("SELECT ip FROM ".C_USR_TBL." WHERE username='".$UU."' LIMIT 1");
			$Nb = $DbLink->num_rows();
			if ($Nb != "0")
			{
				list($IP) = $DbLink->next_record();
				if (substr($IP, 0, 1) == "p") $IP = substr($IP, 1)." (proxy)";
				$Error .= "\\n".sprintf(L_NONREG_USER_IP, $IP);
			};
			$DbLink->clean_results();
 		};
	}
	else
	{
		$IsPopup = true;
		$win_name = "whois_popup_".md5(uniqid(""));

		// Define a table that contains JavaScript instructions to be ran
		$jsTbl = array(
			"<SCRIPT TYPE=\"text/javascript\" LANGUAGE=\"JavaScript\">",
			"<!--",
			"// Lauch the whois popup",
			"window.open(\"whois_popup.php?L=$L&User=".urlencode($UU)."&R=".urlencode(stripslashes($R))."\",\"$win_name\",\"width=500,height=500,resizable=yes,scrollbars=yes\");",
			"// -->",
			"</SCRIPT>"
		);
	};
}

?>