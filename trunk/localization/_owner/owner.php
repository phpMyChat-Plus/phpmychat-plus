<?php
// File : _owner/ower.php - plus version (23.12.2010 - rev.2)
// Original file by Ciprian Murariu <ciprianmp@yahoo.com>

# Use an advanced text editor, not the Windows versions of Notepad or Wordpad
// Do not use ' ; use ’ instead (utf-8 edit bug)

// Set the default topic to be shown in your banner, when there is no specific topic entered with the /topic or /topic * command
# Please note that the topics themselves are not multilangual!
define("L_DEFAULT_TOPIC", ""); // Example: "This is the best Chat Online"

# Whenever you want to personalize your chat language, just copy and paste here from your language file (chat, admin, tutorial) then redefine the lines in this file.
# Copy the entire desired "define" row from your language/localized.chat.php, like in the sample below and change the second expression to what you wish to say.
# The change will be reflected to all the available languages!!!
# Never modify the original language/localized.chat.php, if you want to still be able to apply the ugrades to the next releases in a easy way.

//define("L_WEL_1", "Messages are deleted after %s %s"); //Change the expression "Messages are deleted after" to "We delete messages after" . Comment out this line and see the effect on the login page.
//define("L_WEL_2", "and inactive users after %s %s"); //Change the expression "and inactive users after" to "We also remove inactive users after". Comment out this line and see the effect on the login page.

// Do not change these lines:
define("L_ORIG_LANG_AR", "español Argentina");
define("L_ORIG_LANG_BG", "български");
define("L_ORIG_LANG_CA", "català");
define("L_ORIG_LANG_CZ", "čeština");
define("L_ORIG_LANG_DA", "dansk");
define("L_ORIG_LANG_EN", "English");
define("L_ORIG_LANG_ENUK", "English UK");
define("L_ORIG_LANG_ENUS", "English US");
define("L_ORIG_LANG_ES", "español");
define("L_ORIG_LANG_FR", "français");
define("L_ORIG_LANG_DE", "Deutsch");
define("L_ORIG_LANG_HE", "עברית");
define("L_ORIG_LANG_HU", "magyar");
define("L_ORIG_LANG_ID", "Bahasa Indonesia");
define("L_ORIG_LANG_IT", "italiano");
define("L_ORIG_LANG_JA", "日本語");
define("L_ORIG_LANG_NE", "नेपाली");
define("L_ORIG_LANG_NL", "Nederlands");
define("L_ORIG_LANG_PL", "polska");
define("L_ORIG_LANG_RO", "română");
define("L_ORIG_LANG_RU", "Русский");
define("L_ORIG_LANG_SRL", "srpski");
define("L_ORIG_LANG_SV", "svenska");
define("L_ORIG_LANG_UK", "Українське");
define("L_ORIG_LANG_TR", "Türkçe");
define("L_ORIG_LANG_VI", "Tiếng Việt");
define("L_ORIG_LANG_YO", "Yorùbá");
?>