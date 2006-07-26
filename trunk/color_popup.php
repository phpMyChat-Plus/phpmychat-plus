<?php
// Get the names and values for vars sent to this script
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Color Input Box mod by Ciprian - v.1.5 - 19.08.2005
if (isset($HTTP_GET_VARS["L"])) $L = $HTTP_GET_VARS["L"];
if (isset($HTTP_COOKIE_VARS["CookieStatus"])) $CookieStatus = $HTTP_COOKIE_VARS["CookieStatus"];
if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);

// Fix a security hole
if (isset($L) && !is_dir('./localization/'.$L)) exit();

if (isset($HTTP_GET_VARS["Ver"])) $Ver = $HTTP_GET_VARS["Ver"];
require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/release.lib.php");

header("Content-Type: text/html; charset=${Charset}");

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";

// Text direction and horizontal alignment for cells topic
$TextDir = ($Charset == "windows-1256" ? "RTL" : "LTR");
$CellAlign = ($Charset != "windows-1256" ? "LEFT" : "RIGHT");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($TextDir); ?>">
<HEAD><TITLE><?php echo(L_COLOR_HEAD); ?></TITLE>
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
var is_colorhelp_popup = null;

function targetWin()
{
	if (window.opener.window.document.title == "<?php echo(APP_NAME); ?>")
		return window.opener.frames['input'].window;
	else if (window.opener.window.document.title == "Hidden Input frame")
		return window.opener.window.parent.frames['input'].window;
	else
		return window.opener.window;
};

function put_focus()
{
	if (window.opener.window.document.title == "Hidden Input frame")
			targetFrame = window.opener.window.parent.frames['input'].window;
	else
		targetFrame = window.opener.window.frames['input'].window;

	with (targetFrame)
	{
			targetFrame.focus();
		if (document.forms['MsgForm'] && document.forms['MsgForm'].elements['M'])
			document.forms['MsgForm'].elements['M'].focus();
	};
}

function colorInput(code)
{
	window.focus();
	if (window.opener && !window.opener.closed)
	{
		addTo = targetWin();
		if (addTo && !addTo.closed)
		{
		addTo.document.forms['MsgForm'].elements['C'].value = code;
		window.status='You have selected the '+code+' color.'; return true;
		}
	};
};

function colorhelp_popup()
{
	if (is_colorhelp_popup && !is_colorhelp_popup.closed)
	{
		is_colorhelp_popup.focus();
	}
	else
	{
		is_colorhelp_popup = window.open("colorhelp_popup.php?<?php echo("L=$L&Ver=$Ver"); ?>","colorhelp_popup","width=550,height=550,scrollbars=yes,resizable=no,status=yes,toolbar=no,menubar=no,directories=no,location=no");
	};
};
//-->
</SCRIPT>
</HEAD>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="MSHTML 6.00.2900.2722" name=GENERATOR></HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<?php
if ((COLOR_ALLOW_GUESTS == 0) && ($CookieStatus == "u"))
{
?>
	<BODY CLASS="mainframe" onLoad="setTimeout('window.close()',60000); if (window.focus) window.focus(); window.status='Only REGISTERED users can use colors here!';" onUnload="if (is_colorhelp_popup && !is_colorhelp_popup.closed) is_colorhelp_popup.close()">
<?php
}
else
{
?>
	<BODY CLASS="mainframe" onLoad="setTimeout('window.close()',60000); if (window.focus) window.focus(); window.status='Click a color sample to select.';" onUnload="if (is_colorhelp_popup && !is_colorhelp_popup.closed) is_colorhelp_popup.close()">
<?php
}
?>
	<CENTER>
	<br>
	<TD><SPAN style="font-family:Geneva, Helvetica, Arial, Verdana, sans-serif; color:#FF8C00; font-size: 12pt"><B><?php echo(L_COLOR_HEAD); ?> - <A href="<?php echo($ChatPath); ?>colorhelp_popup.php" onMouseOver="window.status='Click to open the mini help popup.'; return true;" onClick="window.parent.colorhelp_popup(); return false" target="_blank"><?php echo(L_COLOR_HELP_LINK); ?></A></B>
		<br><TD><SPAN style="font-family:Arial, Helvetica, Geneva, sans-serif; color:#00FF00; font-size: 8pt"><?php echo(L_COL_HELP_SUBTITLE); ?></SPAN></TD>
		</SPAN><br><br>
</CENTER>
	<P dir="ltr" style="margin-left: 20px">
		<TD>
			<SPAN style="font-family:Helvetica, Arial, Geneva, Verdana, sans-serif; color:<?php echo(COLOR_CD) ?>; font-size: 8pt">
<?php
if ((COLOR_ALLOW_GUESTS == 0) && ($CookieStatus == "u"))
{
	echo(L_COLOR_HEAD_SETTINGS); if (COLOR_FILTERS ==1) echo("<br>".L_COLOR_HEAD_SETTINGSa); ?><br><?php echo(L_COLOR_HEAD_INFONG);
}
elseif (COLOR_FILTERS == 1)
{
	if ($CookieStatus == "a")
	{
		echo(L_COLOR_HEAD_SETTINGS."<br>".L_COLOR_HEAD_SETTINGSa); ?><br><?php echo(L_COLOR_HEAD_INFOA);
	}
	elseif ($CookieStatus == "m")
	{
		echo(L_COLOR_HEAD_SETTINGS."<br>".L_COLOR_HEAD_SETTINGSa); ?><br><?php echo(L_COLOR_HEAD_INFOM);
	}
	elseif (($CookieStatus != "a") && ($CookieStatus != "m"))
	{
		echo(L_COLOR_HEAD_SETTINGS."<br>".L_COLOR_HEAD_SETTINGSa); ?><br><?php echo(L_COLOR_HEAD_INFOU);
	}
}
elseif (COLOR_FILTERS == 0)
{
	echo(L_COLOR_HEAD_SETTINGS); ?><br><?php echo(L_COLOR_HEAD_INFOALL); ?><br><?php echo(L_COLOR_HEAD_SETTINGSb);
}
?>
</SPAN></TD></CENTER>
	</TD></P>
<TABLE CLASS="table" cellPadding="2" width="100%" border="1" cellspaceing="1">
  <TBODY style="font-family:Helvetica, Arial, Verdana, Geneva, sans-serif; font-size: 8pt">
  <TR align=middle CLASS="frame">
    <TD width=50 bgColor=#f1f1f1 onMouseOver="window.status='Click on a cell to select the color.'; return true;"><B>Color</B></TD>
    <TD width=100 bgColor=#f1f1f1 onMouseOver="window.status='Use this colorname \'as it is\' in the color input box.'; return false;"><B>Color name</B></TD>
    <TD width=75 bgColor=#f1f1f1 onMouseOver="window.status='Use this code with or without the \'#\' char in front of it (e.g. #F0F8FF or f0f8ff).'; return false;"><B>HEX Code</B></TD>
    <TD width=10 bgColor=#999999 rowSpan=49>&nbsp;</TD>
    <TD width=50 bgColor=#f1f1f1 onMouseOver="window.status='Click on a cell to select the color.'; return true;"><B>Color</B></TD>
    <TD width=100 bgColor=#f1f1f1 onMouseOver="window.status='Use this colorname \'as it is\' in the color input box.'; return false;"><B>Color name</B></TD>
    <TD width=75 bgColor=#f1f1f1 onMouseOver="window.status='Use this code with or without the \'#\' char in front of it (e.g. #FAEBD7 or faedb7).'; return false;"><B>HEX Code</B></TD>
    <TD width=10 bgColor=#999999 rowSpan=49>&nbsp;</TD>
    <TD width=50 bgColor=#f1f1f1 onMouseOver="window.status='Click on a cell to select the color.'; return true;"><B>Color</B></TD>
    <TD width=100 bgColor=#f1f1f1 onMouseOver="window.status='Use this colorname \'as it is\' in the color input box.'; return false;"><B>Color name</B></TD>
    <TD width=75 bgColor=#f1f1f1 onMouseOver="window.status='Use this code with or without the \'#\' char in front of it (e.g. #00FFFF or 00ffff).'; return false;"><B>HEX Code</B></TD>
	</TR>
<?php
if ((COLOR_ALLOW_GUESTS == 0) && ($CookieStatus == "u"))
{
?>
  <TR>
    <TD align=middle width=50 bgColor=#f0f8ff>&nbsp;</TD>
    <TD align=left width=100>aliceblue</TD>
    <TD align=left width=75>F0F8FF</TD>
    <TD align=middle width=50 bgColor=#faebd7>&nbsp;</TD>
    <TD align=left width=100>antique white</TD>
    <TD align=left width=75>FAEBD7</TD>
    <TD align=middle width=50 bgColor=#00ffff>&nbsp;</TD>
    <TD align=left width=100>aqua</TD>
    <TD align=left width=75>00FFFF</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#7fffd4>&nbsp;</TD>
    <TD align=left width=100>aquamarine</TD>
    <TD align=left width=75>7FFFD4</TD>
    <TD align=middle width=50 bgColor=#f0ffff>&nbsp;</TD>
    <TD align=left width=100>azure</TD>
    <TD align=left width=75>F0FFFF</TD>
    <TD align=middle width=50 bgColor=#f5f5dc>&nbsp;</TD>
    <TD align=left width=100>beige</TD>
    <TD align=left width=75>F5F5DC</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#ffe4c4>&nbsp;</TD>
    <TD align=left width=100>bisque</TD>
    <TD align=left width=75>FFE4C4</TD>
    <TD align=middle width=50 bgColor=#000000>&nbsp;</TD>
    <TD align=left width=100>black</TD>
    <TD align=left width=75>000000</TD>
    <TD align=middle width=50 bgColor=#ffebcd>&nbsp;</TD>
    <TD align=left width=100>blanchedalmond</TD>
    <TD align=left width=75>FFEBCD</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#0000ff>&nbsp;</TD>
    <TD align=left width=100>blue</TD>
    <TD align=left width=75>0000FF</TD>
    <TD align=middle width=50 bgColor=#8a2be2>&nbsp;</TD>
    <TD align=left width=100>blueviolet</TD>
    <TD align=left width=75>8A2BE2</TD>
    <TD align=middle width=50 bgColor=#a52a2a>&nbsp;</TD>
    <TD align=left width=100>brown</TD>
    <TD align=left width=75>A52A2A</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#deb887>&nbsp;</TD>
    <TD align=left width=100>burlywood</TD>
    <TD align=left width=75>DEB887</TD>
    <TD align=middle width=50 bgColor=#5f9ea0>&nbsp;</TD>
    <TD align=left width=100>cadetblue</TD>
    <TD align=left width=75>5F9EA0</TD>
    <TD align=middle width=50 bgColor=#7fff00>&nbsp;</TD>
    <TD align=left width=100>charteuse</TD>
    <TD align=left width=75>7FFF00</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#d2691e>&nbsp;</TD>
    <TD align=left width=100>chocolate</TD>
    <TD align=left width=75>D2691E</TD>
    <TD align=middle width=50 bgColor=#ff7f50>&nbsp;</TD>
    <TD align=left width=100>coral</TD>
    <TD align=left width=75>FF7F50</TD>
    <TD align=middle width=50 bgColor=#6495ed>&nbsp;</TD>
    <TD align=left width=100>cornflowerblue</TD>
    <TD align=left width=75>6495ED</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#fff8dc>&nbsp;</TD>
    <TD align=left width=100>cornsilk</TD>
    <TD align=left width=75>FFF8DC</TD>
    <TD align=middle width=50 bgColor=#dc143c>&nbsp;</TD>
    <TD align=left width=100>crimson</TD>
    <TD align=left width=75>DC143C</TD>
    <TD align=middle width=50 bgColor=#00ffff>&nbsp;</TD>
    <TD align=left width=100>cyan</TD>
    <TD align=left width=75>00FFFF</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#00008b>&nbsp;</TD>
    <TD align=left width=100>darkblue</TD>
    <TD align=left width=75>00008B</TD>
    <TD align=middle width=50 bgColor=#008b8b>&nbsp;</TD>
    <TD align=left width=100>darkcyan</TD>
    <TD align=left width=75>008B8B</TD>
    <TD align=middle width=50 bgColor=#b8860b>&nbsp;</TD>
    <TD align=left width=100>darkgoldenrod</TD>
    <TD align=left width=75>B8860B</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#a9a9a9>&nbsp;</TD>
    <TD align=left width=100>darkgray</TD>
    <TD align=left width=75>A9A9A9</TD>
    <TD align=middle width=50 bgColor=#006400>&nbsp;</TD>
    <TD align=left width=100>darkgreen</TD>
    <TD align=left width=75>006400</TD>
    <TD align=middle width=50 bgColor=#bdb76b>&nbsp;</TD>
    <TD align=left width=100>darkkhaki</TD>
    <TD align=left width=75>BDB76B</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#8b008b>&nbsp;</TD>
    <TD align=left width=100>darkmagenta</TD>
    <TD align=left width=75>8B008B</TD>
    <TD align=middle width=50 bgColor=#556b2f>&nbsp;</TD>
    <TD align=left width=100>darkolivegreen</TD>
    <TD align=left width=75>556B2F</TD>
    <TD align=middle width=50 bgColor=#ff8c00>&nbsp;</TD>
    <TD align=left width=100>darkorange</TD>
    <TD align=left width=75>FF8C00</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#9932cc>&nbsp;</TD>
    <TD align=left width=100>darkorchid</TD>
    <TD align=left width=75>9932CC</TD>
    <TD align=middle width=50 bgColor=#8b0000>&nbsp;</TD>
    <TD align=left width=100>darkred</TD>
    <TD align=left width=75>8B0000</TD>
    <TD align=middle width=50 bgColor=#e9967a>&nbsp;</TD>
    <TD align=left width=100>darksalmon</TD>
    <TD align=left width=75>E9967A</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#8fbc8f>&nbsp;</TD>
    <TD align=left width=100>darkseagreen</TD>
    <TD align=left width=75>8FBC8F</TD>
    <TD align=middle width=50 bgColor=#483d8b>&nbsp;</TD>
    <TD align=left width=100>darkslateblue</TD>
    <TD align=left width=75>483D8B</TD>
    <TD align=middle width=50 bgColor=#2f4f4f>&nbsp;</TD>
    <TD align=left width=100>darkslategray</TD>
    <TD align=left width=75>2F4F4F</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#00ced1>&nbsp;</TD>
    <TD align=left width=100>darkturquoise</TD>
    <TD align=left width=75>00CED1</TD>
    <TD align=middle width=50 bgColor=#9400d3>&nbsp;</TD>
    <TD align=left width=100>darkviolet</TD>
    <TD align=left width=75>9400D3</TD>
    <TD align=middle width=50 bgColor=#ff1493>&nbsp;</TD>
    <TD align=left width=100>deeppink</TD>
    <TD align=left width=75>FF1493</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#00bfff>&nbsp;</TD>
    <TD align=left width=100>deepskyblue</TD>
    <TD align=left width=75>00BFFF</TD>
    <TD align=middle width=50 bgColor=#696969>&nbsp;</TD>
    <TD align=left width=100>dimgray</TD>
    <TD align=left width=75>696969</TD>
    <TD align=middle width=50 bgColor=#1e90ff>&nbsp;</TD>
    <TD align=left width=100>dodgerblue</TD>
    <TD align=left width=75>1E90FF</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#d19275>&nbsp;</TD>
    <TD align=left width=100>feldspar</TD>
    <TD align=left width=75>D19275</TD>
    <TD align=middle width=50 bgColor=#b22222>&nbsp;</TD>
    <TD align=left width=100>firebrick</TD>
    <TD align=left width=75>B22222</TD>
    <TD align=middle width=50 bgColor=#fffaf0>&nbsp;</TD>
    <TD align=left width=100>floralwhite</TD>
    <TD align=left width=75>FFFAF0</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#228b22>&nbsp;</TD>
    <TD align=left width=100>forestgreen</TD>
    <TD align=left width=75>228B22</TD>
    <TD align=middle width=50 bgColor=#ff00ff>&nbsp;</TD>
    <TD align=left width=100>fuchsia</TD>
    <TD align=left width=75>FF00FF</TD>
    <TD align=middle width=50 bgColor=#dcdcdc>&nbsp;</TD>
    <TD align=left width=100>gainsboro</TD>
    <TD align=left width=75>DCDCDC</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#f8f8ff>&nbsp;</TD>
    <TD align=left width=100>ghostwhite</TD>
    <TD align=left width=75>F8F8FF</TD>
    <TD align=middle width=50 bgColor=#ffd700>&nbsp;</TD>
    <TD align=left width=100>gold</TD>
    <TD align=left width=75>FFD700</TD>
    <TD align=middle width=50 bgColor=#daa520>&nbsp;</TD>
    <TD align=left width=100>goldenrod</TD>
    <TD align=left width=75>DAA520</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#808080>&nbsp;</TD>
    <TD align=left width=100>gray</TD>
    <TD align=left width=75>808080</TD>
    <TD align=middle width=50 bgColor=#008000>&nbsp;</TD>
    <TD align=left width=100>green</TD>
    <TD align=left width=75>008000</TD>
    <TD align=middle width=50 bgColor=#adff2f>&nbsp;</TD>
    <TD align=left width=100>greenyellow</TD>
    <TD align=left width=75>ADFF2F</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#f0fff0>&nbsp;</TD>
    <TD align=left width=100>honeydew</TD>
    <TD align=left width=75>F0FFF0</TD>
    <TD align=middle width=50 bgColor=#ff69b4>&nbsp;</TD>
    <TD align=left width=100>hotpink</TD>
    <TD align=left width=75>FF69B4</TD>
    <TD align=middle width=50 bgColor=#cd5c5c>&nbsp;</TD>
    <TD align=left width=100>indianred</TD>
    <TD align=left width=75>CD5C5C</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#4b0082>&nbsp;</TD>
    <TD align=left width=100>indigo</TD>
    <TD align=left width=75>4B0082</TD>
    <TD align=middle width=50 bgColor=#fffff0>&nbsp;</TD>
    <TD align=left width=100>ivory</TD>
    <TD align=left width=75>FFFFF0</TD>
    <TD align=middle width=50 bgColor=#f0e68c>&nbsp;</TD>
    <TD align=left width=100>khaki</TD>
    <TD align=left width=75>F0E68C</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#e6e6fa>&nbsp;</TD>
    <TD align=left width=100>lavender</TD>
    <TD align=left width=75>E6E6FA</TD>
    <TD align=middle width=50 bgColor=#fff0f5>&nbsp;</TD>
    <TD align=left width=100>lavenderblush</TD>
    <TD align=left width=75>FFF0F5</TD>
    <TD align=middle width=50 bgColor=#7cfc00>&nbsp;</TD>
    <TD align=left width=100>lawngreen</TD>
    <TD align=left width=75>7CFC00</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#fffacd>&nbsp;</TD>
    <TD align=left width=100>lemonchiffon</TD>
    <TD align=left width=75>FFFACD</TD>
    <TD align=middle width=50 bgColor=#add8e6>&nbsp;</TD>
    <TD align=left width=100>lightblue</TD>
    <TD align=left width=75>ADD8E6</TD>
    <TD align=middle width=50 bgColor=#f08080>&nbsp;</TD>
    <TD align=left width=100>lightcoral</TD>
    <TD align=left width=75>F08080</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#e0ffff>&nbsp;</TD>
    <TD align=left width=100>lightcyan</TD>
    <TD align=left width=75>E0FFFF</TD>
    <TD align=middle width=50 bgColor=#fafad2>&nbsp;</TD>
    <TD align=left width=100>lightgoldenrodyellow</TD>
    <TD align=left width=75>FAFAD2</TD>
    <TD align=middle width=50 bgColor=#90ee90>&nbsp;</TD>
    <TD align=left width=100>lightgreen</TD>
    <TD align=left width=75>90EE90</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#d3d3d3>&nbsp;</TD>
    <TD align=left width=100>lightgrey</TD>
    <TD align=left width=75>D3D3D3</TD>
    <TD align=middle width=50 bgColor=#ffb6c1>&nbsp;</TD>
    <TD align=left width=100>lightpink</TD>
    <TD align=left width=75>FFB6C1</TD>
    <TD align=middle width=50 bgColor=#ffa07a>&nbsp;</TD>
    <TD align=left width=100>lightsalmon</TD>
    <TD align=left width=75>FFA07A</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#20b2aa>&nbsp;</TD>
    <TD align=left width=100>lightseagreen</TD>
    <TD align=left width=75>20B2AA</TD>
    <TD align=middle width=50 bgColor=#87cefa>&nbsp;</TD>
    <TD align=left width=100>lightskyblue</TD>
    <TD align=left width=75>87CDFA</TD>
    <TD align=middle width=50 bgColor=#8470ff>&nbsp;</TD>
    <TD align=left width=100>lightslateblue</TD>
    <TD align=left width=75>8470FF</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#778899>&nbsp;</TD>
    <TD align=left width=100>lightslategray</TD>
    <TD align=left width=75>778899</TD>
    <TD align=middle width=50 bgColor=#b0c4de>&nbsp;</TD>
    <TD align=left width=100>lightsteelblue</TD>
    <TD align=left width=75>B0C4DE</TD>
    <TD align=middle width=50 bgColor=#ffffe0>&nbsp;</TD>
    <TD align=left width=100>lightyellow</TD>
    <TD align=left width=75>FFFFE0</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#00ff00>&nbsp;</TD>
    <TD align=left width=100>lime</TD>
    <TD align=left width=75>00FF00</TD>
    <TD align=middle width=50 bgColor=#32cd32>&nbsp;</TD>
    <TD align=left width=100>limegreen</TD>
    <TD align=left width=75>32CD32</TD>
    <TD align=middle width=50 bgColor=#faf0e6>&nbsp;</TD>
    <TD align=left width=100>linen</TD>
    <TD align=left width=75>FAF0E6</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#ff00ff>&nbsp;</TD>
    <TD align=left width=100>magenta</TD>
    <TD align=left width=75>FF00FF</TD>
    <TD align=middle width=50 bgColor=#800000>&nbsp;</TD>
    <TD align=left width=100>maroon</TD>
    <TD align=left width=75>800000</TD>
    <TD align=middle width=50 bgColor=#66cdaa>&nbsp;</TD>
    <TD align=left width=100>mediumaquamarine</TD>
    <TD align=left width=75>66CDAA</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#0000cd>&nbsp;</TD>
    <TD align=left width=100>mediumblue</TD>
    <TD align=left width=75>0000CD</TD>
    <TD align=middle width=50 bgColor=#ba55d3>&nbsp;</TD>
    <TD align=left width=100>mediumorchid</TD>
    <TD align=left width=75>BA55D3</TD>
    <TD align=middle width=50 bgColor=#9370db>&nbsp;</TD>
    <TD align=left width=100>mediumpurple</TD>
    <TD align=left width=75>9370DB</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#3cb371>&nbsp;</TD>
    <TD align=left width=100>mediumseagreen</TD>
    <TD align=left width=75>3CB371</TD>
    <TD align=middle width=50 bgColor=#7b68ee>&nbsp;</TD>
    <TD align=left width=100>mediumslateblue</TD>
    <TD align=left width=75>7B68EE</TD>
    <TD align=middle width=50 bgColor=#00fa9a>&nbsp;</TD>
    <TD align=left width=100>mediumspringgreen</TD>
    <TD align=left width=75>00FA9A</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#48d1cc></TD>
    <TD align=left width=100>mediumturquoise</TD>
    <TD align=left width=75>48D1CC</TD>
    <TD align=middle width=50 bgColor=#c71585>&nbsp;</TD>
    <TD align=left width=100>mediumvioletred</TD>
    <TD align=left width=75>C71585</TD>
    <TD align=middle width=50 bgColor=#191970>&nbsp;</TD>
    <TD align=left width=100>midnightblue</TD>
    <TD align=left width=75>191970</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#f5fffa>&nbsp;</TD>
    <TD align=left width=100>mintcream</TD>
    <TD align=left width=75>F5FFFA</TD>
    <TD align=middle width=50 bgColor=#ffe4e1>&nbsp;</TD>
    <TD align=left width=100>mistyrose</TD>
    <TD align=left width=75>FFE4E1</TD>
    <TD align=middle width=50 bgColor=#ffe4b5>&nbsp;</TD>
    <TD align=left width=100>moccasin</TD>
    <TD align=left width=75>FFE4B5</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#ffdead>&nbsp;</TD>
    <TD align=left width=100>navajowhite</TD>
    <TD align=left width=75>FFDEAD</TD>
    <TD align=middle width=50 bgColor=#000080>&nbsp;</TD>
    <TD align=left width=100>navy</TD>
    <TD align=left width=75>000080</TD>
    <TD align=middle width=50 bgColor=#fdf5e6>&nbsp;</TD>
    <TD align=left width=100>oldlace</TD>
		<TD align=left width=75>FDF5E6</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#808000>&nbsp;</TD>
    <TD align=left width=100>olive</TD>
    <TD align=left width=75>808000</TD>
    <TD align=middle width=50 bgColor=#6b8e23>&nbsp;</TD>
    <TD align=left width=100>olivedrab</TD>
    <TD align=left width=75>6B8E23</TD>
    <TD align=middle width=50 bgColor=#ffa500>&nbsp;</TD>
    <TD align=left width=100>orange</TD>
    <TD align=left width=75>FFA500</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#ff4500>&nbsp;</TD>
    <TD align=left width=100>orangered</TD>
    <TD align=left width=75>FF4500</TD>
    <TD align=middle width=50 bgColor=#da70d6>&nbsp;</TD>
    <TD align=left width=100>orchid</TD>
    <TD align=left width=75>DA70D6</TD>
    <TD align=middle width=50 bgColor=#eee8aa>&nbsp;</TD>
    <TD align=left width=100>palegoldenrod</TD>
    <TD align=left width=75>EEE8AA</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#98fb98>&nbsp;</TD>
    <TD align=left width=100>palegreen</TD>
    <TD align=left width=75>98FB98</TD>
    <TD align=middle width=50 bgColor=#afeeee>&nbsp;</TD>
    <TD align=left width=100>paleturquoise</TD>
    <TD align=left width=75>AFEEEE</TD>
    <TD align=middle width=50 bgColor=#db7093>&nbsp;</TD>
    <TD align=left width=100>palevioletred</TD>
    <TD align=left width=75>DB7093</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#ffefd5>&nbsp;</TD>
    <TD align=left width=100>papaawhip</TD>
    <TD align=left width=75>FFEFD5</TD>
    <TD align=middle width=50 bgColor=#ffdab9>&nbsp;</TD>
    <TD align=left width=100>peachpuff</TD>
    <TD align=left width=75>FFDAB9</TD>
    <TD align=middle width=50 bgColor=#cd853f>&nbsp;</TD>
    <TD align=left width=100>peru</TD>
    <TD align=left width=75>CD853F</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#ffc0cb>&nbsp;</TD>
    <TD align=left width=100>pink</TD>
    <TD align=left width=75>FFC0CB</TD>
    <TD align=middle width=50 bgColor=#dda0dd>&nbsp;</TD>
    <TD align=left width=100>plum</TD>
    <TD align=left width=75>DDA0DD</TD>
    <TD align=middle width=50 bgColor=#b0e0e6>&nbsp;</TD>
    <TD align=left width=100>powderblue</TD>
    <TD align=left width=75>B0E0E6</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#800080>&nbsp;</TD>
    <TD align=left width=100>purple</TD>
    <TD align=left width=75>800080</TD>
    <TD align=middle width=50 bgColor=#ff0000>&nbsp;</TD>
    <TD align=left width=100>red</TD>
    <TD align=left width=75>FF0000</TD>
    <TD align=middle width=50 bgColor=#bc8f8f>&nbsp;</TD>
    <TD align=left width=100>rosybrown</TD>
    <TD align=left width=75>BC8F8F</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#4169e1>&nbsp;</TD>
    <TD align=left width=100>royalblue</TD>
    <TD align=left width=75>4169E1</TD>
    <TD align=middle width=50 bgColor=#8b4513>&nbsp;</TD>
    <TD align=left width=100>saddlebrown</TD>
    <TD align=left width=75>8B4513</TD>
    <TD align=middle width=50 bgColor=#fa8072>&nbsp;</TD>
    <TD align=left width=100>salmon</TD>
    <TD align=left width=75>FA8072</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#f4a460>&nbsp;</TD>
    <TD align=left width=100>sandybrown</TD>
    <TD align=left width=75>F4A460</TD>
    <TD align=middle width=50 bgColor=#2e8b57>&nbsp;</TD>
    <TD align=left width=100>seagreen</TD>
    <TD align=left width=75>2E8B57</TD>
    <TD align=middle width=50 bgColor=#fff5ee>&nbsp;</TD>
    <TD align=left width=100>seashell</TD>
    <TD align=left width=75>FFF5EE</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#a0522d>&nbsp;</TD>
    <TD align=left width=100>sienna</TD>
    <TD align=left width=75>A0522D</TD>
    <TD align=middle width=50 bgColor=#c0c0c0>&nbsp;</TD>
    <TD align=left width=100>silver</TD>
    <TD align=left width=75>C0C0C0</TD>
    <TD align=middle width=50 bgColor=#87ceeb>&nbsp;</TD>
    <TD align=left width=100>skyblue</TD>
    <TD align=left width=75>87CEEB</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#6a5acd>&nbsp;</TD>
    <TD align=left width=100>slateblue</TD>
    <TD align=left width=75>6A5ACD</TD>
    <TD align=middle width=50 bgColor=#708090>&nbsp;</TD>
    <TD align=left width=100>slategray</TD>
    <TD align=left width=75>708090</TD>
    <TD align=middle width=50 bgColor=#fffafa>&nbsp;</TD>
    <TD align=left width=100>snow</TD>
    <TD align=left width=75>FFFAFA</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#00ff7f>&nbsp;</TD>
    <TD align=left width=100>springgreen</TD>
    <TD align=left width=75>00FF7F</TD>
    <TD align=middle width=50 bgColor=#4682b4>&nbsp;</TD>
    <TD align=left width=100>steelblue</TD>
    <TD align=left width=75>4682B4</TD>
    <TD align=middle width=50 bgColor=#d2b48c>&nbsp;</TD>
    <TD align=left width=100>tan</TD>
    <TD align=left width=75>D2B48C</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#008080>&nbsp;</TD>
    <TD align=left width=100>teal</TD>
    <TD align=left width=75>008080</TD>
    <TD align=middle width=50 bgColor=#d8bfd8>&nbsp;</TD>
    <TD align=left width=100>thistle</TD>
    <TD align=left width=75>D8BFD8</TD>
    <TD align=middle width=50 bgColor=#ff6347>&nbsp;</TD>
    <TD align=left width=100>tomato</TD>
    <TD align=left width=75>FF6347</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#40e0d0>&nbsp;</TD>
    <TD align=left width=100>turquoise</TD>
    <TD align=left width=75>40E0D0</TD>
    <TD align=middle width=50 bgColor=#ee82ee>&nbsp;</TD>
    <TD align=left width=100>violet</TD>
    <TD align=left width=75>EE82EE</TD>
    <TD align=middle width=50 bgColor=#F5DEB3>&nbsp;</TD>
    <TD align=left width=100>wheat</TD>
    <TD align=left width=75>F5DEB3</TD>
  <TR>
    <TD align=middle width=50 bgColor=#FFFFFF>&nbsp;</TD>
    <TD align=left width=100>white</TD>
    <TD align=left width=75>FFFFFF</TD>
    <TD align=middle width=50 bgColor=#F5F5F5>&nbsp;</TD>
    <TD align=left width=100>whitesmoke</TD>
    <TD align=left width=75>F5F5F5</TD>
    <TD align=middle width=50 bgColor=#FFFF00>&nbsp;</TD>
    <TD align=left width=100>yellow</TD>
		<TD align=left width=75>FFFF00</TD>
  </TR>
  <TR>
    <TD align=middle width=50 bgColor=#9ACD32>&nbsp;</TD>
    <TD align=left width=100>yellowgreen</TD>
  <TD align=left width=75>9ACD32</TD>
  </TR>
<?php
}
else
{
?>
	<TR>
    <TD align=middle width=50 bgColor=#f0f8ff onClick="colorInput('aliceblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('aliceblue'); put_focus();">aliceblue</TD>
    <TD align=left width=75 onClick="colorInput('aliceblue'); put_focus();">F0F8FF</TD>
    <TD align=middle width=50 bgColor=#faebd7 onClick="colorInput('antiquewhite'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('antiquewhite'); put_focus();">antiquewhite</TD>
    <TD align=left width=75 onClick="colorInput('antiquewhite'); put_focus();">FAEBD7</TD>
    <TD align=middle width=50 bgColor=#00ffff onClick="colorInput('aqua'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('aqua'); put_focus();">aqua</TD>
    <TD align=left width=75 onClick="colorInput('aqua'); put_focus();">00FFFF</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#7fffd4 onClick="colorInput('aquamarine'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('aquamarine'); put_focus();">aquamarine</TD>
    <TD align=left width=75 onClick="colorInput('aquamarine'); put_focus();">7FFFD4</TD>
    <TD align=middle width=50 bgColor=#f0ffff onClick="colorInput('azure'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('azure'); put_focus();">azure</TD>
    <TD align=left width=75 onClick="colorInput('azure'); put_focus();">F0FFFF</TD>
    <TD align=middle width=50 bgColor=#f5f5dc onClick="colorInput('beige'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('beige'); put_focus();">beige</TD>
    <TD align=left width=75 onClick="colorInput('beige'); put_focus();">F5F5DC</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#ffe4c4 onClick="colorInput('bisque'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('bisque'); put_focus();">bisque</TD>
    <TD align=left width=75 onClick="colorInput('bisque'); put_focus();">FFE4C4</TD>
    <TD align=middle width=50 bgColor=#000000 onClick="colorInput('black'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('black'); put_focus();">black</TD>
    <TD align=left width=75 onClick="colorInput('black'); put_focus();">000000</TD>
    <TD align=middle width=50 bgColor=#ffebcd onClick="colorInput('blanchedalmond'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('blanchedalmond'); put_focus();">blanchedalmond</TD>
    <TD align=left width=75 onClick="colorInput('blanchedalmond'); put_focus();">FFEBCD</TD>
	</TR>
	<TR>
<?php
if ($CookieStatus == "a" || $CookieStatus == "m" || COLOR_FILTERS == 0)
{
?>
    <TD align=middle width=50 bgColor=#0000ff onClick="colorInput('blue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('blue'); put_focus();">blue</TD>
    <TD align=left width=75 onClick="colorInput('blue'); put_focus();">0000FF</TD>
<?php
}
if ($CookieStatus != "a" && $CookieStatus != "m" && COLOR_FILTERS == 1)
{
?>
    <TD align=middle width=50 bgColor=#0000ff onClick="window.status='Not moderator. Color disabled. Please pick another one!'; return true;">&nbsp;</TD>
    <TD align=left width=100 onClick="window.status='Not moderator. Color disabled. Please pick another one!'; return true;">blue&nbsp;(mod&nbsp;only)</TD>
    <TD align=left width=75 onClick="window.status='Not moderator. Color disabled. Please pick another one!'; return true;">0000FF</TD>
<?php
}
?>
    <TD align=middle width=50 bgColor=#8a2be2 onClick="colorInput('blueviolet'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('blueviolet'); put_focus();">blueviolet</TD>
    <TD align=left width=75 onClick="colorInput('blueviolet'); put_focus();">8A2BE2</TD>
    <TD align=middle width=50 bgColor=#a52a2a onClick="colorInput('brown'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('brown'); put_focus();">brown</TD>
    <TD align=left width=75 onClick="colorInput('brown'); put_focus();">A52A2A</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#deb887 onClick="colorInput('burlywood'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('burlywood'); put_focus();">burlywood</TD>
    <TD align=left width=75 onClick="colorInput('burlywood'); put_focus();">DEB887</TD>
    <TD align=middle width=50 bgColor=#5f9ea0 onClick="colorInput('cadetblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('cadetblue'); put_focus();">cadetblue</TD>
    <TD align=left width=75 onClick="colorInput('cadetblue'); put_focus();">5F9EA0</TD>
    <TD align=middle width=50 bgColor=#7fff00 onClick="colorInput('charteuse'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('charteuse'); put_focus();">charteuse</TD>
    <TD align=left width=75 onClick="colorInput('charteuse'); put_focus();">7FFF00</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#d2691e onClick="colorInput('chocolate'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('chocolate'); put_focus();">chocolate</TD>
    <TD align=left width=75 onClick="colorInput('chocolate'); put_focus();">D2691E</TD>
    <TD align=middle width=50 bgColor=#ff7f50 onClick="colorInput('coral'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('coral'); put_focus();">coral</TD>
    <TD align=left width=75 onClick="colorInput('coral'); put_focus();">FF7F50</TD>
    <TD align=middle width=50 bgColor=#6495ed onClick="colorInput('cornflowerblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('cornflowerblue'); put_focus();">cornflowerblue</TD>
    <TD align=left width=75 onClick="colorInput('cornflowerblue'); put_focus();">6495ED</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#fff8dc onClick="colorInput('cornsilk'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('cornsilk'); put_focus();">cornsilk</TD>
    <TD align=left width=75 onClick="colorInput('cornsilk'); put_focus();">FFF8DC</TD>
    <TD align=middle width=50 bgColor=#dc143c onClick="colorInput('crimson'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('crimson'); put_focus();">crimson</TD>
    <TD align=left width=75 onClick="colorInput('crimson'); put_focus();">DC143C</TD>
    <TD align=middle width=50 bgColor=#00ffff onClick="colorInput('cyan'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('cyan'); put_focus();">cyan</TD>
    <TD align=left width=75 onClick="colorInput('cyan'); put_focus();">00FFFF</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#00008b onClick="colorInput('darkblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkblue'); put_focus();">darkblue</TD>
    <TD align=left width=75 onClick="colorInput('darkblue'); put_focus();">00008B</TD>
    <TD align=middle width=50 bgColor=#008b8b onClick="colorInput('darkcyan'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkcyan'); put_focus();">darkcyan</TD>
    <TD align=left width=75 onClick="colorInput('darkcyan'); put_focus();">008B8B</TD>
    <TD align=middle width=50 bgColor=#b8860b onClick="colorInput('darkgoldenrod'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkgoldenrod'); put_focus();">darkgoldenrod</TD>
    <TD align=left width=75 onClick="colorInput('darkgoldenrod'); put_focus();">B8860B</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#a9a9a9 onClick="colorInput('darkgray'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkgray'); put_focus();">darkgray</TD>
    <TD align=left width=75 onClick="colorInput('darkgray'); put_focus();">A9A9A9</TD>
    <TD align=middle width=50 bgColor=#006400 onClick="colorInput('darkgreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkgreen'); put_focus();">darkgreen</TD>
    <TD align=left width=75 onClick="colorInput('darkgreen'); put_focus();">006400</TD>
    <TD align=middle width=50 bgColor=#bdb76b onClick="colorInput('darkkhaki'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkkhaki'); put_focus();">darkkhaki</TD>
    <TD align=left width=75 onClick="colorInput('darkkhaki'); put_focus();">BDB76B</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#8b008b onClick="colorInput('darkmagenta'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkmagenta'); put_focus();">darkmagenta</TD>
    <TD align=left width=75 onClick="colorInput('darkmagenta'); put_focus();">8B008B</TD>
    <TD align=middle width=50 bgColor=#556b2f onClick="colorInput('darkolivegreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkolivegreen'); put_focus();">darkolivegreen</TD>
    <TD align=left width=75 onClick="colorInput('darkolivegreen'); put_focus();">556B2F</TD>
    <TD align=middle width=50 bgColor=#ff8c00 onClick="colorInput('darkorange'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkorange'); put_focus();">darkorange</TD>
    <TD align=left width=75 onClick="colorInput('darkorange'); put_focus();">FF8C00</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#9932cc onClick="colorInput('darkorchid'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkorchid'); put_focus();">darkorchid</TD>
    <TD align=left width=75 onClick="colorInput('darkorchid'); put_focus();">9932CC</TD>
    <TD align=middle width=50 bgColor=#8b0000 onClick="colorInput('darkred'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkred'); put_focus();">darkred</TD>
    <TD align=left width=75 onClick="colorInput('darkred'); put_focus();">8B0000</TD>
    <TD align=middle width=50 bgColor=#e9967a onClick="colorInput('darksalmon'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darksalmon'); put_focus();">darksalmon</TD>
    <TD align=left width=75 onClick="colorInput('darksalmon'); put_focus();">E9967A</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#8fbc8f onClick="colorInput('darkseagreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkseagreen'); put_focus();">darkseagreen</TD>
    <TD align=left width=75 onClick="colorInput('darkseagreen'); put_focus();">8FBC8F</TD>
    <TD align=middle width=50 bgColor=#483d8b onClick="colorInput('darkslateblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkslateblue'); put_focus();">darkslateblue</TD>
    <TD align=left width=75 onClick="colorInput('darkslateblue'); put_focus();">483D8B</TD>
    <TD align=middle width=50 bgColor=#2f4f4f onClick="colorInput('darkslategray'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkslategray'); put_focus();">darkslategray</TD>
    <TD align=left width=75 onClick="colorInput('darkslategray'); put_focus();">2F4F4F</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#00ced1 onClick="colorInput('darkturquoise'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkturquoise'); put_focus();">darkturquoise</TD>
    <TD align=left width=75 onClick="colorInput('darkturquoise'); put_focus();">00CED1</TD>
    <TD align=middle width=50 bgColor=#9400d3 onClick="colorInput('darkviolet'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('darkviolet'); put_focus();">darkviolet</TD>
    <TD align=left width=75 onClick="colorInput('darkviolet'); put_focus();">9400D3</TD>
    <TD align=middle width=50 bgColor=#ff1493 onClick="colorInput('deeppink'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('deeppink'); put_focus();">deeppink</TD>
    <TD align=left width=75 onClick="colorInput('deeppink'); put_focus();">FF1493</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#00bfff onClick="colorInput('deepskyblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('deepskyblue'); put_focus();">deepskyblue</TD>
    <TD align=left width=75 onClick="colorInput('deepskyblue'); put_focus();">00BFFF</TD>
    <TD align=middle width=50 bgColor=#696969 onClick="colorInput('dimgray'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('dimgray'); put_focus();">dimgray</TD>
    <TD align=left width=75 onClick="colorInput('dimgray'); put_focus();">696969</TD>
    <TD align=middle width=50 bgColor=#1e90ff onClick="colorInput('dodgerblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('dodgerblue'); put_focus();">dodgerblue</TD>
    <TD align=left width=75 onClick="colorInput('dodgerblue'); put_focus();">1E90FF</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#d19275 onClick="colorInput('feldspar'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('feldspar'); put_focus();">feldspar</TD>
    <TD align=left width=75 onClick="colorInput('feldspar'); put_focus();">D19275</TD>
    <TD align=middle width=50 bgColor=#b22222 onClick="colorInput('firebrick'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('firebrick'); put_focus();">firebrick</TD>
    <TD align=left width=75 onClick="colorInput('firebrick'); put_focus();">B22222</TD>
    <TD align=middle width=50 bgColor=#fffaf0 onClick="colorInput('floralwhite'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('floralwhite'); put_focus();">floralwhite</TD>
    <TD align=left width=75 onClick="colorInput('floralwhite'); put_focus();">FFFAF0</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#228b22 onClick="colorInput('forestgreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('forestgreen'); put_focus();">forestgreen</TD>
    <TD align=left width=75 onClick="colorInput('forestgreen'); put_focus();">228B22</TD>
    <TD align=middle width=50 bgColor=#ff00ff onClick="colorInput('fuchsia'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('fuchsia'); put_focus();">fuchsia</TD>
    <TD align=left width=75 onClick="colorInput('fuchsia'); put_focus();">FF00FF</TD>
    <TD align=middle width=50 bgColor=#dcdcdc onClick="colorInput('gainsboro'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('gainsboro'); put_focus();">gainsboro</TD>
    <TD align=left width=75 onClick="colorInput('gainsboro'); put_focus();">DCDCDC</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#f8f8ff onClick="colorInput('ghostwhite'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('ghostwhite'); put_focus();">ghostwhite</TD>
    <TD align=left width=75 onClick="colorInput('ghostwhite'); put_focus();">F8F8FF</TD>
    <TD align=middle width=50 bgColor=#ffd700 onClick="colorInput('gold'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('gold'); put_focus();">gold</TD>
    <TD align=left width=75 onClick="colorInput('gold'); put_focus();">FFD700</TD>
    <TD align=middle width=50 bgColor=#daa520 onClick="colorInput('goldenrod'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('goldenrod'); put_focus();">goldenrod</TD>
    <TD align=left width=75 onClick="colorInput('goldenrod'); put_focus();">DAA520</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#808080 onClick="colorInput('gray'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('gray'); put_focus();">gray</TD>
    <TD align=left width=75 onClick="colorInput('gray'); put_focus();">808080</TD>
    <TD align=middle width=50 bgColor=#008000 onClick="colorInput('green'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('green'); put_focus();">green</TD>
    <TD align=left width=75 onClick="colorInput('green'); put_focus();">008000</TD>
    <TD align=middle width=50 bgColor=#adff2f onClick="colorInput('greenyellow'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('greenyellow'); put_focus();">greenyellow</TD>
    <TD align=left width=75 onClick="colorInput('greenyellow'); put_focus();">ADFF2F</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#f0fff0 onClick="colorInput('honeydew'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('honeydew'); put_focus();">honeydew</TD>
    <TD align=left width=75 onClick="colorInput('honeydew'); put_focus();">F0FFF0</TD>
    <TD align=middle width=50 bgColor=#ff69b4 onClick="colorInput('hotpink'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('hotpink'); put_focus();">hotpink</TD>
    <TD align=left width=75 onClick="colorInput('hotpink'); put_focus();">FF69B4</TD>
    <TD align=middle width=50 bgColor=#cd5c5c onClick="colorInput('indianred'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('indianred'); put_focus();">indianred</TD>
    <TD align=left width=75 onClick="colorInput('indianred'); put_focus();">CD5C5C</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#4b0082 onClick="colorInput('indigo'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('indigo'); put_focus();">indigo</TD>
    <TD align=left width=75 onClick="colorInput('indigo'); put_focus();">4B0082</TD>
    <TD align=middle width=50 bgColor=#fffff0 onClick="colorInput('ivory'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('ivory'); put_focus();">ivory</TD>
    <TD align=left width=75 onClick="colorInput('ivory'); put_focus();">FFFFF0</TD>
    <TD align=middle width=50 bgColor=#f0e68c onClick="colorInput('khaki'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('khaki'); put_focus();">khaki</TD>
    <TD align=left width=75 onClick="colorInput('khaki'); put_focus();">F0E68C</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#e6e6fa onClick="colorInput('lavender'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lavender'); put_focus();">lavender</TD>
    <TD align=left width=75 onClick="colorInput('lavender'); put_focus();">E6E6FA</TD>
    <TD align=middle width=50 bgColor=#fff0f5 onClick="colorInput('lavenderblush'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lavenderblush'); put_focus();">lavenderblush</TD>
    <TD align=left width=75 onClick="colorInput('lavenderblush'); put_focus();">FFF0F5</TD>
    <TD align=middle width=50 bgColor=#7cfc00 onClick="colorInput('lawngreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lawngreen'); put_focus();">lawngreen</TD>
    <TD align=left width=75 onClick="colorInput('lawngreen'); put_focus();">7CFC00</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#fffacd onClick="colorInput('lemonchiffon'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lemonchiffon'); put_focus();">lemonchiffon</TD>
    <TD align=left width=75 onClick="colorInput('lemonchiffon'); put_focus();">FFFACD</TD>
    <TD align=middle width=50 bgColor=#add8e6 onClick="colorInput('lightblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightblue'); put_focus();">lightblue</TD>
    <TD align=left width=75 onClick="colorInput('lightblue'); put_focus();">ADD8E6</TD>
    <TD align=middle width=50 bgColor=#f08080 onClick="colorInput('lightcoral'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightcoral'); put_focus();">lightcoral</TD>
    <TD align=left width=75 onClick="colorInput('lightcoral'); put_focus();">F08080</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#e0ffff onClick="colorInput('lightcyan'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightcyan'); put_focus();">lightcyan</TD>
    <TD align=left width=75 onClick="colorInput('lightcyan'); put_focus();">E0FFFF</TD>
    <TD align=middle width=50 bgColor=#fafad2 onClick="colorInput('lightgoldenrodyellow'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightgoldenrodyellow'); put_focus();">lightgoldenrodyellow</TD>
    <TD align=left width=75 onClick="colorInput('lightgoldenrodyellow'); put_focus();">FAFAD2</TD>
    <TD align=middle width=50 bgColor=#90ee90 onClick="colorInput('lightgreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightgreen'); put_focus();">lightgreen</TD>
    <TD align=left width=75 onClick="colorInput('lightgreen'); put_focus();">90EE90</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#d3d3d3 onClick="colorInput('lightgrey'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightgrey'); put_focus();">lightgrey</TD>
    <TD align=left width=75 onClick="colorInput('lightgrey'); put_focus();">D3D3D3</TD>
    <TD align=middle width=50 bgColor=#ffb6c1 onClick="colorInput('lightpink'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightpink'); put_focus();">lightpink</TD>
    <TD align=left width=75 onClick="colorInput('lightpink'); put_focus();">FFB6C1</TD>
    <TD align=middle width=50 bgColor=#ffa07a onClick="colorInput('lightsalmon'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightsalmon'); put_focus();">lightsalmon</TD>
    <TD align=left width=75 onClick="colorInput('lightsalmon'); put_focus();">FFA07A</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#20b2aa onClick="colorInput('lightseagreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightseagreen'); put_focus();">lightseagreen</TD>
    <TD align=left width=75 onClick="colorInput('lightseagreen'); put_focus();">20B2AA</TD>
    <TD align=middle width=50 bgColor=#87cefa onClick="colorInput('lightskyblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightskyblue'); put_focus();">lightskyblue</TD>
    <TD align=left width=75 onClick="colorInput('lightskyblue'); put_focus();">87CDFA</TD>
    <TD align=middle width=50 bgColor=#8470ff onClick="colorInput('lightslateblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightslateblue'); put_focus();">lightslateblue</TD>
    <TD align=left width=75 onClick="colorInput('lightslateblue'); put_focus();">8470FF</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#778899 onClick="colorInput('lightslategray'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightslategray'); put_focus();">lightslategray</TD>
    <TD align=left width=75 onClick="colorInput('lightslategray'); put_focus();">778899</TD>
    <TD align=middle width=50 bgColor=#b0c4de onClick="colorInput('lightsteelblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightsteelblue'); put_focus();">lightsteelblue</TD>
    <TD align=left width=75 onClick="colorInput('lightsteelblue'); put_focus();">B0C4DE</TD>
    <TD align=middle width=50 bgColor=#ffffe0 onClick="colorInput('lightyellow'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lightyellow'); put_focus();">lightyellow</TD>
    <TD align=left width=75 onClick="colorInput('lightyellow'); put_focus();">FFFFE0</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#00ff00 onClick="colorInput('lime'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('lime'); put_focus();">lime</TD>
    <TD align=left width=75 onClick="colorInput('lime'); put_focus();">00FF00</TD>
    <TD align=middle width=50 bgColor=#32cd32 onClick="colorInput('limegreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('limegreen'); put_focus();">limegreen</TD>
    <TD align=left width=75 onClick="colorInput('limegreen'); put_focus();">32CD32</TD>
    <TD align=middle width=50 bgColor=#faf0e6 onClick="colorInput('linen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('linen'); put_focus();">linen</TD>
    <TD align=left width=75 onClick="colorInput('linen'); put_focus();">FAF0E6</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#ff00ff onClick="colorInput('magenta'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('magenta'); put_focus();">magenta</TD>
    <TD align=left width=75 onClick="colorInput('magenta'); put_focus();">FF00FF</TD>
    <TD align=middle width=50 bgColor=#800000 onClick="colorInput('maroon'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('maroon'); put_focus();">maroon</TD>
    <TD align=left width=75 onClick="colorInput('maroon'); put_focus();">800000</TD>
    <TD align=middle width=50 bgColor=#66cdaa onClick="colorInput('mediumaquamarine'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumaquamarine'); put_focus();">mediumaquamarine</TD>
    <TD align=left width=75 onClick="colorInput('mediumaquamarine'); put_focus();">66CDAA</TD>
	</TR>
	<TR>
<?php
if ($CookieStatus == "a" || $CookieStatus == "m" || COLOR_FILTERS == 0)
{
?>
    <TD align=middle width=50 bgColor=#0000cd onClick="colorInput('mediumblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumblue'); put_focus();">mediumblue</TD>
    <TD align=left width=75 onClick="colorInput('mediumblue'); put_focus();">0000CD</TD>
<?php
}
if ($CookieStatus != "a" && $CookieStatus != "m" && COLOR_FILTERS == 1)
{
?>
    <TD align=middle width=50 bgColor=#0000cd onClick="window.status='Not moderator. Color disabled. Please pick another one!'; return true;">&nbsp;</TD>
    <TD align=left width=100 onClick="window.status='Not moderator. Color disabled. Please pick another one!'; return true;">mediumblue&nbsp;(mod&nbsp;only)</TD>
    <TD align=left width=75 onClick="window.status='Not moderator. Color disabled. Please pick another one!'; return true;">0000CD</TD>
<?php
}
?>
    <TD align=middle width=50 bgColor=#ba55d3 onClick="colorInput('mediumorchid'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumorchid'); put_focus();">mediumorchid</TD>
    <TD align=left width=75 onClick="colorInput('mediumorchid'); put_focus();">BA55D3</TD>
    <TD align=middle width=50 bgColor=#9370db onClick="colorInput('mediumpurple'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumpurple'); put_focus();">mediumpurple</TD>
    <TD align=left width=75 onClick="colorInput('mediumpurple'); put_focus();">9370DB</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#3cb371 onClick="colorInput('mediumseagreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumseagreen'); put_focus();">mediumseagreen</TD>
    <TD align=left width=75 onClick="colorInput('mediumseagreen'); put_focus();">3CB371</TD>
    <TD align=middle width=50 bgColor=#7b68ee onClick="colorInput('mediumslateblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumslateblue'); put_focus();">mediumslateblue</TD>
    <TD align=left width=75 onClick="colorInput('mediumslateblue'); put_focus();">7B68EE</TD>
    <TD align=middle width=50 bgColor=#00fa9a onClick="colorInput('mediumspringgreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumspringgreen'); put_focus();">mediumspringgreen</TD>
    <TD align=left width=75 onClick="colorInput('mediumspringgreen'); put_focus();">00FA9A</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#48d1cc onClick="colorInput('mediumturquoise'); put_focus();"><br></TD>
    <TD align=left width=100 onClick="colorInput('mediumturquoise'); put_focus();">mediumturquoise</TD>
    <TD align=left width=75 onClick="colorInput('mediumturquoise'); put_focus();">48D1CC</TD>
    <TD align=middle width=50 bgColor=#c71585 onClick="colorInput('mediumvioletred'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mediumvioletred'); put_focus();">mediumvioletred</TD>
    <TD align=left width=75 onClick="colorInput('mediumvioletred'); put_focus();">C71585</TD>
    <TD align=middle width=50 bgColor=#191970 onClick="colorInput('midnightblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('midnightblue'); put_focus();">midnightblue</TD>
    <TD align=left width=75 onClick="colorInput('midnightblue'); put_focus();">191970</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#f5fffa onClick="colorInput('mintcream'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mintcream'); put_focus();">mintcream</TD>
    <TD align=left width=75 onClick="colorInput('mintcream'); put_focus();">F5FFFA</TD>
    <TD align=middle width=50 bgColor=#ffe4e1 onClick="colorInput('mistyrose'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('mistyrose'); put_focus();">mistyrose</TD>
    <TD align=left width=75 onClick="colorInput('mistyrose'); put_focus();">FFE4E1</TD>
    <TD align=middle width=50 bgColor=#ffe4b5 onClick="colorInput('moccasin'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('moccasin'); put_focus();">moccasin</TD>
    <TD align=left width=75 onClick="colorInput('moccasin'); put_focus();">FFE4B5</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#ffdead onClick="colorInput('navajowhite'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('navajowhite'); put_focus();">navajowhite</TD>
    <TD align=left width=75 onClick="colorInput('navajowhite'); put_focus();">FFDEAD</TD>
    <TD align=middle width=50 bgColor=#000080 onClick="colorInput('navy'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('navy'); put_focus();">navy</TD>
    <TD align=left width=75 onClick="colorInput('navy'); put_focus();">000080</TD>
    <TD align=middle width=50 bgColor=#fdf5e6 onClick="colorInput('oldlace'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('oldlace'); put_focus();">oldlace</TD>
    <TD align=left width=75 onClick="colorInput('oldlace'); put_focus();">FDF5E6</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#808000 onClick="colorInput('olive'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('olive'); put_focus();">olive</TD>
    <TD align=left width=75 onClick="colorInput('olive'); put_focus();">808000</TD>
    <TD align=middle width=50 bgColor=#6b8e23 onClick="colorInput('olivedrab'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('olivedrab'); put_focus();">olivedrab</TD>
    <TD align=left width=75 onClick="colorInput('olivedrab'); put_focus();">6B8E23</TD>
    <TD align=middle width=50 bgColor=#ffa500 onClick="colorInput('orange'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('orange'); put_focus();">orange</TD>
    <TD align=left width=75 onClick="colorInput('orange'); put_focus();">FFA500</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#ff4500 onClick="colorInput('orangered'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('orangered'); put_focus();">orangered</TD>
    <TD align=left width=75 onClick="colorInput('orangered'); put_focus();">FF4500</TD>
    <TD align=middle width=50 bgColor=#da70d6 onClick="colorInput('orchid'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('orchid'); put_focus();">orchid</TD>
    <TD align=left width=75 onClick="colorInput('orchid'); put_focus();">DA70D6</TD>
    <TD align=middle width=50 bgColor=#eee8aa onClick="colorInput('palegoldenrod'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('palegoldenrod'); put_focus();">palegoldenrod</TD>
    <TD align=left width=75 onClick="colorInput('palegoldenrod'); put_focus();">EEE8AA</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#98fb98 onClick="colorInput('palegreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('palegreen'); put_focus();">palegreen</TD>
    <TD align=left width=75 onClick="colorInput('palegreen'); put_focus();">98FB98</TD>
    <TD align=middle width=50 bgColor=#afeeee onClick="colorInput('paleturquoise'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('paleturquoise'); put_focus();">paleturquoise</TD>
    <TD align=left width=75 onClick="colorInput('paleturquoise'); put_focus();">AFEEEE</TD>
    <TD align=middle width=50 bgColor=#db7093 onClick="colorInput('palevioletred'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('palevioletred'); put_focus();">palevioletred</TD>
    <TD align=left width=75 onClick="colorInput('palevioletred'); put_focus();">DB7093</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#ffefd5 onClick="colorInput('papaawhip'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('papaawhip'); put_focus();">papaawhip</TD>
    <TD align=left width=75 onClick="colorInput('papaawhip'); put_focus();">FFEFD5</TD>
    <TD align=middle width=50 bgColor=#ffdab9 onClick="colorInput('peachpuff'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('peachpuff'); put_focus();">peachpuff</TD>
    <TD align=left width=75 onClick="colorInput('peachpuff'); put_focus();">FFDAB9</TD>
    <TD align=middle width=50 bgColor=#cd853f onClick="colorInput('peru'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('peru'); put_focus();">peru</TD>
    <TD align=left width=75 onClick="colorInput('peru'); put_focus();">CD853F</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#ffc0cb onClick="colorInput('pink'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('pink'); put_focus();">pink</TD>
    <TD align=left width=75 onClick="colorInput('pink'); put_focus();">FFC0CB</TD>
    <TD align=middle width=50 bgColor=#dda0dd onClick="colorInput('plum'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('plum'); put_focus();">plum</TD>
    <TD align=left width=75 onClick="colorInput('plum'); put_focus();">DDA0DD</TD>
    <TD align=middle width=50 bgColor=#b0e0e6 onClick="colorInput('powderblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('powderblue'); put_focus();">powderblue</TD>
    <TD align=left width=75 onClick="colorInput('powderblue'); put_focus();">B0E0E6</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#800080 onClick="colorInput('purple'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('purple'); put_focus();">purple</TD>
    <TD align=left width=75 onClick="colorInput('purple'); put_focus();">800080</TD>
<?php
if ($CookieStatus == "a" || COLOR_FILTERS == 0)
{
?>
    <TD align=middle width=50 bgColor=#ff0000 onClick="colorInput('red'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('red'); put_focus();">red</TD>
    <TD align=left width=75 onClick="colorInput('red'); put_focus();">FF0000</TD>
<?php
}
if ($CookieStatus != "a" && COLOR_FILTERS == 1)
{
?>
    <TD align=middle width=50 bgColor=#ff0000 onClick="window.status='Not administrator. Color disabled. Please pick another one!'; return true;">&nbsp;</TD>
    <TD align=left width=100 onClick="window.status='Not administrator. Color disabled. Please pick another one!'; return true;">red&nbsp;(admin&nbsp;only)</TD>
    <TD align=left width=75 onClick="window.status='Not administrator. Color disabled. Please pick another one!'; return true;">FF0000</TD>
<?php
}
?>
    <TD align=middle width=50 bgColor=#bc8f8f onClick="colorInput('rosybrown'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('rosybrown'); put_focus();">rosybrown</TD>
    <TD align=left width=75 onClick="colorInput('rosybrown'); put_focus();">BC8F8F</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#4169e1 onClick="colorInput('royalblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('royalblue'); put_focus();">royalblue</TD>
    <TD align=left width=75 onClick="colorInput('royalblue'); put_focus();">4169E1</TD>
    <TD align=middle width=50 bgColor=#8b4513 onClick="colorInput('saddlebrown'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('saddlebrown'); put_focus();">saddlebrown</TD>
    <TD align=left width=75 onClick="colorInput('saddlebrown'); put_focus();">8B4513</TD>
    <TD align=middle width=50 bgColor=#fa8072 onClick="colorInput('salmon'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('salmon'); put_focus();">salmon</TD>
    <TD align=left width=75 onClick="colorInput('salmon'); put_focus();">FA8072</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#f4a460 onClick="colorInput('sandybrown'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('sandybrown'); put_focus();">sandybrown</TD>
    <TD align=left width=75 onClick="colorInput('sandybrown'); put_focus();">F4A460</TD>
    <TD align=middle width=50 bgColor=#2e8b57 onClick="colorInput('seagreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('seagreen'); put_focus();">seagreen</TD>
    <TD align=left width=75 onClick="colorInput('seagreen'); put_focus();">2E8B57</TD>
    <TD align=middle width=50 bgColor=#fff5ee onClick="colorInput('seashell'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('seashell'); put_focus();">seashell</TD>
    <TD align=left width=75 onClick="colorInput('seashell'); put_focus();">FFF5EE</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#a0522d onClick="colorInput('sienna'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('sienna'); put_focus();">sienna</TD>
    <TD align=left width=75 onClick="colorInput('sienna'); put_focus();">A0522D</TD>
    <TD align=middle width=50 bgColor=#c0c0c0 onClick="colorInput('silver'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('silver'); put_focus();">silver</TD>
    <TD align=left width=75 onClick="colorInput('silver'); put_focus();">C0C0C0</TD>
    <TD align=middle width=50 bgColor=#87ceeb onClick="colorInput('skyblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('skyblue'); put_focus();">skyblue</TD>
    <TD align=left width=75 onClick="colorInput('skyblue'); put_focus();">87CEEB</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#6a5acd onClick="colorInput('slateblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('slateblue'); put_focus();">slateblue</TD>
    <TD align=left width=75 onClick="colorInput('slateblue'); put_focus();">6A5ACD</TD>
    <TD align=middle width=50 bgColor=#708090 onClick="colorInput('slategray'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('slategray'); put_focus();">slategray</TD>
    <TD align=left width=75 onClick="colorInput('slategray'); put_focus();">708090</TD>
    <TD align=middle width=50 bgColor=#fffafa onClick="colorInput('snow'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('snow'); put_focus();">snow</TD>
    <TD align=left width=75 onClick="colorInput('snow'); put_focus();">FFFAFA</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#00ff7f onClick="colorInput('springgreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('springgreen'); put_focus();">springgreen</TD>
    <TD align=left width=75 onClick="colorInput('springgreen'); put_focus();">00FF7F</TD>
    <TD align=middle width=50 bgColor=#4682b4 onClick="colorInput('steelblue'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('steelblue'); put_focus();">steelblue</TD>
    <TD align=left width=75 onClick="colorInput('steelblue'); put_focus();">4682B4</TD>
    <TD align=middle width=50 bgColor=#d2b48c onClick="colorInput('tan'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('tan'); put_focus();">tan</TD>
    <TD align=left width=75 onClick="colorInput('tan'); put_focus();">D2B48C</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#008080 onClick="colorInput('teal'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('teal'); put_focus();">teal</TD>
    <TD align=left width=75 onClick="colorInput('teal'); put_focus();">008080</TD>
    <TD align=middle width=50 bgColor=#d8bfd8 onClick="colorInput('thistle'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('thistle'); put_focus();">thistle</TD>
    <TD align=left width=75 onClick="colorInput('thistle'); put_focus();">D8BFD8</TD>
    <TD align=middle width=50 bgColor=#ff6347 onClick="colorInput('tomato'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('tomato'); put_focus();">tomato</TD>
    <TD align=left width=75 onClick="colorInput('tomato'); put_focus();">FF6347</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#40e0d0 onClick="colorInput('turquoise'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('turquoise'); put_focus();">turquoise</TD>
    <TD align=left width=75 onClick="colorInput('turquoise'); put_focus();">40E0D0</TD>
    <TD align=middle width=50 bgColor=#ee82ee onClick="colorInput('violet'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('violet'); put_focus();">violet</TD>
    <TD align=left width=75 onClick="colorInput('violet'); put_focus();">EE82EE</TD>
    <TD align=middle width=50 bgColor=#f5deb3 onClick="colorInput('wheat'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('wheat'); put_focus();">wheat</TD>
    <TD align=left width=75 onClick="colorInput('wheat'); put_focus();">F5DEB3</TD>
  </TR>
	<TR>
    <TD align=middle width=50 bgColor=#ffffff onClick="colorInput('white'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('white'); put_focus();">white</TD>
    <TD align=left width=75 onClick="colorInput('white'); put_focus();">FFFFFF</TD>
    <TD align=middle width=50 bgColor=#f5f5f5 onClick="colorInput('whitesmoke'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('whitesmoke'); put_focus();">whitesmoke</TD>
    <TD align=left width=75 onClick="colorInput('whitesmoke'); put_focus();">F5F5F5</TD>
    <TD align=middle width=50 bgColor=#ffff00 onClick="colorInput('yellow'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('yellow'); put_focus();">yellow</TD>
    <TD align=left width=75 onClick="colorInput('yellow'); put_focus();">FFFF00</TD>
	</TR>
	<TR>
    <TD align=middle width=50 bgColor=#9acd32 onClick="colorInput('yellowgreen'); put_focus();">&nbsp;</TD>
    <TD align=left width=100 onClick="colorInput('yellowgreen'); put_focus();">yellowgreen</TD>
    <TD align=left width=75 onClick="colorInput('yellowgreen'); put_focus();">9ACD32</TD>
	</TR>
<?php
}
?>
 	</TBODY>
</TABLE>
<br>
<HR><center>
<P><TD><SPAN style="font-family:Geneva, Helvetica, Arial, Verdana, sans-serif; color:#FF8C00; font-size: 12pt"><B><?php echo(L_COLOR_HEAD); ?> - <A href="<?php echo($ChatPath); ?>colorhelp_popup.php" onMouseOver="window.status='Click to open the mini help popup.'; return true;" onClick="window.parent.colorhelp_popup(); return false" target="_blank"><?php echo(L_COLOR_HELP_LINK); ?></A></B>
	</SPAN></TD></P>
<HR>
<P><SPAN CLASS="mainframe" style="font-family:Arial, Helvetica, Geneva, Verdana, sans-serif; font-size: 8pt">
<TD><?php echo(L_COL_HTML); ?> - <A HREF="<?php echo($ChatPath); ?>colorchart.htm" onMouseOver="window.status='Click to open the HTML Color Chat.'; return true" TARGET="_blank" CLASS="ChatLink"><?php echo(L_COL_CLICK); ?></A></TD><br>
<br><TD>&copy; 2005-<?php echo(date(Y)); ?> - <A HREF="http://groups.yahoo.com/subscribe/phpmychat" target="_blank" onMouseOver="window.status='Click to join the phpMyChat Yahoo Group.'; return true">phpMyChat Community</A> - <?php echo(L_COL_HELP_CREDITS1); ?><br><a href=mailto:ciprianmp@yahoo.com onMouseOver="window.status='Click to email Ciprian Murariu.'; return true;">Ciprian Murariu</a> - <?php echo(L_COL_HELP_CREDITS2); ?><br><a href=mailto:ealdwulf@yahoo.com onMouseOver="window.status='Click to email Ealdwulf.'; return true">Ealdwulf</a> - <A HREF="<?php echo($ChatPath); ?>colorchart.htm" onMouseOver="window.status='Click to open the HTML Color Chat.'; return true" TARGET="_blank" CLASS="ChatLink"><?php echo(L_COL_HELP_CREDITS3); ?><br><hr><br><?php echo(L_COL_HELP_THKS); ?></TD>
</SPAN></P>
</center>
<br>
</BODY>
</HTML>