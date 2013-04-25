<?php
// File : english/localized.config.php - plus version (17.02.2013 - rev.1)
// First version is based on the work of Marco Gelli Marchese <mvmcgm@gmail.com> for the Brasilian version
// Original English file by Ciprian Murariu <ciprianmp@yahoo.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

//Configuration Global used variables
define("A_CONFSAVE", "Save Changed Settings");
define("A_CONFOPTIONAL", "Optional");
define("A_CONFREQUIRED", "Required");
define("A_CONFNOTSEND", "Don’t send");
define("A_CONFSEND", "Send");
define("A_CONFUNRESTRICT", "Unrestricted");
define("A_CONFRESTRICT", "Restricted");
define("A_CONFHIDE", "Hide");
define("A_CONFSHOW", "Show");
define("A_CONFHINT", "Hint: %s");
define("A_CONFIMPORTANT", "Important: %s");
define("A_CONFNOTE", "Note: %s");
define("A_CONFHERE", "here");
define("A_CONFWIDTH", "Width");
define("A_CONFHEIGHT", "Height");
define("A_CONFPX", "px."); #pixels
define("A_CONFBOT", "Bot");
define("A_CONFRDQ", "Random Quote");

//Navigation Menu
define("A_CONF_0", "General Settings");
define("A_CONF_1", "Chat Server data");
define("A_CONF_2", "Languages");
define("A_CONF_3", "Owner data");
define("A_CONF_4", "Registration");
define("A_CONF_5", "Functionality");
define("A_CONF_6", "Timings");
define("A_CONF_7", "Chat Schedule");

define("A_CONF_26", "Interface");
define("A_CONF_8", "Login layout");
define("A_CONF_9", "Rooms & Skins");
define("A_CONF_10", "Colors");
define("A_CONF_11", "Sound settings");
define("A_CONF_12", "Profanity");
define("A_CONF_13", "Uploads Management");

define("A_CONF_14", "Features & Mods");
define("A_CONF_15", "Private messaging");
define("A_CONF_16", "Bot settings");
define("A_CONF_17", "Commands");
define("A_CONF_18", "Multimedia");
define("A_CONF_19", "Quick Menus");
define("A_CONF_20", "Avatars & Gravatars");
define("A_CONF_21", "Logging Mod");
define("A_CONF_22", "Lurking Mod");
define("A_CONF_23", "Random Quote");
define("A_CONF_24", "Ghost Control");
define("A_CONF_25", "Birthday Mod");

define("A_CONF_27", "Help & Support");
define("A_CONF_28", "Download page");
define("A_CONF_29", "Mirror page");
define("A_CONF_30", "Project page");
define("A_CONF_31", "Project SVN page");
define("A_CONF_32", "Support Group page");
define("A_CONF_33", "Read %s Release notes"); //%s = version
define("A_CONF_35", "%s Download"); //%s = version
define("A_CONF_36", "FAQ Online");
define("A_CONF_37", "Try me server");
define("A_CONF_38", "Submit your feedback");
define("A_CONF_39", "Wish to donate?");
define("A_CONF_40", "Released on:\\n%s"); //%s = date
define("A_CONF_41", "Plus Developer: %s"); //%s = developer name
define("A_CONF_42", "Big thanks to all the contributors\\nto the phpHeaven Team work\\nand the phpMyChat groups on\\nYahoo! and Sourceforge.\\n\\nThank you for using our work!");
define("A_CONF_43", "What is this?");
define("A_CONF_44", "About Plus");

define("A_CONF_46", "Home");
define("A_CONF_46a", "Scroll home");
define("A_CONF_47", "Save");
define("A_CONF_47a", "Jump to save button");

//Content - Errors Success
define("A_CONF_ERR_1", "Configuration Settings Changed Successfully!");
define("A_CONF_ERR_2", "Don’t forget to change remotely the name of %s directory to %s<br />(and set its attributes to <b>777</b>)"); // %s = folder names (old|new)
define("A_CONF_ERR_3", "Download the %s update from %s."); //%s = version | here (url)
define("A_CONF_ERR_4", "Download the %s update"); //%s = version
define("A_CONF_ERR_5", "These settings were last saved on %s by %s!");  //%s = date | admin username
define("A_CONF_ERR_6", "You must type a name for your %s!"); //%s = Bot/Quote word
define("A_CONF_ERR_7", "Only these extra-characters allowed:");
define("A_CONF_ERR_8", "Spaces, commas or backslashes (\\) not allowed.<br />Check the syntax of the %s name %s!"); //%s = Bot/Quote word | (Bot/Quote names)
define("A_CONF_ERR_9", "Banished word found in the %s name %s!"); //%s = Bot/Quote word | (Bot/Quote names)
define("A_CONF_ERR_10", "The name of your %s %s is already registered.<br />Choose another name!"); //%s = Bot/Quote word | (Bot/Quote names)
define("A_CONF_ERR_11", "If you change this setting while there are users logged in, all your users must reload their browsers or exit and re-login. An announcement to all the rooms will be automatically sent if you enable/disable this.");

//Content - Title
define("A_CONFTITLE_0", "Configuration Page");
define("A_CONFTITLE_1", "Configuration Options");
define("A_CONFTITLE_2", "Current Settings");

//Content - Chat Server Data
define("A_CONFCONTENT_1", "Enable automatic checking for online updates on the servers.");
define("A_CONFCONTENT_2", "The script can automatically check up for new releases on: ciprianmp.com/latest/ or svn.sourceforge.net!");
define("A_CONFCONTENT_3", "Enable Statistics in chat.");
define("A_CONFCONTENT_4", "If your server bandwidth is really limited or you notice overloading of your server, you had better disable this mod!");
define("A_CONFCONTENT_5", "Clean-up time for old messages.");
define("A_CONFCONTENT_7", "Autoboot time for inactive users in rooms.");
define("A_CONFCONTENT_8", "This autoboot feature forces users to be active in rooms. If they want to be lurking, they should just use the lurking page. Admins, moderators and away users won’t be booted.");
define("A_CONFCONTENT_10", "Delete registered users accounts not active in this interval (0 for never).");

//Content - Languages
define("A_CONFCONTENT_12", "Default Language for Chatroom.");
define("A_CONFCONTENT_12a", "Language Flag selector");
define("A_CONFCONTENT_13", "English format (for flags and date&time formats).");
define("A_CONFCONTENT_13a", "English locale formats");
define("A_CONFCONTENT_14", "Allow users to choose a language from the available translations.");
define("A_CONFCONTENT_14_1", "Default only");
define("A_CONFCONTENT_14_2", "All available");
define("A_CONFCONTENT_15", "Flags images type.");
define("A_CONFCONTENT_15a", "Flags format");
define("A_CONFCONTENT_15b", "2D (std)");
define("A_CONFCONTENT_15c", "3D (new)");

//Content - Owner data
define("A_CONFCONTENT_16", "Enter admin real name (or chat name) to be sent on email headers.");
define("A_CONFCONTENT_17", "Enter admin email to be sent on email headers.");
define("A_CONFCONTENT_18", "also to receive notifications on new user registration.");
define("A_CONFCONTENT_19", "Enter your chat URL to be sent on email headers.");
define("A_CONFCONTENT_20", "Enter your Default Closing Greeting for your emails.");
define("A_CONFCONTENT_21", "This is used only by admins in the \"".A_MENU_4."\" sheet.");
define("A_CONFCONTENT_22", "Public Name of your chat server as you wish to be known on the web.");
define("A_CONFCONTENT_23", "Path to the LOGO image.");
define("A_CONFCONTENT_23_1", "Hide Logo");
define("A_CONFCONTENT_23_2", "Show Logo");
define("A_CONFCONTENT_24", "Logo image to display (absolute or relative paths allowed) - e.g. http://path_to_the_image.jpg or ./../path_to_the_image.jpg");
define("A_CONFCONTENT_25", "(path_to_the_image.jpg can be any image accessible on/from the web - .jpg, .gif, .bmp, .png)");
define("A_CONFCONTENT_26", "URL to be opened by LOGO (opens in new window).");
define("A_CONFCONTENT_27", "Text to be displayed by LOGO on MouseOver (the ALT/TITLE property).");

//Content - Registration
define("A_CONFCONTENT_28", "Allow Registration for your chat.");
define("A_CONFCONTENT_29", "Disable this only if you want to add the registered users manually, or read the <a href=#reg_hint class=\"ChatLink\">Hint</a> below to make it automatically, but waiting for your approval.");
define("A_CONFCONTENT_30", "Require Registration to join chat.");
define("A_CONFCONTENT_31", "First and Last names required on registration and profiles.");
define("A_CONFCONTENT_32", "Automatically generate Password (and email it to new registered users).");
define("A_CONFCONTENT_33", "Length of the Password to be generated and sent by email.");
define("A_CONFCONTENT_34", "Send account details to the new registered user.");
define("A_CONFCONTENT_35", "Send account details (notifications) to admin on new user registration.");
define("A_CONFCONTENT_37", "for the best settings if you want to control who registers and gets into your chat:");
define("A_CONFCONTENT_38", "Allow Registration for your chat:");
define("A_CONFCONTENT_39", "Require Registration to join chat: if %s is set, only the registered users will be able to login to chat"); // %s = Required
define("A_CONFCONTENT_41", "Generate and email Password to new registered users:");
define("A_CONFCONTENT_42", "Send account details to the new registered user:");
define("A_CONFCONTENT_43", "Send account details (notifications) to admin on new user registration:");
define("A_CONFCONTENT_44", "As a result, the user will choose his desired data, a random password will be generated, but the user will not receive the email with the password, so he still cannot login; he will only get a notifying email about the pending registration.");
define("A_CONFCONTENT_45", "In the same time, the admin will receive <u>2 emails</u>:");
define("A_CONFCONTENT_46", "1<sup>st</sup> - is a copy of the registration data, for admin’s future reference (like when the user forgets the password). This email is always sent in English;");
define("A_CONFCONTENT_47", "2<sup>nd</sup> - is the email which contains the generated password and rest of the data for the new created account (this email is already prepared to be sent/forwarded to the user, if the account is approved). This email it will be written in the language the user has chosen on registration/profile.");
define("A_CONFCONTENT_48", "The admin verifies who is the person, what data did the user provide. If he decides to approve that user account, admin will just have to forward the second email to that user’s email (the email is already formatted for approval). Another way is to go to %s and send an email with the login data to that user’s email. Optionally, the admin can even login with that name/password in the \"".L_REG_4."\" form and adjust/change the data/password."); //%s = tab name
define("A_CONFCONTENT_50", "Don’t forget to put your right admin email %s, in order to have all these to work. Also keep into account that these settings will turn your chat server into a non-public one (restrictive, private). If you fail to verify and approve the account in time, your neglected user might just give up on coming back."); //%s = here (url)

//Content - Functionality
define("A_CONFCONTENT_53", "Enable banishment feature and define the delay for it.");
define("A_CONFCONTENT_54", "0 = disabled, any integer = day(s) for banishment");
define("A_CONFCONTENT_55", "Banishment type.");
define("A_CONFCONTENT_56", "ban by IP and username simultaneously or only by IP.");
define("A_CONFCONTENT_57", "- First option will only ban the username from a shared IP, useful when the banned user comes from a shared IP or for parental control purposes (e.g. when a shared computer/access point is used by a child);");
define("A_CONFCONTENT_58", "- The second option will ban all the usernames trying to login from the same IP (more effective).");
define("A_CONFCONTENT_59", "By IP and Username");
define("A_CONFCONTENT_60", "Only by IP");
define("A_CONFCONTENT_61", "Use graphical smilies in messages.");
define("A_CONFCONTENT_62", "No smilies");
define("A_CONFCONTENT_63", "Show smilies");
define("A_CONFCONTENT_64", "Keep HTML tags in messages.");
define("A_CONFCONTENT_65", "<b>simple</b>: keep bold, italic and underline tags; <b>none</b>: keep none");
define("A_CONFCONTENT_66", "Simple");
define("A_CONFCONTENT_67", "None");
define("A_CONFCONTENT_68", "Show discarded HTML tags.");
define("A_CONFCONTENT_69", "Remove discarded tags");
define("A_CONFCONTENT_70", "Show discarded tags");
define("A_CONFCONTENT_71", "Enable posted links protection by opening links in a popup window.");
define("A_CONFCONTENT_72", "if enabled, an extra window will be opened with a list of all the links posted in a message by an user. This option can assure extra protection to your chat rooms.");
define("A_CONFCONTENT_73", "Open links directly from chat");
define("A_CONFCONTENT_74", "Open links in a popup first");
define("A_CONFCONTENT_75", "Default messages scroll order.");
define("A_CONFCONTENT_76", "(only for \"non-H\" browsers - other than IE or Firefox)");
define("A_CONFCONTENT_77", "those users can also use \"/order\" command to change this behavior.");
define("A_CONFCONTENT_78", "Last on Top");
define("A_CONFCONTENT_79", "Last on Bottom");
define("A_CONFCONTENT_80", "Default number of messages to display on first entrance.");
define("A_CONFCONTENT_81", "never set this to <b>\"0\"</b>; You can set it to minimum <b>\"1\"</b> but then you have to enable at least one of the <b>next two settings</b>.<br />If you want to keep both set to \"Notify\" and \"Show\", the value here <b>must be at least \"2\"</b>.");
define("A_CONFCONTENT_82", "users can also use /show \"n\" or /last \"n\" commands to view a different amount.");
define("A_CONFCONTENT_83", "Show notifications on every user entrance/exit in Chat rooms.");
define("A_CONFCONTENT_84", "No notification");
define("A_CONFCONTENT_85", "Notify room");
define("A_CONFCONTENT_86", "Display a Welcome Message when user enters chatroom.");
define("A_CONFCONTENT_87", "No welcome message");
define("A_CONFCONTENT_88", "Show welcome message");
define("A_CONFCONTENT_89", "Number of smilies on a row in tutorial/help.");
define("A_CONFCONTENT_90", "Number of smilies on a row in smilie_popup.");
define("A_CONFCONTENT_91", "Display the Chat Etiquette on top of the Help popup (Chat rules).");
define("A_CONFCONTENT_92", "Hide Etiquette");
define("A_CONFCONTENT_93", "Show Etiquette");
define("A_CONFCONTENT_94", "Exit link type");
define("A_CONFCONTENT_96", "Exit link");
define("A_CONFCONTENT_97", "Door rolling");
define("A_CONFCONTENT_95", "\"".A_CONFCONTENT_96."\" stands for the original Exit link, \"".A_CONFCONTENT_97."\" stands for the image of such a door.");
define("A_CONFCONTENT_98", "Set the characters you wish your users to be allowed to use on registration/login.");
define("A_CONFCONTENT_99", "This is the default set of chars: %s tested for login, which will not break the layout/functionality of your chat."); //%s = list of allowed characters
define("A_CONFCONTENT_101", "Do not allow these characters, as they will break your chat page after login: exclamation mark, slash, backslash, comma, space, single and double quotes and square (box) brackets (<b>! / \ , ' \" [ ]</b>).");
define("A_CONFCONTENT_102", "Although they will not break anything, it seems that / and ; cannot be banned from being used in login names. $ sign hasn’t been deeply tested, but it should be also avoided as it usually stands for php variables.");

//Content - Timings
define("A_CONFCONTENT_103", "Timezone offset and World time in Status bar.");
define("A_CONFCONTENT_104", "- the difference between the server time and the desired location for the Chat (integer)");
define("A_CONFCONTENT_105", "Example: If my server is hosted in USA - CST (-6) but the chat is for a Romanian community located in Bucharest - EET (+2), I might wish to show my Romanian users the correct time in the chat. For this, I have to set this value to 8. Negative values are also allowed.");
define("A_CONFCONTENT_106", "Edit \"lib/worldtime.lib.php\" to add your own cities (meridians) - only for World time mode!");
define("A_CONFCONTENT_107", "Server time only (standard)");
define("A_CONFCONTENT_108", "World time in Chat only (new)");
define("A_CONFCONTENT_109", "World time on Index & Chat");
define("A_CONFCONTENT_110", "Show Timestamp in front of the message.");
define("A_CONFCONTENT_111", "(also shows the Server Time in the Status bar)");
define("A_CONFCONTENT_112", "No timestamps in chat");
define("A_CONFCONTENT_113", "Show timestamps in chat");
define("A_CONFCONTENT_114", "Default timeout between each update.");
define("A_CONFCONTENT_116", "Returning visitors counter.");
define("A_CONFCONTENT_117", "It will count how many times a registered user returned to chat, displaying the counter on his profile page - whois popup.");
define("A_CONFCONTENT_118", "No counter on Profiles");
define("A_CONFCONTENT_119", "Count on Every login");
define("A_CONFCONTENT_120", "One count per Hour");
define("A_CONFCONTENT_121", "One count per Day");
define("A_CONFCONTENT_122", "One count per Week");

//Content Chat Schedule
define("A_CONFCONTENT_123", "Open times Schedule for your chat and chatrooms.");
define("A_CONFCONTENT_124", " This mod is still under development! The schedule fields have deliberately been disabled.");
define("A_CONFCONTENT_125", "Daily schedule:");
define("A_CONFCONTENT_126", "Sunday schedule:");
define("A_CONFCONTENT_127", "Monday schedule:");
define("A_CONFCONTENT_128", "Tuesday schedule:");
define("A_CONFCONTENT_129", "Wednesday schedule:");
define("A_CONFCONTENT_130", "Thursday schedule:");
define("A_CONFCONTENT_131", "Friday schedule:");
define("A_CONFCONTENT_132", "Saturday schedule:");
define("A_CONFCONTENT_132a", "Scheduled");

//Content Login Layout
define("A_CONFCONTENT_133", "Fill in the background of the login page.");
define("A_CONFCONTENT_134", "Background unfilled");
define("A_CONFCONTENT_135", "Background filled");
define("A_CONFCONTENT_136", "Display a BACKGROUND image on index page.");
define("A_CONFCONTENT_137", "to fill the rooms background with an image, you need to edit the desired style and add in BODY.frame and.framePreview the property \"<b>background-image: url(\"path_to_the_image\");</b>\" (absolute or relative paths allowed) - e.g. http://path_to_the_image.jpg or ./../path_to_the_image.jpg - sample in style12.css.php. Optionally, BODY.mainframe can be used to display an image background to the messages frame (but this image has to be washed out, to make the posted text viewable).");
define("A_CONFCONTENT_138", "(path_to_the_image.jpg can be any image accessible on/from the web - .jpg, .gif, .bmp, .png)");
define("A_CONFCONTENT_139", "No background image");
define("A_CONFCONTENT_140", "Show on Login page");
define("A_CONFCONTENT_141", "Image path:");
define("A_CONFCONTENT_142", "Show Delete link on index.");
define("A_CONFCONTENT_143", "(to allow users delete their own profile)");
define("A_CONFCONTENT_144", "Hide Delete link");
define("A_CONFCONTENT_145", "Show Delete link");
define("A_CONFCONTENT_146", "Show Administration link on index.");
define("A_CONFCONTENT_147", "(a link to open this Administration Panel)");
define("A_CONFCONTENT_148", "Hide Admin link");
define("A_CONFCONTENT_149", "Show Admin link");
define("A_CONFCONTENT_150", "Display the Tutorial link on index page.");
define("A_CONFCONTENT_151", "Hide tutorial");
define("A_CONFCONTENT_152", "Show tutorial");
define("A_CONFCONTENT_153", "Enable Info on index page.");
define("A_CONFCONTENT_154", "(contains some info about the chat extra-features)");
define("A_CONFCONTENT_155", "Hide Info");
define("A_CONFCONTENT_156", "Show Info");
define("A_CONFCONTENT_157", "Display Extra commands available.");
define("A_CONFCONTENT_158", "Hide Extra commands");
define("A_CONFCONTENT_159", "Show Extra commands");
define("A_CONFCONTENT_160", "List your extra commands.");
define("A_CONFCONTENT_161", "keep the first break and use it anytime to split the lines if they are too long.");
define("A_CONFCONTENT_162", "Display Other Extra features/mods available.");
define("A_CONFCONTENT_163", "Hide Extra features");
define("A_CONFCONTENT_164", "Show Extra features");
define("A_CONFCONTENT_165", "List your extra features/mods.");
define("A_CONFCONTENT_167", "Display the name of your bot (if available).");
define("A_CONFCONTENT_168", "Hide bot name");
define("A_CONFCONTENT_169", "Show bot name");
define("A_CONFCONTENT_170", "Show counter (visitor hits) on index page.");
define("A_CONFCONTENT_171", "Disable counter");
define("A_CONFCONTENT_172", "Show counter");
define("A_CONFCONTENT_173", "Show info about the owner/webmaster of the chat on index page (below the copyright link).");
define("A_CONFCONTENT_174", "It is the same name/text you entered in the registration section");
define("A_CONFCONTENT_175", "Admin name");
define("A_CONFCONTENT_176", "Hide Owner");
define("A_CONFCONTENT_177", "Show Owner");
define("A_CONFCONTENT_178", "Edit the installation date of your chat.");

//Content Rooms & Skins
define("A_CONFCONTENT_179", "Enable Skin mod in rooms.");
define("A_CONFCONTENT_181", "If disabled, Skin1 becomes the default (set in the First Public Room above). If enabled, each room can be set to have it’s own skin.");
define("A_CONFCONTENT_182", "Default Skin Only");
define("A_CONFCONTENT_183", "Skin Mod Enabled");
define("A_CONFCONTENT_184", "Skins Preview Page");
define("A_CONFCONTENT_185", "Types of Rooms Available for users.");
define("A_CONFCONTENT_186", "only the first room within the public default ones;");
define("A_CONFCONTENT_187", "all default rooms, but not create a room;");
define("A_CONFCONTENT_188", "all the rooms and create new ones.");
define("A_CONFCONTENT_189", "Only the first room");
define("A_CONFCONTENT_190", "All default rooms");
define("A_CONFCONTENT_191", "Create new rooms");
define("A_CONFCONTENT_192", "First Public room name (also <u>default</u> if 0 is selected above or there is no user selection from list).");
define("A_CONFCONTENT_193", "although disabling is possible, this first room should be enabled and unrestricted at all times. (this is also the default room for people not selecting one from login page.)");
define("A_CONFCONTENT_194", "(for all the public rooms) If restricted, although the room is public, only admins, topmoderators and users set in the \"".A_MENU_1."\" sheet will be able to join this room. Also the lurking page and public archives will not contain any of the posts submitted to restricted rooms.");
define("A_CONFCONTENT_195", "Second Public room name.");
define("A_CONFCONTENT_196", "Third Public room name.");
define("A_CONFCONTENT_197", "Forth Public room name.");
define("A_CONFCONTENT_198", "Fifth Public room name.");
define("A_CONFCONTENT_199", "First Private room name.");
define("A_CONFCONTENT_200", "This is displayed on login, only to admins.");
define("A_CONFCONTENT_201", "Second Private room name (also default if none selected).");
define("A_CONFCONTENT_203", "Third Private room name.");
define("A_CONFCONTENT_204", "This is displayed on login to all power users (fits for \"staff only\" rooms).");
define("A_CONFCONTENT_205", "Fourth Private room name.");
define("A_CONFCONTENT_206", "This is displayed by default on login to all users (fits for \"support\" like rooms).");
define("A_CONFCONTENT_207", "Show Default Private rooms on index page.");
define("A_CONFCONTENT_208", "Not all the private rooms will be shown as options for all the users (see next two settings).");
define("A_CONFCONTENT_209", "This option will just let the <b>admins</b> see all default private rooms, but it is <u><b>required</b></u> for the next two settings to work.");
define("A_CONFCONTENT_210", "Show Default Private rooms on index page to MODERATORS.");
define("A_CONFCONTENT_211", "Moderators will only see rooms 8 and 9 (Staff and Support types).");
define("A_CONFCONTENT_212", "Setting no.1 is required!");
define("A_CONFCONTENT_213", "Show Default Private rooms on index page to NORMAL USERS.");
define("A_CONFCONTENT_214", "Non-power users (including guests) will only see room 9 (Support).");

//Content Colors
define("A_CONFCONTENT_216", "Enable different Colored Names in users lists and/or posts.");
define("A_CONFCONTENT_219", "Italicize Power usernames in users lists.");
define("A_CONFCONTENT_218", "If enabled, users can set their personal color to use for their usernames in users lists only.<br />If disabled, admins will be shown in <a class=\"admin\">red</a> and moderators in <a class=\"mod\">blue</a> (their default power colors in skins/styleN.css.php), only if \"".A_CONFCONTENT_219."\" is enabled below.");
define("A_CONFCONTENT_220", "This option allows you to choose between showing or not who is admin and moderator in your chat (this doesn’t change any powers, it only makes admin/moder names different or not - italics - from regular users).");
define("A_CONFCONTENT_221", "This also applies to color names, showing or not admins in <a class=\"admin\">red</a> and moderators in <a class=\"mod\">blue</a> (their default power colors in skins/styleN.css.php) or, if Colored Names are enabled above, %s and %s (their default power colors chosen below)."); //%s = red | blue
define("A_CONFCONTENT_224", "Don’t show italics/colors");
define("A_CONFCONTENT_225", "Show italics/colors");
define("A_CONFCONTENT_226", "Set Power users to post tagged text:");
define("A_CONFCONTENT_227", "This option allows you to Set Power users to be able to post tagged text (bold, italic, underline or any combination of them).");
define("A_CONFCONTENT_228", "It only works if the setting above is set to \"".A_CONFCONTENT_225."\". Only B, I or/and U are allowed (case insensitive). Any other letters/characters will not be saved. Values must be separated by commas (if more than one).");
define("A_CONFCONTENT_229", "Example: b,i,u (or b,i or b or u,b)");
define("A_CONFCONTENT_230", "Color filters in posts.");
define("A_CONFCONTENT_231", "If enabled, all the users can use any color, if not, they can use all except the power colors set below.");
define("A_CONFCONTENT_232", "Set the Power Colors to be used only by admins (first as default).");
define("A_CONFCONTENT_233", "This applies to the posted messages’ colors mainly, but if Colored Names are enabled above, it will also apply to the names colors.");
define("A_CONFCONTENT_234", "Set the Power Colors to be used only by moderators (first as default).");
define("A_CONFCONTENT_236", "Admins will also be able to use these colors, but no other users.");
define("A_CONFCONTENT_237", "Allow guests to use colors.");
define("A_CONFCONTENT_238", "If disabled, unregistered users will only use the default color for that room in their posts. This will encourage them to register (hopefully).");
define("A_CONFCONTENT_239", "Disallow colors for Guests");
define("A_CONFCONTENT_240", "Allow colors for Guests");

//Content Sound Settings
define("A_CONFCONTENT_241", "Play a sound on entrance.");
define("A_CONFCONTENT_242", "Notify the entire room");
define("A_CONFCONTENT_243", "Welcome only the user");
define("A_CONFCONTENT_244", "Notify & Welcome (1&2)");
define("A_CONFCONTENT_245", "Path to the sound to be played on entrance (only .wav extensions).");
define("A_CONFCONTENT_246", "Example: sounds/beep.wav (you can also use long/remote URLs)");
define("A_CONFCONTENT_247", "On Entrance:");
define("A_CONFCONTENT_248", "On Welcome:");
define("A_CONFCONTENT_249", "Play a buzz sound on /buzz command.");
define("A_CONFCONTENT_250", "(or just display a [Buzz] message, without any sound)");
define("A_CONFCONTENT_251", "No buzz sounds");
define("A_CONFCONTENT_252", "Play buzz sounds");
define("A_CONFCONTENT_253", "Path to the buzz sound to be played (only .wav extensions).");
define("A_CONFCONTENT_254", "Example: sounds/chimedwn.wav (you can also use long/remote URLs)");

//Content Profanity
define("A_CONFCONTENT_255", "Enable Profanity filter.");
define("A_CONFCONTENT_256", "(replacement of posted swear words with the chars below)");
define("A_CONFCONTENT_257", "Allow swearing");
define("A_CONFCONTENT_258", "Disallow swearing");
define("A_CONFCONTENT_259", "Expression to replace the swear words with.");
define("A_CONFCONTENT_260", "Room name to allow swear words (avoid the filter).");
define("A_CONFCONTENT_261", "You must enter the exact name of the room. Click <a href=#roomnames class=\"ChatLink\">".A_CONFHERE."</a> to check your room names.");

//Content Private messaging
define("A_CONFCONTENT_263", "Enable whispers (private messages) system.");
define("A_CONFCONTENT_264", "if disabled, only the public messages will be allowed to be posted in chat.");
define("A_CONFCONTENT_265", "Enable popup whispers (private messages) system.");
define("A_CONFCONTENT_266", "if enabled, guests will not receive PMs in popups - they must register.");
define("A_CONFCONTENT_267", "This can also be configured per each registered user in their profile.");
define("A_CONFCONTENT_269", "Off-line PMs will always show in a popup anyway (otherwise, recipients won’t be notified about new PMs).");
define("A_CONFCONTENT_270", "Allow users to delete their own (received) PMs from the database.");
define("A_CONFCONTENT_271", "if enabled, users will be able to select and delete the private messages they received.");
define("A_CONFCONTENT_272", "Disallow PM deletion");
define("A_CONFCONTENT_273", "Allow PM deletion");
define("A_CONFCONTENT_274", "Clean-up time for unread off-line private messages.");
define("A_CONFCONTENT_275", "If the recipient does not login to chat in this interval, these old private messages are automatically removed from the database (they will not be exported to the log archive though, so the old unread PMs get lost).");

//Content Bots settings
define("A_CONFCONTENT_276", "Enable BOT in chat.");
define("A_CONFCONTENT_277", "Before changing any of the bot settings below, please stop the bot if it is running in the chat (you will not be able to kick it out afterwards, because it is set as admin).");
define("A_CONFCONTENT_278", "Enable Public conversations with BOT in chat.");
define("A_CONFCONTENT_279", "if you disable this, the bot will only listen and talk to users using private messages in chat.");
define("A_CONFCONTENT_280", "Private Bot Only");
define("A_CONFCONTENT_281", "Public Bot");
define("A_CONFCONTENT_282", "Enter the desired name for your BOT.");
define("A_CONFCONTENT_283", "Do not change the name before you make sure bot is fully loaded. You can do this by checking if it answers you on this private chat page: %s !"); //%s = page name (url)
define("A_CONFCONTENT_284", "Your bot has not been correctly loaded! Read the \"%s\".");
define("A_CONFCONTENT_285", "BOT status & maintenance.");
define("A_CONFCONTENT_286", "If your bot is not responding properly (posts empty messages) and/or the Bot ID <> 1, you might need to reload your bot. This operation will empty the bot tables in the database and reload the entire script.");
define("A_CONFCONTENT_287", "Your Bot is not loaded to the DB.");
define("A_CONFCONTENT_288", "Click <a href=\"./bot/botloader.php\" target=\"_blank\">".A_CONFHERE."</a> to load it now!");
define("A_CONFCONTENT_289", "Bot ID:");
define("A_CONFCONTENT_291", "Click <a href=\"./bot/botloader.php\" target=\"_blank\" class=\"error\">".A_CONFHERE."</a> to reload bot!");
define("A_CONFCONTENT_292", "Enter the color of the BOT response messages.");
define("A_CONFCONTENT_293", "Enter the avatar of the BOT.");
define("A_CONFCONTENT_294", "It will be shown only if the avatar system is enabled");
define("A_CONFCONTENT_294a", "Bot Avatar");
define("A_CONFCONTENT_295", "Enter the message to be posted by BOT on start.");
define("A_CONFCONTENT_296", "Avoid special characters or the settings will not be saved.");
define("A_CONFCONTENT_297", "Enter the message to be posted by BOT on stop.");

//Content Commands
define("A_CONFCONTENT_299", "Max number of messages that user may export on /save command.");
define("A_CONFCONTENT_300", "Values: 0 = disable, any integer = number of messages, * = no limit");
define("A_CONFCONTENT_301", "Enable Different Topics for each room (/topic or /topic * commands).");
define("A_CONFCONTENT_302", "(or just display a default one, called Global topic)");
define("A_CONFCONTENT_303", "default topics ought to be edited in the according \"%s\" / per each desired language, or, to add a default global topic (which overrides the localized topics), add it to \"%s\").");
define("A_CONFCONTENT_304", "Global topic");
define("A_CONFCONTENT_305", "Multiple topics");
define("A_CONFCONTENT_306", "Enter the expression for the /room command.");
define("A_CONFCONTENT_307", "Examples: <font color=red>Attention Room:</font> or <font color=red>Narrator Says:</font> or <font color=red>Read this:</font> or <font color=red>Author says:</font>");
define("A_CONFCONTENT_308", "Allow moderators to use /demote command.");
define("A_CONFCONTENT_309", "if set to second option, moderators will be able to demote other moderators - <font color=red>be very careful!</font>");
define("A_CONFCONTENT_310", "Only admins");
define("A_CONFCONTENT_311", "Moderators & admins");
define("A_CONFCONTENT_312", "Enter the max number of dice per throw.");
define("A_CONFCONTENT_313", "Use a value smaller than 99.");
define("A_CONFCONTENT_314", "Needed ONLY for Dice v.2. Please note that increasing this value too much, will lead to a load of how many dice images you choose, which can return delays displaying the messages (drastically for non-IE browsers).");
define("A_CONFCONTENT_315", "Enter the max number of dice per throw (sides per die for Dice v.2)");
define("A_CONFCONTENT_316", "Default sort order in the users lists (/sort command).");
define("A_CONFCONTENT_317", "users can also use the /sort command to change their sorting order.");
define("A_CONFCONTENT_318", "By time of entrance");
define("A_CONFCONTENT_319", "Alphabetically");
define("A_CONFCONTENT_320", "Set the maximum size for resizing posted pictures using /img command.");
define("A_CONFCONTENT_321", "Enable use of /math commands.");
define("A_CONFCONTENT_322", "This option allows you to post mathematical formulas using the LaTeX format provided by MathJax.");
define("A_CONFCONTENT_323", "Here is a <a href=\"http://www.mathjax.org/demos/tex-samples/\" target=\"_blank\">sample page</a> from the original mathjax.org site. You just need to type /math and copy&paste the source code of the desired formula.");
define("A_CONFCONTENT_324", "You can also use a local configuration file by setting the right source path. Default source (src) is: <font color=\"blue\"><i>http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML</i></font>");
define("A_CONFCONTENT_325", "Plugin Configuration Source:");

//Content Multimedia
define("A_CONFCONTENT_326", "Enable posting videos (e.g. YouTube) by using the /video command.");
define("A_CONFCONTENT_327", "If disabled, only the links to the original video source will be posted in chat; if enabled, any user can post a video that can be watched directly in chat by all users; setting to admins only will only show videos posted by admins and topmoders, rest of the users posting only links to the original video source.");
define("A_CONFCONTENT_328", "From admins only");
define("A_CONFCONTENT_329", "Set the width and height of the Video Player.");
define("A_CONFCONTENT_330", "Enable the MediaPlayer add-on in chat.");
define("A_CONFCONTENT_331", "Choose the correct format as the frame will take the according size (audio < video).");
define("A_CONFCONTENT_333", "If enabled, a valid streaming URL must be also set in the next field. You can set either a static audio/video source or a radioplayer streaming server.");
define("A_CONFCONTENT_334", "Audio/Radio");
define("A_CONFCONTENT_335", "Video/TV");
define("A_CONFCONTENT_336", "The path to the streaming URL.");
define("A_CONFCONTENT_336a", "Example for NASA TV live station:<br />http://playlist.yahoo.com/makeplaylist.dll?id=1369080&segment=149773");

//Content Quick Menu
define("A_CONFCONTENT_337", "Define the Quick Menu for admins.");
define("A_CONFCONTENT_338", "Define the Quick Menu for moderators.");
define("A_CONFCONTENT_339", "Define the Quick Menu for other users.");
define("A_CONFCONTENT_340a", "keep these chars: <b>|</b> at the end of each line except the last one.");
define("A_CONFCONTENT_340", "Empty this box to disable admin’s Quick Menu.");
define("A_CONFCONTENT_341", "Empty this box to disable moder’s Quick Menu.");
define("A_CONFCONTENT_342", "Empty this box to disable user’s Quick Menu.");

//Content Avatars & Gravatars
define("A_CONFCONTENT_343", "Enable AVATAR System.");
define("A_CONFCONTENT_345", "No avatars");
define("A_CONFCONTENT_346", "Use avatars");
define("A_CONFCONTENT_347", "Show Change Avatar (Profile) button in input bar.");
define("A_CONFCONTENT_348", "The path to your avatar dir.");
define("A_CONFCONTENT_349", "Enter the number of avatars to be shown from your defined folder.");
define("A_CONFCONTENT_350", "Only the first %s avatars will be shown to the users."); //%s = number of avatars
define("A_CONFCONTENT_351", "Avatar button");
define("A_CONFCONTENT_351a", "Gender");
define("A_CONFCONTENT_352", "Users default avatar");
define("A_CONFCONTENT_353", "Enter the width and height for the avatars to be shown.");
define("A_CONFCONTENT_354", "Usually, for a nice layout, width and height values should be equal.");
define("A_CONFCONTENT_355", "Allow users to upload Avatars from their machines.");
define("A_CONFCONTENT_356", "make sure the \"images/avatars\" and \"images/avatars/uploaded\" folders exist and they have public write permissions (CHMOD 0777)!");
define("A_CONFCONTENT_357", "Disallow uploads");
define("A_CONFCONTENT_358", "Allow uploads");
define("A_CONFCONTENT_359", "Show gender icons beside avatars.");
define("A_CONFCONTENT_360", "Hide Gender icons");
define("A_CONFCONTENT_361", "Show Gender icons");
define("A_CONFCONTENT_362", "Enable use of Gravatars.");
define("A_CONFCONTENT_363", "<a href=#avatars>Avatar System</a> must also be enabled above!");
define("A_CONFCONTENT_364", "If enabled, all guests will have a default gravatar as avatar.");
define("A_CONFCONTENT_365", "Let users decide");
define("A_CONFCONTENT_366", "Force Only Gravatars");
define("A_CONFCONTENT_367", "Definition:");
define("A_CONFCONTENT_368", "A gravatar, or <b>G</b>lobally <b>R</b>ecognized <b>A</b>vatar, is quite simply an avatar image that follows you from weblog to weblog appearing beside your name when you comment on gravatar enabled sites. Avatars help identify your posts on web forums, so why not on weblogs.<br />Signing up for a gravatar.com account is FREE, and all that’s required is an email address. Once you’ve signed up you can upload your avatar image and soon after you’ll start seeing it on gravatar enabled weblogs (including this chat)!");
define("A_CONFCONTENT_369", "(read more about Gravatars on <a href=\"http://www.gravatar.com\" target=\"_blank\">http://www.gravatar.com</a> site.)");
define("A_CONFCONTENT_370", "Gravatars Cache Settings.");
define("A_CONFCONTENT_371", "Server Info:");
define("A_CONFCONTENT_371a", "if cache is enabled, make sure the \"cache\" folder exists in the chat root and it has public write permissions (CHMOD 0777)!");
define("A_CONFCONTENT_371b", "Cache not supported on this server!");
define("A_CONFCONTENT_371c", "cannot get access to gravatar.com!");
define("A_CONFCONTENT_372", "Hosting Server IP:");
define("A_CONFCONTENT_373", "PHP Server version:");
define("A_CONFCONTENT_374", "allow_url_fopen:"); #don't translate!
define("A_CONFCONTENT_375", "allow_url_include:"); #don't translate!
define("A_CONFCONTENT_376", "file_get_contents:"); #don't translate!
define("A_CONFCONTENT_377", "MySQL Server version:");
define("A_CONFCONTENT_378", "Cache Disabled");
define("A_CONFCONTENT_379", "Cache Enabled");
define("A_CONFCONTENT_380", "Cache Age:");
define("A_CONFCONTENT_381", "Gravatars Allowed Ratings.");
define("A_CONFCONTENT_382", "Any of above");
define("A_CONFCONTENT_383", "G rated gravatar is suitable for display on all websites with any audience type <font color=blue>(recommended & default)</font>.");
define("A_CONFCONTENT_385", "PG rated gravatars may contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence.");
define("A_CONFCONTENT_386", "R rated gravatars may contain such things as harsh profanity, intense violence, nudity, or hard drug use.");
define("A_CONFCONTENT_387", "X rated gravatars may contain hardcore sexual imagery or extremely disturbing violence.");
define("A_CONFCONTENT_388", "Dynamic Default Gravatars.");
define("A_CONFCONTENT_388a", "Dynamic Gravatar");
define("A_CONFCONTENT_389", "Hints: This will randomly return a dynamic image for each user who don’t have a gravatar.com account for their email (chat guests and/or users without a registered gravatar.com account).");
define("A_CONFCONTENT_390", "You can force to display Random default Gravatars only if <a href=\"#force\">".A_CONFCONTENT_366."</a> is also enabled above!");
define("A_CONFCONTENT_391", "Show Users’ Defaults");
define("A_CONFCONTENT_392", "Force Random Defaults");

//Content Logging Mod
define("A_CONFCONTENT_393", "Enable chat logging.");
define("A_CONFCONTENT_394", "it will generate html files of the cleaned/deleted conversations. The full version can be accessed via the admin advanced menu, the short version (only the public messages) from the \"".L_EXTRA_OPT."\" menu in chat rooms.");
define("A_CONFCONTENT_395", "Set the name of your admin (full) logs folder.");
define("A_CONFCONTENT_396", "Rename the original \"logsadmin\" folder to a hard to guess name for your full logs folder.");
define("A_CONFCONTENT_397", "This is different from the public/users accessible one (called \"logs\"), which does not include any private/confidential data from your chat conversations/actions (PMs, restricted or private rooms conversations).");
define("A_CONFCONTENT_398", "Display logs to non-admin users in chat.");
define("A_CONFCONTENT_399", "Only if Chat logging is enabled.");

//Content Lurking Mod
define("A_CONFCONTENT_400", "Enable chat lurking.");
define("A_CONFCONTENT_401", "It will allow non-login people to monitor public conversations and events in the chat.");
define("A_CONFCONTENT_402", "Display lurking page to non-admin users in chat and login page.");
define("A_CONFCONTENT_403", "Only if Chat lurking is enabled.");
define("A_CONFCONTENT_404", "Enable the \"".A_MENU_6."\" in admin panel.");

//Content Random Quote
define("A_CONFCONTENT_405", "Enable Random Quote mod.");
define("A_CONFCONTENT_406", "to change these settings, you have to enable quote mode first!");
define("A_CONFCONTENT_407", "Quote’s Name.");
define("A_CONFCONTENT_408", "Quote’s Name color.");
define("A_CONFCONTENT_409", "Quote’s Avatar.");
define("A_CONFCONTENT_410", "Quotes’ File.");
define("A_CONFCONTENT_411", "Quotes’ Posting frequency.");
define("A_CONFCONTENT_412", "You can build your own files, using the web resources. The files shall be saved into \"%s\" directory."); //%s = folder name
define("A_CONFCONTENT_413", "Quote’s Background color.");

//Content Ghost Control
define("A_CONFCONTENT_414", "Control who will be visible in chat rooms.");
define("A_CONFCONTENT_415", "if you enable Ghost Control, users set as ghosts (invisible) will also be hidden from all the public pages and counters, except their posts and commands in rooms (messages frame)!");
define("A_CONFCONTENT_416", "You can still monitor ghosts’ connections and activity in the \"".A_MENU_8."\" tab. Please note that ghosts will still be able to act as usual in chat (can post public or private messages and can use all the commands, according to their powers).");
define("A_CONFCONTENT_417", "Show online administrators");
define("A_CONFCONTENT_418", "Hide online admins (ghosts)");
define("A_CONFCONTENT_419", "Show online moderators");
define("A_CONFCONTENT_420", "Hide online moders (ghosts)");
define("A_CONFCONTENT_421", "Special Ghosts (monitors):");
define("A_CONFCONTENT_422", "Add usernames, separated by commas, without spaces (,)!");
define("A_CONFCONTENT_423", "These users will not be seen by others in chat (only in the \"".A_MENU_8."\" tab) and, if they are also admins, they will be able to monitor all the events in chat rooms (including private messages!). We recommend activate these powers <font color=red>only for Parental Control</font> purposes!");
define("A_CONFCONTENT_421a", "Punished Ghosts (Phantoms):");
define("A_CONFCONTENT_423a", "These users will not be seen by others in chat (only in the \"".A_MENU_8."\" tab) and they will not be able to post or send any events in chat rooms. We recommend activate these powers <font color=red>only for Users that fail to be banished</font>!");

//Content Birthday Mod
define("A_CONFCONTENT_424", "Birthdays required on registration and profiles.");
define("A_CONFCONTENT_425", "Send automatic Greetings by email to users on their Birthdays.");
define("A_CONFCONTENT_426", "If enabled, the script will work only if the chat page will be visited/loaded in the sending interval (default = 7 days). After that interval, the email draft will be dropped off!");
define("A_CONFCONTENT_427", "Set the time from midnight you want Greetings to be triggered for sending.");
define("A_CONFCONTENT_428", "Positive or negative values allowed (0 = midnight).");
define("A_CONFCONTENT_429", "Please note that this setting is taking in consideration the server time, not the user’s local time, therefore it’s possible that the email will be sent within a (+ -) timezone deviation.");
define("A_CONFCONTENT_430", "How many days the Greetings will be up for sending.");
define("A_CONFCONTENT_431", "If there is no one in chat nor visiting the chat page within this interval, the Greeting will not be sent anymore, as the effect on the Celebrated user would not be the same, if the message come very late (like one month later).");
define("A_CONFCONTENT_432", "Set the text file you want Greetings to be extracted from.");
?>