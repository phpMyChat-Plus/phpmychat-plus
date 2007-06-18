<?php
// This libray is used during the registration process. It generates a random
// password (function gen_password) then send it by email to the user (function
// send_email).
// Note that the php mail function must be enabled to run this functionality. If
// an other function has been developed by your ISP to send PHP mail, just modify
// the send_email function to make in runable.

// -- SETTINGS BELLOW MUST BE COMPLETED IN ADMIN PANEL --

$Paswd_Length = C_PASS_LENGTH;					// Length of the password to be generated
$Sender_Name = C_ADMIN_NAME;		// May also be the name of your site
$Sender_email = C_ADMIN_EMAIL;			// For the reply address
$Chat_URL = C_CHAT_URL;	// To be send as a signature

// -- FUNCTIONS --

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

function quote_printable($str,$WithCharset)
{
	$str = str_replace("%","=",rawurlencode($str));
	return "=?${WithCharset}?Q?${str}?=";
};

	$mail_date = rfcDate();
	$Sender_Name = quote_printable($Sender_Name,$Charset);

function send_email($Subject,$userString,$pswdString,$welcomeString)
{
	global $Charset;
	global $EMAIL, $U, $pmc_password;
	global $Chat_URL;
	global $Sender_Name, $Sender_email;
	global $mail_date;

	$Subject = quote_printable($subject,$Charset);

	$body =  $userString.": $U\n";
	$body .= $pswdString.": $pmc_password\n\n";
	$body .= $welcomeString."\n";
	$body .= $Chat_URL."\n";
	$body = stripslashes($body);

	$headers = "From: ${Sender_Name} <${Sender_email}> \r\n";
	$headers .= "X-Sender: <${Sender_email}> \r\n";
	$headers .= "X-Mailer: PHP/".phpversion()." \r\n";
	$headers .= "Return-Path: <${Sender_email}> \r\n";
	$headers .= "Date: ${mail_date} \r\n";
	$headers .= "Mime-Version: 1.0 \r\n";
	$headers .= "Content-Type: text/plain; charset=${Charset} \r\n";
	$headers .= "Content-Transfer-Encoding: 8bit \r\n";

	return @mail($EMAIL, $Subject, $body, $headers);
};
?>