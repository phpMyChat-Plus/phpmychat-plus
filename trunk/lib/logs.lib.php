<?php
//logs.lib.php - by Ciprian
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

$sql = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." ORDER BY m_time DESC";
$query = mysql_query($sql) or die("Cannot query the database.<br>" . mysql_error());
// Collect and store new messages
$Messages = Array();
$i = "1";
while($result = mysql_fetch_array($query))
{
$m_time = stripslashes($result["m_time"]);
$time_posted = date('H:i:s (d)', $m_time + C_TMZ_OFFSET*60*60);
$address = htmlspecialchars(stripslashes($result["address"]));
if ($address != "") $address = " to <b>".$address."</b>";
$NewMsg = "<tr><td valign=top nowrap>".$time_posted."</td><td valign=top nowrap>";
$NewMsg .= htmlspecialchars(stripslashes($result["room"]))."</td><td valign=top nowrap>";
$NewMsg .= "<b>".htmlspecialchars(stripslashes($result["username"]))."</b>";
$NewMsg .= $address."</td><td valign=top>";
$message = stripslashes($result["message"]);
$message = eregi_replace("src=images","src=../../../images",$message);
$NewMsg .= $message."</td></tr>";
$Messages[] = $NewMsg;
$i++;
}

//Archive feature
if ($i > 1)
{
$today = date('d-m-y H:i:s', time() + C_TMZ_OFFSET*60*60);
$lastsql = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." ORDER BY m_time ASC LIMIT 1";
$lastquery = mysql_query($lastsql) or die("Cannot query the database.<br>" . mysql_error());
while($lastresult = mysql_fetch_array($lastquery))
{
 $lastm_time = stripslashes($lastresult["m_time"]);
}
$mess_time = date("r", $lastm_time + C_TMZ_OFFSET*60*60);
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
$logpath = "./".C_LOG_DIR."/".$year."/".$month."/".$year.$month.$day.".htm"  ;

	if (!file_exists($logpath))
	{
		$fp = fopen($logpath, "a");
		fwrite($fp, sprintf("<html><head><title>".$mess_time."</title><style type='text/css'><!-- body { background-color: lightcyan;} table { font-family: arial; font-size:9pt;} --> </style></head><body><center><span style=\"font-weight:600; font-size:14pt; font-color:blue\"><hr>Log file generated on ".$mess_time." GMT<br>by Chat Log mod - &copy; 2005-".date(Y)." - by <a href=mailto:ciprianmp@yahoo.com onMouseOver=\"window.status='Click to email author.'; return true;\">Ciprian Murariu</a>.<hr></span></center>"));
		fwrite($fp, sprintf("<table border=1 cellspacing=0 cellpading=0 style=\"font-weight:bold;\"><tr><td nowrap>Post Time</td><td nowrap>Room Posted</td><td nowrap>Sender (to Address)</td><td>Message posted</td></tr></table><table>"));
	}
$fp = fopen($logpath, "a") ;
@flock($fp, LOCK_EX);    // Lock file in exclusive mode
$message_nb = count($Messages);
for ($i = 0; $i < $message_nb; $i++)
{
	fwrite($fp, print($Messages[$message_nb-1-$i]));
};
@flock($fp, LOCK_UN);
fclose($fp) ;
$done = 1;
}

$CondForQuery	= "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND (username NOT LIKE 'SYS %' OR username = 'SYS topic' OR username = 'SYS image' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')) OR (address != '' AND username = 'SYS room'))";
$sqlu = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." AND ".$CondForQuery." ORDER BY m_time DESC";
$queryu = mysql_query($sqlu) or die("Cannot query the database.<br>" . mysql_error());
// Collect and store new messages
$Messages = Array();
$iu = "1";
while($resultu = mysql_fetch_array($queryu))
{
$m_timeu = stripslashes($resultu["m_time"]);
$time_postedu = date('H:i:s (d)', $m_timeu + C_TMZ_OFFSET*60*60);
$addressu = htmlspecialchars(stripslashes($resultu["address"]));
if ($addressu != "") $addressu = " to <b>".$addressu."</b>";
$NewMsgu = "<tr><td valign=top nowrap>".$time_postedu."</td><td valign=top nowrap>";
$NewMsgu .= htmlspecialchars(stripslashes($resultu["room"]))."</td><td valign=top nowrap>";
$NewMsgu .= "<b>".htmlspecialchars(stripslashes($resultu["username"]))."</b>";
$NewMsgu .= $addressu."</td><td valign=top>";
$messageu = stripslashes($resultu["message"]);
$messageu = eregi_replace("src=images","src=../../../images",$messageu);
$NewMsgu .= $messageu."</td></tr>";
$Messagesu[] = $NewMsgu;
$iu++;
}

//Archive feature
if ($iu > 1)
{
$todayu = date('d-m-y H:i:s', time() + C_TMZ_OFFSET*60*60);
$lastsqlu = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." ORDER BY m_time DESC LIMIT 1";
$lastqueryu = mysql_query($lastsqlu) or die("Cannot query the database.<br>" . mysql_error());
while($lastresultu = mysql_fetch_array($lastqueryu))
{
 $lastm_timeu = stripslashes($lastresultu["m_time"]);
}
$mess_timeu = date("r", $lastm_timeu + C_TMZ_OFFSET*60*60);
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
$logpathu = "./logs/".$yearu."/".$monthu."/".$yearu.$monthu.$dayu.".htm"  ;

	if (!file_exists($logpathu))
	{
		$fpu = fopen($logpathu, "a");
		fwrite($fpu, sprintf("<html><head><title>".$mess_timeu."</title><style type='text/css'><!-- body { background-color: lightcyan;} table { font-family: arial; font-size:9pt;} --> </style></head><body><center><span style=\"font-weight:600; font-size:14pt; font-color:blue\"><hr>Log file generated on ".$mess_timeu." GMT<br>by Chat Log mod - &copy; 2005-".date(Y)." - by <a href=mailto:ciprianmp@yahoo.com onMouseOver=\"window.status='Click to email author.'; return true;\">Ciprian Murariu</a>.<hr></span></center>"));
		fwrite($fpu, sprintf("<table border=1 cellspacing=0 cellpading=0 style=\"font-weight:bold;\"><tr><td nowrap>Post Time</td><td nowrap>Room Posted</td><td nowrap>Sender (to Address)</td><td>Message posted</td></tr></table><table>"));
	}
$fpu = fopen($logpathu, "a") ;
@flock($fpu, LOCK_EX);    // Lock file in exclusive mode
$message_nbu = count($Messagesu);
for ($iu = 0; $iu < $message_nbu; $iu++)
{
	fwrite($fpu, print($Messagesu[$message_nbu-1-$iu]));
};
@flock($fpu, LOCK_UN);
fclose($fpu) ;
$doneu = 1;
}
if ($done = 1 || $doneu = 1)
{
$delsql = "DELETE FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)."";
$delquery = mysql_query($delsql) or die("Cannot query the database.<br>" . mysql_error());
}
?>