<?php
// This script is an example of display, in another page of your website,
// the list or number of users connected to the chat

/* Call this file in a iframe like this:
<iframe name="PlusFrame" id="PlusFrame" height="30" scroll="no" frameborder="no" src="../plus/chat_activity.php"></iframe>
*/

// Lines below must be at the top of your file and completed according to your settings (path to your chat or plus directory)
// Set relative path from this page to your chat directory (it ends with a trailing slash like: "../chat/" or empty "")
// Considering /plus/ is in a path like http://www.website.com/plus/ (/public_html/plus/)
// Note:	./ = current directory = /plus/;
//				../ = parent directory = /folders/ (one folder up);
//$ChatPath = "../../plus/";	//use it if the output page is in a path like this: http://www.website.com/private/phpbb (/public_html/private/phpbb/)
$ChatPath = "";	//use it if the output page is in a path like this: http://www.website.com/phpbb/ (/public_html/phpbb/)
//$ChatPath = "plus/";	//(most often) use it if the output page is in a path like this: http://www.website.com/ (root, /public_html/)
//$ChatPath = "";	//use it if the output page is in the same directory with /plus/

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/release.lib.php");

// Configure here:
$ShowPrivate = 0;     // 1 to display users even if they are in a private room,
$DisplayUsers = 0;    // 0 to display only the number of connected users
// End configuration

// Special cache instructions for IE5+
header("Cache-Control: public");
header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
set_magic_quotes_runtime(0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

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

// Ghost Control mod by Ciprian
if (!function_exists('ghosts_in'))
{
	function ghosts_in($what, $in, $Charset)
	{
		$ghosts = explode(",",$in);
		for (reset($ghosts); $ghost_name=current($ghosts); next($ghosts))
		{
			if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($ghost_name,MB_CASE_LOWER,$Charset)) == 0) return true;
		}
		return false;
	};
};

function user_status($name,$stat)
{
	$newname = $name;
	if ($stat == 'a') $newname .= ($name == C_BOT_NAME) ? "</td><td nowrap=\"nowrap\">".L_WHOIS_BOT."</td>" : ((C_ITALICIZE_POWERS) ? "</td><td nowrap=\"nowrap\">".L_WHOIS_ADMIN."</td>" : "</td><td nowrap=\"nowrap\">".L_WHOIS_REG."</td>");
	elseif ($stat == 't') $newname .= (C_ITALICIZE_POWERS) ? "</td><td nowrap=\"nowrap\">".L_WHOIS_TOPMOD."</td>" : "</td><td nowrap=\"nowrap\">".L_WHOIS_REG."</td>";
	elseif ($stat == 'm') $newname .= (C_ITALICIZE_POWERS) ? "</td><td nowrap=\"nowrap\">".L_WHOIS_MODER."</td>" : "</td><td nowrap=\"nowrap\">".L_WHOIS_REG."</td>";
	elseif ($stat == 'r') $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_REG."</td>";
	elseif ($name == C_BOT_NAME) $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_BOT."</td>";
	else $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_GUEST."</td>";
	return $newname;
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<META HTTP-EQUIV="Refresh" CONTENT="10">
<TITLE>Integration of chat activity into your own web page</TITLE>
<!-- To integrate this page into a different designed page and remove the style sheet, either comment out the line below or change the .css style sheet to be used (and the Body class)-->
<LINK REL="stylesheet" HREF="<?php echo("${ChatPath}".$skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>
<BODY CLASS="frame">
<CENTER>
<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 CLASS="table">
<TR>
	<TD ALIGN=CENTER colspan=<?php echo($DisplayUsers ? "4" : "3"); ?>>
		<?php
		// Restricted room mod by Ciprian
		$res_init = utf8_substr(L_RESTRICTED, 0, 1);
		$disp_note = 0;
		require("./${ChatPath}/lib/connected_users.lib.php");
		display_connected($ShowPrivate,$DisplayUsers,$NbUsers,($NbUsers != 1 ? $NbUsers." ".NB_USERS_IN : USERS_LOGIN),NO_USER,$DbLink,$Charset);
		?>
	</TD>
</TR>
</TABLE>
<?php
	if($disp_note) echo("<table WIDTH=100%><tr valign=top><td colspan=".($DisplayUsers ? "4" : "3")." align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED."</td></tr></table>");
?>
</CENTER>
</BODY>
</HTML>