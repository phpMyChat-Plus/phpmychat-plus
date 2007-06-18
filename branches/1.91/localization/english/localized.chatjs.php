<?php
// File : english/localized.chatjs.php - plus version (27.05.2007 - rev.1)
// Original file by Nicolas Hoizey <nhoizey@phpheaven.net>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>
// Splitted from localized.chat.php for Javascript UTF-8 compatibility by Ciprian Murariu <ciprianmp@yahoo.com>

// error messages
define("L_ERR_USR_11", "You must be administrator.");
define("L_ERR_USR_13", "To create your own room you must be registered.");
define("L_ERR_USR_16", "Only these extra-characters allowed:\\n".$REG_CHARS_ALLOWED."\\nSpaces, commas or backslashes (\\) not allowed.\\nCheck the sintax.");
define("L_ERR_USR_17", "This room doesn't exist, and you are not allowed to create one.");
define("L_ERR_USR_19", "You cannot be in more than one room at the same time.");
define("L_ERR_USR_22", "This command is not available for\\nthe browser you use (IE engine).");
define("L_ERR_USR_27", "You cannot talk private to yourself.\\nDo that in your mind please...\\nNow choose a different username.");
define("L_ERR_ROM_1", "Room's name cannot contain commas or backslashes (\\).");
define("L_ERR_ROM_2", "Banished word found in the room's name you want to create.");
define("L_ERR_ROM_3", "This room already exists as a public one.");
define("L_ERR_ROM_4", "Invalid room name.");

// input frame
define("L_BAD_CMD", "This is not a valid command!");
define("L_ADMIN", "%s is already the administrator!");
define("L_IS_MODERATOR", "%s is already a moderator!");
define("L_NO_MODERATOR", "Only a moderator of this room can use this command.");
define("L_NONEXIST_USER", "%s isn't in the current room.");
define("L_NONREG_USER", "%s isn't registered.");
define("L_NONREG_USER_IP", "His IP is: %s.");
define("L_NO_KICKED", "%s is a moderator or the administrator and can't be kicked away.");
define("L_NO_BANISHED", "%s is a moderator or the administrator and can't be banished.");
define("L_SVR_TIME", "Server time: ");
define("L_NO_SAVE", "No message to save!");
define("L_NO_ADMIN", "Only the administrator can use this command.");
define("L_NO_REG_USER", "You must be registered on this chat to use this command.");

// Demote command by Ciprian
define("L_IS_NO_MODERATOR", "%s is not a moderator.");
define("L_ERR_IS_ADMIN", "%s is the administrator!\\nYou cannot change his permissions.");

// PlusBot bot mod (based on Alice bot)
define("BOT_STOP_ERROR", "Bot is not running in this room!");
define("BOT_START_ERROR", "Bot is already running in this room!");
define("BOT_DISABLED_ERROR", "Bot has been disabled from Admin Panel!");

// Dice v.1, v.2 and v.3 modes
define("DICE_WRONG", "You have to select how many dices you want to roll\\n(Choose a number between 1 and ".MAX_ROLLS.").\\nJust type /dice to roll all ".MAX_ROLLS." dices.");
define("DICE2_WRONG", "The second value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dices\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE2_WRONG1", "The first value has to be between 1 and ".MAX_DICES.".\\n(e.g. /".MAX_DICES."d or /".MAX_DICES."d".MAX_ROLLS.").");
define("DICE3_WRONG", "The second value has to be between 1 and ".MAX_ROLLS.".\\nLeave it empty to use all ".MAX_ROLLS." dices\\n(e.g. /d50 or /d100t".MAX_ROLLS.").");

// Private Message Popup mod by Ciprian
define("L_NOT_ONLINE", "%s is not online right now.");
define("L_PRIV_NOT_ONLINE", "%s is not online right now,\\nbut will still receive your message after login.");
define("L_PRIV_NOT_INROOM", "%s is not in this room.\\nIf you still want to pm this user,\\nuse the command: /wisp %s message.");
define("L_PRIV_AWAY", "%s is marked away,\\nbut will still receive your message\\nwhen will be back.");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "Only the administrator can use ".COLOR_CA." color!\\n\\nYour text color resets to ".COLOR_CM."!\\n\\nPlease choose any other color.");
define("COL_ERROR_BOX_USRA", "Only the administrator can use ".COLOR_CA." color!\\n\\nDon't try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");
define("COL_ERROR_BOX_USRM", "You must be a moderator to use ".COLOR_CM." color!\\n\\nDon't try to use ".COLOR_CA.", ".COLOR_CA1.", ".COLOR_CM." or ".COLOR_CM1.".\\n\\nThese are reserved to power users!\\n\\nYour text color resets to ".COLOR_CD."!\\n\\nPlease choose any other color.");

//PM control by Ciprian
define("PM_DISABLED_ERROR", "Whispering (private messaging)\\nhas been disabled in this chat.");

//Size command error by Ciprian
define("L_ERR_SIZE", "The font size value can only be\\nnull (for reset) or between 7 and 15");

// Week days for status worldtime by Ciprian
define("L_MON", "Mo"); //Monday
define("L_TUE", "Tu"); //Tuesday
define("L_WED", "We"); //Wednesday
define("L_THU", "Th"); //Thursday
define("L_FRI", "Fr"); //Friday
define("L_SAT", "Sa"); //Saturday
define("L_SUN", "Su"); //Sunday
?>