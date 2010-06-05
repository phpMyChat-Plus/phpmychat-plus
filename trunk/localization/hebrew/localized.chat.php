<?php
// File : hebrew/localized.chat.php - plus version (01.08.2009 - rev.43)
// Hebrew translation by Shula Amokshim <shula.amokshim @gmx.net>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// -- hebrew / RTL specific
$Align = "right";

// welcome page
define("L_TUTORIAL", "מדריך למשתמש");

define("L_WEL_1", "הודעות נמחקות לאחר %s %s");
define("L_WEL_2", "ומשתמשים לא-פעילים נמחקים לאחר %s %s");

define("L_CUR_1", "יש");
define("L_CUR_1a", "כרגע");
define("L_CUR_1b", "כרגע");
define("L_CUR_2", "בצ`ט");
define("L_CUR_3", "משתמשים בחדר");
define("L_CUR_4", "משתמשים בחדרים פרטיים");
define("L_CUR_5", "משתמשים אורבים<br />(בודקים את הדף הנוכחי):");

define("L_SET_1", "נא לרשום");
define("L_SET_2", "שם משתמש");
define("L_SET_3", "מספר הודעות להצגה");
define("L_SET_4", "זמן בין כל עדכון");
define("L_SET_5", "בחר חדר...");
define("L_SET_6", "חדרים ציבוריים ראשוניים");
define("L_SET_7", "בחר");
define("L_SET_8", "חדרים ציבוריים שנוצרו עי המשתמשים");
define("L_SET_9", "צור אחד משלך");
define("L_SET_10", "ציבורי");
define("L_SET_11", "פרטי");
define("L_SET_12", "חדר");
define("L_SET_13", "ואז,");
define("L_SET_14", "צא`ט");
define("L_SET_15", "חדרים פרטיים קבועים");
define("L_SET_16", "חדרים פרטיים שנוצרו עי משתמשים");
define("L_SET_17", "בחר דמות");
define("L_SET_18", "הכנס לסימניות: הקש קונטרול D");

define("L_SRC", "חופשי להורדה ב-");

define("L_SECS", "שניות");
define("L_MIN", "דקה");
define("L_MINS", "דקות");
define("L_HOUR", "שעה");
define("L_HOURS", "שעות");

// registration stuff:
define("L_REG_1", "סיסמא");
define("L_REG_2", "ניהול חשבון");
define("L_REG_3", "הרשמה");
define("L_REG_4", "ערוך את הפרופיל שלך");
define("L_REG_5", "מחיקת משתמש");
define("L_REG_6", "הרשמה למערכת");
define("L_REG_7", "רק אם נרשמת למערכת");
define("L_REG_8", "אימייל");
define("L_REG_9", "נרשמת בהצלחה למערכת");
define("L_REG_10", "חזרה");
define("L_REG_11", "עורך");
define("L_REG_12", "עריכת פרטי משתמש");
define("L_REG_13", "מחיקת משתמש");
define("L_REG_14", "כניסה");
define("L_REG_15", "כניסה");
define("L_REG_16", "שינוי");
define("L_REG_17", "הפרופיל שלך עודכן בהצלחה");
define("L_REG_18", "מנהל-המשנה של החדר העיף אותך מהחדר");
define("L_REG_18a", "מנהל-המשנה של החדר העיף אותך מהחדר<br />%s הסיבה:");
define("L_REG_19", "האם אתה רוצה להסיר את עצמך?");
define("L_REG_20", "כן");
define("L_REG_21", "הוסרת מהרשימה");
define("L_REG_22", "לא");
define("L_REG_25", "סגור");
define("L_REG_30", "שם פרטי");
define("L_REG_31", "שם משפחה");
define("L_REG_32", "אתר אינטרנט");
define("L_REG_33", "הצג את כתובת האימייל בדף הציבורי");
define("L_REG_34", "עריכת פרופיל משתמש");
define("L_REG_35", "ניהול");
define("L_REG_36", "מיקום / ארץ");
define("L_REG_37", "שדות עם כוכבית הם שדות חובה");
define("L_REG_39", "המנהל מחק את החדר הזה");
define("L_REG_43", "לא ידוע");
define("L_REG_44", "זוג");
define("L_REG_45", "מין");
define("L_REG_46", "זכר");
define("L_REG_47", "נקבה");
define("L_REG_48", "לא ידוע");
define("L_REG_49", "נדרשת הרשמה");
define("L_REG_50", "הרשמה נדחית");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Your settings to enter the chat");
define("L_EMAIL_VAL_2", "ברוכים הבאים לשרת הצא`ט");
define("L_EMAIL_VAL_Err", "שגיאה פנימית - נא לפנות למנהל הראשי <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "הסיסמא שלך נשלחה לכתובת האימייל שלך.<br />ניתן לשנות את הסיסמא בדף הכניסה - \"".L_REG_4."\".");
define("L_EMAIL_VAL_PENDING_Done", "Your registered data has been submitted for review.");
define("L_EMAIL_VAL_PENDING_Done1", "תקבל את הסיסמא אחרי שהחשבון יקבל אישור מהמנהלים");
define("L_EMAIL_VAL_3", "Your registration is pending for %s"); //chat name
define("L_EMAIL_VAL_31", "מזל טוב! ההרשמה שלך קיבלה אישור!");
define("L_EMAIL_VAL_32", "This is your registration data for %s at %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "You have just registered this account for %s at %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "You have just changed important account info for %s at %s (account affected: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Your - %s - account details for %s"); //username - chatname
define("L_EMAIL_VAL_51", "Your - %s - account updated details for %s"); //username - chatname
define("L_EMAIL_VAL_6", "%s נרשם ב-");
define("L_EMAIL_VAL_61", "%s עודכן לאחרונה ב-");
define("L_EMAIL_VAL_7", "Below is your %s updated account info:"); //username
define("L_EMAIL_VAL_8", "Save this email for your future reference.\nPlease also make it safe and don’t share this data.\nתודה שהצטרפת. תהנה.");
define("L_EMAIL_VAL_81", "ניתן לשנות את הסיסמא בדף הכניסה \"".L_REG_4."\".");

// admin stuff
define("L_ADM_1", "%s is no longer a moderator for this room.");
define("L_ADM_2", "You are no longer a registered user.");

// error messages
define("L_ERR_USR_1", "שם משתמש כבר קייןם. בחר אחד אחר");
define("L_ERR_USR_2", "חובה לבחור שם משתמש");
define("L_ERR_USR_3", "השם הזה כבר תפוס<br />הקש סיסמא או בחר שם משתמש אחר");
define("L_ERR_USR_4", "סיסמא לא חוקית");
define("L_ERR_USR_5", "חובה לרשום שם משתמש");
define("L_ERR_USR_6", "חובה לרשום סיסמא.");
define("L_ERR_USR_7", "חובה לרשום אימייל.");
define("L_ERR_USR_8", "כתובת האימייל לא תקינה");
define("L_ERR_USR_9", "שם המשתמש הזה תפוס");
define("L_ERR_USR_10", "שם משתמש או סיסמא לא נכונים");
define("L_ERR_USR_11", "רק מנהל מערכת יכול לבצע פעולה זו");
define("L_ERR_USR_12", "אתה המנהל, ולכן אי אפשר להסיר אותך");
define("L_ERR_USR_13", "כדי ליצור חדר פרטי, חובה להיות רשום למערכת");
define("L_ERR_USR_14", "חובה להיות רשום כדי להשתתף בצ`אט");
define("L_ERR_USR_15", "חובה לרשום שם מלא.");
define("L_ERR_USR_16", "רק האותיות הבאות חוקיות:\\n".$REG_CHARS_ALLOWED."\\nאי אפשר להשתמש ברווחים, פסיקים או אלכסונים. \\nבדוק את מה שכתבת ונסה שוב");
define("L_ERR_USR_16a", "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />nאי אפשר להשתמש ברווחים, פסיקים או אלכסונים. \\nבדוק את מה שכתבת ונסה שוב.");
define("L_ERR_USR_17", "This room doesn’t exist, and you are not allowed to create one.");
define("L_ERR_USR_18", "Banished word found in your username.");
define("L_ERR_USR_19", "You cannot be in more than one room at the same time.");
define("L_ERR_USR_20", "You have been banished from this room or from the chat.");
define("L_ERR_USR_20a", "You have been banished from this room or from the chat.<br />Reason: %s");
define("L_ERR_USR_21", "לא היית פעיל כבר ".C_USR_DEL." ".((C_USR_DEL == "1") ? "".L_MIN."" : "".L_MINS."").",<br />ולכן עפת מהחדר.");
define("L_ERR_USR_22", "פקודה זו לא זמינה\\nבדפדפן שאתה משתמש בו (אקספלורר).");
define("L_ERR_USR_23", "חובה להיות רשום כדי להצטרף לחדר פרטי");
define("L_ERR_USR_24", "To create your own private room you must be registered.");
define("L_ERR_USR_25", "Only the administrator can use ".$COLORNAME." color!<br />Don’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." or ".COLOR_CM2.".<br />These are reserved to power users!");
define("L_ERR_USR_26", "Only admins and moderators can use ".$COLORNAME." color!<br />Don’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." or ".COLOR_CM2.".<br />These are reserved to power users!");
define("L_ERR_USR_27", "אי אפשר לדבר עם עצמך.\\nבחר שם משתמש אחר");
define("L_ERR_USR_28", "Your access to %s has been restricted!<br />Please choose a different room.");
define("L_ERR_ROM_1", "Room’s name cannot contain commas or backslashes (\\).");
define("L_ERR_ROM_2", "Banished word found in the room’s name you want to create.");
define("L_ERR_ROM_3", "This room already exists as a public one.");
define("L_ERR_ROM_4", "שם חדר לא חוקי");

// users frame or popup
define("L_EXIT", "צא מהצ`אט");
define("L_DETACH", "הפרד את רשימת המשתמשים");
define("L_EXPCOL_ALL", "Expand/Collapse All");
define("L_CONN_STATE", "רענן מצב קישור");
define("L_CHAT", "צ`אט");
define("L_USER", "משתמש");
define("L_USERS", "משתמשים");
define("L_LURKER", "צופה");
define("L_LURKERS", "צופים");
define("L_NO_USER", "No user");
define("L_ROOM", "חדר");
define("L_ROOMS", "חדרים");
define("L_EXPCOL", "Expand/Collapse room");
define("L_BEEP", "האם לצפצף כשמשתמש נכנס לצ`אט");
define("L_PROFILE", "הצג פרופיל");
define("L_NO_PROFILE", "ללא פרופיל");

// input frame
define("L_HLP", "עזרה");
define("L_MODERATOR", "%s מנהל החדר הוא");
define("L_KICKED", "%s המנהל העיף את");
define("L_KICKED_REASON", "%s has successfully been kicked away. (Reason: %s)");
define("L_KICKED_ALL", "All the users have successfully been kicked away.");
define("L_KICKED_ALL_REASON", "All the users have successfully been kicked away. (Reason: %s)");
define("L_BANISHED", "%s has successfully been banished.");
define("L_BANISHED_REASON", "%s has successfully been banished. (Reason: %s)");
define("L_ANNOUNCE", "ANNOUNCE");
define("L_INVITE", "%s requests that you join her/him into the <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> room.");
define("L_INVITE_REG", "חובה להרשם למערכת כדי להכנס לחדר זה");
define("L_INVITE_DONE", "%s ההזמנה נשלחה אל");
define("L_OK", "שלח");
define("L_BUZZ", "Buzzes Gallery");
define("L_BAD_CMD", "נסיון לשלוח פקודה בלתי חוקית בעליל");
define("L_ADMIN", "%s is already the administrator!");
define("L_IS_MODERATOR", "%s is already a moderator!");
define("L_NO_MODERATOR", "Only a moderator of this room can use this command.");
define("L_NONEXIST_USER", "%s isn’t in the current room.");
define("L_NONREG_USER", "%s אינו רשום במערכת");
define("L_NONREG_USER_IP", "His IP is: %s.");
define("L_NO_KICKED", "%s is a moderator or the administrator and can’t be kicked away.");
define("L_NO_BANISHED", "%s is a moderator or the administrator and can’t be banished.");
define("L_SVR_TIME", "השעה במחשב הראשי ");
define("L_NO_SAVE", "אין הודעות");
define("L_NO_ADMIN", "רק מנהל יכול להשתמש בפקודה זו");
define("L_NO_REG_USER", "אתה חייב להיות רשום למערכת כדי להשתמש בפקודה זו.");

// help popup
define("L_HELP_TIT_1", "סמיילים");
define("L_HELP_TIT_2", "עיצוב טקסט");
define("L_HELP_FMT_1", "ניתן להשתמש בפקודות HTML בסיסיות כמו <b>הדגשה</b>, או <u>קו תחתון</u> למשל");
define("L_HELP_FMT_2", "To create a hyperlink (for e-mail or URL) in your message, simply type the corresponding address without any tag. The hyperlink will be created automatically.");
define("L_HELP_TIT_3", "Commands");
define("L_HELP_NOTE", "All the commands must be used in English!");
define("L_HELP_MSG", "הודעה");
define("L_HELP_MSGS", "הודעות");
define("L_HELP_ROOM", "חדר");
define("L_HELP_BUZZ", "~soundname");
define("L_HELP_BUZZ1", "Buzz..."); //alert, sound alert, ring, whirr
define("L_HELP_REASON", "הסיבה");
define("L_HELP_MR", "Mr. %s");
define("L_HELP_MS", "Ms. %s");
define("L_HELP_CMD_0", "{} represents a required setting, [] an optional one.");
define("L_HELP_CMD_1a", "Set number of messages to show. Minimum and default are 5.");
define("L_HELP_CMD_1b", "Reload the messages frame and display the n latest messages, minimum and default are 5.");
define("L_HELP_CMD_2a", "Modify messages list refresh delay (in seconds).<br />If n is not specified or less than 3, toggles between no refresh and 10s refresh.");
define("L_HELP_CMD_2b", "Modify messages and users lists refresh delay (in seconds).<br />If n is not specified or less than 3, toggles between no refresh and 10s refresh.");
define("L_HELP_CMD_3", "Inverts messages order (not in all browsers).");
define("L_HELP_CMD_4", "Join another room, creating it if it doesn’t exist and if you’re allowed to.<br />n equals 0 for private and 1 for public, default to 1 if not specified.");
define("L_HELP_CMD_5", "Leave the צ`אט after displaying an optional message.");
define("L_HELP_CMD_6", "Avoid displaying messages from a user if nick is specified.<br />Set ignoring off for a user when nick and \"-\" are both specified, for all users when \"-\" is but not nick.<br />With no option, this command pops up a window that shows all ignored nicks.");
define("L_HELP_CMD_7", "Recall the previous text typed (command or message).");
define("L_HELP_CMD_8", "Show/Hide time before messages.");
define("L_HELP_CMD_9", "Kick away user from the צ`אט. This command can only be used by a moderator of that room or an admin.<br />Optionally, [".L_HELP_REASON."] displays the reason of kicking (any desired text).<br />If * option is used, the command will kick out from צ`אט all the users without powers (only guests and registered users). This is useful when the server connection is having problems and all the people should reload their צ`אט. In this second case, [".L_HELP_REASON."] is recommended to let users know why they’ve been kicked.");
define("L_HELP_CMD_10", "Sends a private message to the specified user (other users won’t see it).");
define("L_HELP_CMD_11", "Show information about specified user.");
define("L_HELP_CMD_12", "Pop-up the window for editing user’s profile.");
define("L_HELP_CMD_13", "Toggles notifications of user entrance/exit for the current room.");
define("L_HELP_CMD_14", "Allow the administrator or moderator(s) of the current room to promote another registered user to moderator for the same room.");
define("L_HELP_CMD_15", "Clear the messages frame and show only the last 5 messages.");
define("L_HELP_CMD_16", "Save the last n messages (notifications ones excluded) to an HTML file. If n is not specified, all available messages will be taken into account.");
define("L_HELP_CMD_17", "Allow the administrator to send an announcement to all users in all צ`אט rooms.");
define("L_HELP_CMD_18", "Invite a user צ`אטting in an other room join the one you are in.");
define("L_HELP_CMD_19", "Allow the moderator(s) of a room or the administrator to \"banish\" a user from the room for a time defined by the administrator.<br />The later can banish a user chatting in an other room than the one he is into and use the * setting to banish \"forever\" a user from the האם אתה רוצה להסיר את עצמך? as the whole.<br />Optionally, [".L_HELP_REASON."] displays the reason of banishment (any desired text).");
define("L_HELP_CMD_20", "Describe what you’re doing without refer yourself.");
define("L_HELP_CMD_21", "Announces the room and the users who try to send you messages<br />that you are away from the computer. If you want to be back to האם אתה רוצה להסיר את עצמך?, just start typing.");
define("L_HELP_CMD_22", "Sends a buzzer sound and optionally displays a message in the current room.<br />Usage:<br />- old usage: \"/buzz\" or \"/buzz message to be shown\" - this plays the default sound for buzz defined in Admin panel;<br />- extended usage: \"/buzz ~soundname\" or \"/buzz ~soundname message to be shown\" - this plays the soundname.wav file from the plus/sounds folder; please note the sign \"~\" to be used at the beginning of the second word, which is the name of the sound file, without the extension .wav (only .wav extensions allowed).<br />By default, this is a moderator/admin command.");
define("L_HELP_CMD_23", "Sends a <i>whisper</i> (private message). The message will reach the destination, no matter which room the user is in. If the user is not on-line or has set away, you will be notified about it.");
define("L_HELP_CMD_24", "This command changes the topic of the current room. Try not to override other users’ topics. Use important topics.<br />By default, this is a moderator/admin command.<br />Using \"/topic reset\" command the current topic will be deleted and reset to default one מהחדר.<br />Optionally, \"/topic * {}\" and \"/topic * reset\" do exactly the same but in all החדרים (global topic and global topic reset).");
define("L_HELP_CMD_25", "A dice game for random/hazardous numbers.<br />Usage: /dice or /dice [n];<br />n can take any value <b>between 1 and %s</b> (it represents the number of dice). If no number is entered, the default maximum dice will be used.");
define("L_HELP_CMD_26", "This is a more complex version of the /dice command.<br />Usage: /{n1}d[n2] or /{n1}d;<br />n1 can take any value <b>between 1 and %s</b> (it represents the number of dice per throws).<br />n2 can take any value <b>between 1 and %s</b> (it represents the number of sides per die).");
define("L_HELP_CMD_27", "It highlights the messages of a specific user for an easier reading across the conversations.<br />Usage: /high {user} or press the small <img src=./images/highlightOff.gif> square on the right of the username (in החדרים/users list)");
define("L_HELP_CMD_28", "It allows posting of <i>one single image</i> as message.<br />Usage: The picture has to be on the internet and free accessible by anyone. Don’t use pages that need login.<br />Full image link must be typed! E.g.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Allowed extensions: .jpg .bmp .gif .png. The link is case sensitive!<br />HINTS: type /img then a space and paste the URL into the box; to get the URL of an image from a webpage, when you right-click on the image, go to properties, then highlight the whole address/URL (sometimes needs to scroll down a bit) and copy/paste after the /img<br />Don’t use pictures from your pc: it will just break the האם אתה רוצה להסיר את עצמך? window!!!");
define("L_HELP_CMD_29", "The second command will allow the administrator or moderator(s) of the current room to demote another registered user previously promoted to moderator for the same room.<br />The * option will demote the user from all החדרים.");
define("L_HELP_CMD_30", "The second command does the same as /me but it will show your respective title, according to your profile gender<br />E.g. * ".sprintf(L_HELP_MR, "Ciprian")." is watching TV or * ".sprintf(L_HELP_MS, "Dana")." is happy.");
define("L_HELP_CMD_31", "Change the order users are sorted in lists: by entrance time or alphabetically.");
define("L_HELP_CMD_32", "This is a third (role-playing) version of the dice rolling.<br />Usage: /d{n1}[tn2] or /d{n1};<br />n1 can take any value <b>between 1 and 100</b> (it represents the number of sides per die).<br />n2 can take any value <b>between 1 and %s</b> (it represents the number of rolling dice per throw).");
define("L_HELP_CMD_33", "Change the font size of the messages in chat to user choice (allowed values for n: <b>between 7 and 15</b>); the /size command resets the font size to the default value (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "This will allow an user to specify the orientation of a text message (ltr = left-to-right, rtl = right-to-left).");
define("L_HELP_CMD_VAR", "Synonyms (variants): %s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "כללי הצ`אט");
define("L_HELP_ETIQ_2", "Our site would like to keep its community friendly and fun, so please adhere to the following guidelines. If you fail to observe these rules, one of our chat moderators may boot you from the chat.<br /><br />Thank you,");
define("L_HELP_ETIQ_3", "קוים מנחים לכללי הצ`אט");
define("L_HELP_ETIQ_4", "<li>Do not \"spam\" the chat by typing nonsense or random letters.</li>
<li>Do not use aLtErnAtiNg characters.</li>
<li>Keep ALL CAPS use to a minimum, as it is considered yelling.</li>
<li>Keep in mind that our chat users are from all over the world, and, most likely, you will encounter people of different beliefs. Please be kind and polite to these people.</li>
<li>Do not direct profanity towards other members. In fact, try to steer clear of using profanity and/or swear words altogether.</li>
<li>Do not call other members by their real names that they may not appreciate. Use their nicknames instead.</li>");

// messages frame
define("L_NO_MSG", "There is currently no message ...");
define("L_TODAY_DWN", "The messages that have been sent today start below");
define("L_TODAY_UP", "The messages that had been sent yesterday start below");

// message colors
$TextColors = array("שחור" => "#000000",
				"אדום" => "#FF0000",
				"ירוק" => "#009900",
				"כחול" => "#0000FF",
				"סגול" => "#9900FF",
				"אדום חזק" => "#990000",
				"ירוק כהה" => "#006600",
				"כחול כהה" => "#000099",
				"מארון" => "#996633",
				"ים" => "#006699",
				"גזר" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "התעלמות");
define("L_IGNOR_NON", "No ignored user");

// whois popup
define("L_WHOIS_ADMIN", "מנהל ראשי");
define("L_WHOIS_OWNER", "בעלים");
define("L_WHOIS_TOPMOD", "מנהל משנה בכיר");
define("L_WHOIS_MODER", "מנהל משנה");
define("L_WHOIS_MODERS", "מנהלי משנה");
define("L_WHOIS_OTHERS", "משתמשים אחרים");
define("L_WHOIS_USER", "משתמש");
define("L_WHOIS_GUEST", "אורח");
define("L_WHOIS_REG", "משתמש רשום");
define("L_WHOIS_BOT", "רובוט");

// Notification messages of user entrance/exit
define("ENTER_ROM", "נכנס לחדר %s");
define("L_EXIT_ROM", "יצא מהחדר %s");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s has automatically been booted from this room for inactivity.");
define("L_CLOSED_ROM", "%s has closed the browser.");

// Text for /away command notification string:
define("L_AWAY", "%s is marked away...");
define("L_BACK", "%s is back!");

// Quick Menu mod
define("L_QUICK", "תפריט מהיר");

// Topic Banner mod
define("L_TOPIC", "החליף את הנושא ל-");
define("L_TOPIC_RESET", "החליף את הנושא");
define("L_HELP_TOP", "לפחות שתי מילים לנושא");
define("L_BANNER_WELCOME", "! %s ברוכים הבאים אל");
define("L_BANNER_TOPIC", "נושא:");
define("L_DEFAULT_TOPIC_1", "נושא ראשוני. ערוך את הקובץ localization/_owner/owner.php כדי לשנות זאת");

// Img cmd mod
define("L_PIC", "תמונה נשלחה על ידי");
define("L_PIC_RESIZED", "שינוי גודל ל-");
define("L_HELP_IMG", "full path to the image to be posted");
define("L_NO_IMAGE", "This is not a valid URL of a public remote image.\\nTry again!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s is no longer a moderator for any room of this chat.");
define("L_IS_NO_MODERATOR", "הוא לא מנהל-משנה %s");
define("L_ERR_IS_ADMIN", "%s is the administrator!\\nYou cannot change his permissions.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "פקודות נוספות אפשריות");
define("INFO_MODS", "Extra Features/Mods available:");
define("INFO_BOT", "Our available bot is:");

// Profile mod
define("L_PRO_1", "שפות מדוברות");
define("L_PRO_1a", "שפה");
define("L_PRO_2", "קישור נבחר 1");
define("L_PRO_3", "קישור נבחר 2");
define("L_PRO_4", "תאור");
define("L_PRO_5", "כתובת אינטרנט של תמונה");
define("L_PRO_6", "שם/צבע טקסט");

// Avatar mod
define("L_AVATAR", "דמות");
define("L_ERR_AV", "כתובת לא קיימת או שגויה");
define("L_TITLE_AV", "הדמות הנוכחית שלך: ");
define("L_CHG_AV", "Click \"".L_REG_16."\" in the Profile form<br />to store your Avatar.");
define("L_SEL_NEW_AV", "בחר דמות חדשה");
define("L_EX_AV", "דוגמא");
define("L_URL_AV", "קישור: ");
define("L_EXPL_AV", "(הכנס את הקישור והקש אנטר)");
define("L_CANCEL", "ביטול");
define("L_AVA_REG", "צריך להיות רשום כדי\\nכדי לשנות את הדמות שלך");
define("L_SEL_NEW_AV_CONFIRM", "הטופס לא נשלח!\\nGoing now to avatars will make you loose\\nall the changes you made so far!\\n\\nAre you sure?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Our bot is publicly active in this room. To start talking to the bot, type <b>hello ".C_BOT_NAME."</b>. To end conversation, type: <b>bye ".C_BOT_NAME."</b>. (private: /to <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Our bot is publicly active in %s room. You can only talk private by clicking on it’s name and whispering. (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Our bot is not publicly active. You can only talk private by clicking on it’s name. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot is not running in this room!");
define("BOT_START_ERROR", "Bot is already running in this room!");
define("BOT_DISABLED_ERROR", "Bot has been disabled from Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "זרק קוביות. התוצאות הן:");
define("DICE_WRONG", "צריך לבחור כמה קוביות לזרוק\\n(".MAX_ROLLS."בחר מספר בין 1 ל-).\\nכתוב /dice כדי לזרוק ".MAX_ROLLS." קוביות");
define("DICE2_WRONG", "The second value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "The first value has to be between 1 and ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "The first (d) value has to be between 1 and 100.\\nThe second (t) value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "הקפץ חלון בקבלת מסר פרטי");
define("L_REG_POPUP_NOTE", "צריך לאפשר חלונות קובצים לאתר הזה");
define("L_PRIV_POST_MSG", "שלח הודעה פרטית");
define("L_PRIV_MSG", "התקבלה הודעה חדשה");
define("L_PRIV_MSGS", "התקבלו %s הודעות חדשות");
define("L_PRIV_MSGSa", "10 ההודעות הראשונות");
define("L_PRIV_MSG1", "מאת");
define("L_PRIV_MSG2", "חדר");
define("L_PRIV_MSG3", "אל");
define("L_PRIV_MSG4", "הודעה");
define("L_PRIV_MSG5", "נשלח ב");
define("L_PRIV_REPLY", "תשובה");
define("L_PRIV_READ", "לחץ על ’".L_REG_25."’ כדי להעביר את כל ההדועות לסטטוס -נקרא-");
define("L_PRIV_POPUP", "ניתן לבטל/לאפשר את החלונית הזאת<br />באמצעות עריכת");
define("L_PRIV_POPUP1", "הפרופיל שלך</a> (למשתמשים רשומים בלבד)");
define("L_NOT_ONLINE", "לא מחובר כרגע %s");
define("L_PRIV_NOT_ONLINE", "%s is not online right now,\\nbut will still receive your message after login.");
define("L_PRIV_NOT_INROOM", "%s is not in this room.\\nIf you still want to pm this user,\\nuse the command: /wisp %s message.");
define("L_PRIV_AWAY", "%s is marked away,\\nbut will still receive your message\\nwhen will be back.");
define("PM_DISABLED_ERROR", "לחישה (הודעה פרטית(\\nלא אפשריות בצאט הזה");
define("L_NEXT_PAGE", "עבור לעמוד הבא");
define("L_NEXT_READ", "ההודעות הבאות %s קרא את"); // message / 10 messages
define("L_ROOM_ALL", "כל החדרים");
define("L_PRIV_NO_MSGS", "לא התקבלו הודעות");
define("L_PRIV_READ_MSG", "התקבלה הודעה אחת"); //singular
define("L_PRIV_READ_MSGS", "הודעות %s התקבלו"); //plural
define("L_PRIV_MSGS_NEW", "חדש");
define("L_PRIV_MSGS_READ", "קרא");
define("L_PRIV_MSG6", "סטטוס");
define("L_PRIV_RELOAD", "טען את העמוד מחדש");
define("L_PRIV_MARK_ALL", "קראתי את כל ההודעות");
define("L_PRIV_MARK_SEL", "קראתי את ההודעות המסומנות");
define("L_PRIV_REMOVE", "מחק הודעות מסומנות");
define("L_PRIV_PM", "(private)");
define("L_PRIV_WISP", "(whisper)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "אפשרי");
define("L_DISABLED", "מבוטל");
define("L_COLOR_HEAD_SETTINGS", "הגדרות נוכחיות");
define("L_COLOR_HEAD_SETTINGSa", "צבעים ראשוניים");
define("L_COLOR_HEAD_SETTINGSb", "צבע ראשוני");
define("L_COL_HELP_TITLE", "בחירת צבעים");
define("L_COL_HELP_SUB1", "שימוש");
define("L_COL_HELP_P1", "ניתן לבחור צבע ראשוני בהגדרות הפרופיל שלך (אותו הצבע של שם המשתמש שלך). עדיין תוכל לבחור צבע אחר. To change back to your default color from a random used one, you have to choose once the default color (Null) - it is the first one in the select list.");
define("L_COL_HELP_SUB2", "רמז");
define("L_COL_HELP_P2", "<u>טווח צבעים</u><br />Depending on your browser/OS capabilities, it is possible that some of the colors won’t be rendered. Only 16 color names are supported by the W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "If a user claims he cannot see your selected color it means he is probably using an older browser.");
define("L_COL_HELP_SUB3", "Settings defined on this chat:");
define("L_COL_HELP_P3", "<u>Power levels of color usage</u>:<br />1. Administrator can use any color.<br />The default color for the administrator is <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderators can use any color but <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> and <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />The default color for moderators is <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. The other users can use any color but <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> and <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "The default color is <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Technical stuff</u>: These colors have been defined by the administrator in admin panel.<br />If anything goes wrong or if there is something you don’t like about the default colors, you should contact the <b>administrator</b> first, not the other users in your room. :-)");
define("L_COL_HELP_USER_STATUS", "Your status");
define("L_COL_TUT", "שימוש בצבעים בצ`אט");
define("L_NULL", "לא קיים");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "הצבע של החדר");
define("L_PRO_COLOR", "הצבע של הפרופיל");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "רק המנהל יכול להשתמש בצבע ".COLOR_CA."!\\n\\nהצבע שלך מוחזר לצבע  ".COLOR_CM."!\\n\\nתבחר משהו אחאר.");
define("COL_ERROR_BOX_USRA", "רק המנהל יכול להשתמש בצבע ".COLOR_CA."!\\n\\nאל תנסה להשתמש בצבע  ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nצבעים אלה שמורים למשתמשים מאגניבים!\\n\\nהצבע שלך חוזר להיות ".COLOR_CD."!\\n\\nתבחר משהו אחאר.");
define("COL_ERROR_BOX_USRM", "You must be a moderator to use ".COLOR_CM." color!\\n\\nDon’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "ברוכים הבאים לצ`אט<I><br />נסו להיות נעימים ומנומסים</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "The settings of this server have just been changed. To avoid malfunctions, please reload your browser (press F5 key or Exit and re-enter chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "גודל האות יכולה להיות\\nnull (לאיפוס) אוו בין 7 ל-15");

// Password reset form by Ciprian
define("L_PASS_0", "סיסמא איפוס");
define("L_PASS_1", "שאלה סודית");
define("L_PASS_2", "מאיזה תוצרת היתה המכונית הראשונה שלך?"); // Don't change this question! Just translate it! And keep it short! (answer ex. BMW, Toyota, Seat)
define("L_PASS_3", "מה היה השם של חיית המחמד הראשונה שלך?"); // Don't change this question! Just translate it! And keep it short! (answer ex. Cookie, Lora, Roko)
define("L_PASS_4", "מה אתה מעדיף לשתות"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "מתי יום ההולדת שלך"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "תשובה סודית");
define("L_PASS_7", "איפוס סיסמא");
define("L_PASS_8", "איפוס הסיסמא הצליח");
define("L_PASS_9", "ססימת הכניסה לצאט");
define("L_PASS_11", "ברוכים השבים");
define("L_PASS_12", "בחר שאלה סודית");
define("L_ERR_PASS_1", "שם משתמש לא תקין. בחר שוב");
define("L_ERR_PASS_2", "אימייל לא תקין. בחר שוב");
define("L_ERR_PASS_3", "לא טוב! רשע.<br />Answer to the one shown below!");
define("L_ERR_PASS_4", "תשובה לא ממש מוצלחת. נסה שוב");
define("L_ERR_PASS_5", "לא נתת תשובה סודית/ מידע סודי לניחוש סיסמא.");
define("L_ERR_PASS_6", "לא נתת תשובה סודית/ מידע סודי לניחוש סיסמא.<br />לכן לא תוכל להשתמש בטופס זה<br />קרא למנהל המערכת");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s has become an administrator of this chat.");
define("L_ADM_4", "%s is no longer an administrator of this chat.");

// Open Schedule by Ciprian
define("L_DAILY", "יומי");
define("L_ALWAYS", "תמיד");
define("L_OPEN", "פתוח");
define("L_CLOSED", "סגור");
define("L_OPEN_PUB", "פתוח לציבור");
define("L_CLOSED_PUB", "סגור לציבור");

// Links popup page by Alex
define("L_LINKS_1", "קישורים מודבקים");
define("L_LINKS_2", "Here you can access the posted links");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "%s %s לחץ כאן");
define("L_CLICK", "%s לחץ כאן");
define("L_LINKS_3", "כדי לפתוח קישור");
define("L_LINKS_4", "to open author’s site");
define("L_LINKS_5", "כדי להכניס את הסמילי הזה");
define("L_LINKS_6", "כדי ליצור קשר עם");
define("L_LINKS_7", "לבקר את דף הבית של התוכנה");
define("L_LINKS_8", "to join phpMyChat Group");
define("L_LINKS_9", "לשלוח פידבק ליוצרי התוכנה");
define("L_LINKS_10", "להורדת התוכנה");
define("L_LINKS_11", "כדי לדעת מי נמצא בצאט");
define("L_LINKS_12", "כדי לפתוח את דף הכניסה למערכת");
define("L_LINKS_13", "כדי לצפצף"); // can also be translated as "to play this sound"
define("L_LINKS_14", "to use this command");
define("L_LINKS_15", "כדי לפתוח");
define("L_LINKS_16", "גלריית סמיילים");
define("L_LINKS_17", "למיון בסדר עולה");
define("L_LINKS_18", "למיון בסדר יורד");
define("L_LINKS_19", "לשמור את הגרווטר שלך");
define("L_SWITCH", "%s מעבר אל"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "נבחרה"); // E.g. "French - selected" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "לא נבחר");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "לשלוח אימייל");
define("L_FULLSIZE_PIC", "תמונה בגודל מלא");
define("L_PRIVACY", "לקרוא את תנאי הפרטיות"); //Click here to…
define("L_AUTHOR", "the author"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "המפתח של התוכנה הזאת"); //same here
define("L_OWNER", "בעלי הצאט"); //same here
define("L_TRANSLATOR", "המתרגם"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... מבקרים מאז %s");

// Status bar messages
define("L_JOIN_ROOM", "הצטרף לחדר זה");
define("L_USE_NAME", "השתמש בשם המשתמש הזה");
define("L_USE_NAME1", "כתובת לשם המשתמש הזה");
define("L_WHSP", "לחישה");
define("L_SEND_WHSP", "שלח לחישה");
define("L_SEND_PM_1", "שלח הודעה");
define("L_SEND_PM_2", "שלח הודעה פרטית");
define("L_HIGHLIGHT", "הדגשה / ביטול הדגשה");
define("L_HIGHLIGHT_SB", "הדגשה / ביטול הדגשה this user’s posts");

//Lurking frame popup
define("L_LURKING_2", "צופים בדף");
define("L_LURKING_3", "צופה עכשיו");
define("L_LURKING_4", "הצטרף ב");
define("L_LURKING_5", "לא ידוע");

// Extra options by Ciprian
define("L_EXTRA_OPT", "אפשרויות נוספות");
define("L_ARCHIVE", "ארכיון");
define("L_SOUNDFIX_IE_1", "תיקון לבעיית הסאונד לאקספלורר בלבד");
define("L_SOUNDFIX_IE_2", "שמור את התיקון במחשב");
define("L_LURKING_1", "רשימת הצופים שלא משתתפים");
define("L_REG_BRB", "תיכף אשוב (קופץ להרשם)");
define("L_DEL_BYE", "תמשיכו בלעדי...");
define("L_EXTRA_PRIV1", "קרא הודעות");
define("L_EXTRA_PRIV2", "הודעות חדשות!");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "0");

// Months Long Names
define("L_JAN", "ינואר");
define("L_FEB", "פברואר");
define("L_MAR", "מרץ");
define("L_APR", "אפריל");
define("L_MAY", "מאי");
define("L_JUN", "יוני");
define("L_JUL", "יולי");
define("L_AUG", "אוגוסט");
define("L_SEP", "ספטמבר");
define("L_OCT", "אלול");
define("L_NOV", "נובמבר");
define("L_DEC", "דצמבר");
// Months Short Names
define("L_S_JAN", "ינואר");
define("L_S_FEB", "פבואר");
define("L_S_MAR", "מרץ");
define("L_S_APR", "אפריל");
define("L_S_MAY", "מאי");
define("L_S_JUN", "יוני");
define("L_S_JUL", "יולי");
define("L_S_AUG", "אוגוסט");
define("L_S_SEP", "ספטמבר");
define("L_S_OCT", "אלול");
define("L_S_NOV", "נובמבר");
define("L_S_DEC", "דצמבר");
// Week days Long Names
define("L_MON", "שני");
define("L_TUE", "יום שלישי");
define("L_WED", "רביעי");
define("L_THU", "חמישי");
define("L_FRI", "שישי");
define("L_SAT", "שבת");
define("L_SUN", "ראשון");
// Week days Short Names
define("L_S_MON", "ב");
define("L_S_TUE", "ג");
define("L_S_WED", "ד");
define("L_S_THU", "ה");
define("L_S_FRI", "ו");
define("L_S_SAT", "ש");
define("L_S_SUN", "א");

// Localized date format
// Set the HE specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "heb-heb.UTF-8", "heb-heb", "hebrew.UTF-8", "hebrew");
} else {
setlocale(LC_ALL, "he_IL.UTF-8", "heb.UTF-8", "he.UTF-8", "iw_IL.UTF-8", "iw.UTF-8", "heb_heb.UTF-8", "Hebrew-he.UTF-8"); // For HE formats
}
define("L_LANG", "he_IL");
define("ISO_DEFAULT", "iso-8859-8");
define("WIN_DEFAULT", "windows-1255");
define("L_SHORT_DATE", "%d/%m/%Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%d/%m/%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%A - %e %B %Y"); //Change this to your local desired format (keep the long form)
define("L_LONG_DATETIME", "%A - %e %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_CAL_FORMAT", "%d %B %Y"); // Calendar format

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","משתמשים ".LOGIN_LINK."משוחחים</A> כרגע");
define("USERS_LOGIN","1 user is ".LOGIN_LINK."chatting</A> at this time.");
define("NO_USER","אף אחד ".LOGIN_LINK."לא משוחח</A> כרגע");
define("L_PRIV_REPLY_LOGIN", "Login to chat if you wish to ".LOGIN_LINK."post a reply</A> to any of the unread PMs listed above");

// Language names
define("L_LANG_AR", "Argentinean Spanish");
define("L_LANG_BG", "Bulgarian - Cyrillic");
define("L_LANG_BR", "Brazilian Portuguese");
define("L_LANG_CZ", "Czech");
define("L_LANG_DA", "Danish");
define("L_LANG_DE", "German");
define("L_LANG_EN", "English"); // for admin panel only
define("L_LANG_ENUK", "English UK"); // for UK formats and flags
define("L_LANG_ENUS", "English US"); // for US formats and flags
define("L_LANG_ES", "Spanish");
define("L_LANG_FR", "French");
define("L_LANG_GR", "Greek");
define("L_LANG_HE", "עברית");
define("L_LANG_HI", "Hindi");
define("L_LANG_HU", "Hungarian");
define("L_LANG_ID", "Indonesian");
define("L_LANG_IT", "Italian");
define("L_LANG_KA", "גרוזינית");
define("L_LANG_NL", "הולנדית");
define("L_LANG_RO", "רומנית");
define("L_LANG_SK", "Slovak");
define("L_LANG_SRC", "Serbian - Cyrillic");
define("L_LANG_SRL", "Serbian - Latin");
define("L_LANG_SV", "Swedish");
define("L_LANG_TR", "Turkish");
define("L_LANG_UR", "Urdu");
define("L_LANG_VI", "Vietnamese");

// Skins preview page
define("L_SKINS_TITLE", "Skins Preview");
define("L_SKINS_TITLE1", "Skins %s to %s preview"); // Skins 1 to 4 preview
define("L_SKINS_AV", "Available skins");
define("L_SKINS_NONAV", "There are no styles defined in the \"skins\" folder");
define("L_SKINS_COPY", "&copy; %s Skin by %s");

// Swap image titles by Ciprian
define("L_GEN_ICON", "Gender icon");

// Ghost mode by Ciprian
define("L_GHOST", "Ghost");
define("L_SUPER_GHOST", "Super Ghost");
define("L_NO_GHOST", "Visible");

// Sorting options by Ciprian
define("L_ASC", "סדר עולה");
define("L_DESC", "סדר יורד");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "סהכ ביקורים");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "השתמש בגראווטר הזה");

// Uploader mod by Ciprian
define("L_UPLOAD", "Upload %s");
define("L_UPLOAD_IMG", "קובץ תמונה");
define("L_UPLOAD_SND", "קובץ קול");
define("L_UPLOAD_FLS", "קבצים");
define("L_UPLOAD_SUCCESS", "%s הועלה לשרת בהצלחה בתור %s.");
define("L_FILES_TITLE", "ניהול העלאת קבצים");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "מוגבל");
define("L_RESTRICTED_ROM", "%s has successfully been restricted from this room.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "הכנס באמצעות OpenID");
define("L_OPID_REG", "Import your OpenID profile");

// Support buttons
define("L_SUPP_WARN", "You have chosen to contribute to the free development of\\n".APP_NAME." by making a donation to the developer.\\nThank you for your support!\\n\\nNote: the recipient is not the owner of this chat.\\nPlease enter the amount on the next page.\\n\\nContinue?");
define("L_SUPP_ALT", "Support with PayPal the development of ".APP_NAME." - it's Fast, Free and Secure!");
?>