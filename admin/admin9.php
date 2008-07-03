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
function delDir($dirName) {
   if(empty($dirName)) {
       return;
   }
   if(file_exists($dirName)) {
       $dir = dir($dirName);
       while(false !== ($file = $dir->read())) {
           if($file != '.' && $file != '..') {
               if(is_dir($dirName.'/'.$file)) {
                   delDir($dirName.'/'.$file);
       echo 'Folder month "<b>'.$dirName.'</b>" deleted.';
               } else {
									@fclose($dirName.'/'.$file) ;
                  @unlink($dirName.'/'.$file) or die('File '.$dirName.'/'.$file.' couldn\'t be deleted!');
       echo 'File "<b>'.$dirName.'/'.$file.'</b>" deleted.';
               }
           }
       }
       @rmdir($dirName.'/'.$file) or die('Folder '.$dirName.'/'.$file.' couldn\'t be deleted!');
       echo 'Folder "<b>'.$dirName.'</b>" deleted.';
   } else {
       echo 'Folder "<b>'.$dirName.'</b>" doesn\'t exist.';
   }
}
function delFile($fileName) {
   if(file_exists($fileName)) {
									@fclose($fileName) ;
                  @unlink($fileName) or die('File '.$fileName.' couldn\'t be deleted!');
       echo 'File "<b>'.$fileName.'</b>" deleted.';
}
}
function makeZip($dirName,$path,$year,$month) {
if (isset($month)) $zipfile = new zip_file($path."/".$year."_".$month.".zip");
elseif (isset($year)) $zipfile = new zip_file($path."/".$year.".zip");
$zipfile->set_options(array('overwrite' => 1, 'inmemory' => 0, 'recurse' => (isset($month) ? 0 : 1), 'storepaths' => 1));
$zipfile->add_files(array($dirName."/*.htm",$dirName."/*.php"));
$zipfile->create_archive();
if (count($zipfile->errors) > 0)
	print ("Errors occurred."); // Process errors here
}
?>
<A NAME="home"></A>
<?php
if (file_exists("acount/pages/chat_ip_logs.htm"))
{
?>
<P CLASS=title><?php echo(sprintf(A_CHAT_LOGS_1,APP_NAME)); ?></P>
</center>
<?php
echo ("<a href=\"acount/pages/chat_ip_logs.htm\" target=\"_blank\" title='".A_CHAT_LOGS_3."'><b>".A_CHAT_LOGS_3."</b></a>
&nbsp;&nbsp;-&nbsp;&nbsp;
<a href=\"$pstr&ipdel=acount/pages/chat_ip_logs.htm\" onclick=\"return confirm('".A_CHAT_LOGS_5.A_CHAT_LOGS_19."');\" title='".A_CHAT_LOGS_4."'><font size=-2 color=red><b>".A_CHAT_LOGS_4."</b></font></a>");
}
else
{
	copy("acount/pages/bak/chat_ip_logs.htm","acount/pages/chat_ip_logs.htm");
	chmod("acount/pages/chat_ip_logs.htm", 0666);
}
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
$y='./'.C_LOG_DIR.''; #define which year you want to read
				$zip = opendir($y); #open directory
				while (false !== ($zy = readdir($zip)))
				{
					if (!eregi("\.html",$zy) && !eregi("error",$zy) && $zy!='.' && $zy!='..' && !is_dir($y."/".$zy))
					{
						$ziparray[]=$zy;
			 		}
			 	}
				closedir($zip);
				if ($ziparray)
				{
					sort($ziparray);
					$i=1;
				echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
				echo("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\"><font size=4 color=blue><b>".A_CHAT_LOGS_27."</b></font></td></tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\">");
					foreach ($ziparray as $zy)
					{
						echo ("\n<li><a href=\"$pstr&fdel=".$y."/".$zy."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_19,$zy)."')\" title='".A_CHAT_LOGS_29."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$y/$zy title='".sprintf(A_CHAT_LOGS_28,$zy)."'>$zy</a>&nbsp;(".filesize($y."/".$zy)." bytes, ".strftime(L_SHORT_DATETIME, filemtime($y."/".$zy)).")"); #print name of each file found
						$i++;
					}
				}
				unset($ziparray);
		echo("\n</td>\n</tr>\n</table>\n<br />\n");
$yrs = preg_find('/./', $y, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrs as $yr)
{
		$yeardir = eregi_replace($y."/",'',$yr);
				echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
				echo ("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\" colspan=6>\n<font size=4 color=red><b>$yeardir</b></font>\n - <a href=\"$pstr&mzip=".$yr."&path=$y&year=$yeardir\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardir)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardir)."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardir)."' />\n</a>\n - <a href=\"$pstr&ydel=".$y."/".$yeardir."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_8.A_CHAT_LOGS_19,$yeardir)."')\" title='".sprintf(A_CHAT_LOGS_9,$yeardir)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_10."</b></font>\n</a>\n</td>"); #print name of each file found
		$m=$yr; #define which month you want to read
		$mts = preg_find('/./', $yr, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mts as $mt => $stats)
		{
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
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" colspan=6>\n<font size=4 color=green><b>$MONTH</b></font>\n - <a href=\"$pstr&mzip=".$yr."/".$monthdir."&path=$y&year=$yeardir&month=$monthdir\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."' />\n</a>\n - <a href=\"$pstr&mdel=".$yr."/".$monthdir."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_19,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_9,$MONTH)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b></font>\n</a></td>"); #print name of each file found
}
else
{
				$MONTHHU = $MONTH."i";
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" colspan=6>\n<font size=4 color=green><b>$MONTH</b></font>\n - <a href=\"$pstr&mzip=".$yr."/".$monthdir."&path=$y&year=$yeardir&month=$monthdir\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardir."/".$monthdir)."' />\n</a>\n - <a href=\"$pstr&mdel=".$yr."/".$monthdir."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_19,$yeardir."/".$monthdir)."')\" title='".sprintf(A_CHAT_LOGS_91,$MONTHHU)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b>\n</font>\n</a>\n</td>"); #print name of each file found
}
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
						echo ("\n<li><a href=\"$pstr&fdel=".$mt."/".$dy."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_19,$dy)."')\" title='".A_CHAT_LOGS_15."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$d/$dy?L=$L title='".sprintf(A_CHAT_LOGS_16,$dyhtm." ".$MONTH)."' target=_self>$dyhtm</a>&nbsp;(".filesize($d."/".$dy)." bytes)"); #print name of each file found
						if ($i % 5 == 0) echo ("\n</td>\n<td valign=top align=left nowrap=\"nowrap\">");
						$i++;
					}
				}
				unset($dayarray);
				echo("\n</td>");
		}
		echo("\n</tr>\n</table>\n<br />\n");
}
?>
<center>
	<P CLASS=title><A NAME="user"></A><?php echo(APP_NAME." ".A_CHAT_LOGS_17) ?></P>
</center>
<?php
$yu='./logs'; #define which year you want to read
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
					foreach ($ziparrayu as $zyu)
					{
						echo ("\n<li><a href=\"$pstr&fdel=".$yu."/".$zyu."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_12.A_CHAT_LOGS_19,$zyu)."')\" title='".A_CHAT_LOGS_29." ".A_CHAT_LOGS_12."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$yu/$zyu title='".sprintf(A_CHAT_LOGS_28,$zyu)." ".A_CHAT_LOGS_12."'>$zyu</a>&nbsp;(".filesize($yu."/".$zyu)." bytes, ".strftime(L_SHORT_DATETIME, filemtime($yu."/".$zyu)).")"); #print name of each file found
					}
				}
				unset($ziparrayu);
		echo("\n</td>\n</tr>\n</table>\n<br />\n");
$yrsu = preg_find('/./', $yu, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrsu as $yru)
{
		$yeardiru = eregi_replace($yu."/",'',$yru);
				echo("\n<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table>");
				echo ("\n<tr>\n<td valign=top align=center nowrap=\"nowrap\" colspan=6>\n<font size=4 color=red><b>$yeardiru ".A_CHAT_LOGS_12."</b></font>\n - <a href=\"$pstr&mzip=".$yru."&path=$yu&year=$yeardiru\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_12.A_CHAT_LOGS_26,$yeardiru)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardiru)." ".A_CHAT_LOGS_12."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardiru)." ".A_CHAT_LOGS_12."' />\n</a>\n - <a href=\"$pstr&ydel=".$yu."/".$yeardiru."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_8.A_CHAT_LOGS_12."\\n".A_CHAT_LOGS_19,$yeardiru)."')\" title='".sprintf(A_CHAT_LOGS_9." ".A_CHAT_LOGS_12,$yeardiru)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_10."</b></font>\n</a>\n</td>"); #print name of each file found
		$mu=$yru; #define which month you want to read
		$mtsu = preg_find('/./', $yru, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mtsu as $mtu => $stats)
		{
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
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" colspan=6>\n<font size=4 color=green><b>$MONTHU ".A_CHAT_LOGS_12."</b></font>\n - <a href=\"$pstr&mzip=".$yru."/".$monthdiru."&path=$yu&year=$yeardiru&month=$monthdiru\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_12.A_CHAT_LOGS_26,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."' />\n</a>\n - <a href=\"$pstr&mdel=".$yru."/".$monthdiru."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_12."\\n".A_CHAT_LOGS_19,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_9." ".A_CHAT_LOGS_12,$MONTHU)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b></font>\n</a>\n</td>"); #print name of each file found
}
else
{
				$MONTHUHU = $MONTHU."i";
				echo("\n</tr>\n<tr>\n<td valign=top align=left nowrap=\"nowrap\" colspan=6>\n<font size=4 color=green><b>$MONTHU ".A_CHAT_LOGS_12."</b></font>\n - <a href=\"$pstr&mzip=".$yru."/".$monthdiru."&path=$yu&year=$yeardiru&month=$monthdiru\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_25.A_CHAT_LOGS_26,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."'>\n<img src=\"images/archive.gif\" border=0 alt='".sprintf(A_CHAT_LOGS_24,$yeardiru."/".$monthdiru)." ".A_CHAT_LOGS_12."' />\n</a>\n - <a href=\"$pstr&mdel=".$yru."/".$monthdiru."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_11.A_CHAT_LOGS_12."\\n".A_CHAT_LOGS_19,$yeardiru."/".$monthdiru)."')\" title='".sprintf(A_CHAT_LOGS_91." ".A_CHAT_LOGS_12,$MONTHUHU)."'>\n<font size=-2 color=red><b>".A_CHAT_LOGS_13."</b></font>\n</a>\n</td>"); #print name of each file found
}
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
						echo ("\n<li><a href=\"$pstr&fdel=".$mtu."/".$dyu."\" onclick=\"return confirm('".sprintf(A_CHAT_LOGS_14.A_CHAT_LOGS_18."\\n".A_CHAT_LOGS_19,$dyu)."')\" title='".A_CHAT_LOGS_15."'><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$du/$dyu?L=$L title='".sprintf(A_CHAT_LOGS_16." ".A_CHAT_LOGS_18,$dyhtmu." ".$MONTHU)."' target=_self>$dyhtmu</a>&nbsp;(".filesize($du."/".$dyu)." bytes)"); #print name of each file found
						if ($j % 5 == 0) echo ("\n</td>\n<td valign=top align=left nowrap=\"nowrap\">");
						$j++;
					}
				}
				unset($dayarrayu);
				echo("\n</td>");
		}
		echo("\n</tr>\n</table>\n<br />\n");
}
		echo("\n<P ALIGN=right><A HREF=#full>".A_CHAT_LOGS_20."</A>\n<br />\n<A HREF=#home>".A_CHAT_LOGS_21."</A></P><CENTER>");
				if($ydel != "")
				{
				delDir($ydel);
				}
				if($mdel != "")
				{
				delDir($mdel);
				}
				if($fdel != "")
				{
				delfile($fdel);
				}
				if($ipdel != "")
				{
				copy($ipdel,"acount/pages/bak/chat_ip_logs_".date('ymd').".htm");
				delfile($ipdel);
				}
				if($mzip != "")
				{
				makeZip($mzip,$path,$year,$month);
				}
}
?>