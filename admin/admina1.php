<?php
// Profiles panel
// This sheet is diplayed when the admin wants to check the saved profiles

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.
while(list($name,$value) = each($_GET))
{
	$$name = $value;
};
while(list($name,$value) = each($_POST))
{
	$$name = $value;
};

$pstr = "$From?$URLQueryBody_Links";
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
else if($mord == "E")
{
    $sqlT = " ORDER BY email $sortOrder, username $sortOrder;";
	$arrowe = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
}
else
{
    $sqlT = " ORDER BY RIGHT(birthday,5) $sortOrder, age DESC";
#	$arrowb = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
	$arrowb = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".($L == "turkish" ? L_ASC_T : L_ASC)."' title='".($L == "turkish" ? L_ASC_T : L_ASC)."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".($L == "turkish" ? L_DESC_T : L_DESC)."' title='".($L == "turkish" ? L_DESC_T : L_DESC)."'>";
}
?>
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

<?php
	$today = strftime("%Y-%m-%d",(time() + C_BDAY_TIME * 60));
	$email_intval = C_BDAY_TIME * 60 + C_BDAY_INTVAL * 100 * 24 * 60 * 60;
	$max_popup_intval = time() + $email_intval + 24 * 60 * 60;
	$after_today = strftime("%Y-%m-%d",time() + $email_intval);

	$DbLink = new DB;
	$CondMonth = "";
	if(!isset($cYr) || $cYr == "" || $cYr == 0)  $CondMonth = " AND MONTH(birthday) = MONTH(CURDATE())";
	$CondForQuery = "birthday IS NOT NULL AND birthday!='0000-00-00'".$CondMonth."";
	$DbLink->query("SELECT username,firstname,lastname,gender,avatar,use_gravatar,email,showemail,birthday,show_bday,show_age,(CASE show_age WHEN 0 THEN 0 ELSE (YEAR(CURDATE())-YEAR(birthday)) - (RIGHT(CURDATE(),5)<RIGHT(birthday,5)) END) AS age FROM ".C_REG_TBL." WHERE ".$CondForQuery."".$sqlT."".$limit."");
#	$DbLink->query("SELECT username,firstname,lastname,email,birthday,show_bday,show_age FROM ".C_REG_TBL." WHERE birthday IS NOT NULL AND birthday!='0000-00-00' ORDER BY birthday ASC LIMIT 10");
?>
<P CLASS=title><?php echo(A_MENU_1a); ?></P>
<FORM ACTION="<?php echo($pstr."&mord=".$mord."&sortOrder=".$sortOrder.($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")); ?>" METHOD="POST" AUTOCOMPLETE="OFF" NAME="FORM1" onSubmit="reload();">
	<INPUT TYPE="hidden" NAME="From" value="<?php echo($From); ?>">
	<INPUT TYPE="hidden" NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
	<INPUT TYPE="hidden" NAME="pmc_password" value="<?php echo($pmc_password); ?>">
	<INPUT type="hidden" name="FORM_SEND" value="1">
	<INPUT TYPE="hidden" NAME="sortOrder" value="<?php echo($sortOrder); ?>">
	<INPUT TYPE="hidden" NAME="limT" value="<?php echo($limT); ?>">
	<INPUT TYPE="hidden" NAME="cYr" value="<?php echo($cYr); ?>">
	<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=1 CLASS="table">
	<tr class=tabtitle>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle>#</td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowx."&nbsp;<a href=\"$pstr&mord=X&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_REG_45."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowu."&nbsp;<a href=\"$pstr&mord=U&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_SET_2."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowe."&nbsp;<a href=\"$pstr&mord=E&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_REG_8."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_30); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_31); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowb."&nbsp;<a href=\"$pstr&mord=B&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_PRO_7."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowa."&nbsp;<a href=\"$pstr&mord=A&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_PRO_10."</a>"); ?></td>
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
				if(!$dob_showage || !$dob_showemail) $note = 1;
				$dob_time = stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,$Charset,strftime(L_SHORT_DATE, $dobtime)) : strftime(L_SHORT_DATE, $dobtime);
				$dob_name = $dob_firstname != "" ? $dob_firstname : $User;
				?>
				<?php
				echo("\n\t<TR".($i & 1 ? " bgcolor=\"#C0C0C0\"" : "").">\n\t");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".$i."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".(C_USE_AVATARS ? "<img src=\"".$avatar."\" width=\"25\" height=\"25\" border=\"0\" alt=\"".L_AVATAR."\" title=\"".L_AVATAR."\">" : "")."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\"><img src=\"images/gender_".$gender1.".gif\" width=\"".$ava_width."\" height=\"".$ava_height."\" border=\"0\" alt=\"".$gender."\" title=\"".$gender."\"></TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\"><B>".$User."</B></TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\"><B><A HREF=\"mailto:".htmlspecialchars($email)."\" title=\"".sprintf(L_CLICK,L_EMAIL_1)."\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_EMAIL_1).".'; return true\" target=\"_blank\">".$email."</A>".($dob_showemail ? "" : "<font color=\"red\"><b> *</b></font>")."</B></TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\">".$dob_firstname."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\">".$dob_lastname."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".$dob_time."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".$dob_age.($dob_showage ? "" : "<font color=\"red\"><b> *</b></font>")."</TD>");
				echo("\n\t</TR>\n");
				$i++;
			}
		}
			unset($User,$dob_firstname,$dob_lastname,$gender,$avatar,$use_gravatar,$email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$dob_age,$dob_name,$dobtime,$dob_time,$gender1,$ava_width);
	}
if($note)
{
	?>
	<tr>
		<td colspan=9>
			<b>* </b><i>User has chosen to hide this info in public profiles! Keep her/his privacy safe.</i>
		</td>
	</tr>
<?php
}
?>
	</TABLE>
<TABLE>
	<TR>
		<TD>
		<br />
		<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PRIV_RELOAD); ?>">&nbsp;
		<?php
		if($cYr == 1)
		{
		?>
			<INPUT TYPE="submit" NAME="submit_type" style="color:blue" VALUE="<?php echo("Show current month"); ?>">
		<?php
		}
		else
		{
		?>
			<INPUT TYPE="submit" NAME="submit_type" style="color:blue" VALUE="<?php echo("Show all birthdays"); ?>">&nbsp;
		<?php
		}
		?>
		</TD>
	</TR>
</TABLE>
</FORM>
</CENTER>
<P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2012<?php echo((date('Y')>"2012") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div></P>
<?php
?>