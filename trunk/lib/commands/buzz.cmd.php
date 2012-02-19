<?php
// Slashes ' and " characters
function SpecialSlash(&$Str)
{
	return str_replace("\"","&quot;",str_replace("'","&#39;",$Str));
}

//if ($status == "a" || $status == "t") // use this line if you only want administrators to be able to use this.
if (($status == "m") || ($status == "t") || ($status == "a")) // use this to enable /buzz for both admins and moderators.
//if (($status == "m") || ($status == "t") || ($status == "a") || ($status == "r")) // use this to enable /buzz for admins, moderators and registered users. Guests can't use it.
{
	if (trim($Cmd[3]) != "")
	{
		$Mess = SpecialSlash($Cmd[3]);

		if (C_USE_SMILIES)
		{
			include("./lib/smilies.lib.php");
			$ss = Check4Smilies($Mess,$SmiliesTbl);
			if(C_EN_STATS && $ss > 0)
			{
				$DbLink->query("UPDATE ".C_STS_TBL." SET smilies_posted=smilies_posted+$ss WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
			}
			unset($SmiliesTbl, $ss);
		};

		if (C_NO_SWEAR && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
		{
			include("./lib/swearing.lib.php");
			$Mess = " ".checkwords($Mess, false, $Charset);
	 		if(C_EN_STATS && isset($Found) && $b>0)
			{
				$DbLink->query("UPDATE ".C_STS_TBL." SET swears_posted=swears_posted+$b WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$R' AND username='$U'");
			}
			unset($Found, $b);
		}
		$Mess .= " ...BUZZER...";
	}
#	if (eregi("~",$Cmd[2]))
	if (strpos($Cmd[2], "~") !== false)
	{
		$Buzz_opt = str_replace("~", "", $Cmd[2]);
		$BUZZ_SOUND_OPT = "sounds/".$Buzz_opt.".wav";
		$L_BUZZ_SND_OPT = "<EMBED SRC=\"".$BUZZ_SOUND_OPT."\" VOLUME=\"50\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Buzz\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$BUZZ_SOUND_OPT."\" LOOP=1></NOEMBED></EMBED>";
		$post = "...BUZZER...".$Mess.$L_BUZZ_SND_OPT ;
	}
	else
	{
		$post = "...BUZZER...".$Mess.L_BUZZ_SND ;
	}
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '".addslashes($U)."', '$Latin1', ".time().", '$Private', '".addslashes($post)."', '', '')");
		$IsCommand = true;
		$RefreshMessages = true;
}
else
{
//	$Error = L_NO_ADMIN; // use this line if you only want administrators to be able to use this.
	$Error = L_NO_MODERATOR; // use this to enable /buzz for both admins and moderators.
//	$Error = L_NO_REG_USER; // use this to enable /buzz for admins, moderators and registered users. Guests can't use it.
};
?>