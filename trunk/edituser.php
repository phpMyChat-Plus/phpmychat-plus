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
if (isset($_COOKIE["CookieStatus"])) $status = $_COOKIE["CookieStatus"];
if (isset($_COOKIE["CookieHash"])) $RemMe = $_COOKIE["CookieHash"];
$mydate = isset($_REQUEST["date1"]) ? $_REQUEST["date1"] : "";

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/login.lib.php");

# Is the OS Windows or Mac or Linux
if (stristr(PHP_OS,'win')) {
  $eol="\r\n";
} elseif (stristr(PHP_OS,'mac')) {
  $eol="\r";
} else {
  $eol="\n";
}

if($mydate != "")
{
	$BIRTHDAY = $mydate;
	$format_birth_day = strftime(L_SHORT_DATE,strtotime($BIRTHDAY));
}

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

$DbLink = new DB;

// Check for valid entries if the form have been sent
if (isset($FORM_SEND) && stripslashes($submit_type) == L_REG_16)
{
	if (C_NO_SWEAR) include("./lib/swearing.lib.php");
	if (trim($U) == "")
	{
		$Error = L_ERR_USR_5;
	}
	else if (ereg("[\, \']", stripslashes($U)))
	{
		$Error = L_ERR_USR_16a;
	}
	else if(C_NO_SWEAR && checkwords($U, true, $Charset))
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
//	else if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)$", $EMAIL))
	// Added the new top-level domains (mail, asia, travel, aso)
	else if (!eregi("^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](avel|bi|bs|fo|g|ia|l|m|me|mes|o|op|pa|ro|seum|t|to|u|v|z)?)$", $EMAIL))
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
	else if (COLOR_NAMES && COLOR_FILTERS && (strcasecmp($COLORNAME, COLOR_CA) == 0 || strcasecmp($COLORNAME, COLOR_CA1) == 0 || strcasecmp($COLORNAME, COLOR_CA2) == 0) && $COLORNAME != "" && $status != "a" && $status != "t")
	{
		$Error = L_ERR_USR_25;
	}
	else if (COLOR_NAMES && COLOR_FILTERS && (strcasecmp($COLORNAME, COLOR_CM) == 0 || strcasecmp($COLORNAME, COLOR_CM1) == 0 || strcasecmp($COLORNAME, COLOR_CM2) == 0) && $COLORNAME != "" && $status != "a" && $status != "t" && $status != "m")
	{
		$Error = L_ERR_USR_26;
	}
	else if ($SECRET_QUESTION == "" || $SECRET_QUESTION == 0 || $SECRET_ANSWER == "")
	{
		$Error = L_ERR_PASS_5;
	}

	if (!isset($Error) || $Error == "")
	{
		$Latin1 = ($Charset != "utf-8");
		$PWD_Hash = md5(stripslashes($prev_PASSWORD));
		if (!isset($GENDER) || $GENDER == "") $GENDER = 0;
		$showemail = (isset($SHOWEMAIL) && $SHOWEMAIL)? 1:0;
		$allowpopup = (isset($ALLOWPOPUP) && $ALLOWPOPUP)? 1:0;
		if (isset($COLORNAME))
		{
			$C = $COLORNAME;
			setcookie("CookieColor", $C, time() + 60*60*24*365);        // cookie expires in one year
		}
		include("./lib/get_IP.lib.php");		// Set the $IP var

		// Upload avatar mod addition - by Ciprian
		// We try to keep the link between the usernames and uploaded avatars filenames,
		// and also remove the uploaded avatar if exists and isn't needed anymore
		$av_user_name = $pmc_username;
		$av_new_user_name = $U;
		if (stristr(urlencode($av_user_name), "%")) $av_user_name = "encname_".str_replace("%","_",urlencode($av_user_name));
		if (stristr(urlencode($av_new_user_name), "%")) $av_new_user_name = "encname_".str_replace("%","_",urlencode($av_new_user_name));
		if (!stristr($AVATARURL,C_AVA_RELPATH . "uploaded/")) @unlink(C_AVA_RELPATH . "uploaded/avatar_".$av_user_name.".gif");
		elseif ($pmc_username != $U && @rename(C_AVA_RELPATH . "uploaded/avatar_".$av_user_name.".gif", C_AVA_RELPATH . "uploaded/avatar_".$av_new_user_name.".gif")) $AVATARURL = C_AVA_RELPATH . "uploaded/avatar_".$av_new_user_name.".gif";
		// End of Upload avatar mod - by Ciprian

		$DbLink->query("UPDATE ".C_REG_TBL." SET username='$U', latin1='$Latin1', ".(!isset($RemMe) || (isset($RemMe) && $prev_PASSWORD != $RemMe && $PWD_hash != $RemMe) ? "password='$PWD_Hash', " : "")."firstname='$FIRSTNAME', lastname='$LASTNAME', country='$COUNTRY', website='$WEBSITE', email='$EMAIL', showemail=$showemail, allowpopup=$allowpopup, reg_time=".time().", ip='$IP', gender='$GENDER', picture='$PICTURE', description='".str_replace("'","&#39;",$DESCRIPTION)."', favlink='$FAVLINK', favlink1='$FAVLINK1', slang='$SLANG', colorname='$COLORNAME', avatar='$AVATARURL', s_question='$SECRET_QUESTION', s_answer='$SECRET_ANSWER', use_gravatar='$USE_GRAV', birthday='$BIRTHDAY', show_bday='$SHOW_BDAY', show_age='$SHOW_AGE' WHERE username='$pmc_username'");
// Patch to send an email to the User and/or admin after changing username or password.
// by Ciprian using Bob Dickow's registration patch.
	if ($pmc_username != $U || ($pmc_password != $prev_PASSWORD && (!isset($RemMe) || (isset($RemMe) && $PWD_hash != $RemMe && $prev_PASSWORD != $RemMe))))
	{
		include("./lib/mail_validation.lib.php");
	     $tm = getdate();
		 $dt = $tm[weekday].", ".$tm[mday]." ".$tm[month]." ".$tm[year];
	     $ti = sprintf("%02.u:%02.u:%02.u",$tm[hours],$tm[minutes],$tm[seconds]);

		if ($SECRET_QUESTION==1) $secret_question = L_PASS_2;
		if ($SECRET_QUESTION==2) $secret_question = L_PASS_3;
		if ($SECRET_QUESTION==3) $secret_question = L_PASS_4;
		if ($SECRET_QUESTION==4) $secret_question = L_PASS_5;

		$Headers = "From: ${Sender_Name} <${Sender_email}>".$eol;
		$Headers .= "X-Sender: ${Sender_email}".$eol;
		$Headers .= "X-Mailer: PHP/".PHPVERSION.$eol;
		$Headers .= "Return-Path: ${Sender_email}".$eol;
		$Headers .= "Date: ${mail_date}".$eol;
		$Headers .= "Mime-Version: 1.0".$eol;
		$Headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
		$Headers .= "Content-Transfer-Encoding: 8bit".$eol;

		if (C_EMAIL_USER || (C_EMAIL_PASWD && !C_EMAIL_USER))
		{
	     if ($GENDER == 1) $sex = L_REG_46;
	     elseif ($GENDER == 2) $sex = L_REG_47;
	     elseif ($GENDER == 3) $sex = L_REG_44;
	     elseif ($GENDER == 4) $sex = L_REG_43;
	     else $sex = L_REG_48;

	     if ($showemail) {
	       $shweml = L_REG_20;
	     } else {
	       $shweml = L_REG_22;
	     }
	     if ($allowpopup) {
	       $allpopup = L_REG_20;
	     } else {
	       $allpopup = L_REG_22;
	     }
		 if ($USE_GRAV) {
		   $usegrav = L_REG_20;
		 } else {
		   $usegrav = L_REG_22;
		 }
		 if ($SHOW_BDAY) {
		   $shwbday = L_REG_20;
		 } else {
		   $shwbday = L_REG_22;
		 }
		 if ($SHOW_AGE) {
		   $shwage = L_REG_20;
		 } else {
		   $shwage = L_REG_22;
		 }
	     $emailMessage = ""
		 . sprintf(L_EMAIL_VAL_41,((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME),$Chat_URL,$pmc_username).$eol
	     . sprintf(L_EMAIL_VAL_7,$U).$eol.$eol
	     . "----------------------------------------------".$eol
	     . "".L_SET_2.": ".$U.$eol
		 . "".L_REG_1.": ".$prev_PASSWORD.$eol
		 . "----------------------------------------------".$eol
		 . "".L_EMAIL_VAL_81." (".$Chat_URL.")".$eol
	     . "----------------------------------------------".$eol.$eol
	     . "".L_PASS_1.": ".$secret_question.$eol
	     . "".L_PASS_6.": ".$SECRET_ANSWER.$eol
	     . "".L_REG_8.": ".$EMAIL.$eol
	     . "".L_REG_33.": ".$shweml.$eol;
		 if(!(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")))
		 {
			$emailMessage .= "".L_REG_30.": ".($FIRSTNAME ? $FIRSTNAME : L_NOT_SELECTED).$eol
			. "".L_REG_31.": ".($LASTNAME ? $LASTNAME : L_NOT_SELECTED).$eol;
		 }
		 else
		 {
			 $emailMessage .= L_REG_31.": ".($LASTNAME ? $LASTNAME : L_NOT_SELECTED).$eol
			 . "".L_REG_30.": ".($FIRSTNAME ? $FIRSTNAME : L_NOT_SELECTED).$eol;
		 }
		 $emailMessage .= "".L_PRO_7.": ".($BIRTHDAY != "0000-00-00" && $BIRTHDAY != "" ? $format_birth_day : L_NOT_SELECTED).$eol
		 . "".L_PRO_8.": ".$shwbday.$eol
		 . "".L_PRO_9.": ".$shwage.$eol
	     . "".L_REG_45.": ".$sex.$eol
	     . "".L_REG_36.": ".($COUNTRY ? $COUNTRY : L_NOT_SELECTED).$eol
	     . "".L_REG_32.": ".($WEBSITE ? $WEBSITE : L_NOT_SELECTED).$eol
	     . "".L_PRO_1a.": ".($SLANG ? $SLANG : L_NOT_SELECTED).$eol
	     . "".L_PRO_2.": ".($FAVLINK ? $FAVLINK : L_NOT_SELECTED).$eol
	     . "".L_PRO_3.": ".($FAVLINK1 ? $FAVLINK1 : L_NOT_SELECTED).$eol
	     . "".L_PRO_4.": ".($DESCRIPTION ? $DESCRIPTION : L_NOT_SELECTED).$eol
	     . "".L_PRO_5.": ".($PICTURE ? $PICTURE : L_NOT_SELECTED).$eol
		 . "".L_PRO_6.": ".($C ? $C : L_NOT_SELECTED)." (".(COLOR_NAMES ? L_ENABLED : L_DISABLED).")".$eol
	     . "".L_REG_POPUP.": ".$allpopup.$eol
	     . "".L_GRAV_USE.": ".$usegrav." (".(!ALLOW_GRAVATARS ? L_DISABLED : L_ENABLED).")".$eol
	     . "----------------------------------------------".$eol
	     . "".sprintf(L_EMAIL_VAL_61,strftime(L_LONG_DATETIME,time())).$eol
	     . "----------------------------------------------".$eol.$eol
		   . "".L_EMAIL_VAL_8."".$eol.$eol
	     . $Mail_Greeting.$eol.$Sender_Name1.$eol.$Chat_URL;
			$Subject = sprintf(L_EMAIL_VAL_51,$U,"[".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]");
			$Subject = quote_printable($Subject,$Charset);
			$emailMessage = stripslashes($emailMessage);
			@mail($FIRSTNAME ? $FIRSTNAME." <".$EMAIL.">" : $U." <".$EMAIL.">", $Subject, $emailMessage, $Headers);
	   };

		if (C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@"))
		{
		if 	($SECRET_QUESTION==1) $secret_questiona = "What make was your first car?";
		if 	($SECRET_QUESTION==2) $secret_questiona = "What was your first pet name?";
		if 	($SECRET_QUESTION==3) $secret_questiona = "What is your favorite drink?";
		if 	($SECRET_QUESTION==4) $secret_questiona = "What is your birth date?";

		if ($GENDER == 1) $sex = "male";
	     elseif ($GENDER == 2)$sex = "female";
	     elseif ($GENDER == 3) $sex = "couple";
			 elseif ($GENDER == 4) $sex = "undisclosed";
	     else $sex = "unspecified";

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
		 if ($SHOW_BDAY) {
		   $shwbday = "yes";
		 } else {
		   $shwbday = "no";
		 }
		 if ($SHOW_AGE) {
		   $shwage = "yes";
		 } else {
		   $shwage = "no";
		 }
	     $emailMessage = $pmc_username." has just changed important account info for ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)." at ".$Chat_URL." :".$eol.$eol
	     . "Here is the updated account info for ".$pmc_username.":".$eol
	     . "----------------------------------------------".$eol
	     . "New Username: ".$U.$eol
		 . "New Password: ".$prev_PASSWORD.$eol
	     . "----------------------------------------------".$eol.$eol
	     . "Secret question: ".$secret_questiona.$eol
	     . "Secret answer: ".$SECRET_ANSWER.$eol
	     . "Email: ".$EMAIL
		 . $eol."Display email address on public info: ".$shweml
		 . ($FIRSTNAME ? $eol."First name: ".$FIRSTNAME : "")
		 . ($LASTNAME ? $eol."Last name: ".$LASTNAME : "")
		 . ($BIRTHDAY != "" ? $eol."Date of birth: ".$BIRTHDAY : "")
		 . ($BIRTHDAY != "" ? $eol."Display birthday on public info: ".$shwbday : "")
		 . ($BIRTHDAY != "" ? $eol."Display age on public info: ".$shwage : "")
		 . $eol."Gender: ".$sex
		 . ($COUNTRY ? $eol."Country: ".$COUNTRY : "")
		 . ($WEBSITE ? $eol."WWW: ".$WEBSITE : "")
		 . ($SLANG ? $eol."Language: ".$SLANG : "")
		 . ($FAVLINK ? $eol."Favorite link 1: ".$FAVLINK : "")
		 . ($FAVLINK1 ? $eol."Favorite link 2: ".$FAVLINK1 : "")
		 . ($DESCRIPTION ? $eol."Description: ".$DESCRIPTION : "")
		 . ($PICTURE ? $eol."Picture: ".$PICTURE : "")
		 . $eol."Color name/text: ".($C ? $C : "Not selected")." (".(COLOR_NAMES ? "Enabled" : "Disabled").")"
	     . $eol."Open popups on private message: ".$allpopup
		 . ($usegrav ? $eol."Use the Gravatar: ".$usegrav." (".(ALLOW_GRAVATARS ? "Enabled" : "Disabled").")" : "")
		 . $eol
		 . "----------------------------------------------".$eol
		 . "Prefered language: ".$L.$eol
	     . "Updated on: $dt $ti".$eol
	     . "IP address: $IP (".gethostbyaddr($IP).")".$eol
	     . "----------------------------------------------".$eol.$eol
		 . "Please note that some data should be disabled from this copy for privacy concerns!".$eol
	     . "Save this email for your further reference.".$eol
	     . "Enjoy!";
			$Subject = "Modified user - ".$U." - Updated details for [".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]";
			$Subject = quote_printable($Subject,$Charset);
			$emailMessage = stripslashes($emailMessage);
			@mail($Sender_Name." <".$Sender_email.">", $Subject, $emailMessage, $Headers);
		};
  };
// End of patch to send an email to the User and/or admin after registration.
		if ($pmc_username != $U) $pmc_username = $U;
		if ($pmc_password != $prev_PASSWORD && (!isset($RemMe) || (isset($RemMe) && $PWD_hash != $RemMe && $prev_PASSWORD != $RemMe)))
		{
			$pmc_password = $prev_PASSWORD;
			if(isset($RemMe) && $PWD_hash != $RemMe && $prev_PASSWORD != $RemMe) setcookie("CookieHash", $PWD_Hash, time() + 60*60*24*365);        // cookie expires in one year
		}
		$Message = L_REG_17;
	}
}
// Else initialize var that will be displayed in the form
else
{
	$U = $pmc_username;
	$prev_PASSWORD = $pmc_password;
	$DbLink->query("SELECT password,firstname,lastname,perms,country,website,email,showemail,gender,allowpopup,picture,description,favlink,favlink1,slang,colorname,avatar,s_question,s_answer,use_gravatar,birthday,show_bday,show_age FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	if ($DbLink->num_rows() != 0)
	{
			  list($SAVEDHASH, $FIRSTNAME, $LASTNAME, $PERMS, $COUNTRY, $WEBSITE, $EMAIL, $SHOWEMAIL, $GENDER, $ALLOWPOPUP, $PICTURE, $DESCRIPTION, $FAVLINK, $FAVLINK1, $SLANG, $COLORNAME, $AVATARURL, $SECRET_QUESTION, $SECRET_ANSWER, $USE_GRAV, $BIRTHDAY, $SHOW_BDAY, $SHOW_AGE) = $DbLink->next_record();
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
<TITLE><?php echo(L_REG_34." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<?php
require("./plugins/calendar/tc_calendar.php");
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
// Put the focus to the message box if the window has been called with the profile command
function put_focus()
{
	if (window.opener && !window.opener.closed)
	{
		if (window.opener.window.document.title == "Hidden Input frame")
		{
			targetFrame = window.opener.window.parent.frames['input'].window;
			with (targetFrame)
			{
	//			focus();
				if (document.forms['MsgForm'] && document.forms['MsgForm'].elements['M'])
					document.forms['MsgForm'].elements['M'].focus();
			}
		}
		else
		{
			targetFrame = window.opener.window;
			with (targetFrame)
			{
	//			focus();
				if (document.forms['Params'] && document.forms['Params'].elements['pmc_password'])
				{
					document.forms['Params'].elements['pmc_password'].value = <?php echo ($prev_PASSWORD); ?>;
					document.forms['Params'].elements['submit'].focus();
				}
			}
		}
	};
};
function swapImage(img,imgid) {
	var image = document.getElementById(imgid);
	var dropd = document.getElementById(img);
	if (imgid == "flagToSwap")
	{
		var path = '<?php echo("./".$ChatPath."localization/"); ?>';
		var type = '<?php echo(C_FLAGS_3D); ?>';
		var enfmt = '<?php echo(C_ENGLISH_FORMAT); ?>';
		if(type == "1")
		{
			if(enfmt == "US" && dropd.value == "english") var flagtype = '/images/flag_us.gif';
			else var flagtype = '/images/flag.gif';
		}
		else
		{
			if(enfmt == "US" && dropd.value == "english") var flagtype = '/images/flag_us0.gif';
			else var flagtype = '/images/flag0.gif';
		}
		image.src = path + dropd.value + flagtype;
	}
	if (imgid == "genderToSwap")
	{
		var path = '<?php echo("./${ChatPath}images/gender_"); ?>';
		if (dropd.value == "0") var gender = "none.gif";
		else if (dropd.value == "1") var gender = "boy.gif";
		else if (dropd.value == "2") var gender = "girl.gif";
		else if (dropd.value == "3") var gender = "couple.gif";
		else if (dropd.value == "4") var gender = "undefined.gif";
		image.src = path + gender;
	}
};
// -->
</SCRIPT>
</HEAD>

<BODY onUnload="if (window.opener && !window.opener.closed) put_focus(); return false;">
<CENTER>
<br />
<FORM ACTION="edituser.php" METHOD="POST" AUTOCOMPLETE="" NAME="EditUsrForm">
<INPUT type="hidden" name="AVATARURL" value="<?php echo($AVATARURL);?>">
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
			<TH COLSPAN=2><?php if (!$done) echo(L_REG_37."<br /><span class=\"error\">**</span> ".L_REG_POPUP_NOTE); ?></TH>
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
			            <a href="<?php echo("avatar.php?User=$pmc_username&LIMIT=$LIMIT&L=$L&avatar=$AVATARURL&ORIGAVATAR=$ORIGAVATAR&From=edituser.php&pmc_password=$pmc_password"); ?>" onClick="return confirm('<?php echo(L_SEL_NEW_AV_CONFIRM) ?>');" onMouseOver="window.status='<?php echo(L_SEL_NEW_AV) ?>.'; return true;" title="<?php echo(L_SEL_NEW_AV); ?>" target="_self">
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
				// Gravatars initialization
				$email = $EMAIL;
				$User = $pmc_username;
				if (eregi(C_AVA_RELPATH, $AVATAR_URL) || !isset($AVATAR_URL) || $AVATAR_URL == "") $local_avatar = 1;
				else $local_avatar = 0;
				require("plugins/gravatars/get_gravatar.php");
				?>
				<TR>
					<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP">Gravatar :</TD>
				 	<TD VALIGN="TOP">
				<?php
					echo("<a href=\"http://www.gravatar.com\" title=\"".sprintf(L_CLICK,L_LINKS_19)."\" target=\"_blank\">".$gravatarTag."</a>");
				?>
				&nbsp;<INPUT type="checkbox" name="USE_GRAV" value="1" <?php if(isset($USE_GRAV) && $USE_GRAV) echo("checked"); ?><?php if ($done|| $ALLOW_GRAVATARS != 1) echo(" READONLY"); ?>>&nbsp;<?php echo(L_GRAV_USE); ?>
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
				<INPUT TYPE="text" NAME="U" SIZE=15 MAXLENGTH=15 VALUE="<?php echo(htmlspecialchars(stripslashes($U))); ?>"<?php if ($done) echo(" READONLY"); if (isset($LIMIT) && $LIMIT) echo(" DISABLED"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
				<?php
				if (isset($LIMIT) && $LIMIT)
				{
					?>
					<INPUT TYPE="hidden" NAME="U" VALUE="<?php echo(htmlspecialchars(stripslashes($U))); ?>">
					<?php
				};
				?>

			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :</TD>
			<TD VALIGN="TOP">
				<!-- Password can not be modified via the profile command -->
				<INPUT TYPE="password" NAME="prev_PASSWORD" AUTOCOMPLETE="OFF" SIZE=15 MAXLENGTH=15 VALUE="<?php echo(htmlspecialchars(stripslashes($prev_PASSWORD))); ?>"<?php if ($done) echo(" READONLY"); if (isset($LIMIT) && $LIMIT) echo(" DISABLED"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
				<?php
				if (isset($LIMIT) && $LIMIT)
				{
					?>
					<INPUT TYPE="hidden" NAME="prev_PASSWORD" VALUE="<?php echo(htmlspecialchars(stripslashes($prev_PASSWORD))); ?>">
					<?php
				};
				?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_8); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="EMAIL" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($EMAIL)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
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
				</SELECT>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PASS_6); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="SECRET_ANSWER" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($SECRET_ANSWER)) echo(stripslashes($SECRET_ANSWER)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
<?php
if(!(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")))
{
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_30); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($FIRSTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($LASTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
<?php
}
else
{
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($LASTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_30); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php echo(stripslashes($FIRSTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
<?php
}
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_7); ?> :</TD>
			<TD VALIGN="TOP" CLASS=success>
			<?php
			  $myCalendar = new tc_calendar("date1", true, true);
			  $myCalendar->zindex = 150; //default 1
			  $myCalendar->setPicture("plugins/calendar/images/iconCalendar.gif");
			  $myCalendar->setPath("plugins/calendar/");
			  if(isset($BIRTHDAY))
			  {
			    $birth_day = strtotime($BIRTHDAY);
				$myCalendar->setDate(date('d',$birth_day), date('m',$birth_day), date('Y',$birth_day));
			  }
			  $myCalendar->setYearSelect(1935, date('Y'));
			  $myCalendar->dateAllow('1935-01-01', date('Y-m-d'));
			  $myCalendar->setDateFormat(str_replace("%","",str_replace("B","F",str_replace("d","j",L_CAL_FORMAT))));
//			  $myCalendar->setDateFormat('j F Y');
			  $myCalendar->writeScript();
			?>
				&nbsp;<?php if (!$done && C_REQUIRE_BDAY) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
				<INPUT TYPE="hidden" NAME="BIRTHDAY" VALUE="<?php echo($BIRTHDAY); ?>">
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_45); ?> :</TD>
			<TD VALIGN="TOP">
				<SELECT name="GENDER" id="gender" onChange="swapImage('gender','genderToSwap')">
				<OPTION value="0" <?php if ($GENDER==0 || $GENDER=="") { echo ("selected=\"selected\""); $genselected = "none.gif"; }?>><?php echo(L_SET_7)?></OPTION>
				<OPTION value="1" <?php if ($GENDER==1) { echo ("selected=\"selected\""); $genselected = "boy.gif"; }?>><?php echo(L_REG_46)?></OPTION>
				<OPTION value="2" <?php if ($GENDER==2) { echo ("selected=\"selected\""); $genselected = "girl.gif"; }?>><?php echo(L_REG_47)?></OPTION>
				<OPTION value="3" <?php if ($GENDER==3) { echo ("selected=\"selected\""); $genselected = "couple.gif"; }?>><?php echo(L_REG_44)?></OPTION>
				<OPTION value="4" <?php if ($GENDER==4) { echo ("selected=\"selected\""); $genselected = "undefined.gif"; }?>><?php echo(L_REG_43)?></OPTION>
				</SELECT>&nbsp;<img style="vertical-align:middle" id="genderToSwap" src="<?php echo("./${ChatPath}images/gender_".$genselected.""); ?>" <?php echo("BORDER=0 ALT=\"".L_GEN_ICON."\" Title=\"".L_GEN_ICON."\""); ?> />
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOWEMAIL" value="1" <?php if(isset($SHOWEMAIL) && $SHOWEMAIL) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_REG_33); ?>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOW_BDAY" value="1" <?php if (isset($SHOW_BDAY) && $SHOW_BDAY) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_PRO_8); ?>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOW_AGE" value="1" <?php if (isset($SHOW_AGE) && $SHOW_AGE) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_PRO_9); ?>
			</TD>
		</TR>
<?php
if (C_PRIV_POPUP == 1)
{
?>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="ALLOWPOPUP" value="1" <?php if(isset($ALLOWPOPUP) && $ALLOWPOPUP) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_REG_POPUP.($done ? "" : "&nbsp;<SPAN CLASS=\"error\">**</SPAN>")); ?>
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
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_1a); ?> :</TD>
			<TD VALIGN="TOP">
		<?php
			// Available languages
			$AvailableLanguages = array();
			$languageDirectories = dir('./'.$ChatPath.'localization/');
			while($name = $languageDirectories->read())
			{
				if(is_dir('./'.$ChatPath.'localization/'.$name)
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/regex.txt')
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/localized.chat.php')
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/images/flag.gif'))
				{
					list($key) = file('./'.$ChatPath.'localization/'.$name.'/regex.txt');
					$AvailableLanguages[$key] = $name;
				};
			};
			$languageDirectories->close();
			if (!function_exists("krsort")) include("./${ChatPath}localization/sort_languages.php");
			krsort($AvailableLanguages);
			asort($AvailableLanguages);
			reset($AvailableLanguages);
		?>
		    <SELECT NAME="SLANG" id="flags" onChange="swapImage('flags','flagToSwap')">
		<?php
			$i = 0;
			while(list($key, $name) = each($AvailableLanguages))
			{
				if ($name == "argentinian_spanish" && L_ORIG_LANG_AR != "L_ORIG_LANG_AR") $FLAG_NAME = L_ORIG_LANG_AR;
				elseif ($name == "bulgarian" && L_ORIG_LANG_BG != "L_ORIG_LANG_BG") $FLAG_NAME = L_ORIG_LANG_BG;
				elseif ($name == "brazilian_portuguese" && L_ORIG_LANG_BR != "L_ORIG_LANG_BR") $FLAG_NAME = L_ORIG_LANG_BR;
				elseif ($name == "czech" && L_ORIG_LANG_CZ != "L_ORIG_LANG_CZ") $FLAG_NAME = L_ORIG_LANG_CZ;
				elseif ($name == "danish" && L_ORIG_LANG_DA != "L_ORIG_LANG_DA") $FLAG_NAME = L_ORIG_LANG_DA;
				elseif ($name == "dutch" && L_ORIG_LANG_NL != "L_ORIG_LANG_NL") $FLAG_NAME = L_ORIG_LANG_NL;
				elseif ($name == "english" && L_ORIG_LANG_EN != "L_ORIG_LANG_EN") $FLAG_NAME = L_ORIG_LANG_EN;
				elseif ($name == "french" && L_ORIG_LANG_FR != "L_ORIG_LANG_FR") $FLAG_NAME = L_ORIG_LANG_FR;
				elseif ($name == "georgian" && L_ORIG_LANG_KA != "L_ORIG_LANG_KA") $FLAG_NAME = L_ORIG_LANG_KA;
				elseif ($name == "german" && L_ORIG_LANG_DE != "L_ORIG_LANG_DE") $FLAG_NAME = L_ORIG_LANG_DE;
				elseif ($name == "greek" && L_ORIG_LANG_GR != "L_ORIG_LANG_GR") $FLAG_NAME = L_ORIG_LANG_GR;
				elseif ($name == "hebrew" && L_ORIG_LANG_HE != "L_ORIG_LANG_HE") $FLAG_NAME = L_ORIG_LANG_HE;
				elseif ($name == "hindi" && L_ORIG_LANG_HI != "L_ORIG_LANG_HI") $FLAG_NAME = L_ORIG_LANG_HI;
				elseif ($name == "hungarian" && L_ORIG_LANG_HU != "L_ORIG_LANG_HU") $FLAG_NAME = L_ORIG_LANG_HU;
				elseif ($name == "indonesian" && L_ORIG_LANG_ID != "L_ORIG_LANG_ID") $FLAG_NAME = L_ORIG_LANG_ID;
				elseif ($name == "italian" && L_ORIG_LANG_IT != "L_ORIG_LANG_IT") $FLAG_NAME = L_ORIG_LANG_IT;
				elseif ($name == "japanese" && L_ORIG_LANG_JA != "L_ORIG_LANG_JA") $FLAG_NAME = L_ORIG_LANG_JA;
				elseif ($name == "nepali" && L_ORIG_LANG_NE != "L_ORIG_LANG_NE") $FLAG_NAME = L_ORIG_LANG_NE;
				elseif ($name == "persian" && L_ORIG_LANG_FA != "L_ORIG_LANG_FA") $FLAG_NAME = L_ORIG_LANG_FA;
				elseif ($name == "romanian" && L_ORIG_LANG_RO != "L_ORIG_LANG_RO") $FLAG_NAME = L_ORIG_LANG_RO;
				elseif ($name == "russian" && L_ORIG_LANG_RU != "L_ORIG_LANG_RU") $FLAG_NAME = L_ORIG_LANG_RU;
				elseif ($name == "serbian_latin" && L_ORIG_LANG_SRL != "L_ORIG_LANG_SRL") $FLAG_NAME = L_ORIG_LANG_SRL;
				elseif ($name == "serbian_cyrillic" && L_ORIG_LANG_SRC != "L_ORIG_LANG_SRC") $FLAG_NAME = L_ORIG_LANG_SRC;
				elseif ($name == "slovak" && L_ORIG_LANG_SK != "L_ORIG_LANG_SK") $FLAG_NAME = L_ORIG_LANG_SK;
				elseif ($name == "spanish" && L_ORIG_LANG_ES != "L_ORIG_LANG_ES") $FLAG_NAME = L_ORIG_LANG_ES;
				elseif ($name == "swedish" && L_ORIG_LANG_SV != "L_ORIG_LANG_SV") $FLAG_NAME = L_ORIG_LANG_SV;
				elseif ($name == "turkish" && L_ORIG_LANG_TR != "L_ORIG_LANG_TR") $FLAG_NAME = L_ORIG_LANG_TR;
				elseif ($name == "ukrainian" && L_ORIG_LANG_UK != "L_ORIG_LANG_UK") $FLAG_NAME = L_ORIG_LANG_UK;
				elseif ($name == "urdu" && L_ORIG_LANG_UR != "L_ORIG_LANG_UR") $FLAG_NAME = L_ORIG_LANG_UR;
				elseif ($name == "vietnamese" && L_ORIG_LANG_VI != "L_ORIG_LANG_VI") $FLAG_NAME = L_ORIG_LANG_VI;
				elseif ($name == "yoruba" && L_ORIG_LANG_YO != "L_ORIG_LANG_YO") $FLAG_NAME = L_ORIG_LANG_YO;
				else
				{
					$FLAG_NAME = str_replace("_"," ",$name);
					$FLAG_NAME = mb_convert_case($FLAG_NAME,MB_CASE_TITLE,$Charset);
				}
				$i++;
				?>
				<OPTION VALUE="<?php echo $name ?>" <?php if($SLANG==$name || $L==$name){ echo " selected"; $namesel = $name; } ?>><?php echo ($FLAG_NAME); ?></OPTION>
					<?php
			};
			unset($AvailableLanguages);
			if($namesel == "english" && C_ENGLISH_FORMAT == "US")
			{
				$flagsel_3d = "flag_us.gif";
				$flagsel = "flag_us0.gif";
			}
			else
			{
				$flagsel_3d = "flag.gif";
				$flagsel = "flag0.gif";
			}
			?>
	    </SELECT>&nbsp;<img style="vertical-align:middle" id="flagToSwap" src="<?php echo("./".$ChatPath."localization/".$namesel."/images/".(C_FLAGS_3D ? $flagsel_3d : $flagsel)); ?>" /><?php if (!$done && $SLANG != $L) echo("&nbsp;<SPAN CLASS=\"error\">*</SPAN>"); ?>
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
				<TEXTAREA NAME="DESCRIPTION" COLS=27 ROWS=3 WRAP=ON<?php if ($done) echo(" READONLY"); ?>><?php echo(stripslashes($DESCRIPTION)); ?></TEXTAREA>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_5); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="PICTURE" SIZE=25 MAXLENGTH=255 VALUE="<?php echo(stripslashes($PICTURE)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php
				if (isset($PICTURE) && stripslashes($PICTURE) != "" && ini_get("allow_url_fopen") && file(stripslashes($PICTURE)))
				{
				?>
					<IMG src="<?php echo(stripslashes($PICTURE)); ?>" width="<?php echo(C_AVA_WIDTH); ?>" ALT="<?php echo(L_PRO_5); ?>" />
				<?php
				}
				?>
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
	if ($status != "a" && $status != "t" && $status != "m" && $PERMS != "admin" && $PERMS != "topmod" && $PERMS != "moderator")
	{
		if (COLOR_CA != "") $ColorList = str_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = str_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = str_replace('"'.COLOR_CA2.'",', "", $ColorList);
		if (COLOR_CM != "") $ColorList = str_replace('"'.COLOR_CM.'",', "", $ColorList);
		if (COLOR_CM1 != "") $ColorList = str_replace('"'.COLOR_CM1.'",', "", $ColorList);
		if (COLOR_CM2 != "") $ColorList = str_replace('"'.COLOR_CM2.'",', "", $ColorList);
	}
	elseif ($status == "m" || $PERMS == "moderator")
	{
		if (COLOR_CA != "") $ColorList = str_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = str_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = str_replace('"'.COLOR_CA2.'",', "", $ColorList);
	}
}
$ColorList = str_replace('"', "", $ColorList);
$CC = explode(",", $ColorList);
$selected = ((L_SELECTED_F != "") ? L_SELECTED_F : L_SELECTED);
$not_selected = ((L_NOT_SELECTED_F != "") ? L_NOT_SELECTED_F : L_NOT_SELECTED);
$null = ((L_NULL_F != "") ? L_NULL_F : L_NULL);
$selected = " (".$selected.")";
$not_selected = " ".$null." (".$not_selected.")";
			if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<SELECT NAME=\"COLORNAME\" style=\"background-color:".$COLORNAME.";\">\n");
			else echo("<SELECT NAME=\"COLORNAME\">");
			while(list($ColorNumber1, $ColorCode) = each($CC))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:".COLOR_CD."\" VALUE=\"".$ColorCode."\"");
				if ($COLORNAME == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "" && $ColorCode != $COLORNAME && $ColorCode != COLOR_CA && $ColorCode != COLOR_CA1 && $ColorCode != COLOR_CA2 && $ColorCode != COLOR_CM && $ColorCode != COLOR_CM1 && $ColorCode != COLOR_CM2) echo(">".$ColorCode."</OPTION>");
				elseif ($ColorCode == $COLORNAME && $ColorCode != "") echo(">".$ColorCode.$selected."</OPTION>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CA || $ColorCode == COLOR_CA1 || $ColorCode == COLOR_CA2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".L_WHOIS_ADMIN.")</OPTION>" : ">".$ColorCode."</OPTION>");
				elseif ($ColorCode != "" && ($ColorCode == COLOR_CM || $ColorCode == COLOR_CM1 || $ColorCode == COLOR_CM2)) echo(COLOR_FILTERS ? ">".$ColorCode." (".L_WHOIS_MODER.")</OPTION>" : ">".$ColorCode."</OPTION>");
				elseif ($ColorCode == "") echo(">".$not_selected."</OPTION>");
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
if(isset($done) && $done)
{
?>
	<SCRIPT LANGUAGE="JavaScript">
	var x = setTimeout('window.close();', 6000);   // 6 seconds
	</SCRIPT>
<?php
}
else
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