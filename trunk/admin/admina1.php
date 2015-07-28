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

if (isset($FORM_SEND) && stripslashes($submit_type) == A_SEARCH_28) $cYr = 1;
if (isset($FORM_SEND) && stripslashes($submit_type) == A_SEARCH_27) $cYr = 0;

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
else if($mord == "F")
{
    $sqlT = " ORDER BY country_code OR ip $sortOrder, username ASC;";
	$arrowf = ($sortOrder == "ASC") ? "<img src='./${ChatPath}images/arrowu.gif' border=0 alt='".L_ASC."' title='".L_ASC."'>" : "<img src='./${ChatPath}images/arrowd.gif' border=0 alt='".L_DESC."' title='".L_DESC."'>";
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
	if(!isset($cYr) || $cYr == "" || $cYr == 0) $CondMonth = " AND MONTH(birthday) = MONTH(CURDATE())";
	$CondForQuery = "birthday IS NOT NULL AND birthday!='0000-00-00'".$CondMonth."";
	$DbLink->query("SELECT username,firstname,lastname,gender,avatar,use_gravatar,email,showemail,birthday,show_bday,show_age,ip,country_code,country_name,((YEAR(CURDATE())-YEAR(birthday)) - (RIGHT(CURDATE(),5)<RIGHT(birthday,5))) AS age FROM ".C_REG_TBL." WHERE ".$CondForQuery."".$sqlT."".$limit."");
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
	<TABLE WIDTH=98% BORDER=0 CLASS="table">
	<?php
	if ($DbLink->num_rows() > 0)
	{
	?>
	<tr class=tabtitle>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle>#</td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowx."&nbsp;<a href=\"$pstr&mord=X&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_REG_45."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowu."&nbsp;<a href=\"$pstr&mord=U&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_SET_2."</a>"); ?></td>
		<?php
		if(C_USE_FLAGS)
		{
		?>
			<td style="vertical-align:middle; text-align:center;" class=tabtitle nowrap="wrap"><?php echo($arrowf."&nbsp;<a href=\"$pstr&mord=F&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_REG_52."</a>"); ?></td>
		<?php
		}
		?>
			<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo($arrowe."&nbsp;<a href=\"$pstr&mord=E&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_REG_8."</a>"); ?></td>
		<?php
		if(!(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")))
		{
		?>
			<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_30); ?></td>
			<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_31); ?></td>
		<?php
		}
		else
		{
		?>
			<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_31); ?></td>
			<td style="vertical-align:middle; text-align:center;" class=tabtitle><?php echo(L_REG_30); ?></td>
		<?php
		}
		?>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle nowrap="nowrap"><?php echo($arrowb."&nbsp;<a href=\"$pstr&mord=B&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_PRO_7."</a>"); ?></td>
		<td style="vertical-align:middle; text-align:center;" class=tabtitle nowrap="nowrap"><?php echo($arrowa."&nbsp;<a href=\"$pstr&mord=A&sortOrder=".($sortOrder == "DESC" ? "ASC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_17)."\" onMouseOver=\"sort_status('DESC'); return true;\"" : "DESC".($cYr ? "&cYr=".$cYr : "").($use_limT ? "&limT=".$limT : "")."\" title=\"".sprintf(L_CLICK,L_LINKS_18)."\" onMouseOver=\"sort_status('ASC'); return true;\"")."\">".L_PRO_10."</a>"); ?></td>
	</tr>
	<?php
		$ava_height = 14;
		$i = 1;
		$users = Array();
		$DbLinkU = new DB;
		$DbLinkU->query("SELECT username FROM ".C_REG_TBL." WHERE email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%' AND username != '".$pmc_username."' ORDER BY username ASC");
		while (list($usernames) = $DbLinkU->next_record())
		{
			$users[] = $usernames;
		}
		$DbLinkU->clean_results();
		$DbLinkU->close();
		// GeoIP mode for country flags
		if(C_USE_FLAGS)
		{
			if (!class_exists("GeoIP")) include("plugins/countryflags/geoip.inc");
			if(!isset($gi)) $gi = geoip_open("plugins/countryflags/GeoIP.dat",GEOIP_STANDARD);
		}
		while(list($User,$dob_firstname,$dob_lastname,$gender,$avatar,$use_gravatar,$email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$IP,$COUNTRY_CODE,$COUNTRY_NAME,$dob_age) = $DbLink->next_record())
		{
			if(!empty($dob_birthday) && $dob_birthday != "0000-00-00")
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
				$dob_time = strftime(L_SHORT_DATE, $dobtime);
				if(stristr(PHP_OS,'win'))
				{
					$dobtime = utf_conv(WIN_DEFAULT,$Charset,$dobtime);
					if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $dob_time = str_replace(" ","",$dob_time);
				}
				$User = stripslashes($User);
				$dob_name = $dob_firstname != "" ? $dob_firstname : $User;
				$dob_username = pos_array($User,$users);
				if ($User != $pmc_username) $User = "<a onClick=\"browse_user($dob_username);\" target=\"_self\" title=\"".A_SEARCH_25."\">$User</a>";

				?>
				<?php
				echo("\n\t<TR".($i & 1 ? " bgcolor=\"#C0C0C0\"" : "").">\n\t");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".$i."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".(C_USE_AVATARS ? "<img src=\"".$avatar."\" width=\"25\" height=\"25\" border=\"0\" alt=\"".L_AVATAR."\" title=\"".L_AVATAR."\">" : "")."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\"><img src=\"images/gender_".$gender1.".gif\" width=\"".$ava_width."\" height=\"".$ava_height."\" border=\"0\" alt=\"".$gender."\" title=\"".$gender."\"></TD>");
				echo("<TD style=\"vertical-align:middle; text-align:left;\"><B>".$User."</B></TD>");
				// GeoIP mode for country flags
				if(C_USE_FLAGS)
				{
					if(!isset($COUNTRY_CODE) || $COUNTRY_CODE == "")
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
					$c_flag = "<img src=\"./plugins/countryflags/flags/".strtolower($COUNTRY_CODE).".gif\" alt=\"".$COUNTRY_NAME."\" title=\"".$COUNTRY_NAME."\" border=\"0\">&nbsp;(".$COUNTRY_CODE.")";
					echo("<TD style=\"vertical-align:middle; text-align:center;\">".$c_flag."</TD>");
				};
				echo("<TD style=\"vertical-align:middle; text-align:left;\"><B><A HREF=\"mailto:".htmlspecialchars($email)."\" title=\"".sprintf(L_CLICK,L_EMAIL_1)."\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_EMAIL_1).".'; return true\" target=\"_blank\">".$email."</A>".($dob_showemail ? "" : "<font color=\"red\"><b> *</b></font>")."</B></TD>");
				if(!(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")))
				{
					echo("<TD style=\"vertical-align:middle; text-align:left;\">".$dob_firstname."</TD>");
					echo("<TD style=\"vertical-align:middle; text-align:left;\">".$dob_lastname."</TD>");
				}
				else
				{
					echo("<TD style=\"vertical-align:middle; text-align:left;\">".$dob_lastname."</TD>");
					echo("<TD style=\"vertical-align:middle; text-align:left;\">".$dob_firstname."</TD>");
				}
				echo("<TD style=\"vertical-align:middle; text-align:center;\" nowrap=\"nowrap\">".$dob_time.($dob_showbday ? "" : "<font color=\"red\"><b> *</b></font>")."</TD>");
				echo("<TD style=\"vertical-align:middle; text-align:center;\">".$dob_age.($dob_showage ? "" : "<font color=\"red\"><b> *</b></font>")."</TD>");
				echo("\n\t</TR>\n");
				$i++;
			}
			unset($User,$dob_firstname,$dob_lastname,$gender,$avatar,$use_gravatar,$email,$dob_showemail,$dob_birthday,$dob_showbday,$dob_showage,$IP,$COUNTRY_CODE,$COUNTRY_NAME,$dob_age,$dob_name,$dobtime,$dob_time,$gender1,$ava_width);
		}
		// GeoIP mode for country flags
		if(isset($gi) && $gi != "") geoip_close($gi);
		if(isset($gi6) && $gi6 != "") geoip_close($gi6);
		if($note)
		{
			?>
			<tr>
				<td colspan=9 class=error>
					<b>* </b><i><font size="1"><?php echo(A_SEARCH_26); ?></font></i>
				</td>
			</tr>
		<?php
		}
	}
	else
	{
	?>
		<TR>
			<TD ALIGN=CENTER CLASS=error><?php echo(sprintf(A_SEARCH_29,strftime("%B", time()))); ?></TD>
		</TR>
	<?php
	};
	?>
	</TABLE>
	<br /><hr /><br />
	<TABLE>
	<TR>
		<TD>
			<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(L_PRIV_RELOAD); ?>">&nbsp;
			<?php
			if($cYr == 1)
			{
			?>
				<INPUT TYPE="submit" NAME="submit_type" style="color:blue" VALUE="<?php echo(A_SEARCH_27); ?>">&nbsp;
			<?php
			}
			else
			{
			?>
				<INPUT TYPE="submit" NAME="submit_type" style="color:blue" VALUE="<?php echo(A_SEARCH_28); ?>">&nbsp;
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