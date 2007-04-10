<?php
// File : german/localized.chat.php - plus version (25.03.2007 - rev.16)
// Original translation by Robert Schaller <robert@schaller.com> & Wolfgang Schneider <schneider@bibelcenter.de>
//    & Martin Sander <Martin.Sander@touch-screen.de> & Bernard Piller <bernard@bmpsystems.com>
//    & Reinhard Hofmann <e9625556@student.tuwien.ac.at> & Christian Hacker <c.hacker@dreamer-chat.de>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@mail.ru>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "iso-8859-1";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mitteilungen werden nach");
define("L_WEL_2", "und inaktive User nach");
define("L_WEL_3", "Minuten gel&ouml;scht ...");

define("L_CUR_1", "Hier");
define("L_CUR_1a", "sind zur Zeit");
define("L_CUR_1b", "ist zur Zeit");
define("L_CUR_2", "im Chat.");
define("L_CUR_3", "Benutzer momentan in den Chatr&auml;umen");
define("L_CUR_4", "Benutzer in privaten R&auml;umen");
define("L_CUR_5", "User sind momentan auf Lauer<br>(beobachten diese Seite):");

define("L_SET_1", "Bitte w&auml;hle ...");
define("L_SET_2", "Dein Benutzername");
define("L_SET_3", "die Anzahl angezeigter Mitteilungen");
define("L_SET_4", "Zeit zwischen Updates");
define("L_SET_5", "W&auml;hle bitte einen Raum aus ...");
define("L_SET_6", "voreingestellte &ouml;ffentliche R&auml;ume");
define("L_SET_7", "W&auml;hle ...");
define("L_SET_8", "Vom Benutzer erstellte &ouml;ffentliche R&auml;ume");
define("L_SET_9", "Erstelle Deinen eigenen");
define("L_SET_10", "&ouml;ffentlichen");
define("L_SET_11", "privaten");
define("L_SET_12", "Raum");
define("L_SET_13", "Und jetzt,");
define("L_SET_14", "auf in den Chat!");
define("L_SET_15", "Private R&auml;ume");
define("L_SET_16", "Privater Raum erstellt durch User");
define("L_SET_17", "W&auml;hlen Sie Ihren Avatar");
define("L_SET_18", "Setzen Sie ein Lesezeichen: press \"CTRL +D\".");

define("L_SRC", "ist kostenlos verf&uuml;gbar bei");

define("L_SECS", "Sekunden");
define("L_MIN", "Minute");
define("L_MINS", "Minuten");
define("L_HOUR", "Stunde");
define("L_HOURS", "Stunden");

// registration stuff:
define("L_REG_1", "Dein Passwort");
define("L_REG_2", "Registrierte Benutzer");
define("L_REG_3", "Registrieren");
define("L_REG_4", "Benutzerprofil &auml;ndern");
define("L_REG_5", "Benutzer l&ouml;schen");
define("L_REG_6", "Benutzerregistrierung");
define("L_REG_7", "nur wenn Du registriert bist");
define("L_REG_8", "Deine E-Mail-Adresse");
define("L_REG_9", "Du hast Dich erfolgreich registriert.");
define("L_REG_10", "Zur&uuml;ck");
define("L_REG_11", "Bearbeiten");
define("L_REG_12", "Benutzerinformation &auml;ndern");
define("L_REG_13", "Benutzer l&ouml;schen");
define("L_REG_14", "Anmeldung");
define("L_REG_15", "Anmelden");
define("L_REG_16", "Ändern");
define("L_REG_17", "Deine Daten wurden erfolgreich ge&auml;ndert.");
define("L_REG_18", "Sie wurden vom Moderator aus dem Raum gekickt.");
define("L_REG_18a", "Sie wurden vom Moderator aus dem Raum gekickt.<br>Grund: %s");
define("L_REG_19", "Willst Du wirklich gel&ouml;scht werden?");
define("L_REG_20", "Ja");
define("L_REG_21", "Du wurdest erfolgreich gel&ouml;scht.");
define("L_REG_22", "Nein");
define("L_REG_25", "Schlie&szlig;en");
define("L_REG_30", "Vorname");
define("L_REG_31", "Nachname");
define("L_REG_32", "Homepage");
define("L_REG_33", "E-Mail-Adresse bei /whois Befehl anzeigen");
define("L_REG_34", "Benutzerdaten &auml;ndern");
define("L_REG_35", "Administration");
define("L_REG_36", "Ort/Land");
define("L_REG_37", "Felder mit <span class=\"error\">*</span> m&uuml;ssen ausgef&uuml;llt werden.");
define("L_REG_39", "Der Raum in dem Du warst, wurde vom Administrator gel&ouml;scht.");
define("L_REG_45", "Geschlecht");
define("L_REG_46", "m&auml;nnlich");
define("L_REG_47", "weiblich");
define("L_REG_48", "keine Angaben");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Deine Einstellungen zum Einstieg in den Chat");
define("L_EMAIL_VAL_2", "Willkommen auf unserem Chat-Server.");
define("L_EMAIL_VAL_Err", "Interner Fehler, bitte kontaktiere den Administrator: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Das Passwort wurde an Ihre E-Mail-Adresse verschickt. <br> Sie k&ouml;nnen das Passwort jederzeit auf der login-Seite &auml;ndern.");

// admin stuff
define("L_ADM_1", "%s ist nicht mehr Moderator f&uuml;r diesen Raum.");
define("L_ADM_2", "Du bist kein registrierter Benutzer mehr.");

// error messages:
define("L_ERR_USR_1", "Dieser Benutzername wird schon verwendet. W&auml;hle einen neuen.");
define("L_ERR_USR_2", "Du musst einen Benutzernamen w&auml;hlen.");
define("L_ERR_USR_3", "Dieser Benutzername wird schon verwendet. Bitte gib das Passwort ein oder w&auml;hle einen anderen Benutzernamen.");
define("L_ERR_USR_4", "Du hast ein falsches Passwort angegeben.");
define("L_ERR_USR_5", "Du mu&szlig;t einen Benutzernamen angeben.");
define("L_ERR_USR_6", "Du mu&szlig;t ein Passwort angeben.");
define("L_ERR_USR_7", "Du mu&szlig;t Dein E-Mail angeben.");
define("L_ERR_USR_8", "Du mu&szlig;t eine korrekte E-Mail-Adresse angeben.");
define("L_ERR_USR_9", "Dieser Benutzername ist bereits vergeben.");
define("L_ERR_USR_10", "Falscher Benutzername oder Passwort.");
define("L_ERR_USR_11", "Daf&uuml;r m&uuml;ssen Sie Administrator sein.");
define("L_ERR_USR_12", "Als Administrator k&ouml;nnen Sie nicht gel&ouml;scht werden.");
define("L_ERR_USR_13", "Du mu&szlig;t registriert sein, um eigene R&auml;ume anlegen zu k&ouml;nnen.");
define("L_ERR_USR_14", "Du mu&szlig;t registriert sein, um zu chatten.");
define("L_ERR_USR_15", "Du mu&szlig;t Deinen vollen Namen angeben.");
define("L_ERR_USR_16", "Nur folgende Zeichen sind erlaubt:\\n".$REG_CHARS_ALLOWED."\\n Leerzeichen, Kommata oder Backslashes (\\) sind nicht erlaubt.\\n &Uuml;berpr&uuml;fen Sie die Syntax.");
define("L_ERR_USR_16a", "Nur folgende Zeichen sind erlaubt:<br>".$REG_CHARS_ALLOWED."<br>Leerzeichen, Kommata und Backslashes (\\) sind nicht erlaubt. &Uuml;berpr&uuml;fen Sie die Syntax.");
define("L_ERR_USR_17", "Dieser Raum existiert nicht und Du darfst keinen anlegen.");
define("L_ERR_USR_18", "Dein Benutzername enth&auml;lt ein verbotenes Wort.");
define("L_ERR_USR_19", "Du kannst nicht in mehreren R&auml;umen zugleich sein.");
define("L_ERR_USR_20", "Du wurdest aus diesem Raum oder aus dem Chat verbannt.");
define("L_ERR_USR_20a", "Sie wurden aus dem Raum oder aus dem Chat verbannt. <br>Grund: %s");
define("L_ERR_USR_21", "Sie waren in den letzten ".C_USR_DEL." Minuten nicht aktiv,<br> deswegen wurden Sie aus dem Raum verwiesen.");
define("L_ERR_USR_22", "Dieser Befehl existiert nicht f&uuml;r \\n den Browser den Sie nutzen (IE engine).");
define("L_ERR_USR_23", "Sie m&uuml;ssen registriert sein um einen privaten Raum betreten zu k&ouml;nnen.");
define("L_ERR_USR_24", "Sie m&uuml;ssen registriert sein um einen privaten Raum erstellen zu k&ouml;nnen.");
define("L_ERR_USR_25", "Nur ein Administrator kann ".$COLORNAME." Farbe nutzen!<br> Versuchen Sie nicht Farben ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nutzen.<br> Diese sind f&uuml;r Poweruser reserviert!");
define("L_ERR_USR_26", "Nur Administratoren und Moderatoren k&ouml;nnen ".$COLORNAME." Farbe nutzen!<br> Versuchen Sie nicht Farben ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nutzen.<br> Diese sind f&uuml;r Poweruser reserviert!");
define("L_ERR_USR_27", "Sie k&ouml;nnen sich nicht selber anschreiben.\\n W&auml;hlen Sie einen anderen Usernamen.");
define("L_ERR_ROM_1", "Der Name des Raums darf keine Kommata und Backslashes (\\) enthalten.");
define("L_ERR_ROM_2", "Der Name des Raumes den Du anlegen willst enth&auml;lt ein verbotenes Wort.");
define("L_ERR_ROM_3", "Dieser Raum existiert schon als &ouml;ffentlicher Raum.");
define("L_ERR_ROM_4", "Ung&uuml;ltiger Raumname.");

// users frame or popup
define("L_EXIT", "Ausgang");
define("L_DETACH", "Popup");
define("L_EXPCOL_ALL", "Alles ausklappen/einklappen");
define("L_CONN_STATE", "Verbindungsstatus");
define("L_CHAT", "zur Anmeldung");
define("L_USER", "Benutzer");
define("L_USERS", "Benutzer");
define("L_NO_USER", "Kein Benutzer");
define("L_ROOM", "Raum");
define("L_ROOMS", "R&auml;ume");
define("L_EXPCOL", "Raum ausklappen/einklappen");
define("L_BEEP", "Piep/Kein Piep bei Benutzer-Eintritt");
define("L_PROFILE", "Profil anzeigen");
define("L_NO_PROFILE", "Krin Profil");
define("L_LURKER", "Beobeachter");
define("L_LURKERS", "Beobeachter");

// input frame
define("L_HLP", "Hilfe");
define("L_BAD_CMD", "Dies ist kein g&uuml;ltiger Befehl!");
define("L_ADMIN", "%s ist bereits Administrator!");
define("L_IS_MODERATOR", "%s ist bereits Moderator!");
define("L_NO_MODERATOR", "Nur der Moderator dieses Raums darf diesen Befehl verwenden.");
define("L_MODERATOR", "%s ist nun Moderator f&uuml;r diesen Raum.");
define("L_NONEXIST_USER", "%s ist nicht in diesem Raum");
define("L_NONREG_USER", "%s ist nicht angemeldet.");
define("L_NONREG_USER_IP", "Seine IP ist: %s.");
define("L_NO_KICKED", "%s ist Moderator oder Administrator und kann nicht gekickt werden.");
define("L_KICKED", "%s wurde erfolgreich gekickt.");
define("L_NO_BANISHED", "%s ist Moderator oder Administrator und kann nicht verbannt werden.");
define("L_BANISHED", "%s wurde erfolgreich verbannt.");
define("L_SVR_TIME", "Server Zeit: ");
define("L_NO_SAVE", "Keine Nachricht zum Speichern!");
define("L_NO_ADMIN", "Nur der Administrator kann diesen Befehl verwenden.");
define("L_ANNOUNCE", "ANK&Uuml;NDIGUNG");
define("L_INVITE", "%s l&auml;dt Dich in den Raum <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> ein.");
define("L_INVITE_REG", " Du hast Dich zum Betritt f&uuml;r diesen Raum registriert.");
define("L_INVITE_DONE", "Deine Einladung wurde an %s geschickt.");
define("L_OK", "Senden");
define("L_KICKED_REASON", "%s wurde erfolgreich gekickt. (Grund: %s)");
define("L_NO_REG_USER", "Sie m&uuml;ssen registriert sein um diesen Befehl nutzen zu k&ouml;nnen.");

// help popup
define("L_HELP_BUZZ", "~Soundname");
define("L_HELP_REASON", "der Grund");
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Text-Formatierungen der Nachrichten");
define("L_HELP_FMT_1", "Du kannst den Text Deiner Nachrichten fett, kursiv oder unterstrichen formatieren, wenn Du den Text entweder mit &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; oder &lt;U&gt; &lt;/U&gt; Tags umgibst.<BR>z.B.: &lt;B&gt;dieser Text&lt;/B&gt; erzeugt <B>diesen Text</B>");
define("L_HELP_FMT_2", "Um einen Hyperlink in einer Nachricht zu erzeugen (f&uuml;r E-Mail oder eine URL), gib einfach die Adresse ohne einen Tag ein. Der Link wird automatisch erzeugt.");
define("L_HELP_TIT_3", "Befehle");
define("L_HELP_USR", "Benutzer");
define("L_HELP_MSG", "Mitteilung");
define("L_HELP_ROOM", "Raum");
define("L_HELP_CMD_0", "{} steht f&uuml;r eine erforderliche Einstellung, [] f&uuml;r eine optionale.");
define("L_HELP_CMD_1", "Einstellung der Anzahl angezeigter Mitteilungen, mindestens 5.");
define("L_HELP_CMD_1a", "Einstellung der Anzahl angezeigter Mitteilungen, mindestens 5.");
define("L_HELP_CMD_1b", "Nachrichten neu laden und die letzten n Nachrichten anzeigen, mindestens 5.");
define("L_HELP_CMD_2a", "Einstellung der Verz&ouml;gerung bei der Mitteilungsaktualisierung (in Sekunden).<br>Wird n nicht bestimmt oder ist n kleiner als 3, dann wird zwischen keiner Aktualisierung und 10 Sekunden gewechselt.");
define("L_HELP_CMD_2b", "Einstellung der Verz&ouml;gerung bei der Mitteilungsaktualisierung (in Sekunden).<br>Wird n nicht bestimmt oder ist n kleiner als 3, dann wird zwischen keiner Aktualisierung und 10 Sekunden gewechselt.");
define("L_HELP_CMD_3", "Anordnung der Nachrichten &auml;ndern (nicht in allen Browsern).");
define("L_HELP_CMD_4", "Zu einem anderen Raum wechseln. Der Raum wird neu erstellt, falls er noch nicht existiert und man dazu die Erlaubnis hat.<BR>n = 0 f&uuml;r private und n = 1 f&uuml;r &ouml;ffentliche R&auml;ume. Falls keine Eingabe erfolgt, wird n = 1 angenommen.");
define("L_HELP_CMD_5", "Den Chat nach einer optionalen Mitteilung verlassen.");
define("L_HELP_CMD_6", "Anzeige von Mitteilungen eines Benutzers ignorieren, wenn ein Benutzername angegeben ist.<BR>Anzeige f&uuml;r alle Benutzer, wenn nur - ohne Benutzername angegeben wird.<BR>Ohne Zusatz &ouml;ffnet dieser Befehl ein Fenster, in dem alle ignorierten Namen angezeigt werden.");
define("L_HELP_CMD_7", "Den zuletzt getippten Text wieder anzeigen (Befehl oder Mitteilung).");
define("L_HELP_CMD_8", "Zeitangabe vor Mitteilungen ein/aus.");
define("L_HELP_CMD_9", "Kickt User aus dem Chat. Diesen Befehl k&ouml;nnen nur Moderatoren des jeweiligen Raums und Administatoren nutzen. Optional, [".L_HELP_REASON."] der Grund des Verweises kann angezeigt werden. (irgendein Text).");
define("L_HELP_CMD_10", "Eine private Nachricht an den angegebenen Benutzer schicken (andere Benutzer sehen diese Nachricht nicht).");
define("L_HELP_CMD_11", "Informationen zu einem angegebenen Benutzer anzeigen.");
define("L_HELP_CMD_12", "Popup Fenster zur &Auml;nderung des Benutzerprofils.");
define("L_HELP_CMD_13", "Schaltet um ob Du &uuml;ber das Kommen oder Gehen von Benutzern in einem Raum informiert wirst oder nicht.");
define("L_HELP_CMD_14", "Erlaubt dem Administrator oder den Moderatoren des aktuellen Raumes Moderator von anderen R&auml;umen eines registrierten Benutzers zu werden.");
define("L_HELP_CMD_15", "Nachrichten l&ouml;schen und nur die letzten 5 zeigen.");
define("L_HELP_CMD_16", "Die letzten 5 Nachrichten als HTML-Datei speichern (ausgenommen Mitteilungen). Wird n nicht bestimmt, dann werden alle Nachrichten eingeschlossen.");
define("L_HELP_CMD_17", "Erlaubt dem Administrator Ank&uuml;ndigungen an alle Benutzer zu senden, egal in welchem Raum diese chatten.");
define("L_HELP_CMD_18", "Einem Benutzer eines anderen Raumes vorschlagen, in den eigenen zu wechseln.");
define("L_HELP_CMD_19", "Erlaubt den Moderatoren/Administrator einen Benutzer f&uuml;r eine vom Administrator bestimmte Zeit aus dem Raum zu \"verbannen\".<BR>Der Administrator kann auch Benutzer anderer R&auml;ume verbannen und die Einstellung \"<B>&nbsp;*&nbsp;</B>\" verwenden um Benutzer \"f&uuml;r immer\" aus dem gesamten Chat zu verbannen.");
define("L_HELP_CMD_20", "Beschreiben, was du grade tust, ohne Dich selbst zu erw&auml;hnen.");
define("L_HELP_CMD_21", "Verk&uuml;ndet in dem Raum und an die User, die versuchen Sie anzuschreiben, dass Sie grade abwesend sind. <br> Sie verlassen den Abwesenheitsmodus indem Sie anfangen mit schreiben.");
define("L_HELP_CMD_22", "Sendet einen Summerton und zeigt eine Nachricht im gegenw&auml;rtigen Raum.<br>- Anwendung: \"/buzz\" oder \"/buzz Ihre Nachricht\" - spielt einen voreingestellten Sound ab;<br>- erweiterte Anwendung: \"/buzz ~Soundname\" oder \"/buzz ~Soundname Ihre Nachricht\" - spielt die soundname.wav Datei aus dem Verzeichnis /sounds im Chat; Bitte das Zeichen \"~\" vor dem Dateinamen nicht vergessen. Es sind nur Dateierweiterungen im Format .wav erlaubt.<br> Standardm&auml;&szlig;ig ist es ein Moderator/Admin-Befehl.");
define("L_HELP_CMD_23", "Sendet <i>whisper</i> (eine private Nachricht). Die Nachricht wird den Bestimmungsort erreichen, ganz gleich in welchem Raum der Benutzer ist. Wenn der Benutzer nicht online ist oder im Abwesenheitsmodus ist, werden Sie dar&uuml;ber benachrichtigt.");
define("L_HELP_CMD_24", "Anwendung: Das Thema muss mindestens 2 Worte enthalten.<br>Dieser Befehl &auml;ndert das Thema des gegenw&auml;rtigen Raums. Versuchen Sie, andere Benutzerthemen nicht zu &uuml;berschreiben. Verwenden Sie nur wichtige Themen.<br>Standardm&auml;&szlig;ig ist es ein Moderator/Admin-Befehl.<br>Durch den \"/topic top reset\" Befehl wird das aktuelle Topic gel&ouml;scht und durch Standardtopic ersetzt.<br>Optional, \"/topic * {}\" ist der gleiche Befehl, l&ouml;scht aber die Themen in allen R&auml;umen (global topic und global topic reset).");
define("L_HELP_CMD_25", "Ein W&uuml;rfelspiel.<br>Anwendung: /dice or /dice [n];<br>n kann eine Zahl zwischen <b>1 und %s</b> sein. (es ist die Anzahl der W&uuml;rfel). Wenn keine Zahl angegeben wurde, wird die voreingestellte gr&ouml;&szlig;te Zahl genommen.");
define("L_HELP_CMD_26", "Das ist eine kompliziertere Version des W&uuml;rfelspiels (/dice).<br>Anwendung: /{n1}d[n2] oder /{n1}d;<br>n1 kann eine Zahl zwischen <b>1 und %s</b> sein (es ist die Anzahl der W&uuml;rfe).<br>n2 kann eine Zahl zwischen <b>1 und %s</b> sein (es ist die Anzahl der W&uuml;rfel).");
define("L_HELP_CMD_27", "Dieser Befehl hebt die Nachrichten eines ausgew&auml;hlten Users hervor um das Lesen zu erleichtern. <br>Anwendung: /high {user} oder dr&uuml;cke auf das kleine <img src=./images/highlightOff.gif> Quadrat rechts neben dem Namen des Users (in der Raum/User-Liste)");
define("L_HELP_CMD_28", "Dieser Befehl erlaubt ein <i>einzelnes</i> Bild in Ihre Nachricht einzuf&uuml;gen. <br>Anwendung: das Bild muss im Internet und f&uuml;r jeden zug&auml;nglich sein. Bitte keine Seiten angeben, die Login erfordern. <br> Es muss der komplette Pfad angegeben werden. Bsp: <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br>Erlaubte Erweiterungen: .jpg .bmp .gif .png. <br>Hinweis: schreibe zuerst \"/img\" Leerzeichen und dann die URL zum Bild einf&uuml;gen. <br>Bitte keine Bilder, die auf Ihrem PC abgelegt sind, w&auml;hlen. Das Bild ist f&uuml;r keinen sichtbar!!!");
define("L_HELP_CMD_29", "Der zweite Befehl erlaubt dem Administrator oder dem Moderator des gegenw&auml;rtigen Raums Users zu degradieren die vorher zum Moderator im gleichen Raum ernannt wurden.<br>Die * Option degradiert den User in allen R&auml;umen.");
define("L_HELP_CMD_30", "Der zweite Befehl ist &auml;hnlich dem Befehl \"/me\" aber er zeigt noch zus&auml;tzlich das Geschlecht an. <br>Bsp: * Herr Ciprian schaut TV oder Frau Dana ist gl&uuml;cklich.");
define("L_HELP_CMD_31", "Sortiert die User nach alphabetischer Reihenfolge oder nach Eingangszeit.");
define("L_HELP_CMD_32", "Das ist die dritte Version des W&uuml;rfelspiels.<br>Anwendung: /d{n1}t[n2] oder /d{n1};<br>n1 kann eine Zahl zwischen <b>1 und 100</b> sein (es ist die Anzahl der W&uuml;rfe pro W&uuml;rfel).<br>n2 kann eine Zahl zwischen <b> 1 and %s</b> (es ist die Anzahl der W&uuml;rfel.");
define("L_HELP_CMD_33", "&Auml;ndert die Gr&ouml;&szlig;e der Schriftart in den Nachrichten (erlaubt sind Werte f&uuml;r n zwischen <b>7 und 15</b>); Der Befehl \"/size\" setzt die Gr&ouml;&szlig;e der Schriftart auf standard zur&uuml;ck (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Chat-Etikette");
define("L_HELP_ETIQ_2", "Unsere Community sollte freundlich und lustig bleiben, also halten Sie sich bitte an folgende Richtlinien. Wenn Sie die Regeln nicht einhalten, werden Sie von unseren Moderatoren aus dem Chat verwiesen.<br><br>Danke!");
define("L_HELP_ETIQ_3", "Unsere Chat-Etikette-Richtlinien");
define("L_HELP_ETIQ_4", "Bitte den Chat nicht mit Unsinn und Quatsch vollspammen oder flooden;</li><li>Verwenden Sie bitte keine aLtErnAtiVE Schreibweise;</li><li>Verwenden der CAPS-LOCK-TASTE ist nicht gestattet. Br&uuml;llen k&ouml;nnt Ihr zu Hause machen.;</li><li>Bedenken Sie, dass in userem Chat Leute aus der ganzen Welt und mit unterschiedlichen Glaubensrichtungen hier sein k&ouml;nnen. Bitte seien Sie nett und h&ouml;fflich. </li><li> Wir bitten Sie unpolitisch zu bleiben, Gottesl&auml;sterungen o.&auml;. und Verwenden von Schimpfw&ouml;rtern zu unterlassen. </li><li>Reden Sie andere User nicht mit Vornamen oder Namen an, wenn sie es nicht w&uuml;nschen. Daf&uuml;r gibt es die Nicknamen.");

//message frame
define("L_NO_MSG", "keine Mitteilungen.");
define("L_TODAY_DWN", "Die Nachrichten werden von oben nach unten angezeigt");
define("L_TODAY_UP", "Die Nachrichten, die gestern verschickt wurden, werden unten angezeigt.");

// message colors
$TextColors = array(	"Schwarz" => "#000000",
				"Rot" => "#FF0000",
				"Gr&uuml;n" => "#009900",
				"Blau" => "#0000FF",
				"Lila" => "#9900FF",
				"Dunkelrot" => "#990000",
				"Dunkelgr&uuml;n" => "#006600",
				"Dunkelblau" => "#000099",
				"Kastanienbraun" => "#996633",
				"Aquablau" => "#006699",
				"Orange" => "#FF6600");

//ignored popup
define("L_IGNOR_TIT", "Ignoriert");
define("L_IGNOR_NON", "Keine ignorierten Benutzer");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_USER", "Benutzer");
define("L_WHOIS_GUEST", "Guest");
define("L_WHOIS_REG", "Registered");

// Notification messages of user entrance/exit
#define("L_ENTER_ROM", "%s betritt den Raum");
define("L_EXIT_ROM", "%s verl&auml;&szlig;t den Raum");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s betritt diesen Raum" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s betritt diesen Raum");
define("L_ENTER_ROM_NOSOUND", "%s betritt diesen Raum"); //just to be renamed

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s wurde wegen Inaktivit&auml;t aus diesem Raum verwiesen.");
define("L_CLOSED_ROM", "%s hat den Browser geschlossen");

// Text for /away command notification string:
define("L_AWAY", "%s ist abwesend");
define("L_BACK", "%s ist zur&uuml;ck!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Quick Menu *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", " &auml;nderte TOPIC auf: - ");
define("L_TOPIC_RESET", " hat das TOPIC zur&uuml;ckgesetzt");
define("L_HELP_TOP", "Das TOPIC muss mindestens zwei Worte enthalten.");

// Img cmd mod
define("L_PIC", "Bild gepostet von");
define("L_PIC_RESIZED", "Gr&ouml;&szlig;e &auml;ndern auf");
define("L_HELP_IMG", "Gesamtpfad zum Bild");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s ist kein Moderator.");
define("L_IS_NO_MOD_ALL", "%s ist nicht mehr Moderator f&uuml;r s&auml;mtliche R&auml:ume in diesem Chat.");
define("L_ERR_IS_ADMIN", "%s ist ein Administrator!\\n Sie k&ouml;nnen seine Berechtigungen nicht &auml;ndern.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Befehle vorhanden:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Features/Mods vorhanden:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Unser Bot ist: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "Sprachen");
define("L_PRO_2", "Favoriten Link 1");
define("L_PRO_3", "Favoriten Link 2");
define("L_PRO_4", "Beschreibung");
define("L_PRO_5", "URL zum Bild");
define("L_PRO_6", "Ihre Namens-/Textfarbe");

// Avatar mod
define("L_ERR_AV", "Falsche URL oder Host existiert nicht.");
define("L_TITLE_AV", "Ihr gegenw&auml;rtiger Avatar: ");
define("L_CHG_AV", "Klicke auf \"&Auml;ndern\" im Profil-Men&uuml;<br> um Ihr Avatar zu speichern.");
define("L_SEL_NEW_AV", "W&auml;hlen Sie einen neuen Avatar aus");
define("L_EX_AV", "(Beispiel: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Geben Sie URL-Adresse ein, und bet&auml;tigen die Enter-Taste um es zu sehen.");
define("L_CANCEL", "Abbrechen");
define("L_CLICK", "Klick hier");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPPS: Unser Bot ist in diesem Raum &ouml;ffentlich aktiv. Um mit dem Bot zu sprechen, tippen Sie <b>hello ".C_BOT_NAME."</b> ein. Zum Beenden, eintippen: <b>bye ".C_BOT_NAME."</b>. (privat: /to <b>".C_BOT_NAME."</b> Nachricht)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPPS: Unser Bot ist im %s Raum &ouml;ffentlich aktiv. Sie k&ouml;nnen nur privat sprechen, indem Sie seinen Namen anklicken. (Befehl: /wisp <b>".C_BOT_NAME."</b> Nachricht)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPPS: Unser bot ist nicht &ouml;ffentlich aktiv. Sie k&ouml;nnen nur privat sprechen, indem Sie seinen Namen anklicken. (Befehle: /to <b>".C_BOT_NAME."</b> Nachricht oder /wisp <b>".C_BOT_NAME."</b> Nachricht)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot l&auml;uft nicht in diesen Raum! ");
define("BOT_START_ERROR", "Bot l&auml;uft bereits in diesen Raum!");
define("BOT_DISABLED_ERROR", "Bot wurde im Adminbereich deaktiviert!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", " rollt die W&uuml;rfel, die Ergebnisse sind:");
define("DICE_WRONG", "Sie m&uuml;ssen ausw&auml;hlen wieviele W&uuml;rfel geworfen werden sollen\\n(W&auml;hlen Sie eine Nummer zwischen 1 und ".MAX_ROLLS.").\\n Dann nur /dice eintippen um ".MAX_ROLLS." W&uuml;rfel rollen zu lassen.");
define("DICE2_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen f&uuml;r alle ".MAX_ROLLS." W&uuml;rfel\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Der erste Wert muss zwischen 1 und ".MAX_DICES."sein.\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen f&uuml;r alle ".MAX_ROLLS." W&uuml;rfel\\n(z.B. /d50 oder /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Archiv &ouml;ffnen");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "&Ouml;ffnet Popup-Fenster bei privaten Nachrichten");
define("L_PRIV_POST_MSG", "Eine private Nachricht senden!");
define("L_PRIV_MSG", "Eine neue private Nachricht erhalten!");
define("L_PRIV_MSGS", "Eine neue private Nachricht erhalten!");
define("L_PRIV_MSGSa", "Hier sind die ersten 10 Nachrichten!<br> Nutzen Sie den Link unten um den Rest zu sehen.");
define("L_PRIV_MSG1", "Von:");
define("L_PRIV_MSG2", "Raum:");
define("L_PRIV_MSG3", "An:");
define("L_PRIV_MSG4", "Nachricht:");
define("L_PRIV_MSG5", "Posted&nbsp;:");
define("L_PRIV_REPLY", "Antwort");
define("L_PRIV_READ", "Dr&uuml;cken Sie den Schlie&szlig;en Button um alle Posts als gelesen zu markieren!");
define("L_PRIV_POPUP", "Sie k&ouml;nnen dieses Popup-Feature jederzeit deaktivieren oder reaktivieren <br> wenn Sie Ihr Profil editieren.(nur f&uuml;r registrierte User)");
define("L_NOT_ONLINE", "%s ist in diesem Augenblick nicht online .");
define("L_PRIV_NOT_ONLINE", "%s ist momentan nicht online,\\n wird aber Ihre Nachricht nach dem Login erhalten.");
define("L_PRIV_NOT_INROOM", "%s ist nicht in diesem Raum.\\n Wenn Sie eine PN hinterlassen wollen,\\n nutzen Sie den Befehl: /wisp %s Nachricht.");
define("L_PRIV_AWAY", "%s ist als abwesend markiert,\\n wird aber Ihre Nachricht erhalten\\n wenn Er/Sie wieder da ist.");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "aktiviert" : "deaktiviert"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "aktiviert" : "deaktiviert"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Gegenw&auml;rtige Einstellungen auf diesem Server</u>:<br>a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br>b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Voreingestellte Farben</u>: Administrator = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderatoren = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, andere User = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Voreingestellte Farbe</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Farbenskala");
define("L_COL_HELP_SUB1", "Anwendung:");
define("L_COL_HELP_P1", "Sie k&ouml;nnen Ihre Standardfarbe beim Editieren Ihres Profils ausw&auml;hlen (die gleiche Farbe wie für Ihren Usernamen). Sie haben noch zus&auml;tzlich die Möglichkeit, jede andere Farbe f&uuml;r Ihre Mitteilungen im Chat auszuw&auml;hlen. Um wieder auf Standardfarbe zu wechseln einfach in der Farbauswahl die Farbe (Null) ausw&auml;hlen - ist ganz oben in der Auswahl.");
define("L_COL_HELP_SUB2", "Hinweise:");
define("L_COL_HELP_P2", "<u>Farbenreihe </u><br>Abh&auml;ngig von dem verwendeten Browser kann es passieren, dass einige Farben nicht dargestellt werden.<br> Es werden nur 16 Farbnamen vom W3C HTML 4.0 standard unterst&uuml;tzt.");
define("L_COL_HELP_P2a", "Wenn ein Benutzer behauptet, dass er Ihre ausgew&auml;hlte Farbe nicht sehen kann, bedeutet es, dass er wahrscheinlich einen &auml;lteren Browser verwendet.");
define("L_COL_HELP_SUB3", "Definierte Einstellungen in diesem Chat:");
define("L_COL_HELP_P3", "<u>Farbnutzberechtigung </u>:<br>1. Administrator kann jede Farbe nutzen.<br>Die voreingestellte Farbe f&uuml;r Administratoren ist <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br>2. Moderatoren k&ouml;nnen jede Farbe nutzen, ausser <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> und <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br>Die voreingestellte Farbe f&uuml;r Moderatoren ist <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br>3. Alle anderen User k&ouml;nnen alle Farben nutzen, ausser <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> und <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Die voreingestellte Farbe ist <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br><br><u>Technisches Zeug</u>: Diese Farben wurden durch Administrator in dem Adminbereich festgelegt.<br> Wenn etwas nicht stimmt oder Ihnen gef&auml;llt die vordefinierte Farbe nicht, bitte wenden Sie sich an den <b>Administrator</b> und nicht an andere User im Chat. :-)");
define("L_COL_HELP_USER_STATUS", "Ihr Status");
define("L_COL_TUT", "Verwenden des farbigen Textes im Chat");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Nur Administrrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CM."!\\n\\n Bitte eine andere Farbe w&auml;hlen.");
define("COL_ERROR_BOX_USRA", "Nur Administrrator kann die ".COLOR_CA." Farbe nutzen!\\n\\n Versuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\n Sie wurden reserviert f&uuml;r Poweruser!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe w&auml;hlen.");
define("COL_ERROR_BOX_USRM", "Sie m&uuml;ssen Moderator sein um ".COLOR_CM." Farbe nutzen zu k&ouml;nnen!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\n Sie wurden reserviert f&uuml;r Poweruser\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe w&auml;hlen.");

// Chat Activity displayed on remote web pages
define("NB_USERS_IN","User sind ".LOGIN_LINK." im Chat</A></td></tr>");
define("USERS_LOGIN","Momentan ist 1 User ".LOGIN_LINK." im Chat</A> </td></tr>");
define("NO_USER","Momentan ist keiner ".LOGIN_LINK." im Chat</A> </td></tr>");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Willkommen im Chat. Bitte beim Chatten folgende Regel befolgen: <I> nett und h&ouml;fflich zu sein.</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Willkommen im Chat. Bitte beim Chatten folgende Regel befolgen: <I> angenehm und h&ouml;fflich zu sein.");
define("WELCOME_MSG_NOSOUND", "Willkommen im Chat. Bitte beim Chatten folgende Regel befolgen: <I> angenehm und h&ouml;fflich zu sein.</I>.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Fl&uuml;stern (private Nachrichten)\\n wurden deaktiviert.");

//Size command error by Ciprian
define("L_ERR_SIZE", "Die Schriftgr&ouml;&szlig;e kann nur \\nnull sein (f&uuml;r Reset) oder zwischen 7 und 15");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Die Einstellungen des Servers wurden ge&auml;ndert. Um St&ouml;rungen zu vermeiden bitte den Browser neu laden. (F5 dr&uuml;cken oder Chat beenden).");

// Week days for status worldtime by Ciprian
define("L_MON", "Mo"); //Montag
define("L_TUE", "Di"); //Dienstag
define("L_WED", "Mi"); //Mittwoch
define("L_THU", "Do"); //Donnerstag
define("L_FRI", "Fr"); //Freitag
define("L_SAT", "Sa"); //Samstag
define("L_SUN", "So"); //Sonntag

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Optionen");
?>