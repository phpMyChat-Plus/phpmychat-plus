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
require("./${ChatPath}/localization/".C_LANGUAGE."/localized.chat.php");
//require("localization/".C_LANGUAGE."/localized.chat.php");
$lang = 'include("../../../config/config.lib.php");';
$lang .= "\r\n";
$lang .= 'if (!isset($L) || $L == "") $L = C_LANGUAGE;';
$lang .= "\r\n";
$lang .= 'if (isset($L) && $L != "" && !is_dir("../../../localization/".$L)) include("../../../localization/".C_LANGUAGE."/localized.chat.php");';
$lang .= "\r\n";
$lang .= 'else include("../../../localization/".$L."/localized.chat.php");';
$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
mysql_select_db(C_DB_NAME);

$sql = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." ORDER BY m_time DESC";
$query = mysql_query($sql) or die("Cannot query the database.<br />" . mysql_error());
// Collect and store new messages
$Messages = Array();
$i = "1";
while($result = mysql_fetch_array($query))
{
$m_time = stripslashes($result["m_time"]);
$time_posted = date('H:i:s (d)', $m_time + C_TMZ_OFFSET*60*60);
$room = htmlspecialchars(stripslashes($result["room"]));
$roomfrom = htmlspecialchars(stripslashes($result["room_from"]));
if ($roomfrom != "") $room = $room."<br>from ".$roomfrom;
$username = htmlspecialchars(stripslashes($result["username"]));
$address = htmlspecialchars(stripslashes($result["address"]));
if ($address != "" && $address != " *" && $username != "SYS topic" && $username != "SYS topic reset" && substr($username,0,8) != "SYS dice" && $username != "SYS image" && $username != "SYS room" && $username != $address) $toaddress = " to <b>".$address."</b>";
$address = "<b>".$address."</b>";
$message = stripslashes($result["message"]);
$message = eregi_replace("src=images","src=../../../images",$message);
$message = eregi_replace("<!-- UPDTUSRS //-->","",$message);
$NewMsg = "\r\n<tr>\r\n<td valign=top nowrap=\"nowrap\">".$time_posted."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsg .= $room."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsg .= "<b>".$username."</b>";
$NewMsg .= $toaddress."</td>\r\n<td valign=top>";
if (eregi("stripslashes",$message) || eregi("sprintf",$message) || eregi("L_",$message))
{
	$message = "<?php echo(".$message."); ?>";
}
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
	$NewMsg .= $address.": <A href=".$message." onMouseOver=\"window.status='Click to open the full size picture.'; return true\" title=\"Click to open the full size picture\" target=_blank>".$message."</A>";
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
	$NewMsg .= ' <?php echo(DICE_RESULTS); ?>';
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
$lastsql = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." ORDER BY m_time ASC LIMIT 1";
$lastquery = mysql_query($lastsql) or die("Cannot query the database.<br />" . mysql_error());
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
$logpath = "./".C_LOG_DIR."/".$year."/".$month."/".$year.$month.$day.".php"  ;

	if (!file_exists($logpath))
	{
		$fp = fopen($logpath, "a");
		fwrite($fp, sprintf("<?php\r\n"));
		fwrite($fp, sprintf($lang));
		fwrite($fp, sprintf("\r\n?>"));
		fwrite($fp, sprintf("\r\n<html>\r\n<head>\r\n<title>".$mess_time."</title>\r\n<style type='text/css'>\r\n<!--\r\nbody\r\n{ background-color: lightcyan;}\r\ntable\r\n{ font-family: arial; font-size:9pt;}\r\n-->\r\n</style>\r\n</head>\r\n<body>\r\n<center>\r\n<span style=\"font-weight:600; font-size:14pt; font-color:blue\">\r\n<hr>\r\nLog file generated on ".$mess_time." GMT<br>with Chat Log Mod - &copy; 2005-".date(Y)." - by <a href=mailto:ciprianmp@yahoo.com onMouseOver=\"window.status='Click to email author.'; return true;\">Ciprian Murariu</a>.\r\n<hr>\r\n</span>\r\n</center>"));
		fwrite($fp, sprintf("\r\n\r\n\r\n<!-- MESSAGES TABLE STARTS BELLOW -->\r\n\r\n<table border=1 cellspacing=0 cellpading=0>\r\n<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">\r\n<td nowrap=\"nowrap\">Post Time</td>\r\n<td nowrap=\"nowrap\">Posted in (from) Room</td>\r\n<td nowrap=\"nowrap\">Sender (to Addressee)</td>\r\n<td>Message posted</td>\r\n</tr>"));
	}
$fp = fopen($logpath, "a") ;
@flock($fp, LOCK_EX);    // Lock file in exclusive mode
$message_nb = count($Messages);
for ($i = 0; $i < $message_nb; $i++)
{
	@fwrite($fp, sprintf($Messages[$message_nb-1-$i]));
};
@flock($fp, LOCK_UN);
fclose($fp) ;
$done = 1;
}

$CondForQuery	= "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";
$sqlu = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." AND ".$CondForQuery." ORDER BY m_time DESC";
$queryu = mysql_query($sqlu) or die("Cannot query the database.<br />" . mysql_error());
// Collect and store new messages
$Messages = Array();
$iu = "1";
while($resultu = mysql_fetch_array($queryu))
{
$m_timeu = stripslashes($resultu["m_time"]);
$time_postedu = date('H:i:s (d)', $m_timeu + C_TMZ_OFFSET*60*60);
$roomu = htmlspecialchars(stripslashes($resultu["room"]));
$usernameu = htmlspecialchars(stripslashes($resultu["username"]));
$addressu = htmlspecialchars(stripslashes($resultu["address"]));
if ($addressu != "" && $addressu != " *" && $usernameu != "SYS topic" && $usernameu != "SYS topic reset" && substr($usernameu,0,8) != "SYS dice" && $usernameu != "SYS image" && $usernameu != "SYS room" && $usernameu != $addressu) $toaddressu = " to <b>".$addressu."</b>";
$addressu = "<b>".$addressu."</b>";
$messageu = stripslashes($resultu["message"]);
$messageu = eregi_replace("src=images","src=../../../images",$messageu);
$messageu = eregi_replace("<!-- UPDTUSRS //-->","",$messageu);
$NewMsgu = "\r\n<tr>\r\n<td valign=top nowrap=\"nowrap\">".$time_postedu."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsgu .= $roomu."</td>\r\n<td valign=top nowrap=\"nowrap\">";
$NewMsgu .= "<b>".$usernameu."</b>";
$NewMsgu .= $toaddressu."</td>\r\n<td valign=top>";
if (eregi("stripslashes",$messageu) || eregi("sprintf",$messageu) || eregi("L_",$messageu))
{
	$messageu = '<?php echo('.$messageu.'); ?>';
}
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
	$NewMsgu .= $addressu.": <A href=".$messageu." onMouseOver=\"window.status='Click to open the full size picture.'; return true\" title=\"Click to open the full size picture\" target=_blank>".$messageu."</A>";
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
	$NewMsgu .= ' <?php echo(DICE_RESULTS); ?>';
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
$lastsqlu = "SELECT * FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)." ORDER BY m_time DESC LIMIT 1";
$lastqueryu = mysql_query($lastsqlu) or die("Cannot query the database.<br />" . mysql_error());
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
$logpathu = "./logs/".$yearu."/".$monthu."/".$yearu.$monthu.$dayu.".php"  ;

	if (!file_exists($logpathu))
	{
		$fpu = fopen($logpathu, "a");
		fwrite($fpu, sprintf("<?php\r\n"));
		fwrite($fpu, sprintf($lang));
		fwrite($fpu, sprintf("\r\n?>"));
		fwrite($fpu, sprintf("\r\n<html>\r\n<head>\r\n<title>".$mess_timeu."</title>\r\n<style type='text/css'>\r\n<!--\r\nbody\r\n{ background-color: lightcyan;}\r\ntable\r\n{ font-family: arial; font-size:9pt;}\r\n-->\r\n</style>\r\n</head>\r\n<body>\r\n<center>\r\n<span style=\"font-weight:600; font-size:14pt; font-color:blue\">\r\n<hr>\r\nLog file generated on ".$mess_timeu." GMT<br>with Chat Log mod - &copy; 2005-".date(Y)." - by <a href=mailto:ciprianmp@yahoo.com onMouseOver=\"window.status='Click to email author.'; return true;\">Ciprian Murariu</a>.\r\n<hr>\r\n</span>\r\n</center>"));
		fwrite($fpu, sprintf("\r\n\r\n\r\n<!-- MESSAGES TABLE STARTS BELLOW -->\r\n\r\n<table border=1 cellspacing=0 cellpading=0>\r\n<tr style=\"font-weight:bold; color:blue; background-color=yellow\" align=\"center\">\r\n<td nowrap=\"nowrap\">Post Time</td>\r\n<td nowrap=\"nowrap\">Posted in Room</td>\r\n<td nowrap=\"nowrap\">Sender</td>\r\n<td>Message posted</td>\r\n</tr>"));
	}
$fpu = fopen($logpathu, "a") ;
@flock($fpu, LOCK_EX);    // Lock file in exclusive mode
$message_nbu = count($Messagesu);
for ($iu = 0; $iu < $message_nbu; $iu++)
{
	@fwrite($fpu, sprintf($Messagesu[$message_nbu-1-$iu]));
};
@flock($fpu, LOCK_UN);
fclose($fpu) ;
$doneu = 1;
}
if ($done = 1 || $doneu = 1)
{
$delsql = "DELETE FROM ".C_MSG_TBL." WHERE m_time < ".(time() - C_MSG_DEL*60*60)."";
$delquery = mysql_query($delsql) or die("Cannot query the database.<br />" . mysql_error());
$CleanUsrTbl = $delquery;
$CleanUsrTbl = '';
}
?>