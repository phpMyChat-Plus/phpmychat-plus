<?php
// This library allows to ensure the user who wants to enter in the chat is not a
// banished one.
// Additional credits for this lib go to Tomas Haluza (<thaluza@kiss.cz>),
// Ray Lopez (<kaidream@hotmail.com>) and Fabiano R. Prestes (<zoso@post.com>)

$IsBanished = false;
$Reason = "";

// Clean the banished users table
$DbLink->query("DELETE FROM ".C_BAN_TBL." WHERE ban_until < ".time());

// Get the IP of the user
if (!isset($ChatPath)) $ChatPath = "";
// Fix a security holes
else if (!is_dir('./'.substr(${ChatPath}, 0, -1))) exit();
if (!isset($IP) || $IP == "") include("./${ChatPath}lib/get_IP.lib.php");

// Seek for a banished nick
if (C_BAN_IP) // ban only by IP
{
	$DbLink->query("SELECT ip,rooms,reason FROM ".C_BAN_TBL." WHERE ip='$IP' LIMIT 1");
}
else // ban by both IP and username
{
	$DbLink->query("SELECT ip,rooms,reason FROM ".C_BAN_TBL." WHERE ip='$IP' and username='$U' LIMIT 1");
}
$Nb = $DbLink->num_rows();
// Nick of the user is banished from some rooms
if ($Nb != "0")
{
	list($Old_IP,$BanishedFromRooms,$Reason) = $DbLink->next_record();
	$DbLink->clean_results();
	$BanishedFromRooms = addslashes($BanishedFromRooms);

	// Is the user banished from the room he wants to enter in
	if ($BanishedFromRooms == "*")
	{
		$IsBanished = true;
	}
	elseif (isset($R3) && $R3 != "")
	{
		if (room_in($R3, $BanishedFromRooms, $Charset)) $IsBanished = true;
	}
	elseif (isset($R2) && $R2 != "")
	{
		if (room_in($R2, $BanishedFromRooms, $Charset)) $IsBanished = true;
	}
	elseif (isset($R1) && $R1 != "")
	{
		if (room_in($R1, $BanishedFromRooms, $Charset)) $IsBanished = true;
	}
	elseif (isset($R0) && $R0 != "")
	{
		if (room_in($R0, $BanishedFromRooms, $Charset)) $IsBanished = true;
	};

	// Update the IP of the user in the banished table when necessary
	if ($IsBanished && $IP != $Old_IP && (substr($IP, 0, 1) != "p" || substr($Old_IP, 0, 1) == "p")) $DbLink->query("UPDATE ".C_BAN_TBL." SET ip='$IP' WHERE username='$U'");
}
// Nick of the user isn't banished from any room, seek for banished IP
else
{
	$DbLink->clean_results();
	if (C_BAN_IP) // ban only by IP
	{
		$DbLink->query("SELECT rooms,ban_until,reason FROM ".C_BAN_TBL." WHERE ip='$IP' LIMIT 1");
	}
	else // ban by both IP or username
	{
		$DbLink->query("SELECT rooms,ban_until,reason FROM ".C_BAN_TBL." WHERE ip='$IP' and username='$U' LIMIT 1");
	}
	$Nb = $DbLink->num_rows();
	// IP is banished from some rooms
	if ($Nb != "0")
	{
		list($BanishedFromRooms,$Until,$Reason) = $DbLink->next_record();
		$DbLink->clean_results();
		$BanishedFromRooms = addslashes($BanishedFromRooms);

		// Is the IP banished from the room user wants to enter in ?
		if ($BanishedFromRooms == "*")
		{
			$IsBanished = true;
		}
		elseif (isset($R3) && $R3 != "")
		{
			if (room_in($R3, $BanishedFromRooms, $Charset)) $IsBanished = true;
		}
		elseif (isset($R2) && $R2 != "")
		{
			if (room_in($R2, $BanishedFromRooms, $Charset)) $IsBanished = true;
		}
		elseif (isset($R1) && $R1 != "")
		{
			if (room_in($R1, $BanishedFromRooms, $Charset)) $IsBanished = true;
		}
		elseif (isset($R0) && $R0 != "")
		{
			if (room_in($R0, $BanishedFromRooms, $Charset)) $IsBanished = true;
		};

		// Add the user to the banished table when necessary
		if ($IsBanished) $DbLink->query("INSERT INTO ".C_BAN_TBL." VALUES ('$U', '$Latin1', '$IP', '$BanishedFromRooms', '$Until', '$Reason')");
	}
	else
	{
		$DbLink->clean_results();
	};
 };

?>