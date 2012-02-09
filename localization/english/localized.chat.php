<?php
// File : english/localized.chat.php - plus version (02.01.2011 - rev.45)
// Original file by Nicolas Hoizey <nhoizey@phpheaven.net>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

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
define("L_SET_2", "Username");
define("L_SET_3", "the number of messages to display");
define("L_SET_4", "the timeout between each update");
define("L_SET_5", "Select a chat room ...");
define("L_SET_6", "Default public rooms");
define("L_SET_7", "Make your choice ...");
define("L_SET_8", "Public rooms created by users");
define("L_SET_9", "Create your own");
define("L_SET_10", "public");
define("L_SET_11", "private");
define("L_SET_12", "room");
define("L_SET_13", "Then, just");
define("L_SET_14", "chat");
define("L_SET_15", "Default private rooms");
define("L_SET_16", "Private rooms created by users");
define("L_SET_17", "Choose your avatar");
define("L_SET_18", "Bookmark this page: press \"Ctrl+D\".");
define("L_SET_19", "Remember me");

define("L_SRC", "is freely available on");

define("L_SEC", "second");
define("L_SECS", "seconds");
define("L_MIN", "minute");
define("L_MINS", "minutes");
define("L_HOUR", "hour");
define("L_HOURS", "hours");

// registration stuff:
define("L_REG_1", "Password");
define("L_REG_2", "Account management");
define("L_REG_3", "Register");
define("L_REG_4", "Edit your profile");
define("L_REG_5", "Delete user");
define("L_REG_6", "User registration");
define("L_REG_7", "only if you are registered");
define("L_REG_8", "E-mail");
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
define("L_REG_30", "Firstname");
define("L_REG_31", "Lastname");
define("L_REG_32", "WEB");
define("L_REG_33", "show e-mail address in public information");
define("L_REG_34", "Editing user profile");
define("L_REG_35", "Administration");
define("L_REG_36", "Location/Country");
define("L_REG_37", "Fields with a <span class=\"error\">*</span> must be completed.");
define("L_REG_39", "The room you were in has been removed by the administrator.");
define("L_REG_43", "Undisclosed");
define("L_REG_44", "Couple");
define("L_REG_45", "Gender");
define("L_REG_46", "Male");
define("L_REG_47", "Female");
define("L_REG_48", "Unspecified");
define("L_REG_49", "Registration required!");
define("L_REG_50", "Registration suspended!");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "Your settings to enter the chat");
define("L_EMAIL_VAL_2", "Welcome to our chat server.");
define("L_EMAIL_VAL_Err", "Internal error, please contact the administrator: <a href=\"mailto:%s\">%s</a>.");
define("L_EMAIL_VAL_Done", "Your password has been sent to your e-mail address.<br />You may change your password at the login page under \"".L_REG_4."\".");
define("L_EMAIL_VAL_PENDING_Done", "Your registered data has been submitted for review.");
define("L_EMAIL_VAL_PENDING_Done1", "You will receive your password, after your account is approved by the Administrator.");
define("L_EMAIL_VAL_3", "Your registration is pending for %s"); //chat name
define("L_EMAIL_VAL_31", "Congratulations! Your registration data have been reviewed and approved!");
define("L_EMAIL_VAL_32", "This is your registration data for %s at %s:"); //chat name at chaturl
define("L_EMAIL_VAL_4", "You have just registered this account for %s at %s:"); //chat name at chaturl
define("L_EMAIL_VAL_41", "You have just changed important account info for %s at %s (account affected: %s)."); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "Your - %s - account details for %s"); //username - chatname
define("L_EMAIL_VAL_51", "Your - %s - account updated details for %s"); //username - chatname
define("L_EMAIL_VAL_6", "Registered on: %s");
define("L_EMAIL_VAL_61", "Updated on: %s");
define("L_EMAIL_VAL_7", "Below is your %s updated account info:"); //username
define("L_EMAIL_VAL_8", "Save this email for your future reference.\nPlease also make it safe and don’t share this data.\nThank you for joining! Enjoy!");
define("L_EMAIL_VAL_81", "You may change your password at the login page under \"".L_REG_4."\".");

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
define("L_ERR_USR_14", "You must be registered to chat.");
define("L_ERR_USR_15", "You must type your full name.");
define("L_ERR_USR_16", "Only these extra-characters allowed:\\n".$REG_CHARS_ALLOWED."\\nSpaces, commas or backslashes (\\) not allowed.\\nCheck the syntax.");
define("L_ERR_USR_16a", "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />Spaces, commas or backslashes (\\) not allowed. Check the syntax.");
define("L_ERR_USR_17", "This room doesn’t exist, and you are not allowed to create one.");
define("L_ERR_USR_18", "Banished word found in your username.");
define("L_ERR_USR_19", "You cannot be in more than one room at the same time.");
define("L_ERR_USR_20", "You have been banished from this room or from the chat.");
define("L_ERR_USR_20a", "You have been banished from this room or from the chat.<br />Reason: %s");
define("L_ERR_USR_21", "You have NOT been active for the last ".C_USR_DEL." ".((C_USR_DEL == "1") ? "".L_MIN."" : "".L_MINS."").",<br />therefore you’ve been booted from the room.");
define("L_ERR_USR_22", "This command is not available for\\nthe browser you use (IE engine).");
define("L_ERR_USR_23", "To join a private room you must be registered.");
define("L_ERR_USR_24", "To create your own private room you must be registered.");
define("L_ERR_USR_25", "Only the administrator can use ".$COLORNAME." color!<br />Don’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." or ".COLOR_CM2.".<br />These are reserved to power users!");
define("L_ERR_USR_26", "Only admins and moderators can use ".$COLORNAME." color!<br />Don’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2.", ".COLOR_CM.", ".COLOR_CM1." or ".COLOR_CM2.".<br />These are reserved to power users!");
define("L_ERR_USR_27", "You cannot talk private to yourself.\\nDo that in your mind please...\\nNow choose a different username.");
define("L_ERR_USR_28", "Your access to %s has been restricted!<br />Please choose a different room.");
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
define("L_KICKED_ALL", "All the users have successfully been kicked away.");
define("L_KICKED_ALL_REASON", "All the users have successfully been kicked away. (Reason: %s)");
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
define("L_HELP_TIT_2", "Text formatting for messages");
define("L_HELP_FMT_1", "You can put bold, italic or underlined text in messages by encasing the applicable sections of your text with either the &lt;B&gt; &lt;/B&gt;, &lt;I&gt; &lt;/I&gt; or &lt;U&gt; &lt;/U&gt; tags.<br />For example, &lt;B&gt;this text&lt;/B&gt; will produce <B>this text</B>.");
define("L_HELP_FMT_2", "To create a hyperlink (for e-mail or URL) in your message, simply type the corresponding address without any tag. The hyperlink will be created automatically.");
define("L_HELP_TIT_3", "Commands");
define("L_HELP_NOTE", "All the commands must be used in English!");
define("L_HELP_MSG", "message");
define("L_HELP_MSGS", "messages");
define("L_HELP_ROOM", "room");
define("L_HELP_BUZZ", "~soundname");
define("L_HELP_BUZZ1", "Buzz...");
define("L_HELP_REASON", "the reason");
define("L_HELP_MR", "Mr. %s");
define("L_HELP_MS", "Ms. %s");
define("L_HELP_CMD_0", "{} represents a required setting, [] an optional one.");
define("L_HELP_CMD_1a", "Set the number of messages to show. Minimum and default are 5.");
define("L_HELP_CMD_1b", "Reload the messages frame and display the n latest messages, minimum and default are 5.");
define("L_HELP_CMD_2a", "Modify messages list refresh delay (in seconds).<br />If n is not specified or less than 3, toggles between no refresh and 10s refresh.");
define("L_HELP_CMD_2b", "Modify messages and users lists refresh delay (in seconds).<br />If n is not specified or less than 3, toggles between no refresh and 10s refresh.");
define("L_HELP_CMD_3", "Inverts messages order (not in all browsers).");
define("L_HELP_CMD_4", "Join another room, creating it if it doesn’t exist and if you’re allowed to.<br />n equals 0 for private and 1 for public, default to 1 if not specified.");
define("L_HELP_CMD_5", "Leave the chat after displaying an optional message.");
define("L_HELP_CMD_6", "Avoid displaying messages from a user if nick is specified.<br />Set ignoring off for a user when nick and \"-\" are both specified, for all users when \"-\" is but not nick.<br />With no option, this command pops up a window that shows all ignored nicks.");
define("L_HELP_CMD_7", "Recall the previous text typed (command or message).");
define("L_HELP_CMD_8", "Show/Hide time before messages.");
define("L_HELP_CMD_9", "Kick away user from the chat. This command can only be used by a moderator of that room or an admin.<br />Optionally, [".L_HELP_REASON."] displays the reason of kicking (any desired text).<br />If * option is used, the command will kick out from chat all the users without powers (only guests and registered users). This is useful when the server connection is having problems and all the people should reload their chat. In this second case, [".L_HELP_REASON."] is recommended to let users know why they’ve been kicked.");
define("L_HELP_CMD_10", "Sends a private message to the specified user (other users won’t see it).");
define("L_HELP_CMD_11", "Show information about specified user.");
define("L_HELP_CMD_12", "Pop-up the window for editing user’s profile.");
define("L_HELP_CMD_13", "Toggles notifications of user entrance/exit for the current room.");
define("L_HELP_CMD_14", "Allow the administrator or moderator(s) of the current room to promote another registered user to moderator for the same room.");
define("L_HELP_CMD_15", "Clear the messages frame and show only the last 5 messages.");
define("L_HELP_CMD_16", "Save the last n messages (notifications ones excluded) to an HTML file. If n is not specified, all available messages will be taken into account.");
define("L_HELP_CMD_17", "Allow the administrator to send an announcement to all users in all chat rooms.");
define("L_HELP_CMD_18", "Invite a user chatting in an other room join the one you are in.");
define("L_HELP_CMD_19", "Allow the moderator(s) of a room or the administrator to \"banish\" a user from the room for a time defined by the administrator.<br />The later can banish a user chatting in an other room than the one he is into and use the * setting to banish \"forever\" a user from the chat as the whole.<br />Optionally, [".L_HELP_REASON."] displays the reason of banishment (any desired text).");
define("L_HELP_CMD_20", "Describe what you’re doing without refer yourself.");
define("L_HELP_CMD_21", "Announces the room and the users who try to send you messages<br />that you are away from the computer. If you want to be back to chat, just start typing.");
define("L_HELP_CMD_22", "Sends a buzzer sound and optionally displays a message in the current room.<br />Usage:<br />- old usage: \"/buzz\" or \"/buzz message to be shown\" - this plays the default sound for buzz defined in Admin panel;<br />- extended usage: \"/buzz ~soundname\" or \"/buzz ~soundname message to be shown\" - this plays the soundname.wav file from the plus/sounds folder; please note the sign \"~\" to be used at the beginning of the second word, which is the name of the sound file, without the extension .wav (only .wav extensions allowed).<br />By default, this is a moderator/admin command.");
define("L_HELP_CMD_23", "Sends a <i>whisper</i> (private message). The message will reach the destination, no matter which room the user is in. If the user is not on-line or has set away, you will be notified about it.");
define("L_HELP_CMD_24", "This command changes the topic of the current room. Try not to override other users’ topics. Use important topics.<br />By default, this is a moderator/admin command.<br />Using \"/topic reset\" command the current topic will be deleted and reset to default one of the room.<br />Optionally, \"/topic * {}\" and \"/topic * reset\" do exactly the same but in all the rooms (global topic and global topic reset).");
define("L_HELP_CMD_25", "A dice game for random/hazardous numbers.<br />Usage: /dice or /dice [n];<br />n can take any value <b>between 1 and %s</b> (it represents the number of dice). If no number is entered, the default maximum dice will be used.");
define("L_HELP_CMD_26", "This is a more complex version of the /dice command.<br />Usage: /{n1}d[n2] or /{n1}d;<br />n1 can take any value <b>between 1 and %s</b> (it represents the number of dice per throws).<br />n2 can take any value <b>between 1 and %s</b> (it represents the number of sides per die).");
define("L_HELP_CMD_27", "It highlights the messages of a specific user for an easier reading across the conversations.<br />Usage: /high {user} or press the small <img src=./images/highlightOff.gif> square on the right of the username (in the rooms/users list)");
define("L_HELP_CMD_28", "It allows posting of <i>one single image</i> as message.<br />Usage: The picture has to be on the internet and free accessible by anyone. Don’t use pages that need login.<br />Full image link must be typed! E.g. <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />Allowed extensions: .jpg .bmp .gif .png. The link is case sensitive!<br />HINTS: type /img then a space and paste the URL into the box; to get the URL of an image from a webpage, when you right-click on the image, go to properties, then highlight the whole address/URL (sometimes needs to scroll down a bit) and copy/paste after the /img<br />Don’t use pictures from your pc: it will just break the chat window!!!");
define("L_HELP_CMD_29", "The second command will allow the administrator or moderator(s) of the current room to demote another registered user previously promoted to moderator for the same room.<br />The * option will demote the user from all the rooms.");
define("L_HELP_CMD_30", "The second command does the same as /me but it will show your respective title, according to your profile gender<br />E.g. * ".sprintf(L_HELP_MR, "Ciprian")." is watching TV or * ".sprintf(L_HELP_MS, "Dana")." is happy.");
define("L_HELP_CMD_31", "Change the order users are sorted in lists: by entrance time or alphabetically.");
define("L_HELP_CMD_32", "This is a third (role-playing) version of the dice rolling.<br />Usage: /d{n1}[tn2] or /d{n1};<br />n1 can take any value <b>between 1 and 100</b> (it represents the number of sides per die);<br />n2 can take any value <b>between 1 and %s</b> (it represents the number of rolling dice per throw).");
define("L_HELP_CMD_33", "Change the font size of the messages in chat to user choice (allowed values for n: <b>between 7 and 15</b>); the /size command resets the font size to the default value (<b>".$FontSize."</b>).");
define("L_HELP_CMD_34", "This will allow an user to specify the orientation of a text message (ltr = left-to-right, rtl = right-to-left).");
define("L_HELP_CMD_35", "It allows posting of <i>one video</i> or <i>one audio file</i> in a small Flash player at a time.<br />Usage: Just paste the url of the source to be posted! E.g. <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />You need Shockwave Flash Player installed on your system. The link is case sensitive!<br />HINTS: type /video followed by a space and paste the URL into the box.");
define("L_HELP_CMD_35a", "The second command only works with youtube.com as video source.<br />E.g. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "It allows posting of <i>one youtube video</i> in a small Flash player at a time.<br />Usage: Just paste the url of the source to be posted! E.g. <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />You need Shockwave Flash Player installed on your system. The link is case sensitive!<br />HINTS: type /tube followed by a space and paste the URL into the box.");
define("L_HELP_CMD_VAR", "Synonyms (variants): %s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "Chat Etiquette");
define("L_HELP_ETIQ_2", "Our site would like to keep its community friendly and fun, so please adhere to the following guidelines. If you fail to observe these rules, one of our chat moderators may boot you from the chat.<br /><br />Thank you,");
define("L_HELP_ETIQ_3", "Our Chat Etiquette Guidelines");
define("L_HELP_ETIQ_4", "<li>Do not \"spam\" the chat by typing nonsense or random letters.</li>
<li>Do not use aLtErnAtiNg characters.</li>
<li>Keep ALL CAPS use to a minimum, as it is considered yelling.</li>
<li>Keep in mind that our chat users are from all over the world, and, most likely, you will encounter people of different beliefs. Please be kind and polite to these people.</li>
<li>Do not direct profanity towards other members. In fact, try to steer clear of using profanity and/or swear words altogether.</li>
<li>Do not call other members by their real names that they may not appreciate. Use their nicknames instead.</li>");

// messages frame
define("L_NO_MSG", "There is currently no message ...");
define("L_TODAY_DWN", "The messages sent today start below");
define("L_TODAY_UP", "The messages sent yesterday start below");

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
define("L_WHOIS_OWNER", "Owner");
define("L_WHOIS_TOPMOD", "Top Moderator");
define("L_WHOIS_MODER", "Moderator");
define("L_WHOIS_MODERS", "Moderators");
define("L_WHOIS_OTHERS", "Other users");
define("L_WHOIS_USER", "User");
define("L_WHOIS_GUEST", "Guest");
define("L_WHOIS_REG", "Registered");
define("L_WHOIS_BOT", "Bot");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s entered this room.");
define("L_EXIT_ROM", "%s left this room.");
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
define("L_QUICK", "Quick Menu");

// Topic Banner mod
define("L_TOPIC", "has set the TOPIC to:");
define("L_TOPIC_RESET", "has reset the TOPIC");
define("L_HELP_TOP", "at least two words as topic");
define("L_BANNER_WELCOME", "Welcome to %s!");
define("L_BANNER_TOPIC", "Topic:");
define("L_DEFAULT_TOPIC_1", "This is a default topic. Edit localization/_owner/owner.php to change it!");

// Img cmd mod
define("L_PIC", "Picture posted by");
define("L_PIC_RESIZED", "Resized to");
define("L_HELP_IMG", "full path to the image to be posted");
define("L_NO_IMAGE", "This is not a valid URL of a public remote image.\\nTry again!");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s is no longer a moderator for any room of this chat.");
define("L_IS_NO_MODERATOR", "%s is not a moderator.");
define("L_ERR_IS_ADMIN", "%s is the administrator!\\nYou cannot change his permissions.");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "Extra Commands available:");
define("INFO_MODS", "Extra Features/Mods available:");
define("INFO_BOT", "Our available bot is:");

// Profile mod
define("L_PRO_1", "Spoken languages");
define("L_PRO_1a", "Language");
define("L_PRO_2", "Favorite link 1");
define("L_PRO_3", "Favorite link 2");
define("L_PRO_4", "Description");
define("L_PRO_5", "Picture URL");
define("L_PRO_6", "Name/Text color");

// Avatar mod
define("L_AVATAR", "Avatar");
define("L_ERR_AV", "Invalid URL or non-existing host.");
define("L_TITLE_AV", "Your current avatar: ");
define("L_CHG_AV", "Click \"".L_REG_16."\" in the Profile form<br />to store your Avatar.");
define("L_SEL_NEW_AV", "Select a new Avatar");
define("L_EX_AV", "example");
define("L_URL_AV", "URL: ");
define("L_EXPL_AV", "(Enter URL, then hit ENTER to view)");
define("L_CANCEL", "Cancel");
define("L_AVA_REG", "You must be registered\\nto change your avatar icon");
define("L_SEL_NEW_AV_CONFIRM", "This form was not submitted.\\nGoing now to avatars will make you lose\\nall the changes you made so far!\\n\\nAre you sure?");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "TIPS: Our bot is publicly active in this room. To start talking to the bot, type <b>hello ".C_BOT_NAME."</b>. To end conversation, type: <b>bye ".C_BOT_NAME."</b>. (private: /to <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "TIPS: Our bot is publicly active in %s room. You can only talk private by clicking on it’s name and whispering. (command: /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "TIPS: Our bot is not publicly active. You can only talk private by clicking on it’s name. (commands: /to <b>".C_BOT_NAME."</b> Message or /wisp <b>".C_BOT_NAME."</b> Message)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "Bot is not running in this room!");
define("BOT_START_ERROR", "Bot is already running in this room!");
define("BOT_DISABLED_ERROR", "Bot has been disabled from Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "rolls the dice, the results are:");
define("DICE_WRONG", "You have to select how many dice you want to roll\\n(choose a number between 1 and ".MAX_ROLLS.").\\nJust type /dice to roll all ".MAX_ROLLS." dice.");
define("DICE2_WRONG", "The second value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "The first value has to be between 1 and ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "The first (d) value has to be between 1 and 100.\\nThe second (t) value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dice\\n(e.g. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "open pop-ups on private message");
define("L_REG_POPUP_NOTE", "Your pop-up blocker should be disabled!");
define("L_PRIV_POST_MSG", "Send a private message!");
define("L_PRIV_MSG", "New private message received!");
define("L_PRIV_MSGS", "%s new private messages received!");
define("L_PRIV_MSGSa", "Here are the first 10 messages!<br />Use the bottom link to see the rest.");
define("L_PRIV_MSG1", "From:");
define("L_PRIV_MSG2", "Room:");
define("L_PRIV_MSG3", "To:");
define("L_PRIV_MSG4", "Message:");
define("L_PRIV_MSG5", "Posted:");
define("L_PRIV_REPLY", "Reply");
define("L_PRIV_READ", "Press the ’".L_REG_25."’ button to mark all posts as read!");
define("L_PRIV_POPUP", "You can disable/re-enable anytime this pop-up feature<br />by editing your");
define("L_PRIV_POPUP1", "Profile</a> (only registered users)");
define("L_NOT_ONLINE", "%s is not online right now.");
define("L_PRIV_NOT_ONLINE", "%s is not online right now,\\nbut will still receive your message after login.");
define("L_PRIV_NOT_INROOM", "%s is not in this room.\\nIf you still want to pm this user,\\nuse the command: /wisp %s message.");
define("L_PRIV_AWAY", "%s is marked away,\\nbut will still receive your message\\nwhen will be back.");
define("PM_DISABLED_ERROR", "Whispering (private messaging)\\nhas been disabled in this chat.");
define("L_NEXT_PAGE", "Go to the next page");
define("L_NEXT_READ", "Read the next %s"); // message / 10 messages
define("L_ROOM_ALL", "All rooms");
define("L_PRIV_NO_MSGS", "No private messages received");
define("L_PRIV_READ_MSG", "1 private message received"); //singular
define("L_PRIV_READ_MSGS", "%s private messages received"); //plural
define("L_PRIV_MSGS_NEW", "New");
define("L_PRIV_MSGS_READ", "Read");
define("L_PRIV_MSG6", "Status:");
define("L_PRIV_RELOAD", "Reload page");
define("L_PRIV_MARK_ALL", "Mark all as Read");
define("L_PRIV_MARK_SEL", "Mark selected as Read");
define("L_PRIV_REMOVE", "Remove checked PMs");
define("L_PRIV_PM", "(private)");
define("L_PRIV_WISP", "(whisper)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "Enabled");
define("L_DISABLED", "Disabled");
define("L_COLOR_HEAD_SETTINGS", "Current Settings on this server:");
define("L_COLOR_HEAD_SETTINGSa", "Default colors:");
define("L_COLOR_HEAD_SETTINGSb", "Default color:");
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
define("L_NULL", "Null");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "room’s color");
define("L_PRO_COLOR", "profile’s color");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Only the administrator can use ".COLOR_CA." color!\\n\\nYour text color resets to ".COLOR_CM."!\\n\\nPlease choose any other color.");
define("COL_ERROR_BOX_USRA", "Only the administrator can use ".COLOR_CA." color!\\n\\nDon’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");
define("COL_ERROR_BOX_USRM", "You must be a moderator to use ".COLOR_CM." color!\\n\\nDon’t try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "Welcome to our chat. Please obey the net etiquette while chatting: <I>try to be pleasant and polite</I>.");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "The settings of this server have just been changed. To avoid malfunctions, please reload your browser (press F5 key or Exit and re-enter chat).");

//Size command error by Ciprian
define("L_ERR_SIZE", "The font size value can only be\\nnull (for reset) or between 7 and 15");

// Password reset form by Ciprian
define("L_PASS_0", "Password Resetting form");
define("L_PASS_1", "Secret question");
define("L_PASS_2", "What make was your first car?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "What was your first pet name?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "What is your favorite drink?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "What is your birth date?"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "Secret answer");
define("L_PASS_7", "Reset password");
define("L_PASS_8", "Your password has successfully been reset.");
define("L_PASS_9", "Your new password to enter the chat");
define("L_PASS_10", "Your new password to enter the chat: %s");
define("L_PASS_11", "Welcome back to our chat server!");
define("L_PASS_12", "Choose your question ...");
define("L_ERR_PASS_1", "Wrong username. Choose yours.");
define("L_ERR_PASS_2", "Wrong email. Try again!");
define("L_ERR_PASS_3", "Wrong secret question.<br />Answer to the one shown below!");
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
define("L_OPEN_PUB", "OPEN TO THE PUBLIC");
define("L_CLOSED_PUB", "CLOSED TO THE PUBLIC");

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
define("L_LINKS_10", "to download phpMyChat-Plus");
define("L_LINKS_11", "to check who is chatting");
define("L_LINKS_12", "to open the Chat Login Page");
define("L_LINKS_13", "to send this buzz"); // can also be translated as "to play this sound"
define("L_LINKS_14", "to use this command");
define("L_LINKS_15", "to open");
define("L_LINKS_16", "Smiley Gallery");
define("L_LINKS_17", "to sort ascending");
define("L_LINKS_18", "to sort descending");
define("L_LINKS_19", "to set/modify your Gravatar");
define("L_SWITCH", "Switch to %s"); // E.g. "Switch to Italian" (Country Flags mouseover / Language switching)
define("L_SELECTED", "selected"); // E.g. "French - selected" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "not selected");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "to send email");
define("L_FULLSIZE_PIC", "to open the full size picture");
define("L_PRIVACY", "to read our Privacy Policy");
define("L_AUTHOR", "the author"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "the developer of this chat"); //same here
define("L_OWNER", "the owner of this chat"); //same here
define("L_TRANSLATOR", "the translator"); //same here

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
define("L_HIGHLIGHT", "Highlight/Un-Highlight");
define("L_HIGHLIGHT_SB", "Highlight/Un-Highlight this user’s posts");

//Lurking frame popup
define("L_LURKING_2", "Lurking page");
define("L_LURKING_3", "is lurking");
define("L_LURKING_4", "joined on");
define("L_LURKING_5", "Unknown");

// Extra options by Ciprian
define("L_EXTRA_OPT", "Extra Options");
define("L_ARCHIVE", "Open Archive");
define("L_SOUNDFIX_IE_1", "Sound fix for IE");
define("L_SOUNDFIX_IE_2", "Download a sound fix for IE");
define("L_LURKING_1", "Open the lurking page");
define("L_REG_BRB", "brb (need to register first)");
define("L_DEL_BYE", "don’t wait for me...");
define("L_EXTRA_PRIV1", "Read PMs");
define("L_EXTRA_PRIV2", "New PMs");

// Months Long Names
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
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Apr");
define("L_S_MAY", "May");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Aug");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Oct");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dec");
// Week days Long Names
define("L_MON", "Monday");
define("L_TUE", "Tuesday");
define("L_WED", "Wednesday");
define("L_THU", "Thursday");
define("L_FRI", "Friday");
define("L_SAT", "Saturday");
define("L_SUN", "Sunday");
// Week days Short Names
define("L_S_MON", "Mo");
define("L_S_TUE", "Tu");
define("L_S_WED", "We");
define("L_S_THU", "Th");
define("L_S_FRI", "Fr");
define("L_S_SAT", "Sa");
define("L_S_SUN", "Su");

// Localized date format
if (C_ENGLISH_FORMAT == "UK")
{
// Set the UK specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "English_United Kingdom", "eng-eng.UTF-8", "eng-eng");
} else {
setlocale(LC_ALL, "en_GB.UTF-8", "en_GB.UTF-8@euro", "eng.UTF-8", "uk.UTF-8", "eng_eng.UTF-8", "English-uk.UTF-8"); // For UK formats
}
define("L_SHORT_DATE", "%d/%m/%Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%d/%m/%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LANG", "en_GB");
// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");
define("L_CAL_FORMAT", "%d %B %Y"); // Calendar format
}
elseif (C_ENGLISH_FORMAT == "US")
{
// Set the US specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "English_United States", "eng-usa.UTF-8", "eng-usa");
} else {
setlocale(LC_ALL, "en_US.UTF-8", "enu.UTF-8", "usa.UTF-8", "enu_enu.UTF-8", "English-usa.UTF-8"); // For American formats
}
define("L_SHORT_DATE", "%m/%d/%Y"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%m/%d/%Y %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LANG", "en_US");
// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "0");
define("L_CAL_FORMAT", "%B %d, %Y"); // Calendar format
}
define("ISO_DEFAULT", "iso-8859-1");
define("WIN_DEFAULT", "windows-1252");
define("L_LONG_DATE", "%A, %d of %B %Y"); //Change this to your local desired format (keep the long form)
define("L_LONG_DATETIME", "%A, %d of %B %Y %H:%M:%S"); //Change this to your local desired format (keep the short form)

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12).".'; return true;\" TARGET=_blank>");
define("NB_USERS_IN","users are ".LOGIN_LINK."chatting</A> at this time.");
define("USERS_LOGIN","1 user is ".LOGIN_LINK."chatting</A> at this time.");
define("NO_USER","Nobody is ".LOGIN_LINK."chatting</A> at this time.");
define("L_PRIV_REPLY_LOGIN", "Login to chat if you wish to ".LOGIN_LINK."post a reply</A> to any of the unread PMs listed above");

// Language names
define("L_LANG_AR", "Argentinean Spanish");
define("L_LANG_BG", "Bulgarian - Cyrillic");
define("L_LANG_BR", "Brazilian Portuguese");
define("L_LANG_CA", "Catalan");
define("L_LANG_CZ", "Czech");
define("L_LANG_DA", "Danish");
define("L_LANG_DE", "German");
define("L_LANG_EN", "English"); // for admin panel only
define("L_LANG_ENUK", "English UK"); // for UK formats and flags
define("L_LANG_ENUS", "English US"); // for US formats and flags
define("L_LANG_ES", "Spanish");
define("L_LANG_FA", "Persian (Farsi)");
define("L_LANG_FI", "Finnish");
define("L_LANG_FR", "French");
define("L_LANG_GR", "Greek");
define("L_LANG_HE", "Hebrew");
define("L_LANG_HI", "Hindi (Devanagari)");
define("L_LANG_HU", "Hungarian");
define("L_LANG_ID", "Indonesian (Bahasa)");
define("L_LANG_IT", "Italian");
define("L_LANG_JA", "Japanese (Kanji)");
define("L_LANG_KA", "Georgian");
define("L_LANG_NB", "Norwegian (Bokmål)");
define("L_LANG_NN", "Norwegian (Nynorsk)");
define("L_LANG_NE", "Nepali");
define("L_LANG_NL", "Dutch");
define("L_LANG_PL", "Polish");
define("L_LANG_PT", "Portuguese");
define("L_LANG_RO", "Romanian");
define("L_LANG_RU", "Russian - Cyrillic");
define("L_LANG_SK", "Slovak");
define("L_LANG_SRC", "Serbian - Cyrillic");
define("L_LANG_SRL", "Serbian - Latin");
define("L_LANG_SV", "Swedish");
define("L_LANG_TH", "Thai");
define("L_LANG_TR", "Turkish");
define("L_LANG_UK", "Ukrainian - Cyrillic");
define("L_LANG_UR", "Urdu");
define("L_LANG_VI", "Vietnamese");
define("L_LANG_YO", "Yoruba"); // Nigeria&Congo language

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
define("L_ASC", "Ascending");
define("L_DESC", "Descending");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "Total visits");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "use the Gravatar");

// Uploader mod by Ciprian
define("L_UPLOAD", "Upload %s");
define("L_UPLOAD_IMG", "Image file");
define("L_UPLOAD_SND", "Sound file");
define("L_UPLOAD_FLS", "Files");
define("L_UPLOAD_SUCCESS", "%s successfully uploaded as %s.");
define("L_FILES_TITLE", "Uploads Management");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "Restricted");
define("L_RESTRICTED_ROM", "%s has successfully been restricted from this room.");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "Sign In with an OpenID");
define("L_OPID_REG", "Import your OpenID profile");

// Support buttons
define("L_SUPP_WARN", "You have chosen to contribute to the free development of\\n".APP_NAME." by making a donation to the developer.\\nThank you for your support!\\n\\nNote: the recipient is not the owner of this chat.\\nPlease enter the amount on the next page.\\n\\nContinue?");
define("L_SUPP_ALT", "Support with PayPal the development of ".APP_NAME." - it's Fast, Free and Secure!");

// Video & Audio & Youtube cmds (Embevi & YouTube player class)
define("L_AUDIO", "Audio file posted by");
define("L_VIDEO", "Video posted by");
define("L_HELP_VIDEO", "full path to the video or audio source to be posted");
define("L_NO_VIDEO", "The URL cannot be embedded.\\nThis is not a valid URL of an accepted public video or audio source.\\nTry again!");
define("L_ORIG_VIDEO", "to open the original source site");

// Birthday mod - by Ciprian
define("L_PRO_7", "Date of birth");
define("L_PRO_8", "show birthday in public information");
define("L_PRO_9", "show age in public information");
define("L_PRO_10", "Age");
define("L_PRO_11", "%1\$d years, %2\$d months and %3\$d days");
define("L_DOB_TIT_1", "Birthdays list");
$L_DOB_SUBJ = "Happy Birthday %s!";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_MATH", "Equation posted by %s:");
?>