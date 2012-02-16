<?php
// Get the names and values for vars sent to index.lib.php

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
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Added for Skin mod
if (isset($_COOKIE["CookieRoom"]) && !isset($R)) $R = urldecode($_COOKIE["CookieRoom"]);
#if (!isset($R)) $skin = "skins/style1";

if (isset($_COOKIE["CookieLang"])) $L = urldecode($_COOKIE["CookieLang"]);

require("config/config.lib.php");
require("lib/release.lib.php");
if (!isset($L) || $L == "") $L = C_LANGUAGE;
require("localization/".$L."/localized.chat.php");
require("lib/database/".C_DB_TYPE.".lib.php");

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

if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};

$pstr = "bday_popup.php?L=".$L;
#$sortOrder = $_GET['sortOrder'];
#$limT = $_GET['limT'];
#$cYr = $_GET['cYr'];
$limit = " LIMIT ".$limT;
$use_limT = 1;

if (isset($FORM_SEND) && stripslashes($submit_type) == "Show all birthdays") $cYr = 1;
if (isset($FORM_SEND) && stripslashes($submit_type) == "Show current month") $cYr = 0;

if(!isset($limT) || $limT == "" || $limT == 0)
{
	$limit = "";
	$use_limT = 0;
}
if (!isset($sortOrder)) $sortOrder = "ASC";
if($mord == "U")
{
    $sqlT = " ORDER BY username $sortOrder";
	$arrowu = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
}
else if($mord == "A")
{
    $sqlT = " ORDER BY age $sortOrder, username ASC";
	$arrowa = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
}
else if($mord == "X")
{
    $sqlT = " ORDER BY gender $sortOrder, username ASC;";
	$arrowx = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
}
else
{
    $sqlT = " ORDER BY RIGHT(birthday,5) $sortOrder, age DESC";
#	$arrowb = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
	$arrowb = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".($L == "turkish" ? L_ASC_T : L_ASC)."' title='".($L == "turkish" ? L_ASC_T : L_ASC)."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".($L == "turkish" ? L_DESC_T : L_DESC)."' title='".($L == "turkish" ? L_DESC_T : L_DESC)."'>";
}

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
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.2">
<!--
function reload()
{
	this.target='<?php echo($pstr."&mord=".$mord."&sortOrder=".$sortOrder.($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")); ?>'
};
function sort_status(sort)
{
<?php
#if ($L == "turkish" && eregi("ORDER BY RIGHT(birthday,5)",$sqlT))
if ($L == "turkish" && stripos($sqlT,"ORDER BY RIGHT(birthday,5)") !== false)
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
//-->
</SCRIPT>
</HEAD>
<BODY CLASS="frame" onLoad="if (window.focus) window.focus();">
<CENTER>
<?php
	$today = strftime("%Y-%m-%d",(time() + C_BDAY_TIME * 60));
	$email_intval = C_BDAY_TIME * 60 + C_BDAY_INTVAL * 100 * 24 * 60 * 60;
	$max_popup_intval = time() + $email_intval + 24 * 60 * 60;
	$after_today = strftime("%Y-%m-%d",time() + $email_intval);

	$DbLink = new DB;
	$CondMonth = "";
	if(!isset($cYr) || $cYr == "" || $cYr == 0) $CondMonth = " AND MONTH(birthday) = MONTH(CURDATE())";
	$CondForQuery	= "birthday IS NOT NULL AND birthday!='0000-00-00'".$CondMonth."";
	$DbLink->query("SELECT username,firstname,lastname,gender,avatar,use_gravatar,email,showemail,birthday,show_bday,show_age,(CASE show_age WHEN 0 THEN 0 ELSE (YEAR(CURDATE())-YEAR(birthday)) - (RIGHT(CURDATE(),5)<RIGHT(birthday,5)) END) AS age FROM ".C_REG_TBL." WHERE ".$CondForQuery."".$sqlT."".$limit."");
#	$DbLink->query("SELECT username,firstname,lastname,email,birthday,show_bday,show_age FROM ".C_REG_TBL." WHERE birthday IS NOT NULL AND birthday!='0000-00-00' ORDER BY birthday ASC LIMIT 10");
?>
<FORM ACTION="<?php echo($pstr."&mord=".$mord."&sortOrder=".$sortOrder.($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")); ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="FORM1" onSubmit="reload();">
	<INPUT type="hidden" name="FORM_SEND" value="1">
	<INPUT TYPE="hidden" NAME="sortOrder" value="<?php echo($sortOrder); ?>">
	<INPUT TYPE="hidden" NAME="limT" value="<?php echo($limT); ?>">
	<INPUT TYPE="hidden" NAME="cYr" value="<?php echo($cYr); ?>">
	<TABLE BORDER=0 CLASS="table">
	<TR bgcolor="#FFFFFF">
		<TH COLSPAN="8"><?php echo(L_DOB_TIT_1); ?></TH>
	</TR>
	<tr>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle>#</td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowx."&nbsp;<a href=\"$pstr&mord=X&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\" class=\"tabtitle\">".L_REG_45."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowu."&nbsp;<a href=\"$pstr&mord=U&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\" class=\"tabtitle\">".L_SET_2."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_30); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_31); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowb."&nbsp;<a href=\"$pstr&mord=B&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\" class=\"tabtitle\">".L_PRO_7."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowa."&nbsp;<a href=\"$pstr&mord=A&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\" class=\"tabtitle\">".L_PRO_10."</a>"); ?></td>
	</tr>
<?php
	if ($DbLink->num_rows() > 0)
	{
		$ava_height = 14;
		$i = 1;
		while(list($User,$dob_firstname,$dob_lastname,$gender,$avatar,$use_gravatar,$email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$dob_age) = $DbLink->next_record())
		{
			if($dob_showbday)
			{
				if (C_USE_AVATARS)
				{
					if (empty($avatar))	$avatar = C_AVA_RELPATH . C_DEF_AVATAR;
#					if (empty($avatar))	$avatar = C_AVA_RELPATH . "no_avatar.gif";
					// Gravatar mod added by Ciprian
					if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && $use_gravatar))
					{
#						if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
						if (stripos($avatar,C_AVA_RELPATH) !== false) $local_avatar = 1;
						else $local_avatar = 0;
						require("./plugins/gravatars/get_gravatar.php");
					}
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
				$dob_name = $dob_firstname != "" ? $dob_firstname : $User;
				?>
				<?php
				echo("\n\t<TR".($i & 1 ? " bgcolor=\"#C0C0C0\"" : "").">\n\t");
				echo("<TD style=\"vertical-align:middle; text-align:center;\" class=\"notify\">".$i."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\" class=\"notify\">".(C_USE_AVATARS ? "<img src=\"".$avatar."\" width=\"25\" height=\"25\" border=\"0\" alt=\"".L_AVATAR."\" title=\"".L_AVATAR."\">" : "")."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\"><img src=\"images/gender_".$gender1.".gif\" width=\"".$ava_width."\" height=\"".$ava_height."\" border=\"0\" alt=\"".$gender."\" title=\"".$gender."\"></TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\" class=\"notify\">".($dob_showemail ? "<A HREF=\"mailto:".htmlspecialchars($email)."\" title=\"".sprintf(L_CLICK,L_EMAIL_1)."\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_EMAIL_1).".'; return true\" target=\"_blank\">".$User."</A>" : $User)."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\" class=\"notify\">".$dob_firstname."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\" class=\"notify\">".$dob_lastname."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\" class=\"notify\">".$dob_time."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\" class=\"notify\">".($dob_showage ? $dob_age : "**")."</TD>");
				echo("\n\t</TR>\n");
				$i++;
			}
		}
			unset($User,$dob_firstname,$dob_lastname,$gender,$avatar,$use_gravatar,$email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$dob_age,$dob_name,$dobtime,$dob_time,$gender1,$ava_width);
	}
	?>
	</TABLE>
<hr>
<TABLE>
<TR>
<TD>
<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PRIV_RELOAD); ?>">&nbsp;
<?php
if($cYr == 1)
{
?>
	<INPUT TYPE="submit" NAME="submit_type" style="color:blue" VALUE="<?php echo("Show current month"); ?>">&nbsp;
<?php
}
else
{
?>
	<INPUT TYPE="submit" NAME="submit_type" style="color:blue" VALUE="<?php echo("Show all birthdays"); ?>">&nbsp;
<?php
}
?>
<INPUT TYPE="submit" NAME="Close" VALUE="<?php echo(L_REG_25); ?>" onClick="self.close(); return false;">
</TD>
</TR>
</TABLE>
</FORM>
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2012<?php echo((date('Y')>"2012") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div></P>
</BODY>
</HTML>
<?php
?>