<?php
// File : english.lang.php
// Original file by Loïc Chapeaux <lolo@phpheaven.net> & Dean Collins <joelford@pacbell.net>

// extra header for charset
$Charset = "iso-8859-1";

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
define("A_USER", "User");
define("A_MODER", "Moderator");
define("A_PAGE_CNT", "Page %s of %s");

// Frame for banished users
define("A_SHEET2_1", "List of banished users and concerned rooms");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Concerned rooms");
define("A_SHEET2_4", "Until");
define("A_SHEET2_5", "no end");
define("A_SHEET2_6", "Rooms are separated by commas without spaces (,) if there are less than 4, else the '<B>&nbsp;*&nbsp;</B>' sign<br>banish from all rooms.");
define("A_SHEET2_7", "Remove banishment for checked user(s)");
define("A_SHEET2_8", "There are no banished users.");

// Frame for cleaning rooms
define("A_SHEET3_1", "List of existing rooms");
define("A_SHEET3_2", "Clean a \"non-default\" room will also remove all moderator<br>status for this room.");
define("A_SHEET3_3", "Clean selected rooms");
define("A_SHEET3_4", "There are no rooms to clean.");

// Frame for sending mails
define("A_SHEET4_0", "You haven't set required variables in the<br>'chat/admin/mail4admin.php' script.");
define("A_SHEET4_1", "Send e-mails");
define("A_SHEET4_2", "To:");
define("A_SHEET4_3", "Select all");
define("A_SHEET4_4", "Subject:");
define("A_SHEET4_5", "Message:");
define("A_SHEET4_6", "Start sending");
define("A_SHEET4_7", "All e-mails have been sent.");
define("A_SHEET4_8", "Internal error while sending the mails.");
define("A_SHEET4_9", "Addresse(s), subject or message is missing!");

// Plus version additions
define("L_RELOAD_CHAT", "The settings of this server have just been changed. To avoid malfunctions, please reload your browser (press F5 key or Exit and reenter chat).");
?>