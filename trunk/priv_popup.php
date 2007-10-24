<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
header("Content-Type: text/html; charset=${Charset}");

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR") ?>">
	<HEAD>
	<TITLE><?php echo(L_PRIV_MSG) ?></TITLE>
	<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)) ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
function postReply11(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
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

function postReply1(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo1'].value + reform.elements['Reply1'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply1'].value += ' - Replied';
		reform.elements['Reply1'].disabled = true;
		reform.elements['Reply2'].focus();
	}
	else
	{
		return true;
	}
};

function postReply2(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo2'].value + reform.elements['Reply2'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply2'].value += ' - Replied';
		reform.elements['Reply2'].disabled = true;
		reform.elements['Reply3'].focus();
	}
	else
	{
		return true;
	}
};

function postReply3(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo3'].value + reform.elements['Reply3'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply3'].value += ' - Replied';
		reform.elements['Reply3'].disabled = true;
		reform.elements['Reply4'].focus();
	}
	else
	{
		return true;
	}
};

function postReply4(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo4'].value + reform.elements['Reply4'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply4'].value += ' - Replied';
		reform.elements['Reply4'].disabled = true;
		reform.elements['Reply5'].focus();
	}
	else
	{
	return true;
	}
};

function postReply5(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo5'].value + reform.elements['Reply5'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply5'].value += ' - Replied';
		reform.elements['Reply5'].disabled = true;
		reform.elements['Reply6'].focus();
	}
	else
	{
		return true;
	}
};

function postReply6(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo6'].value + reform.elements['Reply6'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply6'].value += ' - Replied';
		reform.elements['Reply6'].disabled = true;
		reform.elements['Reply7'].focus();
	}
	else
	{
		return true;
	}
};

function postReply7(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo7'].value + reform.elements['Reply7'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply7'].value += ' - Replied';
		reform.elements['Reply7'].disabled = true;
		reform.elements['Reply8'].focus();
	}
	else
	{
		return true;
	}
};

function postReply8(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo8'].value + reform.elements['Reply8'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply8'].value += ' - Replied';
		reform.elements['Reply8'].disabled = true;
		reform.elements['Reply9'].focus();
	}
	else
	{
		return true;
	}
};

function postReply9(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
	{
		var indexform = window.opener.window.parent.frames['input'].window.document.forms['MsgForm'];
		var reform = document.forms['ReplyForm'];
		indexform.elements['M'].value = reform.elements['ReplyTo9'].value + reform.elements['Reply9'].value;
		indexform.elements['sent'].value = '1';
		if (document.all) indexform.elements['sendForm'].disabled = true;
		indexform.submit();
		reform.elements['Reply9'].value += ' - Replied';
		reform.elements['Reply9'].disabled = true;
		reform.elements['Reply10'].focus();
	}
	else
	{
		return true;
	}
};

function postReply10(e)
{
	var characterCode;
	if(e && e.which)
	{
		e = e;
		characterCode = e.which;
	}
	else
	{
		e = event;
		characterCode = e.keyCode;
	}
	if(characterCode == 13)
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
window.status='<?php echo(L_PRIV_MSG) ?>';
//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="setTimeout('window.close()',240000); self.focus(); window.document.forms['ReplyForm'].elements['Reply1'].focus();" onUnload="window.opener.window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].focus();">
<CENTER>
<?php
	global $DbLinkp;
	$DbLinkp= new DB;
	$DbLinkp->query("SELECT m_time, username, room, address, message, pm_read, room_from FROM ".C_MSG_TBL." WHERE (room = '$R' OR room = 'Offline PMs') AND address = '$U' AND pm_read LIKE 'New%' ORDER BY username AND m_time DESC LIMIT 11");
	$NewPMs = $DbLinkp->num_rows();
if ($NewPMs == "1")
{
$i=1;
list($T, $User, $Room, $Dest, $M, $Read, $RF) = $DbLinkp->next_record();
$Time = date("d-M, H:i:s", $T + C_TMZ_OFFSET*60*60);
if ($Read == "New") $ReplyTo = "/to ".$User." ";
elseif ($Read == "Neww") $ReplyTo = "/wisp ".$User." ";
$M = stripslashes($M);
if ($L!="turkish") $M = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$M);
else $M = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'</a>',$M);
$M = eregi_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$M);
?>
<TABLE BORDER=1 CELLPADDING=1 WIDTH=400 CLASS="table">
	<TR><TD width="100%" ALIGN="CENTER" CLASS="tabtitle"><?php echo(L_PRIV_MSG) ?></TD></TR>
</TABLE>
<TABLE BORDER=1 CELLPADDING=1 WIDTH=400 CLASS="table">
	<TR><TD><B><U><?php echo(L_PRIV_MSG1) ?></U></B></TD>
		<TD width="100%" style="font-size: 11pt"><B><I><?php echo($User) ?></I></B></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG2) ?></U></B></TD>
		<TD width="100%"><I><?php echo(($RF != "") || ($RF == $Room) ? $RF : $Room) ?></I></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG3) ?></U></B></TD>
		<TD width="100%"><I><?php echo($Dest) ?></I></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG4) ?></U></B></TD>
		<TD width="100%" style="font-size: 12pt"><I><?php echo($M) ?></I></TD></TR>
	<TR><TD><B><U><?php echo(L_PRIV_MSG5) ?></U></B></TD>
		<TD width="100%" style="font-size: 8pt"><I><?php echo($Time) ?></I></TD></TR>
</TABLE>
<br />
<FORM ACTION="priv_popup.php?L=<?php echo($L) ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="ReplyForm">
<input type="hidden" value="<?php echo($ReplyTo) ?>" name="ReplyTo1">
<tr><td><input type="text" size="60" value="<?php echo(($User != C_BOT_NAME) ? "Re: " : "") ?>" name="Reply1" CLASS="ChatBox" onKeyPress="postReply11(event);"></td></tr>
</FORM>
<?php
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
<br />
<TABLE BORDER=1 CELLPADDING=3 WIDTH=400 CLASS="table">
	<TR><TD width="100%" align="center" CLASS="tabtitle" colspan="2"><B><FONT class="notify2"><I><?php echo($R) ?></I></B></TD></TR>
<FORM ACTION="priv_popup.php?L=<?php echo($L) ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="ReplyForm">
<?php
$i = 1;
while(($i < 11) && (list($T, $User, $Room, $Dest, $M, $Read, $RF) = $DbLinkp->next_record()))
{
$Time = date("d-M, H:i:s", $T + C_TMZ_OFFSET*60*60);
if ($Read == "New") $ReplyTo = "/to ".$User." ";
elseif ($Read == "Neww") $ReplyTo = "/wisp ".$User." ";
$M = stripslashes($M);
if ($L!="turkish") $M = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$M);
else $M = eregi_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_1,L_LINKS_15).'</a>',$M);
$M = eregi_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$M);
?>
	<TR><TD width="73%"><B><?php echo($i.". ") ?><U><?php echo(L_PRIV_MSG1) ?></U>&nbsp;<SPAN style="font-size: 11pt"><?php echo($User) ?></SPAN></B>&nbsp;(<B><U><?php echo(L_PRIV_MSG2) ?></U></B>&nbsp;<I><?php echo(($RF != "") || ($RF != $Room) ? $RF : $Room) ?></I>)</TD><TD align="right" style="font-size: 8pt"><I><U><?php echo(L_PRIV_MSG5) ?></U><br /><?php echo($Time) ?></I></TD></TR>
	<TR><TD width="100%" style="font-size: 12pt" colspan="2"><I><?php echo($M) ?></I></TD></TR>
	<TR><TD width="100%" colspan="2"></TD></TR>
<input type="hidden" value="<?php echo($ReplyTo) ?>" name="ReplyTo<?php echo($i)?>">
<tr><td colspan="2"><input type="text" size="58" value="<?php echo(($User != C_BOT_NAME) ? "Re: " : "") ?>" name="Reply<?php echo($i)?>" CLASS="ChatBox" onKeyPress="postReply<?php echo($i)?>(event)"></tr>
<?php
$i++;
}
?>
</FORM>
</TABLE>
<?php
if($NewPMs > 10)
{
$NewPMsRest = $NewPMs - 10;
if ($L != "turkish") $Mess1 =  " ".L_HELP_MSGS; else $Mess1 =  " ".L_HELP_MSG;
if ($NewPMsRest == 1) $Mess_rest = $Mess1; else $Mess_rest = " ".$NewPMsRest." ".L_HELP_MSGS;
?>
<br />
<a href=<?php $PHP_SELF; ?> onMouseOver="window.status='<?php echo(L_NEXT_PAGE) ?>.'; return true"><?php echo(sprintf(L_NEXT_READ,$Mess_rest)) ?> </a>
<br />
<?php
}
?>
<br /><SPAN style="font-weight: 400"><?php echo(L_PRIV_READ) ?><br />
<input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;"><br /><br />
<?php
}
	$DbLinkp->clean_results;
	$DbLinkp->query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE (room = '$R' OR room = 'Offline PMs') AND address = '$U' AND  pm_read LIKE 'New%' ORDER BY username AND m_time DESC LIMIT ".$i."");
$DbLinkp->close();
?>
<?php echo(($L != "turkish") ? L_PRIV_POPUP." <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='".L_REG_4.".'; return true\" title='".L_REG_4."'>".L_PRIV_POPUP1 : "<a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='".L_REG_4.".'; return true\" title='".L_REG_4."'>".L_PRIV_POPUP1." ".L_PRIV_POPUP) ?>
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2005-<?php echo(date(Y)); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo (($L!="turkish") ? sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR) : sprintf(L_CLICKS,L_AUTHOR,L_LINKS_6)); ?>.'; return true;" title="<?php echo (($L!="turkish") ? sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR) : sprintf(L_CLICKS,L_AUTHOR,L_LINKS_6)); ?>" target=_blank>Ciprian Murariu</a></span></div></P>
</P>
</BODY>
</HTML>