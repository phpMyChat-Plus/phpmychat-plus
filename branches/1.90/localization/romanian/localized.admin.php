<?php
// File : romanian.admin.php - plus version
// Translation started by Radu Swider <swidera@satline.ro>, first updated by Ciprian Popovici-Oana <floppy@kermit.cs.pub.ro>
// Corrected, finalized and updated to Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-2";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administrare pentru %s");
define("A_MENU_1", "Utilizatori inregistrati");
define("A_MENU_2", "Utilizatori blocati");
define("A_MENU_3", "Curatare camere");
define("A_MENU_4", "Trimite emailuri");
define("A_MENU_5", "Configurare");
define("A_MENU_6", "Extras Chat");
define("A_MENU_7", "Cautare");
define("A_MENU_8", "Conectari");
define("A_MENU_9", "Arhiva");

// Frame for registered users
define("A_SHEET1_1", "Lista utilizatorilor inregistrati si permisiunile acestora");
define("A_SHEET1_2", "Numele");
define("A_SHEET1_3", "Permisiuni");
define("A_SHEET1_4", "Camere moderate");
define("A_SHEET1_5", "Camerele moderate sunt separate de virgula (,) fara spatii.");
define("A_SHEET1_6", "Sterge utilizatorii selectati");
define("A_SHEET1_7", "Schimba");
define("A_SHEET1_8", "Nu exista utilizatori inregistrati, cu exceptia ta.");
define("A_SHEET1_9", "Blocheaza utilizatorii selectati");
define("A_SHEET1_10", "Va trebui sa intri in sectiunea 'Utilizatori blocati' pentru ajustari.");
define("A_SHEET1_11", "Ultima conectare");
define("A_USER", "Utilizator");
define("A_MODER", "Moderator");
define("A_PAGE_CNT", "Pagina %s din %s");

// Frame for banished users
define("A_SHEET2_1", "Lista utilizatorilor blocati si camerele in care au fost blocati");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Camere blocate");
define("A_SHEET2_4", "Pana la");
define("A_SHEET2_5", "Definitiv");
define("A_SHEET2_6", "Camerele sunt separate prin virgula fara spatii (,) daca sunt mai putine de 4, altfel, semnul '<B>&nbsp;*&nbsp;</B>' <BR>blocheaza in toate camerele.");
define("A_SHEET2_7", "Deblocheaza utilizatorii selectati");
define("A_SHEET2_8", "Nu exista utilizatori blocati.");

// Frame for cleaning rooms
define("A_SHEET3_1", "Lista camerelor care ar trebui curatate");
define("A_SHEET3_2", "Curatarea unei camere \"non-default\" va elimina si statutul de moderatori pentru camera respectiva.");
define("A_SHEET3_3", "Curata camerele selectate");
define("A_SHEET3_4", "Nu sunt camere de curatat.");

// Frame for sending mails
define("A_SHEET4_0", "Nu ai setat variabilele necesare in scriptul<BR>'chat/admin/mail4admin.php'.");
define("A_SHEET4_1", "Trimite emailuri");
define("A_SHEET4_2", "Catre:");
define("A_SHEET4_3", "Selecteaza tot");
define("A_SHEET4_4", "Subiect:");
define("A_SHEET4_5", "Mesaj:");
define("A_SHEET4_6", "Trimite");
define("A_SHEET4_7", "Toate email-urile au fost trimise.");
define("A_SHEET4_8", "Eroare interna intampinata la trimitere.");
define("A_SHEET4_9", "Destinatia, subiectul sau mesajul nu au fost completate!");

// Send alert to users in chat when avatar enabled/disabled in admin panel
define("A_RELOAD_CHAT", "Setarile serverului de chat tocmai au fost modificate. Pentru o buna functionare, trebuie sa reincarcati chat-ul (apasati tasta F5 sau Iesire si reintrati pe chat).");

// Frame for configuration
define("A_SHEET5_0", "- Aveti instalat phpMyChat-Plus versiunea %s -\\nA fost lansata deja o noua versiune (%s)!");
define("A_SHEET5_1", "- Aveti instalat phpMyChat-Plus versiunea %s -<br>A fost lansata deja o noua versiune (%s)!<br>Daca doriti sa vizitati website-ul si sa descarcati noua versiune<br>sau sa cititi ce este nou, folositi link-urile urmatoare:");
?>