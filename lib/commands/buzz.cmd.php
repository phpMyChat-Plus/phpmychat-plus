<?php
// Slashes ' and " characters
function SpecialSlash(&$Str)
{
	return str_replace("\"","&quot;",str_replace("\'","&#39;",$Str));
}

//if ($status == "a" || $status == "t") // use this line if you only want administrators to be able to use this.
if (($status == "m") || ($status == "t") || ($status == "a")) // use this to enable /buzz for both admins and moderators.
//if (($status == "m") || ($status == "t") || ($status == "a") || ($status == "r")) // use this to enable /buzz for admins, moderators and registered users. Guests can't use it.
{
	if (trim($Cmd[2]) != "")
	{
		$Mess = SpecialSlash($Cmd[2]);
		if (C_NO_SWEAR && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
		{
		include("./lib/swearing.lib.php");
		$Mess = checkwords($Mess, false);
		}
/*
				if (C_USE_SMILIES)
				{
					include("./lib/smilies.lib.php");
					Check4Smilies($Mess,$SmiliesTbl);
					unset($SmiliesTbl);
				};
*/
	}
	if (eregi("~",$Cmd[1]))
	{
		$Buzz_opt = eregi_replace("~", "", $Cmd[1]);
		$BUZZ_SOUND_OPT = "sounds/".$Buzz_opt.".wav";
		$L_BUZZ_SND_OPT = "<EMBED SRC=".$BUZZ_SOUND_OPT." HIDDEN=true AUTOSTART=true LOOP=false NAME=Buzz MASTERSOUND><NOEMBED><BGSOUND SRC=".$BUZZ_SOUND_OPT." LOOP=1></NOEMBED></EMBED>";
		if (COLOR_CD) $M = "<font color=".COLOR_CD."><B>[Buzzz...]</B> </font>" . $Mess . $L_BUZZ_SND_OPT ;
		else $M = "<B>[Buzzz...]</B> " . $Mess . $L_BUZZ_SND_OPT ;
	}
	else
	{
		if (COLOR_CD) $M = "<font color=".COLOR_CD."><B>[Buzzz...]</B> </font>" . $Mess . L_BUZZ_SND ;
		else 	  $M = "<B>[Buzzz...]</B> " . $Mess . L_BUZZ_SND ;
	}
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '".addslashes($U)."', '$Latin1', ".time().", '$Private', '".addslashes($M)."', '', '')");
		$IsCommand = true;
		$RefreshMessages = true;
}
else
{
	$Error = L_NO_REG_USER;
};

?>
