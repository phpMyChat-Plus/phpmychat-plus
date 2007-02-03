<?php
// Get the names and values for vars sent to this script
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Added for Skin mod
if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);

if (isset($HTTP_COOKIE_VARS["CookieLang"])) $L = $HTTP_COOKIE_VARS["CookieLang"];
if (isset($HTTP_COOKIE_VARS["CookieUsername"])) $U = $HTTP_COOKIE_VARS["CookieUsername"];

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

header("Content-Type: text/html; charset=${Charset}");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($TextDir); ?>">
<HEAD><TITLE><?php echo(L_PRIV_POST_MSG); ?></TITLE>
</HEAD>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="MSHTML 6.00.2900.2722" name=GENERATOR></HEAD>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
function postPM()
{
	var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
	var postform = document.forms['PostForm'];
	indexform.elements['M'].value = postform.elements['Post'].value;
	indexform.elements['sent'].value = '1';
	if (document.all) indexform.elements['sendForm'].disabled = true;
	indexform.submit();
	indexform.elements['M'].focus();
 	self.close();
 };

function checkEnter(e) //e is event object passed from function invocation
{
var characterCode; //literal character code will be stored in this variable
if(e && e.which) //if which property of event object is supported (NN4)
{
e = e;
characterCode = e.which; //character code is contained in NN4's which property
}
else
{
e = event;
characterCode = e.keyCode; //character code is contained in IE's keyCode property
}
if(characterCode == 13) //if generated character code is equal to ascii 13 (if enter key)
{
postPM(); //submit the form
return false;
}
else
{
return true;
}
};

//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="setTimeout('window.close()',120000); window.status='Send PM ('+window.opener.window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].value+')'; document.forms['PostForm'].elements['Post'].value=window.opener.window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].value; window.opener.window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].value=''; self.focus(); document.forms['PostForm'].elements['Post'].focus();">
<CENTER>
<TABLE BORDER=1 CELLPADDING=3 WIDTH=400 CLASS="table">
	<TR><TD width="100%" ALIGN="CENTER" CLASS="tabtitle"><?php echo(L_PRIV_POST_MSG) ?></TD></TR>
</TABLE>
<br />
<FORM ACTION="send_popup.php" METHOD="POST" AUTOCOMPLETE="OFF" NAME="PostForm">
<tr><td><input type="text" size="60" value="" name="Post" CLASS="ChatBox" onKeyPress="checkEnter(event)";></td></tr>
</FORM>
</CENTER>
<P align="right" style="font-weight: 800; color:#FFD700; font-size: 7pt">
&copy; 2005-<?php echo(date(Y)); ?> - by <a href=mailto:ciprianmp@yahoo.com onMouseOver="window.status='Click to email author.'; return true;">Ciprian Murariu</a>
</P>
</BODY>
</HTML>