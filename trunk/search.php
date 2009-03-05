<?php
# Google AdSense for Search freeware add-on
# This file is intended to keep this software freeware and is not part of the open-source code of this software.
# It comes as a plugin which should bring a few cents to the developer of this Plus version of phpMyChat,  as a reward for his work.
# This will not cost you or any of your users anything. So please be kind and don't alter in any way this script.
# On the other hand, changing or removing it from this chat may result in getting you suspended from using this chat version!
# You will also not get any future support if you'll need it.
# If you have questions or comments about this, please contact the developer of this chat.
# Thank you for your understanding. I appreciate it!

switch($L)
{
	case "argentinian_spanish":
	{
	$L_G_EXT = "com.ar";
	$L_G_SBI = "Introduzca los términos de búsqueda";
	$L_G_SBB = "Envíe el formulario de búsqueda";
	$L_G_SA = "Buscar";
	$L_G_HL = "es";
	}
		break;
	case "bulgarian":
	{
	$L_G_EXT = "bg";
	$L_G_SBI = "Унесите изразе за тражење";
	$L_G_SBB = "Проследи образац претраге";
	$L_G_SA = "Търсене";
	$L_G_HL = "bg";
	}
		break;
	case "danish":
	{
	$L_G_EXT = "dk";
	$L_G_SBI = "Indtast dine søgetermer";
	$L_G_SBB = "Indsend søgeformular";
	$L_G_SA = "Søg";
	$L_G_HL = "da";
	}
		break;
	case "dutch":
	{
	$L_G_EXT = "nl";
	$L_G_SBI = "Voer uw zoekwoorden in";
	$L_G_SBB = "Zoekformulier verzenden";
	$L_G_SA = "Zoeken";
	$L_G_HL = "nl";
	}
		break;
	case "french":
	{
	$L_G_EXT = "fr";
	$L_G_SBI = "Entrez les termes que vous recherchez";
	$L_G_SBB = "Envoyer un formulaire de recherche";
	$L_G_SA = "Rechercher";
	$L_G_HL = "fr";
	}
		break;
	case "georgian":
	{
	$L_G_EXT = "ge";
	$L_G_SBI = "";
	$L_G_SBB = "";
	$L_G_SA = "მოძებნა";
	$L_G_HL = "ka";
	}
		break;
	case "german":
	{
	$L_G_EXT = "de";
	$L_G_SBI = "Geben Sie Ihre Suchbegriffe ein";
	$L_G_SBB = "Suchformular senden";
	$L_G_SA = "Suchen";
	$L_G_HL = "de";
	}
		break;
	case "greek":
	{
	$L_G_EXT = "gr";
	$L_G_SBI = "";
	$L_G_SBB = "";
	$L_G_SA = "Αναζήτηση";
	$L_G_HL = "el";
	}
		break;
	case "hungarian":
	{
	$L_G_EXT = "hu";
	$L_G_SBI = "Írja be a keresett kifjezéseket";
	$L_G_SBB = "Keresőűrlap elküldése";
	$L_G_SA = "Keresés";
	$L_G_HL = "hu";
	}
		break;
	case "italian":
	{
	$L_G_EXT = "it";
	$L_G_SBI = "Inserisci i termini di ricerca";
	$L_G_SBB = "Invia modulo di ricerca";
	$L_G_SA = "Cerca";
	$L_G_HL = "it";
	}
	case "romanian":
	{
	$L_G_EXT = "ro";
	$L_G_SBI = "Introduceţi termenii de căutare";
	$L_G_SBB = "Trimiteţi formularul de căutare";
	$L_G_SA = "Căutare";
	$L_G_HL = "ro";
	}
		break;
	case "serbian_latin":
	{
	$L_G_EXT = "com";
	$L_G_SBI = "Unesite izraze za traženje";
	$L_G_SBB = "Prosledi obrazac pretrage";
//	$L_G_SA = "Potraži";
	$L_G_SA = "Потражи";
	$L_G_HL = "sr";
	}
		break;
	case "serbian_cyrillic":
	{
	$L_G_EXT = "com";
	$L_G_SBI = "Унесите изразе за тражење";
	$L_G_SBB = "Проследи образац претраге";
	$L_G_SA = "Потражи";
	$L_G_HL = "sr";
	}
		break;
	case "spanish":
	{
	$L_G_EXT = "es";
	$L_G_SBI = "Introduzca los términos de búsqueda";
	$L_G_SBB = "Envíe el formulario de búsqueda";
	$L_G_SA = "Buscar";
	$L_G_HL = "es";
	}
		break;
	case "swedish":
	{
	$L_G_EXT = "se";
	$L_G_SBI = "Ange sökord";
	$L_G_SBB = "Skicka sökformulär";
	$L_G_SA = "Sök";
	$L_G_HL = "sv";
	}
		break;
	case "turkish":
	{
	$L_G_EXT = "com.tr";
	$L_G_SBI = "Arama terimlerinizi girin";
	$L_G_SBB = "Arama formu gönder";
	$L_G_SA = "Ara";
	$L_G_HL = "tr";
	}
		break;
	case "vietnamese":
	{
	$L_G_EXT = "com.vn";
	$L_G_SBI = "Nhập các thuật ngữ tìm kiếm của bạn";
	$L_G_SBB = "Nộp mẫu đơn tìm kiếm";
	$L_G_SA = "Tìm kiếm";
	$L_G_HL = "vi";
	}
		break;
	default:
	{
	$L_G_EXT = "com";
	$L_G_SBI = "Enter your search terms";
	$L_G_SBB = "Submit search form";
	$L_G_SA = "Search";
	$L_G_HL = "en";
	}
		break;
}
?>
<?php
$search = 
"<table align=\"center\">
<tr valign=\"middle\">
<td align=\"center\">
	<form action=\"http://www.google.$L_G_EXT/cse\" id=\"cse-search-box\" target=\"_blank\">
			<input type=\"hidden\" name=\"cx\" value=\"partner-pub-9362782527650497:81f9y9u8fdj\" />
			<input type=\"text\" name=\"q\" size=\"40\" />
			<input type=\"submit\" name=\"sa\" value=\"$L_G_SA\" />
	</form>
<script type=\"text/javascript\" style=\"background-color:transparent;\" src=\"http://www.google.com/coop/cse/brand?form=cse-search-box&amp;lang=$L_G_HL\"></script>
</td>
</tr>
</table>\n";
?>