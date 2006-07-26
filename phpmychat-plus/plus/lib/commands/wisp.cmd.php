<?php

// Check for invalid characters in the addressee name
if (ereg("[\, ]", stripslashes($Cmd[2])))
{
	$Error = L_ERR_USR_16;
}
elseif (trim($Cmd[2]) != "" && trim($Cmd[3]) != "")
{
	$Cmd[3] = "(whisper) ".$Cmd[3];
	$DbLink = new DB;
	$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username='$Cmd[2]' LIMIT 1");
	if($DbLink->num_rows() != 0) list($allowpopup) = $DbLink->next_record();
	$DbLink->clean_results();
if (C_PRIV_POPUP && $allowpopup)
{
	if ($Cmd[2] != $U)
	{
		$Read = "Neww";
	}
	else
	{
		$Read = "Ownw";
	}
}
else
{
	if (C_PRIV_POPUP) $Read = "Neww";
	else  $Read = "Oldw";
}
	$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$Cmd[2]' LIMIT 1");
	list($UR) = $DbLink->next_record();
	if( $UR != "")
	{
	// Check for swear words in the message if necessary
	if (C_NO_SWEAR && $UR != C_NO_SWEAR_ROOM1 && $UR != C_NO_SWEAR_ROOM2 && $UR != C_NO_SWEAR_ROOM3 && $UR != C_NO_SWEAR_ROOM4)
	{
		include("./lib/swearing.lib.php");
		$Cmd[3] = checkwords($Cmd[3], false);
	}
// add this for /away command modification by R Dickow:
         $DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$Cmd[2]'");

         if ($DbLink->num_rows() != 0)
         {
         list($awaystat) = $DbLink->next_record();
         }
         $DbLink->clean_results();
	        if ($awaystat == '1') {
						$Read = "Neww";
						AddMessage(stripslashes($Cmd[3]), $T, $UR, $U, $C, $Cmd[2], $Read);
						$IsCommand = true;
						$RefreshMessages = true;
           	if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_AWAY, special_char($Cmd[2],$Latin1));
        } else {
// end R Dickow /away command modification addition.
 	AddMessage(stripslashes($Cmd[3]), $T, $UR, $U, $C, $Cmd[2], $Read);
	$IsCommand = true;
	$RefreshMessages = true;
	}
}
	else
	{
		$Read = "Neww";
  	AddMessage(stripslashes($Cmd[3])." (Offline)", $T, 'Offline PMs', $U, $C, $Cmd[2], $Read);
		$IsCommand = true;
		$RefreshMessages = true;
		if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_NOT_ONLINE, special_char($Cmd[2],$Latin1));
	}
}
?>