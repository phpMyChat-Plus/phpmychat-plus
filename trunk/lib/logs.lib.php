<?php
// logs.lib.php
// All credits for this feature go to Ciprian

function RecursiveMkdir($path)
{
       if (!file_exists($path))
       {
					RecursiveMkdir(dirname($path));
					$old_umask = umask(0);
					mkdir($path, 0777);
					umask($old_umask);
       }
}

$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
mysql_select_db(C_DB_NAME);

$sql = "SELECT * FROM ".C_MSG_TBL." WHERE (m_time < ".(time() - C_MSG_DEL*60*60)." AND username != '".C_QUOTE_NAME."' AND pm_read != 'New' AND pm_read != 'Neww') ORDER BY m_time DESC";
$query = mysql_query($sql) or die("Cannot query the database.<br />" . mysql_error());
// Collect and store new messages
$Messages = Array();
$i = 1;
while($result = mysql_fetch_array($query))
{
$m_time = stripslashes($result["m_time"]);
$time_posted = date('H:i:s (d)', $m_time + C_TMZ_OFFSET*60*60);
$room = htmlspecialchars(stripslashes($result["room"]));
if ($room == '*') $room = '<?php echo(L_ROOM_ALL); ?>';
$roomfrom = htmlspecialchars(stripslashes($result["room_from"]));
if ($roomfrom != "" && $roomfrom != $room) $room = $room."<br /> ".$roomfrom;
$username = htmlspecialchars(stripslashes($result["username"]));
$address = htmlspecialchars(stripslashes($result["address"]));
if ($address != "" && $address != " *" && $username != "SYS welcome" && $username != "SYS topic" && $username != "SYS topic reset" && substr($username,0,8) != "SYS dice" && $username != "SYS image" && $username != "SYS room" && $username != $address) $toaddress = " to <b>".$address."</b>";
$address = "<b>".$address."</b>";
if ($username == "SYS welcome") $username = $address;
$message = stripslashes($result["message"]);
$message = str_replace("src=images","src=../../../images",$message);
$message = str_replace("<!-- UPDTUSRS //-->","",$message);
if (eregi("stripslashes",$message) || eregi("sprintf",$message) || eregi("L_",$message))
{
	$message = "<?php echo(".$message."); ?>";
}
$message = urldecode($message);
$message = str_replace("links.php?link=","../../../links.php?link=",$message);
$message = str_replace("target=\"_blank\"></a>","target=\"_blank\">Click here</a>",$message);
$message = str_replace('alt="Send email"','target="_blank" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>"',$message);
$NewMsg = "\r\n<tr>\r\n<td valign=top nowrap=\"nowrap\">".$time_posted."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsg .= $room."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsg .= "<b>".$username."</b>";
$NewMsg .= $toaddress."</td>\r\n<td valign=top>";
if ($username == "SYS topic")
{
	$NewMsg .= $address;
	$NewMsg .= ' <?php echo(L_TOPIC); ?> ';
	$NewMsg .= $message;
}
elseif ($username == "SYS topic reset")
{
	$NewMsg .= $address;
	$NewMsg .= ' <?php echo(L_TOPIC_RESET); ?> ';
}
elseif ($username == "SYS image")
{
	$NewMsg .= '<?php echo(L_PIC); ?> ';
	$NewMsg .= $address.": <A href=\"".$message."\" onMouseOver=\"window.status='";
	$NewMsg .= '<?php echo(sprintf(L_CLICK,L_FULLSIZE_PIC)) ?>.\'; return true" title="';
	$NewMsg .= '<?php echo(sprintf(L_CLICK,L_FULLSIZE_PIC)) ?>" target=_blank>';
	$NewMsg .= $message."</A>";
}
elseif ($username == "SYS announce")
{
	$NewMsg .= '<b><?php echo(L_ANNOUNCE); ?>: </b>';
	$NewMsg .= $message;
}
elseif ($username == "SYS room")
{
	$NewMsg .= '<b><?php echo(ROOM_SAYS); ?> </b>';
	$NewMsg .= $message;
}
elseif (substr($username,0,8) == "SYS dice")
{
	$NewMsg .= $address;
	$NewMsg .= ' <?php echo(DICE_RESULTS); ?><br />';
	$NewMsg .= $message;
}
else
{
	$NewMsg .= $message;
}
$Messages[] = $NewMsg."</td>\r\n</tr>";
$toaddress = '';
$i++;
}

//Archive feature
if ($i > 1)
{
$today = date('d-m-y H:i:s', time() + C_TMZ_OFFSET*60*60);
$lastsql = "SELECT * FROM ".C_MSG_TBL." WHERE (m_time < ".(time() - C_MSG_DEL*60*60)." AND username != '".C_QUOTE_NAME."') ORDER BY m_time ASC LIMIT 1";
$lastquery = mysql_query($lastsql) or die("Cannot query the database.<br />" . mysql_error());
while($lastresult = mysql_fetch_array($lastquery))
{
 $lastm_time = stripslashes($lastresult["m_time"]);
}
$mess_time = $lastm_time + C_TMZ_OFFSET*60*60;
$year = date("Y", $lastm_time);
$month = date("M", $lastm_time);
$day = date("d", $lastm_time);
	 if (!file_exists("./".C_LOG_DIR."/index.html")) copy("./config/index/index.html","./".C_LOG_DIR."/index.html");
   if (!file_exists("./".C_LOG_DIR."/".$year.""))
   {
      RecursiveMkdir("./".C_LOG_DIR."/".$year."");
			copy("./config/index/index/index.html","./".C_LOG_DIR."/".$year."/index.html");
   }
   if (!file_exists("./".C_LOG_DIR."/".$year."/".$month.""))
   {
      RecursiveMkdir("./".C_LOG_DIR."/".$year."/".$month."");
			copy("./config/index/index/index/index.html","./".C_LOG_DIR."/".$year."/".$month."/index.html");
   }
$logpath = "./".C_LOG_DIR."/".$year."/".$month."/".$year.$month.$day.".php"  ;

	if (!file_exists($logpath))
	{
		@copy("./".C_LOG_DIR."/header.html",$logpath);
		$fp = fopen($logpath, "a") ;
		@flock($fp, LOCK_EX);    // Lock file in exclusive mode
		@fwrite($fp, sprintf("\r\n<div align=\"left\"><span dir=\"LTR\" style=\"font-weight: 800; color:#00008B; font-family: helvetica, arial, geneva, sans-serif; font-size: 12pt\"><?php echo(sprintf(A_CHAT_LOGS_23,strftime(L_LONG_DATETIME,".$mess_time."))); ?></span></div>\r\n</center>\r\n"));
		@fwrite($fp, sprintf("\r\n<!-- MESSAGES TABLE STARTS BELLOW -->\r\n\r\n<table border=1 cellspacing=0 cellpading=1>\r\n<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">\r\n<td nowrap=\"nowrap\"><?php echo (A_POST_TIME); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_CHTEX_ROOM); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_FROM_TO); ?></td>\r\n<td><?php echo (A_CHTEX_MSG); ?></td>\r\n</tr>"));
	}
	else
	{
		$fp = fopen($logpath, "a") ;
		@flock($fp, LOCK_EX);
	}
$message_nb = count($Messages);
for ($i = 0; $i < $message_nb; $i++)
{
	@fwrite($fp, sprintf($Messages[$message_nb-1-$i]));
};
@flock($fp, LOCK_UN);
fclose($fp) ;
$done = 1;
$i = 0;
}

$CondForQuery	= "(m_time < ".(time() - C_MSG_DEL*60*60)." AND (address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3'))) AND pm_read != 'New' AND pm_read != 'Neww')";
$sqlu = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC";
$queryu = mysql_query($sqlu) or die("Cannot query the database.<br />" . mysql_error());
// Collect and store new messages
$Messages = Array();
$iu = 1;
while($resultu = mysql_fetch_array($queryu))
{
$m_timeu = stripslashes($resultu["m_time"]);
$time_postedu = date('H:i:s (d)', $m_timeu + C_TMZ_OFFSET*60*60);
$roomu = htmlspecialchars(stripslashes($resultu["room"]));
if ($roomu == '*') $roomu = '<?php echo(L_ROOM_ALL); ?>';
$usernameu = htmlspecialchars(stripslashes($resultu["username"]));
$addressu = htmlspecialchars(stripslashes($resultu["address"]));
if ($addressu != "" && $addressu != " *" && $usernameu != "SYS welcome" && $usernameu != "SYS topic" && $usernameu != "SYS topic reset" && substr($usernameu,0,8) != "SYS dice" && $usernameu != "SYS image" && $usernameu != "SYS room" && $usernameu != $addressu) $toaddressu = " to <b>".$addressu."</b>";
$addressu = "<b>".$addressu."</b>";
if ($usernameu == "SYS welcome") $usernameu = $addressu;
$messageu = stripslashes($resultu["message"]);
$messageu = str_replace("src=images","src=../../../images",$messageu);
$messageu = str_replace("<!-- UPDTUSRS //-->","",$messageu);
if (eregi("stripslashes",$messageu) || eregi("sprintf",$messageu) || eregi("L_",$messageu))
{
	$messageu = '<?php echo('.$messageu.'); ?>';
}
$messageu = urldecode($messageu);
$messageu = str_replace("links.php?link=","../../../links.php?link=",$messageu);
$messageu = str_replace("target=\"_blank\"></a>","target=\"_blank\">Click here</a>",$messageu);
$messageu = str_replace('alt="Send email"','target="_blank" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>"',$messageu);
$NewMsgu = "\r\n<tr>\r\n<td valign=top nowrap=\"nowrap\">".$time_postedu."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsgu .= $roomu."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsgu .= "<b>".$usernameu."</b>";
$NewMsgu .= $toaddressu."</td>\r\n<td valign=top>";
if ($usernameu == "SYS topic")
{
	$NewMsgu .= $addressu;
	$NewMsgu .= ' <?php echo(L_TOPIC); ?> ';
	$NewMsgu .= $messageu;
}
elseif ($usernameu == "SYS topic reset")
{
	$NewMsgu .= $addressu;
	$NewMsgu .= ' <?php echo(L_TOPIC_RESET); ?> ';
}
elseif ($usernameu == "SYS image")
{
	$NewMsgu .= '<?php echo(L_PIC); ?> ';
	$NewMsgu .= '<?php echo(L_PIC); ?> ';
	$NewMsgu .= $addressu.": <A href=\"".$messageu."\" onMouseOver=\"window.status='";
	$NewMsgu .= '<?php echo(sprintf(L_CLICK,L_FULLSIZE_PIC)) ?>.\'; return true" title="';
	$NewMsgu .= '<?php echo(sprintf(L_CLICK,L_FULLSIZE_PIC)) ?>" target=_blank>';
	$NewMsgu .= $messageu."</A>";
}
elseif ($usernameu == "SYS announce")
{
	$NewMsgu .= '<b><?php echo(L_ANNOUNCE); ?>: </b>';
	$NewMsgu .= $message;
}
elseif ($usernameu == "SYS room")
{
	$NewMsgu .= '<b><?php echo(ROOM_SAYS); ?> </b>';
	$NewMsgu .= $messageu;
}
elseif (substr($usernameu,0,8) == "SYS dice")
{
	$NewMsgu .= $addressu;
	$NewMsgu .= ' <?php echo(DICE_RESULTS); ?><br />';
	$NewMsgu .= $messageu;
}
else
{
	$NewMsgu .= $messageu;
}
$Messagesu[] = $NewMsgu."</td>\r\n</tr>";
$toaddressu = '';
$iu++;
}

//Archive feature
if ($iu > 1)
{
$todayu = date('d-m-y H:i:s', time() + C_TMZ_OFFSET*60*60);
$lastsqlu = "SELECT * FROM ".C_MSG_TBL." WHERE (m_time < ".(time() - C_MSG_DEL*60*60)." AND username != '".C_QUOTE_NAME."') ORDER BY m_time DESC LIMIT 1";
$lastqueryu = mysql_query($lastsqlu) or die("Cannot query the database.<br />" . mysql_error());
while($lastresultu = mysql_fetch_array($lastqueryu))
{
 $lastm_timeu = stripslashes($lastresultu["m_time"]);
}
$mess_timeu = $lastm_timeu + C_TMZ_OFFSET*60*60;
$yearu = date("Y", $lastm_timeu);
$monthu = date("M", $lastm_timeu);
$dayu = date("d", $lastm_timeu);
	 if (file_exists("./logs") && !file_exists("./logs/index.html")) copy("./config/index/index.html","./logs/index.html");
   if (!file_exists("./logs/".$yearu.""))
   {
      RecursiveMkdir("./logs/".$yearu."");
			copy("./config/index/index/index.html","./logs/".$yearu."/index.html");
   }
   if (!file_exists("./logs/".$yearu."/".$monthu.""))
   {
      RecursiveMkdir("./logs/".$yearu."/".$monthu."");
			copy("./config/index/index/index/index.html","./logs/".$yearu."/".$monthu."/index.html");
   }
$logpathu = "./logs/".$yearu."/".$monthu."/".$yearu.$monthu.$dayu.".php"  ;

	if (!file_exists($logpathu))
	{
		@copy("./".C_LOG_DIR."/header.html",$logpathu);
		$fpu = fopen($logpathu, "a") ;
		@flock($fpu, LOCK_EX);    // Lock file in exclusive mode
		@fwrite($fpu, sprintf("\r\n<div align=\"left\"><span dir=\"LTR\" style=\"font-weight: 800; color:#00008B; font-family: helvetica, arial, geneva, sans-serif; font-size: 12pt\"><?php echo(sprintf(A_CHAT_LOGS_23,strftime(L_LONG_DATETIME,".$mess_timeu."))); ?></span></div>\r\n</center>\r\n"));
		@fwrite($fpu, sprintf("\r\n<!-- MESSAGES TABLE STARTS BELLOW -->\r\n\r\n<table border=1 cellspacing=0 cellpading=1>\r\n<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">\r\n<td nowrap=\"nowrap\"><?php echo (A_POST_TIME); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_CHTEX_ROOM); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_FROM); ?></td>\r\n<td><?php echo (A_CHTEX_MSG); ?></td>\r\n</tr>"));
	}
	else
	{
		$fpu = fopen($logpathu, "a") ;
		@flock($fpu, LOCK_EX);
	}
$message_nbu = count($Messagesu);
for ($iu = 0; $iu < $message_nbu; $iu++)
{
	@fwrite($fpu, sprintf($Messagesu[$message_nbu-1-$iu]));
};
@flock($fpu, LOCK_UN);
fclose($fpu) ;
$doneu = 1;
$iu = 0;
}
if ($done = 1 || $doneu = 1)
{
$delsql = "DELETE FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." AND pm_read != 'New' AND pm_read != 'Neww'";
$delquery = mysql_query($delsql) or die("Cannot query the database.<br />" . mysql_error());
}
?>