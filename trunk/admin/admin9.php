<?php
// Archive Panel (logs) by Ciprian Murariu <ciprianmp@yahoo.com>.
// This sheet is diplayed when the admin wants to check the messages archive

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.
include("lib/preg_find.php");
include("lib/archive.lib.php");

// Credit for this mod goes to Ciprian Murariu <ciprianmp@yahoo.com>.
$pstr = "admin.php?From=admin.php&What=Body&L=$L"."&pmc_username=".$pmc_username."&pmc_password=".$pmc_password."&sheet=9";
$ipdel = $_GET['ipdel'];
$ydel = $_GET['ydel'];
$mdel = $_GET['mdel'];
$fdel = $_GET['fdel'];
$mzip = $_GET['mzip'];
$path = $_GET['path'];

function delDir($dirName) {
	if(empty($dirName)) {
		return;
	}
	global $Message;
	if(file_exists($dirName)) {
		$dir = dir($dirName);
		while(false !== ($file = $dir->read())) {
		if($file != '.' && $file != '..') {
			if(is_dir($dirName.'/'.$file)) {
	            delDir($dirName.'/'.$file);
				$path_dir = "<span class=\"error\">".str_replace("./","",$dirName)."</span>";
				$Message = sprintf(A_CHAT_LOGS_34,A_CHAT_LOGS_33,$path_dir);
			} else {
					$path_dir = "<span class=\"error\">".str_replace("./","",$dirName)."</span>";
					$path_file = "<span class=\"error\">".str_replace("./","",$dirName.'/'.$file)."</span>";
				@fclose($dirName.'/'.$file) ;
	            @unlink($dirName.'/'.$file) or die(sprintf(A_CHAT_LOGS_37,A_CHAT_LOGS_32,$path_dir));
				$Message = sprintf(A_CHAT_LOGS_34,A_CHAT_LOGS_32,$path_file);
            }
        }
    }
    @rmdir($dirName.'/'.$file) or die(sprintf(A_CHAT_LOGS_37,A_CHAT_LOGS_33,$path_dir));
    $Message = sprintf(A_CHAT_LOGS_34,A_CHAT_LOGS_33,$path_dir);
	} else {
		$path_dir = "<span class=\"error\">".str_replace("./","",$dirName)."</span>";
		$Message = sprintf(A_CHAT_LOGS_36,A_CHAT_LOGS_33,$path_dir);
	}
}

function delFile($fileName) {
	if(file_exists($fileName)) {
		@fclose($fileName) ;
	    @unlink($fileName) or die(sprintf(A_CHAT_LOGS_37,A_CHAT_LOGS_32,str_replace("./","",$fileName)));
		global $Message;
		$fileName = "<span class=\"error\">".str_replace("./","",$fileName)."</span>";
	    if (isset($Message) && $Message != "") $Message .= '<br />'.sprintf(A_CHAT_LOGS_34,A_CHAT_LOGS_32,$fileName);
	    else $Message = sprintf(A_CHAT_LOGS_34,A_CHAT_LOGS_32,$fileName);
	}
}

function makeZip($dirName,$path,$year,$month) {
	global $done, $Message;
	if (isset($month) || isset($year)) {
		if (isset($month)) $zipfile = new zip_file($path = $path."/".$year."_".$month.".zip");
		elseif (isset($year)) $zipfile = new zip_file($path = $path."/".$year.".zip");
	}
	else $zipfile = new zip_file($path = $path."/chat_ip_logs_".date('ymd').".zip");
	$zipfile->set_options(array('level' => 3, 'overwrite' => 1, 'method' => 1, 'inmemory' => 0, 'recurse' => (isset($month) ? 0 : 1), 'storepaths' => (isset($month) || isset($year)) ? 1 : 0, 'comment' => "Built on ".date('jS \of F Y, H:i:s').".\nDownloaded from [".C_CHAT_NAME."]\nat ".C_CHAT_URL.".\n© ".date('Y')." - ".C_ADMIN_NAME."."));
	$zipfile->add_files(array($dirName,$dirName."/*.htm",$dirName."/*.php",$dirName."/*.txt"));
	$zipfile->create_archive();
	$path = "<span class=\"error\">".str_replace("./","",$path)."</span>";
	if (count($zipfile->errors) > 0) {
		$Message = sprintf(A_CHAT_LOGS_40,A_CHAT_LOGS_32,$path);
		$done = 0;
	} // Process errors here
	else {
		$Message = sprintf(A_CHAT_LOGS_35,A_CHAT_LOGS_32,$path);
		$done = 1;
	} // successful saving
}

function size_readable($size, $retstring = null) {
    // adapted from code at http://aidanlister.com/repos/v/function.size_readable.php
    $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    if ($retstring === null) { $retstring = '%01.1f %s'; }
    $lastsizestring = end($sizes);
    foreach ($sizes as $sizestring) {
		if ($size < 1024) { break; }
        if ($sizestring != $lastsizestring) { $size /= 1024; }
    }
    if ($sizestring == $sizes[0]) { $retstring = '%01d %s'; } // Bytes aren't normally fractional
    return sprintf($retstring, $size, $sizestring);
}

if(isset($ydel) && $ydel != "") delDir($ydel);
if(isset($mdel) && $mdel != "") delDir($mdel);
if(isset($fdel) && $fdel != "") delfile($fdel);
if(isset($mzip) && $mzip != "") makeZip($mzip,$path,$year,$month);
if(isset($ipdel) && $ipdel != "" && $done)
{
	delfile($ipdel);
	copy("config/index/chat_ip_logs.htm","acount/pages/chat_ip_logs.htm");
	chmod("acount/pages/chat_ip_logs.htm", 0666);
}
?>
<A NAME="home"></A>
<?php
if (isset($Message))
{
	echo "<div><table align=center border=0 cellpadding=3 class=menu style=background:white><tr><td class=success align=center><br /><h4>".$Message."</h4></td></tr></table></div>";
}
if (file_exists("acount/pages/chat_ip_logs.htm"))
{
?>
<P CLASS=title><?php echo(sprintf(A_CHAT_LOGS_1,APP_NAME)); ?></P>
</center>
<?php
echo ("<a href=\"acount/pages/chat_ip_logs.htm\" target=\"_blank\" title='".A_CHAT_LOGS_3."'><b>".A_CHAT_LOGS_3."</b></a>
&nbsp;&nbsp;-&nbsp;&nbsp;
<a href=\"$pstr&mzip=./acount/pages/chat_ip_logs.htm&path=./acount/pages/bak&ipdel=./acount/pages/chat_ip_logs.htm\" onclick=\"return confirm('".A_CHAT_LOGS_5.A_CHAT_LOGS_19."');\" title='".A_CHAT_LOGS_4."'><font size=-2 color=red><b>".A_CHAT_LOGS_4."</b></font></a>");
}
else
{
	copy("config/index/chat_ip_logs.htm","acount/pages/chat_ip_logs.htm");
	chmod("acount/pages/chat_ip_logs.htm", 0666);
}
			$ipbak='./acount/pages/bak'; #define backup directory
				$ipb = opendir($ipbak); #open directory
				while (false !== ($ip = readdir($ipb)))
				{
					if (!eregi("index\.html",$ip) && !eregi("chat_ip_logs\.htm",$ip) && !eregi("error",$ip) && $ip!='.' && $ip!='..' && !is_dir($ipbak."/".$ip))
					{
						$iparray[]=$ip;
			 		}
			 	}
				closedir($ipb);
				if ($iparray)
				{
					sort($iparray);
					$i=1;
					echo("<br /><br />\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
					echo("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\"><font size=4 color=blue><b>".A_CHAT_LOGS_30."</b></font></td></tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\">");
					$ipbak_size = 0;
					foreach ($iparray as $ip)
					{
						echo ("\n<li><a href=\"$pstr&fdel=".$ipbak."/".$ip."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_19,$ip)."')\" title='".A_CHAT_LOGS_15."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$ipbak/$ip title='".sprintf(A_CHAT_LOGS_16,$ip)."'>$ip</a>&nbsp;(".size_readable(filesize($ipbak."/".$ip)).", ".strftime(L_SHORT_DATETIME, filemtime($ipbak."/".$ip)).")"); #print name of each file found
						$ipbak_size = $ipbak_size + filesize($ipbak."/".$ip);
						$i++;
					}
					echo("\n</td>\n</tr>\n<td valign=top nowrap=\"nowrap\" class=\"notify\"><li>".sprintf(A_CHAT_LOGS_31," = ",size_readable($ipbak_size,'%01.2f %s'))."</td>\n</tr>\n</table>\n<br />\n");
				}
				unset($iparray);
if (!C_CHAT_LOGS)
{
?>
<center>
<P CLASS=title><?php echo(APP_NAME." ".A_CHAT_LOGS_2) ; ?></P>
</center>
<?php
}
else
{
?>
<center>
	<P CLASS=title><A NAME="full"></A><?php echo(APP_NAME." ".A_CHAT_LOGS_6) ; ?></P>
</center>
<?php
		echo("\n<P ALIGN=right><A HREF=#user>".A_CHAT_LOGS_7."</A></P>\n");
		$total_size = 0;
		$y='./'.C_LOG_DIR.''; #define which year you want to read
$yrs = preg_find('/./', $y, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrs as $yr)
{
		$year_size = 0;
		$yeardir = eregi_replace($y."/",'',$yr);
				echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
				echo ("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\" colspan=7>\n<font size=4 color=red><b>$yeardir</b></font>\n</td>"); #print name of each file found
		$m=$yr; #define which month you want to read
		$mts = preg_find('/./', $yr, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mts as $mt => $stats)
		{
		$month_size = 0;
				$monthdir = eregi_replace($yr."/",'',$mt);
if($L == "hungarian") $MONTH = $yeardir.". ";
else $MONTH = "";
				switch ($monthdir)
				{
					case 'Jan':
					{
						$MONTH .= L_JAN;
					}
					break;
					case 'Feb':
					{
						$MONTH .= L_FEB;
					}
					break;
					case 'Mar':
					{
						$MONTH .= L_MAR;
					}
					break;
					case 'Apr':
					{
						$MONTH .= L_APR;
					}
					break;
					case 'May':
					{
						$MONTH .= L_MAY;
					}
					break;
					case 'Jun':
					{
						$MONTH .= L_JUN;
					}
					break;
					case 'Jul':
					{
						$MONTH .= L_JUL;
					}
					break;
					case 'Aug':
					{
						$MONTH .= L_AUG;
					}
					break;
					case 'Sep':
					{
						$MONTH .= L_SEP;
					}
					break;
					case 'Oct':
					{
						$MONTH .= L_OCT;
					}
					break;
					case 'Nov':
					{
						$MONTH .= L_NOV;
					}
					break;
					case 'Dec':
					{
						$MONTH .= L_DEC;
					}
					break;
				}
if($L != "hungarian")
{
				$MONTH .= " ".$yeardir;
}
else
{
				$MONTHHU = $MONTH."i";
}
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" colspan=7>\n<font size=4 color=green><b>$MONTH</b></font>\n</td>"); #print name of each file found
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\">");
				$d=$yr."/".$monthdir; #define which month you want to read
				$day = opendir($d); #open directory
				while (false !== ($dy = readdir($day)))
				{
					if (!eregi("\.html",$dy) && !eregi("error",$dy) && $dy!='.' && $dy!='..')
					{
						$dayarray[]=$dy;
			 		}
			 	}
				closedir($day);
				if ($dayarray)
				{
					sort($dayarray);
					$i=1;
					foreach ($dayarray as $dy)
					{
						if (eregi("\.htm",$dy)) $dyhtm=str_replace(".htm","",$dy);
						else $dyhtm=str_replace(".php","",$dy);
						$dyhtm=str_replace($yeardir.$monthdir,"",$dyhtm);
						echo ("\n<li><a href=\"$pstr&fdel=".$mt."/".$dy."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_19,$dy)."')\" title='".A_CHAT_LOGS_15."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$d/$dy?L=$L title='".sprintf(A_CHAT_LOGS_16,$dyhtm." ".$MONTH)."' target=_self>$dyhtm</a>&nbsp;(".size_readable(filesize($d."/".$dy)).")"); #print name of each file found
						if ($i % 5 == 0) echo ("\n</td>\n<td valign=top align=left nowrap=\"nowrap\">");
						$i++;
					$month_size = $month_size + filesize($d."/".$dy);
					}
				}
				unset($dayarray);
				$year_size = $year_size + $month_size;
if($L != "hungarian")
{
				echo("\n</td>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" class=\"notify\" colspan=7><li>$MONTH = ".size_readable($month_size,'%01.2f %s')."\n - <a href=\"$pstr&mzip=".$yr."/".$monthdir."&path=$y&year=$yeardir&month=$monthdir\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."' />\n</a>\n - <a href=\"$pstr&mdel=".$yr."/".$monthdir."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_19,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_9,$MONTH)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b></font>\n</a>\n</td>\n</tr>");
}
else
{
				echo("\n</td>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" class=\"notify\" colspan=7><li>$MONTH = ".size_readable($month_size,'%01.2f %s')."\n - <a href=\"$pstr&mzip=".$yr."/".$monthdir."&path=$y&year=$yeardir&month=$monthdir\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."' />\n</a>\n - <a href=\"$pstr&mdel=".$yr."/".$monthdir."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_19,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_91,$MONTHHU)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b>\n</font>\n</a>\n</td>\n</tr>");
}
		}
		echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" class=\"notify\" colspan=7><li>".sprintf(A_CHAT_LOGS_31,$yeardir." = ",size_readable($year_size,'%01.2f %s'))."\n - <a href=\"$pstr&mzip=".$yr."&path=$y&year=$yeardir\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardir)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardir)."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardir)."' />\n</a>\n - <a href=\"$pstr&ydel=".$y."/".$yeardir."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_8.A_CHAT_LOGS_19,$yeardir)."')\" title='".sprintf(A_CHAT_LOGS_9,$yeardir)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_10."</b></font>\n</a>\n</td>\n</tr>\n</table>\n<br />\n");
		$total_size = $total_size + $year_size;
}
				$zip = opendir($y); #open directory
				while (false !== ($zy = readdir($zip)))
				{
					if (eregi("\.zip",$zy))
					{
						$ziparray[]=$zy;
			 		}
			 	}
				closedir($zip);
				if ($ziparray)
				{
					sort($ziparray);
					echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
					echo("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\"><font size=4 color=blue><b>".A_CHAT_LOGS_27."</b></font></td></tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\">");
					$zip_size = 0;
					foreach ($ziparray as $zy)
					{
						echo ("\n<li><a href=\"$pstr&fdel=".$y."/".$zy."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_19,$zy)."')\" title='".A_CHAT_LOGS_29."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$y/$zy title='".sprintf(A_CHAT_LOGS_28,$zy)."'>$zy</a>&nbsp;(".size_readable(filesize($y."/".$zy)).", ".strftime(L_SHORT_DATETIME, filemtime($y."/".$zy)).")"); #print name of each file found
						$zip_size = $zip_size + filesize($y."/".$zy);
					}
					echo("\n</td>\n</tr>\n<td valign=top nowrap=\"nowrap\" class=\"notify\"><li>".sprintf(A_CHAT_LOGS_31," = ",size_readable($zip_size,'%01.2f %s'))."</td>\n</tr>\n</table>\n<br />\n");
				}
				unset($ziparray);
		$total_size = $total_size + $zip_size;
		echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>\n<tr>\n<td valign=top align=\"center\" nowrap=\"nowrap\" class=\"notify\" colspan=7>".sprintf(A_CHAT_LOGS_31," = ",size_readable($total_size,'%01.2f %s'))."</td>\n</tr>\n</table>\n<br />\n");
?>
<center>
	<P CLASS=title><A NAME="user"></A><?php echo(APP_NAME." ".A_CHAT_LOGS_17) ?></P>
</center>
<?php
		$totalu_size = 0;
		$yu='./logs'; #define which year you want to read
$yrsu = preg_find('/./', $yu, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrsu as $yru)
{
		$yearu_size = 0;
		$yeardiru = eregi_replace($yu."/",'',$yru);
				echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
				echo ("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\" colspan=7>\n<font size=4 color=red><b>$yeardiru ".A_CHAT_LOGS_12."</b></font>\n</td>"); #print name of each file found
		$mu=$yru; #define which month you want to read
		$mtsu = preg_find('/./', $yru, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mtsu as $mtu => $stats)
		{
				$monthu_size = 0;
				$monthdiru = eregi_replace($yru."/",'',$mtu);
if($L == "hungarian") $MONTHU = $yeardiru.". ";
else $MONTHU = "";
				switch ($monthdiru)
				{
					case 'Jan':
					{
						$MONTHU .= L_JAN;
					}
					break;
					case 'Feb':
					{
						$MONTHU .= L_FEB;
					}
					break;
					case 'Mar':
					{
						$MONTHU .= L_MAR;
					}
					break;
					case 'Apr':
					{
						$MONTHU .= L_APR;
					}
					break;
					case 'May':
					{
						$MONTHU .= L_MAY;
					}
					break;
					case 'Jun':
					{
						$MONTHU .= L_JUN;
					}
					break;
					case 'Jul':
					{
						$MONTHU .= L_JUL;
					}
					break;
					case 'Aug':
					{
						$MONTHU .= L_AUG;
					}
					break;
					case 'Sep':
					{
						$MONTHU .= L_SEP;
					}
					break;
					case 'Oct':
					{
						$MONTHU .= L_OCT;
					}
					break;
					case 'Nov':
					{
						$MONTHU .= L_NOV;
					}
					break;
					case 'Dec':
					{
						$MONTHU .= L_DEC;
					}
					break;
				}
if($L != "hungarian")
{
				$MONTHU .= " ".$yeardiru;
}
else
{
				$MONTHUHU = $MONTHU."i";
}
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" colspan=7>\n<font size=4 color=green><b>$MONTHU ".A_CHAT_LOGS_12."</b></font>\n</td>"); #print name of each file found
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\">");
				$du=$yru."/".$monthdiru; #define which month you want to read
				$dayu = opendir($du); #open directory
				while (false !== ($dyu = readdir($dayu)))
				{
					if (!eregi("\.html",$dyu) && !eregi("error",$dyu) && $dyu!='.' && $dyu!='..')
					{
						$dayarrayu[]=$dyu;
			 		}
			 	}
				closedir($dayu);
				if ($dayarrayu)
				{
					sort($dayarrayu);
					$j=1;
					foreach ($dayarrayu as $dyu)
					{
						if (eregi("\.htm",$dyu)) $dyhtmu=str_replace(".htm","",$dyu);
						else $dyhtmu=str_replace(".php","",$dyu);
						$dyhtmu=str_replace($yeardiru.$monthdiru,"",$dyhtmu);
						echo ("\n<li><a href=\"$pstr&fdel=".$mtu."/".$dyu."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_18."\\n".A_CHAT_LOGS_19,$dyu)."')\" title='".A_CHAT_LOGS_15."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$du/$dyu?L=$L title='".sprintf(A_CHAT_LOGS_16." ".A_CHAT_LOGS_18,$dyhtmu." ".$MONTHU)."' target=_self>$dyhtmu</a>&nbsp;(".size_readable(filesize($du."/".$dyu)).")"); #print name of each file found
						if ($j % 5 == 0) echo ("\n</td>\n<td valign=top align=left nowrap=\"nowrap\">");
						$j++;
						$monthu_size = $monthu_size + filesize($du."/".$dyu);
					}
				}
				unset($dayarrayu);
				$yearu_size = $yearu_size + $monthu_size;
if($L != "hungarian")
{
				echo("\n</td>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" class=\"notify\" colspan=7><li>$MONTHU = ".size_readable($monthu_size,'%01.2f %s')."\n - <a href=\"$pstr&mzip=".$yru."/".$monthdiru."&path=$yu&year=$yeardiru&month=$monthdiru\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_12.A_CHAT_LOGS_26,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."' />\n</a>\n - <a href=\"$pstr&mdel=".$yru."/".$monthdiru."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_12."\\n".A_CHAT_LOGS_19,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_9." ".A_CHAT_LOGS_12,$MONTHU)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b></font>\n</a>\n</td>\n</tr>");
}
else
{
				echo("\n</td>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" class=\"notify\" colspan=7><li>$MONTHU = ".size_readable($monthu_size,'%01.2f %s')."\n - <a href=\"$pstr&mzip=".$yru."/".$monthdiru."&path=$yu&year=$yeardiru&month=$monthdiru\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_12.A_CHAT_LOGS_26,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."' />\n</a>\n - <a href=\"$pstr&mdel=".$yru."/".$monthdiru."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_12."\\n".A_CHAT_LOGS_19,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_91." ".A_CHAT_LOGS_12,$MONTHUHU)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b></font>\n</a>\n</td>\n</tr>");
}
		}
		echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" class=\"notify\" colspan=7><li>".sprintf(A_CHAT_LOGS_31,$yeardiru." = ",size_readable($yearu_size,'%01.2f %s'))."\n - <a href=\"$pstr&mzip=".$yru."&path=$yu&year=$yeardiru\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_12.A_CHAT_LOGS_26,$yeardiru)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardiru)." ".A_CHAT_LOGS_12."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardiru)." ".A_CHAT_LOGS_12."' />\n</a>\n - <a href=\"$pstr&ydel=".$yu."/".$yeardiru."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_8.A_CHAT_LOGS_12."\\n".A_CHAT_LOGS_19,$yeardiru)."')\" title='".sprintf(A_CHAT_LOGS_9." ".A_CHAT_LOGS_12,$yeardiru)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_10."</b></font>\n</a>\n</td>\n</tr>\n</table>\n<br />\n");
		$totalu_size = $totalu_size + $yearu_size;
}
		$zipu = opendir($yu); #open directory
				while (false !== ($zyu = readdir($zipu)))
				{
					if (!eregi("\.html",$zyu) && !eregi("error",$zyu) && $zyu!='.' && $zyu!='..' && !is_dir($yu."/".$zyu))
					{
						$ziparrayu[]=$zyu;
			 		}
			 	}
				closedir($zipu);
				if ($ziparrayu)
				{
					sort($ziparrayu);
				echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
				echo("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\"><font size=4 color=blue><b>".A_CHAT_LOGS_27." ".A_CHAT_LOGS_12."</b></font></td></tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\">");
					$zipu_size = 0;
					foreach ($ziparrayu as $zyu)
					{
						echo ("\n<li><a href=\"$pstr&fdel=".$yu."/".$zyu."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_12.A_CHAT_LOGS_19,$zyu)."')\" title='".A_CHAT_LOGS_29." ".A_CHAT_LOGS_12."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$yu/$zyu title='".sprintf(A_CHAT_LOGS_28,$zyu)." ".A_CHAT_LOGS_12."'>$zyu</a>&nbsp;(".size_readable(filesize($yu."/".$zyu))." / ".strftime(L_SHORT_DATETIME, filemtime($yu."/".$zyu)).")"); #print name of each file found
						$zipu_size = $zipu_size + filesize($yu."/".$zyu);
					}
					echo("\n</td>\n</tr>\n<td valign=top nowrap=\"nowrap\" class=\"notify\"><li>".sprintf(A_CHAT_LOGS_31," = ",size_readable($zipu_size,'%01.2f %s'))."</td>\n</tr>\n</table>\n<br />\n");
				}
				unset($ziparrayu);
		$totalu_size = $totalu_size + $zipu_size;
		echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>\n<tr>\n<td valign=top align=center nowrap=\"nowrap\" class=\"notify\" colspan=7>".sprintf(A_CHAT_LOGS_31,A_CHAT_LOGS_12." = ",size_readable($totalu_size,'%01.2f %s'))."</td>\n</tr>\n</table>\n<br />\n");
		echo("\n<P ALIGN=right><A HREF=#full>".A_CHAT_LOGS_20."</A>\n<br />\n<A HREF=#home>".A_CHAT_LOGS_21."</A></P><CENTER>");
}
?>