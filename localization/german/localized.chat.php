<?php
// File : german/localized.chat.php - plus version (20.03.2010 - rev.44)
// Original translation by Robert Schaller <robert@schaller.com> & Wolfgang Schneider <schneider@bibelcenter.de>
//    & Martin Sander <Martin.Sander@touch-screen.de> & Bernard Piller <bernard@bmpsystems.com>
//    & Reinhard Hofmann <e9625556@student.tuwien.ac.at> & Christian Hacker <c.hacker@dreamer-chat.de>
// Updates, corrections and additions for the Plus version by Alexander Eisele <xaex@xeax.de> & Thomas Pschernig <tpsde1970@aol.com> & Thomas Schorpp <thomas.schorpp@googlemail.com>
// Fine tuning by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Mitteilungen werden nach %s %s");
define("L_WEL_2", "und inaktive User nach %s %s gelöscht");

define("L_CUR_1", "Hier");
define("L_CUR_1a", "sind zur Zeit");
define("L_CUR_1b", "ist zur Zeit");
define("L_CUR_2", "im Chat");
define("L_CUR_3", "Benutzer momentan in den Chaträumen");
define("L_CUR_4", "Benutzer in privaten Räumen");
define("L_CUR_5", "User sind momentan auf Lauer<br />(beobachten diese Seite):");

define("L_SET_1", "Bitte wähle ...");
define("L_SET_2", "Benutzername");
define("L_SET_3", "die Anzahl angezeigter Mitteilungen");
define("L_SET_4", "zeit zwischen Updates");
define("L_SET_5", "Wähle bitte einen Raum aus ...");
define("L_SET_6", "Voreingestellte öffentliche Räume");
define("L_SET_7", "Wähle ...");
define("L_SET_8", "Vom Benutzer erstellte öffentliche Räume");
define("L_SET_9", "Erstelle Deinen eigenen");
define("L_SET_10", "öffentlichen");
define("L_SET_11", "privaten");
define("L_SET_12", "Raum");
define("L_SET_13", "Und jetzt, auf in den ");
define("L_SET_14", "Chat");
define("L_SET_15", "Private Räume");
define("L_SET_16", "Privater Raum erstellt durch User");
define("L_SET_17", "Wählen Sie Ihren Avatar");
define("L_SET_18", "Setzen Sie ein Lesezeichen: drücke \"Strg+D\".");
define("L_SET_19", "Vergiss mich nicht");

define("L_SRC", "ist kostenlos verfügbar bei");

define("L_SEC", "Sekunde");
define("L_SECS", "Sekunden");
define("L_MIN", "Minute");
define("L_MINS", "Minuten");
define("L_HOUR", "Stunde");
define("L_HOURS", "Stunden");
define("L_DAY", "Tag");
define("L_DAYS", "Tage");

// registration stuff:
define("L_REG_1", "Passwort");
define("L_REG_2", "Registrierte Benutzer");
define("L_REG_3", "Registrieren");
define("L_REG_4", "Benutzerprofil ändern");
define("L_REG_5", "Benutzer löschen");
define("L_REG_6", "Benutzerregistrierung");
define("L_REG_7", "nur wenn Du registriert bist");
define("L_REG_8", "E-Mail-Adresse");
define("L_REG_9", "Du hast Dich erfolgreich registriert.");
define("L_REG_10", "Zurück");
define("L_REG_11", "Bearbeiten");
define("L_REG_12", "Benutzerinformation ändern");
define("L_REG_13", "Benutzer löschen");
define("L_REG_14", "Anmeldung");
define("L_REG_15", "Anmelden");
define("L_REG_16", "Ändern");
define("L_REG_17", "Deine Daten wurden erfolgreich geändert.");
define("L_REG_18", "Sie wurden vom Moderator aus dem Raum gekickt.");
define("L_REG_18a", "Sie wurden vom Moderator aus dem Raum gekickt.<br />Grund: %s");
define("L_REG_19", "Willst Du wirklich gelöscht werden?");
define("L_REG_20", "Ja");
define("L_REG_21", "Du wurdest erfolgreich gelöscht.");
define("L_REG_22", "Nein");
define("L_REG_25", "Schließen");
define("L_REG_30", "Vorname");
define("L_REG_31", "Nachname");
define("L_REG_32", "Homepage");
define("L_REG_33", "E-Mail-Adresse bei /whois Befehl anzeigen");
define("L_REG_34", "Benutzerdaten ändern");
define("L_REG_35", "Administration");
define("L_REG_36", "Ort/Land");
define("L_REG_37", "Felder mit <span class=\"error\">*</span> müssen ausgefüllt werden.");
define("L_REG_39", "Der Raum in dem Du warst, wurde vom Administrator gelöscht.");
define("L_REG_43", "Geheimgehalten"); // Undisclosed, Confidential, Secret, Not telling
define("L_REG_44", "Paar");
define("L_REG_45", "Geschlecht");
define("L_REG_46", "Männlich");
define("L_REG_47", "Weiblich");
define("L_REG_48", "Keine Angaben");
define("L_REG_49", "Anmeldung erforderlich!");
define("L_REG_50", "Anmeldung ausgesetzt!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Deine Einstellungen zum Einstieg in den Chat");
define("L_EMAIL_VAL_2", "Willkommen auf unserem Chat-Server.");
define("L_EMAIL_VAL_Err", "Interner Fehler, bitte kontaktiere den Administrator: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Das Passwort wurde an Ihre E-Mail-Adresse verschickt.<br />Sie können das Passwort jederzeit auf der Login-Seite \"".L_REG_4."\.");
define("L_EMAIL_VAL_PENDING_Done", "Ihre Registrierten Daten wurden zur Prüfung vorgelegt.");
define("L_EMAIL_VAL_PENDING_Done1", "Ihr Kennwort erhalten Sie, nachdem der Administrator Sie freigeschaltet hat.");
define("L_EMAIL_VAL_3", "Ihre Anmeldung ist anhängig für %s");
define("L_EMAIL_VAL_31", "Herzlichen Glückwunsch! Ihre Anmeldung wurde geprüft und genehmigt!");
define("L_EMAIL_VAL_32", "Dies sind Ihre Registrierungsdaten für %s bei %s:");
define("L_EMAIL_VAL_4", "Sie haben dieses Konto nur registriert für %s bei %s:");
define("L_EMAIL_VAL_41", "Sie haben wichtige Informationen geändert für %s bei %s (Konto betroffen: %s).");
define("L_EMAIL_VAL_5", "Ihr - %s – Kontoinformationen für %s");
define("L_EMAIL_VAL_51", "Ihr - %s - Konto aktualisiert informationen für %s");
define("L_EMAIL_VAL_6", "Registriert am %s");
define("L_EMAIL_VAL_61", "Aktualisiert am %s");
define("L_EMAIL_VAL_7", "Unten ist Ihre %s aktualisierte Kontoinformation:");
define("L_EMAIL_VAL_8", "Speichern Sie diese E-Mail für Ihre Zukunft auf.\nBewahren Sie es sicher auf und teilen diese Daten niemanden mit.\nVielen Dank für den Beitritt! Viel Spaß!");
define("L_EMAIL_VAL_81", "Sie können das Passwort jederzeit auf der Login-Seite \"".L_REG_4."\.");

// admin stuff
define("L_ADM_1", "%s ist nicht mehr Moderator für diesen Raum.");
define("L_ADM_2", "Du bist kein registrierter Benutzer mehr.");

// error messages:
define("L_ERR_USR_1", "Dieser Benutzername wird schon verwendet. Wähle einen neuen.");
define("L_ERR_USR_2", "Du musst einen Benutzernamen wählen.");
define("L_ERR_USR_3", "Dieser Benutzername wird schon verwendet.<br />Bitte gib das Passwort ein oder wähle einen anderen Benutzernamen.");
define("L_ERR_USR_4", "Du hast ein falsches Passwort angegeben.");
define("L_ERR_USR_5", "Du mußt einen Benutzernamen angeben.");
define("L_ERR_USR_6", "Du mußt ein Passwort angeben.");
define("L_ERR_USR_7", "Du mußt Dein E-Mail angeben.");
define("L_ERR_USR_8", "Du mußt eine korrekte E-Mail-Adresse angeben.");
define("L_ERR_USR_9", "Dieser Benutzername ist bereits vergeben.");
define("L_ERR_USR_10", "Falscher Benutzername oder Passwort.");
define("L_ERR_USR_11", "Dafür müssen Sie Administrator sein.");
define("L_ERR_USR_12", "Als Administrator können Sie nicht gelöscht werden.");
define("L_ERR_USR_13", "Du mußt registriert sein, um eigene Räume anlegen zu können.");
define("L_ERR_USR_14", "Du mußt registriert sein, um zu chatten.");
define("L_ERR_USR_15", "Du mußt Deinen vollen Namen angeben.");
define("L_ERR_USR_16", "Nur folgende Zeichen sind erlaubt:\\n".$REG_CHARS_ALLOWED."\\nLeerzeichen, Kommata oder Backslashes (\\) sind nicht erlaubt.\\nüberprüfen Sie die Syntax.");
define("L_ERR_USR_16a", "Nur folgende Zeichen sind erlaubt:<br />".$REG_CHARS_ALLOWED."<br />Leerzeichen, Kommata und Backslashes (\\) sind nicht erlaubt. Überprüfen Sie die Syntax.");
define("L_ERR_USR_17", "Dieser Raum existiert nicht und Du darfst keinen anlegen.");
define("L_ERR_USR_18", "Dein Benutzername enthält ein verbotenes Wort.");
define("L_ERR_USR_19", "Du kannst nicht in mehreren Räumen zugleich sein.");
define("L_ERR_USR_20", "Du wurdest aus diesem Raum oder aus dem Chat verbannt.");
define("L_ERR_USR_20a", "Sie wurden aus dem Raum oder aus dem Chat verbannt.<br />Grund: %s");
define("L_ERR_USR_21", "Sie waren in den letzten ".C_USR_DEL." Minuten nicht aktiv,<br />deswegen wurden Sie aus dem Raum verwiesen.");
define("L_ERR_USR_22", "Dieser Befehl existiert nicht für \\nden Browser den Sie nutzen (IE engine).");
define("L_ERR_USR_23", "Sie müssen registriert sein um einen privaten Raum betreten zu können.");
define("L_ERR_USR_24", "Sie müssen registriert sein um einen privaten Raum erstellen zu können.");
define("L_ERR_USR_25", "Nur ein Administrator kann ".$COLORNAME." Farbe nutzen!<br />Versuchen Sie nicht Farben ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nutzen.<br />Diese sind für Poweruser reserviert!");
define("L_ERR_USR_26", "Nur Administratoren und Moderatoren können ".$COLORNAME." Farbe nutzen!<br />Versuchen Sie nicht Farben ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nutzen.<br />Diese sind für Poweruser reserviert!");
define("L_ERR_USR_27", "Sie können sich nicht selber anschreiben.\\nWählen Sie einen anderen Usernamen.");
define("L_ERR_USR_28", "Ihr Zugang zu %s Raum hat Beschränkungen!<br />Bitte wählen Sie einen anderen Raum.");
define("L_ERR_ROM_1", "Der Name des Raums darf keine Kommata und Backslashes (\\) enthalten.");
define("L_ERR_ROM_2", "Der Name des Raumes den Du anlegen willst enthält ein verbotenes Wort.");
define("L_ERR_ROM_3", "Dieser Raum existiert schon als öffentlicher Raum.");
define("L_ERR_ROM_4", "Ungültiger Raumname.");

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
define("L_ROOMS", "Räume");
define("L_EXPCOL", "Raum ausklappen/einklappen");
define("L_BEEP", "Piep/Kein Piep bei Benutzer-Eintritt");
define("L_PROFILE", "Profil anzeigen");
define("L_NO_PROFILE", "Kein Profil");
define("L_LURKER", "Beobeachter");
define("L_LURKERS", "Beobeachter");

// input frame
define("L_HLP", "Hilfe");
define("L_MODERATOR", "%s ist nun Moderator für diesen Raum.");
define("L_KICKED", "%s wurde erfolgreich gekickt.");
define("L_KICKED_REASON", "%s wurde erfolgreich gekickt. (Grund: %s)");
define("L_KICKED_ALL", "Alle Mitglieder sind erfolgreich entfernt worden.");
define("L_KICKED_ALL_REASON", "Alle Mitglieder sind erfolgreich entfernt worden. (Grund: %s)");
define("L_BANISHED", "%s wurde erfolgreich verbannt.");
define("L_BANISHED_REASON", "%s wurde erfolgreich verbannt. (Grund: %s)");
define("L_ANNOUNCE", "ANKÜNDIGUNG");
define("L_INVITE", "%s lädt Dich in den Raum <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> ein.");
define("L_INVITE_REG", "Du hast Dich zum Betritt für diesen Raum registriert.");
define("L_INVITE_DONE", "Deine Einladung wurde an %s geschickt.");
define("L_OK", "Senden");
define("L_BUZZ", "Summergalerie");
define("L_BAD_CMD", "Dies ist kein gültiger Befehl!");
define("L_ADMIN", "%s ist bereits Administrator!");
define("L_IS_MODERATOR", "%s ist bereits Moderator!");
define("L_NO_MODERATOR", "Nur der Moderator dieses Raums darf diesen Befehl verwenden.");
define("L_NONEXIST_USER", "%s ist nicht in diesem Raum.");
define("L_NONREG_USER", "%s ist nicht angemeldet.");
define("L_NONREG_USER_IP", "Seine IP ist: %s.");
define("L_NO_KICKED", "%s ist Moderator oder Administrator und kann nicht gekickt werden.");
define("L_NO_BANISHED", "%s ist Moderator oder Administrator und kann nicht verbannt werden.");
define("L_SVR_TIME", "Server Zeit: ");
define("L_NO_SAVE", "Keine Nachricht zum Speichern!");
define("L_NO_ADMIN", "Nur der Administrator kann diesen Befehl verwenden.");
define("L_NO_REG_USER", "Sie müssen registriert sein um diesen Befehl nutzen zu können.");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Text-Formatierungen der Nachrichten");
define("L_HELP_FMT_1", "Du kannst den Text Deiner Nachrichten fett, kursiv oder unterstrichen formatieren, wenn Du den Text entweder mit &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; oder &lt;U&gt; &lt;/U&gt; Tags umgibst.<br />z.B.: &lt;B&gt;dieser Text&lt;/B&gt; erzeugt <B>diesen Text</B>");
define("L_HELP_FMT_2", "Um einen Hyperlink in einer Nachricht zu erzeugen (für E-Mail oder eine URL), gib einfach die Adresse ohne einen Tag ein. Der Link wird automatisch erzeugt.");
define("L_HELP_TIT_3", "Befehle");
define("L_HELP_NOTE", "Alle Kommandos müssen in englisch eingegeben werden!");
define("L_HELP_MSG", "mitteilung");
define("L_HELP_MSGS", "mitteilunge");
define("L_HELP_ROOM", "Raum");
define("L_HELP_BUZZ", "~soundname");
define("L_HELP_BUZZ1", "Klingeln..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "der Grund");
define("L_HELP_MR", "Herr %s");
define("L_HELP_MS", "Frau %s");
define("L_HELP_CMD_0", "{} steht für eine erforderliche Einstellung, [] für eine optionale.");
define("L_HELP_CMD_1a", "Einstellung der Anzahl angezeigter Mitteilungen, mindestens 5.");
define("L_HELP_CMD_1b", "Nachrichten neu laden und die letzten n Nachrichten anzeigen, mindestens 5.");
define("L_HELP_CMD_2a", "Einstellung der Verzögerung bei der Mitteilungsaktualisierung (in Sekunden).<br />Wird n nicht bestimmt oder ist n kleiner als 3, dann wird zwischen keiner Aktualisierung und 10 Sekunden gewechselt.");
define("L_HELP_CMD_2b", "Einstellung der Verzögerung bei der Mitteilungsaktualisierung (in Sekunden).<br />Wird n nicht bestimmt oder ist n kleiner als 3, dann wird zwischen keiner Aktualisierung und 10 Sekunden gewechselt.");
define("L_HELP_CMD_3", "Anordnung der Nachrichten ändern (nicht in allen Browsern).");
define("L_HELP_CMD_4", "Zu einem anderen Raum wechseln. Der Raum wird neu erstellt, falls er noch nicht existiert und man dazu die Erlaubnis hat.<br />n = 0 für private und n = 1 für öffentliche Räume. Falls keine Eingabe erfolgt, wird n = 1 angenommen.");
define("L_HELP_CMD_5", "Den Chat nach einer optionalen Mitteilung verlassen.");
define("L_HELP_CMD_6", "Anzeige von Mitteilungen eines Benutzers ignorieren, wenn ein Benutzername angegeben ist.<br />Anzeige für alle Benutzer, wenn nur - ohne Benutzername angegeben wird.<br />Ohne Zusatz öffnet dieser Befehl ein Fenster, in dem alle ignorierten Namen angezeigt werden.");
define("L_HELP_CMD_7", "Den zuletzt getippten Text wieder anzeigen (Befehl oder Mitteilung).");
define("L_HELP_CMD_8", "Zeitangabe vor Mitteilungen ein/aus.");
define("L_HELP_CMD_9", "Kickt User aus dem Chat. Diesen Befehl können nur Moderatoren des jeweiligen Raums und Administatoren nutzen. Optional, [".L_HELP_REASON."] der Grund des Verweises kann angezeigt werden (irgendein Text).<br />Falls * Option gewählt wird, wird dieser Befehl alle Mitglieder ohne Rechte entfernen (Ausnahme: Gäste und angemeldete Mitglieder). Dies ist wichtig, sollte der Server Probleme haben und alle Mitglieder sollten einen Reload durchführen. In diesem Falle, [".L_HELP_REASON."] sollte man die Mitglieder wissen lassen, warum sie entfernt wurden.");
define("L_HELP_CMD_10", "Eine private Nachricht an den angegebenen Benutzer schicken (andere Benutzer sehen diese Nachricht nicht).");
define("L_HELP_CMD_11", "Informationen zu einem angegebenen Benutzer anzeigen.");
define("L_HELP_CMD_12", "Popup Fenster zur Änderung des Benutzerprofils.");
define("L_HELP_CMD_13", "Schaltet um ob Du über das Kommen oder Gehen von Benutzern in einem Raum informiert wirst oder nicht.");
define("L_HELP_CMD_14", "Erlaubt dem Administrator oder den Moderatoren des aktuellen Raumes Moderator von anderen Räumen eines registrierten Benutzers zu werden.");
define("L_HELP_CMD_15", "Nachrichten löschen und nur die letzten 5 zeigen.");
define("L_HELP_CMD_16", "Die letzten n Nachrichten als HTML-Datei speichern (ausgenommen Mitteilungen). Wird n nicht bestimmt, dann werden alle Nachrichten eingeschlossen.");
define("L_HELP_CMD_17", "Erlaubt dem Administrator Ankündigungen an alle Benutzer zu senden, egal in welchem Raum diese chatten.");
define("L_HELP_CMD_18", "Einem Benutzer eines anderen Raumes vorschlagen, in den eigenen zu wechseln.");
define("L_HELP_CMD_19", "Erlaubt den Moderatoren/Administrator einen Benutzer für eine vom Administrator bestimmte Zeit aus dem Raum zu \"verbannen\".<br />Der Administrator kann auch Benutzer anderer Räume verbannen und die Einstellung * verwenden um Benutzer \"für immer\" aus dem gesamten Chat zu verbannen.");
define("L_HELP_CMD_20", "Beschreiben, was du grade tust, ohne Dich selbst zu erwähnen.");
define("L_HELP_CMD_21", "Verkündet in dem Raum und an die User, die versuchen Sie anzuschreiben, dass Sie grade abwesend sind.<br />Sie verlassen den Abwesenheitsmodus indem Sie anfangen mit schreiben.");
define("L_HELP_CMD_22", "Sendet einen Summerton und zeigt eine Nachricht im gegenwärtigen Raum.<br />- Anwendung: \"/buzz\" oder \"/buzz Ihre Nachricht\" - spielt einen voreingestellten Sound ab;<br />- erweiterte Anwendung: \"/buzz ".L_HELP_BUZZ."\" oder \"/buzz ".L_HELP_BUZZ." Ihre Nachricht\" - spielt die soundname.wav Datei aus dem Verzeichnis /sounds im Chat; Bitte das Zeichen \"~\" vor dem Dateinamen nicht vergessen. Es sind nur Dateierweiterungen im Format .wav erlaubt.<br />Standardmäßig ist es ein Moderator/Admin-Befehl.");
define("L_HELP_CMD_23", "Sendet <i>whisper</i> (eine private Nachricht). Die Nachricht wird den Bestimmungsort erreichen, ganz gleich in welchem Raum der Benutzer ist. Wenn der Benutzer nicht online ist oder im Abwesenheitsmodus ist, werden Sie darüber benachrichtigt.");
define("L_HELP_CMD_24", "Dieser Befehl ändert das Thema des gegenwärtigen Raums. Versuchen Sie, andere Benutzerthemen nicht zu überschreiben. Verwenden Sie nur wichtige Themen.<br />Standardmäßig ist es ein Moderator/Admin-Befehl.<br />Durch den \"/topic reset\" Befehl wird das aktuelle Topic gelöscht und durch Standardtopic ersetzt.<br />Optional, \"/topic * {}\" und \"/topic * reset\" ist der gleiche Befehl, löscht aber die Themen in allen Räumen (global topic und global topic reset).");
define("L_HELP_CMD_25", "Ein Würfelspiel.<br />Anwendung: /dice or /dice [n];<br />n kann eine Zahl zwischen <b>1 und %s</b> sein. (es ist die Anzahl der Würfel). Wenn keine Zahl angegeben wurde, wird die voreingestellte größte Zahl genommen.");
define("L_HELP_CMD_26", "Das ist eine kompliziertere Version des Würfelspiels (/dice).<br />Anwendung: /{n1}d[n2] oder /{n1}d;<br />n1 kann eine Zahl zwischen <b>1 und %s</b> sein (es ist die Anzahl der Würfe).<br />n2 kann eine Zahl zwischen <b>1 und %s</b> sein (es ist die Anzahl der Würfel).");
define("L_HELP_CMD_27", "Dieser Befehl hebt die Nachrichten eines ausgewählten Users hervor um das Lesen zu erleichtern.<br />Anwendung: /high {user} oder drücke auf das kleine <img src=./images/highlightOff.gif> Quadrat rechts neben dem Namen des Users (in der Raum/User-Liste)");
define("L_HELP_CMD_28", "Dieser Befehl erlaubt ein <i>einzelnes</i> Bild in Ihre Nachricht einzufügen.<br />Anwendung: das Bild muss im Internet und für jeden zugänglich sein. Bitte keine Seiten angeben, die Login erfordern.<br />Es muss der komplette Pfad angegeben werden. Bsp: <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Erlaubte Erweiterungen: .jpg .bmp .gif .png.<br />Hinweis: schreibe zuerst \"/img\" Leerzeichen und dann die URL zum Bild einfügen.<br />Bitte keine Bilder, die auf Ihrem PC abgelegt sind, wählen. Das Bild ist für keinen sichtbar!!!");
define("L_HELP_CMD_29", "Der zweite Befehl erlaubt dem Administrator oder dem Moderator des gegenwärtigen Raums Users zu degradieren die vorher zum Moderator im gleichen Raum ernannt wurden.<br />Die * Option degradiert den User in allen Räumen.");
define("L_HELP_CMD_30", "Der zweite Befehl ist ähnlich dem Befehl \"/me\" aber er zeigt noch zusätzlich das Geschlecht an.<br />Bsp: * ".sprintf(L_HELP_MR, "Ciprian")." schaut TV oder * ".sprintf(L_HELP_MS, "Dana")." ist glücklich.");
define("L_HELP_CMD_31", "Sortiert die User nach alphabetischer Reihenfolge oder nach Eingangszeit.");
define("L_HELP_CMD_32", "Das ist die dritte Version des Würfelspiels.<br />Anwendung: /d{n1}t[n2] oder /d{n1};<br />n1 kann eine Zahl zwischen <b>1 und 100</b> sein (es ist die Anzahl der Würfe pro Würfel).<br />n2 kann eine Zahl zwischen <b> 1 and %s</b> (es ist die Anzahl der Würfel.");
define("L_HELP_CMD_33", "Ändert die Größe der Schriftart in den Nachrichten (erlaubt sind Werte für n zwischen <b>7 und 15</b>); Der Befehl \"/size\" setzt die Größe der Schriftart auf standard zurück (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "Dies gibt die Richtungsorientierung einer Textnachricht an (ltr = left-to-right, rtl = right-to-left).");
define("L_HELP_CMD_35", "Es erlaubt die entsendung von <i>ein Video</i> oder <i>ein Audiodatei</i>in einem kleinen Flash Player eins hinter ein ander.<br />Gebrauch: Fügen sie einfach die URL  der Quelle ein das gepostet sollte! Z.B <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Sie benötigen den Shockwave Flash Player auf ihrem System installiert. Der Link ist fall bedingt sensitive!<br />Hinweis:gib ein /video gefolgt von einem Leerzeichen und fügensie die URL in das Feld ein.");
define("L_HELP_CMD_35a", "Der zweite Befehl funktioniert nur mit youtube.com als Videoquelle.<br />Z.B <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "Es erlaubt posten von<i>ein youtube Video</i> ein Audiodatei</i>in einem kleinen Flash Player eins hinter ein ander<br />Gebrauch: Fügen sie einfach die URL  der Quelle ein das gepostet sollte! Z.B <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />Sie benötigen den Shockwave Flash Player auf ihrem System installiert. Der Link ist fall bedingt sensitive!<br />Hinweis:gib ein /tube gefolgt von einem Leerzeichen und fügensie die URL in das Feld ein.");
define("L_HELP_CMD_37", "It allows posting of <i>MathJax Equations/Formulas</i> in chat.<br />Usage: Just paste the TeX or MathML (original) codes! E.g. <b>/math&nbsp;\sqrt{3x-1}+(1+x)^2</b><br />For more code samples and instructions go to: <a href=\"http://www.mathjax.org/demos/\" target=\"_blank\">http://www.mathjax.org/demos</a>. Get the code by right-clicking on the formulas.<br />HINTS: type /math followed by a space and paste the code into the box.");
define("L_HELP_CMD_VAR", "Funktionsgleiche Kommandos: %s"); // a list of English and/or translated alternatives for each command, provided in help.
define("L_HELP_ETIQ_1", "Chat-Etikette");
define("L_HELP_ETIQ_2", "Unsere Community sollte freundlich und lustig bleiben, also halten Sie sich bitte an folgende Richtlinien. Wenn Sie die Regeln nicht einhalten, werden Sie von unseren Moderatoren aus dem Chat verwiesen.<br /><br />Danke!");
define("L_HELP_ETIQ_3", "Unsere Chat-Etikette-Richtlinien");
define("L_HELP_ETIQ_4", "<li>Bitte den Chat nicht mit Unsinn und Quatsch vollspammen oder flooden.</li>
<li>Verwenden Sie bitte keine aLtErnAtiVE Schreibweise.</li>
<li>Verwenden der CAPS-LOCK-TASTE ist nicht gestattet. Brüllen könnt Ihr zu Hause machen.</li>
<li>Bedenken Sie, dass in userem Chat Leute aus der ganzen Welt und mit unterschiedlichen Glaubensrichtungen hier sein können. Bitte seien Sie nett und höfflich.</li>
<li>Wir bitten Sie unpolitisch zu bleiben, Gotteslästerungen o.ä. und Verwenden von Schimpfwörtern zu unterlassen.</li>
<li>Reden Sie andere User nicht mit Vornamen oder Namen an, wenn sie es nicht wünschen. Dafür gibt es die Nicknamen.</li>");

//message frame
define("L_NO_MSG", "Keine Mitteilungen...");
define("L_TODAY_DWN", "Die Nachrichten, die heute geschrieben werden, werden unten angezeigt");
define("L_TODAY_UP", "Die Nachrichten, die heute geschrieben werden, werden oben angezeigt");

// message colors
$TextColors = array("Schwarz" => "#000000",
				"Rot" => "#FF0000",
				"Grün" => "#009900",
				"Blau" => "#0000FF",
				"Lila" => "#9900FF",
				"Dunkelrot" => "#990000",
				"Dunkelgrün" => "#006600",
				"Dunkelblau" => "#000099",
				"Kastanienbraun" => "#996633",
				"Aquablau" => "#006699",
				"Orange" => "#FF6600");

//ignored popup
define("L_IGNOR_TIT", "Ignoriert");
define("L_IGNOR_NON", "Keine ignorierten Benutzer");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_OWNER", "Besitzer");
define("L_WHOIS_TOPMOD", "Top Moderator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_MODERS", "Moderatoren");
define("L_WHOIS_OTHERS", "Andere Benutzer");
define("L_WHOIS_USER", "Benutzer");
define("L_WHOIS_GUEST", "Gast");
define("L_WHOIS_REG", "Registriert");
define("L_WHOIS_BOT", "Bot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s betritt diesen Raum.");
define("L_EXIT_ROM", "%s verläßt den Raum.");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s wurde wegen Inaktivität aus diesem Raum verwiesen.");
define("L_CLOSED_ROM", "%s hat den Browser geschlossen.");

// Text for /away command notification string:
define("L_AWAY", "%s ist abwesend...");
define("L_BACK", "%s ist zurück!");

// Quick Menu mod
define("L_QUICK", "Quick Menu");

// Topic Banner mod
define("L_TOPIC", "änderte ÜBERSCHRIFT auf:");
define("L_TOPIC_RESET", "hat das ÜBERSCHRIFT zurückgesetzt");
define("L_HELP_TOP", "das ÜBERSCHRIFT (TOPIC) muss mindestens zwei Worte enthalten.");
define("L_BANNER_WELCOME", "Willkommen im %s!"); // room name
define("L_BANNER_TOPIC", "Überschrift:");
define("L_DEFAULT_TOPIC_1", "Dies ist die Standardüberschrift. Bearbeiten Sie localization/_owner/owner.php, um dies zu ändern!");

// Img cmd mod
define("L_PIC", "Bild gepostet von");
define("L_PIC_RESIZED", "Größe ändern auf");
define("L_HELP_IMG", "gesamtpfad zum Bild");
define("L_NO_IMAGE", "Ungültige oder nichtöffenliche URL zum Bild\\nBitte korrigieren!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s ist nicht mehr Moderator für sämtliche Räume in diesem Chat.");
define("L_IS_NO_MODERATOR", "%s ist kein Moderator.");
define("L_ERR_IS_ADMIN", "%s ist ein Administrator!\\nSie können seine Berechtigungen nicht ändern.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Extra Befehle vorhanden:");
define("INFO_MODS", "Extra Features/Mods vorhanden:");
define("INFO_BOT", "Unser Bot ist:");

// Profile mod
define("L_PRO_1", "Sprachen");
define("L_PRO_1a", "Sprache");
define("L_PRO_2", "Favoriten Link 1");
define("L_PRO_3", "Favoriten Link 2");
define("L_PRO_4", "Beschreibung");
define("L_PRO_5", "URL zum Bild");
define("L_PRO_6", "Ihre Namens-/Textfarbe");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Falsche URL oder Host existiert nicht.");
define("L_TITLE_AV", "Ihr gegenwärtiger Avatar: ");
define("L_CHG_AV", "Klicke auf \"".L_REG_16."\" im Profil-Menü<br />um Ihr Avatar zu speichern.");
define("L_SEL_NEW_AV", "Wählen Sie einen neuen Avatar aus");
define("L_EX_AV", "beispiel");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Geben Sie URL-Adresse ein, und betätigen die Enter-Taste um es zu sehen.");
define("L_CANCEL", "Abbrechen");
define("L_AVA_REG", "Du musst registriert sein\\num das Avatar-Icon zu wechseln");
define("L_SEL_NEW_AV_CONFIRM", "Dieses Formular wurde nicht vorgelegt.\\nWenn du jetzt in den Avatar gehst\\nverlierst du alle angaben die gemacht wurden!\\n\\nBist du dir sicher?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPPS: Unser Bot ist in diesem Raum öffentlich aktiv. Um mit dem Bot zu sprechen, tippen Sie <b>hello ".C_BOT_NAME."</b> ein. Zum Beenden, eintippen: <b>bye ".C_BOT_NAME."</b>. (privat: /to <b>".C_BOT_NAME."</b> Nachricht)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPPS: Unser Bot ist im %s Raum öffentlich aktiv. Sie können nur privat sprechen, indem Sie seinen Namen anklicken. (Befehl: /wisp <b>".C_BOT_NAME."</b> Nachricht)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPPS: Unser bot ist nicht öffentlich aktiv. Sie können nur privat sprechen, indem Sie seinen Namen anklicken. (Befehle: /to <b>".C_BOT_NAME."</b> Nachricht oder /wisp <b>".C_BOT_NAME."</b> Nachricht)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot läuft nicht in diesen Raum!");
define("BOT_START_ERROR", "Bot läuft bereits in diesen Raum!");
define("BOT_DISABLED_ERROR", "Bot wurde im Adminbereich deaktiviert!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "rollt die Würfel, die Ergebnisse sind:");
define("DICE_WRONG", "Sie müssen auswählen wieviele Würfel geworfen werden sollen\\n(Wählen Sie eine Nummer zwischen 1 und ".MAX_ROLLS.").\\nDann nur /dice eintippen um ".MAX_ROLLS." Würfel rollen zu lassen.");
define("DICE2_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen für alle ".MAX_ROLLS." Würfel\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "Der erste Wert muss zwischen 1 und ".MAX_DICES."sein.\\n(z.B. /".MAX_DICES."d oder /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "Der zweite Wert muss zwischen 1 und ".MAX_ROLLS."sein.\\nLeer lassen für alle ".MAX_ROLLS." Würfel\\n(z.B. /d50 oder /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "Öffnet Popup-Fenster bei privaten Nachrichten");
define("L_REG_POPUP_NOTE", "Ihre Pop-up Blocker sollten deaktiviert werden!");
define("L_PRIV_POST_MSG", "Eine private Nachricht senden!");
define("L_PRIV_MSG", "Eine neue private Nachricht erhalten!");
define("L_PRIV_MSGS", "%s neue private Nachrichten erhalten!");
define("L_PRIV_MSGSa", "Hier sind die ersten 10 Nachrichten!<br />Nutzen Sie den Link unten um den Rest zu sehen.");
define("L_PRIV_MSG1", "Von:");
define("L_PRIV_MSG2", "Raum:");
define("L_PRIV_MSG3", "An:");
define("L_PRIV_MSG4", "Nachricht:");
define("L_PRIV_MSG5", "Beitrag:");
define("L_PRIV_REPLY", "Antwort");
define("L_PRIV_READ", "Drücken Sie den ’".L_REG_25."’ Button um alle Posts als gelesen zu markieren!");
define("L_PRIV_POPUP", "Sie können dieses Popup-Feature jederzeit de- oder reaktivieren<br />wenn Sie Ihr");
define("L_PRIV_POPUP1", "Profil</a> editieren (nur für registrierte User)");
define("L_NOT_ONLINE", "%s ist in diesem Augenblick nicht online.");
define("L_PRIV_NOT_ONLINE", "%s ist momentan nicht online,\\nwird aber Ihre Nachricht nach dem Login erhalten.");
define("L_PRIV_NOT_INROOM", "%s ist nicht in diesem Raum.\\nWenn Sie eine PN hinterlassen wollen,\\nnutzen Sie den Befehl: /wisp %s Nachricht.");
define("L_PRIV_AWAY", "%s ist als abwesend markiert,\\nwird aber Ihre Nachricht erhalten\\nwenn Er/Sie wieder da ist.");
define("PM_DISABLED_ERROR", "Flüstern (private Nachrichten)\\nwurden deaktiviert.");
define("L_NEXT_PAGE", "Zur nächsten Seite gehen");
define("L_NEXT_READ", "Nächste %s lesen"); // message / 10 messages
define("L_ROOM_ALL", "Alle Räume");
define("L_PRIV_MSG5", "Posted:");
define("L_PRIV_MSG5", "Beitrag:");
define("L_PRIV_NO_MSGS", "Keine privaten Nachrichten eingegangen");
define("L_PRIV_READ_MSG", "1 private Nachricht erhalten");
define("L_PRIV_READ_MSGS", "%s private Nachrichten erhalten");
define("L_PRIV_MSGS_NEW", "Neu");
define("L_PRIV_MSGS_READ", "Lesen");
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Seite neu laden");
define("L_PRIV_MARK_ALL", "Alle als Gelesen markieren");
define("L_PRIV_MARK_SEL", "Markierte als Gelesen markieren");
define("L_PRIV_REMOVE", "Kontrollierte PMs Entfernen");
define("L_PRIV_PM", "(Privatnachricht)");
define("L_PRIV_WISP", "(Flüstern)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Aktiviert");
define("L_DISABLED", "Deaktiviert");
define("L_COLOR_HEAD_SETTINGS", "Gegenwärtige Einstellungen auf diesem Server:");
define("L_COLOR_HEAD_SETTINGSa", "Voreingestellte Farben:");
define("L_COLOR_HEAD_SETTINGSb", "Voreingestellte Farbe:");
define("L_COL_HELP_TITLE", "Farbenskala");
define("L_COL_HELP_SUB1", "Anwendung:");
define("L_COL_HELP_P1", "Sie können Ihre Standardfarbe beim Editieren Ihres Profils auswählen (die gleiche Farbe wie für Ihren Usernamen). Sie haben noch zusätzlich die Möglichkeit, jede andere Farbe für Ihre Mitteilungen im Chat auszuwählen. Um wieder auf Standardfarbe zu wechseln einfach in der Farbauswahl die Farbe (Null) auswählen - ist ganz oben in der Auswahl.");
define("L_COL_HELP_SUB2", "Hinweise:");
define("L_COL_HELP_P2", "<u>Farbenreihe</u><br />Abhängig von dem verwendeten Browser kann es passieren, dass einige Farben nicht dargestellt werden. Es werden nur 16 Farbnamen vom W3C HTML 4.0 standard unterstützt.");
define("L_COL_HELP_P2a", "Wenn ein Benutzer behauptet, dass er Ihre ausgewählte Farbe nicht sehen kann, bedeutet es, dass er wahrscheinlich einen älteren Browser verwendet.");
define("L_COL_HELP_SUB3", "Definierte Einstellungen in diesem Chat:");
define("L_COL_HELP_P3", "<u>Farbnutzberechtigung</u>:<br />1. Administrator kann jede Farbe nutzen.<br />Die voreingestellte Farbe für Administratoren ist <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderatoren können jede Farbe nutzen, ausser <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> und <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />Die voreingestellte Farbe für Moderatoren ist <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. Alle anderen User können alle Farben nutzen, ausser <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> und <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "Die voreingestellte Farbe ist <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Technisches Zeug</u>: Diese Farben wurden durch Administrator in dem Adminbereich festgelegt.<br />Wenn etwas nicht stimmt oder Ihnen gefällt die vordefinierte Farbe nicht, bitte wenden Sie sich an den <b>Administrator</b> und nicht an andere User im Chat. :-)");
define("L_COL_HELP_USER_STATUS", "Ihr Status");
define("L_COL_TUT", "Verwenden des farbigen Textes im Chat");
define("L_NULL", "Null");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "Farbe der Räume");
define("L_PRO_COLOR", "Profil-Farbe");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Nur Administrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CM."!\\n\\nBitte eine andere Farbe wählen.");
define("COL_ERROR_BOX_USRA", "Nur Administrator kann die ".COLOR_CA." Farbe nutzen!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\nSie wurden reserviert für Poweruser!\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe wählen.");
define("COL_ERROR_BOX_USRM", "Sie müssen Moderator sein um ".COLOR_CM." Farbe nutzen zu können!\\n\\nVersuchen Sie nicht ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." oder ".COLOR_CM1." zu nehmen\\n\\nSie wurden reserviert für Poweruser\\n\\nIhre Farbe wurde gesetzt auf ".COLOR_CD."!\\n\\nBitte eine andere Farbe wählen.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Willkommen im Chat. Bitte beim Chatten folgende Regel befolgen: <I>angenehm und höfflich zu sein</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "Die Einstellungen des Servers wurden geändert. Um Störungen zu vermeiden bitte den Browser neu laden. (F5 drücken oder Chat beenden).");

//Size command error by Ciprian
define("L_ERR_SIZE", "Die Schriftgröße kann nur\\nnull sein (für Reset) oder zwischen 7 und 15");

// Password reset form by Ciprian
define("L_PASS_0", "Neues Passwort anfordern");
define("L_PASS_1", "Geheime Frage");
define("L_PASS_2", "Welches war Dein erstes Auto?"); // Don't change this question! Just translate it!
define("L_PASS_3", "Der Name Deines ersten Haustieres?"); // Don't change this question! Just translate it!
define("L_PASS_4", "Was ist Dein Lieblingsdrink?"); // Don't change this question! Just translate it!
define("L_PASS_5", "Wann ist Dein Geburtstag?"); // Don't change this question! Just translate it!
define("L_PASS_6", "Geheime Antwort");
define("L_PASS_7", "Passwort zurücksetzen");
define("L_PASS_8", "Dein Passwort wurde erfolgreich zurückgesetzt.");
define("L_PASS_9", "Dein neues Passwort un den Chat zu betreten");
define("L_PASS_10", "Dein neues Passwort un den Chat zu betreten: %s");
define("L_PASS_11", "Willkommen zurück auf unseren Chat-Server!");
define("L_PASS_12", "Wähle Deine Frage ...");
define("L_ERR_PASS_1", "Falscher Username! Benutze deinen.");
define("L_ERR_PASS_2", "Falsche eMail. Nochmal versuchen!");
define("L_ERR_PASS_3", "Ungültige geheime Frage.<br />Beantworte eine der unten angezeigten Fragen!");
define("L_ERR_PASS_4", "Falsche geheime Antwort. Nochmal versuchen!");
define("L_ERR_PASS_5", "Du hast deine geheimen Fragen nicht angegeben.");
define("L_ERR_PASS_6", "Du hast bisher deine geheimen Fragen nicht angegeben.<br />Du kannst dieses Formular nicht benutzen. Kontaktiere den Admin!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s wurde zu einem Administrator dieses Chats.");
define("L_ADM_4", "%s ist nicht länger ein Administrator dieses Chats.");

// Links popup page by Alex
define("L_LINKS_1", "Veröffentlichte Links");
define("L_LINKS_2", "Hier können Sie die veröffentlichten Links besuchen");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Klick hier %s %s");
define("L_CLICK", "Klick hier %s");
define("L_LINKS_3", "um einen Link zu öffnen"); // Click here + all above (Click here is already translated in L_CLICK)
define("L_LINKS_4", "um die Seite des Autors zu öffnen");
define("L_LINKS_5", "um diesen Smilie einzufügen");
define("L_LINKS_6", "um den Autor"); // Click here + to contact + author -> translator (below)
define("L_LINKS_7", "um die Homepage von phpMyChat zu besuchen");
define("L_LINKS_8", "um der phpMyChat - Gruppe beizutreten");
define("L_LINKS_9", "um Ihr Feedback zu senden");
define("L_LINKS_10", "um phpMyChat Plus herunterzuladen");
define("L_LINKS_11", "um zu sehen, wer gerade chattet");
define("L_LINKS_12", "um die Chat-Login-Seite zu öffnen");
define("L_LINKS_13", "um diesen ’buzz’ zu senden"); // can also be translated as "to play this sound"
define("L_LINKS_14", "um dieses Kommando zu nutzen");
define("L_LINKS_15", "zu öffnen"); // to open Posted links window
define("L_LINKS_16", "Smilie Gallerie"); // to open/see Posted Links window
define("L_LINKS_17", "um aufsteigend sortieren");
define("L_LINKS_18", "um absteigend sortieren");
define("L_LINKS_19", "um deinen Gravatar zu bearbeiten");
define("L_LINKS_20", "Veröffentlichte Gleichungen"); //Click here to open Posted Equations
define("L_SWITCH", "Wechseln zu %s"); // Switch to English (Country Flags over / Language switching)
define("L_SELECTED", "gewählt"); // French - selected (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "nicht gewählt");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "eine Mail zu senden");
define("L_FULLSIZE_PIC", "um das Bild in der Orginalgröße zu öffnen");
define("L_PRIVACY", "um unsere Datenschutzrichtlinie zu lesen"); //Click here to…
define("L_AUTHOR", "zu kontaktieren");
define("L_DEVELOPER", "den Programmierer des Chats");
define("L_OWNER", "den Besitzer dieses Chats");
define("L_TRANSLATOR", "den Übersetzer");

// Counter on login
define("L_VISITOR_REPORT", "... Besucher seit %s"); // install date

// Status bar messages
define("L_JOIN_ROOM", "Diesen Raum betreten");
define("L_USE_NAME", "Diesen Mitgliednamen nutzen");
define("L_USE_NAME1", "Adresse zu diesem Mitgliedsnamen");
define("L_WHSP", "Flüstern");
define("L_SEND_WHSP", "Ein Flüstern senden");
define("L_SEND_PM_1", "Persönliche Nachricht senden");
define("L_SEND_PM_2", "Private Nachricht senden");
define("L_HIGHLIGHT", "Markierung/Demarkierung");
define("L_HIGHLIGHT_SB", "Markiere/Demarkiere die Mitgliedernachrichten");

//Lurking frame popup
define("L_LURKING_2", "Beobachtungsseite");
define("L_LURKING_3", "beobachtet");
define("L_LURKING_4", "besucht");
define("L_LURKING_5", "Unbekannt");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Optionen"); // de sters de mai sus in fisier.
define("L_ARCHIVE", "Archiv öffnen");
define("L_LURKING_1", "Die Beobachtungs-Seite öffnen");
define("L_SOUNDFIX_IE_1", "Sound Fix für IE");
define("L_SOUNDFIX_IE_2", "Sound Fix für IE herunterladen");
define("L_REG_BRB", "brb (benötigt eine Registrierung)");
define("L_DEL_BYE", "nicht auf mich warten");
define("L_EXTRA_PRIV1", "Liest PMs");
define("L_EXTRA_PRIV2", "Neue PMs");

// Set the first day of the week in your language
define("FIRST_DAY", "1"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "Januar");
define("L_FEB", "Februar");
define("L_MAR", "März");
define("L_APR", "April");
define("L_MAY", "Mai");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "August");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "November");
define("L_DEC", "Dezember");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mär");
define("L_S_APR", "Apr");
define("L_S_MAY", "Mai");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Okt");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dez");
// Week days Long Names
define("L_MON", "Montag");
define("L_TUE", "Dienstag");
define("L_WED", "Mittwoch");
define("L_THU", "Donnerstag");
define("L_FRI", "Freitag");
define("L_SAT", "Samstag");
define("L_SUN", "Sonntag");
// Week days Short Names
define("L_S_MON", "Mo");
define("L_S_TUE", "Di");
define("L_S_WED", "Mi");
define("L_S_THU", "Do");
define("L_S_FRI", "Fr");
define("L_S_SAT", "Sa");
define("L_S_SUN", "So");

// Localized date format - read the parameters here: http://www.php.net/manual/en/function.strftime.php
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "deu_deu.UTF-8", "german.UTF-8", "german");
} else {
setlocale(LC_ALL, "de_DE.UTF-8", "deu_deu.UTF-8", "german.UTF-8");
}
define("L_LANG", "de_DE");
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_SHORT_DATE", "%d.%m.%Y"); //Change this to your local desired date only format (keep the short form)
define("L_LONG_DATE", "%A, der %d. %B %Y"); //Change this to your local desired date only format (keep the long form)
define("L_SHORT_DATETIME", "%d.%m.%Y %H:%M:%S"); //Change this to your local desired date&time format (keep the short form)
define("L_LONG_DATETIME", "%A, der %d. %B %Y %H:%M:%S"); //Change this to your local desired date&time format (keep the long form)
define("L_CAL_FORMAT", "%d. %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","User sind ".LOGIN_LINK."im Chat</A>.");
define("USERS_LOGIN","Momentan ist 1 User ".LOGIN_LINK."im Chat</A>.");
define("NO_USER","Momentan ist keiner ".LOGIN_LINK."im Chat</A>.");
define("L_PRIV_REPLY_LOGIN", "Loggen Sie sich in den Chat, wenn Sie wollen, ".LOGIN_LINK."Poste eine Antwort</A> Einen der oben aufgeführten Neuen PMs");

// Language names
define("L_LANG_AR", "Argentinisches Spanisch");
define("L_LANG_BR", "Brasilianisches Portugiesisch");
define("L_LANG_BG", "Bulgarisch - Kyrillische");
define("L_LANG_CZ", "Tschechisch");
define("L_LANG_DA", "Dänisch");
define("L_LANG_DE", "Deutsch");
define("L_LANG_EN", "Englisch"); // for Admin panel only
define("L_LANG_ENUK", "UK Englisch"); // for UK formats and flags (also known as British)
define("L_LANG_ENUS", "US Englisch"); // for US formats and flags (also know as American English)
define("L_LANG_ES", "Spanisch");
define("L_LANG_FA", "Persisch (Farsi)");
define("L_LANG_FR", "Französisch");
define("L_LANG_GR", "Griechisch");
define("L_LANG_HE", "Hebbräisch");
define("L_LANG_HI", "Indien");
define("L_LANG_HU", "Ungarisch");
define("L_LANG_ID", "Indonesisch");
define("L_LANG_IT", "Italienisch");
define("L_LANG_JA", "Japanisch (Kanji)");
define("L_LANG_KA", "Georgien");
define("L_LANG_NE", "Nepali");
define("L_LANG_NL", "Niederländisch");
define("L_LANG_RO", "Rumänisch");
define("L_LANG_SK", "Slowakisch");
define("L_LANG_SRL", "Serbisch - Latin");
define("L_LANG_SRC", "Serbisch - Kyrillische");
define("L_LANG_SV", "Schwedisch");
define("L_LANG_TR", "Türkisch");
define("L_LANG_UR", "Pakistanisches Urdu");
define("L_LANG_VI", "Vietnamesisch");

// Skins preview page
define("L_SKINS_TITLE", "Design Vorschau");
define("L_SKINS_TITLE1", "Design %s bis %s Vorschau");
define("L_SKINS_AV", "Verfügbare Designs");
define("L_SKINS_NONAV", "Es gibt keine Stile in dem \"skins\" Verzeichnis");
define("L_SKINS_COPY", "&copy; %s Thema von %s");

// Swap image titles by Ciprian
define("L_GEN_ICON", "Geschlechts-Symbol");

// Ghost mode by Ciprian
define("L_GHOST", "Ghost");
define("L_SUPER_GHOST", "Super Ghost");
define("L_NO_GHOST", "Sichtbar");

// Sorting options by Ciprian
define("L_ASC", "Aufsteigend");
define("L_DESC", "Absteigend");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Alle besuche");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "benutze den Gravatar"); // do not translate the word “Gravatar”!

// Uploader mod by Ciprian
define("L_UPLOAD", "Aufgeladen %s");
define("L_UPLOAD_IMG", "Photo Datei");
define("L_UPLOAD_SND", "Sound Datei");
define("L_UPLOAD_FLS", "Dateien");
define("L_UPLOAD_SUCCESS", "%s erfolgreich geladen %s.");
define("L_FILES_TITLE", "Upload Verwaltung");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Verboten");
define("L_RESTRICTED_ROM", "%s für diesen Raum wurden die Beschränkung erfolgreich ausgeführt.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Einlgeloggt mit Benutzername OpenID");
define("L_OPID_REG", "Importiere deine OpenID ins profile.");

// Support buttons
define("L_SUPP_WARN", "Sie haben sich entschlossen, die nichtkommerzielle Entwicklung von ".APP_NAME." durch eine Geldspende an das Projekt zu unterstützen.\\nHerzlichen Dank für Ihre Unterstützung!\\n\\nBitte beachten: Dies ist keine Spende an den Chatserverbetreiber!\\nBitte geben Sie den gewünschten Geldbetrag auf der nächsten Seite ein.\\n\\nFortfahren?");
define("L_SUPP_ALT", "Unterstützen Sie die Weiterentwicklung und Sicherheitsbetreuung von ".APP_NAME." - es ist Schnell, Frei und Sicher!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class) – same approach as in // Img cmd mod section!
define("L_AUDIO", "Audiodatei gepostet von");
define("L_VIDEO", "Video gepostet von");
define("L_HELP_VIDEO", "gesampters pfad zum Video und audio wird gepostet");
define("L_NO_VIDEO", "die URL kann nicht eingebettet.\\nDies ist keine gültige URL eines akzeptierten\\noffentlichen Video oder Audio quelle.\\nVersuch nochmal!");
define("L_ORIG_VIDEO", "um die ursprüngliche quelle zu öffnen"); //it sounds like: Click here to open the…

// Birthday mod - by Ciprian
define("L_PRO_7", "Geburts Datum");
define("L_PRO_8", "zeige Geburts Tag in Öffentlich Info");
define("L_PRO_9", "zeige Alte in Öffentlich Info");
define("L_PRO_10", "Alte");
define("L_PRO_11", "%1\$d Jahre, %2\$d Monate und %3\$d Tagen"); //you can also change the order here, but 1 stands for years, 2 for months and 3 for days
define("L_DOB_TIT_1", "Geburts Tag List");
$L_DOB_SUBJ = "Herzlichen Glückwunsch zum Geburtstag %s!";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "Gleichungen");
define("L_MATH", "%s gepostet von %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>