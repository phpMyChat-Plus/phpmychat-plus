<?php
if (!C_BOT_CONTROL)
{
	$Error = BOT_DISABLED_ERROR;
}
else
{
$botcontrol ="botfb/$R.txt";

function room_in($what, $in)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp($what, $room_name) == 0) return true;
	}
	return false;
}

$UU = $Cmd[1];

// Check for invalid characters
if (ereg("[\, ]", stripslashes($UU)))
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
		if (($password != $PWD_Hash) || (($perms != "moderator")&&($perms != "admin")) || (($perms == "moderator")&&(!room_in(stripslashes($R), $rooms))))
		{
			$Error = L_NO_MODERATOR;
		}
		else
		{
		  if($Cmd[1] == "stop")
		  {
		       if (file_exists($botcontrol))
		       {
		       	  $botuser = C_BOT_NAME;
		       	  $DbLink->query("DELETE FROM ".C_USR_TBL." WHERE username='$botuser' AND room='$R'");
              $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '$botuser', '$Latin1', ".time().", '$Private', '<FONT color=".C_BOT_FONT_COLOR.">".C_BOT_BYE."</FONT> <img src=images/smilies/smile10.gif>".C_UPDTUSRS."', '', '')");
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
      	             $botuser = C_BOT_NAME;
		     $DbLink->query("INSERT INTO ".C_USR_TBL." VALUES ('$R','$botuser', '$Latin1', '9999999999', '$status','$IP', '0', ".time().")");
		     $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '$botuser', '$Latin1', ".time().", '$Private', '<FONT color=".C_BOT_FONT_COLOR.">".C_BOT_HELLO."</FONT> <img src=images/smilies/smile30.gif>".C_UPDTUSRS."', '', '')");
	             $fp = fopen($botcontrol, "a") ;               // file will be writen to if user types a trigger word
                     fputs($fp, $Cmd[1]);                      // BUT only the existence of file (or not) is used.
                     fclose($fp) ;
				$IsCommand = true;
				$RefreshMessages = true;
		       }
       }
	  };
  };
};
};
?>