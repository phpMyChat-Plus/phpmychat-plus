<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for vars posted from the form below
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix some security holes
if (!isset($ChatPath)) $ChatPath = "";
if (!is_dir('./'.substr(${ChatPath}, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/login.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=${Charset}");

// Avoid server configuration for magic quotes
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

if (C_ENABLE_PM)
{
$NewPMs = 0;
$TotalPMs = 0;
$pstr = "pm_manager.php?L=".$L."&pmc_username=".$pmc_username."&pmc_password=".$PWD_Hash;
$sortOrder = $_GET['sortOrder'];
if (!isset($sortOrder)) $sortOrder = "ASC";
if($mord == "F")
{
    $sqlT = " ORDER BY username $sortOrder, m_time DESC;";
	$arrowf = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."'>";
}
else if($mord == "R")
{
    $sqlT = " ORDER BY room_from $sortOrder, m_time DESC;";
	$arrowr = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."'>";
}
else if($mord == "S")
{
    $sqlT = " ORDER BY pm_read ".($sortOrder == "DESC" ? "ASC" : "DESC").", m_time DESC;";
	$arrows = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."'>";
}
else
{
    $sqlT = " ORDER BY m_time $sortOrder;";
	$arrowt = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".($L == "turkish" ? L_ASC_T : L_ASC)."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".($L == "turkish" ? L_DESC_T : L_DESC)."'>";
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
$CondForQuery	= "address = '$pmc_username' AND pm_read != ''";
$DbLink->query("SELECT type, room, username, latin1, m_time, address, message, pm_read, room_from FROM ".C_MSG_TBL." WHERE ".$CondForQuery."".$sqlT."");

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$MessagesString = "";
	while(list($Type, $Room, $User, $Latin1, $Time, $Dest, $Message, $Read, $RF) = $DbLink->next_record())
	{
		$TotalPMs++;
		$new = 0;
		if (eregi("New",$Read)) { $NewPMs++; $read_stat = L_PRIV_MSGS_NEW; $new = 1; }
		else $read_stat = L_PRIV_MSGS_READ;
		$Message = stripslashes($Message);
		if ($Type) $Type = L_SET_10; else $Type = L_SET_11;
		$RF = ($RF != "" ? $RF : $Room)." (".$Type.")";
		$Message = stripslashes($Message);
		$Message = str_replace("L_PRIV_PM",L_PRIV_PM,$Message);
		$Message = str_replace("L_PRIV_WISP",L_PRIV_WISP,$Message);
		$Message = str_replace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
		if ($Align == "right") $Message = str_replace("arrowr","arrowl",$Message);
		if ($Room == '*' || ($User == "SYS room" && $Dest == '*') || $User == "SYS announce") $Room = L_ROOM_ALL;
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
			$DbColor = new DB;
			if (isset($User))
			{
				$DbColor->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$User'");
				list($perms_user,$colorname) = $DbColor->next_record();
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
			$colorname_endtag = "</FONT>";
		}
		else
		{
			$colorname_tag = "";
			$colorname_endtag = "";
		}
		$User = $colorname_tag.special_char($User,$Latin1).$colorname_endtag;
		$NewMsg = "<tr align=texttop valign=top>";
		if (C_ALLOW_PM_DEL && $TotalPMs) $NewMsg .= "\n<INPUT TYPE=\"hidden\" NAME=\"msg_$Time\" VALUE=\"1\">\n<TD VALIGN=CENTER ALIGN=CENTER>\n<INPUT type=checkbox name=\"selected_$Time\" value=\"1\">\n</td>\n";
	    $NewMsg .= "<td width=1% nowrap=\"nowrap\">".($new ? "<b><span class=error>".$read_stat."</span></b>" : "<span style=\"color:green\">".$read_stat."</span>")."</td>";
		$NewMsg .= "<td width=1% nowrap=\"nowrap\">".date("d-M, H:i:s", $Time + C_TMZ_OFFSET*60*60)."</td>";
		$NewMsg .= "<td width=1% nowrap=\"nowrap\"><B>${User}</B></td>";
		$NewMsg .= "<td width=1% nowrap=\"nowrap\">".$RF."</td>";
		$NewMsg .= "<td>$Message</td>";

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != date("j", time() +  C_TMZ_OFFSET*60*60))
		{
		if (C_ALLOW_PM_DEL && $TotalPMs)
		{
			$day_separator = "<tr align=texttop valign=top><td valign=top colspan=6 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></td>";
		}
		else
		{
			$day_separator = "<tr align=texttop valign=top><td valign=top colspan=5 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></td>";
		}
		};

			$MessagesString .= ((isset($day_separator) && $day_separator != "") ? "</tr>".$day_separator : "").$NewMsg."</tr>";
			if (isset($day_separator)) $day_separator = "";		// Today separator already printed
	};
}
else
{
	if (C_ALLOW_PM_DEL && $TotalPMs)
	{
		$MessagesString = "<tr align=texttop valign=top><td valign=top colspan=6 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_PRIV_NO_MSGS."</SPAN></td></tr>";
	}
	else
	{
		$MessagesString = "<tr align=texttop valign=top><td valign=top colspan=5 align=center style=\"background-color:yellow;\"><SPAN CLASS=\"notify\">".L_PRIV_NO_MSGS."</SPAN></td></tr>";
	}
};
$DbLink->clean_results();

if (isset($FORM_SEND) && stripslashes($submit_type) == L_PRIV_MARK_ALL) $DbLink->query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE address = '$pmc_username' AND pm_read LIKE 'New%'");
elseif (isset($FORM_SEND) && stripslashes($submit_type) == L_PRIV_MARK_SEL)
{
		// Get the list of the messages
		$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE address = '$pmc_username'");
		$msg_times = Array();
		while (list($msg_time) = $DbLink->next_record())
		{
			$msg_times[] = $msg_time;
		}
		$DbLink->clean_results();
		for (reset($msg_times); $msg_time=current($msg_times); next($msg_times))
		{
			$VarName = "msg_".$msg_time;
			if (!isset($$VarName)) continue;
			// Delete a profile after having sent a message to the user if he is connected
			$VarName = "selected_".$msg_time;
			if (isset($$VarName))
			{
				$DbLink->query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE address = '$pmc_username' AND m_time='$msg_time' AND pm_read LIKE 'New%'");
			}
		};
		$DbLink->clean_results;
}
elseif (isset($FORM_SEND) && stripslashes($submit_type) == L_PRIV_REMOVE && C_ALLOW_PM_DEL && $TotalPMs)
{
		// Get the list of the messages
		$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE address = '$pmc_username'");
		$msg_times = Array();
		while (list($msg_time) = $DbLink->next_record())
		{
			$msg_times[] = $msg_time;
		}
		$DbLink->clean_results();
		for (reset($msg_times); $msg_time=current($msg_times); next($msg_times))
		{
			$VarName = "msg_".$msg_time;
			if (!isset($$VarName)) continue;
			// Delete a profile after having sent a message to the user if he is connected
			$VarName = "selected_".$msg_time;
			if (isset($$VarName))
			{
				$DbLink->query("DELETE FROM ".C_MSG_TBL." WHERE m_time='$msg_time' AND address='$pmc_username' AND pm_read != ''");
			}
		};
		$DbLink->clean_results;
};
if (isset($MessagesString) && $MessagesString != "")
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
<HEAD>
	<TITLE><?php echo(($NewPMs == 1 ? L_PRIV_MSG : ($NewPMs ? sprintf(L_PRIV_MSGS,$NewPMs) : ($TotalPMs == 1 ? L_PRIV_READ_MSG : ($TotalPMs ? sprintf(L_PRIV_READ_MSGS,$TotalPMs) : L_PRIV_NO_MSGS))))." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
function reload()
{
	this.target='<?php echo($pstr."&mord=".$mord."&sortOrder=".$sortOrder); ?>'
};
function sort_status(sort)
{
<?php
if ($L == "turkish" && eregi("ORDER BY m_time",$sqlT))
{
?>
	if (sort == "ASC") window.status='<?php echo(sprintf(L_CLICK,L_LINKS_18_T)); ?>';
	else window.status='<?php echo(sprintf(L_CLICK,L_LINKS_17_T)); ?>';
<?php
}
else
{
?>
	if (sort == "ASC") window.status='<?php echo(sprintf(L_CLICK,L_LINKS_18)); ?>';
	else window.status='<?php echo(sprintf(L_CLICK,L_LINKS_17)); ?>';
<?php
}
?>
};
function pm_status()
{
	window.status='<?php echo(($NewPMs == 1) ? L_PRIV_MSG : ($NewPMs ? sprintf(L_PRIV_MSGS,$NewPMs) : ($TotalPMs == 1 ? L_PRIV_READ_MSG : ($TotalPMs ? sprintf(L_PRIV_READ_MSGS,$TotalPMs) : L_PRIV_NO_MSGS)))); ?>';
};
//-->
</SCRIPT>
</HEAD>
<BODY onLoad="pm_status(); return true;">
<CENTER>
<FORM ACTION="<?php echo($pstr."&mord=".$mord."&sortOrder=".$sortOrder); ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="FORM1" onSubmit="reload();">
<INPUT type="hidden" name="FORM_SEND" value="1">
<?php
	echo("<hr />");
	echo("<table align=center BORDER=1 WIDTH=98% CELLSPACING=0 CELLPADDING=1 CLASS=table>");
	echo("<tr>");
	echo(C_ALLOW_PM_DEL && $TotalPMs) ? "<td VALIGN=CENTER ALIGN=CENTER width=1%><a href=\"$pstr&mord=T&sortOrder=".($sortOrder == "DESC" ? "ASC" : "DESC")."\" class=error>x</a></td>" : "";
echo("<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\" width=1%>$arrows&nbsp;<a href=\"$pstr&mord=S&sortOrder=".($sortOrder == "DESC" ? "ASC\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\" class=sender><b>".L_PRIV_MSG6."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\" width=1%>$arrowt&nbsp;<a href=\"$pstr&mord=T&sortOrder=".($sortOrder == "DESC" ? "ASC\" title=\"".($L == "turkish" ? sprintf(L_CLICK,L_LINKS_17_T) : sprintf(L_CLICK,L_LINKS_17))."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC\" title=\"".($L == "turkish" ? sprintf(L_CLICK,L_LINKS_18_T) : sprintf(L_CLICK,L_LINKS_18))."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\" class=sender><b>".L_PRIV_MSG5."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\" width=1%>$arrowf&nbsp;<a href=\"$pstr&mord=F&sortOrder=".($sortOrder == "ASC" ? "DESC\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"" : "ASC\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"")."\" class=sender><b>".L_PRIV_MSG1."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\" width=1%>$arrowr&nbsp;<a href=\"$pstr&mord=R&sortOrder=".($sortOrder == "ASC" ? "DESC\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"" : "ASC\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"")."\" class=sender><b>".L_PRIV_MSG2."</b></a></td>
<td VALIGN=CENTER ALIGN=CENTER nowrap=\"nowrap\" class=sender><b>".L_PRIV_MSG4."</b></td></tr>");
	echo($MessagesString."</table>");
	unset($MessagesString);
	?>
<hr />
<?php
if ($NewPMs)
{
	$DbLink->query("SELECT * FROM ".C_USR_TBL." WHERE username='$pmc_username'");
	if($DbLink->num_rows() > 0)
	{
	}
	else
	{
	?>
	<div><table align=center border=0 cellpadding=3 class=table><tr><td class=notify align=center><?php echo(L_PRIV_REPLY_LOGIN); ?></td></tr></table></div><br />
	<?php
	}
?>
<INPUT TYPE="submit" NAME="submit_type" style="color:red" VALUE="<?php echo(L_PRIV_MARK_ALL); ?>">&nbsp;
<INPUT TYPE="submit" NAME="submit_type" style="color:red" VALUE="<?php echo(L_PRIV_MARK_SEL); ?>"><hr />
	<?php
}
	if (C_ALLOW_PM_DEL && $TotalPMs)
	{
	?>
		<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PRIV_REMOVE); ?>">&nbsp;
	<?php
	}
?>
<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PRIV_RELOAD); ?>">&nbsp;
<INPUT TYPE="submit" NAME="Close" VALUE="<?php echo(L_REG_25); ?>" onClick="self.close(); return false;">
</FORM>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2008<?php echo((date('Y')>"2008") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div></P>
</CENTER>
</BODY>
</HTML>
<?php
$DbLink->close();
exit;
}
}
else
{
?>
<html>
<head>
<title><?php echo(PM_DISABLED_ERROR); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</head>

<body class="frame">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center><font size="+2"><b>You don't have access to this file.<br /><?php echo(PM_DISABLED_ERROR); ?><br />Press <a href=./>here</a> to go to the index page or just wait...</b><font>
<br /><br /><br /><br />Hacking attempt! Redirection to the index page in 5 seconds.</center>
<meta http-equiv="refresh" content="5; url=./">
</body>
</html>
<?php
}
?>