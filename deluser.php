<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for vars posted from the form below
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/login.lib.php");
include("./lib/mail_validation.lib.php");

# Is the OS Windows or Mac or Linux
if (stristr(PHP_OS,'win')) {
  $eol="\r\n";
} elseif (stristr(PHP_OS,'mac')) {
  $eol="\r";
} else {
  $eol="\n";
}

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset={$Charset}");

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

if ($perms == "admin" || $perms == "topmod") $Msg = L_ERR_USR_12;

if (isset($FORM_SEND) && stripslashes($submit_type) == L_REG_20)
{
	$DbLink = new DB;
// Patch to send an email to the Admin after deletion of a username.
// by Ciprian using Bob Dickow's registration patch.
	if (C_ADMIN_NOTIFY)
	{
	include("./lib/get_IP.lib.php");		// Set the $IP var
	$DbLink->query("SELECT firstname,lastname,country,website,email,showemail,gender,allowpopup,picture,description,favlink,favlink1,slang FROM ".C_REG_TBL." WHERE username='$pmc_username' LIMIT 1");
	if ($DbLink->num_rows() != 0)
	{
			  list($FIRSTNAME, $LASTNAME, $COUNTRY, $WEBSITE, $EMAIL, $SHOWEMAIL, $GENDER, $ALLOWPOPUP, $PICTURE, $DESCRIPTION, $FAVLINK, $FAVLINK1, $SLANG) = $DbLink->next_record();
	}
     if (($GENDER & 3) == 1) {
       $sex = "male";
     } elseif (($GENDER & 3) == 2 ) {
       $sex = "female";
     } elseif (($GENDER & 3) == 3 ) {
       $sex = "couple";
     } else {
       $sex = "unspecified";
     }
     if ($showemail) {
       $shweml = "yes";
     } else {
       $shweml = "no";
     }
     if ($allowpopup) {
       $allpopup = "yes";
     } else {
       $allpopup = "no";
     }
	 if ($USE_GRAV) {
	   $usegrav = "yes";
	 } else {
	   $usegrav = "no";
	 }
	     $tm = getdate();
	     $dt = $tm[mon]."/".$tm[mday]."/".$tm[year];
	     $ti = sprintf("%02.u:%02.u:%02.u",$tm[hours],$tm[minutes],$tm[seconds]);
     $emailMessage = "User account deleted from "
     . ((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME) ." at ". C_CHAT_URL." :".$eol
     . "----------------------------------------------".$eol
     . "Deleted Username: ".$pmc_username.$eol
     . "----------------------------------------------".$eol
     . "Secret question: ".$SECRET_QUESTION.$eol
     . "Secret answer: ".$SECRET_ANSWER.$eol
     . "Email: ".$EMAIL.$eol
     . "First name: ".$FIRSTNAME.$eol
     . "Last name: ".$LASTNAME.$eol
     . "Gender: ".$sex.$eol
     . "Country: ".$COUNTRY.$eol
     . "WWW: ".$WEBSITE.$eol
     . "Spoken languages: ".$SLANG.$eol
     . "Description: ".$DESCRIPTION.$eol
     . "Favorite link 1: ".$FAVLINK.$eol
     . "Favorite link 2: ".$FAVLINK1.$eol
     . "Picture: ".$PICTURE.$eol
     . "Color name/text: ".$C." (".(COLOR_NAMES ? "Enabled" : "Disabled").")".$eol
     . "Display email address on public info: ".$shweml.$eol
     . "Open popups on private message: ".$allpopup.$eol
	 . "Use the Gravatar: ".$usegrav." (".(!ALLOW_GRAVATARS ? "Disabled" : "Enabled").")".$eol
	 . "----------------------------------------------".$eol
	 . "Preffered language: ".$L.$eol
     . "Deletion on: $dt $ti".$eol
     . "IP address: $IP (".gethostbyaddr($IP).")".$eol
     . "----------------------------------------------";
		$Headers = "From: ${Sender_Name} <${Sender_email}>".$eol;
		$Headers .= "X-Sender: <${Sender_email}>".$eol;
		$Headers .= "X-Mailer: PHP/".PHPVERSION.$eol;
		$Headers .= "Return-Path: <${Sender_email}>".$eol;
		$Headers .= "Date: ${mail_date}".$eol;
		$Headers .= "Mime-Version: 1.0".$eol;
		$Headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
		$Headers .= "Content-Transfer-Encoding: 8bit".$eol;
		$Subject = "User Account Deletion - ".$pmc_username." - from [".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]";
		$Subject = quote_printable($Subject,$Charset);
    @mail(C_ADMIN_EMAIL,$Subject,$emailMessage, $Headers);
// end of patch to send an email to the Admin at the time of user account deletion.
	}

	// Upload avatar mod addition - by Ciprian
	// We check and remove the uploaded avatar if exists
	$DbLink->query("SELECT avatar FROM ".C_REG_TBL." WHERE username='$pmc_username' LIMIT 1");
	if ($DbLink->num_rows() != 0)
	{
		list($AVATARURL) = $DbLink->next_record();
		$av_user_name = $pmc_username;
		if (stristr(urlencode($av_user_name), "%")) $av_user_name = "encname_".str_replace("%","_",urlencode($av_user_name));
		if (stristr($AVATARURL,C_AVA_RELPATH . "uploaded/")) @unlink(C_AVA_RELPATH . "uploaded/avatar_".$av_user_name.".gif");
	}
	// End of Upload avatar mod - by Ciprian
	$DbLink->query("DELETE FROM ".C_REG_TBL." WHERE username='$pmc_username'");
	$Msg = L_REG_21;
	$DbLink->close();
};

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(L_REG_13." - ".(C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>

<BODY>
<CENTER>
<br />
<FORM ACTION="deluser.php" METHOD="POST" AUTOCOMPLETE="" NAME="DelUsrForm">
<INPUT type="hidden" name="FORM_SEND" value="1">
<INPUT type="hidden" name="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
<INPUT type="hidden" name="pmc_password" value="<?php echo(htmlspecialchars(stripslashes($pmc_password))); ?>">
<?php
if(isset($Error))
{
	echo("<P><SPAN CLASS=\"error\">$Error</SPAN></P>");
}
?>
<INPUT TYPE="hidden" NAME="L" VALUE="<?php echo($L); ?>">
<TABLE BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<TD ALIGN="CENTER">
		<TABLE BORDER=0>
		<TR>
			<TH CLASS="tabtitle"><?php echo(L_REG_13); ?></TH>
		</TR>
		<TR>
			<TD VALIGN="TOP" ALIGN="CENTER">
				<?php echo(isset($Msg)? $Msg:L_REG_19); ?>
			</TD>
		</TR>
		</TABLE>
		<?php if (!isset($Msg)) { ?>
		<P>
		<TABLE border=0>
		<TR>
			<TD><INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_20); ?>"></TD>
			<TD><INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_22); ?>" onClick="self.close(); return false;"></TD>
		</TR>
		</TABLE>
		<?php } else { ?>
		<P>
		<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_25); ?>" onClick="self.close(); return false;">
		<?php } ?>
	</TD>
</TR>
</TABLE>
</CENTER>
</BODY>

</HTML>
<?php

?>