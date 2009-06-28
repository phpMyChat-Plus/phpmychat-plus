<?php
if (!C_BOT_CONTROL)
{
	$Error = BOT_DISABLED_ERROR;
}
else
{
$botcontrol ="botfb/$R.txt";

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
		$currentbot_time = time() + 2;
		$botuser = C_BOT_NAME;
		  if($Cmd[1] == "stop")
		  {
		       if (file_exists($botcontrol))
		       {
		       	  $DbLink->query("DELETE FROM ".C_USR_TBL." WHERE username='$botuser' AND room='$R'");
		       	  $DbLink->query("DELETE FROM ".C_MSG_TBL." WHERE message = 'SYS enter' AND username LIKE '$botuser' AND m_time > ".(time() - C_MSG_DEL * 60 * 60)." AND room='$R'");
	              $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '$botuser', '$Latin1', '".time()."', '$Private', '<FONT color=\"".C_BOT_FONT_COLOR."\">".C_BOT_BYE."</FONT> <img src=images/smilies/smile10.gif>".C_UPDTUSRS."', '', '')");
				  $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '$Latin1', '$currentbot_time', '$Private', 'sprintf(L_EXIT_ROM, \"".$botuser."\")', '', '')");
		          unlink ($botcontrol);
				$IsCommand = true;
				$RefreshMessages = true;
		       }
		       else
		       {
		       	  $Error = BOT_STOP_ERROR;
		       }
		  }
	    elseif($Cmd[1] == "start")
		  {
		       if (file_exists ($botcontrol))
		       {
		       	  $Error = BOT_START_ERROR;
		       }
		       else
		       {
					$DbLink->query("SELECT last_login,login_counter FROM ".C_REG_TBL." WHERE username='$botuser' LIMIT 1");
					if ($DbLink->num_rows() != 0)
					{
						list($last_login,$login_counter) = $DbLink->next_record();
						$DbLink->clean_results();
						$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '$Latin1', '".time()."', '$Private', 'sprintf(L_ENTER_ROM_NOSOUND, \"".$botuser."\")', '', '')");
						$DbLink->query("INSERT INTO ".C_USR_TBL." VALUES ('$R','$botuser', '$Latin1', '9999999999', '$status','$IP', '0', ".time().", 'bot@bot.com')");
						if ((time() - $last_login > C_LOGIN_COUNTER * 60) || $last_login = "")
						{
							$login_counter = $login_counter + 1;
							$DbLink->query("UPDATE ".C_REG_TBL." SET last_login=".time().", login_counter=".$login_counter." WHERE username='$botuser'");
						}
						$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '$botuser', '$Latin1', '$currentbot_time', '$Private', '<FONT color=\"".C_BOT_FONT_COLOR."\">".C_BOT_HELLO."</FONT> <img src=images/smilies/smile30.gif>".C_UPDTUSRS."', '', '')");
			            $fp = fopen($botcontrol, "a") ;               // file will be writen to if user types a trigger word
		                fputs($fp, $Cmd[1]);                      // BUT only the existence of file (or not) is used.
		                fclose($fp) ;
					}
				$IsCommand = true;
				$RefreshMessages = true;
				$CleanUsrTbl = 1;
		       }
       }
	  };
  };
};
};
?>