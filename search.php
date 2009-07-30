<?php
# Google AdSense for Search freeware add-on
# This file is intended to keep this software freeware and is not part of the open-source code of this software.
# It comes as a plugin which should bring a few cents to the developer of this Plus version of phpMyChat,  as a reward for his work.
# This will not cost you or any of your users anything. So please be kind and don't alter in any way this script.
# On the other hand, changing or removing it from this chat may result in getting you suspended from using this chat version!
# You will also not get any future support if you'll need it.
# If you have questions or comments about this, please contact the developer of this chat.
# Thank you for your understanding. I appreciate it!

switch(L_LANG)
{
	case "bg_BG":
		$L_G_EXT = "bg";
#		$L_G_SA = "Търсене";
		$L_G_SA = "&#x0422;&#x044a;&#x0440;&#x0441;&#x0435;&#x043d;&#x0435;";
		$L_G_HL = "bg";
		$L_G_CX = "4ex2p3-7jrn";
		break;
	case "da_DK":
		$L_G_EXT = "dk";
#		$L_G_SA = "Søg";
		$L_G_SA = "S&#248;g";
		$L_G_HL = "da";
		$L_G_CX = "tqlzus-g838";
		break;
	case "es_AR":
		$L_G_EXT = "com.ar";
		$L_G_SA = "Buscar";
		$L_G_HL = "es";
		$L_G_CX = "sn00uj-w8oi";
		break;
	case "es_ES":
		$L_G_EXT = "es";
		$L_G_SA = "Buscar";
		$L_G_HL = "es";
		$L_G_CX = "pw7i8w-y4de";
		break;
	case "en_GB":
		$L_G_EXT = "co.uk";
		$L_G_SA = "Search";
		$L_G_HL = "en";
		$L_G_CX = "29rzcl-ytld";
		break;
	case "de_DE":
		$L_G_EXT = "de";
		$L_G_SA = "Suche";
		$L_G_HL = "de";
		$L_G_CX = "nmp2xz-ibwi";
		break;
	case "fr_FR":
		$L_G_EXT = "fr";
		$L_G_SA = "Rechercher";
		$L_G_HL = "fr";
		$L_G_CX = "qu42zo-puy3";
		break;
	case "he_IL":
		$L_G_EXT = "co.il";
		$L_G_SA = "חיפוש";
#		$L_G_SA = "חפש";
		$L_G_HL = "iw";
		$L_G_CX = "6tiikj-wqp1";
		break;
	case "hu_HU":
		$L_G_EXT = "hu";
#		$L_G_SA = "Keresés";
		$L_G_SA = "Keres&#233;s";
		$L_G_HL = "hu";
		$L_G_CX = "9j8qgz-yag1";
		break;
	case "it_IT":
		$L_G_EXT = "it";
		$L_G_SA = "Cerca";
		$L_G_HL = "it";
		$L_G_CX = "xcwimo-lord";
		break;
	case "nl_NL":
		$L_G_EXT = "nl";
		$L_G_SA = "Zoeken";
		$L_G_HL = "nl";
		$L_G_CX = "efn8u2-oedw";
		break;
	case "ro_RO":
		$L_G_EXT = "ro";
		$L_G_SA = "Căutare";
		$L_G_SA = "C&#x0103;utare";
		$L_G_HL = "ro";
		$L_G_CX = "cd8a0m-8lw3";
		break;
	case "sr_CS":
		$L_G_EXT = "com";
#		$L_G_SA = "Potraži";
#		$L_G_SA = "Потражи";
		$L_G_SA = "&#x041f;&#x043e;&#x0442;&#x0440;&#x0430;&#x0436;&#x0438;";
		$L_G_HL = "sr";
		$L_G_CX = "ilkhsc-ioa3";
		break;
	case "sv_SE":
		$L_G_EXT = "se";
#		$L_G_SA = "Sök";
		$L_G_SA = "S&#246;k";
		$L_G_HL = "sv";
		$L_G_CX = "wo9bxg-m0vo";
		break;
	case "tr_TR":
		$L_G_EXT = "com.tr";
		$L_G_SA = "Ara";
		$L_G_HL = "tr";
		$L_G_CX = "thmxut-u4sx";
		break;
	case "vi_VN":
		$L_G_EXT = "com.vn";
#		$L_G_SA = "Tìm kiếm";
		$L_G_SA = "Ti&#768;m ki&#234;&#769;m";
		$L_G_HL = "vi";
		$L_G_CX = "73gv6i-7nsh";
		break;
	default:
		$L_G_EXT = "com";
		$L_G_SA = "Search";
		$L_G_HL = "en";
		$L_G_CX = "v5m0ds-vk8w";
		break;
}
?>
<?php
$search = 
"<table align=\"center\">
<tr valign=\"middle\">
<td align=\"center\">
	<form action=\"http://www.google.$L_G_EXT/cse\" id=\"cse-search-box\" target=\"_blank\">
		<div>
			<input type=\"hidden\" name=\"cx\" value=\"partner-pub-9362782527650497:$L_G_CX\" />
			<input type=\"hidden\" name=\"ie\" value=\"UTF-8\" />
			<input type=\"text\" name=\"q\" size=\"40\" />
			<input type=\"submit\" name=\"sa\" value=\"$L_G_SA\" />
		</div>
	</form>
<script type=\"text/javascript\" style=\"background-color:transparent;\" src=\"http://www.google.$L_G_EXT/coop/cse/brand?form=cse-search-box&amp;lang=$L_G_HL\"></script>
</td>
</tr>
</table>\n";
?>