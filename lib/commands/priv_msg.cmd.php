<?php

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
	}
	$Cmd[3] = "(private) ".$Cmd[3];
	$DbLink = new DB;
	$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username='$Cmd[2]' LIMIT 1");
	if($DbLink->num_rows() != 0) list($allowpopup) = $DbLink->next_record();
	$DbLink->clean_results();
if (C_PRIV_POPUP && $allowpopup)
{
	if ($Cmd[2] != $U)
	{
		$Read = "New";
	}
	else
	{
		$Read = "Own";
	}
}
else
{
	if (C_PRIV_POPUP) $Read = "New";
	else  $Read = "Old";
}
	$DbLink->query("SELECT username FROM ".C_USR_TBL." WHERE username='$Cmd[2]' LIMIT 1");
	if($DbLink->num_rows() != 0)
{
// add this for /away command modification by R Dickow:
         $DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$Cmd[2]'");

         if ($DbLink->num_rows() != 0)
         {
         list($awaystat) = $DbLink->next_record();
         }
         $DbLink->clean_results();
	        if ($awaystat == '1') {
					$Read = "New";
					 	AddMessage(stripslashes($Cmd[3]), $T, $R, $U, $C, $Cmd[2], $Read);
						$IsCommand = true;
						$RefreshMessages = true;
						if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_AWAY, special_char($Cmd[2],$Latin1));
        } else {
// end R Dickow /away command modification addition.
 	AddMessage(stripslashes($Cmd[3]), $T, $R, $U, $C, $Cmd[2], $Read);
	$IsCommand = true;
	$RefreshMessages = true;
}
}
else
{
					$Read = "New";
					 	AddMessage(stripslashes($Cmd[3])." (Offline)", $T, 'Offline PMs', $U, $C, $Cmd[2], $Read);
						$IsCommand = true;
						$RefreshMessages = true;
						if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_NOT_ONLINE, special_char($Cmd[2],$Latin1));
}
}
?>