<?php
// Connections Panel (lurking&online) by Ciprian Murariu <ciprianmp@yahoo.com>.
// This sheet is diplayed when the admin wants to watch what is currently going on in the chat

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// HTML link to launch the chat (used by constants below)
$ShowPrivate = "1";     // 1 to display users even if they are in a private room, 0 else
$DisplayUsers = "1";    // 0 to display only the number of connected users
                        // 1 to display a list of users

// Sort order by Ciprian
if (!isset($sort_order)) $sort_order = isset($CookieUserSort) ? $CookieUserSort : C_USERS_SORT_ORD;
if ($sort_order == "1")	$ordquery = "u.username";
else $ordquery = "u.r_time";

// Restricted room mod by Ciprian
$res_init = utf8_substr(L_RESTRICTED, 0, 1);
$disp_note = 0;
$disp_note2 = 0;

function special_char($str,$lang)
{
	return ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
}

// Ghost Control mod by Ciprian
function ghosts_in($what, $in, $Charset)
{
	$ghosts = explode(",",$in);
	for (reset($ghosts); $ghost_name=current($ghosts); next($ghosts))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($ghost_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}

// User Status  by Ciprian
function user_status($name,$stat,$ghost,$superghost)
{
	$newname = $name;
	if ($stat == 'a') $newname .= ($name == C_BOT_NAME) ? "</td><td nowrap=\"nowrap\">".L_WHOIS_BOT."</td>" : "</td><td nowrap=\"nowrap\">".L_WHOIS_ADMIN."</td>";
	elseif ($stat == 't') $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_TOPMOD."</td>";
	elseif ($stat == 'm') $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_MODER."</td>";
	elseif ($stat == 'r') $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_REG."</td>";
	else $newname .= "</td><td nowrap=\"nowrap\">".L_WHOIS_GUEST."</td>";
	if ($superghost) $newname .= "<td nowrap=\"nowrap\">".L_SUPER_GHOST."</td>";
	elseif ($ghost) $newname .= "<td nowrap=\"nowrap\">".L_GHOST."</td>";
	else $newname .= "<td nowrap=\"nowrap\">".L_NO_GHOST."</td>";
	return $newname;
}

function display_connected($Private,$Full,$String1,$String2,$Charset,$gi)
{
	$List = "";
	global $ordquery, $DbLink, $DefaultDispChatRooms, $res_init, $disp_note, $L;
	if ($Private)
	{
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.ip, u.status, u.country_code, u.country_name FROM ".C_USR_TBL." u ORDER BY $ordquery";
	}
	else
	{
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.ip, u.status, u.country_code, u.country_name FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1 ORDER BY $ordquery";
	}

	$DbLink->query($query);
	$NbUsers = $DbLink->num_rows();

	// Ghost Control mod by Ciprian
	if($Full && $NbUsers >= 1)
	{
		$sghosts = "";
		$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
		$sghosts = str_replace(" AND username != ",",",$sghosts);
		if($NbUsers == 1) echo($String1."<br />");
		else echo($NbUsers." ".NB_USERS_IN."<br />");
		while(list($UserU,$Latin1U,$RoomU,$RTime,$IP,$StatusU,$COUNTRY_CODE,$COUNTRY_NAME) = $DbLink->next_record())
		{
			if (is_array($DefaultDispChatRooms) && in_array($RoomU." [R]",$DefaultDispChatRooms))
			{
				$RoomU .= " [".$res_init."]";
				$disp_note = 1;
			}
			if ($Latin1U) $UserU = htmlentities($UserU);
			$ghost = 0;
			$superghost = 0;
			if (($sghosts != "" && ghosts_in($UserU, $sghosts, $Charset)) || (C_HIDE_MODERS && $StatusU == "m") || (C_HIDE_ADMINS && ($StatusU == "a" || $StatusU == "t")))
			{
				if ($StatusU == "a" || $StatusU == "t") $superghost = 1;
				else $ghost = 1;
			}
			$user_not = $UserU;
			$UserU = user_status($UserU,$StatusU,$ghost,$superghost);
			$RTime = strftime(L_SHORT_DATETIME, $RTime + C_TMZ_OFFSET*60*60);
			if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $RTime = str_replace(" ","",$RTime);
			// GeoIP mode for country flags
			if(C_USE_FLAGS)
			{
				if((!isset($COUNTRY_CODE) || $COUNTRY_CODE == "") && $user_not != C_BOT_NAME && $user_not != C_QUOTE_NAME)
				{
					$COUNTRY_CODE = geoip_country_code_by_addr($gi, ltrim($IP,"p"));
					if (empty($COUNTRY_CODE))
					{
						$COUNTRY_CODE = "LAN";
						$COUNTRY_NAME = "Other/LAN";
					}
					if ($COUNTRY_CODE != "LAN") $COUNTRY_NAME = $gi->GEOIP_COUNTRY_NAMES[$gi->GEOIP_COUNTRY_CODE_TO_NUMBER[$COUNTRY_CODE]];
					if ($PROXY || substr($IP, 0, 1) == "p") $COUNTRY_NAME .= " (Proxy Server)";
				}
				$c_flag = "&nbsp;<img src=\"./plugins/countryflags/flags/".strtolower($COUNTRY_CODE).".gif\" alt=\"".$COUNTRY_NAME."\" title=\"".$COUNTRY_NAME."\" border=\"0\">&nbsp;(".$COUNTRY_CODE.")";
			}
			$List .= "<tr><td>".$UserU."</td><td>".$RoomU."</td><td>".L_LURKING_4." ".$RTime.($user_not != C_BOT_NAME && $user_not != C_QUOTE_NAME ? "</td><td>".$IP.(isset($c_flag) ? $c_flag : "") : "");
			// GeoIP Country flags initialization
			unset($IP);
			unset($COUNTRY_CODE);
			unset($COUNTRY_NAME);
			unset($c_flag);
		};
		echo($List);
		unset($List);
	}
	elseif(!$Full)
	{
		echo($NbUsers." ".$String1);
	}
	else
	{
		echo($String2);
	}
	$DbLink->clean_results();
}

// ** Get messages **

// Define the SQL query (depends on values for ignored users list and on whether to display
// notification messages or not

$CondForQuery = "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username = 'SYS video' OR username = 'SYS utube' OR username = 'SYS math' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";

$DbLink->query("SELECT type, room, username, latin1, m_time, address, message, room_from FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC");

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$NBMessages = 1;
	$MessagesString = "";
	while(list($Type, $Room, $User, $Latin1, $Time, $Dest, $Message, $RoomFrom) = $DbLink->next_record())
	{
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
		if ($Type) $Type = L_SET_10; else $Type = L_SET_11;
		if ($Room == '*' || ($User == "SYS room" && $Dest == '*') || $User == "SYS announce") $Room = L_ROOM_ALL;
		else
		{
			if (is_array($DefaultDispChatRooms) && in_array($Room." [R]",$DefaultDispChatRooms))
			{
				$Room .= " [".$res_init."]";
				$disp_note2 = 1;
			}
			$Room .= " (".$Type.")";
		}
		if (is_array($DefaultDispChatRooms) && in_array($RoomFrom." [R]",$DefaultDispChatRooms))
		{
			$RoomFrom .= " [".$res_init."]";
			$disp_note2 = 1;
		}
		if ($RoomFrom != "" && $RoomFrom != $Room && $RoomFrom != $Room." [R]") $Room = $RoomFrom."><br />>".$Room;
# 		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
		if (C_POPUP_LINKS || stripos($Message,'target="_blank"></a>') !== false)
		{
			$Message = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$Message);
		}
		else $Message = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$Message);

		$Message = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$Message);
		// Color names in chat
		$colorname_tag = "";
		$colornamedest_tag = "";
		$colorname_endtag = "";
		$colornamedest_endtag = "";
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
			if (isset($Dest))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$Dest'");
				list($perms_dest,$colornamedest) = $DbColor->next_record();
				$DbColor->clean_results();
				if(COLOR_NAMES && (isset($colornamedest) && $colornamedest != "" && strcasecmp($colornamedest, $COLOR_TB) != 0))
				{
					$colornamedest_tag = "<FONT color=".$colornamedest.">";
					unset($colornamedest);
				}
				elseif (C_ITALICIZE_POWERS)
				{
					if ($perms_dest == "admin" || ($perms_dest == "topmod" && $Dest != C_BOT_NAME && $Dest != C_QUOTE_NAME)) 
					{
						$colornamedest_tag = "<FONT color=".COLOR_CA.">";
					}
					elseif ($perms_dest == "moderator")
					{
						$colornamedest_tag = "<FONT color=".COLOR_CM.">";
					}
				}
			}
		}
		if($colorname_tag != "") $colorname_endtag = "</FONT>";
		if($colornamedest_tag != "") $colornamedest_endtag = "</FONT>";
		$NewMsg = "<tr align=texttop valign=top>";
		$TimeSent = $Time;
		$Time = strftime(L_SHORT_DATETIME, $Time + C_TMZ_OFFSET*60*60);
		if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $Time = str_replace(" ","",$Time);
		$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\">".$Time."</td><td width=\"1%\" nowrap=\"nowrap\">".$Room."</td>";
		if ($Dest != " *" && $User != "SYS room" && $User != "SYS image" && $User != "SYS video" && $User != "SYS utube" && $User != "SYS math" && $User != "SYS topic" && $User != "SYS topic reset" && substr($User,0,8) != "SYS dice")
		{
			$User = $colorname_tag."[".special_char($User,$Latin1)."]".$colorname_endtag;
			if ($Dest != "") $Dest = ">".$colornamedest_tag."[".htmlspecialchars(stripslashes($Dest))."]".$colornamedest_endtag;
			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>${User}${Dest}</B></td><td>".$Message."</td>";
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
				$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><FONT class=\"notify\"><img src=\"".$eicon."\" border=0 width='16' alt='&copy; ".$ealt."' title='&copy; ".$ealt."'>&nbsp;".L_VIDEO." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title=\"".sprintf(L_CLICK,L_ORIG_VIDEO)."\" target=_blank>".$Message."</A></td>";
			}
		}
		if ($User == "SYS utube")
		{
			$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><FONT class=\"notify\"><img src=\"images/icons/youtube.png\" border=0 alt='YouTube' title='YouTube'>&nbsp;".L_VIDEO." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_ORIG_VIDEO).".'; return true\" title=\"".sprintf(L_CLICK,L_ORIG_VIDEO)."\" target=_blank>".$Message."</A></td>";
		}
		if ($User == "SYS announce")
		{
			if ($Message == 'L_RELOAD_CHAT') $Message = L_RELOAD_CHAT;
			$NewMsg .= "<td colspan=2><SPAN CLASS=\"notify2\">[".L_ANNOUNCE."] ".$Message."</SPAN></td>";
		}
		if ($User == "SYS room")
		{
			$NewMsg .= "<td colspan=2><SPAN class=\"notify2\"><I>".ROOM_SAYS."</SPAN><SPAN class=\"notify\"> ".$Message."</SPAN></I></td>";
		}
		elseif ($User == "SYS math")
		{
			$NewMsg .= "<td colspan=\"2\" valign=\"top\"><FONT class=\"notify\">".sprintf(L_MATH,L_EQUATION,$Dest)."</FONT><br />".$Message."</td>";
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
 			$NewMsg .= "<td colspan=2 valign=\"top\"><FONT class=\"notify\">".$Dest." ".DICE_RESULTS."</FONT> ".$Message."</td>";
		}

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $TimeSent + C_TMZ_OFFSET*60*60) != date("j", time() + C_TMZ_OFFSET*60*60))
		{
			$day_separator = "<tr align=texttop valign=top><td colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">--------- ".L_TODAY_UP." ---------</SPAN></td>";
		};

			$MessagesString .= ((isset($day_separator) && $day_separator != "") ? "</tr>".$day_separator : "").$NewMsg."</tr>";
			if (isset($day_separator)) $day_separator = "";		// Today separator already printed
	};
}
else
{
	$NBMessages = 0;
	$MessagesString = "<tr align=texttop valign=top><td colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_NO_MSG."</SPAN></td></tr>";
};


$DbLink->clean_results();
$CleanUsrTbl = 1;

?>
<P CLASS=title><?php echo(APP_NAME."  ".A_LURKING_1) ; ?></P>
</CENTER>
<?php
if (!C_CHAT_LURKING)
{
?>
<P CLASS=title><?php echo (A_LURKING_2) ; ?></P>
</CENTER>
<?php
}
?>
<META HTTP-EQUIV="Refresh" CONTENT="30">
<hr />
<TABLE BORDER=1 CELLSPACING=2 CELLPADDING=1 CLASS="table">
<TR>
	<TD ALIGN=CENTER colspan=6>
		<?php

			// GeoIP mode for country flags
			if(!isset($COUNTRY_CODE) || $COUNTRY_CODE == "")
			{
				if (!class_exists("GeoIP")) include("plugins/countryflags/geoip.inc");
				if(!isset($gi)) $gi = geoip_open("plugins/countryflags/GeoIP.dat",GEOIP_STANDARD);
			}

			display_connected($ShowPrivate,$DisplayUsers,($DisplayUsers ? USERS_LOGIN : NB_USERS_IN),NO_USER,$Charset,$gi);

			// GeoIP mode for country flags
			if(isset($gi) && $gi != "") geoip_close($gi);
			if(isset($gi6) && $gi6 != "") geoip_close($gi6);
		?>
	</TD>
</TR>
</TABLE>
<?php
if($disp_note) echo("<table WIDTH=100%><tr valign=top><td colspan=4 align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED.".</td></tr></table>");
if (C_CHAT_LURKING)
{
//Declaration of Parameters
require("./lib/get_IP.lib.php");		// Set the $IP var
$browser = getenv('HTTP_USER_AGENT');

//Timeout to delete Users in Seconds
$timeout = 15;

$DbLink->query("DELETE FROM ".C_LRK_TBL." WHERE time<'".(time() - $timeout)."'");
$DbLink->query("SELECT DISTINCT ip,browser,username,status,country_code,country_name FROM ".C_LRK_TBL." ORDER BY country_code OR ip ASC");
$online_users = $DbLink->num_rows();
?>
<hr /><table border=1 cellspacing=1 cellpadding=1 class="table"><tr>
	<td><?php echo(L_CUR_5)?></td>
	<td align="center" style="vertical-align:middle">
	<font size="4" color="#6666ff"><b>&nbsp <?php echo($online_users); ?> &nbsp</font></b></td>
	</tr></table>
<?php
if ($online_users)
{
?>
<table border=1 width=98% cellspacing=0 cellpadding=1 class="table">
<?php
$sghosts = "";
$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
$sghosts = str_replace(" AND username != ",",",$sghosts);
while(list($ipu, $browseru, $usernameu, $statusu, $country_codeu, $country_nameu) = $DbLink->next_record())
{
	if ($usernameu == "Guest") $usernameuo = L_LURKING_5;
	$ghostu = 0;
	$superghostu = 0;
	if (($sghosts != "" && ghosts_in($usernameu, $sghosts, $Charset)) || (C_HIDE_MODERS && $statusu == "m") || (C_HIDE_ADMINS && ($statusu == "a" || $statusu == "t")))
	{
		if ($statusu == "a" || $statusu == "t") $superghostu = 1;
		else $ghostu = 1;
	}
	$User = user_status($usernameu,$statusu,$ghostu,$superghostu);
	// GeoIP mode for country flags
	if(C_USE_FLAGS)
	{
		if(!isset($country_codeu) || $country_codeu == "")
		{
			$country_codeu = geoip_country_code_by_addr($gi, ltrim($ipu,"p"));
			if (empty($country_codeu))
			{
				$country_codeu = "LAN";
				$country_nameu = "Other/LAN";
			}
			if ($country_codeu != "LAN") $country_nameu = $gi->GEOIP_COUNTRY_NAMES[$gi->GEOIP_COUNTRY_CODE_TO_NUMBER[$country_codeu]];
			if ($PROXY || substr($ipu, 0, 1) == "p") $country_nameu .= " (Proxy Server)";
		}
		$c_flagu = "&nbsp;<img src=\"./plugins/countryflags/flags/".strtolower($country_codeu).".gif\" alt=\"".$country_nameu."\" title=\"".$country_nameu."\" border=0>&nbsp;(".$country_codeu.")";
	}
	echo("<tr><td>".$User."");
	echo("<td nowrap=\"nowrap\">".$ipu.(isset($c_flagu) ? $c_flagu : "")."</td>");
	echo("<td width=\"100%\">".$browseru."</td></tr>");
	// GeoIP Country flags initialization
	unset($User);
	unset($ipu);
	unset($country_codeu);
	unset($country_nameu);
	unset($c_flagu);
};
?>
</table>
<?php
}
}
	echo("<hr />");
	echo("<table BORDER=1 WIDTH=100% CELLSPACING=0 CELLPADDING=1 CLASS=table>");
	if ($NBMessages)
	{
		echo("<tr>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".A_POST_TIME."</b></td>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".A_CHTEX_ROOM."</b></td>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".A_FROM_TO."</b></td>
		<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\"><b>".A_CHTEX_MSG."</b></td></tr>");
	}
	echo($MessagesString."</table>");
	unset($MessagesString);
	if($disp_note2) echo("<table WIDTH=100%><tr valign=top><td colspan=4 align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED.".</td></tr></table>");
?>
<br /><P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2006-<?php echo(date('Y')); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>