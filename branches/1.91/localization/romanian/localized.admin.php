<?php
// File : romanian/localized.admin.php - plus version (17.09.2006 - rev.6)
// Original translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-2";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administrare pentru %s");
define("A_MENU_1", "Utilizatori înregistraþi");
define("A_MENU_2", "Utilizatori blocaþi");
define("A_MENU_3", "Curãþare camere");
define("A_MENU_4", "Trimite emailuri");
define("A_MENU_5", "Configurare");
define("A_MENU_6", "Extras Chat");
define("A_MENU_7", "Cãutare");
define("A_MENU_8", "Conectãri");
define("A_MENU_9", "Arhivã");

// Frame for registered users
define("A_SHEET1_1", "Lista utilizatorilor înregistraþi ºi permisiunile acestora");
define("A_SHEET1_2", "Numele");
define("A_SHEET1_3", "Permisiuni");
define("A_SHEET1_4", "Camere moderate");
define("A_SHEET1_5", "Camerele moderate sunt separate de virgulã (,) fãrã spaþii.");
define("A_SHEET1_6", "ªterge utilizatorii selectaþi");
define("A_SHEET1_7", "Schimbã");
define("A_SHEET1_8", "Nu exista utilizatori înregistraþi, cu excepþia ta.");
define("A_SHEET1_9", "Blocheazã utilizatorii selectaþi");
define("A_SHEET1_10", "Va trebui sã intri în secþiunea 'Utilizatori blocaþi' pentru ajustãri.");
define("A_SHEET1_11", "Ultima conectare");
define("A_SHEET1_12", "Motivul blocãrii (opþional)");
define("A_USER", "Utilizator");
define("A_MODER", "Moderator");
define("A_PAGE_CNT", "Pagina %s din %s");

// Frame for banished users
define("A_SHEET2_1", "Lista utilizatorilor blocaþi ºi camerele în care au fost blocaþi");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Camere blocate");
define("A_SHEET2_4", "Pânã la");
define("A_SHEET2_5", "Definitiv");
define("A_SHEET2_6", "Camerele sunt separate prin virgulã fãrã spaþii (,) dacã sunt mai puþine de 4, altfel, semnul '<B>&nbsp;*&nbsp;</B>' va bloca accesul în toate camerele.");
define("A_SHEET2_7", "Deblocheazã utilizatorii selectaþi");
define("A_SHEET2_8", "Nu existã utilizatori blocaþi.");
define("A_SHEET2_9", "Motivul (opþional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista camerelor care ar trebui curãþate");
define("A_SHEET3_2", "Curãþarea unei camere \"non-default\" va elimina ºi statutul de moderatori pentru camera respectivã.");
define("A_SHEET3_3", "Curãþã camerele selectate");
define("A_SHEET3_4", "Nu sunt camere de curãþat.");

// Frame for sending mails
define("A_SHEET4_0", "Nu ai setat variabilele necesare în scriptul<BR>'chat/admin/mail4admin.php'.");
define("A_SHEET4_1", "Trimite emailuri");
define("A_SHEET4_2", "Cãtre:");
define("A_SHEET4_3", "Selecteazã tot");
define("A_SHEET4_4", "Subiect:");
define("A_SHEET4_5", "Mesaj:");
define("A_SHEET4_6", "Trimite");
define("A_SHEET4_7", "Toate email-urile au fost trimise.");
define("A_SHEET4_8", "Eroare internã întâmpinatã la trimitere.");
define("A_SHEET4_9", "Destinaþia, subiectul sau mesajul nu au fost completate!");

// Frame for configuration
define("A_SHEET5_0", "- Aveþi instalat phpMyChat-Plus versiunea %s -\\nA fost lansata deja o nouã versiune (%s)!");
define("A_SHEET5_1", "- Aveþi instalat phpMyChat-Plus versiunea %s -<br>A fost lansata deja o nouã versiune (%s)!<br>Dacã doriþi sã vizitaþi website-ul ºi sã descãrcaþi noua versiune<br>sau sã citiþi ce este nou, folosiþi link-urile urmãtoare:");
?>