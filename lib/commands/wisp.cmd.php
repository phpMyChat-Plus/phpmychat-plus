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

if (!C_ENABLE_PM)
{
	$Error = PM_DISABLED_ERROR;
}
else
{
	$DbLink->query("SELECT username FROM ".C_REG_TBL." WHERE username='$Cmd[2]'");
	if(C_REQUIRE_REGISTER && $DbLink->num_rows() == 0)
	{
		$Error = sprintf(L_NONREG_USER, $Cmd[2]);
	}
	else
	{
		// Check for invalid characters in the addressee name
		if (ereg("[\, \']", stripslashes($Cmd[2])))
		{
			$Error = L_ERR_USR_16;
		}
		elseif (eregi(mb_convert_case($U,MB_CASE_LOWER,$Charset), mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset)))
		{
			$Error = L_ERR_USR_27;
		}
		elseif (trim($Cmd[2]) != "" && trim($Cmd[3]) != "")
		{
			$Cmd[3] = "(whisper) ".$Cmd[3];
			if (C_PRIV_POPUP && !isset($allowpopupu))
			{
				$DbLink = new DB;
				$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username = '$Cmd[2]'");
				if($DbLink->num_rows() != 0) list($allowpopupu) = $DbLink->next_record();
				else $allowpopupu = 0;
				$DbLink->clean_results();
			}
			if (C_PRIV_POPUP)
			{
					 if ($allowpopupu || eregi(mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset), mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset))) $Read = "Neww";
					 else $Read = "Oldw";
			}
			else
			{
					$Read = "Oldw";
			}
			$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$Cmd[2]'");
			list($UR) = $DbLink->next_record();
			if($UR != "")
			{
				// Check for swear words in the message if necessary
				if (C_NO_SWEAR && $UR != C_NO_SWEAR_ROOM1 && $UR != C_NO_SWEAR_ROOM2 && $UR != C_NO_SWEAR_ROOM3 && $UR != C_NO_SWEAR_ROOM4)
				{
					include("./lib/swearing.lib.php");
					$Cmd[3] = checkwords($Cmd[3], false, $Charset);
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
					AddMessage(stripslashes($Cmd[3]), $T, $UR, $U, $C, $Cmd[2], $Read, $R, $Charset);
					$IsCommand = true;
					$RefreshMessages = true;
				  if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_AWAY, special_char($Cmd[2],$Latin1));
			  } else {
				// end R Dickow /away command modification addition.
			 	AddMessage(stripslashes($Cmd[3]), $T, $UR, $U, $C, $Cmd[2], $Read, $R, $Charset);
				if (eregi(mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset), mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset))) include "lib/bot_priv.lib.php";
				$IsCommand = true;
				$RefreshMessages = true;
							 }
			}
			elseif(eregi(mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset), mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset)))
			{
				$Error = sprintf(L_NOT_ONLINE, special_char($Cmd[2],$Latin1));
			}
			else
			{
				$Read = "Neww";
			  AddMessage(stripslashes($Cmd[3])." (Offline)", '1', 'Offline PMs', $U, $C, $Cmd[2], $Read, $R, $Charset);
				$IsCommand = true;
				$RefreshMessages = true;
				if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_NOT_ONLINE, special_char($Cmd[2],$Latin1));
				else $Error = sprintf(L_NOT_ONLINE, special_char($Cmd[2],$Latin1));
			};
		};
	};
};
?>