<?php
// Credit for the generate and e-mail password stuff goes to
// Jose' Carlos Pereira <phpHeaven@abismo.org>

// Credit for this reset password mod goes to
// Ciprian Murariu <ciprianmp@yahoo.com>

// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for post vars
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix some security holes
if (isset($L) && !is_dir("./localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
include("./lib/mail_validation.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime') && version_compare(PHP_VERSION, '5.3.0') < 0) set_magic_quotes_runtime(0);
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

$DbLink = new DB;
$field_errorU = false;
$field_errorSQ = false;
$field_errorSA = false;

// Check for valid entries
if (isset($FORM_SEND) && stripslashes($submit_type) == L_PASS_7)
{
	if (C_NO_SWEAR) include("./lib/swearing.lib.php");
	if (trim($U) == "")
	{
		$Error = L_ERR_USR_5;
	}
#	else if (ereg("[\, \']", stripslashes($U)))
	else if (preg_match("/[ |,|'|\\\\]/", $U))
	{
		$Error = L_ERR_USR_16a;
		$field_errorU = true;
		if (preg_match("/['|\\\\]/", $SECRET_ANSWER)) $field_errorSA = true;
	}
	else if(C_NO_SWEAR && checkwords($U, true, $Charset))
	{
		$Error = L_ERR_USR_18;
		$field_errorU = true;
	}
	else if (trim($EMAIL) == "")
	{
		$Error = L_ERR_USR_7;
	}
//	else if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)$", $EMAIL))
	// Added the new top-level domains (mail, asia, travel, aso)
#	else if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](avel|bi|bs|fo|g|ia|l|m|me|mes|o|op|pa|ro|seum|t|to|u|v|z)?)$", $EMAIL))
	else if (!preg_match("/^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](avel|bi|bs|fo|g|ia|l|m|me|mes|o|op|pa|ro|seum|t|to|u|v|z)?)$/i", $EMAIL))
	{
		$Error = L_ERR_USR_8;
	}
	else if ((C_EMAIL_PASWD && !checkdnsrr('www.w3.org', 'ANY')) && !checkdnsrr(substr(strstr($EMAIL,'@'),1), 'ANY'))
	{
		$Error = L_ERR_USR_8;
	}
	else if ($SECRET_QUESTION == "" || $SECRET_QUESTION == 0 || $SECRET_ANSWER == "")
	{
		$Error = L_ERR_PASS_5;
		if ($SECRET_QUESTION == "" || $SECRET_QUESTION == 0) $field_errorSQ = true;
		if ($SECRET_ANSWER == "") $field_errorSA = true;
	}
	else if (preg_match("/['|\\\\]/", $SECRET_ANSWER))
	{
		$Error = L_ERR_USR_16a;
		$field_errorSA = true;
	}
	else
	{
		$DbLink->query("SELECT email,s_question,s_answer FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
		if ($DbLink->num_rows() != 0)
		{
			list($pmc_EMAIL,$pmc_SECRET_QUESTION,$pmc_SECRET_ANSWER) = $DbLink->next_record();
			if ($pmc_SECRET_QUESTION == 0 || $pmc_SECRET_ANSWER == "")
			{
				$Error = L_ERR_PASS_6;
				if ($pmc_SECRET_QUESTION == 0) $field_errorSQ = true;
				if ($pmc_SECRET_ANSWER == "") $field_errorSA = true;
			}
			else if ($EMAIL != $pmc_EMAIL)
			{
				$Error = L_ERR_PASS_2;
			}
			else if ($SECRET_QUESTION != $pmc_SECRET_QUESTION)
			{
				$Error = L_ERR_PASS_3;
				$field_errorSQ = true;
				$SECRET_QUESTION = $pmc_SECRET_QUESTION;
			}
			else if ($SECRET_ANSWER != $pmc_SECRET_ANSWER)
			{
				$Error = L_ERR_PASS_4;
				$field_errorSA = true;
			}
			else
			{
				$DbLink->clean_results();
				$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$U'");
				list($rows) = $DbLink->next_record();
				if ($rows != 0)
				{
					$Latin1 = ($Charset != "utf-8");
					include("./lib/get_IP.lib.php");		// Set the $IP var

					$pmc_password = gen_password();
					$PWD_Hash = md5(stripslashes($pmc_password));
					// Send e-mail
					$send = send_email(L_PASS_9." [".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]", L_SET_2, L_REG_1, L_PASS_11, 1);
					if (!$send) $Error = sprintf(L_EMAIL_VAL_Err,$Sender_email,$Sender_email);
					if (!isset($Error) || $Error == "")
					{
						$DbLink->clean_results();
						$DbLink->query("UPDATE ".C_REG_TBL." SET password='$PWD_Hash', ip='$IP' WHERE username='$U' AND email='$EMAIL' AND s_question='$SECRET_QUESTION' AND s_answer='$SECRET_ANSWER'");
						$Message = L_PASS_8."<br />".sprintf(L_PASS_10,$pmc_password);
					};
				}
			}
		}
		else
		{
			$Error = L_ERR_PASS_1;
		}
	}
}

$DbLink->close();

// Password has reset successfully ?
$done = (isset($Message) && $Message != "");

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(L_PASS_0." - ". APP_NAME) ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
// Insert login and password in fields of the starter page form
function LoginToIndex()
{
	<?php
	if ($done)
	{
	?>
	var passform = document.forms['PassParams'];
	var windowHandle = window.open('','login');
	windowHandle.document.forms['Params'].elements['U'].value = passform.elements['U'].value;
	windowHandle.document.forms['Params'].elements['pmc_password'].value = "<?php echo($pmc_password); ?>";
	<?php
	};
	?>
};

// Put focus to the username field of the form at the starter page
function get_focus()
{
	var username = "<?php echo(stripslashes($pmc_username)); ?>";
	window.focus();
	if (username != "")
	{
		document.forms['PassParams'].elements['U'].value=username;
		document.forms['PassParams'].elements['EMAIL'].focus();
	}
	else
	{
		document.forms['PassParams'].elements['U'].focus();
	}
}
// -->
</SCRIPT>
</HEAD>

<BODY onLoad="if (window.focus) get_focus();">
<CENTER>
<br />
<FORM ACTION="pass_reset.php" METHOD="POST" AUTOCOMPLETE="ON" NAME="PassParams">
<P></P>
<?php
if(isset($Error))
{
	echo("<P><SPAN CLASS=\"error\">$Error</SPAN></P>");
}
?>
<INPUT TYPE="hidden" NAME="FORM_SEND" VALUE="1">
<INPUT TYPE="hidden" NAME="L" VALUE="<?php echo($L); ?>">
<TABLE ALIGN="center" BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<TD ALIGN="CENTER">
		<TABLE BORDER=0>
		<TR>
			<TH COLSPAN=2 CLASS="tabtitle"><?php echo($done ? $Message : L_PASS_0); ?></TH>
		</TR>
		<TR>
			<TH COLSPAN=2><?php if (!$done) echo(L_REG_37); else echo(L_EMAIL_VAL_Done); ?></TH>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="U" SIZE=15 MAXLENGTH=15<?php echo($field_errorU ? " style=\"background-color: #FF0000;\"" : ""); ?> VALUE="<?php echo(isset($pmc_username) ? stripslashes($pmc_username) : $U); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS=error>*</SPAN><?php }; ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_8); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="EMAIL" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($EMAIL)) echo(stripslashes($EMAIL)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS="error">*</SPAN><?php }; ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PASS_1); ?> :</TD>
			<TD VALIGN="TOP">
				<SELECT name="SECRET_QUESTION"<?php echo($field_errorSQ ? " style=\"background-color: #FF0000;\"" : ""); ?>>
				<OPTION value="0"<?php echo($field_errorSQ ? " style=\"background-color: #FF0000;\"" : ""); ?> <?php if ($SECRET_QUESTION==0 || $SECRET_QUESTION=="") echo ("selected=\"selected\"")?>><?php echo(L_PASS_12)?></OPTION>
				<OPTION value="1" <?php if ($SECRET_QUESTION==1) echo ("selected=\"selected\"")?>><?php echo(L_PASS_2)?></OPTION>
				<OPTION value="2" <?php if ($SECRET_QUESTION==2) echo ("selected=\"selected\"")?>><?php echo(L_PASS_3)?></OPTION>
				<OPTION value="3" <?php if ($SECRET_QUESTION==3) echo ("selected=\"selected\"")?>><?php echo(L_PASS_4)?></OPTION>
				<OPTION value="4" <?php if ($SECRET_QUESTION==4) echo ("selected=\"selected\"")?>><?php echo(L_PASS_5)?></OPTION>
				</SELECT>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PASS_6); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="SECRET_ANSWER" SIZE=25 MAXLENGTH=15<?php echo($field_errorSA ? " style=\"background-color: #FF0000;\"" : ""); ?> VALUE="<?php if (isset($SECRET_ANSWER)) echo(stripslashes(htmlspecialchars($SECRET_ANSWER, ENT_NOQUOTES, 'UTF-8'))); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		</TABLE>
		<P>
		<?php
		if (!$done)
		{
			?>
			<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PASS_7); ?>">
			<?php
		}
		?>
		<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_25); ?>" onClick="LoginToIndex(); self.close(); return false;">
	</TD>
</TR>
</TABLE>
</FORM>
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2007<?php echo((date('Y')>"2007") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
</P>
</BODY>
</HTML>
<?php
?>