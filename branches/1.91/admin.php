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
set_magic_quotes_runtime(0);

// Var used in the login.lib.php script required below
$MUST_BE_ADMIN = true;

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./lib/database/".C_DB_TYPE.".lib.php");

// Check for administration language file
if (!isset($What) || $What == "")
{
	if (!isset($L)) include("./localization/languages.lib.php");
	include("./localization/${L}/localized.chat.php");
	if (!file_exists("./localization/${L}/localized.admin.php"))
	{
		unset($L);
		$Charset_Sav = $Charset;
		$FontName_Sav = (isset($FontName) ? $FontName : "");
		$FontSize_Sav = $FontSize;
		include("./localization/admin.lib.php");
	};
};
require("./localization/${L}/localized.admin.php");
if (isset($Charset_Sav))
{
	$Charset = $Charset_Sav; unset($Charset_Sav);
	$FontName = $FontName_Sav; unset($FontName_Sav);
	$FontSize = $FontSize_Sav; unset($FontSize_Sav);
};

// Login stuff
require("./lib/login.lib.php");
if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
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
if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER["PHP_SELF"];
$From = basename($PHP_SELF);

// Define the sheet to open
if (!isset($sheet)) $sheet = "5";
$ToOpen = "admin".$sheet.".php";

// Set username of the admin to a convenient format
$pmc_username = urlencode(htmlspecialchars(stripslashes($pmc_username)));

// Define URL queries to be sent to frames
$URLQueryTop = "From=$From&What=Top&L=$L&pmc_username=$pmc_username&pmc_password=$PWD_Hash&sheet=$sheet";
$Add2Body = (isset($First) ? "" : "&First=1");
$Add2Body .= (isset($sortBy)  ? "&sortBy=$sortBy" : ($sheet != "5") ? "&sortBy=username" : "").(isset($sortOrder) ? "&sortOrder=$sortOrder" : ($sheet != "5") ? "&sortOrder=ASC" : "");
$Add2Body .= (isset($startReg) ? "&startReg=$startReg" : "");
$Add2Body .= (isset($startCfg) ? "&startCfg=$startCfg" : "");
$Add2Body .= (isset($ReqVar) ? "&ReqVar=$ReqVar" : "");
$URLQueryBody = "From=$From&What=Body&L=$L&pmc_username=$pmc_username&pmc_password=$PWD_Hash&sheet=$sheet".$Add2Body;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(APP_NAME); ?></TITLE>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
<!--
// Define the URL for the fix for NN4+ resize bug
if (document.layers)
{
	var NNResize_URL = "<?php echo("$From?L=$L&pmc_username=".urlencode($pmc_username)."&pmc_password=$PWD_Hash&sheet=$sheet"); ?>";
	var sortBy = "<?php echo(isset($sortBy) ? "&sortBy=$sortBy" : ""); ?>";
	var sortOrder = "<?php echo(isset($sortOrder) ? "&sortOrder=$sortOrder" : ""); ?>";
	var startReg = "<?php echo((isset($startReg) && $startReg != "") ? "&startReg=$startReg" : ""); ?>";
	var startCfg = "<?php echo((isset($startCfg) && $startCfg != "") ? "&startCfg=$startCfg" : ""); ?>";
};

function logout()
{
	<?php
		session_destroy($_SESSION['adminlogged']);
	?>
}
// -->
</SCRIPT>
</HEAD>

<FRAMESET ROWS="50,*" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) document.location = NNResize_URL + sortBy + sortOrder">
	<FRAME SRC="<?php echo("$From?$URLQueryTop"); ?>" NAME="adminTop" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3" SCROLLING="NO">
	<FRAME SRC="<?php echo("$From?$URLQueryBody"); ?>" NAME="adminBody" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 NORESIZE>
</FRAMESET>
<BODY onUnload="logout();"></BODY>
</HTML>