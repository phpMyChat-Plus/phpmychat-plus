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

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/smilies.lib.php");

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
<TITLE><?php echo(L_HELP_TIT_1); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
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

function smiley2Input(code)
{
	window.focus();
	if (window.opener && !window.opener.closed)
	{
		addTo = targetWin();
		if (addTo && !addTo.closed)
		{
			addTo.document.forms['MsgForm'].elements['M'].value += code;
			addTo.document.forms['MsgForm'].elements['M'].focus();
		}
	};
}

function cmd2Input(code,addstring)
{
	window.focus();
	if (window.opener && !window.opener.closed)
	{
		addTo = targetWin();
		if (addTo && !addTo.closed)
		{
			oldStr = (addstring ? addTo.document.forms['MsgForm'].elements['M'].value : "");
			if (addstring && (oldStr == "" || oldStr.substring(0,1) != " "))
				oldStr = " " + oldStr;
			addTo.document.forms['MsgForm'].elements['M'].value = code + oldStr;
			addTo.document.forms['MsgForm'].elements['M'].focus();
		};
	};
}
//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="if (window.focus) window.focus();">
<CENTER>
<?php
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"popup");
	unset($SmiliesTbl);
	?>
	<!-- Smilies codes -->

	<TABLE BORDER=0 CLASS="table">
	<TR>
		<TH CLASS="tabtitle" COLSPAN=<?php echo($Nb); ?>><?php echo(L_HELP_TIT_1); ?></TH>
	</TR>
	<?php
	$i = "0";
	$Nb = count($ResultTbl);
	while($i < $Nb)
	{
		if ($i > 0) echo("\t");
		echo("<TR VALIGN=\"BOTTOM\">\n");
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n\t<TR>\n");
		$i++;
		echo("$ResultTbl[$i]");
		echo("\t</TR>\n");
		$i++;
	};
	unset($ResultTbl);
	?>
	</TABLE>
<br /><input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;">
<P align="right" style="font-weight: 800; color:#FFD700; font-size: 7pt">
&copy; 2005-<?php echo(date(Y)); ?> - by <a href=mailto:ciprianmp@yahoo.com onMouseOver="window.status='Click to email author.'; return true;">Ciprian Murariu</a>
</P>
<?php
?>