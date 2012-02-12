<?php
// Get the names and values for vars sent to index.lib.php

if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"]) && !isset($R)) $R = urldecode($_COOKIE["CookieRoom"]);
if (!isset($R)) $skin = "skins/style1";

require("config/config.lib.php");
require("lib/release.lib.php");
if (!isset($L) || $L == "") $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");
require("lib/database/".C_DB_TYPE.".lib.php");

header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime')) set_magic_quotes_runtime(0);
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

if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";

// Horizontal alignment for cells topic
$CellAlign = ($Align == "right" ? "RIGHT" : "LEFT");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
<TITLE><?php echo(L_DOB_TIT_1." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
function targetWin()
{
	if (window.opener.window.document.title == "<?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME); ?>")
		return window.opener.frames['input'].window;
	else if (window.opener.window.document.title == "Hidden Input frame")
		return window.opener.window.parent.frames['input'].window;
	else
		return window.opener.window;
}

//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="if (window.focus) window.focus();">
<CENTER>
<?php
	$DbLink = new DB;
	$today = strftime("%Y-%m-%d",(time() + C_BDAY_TIME * 60));
	$email_intval = C_BDAY_TIME * 60 + C_BDAY_INTVAL * 100 * 24 * 60 * 60;
	$max_popup_intval = time() + $email_intval + 24 * 60 * 60;
	$after_today = strftime("%Y-%m-%d",time() + $email_intval);
	$DbLink->query("SELECT username,firstname,lastname,gender,avatar,email,showemail,birthday,show_bday,show_age,(YEAR(CURDATE())-YEAR(birthday)) - (RIGHT(CURDATE(),5)<RIGHT(birthday,5)) FROM ".C_REG_TBL." WHERE birthday IS NOT NULL AND birthday!='0000-00-00' AND MONTH(birthday) = MONTH(CURDATE()) ORDER BY RIGHT(birthday,5) ASC");
#	$DbLink->query("SELECT username,firstname,lastname,email,birthday,show_bday,show_age FROM ".C_REG_TBL." WHERE birthday IS NOT NULL AND birthday!='0000-00-00' ORDER BY birthday ASC LIMIT 10");
?>
	<INPUT TYPE=hidden NAME="sortBy" value="<?php echo($sortBy); ?>">
	<INPUT TYPE=hidden NAME="sortOrder" value="<?php echo($sortOrder); ?>">
	<TABLE BORDER=0 CLASS="table">
	<TR bgcolor="#FFFFFF">
		<TH COLSPAN="7"><?php echo(L_DOB_TIT_1); ?></TH>
	</TR>
	<tr class="thumbIndex">
		<td valign=center align=center class=tabtitle></td>
		<td valign=center align=center class=tabtitle><?php echo(L_SET_2); ?></td>
		<td valign=center align=center class=tabtitle><?php echo(L_REG_30); ?></td>
		<td valign=center align=center class=tabtitle><?php echo(L_REG_31); ?></td>
		<td valign=center align=center class=tabtitle><?php echo(L_REG_45); ?></td>
		<td valign=center align=center class=tabtitle><?php echo(L_PRO_7); ?></td>
		<td valign=center align=center class=tabtitle><?php echo(L_PRO_10); ?></td>
	</tr>
<?php
	if ($DbLink->num_rows() > 0)
	{
		$ava_height = 14;
		$i = 0;
		while(list($dob_username,$dob_firstname,$dob_lastname,$gender,$avatar,$dob_email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$dob_age) = $DbLink->next_record())
		{
			if($dob_showbday)
			{
				if (C_USE_AVATARS)
				{
					if (empty($avatar))	$avatar = C_AVA_RELPATH . "no_avatar.gif";
				}
				if($gender == 4) $gender1 = 'undefined';
				elseif($gender == 1) $gender1 = 'boy';
				elseif($gender == 2) $gender1 = 'girl';
				elseif($gender == 3) $gender1 = 'couple';
				else $gender1 = 'none';
				if ($gender1 != "couple") $ava_width = 14;
				else $ava_width = 28;
				if ($gender != 0)
				{
					$gender = ($gender == 1 ? L_REG_46 : ($gender == 2 ? L_REG_47 : ($gender == 3 ? L_REG_44 : L_REG_43)));
				}
				else $gender = L_REG_48;
				if($dob_birthday && $dob_birthday != "" && $dob_birthday != "0000-00-00") $dobtime = strtotime($dob_birthday);
				$dob_format = $dob_showage ? L_SHORT_DATE : trim(str_replace("%Y","****",L_SHORT_DATE));
				$dob_time = stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,$Charset,strftime($dob_format, $dobtime)) : strftime($dob_format, $dobtime);
				$dob_name = $dob_firstname != "" ? $dob_firstname : $dob_username;
				?>
				<?php
				echo("\n\t<TR".($i & 1 ? " bgcolor=\"#B0C4DE\"" : "").">\n\t");
				echo("<TD align=\"center\" class=\"notify\">".(C_USE_AVATARS ? "<img src=\"".$avatar."\" width=\"20\" height=\"20\" border=\"0\" alt=\"".L_AVATAR."\" title=\"".L_AVATAR."\">" : "")."</TD>");
				echo("<TD align=\"center\" class=\"notify\">".($dob_showemail ? "<A HREF=\"mailto:".htmlspecialchars($dob_email)."\" title=\"".sprintf(L_CLICK,L_EMAIL_1)."\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_EMAIL_1).".'; return true\" target=\"_blank\">".$dob_username."</A>" : $dob_username)."</TD>");
				echo("<TD align=\"center\" class=\"notify\">".$dob_firstname."</TD>");
				echo("<TD align=\"center\" class=\"notify\">".$dob_lastname."</TD>");
				echo("<TD valign=\"top\" align=\"center\"><img src=\"images/gender_".$gender1.".gif\" width=\"".$ava_width."\" height=\"".$ava_height."\" border=\"0\" alt=\"".$gender."\" title=\"".$gender."\"></TD>");
				echo("<TD align=\"center\" class=\"notify\">".$dob_time."</TD>");
				echo("<TD align=\"center\" class=\"notify\">".($dob_showage ? $dob_age : "**")."</TD>");
				echo("\n\t</TR>\n");
				$i++;
			}
		}
			unset($dob_username,$dob_firstname,$dob_lastname,$avatar,$dob_email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$dob_age,$dob_name,$dobtime,$dob_time,$gender,$gender1,$ava_width);
	}
	?>
	</TABLE>
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2005-<?php echo(date('Y')); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
</BODY>
</HTML>
<?php
?>