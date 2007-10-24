<?php
// Get the names and values for vars sent by the script that called this one
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);
if (isset($_COOKIE["CookieUserSort"])) $sort_order = $_COOKIE["CookieUserSort"];
if (!isset($L) && isset($_COOKIE["CookieLang"])) $L = $_COOKIE["CookieLang"]; 
//if no language detected set default one
if (!isset($L) || $L == "") $L = C_LANGUAGE;
// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./config/config.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=${Charset}");

$DbLink = new DB;


// ** Check for user entrance to beep **
// Initialize some vars if necessary and put beep on/off in a cookie
if (isset($_COOKIE["CookieBeep"])) $CookieBeep = $_COOKIE["CookieBeep"];
if (!isset($B)) $B = (isset($CookieBeep) ? $CookieBeep : "1");
setcookie("CookieBeep", $B, time() + 60*60*24*365);		// cookie expires in one year
$BeepRoom = "0";
if (!isset($LastCheck) || $B == "0") $LastCheck = time();

if ($B > 0)
{
	$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE m_time > '$LastCheck' AND username = 'SYS enter' AND type = 1 ORDER BY m_time DESC LIMIT 1");
	if ($DbLink->num_rows() > 0)
	{
		$BeepRoom = "1";
		list($LastCheck) = $DbLink->next_record();
	};
	$DbLink->clean_results();
}

// ** Prepare the http refresh header **
$URL_Query = (isset($QUERY_STRING)) ? $QUERY_STRING : getenv("QUERY_STRING");
if (!ereg("LastCheck", $URL_Query))
{
	$Refresh = $URL_Query."&LastCheck=${LastCheck}&B=${B}";
}
else
{
	$Refresh = ereg_replace("LastCheck=([0-9]+)","LastCheck=".$LastCheck, $URL_Query);
}

// ** Compute the beeps/nobeeps reload query used when the sound icon is clicked **
$B1 =  ($B > 0 ? "0" : "1");
$ChangeBeeps_Reload = ereg_replace("&B=([0-2])","&B=${B1}",$Refresh);

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<?php
function special_char($str,$lang,$type)
{
	$tag_open = (($type == 'a' || $type == 't' || $type == 'm') ? "<I>":"");
	$tag_close = ($tag_open != "" ? "</I>":"");
	return $tag_open.($lang ? htmlentities($str) : htmlspecialchars($str)).$tag_close;
}

// ** count rooms **
$DbLink->query("SELECT DISTINCT u.room FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1");
$NbRooms = $DbLink->num_rows();
$DbLink->clean_results();

if ($NbRooms > 0)
{
	// ** count users **
	if ($sort_order == "1")	$ordquery = "username";
	else $ordquery = "r_time";
	// Ghost Control mod by Ciprian
	$Hide = (C_HIDE_ADMINS) ? " AND ((u.status != 'a' AND u.status != 't') OR u.email = 'bot@bot.com')" : "";
	$Hide .= (C_HIDE_MODERS ? " AND u.status !='m'" : "");
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
	<P><A HREF="users_popupL.php?<?php echo($ChangeBeeps_Reload); ?>" onMouseOver="window.status='<?php echo(L_BEEP); ?>.'; return true;" title="<?php echo(L_BEEP); ?>"><IMG SRC="images/<?php if ($B == "0") echo("no"); ?>sound.gif" WIDTH=13 HEIGHT=13 ALIGN=MIDDLE BORDER=0 ALT="<?php echo(L_BEEP); ?>"></A></P>
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
				if ($sort_order == "1")	$ordquery = "username";
				else $ordquery = "r_time";
				// Ghost Control mod by Ciprian
				$Hide = (C_HIDE_ADMINS) ? " AND ((status != 'a' AND status != 't') OR email = 'bot@bot.com')" : "";
				$Hide .= (C_HIDE_MODERS ? " AND status !='m'" : "");
				if($Users->query("SELECT username, latin1, status, r_time FROM ".C_USR_TBL." WHERE room = '".addslashes($Other)."'".$Hide." ORDER BY ".$ordquery.""))
				{
					if($Users->num_rows() > 0)
					{
						echo("<B>".htmlspecialchars($Other)."</B><SPAN CLASS=\"small\"><BDO dir=\"${textDirection}\"></BDO>&nbsp;(".$Users->num_rows().")</SPAN><br />");
						while(list($Username,$Latin1,$status,$room_time) = $Users->next_record())
						{
							$room_time = date("d-M, H:i:s", $room_time + C_TMZ_OFFSET*60*60);
							if ($Username != C_BOT_NAME) echo("-&nbsp;".special_char($Username,$Latin1,$status)." <font size=1>".special_char("(".$room_time.")",$Latin1,$status)."</font><br />");
							else echo("-&nbsp;".special_char($Username,$Latin1,"")." <font size=1>".special_char("(".$room_time.")",$Latin1,"")."</font><br />");
						}
					}
				}
			}
			$Users->clean_results();
			echo("</P><P>");
		}
	}
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
if ($B > 0 && $BeepRoom)
{
	?>
	<!-- Sound for user entrance -->
	<EMBED SRC="images/beep.wav" HIDDEN="true" AUTOSTART="true" LOOP="false" NAME="Beep" MASTERSOUND>
		<NOEMBED><BGSOUND SRC="images/beep.wav" LOOP=1></NOEMBED>
	</EMBED>
	<?php
}
?>
</BODY>

</HTML>
<?php

?>