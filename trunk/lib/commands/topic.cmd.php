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

	$DbLink = new DB;
	// Ensure the current user is moderator for the current room or admin.
	$DbLink->query("SELECT password,perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	if ($DbLink->num_rows() == 0)
	{
		$Error = L_NO_MODERATOR;
		$DbLink->clean_results();
	}
	list($password,$perms,$rooms) = $DbLink->next_record();
	$DbLink->clean_results();
	if (($password != $PWD_Hash) || (($perms != "moderator") && ($perms != "admin") && ($perms != "topmod")) || (($perms == "moderator") && (!room_in(stripslashes($R), $rooms) && !room_in("*", $rooms))))
	{
		$Error = L_NO_MODERATOR;
	}
	else
	{
		// Define an additional condition for moderators so they can only kick an user from their current room
		$Query4Moder = (($perms != "admin" && $perms != "topmod") ? "room='$R' AND " : "");
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
				if ($status == "a" || $status == "t" || ($status == "m" && $perms != "admin" && $perms != "topmod"))
				{
					global $toppath;
					global $topgpath;
					$toppath = "botfb/" .$R ;         // file is in DIR "botfb" and called "roomname"
					$topgpath = "botfb/Global topic" ;         // file is in DIR "botfb" and called "Global topic"
					// Check for invalid characters in the addressee name
					if (ereg("[\, ]", stripslashes($Cmd[2])))
					{
						$Error = L_ERR_USR_16;
					}
					elseif (trim($Cmd[2]) != "" && trim($Cmd[3]) != "")
					{
						// Check for swear words in the message if necessary
						if (C_NO_SWEAR && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
						{
							include("./lib/swearing.lib.php");
							$Cmd[3] = checkwords($Cmd[3], false);
							$Cmd[2] = checkwords($Cmd[2], false);
						}
						global $Top;
						if (trim($Cmd[2]) != "*") $Top = trim($Cmd[2])." ".trim($Cmd[3]);
						else $Top = trim($Cmd[3]);
						if (strcasecmp($Top, "top reset") == 0)
						{
							if (trim($Cmd[2]) != "*")
							{
								if (file_exists ($toppath))                            // checks to see if room file exists.
								{
								  unlink ($toppath);                             // if it does delete it.
								}
								$DbLink = new DB;
								$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS topic reset', '', ".time().", '$U', '', '', '')");
							}
							else
							{
								if (file_exists ($topgpath))                            // checks to see if room file exists.
								{
								  unlink ($topgpath);                             // if it does delete it.
								}
									$DbLink = new DB;
									$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '*', 'SYS topic reset', '', ".time().", '$U', '', '', '')");
							}
						}
						else
						{
							if (C_USE_SMILIES)
							{
								include("./lib/smilies.lib.php");
								Check4Smilies($Top,$SmiliesTbl);
								unset($SmiliesTbl);
							};
	// URL
	$Top = eregi_replace('([[:space:]]|^)(www[.])', '\\1http://\\2', $Top); // no prefix (www.myurl.ext)
	$Top = eregi_replace('([[:space:]]|^)(ftp[.])', '\\1ftp://\\2', $Top); // no prefix (ftp.myurl.ext)
	// Word wrap fix by Alexander Eisele <xaex@xaex.de>
	if (!preg_match_all("((http://|https://|ftp://|mailto:)[^ ]+)", $Top, $pmatch))
	{
		$Top = wordwrap($Top, 40, " ", 1);
	}
	$Top = eregi_replace('([[:space:]]|^)(www)', '\\1http://\\2', $Top); // no prefix (www.myurl.ext)
	$prefix = '(http|https|ftp|telnet|news|gopher|file|wais)://';
    $pureUrl = '([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+-_~]*)';
       $purl="";
       for ($x=0; $x<count($pmatch[0]); $x++)
       {
				$purl .= "||".$pmatch[0][$x];
       }

    $Top = eregi_replace($prefix.$pureUrl, '<a href="links.php?link='.urlencode($purl).'" target="_blank"></a>', $Top);

	// e-mail addresses
	$Top = eregi_replace('([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)', '<a href="mailto:\\1" alt="Send email">\\1</a>', $Top);
	
							if (trim($Cmd[2]) != "*")
							{
								if (file_exists ($toppath))                            // checks to see if room file exists.
								{
								  unlink ($toppath);                             // if it does delete it.
								}
								clearstatcache () ;
								$fp = fopen($toppath, "a") ;                // file will be writen.
								fputs($fp, stripslashes($Top));                // and will include the topic to be listed on banner.
								fclose($fp) ;
								$DbLink = new DB;
								$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS topic', '', ".time().", '$U', '$Top', '', '')");
							}
							else
							{
								if (file_exists ($topgpath))                            // checks to see if room file exists.
								{
								  unlink ($topgpath);                             // if it does delete it.
								}
								clearstatcache () ;
								$fp = fopen($topgpath, "a") ;                // file will be writen.
								fputs($fp, stripslashes($Top));                // and will include the topic to be listed on banner.
								fclose($fp) ;
								$DbLink = new DB;
								$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '*', 'SYS topic', '', ".time().", '$U', '$Top', '', '')");
							}
						}
						$IsCommand = true;
						$RefreshMessages = true;
					}
				}
		}
	}
?>