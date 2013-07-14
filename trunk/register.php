<?php
// Credit for the generate and e-mail password stuff goes to
// Jose' Carlos Pereira <phpHeaven@abismo.org>

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

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

$mydate = isset($_POST["date1"]) ? $_POST["date1"] : "";
require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
include("./lib/mail_validation.lib.php");

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
	if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $format_birth_day = str_replace(" ","",$format_birth_day);
}

if (!function_exists("utf8_substr"))
{
	function utf8_substr($str,$start)
	{
	   preg_match_all("/./su", $str, $ar);
	   if(func_num_args() >= 3) {
	       $end = func_get_arg(2);
	       return join("",array_slice($ar[0],$start,$end));
	   } else {
	       return join("",array_slice($ar[0],$start));
	   }
	};
};

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
if (isset($FORM_SEND) && stripslashes($submit_type) == L_REG_3)
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
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$U'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0)
		{
			$Error = L_ERR_USR_9;
			$field_errorU = true;
		}
		else
		{
			$Latin1 = ($Charset != "utf-8" ? 1 : 0);
			if (!isset($GENDER) || $GENDER == "") $GENDER = 0;
			$showemail = (isset($SHOWEMAIL) && $SHOWEMAIL)? 1:0;
			$allowpopup = 1;
			include("./lib/get_IP.lib.php");		// Set the $IP var

			// Send e-mail
			if (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@") && $Sender_email != "your@email.com")
			{
				$pmc_password = gen_password();
				$send = send_email(sprintf(L_EMAIL_VAL_3,"[".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]"), L_SET_2, L_EMAIL_VAL_PENDING_Done.$eol.L_EMAIL_VAL_PENDING_Done1, "", 0);
				if (!$send) $Error = sprintf(L_EMAIL_VAL_Err,$Sender_email,$Sender_email);
			}
			elseif (C_EMAIL_PASWD)
			{
				$pmc_password = gen_password();
				$send = send_email(L_EMAIL_VAL_1." [".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]", L_SET_2, L_REG_1, L_EMAIL_VAL_2, 1);
				if (!$send) $Error = sprintf(L_EMAIL_VAL_Err,$Sender_email,$Sender_email);
			}
			$PWD_Hash = md5(stripslashes($pmc_password));
			if (!isset($Error) || $Error == "")
			{
			// Upload avatar mod addition - by Ciprian
			// We try to keep the link between the usernames and uploaded avatars filenames,
			// and also remove the uploaded avatar if exists and isn't needed anymore
			$av_user_name = $U;
			if (stristr(urlencode($av_user_name), "%")) $av_user_name = "encname_".str_replace("%","_",urlencode($av_user_name));
			if (stristr($avatar,C_AVA_RELPATH . "uploaded/") && @rename($avatar, C_AVA_RELPATH . "uploaded/avatar_".$av_user_name.".gif")) $AVATARURL = C_AVA_RELPATH . "uploaded/avatar_".$av_user_name.".gif";
			$av_done = 1;
			// End of Upload avatar mod - by Ciprian
			$DbLink->query("INSERT INTO ".C_REG_TBL." VALUES ('', '', '$U', '$Latin1', '$PWD_Hash', '$FIRSTNAME', '$LASTNAME', '$COUNTRY', '$WEBSITE', '$EMAIL', $showemail, 'user', '',".time().", '$IP', '$GENDER', '$allowpopup', '$PICTURE', '".str_replace("'","&#39;",$DESCRIPTION)."', '$FAVLINK', '$FAVLINK1', '$SLANG', '$COLORNAME', '$AVATARURL', '$SECRET_QUESTION', '".htmlspecialchars($SECRET_ANSWER, ENT_NOQUOTES, 'UTF-8')."', '', '', '$USE_GRAV', '', '$BIRTHDAY', '$SHOW_BDAY', '$SHOW_AGE', '')");
			if (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@") && $Sender_email != "your@email.com") $Message = "";
			else $Message = L_REG_9;
// Patch for sending an email to the Administrator upon new user registration to the chat system.
// by Bob Dickow, April 28, 2003
     $tm = getdate();
     $dt = $tm[weekday].", ".$tm[mday]." ".$tm[month]." ".$tm[year];
     $ti = sprintf("%02.u:%02.u:%02.u",$tm[hours],$tm[minutes],$tm[seconds]);

		if 	($SECRET_QUESTION==1) $secret_question = L_PASS_2;
		if 	($SECRET_QUESTION==2) $secret_question = L_PASS_3;
		if 	($SECRET_QUESTION==3) $secret_question = L_PASS_4;
		if 	($SECRET_QUESTION==4) $secret_question = L_PASS_5;

		if (isset($COLORNAME))
		{
			$C = $COLORNAME;
			setcookie("CookieColor", $C, time() + 60*60*24*365);        // cookie expires in one year
		}

// Patch to send an email to the User after registration.
// by Ciprian using Bob Dickow's one above.
	$Headers = "From: ${Sender_Name} <${Sender_email}>".$eol;
	$Headers .= "X-Sender: ${Sender_email}".$eol;
	$Headers .= "X-Mailer: PHP/".PHP_VERSION.$eol;
	$Headers .= "Return-Path: ${Sender_email}".$eol;
	$Headers .= "Date: ${mail_date}".$eol;
	$Headers .= "Mime-Version: 1.0".$eol;
	$Headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
	$Headers .= "Content-Transfer-Encoding: 8bit".$eol;
	if (C_EMAIL_USER || (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@") && $Sender_email != "your@email.com"))
	{
   	if (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@")) $emailMessage = L_EMAIL_VAL_31.$eol.$eol.sprintf(L_EMAIL_VAL_32,((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME),$Chat_URL).$eol.$eol;
    else $emailMessage = sprintf(L_EMAIL_VAL_4,((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME),$Chat_URL).$eol.$eol;
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
     $emailMessage .= ""
     . "----------------------------------------------".$eol
     . "".L_SET_2.": ".$U.$eol
	 . "".L_REG_1.": ".$pmc_password.$eol
     . "----------------------------------------------".$eol
	 . "".L_EMAIL_VAL_81." (".$Chat_URL.")".$eol
     . "----------------------------------------------".$eol.$eol
     . "".L_PASS_1.": ".$secret_question.$eol
     . "".L_PASS_6.": ".$SECRET_ANSWER.$eol
     . "".L_REG_8.": ".$EMAIL.$eol;
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
	 $longdtformat = ($L == "english" ? str_replace("%d of", ((stristr(PHP_OS,'win') ? "%#d" : "%e").date('S')." of"), L_LONG_DATETIME) : L_LONG_DATETIME);
	 if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $longdtformat = str_replace(" ","",$longdtformat);
	 $emailMessage .= "".L_PRO_7.": ".($BIRTHDAY != "0000-00-00" && $BIRTHDAY != "" ? $format_birth_day : L_NOT_SELECTED).$eol
     . "".L_REG_33.": ".$shweml.$eol
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
	 . "".L_GRAV_USE.": ".$usegrav." (".(!ALLOW_GRAVATARS ? L_DISABLED : L_ENABLED).")".$eol
     . "----------------------------------------------".$eol
	 . "".sprintf(L_EMAIL_VAL_6,strftime($longdtformat,time())).$eol
     . "----------------------------------------------".$eol.$eol
     . "".L_EMAIL_VAL_8.$eol.$eol
     .  $Mail_Greeting.$eol.$Sender_Name1.$eol.$Chat_URL;
		$emailMessage = stripslashes($emailMessage);
		$Subject = sprintf(L_EMAIL_VAL_5,$U,"[".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]");
		$Subject = quote_printable($Subject,$Charset);
		if (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@") && $Sender_email != "your@email.com")
		{
			@mail($Sender_Name." <".$Sender_email.">", $Subject, $emailMessage, $Headers);
		}
	   else
		{
			@mail($FIRSTNAME ? $FIRSTNAME." <".$EMAIL.">" : $U." <".$EMAIL.">", $Subject, $emailMessage, $Headers);
		}
  	};
// End of patch to send an email to the User after registration.

	if (C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@") && $Sender_email != "your@email.com")
	{
		if 	($SECRET_QUESTION==1) $secret_questiona = "What make was your first car?";
		if 	($SECRET_QUESTION==2) $secret_questiona = "What was your first pet name?";
		if 	($SECRET_QUESTION==3) $secret_questiona = "What is your favorite drink?";
		if 	($SECRET_QUESTION==4) $secret_questiona = "What is your birth date?";

		if ($GENDER == 1) $sex = "male";
		elseif ($GENDER == 2) $sex = "female";
		elseif ($GENDER == 3) $sex = "couple";
		elseif ($GENDER == 4) $sex = "undisclosed";
		else $sex = "unspecified";

		if ($showemail) {
			$shweml = "yes";
		} else {
			$shweml = "no";
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
     $emailMessage = "New user registration notification for ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)." at ".$Chat_URL." :".$eol.$eol
     . "----------------------------------------------".$eol
     . "Username: ".$U.$eol
	 . "Password: ".$pmc_password.$eol
     . "----------------------------------------------".$eol.$eol
     . "Secret question: ".$secret_questiona.$eol
     . "Secret answer: ".$SECRET_ANSWER.$eol
     . "Email: ".$EMAIL
	 . $eol."Display email address in public info: ".$shweml
     . ($FIRSTNAME ? $eol."First name: ".$FIRSTNAME : "")
     . ($LASTNAME ? $eol."Last name: ".$LASTNAME : "")
     . ($BIRTHDAY != "" ? $eol."Date of birth: ".$BIRTHDAY : "")
     . ($BIRTHDAY != "" ? $eol."Display birthday in public info: ".$shwbday : "")
     . ($BIRTHDAY != "" ? $eol."Display age in public info: ".$shwage : "")
     . $eol."Gender: ".$sex
     . ($COUNTRY ? $eol."Country: ".$COUNTRY : "")
     . ($WEBSITE ? $eol."WWW: ".$WEBSITE."" : "")
     . ($SLANG ? $eol.$eol."Language: ".$SLANG : "")
     . ($FAVLINK ? $eol.$eol."Favorite link 1: ".$FAVLINK : "")
     . ($FAVLINK1 ? $eol."Favorite link 2: ".$FAVLINK1 : "")
     . ($DESCRIPTION ? $eol."Description: ".$DESCRIPTION : "")
     . ($PICTURE ? $eol."Picture: ".$PICTURE : "")
	 . $eol."Color name/text: ".($C ? $C : "Not selected")." (".(COLOR_NAMES ? "Enabled" : "Disabled").")"
	 . ($usegrav ? $eol."Use the Gravatar: ".$usegrav." (".(ALLOW_GRAVATARS ? "Enabled" : "Disabled").")" : "")
     . $eol
	 . "----------------------------------------------".$eol
     . "Prefered language: ".$L.$eol
     . "Registered on: $dt $ti".$eol
     . "From IP address: $IP (".gethostbyaddr($IP).")".$eol
	 . "----------------------------------------------".$eol.$eol
	 . "Please note that some data should be disabled from this copy for privacy concerns!".$eol
	 . "Save this email for your further reference.".$eol
	 . "Enjoy!";
		$Subject = "New User - ".$U." - Registration notification for [".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."]";
		$Subject = quote_printable($Subject,$Charset);
		$emailMessage = stripslashes($emailMessage);
		@mail($Sender_Name." <".$Sender_email.">", $Subject, $emailMessage, $Headers);
// end of patch to send an email to the Admin at the time of new user registration.
	};
			};
		}
	}
}

// Registration has been done ?
$done = (isset($Message) && ($Message == L_REG_9 || $Message == ""));

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(L_REG_6." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<?php
require("./plugins/calendar/tc_calendar.php");
?>
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
}
// -->
</SCRIPT>
</HEAD>

<BODY onLoad="if (window.focus) get_focus();">
<CENTER>
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
			<TH COLSPAN=2><?php if (!$done) echo(L_REG_37); elseif (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "") echo(L_EMAIL_VAL_PENDING_Done."<br />".L_EMAIL_VAL_PENDING_Done1); elseif (C_EMAIL_PASWD && C_EMAIL_USER) echo(L_EMAIL_VAL_Done); ?></TH>
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
					               if (!empty($avatar))
					               {
					                 $AVATARURL = $avatar;
					               }
					               elseif (!empty($url))
					               {
					               		$AVATARURL = $url;
					               }
                        if (empty($avatar)) {
                          if (empty($AVATARURL)) $AVATARURL = C_AVA_RELPATH . C_DEF_AVATAR;
                          $avatar = $AVATARURL;
                        }
                        ?>
							<a href="<?php echo("avatar.php?User=$U&L=$L&avatar=$avatar&ORIGAVATAR=$avatar&From=register.php&Link=$Link"); ?>" onClick="return confirm('<?php echo(L_SEL_NEW_AV_CONFIRM) ?>');" onMouseOver="window.status='<?php echo(L_SEL_NEW_AV) ?>.'; return true;" title="<?php echo(L_SEL_NEW_AV); ?>" target="_self">
                      	<img src="<?php echo($avatar); ?>" align="center" border="0" width="<?php echo(C_AVA_WIDTH);?>" height="<?php echo(C_AVA_HEIGHT);?>" alt="<?php echo(L_SEL_NEW_AV); ?>"></a>&nbsp;
							<input type="hidden" name="ORIGAVATAR" value="<?php echo($avatar);?>">
							<input type="hidden" name="avatar" value="<?php echo($avatar); ?>">
			</TD>
		</TR>
<?php
				// Gravatars initialization
				if (isset($EMAIL) && $EMAIL != "") $email = $EMAIL;
				if (isset($U) && $U != "" && isset($email)) $User = $U;
#				if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
				if (stripos($avatar,C_AVA_RELPATH) !== false) $local_avatar = 1;
				else $local_avatar = 0;
				require("plugins/gravatars/get_gravatar.php");
				?>
				<TR>
					<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP">Gravatar :</TD>
				 	<TD VALIGN="TOP">
				<?php
					echo("<a href=\"http://www.gravatar.com\" title=\"".sprintf(L_CLICK,L_LINKS_19)."\" target=\"_blank\">".$gravatarTag."</a>");
				?>
				&nbsp;<INPUT type="checkbox" name="USE_GRAV" value="1" <?php if((isset($USE_GRAV) && $USE_GRAV) || !isset($USE_GRAV)) echo("checked"); ?><?php if ($done|| $ALLOW_GRAVATARS != 1) echo(" READONLY"); ?>>&nbsp;<?php echo(L_GRAV_USE); ?>
					</TD>
				</TR>
				<?php
                        }
                        ?>
<!-- Avatar System End  -->
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_SET_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="U" SIZE=15 MAXLENGTH=15<?php echo($field_errorU ? " style=\"background-color: #FF0000;\"" : ""); ?> VALUE="<?php if (isset($U)) echo(htmlspecialchars(stripslashes($U))); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<?php
		if (!C_EMAIL_PASWD)
		{
			?>
			<TR>
				<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :</TD>
				<TD VALIGN="TOP">
					<INPUT TYPE="password" NAME="pmc_password" AUTOCOMPLETE="OFF" SIZE=15 MAXLENGTH=15 VALUE="<?php if (isset($pmc_password)) echo(htmlspecialchars(stripslashes($pmc_password))); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
				</TD>
			</TR>
			<?php
		};
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_8); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="EMAIL" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($EMAIL)) echo(stripslashes($EMAIL)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
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
<?php
if(!(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")))
{
?>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_30); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if(isset($FIRSTNAME)) echo(stripslashes($FIRSTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_31); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if(isset($LASTNAME)) echo(stripslashes($LASTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
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
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if(isset($LASTNAME)) echo(stripslashes($LASTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_30); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=25 MAXLENGTH=64 VALUE="<?php if(isset($FIRSTNAME)) echo(stripslashes($FIRSTNAME)); ?>"<?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php if (!$done && C_REQUIRE_NAMES) echo("<SPAN CLASS=\"error\">*</SPAN>"); ?>
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
			  $myCalendar->setIcon("plugins/calendar/images/iconCalendar.gif");
			  $myCalendar->setPath("plugins/calendar/");
			  if(isset($BIRTHDAY))
			  {
			    $birth_day = strtotime($BIRTHDAY);
				$myCalendar->setDate(date('d',$birth_day), date('m',$birth_day), date('Y',$birth_day));
			  }
			  $myCalendar->setYearInterval(1901, date('Y'));
			  $myCalendar->dateAllow('1901-01-01', date('Y-m-d'));
				$DbLink->query("SELECT username,birthday,show_age FROM ".C_REG_TBL." WHERE birthday != '' AND birthday != '0000-00-00' AND show_bday = '1' ORDER BY birthday ASC");
				if ($DbLink->num_rows() != 0)
				{
					include_once('plugins/birthday/age.class.php');
					$my_dob = new DateOfBirth();
					while(list($birthname, $birthday, $show_age) = $DbLink->next_record())
					{
						if ($show_age)
						{
							$my_dobtime = strtotime($birthday);
							$my_dob->birth_num_year = date('Y',$my_dobtime);
							$my_dob->birth_num_month = date('n',$my_dobtime);
							$my_dob->birth_num_day = date('j',$my_dobtime);
							$my_dob->calculate_age();
							$age = $my_dob->age;
						}
						$myCalendar->setToolTips(array($birthday), $show_age ? $birthname." (".$age.")" : $birthname, 'year');
						unset($age, $my_dobtime);
					}
				$DbLink->clean_results();
				}
			  $myCalendar->writeScript();
$DbLink->close();
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
				<INPUT type="checkbox" name="SHOWEMAIL" value="1" <?php if ((isset($SHOWEMAIL) && $SHOWEMAIL) || !isset($SHOWEMAIL)) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_REG_33); ?>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOW_BDAY" value="1" <?php if ((isset($SHOW_BDAY) && $SHOW_BDAY) || !isset($SHOW_BDAY)) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_PRO_8); ?>
			</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOW_AGE" value="1" <?php if ((isset($SHOW_AGE) && $SHOW_AGE) || !isset($SHOW_AGE)) echo("checked"); ?><?php if ($done) echo(" READONLY"); ?>>&nbsp;<?php echo(L_PRO_9); ?>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_36); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="COUNTRY" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($COUNTRY)) echo(stripslashes($COUNTRY)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_32); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="WEBSITE" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($WEBSITE)) echo(stripslashes($WEBSITE)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_1a); ?> :</TD>
			<TD VALIGN="TOP">
		<?php
			// Available languages
			$AvailableLanguages = array();
			$languageDirectories = dir('./'.$ChatPath.'localization/');
			while($langname = $languageDirectories->read())
			{
				if(is_dir('./'.$ChatPath.'localization/'.$langname)
					&& file_exists('./'.$ChatPath.'localization/'.$langname.'/regex.txt')
					&& file_exists('./'.$ChatPath.'localization/'.$langname.'/localized.chat.php')
					&& file_exists('./'.$ChatPath.'localization/'.$langname.'/images/flag.gif'))
				{
					list($key) = file('./'.$ChatPath.'localization/'.$langname.'/regex.txt');
					$AvailableLanguages[$key] = $langname;
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
			while(list($key, $langname) = each($AvailableLanguages))
			{
				if ($langname == "argentinian_spanish" && L_ORIG_LANG_AR != "L_ORIG_LANG_AR") $FLAG_NAME = L_ORIG_LANG_AR;
				elseif ($langname == "bulgarian" && L_ORIG_LANG_BG != "L_ORIG_LANG_BG") $FLAG_NAME = L_ORIG_LANG_BG;
				elseif ($langname == "brazilian_portuguese" && L_ORIG_LANG_BR != "L_ORIG_LANG_BR") $FLAG_NAME = L_ORIG_LANG_BR;
				elseif ($langname == "catalan" && L_ORIG_LANG_CA != "L_ORIG_LANG_CA") $FLAG_NAME = L_ORIG_LANG_CA;
				elseif ($langname == "chinese_simplified" && L_ORIG_LANG_CNS != "L_ORIG_LANG_CNS") $FLAG_NAME = L_ORIG_LANG_CNS;
				elseif ($langname == "chinese_traditional" && L_ORIG_LANG_CNT != "L_ORIG_LANG_CNT") $FLAG_NAME = L_ORIG_LANG_CNT;
				elseif ($langname == "czech" && L_ORIG_LANG_CZ != "L_ORIG_LANG_CZ") $FLAG_NAME = L_ORIG_LANG_CZ;
				elseif ($langname == "danish" && L_ORIG_LANG_DA != "L_ORIG_LANG_DA") $FLAG_NAME = L_ORIG_LANG_DA;
				elseif ($langname == "dutch" && L_ORIG_LANG_NL != "L_ORIG_LANG_NL") $FLAG_NAME = L_ORIG_LANG_NL;
				elseif ($langname == "english" && L_ORIG_LANG_EN != "L_ORIG_LANG_EN") $FLAG_NAME = L_ORIG_LANG_EN;
				elseif ($langname == "french" && L_ORIG_LANG_FR != "L_ORIG_LANG_FR") $FLAG_NAME = L_ORIG_LANG_FR;
				elseif ($langname == "georgian" && L_ORIG_LANG_KA != "L_ORIG_LANG_KA") $FLAG_NAME = L_ORIG_LANG_KA;
				elseif ($langname == "german" && L_ORIG_LANG_DE != "L_ORIG_LANG_DE") $FLAG_NAME = L_ORIG_LANG_DE;
				elseif ($langname == "greek" && L_ORIG_LANG_GR != "L_ORIG_LANG_GR") $FLAG_NAME = L_ORIG_LANG_GR;
				elseif ($langname == "hebrew" && L_ORIG_LANG_HE != "L_ORIG_LANG_HE") $FLAG_NAME = L_ORIG_LANG_HE;
				elseif ($langname == "hindi" && L_ORIG_LANG_HI != "L_ORIG_LANG_HI") $FLAG_NAME = L_ORIG_LANG_HI;
				elseif ($langname == "hungarian" && L_ORIG_LANG_HU != "L_ORIG_LANG_HU") $FLAG_NAME = L_ORIG_LANG_HU;
				elseif ($langname == "indonesian" && L_ORIG_LANG_ID != "L_ORIG_LANG_ID") $FLAG_NAME = L_ORIG_LANG_ID;
				elseif ($langname == "italian" && L_ORIG_LANG_IT != "L_ORIG_LANG_IT") $FLAG_NAME = L_ORIG_LANG_IT;
				elseif ($langname == "japanese" && L_ORIG_LANG_JA != "L_ORIG_LANG_JA") $FLAG_NAME = L_ORIG_LANG_JA;
				elseif ($langname == "nepali" && L_ORIG_LANG_NE != "L_ORIG_LANG_NE") $FLAG_NAME = L_ORIG_LANG_NE;
				elseif ($langname == "norwegian_bokmal" && L_ORIG_LANG_NB != "L_ORIG_LANG_NB") $FLAG_NAME = L_ORIG_LANG_NB;
				elseif ($langname == "norwegian_nynorsk" && L_ORIG_LANG_NN != "L_ORIG_LANG_NN") $FLAG_NAME = L_ORIG_LANG_NN;
				elseif ($langname == "persian" && L_ORIG_LANG_FA != "L_ORIG_LANG_FA") $FLAG_NAME = L_ORIG_LANG_FA;
				elseif ($langname == "polish" && L_ORIG_LANG_PL != "L_ORIG_LANG_PL") $FLAG_NAME = L_ORIG_LANG_PL;
				elseif ($langname == "portuguese" && L_ORIG_LANG_PT != "L_ORIG_LANG_PT") $FLAG_NAME = L_ORIG_LANG_PT;
				elseif ($langname == "romanian" && L_ORIG_LANG_RO != "L_ORIG_LANG_RO") $FLAG_NAME = L_ORIG_LANG_RO;
				elseif ($langname == "russian" && L_ORIG_LANG_RU != "L_ORIG_LANG_RU") $FLAG_NAME = L_ORIG_LANG_RU;
				elseif ($langname == "serbian_latin" && L_ORIG_LANG_SRL != "L_ORIG_LANG_SRL") $FLAG_NAME = L_ORIG_LANG_SRL;
				elseif ($langname == "serbian_cyrillic" && L_ORIG_LANG_SRC != "L_ORIG_LANG_SRC") $FLAG_NAME = L_ORIG_LANG_SRC;
				elseif ($langname == "slovak" && L_ORIG_LANG_SK != "L_ORIG_LANG_SK") $FLAG_NAME = L_ORIG_LANG_SK;
				elseif ($langname == "spanish" && L_ORIG_LANG_ES != "L_ORIG_LANG_ES") $FLAG_NAME = L_ORIG_LANG_ES;
				elseif ($langname == "swedish" && L_ORIG_LANG_SV != "L_ORIG_LANG_SV") $FLAG_NAME = L_ORIG_LANG_SV;
				elseif ($langname == "thai" && L_ORIG_LANG_TH != "L_ORIG_LANG_TH") $FLAG_NAME = L_ORIG_LANG_TH;
				elseif ($langname == "turkish" && L_ORIG_LANG_TR != "L_ORIG_LANG_TR") $FLAG_NAME = L_ORIG_LANG_TR;
				elseif ($langname == "ukrainian" && L_ORIG_LANG_UK != "L_ORIG_LANG_UK") $FLAG_NAME = L_ORIG_LANG_UK;
				elseif ($langname == "urdu" && L_ORIG_LANG_UR != "L_ORIG_LANG_UR") $FLAG_NAME = L_ORIG_LANG_UR;
				elseif ($langname == "vietnamese" && L_ORIG_LANG_VI != "L_ORIG_LANG_VI") $FLAG_NAME = L_ORIG_LANG_VI;
				elseif ($langname == "yoruba" && L_ORIG_LANG_YO != "L_ORIG_LANG_YO") $FLAG_NAME = L_ORIG_LANG_YO;
				else
				{
					$FLAG_NAME = str_replace("_"," ",$langname);
					$FLAG_NAME = mb_convert_case($FLAG_NAME,MB_CASE_TITLE,$Charset);
				}
				$i++;
				?>
				<OPTION VALUE="<?php echo $langname ?>" <?php if($L==$langname || $SLANG==$langname){ echo " selected"; $langnamesel = $langname; } ?>><?php echo ($FLAG_NAME); ?></OPTION>
					<?php
			};
			unset($AvailableLanguages);
			if($langnamesel == "english" && C_ENGLISH_FORMAT == "US")
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
	    </SELECT>&nbsp;<img style="vertical-align:middle" id="flagToSwap" src="<?php echo("./".$ChatPath."localization/".$langnamesel."/images/".(C_FLAGS_3D ? $flagsel_3d : $flagsel)); ?>" />
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($FAVLINK)) echo(stripslashes($FAVLINK)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_3); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK1" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($FAVLINK1)) echo(stripslashes($FAVLINK1)); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_4); ?> :</TD>
			<TD VALIGN="TOP">
				<TEXTAREA NAME="DESCRIPTION" COLS=27 ROWS=3 WRAP=ON<?php if ($done) echo(" READONLY"); ?>><?php if (isset($DESCRIPTION)) echo(stripslashes($DESCRIPTION)); ?></TEXTAREA>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_5); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="PICTURE" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($PICTURE)) echo(stripslashes($PICTURE)); ?>"<?php if ($done) echo(" READONLY"); ?>>
				<?php
				if (isset($PICTURE) && stripslashes($PICTURE) != "" && ini_get("allow_url_fopen") && file(stripslashes($PICTURE)))
				{
				?>
					<IMG src="<?php echo(stripslashes($PICTURE)); ?>" width = "<?php echo(C_AVA_WIDTH); ?>" ALT="<?php echo(L_PRO_5); ?>" />
				<?php
				}
				?>
			</TD>
		</TR>
<?php
if (COLOR_NAMES)
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
		if (COLOR_CA != "") $ColorList = str_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = str_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = str_replace('"'.COLOR_CA2.'",', "", $ColorList);
		if (COLOR_CM != "") $ColorList = str_replace('"'.COLOR_CM.'",', "", $ColorList);
		if (COLOR_CM1 != "") $ColorList = str_replace('"'.COLOR_CM1.'",', "", $ColorList);
		if (COLOR_CM2 != "") $ColorList = str_replace('"'.COLOR_CM2.'",', "", $ColorList);
}
$ColorList = str_replace('"', "", $ColorList);
$CC = explode(",", $ColorList);
$selected = ((L_SELECTED_F != "") ? L_SELECTED_F : L_SELECTED);
$not_selected = ((L_NOT_SELECTED_F != "") ? L_NOT_SELECTED_F : L_NOT_SELECTED);
$null = ((L_NULL_F != "") ? L_NULL_F : L_NULL);
$selected = " (".$selected.")";
$not_selected = " ".$null." (".$not_selected.")";
#			if ($Ver != "H" || (eregi("firefox|chrome|opera|safari", $_SERVER['HTTP_USER_AGENT']) && !eregi("MSIE", $_SERVER['HTTP_USER_AGENT']))) echo("<SELECT NAME=\"COLORNAME\" style=\"background-color:".$COLORNAME.";\">\n");
			if ($Ver != "H" || (preg_match("/[firefox|chrome|opera|safari]/i", $_SERVER['HTTP_USER_AGENT']) && stripos($_SERVER['HTTP_USER_AGENT'],"MSIE") === false)) echo("<SELECT NAME=\"COLORNAME\" style=\"background-color:".$COLORNAME.";\">\n");
			else echo("<SELECT NAME=\"COLORNAME\">");
			while(list($ColorNumber1, $ColorCode) = each($CC))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:".COLOR_CD."\" VALUE=\"".$ColorCode."\"");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
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