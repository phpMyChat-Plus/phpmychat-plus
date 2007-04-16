<?php
// Get the names and values for vars sent to index.lib.php

if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($HTTP_COOKIE_VARS["CookieRoom"]) && !isset($R)) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);
if (!isset($R)) $skin == "style1";

require("config/config.lib.php");
require("lib/release.lib.php");
if (!isset($L)) $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");

header("Content-Type: text/html; charset=${Charset}");

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";

// Text direction and horizontal alignment for cells topic
$TextDir = ($Charset == "windows-1256" ? "RTL" : "LTR");
$CellAlign = ($Charset != "windows-1256" ? "LEFT" : "RIGHT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($TextDir); ?>">

<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(L_BUZZ); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=10&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
function targetWin()
{
	if (window.opener.window.document.title == "<?php echo(APP_NAME); ?>")
		return window.opener.frames['input'].window;
	else if (window.opener.window.document.title == "Hidden Input frame")
		return window.opener.window.parent.frames['input'].window;
	else
		return window.opener.window;
}

function buzz2Input(code)
{
	window.focus();
	if (window.opener && !window.opener.closed)
	{
		var addTo = targetWin();
		if (addTo && !addTo.closed)
		{
			var oldStr = addTo.document.forms['MsgForm'].elements['M'].value;
			if (oldStr == "")
			{
				addTo.document.forms['MsgForm'].elements['M'].value = "/buzz ~" + code;
			}
			else
			{
				addTo.document.forms['MsgForm'].elements['M'].value = "/buzz ~" + code + " " + oldStr;
			}
			addTo.document.forms['MsgForm'].elements['M'].focus();
		}
	};
}
//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="if (window.focus) window.focus();">
<CENTER>
	<TABLE BORDER=1 CLASS="table">
	<TR>
		<TH CLASS="tabtitle" COLSPAN=5><?php echo(L_BUZZ); ?></TH>
	</TR>
<?php
// Credit for this goes to Ciprian Murariu <ciprianmp@yahoo.com>
		$sounds='./sounds';
		$buzzfiles = opendir($sounds); #open directory
		echo("<tr>");
		echo ("<td valign=top align=$CellAlign nowrap=\"nowrap\">");
				while (false !== ($buzzfile = readdir($buzzfiles)))
				{
					if (!eregi("\.html",$buzzfile) && $buzzfile!=='.' && $buzzfile!=='..')
					{
						$buzzsounds[]=$buzzfile;
			 		}
			 	}
				closedir($buzzfiles);
			  if ($buzzsounds)
			  {
			  		sort($buzzsounds);
				}
			  $j=1;
			  foreach ($buzzsounds as $buzzname)
			  {
					$buzzname=str_replace(".wav","",$buzzname);
					echo ("<a href=\"\" onClick=\"buzz2Input('".$buzzname."',0); return false\"  onMouseOver=\"window.status='Click to play this buzz.'; return true\" title=\"Click to play this buzz\">".$buzzname."</a><br />"); #print name of each file found
					if ($j==20 || $j==40 || $j==60 || $j==80 || $j==100 || $j==120 || $j==140 || $j==160 || $j==180) echo ("</td><td valign=top align=$CellAlign nowrap=\"nowrap\">");
					$j++;
				}
		unset($buzzsounds);
		echo("</tr>");
		echo("</td></tr></table><br />");
?>
	</TABLE>
<input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;">
</CENTER>
<P align="right" style="font-weight: 800; color:#FFD700; font-size: 7pt">
&copy; 2005-<?php echo(date(Y)); ?> - by <a href=mailto:ciprianmp@yahoo.com onMouseOver="window.status='Click to email author.'; return true;">Ciprian Murariu</a>
</P>
</BODY>
</HTML>
<?php
?>