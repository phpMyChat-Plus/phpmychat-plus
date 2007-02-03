<?php

//if ($status == "a") // use this line if you only want administrators to be able to use this.
if (($status == "m") OR ($status == "a")) // use this to enable /buzz for both admins and moderators.
//if (($status == "m") OR ($status == "a") OR ($status == "r")) // use this to enable /buzz for admins, moderators and registered users. Guests can't use it.
{
	if (eregi("~",$Cmd[1]))
	{
		$Buzz_opt = eregi_replace("~", "", $Cmd[1]);
		$BUZZ_SOUND_OPT = "sounds/".$Buzz_opt.".wav";
		$L_BUZZ_SND_OPT = "<EMBED SRC=".$BUZZ_SOUND_OPT." HIDDEN=true AUTOSTART=true LOOP=false NAME=Buzz MASTERSOUND><NOEMBED><BGSOUND SRC=".$BUZZ_SOUND_OPT." LOOP=1></NOEMBED></EMBED>";
	  $M = "<B>[Buzzz... Signal]</B> " . $Cmd[2] . $L_BUZZ_SND_OPT ;
	}
	else
	{
	  $M = "<B>[Buzzz... Signal]</B> " . $Cmd[2] . L_BUZZ_SND ;
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
