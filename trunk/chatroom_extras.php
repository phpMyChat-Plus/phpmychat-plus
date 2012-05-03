<?php
// Chatroom Extras mod by Ciprian - for both standard and plus versions

// 1st Option Usage: call this file in a iframe like this:
// <iframe name="PlusFrame" id="PlusFrame" width="800" height="550" scroll="no" frameborder="no" src="chatroom_extras.php"></iframe>

// 2nd Option Usage: use a link to open this page in a popup window.
// 2a. Save this file with a different name like chatroom2_extras.php to use a second link for the second room, and so on)
// <a href="path_to_this_file/chatroom_extras.php" target=_blank"">Open the Tests ChatRoom Extras</a>
// 2b. To use the same file /chatroom_extras.php for multiple displays, use links like this (replace 'Tests' with your room names for std version or ROOM1-9 for plus and also commnet the lines below with $R = 'RoomName'):
// <a href="path_to_this_file/chatroom_extras.php?R='Tests'" target=_blank"">Open the Tests ChatRoom Extras</a>
// <a href="path_to_this_file/chatroom_extras.php?R='Main Room'" target=_blank"">Open the Main Room ChatRoom Extras</a>

// Recommended output window size: 800x550

// Set these variables:
$ChatPath = "";		//For being called from pages on server's root path (on standard versions, ./test/chat/ might be more apropriate)
													//To call it from subfolders (eg www.website.com/somefolder - other than chat) use ../test and so on (../../test - for 2 levels deep subfolders)
if (!isset($N)) $N = 30;									//Set the last number of messages to be displayed
//require("${ChatPath}config/config.lib.php"); //don't touch this line - it is here to return Plus version room names - required in both versions!
//$R = 'Tests';						//Choose the room name you set in config/config.lib.php (.php3) to display last $N messages from;
//$R = ROOM1;								//Format only for Plus version (ROOM1, ROOM2, aso)

//$RoomFilter = " AND room='$R'";	//Filter used only if you want a specific room to be displayed (comment it out for the entire chat to be displayed)
$Room = ""; 						//Comment the one above and uncomment this line to show messages from all rooms

$Type = " AND type='1'";	//This is to display only the public rooms
//$Type = "";							//This is to display either public or private rooms

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}lib/release.lib.php");

// Special cache instructions for IE5+
header("Cache-Control: public");
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

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset != "utf-8");
function special_char($str,$lang)
{
	return ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
}

// ** Get messages **

// Define the SQL query (depends on values for ignored users list and on whether to display
// notification messages or not
$DbLink = new DB;

$CondForQuery	= "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username = 'SYS video' OR username = 'SYS utube' OR username = 'SYS math' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";

$DbLink->query("SELECT m_time, room, username, latin1, address, message FROM ".C_MSG_TBL." WHERE ".$CondForQuery.$RoomFilter.$Type." ORDER BY m_time DESC LIMIT $N");

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$MessagesString = "";
	while(list($Time, $Room, $User, $Latin1, $Dest, $Message) = $DbLink->next_record())
	{
		$Message = stripslashes($Message);
		$Message = str_ireplace("L_DEL_BYE",L_DEL_BYE,$Message);
		$Message = str_ireplace("L_REG_BRB",L_REG_BRB,$Message);
		$Message = str_ireplace("L_HELP_MR",sprintf(L_HELP_MR,$User),$Message);
		$Message = str_ireplace("L_HELP_MS",sprintf(L_HELP_MS,$User),$Message);
		$Message = str_ireplace("L_PRIV_PM",L_PRIV_PM,$Message);
		$Message = str_ireplace("L_PRIV_WISP",L_PRIV_WISP,$Message);
		$Message = str_ireplace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
		if ($Align == "right") $Message = str_replace("arrowr","arrowl",$Message);
		if ($Room == '*' || ($User == "SYS room" && $Dest == '*') || $User == "SYS announce") $Room = L_ROOM_ALL;
#		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
		if (C_POPUP_LINKS || stripos($Message,'target="_blank"></a>') !== false)
		{
			$Message = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$Message);
		}
		else $Message = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$Message);

		$Message = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$Message);
		if(COLOR_NAMES)
		{
			$colorname_tag = "";
			$colorname_endtag = "";
			$colornamedest_tag = "";
			$colornamedest_endtag = "";
			$DbColor = new DB;
			if (isset($User))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$User'");
				list($perms_user,$colorname) = $DbColor->next_record();
				$DbColor->clean_results();
			}
			if (isset($Dest))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$Dest'");
				list($perms_dest,$colornamedest) = $DbColor->next_record();
				$DbColor->clean_results();
			}
			if(isset($colorname) && $colorname != "")
			{
				$colorname_tag = "<FONT color=".$colorname.">";
				unset($colorname);
			}
			elseif(C_ITALICIZE_POWERS)
			{
				if (($perms_user == "admin" && $User != C_BOT_NAME) || $perms_user == "topmod") $colorname_tag = "<FONT color=".COLOR_CA.">";
				elseif ($perms_user == "moderator") $colorname_tag = "<FONT color=".COLOR_CM.">";
				else $colorname_tag = "<FONT color=".COLOR_CD.">";
			}
			else
			{
				$colorname_tag = "<FONT color=".COLOR_CD.">";
			}
			if(isset($colornamedest) && $colornamedest != "")
			{
				$colornamedest_tag = "<FONT color=".$colornamedest.">";
				unset($colornamedest);
			}
			elseif (C_ITALICIZE_POWERS)
			{
				if (($perms_dest == "admin" && $Dest != C_BOT_NAME) || $perms_dest == "topmod") $colornamedest_tag = "<FONT color=".COLOR_CA.">";
				elseif ($perms_dest == "moderator") $colornamedest_tag = "<FONT color=".COLOR_CM.">";
				else $colornamedest_tag = "<FONT color=".COLOR_CD.">";
			}
			else
			{
				$colornamedest_tag = "<FONT color=".COLOR_CD.">";
			}
			$colorname_endtag = "</FONT>";
			$colornamedest_endtag = "</FONT>";
		}
		else
		{
			$colorname_tag = "";
			$colornamedest_tag = "";
			$colorname_endtag = "";
			$colornamedest_endtag = "";
		}
		$NewMsg = "<tr align=texttop valign=top>";
		$Time = strftime(L_SHORT_DATETIME, $Time + C_TMZ_OFFSET*60*60);
		if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $Time = str_replace(" ","",$Time);
		$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\">".$Time."</td><td width=\"1%\" nowrap=\"nowrap\">".$Room."</td>";
		if ($Dest != " *" && $User != "SYS room" && $User != "SYS image" && $User != "SYS video" && $User != "SYS utube" && $User != "SYS math" && $User != "SYS topic" && $User != "SYS topic reset" && substr($User,0,8) != "SYS dice")
		{
			$User = $colorname_tag."[".special_char($User,$Latin1)."]".$colorname_endtag;
			if ($Dest != "") $Dest = ">".$colornamedest_tag."[".htmlspecialchars(stripslashes($Dest))."]".$colornamedest_endtag;
			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>${User}${Dest}</B></td><td>$Message</td>";
		}
		if ($User == "SYS image")
		{
			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>[${Dest}]</B></td><td>".L_PIC." ${Dest}: <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_FULLSIZE_PIC).".'; return true\" title=\"".sprintf(L_CLICK,L_FULLSIZE_PIC)."\" target=_blank>".$Message."</A></td>";
		}
		if ($User == "SYS video" || $User == "SYS utube")
		{
			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>[${Dest}]</B></td><td>".L_VIDEO." ${Dest}: <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title=\"".sprintf(L_CLICK,L_ORIG_VIDEO)."\" target=_blank>".$Message."</A></td>";
		}
		if ($User == "SYS announce")
		{
			if ($Message == 'L_RELOAD_CHAT') $Message = L_RELOAD_CHAT;
			$NewMsg .= "<td colspan=2><SPAN CLASS=\"notify2\">[".L_ANNOUNCE."] $Message</SPAN></td>";
		}
		if ($User == "SYS math")
		{
			$NewMsg .= "<td colspan=\"2\" valign=\"top\"><FONT class=\"notify\">".sprintf(L_MATH,L_EQUATION,$Dest)."</FONT><br />".$Message."</td>";
    	}
		if ($User == "SYS room")
		{
 			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>[${Dest}]</B></td><td><FONT class=\"notify2\"><I>".ROOM_SAYS."<FONT class=\"notify\">".$Message."</FONT></FONT></I></td>";
		}
		if ($User == "SYS topic")
		{
 			$NewMsg .= "<td colspan=2><FONT class=\"notify\">".$Dest." ".L_TOPIC." ".$Message."</FONT></td>";
		}
		if ($User == "SYS topic reset")
		{
 			$NewMsg .= "<td colspan=2><FONT class=\"notify\">".$Dest." ".L_TOPIC_RESET." ".$Message."</FONT></td>";
		}
		if (substr($User,0,8) == "SYS dice")
		{
//			eval("\$Message = \"$Message\";");
 			$NewMsg .= "<td colspan=2 valign=\"top\"><FONT class=\"notify\">".$Dest." ".DICE_RESULTS."</FONT> ".$Message."</td>";
		}

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != date("j", time() +  C_TMZ_OFFSET*60*60))
		{
			$day_separator = "<tr align=texttop valign=top><td valign=top colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></td>";
		};

			$MessagesString .= ((isset($day_separator) && $day_separator != "") ? "</tr>".$day_separator : "").$NewMsg."</tr>";
			if (isset($day_separator)) $day_separator = "";		// Today separator already printed
	};
}
else
{
	$MessagesString = "<tr align=texttop valign=top><td valign=top colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_NO_MSG."</SPAN></td></tr>";
};

$DbLink->clean_results();
$DbLink->close();
$CleanUsrTbl = 1;

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
<META HTTP-EQUIV="Refresh" CONTENT="10" CHARSET="<?php echo($Charset); ?>">
<TITLE><?php echo("Last ".$N." messages ".($Room != "" ? "in ".stripslashes($R)." room" : "")." - ".date('r')." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo("${ChatPath}".$skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<?php
#if(C_ALLOW_MATH) echo("<script type=\"text/javascript\" src=\"https://d3eoax9i5htok0.cloudfront.net/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>");
#if(C_ALLOW_MATH) echo("<script type=\"text/javascript\" src=\"http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>");
if(C_ALLOW_MATH && C_SRC_MATH != "") echo("<script type=\"text/javascript\" src=\"".C_SRC_MATH."\"></script>");
?>
</HEAD>
	<BODY>
<CENTER>
	<?php
	echo("<hr>");
	echo("<table BORDER=1 WIDTH=98% CELLSPACING=0 CELLPADDING=1 CLASS=table>");
	echo("<tr>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG5."</b></td>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG2."</b></td>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG1."</b></td>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG4."</b></td></tr>");
	echo($MessagesString."</table>");
	unset($MessagesString);
	?>
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2006-<?php echo(date('Y')); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
	</BODY>
</HTML>
<?php
?>