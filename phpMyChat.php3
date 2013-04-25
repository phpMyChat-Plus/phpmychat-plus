<?php
// This is an example of what may be done to include phpMyChat into an
// existing web page, regardless of its name.
// You can also include such a file in a frameset.

// Lines below must be at the top of your file because 'index.lib.php'
// sets headers and cookies.
if (!isset($ChatPath)) $ChatPath = "";		// relative path to chat dir, empty value if this
											// file is in the same dir than the chat;

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
	};
};

require("./${ChatPath}lib/index.lib.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
window.name="login";
<?php
// Display & remove the server time in the status bar
if (C_WORLDTIME == 2)
{
	include_once("./${ChatPath}lib/worldtime.lib.php");
	$CorrectedTime = mktime(date("G") + C_TMZ_OFFSET,date("i"),date("s"),date("m"),date("d"),date("Y"));
?>
	gap = calc_gap("<?php echo(date("F d, Y H:i:s", $CorrectedTime)); ?>");
	clock(gap);
<?php
}
?>
//-->
</SCRIPT>
<?php
// You can put html head statements right after the "<HEAD>" tag.

// Both values are boolean. See explanations in 'index.lib.php' file.
send_headers(1,1);
?>
</HEAD>
<BODY<?php echo((C_FILLED_LOGIN) ? " CLASS=\"ChatBody\"" : ""); ?><?php echo((C_BACKGR_IMG && C_BACKGR_IMG_PATH != "") ? " style=\"background-image: url(".C_BACKGR_IMG_PATH."); background-attachment: fixed;\"" : ""); ?>>
	<CENTER>
<?php
// You can put html statements right after the "<BODY>" tag or add php code here.

$Is_Error = (isset($Error));

if (isset($_COOKIE))
{
	if (isset($_COOKIE["CookieUsername"])) $CookieUsername = urldecode($_COOKIE["CookieUsername"]);
	if (isset($_COOKIE["CookieRoom"])) $CookieRoom = urldecode($_COOKIE["CookieRoom"]);
	if (isset($_COOKIE["CookieRoomType"])) $CookieRoomType = $_COOKIE["CookieRoomType"];
	if (isset($_COOKIE["CookieColor"])) $CookieColor = $_COOKIE["CookieColor"];
	if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];
	if (isset($_COOKIE["CookieHash"])) $RemMe = $_COOKIE["CookieHash"];
};
$Username = (isset($CookieUsername) ? $CookieUsername : "");
$Room_name = (isset($CookieRoom) ? $CookieRoom : "");
$Room_type = (isset($CookieRoomType) ? $CookieRoomType : "");
$Color = (isset($CookieColor) ? $CookieColor : "");
$Status = (isset($CookieStatus) ? $CookieStatus : "");
$RemMe = (isset($RemMe) ? $RemMe : "");

layout($Is_Error,$Username,$Room_name,$Room_type,$Color,$Status,$RemMe);

// You can add php code here, or add html statements before the "</BODY>" tag.
if(isset($S) && $S)
{
	if(!function_exists('apache_get_version'))
	{
		function apache_get_version()
		{
		   $ver = split("[/ ]",$_SERVER['SERVER_SOFTWARE']);
		   $apver = "$ver[1] $ver[2]";
		   return $apver;
		};
	};

#	$conn = @mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
	echo("<TD><SPAN style=\"color:blue; background-color:black;\"><b>Debug data:</b><SPAN style=\"color:yellow;\"><br />Admin name: <b><font color=green>".C_ADMIN_NAME."</font></b><br />Admin email: <b><font color=green>".C_ADMIN_EMAIL."</font></b><br />App name: <b><font color=green>".APP_NAME."</font></b><br />Chat name: <b><font color=green>".C_CHAT_NAME."</font></b><br />App version: <b><font color=green>".APP_VERSION.APP_MINOR."</font></b><br />Hosting Server IP: <b><font color=green>".$_SERVER['SERVER_ADDR']."</font></b>".(@fsockopen("gravatar.com", 80, $errno, $errstr, 2) ? "" : "<br /><b><font color=red>Cache not allowed - cannot get access to gravatar.com!</font></b>")."<br />Apache version: <b><font color=green>".apache_get_version()."</font></b><br />Php server version: <b>".(version_compare(PHP_VERSION,'5') < 0 ? "<font color=red>".PHP_VERSION." - Cache not allowed</font>" : "<font color=green>".PHP_VERSION."</font>")."</b><br />allow_url_fopen: <b>".(!(ini_get("allow_url_fopen")) ? "<font color=red>".L_DISABLED." - Cache not allowed</font>" : "<font color=green>".L_ENABLED."</font>")."</b><br />allow_url_include: <b>".(!(ini_get("allow_url_include")) ? "<font color=red>".L_DISABLED."</font>" : "<font color=green>".L_ENABLED."</font>")."</b><br />fsockopen: <b>".(!(@fsockopen("ciprianmp.com", 80, $errno, $errstr, 2) && @fsockopen("phpmychat.svn.sourceforge.net", 80, $errno, $errstr, 2)) ? "<font color=red>".L_DISABLED." - Update checking not allowed</font>" : "<font color=green>".L_ENABLED."</font>")."</b><br />file_get_contents: <b>".(!(function_exists("file_get_contents")) ? "<font color=red>".L_DISABLED." - Cache not allowed</font>" : "<font color=green>".L_ENABLED."</font>")."</b><br />MySQL server version: <b><font color=green>".mysql_get_server_info()."</font></b></SPAN></SPAN></TD>");
#	@mysql_close($conn);
}
// The following line is required
$DbLink->close();
?>
</CENTER>
</BODY>
</HTML>
<?php
?>