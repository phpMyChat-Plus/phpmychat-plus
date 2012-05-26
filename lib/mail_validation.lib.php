<?php
// This libray is used during the registration process. It generates a random
// password (function gen_password) then send it by email to the user (function
// send_email).
// Note that the php mail function must be enabled to run this functionality. If
// an other function has been developed by your ISP to send PHP mail, just modify
// the send_email function to make in runable.

// -- SETTINGS BELOW MUST BE COMPLETED IN ADMIN PANEL --

$Paswd_Length = C_PASS_LENGTH;					// Length of the password to be generated
$Sender_Name = stristr(C_ADMIN_NAME,"your name") ? "Chat Admin" : C_ADMIN_NAME;		// May also be the name of your site
$Sender_Name1 = $Sender_Name;		// unformated
$Sender_email = C_ADMIN_EMAIL;			// For the reply address
$Mail_Greeting = C_MAIL_GREETING;	// To be send as a signature
$Chat_URL = (C_CHAT_URL == "./") ? "" : C_CHAT_URL;	// To be send as a signature


// -- CORE FUNCTIONS - DO NOT MODIFY --
$MailFunctionOn = (function_exists("mail"));

# Is the OS Windows or Mac or Linux
if (stristr(PHP_OS,'win')) {
  $eol="\r\n";
} elseif (stristr(PHP_OS,'mac')) {
  $eol="\r";
} else {
  $eol="\n";
}

// Define in_array-like function for php
if (!function_exists("in_array"))
{
	function in_array($needle,$haystack)
	{
		for($i=0;$i<count($haystack) && $haystack[$i] !=$needle;$i++);
		return ($i!=count($haystack));
	};
};

// Credit for the function that generate password goes to halcyon_42.
// http://www.zend.com/codex.php?id=149&single=1
function gen_password()
{
	global $Paswd_Length;

	// set ASCII range for random character generation
	$lower_ascii_bound = 50;          // "2"
	$upper_ascii_bound = 122;       // "z"

	// Exclude special characters and some confusing alphanumerics
	// o,O,0,I,1,l etc
	$notuse = array (58,59,60,61,62,63,64,73,79,91,92,93,94,95,96,108,111);

	$i = 0;
	$password = '';
	while ($i < $Paswd_Length)
	{
		mt_srand((double)microtime() * 1000000);
		// random limits within ASCII table
		$randnum = mt_rand($lower_ascii_bound, $upper_ascii_bound);
		if (!in_array($randnum, $notuse))
		{
			$password = $password.chr($randnum);
			$i++;
		};
	};

	return $password;
};

// Credits for this function goes to fwancho <fwancho@whc.net>
// It can be found at the URL: http://www.zend.com/codex.php?id=307&single=1
if (!function_exists("rfcDate"))
{
	function rfcDate()
	{
		// Translated from imap-4.7c/src/osdep/unix/env_unix.c
		// env-unix.c is Copyright 2000 by the University of Washington
		// localtime() not available in php...

		$tn = time(0);
		$zone = gmdate("H", $tn) * 60 + gmdate("i", $tn);
		$julian = gmdate("z", $tn);
		$t = getdate($tn);
		$zone = $t["hours"] * 60 + $t["minutes"] - $zone;

		// julian can be one of:
		//  36x  local time is December 31, UTC is January 1, offset -24 hours
		//    1  local time is 1 day ahead of UTC, offset +24 hours
		//    0  local time is same day as UTC, no offset
		//   -1  local time is 1 day behind UTC, offset -24 hours
		// -36x  local time is January 1, UTC is December 31, offset +24 hours
		if ($julian = $t["yday"] - $julian)
		{
			$zone += (($julian < 0) == (abs($julian) == 1)) ? -24*60 : 24*60;
		};

		$zone_sign = ($zone > 0 ? "+" : "-");

		return date('D, d M Y H:i:s ', $tn).$zone_sign.sprintf("%02d%02d", abs($zone)/60, abs($zone)%60)." (".strftime("%Z").")";
	}
}

if (!function_exists("quote_printable"))
{
	function quote_printable($str,$WithCharset)
	{
		$str = str_replace("%","=",rawurlencode($str));
		return "=?${WithCharset}?Q?${str}?=";
	};
};
	if ($Sender_Name != "") $Sender_Name = quote_printable($Sender_Name,$Charset);
	$mail_date = rfcDate();

function send_email($subject,$userString,$pswdString,$welcomeString,$reset)
{
	global $Charset;
	global $EMAIL, $U, $FIRSTNAME, $pmc_password;
	global $Mail_Greeting, $Chat_URL;
	global $Sender_Name, $Sender_Name1, $Sender_email;
	global $mail_date, $eol;

	$Subject = quote_printable($subject,$Charset);

	$body =  $userString.": ".$U.$eol;
	if ($reset) $body .= $pswdString.": ".$pmc_password.$eol.$eol;
	elseif (C_EMAIL_PASWD && !C_EMAIL_USER && C_ADMIN_NOTIFY && $Sender_email != "" && strstr($Sender_email,"@") && $Sender_email != "your@email.com") $body .= $pswdString.$eol.$eol;
	$body .= $welcomeString.$eol;
	$body .= $Mail_Greeting.$eol.$Sender_Name1.$eol.$Chat_URL;
	$body = stripslashes($body);

	$headers = "From: ${Sender_Name} <${Sender_email}>".$eol;
	$headers .= "Bcc: ${Sender_email}".$eol;
	$headers .= "X-Sender: ${Sender_email}".$eol;
	$headers .= "X-Mailer: PHP/".PHP_VERSION.$eol;
	$headers .= "Return-Path: ${Sender_email}".$eol;
	$headers .= "Date: ${mail_date}".$eol;
	$headers .= "Mime-Version: 1.0".$eol;
	$headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
	$headers .= "Content-Transfer-Encoding: 8bit".$eol;

	return @mail($FIRSTNAME != "" ? $FIRSTNAME : $U." <".$EMAIL.">", $Subject, $body, $headers);
};

function send_dob_email($dob_name,$dob_email,$dob_subject,$DOB_String)
{
	global $Charset;
	global $Mail_Greeting, $Chat_URL;
	global $Sender_Name, $Sender_Name1, $Sender_email;
	global $mail_date, $dob1_subject, $dob_birthday, $eol;

	$dob_subject = quote_printable($dob_subject,$Charset);

	$dob_body = $DOB_String.$eol;
	$dob_body .= $dob1_subject.$eol.$dob_birthday.$eol.$eol.$Mail_Greeting.$eol.$Sender_Name1.$eol.$Chat_URL;
	$dob_body = stripslashes($dob_body);

	$dob_headers = "From: ${Sender_Name} <${Sender_email}>".$eol;
	$dob_headers .= "Bcc: ${Sender_email}".$eol;
	$dob_headers .= "X-Sender: ${Sender_email}".$eol;
	$dob_headers .= "X-Mailer: PHP/".PHP_VERSION.$eol;
	$dob_headers .= "Return-Path: ${Sender_email}".$eol;
	$dob_headers .= "Date: ${mail_date}".$eol;
	$dob_headers .= "Mime-Version: 1.0".$eol;
	$dob_headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
	$dob_headers .= "Content-Transfer-Encoding: 8bit".$eol;

	return @mail($dob_name." <".$dob_email.">", $dob_subject, $dob_body, $dob_headers);
};

?>