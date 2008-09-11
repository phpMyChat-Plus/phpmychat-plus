<?php
if (is_array($_SESSION)) { }
else
{
	ini_set('session.bug_compat_42',0);
	ini_set('session.bug_compat_warn',0);
	ini_set('session.use_trans_sid',1);
	ini_set('session.use_cookies',1);
	session_start();
	session_register("adminlogged");
}

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);
require("./config/config.lib.php");

$DbLink4Login = new DB;

if ((isset($pmc_username) && $pmc_username != "") && (isset($pmc_password) && $pmc_password != ""))
{
	// Ensure the password is a correct one
	$do_not_login = false;
	$DbLink4Login->query("SELECT password,perms FROM ".C_REG_TBL." WHERE username='$pmc_username' LIMIT 1");
	if ($DbLink4Login->num_rows() != 0)
	{
		list($PWD_Hash, $perms) = $DbLink4Login->next_record();
		if ($PWD_Hash == md5($pmc_password) || $PWD_Hash == $pmc_password)
		{
			// Ensure the one who lauch the admin.php script is really admin
			if (isset($MUST_BE_ADMIN) && $perms != "admin")
			{
				$Error = L_ERR_USR_11;
			}
			else
			{
				$do_not_login = true;
				$_SESSION["adminlogged"] = "1";
			}
		}
	}
	else if (isset($perms))
	{
		unset($perms);
	}
	$DbLink4Login->clean_results();
	$DbLink4Login->close();
}

// If no login yet entered
if (!isset($do_not_login) || !$do_not_login)
{

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
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

if (isset($login_form))
{
	if (!isset($Error)) $Error = L_ERR_USR_10;
	unset($pmc_password);
	unset($pmc_username);
					$LIMIT = 0;
}

// If this script is lauch by a profile command, put focus to the password field
$Focus = ((isset($LIMIT) && $LIMIT) || (isset($FOCUS) && $FOCUS)) ? "pmc_password" : "pmc_username";

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.1">
<!--
function get_focus()
{
	window.focus();
	document.forms['LoginForm'].elements['<?php echo($Focus); ?>'].focus();
}
// -->

	// Open popups for registration stuff
	function reg_popup(name)
	{
		window.focus();
		url = "<?php echo($ChatPath); ?>" + name + ".php?L=<?php echo($L); ?>&Link=1";
		pop_width = 450;
		pop_height = 260;
		param = "width=" + pop_width + ",height=" + pop_height + ",resizable=yes,scrollbars=yes";
		name += "_popup";
		window.open(url,name,param);
	}
</SCRIPT>
</HEAD>

<BODY onLoad="if (window.focus) get_focus();">
<CENTER>
<br />
<?php
// Get the name of the script that called the login library
if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER["PHP_SELF"];
$From = basename($PHP_SELF);
?>
<FORM ACTION="<?php echo($From); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="LoginForm">
<P></P>
<?php
if(isset($Error))
{
	echo("<P><SPAN CLASS=\"error\">$Error</SPAN></P>");
}
?>
<INPUT TYPE="hidden" NAME="L" VALUE="<?php echo($L); ?>">
<INPUT TYPE="hidden" NAME="Link" VALUE="<?php if (isset($Link)) echo($Link); ?>">
<INPUT TYPE="hidden" NAME="LIMIT" VALUE="<?php if (isset($LIMIT)) echo($LIMIT); ?>">
<TABLE ALIGN="center" BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<TD ALIGN="CENTER">
		<TABLE BORDER=0>
		<TR>
			<TH COLSPAN=2 CLASS="tabtitle"><?php echo(L_REG_14); ?></TH>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="pmc_username" SIZE=11 MAXLENGTH=15 VALUE="<?php if (isset($pmc_username)) echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :	</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="password" NAME="pmc_password" SIZE=11 MAXLENGTH=16 VALUE="<?php if (isset($pmc_password)) echo(htmlspecialchars(stripslashes($pmc_password))); ?>">
				</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"></TD>
			<TD VALIGN="TOP">
			<A HREF="<?php echo($ChatPath); ?>pass_reset.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('pass_reset'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_PASS_7); ?>.'; return true;"><?php echo(L_PASS_7); ?></A>
				</TD>
		</TR>
		</TABLE>
		<P>
		<INPUT TYPE="submit" NAME="login_form" VALUE="<?php echo(L_REG_15); ?>">
	</TD>
</TR>
</TABLE>
</FORM>
</CENTER>
</BODY>

</HTML>
<?php
exit;

} // if(!isset($do_not_login))
?>