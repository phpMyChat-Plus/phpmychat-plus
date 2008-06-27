<?php
// Get the names and values for vars sent to index.lib.php

if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"]) && !isset($R)) $R = urldecode($_COOKIE["CookieRoom"]);
if (!isset($R)) $skin = "skins/style1";

require("config/config.lib.php");
require("lib/release.lib.php");
if (!isset($L) || $L == "") $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");

header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
set_magic_quotes_runtime(0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";

// Horizontal alignment for cells topic
$CellAlign = ($Align == "right" ? "RIGHT" : "LEFT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(L_BUZZ." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
function targetWin()
{
	if (window.opener.window.document.title == "<?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME); ?>")
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
				$i = 1;
				while (false !== ($buzzfile = readdir($buzzfiles)))
				{
					if (!eregi("\.html",$buzzfile) && !eregi("\.txt",$buzzfile) && $buzzfile!=='.' && $buzzfile!=='..')
					{
						$buzzsounds[]=$buzzfile;
			 		$i++;
			 		}
			 	}
				closedir($buzzfiles);
			  if ($buzzsounds)
			  {
			  		sort($buzzsounds);
				}
				$i = ($i - ($i % 5)) / 5;
			  $j = 1;
			  foreach ($buzzsounds as $buzzname)
			  {
					$buzzname=str_replace(".wav","",$buzzname);
					echo ("<a href=\"\" onClick=\"buzz2Input('".$buzzname."',0); return false\"  onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_13).".'; return true\" title=\"".sprintf(L_CLICK,L_LINKS_13)."\">".$buzzname."</a><br />"); #print name of each file found
					if ($j == $i || $j == $i*2 || $j == $i*3 || $j == $i*4 || $j == $i*5) echo ("</td><td valign=top align=$CellAlign nowrap=\"nowrap\">");
					$j++;
				}
		unset($buzzsounds);
		echo("</tr>");
		echo("</td></tr></table></TABLE>");
?>
<P>
<input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;">
</CENTER>
<div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2006-<?php echo(date('Y')); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
</BODY>
</HTML>
<?php
?>