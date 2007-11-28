<?php
// File : english/localized.chat.php - plus version (20.10.2007 - rev.29)
// Original file by Nicolas Hoizey <nhoizey@phpheaven.net>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "Tutorial");

define("L_WEL_1", "Messages are deleted after %s %s");
define("L_WEL_2", "and inactive users after %s %s");

define("L_CUR_1", "There");
define("L_CUR_1a", "are currently");
define("L_CUR_1b", "is currently");
define("L_CUR_2", "in the chat");
define("L_CUR_3", "Users currently in the chat rooms");
define("L_CUR_4", "users in private rooms");
define("L_CUR_5", "Users currently lurking<br />(monitoring this page):");

define("L_SET_1", "Please set ...");
define("L_SET_2", "your username");
define("L_SET_3", "the number of messages to display");
define("L_SET_4", "the timeout between each update");
define("L_SET_5", "Select a chat room ...");
define("L_SET_6", "default public rooms");
define("L_SET_7", "Make your choice ...");
define("L_SET_8", "public rooms created by users");
define("L_SET_9", "create your own");
define("L_SET_10", "public");
define("L_SET_11", "private");
define("L_SET_12", "room");
define("L_SET_13", "Then, just");
define("L_SET_14", "chat");
define("L_SET_15", "default private rooms");
define("L_SET_16", "private rooms created by users");
define("L_SET_17", "choose your avatar");
define("L_SET_18", "Bookmark this page: press \"CTRL +D\".");

define("L_SRC", "is freely available on");

define("L_SECS", "seconds");
define("L_MIN", "minute");
define("L_MINS", "minutes");
define("L_HOUR", "hour");
define("L_HOURS", "hours");

// registration stuff:
define("L_REG_1", "your password");
define("L_REG_2", "Account management");
define("L_REG_3", "Register");
define("L_REG_4", "Edit your profile");
define("L_REG_5", "Delete user");
define("L_REG_6", "User registration");
define("L_REG_7", "only if you are registered");
define("L_REG_8", "your e-mail");
define("L_REG_9", "You have successfully registered.");
define("L_REG_10", "Back");
define("L_REG_11", "Editing");
define("L_REG_12", "Modifying user’s information");
define("L_REG_13", "Deleting user");
define("L_REG_14", "Login");
define("L_REG_15", "Log In");
define("L_REG_16", "Change");
define("L_REG_17", "Your profile was successfully updated.");
define("L_REG_18", "You have been kicked out of the room by a moderator of this room.");
define("L_REG_18a", "You have been kicked out of the room by a moderator of this room.<br />Reason: %s");
define("L_REG_19", "Do you really want to be removed?");
define("L_REG_20", "Yes");
define("L_REG_21", "You have been successfully removed.");
define("L_REG_22", "No");
define("L_REG_25", "Close");
define("L_REG_30", "firstname");
define("L_REG_31", "lastname");
define("L_REG_32", "WEB");
define("L_REG_33", "show e-mail in public information");
define("L_REG_34", "Editing user profile");
define("L_REG_35", "Administration");
define("L_REG_36", "location/country");
define("L_REG_37", "Fields with a <span class=\"error\">*</span> must be completed.");
define("L_REG_39", "The room you were in has been removed by the administrator.");
define("L_REG_45", "gender");
define("L_REG_46", "male");
define("L_REG_47", "female");
define("L_REG_48", "unspecified");
define("L_REG_49", "Registration required!");
define("L_REG_50", "Registration suspended!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Your settings to enter the chat");
define("L_EMAIL_VAL_2", "Welcome to our chat server.");
define("L_EMAIL_VAL_Err", "Internal error, please contact the administrator: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Your password has been sent to your e-mail address.<br />You may change your password at the login page under edit your profile.");

// admin stuff
define("L_ADM_1", "%s is no longer a moderator for this room.");
define("L_ADM_2", "You are no longer a registered user.");

// error messages
define("L_ERR_USR_1", "This username is already in use. Please choose another.");
define("L_ERR_USR_2", "You must choose a username.");
define("L_ERR_USR_3", "This username is registered.<br />Please type your password or choose another username.");
define("L_ERR_USR_4", "You typed an incorrect password.");
define("L_ERR_USR_5", "You must type your username.");
define("L_ERR_USR_6", "You must type your password.");
define("L_ERR_USR_7", "You must type your e-mail.");
define("L_ERR_USR_8", "You must type a correct e-mail address.");
define("L_ERR_USR_9", "This username is already in use.");
define("L_ERR_USR_10", "Wrong username or password.");
define("L_ERR_USR_11", "You must be administrator.");
define("L_ERR_USR_12", "You are the administrator, so you cannot be removed.");
define("L_ERR_USR_13", "To create your own room you must be registered.");
define("L_ERR_USR_14", "You must be registered before chatting.");
define("L_ERR_USR_15", "You must type your full name.");
define("L_ERR_USR_16", "Only these extra-characters allowed:\\n".$REG_CHARS_ALLOWED."\\nSpaces, commas or backslashes (\\) not allowed.\\nCheck the sintax.");
define("L_ERR_USR_16a", "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />Spaces, commas or backslashes (\\) not allowed. Check the sintax.");
define("L_ERR_USR_17", "This room doesn’t exist, and you are not allowed to create one.");
define("L_ERR_USR_18", "Banished word found in your username.");
define("L_ERR_USR_19", "You cannot be in more than one room at the same time.");
define("L_ERR_USR_20", "You have been banished from this room or from the chat.");
define("L_ERR_USR_20a", "You have been banished from this room or from the chat.<br />Reason: %s");
define("L_ERR_USR_21", "You have NOT been active for the last ".C_USR_DEL." minutes,<br />therefore you’ve been booted from the room.");
define("L_ERR_USR_22", "This command is not available for\\nthe browser you use (IE engine).");
define("L_ERR_USR_23", "To join a private room you must be registered.");
define("L_ERR_USR_24", "To create your own private room you must be registered.");
define("L_ERR_USR_25", "Only the administrator can use ".$COLORNAME." color!<br />Don’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />These are reserved to power users!");
define("L_ERR_USR_26", "Only the admins and moderators can use ".$COLORNAME." color!<br />Don’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".<br />These are reserved to power users!");
define("L_ERR_USR_27", "You cannot talk private to yourself.\\nDo that in your mind please...\\nNow choose a different username.");
define("L_ERR_ROM_1", "Room’s name cannot contain commas or backslashes (\\).");
define("L_ERR_ROM_2", "Banished word found in the room’s name you want to create.");
define("L_ERR_ROM_3", "This room already exists as a public one.");
define("L_ERR_ROM_4", "Invalid room name.");

// users frame or popup
define("L_EXIT", "Exit Chat");
define("L_DETACH", "Detach Users list");
define("L_EXPCOL_ALL", "Expand/Collapse All");
define("L_CONN_STATE", "Refresh Connection state");
define("L_CHAT", "Chat");
define("L_USER", "user");
define("L_USERS", "users");
define("L_LURKER", "lurker");
define("L_LURKERS", "lurkers");
define("L_NO_USER", "No user");
define("L_ROOM", "room");
define("L_ROOMS", "rooms");
define("L_EXPCOL", "Expand/Collapse room");
define("L_BEEP", "Beep/no beep at user entrance");
define("L_PROFILE", "Display profile");
define("L_NO_PROFILE", "No profile");

// input frame
define("L_HLP", "Help");
define("L_MODERATOR", "%s is now a moderator for this room.");
define("L_KICKED", "%s has successfully been kicked away.");
define("L_KICKED_REASON", "%s has successfully been kicked away. (Reason: %s)");
define("L_BANISHED", "%s has successfully been banished.");
define("L_BANISHED_REASON", "%s has successfully been banished. (Reason: %s)");
define("L_ANNOUNCE", "ANNOUNCE");
define("L_INVITE", "%s requests that you join her/him into the <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> room.");
define("L_INVITE_REG", "You have to be registered to enter this room.");
define("L_INVITE_DONE", "Your invitation has been sent to %s.");
define("L_OK", "Send");
define("L_BUZZ", "Buzzes Gallery");
define("L_BAD_CMD", "This is not a valid command!");
define("L_ADMIN", "%s is already the administrator!");
define("L_IS_MODERATOR", "%s is already a moderator!");
define("L_NO_MODERATOR", "Only a moderator of this room can use this command.");
define("L_NONEXIST_USER", "%s isn’t in the current room.");
define("L_NONREG_USER", "%s isn’t registered.");
define("L_NONREG_USER_IP", "His IP is: %s.");
define("L_NO_KICKED", "%s is a moderator or the administrator and can’t be kicked away.");
define("L_NO_BANISHED", "%s is a moderator or the administrator and can’t be banished.");
define("L_SVR_TIME", "Server time: ");
define("L_NO_SAVE", "No message to save!");
define("L_NO_ADMIN", "Only the administrator can use this command.");
define("L_NO_REG_USER", "You must be registered on this chat to use this command.");

// help popup
define("L_HELP_TIT_1", "Smilies");
define("L_HELP_TIT_2", "Text formating for messages");
define("L_HELP_FMT_1", "You can put bold, italic or underlined text in messages by encasing the applicable sections of your text with either the &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; tags.<br />For example, &lt;B&gt;this text&lt;/B&gt; will produce <B>this text</B>.");
define("L_HELP_FMT_2", "To create a hyperlink (for e-mail or URL) in your message, simply type the corresponding address without any tag. The hyperlink will be created automatically.");
define("L_HELP_TIT_3", "Commands");
define("L_HELP_NOTE", "All the commands must be used in English!");
define("L_HELP_USR", "user");
define("L_HELP_MSG", "message");
define("L_HELP_MSGS", "messages");
define("L_HELP_ROOM", "room");
define("L_HELP_BUZZ", "~soundname");
define("L_HELP_REASON", "the reason");
define("L_HELP_CMD_0", "{} represents a required setting, [] an optional one.");
define("L_HELP_CMD_1a", "Set number of messages to show. Minimum and default are 5.");
define("L_HELP_CMD_1b", "Reload the messages frame and display the n latest messages, minimum and default are 5.");
define("L_HELP_CMD_2a", "Modify messages list refresh delay (in seconds).<br />If n is not specified or less than 3, toggles between no refresh and 10s refresh.");
define("L_HELP_CMD_2b", "Modify messages and users lists refresh delay (in seconds).<br />If n is not specified or less than 3, toggles between no refresh and 10s refresh.");
define("L_HELP_CMD_3", "Inverts messages order (not in all browsers).");
define("L_HELP_CMD_4", "Join another room, creating it if it doesn’t exist and if you’re allowed to.<br />n equals 0 for private and 1 for public, default to 1 if not specified.");
define("L_HELP_CMD_5", "Leave the chat after displaying an optionnal message.");
define("L_HELP_CMD_6", "Avoid diplaying messages from a user if nick is specified.<br />Set ignoring off for a user when nick and - are both specified, for all users when - is but not nick.<br />With no option, this command pops up a window that shows all ignored nicks.");
define("L_HELP_CMD_7", "Recall the previous text typed (command or message).");
define("L_HELP_CMD_8", "Show/Hide time before messages.");
define("L_HELP_CMD_9", "Kick away user from the chat. This command can only be used by a moderator of that room or an admin.<br />Optionally, [".L_HELP_REASON."] displays the reason of kicking (any desired text).");
define("L_HELP_CMD_10", "Send a private message to the specified user (other users won’t see it).");
define("L_HELP_CMD_11", "Show informations about specified user.");
define("L_HELP_CMD_12", "Popup window for editing user’s profile.");
define("L_HELP_CMD_13", "Toggles notifications of user entrance/exit for the current room.");
define("L_HELP_CMD_14", "Allow the administrator or moderator(s) of the curent room to promote another registered user to moderator for the same room.");
define("L_HELP_CMD_15", "Clear the messages frame and show only the last 5 messages.");
define("L_HELP_CMD_16", "Save the last n messages (notifications ones excluded) to an HTML file. If n is not specified, all available messages will be taken into account.");
define("L_HELP_CMD_17", "Allow the administrator to send an announcement to all users in all chat rooms.");
define("L_HELP_CMD_18", "Invite a user chatting in an other room join the one you are in.");
define("L_HELP_CMD_19", "Allow the moderator(s) of a room or the administrator to \"banish\" a user from the room for a time defined by the administrator.<br />The later can banish a user chatting in an other room than the one he is into and use the * setting to banish \"forever\" a user from the chat as the whole.<br />Optionally, [".L_HELP_REASON."] displays the reason of banishment (any desired text).");
define("L_HELP_CMD_20", "Describe what you’re doing without refer yourself.");
define("L_HELP_CMD_21", "Anounces the room and the users who try to send you messages<br /> that you are away from the computer. If you want to be back to chat, just start typing.");
define("L_HELP_CMD_22", "Sends a buzzer sound and optionally displays a message in the current room.<br />- Usage:<br />- old usage: \"/buzz\" or \"/buzz message to be shown\" - this plays the default sound for buzz defined in Admin panel;<br />- extended usage: \"/buzz ~soundname\" or \"/buzz ~soundname message to be shown\" - this plays the soundname.wav file from the plus/sounds folder; please note the sign \"~\" to be used at the beggining of the second word, which is the name of the sound file, without the extension .wav (only .wav extensions allowed).<br />By default, this is a moderator/admin command.");
define("L_HELP_CMD_23", "Send a <i>whisper</i> (private message). The message will reach the destination, no matter which room the user is in. If the user is not on-line or has set away, you will be notified about it.");
define("L_HELP_CMD_24", "Usage: the topic has to contain at least 2 words.<br />This command changes the topic of the current room. Try not to override other users topics. Use important topics.<br />By default, this is a moderator/admin command.<br />Using \"/topic top reset\" command the current topic will be deleted and reset to default one of the room.<br />Optional, \"/topic * {}\" does exactly the same but in all the rooms (global topic and global topic reset).");
define("L_HELP_CMD_25", "A dice game for random/hazarduous numbers.<br />Usage: /dice or /dice [n];<br />n can take any value <b>between 1 and %s</b> (it represents the number of dice). If no number is entered, the default maximum dice will be used.");
define("L_HELP_CMD_26", "This is a more complex version of the /dice command.<br />Usage: /{n1}d[n2] or /{n1}d;<br />n1 can take any value <b>between 1 and %s</b> (it represents the number of dice per throws).<br />n2 can take any value <b>between 1 and %s</b> (it represents the number of sides per die).");
define("L_HELP_CMD_27", "It highlights the messages of a specific user for an easier reading across the conversations.<br />Usage: /high {user} or press the small <img src=./images/highlightOff.gif> square on the right of the username (in the rooms/users list)");
define("L_HELP_CMD_28", "It allows posting of <i>one single image</i> as message.<br />Usage: The picture has to be on the internet and free accessible by anyone. Don’t use pages that need login.<br />Full image link must be typed! E.g.<b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Allowed extensions: .jpg .bmp .gif .png. The link is case sensitive!<br />HINTS: type /img then a space and paste the URL into the box; to get the URL of an image from a webpage, when you right-click on the image, go to properties, then highlight the whole address/URL (sometimes needs to scroll down a bit) and copy/paste after the /img<br />Don’t use pictures from your pc: it will just break the chat window!!!");
define("L_HELP_CMD_29", "The second command will allow the administrator or moderator(s) of the curent room to demote another registered user previously promoted to moderator for the same room.<br />The * option will demote the user from all the rooms.");
define("L_HELP_CMD_30", "The second command does the same as /me but it will show your respective gender<br />E.g. * Mr Ciprian is watching TV or Mrs Dana is happy.");
define("L_HELP_CMD_31", "Change the order users are sorted in lists: by entrance time or alphabetically.");
define("L_HELP_CMD_32", "This is a third (roleplaying) version of the dice rolling.<br />Usage: /d{n1}[tn2] or /d{n1};<br />n1 can take any value <b>between 1 and 100</b> (it represents the number of sides per die).<br />n2 can take any value <b>between 1 and %s</b> (it represents the number of dice per throw).");
define("L_HELP_CMD_33", "Change the font size of the messages in chat to user choice (allowed values for n: <b>between 7 and 15</b>); the /size command resets the font size to the default value (<b>".$FontSize."</b>).");
define("L_HELP_ETIQ_1", "Chat Etiquette");
define("L_HELP_ETIQ_2", "Our site would like to keep its community friendly and fun, so please adhere to the following guidelines. If you fail to observe these rules, one of our chat moderators may boot you from the chat.<br /><br />Thank you,");
define("L_HELP_ETIQ_3", "Our Chat Etiquette Guidelines");
define("L_HELP_ETIQ_4", "Do not \"spam\" the chat by typing nonsense or random letters.</li>
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
$TextColors = array("Black" => "#000000",
				"Red" => "#FF0000",
				"Green" => "#009900",
				"Blue" => "#0000FF",
				"Purple" => "#9900FF",
				"Dark red" => "#990000",
				"Dark green" => "#006600",
				"Dark blue" => "#000099",
				"Maroon" => "#996633",
				"Aqua blue" => "#006699",
				"Carrot" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "Ignored");
define("L_IGNOR_NON", "No ignored user");

// whois popup
define("L_WHOIS_ADMIN", "Administrator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_TOPMOD", "Top Moderator");
define("L_WHOIS_USER", "User");
define("L_WHOIS_GUEST", "Guest");
define("L_WHOIS_REG", "Registered");

// Notification messages of user entrance/exit
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", "%s enters this room" . L_ENTER_SND);
else define("L_ENTER_ROM", "%s enters this room");
define("L_ENTER_ROM_NOSOUND", "%s enters this room");
define("L_EXIT_ROM", "%s exits from this room");

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s has automatically been booted from this room for inactivity");
define("L_CLOSED_ROM", "%s has closed the browser");

// Text for /away command notification string:
define("L_AWAY", "%s is marked away");
define("L_BACK", "%s is back!");

// Quick Menu mod
define("L_QUICK", "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;***** Quick Menu *****");	//&nbsp; means one blank space. this will center align the title of the drop list.

// Topic Banner mod
define("L_TOPIC", "has set the TOPIC to:");
define("L_TOPIC_RESET", "has reset the TOPIC");
define("L_HELP_TOP", "at least two words as topic");

// Img cmd mod
define("L_PIC", "Picture posted by");
define("L_PIC_RESIZED", "Resized to");
define("L_HELP_IMG", "full path to the image to be posted");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s is no longer a moderator for any room of this chat.");
define("L_IS_NO_MODERATOR", "%s is not a moderator.");
define("L_ERR_IS_ADMIN", "%s is the administrator!\\nYou cannot change his permissions.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "<span style=\"color:orange\">Extra Commands available:</span>".CMDS.".");
define("INFO_MODS", "<span style=\"color:orange\">Extra Features/Mods available:</span>".MODS.".");
define("INFO_BOT", "<span style=\"color:orange\">Our available bot is: </span><u>".C_BOT_NAME."</u>.");

// Profile mod
define("L_PRO_1", "spoken languages");
define("L_PRO_2", "favorite link 1");
define("L_PRO_3", "favorite link 2");
define("L_PRO_4", "description");
define("L_PRO_5", "picture URL");
define("L_PRO_6", "your name/text color");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Invalid URL or non-existing host.");
define("L_TITLE_AV", "Your current avatar: ");
define("L_CHG_AV", "Click \"".L_REG_16."\" in the Profile form<br />to store your Avatar.");
define("L_SEL_NEW_AV", "Select a new Avatar");
define("L_EX_AV", "(example: http://mysite/images/mypic.gif):");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, then hit ENTER to view)");
define("L_CANCEL", "Cancel");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Our bot is publicly active in this room. To start talking to the bot, type <b>hello ".C_BOT_NAME."</b>. To end conversation, type: <b>bye ".C_BOT_NAME."</b>. (private: /to <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Our bot is publicly active in %s room. You can only talk private by clicking on it’s name and whispering. (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Our bot is not publicly active. You can only talk private by clicking on it’s name. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot is not running in this room!");
define("BOT_START_ERROR", "Bot is already running in this room!");
define("BOT_DISABLED_ERROR", "Bot has been disabled from Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "rolls the dice, the results are:");
define("DICE_WRONG", "You have to select how many dice you want to roll\\n(Choose a number between 1 and ".MAX_ROLLS.").\\nJust type /dice to roll all ".MAX_ROLLS." dice.");
define("DICE2_WRONG", "The second value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "The first value has to be between 1 and ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "The first (d) value has to be between 1 and 100.\\nThe second (t) value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /d50 or /d100t".MAX_ROLLS.").");

// Log mod by Ciprian
define("L_ARCHIVE", "Open Archive");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "open popups on private message");
define("L_PRIV_POST_MSG", "Send a private message!");
define("L_PRIV_MSG", "New private message received!");
define("L_PRIV_MSGS", "new private messages received!");
define("L_PRIV_MSGSa", "Here are the first 10 messages!<br />Use the bottom link to see the rest.");
define("L_PRIV_MSG1", "From:");
define("L_PRIV_MSG2", "Room:");
define("L_PRIV_MSG3", "To:");
define("L_PRIV_MSG4", "Message:");
define("L_PRIV_MSG5", "Posted:");
define("L_PRIV_REPLY", "Reply");
define("L_PRIV_READ", "Press the ’Close’ button to mark all posts as read!");
define("L_PRIV_POPUP", "You can disable/re-enable anytime this popup feature<br />by editing your");
define("L_PRIV_POPUP1", "Profile</a> (only registered users)");
define("L_NOT_ONLINE", "%s is not online right now.");
define("L_PRIV_NOT_ONLINE", "%s is not online right now,\\nbut will still receive your message after login.");
define("L_PRIV_NOT_INROOM", "%s is not in this room.\\nIf you still want to pm this user,\\nuse the command: /wisp %s message.");
define("L_PRIV_AWAY", "%s is marked away,\\nbut will still receive your message\\nwhen will be back.");
define("PM_DISABLED_ERROR", "Whispering (private messaging)\\nhas been disabled in this chat.");
define("L_NEXT_PAGE", "Go to the next page");
define("L_NEXT_READ", "Read the next %s"); // message / 10 messages
define("L_ROOM_ALL", "All rooms");

// Color Input Box mod by Ciprian
define("L_COLOR_HEAD_COLF_SETTINGS", "".COLOR_FILTERS == 1 ? "Enabled" : "Disabled"."");
define("L_COLOR_HEAD_ALLG_SETTINGS", "".COLOR_ALLOW_GUESTS == 1 ? "Enabled" : "Disabled"."");
define("L_COLOR_HEAD_SETTINGS", "<u>Current Settings on this server</u>:<br />a) COLOR_FILTERS = <b>".L_COLOR_HEAD_COLF_SETTINGS."</b>;<br />b) COLOR_ALLOW_GUESTS = <b>".L_COLOR_HEAD_ALLG_SETTINGS."</b>.");
define("L_COLOR_HEAD_SETTINGSa", "<u>Default colors</u>: Administrator = <b><SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN></b>, Moderators = <b><SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN></b>, Other users = <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COLOR_HEAD_SETTINGSb", "<u>Default color</u>: <b><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></b>.");
define("L_COL_HELP_TITLE", "Color Picker");
define("L_COL_HELP_SUB1", "Usage:");
define("L_COL_HELP_P1", "You can select your own default color by editing your profile (the same color as your username color). You’ll still be able to use any other color. To change back to your default color from a random used one, you have to choose once the default color (Null) - it is the first one in the select list.");
define("L_COL_HELP_SUB2", "Hints:");
define("L_COL_HELP_P2", "<u>Color Range</u><br />Depending on your browser/OS capabilities, it is possible that some of the colors won’t be rendered. Only 16 color names are supported by the W3C HTML 4.0 standard:");
define("L_COL_HELP_P2a", "If a user claims he cannot see your selected color it means he is probably using an older browser.");
define("L_COL_HELP_SUB3", "Settings defined on this chat:");
define("L_COL_HELP_P3", "<u>Power levels of color usage</u>:<br />1. Administrator can use any color.<br />The default color for the administrator is <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>.<br />2. Moderators can use any color but <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> and <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>.<br />The default color for moderators is <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>.<br />3. The other users can use any color but <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>, <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>, <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> and <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>.");
define("L_COL_HELP_P3a", "The default color is <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>.<br /><br /><u>Technical stuff</u>: These colors have been defined by the administrator in admin panel.<br />If anything goes wrong or if there is something you don’t like about the default colors, you should contact the <b>administrator</b> first, not the other users in your room. :-)");
define("L_COL_HELP_USER_STATUS", "Your status");
define("L_COL_TUT", "Using colored text in chat");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Only the administrator can use ".COLOR_CA." color!\\n\\nYour text color resets to ".COLOR_CM."!\\n\\nPlease choose any other color.");
define("COL_ERROR_BOX_USRA", "Only the administrator can use ".COLOR_CA." color!\\n\\nDon’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");
define("COL_ERROR_BOX_USRM", "You must be a moderator to use ".COLOR_CM." color!\\n\\nDon’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");

//Welcome message to be displayed on login
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", "Welcome to our chat. Please obey the net etiquette while chatting: <I>try to be pleasant and polite</I>." . L_WELCOME_SND);
else define("WELCOME_MSG", "Welcome to our chat. Please obey the net etiquette while chatting: <I>try to be pleasant and polite</I>.");
define("WELCOME_MSG_NOSOUND", "Welcome to our chat. Please obey the net etiquette while chatting: <I>try to be pleasant and polite</I>.");

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "The settings of this server have just been changed. To avoid malfunctions, please reload your browser (press F5 key or Exit and reenter chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "The font size value can only be\\nnull (for reset) or between 7 and 15");

// Week days for Status Worldtime and Open Schedule by Ciprian
define("L_MON", "Monday");
define("L_TUE", "Tuesday");
define("L_WED", "Wednesday");
define("L_THU", "Thursday");
define("L_FRI", "Friday");
define("L_SAT", "Saturday");
define("L_SUN", "Sunday");

// Password reset form by Ciprian
define("L_PASS_0", "Password Resetting form");
define("L_PASS_1", "Your secret question");
define("L_PASS_2", "What make was your first car?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "What was your first pet name?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "What is your favorite drink?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "What is your birth date?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Your secret answer");
define("L_PASS_7", "Reset password");
define("L_PASS_8", "Your password has successfully been reset.");
define("L_PASS_9", "Your new password to enter the chat.");
define("L_PASS_11", "Welcome back to our chat server!");
define("L_PASS_12", "Choose your question ...");
define("L_ERR_PASS_1", "Wrong username. Choose yours.");
define("L_ERR_PASS_2", "Wrong email. Try again!");
define("L_ERR_PASS_3", "Wrong secret question.<br />Answer to the one shown bellow!");
define("L_ERR_PASS_4", "Wrong secret answer. Try again!");
define("L_ERR_PASS_5", "You haven’t set your private/secret data.");
define("L_ERR_PASS_6", "You haven’t set your private/secret data yet.<br />You cannot use this form. Contact the admin!");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s has become an administrator of this chat.");
define("L_ADM_4", "%s is no longer an administrator of this chat.");

// Open Schedule by Ciprian
define("L_DAILY", "Daily");
define("L_ALWAYS", "always");
define("L_OPEN", "Open");
define("L_CLOSED", "Closed");
define("L_OPEN_PUB", "OPEN TO PUBLIC");
define("L_CLOSED_PUB", "CLOSED TO PUBLIC");

// Links popup page by Alex
define("L_LINKS_1", "Posted links");
define("L_LINKS_2", "Here you can access the posted links");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "Click here %s %s");
define("L_CLICK", "Click here %s");
define("L_LINKS_3", "to open link");
define("L_LINKS_4", "to open author’s site");
define("L_LINKS_5", "to insert this smiley");
define("L_LINKS_6", "to contact");
define("L_LINKS_7", "to visit phpMyChat Homepage");
define("L_LINKS_8", "to join phpMyChat Group");
define("L_LINKS_9", "to send your feedback");
define("L_LINKS_10", "to download phpMyChat Plus");
define("L_LINKS_11", "to check who is chatting");
define("L_LINKS_12", "to open the Chat Login Page");
define("L_LINKS_13", "to send this buzz"); // can also be translated as "to play this sound"
define("L_LINKS_14", "to use this command");
define("L_LINKS_15", "to open");
define("L_LINKS_16", "Smilie Gallery");
define("L_SWITCH", "Switch to"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "selected"); // E.g. "French - selected" (Country Flags mouseover / Language switching)
define("L_EMAIL_1", "to send email");
define("L_FULLSIZE_PIC", "to open the full size picture");
define("L_AUTHOR", "the author"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "the developer of this chat"); //same here
define("L_OWNER", "the owner of this chat"); //same here
define("L_TRANSLATOR", "the translator"); //same here

// Banner topics - the topics are not multi-language!
define("L_BANNER_WELCOME", "Welcome to %s!");
define("L_BANNER_TOPIC", "Topic:");

// Counter on login
define("L_VISITOR_REPORT", "... visitors since %s");

// Status bar messages
define("L_JOIN_ROOM", "Join this room");
define("L_USE_NAME", "Use this username");
define("L_USE_NAME1", "Address to this username");
define("L_WHSP", "Whisper");
define("L_SEND_WHSP", "Send a whisper");
define("L_SEND_PM_1", "Send PM");
define("L_SEND_PM_2", "Send a private message");

//Lurking frame popup
define("L_LURKING_2", "Lurking page");
define("L_LURKING_3", "is lurking");
define("L_LURKING_4", "joined on");
define("L_LURKING_5", "Unknown");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Options");
define("L_SOUNDFIX_IE_1", "Sound fix for IE");
define("L_SOUNDFIX_IE_2", "Download a sound fix for IE");
define("L_LURKING_1", "Open the lurking page");

// Months for Open Schedule by Ciprian
define("L_JAN", "January");
define("L_FEB", "February");
define("L_MAR", "March");
define("L_APR", "April");
define("L_MAY", "May");
define("L_JUN", "June");
define("L_JUL", "July");
define("L_AUG", "August");
define("L_SEP", "September");
define("L_OCT", "October");
define("L_NOV", "November");
define("L_DEC", "December");

if (C_ENGLISH_FORMAT == "UK")
{
// Localized date format
// Set the UK specific date/time format
setlocale(LC_TIME, "en_GB.UTF-8", "en_GB.UTF-8@euro", "English-uk.UTF-8", "eng.UTF-8", "uk.UTF-8", "eng_eng.UTF-8"); // For UK formats
define("L_SHORT_DATE", "%d/%m/%Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%d/%m/%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
}
elseif (C_ENGLISH_FORMAT == "US")
{
// Set the US specific date/time format
setlocale(LC_TIME, "en_US.UTF-8", "English-usa.UTF-8", "enu.UTF-8", "usa.UTF-8", "enu_enu.UTF-8"); // For American formats
define("L_SHORT_DATE", "%m/%d/%Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%m/%d/%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
}
define("L_LONG_DATE", "%A, %d of %B %Y"); //Change this to your local desired format (keep the long form)
define("L_LONG_DATETIME", "%A, %d of %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".$CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","users are ".LOGIN_LINK." chatting</A> at this time.</td></tr>");
define("USERS_LOGIN","1 user is ".LOGIN_LINK." chatting</A> at this time.</td></tr>");
define("NO_USER","Nobody is ".LOGIN_LINK." chatting</A> at this time.</td></tr>");

// Language names
define("L_LANG_AR", "Argentinian Spanish");
define("L_LANG_NL", "Dutch");
define("L_LANG_EN", "English"); // for admin panel only
define("L_LANG_ENUK", "English UK"); // for UK formats and flags
define("L_LANG_ENUS", "English US"); // for US formats and flags
define("L_LANG_FR", "French");
define("L_LANG_DE", "German");
define("L_LANG_IT", "Italian");
define("L_LANG_RO", "Romanian");
define("L_LANG_ES", "Spanish");
define("L_LANG_SV", "Swedish");
define("L_LANG_TR", "Turkish");
define("L_LANG_VI", "Vietnamese");
?>