<?php
// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix some security holes
if (!isset($ChatPath)) $ChatPath = "";
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);
if (isset($_COOKIE["CookieBeep"])) $CookieBeep = $_COOKIE["CookieBeep"];

// Sort order by Ciprian
require("./${ChatPath}config/config.lib.php");
if (!isset($sort_order)) $sort_order = isset($_COOKIE["CookieUserSort"]) ? $_COOKIE["CookieUserSort"] : C_USERS_SORT_ORD;
if ($sort_order) $ordquery = "u.username";
else $ordquery = "u.r_time";

require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}lib/clean.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
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
function ghosts_in($what, $in, $Charset)
{
	$ghosts = explode(",",$in);
	for (reset($ghosts); $ghost_name=current($ghosts); next($ghosts))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($ghost_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
};

$DbLink = new DB;

// ** Check for user entrance to beep **
// Initialize some vars if necessary and put beep on/off in a cookie
if (!isset($B)) $B = (isset($CookieBeep) ? $CookieBeep : 1);
setcookie("CookieBeep", $B, time() + 60*60*24*365);		// cookie expires in one year
$BeepRoom = 0;
if (!isset($LastCheck) || $B == 0) $LastCheck = time();

if ($B == 1)
{
	$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE m_time > '$LastCheck' AND username = 'SYS enter' AND type = 1 ORDER BY m_time DESC LIMIT 1");
	if ($DbLink->num_rows() > 0)
	{
		$BeepRoom = 1;
		list($LastCheck) = $DbLink->next_record();
	};
	$DbLink->clean_results();
}

// ** Prepare the http refresh header **
$URL_Query = (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING");
#if (!ereg("LastCheck", $URL_Query))
if (strpos($URL_Query,"LastCheck") === false)
{
	$Refresh = $URL_Query."&LastCheck=${LastCheck}&B=${B}";
}
else
{
#	$Refresh = ereg_replace("LastCheck=([0-9]+)","LastCheck=${LastCheck}", $URL_Query);
	$Refresh = preg_replace("/LastCheck=([0-9]+)/","LastCheck=${LastCheck}", $URL_Query);
}

// ** Compute the beeps/nobeeps reload query used when the sound icon is clicked **
$B1 = ($B == 1 ? 0 : 1);
#$ChangeBeeps_Reload = ereg_replace("&B=([0-2])","&B=${B1}",$Refresh);
$ChangeBeeps_Reload = preg_replace("/&B=([0-2])/","&B=${B1}",$Refresh);

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<?php
function special_char($str,$lang,$type)
{
	$tag_open = (((($type == 'a' && $str != C_BOT_NAME) || $type == 't' || $type == 'm') && C_ITALICIZE_POWERS) ? "<I>":"");
	$tag_close = ($tag_open != "" ? "</I>":"");
	return $tag_open.($lang ? htmlentities($str) : htmlspecialchars($str)).$tag_close;
};

// Special classes for usernames depending on users status (other users)
function userClass($type,$name)
{
		if (C_ITALICIZE_POWERS)
		{
			$class = ((($type == 'a' && $name != C_BOT_NAME) || $type == 't') ? "Class=\"admin\"":($type == 'm' ? "Class=\"mod\"":"Class=\"user\""));
		}
		else
		{
			$class = "Class=\"user\"";
		}
	return $class;
};

// Ghost Control mod by Ciprian
$Hide = "";
if (C_HIDE_ADMINS) $Hide .= " AND (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'";
if (C_HIDE_MODERS) $Hide .=  " AND u.status !='m'";
if (C_SPECIAL_GHOSTS != "")
{
	$sghosts = str_replace("username","u.username",C_SPECIAL_GHOSTS);
	$Hide .= " AND u.username != ".$sghosts."";
}

// Restricted rooms mod by Ciprian
$res_init = utf8_substr(L_RESTRICTED, 0, 1);
$disp_note = 0;

// ** count rooms **
$DbLink->query("SELECT DISTINCT u.room FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1");
$NbRooms = $DbLink->num_rows();
$DbLink->clean_results();

if ($NbRooms > 0)
{
	// ** count users **
	$DbLink->query("SELECT DISTINCT u.username, u.latin1, u.r_time FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1".$Hide." ORDER BY ".$ordquery."");
	$NbUsers = $DbLink->num_rows();
	if($NbUsers > 3)
	{
		echo("<TITLE>".$NbUsers." ".($NbUsers > 1 ? L_USERS : L_USER)."/".$NbRooms." ".($NbRooms > 1 ? L_ROOMS : L_ROOM)."</TITLE>");
	}
	else
	{
		echo("<TITLE>");
		$Term = "";
		while(list($Username,$Latin1,$room_time) = $DbLink->next_record())
		{
			echo($Term.special_char($Username,$Latin1,''));
			$Term = ", ";
		}
		echo("</TITLE>");
	};
	$DbLink->clean_results();
}
else
{
	echo("<TITLE>".L_NO_USER."</TITLE>");
}
?>
<META HTTP-EQUIV="Refresh" CONTENT="30; URL=users_popupL.php?<?php echo($Refresh); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>

<BODY CLASS="frame" onClick="self.focus();">
<CENTER>
	<?php echo(LOGIN_LINK); ?><?php echo(L_CHAT); ?></A>
	<P><A HREF="users_popupL.php?<?php echo($ChangeBeeps_Reload); ?>" onMouseOver="window.status='<?php echo(L_BEEP); ?>.'; return true;" title="<?php echo(L_BEEP); ?>"><IMG SRC="images/<?php if ($B == 0) echo("no"); ?>sound.gif" WIDTH=13 HEIGHT=13 ALIGN=MIDDLE BORDER=0 ALT="<?php echo(L_BEEP); ?>"></A></P>
</CENTER>
<P>
<?php

// ** Build users list **
if(isset($NbUsers) && $NbUsers > 0)
{
	if($DbLink->query("SELECT DISTINCT room FROM ".C_MSG_TBL." WHERE type = 1 ORDER BY room"))
	{
		if($DbLink->num_rows() > 0)
		{
			$Users = new DB;
			while(list($Other) = $DbLink->next_record())
			{
				if($Users->query("SELECT u.username, u.latin1, u.status, u.r_time FROM ".C_USR_TBL." u WHERE room = '".addslashes($Other)."'".$Hide." ORDER BY ".$ordquery.""))
				{
					if($Users->num_rows() > 0)
					{
						// Restricted rooms mod by Ciprian
						if (is_array($DefaultDispChatRooms) && in_array($Other." [R]",$DefaultDispChatRooms))
						{
							$Other .= " [".$res_init."]";
							$disp_note = 1;
						}
						echo("<B>".htmlspecialchars($Other)."</B><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$Users->num_rows().")</SPAN><br />");
						while(list($Username,$Latin1,$status,$room_time) = $Users->next_record())
						{
							$room_time = $room_time + C_TMZ_OFFSET*60*60;
							$room_time = strftime(L_SHORT_DATETIME,$room_time);
							echo("-&nbsp;<a ".userClass($status,$Username).";>".special_char($Username,$Latin1,$status)."</a><BDO dir=\"${textDirection}\"></BDO>&nbsp;<font size=1>(".special_char($room_time,$Latin1,"").")</font><br />");
						};
					}
				}
			}
			$Users->clean_results();
			echo("</P><P>");
		}
	}
	if($disp_note) echo("<P><table WIDTH=100%><tr valign=top><td colspan=4 align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED.".</td></tr></table>");
	$DbLink->clean_results();
}
else
{
	echo("<CENTER>".L_NO_USER."</CENTER>");
}

$DbLink->close();
?>
</P>

<?php
// ** Beeps if necessary **
if ($B == 1 && $BeepRoom)
{
	?>
	<!-- Sound for user entrance -->
	<EMBED SRC="sounds/beep.wav" HIDDEN="true" AUTOSTART="true" LOOP="false" NAME="Beep" MASTERSOUND>
		<NOEMBED><BGSOUND SRC="sounds/beep.wav" LOOP=1></NOEMBED>
	</EMBED>
	<?php
}
?>
</BODY>

</HTML>
<?php

?>