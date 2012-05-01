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
//clearstatcache(); - for chmod-ing old folders, but it doesn't save logs text anymore

# Is the OS Windows or Mac or Linux
if (stristr(PHP_OS,'win')) {
  $eol="\r\n";
} elseif (stristr(PHP_OS,'mac')) {
  $eol="\r";
} else {
  $eol="\n";
}

//Full logs
$done = 0;
$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
@mysql_query("SET CHARACTER SET utf8");
@mysql_query("SET NAMES 'utf8'");
mysql_select_db(C_DB_NAME);

$CondForQuery = "(m_time < ".(time() - C_MSG_DEL*60*60)." AND username != '".C_QUOTE_NAME."' AND username != 'SYS welcome' AND pm_read NOT LIKE 'New%' AND !(username = 'SYS enter' AND message LIKE '%\"".C_BOT_NAME."\"%'))";
$sql = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC";
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
if ($address != "" && $address != " *" && $username != "SYS welcome" && $username != "SYS topic" && $username != "SYS topic reset" && substr($username,0,8) != "SYS dice" && $username != "SYS image" && $username != "SYS video" && $username != "SYS utube" && $username != "SYS math" && $username != "SYS room" && $username != $address) $toaddress = " to <b>".$address."</b>";
$address = "<b>".$address."</b>";
if ($username == "SYS welcome") $username = $address;
if ($room == "*" || ($username == "SYS room" && $address == "*") || $username == "SYS announce") $room = '<?php echo(L_ROOM_ALL); ?>';
$message = stripslashes($result["message"]);
$message = str_ireplace("<!-- UPDTUSRS //-->","",$message);
$message = str_ireplace("...BUZZER...","<img src=\"./../../../images/buzz.gif\" alt=\"L_HELP_BUZZ1\" title=\"L_HELP_BUZZ1\">",$message);
$message = str_ireplace("SRC=images/","src=./../../../images/",$message);
$message = str_ireplace("SRC=\"images/","src=\"./../../../images/",$message);
$message = str_ireplace("src=localization/","src=./../../../localization/",$message);
$message = str_ireplace("src=\"localization/","src=\"./../../../localization/",$message);
$message = str_replace("tutorial_popup.php","./../../../tutorial_popup.php",$message);
$message = str_replace("help_popup.php","./../../../help_popup.php",$message);
$message = str_replace("  "," ",$message);
$message = str_ireplace("L_DEL_BYE","<?php echo(L_DEL_BYE); ?>",$message);
$message = str_ireplace("L_REG_BRB","<?php echo(L_REG_BRB); ?>",$message);
$message = str_ireplace("L_HELP_MR","<?php echo(sprintf(L_HELP_MR,".$username.")); ?>",$message);
$message = str_ireplace("L_HELP_MS","<?php echo(sprintf(L_HELP_MS,".$username.")); ?>",$message);
$message = str_ireplace("L_PRIV_PM","<?php echo(L_PRIV_PM); ?>",$message);
$message = str_ireplace("L_PRIV_WISP","<?php echo(L_PRIV_WISP);?>",$message);
$message = str_ireplace("L_HELP_BUZZ1","<?php echo(L_HELP_BUZZ1); ?>",$message);
$message = str_ireplace('class="table"','bgcolor="lightgrey"',$message);
$message = str_ireplace('class="tabtitle"><td colspan="7">','bgcolor="blue"><td colspan="7">',$message);
$message = str_ireplace('class="tabtitle"><td>','bgcolor="gray"><td>',$message);
$message = str_ireplace('class="tabtitle"><td colspan="4">','bgcolor="blue"><td colspan="4">',$message);
#if ((ereg("stripslashes",$message) || ereg("sprintf",$message) || ereg("L_",$message)) && !ereg("php echo",$message))
if (preg_match("/(stripslashes|sprintf|L_)/",$message) && strpos($message,"php echo") === false)
{
	$message = "<?php echo(".$message."); ?>";
}
$message = urldecode($message);
$message = str_replace("links.php?link=||","",$message);
$message = str_replace("target=\"_blank\"></a>","target=\"_blank\">Click here</a>",$message);
$message = str_replace('alt="Send email"','target="_blank" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>"',$message);
$NewMsg = $eol."<tr align=texttop valign=top>$eol<td valign=top nowrap=\"nowrap\">".$time_posted."</td>$eol<td valign=top nowrap=\"nowrap\">";
$NewMsg .= $room."</td>$eol<td valign=top nowrap=\"nowrap\">";
$NewMsg .= "<b>".$username."</b>";
$NewMsg .= $toaddress."</td>$eol<td valign=top>";
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
elseif ($username == "SYS video")
{
	//require EmbeVi Class
	include_once('plugins/video/embevi.class.php');
	//instantiate EmbeVi class
	$embevi = new EmbeVi();
	$embevi->setAcceptShortUrl();
	$embevi->setProviderIconLocal();
	$embevi->setProviderIconUrl('images/icons/');
	$embevi->setAcceptExtendedSupport();
	if($embevi->parseUrl($message))
	{
#		$eicon = $embevi->getProviderIcon();
		$ealt = $embevi->getEmbeddedInfo();
		$eicon = $embevi->getProviderImageIdentifier();
		$NewMsg .= '<img src="./../../../'.$eicon.'" border=0 width="16" alt="&copy; '.$ealt.'" title="&copy; '.$ealt.'">&nbsp;<?php echo(L_VIDEO); ?> ';
		$NewMsg .= $address.": <A href=\"".$message."\" onMouseOver=\"window.status='";
		$NewMsg .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>.\'; return true" title="';
		$NewMsg .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>" target=_blank>';
		$NewMsg .= $message."</A>";
	}
}
elseif ($username == "SYS utube")
{
	$NewMsg .= '<img src="./../../../images/icons/youtube.png" border=0 alt="YouTube">&nbsp;<?php echo(L_VIDEO); ?> ';
	$NewMsg .= $address.": <A href=\"".$message."\" onMouseOver=\"window.status='";
	$NewMsg .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>.\'; return true" title="';
	$NewMsg .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>" target=_blank>';
	$NewMsg .= $message."</A>";
}
elseif ($username == "SYS announce")
{
	$NewMsg .= '<b><?php echo(L_ANNOUNCE); ?>: </b>';
	$NewMsg .= $message;
}
elseif ($username == "SYS math")
{
	$NewMsg .= '<b><?php echo(sprintf(L_MATH,L_EQUATION,"'.$address.'")); ?></b> ';
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
$Messages[] = $NewMsg."</td>$eol</tr>";
$toaddress = '';
$i++;
}

//Archive feature
if ($i > 1)
{
$today = date('d-m-y H:i:s', time() + C_TMZ_OFFSET*60*60);
$lastsql = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC LIMIT 1";
$lastquery = mysql_query($lastsql) or die("Cannot query the database.<br />" . mysql_error());
while($lastresult = mysql_fetch_array($lastquery))
{
 $lastm_time = stripslashes($lastresult["m_time"]);
}
$mess_time = $lastm_time + C_TMZ_OFFSET*60*60;
$year = date("Y", $mess_time);
$month = date("M", $mess_time);
$prev_year = date("Y", $mess_time - 355*24*60*60);
$prev_month = date("M", $mess_time - 28*24*60*60);
$day = date("d", $mess_time);
$message_nb = count($Messages);
if ($message_nb > 0)
{
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
		$retries = 0;
        do {
            if ($retries > 0) {
                usleep(rand(1, 1000));
            }
            $retries += 1;
        } while (!@flock($fp, LOCK_EX) and $retries <= 50);
//		@flock($fp, LOCK_EX);    // Lock file in exclusive mode
		@fwrite($fp, sprintf($eol.'<?php'.$eol));
#		@fwrite($fp, sprintf('$longdtformat = ($L == "english" ? str_replace("%d of", ((stristr(PHP_OS,"win") ? "%#d" : "%e").date("S",$CorrectedTime)." of"), L_LONG_DATETIME) : L_LONG_DATETIME);'.$eol));
		@fwrite($fp, sprintf('$chatSaved = strftime(L_LONG_DATETIME,'.$mess_time.');'.$eol));
		@fwrite($fp, sprintf("if(stristr(PHP_OS,'win'))".$eol));
		@fwrite($fp, sprintf('{'.$eol));
		@fwrite($fp, sprintf('if (!function_exists("utf_conv"))'.$eol));
		@fwrite($fp, sprintf('{'.$eol));
		@fwrite($fp, sprintf('function utf_conv($iso,$Charset,$what)'.$eol));
		@fwrite($fp, sprintf('{'.$eol));
		@fwrite($fp, sprintf('if(function_exists(\'iconv\')) $what = iconv($iso, $Charset, $what);'.$eol));
		@fwrite($fp, sprintf('return $what;'.$eol));
		@fwrite($fp, sprintf('};'.$eol));
		@fwrite($fp, sprintf('};'.$eol));
		@fwrite($fp, sprintf('$chatSaved = utf_conv(WIN_DEFAULT,"utf-8",$chatSaved);'.$eol));
		@fwrite($fp, sprintf('if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $chatSaved = str_replace(" ","",$chatSaved);'.$eol));
		@fwrite($fp, sprintf('};'.$eol));
		@fwrite($fp, sprintf("?>".$eol));
		@fwrite($fp, sprintf("<div align=\"left\"><span dir=\"LTR\" style=\"font-weight: 800; color:#00008B; font-family: helvetica, arial, geneva, sans-serif; font-size: 12pt\"><?php echo(sprintf(A_CHAT_LOGS_23,$chatSaved)); ?></span></div>$eol</center>$eol"));
		@fwrite($fp, sprintf($eol."<!-- MESSAGES TABLE STARTS BELOW -->$eol$eol<table border=1 cellspacing=0 cellpading=1>$eol<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">$eol<td nowrap=\"nowrap\"><?php echo (A_POST_TIME); ?></td>$eol<td nowrap=\"nowrap\"><?php echo (A_CHTEX_ROOM); ?></td>$eol<td nowrap=\"nowrap\"><?php echo (A_FROM_TO); ?></td>$eol<td><?php echo (A_CHTEX_MSG); ?></td>$eol</tr>"));
	}
	else
	{
		$fp = fopen($logpath, "a") ;
		@flock($fp, LOCK_EX);
	}
for ($i = 0; $i < $message_nb; $i++)
{
	@fwrite($fp, sprintf($Messages[$message_nb-1-$i]));
};
flock($fp, LOCK_UN);
fclose($fp) ;
$done = 1;
}
$i = 0;
}

//Public logs
$doneu = 0;
$CondForQueryu	= "(m_time<".(time() - C_MSG_DEL*60*60)." AND (address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username = 'SYS video' OR username = 'SYS utube' OR username = 'SYS math' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3'))))";
$sqlu = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQueryu." ORDER BY m_time DESC";
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
if ($addressu != "" && $addressu != " *" && $usernameu != "SYS welcome" && $usernameu != "SYS topic" && $usernameu != "SYS topic reset" && substr($usernameu,0,8) != "SYS dice" && $usernameu != "SYS image" && $usernameu != "SYS video" && $usernameu != "SYS utube" && $usernameu != "SYS math" && $usernameu != "SYS room" && $usernameu != $addressu) $toaddressu = " to <b>".$addressu."</b>";
$addressu = "<b>".$addressu."</b>";
if ($usernameu == "SYS welcome") $usernameu = $addressu;
if ($roomu == "*" || ($usernameu == "SYS room" && $addressu == "*") || $usernameu == "SYS announce") $roomu = '<?php echo(L_ROOM_ALL); ?>';
$messageu = stripslashes($resultu["message"]);
$messageu = str_ireplace("<!-- UPDTUSRS //-->","",$messageu);
$messageu = str_ireplace("...BUZZER...","<img src=\"./../../../images/buzz.gif\" alt=\"L_HELP_BUZZ1\" title=\"L_HELP_BUZZ1\">",$messageu);
$messageu = str_ireplace("SRC=images/","src=./../../../images/",$messageu);
$messageu = str_ireplace("SRC=\"images/","src=\"./../../../images/",$messageu);
$messageu = str_ireplace("src=localization/","src=./../../../localization/",$messageu);
$messageu = str_ireplace("src=\"localization/","src=\"./../../../localization/",$messageu);
$messageu = str_replace("tutorial_popup.php","./../../../tutorial_popup.php",$messageu);
$messageu = str_replace("help_popup.php","./../../../help_popup.php",$messageu);
$messageu = str_replace("  "," ",$messageu);
$messageu = str_ireplace("L_DEL_BYE","<?php echo(L_DEL_BYE); ?>",$messageu);
$messageu = str_ireplace("L_REG_BRB","<?php echo(L_REG_BRB); ?>",$messageu);
$messageu = str_ireplace("L_HELP_MR","<?php echo(sprintf(L_HELP_MR,".$usernameu.")); ?>",$messageu);
$messageu = str_ireplace("L_HELP_MS","<?php echo(sprintf(L_HELP_MS,".$usernameu.")); ?>",$messageu);
$messageu = str_ireplace("L_PRIV_PM","<?php echo(L_PRIV_PM); ?>",$messageu);
$messageu = str_ireplace("L_PRIV_WISP","<?php echo(L_PRIV_WISP);?>",$messageu);
$messageu = str_ireplace("L_HELP_BUZZ1","<?php echo(L_HELP_BUZZ1); ?>",$messageu);
$messageu = str_ireplace('class="table"','bgcolor="lightgrey"',$messageu);
$messageu = str_ireplace('class="tabtitle"><td colspan="7">','bgcolor="blue"><td colspan="7">',$messageu);
$messageu = str_ireplace('class="tabtitle"><td>','bgcolor="gray"><td>',$messageu);
$messageu = str_ireplace('class="tabtitle"><td colspan="4">','bgcolor="blue"><td colspan="4">',$messageu);
#if ((ereg("stripslashes",$messageu) || ereg("sprintf",$messageu) || ereg("L_",$messageu)) && !ereg("php echo",$messageu))
if (preg_match("/(stripslashes|sprintf|L_)/",$messageu) && strpos($messageu,"php echo") === false)
{
	$messageu = '<?php echo('.$messageu.'); ?>';
}
$messageu = urldecode($messageu);
$messageu = str_replace("links.php?link=||","",$messageu);
$messageu = str_replace("target=\"_blank\"></a>","target=\"_blank\">Click here</a>",$messageu);
$messageu = str_replace('alt="Send email"','target="_blank" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>"',$messageu);
$NewMsgu = $eol."<tr align=texttop valign=top>$eol<td valign=top nowrap=\"nowrap\">".$time_postedu."</td>$eol<td valign=top nowrap=\"nowrap\">";
$NewMsgu .= $roomu."</td>$eol<td valign=top nowrap=\"nowrap\">";
$NewMsgu .= "<b>".$usernameu."</b>";
$NewMsgu .= $toaddressu."</td>$eol<td valign=top>";
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
elseif ($usernameu == "SYS video")
{
	//require EmbeVi Class
	include_once('plugins/video/embevi.class.php');
	//instantiate EmbeVi class
	$embeviu = new EmbeVi();
	$embeviu->setAcceptShortUrl();
	$embeviu->setProviderIconLocal();
	$embeviu->setProviderIconUrl('images/icons/');
	$embeviu->setAcceptExtendedSupport();
	if($embeviu->parseUrl($messageu))
	{
#		$eiconu = $embevi->getProviderIcon();
		$ealtu = $embeviu->getEmbeddedInfo();
		$eiconu = $embeviu->getProviderImageIdentifier();
		$NewMsgu .= '<img src="./../../../'.$eiconu.'" border=0 width= "16" alt="&copy; '.$ealtu.'" title="&copy; '.$ealtu.'">&nbsp;<?php echo(L_VIDEO); ?> ';
		$NewMsgu .= $addressu.": <A href=\"".$messageu."\" onMouseOver=\"window.status='";
		$NewMsgu .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>.\'; return true" title="';
		$NewMsgu .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>" target=_blank>';
		$NewMsgu .= $messageu."</A>";
	}
}
elseif ($usernameu == "SYS utube")
{
	$NewMsgu .= '<img src="./../../../images/icons/youtube.png" border=0 alt="YouTube">&nbsp;<?php echo(L_VIDEO); ?> ';
	$NewMsgu .= $addressu.": <A href=\"".$messageu."\" onMouseOver=\"window.status='";
	$NewMsgu .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>.\'; return true" title="';
	$NewMsgu .= '<?php echo(sprintf(L_CLICK,L_ORIG_VIDEO)) ?>" target=_blank>';
	$NewMsgu .= $messageu."</A>";
}
elseif ($usernameu == "SYS announce")
{
	$NewMsgu .= '<b><?php echo(L_ANNOUNCE); ?>: </b>';
	$NewMsgu .= $message;
}
elseif ($usernameu == "SYS math")
{
	$NewMsgu .= '<b><?php echo(sprintf(L_MATH,L_EQUATION,"'.$addressu.'")); ?></b> ';
	$NewMsgu .= $messageu;
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
$Messagesu[] = $NewMsgu."</td>$eol</tr>";
$toaddressu = '';
$iu++;
}

//Archive feature
if ($iu > 1)
{
$todayu = date('d-m-y H:i:s', time() + C_TMZ_OFFSET*60*60);
$lastsqlu = "SELECT * FROM ".C_MSG_TBL." WHERE ".$CondForQueryu." ORDER BY m_time DESC LIMIT 1";
$lastqueryu = mysql_query($lastsqlu) or die("Cannot query the database.<br />" . mysql_error());
while($lastresultu = mysql_fetch_array($lastqueryu))
{
 $lastm_timeu = stripslashes($lastresultu["m_time"]);
}
$mess_timeu = $lastm_timeu + C_TMZ_OFFSET*60*60;
$yearu = date("Y", $mess_timeu);
$monthu = date("M", $mess_timeu);
$prev_yearu = date("Y", $mess_timeu - 355*24*60*60);
$prev_monthu = date("M", $mess_timeu - 28*24*60*60);
$dayu = date("d", $mess_timeu);
$message_nbu = count($Messagesu);
if ($message_nbu > 0)
{
	if (file_exists("./logs") && !file_exists("./logs/index.html")) copy("./config/index/index.html","./logs/index.html");
	if (!file_exists("./logs/".$yearu.""))
	{
		RecursiveMkdir("./logs/".$yearu."");
		copy("./config/index/index/index.html","./logs/".$yearu."/index.html");
		if (file_exists("./logs/".$prev_yearu."") && substr(decoct(fileperms("./logs/".$prev_yearu."")),1) == "0777")
		{
			chmod("./logs/".$prev_yearu, 0755);
		}
	}
	if (!file_exists("./logs/".$yearu."/".$monthu.""))
	{
		RecursiveMkdir("./logs/".$yearu."/".$monthu."");
		copy("./config/index/index/index/index.html","./logs/".$yearu."/".$monthu."/index.html");
		if (file_exists("./logs/".$prev_yearu."/".$prev_monthu."") && substr(decoct(fileperms("./logs/".$prev_yearu."/".$prev_monthu."")),1) == "0777")
		{
			chmod("./logs/".$prev_yearu."/".$prev_monthu, 0755);
		}
		if (file_exists("./logs/".$yearu."/".$prev_monthu."") && substr(decoct(fileperms("./logs/".$yearu."/".$prev_monthu."")),1) == "0777")
		{
			chmod("./logs/".$yearu."/".$prev_monthu, 0755);
		}
	}
$logpathu = "./logs/".$yearu."/".$monthu."/".$yearu.$monthu.$dayu.".php"  ;

	if (!file_exists($logpathu))
	{
		@copy("./config/index/header.html",$logpathu);
		$fpu = fopen($logpathu, "a") ;
		$chatSavedu = '$chatSavedu';
		$retriesu = 0;
        do {
            if ($retriesu > 0) {
                usleep(rand(1, 1000));
            }
            $retriesu += 1;
        } while (!@flock($fpu, LOCK_EX) and $retriesu <= 50);

//		@flock($fpu, LOCK_EX);    // Lock file in exclusive mode
		@fwrite($fpu, sprintf($eol.'<?php'.$eol));
		@fwrite($fpu, sprintf('$chatSavedu = strftime(L_LONG_DATETIME,'.$mess_timeu.');'.$eol));
		@fwrite($fpu, sprintf("if(stristr(PHP_OS,'win'))".$eol));
		@fwrite($fpu, sprintf('{'.$eol));
		@fwrite($fpu, sprintf('if (!function_exists("utf_conv"))'.$eol));
		@fwrite($fpu, sprintf('{'.$eol));
		@fwrite($fpu, sprintf('function utf_conv($iso,$Charset,$what)'.$eol));
		@fwrite($fpu, sprintf('{'.$eol));
		@fwrite($fpu, sprintf('if(function_exists(\'iconv\')) $what = iconv($iso, $Charset, $what);'.$eol));
		@fwrite($fpu, sprintf('return $what;'.$eol));
		@fwrite($fpu, sprintf('};'.$eol));
		@fwrite($fpu, sprintf('};'.$eol));
		@fwrite($fpu, sprintf('$chatSavedu = utf_conv(WIN_DEFAULT,"utf-8",$chatSavedu);'.$eol));
		@fwrite($fpu, sprintf('if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $chatSavedu = str_replace(" ","",$chatSavedu);'.$eol));
		@fwrite($fpu, sprintf('};'.$eol));
		@fwrite($fpu, sprintf('?>'.$eol));
		@fwrite($fpu, sprintf("<div align=\"left\"><span dir=\"LTR\" style=\"font-weight: 800; color:#00008B; font-family: helvetica, arial, geneva, sans-serif; font-size: 12pt\"><?php echo(sprintf(A_CHAT_LOGS_23,$chatSavedu)); ?></span></div>$eol</center>$eol"));
		@fwrite($fpu, sprintf($eol."<!-- MESSAGES TABLE STARTS BELOW -->$eol$eol<table border=1 cellspacing=0 cellpading=1>$eol<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">$eol<td nowrap=\"nowrap\"><?php echo (A_POST_TIME); ?></td>$eol<td nowrap=\"nowrap\"><?php echo (A_CHTEX_ROOM); ?></td>$eol<td nowrap=\"nowrap\"><?php echo (A_FROM); ?></td>$eol<td><?php echo (A_CHTEX_MSG); ?></td>$eol</tr>"));
	}
	else
	{
		$fpu = fopen($logpathu, "a") ;
		@flock($fpu, LOCK_EX);
	}
for ($iu = 0; $iu < $message_nbu; $iu++)
{
	@fwrite($fpu, sprintf($Messagesu[$message_nbu-1-$iu]));
};
flock($fpu, LOCK_UN);
fclose($fpu) ;
$doneu = 1;
}
$iu = 0;
}
if ($done == 1 || $doneu == 1)
{
// Delete the exported messages as well as the unread off-line pms older than 1 month
$delsql = "DELETE FROM ".C_MSG_TBL." WHERE ((m_time < ".(time() - C_MSG_DEL * 60 * 60)." AND pm_read NOT LIKE 'New%') OR (m_time < ".(time() - ((C_MSG_DEL + (C_PM_KEEP_DAYS * 24)) * 60 * 60)).")) AND !(username = 'SYS enter' AND message LIKE '%\"".C_BOT_NAME."\"%')";
$delquery = mysql_query($delsql) or die("Cannot query the database.<br />" . mysql_error());
}
?>