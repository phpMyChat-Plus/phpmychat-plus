<?php
// Get the names and values for vars sent to index.lib.php

if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

if (isset($HTTP_POST_VARS))
{
	while(list($name,$value) = each($HTTP_POST_VARS))
	{
		$$name = $value;
	};
};
if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);
if (!isset($R)) $skin == "style";

require("config/config.lib.php");
if (!isset($L)) $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");
require("lib/release.lib.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">
<HEAD>
<TITLE><?php echo(APP_NAME); ?> Users Logs Archive</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>

<BODY onLoad="window.status='Welcome to the Archive Page. These are only the public messages stored.';">
<CENTER>
<P CLASS=title><?php echo(APP_NAME); ?> Users Logs Archive</P>
</CENTER>
<?php
// Credit for this goes to Ciprian Murariu <ciprianmp@yahoo.com>.
$yu='./logs/'; #define which year you want to read
$yearu = opendir($yu); #open directory
while (false !== ($yru = readdir($yearu)))
{
	if (!eregi("\.html",$yru) && $yru!=='.' && $yru!=='..')
	{
		$yeardiru = $yru;
		echo("<table BORDER=1 CELLSPACING=0 CELLPADDING=0 class=table><tr>");
		echo ("<td valign=top align=center nowrap colspan=5><font size=4 color=red><b>$yru</b></font></td>"); #print name of each file found
	$mu=$yu.$yeardiru; #define which month you want to read
	$monthu = opendir($mu); #open directory
		while (false !== ($mtu = readdir($monthu)))
		{
			if (!eregi("\.html",$mtu) && $mtu!=='.' && $mtu!=='..')
			{
				$monthdiru = $mtu;
						echo("<tr>");
						echo ("<td valign=top align=center nowrap><font size=4 color=green><b>$mtu</b></font></td>"); #print name of each file found
						echo ("<td valign=top align=left nowrap>");
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
					$dyuhtm=str_replace(".htm","",$dyu);
					$dyuhtm=str_replace($yru.$mtu,"",$dyuhtm);
					echo ("<li><a href=$du/$dyu title=\"Read $dyuhtm $mtu $yru archive\" target=_self>$dyuhtm</a> (".filesize($du."/".$dyu)." bytes)<br>\n"); #print name of each file found
					if ($j==7 || $j==14 || $j==21 || $j==28) echo ("<td valign=top align=left nowrap>");
					$j++;
				}
				unset($dayarrayu);
					echo("</tr>");
			}
		}
		echo("</td></tr></table><br>");
		closedir($monthu);
	}
}
closedir($yearu);
?>
</BODY>
</HTML>
<?php
exit();
?>