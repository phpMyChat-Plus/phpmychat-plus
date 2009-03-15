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
clearstatcache();
//Full logs
$done = 0;
$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
@mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
mysql_select_db(C_DB_NAME);

$sql = "SELECT * FROM ".C_MSG_TBL." WHERE (m_time < ".(time() - C_MSG_DEL*60*60)." AND username != '".C_QUOTE_NAME."' AND username != 'SYS welcome' AND pm_read NOT LIKE 'New%' AND !(username = 'SYS enter' AND message LIKE '%\"".C_BOT_NAME."\"%')) ORDER BY m_time DESC";
$query = mysql_query($sql) or die("Cannot query the database.<br />" . mysql_error());
// Collect and store new messages
$Messages = Array();
$i = 1;
while($result = mysql_fetch_array($query))
{
$type = stripslashes($result["type"]);
if ($type) $type = '<?php echo(L_SET_10); ?>'; else $type = '<?php echo(L_SET_11); ?>';
$room = htmlspecialchars(stripslashes($result["room"]));
$room = $room." (".$type.")";
$username = htmlspecialchars(stripslashes($result["username"]));
$roomfrom = htmlspecialchars(stripslashes($result["room_from"]));
if ($roomfrom != "" && $roomfrom != $room) $room = $roomfrom."><br />".$room;
$m_time = stripslashes($result["m_time"]);
$time_posted = date('H:i:s (d)', $m_time + C_TMZ_OFFSET*60*60);
$address = htmlspecialchars(stripslashes($result["address"]));
if ($address != "" && $address != " *" && $username != "SYS welcome" && $username != "SYS topic" && $username != "SYS topic reset" && substr($username,0,8) != "SYS dice" && $username != "SYS image" && $username != "SYS room" && $username != $address) $toaddress = " to <b>".$address."</b>";
$address = "<b>".$address."</b>";
if ($username == "SYS welcome") $username = $address;
if ($room == "*" || ($username == "SYS room" && $address == "*") || $username == "SYS announce") $room = '<?php echo(L_ROOM_ALL); ?>';
$message = stripslashes($result["message"]);
$message = eregi_replace("<!-- UPDTUSRS //-->","",$message);
$message = eregi_replace("src=images","src=./../../../images",$message);
$message = eregi_replace("src=\"images","src=\"./../../../images",$message);
$message = eregi_replace("src=localization/","src=./../../../localization/",$message);
$message = eregi_replace("src=\"localization/","src=\"./../../../localization/",$message);
$message = eregi_replace("tutorial_popup.php","./../../../tutorial_popup.php",$message);
$message = eregi_replace("help_popup.php","./../../../help_popup.php",$message);
$message = str_replace("  "," ",$message);
$message = str_replace("L_DEL_BYE","<?php echo(L_DEL_BYE); ?>",$message);
$message = str_replace("L_REG_BRB","<?php echo(L_REG_BRB); ?>",$message);
$message = str_replace("L_HELP_MR","<?php echo(L_HELP_MR); ?>",$message);
$message = str_replace("L_HELP_MS","<?php echo(L_HELP_MS); ?>",$message);
$message = eregi_replace('class="table"','bgcolor="lightgrey"',$message);
$message = eregi_replace('class="tabtitle"><td colspan="7">','bgcolor="blue"><td colspan="7">',$message);
$message = eregi_replace('class="tabtitle"><td>','bgcolor="gray"><td>',$message);
$message = eregi_replace('class="tabtitle"><td colspan="4">','bgcolor="blue"><td colspan="4">',$message);
if ((ereg("stripslashes",$message) || ereg("sprintf",$message) || ereg("L_",$message)) && !ereg("php echo",$message))
{
	$message = "<?php echo(".$message."); ?>";
}
$message = urldecode($message);
$message = str_replace("links.php?link=||","",$message);
$message = eregi_replace("target=\"_blank\"></a>","target=\"_blank\">Click here</a>",$message);
$message = eregi_replace('alt="Send email"','target="_blank" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>"',$message);
$NewMsg = "\r\n<tr align=texttop valign=top>\r\n<td valign=top nowrap=\"nowrap\">".$time_posted."</td>\r\n<td valign=top nowrap=\"nowrap\">";
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
	$NewMsg .= '<b>'.ROOM_SAYS.' </b>';
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
$lastsql = "SELECT * FROM ".C_MSG_TBL." WHERE (m_time < ".(time() - C_MSG_DEL*60*60)." AND username != '".C_QUOTE_NAME."' AND username != 'SYS welcome' AND pm_read NOT LIKE 'New%' AND !(username = 'SYS enter' AND message LIKE '%\"".C_BOT_NAME."\"%')) ORDER BY m_time DESC LIMIT 1";
$lastquery = mysql_query($lastsql) or die("Cannot query the database.<br />" . mysql_error());
while($lastresult = mysql_fetch_array($lastquery))
{
 $lastm_time = stripslashes($lastresult["m_time"]);
}
$mess_time = $lastm_time + C_TMZ_OFFSET*60*60;
$year = date("Y", $lastm_time);
$month = date("M", $lastm_time);
$prev_year = date("Y", $lastm_time - 355*24*60*60);
$prev_month = date("M", $lastm_time - 28*24*60*60);
$day = date("d", $lastm_time);
	if (!file_exists("./".C_LOG_DIR."/index.html")) copy("./config/index/index.html","./".C_LOG_DIR."/index.html");
	if (!file_exists("./".C_LOG_DIR."/".$year.""))
	{
		RecursiveMkdir("./".C_LOG_DIR."/".$year."");
		copy("./config/index/index/index.html","./".C_LOG_DIR."/".$year."/index.html");
		if (file_exists("./".C_LOG_DIR."/".$prev_year."") && substr(decoct(fileperms("./".C_LOG_DIR."/".$prev_year."")),1) == "0777")
		{
			chmod("./".C_LOG_DIR."/".$prev_year, 0755);
		}
	}
	if (!file_exists("./".C_LOG_DIR."/".$year."/".$month.""))
	{
		RecursiveMkdir("./".C_LOG_DIR."/".$year."/".$month."");
		copy("./config/index/index/index/index.html","./".C_LOG_DIR."/".$year."/".$month."/index.html");
		if (file_exists("./".C_LOG_DIR."/".$prev_year."/".$prev_month."") && substr(decoct(fileperms("./".C_LOG_DIR."/".$prev_year."/".$prev_month."")),1) == "0777")
		{
			chmod("./".C_LOG_DIR."/".$prev_year."/".$prev_month, 0755);
		}
		if (file_exists("./".C_LOG_DIR."/".$year."/".$prev_month."") && substr(decoct(fileperms("./".C_LOG_DIR."/".$year."/".$prev_month."")),1) == "0777")
		{
			chmod("./".C_LOG_DIR."/".$year."/".$prev_month, 0755);
		}
	}
$logpath = "./".C_LOG_DIR."/".$year."/".$month."/".$year.$month.$day.".php"  ;

	if (!file_exists($logpath))
	{
		@copy("./config/index/header.html",$logpath);
		$fp = fopen($logpath, "a") ;
		$chatSaved = '$chatSaved';
		@flock($fp, LOCK_EX);    // Lock file in exclusive mode
		@fwrite($fp, sprintf("\r\n<?php\r\n"));
		@fwrite($fp, sprintf("$chatSaved = strftime(L_LONG_DATETIME,$mess_time);\r\n"));
		if (eregi("win", PHP_OS))
		{
			@fwrite($fp, sprintf('if (!function_exists("utf_conv"))'));
			@fwrite($fp, sprintf("\r\n"));
			@fwrite($fp, sprintf("{\r\n"));
			@fwrite($fp, sprintf('function utf_conv($iso,$Charset,$what)'));
			@fwrite($fp, sprintf("\r\n"));
			@fwrite($fp, sprintf("{\r\n"));
			@fwrite($fp, sprintf('if (function_exists(\'iconv\')) $what = iconv($iso, $Charset, $what);'));
			@fwrite($fp, sprintf("\r\n"));
			@fwrite($fp, sprintf('return $what;'));
			@fwrite($fp, sprintf("\r\n"));
			@fwrite($fp, sprintf("};\r\n"));
			@fwrite($fp, sprintf("};\r\n"));
			@fwrite($fp, sprintf("if (eregi(\"win\", PHP_OS) && function_exists(\"iconv\")) $chatSaved = iconv(WIN_DEFAULT,\"utf-8\",$chatSaved);\r\n"));
		}
		@fwrite($fp, sprintf("?>\r\n"));
		@fwrite($fp, sprintf("<div align=\"left\"><span dir=\"LTR\" style=\"font-weight: 800; color:#00008B; font-family: helvetica, arial, geneva, sans-serif; font-size: 12pt\"><?php echo(sprintf(A_CHAT_LOGS_23,$chatSaved)); ?></span></div>\r\n</center>\r\n"));
		@fwrite($fp, sprintf("\r\n<!-- MESSAGES TABLE STARTS BELOW -->\r\n\r\n<table border=1 cellspacing=0 cellpading=1>\r\n<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">\r\n<td nowrap=\"nowrap\"><?php echo (A_POST_TIME); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_CHTEX_ROOM); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_FROM_TO); ?></td>\r\n<td><?php echo (A_CHTEX_MSG); ?></td>\r\n</tr>"));
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

//Public logs
$doneu = 0;
$CondForQuery	= "(m_time<".(time() - C_MSG_DEL*60*60)." AND (address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3'))))";
$sqlu = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC";
$queryu = mysql_query($sqlu) or die("Cannot query the database.<br />" . mysql_error());
// Collect and store new messages
$Messagesu = Array();
$iu = 1;
while($resultu = mysql_fetch_array($queryu))
{
$m_timeu = stripslashes($resultu["m_time"]);
$time_postedu = date('H:i:s (d)', $m_timeu + C_TMZ_OFFSET*60*60);
$roomu = htmlspecialchars(stripslashes($resultu["room"]));
$usernameu = htmlspecialchars(stripslashes($resultu["username"]));
$addressu = htmlspecialchars(stripslashes($resultu["address"]));
// Restricted rooms mod by Ciprian
if (is_array($DefaultDispChatRooms) && in_array($roomu." [R]",$DefaultDispChatRooms))
{
	if ($usernameu == "SYS announce") {}
	elseif ($usernameu == "SYS room" && $addressu == "*") {}
	else continue;
}
if ($addressu != "" && $addressu != " *" && $usernameu != "SYS welcome" && $usernameu != "SYS topic" && $usernameu != "SYS topic reset" && substr($usernameu,0,8) != "SYS dice" && $usernameu != "SYS image" && $usernameu != "SYS room" && $usernameu != $addressu) $toaddressu = " to <b>".$addressu."</b>";
$addressu = "<b>".$addressu."</b>";
if ($usernameu == "SYS welcome") $usernameu = $addressu;
if ($roomu == "*" || ($usernameu == "SYS room" && $addressu == "*") || $usernameu == "SYS announce") $roomu = '<?php echo(L_ROOM_ALL); ?>';
$messageu = stripslashes($resultu["message"]);
$messageu = eregi_replace("<!-- UPDTUSRS //-->","",$messageu);
$messageu = eregi_replace("src=images","src=./../../../images",$messageu);
$messageu = eregi_replace("src=\"images","src=\"./../../../images",$messageu);
$messageu = eregi_replace("src=localization/","src=./../../../localization/",$messageu);
$messageu = eregi_replace("src=\"localization/","src=\"./../../../localization/",$messageu);
$messageu = eregi_replace("tutorial_popup.php","./../../../tutorial_popup.php",$messageu);
$messageu = eregi_replace("help_popup.php","./../../../help_popup.php",$messageu);
$messageu = str_replace("  "," ",$messageu);
$messageu = str_replace("L_DEL_BYE","<?php echo(L_DEL_BYE); ?>",$messageu);
$messageu = str_replace("L_REG_BRB","<?php echo(L_REG_BRB); ?>",$messageu);
$messageu = str_replace("L_HELP_MR","<?php echo(L_HELP_MR); ?>",$messageu);
$messageu = str_replace("L_HELP_MS","<?php echo(L_HELP_MS); ?>",$messageu);
$messageu = eregi_replace('class="table"','bgcolor="lightgrey"',$messageu);
$messageu = eregi_replace('class="tabtitle"><td colspan="7">','bgcolor="blue"><td colspan="7">',$messageu);
$messageu = eregi_replace('class="tabtitle"><td>','bgcolor="gray"><td>',$messageu);
$messageu = eregi_replace('class="tabtitle"><td colspan="4">','bgcolor="blue"><td colspan="4">',$messageu);
if ((ereg("stripslashes",$messageu) || ereg("sprintf",$messageu) || ereg("L_",$messageu)) && !ereg("php echo",$messageu))
{
	$messageu = '<?php echo('.$messageu.'); ?>';
}
$messageu = urldecode($messageu);
$messageu = str_replace("links.php?link=||","",$messageu);
$messageu = eregi_replace("target=\"_blank\"></a>","target=\"_blank\">Click here</a>",$messageu);
$messageu = eregi_replace('alt="Send email"','target="_blank" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>"',$messageu);
$NewMsgu = "\r\n<tr align=texttop valign=top>\r\n<td valign=top nowrap=\"nowrap\">".$time_postedu."</td>\r\n<td valign=top nowrap=\"nowrap\">";
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
	$NewMsgu .= '<b>'.ROOM_SAYS.' </b>';
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
$lastsqlu = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC LIMIT 1";
$lastqueryu = mysql_query($lastsqlu) or die("Cannot query the database.<br />" . mysql_error());
while($lastresultu = mysql_fetch_array($lastqueryu))
{
 $lastm_timeu = stripslashes($lastresultu["m_time"]);
}
$mess_timeu = $lastm_timeu + C_TMZ_OFFSET*60*60;
$yearu = date("Y", $lastm_timeu);
$monthu = date("M", $lastm_timeu);
$prev_yearu = date("Y", $lastm_timeu - 355*24*60*60);
$prev_monthu = date("M", $lastm_timeu - 28*24*60*60);
$dayu = date("d", $lastm_timeu);
	if (file_exists("./logs") && !file_exists("./logs/index.html")) copy("./config/index/index.html","./logs/index.html");
	if (!file_exists("./logs/".$yearu.""))
	{
		RecursiveMkdir("./logs/".$yearu."");
		copy("./config/index/index/index.html","./logs/".$yearu."/index.html");
		if (file_exists("./".C_LOG_DIR."/".$prev_yearu."") && substr(decoct(fileperms("./".C_LOG_DIR."/".$prev_yearu."")),1) == "0777")
		{
			chmod("./".C_LOG_DIR."/".$prev_yearu, 0755);
		}
	}
	if (!file_exists("./logs/".$yearu."/".$monthu.""))
	{
		RecursiveMkdir("./logs/".$yearu."/".$monthu."");
		copy("./config/index/index/index/index.html","./logs/".$yearu."/".$monthu."/index.html");
		if (file_exists("./".C_LOG_DIR."/".$prev_yearu."/".$prev_monthu."") && substr(decoct(fileperms("./".C_LOG_DIR."/".$prev_yearu."/".$prev_monthu."")),1) == "0777")
		{
			chmod("./".C_LOG_DIR."/".$prev_yearu."/".$prev_monthu, 0755);
		}
		if (file_exists("./".C_LOG_DIR."/".$yearu."/".$prev_monthu."") && substr(decoct(fileperms("./".C_LOG_DIR."/".$yearu."/".$prev_monthu."")),1) == "0777")
		{
			chmod("./".C_LOG_DIR."/".$yearu."/".$prev_monthu, 0755);
		}
	}
$logpathu = "./logs/".$yearu."/".$monthu."/".$yearu.$monthu.$dayu.".php"  ;

	if (!file_exists($logpathu))
	{
		@copy("./config/index/header.html",$logpathu);
		$fpu = fopen($logpathu, "a") ;
		$chatSavedu = '$chatSavedu';
		@flock($fpu, LOCK_EX);    // Lock file in exclusive mode
		@fwrite($fpu, sprintf("\r\n<?php\r\n"));
		@fwrite($fpu, sprintf("$chatSavedu = strftime(L_LONG_DATETIME,$mess_timeu);\r\n"));
		if (eregi("win", PHP_OS))
		{
			@fwrite($fpu, sprintf('if (!function_exists("utf_conv"))'));
			@fwrite($fpu, sprintf("\r\n"));
			@fwrite($fpu, sprintf("{\r\n"));
			@fwrite($fpu, sprintf('function utf_conv($iso,$Charset,$what)'));
			@fwrite($fpu, sprintf("\r\n"));
			@fwrite($fpu, sprintf("{\r\n"));
			@fwrite($fpu, sprintf('if (function_exists(\'iconv\')) $what = iconv($iso, $Charset, $what);'));
			@fwrite($fpu, sprintf("\r\n"));
			@fwrite($fpu, sprintf('return $what;'));
			@fwrite($fpu, sprintf("\r\n"));
			@fwrite($fpu, sprintf("};\r\n"));
			@fwrite($fpu, sprintf("};\r\n"));
			@fwrite($fpu, sprintf("if (eregi(\"win\", PHP_OS) && function_exists(\"iconv\")) $chatSavedu = iconv(WIN_DEFAULT,\"utf-8\",$chatSavedu);\r\n"));
		}
		@fwrite($fpu, sprintf("?>\r\n"));
		@fwrite($fpu, sprintf("<div align=\"left\"><span dir=\"LTR\" style=\"font-weight: 800; color:#00008B; font-family: helvetica, arial, geneva, sans-serif; font-size: 12pt\"><?php echo(sprintf(A_CHAT_LOGS_23,$chatSavedu)); ?></span></div>\r\n</center>\r\n"));
		@fwrite($fpu, sprintf("\r\n<!-- MESSAGES TABLE STARTS BELOW -->\r\n\r\n<table border=1 cellspacing=0 cellpading=1>\r\n<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">\r\n<td nowrap=\"nowrap\"><?php echo (A_POST_TIME); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_CHTEX_ROOM); ?></td>\r\n<td nowrap=\"nowrap\"><?php echo (A_FROM); ?></td>\r\n<td><?php echo (A_CHTEX_MSG); ?></td>\r\n</tr>"));
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
if ($done == 1 || $doneu == 1)
{
// Delete the exported messages as well as the unread off-line pms older than 1 month
$delsql = "DELETE FROM ".C_MSG_TBL." WHERE ((m_time < ".(time() - C_MSG_DEL * 60 * 60)." AND pm_read NOT LIKE 'New%') OR (m_time < ".(time() - ((C_MSG_DEL + (C_PM_KEEP_DAYS * 24)) * 60 * 60)).")) AND !(username = 'SYS enter' AND message LIKE '%\"".C_BOT_NAME."\"%')";
$delquery = mysql_query($delsql) or die("Cannot query the database.<br />" . mysql_error());
}
?>