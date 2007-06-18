<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);
if (!isset($L) && isset($_COOKIE["CookieLang"])) $L = $_COOKIE["CookieLang"]; 
if (isset($_COOKIE["CookieUsername"])) $U = $_COOKIE["CookieUsername"];

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

header("Content-Type: text/html; charset=${Charset}");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo($TextDir); ?>">
<HEAD><TITLE><?php echo(L_PRIV_MSG); ?></TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content="MSHTML 6.00.2900.2722" name=GENERATOR>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
function postReply11(e)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo1'].value + reform.elements['Reply1'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
	 	self.close();
	}
	else
	{
		return true;
	}
};

function postReply1(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo1'].value + reform.elements['Reply1'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply1'].value += ' - Replied';
		reform.elements['Reply1'].disabled = true;
		if (i>1) reform.elements[1].focus();
	}
	else
	{
		return true;
	}
};

function postReply2(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo2'].value + reform.elements['Reply2'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply2'].value += ' - Replied';
		reform.elements['Reply2'].disabled = true;
		if (i>2) reform.elements[2].focus();
	}
	else
	{
		return true;
	}
};

function postReply3(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo3'].value + reform.elements['Reply3'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply3'].value += ' - Replied';
		reform.elements['Reply3'].disabled = true;
		if (i>3) reform.elements['Reply4'].focus();
	}
	else
	{
		return true;
	}
};

function postReply4(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo4'].value + reform.elements['Reply4'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply4'].value += ' - Replied';
		reform.elements['Reply4'].disabled = true;
		if (i>4) reform.elements['Reply5'].focus();
	}
	else
	{
	return true;
	}
};

function postReply5(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo5'].value + reform.elements['Reply5'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply5'].value += ' - Replied';
		reform.elements['Reply5'].disabled = true;
		if (i>5) reform.elements['Reply6'].focus();
	}
	else
	{
		return true;
	}
};

function postReply6(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo6'].value + reform.elements['Reply6'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply6'].value += ' - Replied';
		reform.elements['Reply6'].disabled = true;
		if (i>6) reform.elements['Reply7'].focus();
	}
	else
	{
		return true;
	}
};

function postReply7(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo7'].value + reform.elements['Reply7'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply7'].value += ' - Replied';
		reform.elements['Reply7'].disabled = true;
		if (i>7) reform.elements['Reply8'].focus();
	}
	else
	{
		return true;
	}
};

function postReply8(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo8'].value + reform.elements['Reply8'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply8'].value += ' - Replied';
		reform.elements['Reply8'].disabled = true;
		if (i>8) reform.elements['Reply9'].focus();
	}
	else
	{
		return true;
	}
};

function postReply9(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo9'].value + reform.elements['Reply9'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply9'].value += ' - Replied';
		reform.elements['Reply9'].disabled = true;
		if (i=10) reform.elements['Reply10'].focus();
	}
	else
	{
		return true;
	}
};

function postReply10(e,i)
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
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo10'].value + reform.elements['Reply10'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply10'].value += ' - Replied';
		reform.elements['Reply10'].disabled = true;
	}
	else
	{
		return true;
	}
};

	function runCmd(CmdName,infos)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		if (window.opener.window.parent.frames['input'] && indexform)
		{
			if (infos != "") infos = " " + infos;
			indexform.elements['M'].value = "/" + CmdName + infos;
			indexform.elements['sent'].value = '1';
			if (document.all) indexform.elements['sendForm'].disabled = true;
			indexform.submit();
		};
	};

//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="setTimeout('window.close()',120000); window.status='New private message received.'; self.focus(); window.document.forms['ReplyForm'].elements['Reply1'].focus();" onUnload="window.opener.window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].focus();">
<CENTER>
<?php
	$New = "New";
	$Neww = "Neww";
	global $DbLinkp;
	$DbLinkp= new DB;
	$DbLinkp->query("SELECT m_time, username, room, address, message, pm_read, room_from FROM ".C_MSG_TBL." WHERE ((room = '$R' OR room = 'Offline PMs') AND address = '$U' AND username != '$U' AND (pm_read = 'New' OR pm_read = 'Neww')) ORDER BY username AND m_time DESC");
	$NewPMs = $DbLinkp->num_rows();
if ($NewPMs == 1)
{
	list($T, $User, $Room, $Dest, $M, $Read, $RF) = $DbLinkp->next_record();
$DbLinkp->clean_results();
	$Time = date("d-M, H:i:s", $T + C_TMZ_OFFSET*60*60);
switch ($Read)
{
	case 'New':
		$ReplyTo = "/to ".$User." ";
	break;
	case 'Neww':
		$ReplyTo = "/wisp ".$User." ";
	break;
}
?>
<TABLE BORDER=1 CELLPADDING=3 WIDTH=400 CLASS="table">
	<TR><TD width="100%" ALIGN="CENTER" CLASS="tabtitle"><?php echo(L_PRIV_MSG) ?></TD></TR>
</TABLE>
<TABLE BORDER=1 CELLPADDING=3 WIDTH=400 CLASS="table">
	<TR><TD><B><U><?php echo(L_PRIV_MSG1); ?></U></B></TD>
		<TD width="100%" style="font-size: 11pt"><B><I><?php echo($User); ?></I></B></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG2); ?></U></B></TD>
		<TD width="100%"><I><?php echo(($RF != "") || ($RF == $Room) ? $RF : $Room); ?></I></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG3); ?></U></B></TD>
		<TD width="100%"><I><?php echo($Dest); ?></I></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG4); ?></U></B></TD>
		<TD width="100%" style="font-size: 12pt"><I><?php echo($M); ?></I></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG5); ?></U></B></TD>
		<TD width="100%" style="font-size: 8pt"><I><?php echo($Time); ?></I></TD></TR>
</TABLE>
<br />
<FORM ACTION="priv_popup.php?L=<?php echo($L); ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="ReplyForm">
<input type="hidden" value="<?php echo($ReplyTo) ?>" name="ReplyTo1">
<tr><td><input type="text" size="60" value="Re: " name="Reply1" CLASS="ChatBox" onKeyPress="postReply11(event);"></td></tr>
</FORM>
<?php echo(L_PRIV_POPUP); ?>
</CENTER>
<?php
	$DbLinkp->query("UPDATE ".C_MSG_TBL." SET pm_read='Old' WHERE ((room = '$R' OR room = 'Offline PMs') AND address = '$U' AND username != '$U' AND pm_read = 'New') ORDER BY username AND m_time DESC LIMIT 1");
	$DbLinkp->query("UPDATE ".C_MSG_TBL." SET pm_read='Oldw' WHERE ((room = '$R' OR room = 'Offline PMs') AND address = '$U' AND username != '$U' AND pm_read = 'Neww') ORDER BY username AND m_time DESC LIMIT 1");
	$DbLinkp->clean_results;
	}
elseif ($NewPMs > 1)
{
?>
<FONT size="3"><B><?php echo($NewPMs." ".L_PRIV_MSGS) ?><B></FONT><br />
<?php
if($NewPMs > 10)
{
?>
<FONT size="1" class="ChatLink"><?php echo(L_PRIV_MSGSa) ?></FONT><br />
<?php
}
?>
<br /><TABLE BORDER=1 CELLPADDING=3 WIDTH=400 CLASS="table">
	<TR><TD width="100%" align="center" CLASS="tabtitle" colspan="2"><B><FONT class="notify2"><I><?php echo($R); ?></I></B></TD></TR>
<FORM AUTOCOMPLETE="OFF" NAME="ReplyForm">
<?php
	$i = 1;
	$DbLinkp->clean_results;
	$DbLinkp->query("SELECT m_time, username, room, address, message, pm_read, room_from FROM ".C_MSG_TBL." WHERE ((room = '$R' OR room = 'Offline PMs') AND address = '$U' AND username != '$U' AND (pm_read = 'New' OR pm_read = 'Neww')) ORDER BY username AND m_time DESC LIMIT 10");
	while(list($T, $User, $Room, $Dest, $M, $Read, $RF) = $DbLinkp->next_record())
{
	$Time = date("d-M, H:i:s", $T + C_TMZ_OFFSET*60*60);
switch ($Read)
{
	case 'New':
		$ReplyTo = "/to ".$User." ";
	break;
	case 'Neww':
		$ReplyTo = "/wisp ".$User." ";
	break;
}
?>
	<TR><TD width="73%"><B><?php echo($i.". "); ?><U><?php echo(L_PRIV_MSG1); ?></U>&nbsp;<SPAN style="font-size: 11pt"><?php echo($User); ?></SPAN></B>&nbsp;(<B><U><?php echo(L_PRIV_MSG2); ?></U></B>&nbsp;<I><?php echo(($RF != "") || ($RF == $Room) ? $RF : $Room); ?></I>)</TD><TD align="right" style="font-size: 8pt"><I><U><?php echo(L_PRIV_MSG5); ?></U><br /><?php echo($Time); ?></I></TD></TR>
	<TR><TD width="100%" style="font-size: 12pt" colspan="2"><I><?php echo($M); ?></I></TD></TR>
<TR><TD width="100%" colspan="2"></TD></TR>
<input type="hidden" value="<?php echo($ReplyTo) ?>" name="ReplyTo<?php echo($i)?>">
<tr><td colspan="2"><input type="text" size="58" value="Re: " name="Reply<?php echo($i)?>" CLASS="ChatBox" onKeyPress="postReply<?php echo($i)?>(event,<?php echo($i)?>)"></tr>
<?php
	$i = $i+1;
}
$DbLinkp->clean_results();
?>
</FORM>
<TR><TD width="100%" colspan="2"></TD></TR>
</TABLE>
<?php
if($NewPMs > 10)
{
$NewPMsRest = $NewPMs - 10;
?>
<br /><a href=<?php $PHP_SELF ?> onMouseOver="window.status='Go to the next page.'; return true">Read the next <?php echo(($NewPMsRest == 1) ? " message" : " ".$NewPMsRest." messages"); ?> </a><br />
<?php
}
?>
<br /><SPAN style="font-weight: 400"><?php echo(L_PRIV_READ); ?><br />
<input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;"><br /><br />
<?php echo(L_PRIV_POPUP); ?></SPAN>
</CENTER>
<?php
	$DbLinkp->query("UPDATE ".C_MSG_TBL." SET pm_read='Old' WHERE ((room = '$R' OR room = 'Offline PMs') AND address = '$U' AND username != '$U' AND pm_read = 'New') OR (address = '$U' AND username != '$U' AND pm_read = 'Neww') ORDER BY username AND m_time DESC LIMIT 10");
	$DbLinkp->clean_results;
}
$DbLinkp->clean_results;
$DbLinkp->close();
?>
<P align="right" style="font-weight: 800; color:#FFD700; font-size: 7pt">
&copy; 2005-<?php echo(date(Y)); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='Click to email author.'; return true;" title="Click to email author" target=_blank>Ciprian Murariu</a>
</P>
</BODY>
</HTML>