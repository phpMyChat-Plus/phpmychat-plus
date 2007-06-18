<?php
// File : swedish/localized.chat.php - plus version (27.05.2007 - rev.19)
// Original file by Martin Edelius <martin.edelius@spirex.se>
// Updates, corrections and additions for the Plus version by Heikki <heikki@yttervik.be>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";
require("localized.chatjs.php");

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Anv&auml;ndar Guide");

define("L_WEL_1", "Meddelanden raderas efter");
define("L_WEL_2", "och anv&auml;ndarnamn fri g&ouml;rs efter");

define("L_CUR_1", "H&auml;r &auml;r");
define("L_CUR_1a", "f&ouml;r n&auml;rvarande");
define("L_CUR_1b", "f&ouml;r n&auml;rvarande");
define("L_CUR_2", "i chatten");
define("L_CUR_3", "Anv&auml;ndare f&ouml;r n&auml;rvarande i rum");
define("L_CUR_4", "anv&auml;ndare i privata rums");
define("L_CUR_5", "Anv&auml;ndare aktivt lurpassar<br />(har denna sidan &ouml;ppet):");

define("L_SET_1", "V&auml;nligen v&auml;lj ...");
define("L_SET_2", "ditt anv&auml;ndarnamn");
define("L_SET_3", "antal meddelanden att visa");
define("L_SET_4", "tiden mellan uppdateringarna");
define("L_SET_5", "V&auml;lj ett rum ...");
define("L_SET_6", "standard rums");
define("L_SET_7", "G&ouml;r ditt val ...");
define("L_SET_8", "publika rums skapade av anv&auml;ndare");
define("L_SET_9", "skapa din egen");
define("L_SET_10", "publika");
define("L_SET_11", "privata");
define("L_SET_12", "rum");
define("L_SET_13", "Sedan, till ");
define("L_SET_14", "chatt");
define("L_SET_15", "tillg&auml;ngliga rum");
define("L_SET_16", "anv&auml;ndarens Privata rum");
define("L_SET_17", "v&auml;lj din Alias bild");
define("L_SET_18", "G&ouml;r denna sida till ditt favorit: tryck \"CTRL +D\".");

define("L_SRC", "kan h&auml;mtas gratis fr&aring;n");

define("L_SECS", "sekunder");
define("L_MIN", "minut");
define("L_MINS", "minuter");
define("L_HOUR", "timme");
define("L_HOURS", "timmar");

// registration stuff:
define("L_REG_1", "ditt l&ouml;senord");
define("L_REG_2", "Registrerade anv&auml;ndare");
define("L_REG_3", "Registrera");
define("L_REG_4", "Editera anv&auml;ndarprofil");
define("L_REG_5", "Radera anv&auml;ndare");
define("L_REG_6", "Anv&auml;ndarregistrering");
define("L_REG_7", "endast om du &auml;r registrerad");
define("L_REG_8", "din e-mail");
define("L_REG_9", "Dina uppgifter sparades korrekt.");
define("L_REG_10", "Tillbaka");
define("L_REG_11", "Redigera");
define("L_REG_12", "Uppdaterar anv&auml;ndarinformation");
define("L_REG_13", "Raderar anv&auml;ndare");
define("L_REG_14", "Loggin");
define("L_REG_15", "Logga in");
define("L_REG_16", "&Auml;ndra");
define("L_REG_17", "Din information uppdaterades korrekt.");
define("L_REG_18", "Du blev utsl&auml;ngd ur rummet av moderatorn.");
define("L_REG_18a", "Du blev utsl&auml;ngd ur rummet av moderatorn.<br />Orsak: %s");
define("L_REG_19", "Vill du verkligen bli borttagen?");
define("L_REG_20", "Ja");
define("L_REG_21", "Du blev borttagen korrekt.");
define("L_REG_22", "Nej");
define("L_REG_25", "St&auml;ng");
define("L_REG_30", "f&ouml;rnamn");
define("L_REG_31", "efternamn");
define("L_REG_32", "WEB");
define("L_REG_33", "visa e-mail vid /whois kommando");
define("L_REG_34", "Redigera anv&auml;ndarprofil");
define("L_REG_35", "Administration");
define("L_REG_36", "L&auml;n/Region/Land");
define("L_REG_37", "F&auml;lt med ett <span class=\"error\">*</span> m&aring;ste vara i fyllda.");
define("L_REG_39", "Rummet du var inloggad p&aring; har tagits bort av administrat&ouml;ren.");
define("L_REG_45", "k&ouml;n");
define("L_REG_46", "man");
define("L_REG_47", "kvinna");
define("L_REG_48", "ej specificerad");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Dina inst&auml;llningar till chatten");
define("L_EMAIL_VAL_2", "V&auml;lkommen till Chatten.");
define("L_EMAIL_VAL_Err", "Server fel, kontakta Chatadmin: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Ditt l&ouml;senord har skickat till din e-post adress.<br />Du kan &auml;ndra ditt l&ouml;senord vid inloggnings sida under redigera din profil.");

// admin stuff
define("L_ADM_1", "%s &auml;r inte l&auml;ngre ordningsman f&ouml;r detta rum.");
define("L_ADM_2", "Du &auml;r inte l&auml;ngre registrerad anv&auml;ndare.");

// error messages
define("L_ERR_USR_1", "Det h&auml;r anv&auml;ndarnamnet &auml;r upptaget. V&auml;nligen v&auml;lj ett annat.");
define("L_ERR_USR_2", "Du m&aring;ste v&auml;lja ett anv&auml;ndarnamn.");
define("L_ERR_USR_3", "Detta anv&auml;ndarnamn &auml;r registrerat.<br />V&auml;nligen fyll i l&ouml;senord eller v&auml;lj ett nytt.");
define("L_ERR_USR_4", "Felaktigt l&ouml;senord angivet.");
define("L_ERR_USR_5", "Du m&aring;ste ange ett anv&auml;ndarnamn.");
define("L_ERR_USR_6", "Du m&aring;ste ange ett l&ouml;senord.");
define("L_ERR_USR_7", "Du m&aring;ste ange din e-post.");
define("L_ERR_USR_8", "Du m&aring;ste ange en korrekt e-post adress.");
define("L_ERR_USR_9", "Det &auml;r anv&auml;ndarnamnet &auml;r upptaget.");
define("L_ERR_USR_10", "Felaktigt anv&auml;ndarnamn eller l&ouml;senord.");
define("L_ERR_USR_12", "Du &auml;r administrat&ouml;r s&aring; du kan ej tas bort.");
define("L_ERR_USR_14", "Du m&aring;ste registrera dig f&ouml;r att f&aring; chatta.");
define("L_ERR_USR_15", "Du m&aring;ste skriva hela ditt namn.");
define("L_ERR_USR_16a", "Endast dessa extra-tecknet till&aring;tna:<br />".$REG_CHARS_ALLOWED."<br />Mellanslag, komma eller snedstrek (\\) &auml;r inte till&aring;tna. Kolla.");
define("L_ERR_USR_18", "Bannlyst ord hittades i ditt anv&auml;ndar namn.");
define("L_ERR_USR_20", "Du har blivit bortkopplad fr&aring;n detta rum eller fr&aring;n chatten.");
define("L_ERR_USR_20a", "Du har blivit bortkopplad fr&aring;n detta rum eller fr&aring;n chatten.<br />Orsak: %s");
define("L_ERR_USR_21", "Du har inte varit aktiv de senaste ".C_USR_DEL." minuter,<br />d&auml;rf&ouml;r &auml;r du utloggat fr&aring;n rummet.");
define("L_ERR_USR_23", "Att kunna delta i privata, rum du m&aring;st vara registrerad.");
define("L_ERR_USR_24", "Att skriv ditt eget privata rum, du m&aring;ste vara registrerad.");
define("L_ERR_USR_25", "Endast administrat&ouml;r kan anv&auml;nda ".$COLORNAME." f&auml;rg!<br />F&ouml;rs&ouml;k inte anv&auml;nda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".<br />Dessa &auml;r reserverade f&ouml;r konstrukt&ouml;rer!");
define("L_ERR_USR_26", "Endast administrat&ouml;rer och ordningsm&auml;n kan anv&auml;nda ".$COLORNAME." f&auml;rg!<br />F&ouml;rs&ouml;k inte anv&auml;nda ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." eller ".COLOR_CM1.".<br />Dessa &auml;r reserverade f&ouml;r konstrukt&ouml;rer!");

// users frame or popup
define("L_EXIT", "Sluta chatta");
define("L_DETACH", "Frist&aring;ende anv&auml;ndar lista");
define("L_EXPCOL_ALL", "Expandera/F&auml;ll ihop alla");
define("L_CONN_STATE", "Anslutnings status");
define("L_CHAT", "Chatta");
define("L_USER", "anv&auml;ndare");
define("L_USERS", "anv&auml;ndare");
define("L_LURKER", "lurpassar");
define("L_LURKERS", "lurpassare");
define("L_NO_USER", "Inga anv&auml;ndare");
define("L_ROOM", "rum");
define("L_ROOMS", "rums");
define("L_EXPCOL", "Expandera/F&auml;ll ihop rummet");
define("L_BEEP", "Ljud/inget ljud n&auml;r anv&auml;ndare kommer");
define("L_PROFILE", "Visa profil");
define("L_NO_PROFILE", "Ingen profil");

// input frame
define("L_HLP", "Hj&auml;lp");
define("L_MODERATOR", "%s &auml;r nu ordningsman f&ouml;r det h&auml;r rummet.");
define("L_KICKED", "%s blev utsl&auml;ngd ok.");
define("L_KICKED_REASON", "%s har framg&aring;ngsrikt utsl&auml;ngd. (Orsak: %s)");
define("L_BANISHED", "%s har blivit bannlyst.");
define("L_BANISHED_REASON", "%s har framg&aring;ngsrikt blivit bannlyst. (Orsak: %s)");
define("L_ANNOUNCE", "ANM&Auml;L");
define("L_INVITE", "%s bjud in hon/han att delta, in till <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> rum.");
define("L_INVITE_REG", " Du har f&aring;tt inbjudan att delta i detta rum.");
define("L_INVITE_DONE", "Din inbjudan s&auml;ndes till %s.");
define("L_OK", "S&auml;nd");
define("L_BUZZ", "Ring signaler");

// help popup
define("L_HELP_TIT_1", "Smilis");
define("L_HELP_TIT_2", "Textformattering f&ouml;r meddelanden");
define("L_HELP_FMT_1", "Du kan g&ouml;ra text fet, kursiv eller understruken genom att innesluta textavsnittet med &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; taggar.<br />Till exempel, &lt;B&gt;den h&auml;r texten&lt;/B&gt; genererar <B>den h&auml;r texten</B>.");
define("L_HELP_FMT_2", "F&ouml;r att skapa en hyperl&auml;nk i dina meddelanden s&aring; skriver du bara in adressen utan n&aring;gra taggar. L&auml;nken skapas automatiskt.");
define("L_HELP_TIT_3", "Kommandon");
define("L_HELP_NOTE", "Alla kommandon maste vara p&aring; Engelska!");
define("L_HELP_USR", "anv&auml;ndare");
define("L_HELP_MSG", "meddelande");
define("L_HELP_ROOM", "rum");
define("L_HELP_BUZZ", "~signalnamn");
define("L_HELP_REASON", "orsak");
define("L_HELP_CMD_0", "{} inneb&auml;r ett obligatoriskt alternativ, [] ett valfritt.");
define("L_HELP_CMD_1a", "S&auml;tta antal meddelanden att visa, minimum och Standard &auml;r 5.");
define("L_HELP_CMD_1b", "&Aring;terladda meddelande ram och visa n senaste meddelanden, minimal och standard &auml;r 5.");
define("L_HELP_CMD_2a", "Modifiera uppdateringsfrekvensen p&aring; meddelanden (i sekunder).<br />Om n inte &auml;r specificerad eller mindre &auml;n 3 s&aring; v&auml;xlar kommandot mellan 10 sekunder och ingen uppdatering.");
define("L_HELP_CMD_2b", "Modifiera meddelanden och anv&auml;ndare justera uppdaterings f&ouml;rdr&ouml;jning (i sekunder).<br />Om n &auml;r inte specifierat eller mindre &auml;n 3, v&auml;xlar mellan ingen uppdatering och 10s uppdatering.");
define("L_HELP_CMD_3", "Byt ordningsf&ouml;ljd p&aring; meddelanden.");
define("L_HELP_CMD_4", "Anslut till ett rum, skapandes den om den inte finns (f&ouml;rutsatt att du f&aring;r skapa rums).<br />S&auml;tt n till 0 f&ouml;r en privat rum och 1 f&ouml;r en publik, startv&auml;rde &auml;r 1.");
define("L_HELP_CMD_5", "L&auml;mna chatten efter att du l&auml;mnar ett frivillig meddelande.");
define("L_HELP_CMD_6", "Ignorera meddelanden fr&aring;n den anv&auml;ndare du anger.<br />Sluta ignorera specifik anv&auml;ndare n&auml;r du anger b&aring;de - och anv&auml;ndarnamn eller sluta ignorera alla anv&auml;ndare n&auml;r enbart - anges.<br />Utan alternativ s&aring; poppar ett f&ouml;nster upp med en lista &ouml;ver alla ignorerade anv&auml;ndare.");
define("L_HELP_CMD_7", "Upprepa f&ouml;reg&aring;ende text (kommando eller meddelande).");
define("L_HELP_CMD_8", "Visa/D&ouml;lj tid f&ouml;re meddelanden.");
define("L_HELP_CMD_9", "Sl&auml;nger ut anv&auml;ndare fr&aring;n ett rum. Kan endast anv&auml;ndas av ordningsman.<br />Valfri, [".L_HELP_REASON."] visar orsak av kicking (nagra &ouml;nskade text).");
define("L_HELP_CMD_10", "Skicka ett privat meddelande till specificerad anv&auml;ndare (ingen annan ser det).");
define("L_HELP_CMD_11", "Visa information om specificerad anv&auml;ndare.");
define("L_HELP_CMD_12", "Poppar upp f&ouml;nster f&ouml;r redigera av anv&auml;ndarens uppgifter.");
define("L_HELP_CMD_13", "V&auml;xlar notifiering n&auml;r anv&auml;ndare loggar p&aring; och l&auml;mnar rummet.");
define("L_HELP_CMD_14", "G&ouml;r det m&ouml;jligt f&ouml;r administrat&ouml;ren eller den aktuella rummets ordningsman att befordra en annan anv&auml;ndare till ordningsman f&ouml;r det aktuella rummet.");
define("L_HELP_CMD_15", "Rensa meddelande ram och visa bara f&ouml;reg&aring;ende 5 meddelanden.");
define("L_HELP_CMD_16", "Spara f&ouml;reg&aring;ende n meddelanden (enstaka meddelande borttagen) till en HTML fil. If n is not specified, alla tillg&auml;ngliga meddelanden kommer att tas intill ber&auml;kning.");
define("L_HELP_CMD_17", "Till&aring;ta administrat&ouml;r att skicka an announce to all users whatever the room they are chatting into.");
define("L_HELP_CMD_18", "F&ouml;resl&aring; en anv&auml;ndare fr&aring;n ett annat rum, att komma till rummet du &auml;r i.");
define("L_HELP_CMD_19", "Till&aring;ta ordningsman av rummet eller administrat&ouml;r att \"banish\" anv&auml;ndare fr&aring;n rum f&ouml;r en tid definierade av administrat&ouml;r.<br />Senare kan f&ouml;rvisa en anv&auml;ndare chatting i ett annat rum &auml;n han &auml;r inne och anv&auml;nder &#39;<B>&nbsp;*&nbsp;</B>&#39; inst&auml;llningar f&ouml;r bannlysning \"forever\" en anv&auml;ndare fr&aring;n chatt helt och h&aring;llet.");
define("L_HELP_CMD_20", "Beskriva vad du g&ouml;r utan att h&auml;nvisa dig sj&auml;lv.");
define("L_HELP_CMD_21", "Meddela rum och anv&auml;ndare som provar skicka till dig meddelanden<br /> att du &auml;r borta fr&aring;n datorn. Om du vill komma tillbaka till chat, bara b&ouml;rja skriva.");
define("L_HELP_CMD_22", "S&auml;nder ett ljud och valfritt visar ett meddelande i nuvarande rum.<br />- Anv&auml;ndande:<br />- gammal anv&auml;ndande: \"/buzz\" eller \"/buzz meddelande kommer att vara synligt\" - spelar standard ljud f&ouml;r signal definierade i Administrations panel;<br />- ut&ouml;kad anv&auml;ndande: \"/buzz ~signalnamn\" eller \"/buzz ~signalnamn meddelande att vara visade\" - spelar signalnamn.wav fil fr&aring;n plus/sounds mapp; v&auml;nligen notera tecknet \"~\" att anv&auml;ndas i b&ouml;rjan av andra ord, vilken &auml;r namn av ljud fil, utan till&auml;gg .wav (bara .wav till&auml;gg till&aring;ten).<br />Fr&aring;n grund iinstallation, &auml;r detta ett ordningsman/administrat&ouml;rs kommando.");
define("L_HELP_CMD_23", "Skicka <i>viskning</i> (privat meddelande). meddelande kommer att n&aring; m&aring;l, oavs&auml;tt vilken rum anv&auml;ndaren &auml;r i. Om anv&auml;ndaren &auml;r inte on-line eller har g&aring;tt fr&aring;n, du kommer att vara underr&auml;ttad om det.");
define("L_HELP_CMD_24", "Anv&auml;ndande: &auml;mne skall inneh&aring;lla &aring;tminstone 2 ord.<br />Denna kommando &auml;ndrar toptext av nuvarande rum. Prova inte att &aring;sidos&auml;tta andra anv&auml;ndarens toptext. Anv&auml;nda viktig toptext.<br />Som standard, detta &auml;r ett ordningsman/administration kommando.<br />Anv&auml;ndande \"/topic top reset\" kommando nuvarande toptext raderas och &aring;terst&auml;llts till standar text f&ouml;r rum.<br />Valfri, \"/topic * {}\" g&ouml;r exakt detsamma men, i alla rum (globala toptext &aring;terst&auml;lles).");
define("L_HELP_CMD_25", "ETT spel av t&auml;rningar f&ouml;r slumpvis tal.<br />Anv&auml;ndande: /dice eller /dice [n];<br />n kan ta alla v&auml;rde <b>mellan 1 och %s</b> (det representerar antalet rullande t&auml;rningar). Om inget nummero angett, standar maximal rullningar kommer att anv&auml;ndas.");
define("L_HELP_CMD_26", "Detta &auml;r ett mer komplexa version av /dice kommando.<br />Anv&auml;ndande: /{n1}d[n2] eller /{n1}d;<br />n1 kan ta alla v&auml;rden <b>mellan 1 och %s</b> (det representerar antalet kastning).<br />n2 kan ta alla v&auml;rde <b>mellan 1 och %s</b> (det representerar antalet rullande t&auml;rningar per sl&auml;nga).");
define("L_HELP_CMD_27", "Markera bakgrung p&aring; meddelanden av en specifik anv&auml;ndare f&ouml;r att l&auml;ttare l&auml;sa &ouml;ver conversations.<br />Anv&auml;ndande: /high {anv&auml;ndare} eller tryck sm&aring; <img src=./images/highlightOff.gif> ruta p&aring; h&ouml;ger om anv&auml;ndarnamn (i rum/anv&auml;ndare lista)");
define("L_HELP_CMD_28", "Den till&aring;ter avs&auml;nda <i>en enkel bild</i> som meddelande.<br />Anv&auml;ndande: bilder kommer att vara p&aring; internet och fritt &aring;tkomlig f&ouml;r alla. Anv&auml;nd inte sidor d&auml;r inloggning beh&ouml;vs .<br />Full l&auml;nk f&ouml;r bild m&aring;ste vara skrivet! Expl. <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Till&aring;ten till&auml;gg: .jpg .bmp .gif .png. l&auml;nk &auml;r k&auml;nslig f&ouml;r STORA/sm&aring;!<br />TIPS: skriv /img mellanslag och infoga URL in i f&auml;llt; att f&aring; URL av en bild fr&aring;n websidan, n&auml;r du h&ouml;ger klickar p&aring; bilden, g&aring; till egenskaper, sedan markera hela adress/URL (ibland m&aring;ste bl&auml;ddra ner en bit) och kopiera/infoga efter /img<br />Anv&auml;nd inte bilder fr&aring;n din pc: den kommer att g&ouml;ra avbrott p&aring; chat f&ouml;nster!!!");
define("L_HELP_CMD_29", "Andra kommando kommer att till&aring;ta administrat&ouml;r eller ordningsman av nuvarande rum att s&auml;nka ner annan registrerat anv&auml;ndare tidigare upph&ouml;jd till ordningsman f&ouml;r samma rum.<br /> * valet kommer att s&auml;nka ner anv&auml;ndarens status fr&aring;n alla rum.");
define("L_HELP_CMD_30", "Andra kommando g&ouml;r detsamma som /me men den kommer att visa din/er respektive k&ouml;n/genus<br />Expl. * Herr Ciprian tittar p&aring; TV eller Fru Heikki &auml;r glad.");
define("L_HELP_CMD_31", "&Auml;ndra hur anv&auml;ndare &auml;r sorterad i listan: sorterings ordning tid eller alfabetiskt.");
define("L_HELP_CMD_32", "Detta &auml;r ett tredje (roleplaying) version av t&auml;rnings rullning.<br />Anv&auml;ndande: /d{n1}[tn2] or /d{n1};<br />n1 kan ta alla v&auml;rde <b>mellan 1 och 100</b> (det representerar antalet rullning per t&auml;rning).<br />n2 kan ta alla v&auml;rden <b>mellan 1 och %s</b> (det representerar antalet rullande t&auml;rningar per sl&auml;nga).");
define("L_HELP_CMD_33", "&Auml;ndra teckensnitt storlek av meddelanden i chat till anv&auml;ndare val (till&aring;tna v&auml;rden f&ouml;r n: <b>mellan 7 och 15</b>); /size kommando &aring;terst&auml;ller teckensnitt storlek till standar v&auml;rde (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Chat Netikett");
define("L_HELP_ETIQ_2", "V&aring;r plats skall kunna beh&aring;lla dess samh&auml;lle/gemenskap v&auml;nlig och kul, s&aring; v&auml;nligen st&aring; fast vid till f&ouml;ljande riktlinjer. Om du avviker fr&aring;n dessa regler, en av v&aring;ra chat ordningsm&auml;n kan/f&aring;r st&ouml;vla ut dig fr&aring;n chatt.<br /><br />Tack,");
define("L_HELP_ETIQ_3", "V&aring;r Chat Netikett Riktlinjer");
define("L_HELP_ETIQ_4", "Skicka inte &quot;spam&quot; chat skriven av dumheter eller slumpvis bokst&auml;ver.</li>
<li>Anv&auml;nd inte aLtErnAtiNg tecken.</li>
<li>Beh&aring;ll inte CAPS Lock, anv&auml;nd sm&aring;bokst&auml;ver, Dom stora anses som vr&aring;lande.</li>
<li>Beh&aring;ll i tanken att eran chatt anv&auml;ndare &auml;r fr&aring;n hela v&auml;rlden, och de flesta troligen, du/ni kommer att m&ouml;ta folk av annorlunda/olika troende. Var v&auml;nlig och artig till dessa folk.</li>
<li>G&ouml;r inte direkt h&auml;delse mot andra medlemmarna. Faktiskt, prova att styra ungtjuren i dig, sj&auml;lvklar att inte anv&auml;nda sig av h&auml;delse och/eller sv&auml;r ord.</li>
<li>Kalla inte andra medlemmar med deras riktiga namn, inte uppskattad. Anv&auml;nda deras nicknamns ist&auml;llet.");

// messages frame
define("L_NO_MSG", "Det finns f&ouml;r n&auml;rvarande inga meddelanden ...");
define("L_TODAY_DWN", "Meddelanden som har s&auml;nt idag start h&auml;r nedan");
define("L_TODAY_UP", "Meddelanden som har s&auml;nt idag start h&auml;r ovan");

// message colors
$TextColors = array(	"Svart" => "#000000",
				"R&ouml;d" => "#FF0000",
				"Gr&ouml;n" => "#009900",
				"Bl&aring;" => "#0000FF",
				"Rosa" => "#9900FF",
				"M&ouml;rk r&ouml;d" => "#990000",
				"M&ouml;rk gr&ouml;n" => "#006600",
				"M&ouml;rk bl&aring;" => "#000099",
				"R&ouml;dbrun" => "#996633",
				"Vatten bl&aring;" => "#006699",
				"Morot" => "#FF6600");

//ignored popup
define("L_IGNOR_TIT", "Ignorerad");
define("L_IGNOR_NON", "Inga ignorerade anv&auml;ndare");

// whois popup
define("L_WHOIS_ADMIN", "Administrat&ouml;r");
define("L_WHOIS_MODER", "Ordningsman");
define("L_WHOIS_USER", "Anv&auml;ndare");
define("L_WHOIS_GUEST", "G&auml;st");
define("L_WHOIS_REG", "Registerad");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s kom till rummet" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s kom till rummet");
define("L_ENTER_ROM_NOSOUND", "%s kom till rummet");
define("L_EXIT_ROM", "%s l&auml;mnar rummet");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s har automatiskt blivit booted fr&aring;n detta rum f&ouml;r overksamhet");
define("L_CLOSED_ROM", "%s har st&auml;ngd webl&auml;saren");

// Text for /away command notification string:
define("L_AWAY", "%s &auml;r bort markerad");
define("L_BACK", "%s &auml;r tillbaka!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Snabb Meny *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "har s&auml;tts som TOPIC till:");
define("L_TOPIC_RESET", "har &aring;terst&auml;llt TOPIC");
define("L_HELP_TOP", "&aring;tminstone tv&aring; ord som topic");

// Img cmd mod
define("L_PIC", "Bild avs&auml;nd av");
define("L_PIC_RESIZED", "&Auml;ndrad till");
define("L_HELP_IMG", "full/hel s&ouml;kv&auml;g att s&auml;nda bild till ");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s &auml;r inte l&auml;ngre orningsman f&ouml;r n&aring;gon rum i detta chatt.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Kommando tillg&auml;nglig:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Finesser/Mods tillg&auml;nglig:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">V&aring;r tillg&auml;nglig bot &auml;r: </span><u>".C_BOT_NAME."</u>.");

//profile mod
define("L_PRO_1", "talar spr&aring;k");
define("L_PRO_2", "Favorit l&auml;nk 1");
define("L_PRO_3", "Favorit l&auml;nk 2");
define("L_PRO_4", "Beskrivning");
define("L_PRO_5", "Bild URL");
define("L_PRO_6", "Ditt namns/text f&auml;rger");

// Avatar mod
define("L_ERR_AV", "Fel URL eller icke-existerande server.");
define("L_TITLE_AV", "Ditt nuvarande avatar: ");
define("L_CHG_AV", "Klick &#39;&Auml;ndra&#39; i Profil formul&auml;r <br />att spara din Avatar bild.");
define("L_SEL_NEW_AV", "V&auml;lj en ny Avatar bild");
define("L_EX_AV", "(example: http://mittdom&auml;nnamn/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, then hit ENTER till att se)");
define("L_CANCEL", "Avbryt");
define("L_CLICK", "Klick");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: V&aring;r bot &auml;r publika aktivt i detta rum. Att starta samtal till bot, skriv <b>hello ".C_BOT_NAME.'</b>. Att avsluta konversation, skriv: <b>bye '.C_BOT_NAME.'</b>. (privat: /to <b>'.C_BOT_NAME.'</b> Meddelande)'); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: V&aring;r bot &auml;r publika aktivt i %s room. Du kan bara samtala privat av klickande p&aring; det namn och viska. (kommando: /wisp <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: V&aring;r bot &auml;r inte publicerande aktivt. Du kan bara samtala privat av klickande p&aring; det namn. (kommandon: /to <b>".C_BOT_NAME."</b> Meddelande eller /wisp <b>".C_BOT_NAME."</b> Meddelande)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "rullar t&auml;rning, resultaten &auml;r:");

// Log mod by Ciprian
define("L_ARCHIVE", "&Ouml;ppna Arkiv");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "&Ouml;ppna popups p&aring; privat meddelande");
define("L_PRIV_POST_MSG", "Skicka privat meddelande!");
define("L_PRIV_MSG", "Ny privat meddelande mottogs!");
define("L_PRIV_MSGS", "ny privat meddelanden mottogs!");
define("L_PRIV_MSGSa", "H&auml;r &auml;r de f&ouml;rsta 10 meddelanden!<br />Anv&auml;nda botten l&auml;nk att se resten.");
define("L_PRIV_MSG1", "Fr&aring;n:");
define("L_PRIV_MSG2", "Rum:");
define("L_PRIV_MSG3", "Till:");
define("L_PRIV_MSG4", "Meddelande:");
define("L_PRIV_MSG5", "Avs&auml;nd:");
define("L_PRIV_REPLY", "Svara");
define("L_PRIV_READ", "Tryck &#39;St&auml;ng&#39; knappen f&ouml;r att markera all post som l&auml;st!");
define("L_PRIV_POPUP", "Du kan st&auml;nga av/&aring;ter m&ouml;jligg&ouml;ra n&auml;r som helst denna popup finess <br />by redigera din <a href=\"#\" onClick=\"window.parent.runCmd('profile',''); return false;\" onMouseOver=\"window.status='Change your settings.'; return true\">Profil</a> (bara registrerade anv&auml;ndare)");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Aktiv" : "Inaktiv"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Aktiv" : "Inaktiv"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Nuvarande Inst&auml;llningar p&aring; denna server</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Start f&auml;rger</u>: Administrat&ouml;r = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Ordningsm&auml;n = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Andra anv&auml;ndare = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Start f&auml;rg</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "F&auml;rg kartan Picker");
define("L_COL_HELP_SUB1", "Anv&auml;ndande:");
define("L_COL_HELP_P1", "Du kan v&auml;lja din/er egen start f&auml;rg vid redigering av din profil (detsamma f&auml;rg som din anv&auml;ndarnamn f&auml;rg). Du skall kunna fortfarande anv&auml;nda n&aring;gra andra f&auml;rg. Att &auml;ndra tillbaka till din/er standar f&auml;rg fr&aring;n ett slumpvis anv&auml;nt en, du m&aring;ste valja standar f&auml;rg (Null) - den &auml;r de f&ouml;rsta i dropmeny.");
define("L_COL_HELP_SUB2", "Tips:");
define("L_COL_HELP_P2", "<u>F&auml;rg omr&aring;de</u><br />Beroende p&aring; din webl&auml;sarens/OS:s m&ouml;jligheter, det &auml;r m&ouml;jligt att n&aring;gra av f&auml;rger kommer inte att skapas. Bara 16 f&auml;rg namn st&ouml;ds av W3C HTML 4.0 standar:");
define("L_COL_HELP_P2a", "Om anv&auml;ndaren inte kan se f&auml;rgen du valde, d&aring; anv&auml;nder han ett gammal version av webl&auml;sare.");
define("L_COL_HELP_SUB3", "Inst&auml;llningar definierade p&aring; denna chatt:");
define("L_COL_HELP_P3", "<u>Kraft niv&aring;er av f&auml;rg anv&auml;ndande</u>:<br />1. Administrat&ouml;r kan anv&auml;nda alla f&auml;rger.<br />Start f&auml;rg f&ouml;r administrat&ouml;r &auml;r <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Ordningsm&auml;n kan anv&auml;nda vilka som helst men <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> och <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Start f&auml;rg f&ouml;r ordningsm&auml;n &auml;r <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Andra anv&auml;ndare kan anv&auml;nda n&aring;gra f&auml;rger men <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> och <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Start f&auml;rg &auml;r <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Tekniskt material</u>: Dessa f&auml;rger har blivit definierade av administrat&ouml;r i administrations panel.<br />Om vad som helst g&aring;r fel eller om d&auml;r &auml;r n&aring;gonting du tycker inte om start f&auml;rger, du borde kontakta <b>administrat&ouml;r</b> f&ouml;rst, inte andra anv&auml;ndare i ditt rum. :-)");
define("L_COL_HELP_USER_STATUS", "Din status");
define("L_COL_TUT", "Anv&auml;nda text f&auml;rg koder");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","anv&auml;ndare &auml;r ".LOGIN_LINK."chatting</A> just nu.</td></tr>");
define("USERS_LOGIN","1 anv&auml;ndare &auml;r ".LOGIN_LINK."chatting</A> just nu.</td></tr>");
define("NO_USER","Ingen &auml;r ".LOGIN_LINK."chatting</A> just nu.</td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "V&auml;lkommen till v&aring;r chat. V&auml;nligen anv&auml;nd v&aring;rdat sp&aring;r (netikett) medan du chattar: <I>pr&ouml;va vara angen&auml;m och artig</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "V&auml;lkommen till v&aring;r chat. V&auml;nligen anv&auml;nd v&aring;rdat sp&aring;r (netikett) medan du chattar: <I>pr&ouml;va vara angen&auml;m och artig</I>.");
define("WELCOME_MSG_NOSOUND", "V&auml;lkommen till v&aring;r chat. V&auml;nligen anv&auml;nd v&aring;rdat sp&aring;r (netikett) medan du chattar: <I>pr&ouml;va vara angen&auml;m och artig</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Server Inst&auml;llningar har blivit &auml;ndrade. Att undvika malfunctions, v&auml;nligen &aring;terladda din webl&auml;sare (tryck F5 tangent eller G&aring; ur och &aring;terg&aring; till chat).");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Valm&ouml;jligheter");
?>