<?php
// Archive Panel (logs) by Ciprian Murariu <ciprianmp@yahoo.com>.
// This sheet is diplayed when the admin wants to check the messages archive

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.
include("lib/preg_find.php");

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
<A NAME="full"></A>
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
$y='./'.C_LOG_DIR.''; #define which year you want to read
$yrs = preg_find('/./', $y, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrs as $yr)
{
		$yeardir = eregi_replace($y."/",'',$yr);
				echo("<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table><tr>");
				echo ("<td valign=top align=center nowrap=\"nowrap\" colspan=6><font size=4 color=red><b>$yeardir</b></font> - <a href=\"$pstr&ydel=".$y."/".$yeardir."\" onclick=\"return confirm('This will delete all the files and folders\\nstored in the $yeardir folder!\\nThis is not reversible...\\n\\nAre you sure?');\" title=\"Delete all $yeardir logs\"><font size=-2 color=red><b>Delete year</b></font></a></td>"); #print name of each file found
		$m=$yr; #define which month you want to read
		$mts = preg_find('/./', $yr, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mts as $mt => $stats)
		{
				$monthdir = eregi_replace($yr."/",'',$mt);
				echo("<tr>");
				echo ("<td valign=top align=left nowrap=\"nowrap\" colspan=6><font size=4 color=green><b>$monthdir</b></font> - <a href=\"$pstr&mdel=".$yr."/".$monthdir."\" onclick=\"return confirm('This will delete all the files\\nstored in the ".$yeardir."/".$monthdir." folder!\\nThis is not reversible...\\n\\nAre you sure?');\" title=\"Delete all $monthdir/$yeardir logs\"><font size=-2 color=red><b>Delete month</b></font></a></td>"); #print name of each file found
				echo ("<tr><td valign=top align=left nowrap=\"nowrap\">");
				$d=$yr."/".$monthdir; #define which month you want to read
				$day = opendir($d); #open directory
				while (false !== ($dy = readdir($day)))
				{
					if (!eregi("\.html",$dy) && $dy!='.' && $dy!='..')
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
						echo("<ul><div style=\"background: white;\">");
						if (eregi(".htm",$dy)) $dyhtm=str_replace(".htm","",$dy);
						else $dyhtm=str_replace(".php","",$dy);
						$dyhtm=str_replace($yeardir.$monthdir,"",$dyhtm);
						echo ("<li>&nbsp;<a href=\"$pstr&fdel=".$mt."/".$dy."\" onclick=\"return confirm('This will delete the $dy file!\\nThis is not reversible...\\n\\nAre you sure?');\" title=\"Delete this log\"><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$d/$dy?L=$L title=\"Read $dyhtm $monthdir $yeardir log\" target=_self>$dyhtm</a>&nbsp;(".filesize($d."/".$dy)." bytes)<br />\n"); #print name of each file found
						if ($i==5 || $i==10 || $i==15 || $i==20 || $i==25) echo ("</ul><td valign=top align=left nowrap=\"nowrap\"><ul>");
						$i++;
					echo("</div></ul>");
					}
				}
				unset($dayarray);
				echo("</tr>");
		}
		echo("</td></tr></table><br />");
}
?>
<center>
<A NAME="user"></A>
	<P CLASS=title><?php echo(APP_NAME); ?> Users Logs Archive</P>
</center>
<?php
$yu='./logs'; #define which year you want to read
$yrsu = preg_find('/./', $yu, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrsu as $yru)
{
		$yeardiru = eregi_replace($yu."/",'',$yru);
				echo("<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table><tr>");
				echo ("<td valign=top align=center nowrap=\"nowrap\" colspan=6><font size=4 color=red><b>$yeardiru</b></font> - <a href=\"$pstr&ydel=".$yu."/".$yeardiru."\" onclick=\"return confirm('This will delete all the files and folders\\nstored in the $yeardir folder!\\nThis is not reversible...\\n\\nAre you sure?');\" title=\"Delete all $yeardiru logs\"><font size=-2 color=red><b>Delete year</b></font></a></td>"); #print name of each file found
		$mu=$yru; #define which month you want to read
		$mtsu = preg_find('/./', $yru, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mtsu as $mtu => $stats)
		{
				$monthdiru = eregi_replace($yru."/",'',$mtu);
				echo("<tr>");
				echo ("<td valign=top align=left nowrap=\"nowrap\" colspan=6><font size=4 color=green><b>$monthdiru</b></font> - <a href=\"$pstr&mdel=".$yru."/".$monthdiru."\" onclick=\"return confirm('This will delete all the files\\nstored in the ".$yeardir."/".$monthdir." folder!\\nThis is not reversible...\\n\\nAre you sure?');\" title=\"Delete all $monthdiru/$yeardiru logs\"><font size=-2 color=red><b>Delete month</b></font></a></td>"); #print name of each file found
				echo ("<tr><td valign=top align=left nowrap=\"nowrap\">");
				$du=$yru."/".$monthdiru; #define which month you want to read
				$dayu = opendir($du); #open directory
				while (false !== ($dyu = readdir($dayu)))
				{
					if (!eregi("\.html",$dyu) && $dyu!='.' && $dyu!='..')
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
						echo("<ul><div style=\"background: white;\">");
						if (eregi(".htm",$dyu)) $dyhtmu=str_replace(".htm","",$dyu);
						else $dyhtmu=str_replace(".php","",$dyu);
						$dyhtmu=str_replace($yeardiru.$monthdiru,"",$dyhtmu);
						echo ("<li>&nbsp;<a href=\"$pstr&fdel=".$mtu."/".$dyu."\" onclick=\"return confirm('This will delete the $dy file!\\nThis is not reversible...\\n\\nAre you sure?');\" title=\"Delete this log\"><font size=-2 color=red><b>x</b></font></a>&nbsp;<a href=$du/$dyu?L=$L title=\"Read $dyhtmu $monthdiru $yeardiru log\" target=_self>$dyhtmu</a>&nbsp;(".filesize($du."/".$dyu)." bytes)<br />\n"); #print name of each file found
						if ($j==5 || $j==10 || $j==15 || $j==20 || $j==25) echo ("</ul><td valign=top align=left nowrap=\"nowrap\"><ul>");
						$j++;
						echo("</div></ul>");
					}
				}
				unset($dayarrayu);
				echo("</tr>");
		}
		echo("</td></tr></table><br />");
}
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