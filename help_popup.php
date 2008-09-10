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
if ($Sender_email)
{
?>
<a href=mailto:<?php echo($Sender_email) ?> CLASS="ChatLink" Title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_OWNER)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_OWNER)); ?>.'; return true"><?php echo(C_ADMIN_NAME) ?></A>
<?php
}
else echo(C_ADMIN_NAME);
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
	<A HREF="#" onClick="cmd2Input('/!',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/!</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_7); ?></TD>
	</TR>
	<?php
	if ($CookieStatus == "a" || $CookieStatus == "t")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/announce',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/announce {<?php echo(L_HELP_MSG); ?>}</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_17); ?></TD>
	</TR>
	<?php
		};
	?>
<!-- The away command doc -->
  <TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
  <A HREF="#" onClick="cmd2Input('/away', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/away [<?php echo(L_HELP_MSG); ?>]</A></TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_21); ?></TD>
  </TR>
<!-- End away command doc -->
	<?php
	if (C_BANISH)
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/ban',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/ban <BDO dir="<?php echo($TextDir); ?>">[*]</BDO> {<?php echo(L_USER); ?>} [<?php echo(L_HELP_REASON); ?>]</A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_19); ?></TD>
		</TR>
		<?php
	};
	if ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m" || $CookieStatus == "r")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/buzz',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/buzz [<?php echo(L_HELP_BUZZ); ?>] [<?php echo(L_HELP_MSG); ?>]</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_22); ?></TD>
	</TR>
	<?php
		};
	// $Ver value is 'H' for dynamic rendering of the messages frame, 'L' or 'M' in other case
	if ($Ver == "H")
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/clear',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/clear</A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_15); ?></TD>
		</TR>
		<?php
	};
	if (MAX_ROLLS > 0)
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/dice',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/dice [n]</A> (dice v.1)</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(sprintf(L_HELP_CMD_25,MAX_ROLLS)); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/2d',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/{n1}d[n2]</A> (dice v.2)</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(sprintf(L_HELP_CMD_26,MAX_DICES,MAX_ROLLS)); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/d50',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/d{n1}[tn2]</A> (dice v.3)</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(sprintf(L_HELP_CMD_32,MAX_ROLLS)); ?></TD>
	</TR>
<?php
};
?>
<!-- The high command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/high', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/high {<?php echo(L_USER); ?>}</A></TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_27); ?></TD>
  </TR>
<!-- End high command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/ignore',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/ignore <BDO dir="<?php echo($TextDir); ?>">[-]</BDO> <?php echo("[".L_USER."[,".L_USER."...]]"); ?></A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_6); ?></TD>
	</TR>
	<!-- The img command doc -->
  <TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
  <A HREF="#" onClick="cmd2Input('/img', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/img {<?php echo(L_HELP_IMG); ?>}</A></TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_28); ?></TD>
  </TR>
<!-- End img command doc -->
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/invite',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/invite {<?php echo(L_USER); ?>}</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_18); ?></TD>
	</TR>
	<?php
	if (C_VERSION > 0)
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/join',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/join <BDO dir="<?php echo($TextDir); ?>">[n]</BDO> {#<?php echo(L_HELP_ROOM); ?>}</A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_4); ?></TD>
		</TR>
		<?php
	}
	if ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/kick',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/kick {<?php echo(L_USER); ?>} [<?php echo(L_HELP_REASON); ?>]</A><br />
	<A HREF="#" onClick="cmd2Input('/kick',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/kick {*} [<?php echo(L_HELP_REASON); ?>]</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_9); ?></TD>
	</TR>
		<?php
	}
	?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/me',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/me {<?php echo(L_HELP_MSG); ?>}</A><br />
	<A HREF="#" onClick="cmd2Input('/mr',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/mr {<?php echo(L_HELP_MSG); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_20); ?><br /><?php echo(L_HELP_CMD_30); ?></TD>
	</TR>
<?php
if (C_ENABLE_PM)
{
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/msg',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/msg <?php echo("{".L_USER."} {".L_HELP_MSG."}"); ?></A><br />
		<A HREF="#" onClick="cmd2Input('/to',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/to <?php echo("{".L_USER."} {".L_HELP_MSG."}"); ?></A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_10); ?></TD>
	</TR>
<?php
}
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/notify',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/notify</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_13); ?></TD>
	</TR>
	<?php
	if ($Ver != "H")
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/order',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/order</A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_3); ?></TD>
		</TR>
		<?php
	}
	?>
<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
<A HREF="#" onClick="cmd2Input('/profile',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/profile</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_12); ?></TD>
	</TR>
	<?php
	if ($CookieStatus == "a" || $CookieStatus == "t")
	{
		?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/promote',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/promote {<?php echo(L_USER); ?>}</A><br />
	<A HREF="#" onClick="cmd2Input('/demote',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/demote [*] {<?php echo(L_USER); ?>}</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_14); ?><br /><?php echo(L_HELP_CMD_29); ?></TD>
	</TR>
<?php
};
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/quit',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/quit [<?php echo(L_HELP_MSG); ?>]</A><br />
		<A HREF="#" onClick="cmd2Input('/exit',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/exit [<?php echo(L_HELP_MSG); ?>]</A><br />
		<A HREF="#" onClick="cmd2Input('/bye',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/bye [<?php echo(L_HELP_MSG); ?>]</A>
	</TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_5); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/refresh',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/refresh <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(($Ver == "H" ? L_HELP_CMD_2b : L_HELP_CMD_2a)); ?></TD>
	</TR>
	<?php
	if (C_SAVE)
	{
		?>
		<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
		<A HREF="#" onClick="cmd2Input('/save',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/save <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_16); ?></TD>
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
		<TD><?php echo(($Ver == "H") ? L_HELP_CMD_1b : L_HELP_CMD_1a); ?></TD>
	</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/size',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/size <BDO dir="<?php echo($TextDir); ?>">[n]</BDO></A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_33); ?></TD>
		</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/sort',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/sort</A></TH></TR>
		<TR>
			<TD WIDTH=10>&nbsp;</TD>
			<TD><?php echo(L_HELP_CMD_31); ?></TD>
		</TR>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/timestamp',false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/timestamp</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_8); ?></TD>
	</TR>
<?php
	if ($CookieStatus == "a" || $CookieStatus == "t" || $CookieStatus == "m")
	{
		?>
	<!-- The topic command doc -->
  <TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
  	<A HREF="#" onClick="cmd2Input('/topic', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/topic [*] {<?php echo(L_HELP_TOP); ?>}</A><br />
  	<A HREF="#" onClick="cmd2Input('/topic top reset', false); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/topic [*] top reset</A>
  </TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_24); ?></TD>
  </TR>
<!-- End topic command doc -->
<?php
};
?>
	<TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
	<A HREF="#" onClick="cmd2Input('/whois',true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/whois {<?php echo(L_USER); ?>}</A></TH></TR>
	<TR>
		<TD WIDTH=10>&nbsp;</TD>
		<TD><?php echo(L_HELP_CMD_11); ?></TD>
	</TR>
<!-- The wisp command doc -->
<?php
if (C_ENABLE_PM)
{
?>
  <TR><TH ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
  	<A HREF="#" onClick="cmd2Input('/wisp', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/wisp <?php echo("{".L_USER."} {".L_HELP_MSG."}"); ?></A><br />
  	<A HREF="#" onClick="cmd2Input('/whisp', true); return false" <?php echo($onMouseOver." ".$title); ?> CLASS="sender">/whisp <?php echo("{".L_USER."} {".L_HELP_MSG."}"); ?></A>
	</TH></TR>
  <TR>
    <TD WIDTH=10>&nbsp;</TD>
    <TD><?php echo(L_HELP_CMD_23); ?></TD>
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