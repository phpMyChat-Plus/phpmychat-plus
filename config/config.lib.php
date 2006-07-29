<?php

// ------ THESE SETTINGS MUST BE COMPLETED ------

// Database settings
define("C_DB_NAME", 'plus');						// Logical database name on that server (most of the times like: cpanelusername_databasename)
define("C_DB_USER", 'username');				// Database username (most of the times like: cpanelusername_username)
define("C_DB_PASS", 'password');				// Database user's password
// We recommend you keep the names bellow
define("C_DB_TYPE", 'mysql');						// SQL server type ("mysql", "pgsql" or "odbc")
define("C_DB_HOST", 'localhost');				// Hostname of your MySQL server
define("C_MSG_TBL", 'c_messages');			// Name of the table where messages are stored
define("C_USR_TBL", 'c_users');					// Name of the table where user names are stored
define("C_REG_TBL", 'c_reg_users'); 		// Name of the table where registered users are stored
define("C_BAN_TBL", 'c_ban_users'); 		// Name of the table where banished users are stored
define("C_CFG_TBL", 'c_config'); 				// Name of the table where configuration settings are stored (if enabled)
define("C_LRK_TBL", 'c_lurkers'); 			// Name of the table where data about lurkers are stored (if enabled)

// ------ THESE SETTINGS MUST NOT BE CHANGED ------

require("color.lib.php");

$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
mysql_select_db(C_DB_NAME);
$query = "SELECT * FROM ".C_CFG_TBL."";
$result = mysql_query($query);
$row = mysql_fetch_row($result);

$MSG_DEL        			= $row[1];
$USR_DEL		          = $row[2];
$REG_DEL		          = $row[3];
$LANGUAGE   		      = $row[4];
$MULTI_LANG     		  = $row[5];
$REQUIRE_REGISTER 		= $row[6];
$REQUIRE_NAMES				= $row[7];
$EMAIL_PASWD		      = $row[8];
$PASS_LENGTH			 		= $row[9];
$ADMIN_NOTIFY			 		= $row[10];
$ADMIN_NAME			 			= $row[11];
$ADMIN_EMAIL			 		= $row[12];
$CHAT_URL					 		= $row[13];
$SHOW_ADMIN     		  = $row[14];
$SHOW_DEL_PROF		    = $row[15];
$VERSION         			= $row[16];
$BANISH  		    	    = $row[17];
$NO_SWEAR   		      = $row[18];
$SWEAR_EXPR 		      = $row[19];
$SAVE           		  = $row[20];
$USE_SMILIES		      = $row[21];
$HTML_TAGS_KEEP 		  = $row[22];
$HTML_TAGS_SHOW			  = $row[23];
$TMZ_OFFSET     		  = $row[24];
$MSG_ORDER		        = $row[25];
$MSG_NB       		    = $row[26];
$MSG_REFRESH      		= $row[27];
$SHOW_TIMESTAMP		  	= $row[28];
$NOTIFY								= $row[29];
$WELCOME		          = $row[30];
$SMILEY_COLS				  = $row[31];
$SMILEY_COLS_POP			= $row[32];
$ALLOW_ENTRANCE_SOUND	= $row[33];
$ENTRANCE_SOUND				= $row[34];
$ALLOW_BUZZ_SOUND			= $row[35];
$BUZZ_SOUND						= $row[36];
$TOPIC_DIFF						= $row[37];
$SHOW_TUT							= $row[38];
$SHOW_INFO						= $row[39];
$SET_CMDS							= $row[40];
$CMDS									= $row[41];
$SET_MODS							= $row[42];
$MODS									= $row[43];
$SET_BOT							= $row[44];
$ROOM_SAYS						= $row[45];
$DEMOTE_MOD						= $row[46];
$PRIV_POPUP						= $row[47];
$SHOW_ETIQ_IN_HELP		= $row[48];
$SHOW_LOGO						= $row[49];
$LOGO_IMG							= $row[50];
$LOGO_OPEN						= $row[51];
$LOGO_ALT							= $row[52];
$SHOW_OWNER						= $row[53];
$SHOW_PRIV						= $row[54];
$SHOW_PRIV_MOD				= $row[55];
$SHOW_PRIV_USR				= $row[56];
$SHOW_COUNTER					= $row[57];
$INSTALL_DATE					= $row[58];
$USE_SKIN				      = $row[59];
$ROOM1					      = $row[60];
$ROOM2					      = $row[61];
$ROOM3			  		    = $row[62];
$ROOM4					      = $row[63];
$ROOM5					      = $row[64];
$ROOM6			  		    = $row[65];
$ROOM7			      		= $row[66];
$ROOM8					      = $row[67];
$ROOM9					      = $row[68];
$SWEAR1								= $row[69];
$SWEAR2			 					= $row[70];
$SWEAR3	 							= $row[71];
$SWEAR4	 							= $row[72];
$COLOR_FILTERS				= $row[73];
$COLOR_ALLOW_GUESTS		= $row[74];
$COLOR_CD1						= $row[75];
$COLOR_CD2						= $row[76];
$COLOR_CD3						= $row[77];
$COLOR_CD4						= $row[78];
$COLOR_CD5						= $row[79];
$COLOR_CD6						= $row[80];
$COLOR_CD7						= $row[81];
$COLOR_CDC1						= $row[82];
$COLOR_CDC2						= $row[83];
$COLOR_CDC3						= $row[84];
$COLOR_CDC4						= $row[85];
$COLOR_CDC5						= $row[86];
$COLOR_CDC6						= $row[87];
$COLOR_CDC7						= $row[88];
$QUICKA								= $row[89];
$QUICKM								= $row[90];
$QUICKU								= $row[91];
$COLOR_NAMES					= $row[92];
$USE_AVATARS					= $row[93];
$NUM_AVATARS					= $row[94];
$AVA_RELPATH					= $row[95];
$DEF_AVATAR						= $row[96];
$AVA_WIDTH						= $row[97];
$AVA_HEIGHT						= $row[98];
$AVA_PROFBUTTON				= $row[99];
$MAX_DICES						= $row[100];
$MAX_ROLLS						= $row[101];
$BOT_CONTROL					= $row[102];
$MAX_PIC_SIZE					= $row[103];
$USERS_SORT_ORD				= $row[104];
$CHAT_LOGS						= $row[105];
$LOG_DIR							= $row[106];
$SHOW_LOGS_USR				= $row[107];
$CHAT_LURKING					= $row[108];
$SHOW_LURK_USR				= $row[109];
$BAN_IP								= $row[110];
$REG_CHARS_ALLOWED		= $row[111];
$EXIT_LINK_TYPE				= $row[112];
$CHAT_EXTRAS					= $row[113];
$EMAIL_USER						= $row[114];

$query_bot1 = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email='bot@bot.bot.com'";
$result_bot1 = mysql_query($query_bot1);
list($BOT_NAME, $BOT_AVATAR, $BOT_FONT_COLOR) = mysql_fetch_row($result_bot1);

// Cleaning settings for messages and usernames
define("C_MSG_DEL", $MSG_DEL);
define("C_USR_DEL", $USR_DEL);
define("C_REG_DEL", $REG_DEL);

// Language settings
define("C_LANGUAGE", $LANGUAGE);
define("C_MULTI_LANG", $MULTI_LANG);

// Registration of users
define("C_REQUIRE_REGISTER", $REQUIRE_REGISTER);
define("C_REQUIRE_NAMES", $REQUIRE_NAMES);
define("C_EMAIL_PASWD", $EMAIL_PASWD);
define("C_EMAIL_USER", $EMAIL_USER);
define("C_PASS_LENGTH", $PASS_LENGTH);
define("C_ADMIN_NOTIFY", $ADMIN_NOTIFY);
define("C_ADMIN_NAME", $ADMIN_NAME);
define("C_ADMIN_EMAIL", $ADMIN_EMAIL);
define("C_CHAT_URL", $CHAT_URL);

// Security and restrictions
define("C_SHOW_ADMIN", $SHOW_ADMIN);
define("C_SHOW_DEL_PROF", $SHOW_DEL_PROF);
define("C_VERSION", $VERSION);
define("C_BANISH", $BANISH);
define("C_NO_SWEAR", $NO_SWEAR);
define("C_SWEAR_EXPR", $SWEAR_EXPR);
define("C_SAVE", $SAVE);


// Messages enhancements
define("C_USE_SMILIES", $USE_SMILIES);
define("C_HTML_TAGS_KEEP", $HTML_TAGS_KEEP);
define("C_HTML_TAGS_SHOW", $HTML_TAGS_SHOW);

// Default display settings
define("C_TMZ_OFFSET", $TMZ_OFFSET);
define("C_MSG_ORDER", $MSG_ORDER);
define("C_MSG_NB", $MSG_NB);
define("C_MSG_REFRESH", $MSG_REFRESH);
define("C_SHOW_TIMESTAMP", $SHOW_TIMESTAMP);
define("C_NOTIFY", $NOTIFY);
define("C_WELCOME", $WELCOME);

// Room Skin mod by Ciprian
define("C_SKIN", $USE_SKIN);

// Proposed (default) rooms and reserved names for private rooms
define("ROOM1", $ROOM1);
define("ROOM2", $ROOM2);
define("ROOM3", $ROOM3);
define("ROOM4", $ROOM4);
define("ROOM5", $ROOM5);
define("ROOM6", $ROOM6);
define("ROOM7", $ROOM7);
define("ROOM8", $ROOM8);
define("ROOM9", $ROOM9);

//	Profanity filter disabled for following rooms - by Ciprian
define("C_NO_SWEAR_ROOM1", $SWEAR1);
define("C_NO_SWEAR_ROOM2", $SWEAR2);
define("C_NO_SWEAR_ROOM3", $SWEAR3);
define("C_NO_SWEAR_ROOM4", $SWEAR4);

$DefaultChatRooms = array(ROOM1, ROOM2, ROOM3, ROOM4, ROOM5);
$DefaultPrivateRooms = array(ROOM6, ROOM7, ROOM8, ROOM9);

// For Bob Dickow's multi/split smiley's in help popup modification:
define("SMILEY_COLS", $SMILEY_COLS);
define("SMILEY_COLS_POP", $SMILEY_COLS_POP);

// Sound for users entering Chat.
define("ALLOW_ENTRANCE_SOUND", $ALLOW_ENTRANCE_SOUND);
define("ENTRANCE_SOUND", $ENTRANCE_SOUND);
if (ALLOW_ENTRANCE_SOUND) define("L_ENTER_SND", "<EMBED SRC=".$ENTRANCE_SOUND." HIDDEN=true AUTOSTART=true LOOP=false NAME=Hello MASTERSOUND><NOEMBED><BGSOUND SRC=".$ENTRANCE_SOUND." LOOP=1></NOEMBED></EMBED>");
else  define("L_ENTER_SND", "");

// Buzz Sound command.
define("ALLOW_BUZZ_SOUND", $ALLOW_BUZZ_SOUND);
define("BUZZ_SOUND", $BUZZ_SOUND);
if (ALLOW_BUZZ_SOUND) define("L_BUZZ_SND", "<EMBED SRC=".$BUZZ_SOUND." HIDDEN=true AUTOSTART=true LOOP=false NAME=Buzz MASTERSOUND><NOEMBED><BGSOUND SRC=".$BUZZ_SOUND." LOOP=1></NOEMBED></EMBED>");
else  define("L_BUZZ_SND", "");

// Enable different Topics for each room, defined in banner.php.
// If set to 0, it will use the global topic defined there.
define ("TOPIC_DIFF", $TOPIC_DIFF);

// Away command user status update.
define("C_UPDTUSRS", "<!-- UPDTUSRS //-->");

// Show tutorial link on the welcome page
define ("C_SHOW_TUT", $SHOW_TUT);

// Info on first page mod by Ciprian
define("C_SHOW_INFO", $SHOW_INFO);
define("SET_CMDS", $SET_CMDS);
define("CMDS", $CMDS);
define("SET_MODS", $SET_MODS);
define("MODS", $MODS);
define("SET_BOT", $SET_BOT);

// Room command by Ciprian
define("ROOM_SAYS", $ROOM_SAYS);

// Demote control level by Ciprian
define("C_DEMOTE_MOD", $DEMOTE_MOD);

// Private message popup mod by Ciprian
define("C_PRIV_POPUP", $PRIV_POPUP);

// Chat Etiquete by Ealdwulf&Emma-Kate from http://wizardtales.net/chat
define("SHOW_ETIQ_IN_HELP", $SHOW_ETIQ_IN_HELP);

// Show logo on top of thefirst page
define ("C_SHOW_LOGO", $SHOW_LOGO);
define ("C_LOGO_IMG", $LOGO_IMG);
define ("C_LOGO_OPEN", $LOGO_OPEN);
define ("C_LOGO_ALT", $LOGO_ALT);
define ("APP_LOGO", "<A HREF=".$LOGO_OPEN." TITLE=".$LOGO_ALT." onMouseOver=\"window.status=".C_LOGO_ALT."; return true\" TARGET=_blank><IMG SRC=".$LOGO_IMG." BORDER=0 ALT=".$LOGO_ALT."></A>");  // Application logo image

// Show private rooms selection box on first page
define ("C_SHOW_PRIV", $SHOW_PRIV);
define ("C_SHOW_PRIV_MOD", $SHOW_PRIV_MOD);
define ("C_SHOW_PRIV_USR", $SHOW_PRIV_USR);

// Show owner's name on bottom of the first page
define ("C_SHOW_OWNER", $SHOW_OWNER);

// Show counter on bottom of the first page
define ("C_SHOW_COUNTER", $SHOW_COUNTER);
define ("C_INSTALL_DATE", $INSTALL_DATE);

// Color Input Box Mod by Ciprian - power color filters activation - default "yes".
define("COLOR_FILTERS", $COLOR_FILTERS);

// Color Input Box Mod by Ciprian - allow guests to use colors - default "yes".
define("COLOR_ALLOW_GUESTS", $COLOR_ALLOW_GUESTS);

// ------ THESE IS A WEB STANDARD - SETTINGS MUST NOT BE CHANGED!!!  (it will show the 16 web-safe standard colors on the Color Help Page)------
define("COLOR_LIST", "<P style=\"background-color:tan; color:black;\">[ <SPAN style=\"color:aqua\">aqua</SPAN> - <SPAN style=\"color:black\">black</SPAN> - <SPAN style=\"color:blue\">blue</SPAN> - <SPAN style=\"color:fuchsia\">fuchsia</SPAN> - <SPAN style=\"color:gray\">gray</SPAN> - <SPAN style=\"color:green\">green</SPAN> - <SPAN style=\"color:lime\">lime</SPAN> - <SPAN style=\"color:maroon\">maroon</SPAN> ]<br>[ <SPAN style=\"color:navy\">navy</SPAN> - <SPAN style=\"color:olive\">olive</SPAN> - <SPAN style=\"color:purple\">purple</SPAN> - <SPAN style=\"color:red\">red</SPAN> - <SPAN style=\"color:silver\">silver</SPAN> - <SPAN style=\"color:teal\">teal</SPAN> - <SPAN style=\"color:white\">white</SPAN> - <SPAN style=\"color:yellow\">yellow</SPAN> ]</P>");

// ------ THESE SETTINGS MUST NOT BE CHANGED WITHOUT EXPERTISE ------
if (C_SKIN == 1)
{
$Room = stripslashes($R);
if (strcmp(stripslashes($R), ROOM8) == 1)
{
	if (strcasecmp(stripslashes($R), ROOM8) == 0)
	{
		if ($R != ucfirst(ROOM8)) $Room = ucfirst($R);
		elseif (ucfirst(stripslashes($R)) == ROOM8) $Room = ROOM8;
		else $Room = strtolower($R);
	}
}
if (strcasecmp(ucfirst(stripslashes($R)), ROOM8) == 0) $Room = ROOM8;
if (strcmp(stripslashes($R), ROOM9) == 1)
{
	if (strcasecmp(stripslashes($R), ROOM9) == 0)
	{
		if ($R != ucfirst(ROOM9)) $Room = ucfirst($R);
		else $Room = strtolower($R);
	}
}
if (strcasecmp(ucfirst(stripslashes($R)), ROOM9) == 0) $Room = ROOM9;
	switch ($Room)
	{
		default:
		{
			$skin = 'config/style';
			define("COLOR_CD", $COLOR_CD1);
			define("COLOR_CDC", $COLOR_CDC1);
			define("COLOR_CDH", '#'.$COLOR_CDC1);
		}
	break;
		case ROOM2:
		{
			$skin = "config/style2";
			define("COLOR_CD", $COLOR_CD2);
			define("COLOR_CDC", $COLOR_CDC2);
			define("COLOR_CDH", '#'.$COLOR_CDC2);
		}
	break;
		case ROOM3:
		{
			$skin = 'config/style3';
			define("COLOR_CD", $COLOR_CD3);
			define("COLOR_CDC", $COLOR_CDC3);
			define("COLOR_CDH", '#'.$COLOR_CDC3);
		}
	break;
		case ROOM4:
		{
			$skin = 'config/style4';
			define("COLOR_CD", $COLOR_CD4);
			define("COLOR_CDC", $COLOR_CDC4);
			define("COLOR_CDH", '#'.$COLOR_CDC4);
		}
	break;
		case ROOM5:
		{
			$skin = 'config/style5';
			define("COLOR_CD", $COLOR_CD5);
			define("COLOR_CDC", $COLOR_CDC5);
			define("COLOR_CDH", '#'.$COLOR_CDC5);
		}
	break;
		case ROOM6:
		{
			$skin = 'config/style6';
			define("COLOR_CD", $COLOR_CD6);
			define("COLOR_CDC", $COLOR_CDC6);
			define("COLOR_CDH", '#'.$COLOR_CDC6);
		}
	break;
		case ROOM7:
		{
			$skin = 'config/style7';
			define("COLOR_CD", $COLOR_CD7);
			define("COLOR_CDC", $COLOR_CDC7);
			define("COLOR_CDH", '#'.$COLOR_CDC7);
		}
	break;
		case ROOM8:
		{
			$skin = 'config/style5'; 	// choose the style for the first private room and change the values bellow accordingly
			define("COLOR_CD", $COLOR_CD5);
			define("COLOR_CDC", $COLOR_CDC5);
			define("COLOR_CDH", '#'.$COLOR_CDC5);
		}
	break;
		case ROOM9:
		{
			$skin = 'config/style7'; 	// choose the style for the second private room and change the values bellow accordingly
			define("COLOR_CD", $COLOR_CD7);
			define("COLOR_CDC", $COLOR_CDC7);
			define("COLOR_CDH", '#'.$COLOR_CDC7);
		}
	break;
	}
}
else						//default style if Room Skin mod is disabled
{
		$skin = 'config/style';
		define("COLOR_CD", $COLOR_CD1);
		define("COLOR_CDC", $COLOR_CDC1);
		define("COLOR_CDH", '#'.$COLOR_CDC1);
}

// For Bob Dickow's QuickNotes modification
// Comment the lines bellow to disable the quick menu for any of those mentioned
$dropdownmsga = explode("|",$QUICKA);	//administrators
$dropdownmsgm = explode("|",$QUICKM);	//moderators
$dropdownmsg = explode("|",$QUICKU);	//users

// Colored names in users list.
define("COLOR_NAMES", $COLOR_NAMES);

// Avatars system Start.
define("C_USE_AVATARS", $USE_AVATARS); // Is Avatar version? 0 for NO:: 1 for yes.
define("C_NUM_AVATARS", $NUM_AVATARS); // 54. 1 default avatar plus 53 custom ones. Use '0'
                              // to turn off the avatar system. You may have
                              // any number of custom avatars available, just put
                              // the total number of custom avatars +1 in this define.

define("C_AVA_RELPATH", $AVA_RELPATH); // Absolute path to default avatar
define("C_DEF_AVATAR", $DEF_AVATAR);
define("C_AVA_WIDTH", $AVA_WIDTH);
define("C_AVA_HEIGHT", $AVA_HEIGHT);
define("C_AVA_PROFBUTTON", $AVA_PROFBUTTON); // show, (0=no show) click button for profile popup

define("MAX_DICES", $MAX_DICES);        // Maximum number of die per throw; change as you see fit
define("MAX_ROLLS", $MAX_ROLLS);        // Maximum number of rolls per die; change as you see fit

define("C_BOT_CONTROL", $BOT_CONTROL);                 // enable/disable bot
define("C_BOT_NAME", $BOT_NAME);                 // The Name of your ProjectE Bot (Will change later)
define("C_BOT_FONT_COLOR", $BOT_FONT_COLOR);         // Font color BOT text will be.
define("BOT_AVATAR", $BOT_AVATAR);		//avatar of the bot

// Set the maximum size for resizing posted pictures using /img command
define("MAX_PIC_SIZE", $MAX_PIC_SIZE);

// Set the order of sorting the users in the rooms' lists
define("C_USERS_SORT_ORD", $USERS_SORT_ORD);

// Enable generation of log files
define("C_CHAT_LOGS", $CHAT_LOGS);
// Full admin Logs dir name
define("C_LOG_DIR", $LOG_DIR);
define("C_SHOW_LOGS_USR", $SHOW_LOGS_USR);

// Enable Lurking mod by Ciprian (people can monitor public conversations and events in the chat without loging in)
define("C_CHAT_LURKING", $CHAT_LURKING);
define("C_SHOW_LURK_USR", $SHOW_LURK_USR);

// Banishment by IP or username
define("C_BAN_IP", $BAN_IP);

// Registration/Login Characters allowed in usernames
$REG_CHARS = "[^".$REG_CHARS_ALLOWED;
$REG_CHARS .= $REG_CHARS."]{1,}";
define("REG_CHARS_ALLOWED", $REG_CHARS);

// Registration/Login Characters allowed in usernames
define("EXIT_LINK_TYPE", $EXIT_LINK_TYPE);

// Enable/disable Chat extras page in admin link
define("C_CHAT_EXTRAS", $CHAT_EXTRAS);
?>