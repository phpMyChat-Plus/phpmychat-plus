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
// Archive and Clean the old messages
if(C_CHAT_LOGS)
{
require("logs.lib.php");
}
// Clean the old messages (without logs)
else
{
$ChatM = new DB;
$ChatM->query("DELETE FROM ".C_MSG_TBL." WHERE m_time<".(time() - C_MSG_DEL * 60 * 60)."");
$ChatM->close();
}
// Clean the lurkers table
if(C_CHAT_LURKING)
{
$ChatLurk = new DB;
$ChatLurk->query("DELETE FROM ".C_LRK_TBL." WHERE time<".(time() - 15)."");
$CleanUsrTbl = ($ChatLurk->affected_rows() > 0);
$ChatLurk->close();
}
// Clean the users table of users who closed their browsers
$Chat = new DB;
$ChatM = new DB;
// Ghost Control mod by Ciprian
$Hide = (C_HIDE_ADMINS && C_HIDE_MODERS) ? "status!= 'a' AND status!= 't' AND status!= 'm' AND " : (C_HIDE_ADMINS ? "status!= 'a' AND status!= 't' AND " : (C_HIDE_MODERS ? "status!='m' AND " : ""));
$Chat->query("SELECT room,username,u_time FROM ".C_USR_TBL." WHERE ".$Hide."username != 'C_BOT_NAME' AND (u_time < ".(time() - 60)." OR (status = 'k' AND u_time <  ".(time() - 20)."))");
while(list($userroom, $userclosed, $usertime) = $Chat->next_record())
{
$when = date('r', $usertime + C_TMZ_OFFSET*60*60);
$userclosed = addslashes($userclosed);
$ChatM->query("SELECT type FROM ".C_MSG_TBL." WHERE username = '$userclosed' AND room = '$userroom' ORDER BY m_time DESC LIMIT 1");
list($usertype) = $ChatM->next_record();
$ChatM->query("INSERT INTO ".C_MSG_TBL." VALUES ('".$usertype."', '".$userroom."', 'SYS exit', '', ".time().", '', 'sprintf(L_CLOSED_ROM, \"($when) $userclosed\")', '', '')");
$ChatM->query("DELETE FROM ".C_USR_TBL." WHERE username='".$userclosed."'");
$CleanUsrTbl = ($ChatM->affected_rows() > 0);
$highpath = "botfb/" .$userclosed;         // file is in DIR "botfb" and called "username"
if (file_exists($highpath)) unlink($highpath); // checks to see if user file exists.
                                     // if it does delete it.
$botpath = "botfb/" .$userclosed. ".txt";   // file is in DIR "botfb" and called "username.txt"
if (file_exists($botpath)) unlink($botpath); // checks to see if user file exists.
};
$Chat->close();
$ChatM->close();
// Autoboot feature
if(C_CHAT_BOOT)
{
	if($U != '')
	{
	$ChatU = new DB;
	$CondForQueryM = "(username='$U' OR message='stripslashes(sprintf(L_ENTER_ROM, \"".$U."\"))' OR message='stripslashes(sprintf(L_ENTER_ROM_NOSOUND, \"".$U."\"))' OR ((username='SYS welcome' OR username LIKE 'SYS top%' OR username='SYS room' OR username='SYS image' OR username='SYS dice1' OR username='SYS dice2' OR username='SYS dice3' OR username='SYS away') AND address='$U'))";
	$ChatU->query("SELECT type,m_time,room FROM ".C_MSG_TBL." WHERE ".$CondForQueryM." ORDER BY m_time DESC LIMIT 1");
	list($m_type, $m_time, $m_room) = $ChatU->next_record();
	$ChatU->clean_results();
	$CondForQueryU = "status!='a' AND status!='t' AND status!='m' AND username='$U' AND username!='C_BOT_NAME' AND awaystat='0' AND (u_time > ".($m_time + C_USR_DEL * 60)." OR (status ='k' AND u_time <  ".(time() - 20)."))";
	$ChatU->query("DELETE FROM ".C_USR_TBL." WHERE ".$CondForQueryU."");
	if($ChatU->affected_rows() > 0)
	{
	$CleanUsrTbl = ($ChatU->affected_rows() > 0);
	$ChatU->query("INSERT INTO ".C_MSG_TBL." VALUES ('".$m_type."', '".$m_room."', 'SYS exit', '', ".time().", '', 'sprintf(L_BOOT_ROM, \"$U\")', '', '')");
	$ChatU = '';
	$botpath = "botfb/" .$U;         // file is in DIR "botfb" and called "username"
	if (file_exists($botpath)) unlink($botpath); // checks to see if user file exists.
	                                     // if it does delete it.
	$botpathbot = "botfb/" .$U. ".txt";   // file is in DIR "botfb" and called "username.txt"
	if (file_exists($botpathbot)) unlink($botpathbot); // checks to see if user file exists.
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	if (window.parent.frames['loader'] && !window.parent.frames['loader'].closed)
	{
		if (typeof(window.parent.leaveChat) != 'undefined') window.parent.leaveChat = true;
		window.parent.frames['loader'].close();
	};
	window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&EN=$T&BT=1"); ?>';
	// -->
	</SCRIPT>
	<?php
	exit();
	}
	$ChatU->close();
	}
}
// Clean users table of disconnected users
else
{
	$Chat->query("DELETE FROM ".C_USR_TBL." WHERE u_time<".(time() - C_USR_DEL * 60)." OR (status='k' AND u_time<".(time() - 20).")");
	$CleanUsrTbl = ($Chat->affected_rows() > 0);
	$Chat->close();
}
?>