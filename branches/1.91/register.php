<?php
// Credit for the generate and e-mail password stuff goes to
// Jose' Carlos Pereira <phpHeaven@abismo.org>

// Get the names and values for vars sent by index.lib.php
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Get the names and values for post vars
if (isset($HTTP_POST_VARS))
{
	while(list($name,$value) = each($HTTP_POST_VARS))
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

// Check for valid entries
if (isset($FORM_SEND) && stripslashes($submit_type) == L_REG_3)
{
	if (C_NO_SWEAR == 1) include("./lib/swearing.lib.php");
	if (trim($U) == "")
	{
		$Error = L_ERR_USR_5;
	}
	else if (ereg(REG_CHARS_ALLOWED, stripslashes($U)))
	{
		$Error = L_ERR_USR_16a;
	}
	else if(C_NO_SWEAR == 1 && checkwords($U, true))
	{
		$Error = L_ERR_USR_18;
	}
	else if (!C_EMAIL_PASWD && $pmc_password == "")
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
	else if ((C_EMAIL_PASWD && !checkdnsrr('www.w3.org', 'ANY')) && !checkdnsrr(substr(strstr($EMAIL,'@'),1), 'ANY'))
	{
		$Error = L_ERR_USR_8;
	}
	else if (COLOR_NAMES && COLOR_FILTERS && (strcasecmp($COLORNAME, COLOR_CA) == 0 || strcasecmp($COLORNAME, COLOR_CA1) == 0 || strcasecmp($COLORNAME, COLOR_CA2) == 0) && $COLORNAME != "" && $status != "a")
	{
		$Error = L_ERR_USR_25;
	}
	else if (COLOR_NAMES && COLOR_FILTERS && (strcasecmp($COLORNAME, COLOR_CM) == 0 || strcasecmp($COLORNAME, COLOR_CM1) == 0 || strcasecmp($COLORNAME, COLOR_CM2) == 0) && $COLORNAME != "" && $status != "a" && $status != "m")
	{
		$Error = L_ERR_USR_26;
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$U'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0)
		{
			$Error = L_ERR_USR_9;
		}
		else
		{
			$Latin1 = ($Charset == "iso-8859-1");
			if (!isset($GENDER)) $GENDER = "";
			$showemail = (isset($SHOWEMAIL) && $SHOWEMAIL)? 1:0;
			$allowpopup = 1;
			include("./lib/get_IP.lib.php");		// Set the $IP var

			if (C_EMAIL_PASWD)		// Define the password
			{
				include("./lib/mail_validation.lib.php");
				$pmc_password = gen_password(C_EMAIL_PASWD);
			};
			$PWD_Hash = md5(stripslashes($pmc_password));
			// Send e-mail
			if (C_EMAIL_PASWD)
			{
				$send = send_email("[".APP_NAME."] ".L_EMAIL_VAL_1, L_SET_2, L_REG_1, L_EMAIL_VAL_2);
				if (!$send) $Error = sprintf(L_EMAIL_VAL_Err,$Sender_email,$Sender_email);
			};
			if (!isset($Error) || $Error == "")
			{
				$DbLink->query("INSERT INTO ".C_REG_TBL." VALUES ('', '', '$U', '$Latin1', '$PWD_Hash', '$FIRSTNAME', '$LASTNAME', '$COUNTRY', '$WEBSITE', '$EMAIL', $showemail, 'user', '',".time().", '$IP', '$GENDER', '$allowpopup', '$PICTURE', '$DESCRIPTION', '$FAVLINK', '$FAVLINK1', '$SLANG', '$COLORNAME', '$AVATARURL')");
				$Message = L_REG_9;
// Patch for sending an email to the Administrator upon new user registration to the chat system.
// by Bob Dickow, April 28, 2003
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

	if (C_ADMIN_NOTIFY)
	{
     $emailMessage = "New user registration notification for "
     . APP_NAME ." at ". C_CHAT_URL." :\n\n"
     . "----------------------------------------------\n"
     . "Username: ".stripslashes($U)."\n\n"
     . "Password: ".stripslashes($pmc_password)."\n"
     . "----------------------------------------------\n"
     . "First name: ".stripslashes($FIRSTNAME)."\n"
     . "Last name: ".stripslashes($LASTNAME)."\n"
     . "Gender: $sex\n"
     . "Email: $EMAIL\n"
     . "Country: ".stripslashes($COUNTRY)."\n"
     . "WWW: ".stripslashes($WEBSITE)."\n"
     . "Display email address: $shweml\n"
     . "Spoken languages: ".stripslashes($SLANG)."\n"
     . "Description: ".stripslashes($DESCRIPTION)."\n"
     . "Favorite link 1: ".stripslashes($FAVLINK)."\n"
     . "Favorite link 2: ".stripslashes($FAVLINK1)."\n"
     . "Picture: ".stripslashes($PICTURE)."\n"
     . "Date of registration: $dt\n"
     . "Time of registration: $tm\n"
     . "IP address: $IP (".gethostbyaddr($IP).")\n"
     . "----------------------------------------------";
     mail(C_ADMIN_EMAIL,"[".APP_NAME."] "
     . "New User Registration Notification",$emailMessage);
// end of patch to send an email to the Admin at the time of new user registration.

// Patch to send an email to the User after registration.
// by Ciprian using Bob Dickow's one above.
	if (C_EMAIL_USER)
	{
     $emailMessage = "You have just registered this account for "
     . APP_NAME ." at ". C_CHAT_URL." :\n\n"
     . "----------------------------------------------\n"
     . "Username: ".stripslashes($U)."\n"
	   . "Password: ".stripslashes($pmc_password)."\n\n"
     . "----------------------------------------------\n"
     . "First name: ".stripslashes($FIRSTNAME)."\n"
     . "Last name: ".stripslashes($LASTNAME)."\n"
     . "Gender: $sex\n"
     . "Email: $EMAIL\n"
     . "Country: ".stripslashes($COUNTRY)."\n"
     . "WWW: ".stripslashes($WEBSITE)."\n"
     . "Display email address: $shweml\n"
     . "Spoken languages: ".stripslashes($SLANG)."\n"
     . "Description: ".stripslashes($DESCRIPTION)."\n"
     . "Favorite link 1: ".stripslashes($FAVLINK)."\n"
     . "Favorite link 2: ".stripslashes($FAVLINK1)."\n"
     . "Picture: ".stripslashes($PICTURE)."\n"
     . "Date of registration: $dt\n"
     . "Time of registration: $tm\n"
     . "----------------------------------------------\n"
     . "Please save this email for your usage.\n"
     . "Thank you for joining!";
     mail($EMAIL,"[".APP_NAME."] "
     . "Your account details",$emailMessage);
  };
// End of patch to send an email to the User after registration.
		};
			};
		}
	}
}

$DbLink->close();

// Registration has been done ?
$done = (isset($Message) && $Message == L_REG_9);

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(APP_NAME); ?></TITLE>
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
	var regform = document.forms['RegParams'];
	var windowHandle = window.open('','login');
	windowHandle.document.forms['Params'].elements['U'].value = regform.elements['U'].value;
	<?php
	if (!C_EMAIL_PASWD)
	{
		?>
		windowHandle.document.forms['Params'].elements['pmc_password'].value = regform.elements['pmc_password'].value;
		<?php
	};
	if (isset($COLORNAME))
	{
		$C = $COLORNAME;
		setcookie("CookieColor", $C, time() + 60*60*24*365);        // cookie expires in one year
	}
};
?>
};

// Put focus to the username field of the form at the starter page
function get_focus()
{
	var username = "<?php echo($U); ?>";
	window.focus();
	if (username != "")
	{
		document.forms['RegParams'].elements['U'].value=username;
		document.forms['RegParams'].elements['pmc_password'].focus();
	}
	else
		{
			document.forms['RegParams'].elements['U'].focus();
		}
}
// -->
</SCRIPT>
</HEAD>

<BODY onLoad="if (window.focus) get_focus();">
<CENTER>
<br />
<FORM ACTION="register.php" METHOD="POST" AUTOCOMPLETE="" NAME="RegParams">
<P></P>
<?php
if(isset($Error))
{
	echo("<P><SPAN CLASS=\"error\">$Error</SPAN></P>");
}
?>
<INPUT TYPE="hidden" NAME="FORM_SEND" VALUE="1">
<INPUT TYPE="hidden" NAME="L" VALUE="<?php echo($L); ?>">
<TABLE BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<TD ALIGN="CENTER">
		<TABLE BORDER=0>
		<TR>
			<TH COLSPAN=2 CLASS="tabtitle"><?php echo($done ? $Message : L_REG_6); ?></TH>
		</TR>
		<TR>
			<TH COLSPAN=2><?php if (!$done) echo(L_REG_37); elseif (C_EMAIL_PASWD) echo(L_EMAIL_VAL_Done); ?></TH>
		</TR>
		<TR><TD>&nbsp;</TD></TR>
		<TR>
<!-- Avatar System Start -->
                        <?php
                        if (C_USE_AVATARS) {
                        ?>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_17); ?> :</TD>
 			<TD VALIGN="TOP">
			<!-- Avatar System Start. Splits above original line and inserts the following: -->
                        <?php
                        if (empty($avatar)) {
                          $AVATARURL = C_AVA_RELPATH . C_DEF_AVATAR;
                          $avatar = $AVATARURL;
                        }
                        ?>
   		                <a href="avatar.php?User=<?php echo($AUTH_USERNAME);?>&L=<?php echo($L); ?>&avatar=<?php echo($AVATARURL); ?>&From=register.php&Link=$Link" onMouseOver="window.status='<?php echo(L_SEL_NEW_AV) ?>.'; return true;" title="<?php echo(L_SEL_NEW_AV); ?>" target="_self">
                      	        <img src="<?php echo($avatar); ?>" align="center" border="0" width="<?php echo(C_AVA_WIDTH);?>" height="<?php echo(C_AVA_HEIGHT);?>" alt="<?php echo(L_SEL_NEW_AV); ?>"></a>&nbsp;
                                <input type="hidden" name="AVATARURL" value="<?php echo($avatar); ?>">
                                <input type="hidden" name="avatar" value="<?php echo($avatar); ?>">
			</TD>
		</TR>
                        <?php
                        }
                        ?>
<!-- Avatar System End  -->
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="U" SIZE=15 MAXLENGTH=15 VALUE="<?php if (isset($U)) echo(htmlspecialchars(stripslashes($U))); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS=error>*</SPAN><?php }; ?>
			</TD>
		</TR>
		<?php
		if (!C_EMAIL_PASWD)
		{
			?>
			<TR>
				<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :</TD>
				<TD VALIGN="TOP">
					<INPUT TYPE="password" NAME="pmc_password" SIZE=15 MAXLENGTH=15 VALUE="<?php if (isset($pmc_password)) echo(htmlspecialchars(stripslashes($pmc_password))); ?>"<?php if ($done) echo(" READONLY"); ?>>
					<?php if (!$done) { ?><SPAN CLASS=error>*</SPAN><?php }; ?>
				</TD>
			</TR>
			<?php
		};
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_8); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="EMAIL" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($EMAIL)) echo(htmlspecialchars(stripslashes($EMAIL))); ?>"<?php if ($done) echo(" READONLY"); ?>>
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
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($FIRSTNAME)) echo(htmlspecialchars(stripslashes($FIRSTNAME))); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS=error>*</SPAN><?php }; ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($LASTNAME)) echo(htmlspecialchars(stripslashes($LASTNAME))); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php if (!$done) { ?><SPAN CLASS=error>*</SPAN><?php }; ?>
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
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($FIRSTNAME)) echo(htmlspecialchars(stripslashes($FIRSTNAME))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($LASTNAME)) echo(htmlspecialchars(stripslashes($LASTNAME))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
<?php
};
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_45); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="radio" NAME="GENDER" VALUE="1" <?php if (isset($GENDER) && $GENDER == "1") echo("CHECKED"); if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_REG_46); ?><br />
				<INPUT TYPE="radio" NAME="GENDER" VALUE="2" <?php if (isset($GENDER) && $GENDER == "2") echo("CHECKED"); if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_REG_47); ?><br />
				<INPUT TYPE="radio" NAME="GENDER" VALUE="0" <?php if (isset($GENDER) && $GENDER == "0") echo("CHECKED"); if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_REG_48); ?>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOWEMAIL" value="1" <?php if (isset($SHOWEMAIL) && $SHOWEMAIL) echo("CHECKED"); ?><?php if ($done) echo(" READONLY"); ?>>
				&nbsp;<?php echo(L_REG_33); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_36); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="COUNTRY" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($COUNTRY)) echo(htmlspecialchars(stripslashes($COUNTRY))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_32); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="WEBSITE" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($WEBSITE)) echo(htmlspecialchars(stripslashes($WEBSITE))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_1); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="SLANG" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($SLANG)) echo(htmlspecialchars(stripslashes($SLANG))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($FAVLINK)) echo(htmlspecialchars(stripslashes($FAVLINK))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_3); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK1" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($FAVLINK1)) echo(htmlspecialchars(stripslashes($FAVLINK1))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_4); ?> :</TD>
			<TD VALIGN="TOP">
				<TEXTAREA NAME="DESCRIPTION" COLS=27 ROWS=5 WRAP=ON<?php if ($done) echo(" READONLY"); ?>><?php if (isset($DESCRIPTION)) echo(htmlspecialchars(stripslashes($DESCRIPTION))); ?></TEXTAREA>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_5); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="PICTURE" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($PICTURE)) echo(htmlspecialchars(stripslashes($PICTURE))); ?>"<?php if ($done) echo(" READONLY"); ?>>
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
// Color Input Select mod by Alexander Eisele <xaex@mail.ru> & Ciprian
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
$ColorList = eregi_replace('"',"", $ColorList);
$CC = explode(",", $ColorList);
			echo("<SELECT NAME=\"COLORNAME\">\n");
			while(list($ColorNumber1, $ColorCode) = each($CC))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:".$ColorCode."\" VALUE=\"".$ColorCode."\"");
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
			<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_3); ?>">
			<?php
		}
		?>
		<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_REG_25); ?>" onClick="LoginToIndex(); self.close(); return false;">
	</TD>
</TR>
</TABLE>
</FORM>
</CENTER>
</BODY>

</HTML>
<?php

?>