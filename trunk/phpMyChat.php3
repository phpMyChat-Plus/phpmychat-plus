<?php
// This is an example of what may be done to include phpMyChat into an
// existing web page, regardless of its name.
// You can also include such a file in a frameset.

// Lines below must be at the top of your file because 'index.lib.php'
// sets headers and cookies.
$ChatPath = "";		// relative path to chat dir, empty value if this
					// file is in the same dir than the chat;
// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
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
<BODY<?php echo((C_FILLED_LOGIN) ? " CLASS=\"ChatBody\"" : ""); ?><?php echo((C_BACKGR_IMG && C_BACKGR_IMG_PATH != "") ? " background=\"".C_BACKGR_IMG_PATH."\"" : ""); ?>>
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
};
$Username = (isset($CookieUsername) ? $CookieUsername : "");
$Room_name = (isset($CookieRoom) ? $CookieRoom : "");
$Room_type = (isset($CookieRoomType) ? $CookieRoomType : "");
$Color = (isset($CookieColor) ? $CookieColor : "");
$Status = (isset($CookieStatus) ? $CookieStatus : "");

layout($Is_Error,$Username,$Room_name,$Room_type,$Color,$Status);

// You can add php code here, or add html statements before the "</BODY>" tag.
if ($S)
{
	$conn = @mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database');
	echo("<TD><SPAN style=\"color:yellow; background-color:black;\"><b>Debug data:</b><br />Admin name: <b>".C_ADMIN_NAME."</b><br />Admin email: <b>".C_ADMIN_EMAIL."</b><br />App name: <b>".APP_NAME."</b><br />Chat name: <b>".C_CHAT_NAME."</b><br />App version: <b>".APP_VERSION.APP_MINOR."</b><br />Hosting Server IP: <b>".$_SERVER['SERVER_ADDR'].(@fsockopen("gravatar.com", 80, $errno, $errstr, 2) ? "</b>" : "<br /><font color=red>Cache not allowed - cannot get access to gravatar.com!</font></b>")."<br />Php server version: <b>".phpversion()."</b><br />allow_url_fopen: <b>".(!(ini_get("allow_url_fopen")) ? "<font color=red>".L_DISABLED." - Cache not allowed</font>" : L_ENABLED)."</b><br />allow_url_include: <b>".(!(ini_get("allow_url_include")) ? "<font color=red>".L_DISABLED." - Update checking not allowed</font>" : L_ENABLED)."</b><br />file_get_contents: <b>".(!(function_exists("file_get_contents")) ? "<font color=red>".L_DISABLED." - Cache not allowed</font>" : L_ENABLED)."</b><br />MySQL server version: <b>".mysql_get_server_info()."</b></SPAN></TD>");
	@mysql_close($conn);
}
// The following line is required
$DbLink->close();
?>
</CENTER>
</BODY>
</HTML>
<?php
?>