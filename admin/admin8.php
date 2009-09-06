<?php
// Connections Panel (lurking&online) by Ciprian Murariu <ciprianmp@yahoo.com>.
// This sheet is diplayed when the admin wants to watch what is currently going on in the chat

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// HTML link to launch the chat (used by constants below)
$ShowPrivate = "1";     // 1 to display users even if they are in a private room,
						// 0 else

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

function display_connected($Private,$Full,$String1,$String2,$Charset)
{
	$List = "";
	global $ordquery, $DefaultDispChatRooms, $res_init, $disp_note;
	if ($Private)
	{
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.ip, u.status FROM ".C_USR_TBL." u ORDER BY $ordquery";
	}
	else
	{
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.ip, u.status FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1 ORDER BY $ordquery";
	}

	$DbLink = new DB;
	$DbLink->query($query);
	$NbUsers = $DbLink->num_rows();

	// Ghost Control mod by Ciprian
	if ($NbUsers == 1)
	{
		if ($Full)
		{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
			echo($String1."<br />");
			while(list($UserU,$Latin1U,$RoomU,$RTime,$IP,$Status) = $DbLink->next_record())
			{
				if (is_array($DefaultDispChatRooms) && in_array($RoomU." [R]",$DefaultDispChatRooms))
				{
					$RoomU .= " [".$res_init."]";
					$disp_note = 1;
				}
				if ($Latin1) $UserU = htmlentities($UserU);
				$ghost = 0;
				$superghost = 0;
				if (($sghosts != "" && ghosts_in($UserU, $sghosts, $Charset)) || (C_HIDE_MODERS && $Status == "m") || (C_HIDE_ADMINS && ($Status == "a" || $Status == "t")))
				{
					if ($Status == "a" || $Status == "t") $superghost = 1;
					else $ghost = 1;
				}
				$UserU = user_status($UserU,$Status,$ghost,$superghost);
				$RTime = date("d-M, H:i:s", $RTime + C_TMZ_OFFSET*60*60);
				$List .= "<tr><td>".$UserU."</td><td>".$RoomU."</td><td>".L_LURKING_4." ".$RTime."</td><td>".$IP."";
			}
			echo($List);
		}
		else
		{
			echo($NbUsers." ".$String1);
		}
	}
	elseif ($NbUsers > 1)
	{
		if ($Full)
		{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
			echo($NbUsers." ".NB_USERS_IN."<br />");
			while(list($UserU,$Latin1U,$RoomU,$RTime,$IP,$Status) = $DbLink->next_record())
			{
				if (is_array($DefaultDispChatRooms) && in_array($RoomU." [R]",$DefaultDispChatRooms))
				{
					$RoomU .= " [".$res_init."]";
					$disp_note = 1;
				}
				if ($Latin1U) $UserU = htmlentities($UserU);
				$ghost = 0;
				$superghost = 0;
				if (($sghosts != "" && ghosts_in($UserU, $sghosts, $Charset)) || (C_HIDE_MODERS && $Status == "m") || (C_HIDE_ADMINS && ($Status == "a" || $Status == "t")))
				{
					if ($Status == "a" || $Status == "t") $superghost = 1;
					else $ghost = 1;
				}
				$UserU = user_status($UserU,$Status,$ghost,$superghost);
				$RTime = date("d-M, H:i:s", $RTime + C_TMZ_OFFSET*60*60);
				$List .= "<tr><td>".$UserU."</td><td>".$RoomU."</td><td>".L_LURKING_4." ".$RTime."</td><td>".$IP."";
			}
			echo($List);
		}
		else
		{
			echo($NbUsers." ".$String1);
		}
	unset($List);
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

$CondForQuery	= "(address = ' *' OR (room = '*' AND username NOT LIKE 'SYS %') OR (username NOT LIKE 'SYS %' AND username != '".C_QUOTE_NAME."') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";

$DbLink->query("SELECT type, room, username, latin1, m_time, address, message, room_from FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC");

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$NBMessages = 1;
	$MessagesString = "";
	while(list($Type, $Room, $User, $Latin1, $Time, $Dest, $Message, $RoomFrom) = $DbLink->next_record())
	{
		$Message = stripslashes($Message);
		$Message = str_replace("L_DEL_BYE",L_DEL_BYE,$Message);
		$Message = str_replace("L_REG_BRB",L_REG_BRB,$Message);
		$Message = str_replace("L_HELP_MR",L_HELP_MR,$Message);
		$Message = str_replace("L_HELP_MS",L_HELP_MS,$Message);
		$Message = str_replace("L_PRIV_PM",L_PRIV_PM,$Message);
		$Message = str_replace("L_PRIV_WISP",L_PRIV_WISP,$Message);
		$Message = str_replace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
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
		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
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
		$NewMsg .= "<td width=1% nowrap=\"nowrap\">".date("d-M, H:i:s", $Time + C_TMZ_OFFSET*60*60)."</td><td width=1% nowrap=\"nowrap\">&nbsp;".$Room."</td>";
		if ($Dest != " *" && $User != "SYS room" && $User != "SYS image" && $User != "SYS topic" && $User != "SYS topic reset" && substr($User,0,8) != "SYS dice")
		{
			$User = $colorname_tag."[".special_char($User,$Latin1)."]".$colorname_endtag;
			if ($Dest != "") $Dest = ">".$colornamedest_tag."[".htmlspecialchars(stripslashes($Dest))."]".$colornamedest_endtag;
			$NewMsg .= "<td width=1% nowrap=\"nowrap\"><B>${User}${Dest}</B></td><td>$Message</td>";
		}
		if ($User == "SYS image")
		{
      $NewMsg .= "<td width=1% nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><FONT class=\"notify\">".L_PIC." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_FULLSIZE_PIC).".'; return true\" title=\"".sprintf(L_CLICK,L_FULLSIZE_PIC)."\" target=_blank>".$Message."</A></td>";
		}
		if ($User == "SYS announce")
		{
			if ($Message == 'L_RELOAD_CHAT') $Message = L_RELOAD_CHAT;
			$NewMsg .= "<td colspan=2><SPAN CLASS=\"notify2\">[".L_ANNOUNCE."] $Message</SPAN></td>";
		}
		if ($User == "SYS room")
		{
 			$NewMsg .= "<td  width=1% nowrap=\"nowrap\"><B>".$colornamedest_tag."[${Dest}]".$colornamedest_endtag."</B></td><td><SPAN class=\"notify2\"><I>".ROOM_SAYS."</SPAN><SPAN class=\"notify\">".$Message."</SPAN></I></td>";
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
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != date("j", time() +  C_TMZ_OFFSET*60*60))
		{
			$day_separator = "<tr align=texttop valign=top><td colspan=4 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></td>";
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
		display_connected($ShowPrivate,$DisplayUsers,($DisplayUsers ? USERS_LOGIN : NB_USERS_IN),NO_USER,$Charset);
		?>
	</TD>
</TR>
</TABLE>
<?php
if($disp_note) echo("<table WIDTH=100%><tr valign=top><td colspan=4 align=left CLASS=small>[".$res_init."] = ".L_RESTRICTED.".</td></tr></table>");
if (C_CHAT_LURKING)
{
//Declaration of Parameters
$time = time();
$ip = getenv('REMOTE_ADDR');
$browser = getenv('HTTP_USER_AGENT');

//Timeout to delete Users in Seconds
$closetime = $time-15;

//Database-Connect
$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
@mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
@mysql_select_db(C_DB_NAME,$handler);

//Database-Commands
$delete = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
$result = @mysql_query("SELECT DISTINCT ip,browser,username,status FROM ".C_LRK_TBL." ORDER BY ip ASC",$handler);
$online_users = @mysql_numrows($result);
//@mysql_close($handler);
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
while($data = @mysql_fetch_array($result))
{
	if ($data[username] == "Guest") $data[username] = L_LURKING_5;
	$ghost = 0;
	$superghost = 0;
	if (($sghosts != "" && ghosts_in($data[username], $sghosts, $Charset)) || (C_HIDE_MODERS && $Status == "m") || (C_HIDE_ADMINS && ($Status == "a" || $Status == "t")))
	{
		if ($Status == "a" || $Status == "t") $superghost = 1;
		else $ghost = 1;
	}
	$User = user_status($data[username],$data[status],$ghost,$superghost);
	echo("<tr><td>".$User."");
	echo("<td>".$data[ip]."</td>");
	echo("<td>".$data[browser]."</td></tr>");
}
?>
</table>
<?php
}
}
	echo("<center><hr />");
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