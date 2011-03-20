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
		$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$Cmd[2]' AND room='$R'");
		list($UR) = $DbLink->next_record();
		if( $UR != $R && $UR != "")
		{
			$Error = sprintf(L_PRIV_NOT_INROOM, special_char($Cmd[2],$Latin1), special_char($Cmd[2],$Latin1));
		}
		// Check for invalid characters in the addressee name
		elseif (ereg("[\, \']", stripslashes($Cmd[2])))
		{
			$Error = L_ERR_USR_16;
		}
		elseif (mb_convert_case($U,MB_CASE_LOWER,$Charset) == mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset))
		{
			$Error = L_ERR_USR_27;
		}
		elseif (mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset) == mb_convert_case(C_QUOTE_NAME,MB_CASE_LOWER,$Charset))
		{
			$Error = L_ERR_USR_1;
		}
		elseif (trim($Cmd[2]) != "" && trim($Cmd[3]) != "")
		{
			// Check for swear words in the message if necessary
			if (C_NO_SWEAR && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
			{
				include("./lib/swearing.lib.php");
				$Cmd[3] = checkwords($Cmd[3], false, $Charset);
		 		if(C_EN_STATS && isset($Found) && $b>0)
				{
					$DbLink->query("UPDATE ".C_STS_TBL." SET swears_posted=swears_posted+$b WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
				}
				unset($Found, $b);
			}
			$Cmd[3] = "L_PRIV_PM ".$Cmd[3];
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
					 if ($allowpopupu || stristr(mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset), mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset))) $Read = "New";
					 else $Read = "Old";
			}
			else
			{
				$Read = "Old";
			}
			$DbLink->query("SELECT username FROM ".C_USR_TBL." WHERE username='$Cmd[2]'");
			if($DbLink->num_rows() != 0)
			{
				// add this for /away command modification by R Dickow:
				$DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$Cmd[2]'");

				if ($DbLink->num_rows() != 0)
				{
					list($awaystat) = $DbLink->next_record();
				}
				$DbLink->clean_results();
				if ($awaystat == 1) {
					$Read = "New";
					AddMessage(stripslashes($Cmd[3]), $T, $R, $U, $C, $Cmd[2], $Read, '', $Charset);
					$IsCommand = true;
					$RefreshMessages = true;
					if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_AWAY, special_char($Cmd[2],$Latin1));
				} else {
				// end R Dickow /away command modification addition.
				AddMessage(stripslashes($Cmd[3]), $T, $R, $U, $C, $Cmd[2], $Read, '', $Charset);
				if (stristr(mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset), mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset))) include "lib/bot_priv.lib.php";
				$IsCommand = true;
				$RefreshMessages = true;
				}
			}
			elseif(stristr(mb_convert_case(trim($Cmd[2]),MB_CASE_LOWER,$Charset), mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset)))
			{
				$Error = sprintf(L_NOT_ONLINE, special_char($Cmd[2],$Latin1));
			}
			else
			{
				$Read = "New";
				AddMessage(stripslashes($Cmd[3])." (Offline)", $T, 'Offline PMs', $U, $C, $Cmd[2], $Read, $R, $Charset);
				$IsCommand = true;
				$RefreshMessages = true;
				if(C_PRIV_POPUP) $Error = sprintf(L_PRIV_NOT_ONLINE, special_char($Cmd[2],$Latin1));
				else $Error = sprintf(L_NOT_ONLINE, special_char($Cmd[2],$Latin1));
			};
	 		if(C_EN_STATS)
			{
				$DbLink->query("UPDATE ".C_STS_TBL." SET pms_sent=pms_sent+1 WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
			}
			unset($Found, $b);
			$M1 = $Cmd[0];
		};
	};
};
?>