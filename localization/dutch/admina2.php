<?php
// Statistics panel
// This sheet is diplayed when the admin wants to check the saved statistics in chat
if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.
while(list($name,$value) = each($_GET))
{
	$$name = $value;
};
if(C_EN_STATS)
{
	function time_transform($s)
	{
		if ($s >= 0)
		{  
			$days = (floor($s / 86400) > 0) ? floor($s / 86400)."d " : "";
			$hours = (floor(($s - $days*86400) / 3600) > 0) ? floor(($s - $days*86400) / 3600)."h " : "";
			$mins = (floor((($s - $hours*3600) / 60) % 60) > 0) ? floor((($s - $hours*3600) / 60) % 60)."&prime; " : "";
			$secs = ($s % 60)."&Prime;";
		}
		else
		{
			$days = "";
			$hours = "";
			$mins = "";
			$secs = "&nbsp;";
		}
			
		return sprintf("%2s%2s%2s%2s", $days, $hours, $mins, $secs);
	};
// Get the list of the users
# Vars Initialization
$stats = Array();
$display = "";
$overall = "";
$all_overall = "";
# Lines and columns vars
# Table rows
$tr_s = "<TR><TD VALIGN=CENTER ALIGN=\"CENTER\">";
$td = "</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" NOWRAP>";
$tr_e = "</TD></TR>";
# Table totals
$tr_st = "<TR><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\">";
$tdt = "</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\">";
$tr_et = "</TD></TR>";
$days = 3;
$details = 1;
$totals = 1;
$grand_totals = 1;
$DbLink->query("SELECT DISTINCT stat_date FROM ".C_STS_TBL." ORDER BY stat_date ASC LIMIT 1");
list($start_date) = $DbLink->next_record();
$DbLink->clean_results();
if($totals)
{
$t = 1;
$DbLink->query("SELECT username, SUM(logins) xlogins, SUM(seconds_in) xseconds_in, MAX(longest_in) xlongest_in, SUM(seconds_away) xseconds_away, MAX(longest_away) xlongest_away, SUM(posts_sent) xposts_sent, SUM(pms_sent) xpms_sent, SUM(cmds_used) xcmds_used FROM ".C_STS_TBL." GROUP BY username ORDER BY xseconds_in DESC");
while(list($username,$xlogins,$xseconds_in,$xlongest_in,$xseconds_away,$xlongest_away,$xposts_sent,$xpms_sent,$xcmds_used) = $DbLink->next_record())
{
	$overall .= $tr_s.$t.$td.$username.$td.$xlogins.$td.time_transform($xseconds_in).$td.time_transform($xlongest_in).$td.time_transform($xseconds_away).$td.time_transform($xlongest_away).$td.$xposts_sent.$td.$xpms_sent.$td.$xcmds_used.$tr_e;
	$t++;
}
#reset($username,$xlogins,$xseconds_in,$xseconds_away,$xposts_sent,$xpms_sent,$xcmds_used);
$DbLink->clean_results();
}
if($grand_totals)
{
$DbLink->query("SELECT COUNT(DISTINCT username) xusers, GROUP_CONCAT(DISTINCT username ORDER BY username ASC SEPARATOR ', ') xnames, SUM(logins) xlogins, SUM(seconds_in) xseconds_in, SUM(seconds_away) xseconds_away, SUM(posts_sent) xposts_sent, SUM(pms_sent) xpms_sent, SUM(cmds_used) xcmds_used  FROM ".C_STS_TBL." ORDER BY xseconds_in DESC");
while(list($xusers,$xnames,$xlogins,$xseconds_in,$xseconds_away,$xposts_sent,$xpms_sent,$xcmds_used) = $DbLink->next_record())
{
	$all_overall .= $tr_st."Totals".$tdt.$xusers.$tdt.$xlogins.$tdt.time_transform($xseconds_in).$tdt."-".$tdt.time_transform($xseconds_away).$tdt."-".$tdt.$xposts_sent.$tdt.$xpms_sent.$tdt.$xcmds_used.$tr_et;
}
#reset($username,$xlogins,$xseconds_in,$xseconds_away,$xposts_sent,$xpms_sent,$xcmds_used);
$DbLink->clean_results();
}
if($details)
{
$d = 1;
$DbLink->query("SELECT DISTINCT stat_date FROM ".C_STS_TBL." ORDER BY stat_date DESC LIMIT $days");
while(list($stat_date) = $DbLink->next_record())
{
	$xstat_date = $stat_date;
}
#reset($stat_date);
$DbLink->query("SELECT * FROM ".C_STS_TBL." WHERE stat_date>='$xstat_date' GROUP BY stat_date,room,username ORDER BY stat_date DESC, username ASC, room ASC");
while(list($stat_date,$room,$username,$reguser,$last_in,$seconds_in,$longest_in,$last_away,$seconds_away,$longest_away,$times_away,$logins,$posts_sent,$pms_sent,$cmds_used,$profile_viewed,$profiles_checked,$imgs_posted,$urls_posted,$emails_posted,$swears_posted,$smilies_posted,$bans_rcvd,$bans_sent,$kicks_rcvd,$kicks_sent,$vids_posted,$maths_posted) = $DbLink->next_record())
{
//		$stats[] = $stat_date,$room,$username,$reguser,$last_in,$seconds_in,$longest_in,$last_away,$seconds_away,$longest_away,$times_away,$logins,$posts_sent,$pms_sent,$cmds_used,$profile_viewed,$profiles_checked,$imgs_posted,$urls_posted,$emails_posted,$swears_posted,$smilies_posted,$bans_rcvd,$bans_sent,$kicks_rcvd,$kicks_sent;
	$stat_date = strftime(L_SHORT_DATE,strtotime($stat_date));
	$last_in = $last_in ? strftime(L_SHORT_DATETIME,$last_in) : "&nbsp;";
	$last_away = $last_away ? strftime(L_SHORT_DATETIME,$last_away) : "&nbsp;";
	if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))
	{
		$stat_date = str_replace(" ","",$stat_date);
		if($last_in != "&nbsp;") $last_in = str_replace(" ","",$last_in);
		if($last_away != "&nbsp;") $last_away = str_replace(" ","",$last_away);
	}
	$display .= $tr_s.$d.$td.$stat_date.$td.$room.$td.$username.$td.$reguser.$td.$logins.$td.$last_in.$td.time_transform($seconds_in).$td.time_transform($longest_in).$td.$times_away.$td.$last_away.$td.time_transform($seconds_away).$td.time_transform($longest_away).$td.$posts_sent.$td.$pms_sent.$td.$cmds_used.$td.$profile_viewed.$td.$profiles_checked.$td.$imgs_posted.$td.$vids_posted.$td.$maths_posted.$td.$urls_posted.$td.$emails_posted.$td.$swears_posted.$td.$smilies_posted.$td.$bans_rcvd.$td.$bans_sent.$td.$kicks_rcvd.$td.$kicks_sent.$tr_e;
	$xlogins = $xlogins + $logins;
	$xseconds_in = $xseconds_in + $seconds_in;
	$xseconds_away = $xseconds_away + $seconds_away;
	$xtimes_away = $xtimes_away + $times_away;
	$xposts_sent = $xposts_sent + $posts_sent;
	$xpms_sent = $xpms_sent + $pms_sent;
	$xcmds_used = $xcmds_used + $cmds_used;
	$xprofiles_checked = $xprofiles_checked + $profiles_checked;
	$ximgs_posted = $ximgs_posted + $imgs_posted;
	$xvids_posted = $xvids_posted + $vids_posted;
	$xmaths_posted = $xmaths_posted + $maths_posted;
	$xurls_posted = $xurls_posted + $urls_posted;
	$xemails_posted = $xemails_posted + $emails_posted;
	$xswears_posted = $xswears_posted + $swears_posted;
	$xsmilies_posted = $xsmilies_posted + $smilies_posted;
	$xbans_rcvd = $xbans_rcvd + $bans_rcvd;
	$xkicks_rcvd = $xkicks_rcvd + $kicks_rcvd;
$d++;
}
$subtotal = "<TR><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\" COLSPAN=5>".sprintf(A_STATS_4,3).":".$tdt.$xlogins."</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\" COLSPAN=3>".time_transform($xseconds_in).$tdt.$xtimes_away."</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\" COLSPAN=3>".time_transform($xseconds_away).$tdt.$xposts_sent.$tdt.$xpms_sent.$tdt.$xcmds_used."</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\" COLSPAN=2>".$xprofiles_checked.$tdt.$ximgs_posted.$tdt.$xvids_posted.$tdt.$xmaths_posted.$tdt.$xurls_posted.$tdt.$xemails_posted.$tdt.$xswears_posted.$tdt.$xsmilies_posted."</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\" COLSPAN=2>".$xbans_rcvd."</TD><TD VALIGN=CENTER ALIGN=\"CENTER\" CLASS=\"success\" COLSPAN=2>".$xkicks_rcvd.$tr_et;
#reset($stat_date,$room,$username,$reguser,$last_in,$seconds_in,$longest_in,$last_away,$seconds_away,$longest_away,$times_away,$logins,$posts_sent,$pms_sent,$cmds_used,$profile_viewed,$profiles_checked,$imgs_posted,$urls_posted,$emails_posted,$swears_posted,$smilies_posted,$bans_rcvd,$bans_sent,$kicks_rcvd,$kicks_sent,$xlogins,$xseconds_in,$xseconds_away,$xtimes_away,$xposts_sent,$xpms_sent,$xcmds_used,$xprofiles_checked,$ximgs_posted,$xurls_posted,$xemails_posted,$xswears_posted,$xsmilies_posted,$xbans_rcvd,$xbans_sent,$xkicks_rcvd,$xkicks_sent);
$DbLink->clean_results();
}
?>
<P CLASS=title><?php echo(A_STATS_1); ?></P>
<TABLE ALIGN=CENTER BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<?php
	$start_date = strftime(L_SHORT_DATE,strtotime($start_date));
	if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $start_date = str_replace(" ","",$start_date);
	?>
	<TD ALIGN=CENTER CLASS=menuTitle><?php echo(A_STATS_3." - ".sprintf(A_STATS_2,$start_date)); ?>
		<TABLE BORDER=1 CELLPADDING=5 CELLSPACING=1 WIDTH=100% CLASS="table">
			<TR CLASS=tabtitle>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">#</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Gebruikersnaam</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Login #</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Totaal aanwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Langst aanwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Afwezig gezet</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Langst afwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Bericht verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">PMs verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Cmds gebruikt</TD>
			</TR>
<?php
	echo($overall);
	echo($all_overall);
?>
		</TABLE>
	</TD>
</TR>
</TABLE>
<P>
<TABLE ALIGN=CENTER BORDER=0 CELLPADDING=3 CLASS="table">
<TR>
	<TD ALIGN=<?php echo($CellAlign); ?> CLASS=menuTitle><?php echo(sprintf(A_STATS_4,3)); ?>
		<TABLE BORDER=1 CELLPADDING=5 CELLSPACING=1 WIDTH=100% CLASS="table">
			<TR CLASS=tabtitle>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">#</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Stat datum</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Naam kamer</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Gebruiker</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Gebruikerstype</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Login #</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Laatste login</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Totaal aanwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Meeste in</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Afwezig #</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Laatst afwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Afwezig ingesteld</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Meest afwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Berichten verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">PMs verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Cmds used</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Profiel bekeken</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Profiel gecontroleerd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Afbeelding geplaastst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Video's geplaatst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Eigenschap geplaatst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">URLs geplaatst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Emails verstuurt</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Gevloekt</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Smilies gebruikt</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Verban rcvd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Gebruikers verbannen</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Kicks rcvd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Users kicked</TD>
			</TR>
<?php
	echo($display);
?>
			<TR CLASS=tabtitle>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small" COLSPAN=5>Subtotalen</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Login #</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small" COLSPAN=3>Totaal in Chat</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Afwezig #</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small" COLSPAN=3>Afwezig</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Berichten verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">PMs verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Cmds gebruikt</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small" COLSPAN=2>Profiel bekeken</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Afbeelding gebplaatst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Video's geplaatst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Eigenschap geplaatst posted</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">URLs geplaatst</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Emails verstuurd</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Gevloekt</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small">Smilies gebruikt</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small" COLSPAN=2># Verbannen</TD>
				<TD VALIGN=CENTER ALIGN="CENTER" CLASS="small" COLSPAN=2># Gekicked</TD>
			</TR>
<?php
	echo($subtotal);
?>
		</TABLE>
	</TD>
</TR>
</TABLE>
<br /><P align="right"><div align="right"><span dir="LTR" style="font-weight: 600; color:#FFD700; font-size: 7pt">
&copy; 2009<?php echo((date('Y')>"2009") ? "-".date('Y') : ""); ?> - by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>.'; return true;" title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_AUTHOR)); ?>" target=_blank>Ciprian Murariu</a></span></div>
<?php
}
else
{
?>
<P CLASS=title><?php echo(A_STATS_5) ; ?></P>
<?php
}
?>