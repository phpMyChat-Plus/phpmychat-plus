<?php
// This library is used by the administration script. It allows to send emails to
// the registered users.
// Note that the php mail function must be enabled to run this functionality. If
// an other function has been developed by your ISP to send PHP mail, just modify
// the send_email function to make in runable.

#$Sender_Name = eregi("your name",C_ADMIN_NAME) ? "Chat Admin" : C_ADMIN_NAME;		// May also be the name of your site
$Sender_Name = (stripos(C_ADMIN_NAME,"your name") !== false && C_ADMIN_NAME != "") ? "" : C_ADMIN_NAME;		// May also be the name of your site
$Sender_Name1 = $Sender_Name;		// unformated
$Sender_email = C_ADMIN_EMAIL;			// For the reply address
$Mail_Greeting = C_MAIL_GREETING;	// To be send as a signature

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

if (isset($MailFunctionOn))
{
	if (!function_exists("quote_printable"))
	{
		function quote_printable($str,$WithCharset)
		{
			$str = str_replace("%","=",rawurlencode($str));
			return "=?${WithCharset}?Q?${str}?=";
		};
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
	};

	$mail_date = rfcDate();

	function send_email_admin($To,$Subject,$Body,$pmc_email,$BCC)
	{
		global $Charset;
		global $Sender_Name, $Sender_Name1, $Sender_email, $Chat_URL, $Ccopy, $pmc_username, $Mail_Greeting;
		global $mail_date, $eol, $bcc_list;
		
		$to_list = "";
		if(isset($BCC) && $BCC)
		{
			$bcc_list = $To;
		}
		else
		{
			$to_list = $To;
		}
		if($pmc_email != $Sender_email) $bcc_list .= " <${Sender_email}>";

		if ($Sender_Name != "") $Sender_Name = quote_printable($Sender_Name,$Charset);
		// Create a boundary so we know where to look for
		// the start of the data
		$boundary = uniqid("HTMLEMAIL");
		$Subject = quote_printable($Subject,$Charset);
		$Body = stripslashes($Body);
		$Headers = "From: ${Sender_Name} <${Sender_email}>".$eol;
		if ($Ccopy && ${pmc_email}) $Headers .= "Cc: ${pmc_username} <${pmc_email}>".$eol;
		if ($bcc_list != "") $Headers .= "Bcc: ".$bcc_list.$eol;
		if (${pmc_email}) $Headers .= "Reply-To: ${pmc_username} <${pmc_email}>".$eol;
		$Headers .= "X-Sender: ${Sender_email}".$eol;
		$Headers .= "X-Mailer: PHP/".PHPVERSION.$eol;
		$Headers .= "Return-Path: ${Sender_email}".$eol;
		$Headers .= "Date: ${mail_date}".$eol;
		$Headers .= "Mime-Version: 1.0".$eol;
		if (!stristr(PHP_OS,'win')) {
			// First we be nice and send a non-html version of our email
			$Headers .= "Content-Type: multipart/alternative; boundary = ".$boundary.$eol.$eol;
			$Headers .= "This is a MIME encoded message.".$eol.$eol;
			$Headers .= "--".$boundary.$eol;
			$Headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
	#		$Headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
	#		$Headers .= chunk_split(strip_tags($Body));
			$Headers .= "Content-Transfer-Encoding: ".(function_exists("base64_encode") ? "base64" : "8bit").$eol.$eol;
			$Headers .= function_exists("base64_encode") ? chunk_split(base64_encode(strip_tags($Body))) : chunk_split(strip_tags($Body));
			// Now we attach the HTML version
			$Headers .= "--".$boundary.$eol;
			$Headers .= "Content-Type: text/html; charset=${Charset}; format=flowed".$eol;
	#		$Headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
	#		$Headers .= chunk_split(str_replace($eol,"<br />",$Body));
			$Headers .= "Content-Transfer-Encoding: ".(function_exists("base64_encode") ? "base64" : "8bit").$eol.$eol;
			$Headers .= function_exists("base64_encode") ? chunk_split(base64_encode(str_replace($eol,"<br />",$Body))) : chunk_split(str_replace($eol,"<br />",$Body));
			
			// And then send the email ....
			return @mail($to_list, $Subject, "", $Headers);
		}
		else {
			$Headers .= "Content-Type: text/plain; charset=${Charset}; format=flowed".$eol;
			$Headers .= "Content-Transfer-Encoding: 8bit".$eol.$eol;
			$Body = chunk_split($Body);

			// And then send the email ....
			return @mail($to_list, $Subject, $Body, $Headers);
		};
	};

};
?>