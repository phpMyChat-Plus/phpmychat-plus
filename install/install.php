<?php
if (!isset($ChatPath)) $ChatPath = "../";

error_reporting (E_ERROR | E_WARNING | E_PARSE);

//session variables
ini_set('session.bug_compat_42',0);
ini_set('session.bug_compat_warn',0);
ini_set('session.use_trans_sid',1);
session_start();

$p = $_REQUEST['p'];
$skip = $_REQUEST['skip'];
if ( $p == "" ) $p = 1;
$p_next = $p + 1;
$p_prev = $p - 1;
$p_all = 5;

$L = $_POST['L'];
$L1 = $_REQUEST['L'];
if ( $L == "" )
{
	if ( $L1 != "" ) $L = $L1;
	else $L = "english";
}

// Disable ftp functions on Windows servers
if (stristr(PHP_OS,'win'))
{
	$do_ftp = 0;
	// chmod patch for both php4 and php5
	if (!function_exists('ftp_chmod')) {
	   function ftp_chmod($ftpstream,$chmod,$file)
	   {
	       $old=error_reporting();//save old
	       error_reporting(0);//set to none
	       $result=ftp_site($ftpstream, "CHMOD ".intval($chmod, 8)." ".$file);
	       error_reporting($old);//reset to old
	       return $result;//will result TRUE or FALSE
	   }
	}
}
else $do_ftp = 1;

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	}
};

include ( $ChatPath."lib/release.lib.php" );
include ( $ChatPath."localization/languages.lib.php" );
include ( $ChatPath."localization/langnames.lib.php");
include ( $ChatPath."localization/_owner/owner.php");
include ( $ChatPath."localization/".$L."/localized.install.php" );
include ( $ChatPath."localization/".$L."/localized.chat.php" );

header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime') && version_compare(PHP_VERSION, '5.3.0') < 0) set_magic_quotes_runtime(0);
else ini_set("magic_quotes_runtime", 0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

// Sessions handler
// from page 1 (available from page 2)
if ($do_ftp)
{
if ( $_SESSION['ftphost'] != "" ) $ftphost = $_SESSION['ftphost'];
if ( $_POST['ftphost'] != "" ) $ftphost = $_POST['ftphost'];
$_SESSION['ftphost'] = $ftphost;
if ( $_SESSION['ftpuname'] != "" ) $ftpuname = $_SESSION['ftpuname'];
if ( $_POST['ftpuname'] != "" ) $ftpuname = $_POST['ftpuname'];
$_SESSION['ftpuname'] = $ftpuname;
if ( $_SESSION['ftppass'] != "" ) $ftppass = $_SESSION['ftppass'];
if ( $_POST['ftppass'] != "" ) $ftppass = $_POST['ftppass'];
$_SESSION['ftppass'] = $ftppass;
#	if (eregi("@",$ftpuname))
	if (stripos($ftpuname,"@") !== false)
	{
		$ftppath == "";
		if ( $_SESSION['ftppath'] != "" ) $_SESSION['ftppath'] = $ftppath;
		if ( $_POST['ftppath'] != "" ) $_POST['ftppath'] = $ftppath;
		$_SESSION['ftppath'] = $ftppath;
	}
if ( $_SESSION['ftppath'] != "" ) $ftppath = $_SESSION['ftppath'];
if ( $_POST['ftppath'] != "" ) $ftppath = $_POST['ftppath'];
$_SESSION['ftppath'] = $ftppath;
}
// from page 2 (available from page 3)
if ( $_SESSION['kind'] != "" ) $kind = $_SESSION['kind'];
if ( $_POST['kind'] != "" ) $kind = $_POST['kind'];
$_SESSION['kind'] = $kind;
// from page 3 (available from page 4)
if ( $_SESSION['dbhost'] != "" ) $dbhost = $_SESSION['dbhost'];
if ( $_POST['dbhost'] != "" ) $dbhost = $_POST['dbhost'];
$_SESSION['dbhost'] = $dbhost;
if ( $_SESSION['dbuname'] != "" ) $dbuname = $_SESSION['dbuname'];
if ( $_POST['dbuname'] != "" ) $dbuname = $_POST['dbuname'];
$_SESSION['dbuname'] = $dbuname;
if ( $_SESSION['dbpass'] != "" ) $dbpass = $_SESSION['dbpass'];
if ( $_POST['dbpass'] != "" ) $dbpass = $_POST['dbpass'];
$_SESSION['dbpass'] = $dbpass;
if ( $_SESSION['dbname'] != "" ) $dbname = $_SESSION['dbname'];
if ( $_POST['dbname'] != "" ) $dbname = $_POST['dbname'];
$_SESSION['dbname'] = $dbname;
if ( $_SESSION['dbtype'] != "" ) $dbtype = $_SESSION['dbtype'];
if ( $_POST['dbtype'] != "" ) $dbtype = $_POST['dbtype'];
$_SESSION['dbtype'] = $dbtype;
if ( $_SESSION['t_messages'] != "" ) $t_messages = $_SESSION['t_messages'];
if ( $_POST['t_messages'] != "" ) $t_messages = $_POST['t_messages'];
$_SESSION['t_messages'] = $t_messages;
if ( $_SESSION['t_users'] != "" ) $t_users = $_SESSION['t_users'];
if ( $_POST['t_users'] != "" ) $t_users = $_POST['t_users'];
$_SESSION['t_users'] = $t_users;
if ( $_SESSION['t_reg_users'] != "" ) $t_reg_users = $_SESSION['t_reg_users'];
if ( $_POST['t_reg_users'] != "" ) $t_reg_users = $_POST['t_reg_users'];
$_SESSION['t_reg_users'] = $t_reg_users;
if ( $_SESSION['t_ban_users'] != "" ) $t_ban_users = $_SESSION['t_ban_users'];
if ( $_POST['t_ban_users'] != "" ) $t_ban_users = $_POST['t_ban_users'];
$_SESSION['t_ban_users'] = $t_ban_users;
if ( $_SESSION['t_config'] != "" ) $t_config = $_SESSION['t_config'];
if ( $_POST['t_config'] != "" ) $t_config = $_POST['t_config'];
$_SESSION['t_config'] = $t_config;
if ( $_SESSION['t_lurkers'] != "" ) $t_lurkers = $_SESSION['t_lurkers'];
if ( $_POST['t_lurkers'] != "" ) $t_lurkers = $_POST['t_lurkers'];
$_SESSION['t_lurkers'] = $t_lurkers;
if ( $_SESSION['t_stats'] != "" ) $t_stats = $_SESSION['t_stats'];
if ( $_POST['t_stats'] != "" ) $t_stats = $_POST['t_stats'];
$_SESSION['t_stats'] = $t_stats;
// from page 4 (available from page 5)
if ( $_SESSION['admin'] != "" ) $admin = $_SESSION['admin'];
if ( $_POST['admin'] != "" ) $admin = $_POST['admin'];
$_SESSION['admin'] = $admin;
if ( $_SESSION['pass1'] != "" ) $pass1 = $_SESSION['pass1'];
if ( $_POST['pass1'] != "" ) $pass1 = $_POST['pass1'];
$_SESSION['pass1'] = $pass1;
if ( $_SESSION['pass2'] != "" ) $pass2 = $_SESSION['pass2'];
if ( $_POST['pass2'] != "" ) $pass2 = $_POST['pass2'];
$_SESSION['pass2'] = $pass2;
if ( $_SESSION['adminname'] != "" ) $adminname = $_SESSION['adminname'];
if ( $_POST['adminname'] != "" ) $adminname = $_POST['adminname'];
$_SESSION['adminname'] = $adminname;
if ( $_SESSION['adminemail'] != "" ) $adminemail = $_SESSION['adminemail'];
if ( $_POST['adminemail'] != "" ) $adminemail = $_POST['adminemail'];
$_SESSION['adminemail'] = $adminemail;
if ( $_SESSION['chaturl'] != "" ) $chaturl = $_SESSION['chaturl'];
if ( $_POST['chaturl'] != "" ) $chaturl = $_POST['chaturl'];
$_SESSION['chaturl'] = $chaturl;
if ( $_SESSION['chatname'] != "" ) $chatname = $_SESSION['chatname'];
if ( $_POST['chatname'] != "" ) $chatname = $_POST['chatname'];
$_SESSION['chatname'] = $chatname;
if ( $_SESSION['logdir'] != "" ) $logdir = $_SESSION['logdir'];
if ( $_POST['logdir'] != "" ) $logdir = $_POST['logdir'];
$_SESSION['logdir'] = $logdir;
if ( $_SESSION['logdirnew'] != "" ) $logdirnew = $_SESSION['logdirnew'];
if ( $_POST['logdirnew'] != "" ) $logdirnew = $_POST['logdirnew'];
$_SESSION['logdirnew'] = $logdirnew;
if ( $_SESSION['domain'] != "" ) $domain = $_SESSION['domain'];
if ( $domain == "" ) $domain = $_SERVER["SERVER_NAME"]; //mychat.wdwr.de
$_SESSION['domain'] = $domain;

if ( $p == 1 )
{
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
instructions_popup=window.open("ins_popup.php","instructions","width=640,height=640,scrollbars=yes,status=yes,location=no");
// -->
</SCRIPT>
<?php
	if ($do_ftp)
	{
		if ( $ftphost == "" )
		{
# 			if (eregi("public_html", $_SERVER["SCRIPT_FILENAME"])) $ftphost = str_replace("www", "ftp", $domain);
			if (stripos($_SERVER["SCRIPT_FILENAME"], "public_html") !== false) $ftphost = str_replace("www", "ftp", $domain);
			else  $ftphost = $domain;
		}
		if ( $ftppath == "" )
		{
			$ftppath = str_replace("install/install.php", "", $_SERVER["SCRIPT_FILENAME"]);
			$ftppath = str_replace("/home/", "", $ftppath);
			$ftppath = str_replace("/srv/www/vhosts/", "", $ftppath);
			if (!isset($ftpuname) || $ftpuname == "")
			{
				$shortstring = substr($ftppath, 0, 400);
				$ftpsubpath = substr($shortstring, 0, strcspn($shortstring, "/"));
			}
			if ($ftppath != "" && $ftpsubpath != "") $ftppath = str_replace($ftpsubpath, "", $ftppath);
#			if (eregi("public_html", $_SERVER["SCRIPT_FILENAME"])) $ftpuname = $ftpsubpath;
			if (stripos($_SERVER["SCRIPT_FILENAME"], "public_html") !== false) $ftpuname = $ftpsubpath;
		}
	}
}
if ( $p == 2 )
{
	// set up basic connection
	if (!$skip && $do_ftp)
	{
		if ($ftpuname != "") $ftppath = str_replace($ftpuname, "", $ftppath);
		if (!isset($ftpuname) || $ftpuname == "") $error3 .= L_FTP_NAME."<br />\n";
		if (!isset($ftppass) || $ftppass == "") $error3 .= L_FTP_PASS."<br />\n";

		if ($ftpuname != "" && $ftppass != "")
		{
			if (@ftp_connect($ftphost) !== false)
			{
				$conn_id = @ftp_connect($ftphost);
				// login with username and password
				if (@ftp_login($conn_id, $ftpuname, $ftppass))
				{
					// try to make the files and folders modifications
					if (ftp_chmod($conn_id, 666, $ftppath."acount/pages/chat_index.txt") !== false) {} else { $error3 .= L_FILE_ERROR1." &quot;/acount/pages/chat_index.txt&quot; ".L_FILE_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 666, $ftppath."acount/pages/chat_ip_logs.htm") !== false) {} else { $error3 .= L_FILE_ERROR1." &quot;acount/pages/chat_ip_logs.htm&quot; ".L_FILE_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 666, $ftppath."acount/pages/ip.txt") !== false) {} else { $error3 .= L_FILE_ERROR1." &quot;/acount/pages/ip.txt&quot; ".L_FILE_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."acount/pages") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/acount/pages&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."acount/pages/bak") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/acount/pages/bak&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."admin/backups") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/admin/backups&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 666, $ftppath."bot/subs.inc") !== false) {} else { $error3 .= L_FILE_ERROR1." &quot;/bot/subs.inc&quot; ".L_FILE_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."botfb") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/botfb&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."cache") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/cache&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 666, $ftppath."config/config.lib.php") !== false) {} else { $error3 .= L_FILE_ERROR1." &quot;/config/config.php&quot; ".L_FILE_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."images/avatars") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/images/avatars&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."images/avatars/uploaded") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/images/avatars/uploaded&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."images/smilies") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/images/smilies&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 666, $ftppath."images/smilies/smilies.php") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/images/smilies/smilies.php&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."logs") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/logs&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."logsadmin") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/logsadmin&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."skins/images") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/skins/images&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
					if (ftp_chmod($conn_id, 777, $ftppath."sounds") !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/sounds&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
			//		if (is_dir($ChatPath.$logdir)) { if (ftp_chmod($conn_id, 777, $ftppath.$logdir) !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/".$logdir."&quot; ".L_FOLD_ERROR2."<br /><br />\n"; } }
			//		if (is_dir($ChatPath.$logdirnew)) { if (ftp_chmod($conn_id, 777, $ftppath.$logdirnew) !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/".$logdirnew."&quot; ".L_FOLD_ERROR2."<br /><br />\n"; } }
					// close the connection
					@ftp_close($conn_id);
				}
				else { $error3 .= L_LOGIN_ERROR."<br />\n"; }
			}
			else { $error3 .= L_CONN_ERROR."<br />\n"; }
		}
	}
	elseif($skip || !$do_ftp)
	{
		include ( $ChatPath."lib/release.lib.php" );
		if (APP_VERSION != "")
		{
/*
			if (eregi("$(v1.[0-6])",APP_VERSION)) $kind == "1016";
			elseif (eregi("^(0.1[4-5](.[0-9])?)",APP_VERSION)) $kind == "014015";
			elseif (eregi("^(0.1[2-3](.[0-9])?)",APP_VERSION)) $kind == "013";
			elseif (eregi("^(0.1[1-2](.[0-9])?)",APP_VERSION)) $kind == "012";
*/
			if (preg_match("/$(v1.[0-6])/i",APP_VERSION)) $kind == "1016";
			elseif (preg_match("/^(0.1[4-5](.[0-9])?)/",APP_VERSION)) $kind == "014015";
			elseif (preg_match("/^(0.1[2-3](.[0-9])?)/",APP_VERSION)) $kind == "013";
			elseif (preg_match("/^(0.1[1-2](.[0-9])?)/",APP_VERSION)) $kind == "012";
			else
			{
				switch (APP_VERSION)
				{
					case "1.94":
					{
						if (APP_MINOR != "") $kind = "194-beta";
						else $kind = "194";
					}
					break;
					case "1.93":
					{
						if (APP_MINOR != "") $kind = "193-beta";
						else $kind = "193";
					}
					break;
					case "1.92":
					{
						$kind = "192";
					}
					break;
					case "1.90":
					{
						$kind = "190";
					}
					break;
					case "v1.8":
					{
						$kind = "18";
					}
					break;
					case "v1.7":
					{
						$kind = "17";
					}
					break;
					default:
					{
						$kind = "new";
					}
					break;
				}
			}
		}
	}
}
if ( $p == 3 )
{
		if ( $kind != "new" ) include ( $ChatPath."config/config.lib.php" );
	  if ( $_SESSION['dbname'] != "" ) $C_DB_NAME = $_SESSION['dbname'];
		else { $C_DB_NAME = C_DB_NAME; if ( $C_DB_NAME == "C_DB_NAME" ) $C_DB_NAME = "cpanelname_chatdb"; }
	  if ( $_SESSION['dbuname'] != "" ) $C_DB_USER = $_SESSION['dbuname'];
		else {$C_DB_USER = C_DB_USER; if ( $C_DB_USER == "C_DB_USER" ) $C_DB_USER = "cpanelname_chatuser"; }
	  if ( $_SESSION['dbpass'] != "" ) $C_DB_PASS = $_SESSION['dbpass'];
		else { $C_DB_PASS = C_DB_PASS; if ( $C_DB_PASS == "C_DB_PASS" ) $C_DB_PASS = ""; }
	  if ( $_SESSION['dbhost'] != "" ) $C_DB_HOST = $_SESSION['dbhost'];
		else { $C_DB_HOST = C_DB_HOST; if ( $C_DB_HOST == "C_DB_HOST" ) $C_DB_HOST = "localhost"; }
	  if ( $_SESSION['dbtype'] != "" ) $C_DB_TYPE = $_SESSION['dbtype'];
		else { $C_DB_TYPE = C_DB_TYPE; if ( $C_DB_TYPE == "C_DB_TYPE" ) $C_DB_TYPE = "mysql"; }
	  if ( $_SESSION['t_messages'] != "" ) $C_MSG_TBL = $_SESSION['t_messages'];
		else { $C_MSG_TBL = C_MSG_TBL; if ( $C_MSG_TBL == "C_MSG_TBL" ) $C_MSG_TBL = "c_messages"; }
	  if ( $_SESSION['t_users'] != "" ) $C_USR_TBL = $_SESSION['t_users'];
		else { $C_USR_TBL = C_USR_TBL; if ( $C_USR_TBL == "C_USR_TBL" ) $C_USR_TBL = "c_users"; }
	  if ( $_SESSION['t_reg_users'] != "" ) $C_REG_TBL = $_SESSION['t_reg_users'];
		else { $C_REG_TBL = C_REG_TBL; if ( $C_REG_TBL == "C_REG_TBL" ) $C_REG_TBL = "c_reg_users"; }
	  if ( $_SESSION['t_ban_users'] != "" ) $C_BAN_TBL = $_SESSION['t_ban_users'];
		else { $C_BAN_TBL = C_BAN_TBL; if ( $C_BAN_TBL == "C_BAN_TBL" ) $C_BAN_TBL = "c_ban_users"; }
	  if ( $_SESSION['t_config'] != "" ) $C_CFG_TBL = $_SESSION['t_config'];
		else { $C_CFG_TBL = C_CFG_TBL; if ( $C_CFG_TBL == "C_CFG_TBL" ) $C_CFG_TBL = "c_config"; }
	  if ( $_SESSION['t_lurkers'] != "" ) $C_LRK_TBL = $_SESSION['t_lurkers'];
		else { $C_LRK_TBL = C_LRK_TBL; if ( $C_LRK_TBL == "C_LRK_TBL" ) $C_LRK_TBL = "c_lurkers"; }
	  if ( $_SESSION['t_stats'] != "" ) $C_STS_TBL = $_SESSION['t_stats'];
		else { $C_STS_TBL = C_STS_TBL; if ( $C_STS_TBL == "C_STS_TBL" ) $C_STS_TBL = "c_stats"; }
	  if ( $_SESSION['logdir'] != "" ) $logdir = $_SESSION['logdir'];
		else { $logdir = C_LOG_DIR; if ( $logdir == "" || $logdir == "C_LOG_DIR") $logdir = "logsadmin"; }
	  if ( $_SESSION['logdirnew'] != "" ) $logdirnew = $_SESSION['logdirnew'];
		else $logdirnew = $logdir;
	  if ( $_SESSION['chaturl'] != "" ) $chaturl = $_SESSION['chaturl'];
		else $chaturl = C_CHAT_URL;
	  if ( $_SESSION['chatname'] != "" ) $chatname = $_SESSION['chatname'];
		else { $chatname = C_CHAT_NAME; if ( $chatname == "C_CHAT_NAME" ) $chatname = "My WonderfulWideWeb Chat"; }
}

$error = "";
if ( $p == 4 )
{
  if ( $admin == "" ) $admin = "Administrator";
  if ( $pass1 == "" ) $pass1 = "";
  if ( $pass2 == "" ) $pass2 = "";
  if ( $adminname == "" ) $adminname = "Your Name";
  if ( $adminemail == "" ) $adminemail = "your@email.com";
  if ( $chaturl == "" || $chaturl == "C_CHAT_URL" ) $chaturl = "http://".str_replace("install/install.php", "", $_SERVER["HTTP_HOST"].$_SERVER["SCRIPT_NAME"]);
	$conn = @mysql_connect ( $dbhost, $dbuname, $dbpass ) OR $error = L_DB_NOCONNECT;
	@mysql_query("SET CHARACTER SET utf8");
	mysql_query("SET NAMES 'utf8'");
	if ( $conn != false )
	{
		// Get MySQL server version and set the corresponding engine type
		$mysql_info = mysql_get_server_info();
		$mysql_version = substr($mysql_info, 0, strpos($mysql_info, "-"));
		$engine = (settype($mysql_version, "float") >= "4.1") ? "ENGINE" : "TYPE";

		$myconn = mysql_select_db ( $dbname, $conn );
		if ( $myconn == false )
		{
			$cr_db = @mysql_create_db ( $dbname, $conn );
			$cr_db = mysql_query ( "CREATE DATABASE $dbname DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci IF NOT EXISTS;", $conn );
			if ( $cr_db == false )
			{
				$error = sprintf(L_DB_HINT1,$dbname);
			}
		}
	}
	if ($logdirnew != $logdir && $logdirnew != "") { $LOG_DIR_N = ", LOG_DIR = '".$logdirnew."'"; $LOG_DIR_NN = "UPDATE $t_config SET LOG_DIR = '".$logdirnew."' WHERE ID='0';"; }
  if ( $error == "" )
  {
  	if ( $kind == "new" )
  	{
  		include ( "database/mysql_new_install.php" );
		mysql_query ( "UPDATE $t_config SET LANGUAGE = '$L', ADMIN_NAME = '$adminname', ADMIN_EMAIL = '$adminemail', CHAT_URL = '$chaturl', CHAT_NAME = '$chatname'".$LOG_DIR_N." WHERE ID='0';" );
  	} elseif ( $kind == "194-beta" )
  	{
  		include ( "database/mysql_upgrade_plus_1.94-beta.php" );
		mysql_query ( $LOG_DIR_NN );
  	} elseif ( $kind == "193" )
  	{
  		include ( "database/mysql_upgrade_plus_1.93.php" );
		mysql_query ( $LOG_DIR_NN );
  	} elseif ( $kind == "193-beta" )
  	{
  		include ( "database/mysql_upgrade_plus_1.93-beta.php" );
		mysql_query ( $LOG_DIR_NN );
  	} elseif ( $kind == "192" )
  	{
  		include ( "database/mysql_upgrade_plus_1.92.php" );
		mysql_query ( $LOG_DIR_NN );
  	} elseif ( $kind == "190" )
  	{
  		include ( "database/mysql_utf8_convert.php" );
  		include ( "database/mysql_upgrade_plus_1.90.php" );
		mysql_query ( $LOG_DIR_NN );
    } elseif ( $kind == "18" )
    {
  		include ( "database/mysql_utf8_convert.php" );
    	include ( "database/mysql_upgrade_plus_1.8.php" );
		mysql_query ( $LOG_DIR_NN );
    } elseif ( $kind == "17" )
    {
  		include ( "database/mysql_utf8_convert.php" );
    	include  ( "database/mysql_upgrade_plus_1.7.php" );
		mysql_query ( $LOG_DIR_NN );
  	} elseif ( $kind == "1016" )
  	{
  		include ( "database/mysql_utf8_convert.php" );
  		include ( "database/mysql_upgrade_plus_1.0-1.6.php" );
		mysql_query ( $LOG_DIR_NN );
  	} elseif ( $kind == "014015" )
  	{
  		include ( "database/mysql_upgrade_std_0.14-0.15.php" );
		mysql_query ( "UPDATE $t_config SET LANGUAGE = '$L', ADMIN_NAME = '$adminname', ADMIN_EMAIL = '$adminemail', CHAT_URL = '$chaturl', CHAT_NAME = '$chatname'".$LOG_DIR_N." WHERE ID='0';" );
  	} elseif ( $kind == "013" )
  	{
  		include ( "database/mysql_upgrade_std_0.13.php" );
		mysql_query ( "UPDATE $t_config SET LANGUAGE = '$L', ADMIN_NAME = '$adminname', ADMIN_EMAIL = '$adminemail', CHAT_URL = '$chaturl', CHAT_NAME = '$chatname'".$LOG_DIR_N." WHERE ID='0';" );
    } elseif ( $kind == "012" )
    {
  		include ( "database/mysql_upgrade_std_0.12.php" );
		mysql_query ( "UPDATE $t_config SET LANGUAGE = '$L', ADMIN_NAME = '$adminname', ADMIN_EMAIL = '$adminemail', CHAT_URL = '$chaturl', CHAT_NAME = '$chatname'".$LOG_DIR_N." WHERE ID='0';" );
    } elseif ( $kind == "no" )
    {
	}
	if ($do_ftp)
	{
		$conn_id = @ftp_connect($ftphost);
		if (@ftp_login($conn_id, $ftpuname, $ftppass))
		{
			if ($kind != "new")
			{
	/*		if (file_exists($ChatPath."config/start_page.css.php")) ftp_delete($conn_id, $ftppath."config/start_page.css.php");
				if (file_exists($ChatPath."config/style.css.php")) ftp_delete($conn_id, $ftppath."config/style.css.php");
				if (file_exists($ChatPath."config/style2.css.php")) ftp_delete($conn_id, $ftppath."config/style2.css.php");
				if (file_exists($ChatPath."config/style3.css.php")) ftp_delete($conn_id, $ftppath."config/style3.css.php");
				if (file_exists($ChatPath."config/style4.css.php")) ftp_delete($conn_id, $ftppath."config/style4.css.php");
				if (file_exists($ChatPath."config/style5.css.php")) ftp_delete($conn_id, $ftppath."config/style5.css.php");
				if (file_exists($ChatPath."config/style6.css.php")) ftp_delete($conn_id, $ftppath."config/style6.css.php");
				if (file_exists($ChatPath."config/style7.css.php")) ftp_delete($conn_id, $ftppath."config/style7.css.php");
				if (file_exists($ChatPath."config/style8.css.php")) ftp_delete($conn_id, $ftppath."config/style8.css.php");
				if (file_exists($ChatPath."config/style9.css.php")) ftp_delete($conn_id, $ftppath."config/style9.css.php");
				if (file_exists($ChatPath."config/style10.css.php")) ftp_delete($conn_id, $ftppath."config/style10.css.php");
	*/
				if (file_exists($ChatPath."docs/plus docs/Instructions.txt")) ftp_delete($conn_id, $ftppath."docs/plus docs/Instructions.txt");
				if (file_exists($ChatPath."extra/.htaccess")) ftp_delete($conn_id, $ftppath."extra/.htaccess");
				if (file_exists($ChatPath."lib/welcome.lib.php")) ftp_delete($conn_id, $ftppath."lib/welcome.lib.php");
				if (file_exists($ChatPath."lib/update.lib.php")) ftp_delete($conn_id, $ftppath."lib/update.lib.php");
				if (file_exists($ChatPath."lib/update.txt")) ftp_delete($conn_id, $ftppath."lib/update.txt");
				if (file_exists($ChatPath."images/helpOff.gif")) ftp_delete($conn_id, $ftppath."images/helpOff.gif");
				if (file_exists($ChatPath."images/helpOn.gif")) ftp_delete($conn_id, $ftppath."images/helpOn.gif");
				if (file_exists($ChatPath."images/nums1.gif")) ftp_delete($conn_id, $ftppath."images/nums1.gif");
				if (file_exists($ChatPath."images/nums2.gif")) ftp_delete($conn_id, $ftppath."images/nums2.gif");
				if (file_exists($ChatPath."images/nums3.gif")) ftp_delete($conn_id, $ftppath."images/nums3.gif");
				if (file_exists($ChatPath."images/nums4.gif")) ftp_delete($conn_id, $ftppath."images/nums4.gif");
				if (file_exists($ChatPath."images/nums5.gif")) ftp_delete($conn_id, $ftppath."images/nums5.gif");
				if (file_exists($ChatPath."images/nums6.gif")) ftp_delete($conn_id, $ftppath."images/nums6.gif");
				if (file_exists($ChatPath."images/exitdoorRoll.gif")) ftp_delete($conn_id, $ftppath."images/exitdoorRoll.gif");
				if (file_exists($ChatPath."images/exitdoor.gif")) ftp_delete($conn_id, $ftppath."images/exitdoor.gif");
				if (file_exists($ChatPath."localization/_owner/localized.owner.php")) ftp_delete($conn_id, $ftppath."localization/_owner/localized.owner.php");
				if (file_exists($ChatPath."localization/argentinian_spanish/flag.gif")) ftp_delete($conn_id, $ftppath."localization/argentinian_spanish/flag.gif");
				if (file_exists($ChatPath."localization/argentinian_spanish/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/argentinian_spanish/flag0.gif");
				if (file_exists($ChatPath."localization/argentinian_spanish/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/argentinian_spanish/localized.topic.php");
				if (file_exists($ChatPath."localization/dutch/flag.gif")) ftp_delete($conn_id, $ftppath."localization/dutch/flag.gif");
				if (file_exists($ChatPath."localization/dutch/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/dutch/flag0.gif");
				if (file_exists($ChatPath."localization/dutch/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/dutch/localized.topic.php");
				if (file_exists($ChatPath."localization/english/flag.gif")) ftp_delete($conn_id, $ftppath."localization/english/flag.gif");
				if (file_exists($ChatPath."localization/english/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/english/flag0.gif");
				if (file_exists($ChatPath."localization/english/flagUS.gif")) ftp_delete($conn_id, $ftppath."localization/english/flagUS.gif");
				if (file_exists($ChatPath."localization/english/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/english/localized.topic.php");
				if (file_exists($ChatPath."localization/french/flag.gif")) ftp_delete($conn_id, $ftppath."localization/french/flag.gif");
				if (file_exists($ChatPath."localization/french/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/french/flag0.gif");
				if (file_exists($ChatPath."localization/french/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/french/localized.topic.php");
				if (file_exists($ChatPath."localization/german/flag.gif")) ftp_delete($conn_id, $ftppath."localization/german/flag.gif");
				if (file_exists($ChatPath."localization/german/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/german/flag0.gif");
				if (file_exists($ChatPath."localization/german/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/german/localized.topic.php");
				if (file_exists($ChatPath."localization/italian/flag.gif")) ftp_delete($conn_id, $ftppath."localization/italian/flag.gif");
				if (file_exists($ChatPath."localization/italian/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/italian/flag0.gif");
				if (file_exists($ChatPath."localization/italian/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/italian/localized.topic.php");
				if (file_exists($ChatPath."localization/romanian/flag.gif")) ftp_delete($conn_id, $ftppath."localization/romanian/flag.gif");
				if (file_exists($ChatPath."localization/romanian/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/romanian/flag0.gif");
				if (file_exists($ChatPath."localization/romanian/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/romanian/localized.topic.php");
				if (file_exists($ChatPath."localization/spanish/flag.gif")) ftp_delete($conn_id, $ftppath."localization/spanish/flag.gif");
				if (file_exists($ChatPath."localization/spanish/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/spanish/flag0.gif");
				if (file_exists($ChatPath."localization/spanish/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/spanish/localized.topic.php");
				if (file_exists($ChatPath."localization/swedish/flag.gif")) ftp_delete($conn_id, $ftppath."localization/swedish/flag.gif");
				if (file_exists($ChatPath."localization/swedish/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/swedish/flag0.gif");
				if (file_exists($ChatPath."localization/swedish/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/swedish/localized.topic.php");
				if (file_exists($ChatPath."localization/turkish/flag.gif")) ftp_delete($conn_id, $ftppath."localization/turkish/flag.gif");
				if (file_exists($ChatPath."localization/turkish/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/turkish/flag0.gif");
				if (file_exists($ChatPath."localization/turkish/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/turkish/localized.topic.php");
				if (file_exists($ChatPath."localization/vietnamese/flag.gif")) ftp_delete($conn_id, $ftppath."localization/vietnamese/flag.gif");
				if (file_exists($ChatPath."localization/vietnamese/flag0.gif")) ftp_delete($conn_id, $ftppath."localization/vietnamese/flag0.gif");
				if (file_exists($ChatPath."localization/vietnamese/localized.topic.php")) ftp_delete($conn_id, $ftppath."localization/vietnamese/localized.topic.php");
			}
		// close the connection
		@ftp_close($conn_id);
		}
	}
  }
  else
  {
	if ($kind != "new")
	{
				if (file_exists($ChatPath."config/start_page.css.php")) unlink($ChatPath."config/start_page.css.php");
				if (file_exists($ChatPath."config/style.css.php")) unlink($ChatPath."config/style.css.php");
				if (file_exists($ChatPath."config/style2.css.php")) unlink($ChatPath."config/style2.css.php");
				if (file_exists($ChatPath."config/style3.css.php")) unlink($ChatPath."config/style3.css.php");
				if (file_exists($ChatPath."config/style4.css.php")) unlink($ChatPath."config/style4.css.php");
				if (file_exists($ChatPath."config/style5.css.php")) unlink($ChatPath."config/style5.css.php");
				if (file_exists($ChatPath."config/style6.css.php")) unlink($ChatPath."config/style6.css.php");
				if (file_exists($ChatPath."config/style7.css.php")) unlink($ChatPath."config/style7.css.php");
				if (file_exists($ChatPath."config/style8.css.php")) unlink($ChatPath."config/style8.css.php");
				if (file_exists($ChatPath."config/style9.css.php")) unlink($ChatPath."config/style9.css.php");
				if (file_exists($ChatPath."config/style10.css.php")) unlink($ChatPath."config/style10.css.php");
				if (file_exists($ChatPath."docs/plus docs/Instructions.txt")) unlink($ChatPath."docs/plus docs/Instructions.txt");
				if (file_exists($ChatPath."extra/.htaccess")) unlink($ChatPath."extra/.htaccess");
				if (file_exists($ChatPath."lib/welcome.lib.php")) unlink($ChatPath."lib/welcome.lib.php");
				if (file_exists($ChatPath."lib/update.lib.php")) unlink($ChatPath."lib/update.lib.php");
				if (file_exists($ChatPath."lib/update.txt")) unlink($ChatPath."lib/update.txt");
				if (file_exists($ChatPath."images/helpOff.gif")) unlink($ChatPath."images/helpOff.gif");
				if (file_exists($ChatPath."images/helpOn.gif")) unlink($ChatPath."images/helpOn.gif");
				if (file_exists($ChatPath."images/nums1.gif")) unlink($ChatPath."images/nums1.gif");
				if (file_exists($ChatPath."images/nums2.gif")) unlink($ChatPath."images/nums2.gif");
				if (file_exists($ChatPath."images/nums3.gif")) unlink($ChatPath."images/nums3.gif");
				if (file_exists($ChatPath."images/nums4.gif")) unlink($ChatPath."images/nums4.gif");
				if (file_exists($ChatPath."images/nums5.gif")) unlink($ChatPath."images/nums5.gif");
				if (file_exists($ChatPath."images/nums6.gif")) unlink($ChatPath."images/nums6.gif");
				if (file_exists($ChatPath."images/exitdoorRoll.gif")) unlink($ChatPath."images/exitdoorRoll.gif");
				if (file_exists($ChatPath."images/exitdoor.gif")) unlink($ChatPath."images/exitdoor.gif");
				if (file_exists($ChatPath."localization/_owner/localized.owner.php")) unlink($ChatPath."localization/_owner/localized.owner.php");
				if (file_exists($ChatPath."localization/argentinian_spanish/flag.gif")) unlink($ChatPath."localization/argentinian_spanish/flag.gif");
				if (file_exists($ChatPath."localization/argentinian_spanish/flag0.gif")) unlink($ChatPath."localization/argentinian_spanish/flag0.gif");
				if (file_exists($ChatPath."localization/argentinian_spanish/localized.topic.php")) unlink($ChatPath."localization/argentinian_spanish/localized.topic.php");
				if (file_exists($ChatPath."localization/dutch/flag.gif")) unlink($ChatPath."localization/dutch/flag.gif");
				if (file_exists($ChatPath."localization/dutch/flag0.gif")) unlink($ChatPath."localization/dutch/flag0.gif");
				if (file_exists($ChatPath."localization/dutch/localized.topic.php")) unlink($ChatPath."localization/dutch/localized.topic.php");
				if (file_exists($ChatPath."localization/english/flag.gif")) unlink($ChatPath."localization/english/flag.gif");
				if (file_exists($ChatPath."localization/english/flag0.gif")) unlink($ChatPath."localization/english/flag0.gif");
				if (file_exists($ChatPath."localization/english/flagUS.gif")) unlink($ChatPath."localization/english/flagUS.gif");
				if (file_exists($ChatPath."localization/english/localized.topic.php")) unlink($ChatPath."localization/english/localized.topic.php");
				if (file_exists($ChatPath."localization/french/flag.gif")) unlink($ChatPath."localization/french/flag.gif");
				if (file_exists($ChatPath."localization/french/flag0.gif")) unlink($ChatPath."localization/french/flag0.gif");
				if (file_exists($ChatPath."localization/french/localized.topic.php")) unlink($ChatPath."localization/french/localized.topic.php");
				if (file_exists($ChatPath."localization/german/flag.gif")) unlink($ChatPath."localization/german/flag.gif");
				if (file_exists($ChatPath."localization/german/flag0.gif")) unlink($ChatPath."localization/german/flag0.gif");
				if (file_exists($ChatPath."localization/german/localized.topic.php")) unlink($ChatPath."localization/german/localized.topic.php");
				if (file_exists($ChatPath."localization/italian/flag.gif")) unlink($ChatPath."localization/italian/flag.gif");
				if (file_exists($ChatPath."localization/italian/flag0.gif")) unlink($ChatPath."localization/italian/flag0.gif");
				if (file_exists($ChatPath."localization/italian/localized.topic.php")) unlink($ChatPath."localization/italian/localized.topic.php");
				if (file_exists($ChatPath."localization/romanian/flag.gif")) unlink($ChatPath."localization/romanian/flag.gif");
				if (file_exists($ChatPath."localization/romanian/flag0.gif")) unlink($ChatPath."localization/romanian/flag0.gif");
				if (file_exists($ChatPath."localization/romanian/localized.topic.php")) unlink($ChatPath."localization/romanian/localized.topic.php");
				if (file_exists($ChatPath."localization/spanish/flag.gif")) unlink($ChatPath."localization/spanish/flag.gif");
				if (file_exists($ChatPath."localization/spanish/flag0.gif")) unlink($ChatPath."localization/spanish/flag0.gif");
				if (file_exists($ChatPath."localization/spanish/localized.topic.php")) unlink($ChatPath."localization/spanish/localized.topic.php");
				if (file_exists($ChatPath."localization/swedish/flag.gif")) unlink($ChatPath."localization/swedish/flag.gif");
				if (file_exists($ChatPath."localization/swedish/flag0.gif")) unlink($ChatPath."localization/swedish/flag0.gif");
				if (file_exists($ChatPath."localization/swedish/localized.topic.php")) unlink($ChatPath."localization/swedish/localized.topic.php");
				if (file_exists($ChatPath."localization/turkish/flag.gif")) unlink($ChatPath."localization/turkish/flag.gif");
				if (file_exists($ChatPath."localization/turkish/flag0.gif")) unlink($ChatPath."localization/turkish/flag0.gif");
				if (file_exists($ChatPath."localization/turkish/localized.topic.php")) unlink($ChatPath."localization/turkish/localized.topic.php");
				if (file_exists($ChatPath."localization/vietnamese/flag.gif")) unlink($ChatPath."localization/vietnamese/flag.gif");
				if (file_exists($ChatPath."localization/vietnamese/flag0.gif")) unlink($ChatPath."localization/vietnamese/flag0.gif");
				if (file_exists($ChatPath."localization/vietnamese/localized.topic.php")) unlink($ChatPath."localization/vietnamese/localized.topic.php");
			}
  }
}

$error4 = "";
if ( $p == 5 )
{
	if ( $kind == "new" )
	{
		if ( $_POST['admin'] == "" )
		{
			$error4 = L_PASS_ERROR1;
		}
		else
		{
			if ( ( $_POST['pass1'] == "" ) || ( $_POST['pass2'] == "" ) )
			{
				$error4 = L_PASS_ERROR2;
			} else
			{
				if ( $_POST['pass1'] != $_POST['pass2'] )
				{
					$error4 = L_PASS_ERROR3;
				} else
				{
					$pass_crypt = MD5 ( $_POST['pass1'] );
					mysql_connect ( $dbhost, $dbuname, $dbpass );
					@mysql_query("SET CHARACTER SET utf8");
					mysql_query("SET NAMES 'utf8'");
					mysql_select_db ( $dbname );
					mysql_query ( "INSERT INTO $t_reg_users VALUES ('', '', '$admin', '0', '$pass_crypt', '', '', '', '$chaturl', '', 0, 'admin', '', '', '', 0, 1, '', '', 'http://sourceforge.net/projects/phpmychat', 'http://ciprianmp.com/plus', '', 'red', 'images/avatars/def_avatar.gif', '0', '', '', '', '', '', '', '', '', '');" );
				}
			}
		}
	}
	if ($error4 == "")
	{
		if ($do_ftp)
		{
			$conn_id = @ftp_connect($ftphost);
			if (@ftp_login($conn_id, $ftpuname, $ftppass))
			{
				ftp_chmod($conn_id, 644, $ftppath."config/config.lib.php");
				if (file_exists($ChatPath."config/color.lib.php")) ftp_delete($conn_id, $ftppath."config/color.lib.php");
				ftp_delete($conn_id, $ftppath."install/install.php");
				if ($logdir != $logdirnew)
				{
					if (@ftp_rename($conn_id, $ftppath.$logdir, $ftppath.$logdirnew) !== false) {} else { $error3 .= L_FOLD_ERROR1." &quot;/".$logdirnew."&quot; ".L_FOLD_ERROR2."<br /><br />\n"; }
			    }
				// close the connection
				@ftp_close($conn_id);
			}
		}
		else
		{
			if (file_exists($ChatPath."config/color.lib.php")) unlink($ChatPath."config/color.lib.php");
			unlink($ChatPath."install/install.php");
			if ($logdir != $logdirnew)
			{
				rename($ChatPath.$logdir, $ChatPath.$logdirnew);
			}
		}
	}
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
<LINK REL="stylesheet" HREF="<?php echo($ChatPath."skins/style1.css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<title><?php echo (sprintf(L_INST_FOR,APP_NAME)); ?></title>
</head>
<body class="frame">
<center>
<br />
<table class="table" align="center" border="3" cellpadding="0" cellspacing="1" style="border-spacing: 3px; border-style: groove; border-color: blue; border-collapse: separate; border-left-width:3; border-right-width:3" bordercolor="#111111" width="500" id="AutoNumber1">
<form action="install.php?p=<?php echo $p_next."&L=".$L ?>" method="post">
  <tr>
    <td width="100%" style="border-left: 1px solid #111111; border-right-color: #111111; border-right-width: 1">
    <p align="center"><b><font face="Tahoma" size="5"><?php echo (sprintf(L_INST_FOR,APP_NAME)); ?></font></b></p>
    <p align="center"><i><b><font size="4" face="Tahoma"><?php echo L_INST_VER." ".APP_VERSION.APP_MINOR ?></font></b></i></td>
  </tr>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right-style: none; border-right-width: medium">&nbsp;</td>
  </tr>
<?php if ( $p == 1 ) { ?>
  <tr>
    <td width="100%" style="border-left-color: #111111; border-left-width: 1; border-right-color: #111111; border-right-width: 1">
    <font face="Tahoma"><center>
	<span class="ChatFlags">
<?php

$i = 0;
while(list($key, $name) = each($AvailableLanguages))
{
	$i++;
		$flag = "flag.gif";
		if ($name == "argentinian_spanish" && L_ORIG_LANG_AR != "L_ORIG_LANG_AR") $FLAG_NAME = L_ORIG_LANG_AR.(L_LANG_AR != "L_LANG_AR" ? "/".L_LANG_AR : "");
		elseif ($name == "bulgarian" && L_ORIG_LANG_BG != "L_ORIG_LANG_BG") $FLAG_NAME = L_ORIG_LANG_BG.(L_LANG_BG != "L_LANG_BG" ? "/".L_LANG_BG : "");
		elseif ($name == "brazilian_portuguese" && L_ORIG_LANG_BR != "L_ORIG_LANG_BR") $FLAG_NAME = L_ORIG_LANG_BR.(L_LANG_BR != "L_LANG_BR" ? "/".L_LANG_BR : "");
		elseif ($name == "catalan" && L_ORIG_LANG_CA != "L_ORIG_LANG_CA") $FLAG_NAME = L_ORIG_LANG_CA.(L_LANG_CA != "L_LANG_CA" ? "/".L_LANG_CA : "");
		elseif ($name == "czech" && L_ORIG_LANG_CZ != "L_ORIG_LANG_CZ") $FLAG_NAME = L_ORIG_LANG_CZ.(L_LANG_CZ != "L_LANG_CZ" ? "/".L_LANG_CZ : "");
		elseif ($name == "danish" && L_ORIG_LANG_DA != "L_ORIG_LANG_DA") $FLAG_NAME = L_ORIG_LANG_DA.(L_LANG_DA != "L_LANG_DA" ? "/".L_LANG_DA : "");
		elseif ($name == "dutch" && L_ORIG_LANG_NL != "L_ORIG_LANG_NL") $FLAG_NAME = L_ORIG_LANG_NL.(L_LANG_NL != "L_LANG_NL" ? "/".L_LANG_NL : "");
		elseif ($name == "english" && L_ORIG_LANG_EN != "L_ORIG_LANG_EN") $FLAG_NAME = L_ORIG_LANG_EN.(L_LANG_EN != "L_LANG_EN" ? "/".L_LANG_EN : "");
		elseif ($name == "french" && L_ORIG_LANG_FR != "L_ORIG_LANG_FR") $FLAG_NAME = L_ORIG_LANG_FR.(L_LANG_FR != "L_LANG_FR" ? "/".L_LANG_FR : "");
		elseif ($name == "georgian" && L_ORIG_LANG_KA != "L_ORIG_LANG_KA") $FLAG_NAME = L_ORIG_LANG_KA.(L_LANG_KA != "L_LANG_KA" ? "/".L_LANG_KA : "");
		elseif ($name == "german" && L_ORIG_LANG_DE != "L_ORIG_LANG_DE") $FLAG_NAME = L_ORIG_LANG_DE.(L_LANG_DE != "L_LANG_DE" ? "/".L_LANG_DE : "");
		elseif ($name == "greek" && L_ORIG_LANG_GR != "L_ORIG_LANG_GR") $FLAG_NAME = L_ORIG_LANG_GR.(L_LANG_GR != "L_LANG_GR" ? "/".L_LANG_GR : "");
		elseif ($name == "hebrew" && L_ORIG_LANG_HE != "L_ORIG_LANG_HE") $FLAG_NAME = L_ORIG_LANG_HE.(L_LANG_HE != "L_LANG_HE" ? "/".L_LANG_HE : "");
		elseif ($name == "hindi" && L_ORIG_LANG_HI != "L_ORIG_LANG_HI") $FLAG_NAME = L_ORIG_LANG_HI.(L_LANG_HI != "L_LANG_HI" ? "/".L_LANG_HI : "");
		elseif ($name == "hungarian" && L_ORIG_LANG_HU != "L_ORIG_LANG_HU") $FLAG_NAME = L_ORIG_LANG_HU.(L_LANG_HU != "L_LANG_HU" ? "/".L_LANG_HU : "");
		elseif ($name == "indonesian" && L_ORIG_LANG_ID != "L_ORIG_LANG_ID") $FLAG_NAME = L_ORIG_LANG_ID.(L_LANG_ID != "L_LANG_ID" ? "/".L_LANG_ID : "");
		elseif ($name == "italian" && L_ORIG_LANG_IT != "L_ORIG_LANG_IT") $FLAG_NAME = L_ORIG_LANG_IT.(L_LANG_IT != "L_LANG_IT" ? "/".L_LANG_IT : "");
		elseif ($name == "japanese" && L_ORIG_LANG_JA != "L_ORIG_LANG_JA") $FLAG_NAME = L_ORIG_LANG_JA.(L_LANG_JA != "L_LANG_JA" ? "/".L_LANG_JA : "");
		elseif ($name == "nepali" && L_ORIG_LANG_NE != "L_ORIG_LANG_NE") $FLAG_NAME = L_ORIG_LANG_NE.(L_LANG_NE != "L_LANG_NE" ? "/".L_LANG_NE : "");
		elseif ($name == "norwegian_bokmal" && L_ORIG_LANG_NB != "L_ORIG_LANG_NB") $FLAG_NAME = L_ORIG_LANG_NB.(L_LANG_NB != "L_LANG_NB" ? "/".L_LANG_NB : "");
		elseif ($name == "norwegian_nynorsk" && L_ORIG_LANG_NN != "L_ORIG_LANG_NN") $FLAG_NAME = L_ORIG_LANG_NN.(L_LANG_NN != "L_LANG_NN" ? "/".L_LANG_NN : "");
		elseif ($name == "persian" && L_ORIG_LANG_FA != "L_ORIG_LANG_FA") $FLAG_NAME = L_ORIG_LANG_FA.(L_LANG_FA != "L_LANG_FA" ? "/".L_LANG_FA : "");
		elseif ($name == "polish" && L_ORIG_LANG_PL != "L_ORIG_LANG_PL") $FLAG_NAME = L_ORIG_LANG_PL.(L_LANG_PL != "L_LANG_PL" ? "/".L_LANG_PL : "");
		elseif ($name == "portuguese" && L_ORIG_LANG_PT != "L_ORIG_LANG_PT") $FLAG_NAME = L_ORIG_LANG_PT.(L_LANG_PT != "L_LANG_PT" ? "/".L_LANG_PT : "");
		elseif ($name == "romanian" && L_ORIG_LANG_RO != "L_ORIG_LANG_RO") $FLAG_NAME = L_ORIG_LANG_RO.(L_LANG_RO != "L_LANG_RO" ? "/".L_LANG_RO : "");
		elseif ($name == "russian" && L_ORIG_LANG_RU != "L_ORIG_LANG_RU") $FLAG_NAME = L_ORIG_LANG_RU.(L_LANG_RU != "L_LANG_RU" ? "/".L_LANG_RU : "");
		elseif ($name == "serbian_latin" && L_ORIG_LANG_SRL != "L_ORIG_LANG_SRL") $FLAG_NAME = L_ORIG_LANG_SRL.(L_LANG_SRL != "L_LANG_SRL" ? "/".L_LANG_SRL : "");
		elseif ($name == "serbian_cyrillic" && L_ORIG_LANG_SRC != "L_ORIG_LANG_SRC") $FLAG_NAME = L_ORIG_LANG_SRC.(L_LANG_SRC != "L_LANG_SRC" ? "/".L_LANG_SRC : "");
		elseif ($name == "slovak" && L_ORIG_LANG_SK != "L_ORIG_LANG_SK") $FLAG_NAME = L_ORIG_LANG_SK.(L_LANG_SK != "L_LANG_SK" ? "/".L_LANG_SK : "");
		elseif ($name == "spanish" && L_ORIG_LANG_ES != "L_ORIG_LANG_ES") $FLAG_NAME = L_ORIG_LANG_ES.(L_LANG_ES != "L_LANG_ES" ? "/".L_LANG_ES : "");
		elseif ($name == "swedish" && L_ORIG_LANG_SV != "L_ORIG_LANG_SV") $FLAG_NAME = L_ORIG_LANG_SV.(L_LANG_SV != "L_LANG_SV" ? "/".L_LANG_SV : "");
		elseif ($name == "thai" && L_ORIG_LANG_TH != "L_ORIG_LANG_TH") $FLAG_NAME = L_ORIG_LANG_TH.(L_LANG_TH != "L_LANG_TH" ? "/".L_LANG_TH : "");
		elseif ($name == "turkish" && L_ORIG_LANG_TR != "L_ORIG_LANG_TR") $FLAG_NAME = L_ORIG_LANG_TR.(L_LANG_TR != "L_LANG_TR" ? "/".L_LANG_TR : "");
		elseif ($name == "ukrainian" && L_ORIG_LANG_UK != "L_ORIG_LANG_UK") $FLAG_NAME = L_ORIG_LANG_UK.(L_LANG_UK != "L_LANG_UK" ? "/".L_LANG_UK : "");
		elseif ($name == "urdu" && L_ORIG_LANG_UR != "L_ORIG_LANG_UR") $FLAG_NAME = L_ORIG_LANG_UR.(L_LANG_UR != "L_LANG_UR" ? "/".L_LANG_UR : "");
		elseif ($name == "vietnamese" && L_ORIG_LANG_VI != "L_ORIG_LANG_VI") $FLAG_NAME = L_ORIG_LANG_VI.(L_LANG_VI != "L_LANG_VI" ? "/".L_LANG_VI : "");
		elseif ($name == "yoruba" && L_ORIG_LANG_YO != "L_ORIG_LANG_YO") $FLAG_NAME = L_ORIG_LANG_YO.(L_LANG_YO != "L_LANG_YO" ? "/".L_LANG_YO : "");
		else
		{
			$FLAG_NAME = str_replace("_"," ",$name);
			$FLAG_NAME = mb_convert_case($FLAG_NAME,MB_CASE_TITLE,$Charset);
		}
		if ($name == $L)
		{
			$FLAG_OVER = $FLAG_NAME." (".L_SELECTED.")";
			$FLAG_STATUS = $FLAG_OVER;
		}
		else
		{
			$FLAG_OVER = $FLAG_NAME;
			$FLAG_STATUS = sprintf(L_SWITCH,$FLAG_NAME);
		}
		if ($name != $L) echo("<A HREF=\"$Action?L=${name}\" onMouseOver=\"window.status='".$FLAG_STATUS.".'; return true;\" Title=\"".$FLAG_OVER."\">");
		echo("<IMG SRC=\"${ChatPath}localization/${name}/images/".$flag."\" onMouseOver=\"window.status='".$FLAG_STATUS.".'; return true;\" BORDER=0 ALT=\"".$FLAG_OVER."\" Title=\"".$FLAG_OVER."\">");
		if ($name != $L) echo("</A>");
		echo("&nbsp;");
	if ($i % 20 == 0) echo ("<br />");
}
?>
    	</span>
		</center></font></td>
  </tr>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right-style: none; border-right-width: medium">&nbsp;</td>
  </tr>
<?php } ?>
  <tr>
    <td width="100%" align="center" style="border-left-color: #111111; border-left-width: 1; border-right-color: #111111; border-right-width: 1">
    <font face="Tahoma"><b><?php echo L_INST_SETUP." ".sprintf(L_INST_PAG_OF,$p,$p_all) ?></b></font></td>
  </tr>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right: medium none #111111">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" style="border-left-color: #111111; border-left-width: 1; border-right-color: #111111; border-right-width: 1">
    <p align="<?php echo ( $p != 1 ? "justify" : "center");  ?>"><font face="Tahoma" size="2">
<?php if ( $p == 1 ) { ?>
<?php echo (sprintf(L_P0_HINT1,APP_NAME." ".APP_VERSION.APP_MINOR)); ?>
<?php echo ($do_ftp ? "<br />".L_P0_HINT2 : ""); ?>
<?php } // END OF PAGE 1  ?>
<?php if ( $p == 2 ) { ?>
<?php if ( $error3 == "" ) { ?>
<?php echo (L_P1_HINT1."<br /><br />".L_P1_HINT2); ?>
<?php } else { ?>
<?php echo (L_P1_HINT3."<br /><br />".$error3); ?>
<?php } ?>
<?php } // END OF PAGE 2
elseif ( $p == 3 ) { ?>
    <p align="justify"><font face="Tahoma" size="2"><?php echo (L_P2_HINT1); ?></font></p>
<?php
$value = is_writable ($ChatPath."config/config.lib.php");
if ( $value == false ) { ?>
<p align="justify"><b><font face="Tahoma" size="2" color="#800000"><?php echo L_P2_HINT2 ?></font></b></p>
<p align="justify"><b><font face="Tahoma" size="2" color="#800000"><?php echo L_P2_HINT3 ?></font></b></p>
<?php } // END OF NOT WRITEABLE
 else { ?>
<p align="justify"><b><font face="Tahoma" size="2" color="#008000"><?php echo L_P2_HINT4 ?></font></b>
<?php } // END OF WRITEABLE ?>
<?php } // END OF PAGE 3
elseif ( $p == 4 ) { ?>
<?php if ( $error != "" ) { ?>
<b><font face="Tahoma" size="2" color="#FF0000"><?php echo $error ?><br /> <br /></font></b>
<?php echo L_P3_HINT1 ?>
<?php } // END OF ERROR != ""
else {
$value = is_writable ($ChatPath."config/config.lib.php");
if ( $value == false ) { ?>
    <font face="Tahoma" size="2" color="#800000"><?php echo L_P3_HINT2 ?>
<?php if ( $kind == "new" ) { ?>
<?php echo L_P3_HINT3 ?>
<?php } // END OF kind=NEW?>
</font></b><p align="left"><font face="Tahoma" size="2"><?php L_P3_HINT4 ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type=button value="<?php echo L_P3_BTN1 ?>" onclick="javascript:this.form.source.focus();this.form.source.select();"><br />
    </font>&nbsp;<textarea rows="20" name="source" cols="46">&lt;?php

// ------ THESE SETTINGS MUST BE COMPLETED ------

// Database settings
define("C_DB_NAME", '<?php echo $dbname ?>');						// Logical database name on that server (most common like: cpanelusername_databasename)
define("C_DB_USER", '<?php echo $dbuname ?>');				// Database username (most common like: cpanelusername_username)
define("C_DB_PASS", '<?php echo $dbpass ?>');				// Database user's password
// We recommend you keep the names below
define("C_DB_HOST", '<?php echo $dbhost ?>');				// Hostname of your MySQL server (most common "localhost", but sometimes "mysql.domain.com")
define("C_DB_TYPE", '<?php echo $dbtype ?>');						// SQL server type ("mysql", "pgsql" or "odbc")
define("C_BAN_TBL", '<?php echo $t_ban_users ?>'); 		// Name of the table where banished users are stored
define("C_CFG_TBL", '<?php echo $t_config ?>'); 				// Name of the table where configuration settings are stored (if enabled)
define("C_LRK_TBL", '<?php echo $t_lurkers ?>'); 			// Name of the table where data about lurkers are stored (if enabled)
define("C_MSG_TBL", '<?php echo $t_messages ?>');			// Name of the table where messages are stored
define("C_REG_TBL", '<?php echo $t_reg_users ?>'); 		// Name of the table where registered users are stored
define("C_STS_TBL", '<?php echo $t_stats ?>'); 			// Name of the table where statistics data is stored (if enabled)
define("C_USR_TBL", '<?php echo $t_users ?>');					// Name of the table where user names are stored

// ------ THESE SETTINGS MUST NOT BE CHANGED ------
error_reporting (E_ERROR | E_WARNING | E_PARSE);
#error_reporting (E_ALL); //for debugging purposes only!

$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
@mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
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
$EMAIL_PASWD		     = $row[8];
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
$ROOM_SKIN1						= $row[75];
$ROOM_SKIN2						= $row[76];
$ROOM_SKIN3						= $row[77];
$ROOM_SKIN4						= $row[78];
$ROOM_SKIN5						= $row[79];
$ROOM_SKIN6						= $row[80];
$ROOM_SKIN7						= $row[81];
$ROOM_SKIN8						= $row[82];
$ROOM_SKIN9						= $row[83];
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
$QUOTE						= $row[133];
$QUOTE_TIME			= $row[134];
$QUOTE_COLOR			= $row[135];
$QUOTE_PATH			= $row[136];
$HIDE_ADMINS			= $row[137];
$HIDE_MODERS			= $row[138];
$LAST_SAVED_ON		= $row[139];
$LAST_SAVED_BY		= $row[140];
$CHAT_SYSTEM      = $row[141];
$NUKE_BB_PATH     = $row[142];
$CHAT_NAME	     = $row[143];
$ENGLISH_FORMAT	     = $row[144];
$FLAGS_3D	     = $row[145];
$ALLOW_REGISTER    = $row[146];
$DISP_GENDER    = $row[147];
$SPECIAL_GHOSTS			= $row[148];
$FILLED_LOGIN			= $row[149];
$BACKGR_IMG				= $row[150];
$BACKGR_IMG_PATH		= $row[151];
$POPUP_LINKS			= $row[152];
$ITALICIZE_POWERS		= $row[153];
$MAIL_GREETING			= $row[154];
$PM_KEEP_DAYS			= $row[155];
$ALLOW_PM_DEL			= $row[156];
$LOGIN_COUNTER			= $row[157];
$ALLOW_GRAVATARS		= $row[158];
$GRAVATARS_CACHE		= $row[159];
$GRAVATARS_CACHE_EXPIRE	= $row[160];
$GRAVATARS_RATING		= $row[161];
$GRAVATARS_DYNAMIC_DEF	= $row[162];
$GRAVATARS_DYNAMIC_DEF_FORCE	= $row[163];
$ALLOW_UPLOADS			= $row[164];
$RES_ROOM1						= $row[165];
$RES_ROOM2						= $row[166];
$RES_ROOM3						= $row[167];
$RES_ROOM4						= $row[168];
$RES_ROOM5						= $row[169];
$EN_STATS						= $row[170];
$ALLOW_VIDEO					= $row[171];
$VIDEO_WIDTH					= $row[172];
$VIDEO_HEIGHT					= $row[173];
$REQUIRE_BDAY					= $row[174];
$SEND_BDAY_EMAIL				= $row[175];
$SEND_BDAY_TIME					= $row[176];
$SEND_BDAY_INTVAL				= $row[177];
$SEND_BDAY_PATH					= $row[178];
$EN_WMPLAYER					= $row[179];
$WMP_STREAM						= $row[180];
$OPEN_ALL_BEG					= $row[181];
$OPEN_ALL_END					= $row[182];
$OPEN_SUN_BEG					= $row[183];
$OPEN_SUN_END					= $row[184];
$OPEN_MON_BEG					= $row[185];
$OPEN_MON_END					= $row[186];
$OPEN_TUE_BEG					= $row[187];
$OPEN_TUE_END					= $row[188];
$OPEN_WED_BEG					= $row[189];
$OPEN_WED_END					= $row[190];
$OPEN_THU_BEG					= $row[191];
$OPEN_THU_END					= $row[192];
$OPEN_FRI_BEG					= $row[193];
$OPEN_FRI_END					= $row[194];
$OPEN_SAT_BEG					= $row[195];
$OPEN_SAT_END					= $row[196];
$ALLOW_TEXT_COLORS				= $row[197];
$TAGS_POWERS					= $row[198];
$ALLOW_MATH						= $row[199];

$query_bot = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email='bot@bot.com'";
$result_bot = mysql_query($query_bot);
list($BOT_NAME, $BOT_AVATAR, $BOT_FONT_COLOR) = mysql_fetch_row($result_bot);

$query_quote = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email='quote@quote.com'";
$result_quote = mysql_query($query_quote);
list($QUOTE_NAME, $QUOTE_AVATAR, $QUOTE_FONT_COLOR) = mysql_fetch_row($result_quote);
@mysql_close($conn);
define("C_SUPPORT_PAID", 0);
define("C_SEARCH_PAID", 0);

// Cleaning settings for messages and usernames
define("C_MSG_DEL", $MSG_DEL);
define("C_USR_DEL", $USR_DEL);
define("C_CHAT_BOOT", $CHAT_BOOT);
define("C_REG_DEL", $REG_DEL);

// Language settings
define("C_LANGUAGE", $LANGUAGE);
define("C_MULTI_LANG", $MULTI_LANG);
define("C_ENGLISH_FORMAT", $ENGLISH_FORMAT);
define("C_FLAGS_3D", $FLAGS_3D);

// Registration of users
define("C_ALLOW_REGISTER", $ALLOW_REGISTER);
define("C_REQUIRE_REGISTER", $REQUIRE_REGISTER);
define("C_REQUIRE_NAMES", $REQUIRE_NAMES);
define("C_EMAIL_PASWD", $EMAIL_PASWD);
define("C_EMAIL_USER", $EMAIL_USER);
define("C_PASS_LENGTH", $PASS_LENGTH);
define("C_ADMIN_NOTIFY", $ADMIN_NOTIFY);
define("C_ADMIN_NAME", $ADMIN_NAME);
define("C_ADMIN_EMAIL", $ADMIN_EMAIL);
define("C_CHAT_URL", stripos($CHAT_URL,"http://") !== false ? $CHAT_URL : "./");

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

$PUBLIC_ROOMS = $EN_ROOM1 ? ($RES_ROOM1 ? ROOM1." [R], " : ROOM1.", ") : "";
$PUBLIC_ROOMS .= $EN_ROOM2 ? ($RES_ROOM2 ? ROOM2." [R], " : ROOM2.", ") : "";
$PUBLIC_ROOMS .= $EN_ROOM3 ? ($RES_ROOM3 ? ROOM3." [R], " : ROOM3.", ") : "";
$PUBLIC_ROOMS .= $EN_ROOM4 ? ($RES_ROOM4 ? ROOM4." [R], " : ROOM4.", ") : "";
$PUBLIC_ROOMS .= $EN_ROOM5 ? ($RES_ROOM5 ? ROOM5." [R], " : ROOM5.", ") : "";
$PUBLIC_DISP_ROOMS = trim($PUBLIC_ROOMS,", ");
$PUBLIC_ROOMS = trim(str_replace(" [R]","",$PUBLIC_ROOMS),", ");
$PRIVATE_ROOMS = $EN_ROOM6 ? ROOM6.", " : "";
$PRIVATE_ROOMS .= $EN_ROOM7 ? ROOM7.", " : "";
$PRIVATE_ROOMS .= $EN_ROOM8 ? ROOM8.", " : "";
$PRIVATE_ROOMS .= $EN_ROOM9 ? ROOM9.", " : "";
$PRIVATE_ROOMS = trim($PRIVATE_ROOMS,", ");
$DefaultChatRooms = explode(", ", $PUBLIC_ROOMS);
if ($PUBLIC_DISP_ROOMS != $PUBLIC_ROOMS) $DefaultDispChatRooms = explode(", ", $PUBLIC_DISP_ROOMS);
if ($PRIVATE_ROOMS == "") $DefaultPrivateRooms = NULL;
else $DefaultPrivateRooms = explode(", ", $PRIVATE_ROOMS);

//	Profanity filter disabled for following rooms - by Ciprian
define("C_NO_SWEAR_ROOM1", $SWEAR1);
define("C_NO_SWEAR_ROOM2", $SWEAR2);
define("C_NO_SWEAR_ROOM3", $SWEAR3);
define("C_NO_SWEAR_ROOM4", $SWEAR4);

// For Bob Dickow's multi/split smiley's in help popup modification:
define("SMILEY_COLS", $SMILEY_COLS);
define("SMILEY_COLS_POP", $SMILEY_COLS_POP);

// Sound for users entering Chat.
define("ALLOW_ENTRANCE_SOUND", $ALLOW_ENTRANCE_SOUND);
define("ENTRANCE_SOUND", $ENTRANCE_SOUND);
define("WELCOME_SOUND", $WELCOME_SOUND);
if (ALLOW_ENTRANCE_SOUND == 3 && ENTRANCE_SOUND)
{
	define("L_ENTER_SND", "<EMBED SRC=\"".$ENTRANCE_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Hello\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$ENTRANCE_SOUND."\" LOOP=1></NOEMBED></EMBED>");
	define("L_WELCOME_SND", "<EMBED SRC=\"".$WELCOME_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Welcome\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$WELCOME_SOUND."\" LOOP=1></NOEMBED></EMBED>");
}
elseif (ALLOW_ENTRANCE_SOUND == 2 && WELCOME_SOUND)
{
	define("L_ENTER_SND", "");
	define("L_WELCOME_SND", "<EMBED SRC=\"".$WELCOME_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Welcome\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$WELCOME_SOUND."\" LOOP=1></NOEMBED></EMBED>");
}
elseif (ALLOW_ENTRANCE_SOUND == 1 && ENTRANCE_SOUND)
{
	define("L_ENTER_SND", "<EMBED SRC=\"".$ENTRANCE_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Hello\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$ENTRANCE_SOUND."\" LOOP=1></NOEMBED></EMBED>");
	define("L_WELCOME_SND", "");
}
else
{
	define("L_ENTER_SND", "");
	define("L_WELCOME_SND", "");
}

// Buzz Sound command.
define("ALLOW_BUZZ_SOUND", $ALLOW_BUZZ_SOUND);
define("BUZZ_SOUND", $BUZZ_SOUND);
if (ALLOW_BUZZ_SOUND && BUZZ_SOUND) define("L_BUZZ_SND", "<EMBED SRC=\"".$BUZZ_SOUND."\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Buzz\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$BUZZ_SOUND."\" LOOP=1></NOEMBED></EMBED>");
else define("L_BUZZ_SND", "");

// Enable different Topics for each room, defined in topic.php.
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
define("C_ENABLE_PM", $ENABLE_PM);
define("C_PRIV_POPUP", $PRIV_POPUP);

// Chat Etiquete by Ealdwulf&Emma-Kate from http://wizardtales.net/chat
define("SHOW_ETIQ_IN_HELP", $SHOW_ETIQ_IN_HELP);

// Show logo on top of thefirst page
define ("C_SHOW_LOGO", $SHOW_LOGO);
define ("C_LOGO_IMG", $LOGO_IMG);
define ("C_LOGO_OPEN", $LOGO_OPEN);
define ("C_LOGO_ALT", $LOGO_ALT);
define ("APP_LOGO", "<A HREF='".$LOGO_OPEN."' TITLE='".$LOGO_ALT."' onMouseOver=\"window.status='".C_LOGO_ALT."'; return true\" TARGET=_blank><IMG SRC='".$LOGO_IMG."' BORDER=0 ALT='".$LOGO_ALT."'></A>");  // Application logo image

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
define("COLOR_CA", $COLOR_CA);
define("COLOR_CA1", $COLOR_CA1);
define("COLOR_CA2", $COLOR_CA2);
define("COLOR_CM", $COLOR_CM);
define("COLOR_CM1", $COLOR_CM1);
define("COLOR_CM2", $COLOR_CM2);

// Color Input Box Mod by Ciprian - allow guests to use colors - default "yes".
define("COLOR_ALLOW_GUESTS", $COLOR_ALLOW_GUESTS);

// ------ THESE IS A WEB STANDARD - SETTINGS MUST NOT BE CHANGED!!!  (it will show the 16 web-safe standard colors on the Color Help Page)------
define("COLOR_LIST", "<P style=\"background-color:tan; color:black;\">[ <SPAN style=\"color:aqua\">aqua</SPAN> - <SPAN style=\"color:black\">black</SPAN> - <SPAN style=\"color:blue\">blue</SPAN> - <SPAN style=\"color:fuchsia\">fuchsia</SPAN> - <SPAN style=\"color:gray\">gray</SPAN> - <SPAN style=\"color:green\">green</SPAN> - <SPAN style=\"color:lime\">lime</SPAN> - <SPAN style=\"color:maroon\">maroon</SPAN> ]<br />[ <SPAN style=\"color:navy\">navy</SPAN> - <SPAN style=\"color:olive\">olive</SPAN> - <SPAN style=\"color:purple\">purple</SPAN> - <SPAN style=\"color:red\">red</SPAN> - <SPAN style=\"color:silver\">silver</SPAN> - <SPAN style=\"color:teal\">teal</SPAN> - <SPAN style=\"color:white\">white</SPAN> - <SPAN style=\"color:yellow\">yellow</SPAN> ]</P>");

// ------ THIS IS THE LIST OF COLORS DISPLAYED IN YOUR DROP-DOWN LIST. IF YOU KNOW MORE, JUST ADD THEM HERE ------
define("COLORLIST", '"","black","dimgray","gray","darkgray","silver","lightgrey","gainsboro","whitesmoke","ghostwhite","white","slategray","lightslategray","midnightblue","navy","darkblue","darkslateblue","mediumblue","blue","steelblue","royalblue","cornflowerblue","dodgerblue","deepskyblue","lightskyblue","skyblue","lightsteelblue","lightblue","powderblue","paleturquoise","lightcyan","aliceblue","azure","mintcream","darkslategray","cadetblue","teal","darkcyan","lightseagreen","darkturquoise","mediumturquoise","turquoise","aqua","cyan","mediumaquamarine","aquamarine","darkolivegreen","olive","olivedrab","darkkhaki","darkgreen","green","forestgreen","seagreen","mediumseagreen","darkseagreen","mediumspringgreen","springgreen","palegreen","honeydew","limegreen","lime","lightgreen","lawngreen","chartreuse","greenyellow","yellowgreen","indigo","purple","darkmagenta","darkviolet","darkorchid","mediumorchid","orchid","violet","plum","thistle","blueviolet","mediumpurple","slateblue","mediumslateblue","lavender","mediumvioletred","magenta","fuchsia","deeppink","palevioletred","hotpink","lightpink","pink","mistyrose","lavenderblush","maroon","darkred","firebrick","crimson","red","orangered","tomato","indianred","lightcoral","salmon","darksalmon","lightsalmon","coral","darkorange","orange","sandybrown","darkgoldenrod","goldenrod","gold","yellow","khaki","palegoldenrod","lemonchiffon","cornsilk","lightgoldenrodyellow","beige","lightyellow","ivory","rosybrown","saddlebrown","brown","sienna","chocolate","peru","tan","burlywood","wheat","navajowhite","peachpuff","moccasin","bisque","blanchedalmond","papayawhip","antiquewhite","linen","oldlace","seashell","floralwhite","snow"');

// ------ THESE SETTINGS MUST NOT BE CHANGED WITHOUT EXPERTISE ------
if (C_SKIN)
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
			$skin = "${ChatPath}skins/style".$ROOM_SKIN1."";
			include("${ChatPath}skins/style".$ROOM_SKIN1.".php");
		}
		break;
		case ROOM2:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN2."";
			include("${ChatPath}skins/style".$ROOM_SKIN2.".php");
		}
		break;
		case ROOM3:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN3."";
			include("${ChatPath}skins/style".$ROOM_SKIN3.".php");
		}
		break;
		case ROOM4:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN4."";
			include("${ChatPath}skins/style".$ROOM_SKIN4.".php");
		}
		break;
		case ROOM5:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN5."";
			include("${ChatPath}skins/style".$ROOM_SKIN5.".php");
		}
		break;
		case ROOM6:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN6."";
			include("${ChatPath}skins/style".$ROOM_SKIN6.".php");
		}
		break;
		case ROOM7:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN7."";
			include("${ChatPath}skins/style".$ROOM_SKIN7.".php");
		}
		break;
		case ROOM8:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN8."";
			include("${ChatPath}skins/style".$ROOM_SKIN8.".php");
		}
		break;
		case ROOM9:
		{
			$skin = "${ChatPath}skins/style".$ROOM_SKIN9."";
			include("${ChatPath}skins/style".$ROOM_SKIN9.".php");
		}
		break;
	}
}
else						//default style if Room Skin mod is disabled
{
	if ($ROOM_SKIN1 == "") $ROOM_SKIN1 = "1";
	$skin = "${ChatPath}skins/style".$ROOM_SKIN1."";
	include("${ChatPath}skins/style".$ROOM_SKIN1.".php");
}

// For Bob Dickow's QuickNotes modification
// Comment the lines below to disable the quick menu for any of those mentioned
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

define("C_BOT_CONTROL", $BOT_CONTROL);    // enable/disable bot
define("C_BOT_NAME", $BOT_NAME);         // The Name of your ProjectE Bot (Will change later)
define("C_BOT_FONT_COLOR", $BOT_FONT_COLOR);   // Font color BOT text will be.
define("C_BOT_AVATAR", $BOT_AVATAR);		//avatar of the bot
define("C_BOT_HELLO", $BOT_HELLO);      // The hello text bot will post to the room.
define("C_BOT_BYE", $BOT_BYE);         // The bye text bot will post to the room.
define("C_BOT_PUBLIC", $BOT_PUBLIC);   // Enable/Disable public conversations with bot in the room/rooms.

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

// Display the worldtimes in status bar
define("C_WORLDTIME", $WORLDTIME);

// Enable/disable the update check feature in cpanel
define("UPD_CHECK", $UPD_CHECK);

// Random Quote mod by Ciprian
define("C_QUOTE", $QUOTE);
define("C_QUOTE_TIME", $QUOTE_TIME);
define("C_QUOTE_COLOR", $QUOTE_COLOR);
define("C_QUOTE_PATH", $QUOTE_PATH);
define("C_QUOTE_NAME", $QUOTE_NAME);
define("C_QUOTE_AVATAR", $QUOTE_AVATAR);
define("C_QUOTE_FONT_COLOR", $QUOTE_FONT_COLOR);

// Ghost control mod by Ciprian
define("C_HIDE_ADMINS", $HIDE_ADMINS);
define("C_HIDE_MODERS", $HIDE_MODERS);

// Last configuration by Ciprian
define("C_LAST_SAVED_ON", $LAST_SAVED_ON);
define("C_LAST_SAVED_BY", $LAST_SAVED_BY);

// PHP-Nuke / phpBB integration by TPS
define("C_CHAT_SYSTEM", $CHAT_SYSTEM);
define("C_NUKE_BB_PATH", $NUKE_BB_PATH);

// Added for owner personalizations to all the languages by Ciprian
if(is_dir("./${ChatPath}localization/_owner/") && file_exists("./${ChatPath}localization/_owner/owner.php")) include("./${ChatPath}localization/_owner/owner.php");

// Added for Original Language names by Ciprian
if(file_exists("./${ChatPath}localization/langnames.lib.php")) include("./${ChatPath}localization/langnames.lib.php");

// Public Name of your chat server as you wish to be known on the web - by Ciprian
define("C_CHAT_NAME", $CHAT_NAME);

// Display genders - by Ciprian
define("C_DISP_GENDER", $DISP_GENDER);

// Ghost usernames - by Ciprian
$SPECIALGHOSTS = str_replace(",","','",$SPECIAL_GHOSTS);
$SPECIALGHOSTS = str_replace(","," AND username != ",$SPECIALGHOSTS);
define("C_SPECIAL_GHOSTS", "'".$SPECIALGHOSTS."'");

// Index page body layout - by Ciprian
define("C_FILLED_LOGIN", $FILLED_LOGIN);

// Background image on login page - by Ciprian
define("C_BACKGR_IMG", $BACKGR_IMG);
define("C_BACKGR_IMG_PATH", $BACKGR_IMG_PATH);

// Popup posted links protection - by Alex & Ciprian
define("C_POPUP_LINKS", $POPUP_LINKS);

// Italicize power usernames - by Ciprian
define("C_ITALICIZE_POWERS", $ITALICIZE_POWERS);

// Email greeting closure in Admin4 sheet - by Ciprian
define("C_MAIL_GREETING", $MAIL_GREETING);

// Days to keep unread PMs in the database - by Ciprian
define("C_PM_KEEP_DAYS", $PM_KEEP_DAYS);

// Allow users to delete their own PMs from the database - by Ciprian
define("C_ALLOW_PM_DEL", $ALLOW_PM_DEL);

// It counts logins of registered users to chat (returning users) - by Ciprian
define("C_LOGIN_COUNTER", $LOGIN_COUNTER);

// Gravatars system - by Ciprian (details on www.gravatars.com)
define("ALLOW_GRAVATARS", $ALLOW_GRAVATARS);
define("GRAVATARS_CACHE", $GRAVATARS_CACHE);
define("GRAVATARS_CACHE_EXPIRE", $GRAVATARS_CACHE_EXPIRE);
define("GRAVATARS_RATING", $GRAVATARS_RATING);
define("GRAVATARS_DYNAMIC_DEF", $GRAVATARS_DYNAMIC_DEF);
define("GRAVATARS_DYNAMIC_DEF_FORCE", $GRAVATARS_DYNAMIC_DEF_FORCE);

// Uploader mod - by Ciprian
define("C_ALLOW_UPLOADS", $ALLOW_UPLOADS);

// Statistics mod - by Ciprian
define("C_EN_STATS", $EN_STATS);

// Video posting mod - by Ciprian
define("C_ALLOW_VIDEO", $ALLOW_VIDEO);
define("C_VIDEO_WIDTH", $VIDEO_WIDTH);
define("C_VIDEO_HEIGHT", $VIDEO_HEIGHT);

// Birthday mod - by Ciprian
define("C_REQUIRE_BDAY", $REQUIRE_BDAY);
define("C_BDAY_EMAIL", $SEND_BDAY_EMAIL);
define("C_BDAY_TIME", $SEND_BDAY_TIME);
define("C_BDAY_INTVAL", $SEND_BDAY_INTVAL);
define("C_BDAY_PATH", $SEND_BDAY_PATH);

// MediaPlayer add-on by Ciprian
define("C_EN_WMPLAYER", $EN_WMPLAYER);
define("C_WMP_STREAM", $WMP_STREAM);

// Open/Close Schedule add-on by Ciprian
define("C_OPEN_ALL_BEG", $OPEN_ALL_BEG);
define("C_OPEN_ALL_END", $OPEN_ALL_END);
define("C_OPEN_SUN_BEG", $OPEN_SUN_BEG);
define("C_OPEN_SUN_END", $OPEN_SUN_END);
define("C_OPEN_MON_BEG", $OPEN_MON_BEG);
define("C_OPEN_MON_END", $OPEN_MON_END);
define("C_OPEN_TUE_BEG", $OPEN_TUE_BEG);
define("C_OPEN_TUE_END", $OPEN_TUE_END);
define("C_OPEN_WED_BEG", $OPEN_WED_BEG);
define("C_OPEN_WED_END", $OPEN_WED_END);
define("C_OPEN_THU_BEG", $OPEN_THU_BEG);
define("C_OPEN_THU_END", $OPEN_THU_END);
define("C_OPEN_FRI_BEG", $OPEN_FRI_BEG);
define("C_OPEN_FRI_END", $OPEN_FRI_END);
define("C_OPEN_SAT_BEG", $OPEN_SAT_BEG);
define("C_OPEN_SAT_END", $OPEN_SAT_END);

// Colors and Tags for chat text Ciprian
define("C_ALLOW_TEXT_COLORS", $ALLOW_TEXT_COLORS);
define("C_TAGS_POWERS", $TAGS_POWERS);

// MathJax LaTeX formulas rendering in chat
define("C_ALLOW_MATH", $ALLOW_MATH);
?&gt;</textarea></p>
<?php } // END OF IS NOT WRITEABLE
else {

if ( ! $fh = fopen ( $ChatPath."config/config.lib.php", "w" ) )
{
	$error = L_P3_HINT5;
} // END OF COULD NOT OPEN
else {
  $lfeed = "\r\n";
  if ( ! fputs ( $fh, '<?php'.$lfeed ) )
  {
  	$error = 'Could not write into "config/config.lib.php"!';
  } // END OF COULD NOT WRITE
  else {
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// ------ THESE SETTINGS MUST BE COMPLETED ------'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Database settings'.$lfeed );
  	fputs ( $fh, 'define("C_DB_NAME", \''.$dbname.'\');						// Logical database name on that server (most common like: cpanelusername_databasename)'.$lfeed );
  	fputs ( $fh, 'define("C_DB_USER", \''.$dbuname.'\');				// Database username (most common like: cpanelusername_username)'.$lfeed );
  	fputs ( $fh, 'define("C_DB_PASS", \''.$dbpass.'\');				// Database user\'s password'.$lfeed );
  	fputs ( $fh, '// We recommend you keep the names below'.$lfeed );
  	fputs ( $fh, 'define("C_DB_HOST", \''.$dbhost.'\');				// Hostname of your MySQL server (most common "localhost", but sometimes "mysql.domain.com")'.$lfeed );
  	fputs ( $fh, 'define("C_DB_TYPE", \''.$dbtype.'\');						// SQL server type ("mysql", "pgsql" or "odbc")'.$lfeed );
  	fputs ( $fh, 'define("C_BAN_TBL", \''.$t_ban_users.'\'); 		// Name of the table where banished users are stored'.$lfeed );
  	fputs ( $fh, 'define("C_CFG_TBL", \''.$t_config.'\'); 				// Name of the table where configuration settings are stored (if enabled)'.$lfeed );
  	fputs ( $fh, 'define("C_LRK_TBL", \''.$t_lurkers.'\'); 			// Name of the table where data about lurkers are stored (if enabled)'.$lfeed );
  	fputs ( $fh, 'define("C_MSG_TBL", \''.$t_messages.'\');			// Name of the table where messages are stored'.$lfeed );
  	fputs ( $fh, 'define("C_REG_TBL", \''.$t_reg_users.'\'); 		// Name of the table where registered users are stored'.$lfeed );
  	fputs ( $fh, 'define("C_STS_TBL", \''.$t_stats.'\'); 			// Name of the table where statistics data is stored (if enabled)'.$lfeed );
  	fputs ( $fh, 'define("C_USR_TBL", \''.$t_users.'\');					// Name of the table where user names are stored'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// ------ THESE SETTINGS MUST NOT BE CHANGED ------'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, 'error_reporting (E_ERROR | E_WARNING | E_PARSE);'.$lfeed );
  	fputs ( $fh, '#error_reporting (E_ALL); //for debugging purposes only!'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '$conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die (\'<center>Error: Could Not Connect To Database\');'.$lfeed );
  	fputs ( $fh, '@mysql_query("SET CHARACTER SET utf8");'.$lfeed );
  	fputs ( $fh, 'mysql_query("SET NAMES \'utf8\'");'.$lfeed );
  	fputs ( $fh, 'mysql_select_db(C_DB_NAME);'.$lfeed );
  	fputs ( $fh, '$query = "SELECT * FROM ".C_CFG_TBL."";'.$lfeed );
  	fputs ( $fh, '$result = mysql_query($query);'.$lfeed );
  	fputs ( $fh, '$row = mysql_fetch_row($result);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '$MSG_DEL        			= $row[1];'.$lfeed );
  	fputs ( $fh, '$USR_DEL		          = $row[2];'.$lfeed );
  	fputs ( $fh, '$REG_DEL		          = $row[3];'.$lfeed );
  	fputs ( $fh, '$LANGUAGE   		      = $row[4];'.$lfeed );
  	fputs ( $fh, '$MULTI_LANG     		  = $row[5];'.$lfeed );
  	fputs ( $fh, '$REQUIRE_REGISTER 		= $row[6];'.$lfeed );
  	fputs ( $fh, '$REQUIRE_NAMES				= $row[7];'.$lfeed );
  	fputs ( $fh, '$EMAIL_PASWD		      = $row[8];'.$lfeed );
  	fputs ( $fh, '$PASS_LENGTH			 		= $row[9];'.$lfeed );
  	fputs ( $fh, '$ADMIN_NOTIFY			 		= $row[10];'.$lfeed );
  	fputs ( $fh, '$ADMIN_NAME			 			= $row[11];'.$lfeed );
  	fputs ( $fh, '$ADMIN_EMAIL			 		= $row[12];'.$lfeed );
  	fputs ( $fh, '$CHAT_URL					 		= $row[13];'.$lfeed );
  	fputs ( $fh, '$SHOW_ADMIN     		  = $row[14];'.$lfeed );
  	fputs ( $fh, '$SHOW_DEL_PROF		    = $row[15];'.$lfeed );
  	fputs ( $fh, '$VERSION         			= $row[16];'.$lfeed );
  	fputs ( $fh, '$BANISH  		    	    = $row[17];'.$lfeed );
  	fputs ( $fh, '$NO_SWEAR   		      = $row[18];'.$lfeed );
  	fputs ( $fh, '$SWEAR_EXPR 		      = $row[19];'.$lfeed );
  	fputs ( $fh, '$SAVE           		  = $row[20];'.$lfeed );
  	fputs ( $fh, '$USE_SMILIES		      = $row[21];'.$lfeed );
  	fputs ( $fh, '$HTML_TAGS_KEEP 		  = $row[22];'.$lfeed );
  	fputs ( $fh, '$HTML_TAGS_SHOW			  = $row[23];'.$lfeed );
  	fputs ( $fh, '$TMZ_OFFSET     		  = $row[24];'.$lfeed );
  	fputs ( $fh, '$MSG_ORDER		        = $row[25];'.$lfeed );
  	fputs ( $fh, '$MSG_NB       		    = $row[26];'.$lfeed );
  	fputs ( $fh, '$MSG_REFRESH      		= $row[27];'.$lfeed );
  	fputs ( $fh, '$SHOW_TIMESTAMP		  	= $row[28];'.$lfeed );
  	fputs ( $fh, '$NOTIFY								= $row[29];'.$lfeed );
  	fputs ( $fh, '$WELCOME		          = $row[30];'.$lfeed );
  	fputs ( $fh, '$SMILEY_COLS				  = $row[31];'.$lfeed );
  	fputs ( $fh, '$SMILEY_COLS_POP			= $row[32];'.$lfeed );
  	fputs ( $fh, '$ALLOW_ENTRANCE_SOUND	= $row[33];'.$lfeed );
  	fputs ( $fh, '$ENTRANCE_SOUND				= $row[34];'.$lfeed );
  	fputs ( $fh, '$ALLOW_BUZZ_SOUND			= $row[35];'.$lfeed );
  	fputs ( $fh, '$BUZZ_SOUND						= $row[36];'.$lfeed );
  	fputs ( $fh, '$TOPIC_DIFF						= $row[37];'.$lfeed );
  	fputs ( $fh, '$SHOW_TUT							= $row[38];'.$lfeed );
  	fputs ( $fh, '$SHOW_INFO						= $row[39];'.$lfeed );
  	fputs ( $fh, '$SET_CMDS							= $row[40];'.$lfeed );
  	fputs ( $fh, '$CMDS									= $row[41];'.$lfeed );
  	fputs ( $fh, '$SET_MODS							= $row[42];'.$lfeed );
  	fputs ( $fh, '$MODS									= $row[43];'.$lfeed );
  	fputs ( $fh, '$SET_BOT							= $row[44];'.$lfeed );
  	fputs ( $fh, '$ROOM_SAYS						= $row[45];'.$lfeed );
  	fputs ( $fh, '$DEMOTE_MOD						= $row[46];'.$lfeed );
  	fputs ( $fh, '$PRIV_POPUP						= $row[47];'.$lfeed );
  	fputs ( $fh, '$SHOW_ETIQ_IN_HELP		= $row[48];'.$lfeed );
  	fputs ( $fh, '$SHOW_LOGO						= $row[49];'.$lfeed );
  	fputs ( $fh, '$LOGO_IMG							= $row[50];'.$lfeed );
  	fputs ( $fh, '$LOGO_OPEN						= $row[51];'.$lfeed );
  	fputs ( $fh, '$LOGO_ALT							= $row[52];'.$lfeed );
  	fputs ( $fh, '$SHOW_OWNER						= $row[53];'.$lfeed );
  	fputs ( $fh, '$SHOW_PRIV						= $row[54];'.$lfeed );
  	fputs ( $fh, '$SHOW_PRIV_MOD				= $row[55];'.$lfeed );
  	fputs ( $fh, '$SHOW_PRIV_USR				= $row[56];'.$lfeed );
  	fputs ( $fh, '$SHOW_COUNTER					= $row[57];'.$lfeed );
  	fputs ( $fh, '$INSTALL_DATE					= $row[58];'.$lfeed );
  	fputs ( $fh, '$USE_SKIN				      = $row[59];'.$lfeed );
  	fputs ( $fh, '$ROOM1					      = $row[60];'.$lfeed );
  	fputs ( $fh, '$ROOM2					      = $row[61];'.$lfeed );
  	fputs ( $fh, '$ROOM3			  		    = $row[62];'.$lfeed );
  	fputs ( $fh, '$ROOM4					      = $row[63];'.$lfeed );
  	fputs ( $fh, '$ROOM5					      = $row[64];'.$lfeed );
  	fputs ( $fh, '$ROOM6			  		    = $row[65];'.$lfeed );
  	fputs ( $fh, '$ROOM7			      		= $row[66];'.$lfeed );
  	fputs ( $fh, '$ROOM8					      = $row[67];'.$lfeed );
  	fputs ( $fh, '$ROOM9					      = $row[68];'.$lfeed );
  	fputs ( $fh, '$SWEAR1								= $row[69];'.$lfeed );
  	fputs ( $fh, '$SWEAR2			 					= $row[70];'.$lfeed );
  	fputs ( $fh, '$SWEAR3	 							= $row[71];'.$lfeed );
  	fputs ( $fh, '$SWEAR4	 							= $row[72];'.$lfeed );
  	fputs ( $fh, '$COLOR_FILTERS				= $row[73];'.$lfeed );
  	fputs ( $fh, '$COLOR_ALLOW_GUESTS		= $row[74];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN1						= $row[75];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN2						= $row[76];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN3						= $row[77];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN4						= $row[78];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN5						= $row[79];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN6						= $row[80];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN7						= $row[81];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN8						= $row[82];'.$lfeed );
  	fputs ( $fh, '$ROOM_SKIN9						= $row[83];'.$lfeed );
  	fputs ( $fh, '$COLOR_CA							= $row[84];'.$lfeed );
  	fputs ( $fh, '$COLOR_CA1						= $row[85];'.$lfeed );
  	fputs ( $fh, '$COLOR_CA2						= $row[86];'.$lfeed );
  	fputs ( $fh, '$COLOR_CM							= $row[87];'.$lfeed );
  	fputs ( $fh, '$COLOR_CM1						= $row[88];'.$lfeed );
  	fputs ( $fh, '$COLOR_CM2						= $row[89];'.$lfeed );
  	fputs ( $fh, '$QUICKA								= $row[90];'.$lfeed );
  	fputs ( $fh, '$QUICKM								= $row[91];'.$lfeed );
  	fputs ( $fh, '$QUICKU								= $row[92];'.$lfeed );
  	fputs ( $fh, '$COLOR_NAMES					= $row[93];'.$lfeed );
  	fputs ( $fh, '$USE_AVATARS					= $row[94];'.$lfeed );
  	fputs ( $fh, '$NUM_AVATARS					= $row[95];'.$lfeed );
  	fputs ( $fh, '$AVA_RELPATH					= $row[96];'.$lfeed );
  	fputs ( $fh, '$DEF_AVATAR						= $row[97];'.$lfeed );
  	fputs ( $fh, '$AVA_WIDTH						= $row[98];'.$lfeed );
  	fputs ( $fh, '$AVA_HEIGHT						= $row[99];'.$lfeed );
  	fputs ( $fh, '$AVA_PROFBUTTON				= $row[100];'.$lfeed );
  	fputs ( $fh, '$MAX_DICES						= $row[101];'.$lfeed );
  	fputs ( $fh, '$MAX_ROLLS						= $row[102];'.$lfeed );
  	fputs ( $fh, '$BOT_CONTROL					= $row[103];'.$lfeed );
  	fputs ( $fh, '$MAX_PIC_SIZE					= $row[104];'.$lfeed );
  	fputs ( $fh, '$USERS_SORT_ORD				= $row[105];'.$lfeed );
  	fputs ( $fh, '$CHAT_LOGS						= $row[106];'.$lfeed );
  	fputs ( $fh, '$LOG_DIR							= $row[107];'.$lfeed );
  	fputs ( $fh, '$SHOW_LOGS_USR				= $row[108];'.$lfeed );
  	fputs ( $fh, '$CHAT_LURKING					= $row[109];'.$lfeed );
  	fputs ( $fh, '$SHOW_LURK_USR				= $row[110];'.$lfeed );
  	fputs ( $fh, '$BAN_IP								= $row[111];'.$lfeed );
  	fputs ( $fh, '$REG_CHARS_ALLOWED		= $row[112];'.$lfeed );
  	fputs ( $fh, '$EXIT_LINK_TYPE				= $row[113];'.$lfeed );
  	fputs ( $fh, '$CHAT_EXTRAS					= $row[114];'.$lfeed );
  	fputs ( $fh, '$EMAIL_USER						= $row[115];'.$lfeed );
  	fputs ( $fh, '$BOT_HELLO						= $row[116];'.$lfeed );
  	fputs ( $fh, '$BOT_BYE							= $row[117];'.$lfeed );
  	fputs ( $fh, '$BOT_PUBLIC						= $row[118];'.$lfeed );
  	fputs ( $fh, '$ENABLE_PM						= $row[119];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM1							= $row[120];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM2							= $row[121];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM3							= $row[122];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM4							= $row[123];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM5							= $row[124];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM6							= $row[125];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM7							= $row[126];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM8							= $row[127];'.$lfeed );
  	fputs ( $fh, '$EN_ROOM9							= $row[128];'.$lfeed );
  	fputs ( $fh, '$CHAT_BOOT						= $row[129];'.$lfeed );
  	fputs ( $fh, '$WELCOME_SOUND				= $row[130];'.$lfeed );
  	fputs ( $fh, '$WORLDTIME						= $row[131];'.$lfeed );
  	fputs ( $fh, '$UPD_CHECK						= $row[132];'.$lfeed );
  	fputs ( $fh, '$QUOTE						= $row[133];'.$lfeed );
  	fputs ( $fh, '$QUOTE_TIME			= $row[134];'.$lfeed );
  	fputs ( $fh, '$QUOTE_COLOR			= $row[135];'.$lfeed );
  	fputs ( $fh, '$QUOTE_PATH			= $row[136];'.$lfeed );
  	fputs ( $fh, '$HIDE_ADMINS			= $row[137];'.$lfeed );
  	fputs ( $fh, '$HIDE_MODERS			= $row[138];'.$lfeed );
  	fputs ( $fh, '$LAST_SAVED_ON		= $row[139];'.$lfeed );
  	fputs ( $fh, '$LAST_SAVED_BY		= $row[140];'.$lfeed );
  	fputs ( $fh, '$CHAT_SYSTEM			= $row[141];'.$lfeed );
  	fputs ( $fh, '$NUKE_BB_PATH			= $row[142];'.$lfeed );
  	fputs ( $fh, '$CHAT_NAME			= $row[143];'.$lfeed );
  	fputs ( $fh, '$ENGLISH_FORMAT		= $row[144];'.$lfeed );
  	fputs ( $fh, '$FLAGS_3D				= $row[145];'.$lfeed );
  	fputs ( $fh, '$ALLOW_REGISTER		= $row[146];'.$lfeed );
  	fputs ( $fh, '$DISP_GENDER		= $row[147];'.$lfeed );
  	fputs ( $fh, '$SPECIAL_GHOSTS		= $row[148];'.$lfeed );
  	fputs ( $fh, '$FILLED_LOGIN		= $row[149];'.$lfeed );
  	fputs ( $fh, '$BACKGR_IMG			= $row[150];'.$lfeed );
  	fputs ( $fh, '$BACKGR_IMG_PATH		= $row[151];'.$lfeed );
  	fputs ( $fh, '$POPUP_LINKS			= $row[152];'.$lfeed );
  	fputs ( $fh, '$ITALICIZE_POWERS		= $row[153];'.$lfeed );
  	fputs ( $fh, '$MAIL_GREETING			= $row[154];'.$lfeed );
  	fputs ( $fh, '$PM_KEEP_DAYS			= $row[155];'.$lfeed );
  	fputs ( $fh, '$ALLOW_PM_DEL			= $row[156];'.$lfeed );
  	fputs ( $fh, '$LOGIN_COUNTER			= $row[157];'.$lfeed );
  	fputs ( $fh, '$ALLOW_GRAVATARS		= $row[158];'.$lfeed );
  	fputs ( $fh, '$GRAVATARS_CACHE		= $row[159];'.$lfeed );
  	fputs ( $fh, '$GRAVATARS_CACHE_EXPIRE	= $row[160];'.$lfeed );
  	fputs ( $fh, '$GRAVATARS_RATING		= $row[161];'.$lfeed );
  	fputs ( $fh, '$GRAVATARS_DYNAMIC_DEF	= $row[162];'.$lfeed );
  	fputs ( $fh, '$GRAVATARS_DYNAMIC_DEF_FORCE	= $row[163];'.$lfeed );
  	fputs ( $fh, '$ALLOW_UPLOADS			= $row[164];'.$lfeed );
  	fputs ( $fh, '$RES_ROOM1						= $row[165];'.$lfeed );
  	fputs ( $fh, '$RES_ROOM2						= $row[166];'.$lfeed );
  	fputs ( $fh, '$RES_ROOM3						= $row[167];'.$lfeed );
  	fputs ( $fh, '$RES_ROOM4						= $row[168];'.$lfeed );
  	fputs ( $fh, '$RES_ROOM5						= $row[169];'.$lfeed );
  	fputs ( $fh, '$EN_STATS						= $row[170];'.$lfeed );
  	fputs ( $fh, '$ALLOW_VIDEO					= $row[171];'.$lfeed );
  	fputs ( $fh, '$VIDEO_WIDTH					= $row[172];'.$lfeed );
  	fputs ( $fh, '$VIDEO_HEIGHT					= $row[173];'.$lfeed );
  	fputs ( $fh, '$REQUIRE_BDAY					= $row[174];'.$lfeed );
  	fputs ( $fh, '$SEND_BDAY_EMAIL				= $row[175];'.$lfeed );
  	fputs ( $fh, '$SEND_BDAY_TIME					= $row[176];'.$lfeed );
  	fputs ( $fh, '$SEND_BDAY_INTVAL				= $row[177];'.$lfeed );
  	fputs ( $fh, '$SEND_BDAY_PATH					= $row[178];'.$lfeed );
  	fputs ( $fh, '$EN_WMPLAYER					= $row[179];'.$lfeed );
  	fputs ( $fh, '$WMP_STREAM						= $row[180];'.$lfeed );
  	fputs ( $fh, '$OPEN_ALL_BEG					= $row[181];'.$lfeed );
  	fputs ( $fh, '$OPEN_ALL_END					= $row[182];'.$lfeed );
  	fputs ( $fh, '$OPEN_SUN_BEG					= $row[183];'.$lfeed );
  	fputs ( $fh, '$OPEN_SUN_END					= $row[184];'.$lfeed );
  	fputs ( $fh, '$OPEN_MON_BEG					= $row[185];'.$lfeed );
  	fputs ( $fh, '$OPEN_MON_END					= $row[186];'.$lfeed );
  	fputs ( $fh, '$OPEN_TUE_BEG					= $row[187];'.$lfeed );
  	fputs ( $fh, '$OPEN_TUE_END					= $row[188];'.$lfeed );
  	fputs ( $fh, '$OPEN_WED_BEG					= $row[189];'.$lfeed );
  	fputs ( $fh, '$OPEN_WED_END					= $row[190];'.$lfeed );
  	fputs ( $fh, '$OPEN_THU_BEG					= $row[191];'.$lfeed );
  	fputs ( $fh, '$OPEN_THU_END					= $row[192];'.$lfeed );
  	fputs ( $fh, '$OPEN_FRI_BEG					= $row[193];'.$lfeed );
  	fputs ( $fh, '$OPEN_FRI_END					= $row[194];'.$lfeed );
  	fputs ( $fh, '$OPEN_SAT_BEG					= $row[195];'.$lfeed );
  	fputs ( $fh, '$OPEN_SAT_END					= $row[196];'.$lfeed );
  	fputs ( $fh, '$ALLOW_TEXT_COLORS				= $row[197];'.$lfeed );
  	fputs ( $fh, '$TAGS_POWERS					= $row[198];'.$lfeed );
  	fputs ( $fh, '$ALLOW_MATH					= $row[199];'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '$query_bot = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email=\'bot@bot.com\'";'.$lfeed );
  	fputs ( $fh, '$result_bot = mysql_query($query_bot);'.$lfeed );
  	fputs ( $fh, 'list($BOT_NAME, $BOT_AVATAR, $BOT_FONT_COLOR) = mysql_fetch_row($result_bot);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '$query_quote = "SELECT username,avatar,colorname FROM ".C_REG_TBL." WHERE email=\'quote@quote.com\'";'.$lfeed );
  	fputs ( $fh, '$result_quote = mysql_query($query_quote);'.$lfeed );
  	fputs ( $fh, 'list($QUOTE_NAME, $QUOTE_AVATAR, $QUOTE_FONT_COLOR) = mysql_fetch_row($result_quote);'.$lfeed );
  	fputs ( $fh, '@mysql_close($conn);'.$lfeed );
  	fputs ( $fh, 'define("C_SUPPORT_PAID", 0);'.$lfeed );
  	fputs ( $fh, 'define("C_SEARCH_PAID", 0);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Cleaning settings for messages and usernames'.$lfeed );
  	fputs ( $fh, 'define("C_MSG_DEL", $MSG_DEL);'.$lfeed );
  	fputs ( $fh, 'define("C_USR_DEL", $USR_DEL);'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_BOOT", $CHAT_BOOT);'.$lfeed );
  	fputs ( $fh, 'define("C_REG_DEL", $REG_DEL);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Language settings'.$lfeed );
  	fputs ( $fh, 'define("C_LANGUAGE", $LANGUAGE);'.$lfeed );
  	fputs ( $fh, 'define("C_MULTI_LANG", $MULTI_LANG);'.$lfeed );
  	fputs ( $fh, 'define("C_ENGLISH_FORMAT", $ENGLISH_FORMAT);'.$lfeed );
  	fputs ( $fh, 'define("C_FLAGS_3D", $FLAGS_3D);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Registration of users'.$lfeed );
  	fputs ( $fh, 'define("C_ALLOW_REGISTER", $ALLOW_REGISTER);'.$lfeed );
  	fputs ( $fh, 'define("C_REQUIRE_REGISTER", $REQUIRE_REGISTER);'.$lfeed );
  	fputs ( $fh, 'define("C_REQUIRE_NAMES", $REQUIRE_NAMES);'.$lfeed );
  	fputs ( $fh, 'define("C_EMAIL_PASWD", $EMAIL_PASWD);'.$lfeed );
  	fputs ( $fh, 'define("C_EMAIL_USER", $EMAIL_USER);'.$lfeed );
  	fputs ( $fh, 'define("C_PASS_LENGTH", $PASS_LENGTH);'.$lfeed );
  	fputs ( $fh, 'define("C_ADMIN_NOTIFY", $ADMIN_NOTIFY);'.$lfeed );
  	fputs ( $fh, 'define("C_ADMIN_NAME", $ADMIN_NAME);'.$lfeed );
  	fputs ( $fh, 'define("C_ADMIN_EMAIL", $ADMIN_EMAIL);'.$lfeed );
#   fputs ( $fh, 'define("C_CHAT_URL", eregi("http://",$CHAT_URL) ? $CHAT_URL : "./");'.$lfeed );
#   fputs ( $fh, 'define("C_CHAT_URL", strstr($CHAT_URL,"http://") ? $CHAT_URL : "./");'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_URL", stripos($CHAT_URL,"http://") !== false ? $CHAT_URL : "./");'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Security and restrictions'.$lfeed );
  	fputs ( $fh, 'define("C_SHOW_ADMIN", $SHOW_ADMIN);'.$lfeed );
  	fputs ( $fh, 'define("C_SHOW_DEL_PROF", $SHOW_DEL_PROF);'.$lfeed );
  	fputs ( $fh, 'define("C_VERSION", $VERSION);'.$lfeed );
  	fputs ( $fh, 'define("C_BANISH", $BANISH);'.$lfeed );
  	fputs ( $fh, 'define("C_NO_SWEAR", $NO_SWEAR);'.$lfeed );
  	fputs ( $fh, 'define("C_SWEAR_EXPR", $SWEAR_EXPR);'.$lfeed );
  	fputs ( $fh, 'define("C_SAVE", $SAVE);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Messages enhancements'.$lfeed );
  	fputs ( $fh, 'define("C_USE_SMILIES", $USE_SMILIES);'.$lfeed );
  	fputs ( $fh, 'define("C_HTML_TAGS_KEEP", $HTML_TAGS_KEEP);'.$lfeed );
  	fputs ( $fh, 'define("C_HTML_TAGS_SHOW", $HTML_TAGS_SHOW);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Default display settings'.$lfeed );
  	fputs ( $fh, 'define("C_TMZ_OFFSET", $TMZ_OFFSET);'.$lfeed );
  	fputs ( $fh, 'define("C_MSG_ORDER", $MSG_ORDER);'.$lfeed );
  	fputs ( $fh, 'define("C_MSG_NB", $MSG_NB);'.$lfeed );
  	fputs ( $fh, 'define("C_MSG_REFRESH", $MSG_REFRESH);'.$lfeed );
  	fputs ( $fh, 'define("C_SHOW_TIMESTAMP", $SHOW_TIMESTAMP);'.$lfeed );
  	fputs ( $fh, 'define("C_NOTIFY", $NOTIFY);'.$lfeed );
  	fputs ( $fh, 'define("C_WELCOME", $WELCOME);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Room Skin mod by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_SKIN", $USE_SKIN);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Proposed (default) rooms and reserved names for private rooms'.$lfeed );
  	fputs ( $fh, 'define("ROOM1", $ROOM1);'.$lfeed );
  	fputs ( $fh, 'define("ROOM2", $ROOM2);'.$lfeed );
  	fputs ( $fh, 'define("ROOM3", $ROOM3);'.$lfeed );
  	fputs ( $fh, 'define("ROOM4", $ROOM4);'.$lfeed );
  	fputs ( $fh, 'define("ROOM5", $ROOM5);'.$lfeed );
  	fputs ( $fh, 'define("ROOM6", $ROOM6);'.$lfeed );
  	fputs ( $fh, 'define("ROOM7", $ROOM7);'.$lfeed );
  	fputs ( $fh, 'define("ROOM8", $ROOM8);'.$lfeed );
  	fputs ( $fh, 'define("ROOM9", $ROOM9);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '$PUBLIC_ROOMS = $EN_ROOM1 ? ($RES_ROOM1 ? ROOM1." [R], " : ROOM1.", ") : "";'.$lfeed );
  	fputs ( $fh, '$PUBLIC_ROOMS .= $EN_ROOM2 ? ($RES_ROOM2 ? ROOM2." [R], " : ROOM2.", ") : "";'.$lfeed );
  	fputs ( $fh, '$PUBLIC_ROOMS .= $EN_ROOM3 ? ($RES_ROOM3 ? ROOM3." [R], " : ROOM3.", ") : "";'.$lfeed );
  	fputs ( $fh, '$PUBLIC_ROOMS .= $EN_ROOM4 ? ($RES_ROOM4 ? ROOM4." [R], " : ROOM4.", ") : "";'.$lfeed );
  	fputs ( $fh, '$PUBLIC_ROOMS .= $EN_ROOM5 ? ($RES_ROOM5 ? ROOM5." [R], " : ROOM5.", ") : "";'.$lfeed );
  	fputs ( $fh, '$PUBLIC_DISP_ROOMS = trim($PUBLIC_ROOMS,", ");'.$lfeed );
  	fputs ( $fh, '$PUBLIC_ROOMS = trim(str_replace(" [R]","",$PUBLIC_ROOMS),", ");'.$lfeed );
  	fputs ( $fh, '$PRIVATE_ROOMS = $EN_ROOM6 ? ROOM6.", " : "";'.$lfeed );
  	fputs ( $fh, '$PRIVATE_ROOMS .= $EN_ROOM7 ? ROOM7.", " : "";'.$lfeed );
  	fputs ( $fh, '$PRIVATE_ROOMS .= $EN_ROOM8 ? ROOM8.", " : "";'.$lfeed );
  	fputs ( $fh, '$PRIVATE_ROOMS .= $EN_ROOM9 ? ROOM9.", " : "";'.$lfeed );
  	fputs ( $fh, '$PRIVATE_ROOMS = trim($PRIVATE_ROOMS,", ");'.$lfeed );
  	fputs ( $fh, '$DefaultChatRooms = explode(", ", $PUBLIC_ROOMS);'.$lfeed );
  	fputs ( $fh, 'if ($PUBLIC_DISP_ROOMS != $PUBLIC_ROOMS) $DefaultDispChatRooms = explode(", ", $PUBLIC_DISP_ROOMS);'.$lfeed );
  	fputs ( $fh, 'if ($PRIVATE_ROOMS == "") $DefaultPrivateRooms = NULL;'.$lfeed );
  	fputs ( $fh, 'else $DefaultPrivateRooms = explode(", ", $PRIVATE_ROOMS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '//	Profanity filter disabled for following rooms - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_NO_SWEAR_ROOM1", $SWEAR1);'.$lfeed );
  	fputs ( $fh, 'define("C_NO_SWEAR_ROOM2", $SWEAR2);'.$lfeed );
  	fputs ( $fh, 'define("C_NO_SWEAR_ROOM3", $SWEAR3);'.$lfeed );
  	fputs ( $fh, 'define("C_NO_SWEAR_ROOM4", $SWEAR4);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// For Bob Dickow\'s multi/split smiley\'s in help popup modification:'.$lfeed );
  	fputs ( $fh, 'define("SMILEY_COLS", $SMILEY_COLS);'.$lfeed );
  	fputs ( $fh, 'define("SMILEY_COLS_POP", $SMILEY_COLS_POP);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Sound for users entering Chat.'.$lfeed );
  	fputs ( $fh, 'define("ALLOW_ENTRANCE_SOUND", $ALLOW_ENTRANCE_SOUND);'.$lfeed );
  	fputs ( $fh, 'define("ENTRANCE_SOUND", $ENTRANCE_SOUND);'.$lfeed );
  	fputs ( $fh, 'define("WELCOME_SOUND", $WELCOME_SOUND);'.$lfeed );
  	fputs ( $fh, 'if (ALLOW_ENTRANCE_SOUND == 3 && ENTRANCE_SOUND)'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	define("L_ENTER_SND", "<EMBED SRC=\"".$ENTRANCE_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Hello\" MASTERSOUND><NOEMBED><BGSOUND SRC=".$ENTRANCE_SOUND." LOOP=1></NOEMBED></EMBED>");'.$lfeed );
  	fputs ( $fh, '	define("L_WELCOME_SND", "<EMBED SRC=\"".$WELCOME_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Welcome\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$WELCOME_SOUND."\" LOOP=1></NOEMBED></EMBED>");'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, 'elseif (ALLOW_ENTRANCE_SOUND == 2 && WELCOME_SOUND)'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	define("L_ENTER_SND", "");'.$lfeed );
  	fputs ( $fh, '	define("L_WELCOME_SND", "<EMBED SRC=\"".$WELCOME_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Welcome\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$WELCOME_SOUND."\" LOOP=1></NOEMBED></EMBED>");'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, 'elseif (ALLOW_ENTRANCE_SOUND == 1 && ENTRANCE_SOUND)'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	define("L_ENTER_SND", "<EMBED SRC=\"".$ENTRANCE_SOUND."\" VOLUME=\"30\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Hello\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$ENTRANCE_SOUND."\" LOOP=1></NOEMBED></EMBED>");'.$lfeed );
  	fputs ( $fh, '	define("L_WELCOME_SND", "");'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, 'else'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	define("L_ENTER_SND", "");'.$lfeed );
  	fputs ( $fh, '	define("L_WELCOME_SND", "");'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Buzz Sound command.'.$lfeed );
  	fputs ( $fh, 'define("ALLOW_BUZZ_SOUND", $ALLOW_BUZZ_SOUND);'.$lfeed );
  	fputs ( $fh, 'define("BUZZ_SOUND", $BUZZ_SOUND);'.$lfeed );
  	fputs ( $fh, 'if (ALLOW_BUZZ_SOUND && BUZZ_SOUND) define("L_BUZZ_SND", "<EMBED SRC=\"".$BUZZ_SOUND."\" VOLUME=\"50\" HIDDEN=\"true\" AUTOSTART=\"true\" LOOP=\"false\" NAME=\"Buzz\" MASTERSOUND><NOEMBED><BGSOUND SRC=\"".$BUZZ_SOUND."\" LOOP=1></NOEMBED></EMBED>");'.$lfeed );
  	fputs ( $fh, 'else define("L_BUZZ_SND", "");'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Enable different Topics for each room, defined in topic.php.'.$lfeed );
  	fputs ( $fh, '// If set to 0, it will use the global topic defined there.'.$lfeed );
  	fputs ( $fh, 'define ("TOPIC_DIFF", $TOPIC_DIFF);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Away command user status update.'.$lfeed );
  	fputs ( $fh, 'define("C_UPDTUSRS", "<!-- UPDTUSRS //-->");'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Show tutorial link on the welcome page'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_TUT", $SHOW_TUT);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Info on first page mod by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_SHOW_INFO", $SHOW_INFO);'.$lfeed );
  	fputs ( $fh, 'define("SET_CMDS", $SET_CMDS);'.$lfeed );
  	fputs ( $fh, 'define("CMDS", $CMDS);'.$lfeed );
  	fputs ( $fh, 'define("SET_MODS", $SET_MODS);'.$lfeed );
  	fputs ( $fh, 'define("MODS", $MODS);'.$lfeed );
  	fputs ( $fh, 'define("SET_BOT", $SET_BOT);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Room command by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("ROOM_SAYS", $ROOM_SAYS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Demote control level by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_DEMOTE_MOD", $DEMOTE_MOD);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Private message popup mod by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_ENABLE_PM", $ENABLE_PM);'.$lfeed );
  	fputs ( $fh, 'define("C_PRIV_POPUP", $PRIV_POPUP);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Chat Etiquete by Ealdwulf&Emma-Kate from http://wizardtales.net/chat'.$lfeed );
  	fputs ( $fh, 'define("SHOW_ETIQ_IN_HELP", $SHOW_ETIQ_IN_HELP);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Show logo on top of thefirst page'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_LOGO", $SHOW_LOGO);'.$lfeed );
  	fputs ( $fh, 'define ("C_LOGO_IMG", $LOGO_IMG);'.$lfeed );
  	fputs ( $fh, 'define ("C_LOGO_OPEN", $LOGO_OPEN);'.$lfeed );
  	fputs ( $fh, 'define ("C_LOGO_ALT", $LOGO_ALT);'.$lfeed );
  	fputs ( $fh, 'define ("APP_LOGO", "<A HREF=\'".$LOGO_OPEN."\' TITLE=\'".$LOGO_ALT."\' onMouseOver=\"window.status=\'".C_LOGO_ALT."\'; return true\" TARGET=_blank><IMG SRC=\'".$LOGO_IMG."\' BORDER=0 ALT=\'".$LOGO_ALT."\'></A>");  // Application logo image'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Show private rooms selection box on first page'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_PRIV", $SHOW_PRIV);'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_PRIV_MOD", $SHOW_PRIV_MOD);'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_PRIV_USR", $SHOW_PRIV_USR);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Show owner\'s name on bottom of the first page'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_OWNER", $SHOW_OWNER);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Show counter on bottom of the first page'.$lfeed );
  	fputs ( $fh, 'define ("C_SHOW_COUNTER", $SHOW_COUNTER);'.$lfeed );
  	fputs ( $fh, 'define ("C_INSTALL_DATE", $INSTALL_DATE);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Color Input Box Mod by Ciprian - power color filters activation - default "yes".'.$lfeed );
  	fputs ( $fh, 'define("COLOR_FILTERS", $COLOR_FILTERS);'.$lfeed );
  	fputs ( $fh, 'define("COLOR_CA", $COLOR_CA);'.$lfeed );
  	fputs ( $fh, 'define("COLOR_CA1", $COLOR_CA1);'.$lfeed );
  	fputs ( $fh, 'define("COLOR_CA2", $COLOR_CA2);'.$lfeed );
  	fputs ( $fh, 'define("COLOR_CM", $COLOR_CM);'.$lfeed );
  	fputs ( $fh, 'define("COLOR_CM1", $COLOR_CM1);'.$lfeed );
  	fputs ( $fh, 'define("COLOR_CM2", $COLOR_CM2);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Color Input Box Mod by Ciprian - allow guests to use colors - default "yes".'.$lfeed );
  	fputs ( $fh, 'define("COLOR_ALLOW_GUESTS", $COLOR_ALLOW_GUESTS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// ------ THESE IS A WEB STANDARD - SETTINGS MUST NOT BE CHANGED!!!  (it will show the 16 web-safe standard colors on the Color Help Page)------'.$lfeed );
  	fputs ( $fh, 'define("COLOR_LIST", "<P style=\"background-color:tan; color:black;\">[ <SPAN style=\"color:aqua\">aqua</SPAN> - <SPAN style=\"color:black\">black</SPAN> - <SPAN style=\"color:blue\">blue</SPAN> - <SPAN style=\"color:fuchsia\">fuchsia</SPAN> - <SPAN style=\"color:gray\">gray</SPAN> - <SPAN style=\"color:green\">green</SPAN> - <SPAN style=\"color:lime\">lime</SPAN> - <SPAN style=\"color:maroon\">maroon</SPAN> ]<br />[ <SPAN style=\"color:navy\">navy</SPAN> - <SPAN style=\"color:olive\">olive</SPAN> - <SPAN style=\"color:purple\">purple</SPAN> - <SPAN style=\"color:red\">red</SPAN> - <SPAN style=\"color:silver\">silver</SPAN> - <SPAN style=\"color:teal\">teal</SPAN> - <SPAN style=\"color:white\">white</SPAN> - <SPAN style=\"color:yellow\">yellow</SPAN> ]</P>");'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// ------ THIS IS THE LIST OF COLORS DISPLAYED IN YOUR DROP-DOWN LIST. IF YOU KNOW MORE, JUST ADD THEM HERE ------'.$lfeed );
  	fputs ( $fh, 'define("COLORLIST", \'"","black","dimgray","gray","darkgray","silver","lightgrey","gainsboro","whitesmoke","ghostwhite","white","slategray","lightslategray","midnightblue","navy","darkblue","darkslateblue","mediumblue","blue","steelblue","royalblue","cornflowerblue","dodgerblue","deepskyblue","lightskyblue","skyblue","lightsteelblue","lightblue","powderblue","paleturquoise","lightcyan","aliceblue","azure","mintcream","darkslategray","cadetblue","teal","darkcyan","lightseagreen","darkturquoise","mediumturquoise","turquoise","aqua","cyan","mediumaquamarine","aquamarine","darkolivegreen","olive","olivedrab","darkkhaki","darkgreen","green","forestgreen","seagreen","mediumseagreen","darkseagreen","mediumspringgreen","springgreen","palegreen","honeydew","limegreen","lime","lightgreen","lawngreen","chartreuse","greenyellow","yellowgreen","indigo","purple","darkmagenta","darkviolet","darkorchid","mediumorchid","orchid","violet","plum","thistle","blueviolet","mediumpurple","slateblue","mediumslateblue","lavender","mediumvioletred","magenta","fuchsia","deeppink","palevioletred","hotpink","lightpink","pink","mistyrose","lavenderblush","maroon","darkred","firebrick","crimson","red","orangered","tomato","indianred","lightcoral","salmon","darksalmon","lightsalmon","coral","darkorange","orange","sandybrown","darkgoldenrod","goldenrod","gold","yellow","khaki","palegoldenrod","lemonchiffon","cornsilk","lightgoldenrodyellow","beige","lightyellow","ivory","rosybrown","saddlebrown","brown","sienna","chocolate","peru","tan","burlywood","wheat","navajowhite","peachpuff","moccasin","bisque","blanchedalmond","papayawhip","antiquewhite","linen","oldlace","seashell","floralwhite","snow"\');'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// ------ THESE SETTINGS MUST NOT BE CHANGED WITHOUT EXPERTISE ------'.$lfeed );
  	fputs ( $fh, 'if (C_SKIN)'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '$Room = stripslashes($R);'.$lfeed );
  	fputs ( $fh, 'if (strcmp(stripslashes($R), ROOM8) == 1)'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	if (strcasecmp(stripslashes($R), ROOM8) == 0)'.$lfeed );
  	fputs ( $fh, '	{'.$lfeed );
  	fputs ( $fh, '		if ($R != ucfirst(ROOM8)) $Room = ucfirst($R);'.$lfeed );
  	fputs ( $fh, '		elseif (ucfirst(stripslashes($R)) == ROOM8) $Room = ROOM8;'.$lfeed );
  	fputs ( $fh, '		else $Room = strtolower($R);'.$lfeed );
  	fputs ( $fh, '	}'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, 'if (strcasecmp(ucfirst(stripslashes($R)), ROOM8) == 0) $Room = ROOM8;'.$lfeed );
  	fputs ( $fh, 'if (strcmp(stripslashes($R), ROOM9) == 1)'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	if (strcasecmp(stripslashes($R), ROOM9) == 0)'.$lfeed );
  	fputs ( $fh, '	{'.$lfeed );
  	fputs ( $fh, '		if ($R != ucfirst(ROOM9)) $Room = ucfirst($R);'.$lfeed );
  	fputs ( $fh, '		else $Room = strtolower($R);'.$lfeed );
  	fputs ( $fh, '	}'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, 'if (strcasecmp(ucfirst(stripslashes($R)), ROOM9) == 0) $Room = ROOM9;'.$lfeed );
  	fputs ( $fh, '	switch ($Room)'.$lfeed );
  	fputs ( $fh, '	{'.$lfeed );
  	fputs ( $fh, '		default:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN1."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN1.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM2:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN2."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN2.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM3:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN3."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN3.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM4:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN4."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN4.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM5:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN5."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN5.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM6:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN6."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN6.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM7:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN7."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN7.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM8:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN8."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN8.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '		case ROOM9:'.$lfeed );
  	fputs ( $fh, '		{'.$lfeed );
  	fputs ( $fh, '			$skin = "${ChatPath}skins/style".$ROOM_SKIN9."";'.$lfeed );
  	fputs ( $fh, '			include("${ChatPath}skins/style".$ROOM_SKIN9.".php");'.$lfeed );
  	fputs ( $fh, '		}'.$lfeed );
  	fputs ( $fh, '		break;'.$lfeed );
  	fputs ( $fh, '	}'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, 'else						//default style if Room Skin mod is disabled'.$lfeed );
  	fputs ( $fh, '{'.$lfeed );
  	fputs ( $fh, '	if ($ROOM_SKIN1 == "") $ROOM_SKIN1 = "1";'.$lfeed );
  	fputs ( $fh, '	$skin = "${ChatPath}skins/style".$ROOM_SKIN1."";'.$lfeed );
  	fputs ( $fh, '	include("${ChatPath}skins/style".$ROOM_SKIN1.".php");'.$lfeed );
  	fputs ( $fh, '}'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// For Bob Dickow\'s QuickNotes modification'.$lfeed );
  	fputs ( $fh, '// Comment the lines below to disable the quick menu for any of those mentioned'.$lfeed );
  	fputs ( $fh, '$dropdownmsga = explode("|",$QUICKA);	//administrators'.$lfeed );
  	fputs ( $fh, '$dropdownmsgm = explode("|",$QUICKM);	//moderators'.$lfeed );
  	fputs ( $fh, '$dropdownmsg = explode("|",$QUICKU);	//users'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Colored names in users list.'.$lfeed );
  	fputs ( $fh, 'define("COLOR_NAMES", $COLOR_NAMES);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Avatars system Start.'.$lfeed );
  	fputs ( $fh, 'define("C_USE_AVATARS", $USE_AVATARS); // Is Avatar version? 0 for NO:: 1 for yes.'.$lfeed );
  	fputs ( $fh, 'define("C_NUM_AVATARS", $NUM_AVATARS); // 54. 1 default avatar plus 53 custom ones. Use \'0\''.$lfeed );
  	fputs ( $fh, '                              // to turn off the avatar system. You may have'.$lfeed );
  	fputs ( $fh, '                              // any number of custom avatars available, just put'.$lfeed );
  	fputs ( $fh, '                              // the total number of custom avatars +1 in this define.'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, 'define("C_AVA_RELPATH", $AVA_RELPATH); // Absolute path to default avatar'.$lfeed );
  	fputs ( $fh, 'define("C_DEF_AVATAR", $DEF_AVATAR);'.$lfeed );
  	fputs ( $fh, 'define("C_AVA_WIDTH", $AVA_WIDTH);'.$lfeed );
  	fputs ( $fh, 'define("C_AVA_HEIGHT", $AVA_HEIGHT);'.$lfeed );
  	fputs ( $fh, 'define("C_AVA_PROFBUTTON", $AVA_PROFBUTTON); // show, (0=no show) click button for profile popup'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, 'define("MAX_DICES", $MAX_DICES);        // Maximum number of die per throw; change as you see fit'.$lfeed );
  	fputs ( $fh, 'define("MAX_ROLLS", $MAX_ROLLS);        // Maximum number of rolls per die; change as you see fit'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, 'define("C_BOT_CONTROL", $BOT_CONTROL);    // enable/disable bot'.$lfeed );
  	fputs ( $fh, 'define("C_BOT_NAME", $BOT_NAME);         // The Name of your ProjectE Bot (Will change later)'.$lfeed );
  	fputs ( $fh, 'define("C_BOT_FONT_COLOR", $BOT_FONT_COLOR);   // Font color BOT text will be.'.$lfeed );
  	fputs ( $fh, 'define("C_BOT_AVATAR", $BOT_AVATAR);		//avatar of the bot'.$lfeed );
  	fputs ( $fh, 'define("C_BOT_HELLO", $BOT_HELLO);      // The hello text bot will post to the room.'.$lfeed );
  	fputs ( $fh, 'define("C_BOT_BYE", $BOT_BYE);         // The bye text bot will post to the room.'.$lfeed );
  	fputs ( $fh, 'define("C_BOT_PUBLIC", $BOT_PUBLIC);   // Enable/Disable public conversations with bot in the room/rooms.'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Set the maximum size for resizing posted pictures using /img command'.$lfeed );
  	fputs ( $fh, 'define("MAX_PIC_SIZE", $MAX_PIC_SIZE);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Set the order of sorting the users in the rooms\' lists'.$lfeed );
  	fputs ( $fh, 'define("C_USERS_SORT_ORD", $USERS_SORT_ORD);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Enable generation of log files'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_LOGS", $CHAT_LOGS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Full admin Logs dir name'.$lfeed );
  	fputs ( $fh, 'define("C_LOG_DIR", $LOG_DIR);'.$lfeed );
  	fputs ( $fh, 'define("C_SHOW_LOGS_USR", $SHOW_LOGS_USR);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Enable Lurking mod by Ciprian (people can monitor public conversations and events in the chat without loging in)'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_LURKING", $CHAT_LURKING);'.$lfeed );
  	fputs ( $fh, 'define("C_SHOW_LURK_USR", $SHOW_LURK_USR);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Banishment by IP or username'.$lfeed );
  	fputs ( $fh, 'define("C_BAN_IP", $BAN_IP);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Registration/Login Characters allowed in usernames'.$lfeed );
  	fputs ( $fh, '$REG_CHARS = "[^".$REG_CHARS_ALLOWED;'.$lfeed );
  	fputs ( $fh, '$REG_CHARS .= $REG_CHARS."]{1,}";'.$lfeed );
  	fputs ( $fh, 'define("REG_CHARS_ALLOWED", $REG_CHARS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Registration/Login Characters allowed in usernames'.$lfeed );
  	fputs ( $fh, 'define("EXIT_LINK_TYPE", $EXIT_LINK_TYPE);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Enable/disable Chat extras page in admin link'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_EXTRAS", $CHAT_EXTRAS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Display the worldtimes in status bar'.$lfeed );
  	fputs ( $fh, 'define("C_WORLDTIME", $WORLDTIME);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Enable/disable the update check feature in cpanel'.$lfeed );
  	fputs ( $fh, 'define("UPD_CHECK", $UPD_CHECK);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Random Quote mod by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE", $QUOTE);'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE_TIME", $QUOTE_TIME);'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE_COLOR", $QUOTE_COLOR);'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE_PATH", $QUOTE_PATH);'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE_NAME", $QUOTE_NAME);'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE_AVATAR", $QUOTE_AVATAR);'.$lfeed );
  	fputs ( $fh, 'define("C_QUOTE_FONT_COLOR", $QUOTE_FONT_COLOR);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Ghost control mod by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_HIDE_ADMINS", $HIDE_ADMINS);'.$lfeed );
  	fputs ( $fh, 'define("C_HIDE_MODERS", $HIDE_MODERS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Last configuration by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_LAST_SAVED_ON", $LAST_SAVED_ON);'.$lfeed );
  	fputs ( $fh, 'define("C_LAST_SAVED_BY", $LAST_SAVED_BY);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// PHP-Nuke / phpBB integration by TPS'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_SYSTEM", $CHAT_SYSTEM);'.$lfeed );
  	fputs ( $fh, 'define("C_NUKE_BB_PATH", $NUKE_BB_PATH);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Added for owner personalizations to all the languages by Ciprian'.$lfeed );
  	fputs ( $fh, 'if(is_dir("./${ChatPath}localization/_owner/") && file_exists("./${ChatPath}localization/_owner/owner.php")) include("./${ChatPath}localization/_owner/owner.php");'.$lfeed );
  	fputs ( $fh, '// Added for Original Language names by Ciprian'.$lfeed );
  	fputs ( $fh, 'if(file_exists("./${ChatPath}localization/langnames.lib.php")) include("./${ChatPath}localization/langnames.lib.php");'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Public Name of your chat server as you wish to be known on the web - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_CHAT_NAME", $CHAT_NAME);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Display genders - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_DISP_GENDER", $DISP_GENDER);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Ghost usernames - by Ciprian'.$lfeed );
  	fputs ( $fh, '$SPECIALGHOSTS = str_replace(",","\',\'",$SPECIAL_GHOSTS);'.$lfeed );
  	fputs ( $fh, '$SPECIALGHOSTS = str_replace(","," AND username != ",$SPECIALGHOSTS);'.$lfeed );
  	fputs ( $fh, 'define("C_SPECIAL_GHOSTS", "\'".$SPECIALGHOSTS."\'");'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Index page body layout - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_FILLED_LOGIN", $FILLED_LOGIN);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Background image on login page - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_BACKGR_IMG", $BACKGR_IMG);'.$lfeed );
  	fputs ( $fh, 'define("C_BACKGR_IMG_PATH", $BACKGR_IMG_PATH);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Popup posted links protection - by Alex & Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_POPUP_LINKS", $POPUP_LINKS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Italicize power usernames - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_ITALICIZE_POWERS", $ITALICIZE_POWERS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Email greeting closure in Admin4 sheet - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_MAIL_GREETING", $MAIL_GREETING);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Days to keep unread PMs in the database - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_PM_KEEP_DAYS", $PM_KEEP_DAYS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Allow users to delete their own PMs from the database - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_ALLOW_PM_DEL", $ALLOW_PM_DEL);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// It counts logins of registered users to chat (returning users) - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_LOGIN_COUNTER", $LOGIN_COUNTER);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Gravatars system - by Ciprian (details on www.gravatars.com)'.$lfeed );
  	fputs ( $fh, 'define("ALLOW_GRAVATARS", $ALLOW_GRAVATARS);'.$lfeed );
  	fputs ( $fh, 'define("GRAVATARS_CACHE", $GRAVATARS_CACHE);'.$lfeed );
  	fputs ( $fh, 'define("GRAVATARS_CACHE_EXPIRE", $GRAVATARS_CACHE_EXPIRE);'.$lfeed );
  	fputs ( $fh, 'define("GRAVATARS_RATING", $GRAVATARS_RATING);'.$lfeed );
  	fputs ( $fh, 'define("GRAVATARS_DYNAMIC_DEF", $GRAVATARS_DYNAMIC_DEF);'.$lfeed );
  	fputs ( $fh, 'define("GRAVATARS_DYNAMIC_DEF_FORCE", $GRAVATARS_DYNAMIC_DEF_FORCE);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Uploader mod - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_ALLOW_UPLOADS", $ALLOW_UPLOADS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Statistics mod - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_EN_STATS", $EN_STATS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Video posting mod - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_ALLOW_VIDEO", $ALLOW_VIDEO);'.$lfeed );
  	fputs ( $fh, 'define("C_VIDEO_WIDTH", $VIDEO_WIDTH);'.$lfeed );
  	fputs ( $fh, 'define("C_VIDEO_HEIGHT", $VIDEO_HEIGHT);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Birthday mod - by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_REQUIRE_BDAY", $REQUIRE_BDAY);'.$lfeed );
  	fputs ( $fh, 'define("C_BDAY_EMAIL", $SEND_BDAY_EMAIL);'.$lfeed );
  	fputs ( $fh, 'define("C_BDAY_TIME", $SEND_BDAY_TIME);'.$lfeed );
  	fputs ( $fh, 'define("C_BDAY_INTVAL", $SEND_BDAY_INTVAL);'.$lfeed );
  	fputs ( $fh, 'define("C_BDAY_PATH", $SEND_BDAY_PATH);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// MediaPlayer add-on by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_EN_WMPLAYER", $EN_WMPLAYER);'.$lfeed );
  	fputs ( $fh, 'define("C_WMP_STREAM", $WMP_STREAM);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Open/Close Schedule add-on by Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_ALL_BEG", $OPEN_ALL_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_ALL_END", $OPEN_ALL_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_SUN_BEG", $OPEN_SUN_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_SUN_END", $OPEN_SUN_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_MON_BEG", $OPEN_MON_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_MON_END", $OPEN_MON_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_TUE_BEG", $OPEN_TUE_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_TUE_END", $OPEN_TUE_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_WED_BEG", $OPEN_WED_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_WED_END", $OPEN_WED_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_THU_BEG", $OPEN_THU_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_THU_END", $OPEN_THU_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_FRI_BEG", $OPEN_FRI_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_FRI_END", $OPEN_FRI_END);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_SAT_BEG", $OPEN_SAT_BEG);'.$lfeed );
  	fputs ( $fh, 'define("C_OPEN_SAT_END", $OPEN_SAT_END);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// Colors and Tags for chat text Ciprian'.$lfeed );
  	fputs ( $fh, 'define("C_ALLOW_TEXT_COLORS", $ALLOW_TEXT_COLORS);'.$lfeed );
  	fputs ( $fh, 'define("C_TAGS_POWERS", $TAGS_POWERS);'.$lfeed );
  	fputs ( $fh, ''.$lfeed );
  	fputs ( $fh, '// MathJax LaTeX formulas rendering in chat'.$lfeed );
  	fputs ( $fh, 'define("C_ALLOW_MATH", $ALLOW_MATH);'.$lfeed );
  	fputs ( $fh, '?>' );
  } // END OF WRITE INTO config.lib.php
  fclose ( $fh );
} // END OF OPEN THE FILE

if ( $error != "" ) { ?>
<b><font face="Tahoma" size="2" color="#FF0000"><?php echo $error ?><br /> <br /></font></b>
<?php echo L_P3_HINT6 ?>
<?php } // END OF ERROR != ""
else {
?>
<p align="justify"><b><font face="Tahoma" size="2" color="#008000"><?php echo L_P3_HINT8 ?>
<?php if ( $kind == "new" ) { ?>
<?php echo L_P3_HINT7 ?>
<?php } // END OF kind=NEW ?>
</font></b>
<?php } // END OF IS NOT WRITEABLE ?>
<?php } // END OF IS WRITEABLE ?>
<?php if ( ( $kind == "new" ) && ( $error == "" ) ) { ?>
<p align="justify"><i><font face="Tahoma" size="2">
<?php echo L_P3_HINT9 ?></font></i>
<?php } // END OF kind=NEW
?>
<?php } // END OF ERROR == ""
?>
<?php } // END OF PAGE 4
elseif ($p == 5 ) { ?>
<p align="justify"><font face="Tahoma" size="2">
<?php if ( $error4 == "" ) { ?>
<?php if ( $kind == "new" ) { ?>
<?php echo L_P4_HINT1 ?>
<?php } // END OF kind=NEW
?>
<?php echo L_P4_HINT2 ?></font>
<p align="center"><b><font face="Tahoma" size="2"><a href="<?php echo $ChatPath ?>admin.php?L=<?php echo $L ?>" target="_blank"><?php echo L_P4_FORM1 ?></a></font></b></p></td></tr>

<?php } else { ?>
<b><font face="Tahoma" size="2" color="#FF0000"><?php echo $error4 ?><br /> <br /></font></b>
<?php } // END OF ERROR BY ADMIN-DATA
?>
<?php } // END OF PAGE 5
?>
</font></td>
  </tr>
<?php if ( ( $error == "" ) && ( $error4 == "" ) ) { ?>
<?php if ( ( $p == 4 ) && ( $kind != "new" ) ) {} else { ?>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right: medium none #111111">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" style="border-left-color: #111111; border-left-width: 1; border-right-color: #111111; border-right-width: 1">
<?php } // END IF page=3 AND kind = NEW ?>
<?php } // END OF ERROR == "" ?>
<?php if ( $p == 1  && $do_ftp) { ?>
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="398" id="AutoNumber2">
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P0_FORM1 ?></font></td>
        <td width="177">
          <input type="text" name="ftphost" size="20" value="<?php echo $ftphost ?>"></p>
        </td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P0_FORM2 ?></font></td>
        <td width="177">
          <input type="text" name="ftpuname" size="20" value="<?php echo $ftpuname ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P0_FORM3 ?></font></td>
        <td width="177">
          <input type="password" name="ftppass" size="20" value="<?php echo $ftppass ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2">&nbsp;</font></td>
        <td width="177">
          &nbsp;</td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P0_FORM4 ?></font></td>
        <td width="177">
          <input type="text" name="ftppath" size="20" value="<?php echo $ftppath ?>"></td>
      </tr>
    </table>
<?php } ?>
<?php if ( $p == 2 ) { ?>
<?php if ( $error == "" && $error3 == "" ) { ?>
    <p align="center">
  <select size="1" name="kind">
  <option value="new"<?php if ($kind=="new") echo " selected" ?>><?php echo L_P1_OP01 ?></option>
  <option value="194-beta"<?php if ($kind=="194-beta") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus 1.94-beta") ?></option>
  <option value="193"<?php if ($kind=="193") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus 1.93") ?></option>
  <option value="193-beta"<?php if ($kind=="193-beta") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus 1.93-beta") ?></option>
  <option value="192"<?php if ($kind=="192") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus 1.92") ?></option>
  <option value="190"<?php if ($kind=="190") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus 1.90") ?></option>
  <option value="18"<?php if ($kind=="18") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus v1.8") ?></option>
  <option value="17"<?php if ($kind=="17") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus v1.7") ?></option>
  <option value="1016"<?php if ($kind=="1016") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat-Plus v1.0-v1.6") ?></option>
  <option value="014015"<?php if ($kind=="014015") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat Standard 0.14-0.15") ?></option>
  <option value="013"<?php if ($kind=="013") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat Standard 0.13") ?></option>
  <option value="012"<?php if ($kind=="012") echo " selected" ?>><?php echo sprintf(L_P1_OP02,"phpMyChat Standard < 0.12") ?></option>
  <option value="no"<?php if ($kind=="no") echo " selected" ?>><?php echo L_P1_OP03 ?></option>
  </select>
<?php } ?>
<?php } elseif ( $p == 3 ) { ?>
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="398" id="AutoNumber3">
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM01 ?></font></td>
        <td width="177">
          <input type="text" name="dbhost" size="20" value="<?php echo $C_DB_HOST ?>"></p>
        </td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM02 ?></font></td>
        <td width="177">
          <input type="text" name="dbuname" size="20" value="<?php echo $C_DB_USER ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM03 ?></font></td>
        <td width="177">
          <input type="password" name="dbpass" size="20" value="<?php echo $C_DB_PASS ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2">&nbsp;</font></td>
        <td width="177">
          &nbsp;</td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM04 ?></font></td>
        <td width="177">
          <input type="text" name="dbname" size="20" value="<?php echo $C_DB_NAME ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2">&nbsp;</font></td>
        <td width="177">
          &nbsp;</td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM05 ?></font></td>
        <td width="177">
  <select size="1" name="dbtype">
  <option value="mysql"<?php if ( $C_DB_TYPE == "mysql" ) echo " SELECTED" ?>>MySQL</option>
  <option value="odbc"<?php if ( $C_DB_TYPE == "odbc" ) echo " SELECTED" ?>>ODBC (not available)</option>
  <option value="pgsql"<?php if ( $C_DB_TYPE == "pgsql" ) echo " SELECTED" ?>>Postgree SQL (not available)</option>
  </select></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2">&nbsp;</font></td>
        <td width="177">
          &nbsp;</td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM06 ?></font></td>
        <td width="177">
          <input type="text" name="t_messages" size="20" value="<?php echo $C_MSG_TBL ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM07 ?></font></td>
        <td width="177">
          <input type="text" name="t_users" size="20" value="<?php echo $C_USR_TBL ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM08 ?></font></td>
        <td width="177">
          <input type="text" name="t_reg_users" size="20" value="<?php echo $C_REG_TBL ?>"> <font color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM09 ?></font></td>
        <td width="177">
          <input type="text" name="t_ban_users" size="20" value="<?php echo $C_BAN_TBL ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM10 ?></font></td>
        <td width="177">
          <input type="text" name="t_config" size="20" value="<?php echo $C_CFG_TBL ?>">
          <font color="#FF0000">*</font></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM11 ?></font></td>
        <td width="177">
          <input type="text" name="t_lurkers" size="20" value="<?php echo $C_LRK_TBL ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM16 ?></font></td>
        <td width="177">
          <input type="text" name="t_stats" size="20" value="<?php echo $C_STS_TBL ?>"></td>
      </tr>
      <tr>
        <td width="221"><font face="Tahoma" size="2"><?php echo L_P2_FORM12 ?></font></td>
        <td>
          <input type="hidden" name="logdir" value="<?php echo((C_LOG_DIR != "C_LOG_DIR" && C_LOG_DIR != "") ? C_LOG_DIR : "logsadmin"); ?>">
          <input type="text" name="logdirnew" size="20" value="<?php echo ($logdir != $logdirnew && $logdirnew != "") ? $logdirnew : $logdir ?>"> <font color="#FF0000">**</font>
		  </td>
      </tr>
      <tr>
        <td><font face="Tahoma" size="2"><?php echo L_P2_FORM15 ?></font></td>
        <td>
          <input type="text" name="chatname" size="25" value="<?php echo $chatname ?>"></td>
      </tr>
      <tr>
        <td width="221">&nbsp;</td>
        <td width="177">
          &nbsp;</td>
      </tr>
      <tr>
        <td width="398" colspan="2">
        <p align="justify"><i><font face="Tahoma" size="2">
        <font color="#FF0000">*</font> <?php echo L_P2_FORM13 ?>
		<br /><font color="#FF0000">**</font> <?php echo L_P2_FORM14 ?>
		</font></i></td>
      </tr>
    </table>
<?php } elseif ( $p == 4 ) { ?>
<?php if ( ( $error == "" ) && ( $kind == "new" ) ) { ?>
    <table align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="100%" id="AutoNumber4">
<?php } ?>
<?php if ( ( $error == "" ) && ( $kind == "new" ) ) { ?>
      <tr>
        <td><font size="2" face="Tahoma"><?php echo L_P3_FORM1 ?></font></td>
        <td>
          <input type="text" name="admin" size="25" value="<?php echo $admin ?>"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td ><font size="2" face="Tahoma"><?php echo L_P3_FORM2 ?></font></td>
        <td>
          <input type="password" name="pass1" size="25" value="<?php echo $pass1 ?>"></td>
      </tr>
      <tr>
        <td><font size="2" face="Tahoma"><?php echo L_P3_FORM3 ?></font></td>
        <td>
          <input type="password" name="pass2" size="25" value="<?php echo $pass2 ?>"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td><font face="Tahoma" size="2"><?php echo L_P3_FORM4 ?></font></td>
        <td>
          <input type="text" name="adminname" size="25" value="<?php echo $adminname ?>"></td>
      </tr>
      <tr>
        <td><font face="Tahoma" size="2"><?php echo L_P3_FORM5 ?></font></td>
        <td>
          <input type="text" name="adminemail" size="25" value="<?php echo $adminemail ?>"></td>
      </tr>
      <tr>
        <td><font face="Tahoma" size="2"><?php echo L_P3_FORM6 ?></font></td>
        <td>
          <input type="text" name="chaturl" size="25" value="<?php echo $chaturl ?>"></td>
      </tr>
<?php } // END OF error="" AND kind=new
?>
<?php if ( ( $error == "" ) && ( $kind == "new" ) ) { ?>
    </table>
<?php } ?>
<?php } // END OF PAGE 4
elseif ( $p == 5 ) { ?>
<?php if ( $error4 == "" ) { ?>
  <p align="justify"><font face="Tahoma" size="2"><?php echo L_P4_FORM2 ?></p><p align="center"><b><a href="<?php echo $ChatPath ?>bot/botloader<?php echo (($ftphost == "" && $_POST['ftphost'] != "") ? "inc.php" : ".php") ?>" target="_blank"><?php echo L_P4_FORM3 ?></a></font></b></p></td></tr>
    </tr>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right: medium none #111111">&nbsp;</td>
  </tr>
  <tr><td bgcolor="#FFFFFF"><p align="justify"><b><font face="Tahoma" size="2" color="#FF0000"><?php echo L_P4_HINT4 ?></font></b></td></tr>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right: medium none #111111">&nbsp;</td>
  </tr>
  <tr><td>
  <p align="justify"><b><font face="Tahoma" size="2" color="#0000FF"><?php echo L_P4_HINT3 ?> </font></b>
  <?php } ?>
<?php } ?>
<?php if ( ( $error == "" ) && ( $error4 == "" ) ) { ?>
<?php if ( ( $p == 4 ) && ( $kind != "new" ) ) {} else { ?>
</td>
  </tr>
<?php } // END IF page=3 AND kind = NEW
?>
<?php } // END OF error == ""
?>
  <tr>
    <td width="100%" style="border-left: medium none #111111; border-right: medium none #111111">&nbsp;</td>
  </tr>
  <tr>
    <td width="100%" style="border-left-color: #111111; border-left-width: 1; border-right-color: #111111; border-right-width: 1">
  <p align="right">
<?php if ( $p == 1 ) { ?>
<input type="button" value="<?php echo L_BTN2 ?>" name="B2" onClick="window.open('','_parent','');window.close();">&nbsp;&nbsp;&nbsp;
<?php if ( $do_ftp ) { ?>
<input type="button" value="<?php echo L_BTN6 ?>" onClick="location.href='install.php?p=<?php echo ($p_next)."&L=".$L."&skip=1"; ?>';" name="B3">&nbsp;&nbsp;&nbsp;
<?php } ?>
<input type="submit" value="<?php echo L_BTN1 ?> &gt;" name="B1">
<?php } elseif ( $p == 2 ) { ?>
<input type="button" value="<?php echo L_BTN2 ?>" name="B2" onClick="window.open('','_parent','');window.close();">&nbsp;&nbsp;&nbsp;
<input type="button" value="&lt; <?php echo L_BTN3 ?>" onClick="location.href='install.php?p=<?php echo $p_prev."&L=".$L; ?>';" name="B3">
<?php if ( $error3 == "" ) { ?>
&nbsp;&nbsp;&nbsp;<input type="submit" value="<?php echo L_BTN1 ?> &gt;" name="B1">
<?php } ?>
<?php } elseif ( $p == 3 ) { ?>
<input type="button" value="<?php echo L_BTN2 ?>" name="B2" onClick="window.open('','_parent','');window.close();">&nbsp;&nbsp;&nbsp;
<input type="button" value="&lt; <?php echo L_BTN3 ?>" name="B3" onClick="location.href='install.php?p=<?php echo $p_prev."&L=".$L."&skip=".$skip; ?>';">&nbsp;&nbsp;&nbsp;
<input type="button" value="<?php echo L_BTN4 ?>" name="B4" onClick="location.href='install.php?p=<?php echo $p."&L=".$L; ?>';">&nbsp;&nbsp;&nbsp;
<input type="submit" value="<?php echo L_BTN1 ?> &gt;" name="B1">
<?php } elseif ( $p == 4 ) { ?>
<input type="button" value="<?php echo L_BTN2 ?>" onClick="window.open('','_parent','');window.close();" name="B2">&nbsp;&nbsp;&nbsp;
<input type="button" value="&lt; <?php echo L_BTN3 ?>" onClick="location.href='install.php?p=<?php echo $p_prev."&L=".$L; ?>';" name="B3">
<?php if ( $error == "" ) { ?>
&nbsp;&nbsp;&nbsp;<input type="submit" value="<?php echo L_BTN1 ?> &gt;" name="B1">
<?php } ?>
<?php } elseif ( $p == 5 ) { ?>
<?php if ( $error4 != "" ) { ?>
<input type="button" value="&lt; <?php echo L_BTN3 ?>" name="B1" onClick="location.href='install.php?p=<?php echo $p_prev."&L=".$L; ?>';">
<?php } else { ?>
<input type="button" value="<?php echo L_BTN5 ?>" name="B1" onClick="location.href='<?php echo $ChatPath; ?>';">
<?php } ?>
<?php } ?>
    </td>
  </tr>
</form>
</table><br />
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2007<?php echo((date(Y)>"2007") ? "-".date(Y) : ""); ?> - Plus installer by <a href="mailto:tpsde1970@aol.com?subject=phpMychat%20Plus%20Installer%20feedback" Title="<?php echo(sprintf(L_CLICK,L_LINKS_9)); ?>" CLASS="ChatLink" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;">Thomas Pschernig</a> and <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Installer%20feedback" Title="<?php echo(sprintf(L_CLICK,L_LINKS_9,"")); ?>" CLASS="ChatLink" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_DEVELOPER)); ?>.'; return true;">Ciprian Murariu</a></span><div>
</body>
</html>
<?php
?>