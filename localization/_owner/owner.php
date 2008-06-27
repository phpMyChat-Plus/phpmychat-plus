<?php
// File : _owner/ower.php - plus version (12.01.2008 - rev.1)
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
?>