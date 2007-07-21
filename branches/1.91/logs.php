<?php
// Get the names and values for vars sent to index.lib.php

if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

if (isset($_COOKIE["CookieStatus"])) $statusu = $_COOKIE["CookieStatus"];
if (isset($_COOKIE["CookieRoom"]) && !isset($R)) $R = urldecode($_COOKIE["CookieRoom"]);
if (!isset($R)) $skin == "style1";

require("config/config.lib.php");
if (!isset($L)) $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");
require("lib/release.lib.php");
include("lib/preg_find.php");

if (C_CHAT_LOGS && (C_SHOW_LOGS_USR || $statusu == "a"))
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(APP_NAME); ?> Users Logs Archive</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>

<BODY onLoad="window.status='Welcome to the Archive Page. These are only the public messages stored.';">
<CENTER>
<P CLASS=title><?php echo(APP_NAME); ?> Users Logs Archive</P>
</CENTER>
<?php
// Credit for this goes to Ciprian Murariu <ciprianmp@yahoo.com>.
$yu='./logs'; #define which year you want to read
$yrsu = preg_find('/./', $yu, PREG_FIND_DIRONLY|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
foreach($yrsu as $yru)
{
		$yeardiru = eregi_replace($yu."/",'',$yru);
		echo("<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table><tr>");
		echo ("<td valign=top align=center nowrap=\"nowrap\" colspan=6><font size=4 color=red><b>$yeardiru</b></font></td>"); #print name of each file found
		$mu=$yu."/".$yeardiru; #define which month you want to read
		$mtsu = preg_find('/./', $mu, PREG_FIND_DIRONLY|PREG_FIND_RETURNASSOC|PREG_FIND_SORTMODIFIED|PREG_FIND_SORTKEYS|PREG_FIND_SORTDESC);
		foreach($mtsu as $mtu => $stats)
		{
			$monthdiru = eregi_replace($mu."/",'',$mtu);
					echo("<tr>");
					echo ("<td valign=top align=left nowrap=\"nowrap\" colspan=6><font size=4 color=green><b>$monthdiru</b></font></td>"); #print name of each file found
					echo ("<tr><td valign=top align=left nowrap=\"nowrap\">");
			$du=$yru."/".$monthdiru; #define which month you want to read
			$dayu = opendir($du); #open directory
			while (false !== ($dyu = readdir($dayu)))
			{
				if (!eregi("\.html",$dyu) && $dyu!=='.' && $dyu!=='..')
				{
					$dayarrayu[]=$dyu;
		 		}
		 	}
			closedir($dayu);
		  if ($dayarrayu)
		  {
				sort($dayarrayu);
				$j=1;
				echo("<ul>");
			  foreach ($dayarrayu as $dyu)
			  {
					if (eregi(".htm",$dyu)) $dyuhtm=str_replace(".htm","",$dyu);
					else $dyuhtm=str_replace(".php","",$dyu);
					$dyuhtm=str_replace($yeardiru.$monthdiru,"",$dyuhtm);
					echo ("<li>&nbsp;&middot;&nbsp;<a href=$du/$dyu?L=$L title=\"Read $dyuhtm $monthdiru $yeardiru archive!\">$dyuhtm</a> (".filesize($du."/".$dyu)." bytes)<br />\n"); #print name of each file found
					if ($j==5 || $j==10 || $j==15 || $j==20 || $j==25) echo ("</ul><td valign=top align=left nowrap=\"nowrap\"><ul>");
					$j++;
				}
				echo("<ul>");
			}
			unset($dayarrayu);
			echo("</tr>");
			}
		echo("</td></tr></table><br />");
}
?>
</BODY>
</HTML>
<?php
exit();
}
else
{
?>
<html>
<head>
<title>Invalid address - Logging feature disabled</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</head>

<body class="frame">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center><font size="+2"><b>You don't have access to this file.<br />Logging feature has been disabled<br />Press <a href=./>here</a> to go to the index page or just wait...</b><font>
<br /><br /><br /><br />Hacking attempt! Redirection to the index page in 5 seconds.</center>
<meta http-equiv="refresh" content="5; url=./">
</body>
</html>
<?php
exit();
}
?>