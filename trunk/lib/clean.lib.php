<?php
// Get the names and values for vars sent to this script
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};
// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset == "iso-8859-1");
$ChatS = new DB;
$ChatS->query("DELETE FROM ".C_MSG_TBL." WHERE message = '<B>[Buzzz... Signal]</B>' AND m_time<".(time()-60)."");
$ChatS->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE '<B>[Buzzz... Signal]%' AND m_time<".(time()-10)." ORDER BY m_time DESC LIMIT 1");
if ($ChatS->num_rows() > 0)
{
	list($Buzz) = $ChatS->next_record();
	$To_remove = strstr($Buzz, "<EMBED SRC=");
	$Buzz_new = rtrim(str_replace($To_remove,"",$Buzz));
	$ChatS->query("UPDATE ".C_MSG_TBL." SET message = '".$Buzz_new."' WHERE message = '$Buzz' AND m_time<".(time()-8)." ORDER BY m_time DESC LIMIT 1");
	$IsCommand = true;
	$RefreshMessages = true;
}
$ChatS->close();
if(C_CHAT_LOGS)
{
require("logs.lib.php");
}
else
{
$ChatM = new DB;
$ChatM->query("DELETE FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL * 60 * 60)."");
$CleanUsrTbl = ($ChatM->affected_rows() > 0);
$CleanUsrTbl = '';
$ChatM->close();
}
if(C_CHAT_LURKING)
{
$ChatLurk = new DB;
$ChatLurk->query("DELETE FROM ".C_LRK_TBL." WHERE time < ".(time() - 15)."");
$ChatLurk->close();
}
$Chat = new DB;
$ChatM = new DB;
$Chat->query("SELECT room,username,u_time FROM ".C_USR_TBL." WHERE username != '".C_BOT_NAME."' AND (u_time < ".(time() - 60)." OR (status = 'k' AND u_time <  ".(time() - 20)."))");
while(list($userroom, $userclosed, $usertime) = $Chat->next_record())
{
$when = date('r', $usertime + C_TMZ_OFFSET*60*60);
$userclosed = addslashes($userclosed);
$ChatM->query("INSERT INTO ".C_MSG_TBL." VALUES ('1', '".$userroom."', 'SYS exit', '', ".time().", '', 'sprintf(L_CLOSED_ROM, \"($when) $userclosed\")', '', '')");
$ChatM->query("DELETE FROM ".C_USR_TBL." WHERE username='".$userclosed."'");
};
$Chat->close();
$ChatM->close();
if($U != '')
{
$ChatU = new DB;
$CondForQueryM = "(username='$U' OR (username='SYS image' AND address='$U') OR message = 'stripslashes(sprintf(L_ENTER_ROM, \"".$U."\"))' OR (username='SYS welcome' AND address = '$U') OR ((username='SYS dice1' OR username='SYS dice2' OR username='SYS dice3') AND address = '$U'))";
$ChatU->query("SELECT m_time,room FROM ".C_MSG_TBL." WHERE ".$CondForQueryM." ORDER BY m_time DESC LIMIT 1");
list($m_time,$room) = $ChatU->next_record();
$ChatU->clean_results();
$CondForQueryU = "(status != 'a' AND status != 'm' AND username='$U' AND awaystat='0' AND username!='".C_BOT_NAME."') AND (u_time > ".($m_time + C_USR_DEL * 60)." OR (status = 'k' AND u_time <  ".(time() - 20)."))";
$ChatU->query("DELETE FROM ".C_USR_TBL." WHERE ".$CondForQueryU."");
$CleanUsrTbl = ($ChatU->affected_rows() > 0);
if($ChatU->affected_rows() > 0)
{
$ChatU->query("INSERT INTO ".C_MSG_TBL." VALUES ('1', '".$room."', 'SYS exit', '', ".time().", '', 'sprintf(L_BOOT_ROM, \"$U\")', '', '')");
$ChatU->query("INSERT INTO ".C_MSG_TBL." VALUES ('1', '".$room."', 'SYS exit', '', ".time().", '', 'sprintf(L_EXIT_ROM, \"$U\")', '', '')");
$ChatU = '';
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
if (window.parent.frames['loader'] && !window.parent.frames['loader'].closed)
{
	if (typeof(window.parent.leaveChat) != 'undefined') window.parent.leaveChat = true;
	window.parent.frames['loader'].close();
};

window.parent.window.location = '<?php echo("$From?Ver=$Ver&L=$L&U=".urlencode(stripslashes($U))."&O=$O&ST=$ST&NT=$NT&E=".urlencode(stripslashes($R))."&EN=$T"); ?>';
// -->
</SCRIPT>
<?php
exit();
}
$ChatU->close();
}
?>