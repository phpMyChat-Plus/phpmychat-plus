<?php
// Get the names and values for vars sent to the admin script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for post vars
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

// avoid server configuration for magic quotes
#if (function_exists('set_magic_quotes_runtime')) set_magic_quotes_runtime(0);
ini_set("magic_quotes_runtime", 0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

// Check for administration language file
if (!isset($What) || $What == "")
{
	if (!isset($L)) include_once("./localization/languages.lib.php");
	if (!file_exists("./localization/${L}/localized.admin.php") || ${L} == "hebrew")
	{
		unset($L);
		$Charset_Sav = $Charset;
		$FontName_Sav = (isset($FontName) ? $FontName : "");
		$FontSize_Sav = $FontSize;
		include_once("./localization/admin.lib.php");
	};
};
require_once("./localization/${L}/localized.chat.php");
require_once("./localization/${L}/localized.admin.php");
if (isset($Charset_Sav))
{
	$Charset = $Charset_Sav; unset($Charset_Sav);
	$FontName = $FontName_Sav; unset($FontName_Sav);
	$FontSize = $FontSize_Sav; unset($FontSize_Sav);
};

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

if (!function_exists("utf8_substr"))
{
	function utf8_substr($str,$start)
	{
	   preg_match_all("/./su", $str, $ar);
	   if(func_num_args() >= 3) {
	       $end = func_get_arg(2);
	       return join("",array_slice($ar[0],$start,$end));
	   } else {
	       return join("",array_slice($ar[0],$start));
	   }
	};
};

// Login stuff
// Var used in the login.lib.php script required below
$MUST_BE_ADMIN = true;
require("./lib/login.lib.php");
if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
// Do not cache this page
$now		= gmdate('D, d M Y H:i:s') . ' GMT';
header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");

// Define charset
header("Content-Type: text/html; charset=${Charset}");

// ** Load the frame when the $what var indicate one
if (isset($What) && $What != "") include("./admin/admin".$What.".php");


// ** Define url query **

// Get the name of the current script;
if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER["SCRIPT_NAME"];
$From = basename($PHP_SELF);

// Define the sheet to open
if (!isset($sheet)) $sheet = 1;
$ToOpen = "admin".$sheet.".php";

// Set username of the admin to a convenient format
$pmc_username = urlencode(htmlspecialchars(stripslashes($pmc_username)));

// Define URL queries to be sent to frames
$URLQueryTop = "From=$From&What=Top&L=$L&pmc_username=$pmc_username&pmc_password=$PWD_Hash&sheet=$sheet";
$Add2Body = (isset($First) ? "" : "&First=1");
$Add2Body .= (isset($sortBy)  ? "&sortBy=$sortBy" : (($sheet != 5 && !strstr($sheet,"a")) ? "&sortBy=username" : "")).(isset($sortOrder) ? "&sortOrder=$sortOrder" : (($sheet != 5 && !strstr($sheet,"a")) ? "&sortOrder=ASC" : ""));
$Add2Body .= (isset($startReg) ? "&startReg=$startReg" : "");
$Add2Body .= (isset($ReqVar) ? "&ReqVar=$ReqVar" : "");
$URLQueryBody = "From=$From&What=Body&L=$L&pmc_username=$pmc_username&pmc_password=$PWD_Hash&sheet=$sheet".$Add2Body;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(L_REG_35." - ".(C_CHAT_NAME != "" ? C_CHAT_NAME." - ".APP_NAME : APP_NAME)); ?></TITLE>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
<!--
// Define the URL for the fix for NN4+ resize bug
if (document.layers)
{
	var NNResize_URL = "<?php echo("$From?L=$L&pmc_username=".urlencode($pmc_username)."&pmc_password=$PWD_Hash&sheet=$sheet"); ?>";
	var sortBy = "<?php echo(isset($sortBy) ? "&sortBy=$sortBy" : ""); ?>";
	var sortOrder = "<?php echo(isset($sortOrder) ? "&sortOrder=$sortOrder" : ""); ?>";
	var startReg = "<?php echo((isset($startReg) && $startReg != "") ? "&startReg=$startReg" : ""); ?>";
};

function logout()
{
<?php
	$_SESSION["adminlogged"] = NULL;
	unset($_SESSION["adminlogged"]);
	$_SESSION = array();
	session_destroy();
	session_unset();
?>
};
// -->
</SCRIPT>
<?php
if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};
?>
</HEAD>

<FRAMESET ROWS="50,*" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) document.location = NNResize_URL + sortBy + sortOrder">
	<FRAME SRC="<?php echo("$From?$URLQueryTop"); ?>" NAME="adminTop" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3" SCROLLING="NO">
	<FRAME SRC="<?php echo("$From?$URLQueryBody"); ?>" NAME="adminBody" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 NORESIZE>
</FRAMESET>
<BODY onUnload="logout();"></BODY>
</HTML>