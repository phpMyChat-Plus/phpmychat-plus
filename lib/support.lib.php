<?php
$pplang = L_LANG;
$ppalt = "PayPal - The safer, easier way to pay online.";
switch (L_LANG)
{
	case "bg_BG":
		$ppbutton = ($pptype == "big") ? "3626487" : "3626473";
		$ppexists = 0;
		break;
	case "da_DK":
		$ppbutton = ($pptype == "big") ? "3626398" : "3626431";
		$ppexists = 0;
		break;
	case "de_DE":
		$pplang .= "/DE";
		$ppbutton = ($pptype == "big") ? "3625065" : "3625046";
		$ppalt = "Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.";
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
	case "es_AR":
		$pplang = "es_ES/ES";
		$ppbutton = ($pptype == "big") ? "3626374" : "3626236";
		$ppalt = "PayPal. La forma rápida y segura de pagar en Internet.";
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
		$ppalt = "PayPal - la solution de paiement en ligne la plus simple et la plus sécurisée!";
		$ppexists = 1;
		break;
	case "hu_HU":
		$ppbutton = ($pptype == "big") ? "3626529" : "3626553";
		$ppexists = 0;
		break;
	case "it_IT":
		$pplang .= "/IT";
		$ppbutton = ($pptype == "big") ? "3625096" : "3625114";
		$ppalt = "PayPal - Il sistema di pagamento online più facile e sicuro!";
		$ppexists = 1;
		break;
	case "nl_NL":
		$pplang .= "/NL";
		$ppbutton = ($pptype == "big") ? "3625332" : "3625148";
		$ppalt = "PayPal, de veilige en complete manier van online betalen.";
		$ppexists = 1;
		break;
	case "ro_RO":
		$ppbutton = ($pptype == "big") ? "3626613" : "3626645";
		$ppalt = "PayPal - Calea cea mai sigură şi facilă de a efectua plăţi online.";
		$ppexists = 0;
		break;
	case "sr_CS":
		$ppbutton = ($pptype == "big") ? "3626707" : "3626691";
		$ppexists = 0;
		break;
	case "sv_SE":
		$ppbutton = ($pptype == "big") ? "3626744" : "3626768";
		$ppexists = 0;
		break;
	case "tr_TR":
		$ppbutton = ($pptype == "big") ? "3626822" : "3626800";
		$ppexists = 0;
		break;
	case "vi_VN":
		$ppbutton = ($pptype == "big") ? "3626846" : "3626856";
		$ppexists = 0;
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

$donate = ($ppexists ? $ppimage : (file_exists($pmcimage) ? $pmcimage : $defpmcimage));
?>