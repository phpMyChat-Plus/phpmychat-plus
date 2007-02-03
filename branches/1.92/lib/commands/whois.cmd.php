<?php

function room_in($what, $in)
{
	for (reset($in); $room_name=current($in); next($in))
	{
		if (strcasecmp($what, $room_name) == 0) return true;
	}
	return false;
}

// Check for invalid characters in the user name
if (ereg("[\, ]", stripslashes($Cmd[1])))
{
	$Error = L_ERR_USR_16;
}
else
{
	$IsCommand = true;

	// Define what can see the current user:
	// - the whole profile including e-mail and IP address if he is admin or moderator of the current room
	//   if this room is one of the default rooms;
	// - e-mail only if the registered user accepted this to be displayed and no IP
	if ($status == "a")
	{
		$power = "all";
	}
	elseif ($status == "m" && room_in(stripslashes($R),$DefaultChatRooms))
	{
		$power = "medium";
	}
	else
	{
		$power = "weak";
	};

	// Ensure the user whose profile is required is a registered one
	$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='".$Cmd[1]."' LIMIT 1");
	list($count) = $DbLink->next_record();
	$DbLink->clean_results();
	if ($count == 0)
	{
		$Error = sprintf(L_NONREG_USER, stripslashes($Cmd[1]));
		if ($power != "weak")
		{
			$DbLink->query("SELECT ip FROM ".C_USR_TBL." WHERE username='".$Cmd[1]."' LIMIT 1");
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
			"window.open(\"whois_popup.php?L=$L&power=$power&U=".urlencode(stripslashes($Cmd[1]))."&R=".urlencode(stripslashes($R))."\",\"$win_name\",\"width=500,height=500,resizable=yes,scrollbars=yes\");",
			"// -->",
			"</SCRIPT>"
		);
	};
}

?>