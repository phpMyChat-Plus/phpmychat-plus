<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for vars posted from the form bellow
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (isset($_COOKIE["CookieStatus"])) $status = $_COOKIE["CookieStatus"];

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/login.lib.php");

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

$DbLink = new DB;

// Check for valid entries if the form have been sent
if (isset($FORM_SEND) && stripslashes($submit_type) == L_REG_16)
{
	if (C_NO_SWEAR) include("./lib/swearing.lib.php");
	if (trim($U) == "")
	{
		$Error = L_ERR_USR_5;
	}
	else if (ereg(REG_CHARS_ALLOWED, stripslashes($U)))
	{
		$Error = L_ERR_USR_16a;
	}
	else if(C_NO_SWEAR && checkwords($U, true))
	{
		$Error = L_ERR_USR_18;
	}
	else if ($prev_PASSWORD == "")
	{
		$Error = L_ERR_USR_6;
	}
	else if (C_REQUIRE_NAMES && (trim($FIRSTNAME) == "" || trim($LASTNAME) == ""))
	{
		$Error = L_ERR_USR_15;
	}
	else if (trim($EMAIL) == "")
	{
		$Error = L_ERR_USR_7;
	}
	else if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)$", $EMAIL))
	{
		$Error = L_ERR_USR_8;
	}
	else if ($U != $pmc_username)
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$U'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0) $Error = L_ERR_USR_9;
	}
	else if (COLOR_NAMES && COLOR_FILTERS && (strcasecmp($COLORNAME, COLOR_CA) == 0 || strcasecmp($COLORNAME, COLOR_CA1) == 0 || strcasecmp($COLORNAME, COLOR_CA2) == 0) && $COLORNAME != "" && $status != "a")
	{
		$Error = L_ERR_USR_25;
	}
	else if (COLOR_NAMES && COLOR_FILTERS && (strcasecmp($COLORNAME, COLOR_CM) == 0 || strcasecmp($COLORNAME, COLOR_CM1) == 0 || strcasecmp($COLORNAME, COLOR_CM2) == 0) && $COLORNAME != "" && $status != "a" && $status != "m")
	{
		$Error = L_ERR_USR_26;
	}
	else	if ($SECRET_QUESTION == "" || $SECRET_ANSWER == "")
	{
		$Error = L_ERR_PASS_5;
	}

	if (!isset($Error))
	{
		$Latin1 = ($Charset == "utf-8");
		$PWD_Hash = md5(stripslashes($prev_PASSWORD));
		if (!isset($GENDER)) $GENDER = "";
		$showemail = (isset($SHOWEMAIL) && $SHOWEMAIL)? 1:0;
		$allowpopup = (isset($ALLOWPOPUP) && $ALLOWPOPUP)? 1:0;
		if (isset($COLORNAME))
		{
			$C = $COLORNAME;
			setcookie("CookieColor", $C, time() + 60*60*24*365);        // cookie expires in one year
		}
		include("./lib/get_IP.lib.php");		// Set the $IP var
    {
			$DbLink->query("UPDATE ".C_REG_TBL." SET username='$U', latin1='$Latin1', password='$PWD_Hash', firstname='$FIRSTNAME', lastname='$LASTNAME', country='$COUNTRY', website='$WEBSITE', email='$EMAIL', showemail=$showemail, allowpopup=$allowpopup, reg_time=".time().", ip='$IP', gender='$GENDER', picture='$PICTURE', description='$DESCRIPTION', favlink='$FAVLINK', favlink1='$FAVLINK1', slang='$SLANG', colorname='$COLORNAME', avatar='$AVATARURL', s_question='$SECRET_QUESTION', s_answer='$SECRET_ANSWER' WHERE username='$pmc_username'");
// Patch to send an email to the User after changing username or password.
// by Ciprian using Bob Dickow's registration patch.
	if (($pmc_username != $U) || ($pmc_password != $prev_PASSWORD))
	{
		include("./lib/mail_validation.lib.php");
	     if (($GENDER & 3) == 1) {
	       $sex = " male";
	     } elseif (($GENDER & 3) == 2 ) {
	       $sex = " female";
	     } else {
	       $sex = " unspecified";
	     }
	     if ($showemail) {
	       $shweml = " yes";
	     } else {
	       $shweml = " no";
	     }
	     $tm = getdate();
	     $dt = $tm[mon]."/".$tm[mday]."/".$tm[year];
	     $tm = sprintf("%02.u:%02.u:%02.u",$tm[hours],$tm[minutes],$tm[seconds]);

		if 	($SECRET_QUESTION==0) $secret_question = L_PASS_12; 
		if 	($SECRET_QUESTION==1) $secret_question = L_PASS_2; 
		if 	($SECRET_QUESTION==2) $secret_question = L_PASS_3; 
		if 	($SECRET_QUESTION==3) $secret_question = L_PASS_4; 
		if 	($SECRET_QUESTION==4) $secret_question = L_PASS_5; 

		if (C_EMAIL_USER)
		{
	     $emailMessage = "You have just changed important account info for "
     . APP_NAME ." at ". C_CHAT_URL." : (account affected: ".stripslashes($pmc_username).")\n\n"
	     . "Here is your updated account info:\n\n"
	     . "----------------------------------------------\n"
	     . "New Username: ".stripslashes($U)."\n"
		  . "New Password: ".stripslashes($prev_PASSWORD)."\n"
	     . "----------------------------------------------\n\n"
	     . "Secret question: ".stripslashes($secret_question)."\n"
	     . "Secret answer: ".stripslashes($SECRET_ANSWER)."\n"
	     . "Email: $EMAIL\n"
	     . "First name: ".stripslashes($FIRSTNAME)."\n"
	     . "Last name: ".stripslashes($LASTNAME)."\n"
	     . "Gender: $sex\n"
	     . "Country: ".stripslashes($COUNTRY)."\n"
	     . "WWW: ".stripslashes($WEBSITE)."\n"
	     . "Display email address: $shweml\n"
	     . "Spoken languages: ".stripslashes($SLANG)."\n"
	     . "Description: ".stripslashes($DESCRIPTION)."\n"
	     . "Favorite link 1: ".stripslashes($FAVLINK)."\n"
	     . "Favorite link 2: ".stripslashes($FAVLINK1)."\n"
	     . "Picture: ".stripslashes($PICTURE)."\n"
     . "Color name/text: ".stripslashes($C)."\n"
	     . "Date of update: $dt\n"
	     . "Time of update: $tm\n"
	     . "----------------------------------------------\n"
	     . "Please save this email for your usage.\n"
	     . "Enjoy!";

		$Headers = "From: ${Sender_Name} <${Sender_email}> \r\n";
		$Headers .= "X-Sender: <${Sender_email}> \r\n";
		$Headers .= "X-Mailer: PHP/".phpversion()." \r\n";
		$Headers .= "Return-Path: <${Sender_email}> \r\n";
		$Headers .= "Date: ${mail_date} \r\n";
		$Headers .= "Mime-Version: 1.0 \r\n";
		$Headers .= "Content-Type: text/plain; charset=${Charset} \r\n";
		$Headers .= "Content-Transfer-Encoding: 8bit \r\n";
	     mail($EMAIL,"[".APP_NAME."] "
	     . "Your -".stripslashes($pmc_username)."- account updated details", $emailMessage, $Headers);
	   };

		if (C_ADMIN_NOTIFY && (C_ADMIN_EMAIL != ""))
		{
	     $emailMessage = stripslashes($pmc_username)." has just changed his/her important account info for "
     . APP_NAME ." at ". C_CHAT_URL." :\n\n"
	     . "Here is the updated account info for ".stripslashes($pmc_username).":\n\n"
	     . "----------------------------------------------\n"
	     . "New Username: ".stripslashes($U)."\n"
#		  . "New Password: ".stripslashes($prev_PASSWORD)."\n\n"
		  . "New Password: (Not enabled by default for privacy concerns!)\n"
	     . "----------------------------------------------\n\n"
#	     . "Secret question: ".stripslashes($secret_question)."\n"
#	     . "Secret answer: ".stripslashes($SECRET_ANSWER)."\n"
	     . "Secret question: (Not enabled by default for privacy concerns!)\n"
	     . "Secret answer: (Not enabled by default for privacy concerns!)\n"
	     . "Email: $EMAIL\n"
	     . "First name: ".stripslashes($FIRSTNAME)."\n"
	     . "Last name: ".stripslashes($LASTNAME)."\n"
	     . "Gender: $sex\n"
	     . "Country: ".stripslashes($COUNTRY)."\n"
	     . "WWW: ".stripslashes($WEBSITE)."\n"
	     . "Display email address: $shweml\n"
	     . "Spoken languages: ".stripslashes($SLANG)."\n"
	     . "Description: ".stripslashes($DESCRIPTION)."\n"
	     . "Favorite link 1: ".stripslashes($FAVLINK)."\n"
	     . "Favorite link 2: ".stripslashes($FAVLINK1)."\n"
	     . "Picture: ".stripslashes($PICTURE)."\n"
     . "Color name/text: ".stripslashes($C)."\n"
	     . "Date of update: $dt\n"
	     . "Time of update: $tm\n"
	     . "IP address: $IP (".gethostbyaddr($IP).")\n"
	     . "----------------------------------------------\n"
	     . "Please save this email for your usage.\n"
	     . "Enjoy!";
		$Headers = "From: ${Sender_Name} <${Sender_email}> \r\n";
		$Headers .= "X-Sender: <${Sender_email}> \r\n";
		$Headers .= "X-Mailer: PHP/".phpversion()." \r\n";
		$Headers .= "Return-Path: <${Sender_email}> \r\n";
		$Headers .= "Date: ${mail_date} \r\n";
		$Headers .= "Mime-Version: 1.0 \r\n";
		$Headers .= "Content-Type: text/plain; charset=${Charset} \r\n";
		$Headers .= "Content-Transfer-Encoding: 8bit \r\n";

		  mail(C_ADMIN_EMAIL,"[".APP_NAME."] "
		  . "-".stripslashes($U)."- account updated details", $emailMessage, $Headers);
		};
  };
// End of patch to send an email to the User after registration.
		}
		if ($pmc_username != $U) $pmc_username = $U;
		if ($pmc_password != $prev_PASSWORD) $pmc_password = $prev_PASSWORD;
		$Message = L_REG_17;
	}
}
// Else initialize var that will be displayed in the form
else
{
	$U = $pmc_username;
	$prev_PASSWORD = $pmc_password;
	$DbLink->query("SELECT firstname,lastname,country,website,email,showemail,gender,allowpopup,picture,description,favlink,favlink1,slang,colorname,avatar,s_question,s_answer FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	if ($DbLink->num_rows() != 0)
	{
			  list($FIRSTNAME, $LASTNAME, $COUNTRY, $WEBSITE, $EMAIL, $SHOWEMAIL, $GENDER, $ALLOWPOPUP, $PICTURE, $DESCRIPTION, $FAVLINK, $FAVLINK1, $SLANG, $COLORNAME, $AVATARURL, $SECRET_QUESTION, $SECRET_ANSWER) = $DbLink->next_record();
               if (!isset($ORIGAVATAR)) $ORIGAVATAR = $AVATARURL;
               if (!empty($avatar))
               {
                 $AVATARURL = $avatar;
               }
               elseif (!empty($url))
               {
               		$AVATARURL = $url;
               }
               if (empty($AVATARURL))
               {
               $AVATARURL = C_AVA_RELPATH . C_DEF_AVATAR;
               }
	}
	$DbLink->clean_results();
}

$DbLink->close();

// Modifications have been done ?
$done = (isset($Message) && $Message == L_REG_17);

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(APP_NAME); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
// Put the focus to the message box if the window has been called with the profile command
function put_focus()
{
	if (window.opener.window.document.title == "Hidden Input frame")
		targetFrame = window.opener.window.parent.frames['input'].window;
	else
		targetFrame = window.opener.window;

	with (targetFrame)
	{
		focus();
		if (document.forms['MsgForm'] && document.forms['MsgForm'].elements['M'])
			document.forms['MsgForm'].elements['M'].focus();
	};
}
// -->
</SCRIPT>
</HEAD>

<BODY>
<CENTER>
<br />
<FORM ACTION="edituser.php" METHOD="POST" AUTOCOMPLETE="" NAME="EditUsrForm">
<INPUT type="hidden" name="AVATARURL" value="<? echo($AVATARURL);?>">
<INPUT type="hidden" name="FORM_SEND" value="1">
<INPUT type="hidden" name="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
<INPUT type="hidden" name="pmc_password" value="<?php echo(htmlspecialchars(stripslashes($pmc_password))); ?>">
<P></P>
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
			<TH COLSPAN=2 CLASS="tabtitle"><?php echo($done ? $Message : L_REG_34); ?></TH>
		</TR>
		<TR>
			<TH COLSPAN=2><?php if (!$done) echo(L_REG_37); ?></TH>
		</TR>
		<TR><TD>&nbsp;</TD></TR>
		<TR>
<!-- Avatar System Start -->
                        <?php
                        if (C_USE_AVATARS) {
                        ?>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_17); ?> :</TD>
 			<TD VALIGN="TOP">
                           <?php
                          if ($FORM_SEND != 1) {

                            ?>
			            <a href="avatar.php?User=<?php echo($pmc_username);?>&LIMIT=<?php echo($LIMIT); ?>&L=<?php echo($L); ?>&avatar=<?php echo($AVATARURL); ?>&ORIGAVATAR=<?php echo($ORIGAVATAR); ?>&From=edituser.php&pmc_password=<?php echo($pmc_password);?>" onMouseOver="window.status='<?php echo(L_SEL_NEW_AV) ?>.'; return true;" title="<?php echo(L_SEL_NEW_AV); ?>" target="_self">
                      	            <img src="<?php echo($AVATARURL); ?>" align="center" border="0" width="<?php echo(C_AVA_WIDTH);?>" height="<?php echo(C_AVA_HEIGHT);?>" alt="<?php echo(L_SEL_NEW_AV); ?>"></a>&nbsp;
                            <?php
                            } else {
                            ?>
        			    <img src="<?php echo($AVATARURL); ?>" align="center" border="0" width="<?php echo(C_AVA_WIDTH);?>" height="<?php echo(C_AVA_HEIGHT);?>" alt="<?php echo(L_SEL_NEW_AV) ?>">&nbsp;
                            <?php
                            }
                            ?>
                            </a>
			</TD>
		</TR>
                        <?php
                        }
                        ?>
<!-- Avatar System End  -->
		<TR>
		  <TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_2); ?> :</TD>
			<TD VALIGN="TOP">
				<!-- Nick can not be modified via the profile command -->
				<INPUT TYPE="text" NAME="U" SIZE=15 MAXLENGTH=15 VALUE="<?php echo(htmlspecialchars(stripslashes($U))); ?>"<?php if ($done) echo(" READONLY"); if (isset($LIMIT) && $LIMIT) echo(" DISABLED"); ?>>
				<?php
				if (isset($LIMIT) && $LIMIT)
				{
					?>
					<INPUT TYPE="hidden" NAME="U" VALUE="<?php echo(htmlspecialchars(stripslashes($U))); ?>">
					<?php
				};
				if (!$done)
				{
					?>
					<SPAN CLASS="error">*</SPAN>
					<?php
				};
				?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :</TD>
			<TD VALIGN="TOP">
				<!-- Password can not be modified via the profile command -->
				<INPUT TYPE="password" NAME="prev_PASSWORD" AUTOCOMPLETE="OFF" SIZE=15 MAXLENGTH=15 VALUE="<?php echo(htmlspecialchars(stripslashes($prev_PASSWORD))); ?>"<?php if ($done) echo(" READONLY"); if (isset($LIMIT) && $LIMIT) echo(" DISABLED"); ?>>
				<?php
				if (isset($LIMIT) && $LIMIT)
				{
					?>
					<INPUT TYPE="hidden" NAME="prev_PASSWORD" VALUE="<?php echo(htmlspecialchars(stripslashes($prev_PASSWORD))); ?>">
					<?php
				};
				if (!$done)
				{
					?>
					<SPAN CLASS="error">*</SPAN>
					<?php
				};
				?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_8); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="EMAIL" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($EMAIL)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS="error">*</SPAN><?php }; ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PASS_1); ?> :</TD>
			<TD VALIGN="TOP">
				<SELECT name="SECRET_QUESTION">
				<OPTION value="0" <?php if ($SECRET_QUESTION==0 || $SECRET_QUESTION=="") echo ("selected=\"selected\"")?>><?php echo(L_PASS_12)?></OPTION>
				<OPTION value="1" <?php if ($SECRET_QUESTION==1) echo ("selected=\"selected\"")?>><?php echo(L_PASS_2)?></OPTION>
				<OPTION value="2" <?php if ($SECRET_QUESTION==2) echo ("selected=\"selected\"")?>><?php echo(L_PASS_3)?></OPTION>
				<OPTION value="3" <?php if ($SECRET_QUESTION==3) echo ("selected=\"selected\"")?>><?php echo(L_PASS_4)?></OPTION>
				<OPTION value="4" <?php if ($SECRET_QUESTION==4) echo ("selected=\"selected\"")?>><?php echo(L_PASS_5)?></OPTION>
				</SELECT>
				<?php if (!$done) { ?><SPAN CLASS="error">*</SPAN><?php }; ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PASS_6); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="SECRET_ANSWER" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($SECRET_ANSWER)) echo(stripslashes($SECRET_ANSWER)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS="error">*</SPAN><?php }; ?>
			</TD>
		</TR>
<?php
if (C_REQUIRE_NAMES)
{
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_30); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($FIRSTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS="error">*</SPAN><?php }; ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($LASTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS="error">*</SPAN><?php }; ?>
			</TD>
		</TR>
<?php
}
else
{
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_30); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($FIRSTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($LASTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
<?php
};
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_45); ?> :</TD>
			<TD VALIGN="TOP">
				<SELECT name="GENDER">
				<OPTION value="1" <?php if ($GENDER==1) echo ("selected=\"selected\"")?>><?php echo(L_REG_46)?></OPTION>
				<OPTION value="2" <?php if ($GENDER==2) echo ("selected=\"selected\"")?>><?php echo(L_REG_47)?></OPTION>
				<OPTION value="0" <?php if ($GENDER==0 || $GENDER=="") echo ("selected=\"selected\"")?>><?php echo(L_REG_48)?></OPTION>
				</SELECT>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOWEMAIL" value="1" <?php if(isset($SHOWEMAIL) && $SHOWEMAIL) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>
				&nbsp;<?php echo(L_REG_33); ?>
			</TD>
		</TR>
<?php
if (C_PRIV_POPUP == 1)
{
?>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="ALLOWPOPUP" value="1" <?php if(isset($ALLOWPOPUP) && $ALLOWPOPUP) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>
				&nbsp;<?php echo(L_REG_POPUP); ?>
			</TD>
		</TR>
<?php
}
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_36); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="COUNTRY" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($COUNTRY)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_32); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="WEBSITE" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($WEBSITE)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_1); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="SLANG" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($SLANG)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK" SIZE=25 MAXLENGTH=255 VALUE="<?php echo(stripslashes($FAVLINK)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_3); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK1" SIZE=25 MAXLENGTH=255 VALUE="<?php echo(stripslashes($FAVLINK1)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_4); ?> :</TD>
			<TD VALIGN="TOP">
				<TEXTAREA NAME="DESCRIPTION" COLS=27 ROWS=5 WRAP=ON<?php if ($done) echo(" READONLY"); ?>><?php echo(stripslashes($DESCRIPTION)); ?></TEXTAREA>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_5); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="PICTURE" SIZE=25 MAXLENGTH=255 VALUE="<?php echo(stripslashes($PICTURE)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
<?php
if (COLOR_NAME)
{
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_6); ?> :</TD>
			<TD VALIGN="TOP">
<?php
// Color Input Select mod by Alexander Eisele <xaex@xeax.de> & Ciprian
// Drop down list of colors
$ColorList = COLORLIST;
if (COLOR_FILTERS)
{
	if ($status != "a" && $status != "m")
	{
		if (COLOR_CA != "") $ColorList = eregi_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = eregi_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = eregi_replace('"'.COLOR_CA2.'",', "", $ColorList);
		if (COLOR_CM != "") $ColorList = eregi_replace('"'.COLOR_CM.'",', "", $ColorList);
		if (COLOR_CM1 != "") $ColorList = eregi_replace('"'.COLOR_CM1.'",', "", $ColorList);
		if (COLOR_CM2 != "") $ColorList = eregi_replace('"'.COLOR_CM2.'",', "", $ColorList);
	}
	elseif ($status == "m")
	{
		if (COLOR_CA != "") $ColorList = eregi_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = eregi_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = eregi_replace('"'.COLOR_CA2.'",', "", $ColorList);
	}
}
$ColorList = eregi_replace('"', "", $ColorList);
$CC = explode(",", $ColorList);
			echo("<SELECT NAME=\"COLORNAME\">\n");
			while(list($ColorNumber1, $ColorCode) = each($CC))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:".COLOR_CD."\" VALUE=\"".$ColorCode."\"");
				if ($COLORNAME == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "" && $ColorCode != $COLORNAME && $ColorCode != COLOR_CA && $ColorCode != COLOR_CM) echo(">".$ColorCode."</OPTION>");
				elseif ($ColorCode == $COLORNAME && $ColorCode != "") echo(">".$ColorCode." (selected)</OPTION>");
				elseif ($ColorCode == COLOR_CA) echo(COLOR_FILTERS ? ">".$ColorCode." (admin's)</OPTION>" : ">".$ColorCode."</OPTION>");
				elseif ($ColorCode == COLOR_CM) echo(COLOR_FILTERS ? ">".$ColorCode." (moder's)</OPTION>" : ">".$ColorCode."</OPTION>");
				elseif ($ColorCode == "") echo(">Null (not selected)</OPTION>");
			}
			echo("\n</SELECT>&nbsp;\n");
?>
			</TD>
		</TR>
<?php
}
?>
		</TABLE>
		<P>
		<?php
		if (!$done)
		{
			?>
			<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_16); ?>">
			<?php
		}
		?>
		<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_25); ?>" onClick="if (window.opener && !window.opener.closed) put_focus(); self.close(); return false;">
	</TD>
</TR>
</TABLE>
</FORM>
</CENTER>
</BODY>
</HTML>
<?php

?>