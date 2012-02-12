<?php
// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

if (isset($_GET["Ver"])) $Ver = $_GET["Ver"];
// Color Input Box mod by Ciprian
if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
if (file_exists("./localization/".$L."/localized.cmds.php")) require("./localization/".$L."/localized.cmds.php");

header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime')) set_magic_quotes_runtime(0);
else ini_set("magic_quotes_runtime", 0);
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
$onMouseOver =  "onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_14).".'; return true\"";
$title = "title=\"".sprintf(L_CLICK,L_LINKS_14)."\"";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(L_HLP." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
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

<BODY CLASS="mainframe" onLoad="if (window.focus) window.focus();">
<CENTER>

<!-- Chat Etiquette -->
<?php
if(SHOW_ETIQ_IN_HELP == "1")
{
?>
<TABLE BORDER=0 CELLPADDING=3 WIDTH=574 CLASS="table">
	<TR><TD ALIGN="CENTER" CLASS="tabtitle"><?php echo(L_HELP_ETIQ_1); ?></TD></TR>
	<TR><TD ALIGN="<?php echo($CellAlign); ?>"><?php echo(L_HELP_ETIQ_2); ?><br />
		<SPAN CLASS="ChatCopy" dir="LTR">
<?php
include_once("./admin/mail4admin.lib.php");
#if (!eregi("Your name",C_ADMIN_NAME) && C_ADMIN_NAME != "") $Owner_name = C_ADMIN_NAME;
if (stripos(C_ADMIN_NAME,"Your name") === false && C_ADMIN_NAME != "") $Owner_name = C_ADMIN_NAME;
else $Owner_name = L_WHOIS_ADMIN;
if (strstr($Sender_email,"@") && ($Sender_email != ""))
{
	$Owner_email = $Sender_email;
?>
<a href="mailto:<?php echo($Owner_email) ?>" CLASS="ChatLink" Title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_OWNER)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_OWNER)); ?>.'; return true"><?php echo($Owner_name); ?></A>
<?php
}
else echo($Owner_name);
?>
</SPAN>
</TD></TR>
	<TR><TD ALIGN="<?php echo($CellAlign); ?>"><br /><b><?php echo(L_HELP_ETIQ_3); ?></b><ul><?php echo(L_HELP_ETIQ_4); ?></ul></TD></TR>
</TABLE>
<br />
<?php
}
if (C_HTML_TAGS_KEEP != "none")
{
	?>
	<!-- Text formatting help -->
	<TABLE BORDER=0 CELLPADDING=3 WIDTH=574 CLASS="table">
		<TR><TD ALIGN="CENTER" CLASS="tabtitle"><?php echo(L_HELP_TIT_2); ?></TD></TR>
		<TR><TD ALIGN="<?php echo($CellAlign); ?>"><?php echo(L_HELP_FMT_1); ?></TD></TR>
		<TR><TD ALIGN="<?php echo($CellAlign); ?>"><?php echo(L_HELP_FMT_2); ?></TD></TR>
	</TABLE>
	<br />
	<?php
}
?>

<!-- Commands help -->
<TABLE BORDER=0 CELLPADDING=3 WIDTH=574 CLASS="table">
	<TR><TH ALIGN="CENTER" CLASS="tabtitle" COLSPAN=2><?php echo(L_HELP_TIT_3); ?></TH></TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2><I><?php echo(L_HELP_NOTE); ?></I></TH></TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2><I><?php echo(L_HELP_CMD_0); ?></I></TH></TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/!',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/!</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_7."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/recall".(L_CMD_RECALL != "" && L_CMD_RECALL != "L_CMD_RECALL" ? " /".str_replace(","," /",L_CMD_RECALL) : "")."</span>")); ?></TD>
	</TR>
	<?php
	if ($CookieStatus == "a" || $CookieStatus == "t")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/announce',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/announce {<?php echo(L_HELP_MSG); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_17.(L_CMD_ANNOUNCE != "" && L_CMD_ANNOUNCE != "L_CMD_ANNOUNCE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ANNOUNCE)."</span>") : "")); ?></TD>
	</TR>
	<?php
		};
	?>
<!-- The away command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/away', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/away [<?php echo(L_HELP_MSG); ?>]</A>
	</TH></TR>
	<TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_21.(L_CMD_AWAY != "" && L_CMD_AWAY != "L_CMD_AWAY" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_AWAY)."</span>") : "")); ?></TD>
  </TR>
<!-- End away command doc -->
	<?php
	if (C_BANISH && ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m"))
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
			<A HREF="#" onClick="cmd2Input('/ban',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/ban <BDO dir="<?php echo($TextDir); ?>">[*]</BDO> {<?php echo(L_USER); ?>} [<?php echo(L_HELP_REASON); ?>]</A>
		</TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_19.(L_CMD_BAN != "" && L_CMD_BAN != "L_CMD_BAN" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_BAN)."</span>") : "")); ?></TD>
		</TR>
		<?php
	};
	if ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m" || $CookieStatus == "r")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/buzz',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/buzz [<?php echo(L_HELP_BUZZ); ?>] [<?php echo(L_HELP_MSG); ?>]</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_22.(L_CMD_BUZZ != "" && L_CMD_BUZZ != "L_CMD_BUZZ" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_BUZZ)."</span>") : "")); ?></TD>
	</TR>
	<?php
		};
	// $Ver value is 'H' for dynamic rendering of the messages frame, 'L' or 'M' in other case
	if ($Ver == "H")
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
			<A HREF="#" onClick="cmd2Input('/clear',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/clear</A>
		</TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_15.(L_CMD_CLEAR != "" && L_CMD_CLEAR != "L_CMD_CLEAR" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_CLEAR)."</span>") : "")); ?></TD>
		</TR>
		<?php
	};
	if (MAX_ROLLS > 0)
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/dice',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/dice [n]</A> <BDO></BDO>(dice v.1)
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(sprintf(L_HELP_CMD_25,MAX_ROLLS).(L_CMD_DICE != "" && L_CMD_DICE != "L_CMD_DICE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_DICE)."</span>") : "")); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/2d',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/{n1}d[n2]</A> <BDO></BDO>(dice v.2)
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(sprintf(L_HELP_CMD_26,MAX_DICES,MAX_ROLLS)); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/d50',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/d{n1}[tn2]</A> <BDO></BDO>(dice v.3)
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(sprintf(L_HELP_CMD_32,MAX_ROLLS)); ?></TD>
	</TR>
<?php
};
?>
<!-- The high command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/high', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/high {<?php echo(L_USER); ?>}</A>
	</TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_27.(L_CMD_HIGH != "" && L_CMD_HIGH != "L_CMD_HIGH" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_HIGH)."</span>") : "")); ?></TD>
  </TR>
<!-- End high command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/ignore',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/ignore <BDO dir="<?php echo($TextDir); ?>">[-]</BDO> <?php echo("[".L_USER."[,".L_USER."...]]"); ?></A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_6.(L_CMD_IGNORE != "" && L_CMD_IGNORE != "L_CMD_IGNORE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_IGNORE)."</span>") : "")); ?></TD>
	</TR>
	<!-- The img command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/img',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/img {<?php echo(L_HELP_IMG); ?>}</A>
	</TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_28.(L_CMD_IMG != "" && L_CMD_IMG != "L_CMD_IMG" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_IMG)."</span>") : "")); ?></TD>
  </TR>
<!-- End img command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/invite',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/invite {<?php echo(L_USER); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_18.(L_CMD_INVITE != "" && L_CMD_INVITE != "L_CMD_INVITE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_INVITE)."</span>") : "")); ?></TD>
	</TR>
	<?php
	if (C_VERSION > 0)
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
			<A HREF="#" onClick="cmd2Input('/join',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/join <BDO dir="<?php echo($TextDir); ?>">[n]</BDO> {#<?php echo(L_HELP_ROOM); ?>}</A>
		</TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_4.(L_CMD_JOIN != "" && L_CMD_JOIN != "L_CMD_JOIN" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_JOIN)."</span>") : "")); ?></TD>
		</TR>
		<?php
	}
	if ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/kick',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/kick {<?php echo(L_USER); ?>} [<?php echo(L_HELP_REASON); ?>]</A><br />
		<A HREF="#" onClick="cmd2Input('/kick',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/kick <BDO dir="<?php echo($TextDir); ?>">{*} </BDO>[<?php echo(L_HELP_REASON); ?>]</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_9."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/boot".(L_CMD_KICK != "" && L_CMD_KICK != "L_CMD_KICK" ? " /".str_replace(","," /",L_CMD_KICK) : "")."</span>")); ?></TD>
	</TR>
		<?php
	}
	?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/ltr',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/ltr [<?php echo(L_HELP_MSG); ?>]</A><br />
		<A HREF="#" onClick="cmd2Input('/rtl',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/rtl [<?php echo(L_HELP_MSG); ?>]</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_34.((L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR") || (L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL") ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>".(L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR" ? "/".str_replace(","," /",L_CMD_LTR)." " : "").(L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL" ? "/".str_replace(","," /",L_CMD_RTL) : "")."</span>") : "")); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/me',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/me {<?php echo(L_HELP_MSG); ?>}</A><br />
		<A HREF="#" onClick="cmd2Input(':',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">: {<?php echo(L_HELP_MSG); ?>}</A><br />
		<A HREF="#" onClick="cmd2Input('/mr',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/mr {<?php echo(L_HELP_MSG); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_20.(L_CMD_ME != "" && L_CMD_ME != "L_CMD_ME" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ME)."</span>") : "")); ?><br /><?php echo(L_HELP_CMD_30.(L_CMD_MR != "" && L_CMD_MR != "L_CMD_MR" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_MR)."</span>") : "")); ?></TD>
	</TR>
<?php
if (C_ENABLE_PM)
{
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/msg',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/msg <?php echo("{".L_USER."} {".L_HELP_MSG."}"); ?></A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_10."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/to".(L_CMD_MSG != "" && L_CMD_MSG != "L_CMD_MSG" ? " /".str_replace(","," /",L_CMD_MSG) : "")."</span>")); ?></TD>
	</TR>
<?php
}
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/notify',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/notify</A>
		</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_13.(L_CMD_NOTIFY != "" && L_CMD_NOTIFY != "L_CMD_NOTIFY" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_NOTIFY)."</span>") : "")); ?></TD>
	</TR>
	<?php
	if ($Ver != "H")
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
			<A HREF="#" onClick="cmd2Input('/order',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/order</A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_3.(L_CMD_ORDER != "" && L_CMD_ORDER != "L_CMD_ORDER" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_ORDER)."</span>") : "")); ?></TD>
		</TR>
		<?php
	}
	?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/profile',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/profile</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_12.(L_CMD_PROFILE != "" && L_CMD_PROFILE != "L_CMD_PROFILE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_PROFILE)."</span>") : "")); ?></TD>
	</TR>
	<?php
	if ($CookieStatus == "a" || $CookieStatus == "t")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/promote',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/promote {<?php echo(L_USER); ?>}</A><br />
		<A HREF="#" onClick="cmd2Input('/demote',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/demote <BDO dir="<?php echo($TextDir); ?>">[*]</BDO> {<?php echo(L_USER); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_14.(L_CMD_PROMOTE != "" && L_CMD_PROMOTE != "L_CMD_PROMOTE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_PROMOTE)."</span>") : "")); ?>
		<br />
		<?php echo(L_HELP_CMD_29.(L_CMD_DEMOTE != "" && L_CMD_DEMOTE != "L_CMD_DEMOTE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_DEMOTE)."</span>") : "")); ?></TD>
	</TR>
<?php
};
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/quit',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/quit [<?php echo(L_HELP_MSG); ?>]</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_5."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/bye /exit".(L_CMD_QUIT != "" && L_CMD_QUIT != "L_CMD_QUIT" ? " /".str_replace(","," /",L_CMD_QUIT) : "")."</span>")); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/refresh',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/refresh <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(($Ver == "H" ? L_HELP_CMD_2b : L_HELP_CMD_2a)."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/reload".(L_CMD_REFRESH != "" && L_CMD_REFRESH != "L_CMD_REFRESH" ? " /".str_replace(","," /",L_CMD_REFRESH) : "")."</span>")); ?></TD>
	</TR>
	<?php
	if (C_SAVE)
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
			<A HREF="#" onClick="cmd2Input('/save',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/save <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A>
		</TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_16."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/export".(L_CMD_SAVE != "" && L_CMD_SAVE != "L_CMD_SAVE" ? " /".str_replace(","," /",L_CMD_SAVE) : "")."</span>")); ?></TD>
		</TR>
		<?php
	}
	?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/show',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/show <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A>
		<?php
		if ($Ver == "H")
		{
			?>
			<br /><A HREF="#" onClick="cmd2Input('/last',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/last <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A>
			<?php
		};
		?>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(($Ver == "H" ? L_HELP_CMD_1b : L_HELP_CMD_1a).(L_CMD_SHOW != "" && L_CMD_SHOW != "L_CMD_SHOW" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_SHOW)."</span>") : "")); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/size',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/size <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A>
	</TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_33.(L_CMD_SIZE != "" && L_CMD_SIZE != "L_CMD_SIZE" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_SIZE)."</span>") : "")); ?></TD>
		</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/sort',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/sort</A>
	</TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_31.(L_CMD_SORT != "" && L_CMD_SORT != "L_CMD_SORT" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_SORT)."</span>") : "")); ?></TD>
		</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/timestamp',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/timestamp</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_8.(L_CMD_TIMESTAMP != "" && L_CMD_TIMESTAMP != "L_CMD_TIMESTAMP" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_TIMESTAMP)."</span>") : "")); ?></TD>
	</TR>
<?php
	if ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m")
	{
		?>
	<!-- The topic command doc -->
  <TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
  	<A HREF="#" onClick="cmd2Input('/topic', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/topic <BDO dir="<?php echo($TextDir); ?>">[*]</BDO> {<?php echo(L_HELP_TOP); ?>}</A><br />
  	<A HREF="#" onClick="cmd2Input('/topic reset', false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/topic <BDO dir="<?php echo($TextDir); ?>">[*]</BDO> reset</A>
  </TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_24.(L_CMD_TOPIC != "" && L_CMD_TOPIC != "L_CMD_TOPIC" ? "<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/".str_replace(","," /",L_CMD_TOPIC)."</span>") : "")); ?></TD>
  </TR>
<!-- End topic command doc -->
<?php
	};
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
<?php
	if (version_compare(PHPVERSION,'5','>='))
	{
?>
		<A HREF="#" onClick="cmd2Input('/vid',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/vid</A>
		<br /><A HREF="#" onClick="cmd2Input('/tube',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/tube</A>
<?php
	}
	else
	{
?>
		<A HREF="#" onClick="cmd2Input('/tube',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/tube</A>
<?php
	}
?>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
<?php
	if (version_compare(PHPVERSION,'5','>='))
	{
?>
			<TD><?php echo(L_HELP_CMD_35."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/video /play".(L_CMD_VIDEO != "" && L_CMD_VIDEO != "L_CMD_VIDEO" ? " /".str_replace(","," /",L_CMD_VIDEO) : "")."</span>")); ?>
			<br /><?php echo(L_HELP_CMD_35a."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/utube /youtube".(L_CMD_UTUBE != "" && L_CMD_UTUBE != "L_CMD_UTUBE" ? " /".str_replace(","," /",L_CMD_UTUBE) : "")."</span>")); ?></TD>
<?php
	}
	else
	{
?>
			<TD><?php echo(L_HELP_CMD_36."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/utube /youtube".(L_CMD_UTUBE != "" && L_CMD_UTUBE != "L_CMD_UTUBE" ? " /".str_replace(","," /",L_CMD_UTUBE) : "")."</span>")); ?></TD>
		</TR>
<?php
	};
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/whois',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/whois {<?php echo(L_USER); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_11."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/about".(L_CMD_WHOIS != "" && L_CMD_WHOIS != "L_CMD_WHOIS" ? " /".str_replace(","," /",L_CMD_WHOIS) : "")."</span>")); ?></TD>
	</TR>
<!-- The wisp command doc -->
<?php
if (C_ENABLE_PM)
{
?>
  <TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	  	<A HREF="#" onClick="cmd2Input('/wisp', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/wisp <?php echo("{".L_USER."} {".L_HELP_MSG."}"); ?></A>
	</TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_23."<br />* ".sprintf(L_HELP_CMD_VAR,"<span class=success>/whisp".(L_CMD_WISP != "" && L_CMD_WISP != "L_CMD_WISP" ? " /".str_replace(","," /",L_CMD_WISP) : "")."</span>")); ?></TD>
  </TR>
<!-- End wisp command doc -->
<?php
}
?>
</TABLE>
<!-- Color Picker Text Input Box help start -->
<TABLE BORDER=0 CELLPADDING=3 WIDTH=574 CLASS="table">
	<TR><TD ALIGN="CENTER" CLASS="tabtitle"><?php echo(L_COL_HELP_TITLE); ?></TD></TR>
	<TR><TD ALIGN="<?php echo($CellAlign); ?>"><b><?php echo(L_COL_HELP_SUB1); ?></b><br /><?php echo(L_COL_HELP_P1); ?><br /></TD></TR>
	<TR><TD ALIGN="<?php echo($CellAlign); ?>"><b><?php echo(L_COL_HELP_SUB2); ?></b><br /><?php echo(L_COL_HELP_P2); ?><br /><br /><center><?php echo(COLOR_LIST); ?></center><?php echo(L_COL_HELP_P2a); ?><br /></TD></TR>
	<TR><TD ALIGN="<?php echo($CellAlign); ?>"><b><?php echo(L_COL_HELP_SUB3); ?></b><br /><u><?php echo(L_COLOR_HEAD_SETTINGS); ?></u><br />
<?php if (COLOR_FILTERS) echo("a) COLOR_FILTERS = <b>".(COLOR_FILTERS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".(COLOR_ALLOW_GUESTS == 1 ? L_ENABLED : L_DISABLED)."</b>;<br />c) COLOR_NAMES = <b>".(COLOR_NAMES == 1 ? L_ENABLED : L_DISABLED)."</b>.<br />"); ?>
<?php if (COLOR_FILTERS) echo("<u>".L_COLOR_HEAD_SETTINGSa."</u> ".L_WHOIS_ADMIN." = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, ".L_WHOIS_MODERS." = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, ".L_WHOIS_OTHERS." = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>."); else echo("<u>".L_COLOR_HEAD_SETTINGSb."</u> <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.") ?><br />
<u><?php echo(L_COL_HELP_USER_STATUS); ?></u> = <b><?php if ($CookieStatus == "a") echo("<font color=".COLOR_CA.">".L_WHOIS_ADMIN); elseif ($CookieStatus == "t") echo("<font color=".COLOR_CA.">".L_WHOIS_TOPMOD); elseif ($CookieStatus == "m") echo("<font color=".COLOR_CM.">".L_WHOIS_MODER); else echo("<font color=".COLOR_CD.">".L_WHOIS_GUEST); echo("</font>");?></b>.<br />
<?php if (COLOR_FILTERS) echo("<br />".L_COL_HELP_P3."<br />"); ?><?php echo(L_COL_HELP_P3a); ?></TD></TR>
<!-- Color Picker Text Input Box help end -->
<?php
if (C_USE_SMILIES)
{
	include("./lib/smilies.lib.php");
	$Nb = count($SmiliesTbl);
	$ResultTbl = Array();
	DisplaySmilies($ResultTbl,$SmiliesTbl,$Nb,"help");
	unset($SmiliesTbl);
	?>
	<!-- Smilies codes -->
	<TABLE BORDER=0 CELLPADDING=3 WIDTH=574 CLASS="table">
	<TR>
		<TH CLASS="tabtitle" COLSPAN=<?php echo($Nb); ?>><?php echo(L_HELP_TIT_1); ?></TH>
	</TR>
	<?php
	$i = 0;
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
	<br />
	<?php
};
?>
</TABLE>
<br /><input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;">
</CENTER>
</BODY>

</HTML>