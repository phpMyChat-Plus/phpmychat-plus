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
	case "german":
	{
	$L_G_EXT = "de";
	$L_G_SBI = "Geben Sie Ihre Suchbegriffe ein";
	$L_G_SBB = "Suchformular senden";
	$L_G_SA = "Suchen";
	$L_G_HL = "de";
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
		break;
	case "romanian":
	{
	$L_G_EXT = "ro";
	$L_G_SBI = "Introduceţi termenii de căutare";
	$L_G_SBB = "Trimiteţi formularul de căutare";
	$L_G_SA = "Căutare";
	$L_G_HL = "ro";
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
	$L_G_SA = "Arama";
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
$search = "
<form method=\"get\" name=\"search\" action=\"http://www.google.$L_G_EXT/custom\" target=\"google_window\">
<table ALIGN=\"center\" bgcolor=\"#ffffff\">
<center>
<tr><td nowrap=\"nowrap\" valign=\"top\" align=\"left\" height=\"32\">
<a href=\"http://www.google.com/\">
<img src=\"http://www.google.com/logos/Logo_25wht.gif\" border=\"0\" alt=\"Google\" align=\"middle\"></img></a>
<label for=\"sbi\" style=\"display: none\">$L_G_SBI</label>
<input type=\"text\" name=\"q\" size=\"25\" maxlength=\"255\" value=\"\" id=\"sbi\"></input>
<label for=\"sbb\" style=\"display: none\">$L_G_SBB</label>
<input type=\"submit\" name=\"sa\" value=\"$L_G_SA\" id=\"sbb\"></input>
<input type=\"hidden\" name=\"client\" value=\"pub-9362782527650497\"></input>
<input type=\"hidden\" name=\"forid\" value=\"1\"></input>
<input type=\"hidden\" name=\"channel\" value=\"3495742875\"></input>
<input type=\"hidden\" name=\"ie\" value=\"UTF-8\"></input>
<input type=\"hidden\" name=\"oe\" value=\"UTF-8\"></input>
<input type=\"hidden\" name=\"cof\" value=\"GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:1\"></input>
<input type=\"hidden\" name=\"hl\" value=\"$L_G_HL\"></input>
</td></tr></center>
</table>
</form>";
?>