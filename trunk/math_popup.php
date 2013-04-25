<?php
// Posted MathJax.org Equations mod by Ciprian

$ChatPath = "";

if (!isset($N)) $N = 15;	//Set the last number of equations to be displayed

if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

require("./${ChatPath}config/config.lib.php");
if(C_ALLOW_MATH && C_SRC_MATH != "")
{
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

$CondForQuery	= "username = 'SYS math'";

$DbLink->query("SELECT m_time, room, username, latin1, address, message FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC LIMIT $N");

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$MessagesString = "";
	while(list($Time, $Room, $User, $Latin1, $Dest, $Message) = $DbLink->next_record())
	{
		$Message = stripslashes($Message);
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
			$DbColor->close();
		}
		else
		{
			$colorname_tag = "";
			$colornamedest_tag = "";
			$colorname_endtag = "";
			$colornamedest_endtag = "";
		}
		$NewMsg = "<tr align=texttop valign=top>";
		$NewMsg .= "<td width=\"1%\" nowrap=\"nowrap\">".date("H:i:s", $Time + C_TMZ_OFFSET*60*60)."</td><td width=\"1%\" nowrap=\"nowrap\">".$Room."</td>";
		if ($User == "SYS math")
		{
			$NewMsg .= "<td valign=\"top\"><FONT class=\"notify\">".sprintf(L_MATH,L_EQUATION,$Dest)."</FONT><br />".$Message."</td>";
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
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(L_LINKS_20." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo("${ChatPath}".$skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<!-- <script type="text/javascript" src="https://d3eoax9i5htok0.cloudfront.net/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script> -->
<!-- <script type="text/javascript" src="http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script> -->
<script type="text/javascript" src="<?php echo(C_SRC_MATH); ?>"></script>
</HEAD>
	<BODY>
<CENTER>
	<TABLE BORDER=0>
		<TR>
			<TH CLASS="tabtitle" COLSPAN="3"><?php echo(L_LINKS_20); ?></TH>
		</TR>
	</TABLE>
	<?php
	echo("<table BORDER=1 WIDTH=98% CELLSPACING=0 CELLPADDING=1 CLASS=table>");
	echo("<tr>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG5."</b></td>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG2."</b></td>
<td VALIGN=CENTER ALIGN=CENTER><b>".L_PRIV_MSG4."</b></td></tr>");
	echo($MessagesString."</table>");
	echo("<hr>");
	unset($MessagesString);
	?>
<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PRIV_RELOAD); ?>" onClick="window.location.reload(); return false;">&nbsp;
<INPUT TYPE="submit" NAME="Close" VALUE="<?php echo(L_REG_25); ?>" onClick="self.close(); return false;">
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2012<?php echo((date('Y')>"2012") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
	</BODY>
</HTML>
	<?php
	exit;
}
else
{
?>
<html>
<head>
<title>Invalid address - MathJax plugin disabled</title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo(${Charset}); ?>">
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</head>

<body class="frame">
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><center><font size="+2"><b>You don't have access to this file.<br />MathJax plugin feature has been disabled<br />Press <a href=./>here</a> to go to the index page or just wait...</b><font>
<br /><br /><br /><br />Hacking attempt! Redirection to the index page in 5 seconds.</center>
<meta http-equiv="refresh" content="5; url=./">
</body>
</html>
<?php
}
?>