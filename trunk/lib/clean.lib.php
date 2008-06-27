<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Clean the buzz sounds after play
$ChatS = new DB;
$ChatS->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE '%<B>[Buzzz...]%' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
if ($ChatS->num_rows() > 0)
{
	list($Buzz) = $ChatS->next_record();
	$To_remove = strstr($Buzz, "<EMBED SRC=");
	$Buzz_new = rtrim(str_replace($To_remove,"",$Buzz));
	$ChatS->query("UPDATE ".C_MSG_TBL." SET message = '".$Buzz_new."' WHERE message='$Buzz' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
	$RefreshMessages = true;
}

// Clean the entrance sounds after play
$ChatS->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE 'stripslashes(sprintf(L_ENTER_ROM,%' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
if ($ChatS->num_rows() > 0)
{
	list($Hello) = $ChatS->next_record();
	$Hello_new = rtrim(str_replace("L_ENTER_ROM","L_ENTER_ROM_NOSOUND",$Hello));
	$ChatS->query("UPDATE ".C_MSG_TBL." SET message = '".$Hello_new."' WHERE message='$Hello' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
	$RefreshMessages = true;
}

// Clean the welcome sounds after play
$ChatS->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE 'sprintf(WELCOME_MSG)' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
if ($ChatS->num_rows() > 0)
{
	list($Welcome) = $ChatS->next_record();
	$Welcome_new = rtrim(str_replace("WELCOME_MSG","WELCOME_MSG_NOSOUND",$Welcome));
	$ChatS->query("UPDATE ".C_MSG_TBL." SET message='".$Welcome_new."' WHERE message='$Welcome' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
	$RefreshMessages = true;
}
$ChatS->close();

$ChatM = new DB;
// Archive and Clean the old messages
if(C_CHAT_LOGS)
{
	require("lib/logs.lib.php");
}
// Clean the old messages (without logs)
else
{
	$ChatM->query("DELETE FROM ".C_MSG_TBL." WHERE ((m_time < ".(time() - C_MSG_DEL * 60 * 60)." AND pm_read NOT LIKE 'New%') OR (m_time > ".(time() - ((C_MSG_DEL + (C_PM_KEEP_DAYS * 24)) * 60 * 60)).")) AND !(username = 'SYS enter' AND message LIKE '%\"".C_BOT_NAME."\"%')");
}

// Clean the lurkers table
if(C_CHAT_LURKING)
{
	$ChatLurk = new DB;
	$ChatLurk->query("DELETE FROM ".C_LRK_TBL." WHERE time<".(time() - 15)."");
	$CleanUsrTbl = ($ChatLurk->affected_rows() > 0);
	$ChatLurk->close();
}

	$Chat = new DB;
	$Chat->query("SELECT room,username,u_time,status FROM ".C_USR_TBL." WHERE username != '".C_BOT_NAME."' AND (u_time < ".(time() - 60)." OR (status = 'k' AND u_time <  ".(time() - 20)."))");
	while(list($userroom, $userclosed, $usertime, $statusclosed) = $Chat->next_record())
	{
//		$when = date('r', $usertime + C_TMZ_OFFSET*60*60);
		$when = $usertime + C_TMZ_OFFSET*60*60;
		if (eregi("win", PHP_OS)) $when = '\".utf_conv(WIN_DEFAULT,$Charset,strftime(L_SHORT_DATETIME,'.$when.')).\"';
		else $when = "\".strftime(L_LONG_DATETIME,".$when.").\"";
		$userclosed = addslashes($userclosed);
		$ChatM->query("SELECT type FROM ".C_MSG_TBL." WHERE username = '$userclosed' AND room = '$userroom' ORDER BY m_time DESC LIMIT 1");
		list($usertype) = $ChatM->next_record();
		// Ghost Control mod by Ciprian
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = "";
			$sghosts = eregi_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = eregi_replace(" AND username != ",",",$sghosts);
		}
 		if (($sghosts != "" && ghosts_in($userclosed, $sghosts, $Charset)) || (C_HIDE_ADMINS && ($statusclosed == "a" || $statusclosed == "t")) || (C_HIDE_MODERS && $statusclosed == "m")) {}
		else $ChatM->query("INSERT INTO ".C_MSG_TBL." VALUES ('".$usertype."', '".$userroom."', 'SYS exit', '', ".time().", '', 'sprintf(L_CLOSED_ROM, \"($when) $userclosed\")', '', '')");
		$ChatM->query("DELETE FROM ".C_USR_TBL." WHERE username='".$userclosed."'");
		$CleanUsrTbl = ($ChatM->affected_rows() > 0);
		$highpath = "botfb/" .$userclosed;         // file is in DIR "botfb" and called "username"
		if (file_exists($highpath)) unlink($highpath); // checks to see if user file exists.
		                                     // if it does delete it.
		$botpath = "botfb/" .$userclosed. ".txt";   // file is in DIR "botfb" and called "username.txt"
		if (file_exists($botpath)) unlink($botpath); // checks to see if user file exists.
	}
	$ChatM->close();

	// Clean users table of disconnected users if booting is disabled
if(!C_CHAT_BOOT && !$CleanUsrTbl)
{
	$Chat->query("DELETE FROM ".C_USR_TBL." WHERE username != '".C_BOT_NAME."' AND (u_time<".(time() - C_USR_DEL * 60)." OR (status='k' AND u_time<".(time() - 20)."))");
	$CleanUsrTbl = ($Chat->affected_rows() > 0);
	$Chat->close();
}
?>