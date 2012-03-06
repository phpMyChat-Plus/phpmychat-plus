<?php

//Connected users table settings
$ShowPrivate = "0";     // 1 to display users even if they are in a private room, 0 else
$DisplayUsers = "1";    // 0 to display only the number of connected users
                        // 1 to display a list of users
//Messages table settings
$N = 50;									//Set the last number of messages to be displayed
$Type = " AND type='1'";	//This is to display only the public rooms (excluding the restricted ones)
//$Type = "";							//This is to display either public (including the restricted ones) or private rooms

if (isset($_COOKIE["CookieUsername"])) $U = urldecode($_COOKIE["CookieUsername"]);
if (isset($_COOKIE["CookieStatus"])) $status = $_COOKIE["CookieStatus"];
if (!isset($U)) $U = "Guest";

// Fix some security holes
if (!isset($ChatPath)) $ChatPath = "";
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}lib/release.lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");

// User Status  by Ciprian
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

// Restricted room mod by Ciprian
$res_init = utf8_substr(L_RESTRICTED, 0, 1);
$disp_note = 0;
$disp_note2 = 0;

require("lib/connected_users.lib.php");

if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $status == "a" || $status == "t" || $status == "m"))
{
// Special cache instructions for IE5+
header("Cache-Control: public");
header("Content-Type: text/html; charset=${Charset}");

// Avoid server configuration for magic quotes
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
$CondForQuery	= "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (address = '' AND username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username = 'SYS video' OR username = 'SYS utube' OR username = 'SYS math' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";

$DbLink1 = new DB;
$DbLink1->query("SELECT m_time, room, username, latin1, address, message FROM ".C_MSG_TBL." WHERE ".$CondForQuery.$Type." ORDER BY m_time DESC LIMIT $N");

// Format and display new messages
if($DbLink1->num_rows() > 0)
{
	$NBMessages = 1;
	$MessagesString = "";
	while(list($Time, $Room, $User, $Latin1, $Dest, $Message) = $DbLink1->next_record())
	{
		// Restricted rooms mod by Ciprian
		if (is_array($DefaultDispChatRooms) && in_array($Room." [R]",$DefaultDispChatRooms) && $Type != "")
		{
			if ($User == "SYS announce") {}
			elseif ($User == "SYS room" && $Dest == "*") {}
			else
			{
				if ($MessagesString == "")
				{
					$NBMessages = 0;
					$MessagesString = "<tr align=texttop valign=top><td valign=top colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_NO_MSG."</SPAN></td></tr>";
				}
				continue;
			}
		};
//			preg_match('@^http://example.com/pages/([^/]+)', $s, $matches); 
		$Message = stripslashes($Message);
		$Message = str_ireplace("L_DEL_BYE",L_DEL_BYE,$Message);
		$Message = str_ireplace("L_REG_BRB",L_REG_BRB,$Message);
		$Message = str_ireplace("L_HELP_MR",sprintf(L_HELP_MR,$User),$Message);
		$Message = str_ireplace("L_HELP_MS",sprintf(L_HELP_MS,$User),$Message);
		$Message = str_ireplace("L_PRIV_PM",L_PRIV_PM,$Message);
		$Message = str_ireplace("L_PRIV_WISP",L_PRIV_WISP,$Message);
		$Message = str_ireplace(" COLOR=\"".$COLOR_TB."\"", " COLOR=\"".COLOR_CD."\"",$Message);
		$Message = str_ireplace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
		if ($Align == "right") $Message = str_replace("arrowr","arrowl",$Message);
		if ($Room == '*' || ($User == "SYS room" && $Dest == '*') || $User == "SYS announce") $Room = L_ROOM_ALL;
		else
		{
			if (is_array($DefaultDispChatRooms) && in_array($Room." [R]",$DefaultDispChatRooms))
			{
				$Room .= " [".$res_init."]";
				$disp_note2 = 1;
			}
		}
#		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
		if (C_POPUP_LINKS || stripos($Message,'target="_blank"></a>') !== false)
		{
			$Message = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$Message);
		}
		else $Message = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$Message);

		$Message = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$Message);
		// Color names in chat
		$colorname_tag = "";
		$colorname_endtag = "";
		if(COLOR_NAMES || C_ITALICIZE_POWERS)
		{
			$DbColor = new DB;
			if (isset($User))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$User'");
				list($perms_user,$colorname) = $DbColor->next_record();
				$DbColor->clean_results();
				if(COLOR_NAMES && (isset($colorname) && $colorname != "" && strcasecmp($colorname, $COLOR_TB) != 0))
				{
					$colorname_tag = "<FONT color=".$colorname.">";
					unset($colorname);
				}
				elseif(C_ITALICIZE_POWERS)
				{
					if ($perms_user == "admin" || ($perms_user == "topmod" && $User != C_BOT_NAME && $User != C_QUOTE_NAME))
					{
						$colorname_tag = "<FONT color=".COLOR_CA.">";
					}
					
					elseif ($perms_user == "moderator")
					{
						$colorname_tag = "<FONT color=".COLOR_CM.">";
					}
				}
			}
		}
		if($colorname_tag != "") $colorname_endtag = "</FONT>";
		$NewMsg = "<tr valign=top>";
		$Time = $Time + C_TMZ_OFFSET*60*60;
		$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\">".strftime(L_SHORT_DATETIME, $Time)."</td><td width=\"1%\" nowrap=\"nowrap\">".$Room."</td>";
		if ($Dest != " *" && $User != "SYS room" && $User != "SYS image" && $User != "SYS video" && $User != "SYS utube" && $User != "SYS math" && $User != "SYS topic" && $User != "SYS topic reset" && substr($User,0,8) != "SYS dice")
		{
			$User = $colorname_tag."[".special_char($User,$Latin1)."]".$colorname_endtag;
			if ($Dest != "") $Dest = ">".$colornamedest_tag."[".htmlspecialchars(stripslashes($Dest))."]".$colornamedest_endtag;
			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>${User}${Dest}</B></td><td>$Message</td>";
		}
		if ($User == "SYS image")
		{
      $NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><FONT class=\"notify\">".L_PIC." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_FULLSIZE_PIC).".'; return true\" title=\"".sprintf(L_CLICK,L_FULLSIZE_PIC)."\" target=_blank>".$Message."</A></td>";
		}
		if ($User == "SYS video")
		{
			//require EmbeVi Class
			include_once('plugins/video/embevi.class.php');
			//instantiate EmbeVi class
			$embevi = new EmbeVi();
			$embevi->setAcceptShortUrl();
			$embevi->setProviderIconLocal();
			$embevi->setProviderIconUrl('images/icons/');
			$embevi->setAcceptExtendedSupport();
			if($embevi->parseUrl($Message))
			{
#				$eicon = $embevi->getProviderIcon();
				$ealt = $embevi->getEmbeddedInfo();
				$eicon = $embevi->getProviderImageIdentifier();
				$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><FONT class=\"notify\"><img src=\"".$eicon."\" width='16' border=0 alt='&copy; ".$ealt."' title='&copy; ".$ealt."'>&nbsp;".L_VIDEO." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title=\"".sprintf(L_CLICK,L_ORIG_VIDEO)."\" target=_blank>".$Message."</A></td>";
			}
		}
		if ($User == "SYS utube")
		{
      $NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><FONT class=\"notify\"><img src=\"images/icons/youtube.png\" border=0 alt='YouTube' title='YouTube'>&nbsp;".L_VIDEO." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title=\"".sprintf(L_CLICK,L_ORIG_VIDEO)."\" target=_blank>".$Message."</A></td>";
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
 			$NewMsg .= "<td colspan=2><SPAN class=\"notify2\"><I>".ROOM_SAYS."&nbsp;</SPAN><SPAN class=\"notify\">".$Message."</SPAN></I></td>";
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
 			$NewMsg .= "<td colspan=2 valign=\"top\"><FONT class=\"notify\">".$Dest." ".DICE_RESULTS."</FONT><br />".$Message."</td>";
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
	$NBMessages = 0;
	$MessagesString = "<tr align=texttop valign=top><td valign=top colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_NO_MSG."</SPAN></td></tr>";
};

$DbLink1->clean_results();
$DbLink1->close();
$CleanUsrTbl = 1;

if (isset($MessagesString) && $MessagesString != "")
{
// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
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
<META HTTP-EQUIV="Refresh" CONTENT="<?php echo($D); ?>" CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(($U == "Guest" ? L_WHOIS_GUEST : stripslashes($U))." ".L_LURKING_3." - ".date("r")." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<?php
#if(C_ALLOW_MATH) echo("<script type=\"text/javascript\" src=\"https://d3eoax9i5htok0.cloudfront.net/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>");
if(C_ALLOW_MATH) echo("<script type=\"text/javascript\" src=\"http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML\"></script>");
?>
</HEAD>
<BODY>
<TABLE BORDER=1 CELLSPACING=2 CELLPADDING=1 CLASS="table">
<TR>
	<TD ALIGN=CENTER colspan=4>
		<?php
		display_connected($ShowPrivate,$DisplayUsers,$NbUsers,($NbUsers != 1 ? $NbUsers." ".NB_USERS_IN : USERS_LOGIN),NO_USER,$DbLink,$Charset);
		?>
	</TD>
</TR>
</TABLE>
<?php
	if($disp_note) echo("<table WIDTH=100%><tr valign=top><td colspan=4 align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED.".</td></tr></table>");
	include("lib/useronline.lib.php");
	echo("<hr />");
	echo("<table BORDER=1 WIDTH=100% CELLSPACING=0 CELLPADDING=1 CLASS=table>");
	if ($NBMessages)
	{
		echo("<tr>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".L_PRIV_MSG5."</b></td>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".L_PRIV_MSG2."</b></td>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".L_PRIV_MSG1."</b></td>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".L_PRIV_MSG4."</b></td></tr>");
	}
	echo($MessagesString."</table>");
	unset($MessagesString);
	if($disp_note2) echo("<table WIDTH=100%><tr valign=top><td colspan=4 align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED.".</td></tr></table>");
	?>
<br /><P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2006-<?php echo(date('Y')); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
	</BODY>
	</HTML>
	<?php
	exit;
}
}
else
{
?>
<html>
<head>
<title>Invalid address - Lurking feature disabled</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</head>

<body class="frame">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center><font size="+2"><b>You don't have access to this file.<br />Lurking feature has been disabled<br />Press <a href=./>here</a> to go to the index page or just wait...</b><font>
<br /><br /><br /><br />Hacking attempt! Redirection to the index page in 5 seconds.</center>
<meta http-equiv="refresh" content="5; url=./">
</body>
</html>
<?php
}
?>