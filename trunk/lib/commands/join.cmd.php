<?php
if (!function_exists("room_in"))
{
	// This function will be used to test banishment for the room the user wants to enter in
	// Returns true if the room to check ($what) is in the string ($in), false else
	function room_in($what, $in)
	{
		$rooms = explode(",",$in);
		for (reset($rooms); $room_name=current($rooms); next($rooms))
		{
			if (strcasecmp($what, $room_name) == 0) return true;
		};
		return false;
	};
};

if (C_NO_SWEAR) include("./lib/swearing.lib.php");

$new_room_type = ($Cmd[2] != "" ? $Cmd[2]:1);
$new_room = $Cmd[3];

if (C_VERSION == 1)
{
	// Ensure that the room to enter in is among default ones
	for ($i = 0; $i < count($DefaultChatRooms); $i++)
	{
		if (strcasecmp($new_room, $DefaultChatRooms[$i]) == 0) $IsCommand = true;
	}
	if (!$IsCommand) $Error = L_ERR_USR_17;
}
// Check for invalid characters
elseif (ereg("[\,]", stripslashes($new_room)))
{
	$Error = L_ERR_ROM_1;
}
// Check for swear words if necessary
elseif(C_NO_SWEAR && checkwords($new_room, true))
{
	$Error = L_ERR_ROM_2;
}
else
{
	// Ensure there is no existing room with the same name but a different type
	// among reserved name for private/public (default) rooms
	$ToCheck = ($new_room_type == "1" ? $DefaultPrivateRooms : $DefaultChatRooms);
	for ($i = 0; $i < count($ToCheck); $i++)
	{
		if (strcasecmp($new_room,$ToCheck[$i]) == "0")
		{
			$Error = ($new_room_type == 0 ? L_ERR_ROM_3:L_ERR_ROM_4);
			break;
		};
	};
	unset($ToCheck);
	if (!isset($Error) || $Error == "") $IsCommand = true;
};

if ($IsCommand)
{
	$what_room = "";

	// Get the type of the room and its case sensitive name when it already exists
	$ToCheck = ($new_room_type == "1" ? $DefaultChatRooms : $DefaultPrivateRooms);
	for ($i = 0; $i < count($DefaultChatRooms); $i++)
	{
		if (strcasecmp($new_room, $ToCheck[$i]) == 0)
		{
			$what_room = "R0";
			$new_room = $ToCheck[$i];
		};
	};
	unset($ToCheck);
	if ($what_room == "")
	{
		$DbLink->query("SELECT room FROM ".C_MSG_TBL." WHERE type='".$new_room_type."' AND room='".$new_room."' LIMIT 1");
		if ($DbLink->num_rows() != 0)
		{
			$what_room = "R1";
			list($new_room) = $DbLink->next_record();
		};
		$DbLink->clean_results();
	};
	if ($new_room_type == "0") $what_room = "";

	// Room must be created
	if ($what_room == "")
	{
		// Ensure the user is a registered one
		if (!isset($Error))
		{
			$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$U'");
			list($count) = $DbLink->next_record();
			if ($count != 0) $what_room = "R3";
			$DbLink->clean_results();
		};

		// Ensure there is no existing room with the same name but a different type
		// among rooms created by users
		if ($what_room == "R3")
		{
			$T1 = 1 - $new_room_type;
			$DbLink->query("SELECT count(*) FROM ".C_MSG_TBL." WHERE room = '".$new_room."' AND type = '$T1' LIMIT 1");
			list($count) = $DbLink->next_record();
			$DbLink->clean_results();
			if($count != 0)
			{
				$Error = ($new_room_type == 0 ? L_ERR_ROM_3:L_ERR_ROM_4);
				$what_room = "";
			};
		};
	};

	// Ensure the user is not banished from the room he wants to enter in
	if (C_BANISH != "0" && (!isset($status) || $status != "a" || $status != "t"))
	{
		$$what_room = $new_room;
		include("./lib/banish.lib.php");
		if ($IsBanished)
		{
			$what_room = "";
			$Error = L_ERR_USR_20;
		};
	};

	// If the room can't be created
	if ($what_room == "")
	{
		if (!isset($Error)) $Error = L_ERR_USR_13;
		$IsCommand = false;
	}
	// Log into the new room
	else
	{
		?>
		<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
		<!--
		window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&$what_room=".urlencode(stripslashes($new_room))."&D=$D&N=$N&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&T=$new_room_type&Reload=JoinCmd"); if (isset($PWD_Hash)) echo("&PWD_Hash=".$PWD_Hash); ?>';
		// -->
		</SCRIPT>
		<?php
		exit;
	};
};

?>