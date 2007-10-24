<?php
// File : english/localized.admin.php - plus version (25.09.2007 - rev.10)
// Original file by Loďc Chapeaux <lolo@phpheaven.net> & Dean Collins <joelford@pacbell.net>
// Updates, corrections and additions for the Plus version by Ciprian Murariu <ciprianmp@yahoo.com>

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Administration for %s");
define("A_MENU_1", "Registered users");
define("A_MENU_2", "Banished users");
define("A_MENU_3", "Clean rooms");
define("A_MENU_4", "Send mails");
define("A_MENU_5", "Configuration");
define("A_MENU_6", "Chat extras");
define("A_MENU_7", "Search");
define("A_MENU_8", "Connections");
define("A_MENU_9", "Log archive");
define("A_LOGOUT", "Logout");

// Frame for registered users
define("A_SHEET1_1", "List of registered users and their permissions");
define("A_SHEET1_2", "Username");
define("A_SHEET1_3", "Permissions");
define("A_SHEET1_4", "Moderated rooms");
define("A_SHEET1_5", "Moderated rooms are split by comma (,) without spaces.");
define("A_SHEET1_6", "Remove checked profiles");
define("A_SHEET1_7", "Change");
define("A_SHEET1_8", "There are no registered users except yourself.");
define("A_SHEET1_9", "Banish checked profiles");
define("A_SHEET1_10", "Now you have to move to the banished users sheet to refine your choices.");
define("A_SHEET1_11", "Last connected");
define("A_SHEET1_12", "Banishment reason (optional)");
define("A_USER", "User");
define("A_MODER", "Moderator");
define("A_TOPMOD", "Top Moderator");
define("A_ADMIN", "Administrator");
define("A_PAGE_CNT", "Page %s of %s");

// Frame for banished users
define("A_SHEET2_1", "List of banished users and concerned rooms");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Concerned rooms");
define("A_SHEET2_4", "Until");
define("A_SHEET2_5", "no end");
define("A_SHEET2_6", "Rooms are separated by commas without spaces (,) if there are less than 4, else the ’<B>*</B>’ sign banish from all rooms.");
define("A_SHEET2_7", "Remove banishment for checked user(s)");
define("A_SHEET2_8", "There are no banished users.");
define("A_SHEET2_9", "Reason (optional)");

// Frame for cleaning rooms
define("A_SHEET3_1", "List of existing rooms");
define("A_SHEET3_2", "Clean a \"non-default\" room will also remove all moderator<br />status for this room.");
define("A_SHEET3_3", "Clean selected rooms");
define("A_SHEET3_4", "There are no rooms to clean.");

// Frame for sending mails
define("A_SHEET4_0", "You haven’t set the admin email in Configuration tab.");
define("A_SHEET4_1", "Send e-mails");
define("A_SHEET4_2", "To:");
define("A_SHEET4_3", "Select all");
define("A_SHEET4_4", "Subject:");
define("A_SHEET4_5", "Message:");
define("A_SHEET4_6", "Send now!");
define("A_SHEET4_7", "All e-mails have been sent.");
define("A_SHEET4_8", "Internal error while sending the mails.");
define("A_SHEET4_9", "Addresse(s), subject or message is missing!");
define("A_SHEET4_10", "Add emails, separated by commas without spaces (,)");
define("A_SHEET4_11", "Signature");
define("A_SHEET4_12", "Unselect all");

// Frame for configuration
define("A_SHEET5_0", "Your phpMyChat-Plus installed version is %s");
define("A_SHEET5_1", "There is a new version released (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Chat Extras disabled") ;
define("A_REFRESH_MSG", "Refresh Messages") ;
define("A_MSG_DEL", "Del") ;
define("A_POST_TIME", "Posted on") ;
define("A_FROM_TO", "From  To") ;
define("A_FROM", "From") ;
define("A_CHTEX_ROOM", "Room") ;
define("A_CHTEX_MSG", "Message") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Logs of IP Connections to %s");
define("A_CHAT_LOGS_2", "Chat Archive has been disabled");
define("A_CHAT_LOGS_3", "Open Chat IP logs page");
define("A_CHAT_LOGS_4", "Delete Chat IP logs");
define("A_CHAT_LOGS_5", "This will delete the IP logs file!\\n");
define("A_CHAT_LOGS_6", "Full Chat Logs Archive");
define("A_CHAT_LOGS_7", "Show the public chat archive section");
define("A_CHAT_LOGS_8", "This will delete all the files and folders\\nstored in the %s folder!\\n"); // year
define("A_CHAT_LOGS_9", "Delete all %s logs"); // year
define("A_CHAT_LOGS_10", "Delete year");
define("A_CHAT_LOGS_11", "This will delete all the files\\nstored in the %s folder!\\n"); // month/year
define("A_CHAT_LOGS_12", "(only the public ones)");
define("A_CHAT_LOGS_13", "Delete month");
define("A_CHAT_LOGS_14", "This will delete the %s file!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Delete this log");
define("A_CHAT_LOGS_16", "Read %s log"); // day month year
define("A_CHAT_LOGS_17", "Public Chat Logs Archive");
define("A_CHAT_LOGS_18", "(only the public one)");
define("A_CHAT_LOGS_19", "\\nThis is not reversible...\\nAre you sure?");
define("A_CHAT_LOGS_20", "Show the full chat archive section");
define("A_CHAT_LOGS_21", "Go to top");
define("A_CHAT_LOGS_22", "Archived Log File");
define("A_CHAT_LOGS_23", "Generated on %s"); // Generated on "date"

//Admin Search Page
define("A_SEARCH_1", "Chatroom Search Page");
define("A_SEARCH_2", "All categories");
define("A_SEARCH_3", "Names");
define("A_SEARCH_4", "IP Address");
define("A_SEARCH_5", "Permissions");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Gender");
define("A_SEARCH_8", "Description");
define("A_SEARCH_9", "Links");
define("A_SEARCH_10", "Search");
define("A_SEARCH_11", "For Permissions Category, options are <b>ad</b>, <b>mod</b> or <b>u</b>.");
define("A_SEARCH_12", "For Gender Category, options are <b>0</b> for Unspecified, <b>1</b> for Male, or <b>2</b> for Female.");
define("A_SEARCH_13", "Username");
define("A_SEARCH_14", "First Name");
define("A_SEARCH_15", "Last Name");
define("A_SEARCH_16", "Country");
define("A_SEARCH_18", "Permission");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Gender");
define("A_SEARCH_21", "Search Term");
define("A_SEARCH_22", "Search by");
define("A_SEARCH_23", "Please Provide a Search Term and Try Again");

// Connected users Page
define("A_LURKING_1", "Connected users and Lurking") ;
define("A_LURKING_2", "Lurking disabled.") ;
?>