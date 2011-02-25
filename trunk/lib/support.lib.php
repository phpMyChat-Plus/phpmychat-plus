﻿<?php
$pplang = L_LANG;
$ppalt = "PayPal - The safer, easier way to pay online!";
$ppexists = 0;
switch (L_LANG)
{
	case "bg_BG":
		$ppbutton = ($pptype == "big") ? "3626487" : "3626473";
		$ppalt = "PayPal - Сигурният и лесен начин да платите онлайн.";
		break;
	case "cs_CZ":
		$ppbutton = ($pptype == "big") ? "DBH7XN4YA7A2J" : "BTHKH33JLGLTN";
		$ppalt = "PayPal - bezpečnější, jednodušší způsob, jak zaplatit on-line!";
		break;
	case "da_DK":
		$ppbutton = ($pptype == "big") ? "3626398" : "3626431";
		$ppalt = "PayPal - Den sikreste og nemmeste måde at overføre penge online!";
		break;
	case "he_IL":
		$ppbutton = ($pptype == "big") ? "7148858" : "7148805";
		$ppalt = "פייפאל - הדרך הבטוחה, הקלה לשלם באינטרנט.";
		break;
	case "hu_HU":
		$ppbutton = ($pptype == "big") ? "3626529" : "3626553";
		$ppalt = "PayPal - Biztonságosabb és egyszerűbb módja az internetes fizetésnek.";
		break;
	case "id_ID":
		$ppbutton = ($pptype == "big") ? "7988359" : "7988406";
		$ppalt = "Paypal - Lebih aman dan mudah untuk pembayaran online.";
		break;
	case "ja_JP":
		$pplang .= "/JP";
		$ppbutton = ($pptype == "big") ? "RJK6MGRQVAJY2" : "ZCXGTP265VU6S";
		$ppalt = "PayPal－オンラインで安全、簡単にお支払い。";
		$ppexists = 1;
		break;
	case "ne_NP":
		$ppbutton = ($pptype == "big") ? "KYVK6TQWY4MXJ" : "QN9TYKJ49BM7S";
		$ppalt = "Paypal - ईन्टनेटबाट पैसा तिर्ने सजिलो र सुरक्षित माध्यम.";
		break;
	case "ro_RO":
		$ppbutton = ($pptype == "big") ? "3626613" : "3626645";
		$ppalt = "PayPal - Calea cea mai sigură şi facilă de a efectua plăţi online!";
		break;
	case "ru_RU":
		$ppbutton = ($pptype == "big") ? "6HRWUGAN73NPS" : "MGBHACRT5F4RE";
		$ppalt = "PayPal – безопасный и простой способ оплаты в Интернете.";
		break;
	case "sr_CS":
		$ppbutton = ($pptype == "big") ? "3626707" : "3626691";
		$ppalt = "PayPal - Bezbedniji i lakši način za on-line plaćanje.";
		break;
	case "sv_SE":
		$ppbutton = ($pptype == "big") ? "3626744" : "3626768";
		$ppalt = "PayPal - Det säkra, enkla sättet att betala online.";
		break;
	case "tr_TR":
		$ppbutton = ($pptype == "big") ? "3626822" : "3626800";
		$ppalt = "PayPal - çevrimiçi ödeme yapmanın en kolay ve güvenli yolu.";
		break;
	case "uk_UA":
		$ppbutton = ($pptype == "big") ? "WDA8GUU9GGSTS" : "T9MP68SK7HBKQ";
		$ppalt = "PayPal - безпечний і простий спосіб для оплати в інтернеті!";
		break;
	case "vi_VN":
		$ppbutton = ($pptype == "big") ? "3626846" : "3626856";
		$ppalt = "PayPal - Cách an toàn hơn, dễ dàng hơn để thanh toán trực tuyến.";
		break;
	case "de_DE":
		$pplang .= "/DE";
		$ppbutton = ($pptype == "big") ? "3625065" : "3625046";
		$ppalt = "Jetzt einfach, schnell und sicher online bezahlen - mit PayPal.";
		$ppexists = 1;
		break;
	case "en_GB":
		$ppbutton = ($pptype == "big") ? "3624988" : "3625025";
		$ppexists = 1;
		break;
	case "en_US":
		$ppbutton = ($pptype == "big") ? "3624700" : "3624768";
		$ppexists = 1;
		break;
	case "ca_ES":
		$pplang = "es_ES/ES";
		$ppbutton = ($pptype == "big") ? "3620198" : "3624872";
		$ppalt = "PayPal - La manera més segur, més fàcil de pagar en línia!";
		$ppexists = 1;
		break;
	case "es_AR":
		$pplang = "es_ES/ES";
		$ppbutton = ($pptype == "big") ? "3626374" : "3626236";
		$ppalt = "PayPal - La forma segura y fácil de pagar en línea.";
		$ppexists = 1;
		break;
	case "es_ES":
		$pplang .= "/ES";
		$ppbutton = ($pptype == "big") ? "3620198" : "3624872";
		$ppalt = "PayPal. La forma rápida y segura de pagar en Internet.";
		$ppexists = 1;
		break;
	case "fr_FR":
		$pplang .= "/FR";
		$ppbutton = ($pptype == "big") ? "3624960" : "3624901";
		$ppalt = "PayPal - Le moyen le plus sûr et facile de payer en ligne!";
		$ppexists = 1;
		break;
	case "it_IT":
		$pplang .= "/IT";
		$ppbutton = ($pptype == "big") ? "3625096" : "3625114";
		$ppalt = "PayPal - La più sicura, facile strada per pagare online";
		$ppexists = 1;
		break;
	case "nl_NL":
		$pplang .= "/NL";
		$ppbutton = ($pptype == "big") ? "3625332" : "3625148";
		$ppalt = "PayPal, de veilige en complete manier van online betalen.";
		$ppexists = 1;
		break;
	default:
		$pplang = "en_US";
		$ppbutton = ($pptype == "big") ? "3625361" : "3625382";
		$ppexists = 1;
		break;
};
switch ($pptype)
{
	case "big":
		$ppimage = "https://www.paypal.com/$pplang/i/btn/btn_donateCC_LG.gif";
		$pmcimage = "./localization/".$L."/images/paypal_donate.gif";
		$defpmcimage = "./localization/english/images/paypal_donate.gif";
		break;
	case "small":
		$ppimage = "https://www.paypal.com/$pplang/i/btn/btn_donate_SM.gif";
		$pmcimage = "./localization/".$L."/images/make_a_donation.gif";
		$defpmcimage = "./localization/english/images/make_a_donation.gif";
		break;
};

if($ppexists == 1)
{
	function remote_file_exists ($url)
	{
	/*
		Return error codes:
		1 = Invalid URL host
		2 = Unable to connect to remote host
	*/
		$head = "";
		$url_p = parse_url ($url);

		if (isset ($url_p["host"]))
		{ $host = $url_p["host"]; }
		else
		{ return 1; }

		if (isset ($url_p["path"]))
		{ $path = $url_p["path"]; }
		else
		{ $path = ""; }

		$fp = @fsockopen ($host, 80, $errno, $errstr, 20);
		if (!$fp)
		{ return 2; }
		else
		{
			$parse = parse_url($url);
			$host = $parse['host'];

			@fputs($fp, "HEAD ".$url." HTTP/1.1\r\n");
			@fputs($fp, "HOST: ".$host."\r\n");
			@fputs($fp, "Connection: close\r\n\r\n");
			$headers = "";
			while (!feof ($fp))
			{ $headers .= @fgets ($fp, 128); }
		}
		@fclose ($fp);
		$arr_headers = explode("\n", $headers);
		$return = false;
		if (isset ($arr_headers[0]))
		{ $return = strpos ($arr_headers[0], "404") === false; }
		return $return;
	}

	if (remote_file_exists($ppimage) === true || is_file($ppimage) || file_exists($ppimage)) {}
	else $ppexists = 0;
}

$donate = ($ppexists ? $ppimage : (file_exists($pmcimage) ? $pmcimage : $defpmcimage));
?>