<?php
// Archive Panel (logs) by Ciprian Murariu <ciprianmp@yahoo.com>.
// This sheet is diplayed when the admin wants to check the messages archive

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

if (!C_CHAT_LOGS)
{
?>
<P CLASS=title><?php echo(APP_NAME); ?> Archive has been disabled</P>
</center>
<?php
}
else
{
?>
<A NAME="full">
	<P CLASS=title><?php echo(APP_NAME); ?> Full Logs Archive</P>
</center>
<?php
// Credit for this mod goes to Ciprian Murariu <ciprianmp@yahoo.com>.
$pstr = "admin.php?From=admin.php&What=Body&L=$L"."&pmc_username=".$pmc_username."&pmc_password=".$pmc_password."&sheet=9";
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
		echo("<P ALIGN=right><A HREF=#user>Show the users' archive section</A></P>");
$y='./'.C_LOG_DIR.'/'; #define which year you want to read
$year = opendir($y); #open directory
while (false !== ($yr = readdir($year)))
{
	if (!eregi("\.html",$yr) && $yr!='.' && $yr!='..')
	{
		$yeardir = $yr;
				echo("<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table><tr>");
				echo ("<td valign=top align=center nowrap=\"nowrap\" colspan=5><font size=4 color=red><b>$yr</b></font><br /><a href=\"$pstr&ydel=".$y.$yr."\" title=\"Delete all $yr logs\"><font size=-2 color=red><b>Delete year</b></font></a></td>"); #print name of each file found
		$m=$y.$yeardir; #define which month you want to read
 $month = opendir($m); #open directory
		while (false !== ($mt = readdir($month)))
		{
			if (!eregi("\.html",$mt) && $mt!='.' && $mt!='..')
			{
				$monthdir = $mt;
						echo("<tr>");
						echo ("<td valign=top align=center nowrap=\"nowrap\"><font size=4 color=green><b>$mt</b></font><br /><a href=\"$pstr&mdel=".$y.$yr."/".$mt."\" title=\"Delete all $mt/$yr logs\"><font size=-2 color=red><b>Delete<br />month</b></font></a></td>"); #print name of each file found
						echo ("<td valign=top align=left nowrap=\"nowrap\">");
				$d=$y.$yeardir."/".$monthdir; #define which month you want to read
				$day = opendir($d); #open directory
				while (false !== ($dy = readdir($day)))
				{
					if (!eregi("\.html",$dy) && $dy!='.' && $dy!='..')
					{
						$dayarray[]=$dy;
			 		}
			 	}
				closedir($day);
				if ($dayarray) sort($dayarray);
				$i=1;
				foreach ($dayarray as $dy)
				{
					if (eregi(".htm",$dy)) $dyhtm=str_replace(".htm","",$dy);
					else $dyhtm=str_replace(".php","",$dy);
					$dyhtm=str_replace($yr.$mt,"",$dyhtm);
					echo ("<li><a href=$d/$dy?L=$L title=\"Read $dyhtm $mt $yr log\" target=_self>$dyhtm</a>&nbsp;&nbsp;<a href=\"$pstr&fdel=".$y.$yr."/".$mt."/".$dy."\" title=\"Delete this log\"><font size=-2 color=red><b>x</b></font></a>&nbsp;&nbsp;&nbsp;(".filesize($d."/".$dy)." bytes)<br />\n"); #print name of each file found
					if ($i==7 || $i==14 || $i==21 || $i==28) echo ("<td valign=top align=left nowrap=\"nowrap\">");
					$i++;
				}
				unset($dayarray);
					echo("</tr>");
			}
		}
		echo("</td></tr></table><br />");
		closedir($month);
	}
}
closedir($year);
?>
<center>
<A NAME="user">
	<P CLASS=title><?php echo(APP_NAME); ?> Users Logs Archive</P>
</center>
<?php
$yu='./logs/'; #define which year you want to read
$yearu = opendir($yu); #open directory
while (false !== ($yru = readdir($yearu)))
{
	if (!eregi("\.html",$yru) && $yru!=='.' && $yru!=='..')
	{
		$yeardiru = $yru;
		echo("<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table><tr>");
		echo ("<td valign=top align=center nowrap=\"nowrap\" colspan=5><font size=4 color=red><b>$yru</b></font><br /><a href=\"$pstr&ydel=".$yu.$yru."\" title=\"Delete all $yru logs\"><font size=-2 color=red><b>Delete year</b></font></a></td>"); #print name of each file found
	$mu=$yu.$yeardiru; #define which month you want to read
	$monthu = opendir($mu); #open directory
		while (false !== ($mtu = readdir($monthu)))
		{
			if (!eregi("\.html",$mtu) && $mtu!=='.' && $mtu!=='..')
			{
				$monthdiru = $mtu;
						echo("<tr>");
						echo ("<td valign=top align=center nowrap=\"nowrap\"><font size=4 color=green><b>$mtu</b></font><br /><a href=\"$pstr&mdel=".$yu.$yru."/".$mtu."\" title=\"Delete all $mtu/$yru logs\"><font size=-2 color=red><b>Delete<br />month</b></font></a></td>"); #print name of each file found
						echo ("<td valign=top align=left nowrap=\"nowrap\">");
				$du=$yu.$yeardiru."/".$monthdiru; #define which month you want to read
				$dayu = opendir($du); #open directory
				while (false !== ($dyu = readdir($dayu)))
				{
					if (!eregi("\.html",$dyu) && $dyu!=='.' && $dyu!=='..')
					{
						$dayarrayu[]=$dyu;
			 		}
			 	}
				closedir($dayu);
			  if ($dayarrayu) sort($dayarrayu);
				$j=1;
			  foreach ($dayarrayu as $dyu)
			  {
					if (eregi(".htm",$dyu)) $dyuhtm=str_replace(".htm","",$dyu);
					else $dyuhtm=str_replace(".php","",$dyu);
					$dyuhtm=str_replace($yru.$mtu,"",$dyuhtm);
					echo ("<li><a href=$du/$dyu?L=$L title=\"Read $dyuhtm $mtu $yru log\" target=_self>$dyuhtm</a>&nbsp;&nbsp;<a href=\"$pstr&fdel=".$yu.$yru."/".$mtu."/".$dyu."\" title=\"Delete this log\"><font size=-2 color=red><b>x</b></font></a>&nbsp;&nbsp;&nbsp;(".filesize($du."/".$dyu)." bytes)<br />\n"); #print name of each file found
					if ($j==7 || $j==14 || $j==21 || $j==28) echo ("<td valign=top align=left nowrap=\"nowrap\">");
					$j++;
				}
				unset($dayarrayu);
					echo("</tr>");
			}
		}
		echo("</td></tr></table><br />");
		closedir($monthu);
	}
}
closedir($yearu);
		echo("<P ALIGN=right><A HREF=#full>Show the full archive section</A></P>");
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
}
?>