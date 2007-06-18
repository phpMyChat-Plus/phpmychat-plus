<?php
// Configuration panel by DigiozMultimedia and Ciprian Murariu <ciprianmp@yahoo.com>
// This sheet is diplayed when the admin wants to modify settings of the chat server

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

if (!isset($ChatPath)) $ChatPath = "";

require("./config/config.lib.php");
require("./lib/release.lib.php");
if (C_NO_SWEAR) include("./lib/swearing.lib.php");
?>

<HEAD>
<script type="text/javascript">
<!--
window.onload=show;
function show(id) {
var d = document.getElementById(id);
	for (var i = 1; i<=10; i++) {
		if (document.getElementById('smenu'+i)) {document.getElementById('smenu'+i).style.display='none';}
	}
if (d) {d.style.display='block';}
}
function hide(id) {
var d = document.getElementById(id);
if (d) {d.style.display='none';}
}
//-->
</script>
<style type="text/css" media="screen">
<!-- 
-->
</style>
</HEAD>
	<BODY>
<?php
// Display the Config menu bar (only on first load, not after submit)
if ($action != "submit")
{
	$ColorList = eregi_replace('"', "", COLORLIST);
	settype($app_version = APP_VERSION, "double");

	// Check for application update on main sites (ciprianmp.com & sourceforge) resources.
	$updatepath1 = "http://ciprianmp.com/plus/lib/update.php";
	$updatepath2 = "http://svn.sourceforge.net/viewvc/*checkout*/phpmychat/trunk/lib/update.php";
	if (APP_MINOR != "") $APP_M = eregi_replace("&beta;","ß", APP_MINOR);
if (UPD_CHECK)
{
	if (@fopen($updatepath1, "r"))
	{
		@fclose($updatepath1);
		if (isset($_GET['alv']) && isset($_GET['alm'])) {
			define("APP_LAST_VERSION", $alv);
			define("APP_LAST_MINOR", eregi_replace("ß","&beta;", $alm));
			settype($app_last_version = APP_LAST_VERSION, "double");
		} else {
		  echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"$updatepath1\"></script>\n";
		  echo "<script language=\"javascript\">\n";
		  echo "  location.href=\"${_SERVER['SCRIPT_NAME']}?${_SERVER['QUERY_STRING']}"
		            . "&alv=\" + alv + \"&alm=\" + alm;\n";
		  echo "</script>\n";
		  exit();
		}
	}
	elseif (@fopen($updatepath2, "r"))
	{
		@fclose($updatepath2);
		if (isset($_GET['alv']) && isset($_GET['alm'])) {
			define("APP_LAST_VERSION", "".$alv."");
			define("APP_LAST_MINOR", eregi_replace("ß","&beta;", $alm));
			settype($app_last_version = APP_LAST_VERSION, "double");
		} else {
		  echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"$updatepath2\"></script>\n";
		  echo "<script language=\"javascript\">\n";
		  echo "  location.href=\"${_SERVER['SCRIPT_NAME']}?${_SERVER['QUERY_STRING']}"
		            . "&alv=\" + alv + \"&alm=\" + alm;\n";
		  echo "</script>\n";
		  exit();
		}
	}
	else
	{
		settype($app_last_version = APP_VERSION, "double");
	}
}
?>
<div id="menu">
	<dl>			
		<dt onmouseover="javascript:show('smenu1');">General settings</dt>
			<dd id="smenu1" onmouseover="javascript:show('smenu1');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#server">Server data</a></li>
					<li><a href="#language">Languages</a></li>
					<li><a href="#functionality">Functionality</a></li>
					<li><a href="#powers">Powers</a></li>
				</ul>
			</dd>
	</dl>
	<dl>	
		<dt onmouseover="javascript:show('smenu2');">Interface</dt>
			<dd id="smenu2" onmouseover="javascript:show('smenu2');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#login">Login layout</a></li>
					<li><a href="#skins">Skins</a></li>
					<li><a href="#media">Media</a></li>
					<li><a href="#profanity">Profanity</a></li>
					<li><a href="#time">Times</a></li>
				</ul>
			</dd>
	</dl>
	<dl>	
		<dt onmouseover="javascript:show('smenu3');">Features & Mods</dt>
			<dd id="smenu3" onmouseover="javascript:show('smenu3');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="#pm">Private messaging</a></li>
					<li><a href="#bot">Bot settings</a></li>
					<li><a href="#cmds">Commands</a></li>
					<li><a href="#quick">Quick Menus</a></li>
					<li><a href="#avatars">Avatars</a></li>
					<li><a href="#logging">Logging mod</a></li>
					<li><a href="#lurking">Lurking mod</a></li>
					<li><a href="#quote">Random Quote</a></li>
				</ul>
			</dd>
	</dl>
	<dl>	
		<dt onmouseover="javascript:show('smenu4');">Help & Support</dt>
			<dd id="smenu4" onmouseover="javascript:show('smenu4');" onmouseout="javascript:show('');">
				<ul>
					<li><a href="http://sourceforge.net/project/showfiles.php?group_id=19371&package_id=199435" target=_blank Title="Open the Download page" onMouseOver="window.status='Open the Download page.'; return true">Download page</a></li>
					<li><a href="http://www.ciprianmp.com/atm/index.php?&direction=0&order=&directory=programming/phpMyChat/Ciprian_releases/Plus_version" target=_blank Title="Open the Mirror download page" onMouseOver="window.status='Open the Mirror download page.'; return true">Mirror page</a></li>
					<li><a href="http://sourceforge.net/projects/phpmychat/" target=_blank Title="Open the phpMyChat Project Page" onMouseOver="window.status='Open the phpMyChat Project Page.'; return true">Project page</a></li>
					<li><a href="http://svn.sourceforge.net/viewvc/phpmychat/trunk/" target=_blank Title="Open the phpMyChat SVN Project Page" onMouseOver="window.status='Open the phpMyChat SVN Project Page.'; return true">Project SVN page</a></li>
					<li><a href="http://tech.groups.yahoo.com/group/phpmychat/" target=_blank Title="Open the phpMyChat Yahoo Support Group Page" onMouseOver="window.status='Open the phpMyChat Yahoo Support Group Page.'; return true">Support Group page</a></li>
					<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Fixes readme.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo(APP_VERSION.APP_MINOR); ?>" target=_blank Title="Open the <?php echo(APP_VERSION.APP_MINOR); ?> Release notes" onMouseOver="window.status='Open the <?php echo(APP_VERSION.APP_MINOR); ?> Release notes.'; return true">Read <?php echo(APP_VERSION.APP_MINOR); ?> notes</a></li>
 <?php
 if(UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && (APP_LAST_MINOR != APP_MINOR))))
 {
 	?>
 						<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Fixes readme.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version/<?php echo((UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && (APP_LAST_MINOR != APP_MINOR)))) ? APP_LAST_VERSION.APP_LAST_MINOR : APP_VERSION.APP_MINOR); ?>" target=_blank Title="Open the <?php echo((UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && (APP_LAST_MINOR != APP_MINOR)))) ? APP_LAST_VERSION.APP_LAST_MINOR : APP_VERSION.APP_MINOR); ?> Release notes" onMouseOver="window.status='Open the <?php echo((UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && (APP_LAST_MINOR != APP_MINOR)))) ? APP_LAST_VERSION.APP_LAST_MINOR : APP_VERSION.APP_MINOR); ?> Release notes.'; return true">Latest <?php echo((UPD_CHECK && (($app_last_version > $app_version) || (($app_last_version == $app_version) && (APP_LAST_MINOR != APP_MINOR)))) ? APP_LAST_VERSION.APP_LAST_MINOR : APP_VERSION.APP_MINOR); ?> notes</a></li>
 <?php
 }
 	?>
					<li><a href="http://www.ciprianmp.com/atm/viewer_content.php?file=Plus FAQ.txt&dir=programming/phpMyChat/Ciprian_releases/Plus_version" target=_blank Title="Open the Online FAQ" onMouseOver="window.status='Open the Online FAQ'; return true">FAQ Online</a></li>
					<li><a href="http://www.ciprianmp.com/latest/" target=_blank Title="Go to Try me server." onMouseOver="window.status='Go to Try me server'; return true">Try me server</a></li>
					<li><a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='Click to email author.'; return true;" title="Click to email author" target=_blank>Submit your feedback</a></li>
					<li><a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20donation" onMouseOver="window.status='Wish to donate to the author?'; return true;" title="Wish to donate to the author?" target=_blank>Wish to donate?</a></li>
					<li><a onClick="javascript:alert('Your currently installed version is:\n<?php echo(APP_NAME." - ".APP_VERSION.APP_MINOR); ?>')" Title="What is this?" onMouseOver="window.status='What is this?'; return true">About</a></li>
				</ul>
			</dd>
	</dl>
	<dl>
		<dt onmouseover="javascript:show();"><a href="#home" title="Scroll home">Home</a></dt>
	</dl>
</div>
<?php
?>
<div id="container">
<?php
	if (UPD_CHECK)
	{
		?>
<DIV><P><TABLE BORDER=0 CELLPADDING=0 CLASS=menu style=background:white><TR><TD CLASS=success ALIGN=CENTER><?php echo("<br />- ".sprintf(A_SHEET5_0, APP_VERSION.APP_MINOR)." -<br />"); ?>
<?php
		if (($app_last_version > $app_version) || (($app_last_version == $app_version) && (APP_LAST_MINOR != APP_MINOR)))
		{
		?>
			<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
			<!--
		alert("<?php echo("- ".sprintf(A_SHEET5_0, APP_VERSION.$APP_M)." -") ?>\n<?php echo(sprintf(A_SHEET5_1, APP_LAST_VERSION.$alm)); ?>")
			// -->
			</SCRIPT>
<?php
			echo("</TD></TR><TR><TD CLASS=error ALIGN=CENTER><H3>".sprintf(A_SHEET5_1,APP_LAST_VERSION.APP_LAST_MINOR)."</H3>");
		}
?>
<br /></TD></TR></TABLE></P></DIV>
<?php
	}
};
// If form is submitted update values in the database
if (isset($FORM_SEND) && $FORM_SEND == 5)
{
  while(list($name,$value) = each($_GET))
  {
           $$name = $value;
  };
  while(list($name,$value) = each($_POST))
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
						"COLOR_CD8 = '$vCOLOR_CD8', ".
						"COLOR_CD9 = '$vCOLOR_CD9', ".
						"COLOR_CA = '$vCOLOR_CA', ".
						"COLOR_CA1 = '$vCOLOR_CA1', ".
						"COLOR_CA2 = '$vCOLOR_CA2', ".
						"COLOR_CM = '$vCOLOR_CM', ".
						"COLOR_CM1 = '$vCOLOR_CM1', ".
						"COLOR_CM2 = '$vCOLOR_CM2', ".
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
						"EMAIL_USER = '$vEMAIL_USER', ".
						"BOT_HELLO = '$vBOT_HELLO', ".
						"BOT_BYE = '$vBOT_BYE', ".
						"BOT_PUBLIC = '$vBOT_PUBLIC', ".
						"ENABLE_PM = '$vENABLE_PM', ".
						"EN_ROOM1 = '$vEN_ROOM1', ".
						"EN_ROOM2 = '$vEN_ROOM2', ".
						"EN_ROOM3 = '$vEN_ROOM3', ".
						"EN_ROOM4 = '$vEN_ROOM4', ".
						"EN_ROOM5 = '$vEN_ROOM5', ".
						"EN_ROOM6 = '$vEN_ROOM6', ".
						"EN_ROOM7 = '$vEN_ROOM7', ".
						"EN_ROOM8 = '$vEN_ROOM8', ".
						"EN_ROOM9 = '$vEN_ROOM9', ".
						"CHAT_BOOT = '$vCHAT_BOOT', ".
						"WELCOME_SOUND = '$vWELCOME_SOUND', ".
						"WORLDTIME = '$vWORLDTIME', ".
						"UPD_CHECK = '$vUPD_CHECK', ".
						"QUOTE = '$vQUOTE', ".
						"QUOTE_TIME = '$vQUOTE_TIME', ".
						"QUOTE_COLOR = '$vQUOTE_COLOR', ".
						"QUOTE_ALL = '$vQUOTE_ALL', ".
						"QUOTE_PATH = '$vQUOTE_PATH'".
				" WHERE ID='0'";

if((C_BOT_NAME != $vBOT_NAME || C_BOT_FONT_COLOR != $vBOT_FONT_COLOR || C_BOT_AVATAR != $vBOT_AVATAR) && $vBOT_CONTROL)
{
$query_botid = "SELECT id FROM bot_bots WHERE botname='".C_BOT_NAME."'";
$id_result = mysql_query($query_botid);
list($id) = mysql_fetch_row($id_result);
  $query_botname1 = "UPDATE bot_bot SET ".
						"value = '$vBOT_NAME'".
				" WHERE id='1'";
  $query_botname2 = "UPDATE bot_bots SET ".
						"botname = '$vBOT_NAME'".
				" WHERE botname='".C_BOT_NAME."'";
	$query_botname3 = "UPDATE ".C_REG_TBL." SET ".
						"username = '$vBOT_NAME', ".
						"colorname = '$vBOT_FONT_COLOR', ".
						"avatar = '$vBOT_AVATAR'".
				" WHERE email='bot@bot.com'";
	$query_botname4 = "UPDATE ".C_USR_TBL." SET ".
						"username = '$vBOT_NAME'".
				" WHERE username='".C_BOT_NAME."'";
	if (trim($vBOT_NAME) == "" && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = "You must type a username for your Bot";
	}
	else if (ereg(REG_CHARS_ALLOWED, stripslashes($vBOT_NAME)) && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />Spaces, commas or backslashes (\\) not allowed.<br />Check the sintax of the Bot name (".$vBOT_NAME.")";
	}
	else if((C_NO_SWEAR && checkwords($vBOT_NAME, true)) && C_BOT_NAME != $vBOT_NAME)
	{
		$Error = "Banished word found in the Bot username (".$vBOT_NAME.")";
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$vBOT_NAME'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0 && C_BOT_NAME != $vBOT_NAME)
		{
			$Error = "The name of your Bot (".$vBOT_NAME.") is already registered.<br />Choose another one";
		}
		else
		{
		   mysql_query($query_botname1);
		   mysql_query($query_botname2);
		   mysql_query($query_botname3);
		   mysql_query($query_botname4);
  		}
  	}
}

// Random Quote mod by Ciprian
if((C_QUOTE_NAME != $vQUOTE_NAME || C_QUOTE_FONT_COLOR != $vQUOTE_FONT_COLOR || C_QUOTE_AVATAR != $vQUOTE_AVATAR) && $vQUOTE)
{
	$query_quote1 = "UPDATE ".C_REG_TBL." SET ".
						"username = '$vQUOTE_NAME', ".
						"colorname = '$vQUOTE_FONT_COLOR', ".
						"avatar = '$vQUOTE_AVATAR'".
				" WHERE email='quote@quote.com'";
	if (trim($vQUOTE_NAME) == "" && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = "You must type a username for your Random Quote";
	}
	else if (ereg(REG_CHARS_ALLOWED, stripslashes($vQUOTE_NAME)) && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = "Only these extra-characters allowed:<br />".$REG_CHARS_ALLOWED."<br />Spaces, commas or backslashes (\\) not allowed.<br />Check the sintax of the Random Quote name (".$vQUOTE_NAME.")";
	}
	else if((C_NO_SWEAR && checkwords($vQUOTE_NAME, true)) && C_QUOTE_NAME != $vQUOTE_NAME)
	{
		$Error = "Banished word found in the Random Quote username (".$vQUOTE_NAME.")";
	}
	else
	{
		$DbLink->query("SELECT count(*) FROM ".C_REG_TBL." WHERE username='$vQUOTE_NAME'");
		list($rows) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($rows != 0 && C_QUOTE_NAME != $vQUOTE_NAME)
		{
			$Error = "The name of your Random Quote (".$vQUOTE_NAME.") is already registered.<br />Choose another one";
		}
		else
		{
			 mysql_query($query_quote1);
  		}
  	}
}
   mysql_query($query);

if (isset($Error))
{
	echo "<DIV><P><TABLE BORDER=0 CELLPADDING=3 CLASS=menu style=background:white><TR><TD CLASS=error ALIGN=CENTER><br /><H3>".$Error."!</H3></TD></TR></TABLE></P></DIV>";
}
else
{
	echo "<DIV><P><TABLE BORDER=0 CELLPADDING=3 CLASS=menu style=background:white><TR><TD CLASS=success ALIGN=CENTER><br /><H3>Configuration Settings Changed Successfully!</H3></TD></TR></TABLE></P></DIV>";
}

	if(C_LOG_DIR != $vLOG_DIR)
	{
		echo "<DIV><P><TABLE BORDER=0 CELLPADDING=3 CLASS=menu style=background:white><TR><TD CLASS=success ALIGN=CENTER><br /><H3>Configuration Settings Changed Successfully!</H3></TD></TR><TR><TD CLASS=notify2 ALIGN=CENTER VALIGN=TOP>Important!</TD><TD CLASS=success ALIGN=CENTER>Don't forget to change remotely the name of <SPAN style=background-color:white>".C_LOG_DIR."</SPAN> directory to <SPAN style=background-color:white>".$vLOG_DIR."</SPAN><br />and set its atributes to <b>777</b>!</TD></TR></TABLE></P></DIV>";
	}
	if((C_USE_AVATARS != $vUSE_AVATARS) || (COLOR_NAMES != $vCOLOR_NAMES) || (C_PRIV_POPUP != $vPRIV_POPUP) || (C_SKIN != $vUSE_SKIN))
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES (1, 'Admin Panel', 'SYS announce', '', ".time().", ' *', 'L_RELOAD_CHAT', '', '')");
	}
}
else
{
// Credit for this goes to Pete Soheil <webmaster@digioz.com>
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
$COLOR_CD8						= $row[82];
$COLOR_CD9						= $row[83];
$COLOR_CA							= $row[84];
$COLOR_CA1						= $row[85];
$COLOR_CA2						= $row[86];
$COLOR_CM							= $row[87];
$COLOR_CM1						= $row[88];
$COLOR_CM2						= $row[89];
$QUICKA								= $row[90];
$QUICKM								= $row[91];
$QUICKU								= $row[92];
$COLOR_NAMES					= $row[93];
$USE_AVATARS					= $row[94];
$NUM_AVATARS					= $row[95];
$AVA_RELPATH					= $row[96];
$DEF_AVATAR						= $row[97];
$AVA_WIDTH						= $row[98];
$AVA_HEIGHT						= $row[99];
$AVA_PROFBUTTON				= $row[100];
$MAX_DICES						= $row[101];
$MAX_ROLLS						= $row[102];
$BOT_CONTROL					= $row[103];
$MAX_PIC_SIZE					= $row[104];
$USERS_SORT_ORD				= $row[105];
$CHAT_LOGS						= $row[106];
$LOG_DIR							= $row[107];
$SHOW_LOGS_USR				= $row[108];
$CHAT_LURKING					= $row[109];
$SHOW_LURK_USR				= $row[110];
$BAN_IP								= $row[111];
$REG_CHARS_ALLOWED		= $row[112];
$EXIT_LINK_TYPE				= $row[113];
$CHAT_EXTRAS					= $row[114];
$EMAIL_USER						= $row[115];
$BOT_HELLO						= $row[116];
$BOT_BYE							= $row[117];
$BOT_PUBLIC						= $row[118];
$ENABLE_PM						= $row[119];
$EN_ROOM1							= $row[120];
$EN_ROOM2							= $row[121];
$EN_ROOM3							= $row[122];
$EN_ROOM4							= $row[123];
$EN_ROOM5							= $row[124];
$EN_ROOM6							= $row[125];
$EN_ROOM7							= $row[126];
$EN_ROOM8							= $row[127];
$EN_ROOM9							= $row[128];
$CHAT_BOOT						= $row[129];
$WELCOME_SOUND				= $row[130];
$WORLDTIME						= $row[131];
$UPD_CHECK						= $row[132];
$QUOTE								= $row[133];
$QUOTE_TIME						= $row[134];
$QUOTE_COLOR					= $row[135];
$QUOTE_ALL						= $row[136];
$QUOTE_PATH						= $row[137];

$query_botdata = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email='bot@bot.com'";
$result_botdata = mysql_query($query_botdata);
list($BOT_NAME, $BOT_AVATAR, $BOT_FONT_COLOR) = mysql_fetch_row($result_botdata);

$query_quotedata = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email='quote@quote.com'";
$result_quotedata = mysql_query($query_quotedata);
list($QUOTE_NAME, $QUOTE_AVATAR, $QUOTE_FONT_COLOR) = mysql_fetch_row($result_quotedata);

?>
<a name="home"></a>
<br />
<P CLASS=title><?php echo(APP_NAME); ?> Configuration Page</P>

<FORM ACTION="<?php echo("$From?$URLQueryBody"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="Form5">
		<INPUT TYPE=hidden NAME="From" value="<?php echo($From); ?>">
		<INPUT TYPE=hidden NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
		<INPUT TYPE=hidden NAME="pmc_password" value="<?php echo($pmc_password); ?>">
		<INPUT TYPE=hidden NAME="startCfg" value="<?php echo($startCfg); ?>">
		<INPUT TYPE=hidden NAME="FORM_SEND" value="5">
<table align="center" width="780" CLASS=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="server"></a><b>Server data</b></td></tr>
		<TR CLASS=\"thumbIndex\">
			<TD VALIGN=CENTER ALIGN=CENTER height="20" CLASS=tabtitle>Configuration Options
				</TD>
			<TD VALIGN=CENTER ALIGN=CENTER width="25%" height="20" CLASS=tabtitle>Current Settings
			</TD>
		</TR>
<tr>
    <td><b>Enable automatic checking for online updates on the servers.</b><br />
    	<i>Hint: The script can automatically check up for new releases on: ciprianmp.com/latest/ or svn.sourceforge.net!</i></td>
    <td>
        <select name="vUPD_CHECK">
	        <option value="0"<? if($UPD_CHECK==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<? if($UPD_CHECK==1){ echo " selected"; } ?>>Enabled</option>
        </select>
		</td>
</tr>
<tr>
    <td><b>Clean-up time for old messages.</b></td>
    <td><input name="vMSG_DEL" type="text" size="1" maxlength="3" value="<? echo $MSG_DEL; ?>"> (hours)</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Autoboot time for inactive users in rooms.</b><br />
    	<i>Hint: This autoboot feature forces users to be active in rooms. If 
    	they want to be lurking, they should just use the lurking page. Admins, moderators and away users won't be booted</i></td>
    <td>
        <select name="vCHAT_BOOT">
	        <option value="0"<? if($CHAT_BOOT==0){ echo " selected"; } ?>>Disabled</option>
	        <option value="1"<? if($CHAT_BOOT==1){ echo " selected"; } ?>>Enabled</option>
        </select><br />
    	<input name="vUSR_DEL" type="text" size="1" maxlength="2" value="<? echo $USR_DEL; ?>"> (minutes)
</td>
</tr>
<tr>
    <td><b>Delete registered users accounts not active in this interval (0 for never).</b>    							
    </td>
    <td><input name="vREG_DEL" type="text" size="1" maxlength="4" value="<? echo $REG_DEL; ?>"> (days)</td>
</tr>
</table>
<table align="center" width="780" CLASS=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="language"></a><b>Languages</b></td></tr>
		<TR CLASS=\"thumbIndex\">
			<TD VALIGN=CENTER ALIGN=CENTER height="20" CLASS=tabtitle>Configuration Options
				</TD>
			<TD VALIGN=CENTER ALIGN=CENTER width="25%" height="20" CLASS=tabtitle>Current Settings
			</TD>
		</TR>
<tr>
    <td><b>Default Language for Chatroom.</b></td>
    <td>
<?php
			// Available languages
			$AvailableLanguages = array();
			$languageDirectories = dir('./'.$ChatPath.'localization/');
			while($name = $languageDirectories->read())
			{
				if(is_dir('./'.$ChatPath.'localization/'.$name)
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/regex.txt')
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/localized.chat.php')
					&& file_exists('./'.$ChatPath.'localization/'.$name.'/flag.gif'))
				{
					list($key) = file('./'.$ChatPath.'localization/'.$name.'/regex.txt');
					$AvailableLanguages[$key] = $name;
				};
			};
			$languageDirectories->close();
			if (!function_exists("krsort")) include("./${ChatPath}localization/sort_languages.php");
			krsort($AvailableLanguages);
			asort($AvailableLanguages);
			reset($AvailableLanguages);
?>
    <select name="vLANGUAGE" >
<?php
			$i = 0;
			while(list($key, $name) = each($AvailableLanguages))
			{
				$i++;
				?>
				<option value="<? echo $name ?>" <? if($LANGUAGE==$name){ echo " selected";} ?>><? echo (ucwords(str_replace("_"," ",$name))); ?></option>
					<?php
			};
			unset($AvailableLanguages);
		?>
    </select>
    </td>
</tr>
<tr>
    <td><b>Allow users to choose a language from the available translations.</b></td>
    <td>
        <select name="vMULTI_LANG">
	        <option value="0"<? if($MULTI_LANG==0){ echo " selected"; } ?>>Default only</option>
	        <option value="1"<? if($MULTI_LANG==1){ echo " selected"; } ?>>All available</option>
        </select>
    </td>
</tr>
</table>
<table align="center" width="780" CLASS=table>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="functionality"></a><b>Functionality</b></td></tr>
		<TR CLASS=\"thumbIndex\">
			<TD VALIGN=CENTER ALIGN=CENTER height="20" CLASS=tabtitle>Configuration Options
				</TD>
			<TD VALIGN=CENTER ALIGN=CENTER width="25%" height="20" CLASS=tabtitle>Current Settings
			</TD>
		</TR>
<tr>
    <td><b>Require Registration to join chat.</b></td>
    <td>
        <select name="vREQUIRE_REGISTER">
	        <option value="0"<? if($REQUIRE_REGISTER==0){ echo " selected"; } ?>>Optional
	        <option value="1"<? if($REQUIRE_REGISTER==1){ echo " selected"; } ?>>Required
        </select>
    </td>
</tr>
<tr>
    <td><b>First and Last names required on registration and profiles.</b></td>
    <td>
        <select name="vREQUIRE_NAMES">
	        <option value="0"<? if($REQUIRE_NAMES==0){ echo " selected"; } ?>>Optional
	        <option value="1"<? if($REQUIRE_NAMES==1){ echo " selected"; } ?>>Required
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Generate and email Password to new registered users.</b><br /><br />
    <b>Length of the Password to be generated and sent by email.</b></td>
    <td>
        <select name="vEMAIL_PASWD">
	        <option value="0"<? if($EMAIL_PASWD==0){ echo " selected"; } ?>>Disabled
	        <option value="1"<? if($EMAIL_PASWD==1){ echo " selected"; } ?>>Enabled
        </select><br />
    <input name="vPASS_LENGTH" type="text" size="2" maxlength="2" value="<? echo $PASS_LENGTH; ?>">
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Send account details to the new registered user.</b><br /><br />
    <b>Send account details (notifications) to admin on new user registration.</b></td>
    <td>
        <select name="vEMAIL_USER">
	        <option value="0"<? if($EMAIL_USER==0){ echo " selected"; } ?>>Don't send
	        <option value="1"<? if($EMAIL_USER==1){ echo " selected"; } ?>>Send details
        </select><br />
        <select name="vADMIN_NOTIFY">
	        <option value="0"<? if($ADMIN_NOTIFY==0){ echo " selected"; } ?>>Don't notify
	        <option value="1"<? if($ADMIN_NOTIFY==1){ echo " selected"; } ?>>Notify admin
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter admin real name (or chat name) to be sent on email headers.</b></td>
    <td><input name="vADMIN_NAME" type="text" size="25" maxlength="35" value="<? echo $ADMIN_NAME; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter admin email to be sent on email headers.</b><br />
    	<i>Hint: also to receive notifications on new user registration</i>
    	</td>
    <td><input name="vADMIN_EMAIL" type="text" size="25" maxlength="35" value="<? echo $ADMIN_EMAIL; ?>"></td>
</tr>
<tr>
    <td><b>Enter your chat URL to be sent on email headers.</b></td>
    <td><input name="vCHAT_URL" type="text" size="25" maxlength="50" value="<? echo $CHAT_URL; ?>"></td>
</tr>
</table>
<table align="center" width="780" CLASS=table>
		<TR CLASS=\"thumbIndex\">
			<TD VALIGN=CENTER ALIGN=CENTER height="20" CLASS=tabtitle>Configuration Options
				</TD>
			<TD VALIGN=CENTER ALIGN=CENTER width="25%" height="20" CLASS=tabtitle>Current Settings
			</TD>
		</TR>
<tr bgcolor="#B0C4DE">
    <td><b>Show Administration link on index.</b><br />
    			(to open this Administration Panel)
    </td>
    <td>
        <select name="vSHOW_ADMIN">
	        <option value="0"<? if($SHOW_ADMIN==0){ echo " selected"; } ?>>Hide Admin link
	        <option value="1"<? if($SHOW_ADMIN==1){ echo " selected"; } ?>>Show Admin link
        </select>
    </td>
</tr>
<tr>
    <td><b>Show Delete link on index.</b><br />
    			(to allow users delete their own profile)</td>
    <td>
        <select name="vSHOW_DEL_PROF">
	        <option value="0"<? if($SHOW_DEL_PROF==0){ echo " selected"; } ?>>Hide Delete link
	        <option value="1"<? if($SHOW_DEL_PROF==1){ echo " selected"; } ?>>Show Delete link
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Types of Rooms Available for users.</b><br />
                  0 : only the first room within the public default ones<br />
                  1 : all default rooms, but not create a room<br />
                  2 : all the rooms and create new ones
    </td>
    <td>
        <select name="vVERSION">
	        <option value="0"<? if($VERSION==0){ echo " selected"; } ?>>0 - Only the first room
	        <option value="1"<? if($VERSION==1){ echo " selected"; } ?>>1 - All default rooms
	        <option value="2"<? if($VERSION==2){ echo " selected"; } ?>>2 - Create new rooms
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable banishment feature and define the delay for it.</b><br />
    0 = disabled, any integer = day(s) for banishment<br />
    <b>Banishment type.</b><br />
    	<i>Hint: ban only by IP or, by IP and username simultaneously (useful when the banned user comes from a shared IP or for parental control purposes when a shared computer is used by a child)</i>
    </td>
    <td valign="top">
    	<input name="vBANISH" type="text" size="1" maxlength="3" value="<? echo $BANISH; ?>"> (days)<br /><br />
        <select name="vBAN_IP">
	        <option value="0"<? if($BAN_IP==0){ echo " selected"; } ?>>By IP and username
	        <option value="1"<? if($BAN_IP==1){ echo " selected"; } ?>>Only by IP
        </select>
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Profanity filter.</b><br />
    											(replacement of posted swear words with the chars bellow)
    </td>
    <td>
        <select name="vNO_SWEAR">
	        <option value="0"<? if($NO_SWEAR==0){ echo " selected"; } ?>>Filter swearing
	        <option value="1"<? if($NO_SWEAR==1){ echo " selected"; } ?>>Allow swearing
        </select>
    </td>
</tr>
<tr>
    <td><b>Expression to replace the swear words with.</b></td>
    <td><input name="vSWEAR_EXPR" type="text" size="1" maxlength="5" value="<? echo $SWEAR_EXPR; ?>"></td>
</tr>
<tr>
    <td><b>Max number of messages that user may export.</b><br />
    								(0=disable, any integer=number of messages, *=no limit)
    </td>
    <td><input name="vSAVE" type="text" size="1" maxlength="2" value="<? echo $SAVE; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Use graphical smilies in messages.</b></td>
    <td>
        <select name="vUSE_SMILIES">
	        <option value="0"<? if($USE_SMILIES==0){ echo " selected"; } ?>>No smilies
	        <option value="1"<? if($USE_SMILIES==1){ echo " selected"; } ?>>Show smilies
        </select>
    </td>
</tr>
<tr>
    <td><b>Keep HTML tags in messages.</b><br />
    <b>simple</b>: keep bold, italic and underline tags; <b>none</b>: keep none</td>
    <td>
        <select name="vHTML_TAGS_KEEP">
	        <option value="0"<? if($HTML_TAGS_KEEP=='simple'){ echo " selected"; } ?>>Simple
	        <option value="1"<? if($HTML_TAGS_KEEP=='none'){ echo " selected"; } ?>>None
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show discarded HTML tags.</b></td>
    <td>
        <select name="vHTML_TAGS_SHOW">
	        <option value="0"<? if($HTML_TAGS_SHOW==0){ echo " selected"; } ?>>Remove discarded tags
	        <option value="1"<? if($HTML_TAGS_SHOW==1){ echo " selected"; } ?>>Show discarded tags
        </select>
    </td>
</tr>
<tr>
    <td><b>Timezone offset and Worldtime in Status bar.</b><br />
    			- the difference between the server time and the desired location for the Chat (hours)<br />
    			<i>E.g. If my server is hosted in USA - CST (-6) but the chat is for a Romanian community located in Bucharest - EET (+2),
    			I might wish to show my users the correct time in the chat. For this, I have to set this value to 8. Negative values are also allowed.</i>
    </td>
    <td><input name="vTMZ_OFFSET" type="text" size="2" maxlength="5" value="<? echo $TMZ_OFFSET; ?>"><br />
        <select name="vWORLDTIME">
	        <option value="0"<? if($WORLDTIME==0){ echo " selected"; } ?>>Server time (standard)
	        <option value="1"<? if($WORLDTIME==1){ echo " selected"; } ?>>Worldtime in Chat only 
	        <option value="2"<? if($WORLDTIME==2){ echo " selected"; } ?>>Worldtime on Index & Chat
        </select>
			</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default messages scroll order.</b><br />
    			(only for "non-H" browsers - other than IE or Firefox)<br />
    			<i>Hint: those users can also use /order command to change this behaviour.</i>
    </td>
    <td>
        <select name="vMSG_ORDER">
	        <option value="0"<? if($MSG_ORDER==0){ echo " selected"; } ?>>Last on Top
	        <option value="1"<? if($MSG_ORDER==1){ echo " selected"; } ?>>Last on Bottom
        </select>
    </td>
</tr>
<tr>
    <td><b>Show Timestamp in front of the message.</b><br />
    			(also shows the Server Time in the Status bar)
    </td>
    <td>
        <select name="vSHOW_TIMESTAMP">
	        <option value="0"<? if($SHOW_TIMESTAMP==0){ echo " selected"; } ?>>No timestamps in chat
	        <option value="1"<? if($SHOW_TIMESTAMP==1){ echo " selected"; } ?>>Show timestamps in chat
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Default timeout between each update.</b></td>
    <td><input name="vMSG_REFRESH" type="text" size="1" maxlength="2" value="<? echo $MSG_REFRESH; ?>"></td>
</tr>
<tr>
    <td><b>Default number of messages to display on first entrance.</b><br />
    	<font color=red>Important: for 0, set the both <b>next two</b> settings to "No"; for 1 disable only one of them.<br />
    		If you want to keep both set to "Notify" and "Show", the value <b>must be at least 2</b>.</font></i><br />
    			<i>Hint: users can also use /show "n" or /last "n" commands to view a different amount.</i>
    </td>
    <td><input name="vMSG_NB" type="text" size="1" maxlength="2" value="<? echo $MSG_NB; ?>"> (seconds)</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show nofications on every user entrance/exit in Chat rooms.</b></td>
    <td>
        <select name="vNOTIFY">
	        <option value="0"<? if($NOTIFY==0){ echo " selected"; } ?>>No notification
	        <option value="1"<? if($NOTIFY==1){ echo " selected"; } ?>>Notify room
        </select>
    </td>
</tr>
<tr>
    <td><b>Display a Welcome Message when user enters chatroom.</b></td>
    <td>
        <select name="vWELCOME">
	        <option value="0"<? if($WELCOME==0){ echo " selected"; } ?>>No welcome message
	        <option value="1"<? if($WELCOME==1){ echo " selected"; } ?>>Show welcome message
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Play a sound on entrance.</b></td>
    <td>
        <select name="vALLOW_ENTRANCE_SOUND">
	        <option value="0"<? if($ALLOW_ENTRANCE_SOUND==0){ echo " selected"; } ?>>0 - Disabled
	        <option value="1"<? if($ALLOW_ENTRANCE_SOUND==1){ echo " selected"; } ?>>1 - Notify the entire room
	        <option value="2"<? if($ALLOW_ENTRANCE_SOUND==2){ echo " selected"; } ?>>2 - Welcome only the user
	        <option value="3"<? if($ALLOW_ENTRANCE_SOUND==3){ echo " selected"; } ?>>3 - Notify & Welcome (1&2)
        </select>
    </td>
</tr>
<tr>
    <td><b>Path to the sound to be played on entrance (only .wav extensions).</b><br />
    				Example: 'sounds/beep.wav' (include the quotes if you use long URLs)
    	</td>
    <td>On Welcome:<br /><input name="vWELCOME_SOUND" type="text" size="20" maxlength="255" value="<? echo $WELCOME_SOUND; ?>"><br />
    		On Entrance:<br /><input name="vENTRANCE_SOUND" type="text" size="20" maxlength="255" value="<? echo $ENTRANCE_SOUND; ?>">
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Play a buzz sound on /buzz command.</b><br />
    			(or just display a message without any sound)
    	</td>
    <td>
        <select name="vALLOW_BUZZ_SOUND">
	        <option value="0"<? if($ALLOW_BUZZ_SOUND==0){ echo " selected"; } ?>>No buzz sounds
	        <option value="1"<? if($ALLOW_BUZZ_SOUND==1){ echo " selected"; } ?>>Play buzz sounds
        </select>
    </td>
</tr>
<tr>
    <td><b>Path to the buzz sound to be played (only .wav extensions).</b><br />
    				Example: 'sounds/chimedwn.wav' (include the quotes if you use long URLs)
    	</td>
    <td><input name="vBUZZ_SOUND" type="text" size="25" maxlength="255" value="<? echo $BUZZ_SOUND; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Number of smilies on a row in tutorial/help.</b></td>
    <td><input name="vSMILEY_COLS" type="text" size="1" maxlength="2" value="<? echo $SMILEY_COLS; ?>"></td>
</tr>
<tr>
    <td><b>Number of smilies on a row in smilie_popup.</b></td>
    <td><input name="vSMILEY_COLS_POP" type="text" size="1" maxlength="2" value="<? echo $SMILEY_COLS_POP; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable Different Topics for each room.</b><br />
    			(or just display a default one - topics must be edited in banner.php)
    	</td>
    <td>
        <select name="vTOPIC_DIFF">
	        <option value="0"<? if($TOPIC_DIFF==0){ echo " selected"; } ?>>Global topic
	        <option value="1"<? if($TOPIC_DIFF==1){ echo " selected"; } ?>>Multiple topics
        </select>
    </td>
</tr>
<tr>
    <td><b>Display the Tutorial link on index page.</b></td>
    <td>
        <select name="vSHOW_TUT">
	        <option value="0"<? if($SHOW_TUT==0){ echo " selected"; } ?>>Hide tutorial
	        <option value="1"<? if($SHOW_TUT==1){ echo " selected"; } ?>>Show tutorial
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. Show Default Private rooms on index page.</b><br />
    			<i>Hint: Not all the private rooms will be shown as options for all the users (see next two settings)<br />
    				This option will just let the <b>admins</b> see all default private rooms, but is <u><b>required</b></u> for the next two to work.</i>
    	</td>
    <td>
        <select name="vSHOW_PRIV">
	        <option value="0"<? if($SHOW_PRIV==0){ echo " selected"; } ?>>Hide
	        <option value="1"<? if($SHOW_PRIV==1){ echo " selected"; } ?>>Show
        </select>
    </td>
</tr>
<tr>
    <td><b>2. Show Default Private rooms on index page to MODERATORS.</b><br />
    			<i>Hint: Moderators will only see rooms 8 and 9 (Staff and Support). Setting no.1 is required.</i>
    	</td>
    <td>
        <select name="vSHOW_PRIV_MOD">
	        <option value="0"<? if($SHOW_PRIV_MOD==0){ echo " selected"; } ?>>Hide
	        <option value="1"<? if($SHOW_PRIV_MOD==1){ echo " selected"; } ?>>Show
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Show Default Private rooms on index page to NORMAL USERS.</b><br />
    			<i>Hint: Non-power users (including guests) will only see room 9 (Support). Setting no.1 is required.</i>
    	</td>
    <td>
        <select name="vSHOW_PRIV_USR">
	        <option value="0"<? if($SHOW_PRIV_USR==0){ echo " selected"; } ?>>Hide
	        <option value="1"<? if($SHOW_PRIV_USR==1){ echo " selected"; } ?>>Show
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable Info on index page.</b><br />
    				(contain some info about the chat extra-features)
    	</td>
    <td>
        <select name="vSHOW_INFO">
	        <option value="0"<? if($SHOW_INFO==0){ echo " selected"; } ?>>Hide Info
	        <option value="1"<? if($SHOW_INFO==1){ echo " selected"; } ?>>Show Info
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display Extra commands available.</b></td>
    <td>
        <select name="vSET_CMDS">
	        <option value="0"<? if($SET_CMDS==0){ echo " selected"; } ?>>Hide Extra commands
	        <option value="1"<? if($SET_CMDS==1){ echo " selected"; } ?>>Show Extra commands
        </select>
    </td>
</tr>
<tr>
    <td><b>List your extra commands.</b><br />
    			(keep the first break and use it anytime to split the lines if too long)
    	</td>
    <td><input name="vCMDS" type="text" size="25" maxlength="255" value="<? echo $CMDS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display Other Extra features/mods available.</b></td>
    <td>
        <select name="vSET_MODS">
	        <option value="0"<? if($SET_MODS==0){ echo " selected"; } ?>>Hide Extra features
	        <option value="1"<? if($SET_MODS==1){ echo " selected"; } ?>>Show Extra features
        </select>
    </td>
</tr>
<tr>
    <td><b>List your extra features/mods.</b><br />
    			(keep the first break and use it anytime to split the lines if too long)
    	</td>
    <td><input name="vMODS" type="text" size="25" maxlength="255" value="<? echo $MODS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the name of your bot (if available).</b></td>
    <td>
        <select name="vSET_BOT">
	        <option value="0"<? if($SET_BOT==0){ echo " selected"; } ?>>Hide bot name
	        <option value="1"<? if($SET_BOT==1){ echo " selected"; } ?>>Show bot name
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter the expression for the /room command.</b><br />
    			Examples: Attention Room:, Narator Says:, Read this:, Author says:
    	</td>
    <td><input name="vROOM_SAYS" type="text" size="25" maxlength="25" value="<? echo $ROOM_SAYS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Allow moderators to use /demote command.</b><br />
    				NO - only admins will demote moderators.<br />
    				YES - also moderators will be able to demote other moderators.
    	</td>
    <td>
        <select name="vDEMOTE_MOD">
	        <option value="0"<? if($DEMOTE_MOD==0){ echo " selected"; } ?>>Only admins
	        <option value="1"<? if($DEMOTE_MOD==1){ echo " selected"; } ?>>Moderators & admins
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable whispers (private messages) system.</b><br />
    				(if disabled, only the public messages will be posted in chat)<br />
    	</td>
    <td>
        <select name="vENABLE_PM">
	        <option value="0"<? if($ENABLE_PM==0){ echo " selected"; } ?>>PM disabled
	        <option value="1"<? if($ENABLE_PM==1){ echo " selected"; } ?>>PM enabled
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable popup whispers (private messages) system.</b><br />
    				(if enabled, guests cannot disable popups - they must register)<br />
    		<i>Hint: can be also disabled by each user in their profile<br />
    	<font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i>
    	</td>
    <td>
        <select name="vPRIV_POPUP">
	        <option value="0"<? if($PRIV_POPUP==0){ echo " selected"; } ?>>PM pop-ups disabled
	        <option value="1"<? if($PRIV_POPUP==1){ echo " selected"; } ?>>PM pop-ups enabled
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display the Chat Etiquette on top of the Help popup (Chat rules).</b></td>
    <td>
        <select name="vSHOW_ETIQ_IN_HELP">
	        <option value="0"<? if($SHOW_ETIQ_IN_HELP==0){ echo " selected"; } ?>>Hide Etiquette
	        <option value="1"<? if($SHOW_ETIQ_IN_HELP==1){ echo " selected"; } ?>>Show Etiquette
        </select>
    </td>
</tr>
<tr>
    <td><b>Display a LOGO image on index page.</b></td>
    <td>
        <select name="vSHOW_LOGO">
	        <option value="0"<? if($SHOW_LOGO==0){ echo " selected"; } ?>>No Logo
	        <option value="1"<? if($SHOW_LOGO==1){ echo " selected"; } ?>>Show the Logo bellow
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Path to the LOGO image.</b><br />
    			<i>Hint: Logo image to show (absolute or relative paths allowed) - e.g. http://ciprianmp.com/forum/my_logo.jpg or ./../forum/my_logo.jpg</i><br />
    			(my_logo.jpg can be any image accessible on the web - .jpg, .gif, .bmp, .png)
    	</td>
    <td><input name="vLOGO_IMG" type="text" size="25" maxlength="255" value="<? echo $LOGO_IMG; ?>"></td>
</tr>
<tr>
    <td><b>URL to be opened by LOGO (opens in new window).</b></td>
    <td><input name="vLOGO_OPEN" type="text" size="25" maxlength="255" value="<? echo $LOGO_OPEN; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Text to be displayed by LOGO on MouseOver (the ALT/TITLE property).</b><br />
    			<i>Hint: Keep the quotation marks to use spaces in your text</i>
    	</td>
    <td><input name="vLOGO_ALT" type="text" size="25" maxlength="255" value="<? echo $LOGO_ALT; ?>"></td>
</tr>
<tr>
    <td><b>Show counter (visitor hits) on index page.</b></td>
    <td>
        <select name="vSHOW_COUNTER">
	        <option value="0"<? if($SHOW_COUNTER==0){ echo " selected"; } ?>>Disable counter
	        <option value="1"<? if($SHOW_COUNTER==1){ echo " selected"; } ?>>Show counter
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Show owner/webmaster of the chat info on index page (bellow the copyright link).</b><br />
    	<i>Hint: It is the same name/text you entered in the registration section - Admin name/Chat name</i>
    	</td>
    <td>
        <select name="vSHOW_OWNER">
	        <option value="0"<? if($SHOW_OWNER==0){ echo " selected"; } ?>>Hide Owner
	        <option value="1"<? if($SHOW_OWNER==1){ echo " selected"; } ?>>Show Owner
        </select>
    </td>
</tr>
<tr>
    <td><b>Edit the installation date of your chat.</b><br />
				(the date since the counter had been suposed to start - keep the format to max 10 chars length)
    	</td>
    <td><input name="vINSTALL_DATE" type="text" size="25" maxlength="255" value="<? echo $INSTALL_DATE; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable skin mod in rooms.</b><br />
    	    	<font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i>
</td>
    <td>
        <select name="vUSE_SKIN">
	        <option value="0"<? if($USE_SKIN==0){ echo " selected"; } ?>>Default Skin Only
	        <option value="1"<? if($USE_SKIN==1){ echo " selected"; } ?>>Enable Skin Mod
        </select>
    </td>
</tr>
<tr>
    <td><b>1. First Public room name (also <u>default</u> if none selected).</b></td>
    <td><input name="vROOM1" type="text" size="25" maxlength="25" value="<? echo $ROOM1; ?>"><br />
        <select name="vEN_ROOM1">
	        <option value="0"<? if($EN_ROOM1==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM1==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>2. Second Public room name.</b></td>
    <td><input name="vROOM2" type="text" size="25" maxlength="25" value="<? echo $ROOM2; ?>"><br />
        <select name="vEN_ROOM2">
	        <option value="0"<? if($EN_ROOM2==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM2==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr>
    <td><b>3. Third Public room name.</b></td>
    <td><input name="vROOM3" type="text" size="25" maxlength="25" value="<? echo $ROOM3; ?>"><br />
        <select name="vEN_ROOM3">
	        <option value="0"<? if($EN_ROOM3==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM3==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>4. Forth Public room name.</b></td>
    <td><input name="vROOM4" type="text" size="25" maxlength="25" value="<? echo $ROOM4; ?>"><br />
        <select name="vEN_ROOM4">
	        <option value="0"<? if($EN_ROOM4==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM4==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr>
    <td><b>5. Fifth Public room name.</b></td>
    <td><input name="vROOM5" type="text" size="25" maxlength="25" value="<? echo $ROOM5; ?>"><br />
        <select name="vEN_ROOM5">
	        <option value="0"<? if($EN_ROOM5==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM5==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>6. First Private room name.</b><br />
    			<i>Note: This is displayed on login only to admin(s)</i>
    	</td>
    <td><input name="vROOM6" type="text" size="25" maxlength="25" value="<? echo $ROOM6; ?>"><br />
        <select name="vEN_ROOM6">
	        <option value="0"<? if($EN_ROOM6==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM6==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr>
    <td><b>7. Second Private room name (also default if none selected).</b><br />
    			<i>Note: This is displayed on login only to admin(s)</i>
    	</td>
    <td><input name="vROOM7" type="text" size="25" maxlength="25" value="<? echo $ROOM7; ?>"><br />
        <select name="vEN_ROOM7">
	        <option value="0"<? if($EN_ROOM7==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM7==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>8. Third Private room name.</b><br />
    			<i>Note: This is displayed on login to all power users (fits for staff only rooms)</i>
    	</td>
    <td><input name="vROOM8" type="text" size="25" maxlength="25" value="<? echo $ROOM8; ?>"><br />
        <select name="vEN_ROOM8">
	        <option value="0"<? if($EN_ROOM8==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM8==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr>
    <td><b>9. Fourth Private room name.</b><br />
    			<i>Note: This is displayed by default on login to all users (fits for support like rooms)</i>
    	</td>
    <td><input name="vROOM9" type="text" size="25" maxlength="25" value="<? echo $ROOM9; ?>"><br />
        <select name="vEN_ROOM9">
	        <option value="0"<? if($EN_ROOM9==0){ echo " selected"; } ?>>Disable
	        <option value="1"<? if($EN_ROOM9==1){ echo " selected"; } ?>>Enable
        </select>
    	</td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. Room name to allow swear words (avoid the filter).</b><br />
    			<i>Note: You must enter the exact name of the room.</i>
    	</td>
    <td><input name="vSWEAR1" type="text" size="25" maxlength="25" value="<? echo $SWEAR1; ?>"></td>
</tr>
<tr>
    <td><b>2. Room name to allow swear words (avoid the filter).</b></td>
    <td><input name="vSWEAR2" type="text" size="25" maxlength="25" value="<? echo $SWEAR2; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>3. Room name to allow swear words (avoid the filter).</b></td>
    <td><input name="vSWEAR3" type="text" size="25" maxlength="25" value="<? echo $SWEAR3; ?>"></td>
</tr>
<tr>
    <td><b>4. Room name to allow swear words (avoid the filter).</b></td>
    <td><input name="vSWEAR4" type="text" size="25" maxlength="25" value="<? echo $SWEAR4; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable color filter in messages.</b><br />
    	<i>Hint: If enabled, all the users can use any color, if not, they can use all except the power colors set bellow.
    	</td>
    <td>
        <select name="vCOLOR_FILTERS">
	        <option value="0"<? if($COLOR_FILTERS==0){ echo " selected"; } ?>>Disable filters
	        <option value="1"<? if($COLOR_FILTERS==1){ echo " selected"; } ?>>Enable filters
        </select>
    </td>
</tr>
<tr>
    <td><b>Set the Power Colors to be used only by admins (first as default).</b></td>
    <td>
			<SELECT NAME="vCOLOR_CA">
			<?php
			$CCA = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCA))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CA == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CA1">
			<?php
			$CCA1 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCA1))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CA1 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CA2">
			<?php
			$CCA2 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCA2))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CA2 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the Power Colors to be used only by moderators (first as default).</b><br />
    	<i>Hint. Admins will also be able to use these colors, but no other users.
    		</td>
    <td>
			<SELECT NAME="vCOLOR_CM">
			<?php
			$CCM = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCM))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CM == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CM1">
			<?php
			$CCM1 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCM1))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CM1 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
				<SELECT NAME="vCOLOR_CM2">
			<?php
			$CCM2 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCM2))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if ($COLOR_CM2 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT>
    </td>
</tr>
<tr>
    <td><b>Allow guests to use colors.</b><br />
    	<i>Hint: If disabled, unregistered users will only use the default color for that room in their messages.	This will encourage them to register (hopefully).</i>
    	</td>
    <td>
        <select name="vCOLOR_ALLOW_GUESTS">
	        <option value="0"<? if($COLOR_ALLOW_GUESTS==0){ echo " selected"; } ?>>No colors for guests
	        <option value="1"<? if($COLOR_ALLOW_GUESTS==1){ echo " selected"; } ?>>Guests use colors
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>1. First skin (style) default Color (to filter the users color usage by power).<br />
						2. Second skin default Color.<br />
						3. Third skin default Color.<br />
						4. Forth skin default Color.<br />
						5. Fifth skin default Color.<br />
						6. Sixth skin default Color.<br />
						7. Seventh skin default Color.<br />
						8. Eight skin default Color.<br />
						9. Ninth skin default Color.</b><br />
    			<i><font color=red>Important: Change these values only if you changed the $CD variable in the according config/style(n).css.php file.</font><br />
    				Hint: The following color names codes cannot be used in filters:<br />
    				- <?php echo(COLOR_CA.", ".COLOR_CA1.", ".COLOR_CA2); ?> - default for admin(s);<br />
    				- <?php echo(COLOR_CM.", ".COLOR_CM1.", ".COLOR_CM2); ?>  - default for moderators.</i>
    	</td>
    <td>
			<SELECT NAME="vCOLOR_CD1">
			<?php
			$CCD1 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD1))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD1 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD2">
			<?php
			$CCD2 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD2))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD2 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD3">
			<?php
			$CCD3 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD3))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD3 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD4">
			<?php
			$CCD4 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD4))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD4 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD5">
			<?php
			$CCD5 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD5))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD5 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD6">
			<?php
			$CCD6 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD6))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD6 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD7">
			<?php
			$CCD7 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD7))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD7 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD8">
			<?php
			$CCD8 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD8))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD8 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<SELECT NAME="vCOLOR_CD9">
			<?php
			$CCD9 = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CCD9))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($COLOR_CD9 == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT>
    	</td>
</tr>
<tr>
    <td><b>Define the Quick Menu for admin(s).</b><br />
    			<i>Hint: keep these chars: <b>|</b> at the end of each line except the last one<br />
    				Empty the box to hide Quick Menu.</i>
    	</td>
    <td><textarea name="vQUICKA" rows=5 cols=28 wrap=on><? echo $QUICKA; ?></textarea></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Define the Quick Menu for moderators.</b><br />
    			<i>Hint: keep these chars: <b>|</b> at the end of each line except the last one<br />
    				Empty the box to hide Quick Menu.</i>
    	</td>
    <td><textarea name="vQUICKM" rows=5 cols=28 wrap=on><? echo $QUICKM; ?></textarea></td>
</tr>
<tr>
    <td><b>Define the Quick Menu for other users.</b><br />
    			<i>Hint: keep these chars: <b>|</b> at the end of each line except the last one<br />
    				Empty the box to hide Quick Menu.</i>
    	</td>
    <td><textarea name="vQUICKU" rows=5 cols=28 wrap=on><? echo $QUICKU; ?></textarea></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable different Colored Names in users list.</b><br />
    	<i><font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font><br />
    	Hint: If enabled, users can set their personal color to use for their usernames in users list.<br />
    	If disabled, admins will be shown in ".$COLOR_CA." and moderators in ".$COLOR_CA." (their default power colors).</i>
    </td>
    <td>
        <select name="vCOLOR_NAMES">
	        <option value="0"<? if($COLOR_NAMES==0){ echo " selected"; } ?>>Disabled
	        <option value="1"<? if($COLOR_NAMES==1){ echo " selected"; } ?>>Enabled
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable AVATAR System.</b><br />
    	<i><font color=red>Important: If you change this setting while there are users logged in, all your users must reload their browsers or exit and relogin. An announcement to all the rooms will be automatically sent if you enable/disable this.</font></i>
    	</td>
    <td>
        <select name="vUSE_AVATARS">
	        <option value="0"<? if($USE_AVATARS==0){ echo " selected"; } ?>>No avatars
	        <option value="1"<? if($USE_AVATARS==1){ echo " selected"; } ?>>Use avatars
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the number of avatars in your defined folder.</b></td>
    <td><input name="vNUM_AVATARS" type="text" size="2" maxlength="3" value="<? echo $NUM_AVATARS; ?>"></td>
</tr>
<tr>
    <td><b>The path to your avatar dir.</b></td>
    <td><input name="vAVA_RELPATH" type="text" size="25" maxlength="55" value="<? echo $AVA_RELPATH; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Users default avatar.</b></td>
    <td><input name="vDEF_AVATAR" type="text" size="25" maxlength="55" value="<? echo $DEF_AVATAR; ?>"></td>
</tr>
<tr>
    <td><b>Enter the width for the avatars to be shown.</b></td>
    <td><input name="vAVA_WIDTH" type="text" size="2" maxlength="3" value="<? echo $AVA_WIDTH; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the height for the avatars to be shown.</b><br />
    	<i>Hint: Usually, for a nice layout, width and hight values should be equal.</i>
    	</td>
    <td><input name="vAVA_HEIGHT" type="text" size="2" maxlength="3" value="<? echo $AVA_HEIGHT; ?>"></td>
</tr>
<tr>
    <td><b>Show Change Avatar (Profile) button in input bar.</b></td>
    <td>
        <select name="vAVA_PROFBUTTON">
	        <option value="0"<? if($AVA_PROFBUTTON==0){ echo " selected"; } ?>>Hide Avatar Button
	        <option value="1"<? if($AVA_PROFBUTTON==1){ echo " selected"; } ?>>Show Avatar Button
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the max number of dices per throw.</b><br />
    	<i>Hint: Needed ONLY for Dice v.2. Use a value smaller than 99. Please note that increasing this value too much, will lead to a load of how many dices images you choose, which can return delays displaying the messages (drastically for non-IE browsers)</i>
    		</td>
    <td><input name="vMAX_DICES" type="text" size="2" maxlength="2" value="<? echo $MAX_DICES; ?>"></td>
</tr>
<tr>
    <td><b>Enter the max number of rolls per dice</b></td>
    <td><input name="vMAX_ROLLS" type="text" size="2" maxlength="3" value="<? echo $MAX_ROLLS; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable BOT in chat.</b><br />
    	<i><font color=red>Important: Before changing any of the bot settings bellow, please stop the bot if it is running in the chat<br />
    		(you will not be able to kick it out afterwards, because it is set as admin)</font></i>
    	</td>
    <td>
        <select name="vBOT_CONTROL">
	        <option value="0"<? if($BOT_CONTROL==0){ echo " selected"; } ?>>Disable Bot
	        <option value="1"<? if($BOT_CONTROL==1){ echo " selected"; } ?>>Enable Bot
        </select>
    </td>
</tr>
<tr>
    <td><b>Enable Public conversations with BOT in chat.</b><br />
    	<i>Hint: if you disable this, the bot will only listen and talk to users using private messages in chat</i>
    	</td>
    <td>
        <select name="vBOT_PUBLIC">
	        <option value="0"<? if($BOT_PUBLIC==0){ echo " selected"; } ?>>Private Bot Only
	        <option value="1"<? if($BOT_PUBLIC==1){ echo " selected"; } ?>>Public Bot
        </select>
    </td>
</tr>
<tr>
    <td><b>Enter the desired name for your BOT.</b><br />
    	<i><font color=red>Important: Do not change this name before you make sure bot is fully loaded (check if it can post in chat).</font></i>
    	</td>
    <td><input name="vBOT_NAME" type="text" size="25" maxlength="25" value="<? echo $BOT_NAME; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the color of the response messages from BOT.</b></td>
    <td>
			<SELECT NAME="vBOT_FONT_COLOR">
			<?php
			$BOTF = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($BOTF))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($BOT_FONT_COLOR == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Null (not selected)</OPTION>");
			}
			?>
			</SELECT>
    	</td>
</tr>
<tr>
    <td><b>Enter the avatar of the BOT.</b><br />
    	<i>Hint: It will be shown only if the avatar system is enabled</i>
    	</td>
    <td><input name="vBOT_AVATAR" type="text" size="25" maxlength="255" value="<? echo $BOT_AVATAR; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enter the message to be posted by BOT on start.</b><br />
    	<i>Hint: Avoid special characters or the settings will not be saved</i>
    	</td>
    <td><input name="vBOT_HELLO" type="text" size="25" maxlength="100" value="<? echo $BOT_HELLO; ?>"></td>
</tr>
<tr>
    <td><b>Enter the message to be posted by BOT on stop.</b><br />
    	<i>Hint: Avoid special characters or the settings will not be saved</i>
    	</td>
    <td><input name="vBOT_BYE" type="text" size="25" maxlength="100" value="<? echo $BOT_BYE; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the maximum size for resizing posted pictures using /img command</b></td>
    <td><input name="vMAX_PIC_SIZE" type="text" size="2" maxlength="3" value="<? echo $MAX_PIC_SIZE; ?>"></td>
</tr>
<tr>
    <td><b>Default sort order in the users lists.</b><br />
    	<i>Hint: users can also use the /sort command to change their sorting order</i>
    	</td>
    <td>
        <select name="vUSERS_SORT_ORD">
	        <option value="0"<? if($USERS_SORT_ORD==0){ echo " selected"; } ?>>By time of entrance
	        <option value="1"<? if($USERS_SORT_ORD==1){ echo " selected"; } ?>>Alphabetically
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable chat logging.</b><br />
    	<i>Hint: it will generate html files of the cleaned/deleted conversations. The full version can be accessed via the admin advanced menu, the short version (only the public messages) from the Extra Options menu in chat rooms.</i>
    	</td>
    <td>
        <select name="vCHAT_LOGS">
	        <option value="0"<? if($CHAT_LOGS==0){ echo " selected"; } ?>>Disable Logs/Archive
	        <option value="1"<? if($CHAT_LOGS==1){ echo " selected"; } ?>>Enable Logs/Archive
        </select>
    </td>
</tr>
<tr>
    <td><b>Set the name of your admin logs folder.</b><br />
    	<i><font color=red>Important: Rename the original "logsadmin" folder to a hard to guess name for your full logs folder.</font><br />
    		Hint: This is different from the users accessible one (called logs), which does not include any private/confidential data from your chat conversations/actions.</i>
    		</td>
    <td><input name="vLOG_DIR" type="text" size="25" maxlength="25" value="<? echo $LOG_DIR; ?>"></td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display logs to non-admin users in chat.</b><br />
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
    <td><b>Enable chat lurking.</b><br />
    	<i>Hint: it will allow people to monitor public conversations and events in the chat, even without loging in.</i>
    	</td>
    <td>
        <select name="vCHAT_LURKING">
	        <option value="0"<? if($CHAT_LURKING==0){ echo " selected"; } ?>>Disable Lurking page
	        <option value="1"<? if($CHAT_LURKING==1){ echo " selected"; } ?>>Enable Lurking page
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Display lurking page to non-admin users in chat and login page.</b><br />
    	<i>Hint: Only if Chat lurking is enabled.</i>
    	</td>
    <td>
        <select name="vSHOW_LURK_USR">
	        <option value="0"<? if($SHOW_LURK_USR==0){ echo " selected"; } ?>>Hide
	        <option value="1"<? if($SHOW_LURK_USR==1){ echo " selected"; } ?>>Show
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Set the characters you wish your users to be allowed to use on registration/login.</b><br />
    	<i>Hint: This is the default set of chars: </i><b>a-zA-Z0-9_.-@#$%^&*()=<>?~{}|`:</b><i> tested for login, which will not break the layout/functionality of your chat.<br />
    		<font color=red>Important: Do not allow these characters, as they will break your chat page after login: exclamation mark, slash, backslash, comma, space, single and double quotes and square (box) brackets (<b>! / \ , ' " [ ]</b>)</font><br /></i>
    		Eventough they will not break anything, it seems that / and ; cannot be banned from being used in login names.
    		</td>
    <td><input name="vREG_CHARS_ALLOWED" type="text" size="25" maxlength="50" value="<? echo $REG_CHARS_ALLOWED; ?>"></td>
</tr>
<tr>
    <td><b>Exit link type.</b><br />
    	<i>Hint: Link stands for the original Exit link, Door rolling stands for the image of such a door.</i>
    	</td>
    <td>
        <select name="vEXIT_LINK_TYPE">
	        <option value="0"<? if($EXIT_LINK_TYPE==0){ echo " selected"; } ?>>Exit link
	        <option value="1"<? if($EXIT_LINK_TYPE==1){ echo " selected"; } ?>>Door rolling
        </select>
    </td>
</tr>
<tr bgcolor="#B0C4DE">
    <td><b>Enable the Chat extras in admin panel.</b></td>
    <td>
        <select name="vCHAT_EXTRAS">
	        <option value="0"<? if($CHAT_EXTRAS==0){ echo " selected"; } ?>>Disable Chat extras
	        <option value="1"<? if($CHAT_EXTRAS==1){ echo " selected"; } ?>>Enable Chat extras
        </select>
    </td>
</tr>
<tr bgcolor="#FFFFFF"><td colspan=2 align=center><a name="quote"></a><b>Random Quote</b></td></tr>
<tr>
    <td><b>Enable Random Quote mod.</b></td>
    <td><input name="vQUOTE_NAME" type="text" size="25" maxlength="25" value="<? echo $QUOTE_NAME; ?>"><br />
        <select name="vQUOTE">
	        <option value="0"<? if($QUOTE==0){ echo " selected"; } ?>>Disable Quotes
	        <option value="1"<? if($QUOTE==1){ echo " selected"; } ?>>Enable Quotes
        </select><br />
    	<input name="vQUOTE_PATH" type="text" size="25" maxlength="255" value="<? echo $QUOTE_PATH; ?>"><br />
        <select name="vQUOTE_ALL">
	        <option value="0"<? if($QUOTE_ALL==0){ echo " selected"; } ?>>Only in Current room
	        <option value="1"<? if($QUOTE_ALL==1){ echo " selected"; } ?>>Post to All rooms
        </select><br />
			Frequency in mins:&nbsp;<input name="vQUOTE_TIME" type="text" size="1" maxlength="2" value="<? echo $QUOTE_TIME; ?>"><br />
			Name color:&nbsp;<SELECT NAME="vQUOTE_FONT_COLOR">
			<?php
			$CQ = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CQ))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($QUOTE_FONT_COLOR == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Default (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			Quote color:&nbsp;<SELECT NAME="vQUOTE_COLOR">
			<?php
			$CQP = explode(",", $ColorList);
			while(list($ColorNumber, $ColorCode) = each($CQP))
			{
				// Red color is reserved to the admin or a moderator for the current room
				echo("<OPTION style=\"background-color:".$ColorCode."; color:black\" VALUE=\"".$ColorCode."\"");
				if($QUOTE_COLOR == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "") echo(">".$ColorCode."</OPTION>");
				else echo(">Default (not selected)</OPTION>");
			}
			?>
			</SELECT><br />
			<input name="vQUOTE_AVATAR" type="text" size="25" maxlength="255" value="<? echo $QUOTE_AVATAR; ?>">
    </td>
</tr>
</table>
<br />
<tr>
	<input type="hidden" name="action" value="submit">
    <td></td><td><input type="submit" name="submit_type" value="Save Changed Settings"></td>
</tr>
</form>
</div>
<?php
}
?>