<?php

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

  require("./config/config.lib.php");

// If form is submitted update values in the database
if (isset($FORM_SEND) && $FORM_SEND == 5)
{
  while(list($name,$value) = each($HTTP_GET_VARS))
  {
           $$name = $value;
  };
  while(list($name,$value) = each($HTTP_POST_VARS))
  {
           $$name = $value;
  };


  $conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
  mysql_select_db(C_DB_NAME);


  $query = "UPDATE ".C_CFG_TBL." SET ".
            "MSG_DEL = '$vMSG_DEL', ".
            "USR_DEL = '$vUSR_DEL', ".
            "REG_DEL = '$vREG_DEL', ".
            "LANGUAGE = '$vLANGUAGE', ".
            "MULTI_LANG = '$vMULTI_LANG', ".
            "REQUIRE_REGISTER = '$vREQUIRE_REGISTER', ".
						"REQUIRE_NAMES = '$vREQUIRE_NAMES', ".
            "EMAIL_PASWD = '$vEMAIL_PASWD', ".
            "PASS_LENGTH = '$vPASS_LENGTH', ".
						"ADMIN_NOTIFY = '$vADMIN_NOTIFY', ".
						"ADMIN_NAME = '$vADMIN_NAME', ".
						"ADMIN_EMAIL = '$vADMIN_EMAIL', ".
						"CHAT_URL = '$vCHAT_URL', ".
            "SHOW_ADMIN = '$vSHOW_ADMIN', ".
            "SHOW_DEL_PROF = '$vSHOW_DEL_PROF', ".
            "VERSION = '$vVERSION', ".
            "BANISH = '$vBANISH', ".
            "NO_SWEAR = '$vNO_SWEAR', ".
            "SWEAR_EXPR = '$vSWEAR_EXPR', ".
            "SAVE = '$vSAVE', ".
            "USE_SMILIES = '$vUSE_SMILIES', ".
            "HTML_TAGS_KEEP = '$vHTML_TAGS_KEEP', ".
            "HTML_TAGS_SHOW = '$vHTML_TAGS_SHOW', ".
            "TMZ_OFFSET = '$vTMZ_OFFSET', ".
            "MSG_ORDER = '$vMSG_ORDER', ".
            "MSG_NB = '$vMSG_NB', ".
            "MSG_REFRESH = '$vMSG_REFRESH', ".
            "SHOW_TIMESTAMP = '$vSHOW_TIMESTAMP', ".
            "NOTIFY = '$vNOTIFY', ".
            "WELCOME = '$vWELCOME', ".
						"SMILEY_COLS = '$vSMILEY_COLS', ".
						"SMILEY_COLS_POP = '$vSMILEY_COLS_POP', ".
						"ALLOW_ENTRANCE_SOUND = '$vALLOW_ENTRANCE_SOUND', ".
						"ENTRANCE_SOUND = '$vENTRANCE_SOUND', ".
						"ALLOW_BUZZ_SOUND = '$vALLOW_BUZZ_SOUND', ".
						"BUZZ_SOUND = '$vBUZZ_SOUND', ".
						"TOPIC_DIFF = '$vTOPIC_DIFF', ".
						"SHOW_TUT = '$vSHOW_TUT', ".
						"SHOW_INFO = '$vSHOW_INFO', ".
						"SET_CMDS = '$vSET_CMDS', ".
						"CMDS = '$vCMDS', ".
						"SET_MODS = '$vSET_MODS', ".
						"MODS = '$vMODS', ".
						"SET_BOT = '$vSET_BOT', ".
						"ROOM_SAYS = '$vROOM_SAYS', ".
						"DEMOTE_MOD = '$vDEMOTE_MOD', ".
						"PRIV_POPUP = '$vPRIV_POPUP', ".
						"SHOW_ETIQ_IN_HELP = '$vSHOW_ETIQ_IN_HELP', ".
						"SHOW_LOGO = '$vSHOW_LOGO', ".
						"LOGO_IMG = '$vLOGO_IMG', ".
						"LOGO_OPEN = '$vLOGO_OPEN', ".
						"LOGO_ALT = '$vLOGO_ALT', ".
						"SHOW_OWNER = '$vSHOW_OWNER', ".
						"SHOW_PRIV = '$vSHOW_PRIV', ".
						"SHOW_PRIV_MOD = '$vSHOW_PRIV_MOD', ".
						"SHOW_PRIV_USR = '$vSHOW_PRIV_USR', ".
						"SHOW_COUNTER = '$vSHOW_COUNTER', ".
						"INSTALL_DATE = '$vINSTALL_DATE', ".
						"USE_SKIN = '$vUSE_SKIN', ".
						"ROOM1 = '$vROOM1', ".
						"ROOM2 = '$vROOM2', ".
						"ROOM3 = '$vROOM3', ".
						"ROOM4 = '$vROOM4', ".
						"ROOM5 = '$vROOM5', ".
						"ROOM6 = '$vROOM6', ".
						"ROOM7 = '$vROOM7', ".
						"ROOM8 = '$vROOM8', ".
						"ROOM9 = '$vROOM9', ".
						"SWEAR1 = '$vSWEAR1', ".
						"SWEAR2 = '$vSWEAR2', ".
						"SWEAR3 = '$vSWEAR3', ".
						"SWEAR4 = '$vSWEAR4', ".
						"COLOR_FILTERS = '$vCOLOR_FILTERS', ".
						"COLOR_ALLOW_GUESTS = '$vCOLOR_ALLOW_GUESTS', ".
						"COLOR_CD1 = '$vCOLOR_CD1', ".
						"COLOR_CD2 = '$vCOLOR_CD2', ".
						"COLOR_CD3 = '$vCOLOR_CD3', ".
						"COLOR_CD4 = '$vCOLOR_CD4', ".
						"COLOR_CD5 = '$vCOLOR_CD5', ".
						"COLOR_CD6 = '$vCOLOR_CD6', ".
						"COLOR_CD7 = '$vCOLOR_CD7', ".
						"COLOR_CDC1 = '$vCOLOR_CDC1', ".
						"COLOR_CDC2 = '$vCOLOR_CDC2', ".
						"COLOR_CDC3 = '$vCOLOR_CDC3', ".
						"COLOR_CDC4 = '$vCOLOR_CDC4', ".
						"COLOR_CDC5 = '$vCOLOR_CDC5', ".
						"COLOR_CDC6 = '$vCOLOR_CDC6', ".
						"COLOR_CDC7 = '$vCOLOR_CDC7', ".
						"QUICKA = '$vQUICKA', ".
						"QUICKM = '$vQUICKM', ".
						"QUICKU = '$vQUICKU', ".
						"COLOR_NAMES = '$vCOLOR_NAMES', ".
						"USE_AVATARS = '$vUSE_AVATARS', ".
						"NUM_AVATARS = '$vNUM_AVATARS', ".
						"AVA_RELPATH = '$vAVA_RELPATH', ".
						"DEF_AVATAR = '$vDEF_AVATAR', ".
						"AVA_WIDTH = '$vAVA_WIDTH', ".
						"AVA_HEIGHT = '$vAVA_HEIGHT', ".
						"AVA_PROFBUTTON = '$vAVA_PROFBUTTON', ".
						"MAX_DICES = '$vMAX_DICES', ".
						"MAX_ROLLS = '$vMAX_ROLLS', ".
						"BOT_CONTROL = '$vBOT_CONTROL', ".
						"MAX_PIC_SIZE = '$vMAX_PIC_SIZE', ".
						"USERS_SORT_ORD = '$vUSERS_SORT_ORD', ".
						"CHAT_LOGS = '$vCHAT_LOGS', ".
						"LOG_DIR = '$vLOG_DIR', ".
						"SHOW_LOGS_USR = '$vSHOW_LOGS_USR', ".
						"CHAT_LURKING = '$vCHAT_LURKING', ".
						"SHOW_LURK_USR = '$vSHOW_LURK_USR', ".
						"BAN_IP = '$vBAN_IP', ".
						"REG_CHARS_ALLOWED = '$vREG_CHARS_ALLOWED', ".
						"EXIT_LINK_TYPE = '$vEXIT_LINK_TYPE', ".
						"CHAT_EXTRAS = '$vCHAT_EXTRAS', ".
						"EMAIL_USER = '$vEMAIL_USER'".
            " WHERE ID='0'";

if(C_BOT_NAME != $vBOT_NAME || C_BOT_FONT_COLOR != $vBOT_FONT_COLOR || BOT_AVATAR != $vBOT_AVATAR)
{
  $query_bot = "UPDATE bot_bot SET ".
						"value = '$vBOT_NAME'".
            " WHERE ID='1'";
  $query_bot1 = "UPDATE bot_bots SET ".
						"botname = '$vBOT_NAME'".
            " WHERE ID='1'";

  $query_bot2 = "UPDATE ".C_REG_TBL." SET ".
						"username = '$vBOT_NAME', ".
						"colorname = '$vBOT_FONT_COLOR', ".
						"avatar = '$vBOT_AVATAR'".
            " WHERE email='bot@bot.bot.com'";

   mysql_query($query_bot);
   mysql_query($query_bot1);
   mysql_query($query_bot2);
}
   mysql_query($query);

		echo "<TABLE BORDER=0 CELLPADDING=3 CLASS=menu><TR><TD CLASS=success ALIGN=CENTER>Configuration Settings Changed Successfully!</TD></TR></TABLE>";

	if(C_LOG_DIR != $vLOG_DIR)
	{
	  echo "<P><TABLE BORDER=0 CELLPADDING=3 CLASS=menu><TR><TD CLASS=notify2 ALIGN=CENTER VALIGN=TOP>Important!</TD><TD CLASS=success ALIGN=CENTER>Don't forget to change remotely the name of <SPAN style=background-color:white>".C_LOG_DIR."</SPAN> directory to <SPAN style=background-color:white>".$vLOG_DIR."</SPAN><br>and set its the atributes to <b>777</b>!</TD></TR></TABLE></P>";
	}
	if((C_USE_AVATARS != $vUSE_AVATARS) || (COLOR_NAMES != $vCOLOR_NAMES) || (C_PRIV_POPUP != $vPRIV_POPUP))
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES (1, 'Admin Panel', 'SYS announce', '', ".time().", ' *', '".L_RELOAD_CHAT."', '')");
	}
}
else
{
// Credit for this goes to Pete Soheil <webmaster@digioz.com>.
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

?>
<P CLASS=title><?php echo(APP_NAME); ?> Configuration Page</P>

<FORM ACTION="<?php echo("$From?$URLQueryBody"); ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="Form5">
		<INPUT TYPE=hidden NAME="From" value="<?php echo($From); ?>">
		<INPUT TYPE=hidden NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
		<INPUT TYPE=hidden NAME="pmc_password" value="<?php echo($pmc_password); ?>">
		<INPUT TYPE=hidden NAME="startCfg" value="<?php echo($startCfg); ?>">
		<INPUT TYPE=hidden NAME="FORM_SEND" value="5">
<table align="center" width="780" CLASS=table>
		<TR CLASS=\"thumbIndex\">
			<TD VALIGN=CENTER ALIGN=CENTER height="20" CLASS=tabtitle>Configuration Options
				</TD>
			<TD VALIGN=CENTER ALIGN=CENTER height="20" CLASS=tabtitle>Selected Settings
			</TD>
		</TR>
<tr>
    <td><b>Clean-up time for old messages (hours):</b></td>
    <td><input name="vMSG_DEL" type="text" size="1" maxlength="3" value="<? echo $MSG_DEL; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Autoboot time for inactive users in rooms (minutes):</b><br>
    	<i>Hint:  This autoboot feature forces users to be active in rooms. If they want to be lurking, they should just use the lurking page; admins, moderators and away users won't be booted (but keep this secret... until they will notice anyway).</i><br>
    	Clean-up time for users already left from rooms by closing their browsers or kicked by admin it's set to 1 minute.
    	</td>
    <td><input name="vUSR_DEL" type="text" size="1" maxlength="2" value="<? echo $USR_DEL; ?>"></td>
</tr>
<tr>
    <td><b>Clean-up time for registered users not active in this interval (days):</b><br>
    							(0 for never)
    </td>
    <td><input name="vREG_DEL" type="text" size="1" maxlength="4" value="<? echo $REG_DEL; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default Language for Chatroom:</b></td>
    <td><input name="vLANGUAGE" type="text" size="35" maxlength="20" value="<? echo $LANGUAGE; ?>"></td>
</tr>
<tr>
    <td><b>Allow multi-languages/charset:</b></td>
    <td>
        <select name="vMULTI_LANG">
	        <option value="0"<? if($MULTI_LANG==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($MULTI_LANG==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Require Registration to join chat:</b></td>
    <td>
        <select name="vREQUIRE_REGISTER">
	        <option value="0"<? if($REQUIRE_REGISTER==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($REQUIRE_REGISTER==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Users <b>MUST</b> enter their First and Last Names on registration:</b></td>
    <td>
        <select name="vREQUIRE_NAMES">
	        <option value="0"<? if($REQUIRE_NAMES==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($REQUIRE_NAMES==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Email Password to new registered users:</b></td>
    <td>
        <select name="vEMAIL_PASWD">
	        <option value="0"<? if($EMAIL_PASWD==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($EMAIL_PASWD==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter the length of the password to be generated and sent by email:</b></td>
    <td><input name="vPASS_LENGTH" type="text" size="2" maxlength="2" value="<? echo $PASS_LENGTH; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Send notifications to admin on new user registration:</b></td>
    <td>
        <select name="vADMIN_NOTIFY">
	        <option value="0"<? if($ADMIN_NOTIFY==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($ADMIN_NOTIFY==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Send account details to the new registered user:</b></td>
    <td>
        <select name="vEMAIL_USER">
	        <option value="0"<? if($EMAIL_USER==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($EMAIL_USER==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter admin real name (or chat name) to be sent on email headers:</b></td>
    <td><input name="vADMIN_NAME" type="text" size="35" maxlength="35" value="<? echo $ADMIN_NAME; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter admin email to be sent on email headers:</b><br>
    	<i>Hint: also to receive notifications on new user registration</i>
    	</td>
    <td><input name="vADMIN_EMAIL" type="text" size="35" maxlength="35" value="<? echo $ADMIN_EMAIL; ?>"></td>
</tr>
<tr>
    <td><b>Enter your chat URL to be sent on email headers:</b></td>
    <td><input name="vCHAT_URL" type="text" size="35" maxlength="50" value="<? echo $CHAT_URL; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show Administration link on index:</b><br>
    												(to open this Administration Menu)
    </td>
    <td>
        <select name="vSHOW_ADMIN">
	        <option value="0"<? if($SHOW_ADMIN==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_ADMIN==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Show Delete link on index</b><br>
    			(to allow users delete their own profile):</td>
    <td>
        <select name="vSHOW_DEL_PROF">
	        <option value="0"<? if($SHOW_DEL_PROF==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_DEL_PROF==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Types of Rooms Available for users:</b><br>
                  0 : only the first room within the public default ones<br>
                  1 : all the public default rooms but not create a room<br>
                  2 : all the rooms and create new ones
    </td>
    <td>
        <select name="vVERSION">
	        <option value="0"<? if($VERSION==0){ echo " selected"; } ?>>0-Only the first room
	        <option value="1"<? if($VERSION==1){ echo " selected"; } ?>>1-All public rooms
	        <option value="2"<? if($VERSION==2){ echo " selected"; } ?>>2-Create new rooms
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable banishment feature and define the delay for it (days):</b><br>
    0 = disabled, any integer = day(s) for banishment</td>
    <td><input name="vBANISH" type="text" size="1" maxlength="3" value="<? echo $BANISH; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Profanity filter:</b><br>
    											(replacement of posted swear words with the value bellow)
    </td>
    <td>
        <select name="vNO_SWEAR">
	        <option value="0"<? if($NO_SWEAR==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($NO_SWEAR==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Expression to replace the swear words with:</b></td>
    <td><input name="vSWEAR_EXPR" type="text" size="1" maxlength="5" value="<? echo $SWEAR_EXPR; ?>"></td>
</tr>
<tr>
    <td><b>Max number of messages that user may export:</b><br>
    								(0=disable, any integer=number of messages, *=no limit)
    </td>
    <td><input name="vSAVE" type="text" size="1" maxlength="2" value="<? echo $SAVE; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Use graphical smilies in messages:</b></td>
    <td>
        <select name="vUSE_SMILIES">
	        <option value="0"<? if($USE_SMILIES==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($USE_SMILIES==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Keep HTML tags in messages:</b><br>
    <b>simple</b>: keep bold, italic and underline tags<br>
    <b>none</b>: keep none</td>
    <td>
        <select name="vHTML_TAGS_KEEP">
	        <option value="0"<? if($HTML_TAGS_KEEP=='simple'){ echo " selected"; } ?>>Simple
	        <option value="1"<? if($HTML_TAGS_KEEP=='none'){ echo " selected"; } ?>>None
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show discarded HTML tags:</b></td>
    <td>
        <select name="vHTML_TAGS_SHOW">
	        <option value="0"<? if($HTML_TAGS_SHOW==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($HTML_TAGS_SHOW==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Timezone offset:</b><br>
    			- the difference between the Chat server time and GMT (UMT) - Greenwich (hours)
    </td>
    <td><input name="vTMZ_OFFSET" type="text" size="1" maxlength="2" value="<? echo $TMZ_OFFSET; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default messages scroll order:</b><br>
    												(only for non-"H" browsers - others than IE)<br>
    												<i>Hint: users can also use /order command to change this behaviour.</i>
    </td>
    <td>
        <select name="vMSG_ORDER">
	        <option value="0"<? if($MSG_ORDER==0){ echo " selected"; } ?>>Last on Top
	        <option value="1"<? if($MSG_ORDER==1){ echo " selected"; } ?>>Last on Bottom
        </select>
    </td>
</tr>
<tr>
    <td><b>Default number of messages to display on join:</b><br>
    			<i>Hint: users can also use /show "n" or /last "n" commands to view a different amount.</i>
    </td>
    <td><input name="vMSG_NB" type="text" size="1" maxlength="2" value="<? echo $MSG_NB; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default timeout between each update (seconds):</b></td>
    <td><input name="vMSG_REFRESH" type="text" size="1" maxlength="2" value="<? echo $MSG_REFRESH; ?>"></td>
</tr>
<tr>
    <td><b>Show Timsestamp in front of the message:</b><br>
    			(also shows the Server Time in the Status bar)
    </td>
    <td>
        <select name="vSHOW_TIMESTAMP">
	        <option value="0"<? if($SHOW_TIMESTAMP==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_TIMESTAMP==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show nofications on every user's entrance/exit in Chat rooms</b>:</td>
    <td>
        <select name="vNOTIFY">
	        <option value="0"<? if($NOTIFY==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($NOTIFY==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Display a Welcome Message when user enters chatroom:</b></td>
    <td>
        <select name="vWELCOME">
	        <option value="0"<? if($WELCOME==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($WELCOME==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Number of smilies on a row in tutorial/help:</b></td>
    <td><input name="vSMILEY_COLS" type="text" size="1" maxlength="2" value="<? echo $SMILEY_COLS; ?>"></td>
</tr>
<tr>
    <td><b>Number of smilies on a row in smilie_popup:</b></td>
    <td><input name="vSMILEY_COLS_POP" type="text" size="1" maxlength="2" value="<? echo $SMILEY_COLS_POP; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Play a sound on entrance:</b></td>
    <td>
        <select name="vALLOW_ENTRANCE_SOUND">
	        <option value="0"<? if($ALLOW_ENTRANCE_SOUND==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($ALLOW_ENTRANCE_SOUND==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Path to the sound to be played (.wav):</b><br>
    				Example: 'sounds/beep.wav' (include the quotes if you use long URL's)
    	</td>
    <td><input name="vENTRANCE_SOUND" type="text" size="35" maxlength="255" value="<? echo $ENTRANCE_SOUND; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Play a buzz sound on /buzz command:</b><br>
    												(or just display a message without any sound)
    	</td>
    <td>
        <select name="vALLOW_BUZZ_SOUND">
	        <option value="0"<? if($ALLOW_BUZZ_SOUND==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($ALLOW_BUZZ_SOUND==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Path to the buzz sound to be played (.wav):</b><br>
    				Example: 'sounds/chimedwn.wav' (include the quotes if you use long URL's)
    	</td>
    <td><input name="vBUZZ_SOUND" type="text" size="35" maxlength="255" value="<? echo $BUZZ_SOUND; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Different Topics for each room:</b><br>
    												(or just display a default one - topics must be edited in banner.php)
    	</td>
    <td>
        <select name="vTOPIC_DIFF">
	        <option value="0"<? if($TOPIC_DIFF==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($TOPIC_DIFF==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Display the Tutorial link on index page:</b></td>
    <td>
        <select name="vSHOW_TUT">
	        <option value="0"<? if($SHOW_TUT==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_TUT==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. Show Default Private rooms on index page:</b><br>
    			<i>Hint: Not all the private rooms will be shown as options for all the users (see next two settings)<br>
    				This option will just let the <b>admins</b> see all default private rooms, but is <u><b>required</b></u> for the next two to work.</i>
    	</td>
    <td>
        <select name="vSHOW_PRIV">
	        <option value="0"<? if($SHOW_PRIV==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_PRIV==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>2. Show Default Private rooms on index page to MODERATORS:</b><br>
    			<i>Hint: Moderators will only see room 8 and 9 (Staff and Support). Setting no.1 is required.</i>
    	</td>
    <td>
        <select name="vSHOW_PRIV_MOD">
	        <option value="0"<? if($SHOW_PRIV_MOD==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_PRIV_MOD==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Show Default Private rooms on index page to NORMAL USERS:</b><br>
    			<i>Hint: Non-power users (including guests) will only see room 9 (Support). Setting no.1 is required.</i>
    	</td>
    <td>
        <select name="vSHOW_PRIV_USR">
	        <option value="0"<? if($SHOW_PRIV_USR==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_PRIV_USR==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable Info on index page:</b><br>
    												(contain some info about the chat extra-features)
    	</td>
    <td>
        <select name="vSHOW_INFO">
	        <option value="0"<? if($SHOW_INFO==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_INFO==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display Extra commands available:</b></td>
    <td>
        <select name="vSET_CMDS">
	        <option value="0"<? if($SET_CMDS==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SET_CMDS==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>List your extra commands:</b><br>
    												(don't remove the first break and use it anytime to split the line)
    	</td>
    <td><input name="vCMDS" type="text" size="35" maxlength="255" value="<? echo $CMDS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display Other Extra features/mods available:</b></td>
    <td>
        <select name="vSET_MODS">
	        <option value="0"<? if($SET_MODS==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SET_MODS==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>List your extra features/mods:</b><br>
    												(don't remove the first break and use it anytime to split the line)
    	</td>
    <td><input name="vMODS" type="text" size="35" maxlength="255" value="<? echo $MODS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the name of your bot (if available):</b></td>
    <td>
        <select name="vSET_BOT">
	        <option value="0"<? if($SET_BOT==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SET_BOT==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter the expression for the /room command:</b><br>
    												Exemples: Attention Room:, Narator Says:, Read this:, Author says:
    	</td>
    <td><input name="vROOM_SAYS" type="text" size="35" maxlength="25" value="<? echo $ROOM_SAYS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Allow moderators to use /demote command:</b><br>
    				NO - only admins will demote moderators.<br>
    				YES - also moderators will be able to demote other moderators.
    	</td>
    <td>
        <select name="vDEMOTE_MOD">
	        <option value="0"<? if($DEMOTE_MOD==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($DEMOTE_MOD==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable popup whispers (private messages) system:</b><br>
    				(if enabled, guests cannot disable popups - they must register)<br>
    		<i>Hint: can be also disabled by each user in their profile<br>
    	<font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i>
    	</td>
    <td>
        <select name="vPRIV_POPUP">
	        <option value="0"<? if($PRIV_POPUP==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($PRIV_POPUP==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the Chat Etiquette on top of the Help popup (Chat rules):</b></td>
    <td>
        <select name="vSHOW_ETIQ_IN_HELP">
	        <option value="0"<? if($SHOW_ETIQ_IN_HELP==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_ETIQ_IN_HELP==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Display a LOGO image on index page:</b></td>
    <td>
        <select name="vSHOW_LOGO">
	        <option value="0"<? if($SHOW_LOGO==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_LOGO==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Path to the LOGO image:</b><br>
    			<i>Hint: Logo image to show - e.g. http://ciprianmp.com/forum/my_logo.jpg</i><br>
    			(my_logo.jpg can be any image accessible on the web - .jpg, .gif, .bmp, .png)
    	</td>
    <td><input name="vLOGO_IMG" type="text" size="35" maxlength="255" value="<? echo $LOGO_IMG; ?>"></td>
</tr>
<tr>
    <td><b>URL to open by LOGO (opens in new window):</b></td>
    <td><input name="vLOGO_OPEN" type="text" size="35" maxlength="255" value="<? echo $LOGO_OPEN; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Text to display by LOGO on MouseOver (the ALT property):</b><br>
    			<i>Hint: Keep the quotation marks to use spaces in your text</i>
    	</td>
    <td><input name="vLOGO_ALT" type="text" size="35" maxlength="255" value="<? echo $LOGO_ALT; ?>"></td>
</tr>
<tr>
    <td><b>Show counter (hits) on index page:</b></td>
    <td>
        <select name="vSHOW_COUNTER">
	        <option value="0"<? if($SHOW_COUNTER==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_COUNTER==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show owner/webmaster of the chat info on index page (bellow the copyright link):</b><br>
    	<i>Hint: It is the same name/text you entered in the registration section - Admin name/Chat name</i>
    	</td>
    <td>
        <select name="vSHOW_OWNER">
	        <option value="0"<? if($SHOW_OWNER==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($SHOW_OWNER==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Edit the installation date of your plus version:</b><br>
				(the date since the counter had been suposed to start - keep the format to max 10 chars length)
    	</td>
    <td><input name="vINSTALL_DATE" type="text" size="35" maxlength="255" value="<? echo $INSTALL_DATE; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable skin mod in rooms:</b></td>
    <td>
        <select name="vUSE_SKIN">
	        <option value="0"<? if($USE_SKIN==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($USE_SKIN==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>1. First Public room name (also <u>default</u> if none selected):</b></td>
    <td><input name="vROOM1" type="text" size="35" maxlength="25" value="<? echo $ROOM1; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>2. Second Public room name:</b></td>
    <td><input name="vROOM2" type="text" size="35" maxlength="25" value="<? echo $ROOM2; ?>"></td>
</tr>
<tr>
    <td><b>3. Third Public room name:</b></td>
    <td><input name="vROOM3" type="text" size="35" maxlength="25" value="<? echo $ROOM3; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>4. Forth Public room name:</b></td>
    <td><input name="vROOM4" type="text" size="35" maxlength="25" value="<? echo $ROOM4; ?>"></td>
</tr>
<tr>
    <td><b>5. Fifth Public room name:</b></td>
    <td><input name="vROOM5" type="text" size="35" maxlength="25" value="<? echo $ROOM5; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>6. First Private room name:</b><br>
    			<i>Note: This is displayed on login only to admin(s)</i>
    	</td>
    <td><input name="vROOM6" type="text" size="35" maxlength="25" value="<? echo $ROOM6; ?>"></td>
</tr>
<tr>
    <td><b>7. Second Private room name (also default if none selected):</b><br>
    			<i>Note: This is displayed on login only to admin(s)</i>
    	</td>
    <td><input name="vROOM7" type="text" size="35" maxlength="25" value="<? echo $ROOM7; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>8. Third Private room name:</b><br>
    			<i>Note: This is displayed on login to all power users (fits for staff only rooms)</i>
    	</td>
    <td><input name="vROOM8" type="text" size="35" maxlength="25" value="<? echo $ROOM8; ?>"></td>
</tr>
<tr>
    <td><b>9. Forth Private room name:</b><br>
    			<i>Note: This is displayed by default on login to all users (fits for support like rooms)</i>
    	</td>
    <td><input name="vROOM9" type="text" size="35" maxlength="25" value="<? echo $ROOM9; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. Room name to show swear words (avoid the filter):</b><br>
    			<i>Note: You must enter the exact name of the room.</i>
    	</td>
    <td><input name="vSWEAR1" type="text" size="35" maxlength="25" value="<? echo $SWEAR1; ?>"></td>
</tr>
<tr>
    <td><b>2. Room name to show swear words (avoid the filter):</b></td>
    <td><input name="vSWEAR2" type="text" size="35" maxlength="25" value="<? echo $SWEAR2; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Room name to show swear words (avoid the filter):</b></td>
    <td><input name="vSWEAR3" type="text" size="35" maxlength="25" value="<? echo $SWEAR3; ?>"></td>
</tr>
<tr>
    <td><b>4. Room name to show swear words (avoid the filter):</b></td>
    <td><input name="vSWEAR4" type="text" size="35" maxlength="25" value="<? echo $SWEAR4; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable color filter in messages:</b><br>
    	<i>Hint: If enabled, all the users can use any color, if not, all but <b>red, forest, blue and mediumblue</b> (power colors).<br>
    The color filters reffer to default color of the rooms (defined in each style(n).css.php/.php3 by the variable $CD).</i>
    	</td>
    <td>
        <select name="vCOLOR_FILTERS">
	        <option value="0"<? if($COLOR_FILTERS==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($COLOR_FILTERS==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Allow guests to use colors:</b><br>
    	<i>Hint: If disabled, unregistered users will only use the default color for that room in their messages.<br>
    		This will encourage them to register (hopefully).</i>
    	</td>
    <td>
        <select name="vCOLOR_ALLOW_GUESTS">
	        <option value="0"<? if($COLOR_ALLOW_GUESTS==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($COLOR_ALLOW_GUESTS==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. First skin (style) default Color (to filter the users' color usage by power):</b><br>
    			<i><font color=red>Important: Don't change these values if you haven't changed the $CD variable in the according config/style(n).css.php file.</font><br>
    				Hint: The following color names/HEX codes cannot be used in filters:<br>
    				- red, forest, FF0000, #FF0000 - default for admin(s);<br>
    				- blue, mediumblue, 0000FF, 0000CD, #0000FF, #0000CD - default for moderators.</i>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD1" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD1; ?>">
    Code:&nbsp;&nbsp;<input name="vCOLOR_CDC1" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC1; ?>">
    	</td>
</tr>
<tr>
    <td><b>2. Second skin (style) default Color:</b><br>
    			<i>Hint: read hint no 1. above.</i><br>
    				<a href="<?php echo($ChatPath); ?>colorchart.htm" onMouseOver="window.status='Click to open the HTML Color Chat.'; return true" target="_blank" class="ChatLink">Open the HTML version of the Color Chart to select your colors</a>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD2" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD2; ?>">
    <br>Code:&nbsp;&nbsp;<input name="vCOLOR_CDC2" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC2; ?>">
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Third skin (style) default Color:</b><br>
    			<i>Hint: read hint no 1. above.</i>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD3" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD3; ?>">
    <br>Code:&nbsp;&nbsp;<input name="vCOLOR_CDC3" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC3; ?>">
    	</td>
</tr>
<tr>
    <td><b>4. Forth skin (style) default Color:</b><br>
    			<i>Hint: read hint no 1. above.</i>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD4" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD4; ?>">
    <br>Code:&nbsp;&nbsp;<input name="vCOLOR_CDC4" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC4; ?>">
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>5. Fifth skin (style) default Color:</b><br>
    			<i>Hint: read hint no 1. above.</i>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD5" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD5; ?>">
    <br>Code:&nbsp;&nbsp;<input name="vCOLOR_CDC5" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC5; ?>">
    	</td>
</tr>
<tr>
    <td><b>6. Sixth skin (style) default Color:</b><br>
    			<i>Hint: read hint no 1. above.</i>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD6" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD6; ?>">
    <br>Code:&nbsp;&nbsp;<input name="vCOLOR_CDC6" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC6; ?>">
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>7. Seventh skin (style) default Color:</b><br>
    			<i>Hint: read hint no 1. above.</i>
    	</td>
    <td>Name:&nbsp;<input name="vCOLOR_CD7" type="text" size="28" maxlength="25" value="<? echo $COLOR_CD7; ?>">
    <br>Code:&nbsp;&nbsp;<input name="vCOLOR_CDC7" type="text" size="28" maxlength="6" value="<? echo $COLOR_CDC7; ?>">
    	</td>
</tr>
<tr>
    <td><b>Define the Quick Menu for admin(s):</b><br>
    			<i>Hint: keep these chars: <b>|</b> at the end of each line but the last one<br>
    				Empty the box to hide Quick Menu.</i>
    	</td>
    <td><textarea name="vQUICKA" rows=5 cols=37 wrap=on><? echo $QUICKA; ?></textarea></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Define the Quick Menu for moderators:</b><br>
    			<i>Hint: keep these chars: <b>|</b> at the end of each line but the last one<br>
    				Empty the box to hide Quick Menu.</i>
    	</td>
    <td><textarea name="vQUICKM" rows=5 cols=37 wrap=on><? echo $QUICKM; ?></textarea></td>
</tr>
<tr>
    <td><b>Define the Quick Menu for other users:</b><br>
    			<i>Hint: keep these chars: <b>|</b> at the end of each line but the last one<br>
    				Empty the box to hide Quick Menu.</i>
    	</td>
    <td><textarea name="vQUICKU" rows=5 cols=37 wrap=on><? echo $QUICKU; ?></textarea></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable different Colored Names in users list:</b><br>
    	<i><font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font><br>
    	Hint: If enabled, users can set their personal color to use for their usernames in users list.<br>
    	If disabled, admins will be show in red and moderators in blue (their default power colors).</i>
    </td>
    <td>
        <select name="vCOLOR_NAMES">
	        <option value="0"<? if($COLOR_NAMES==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($COLOR_NAMES==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable AVATAR System:</b><br>
    	<i><font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i>
    	</td>
    <td>
        <select name="vUSE_AVATARS">
	        <option value="0"<? if($USE_AVATARS==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($USE_AVATARS==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the number of avatars in your defined folder</b></td>
    <td><input name="vNUM_AVATARS" type="text" size="2" maxlength="3" value="<? echo $NUM_AVATARS; ?>"></td>
</tr>
<tr>
    <td><b>The path to your avatar dir:</b></td>
    <td><input name="vAVA_RELPATH" type="text" size="35" maxlength="55" value="<? echo $AVA_RELPATH; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Users default avatar:</b></td>
    <td><input name="vDEF_AVATAR" type="text" size="35" maxlength="55" value="<? echo $DEF_AVATAR; ?>"></td>
</tr>
<tr>
    <td><b>Enter the width for the avatars to be shown</b></td>
    <td><input name="vAVA_WIDTH" type="text" size="2" maxlength="3" value="<? echo $AVA_WIDTH; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the height for the avatars to be shown</b><br>
    	<i>Hint: Usually, for a nice layout, width and hight values should be equal.</i>
    	</td>
    <td><input name="vAVA_HEIGHT" type="text" size="2" maxlength="3" value="<? echo $AVA_HEIGHT; ?>"></td>
</tr>
<tr>
    <td><b>Show Change Avatar (Profile) button in input bar:</b></td>
    <td>
        <select name="vAVA_PROFBUTTON">
	        <option value="0"<? if($AVA_PROFBUTTON==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($AVA_PROFBUTTON==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the max number of dices per throw</b><br>
    	<i>Hint: Needed ONLY for Dice v.2. Use a value smaller than 99. Please note that increasing this value too much, will lead to a load of how many dices images you choose, which can return delays displaying the messages (drastically for non-IE browsers)</i>
    		</td>
    <td><input name="vMAX_DICES" type="text" size="2" maxlength="2" value="<? echo $MAX_DICES; ?>"></td>
</tr>
<tr>
    <td><b>Enter the max number of rolls per dice</b></td>
    <td><input name="vMAX_ROLLS" type="text" size="2" maxlength="3" value="<? echo $MAX_ROLLS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable BOT in chat:</b><br>
    	<i>Hint: Before changing any of the bot settings bellow, please stop the bot if it is running in the chat<br>
    		(you won't be able to kick it out afterwards, because it is set as admin)</i>
    	</td>
    <td>
        <select name="vBOT_CONTROL">
	        <option value="0"<? if($BOT_CONTROL==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($BOT_CONTROL==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter the desired name for your BOT:</b></td>
    <td><input name="vBOT_NAME" type="text" size="35" maxlength="25" value="<? echo $BOT_NAME; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the color of the response messages from BOT:</b></td>
    <td><input name="vBOT_FONT_COLOR" type="text" size="35" maxlength="20" value="<? echo $BOT_FONT_COLOR; ?>"></td>
</tr>
<tr>
    <td><b>Enter the avatar of the BOT</b><br>
    	<i>Hint: It will be shown only if the avatar system is enabled</i>
    	</td>
    <td><input name="vBOT_AVATAR" type="text" size="35" maxlength="255" value="<? echo $BOT_AVATAR; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the maximum size for resizing posted pictures using /img command</b></td>
    <td><input name="vMAX_PIC_SIZE" type="text" size="2" maxlength="3" value="<? echo $MAX_PIC_SIZE; ?>"></td>
</tr>
<tr>
    <td><b>Default sort order in the users lists:</b><br>
    	<i>Hint: users can also use the /sort command to change their sorting order</i>
    	</td>
    <td>
        <select name="vUSERS_SORT_ORD">
	        <option value="0"<? if($USERS_SORT_ORD==0){ echo " selected"; } ?>>By entrance
	        <option value="1"<? if($USERS_SORT_ORD==1){ echo " selected"; } ?>>Alphabetically
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable chat logging:</b><br>
    	<i>Hint: it will generate html files of the cleaner deleted conversations. The full version can be accessed via the admin advanced menu, the short version from the Extra Options menu in chat rooms.</i>
    	</td>
    <td>
        <select name="vCHAT_LOGS">
	        <option value="0"<? if($CHAT_LOGS==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($CHAT_LOGS==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr>
    <td><b>Set the name of your admin logs folder:</b><br>
    	<i><font color=red>Important: rename the original "logsadmin" folder to a hard to guess name for your full logs folder.</font><br>
    		Hint: This is different from the user accessible one (called logs), which doesn't include any private/confidential data from your chat conversations/actions.</i>
    		</td>
    <td><input name="vLOG_DIR" type="text" size="35" maxlength="25" value="<? echo $LOG_DIR; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display logs to non-admin users in chat:</b><br>
    	<i>Hint: Only if Chat logging is enabled.</i>
    	</td>
    <td>
        <select name="vSHOW_LOGS_USR">
	        <option value="0"<? if($SHOW_LOGS_USR==0){ echo " selected"; } ?>>Hide
	        <option value="1"<? if($SHOW_LOGS_USR==1){ echo " selected"; } ?>>Show
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable chat lurking:</b><br>
    	<i>Hint: it will allow people monitor public conversations and events in the chat, even without loging in.</i>
    	</td>
    <td>
        <select name="vCHAT_LURKING">
	        <option value="0"<? if($CHAT_LURKING==0){ echo " selected"; } ?>>No
	        <option value="1"<? if($CHAT_LURKING==1){ echo " selected"; } ?>>Yes
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display lurking page to non-admin users in chat and login page:</b><br>
    	<i>Hint: Only if Chat lurking is enabled.</i>
    	</td>
    <td>
        <select name="vSHOW_LURK_USR">
	        <option value="0"<? if($SHOW_LURK_USR==0){ echo " selected"; } ?>>Hide
	        <option value="1"<? if($SHOW_LURK_USR==1){ echo " selected"; } ?>>Show
        </select>
    </td>
</tr>
<tr>
    <td><b>Banishment type:</b><br>
    	<i>Hint: ban only by IP or, by IP and username simultaneously (useful when the banned user comes from a shared IP or for parental control purposes)</i>
    	</td>
    <td>
        <select name="vBAN_IP">
	        <option value="0"<? if($BAN_IP==0){ echo " selected"; } ?>>IP and username
	        <option value="1"<? if($BAN_IP==1){ echo " selected"; } ?>>Only IP
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the characters you wish your users to be allowed to use on registration/login:</b><br>
    	<i>Hint: This is the default set of chars: </i><b>a-zA-Z0-9_.-@#$%^&*()=<>?~{}|`:</b><i> tested for login, which won't break the layout/functionality of your chat.<br>
    		<font color=red>Important: Don't allow these characters as they will break your chat page after login: exclamation mark, slash, backslash, comma, space, single and double quotes and square (box) brackets (e.g. <b>! / \ , ' " [ ]</b>)</font><br></i>
    		Eventough they won't break anything, it seems / and ; can't be banned from being used in login names.
    		</td>
    <td><input name="vREG_CHARS_ALLOWED" type="text" size="35" maxlength="50" value="<? echo $REG_CHARS_ALLOWED; ?>"></td>
</tr>
<tr>
    <td><b>Exit link type:</b><br>
    	<i>Hint: Link stands for the original Exit link, Door rolling stands for the image of such a door</i>
    	</td>
    <td>
        <select name="vEXIT_LINK_TYPE">
	        <option value="0"<? if($EXIT_LINK_TYPE==0){ echo " selected"; } ?>>Exit link
	        <option value="1"<? if($EXIT_LINK_TYPE==1){ echo " selected"; } ?>>Door rolling
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable the Chat extras in admin panel:</b></td>
    <td>
        <select name="vCHAT_EXTRAS">
	        <option value="0"<? if($CHAT_EXTRAS==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($CHAT_EXTRAS==1){ echo " selected"; } ?>>Enable
        </select>
    </td>
</tr>
		<!-- Navigation cells at the footer -->
		<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=0 width="780" CLASS="tabletitle">
		<TR>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=70 HEIGHT=20 CLASS=tabtitle>
				<?php
			$TotalPages = 1;
			if ($startCfg > 0)
			{
				$downCfg = $startCfg - 1;
				if ($downCfg < 0) $downCfg = "0";
				?>
				&nbsp;<A HREF="<?php echo("$From?$$URLQueryBody_MoveLinks"); ?>"><IMG SRC="images/admin/<?php echo($BeginGif); ?>" HEIGHT=20 WIDTH=21 BORDER=0></A>
				&nbsp;&nbsp;&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks"); ?>"><IMG SRC="images/admin/<?php echo($DownGif); ?>" HEIGHT=20 WIDTH=20 BORDER=0></A>
				<?php
			}
			else
			{
				echo("&nbsp");
			};
			?>
			</TD>
			<TD ALIGN=CENTER VALIGN=CENTER HEIGHT=20 CLASS=tabtitle>
				<SPAN CLASS="small">
				<?php
				$PageNum = ceil(($startCfg + 1));
				echo(sprintf(A_PAGE_CNT,$PageNum,$TotalPages)."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; ".A_MENU_5);
				?>
				</SPAN>
			</TD>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=70 HEIGHT=20 CLASS=tabtitle>
			<?php
			if ($startCfg < $TotalPages)
			{
				$upCfg = $startCfg + 1;
				?>
				&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks"); ?>"><IMG SRC="images/admin/<?php echo($UpGif); ?>" HEIGHT=20 WIDTH=20 BORDER=0></A>
				&nbsp;&nbsp;&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks"); ?>"><IMG SRC="images/admin/<?php echo($EndGif); ?>" HEIGHT=20 WIDTH=21 BORDER=0></A>
				<?php
			}
			else
			{
				echo("&nbsp");
			};
			?>
			</TD>
		</TR>
		</TABLE>
</table>
<br>
<tr>
    <td></td><td><input type="submit" name="submit_type" value="Save Changed Settings"></td>
</tr>
</form>

<?php
}
?>