<?php
// Send Email panel
// This sheet is diplayed when the admin wants to send an e-mail to registered users
// Credit for it goes to Christian Hacker <c.hacker@dreamer-chat.de>

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

$Sender_Name = (eregi("your name",C_ADMIN_NAME) && C_ADMIN_NAME != "") ? "" : C_ADMIN_NAME;		// May also be the name of your site
$Sender_Name1 = $Sender_Name;		// unformated
$Chat_URL = (C_CHAT_URL == "./") ? "" : C_CHAT_URL;	// To be send as a signature

# Is the OS Windows or Mac or Linux
if (stristr(PHP_OS,'win')) {
  $eol="\r\n";
} elseif (stristr(PHP_OS,'mac')) {
  $eol="\r";
} else {
  $eol="\n";
}

// The admin has required an action to be done
if (isset($FORM_SEND) && $FORM_SEND == 4)
{
	// Sending the mails when at least an user has been selected and subject and message have been filled
	if (count($SendTo) == 0) $SendTo = array();
	if (count($SendToBan) == 0) $SendToBan = array();
	$SendTo = array_merge($SendTo,$SendToBan);
	$SendToExtra = array();
	if (isset($emails) && $emails != "") $SendToExtra = explode(",",$emails);
	if ($emails != "") $SendTo = array_merge($SendTo,$SendToExtra);
	if (count($SendTo) > 0 && trim($subject) != "" && trim($message) != "")
	{
		if ($sign) $message .= $eol.$signature;
		include('mail4admin.lib.php');
		$MultiSend = "";
		for (reset($SendTo); $mailTo=current($SendTo); next($SendTo))
		{
			$MultiSend .= $mailTo.", ";
			if ($MultiSend == "") break;
		};
		$Send = send_email_admin($MultiSend,$subject,$message,$pmc_email,$BCC);
		if ($Ccopy) $MessCc = "<tr><td width=1% nowrap=\"nowrap\"><b>Cc:</b></td><td><b>".$pmc_username."</b> &lt;".$pmc_email."></td></tr>";
		$Success = "<table border=1 width=70% class=\"msg2\"><tr><td width=1% nowrap=\"nowrap\"><b>From:</b></td><td><b>".$Sender_Name1."</b> &lt;".$Sender_email."></td></tr><tr><td width=1% nowrap=\"nowrap\" class=\"success\"><b>".A_SHEET4_2."</b></td><td>".(!$BCC ? "<b>".str_replace(">,",">,<b>",str_replace("<","</b>&lt;",implode(", ",$SendTo))) : "")."</td></tr>".$MessCc."<tr><td width=1% nowrap=\"nowrap\" class=\"error\"><b>Bcc:</b></td><td>".($BCC ? "<b>".str_replace(">,",">,<b>",str_replace("<","</b>&lt;",implode(", ",$SendTo))) : "")."</td></tr><tr><td width=1% nowrap=\"nowrap\"><b>".A_SHEET4_4."</b></td><td>".stripslashes($subject)."</td></tr><tr><td width=1% nowrap=\"nowrap\"><b>".A_SHEET4_5."</b></td><td>".stripslashes(str_replace("\n","<br />",$message))."</td></tr></table>";
		$Message = ($Send ? A_SHEET4_7.$Success : A_SHEET4_8);
		$MsgStyle = ($Send ? "success" : "error");
	}
	else
	{
		$Message = A_SHEET4_9;
		$MsgStyle = "error";
	};
};
?>

<P CLASS=title><?php echo(A_SHEET4_1); ?></P>

<?php
if (isset($Message) && $Message != "") echo("<P CLASS=\"$MsgStyle\">$Message</P><br />\n");
?>

<TABLE ALIGN=CENTER CLASS=table>

<?php
// Display an error message if the administrator doesn't complete required variables in 'mail4admin.lib.php'
if (isset($ReqVar) && $ReqVar == "1")
{
	?>
	<TR>
		<TD ALIGN=CENTER CLASS=error><?php echo(A_SHEET4_0); ?></TD>
	</TR>

	<?php
}
else
{
	// Ensure at least one registered user exist (except the administrator) before displaying the mail form
	$DbLink->query("SELECT COUNT(*) FROM ".C_REG_TBL." WHERE username != '$pmc_username' LIMIT 1");
	list($count_RegUsers) = $DbLink->next_record();
	$DbLink->clean_results();
	?>
	<!-- Mail form -->
	<TR>
		<TD ALIGN=CENTER>
			<FORM ACTION="<?php echo("$From?$URLQueryBody"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="MailForm">
			<INPUT TYPE=hidden NAME="From" value="<?php echo($From); ?>">
			<INPUT TYPE=hidden NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
			<INPUT TYPE=hidden NAME="pmc_password" value="<?php echo($pmc_password); ?>">
			<INPUT TYPE=hidden NAME="FORM_SEND" value="4">
			<TABLE BORDER=0 CELLSPACING=2 WIDTH=100%>
			<TR>

				<!-- Addressees list -->
				<TD VALIGN=TOP>
				<TABLE BORDER=0 WIDTH=100%>
	<?php
	if ($count_RegUsers != 0)
	{
		$DbLink->query("SELECT COUNT(*) FROM ".C_BAN_TBL);
		list($count_BanUsers) = $DbLink->next_record();
	?>
				<TR>
					<TD ALIGN=CENTER><?php echo("Put all recipients in the <b>'Bcc'</b> field"); ?>
					<INPUT TYPE="checkbox" NAME="BCC" value="1" checked>
					</TD>
				</TR>
				<TR>
					<TD ALIGN=CENTER><?php echo(A_SHEET4_2." ".A_MENU_1); ?></TD>
				</TR>
				<TR>
					<TD ALIGN=CENTER>
						<SELECT NAME="SendTo[]" MULTIPLE SIZE=<?php echo($count_BanUsers ? 9 : 15); ?>>
						<?php
						if($count_BanUsers)
						{
							$DbLink->query("SELECT reg.username,reg.email FROM ".C_REG_TBL." reg RIGHT JOIN ".C_BAN_TBL." ban ON reg.username != ban.username WHERE reg.email != 'bot@bot.com' AND reg.email != 'quote@quote.com' AND reg.email != '' ORDER BY reg.username");
						}
						else
						{
							$DbLink->query("SELECT username,email FROM ".C_REG_TBL." WHERE email != 'bot@bot.com' AND email != 'quote@quote.com' AND email != '' ORDER BY username");
						}
						while (list($U,$EMail) = $DbLink->next_record())
						{
							if ($U != $pmc_username) echo("<OPTION VALUE=\"".$U." <".$EMail.">\">".$U." (".$EMail.")</OPTION>");
							else $pmc_email = $EMail;
						}
						$DbLink->clean_results();
						?>
					</TD>
				</TR>
			<?php
			if($count_BanUsers)
			{
			?>
				<TR>
					<TD ALIGN=CENTER>
						<INPUT TYPE=button VALUE="<?php echo(A_SHEET4_3); ?>" onClick="for (var i = 0; i < document.forms['MailForm'].elements['SendTo[]'].options.length; i++) {document.forms['MailForm'].elements['SendTo[]'].options[i].selected=true;}">
						&nbsp;<INPUT TYPE=button VALUE="<?php echo(A_SHEET4_12); ?>" onClick="for (var i = 0; i < document.forms['MailForm'].elements['SendTo[]'].options.length; i++) {document.forms['MailForm'].elements['SendTo[]'].options[i].selected=false;}">
						</SELECT>
						<INPUT TYPE=hidden NAME=pmc_email VALUE="<?php echo($pmc_email); ?>">
					</TD>
				</TR>
				<TR>
					<TD ALIGN=CENTER><?php echo(A_SHEET4_2." ".A_MENU_2); ?></TD>
				</TR>
				<TR>
					<TD ALIGN=CENTER>
						<SELECT NAME="SendToBan[]" MULTIPLE SIZE=3>
						<?php
						$DbLink->query("SELECT reg.username,reg.email FROM ".C_REG_TBL." reg RIGHT JOIN ".C_BAN_TBL." ban ON reg.username = ban.username WHERE reg.email != 'bot@bot.com' AND reg.email != 'quote@quote.com' AND reg.email != '' ORDER BY reg.username");
						while (list($UB,$EMailB) = $DbLink->next_record())
						{
							if ($UB != $pmc_username) echo("<OPTION VALUE=\"".$UB." <".$EMailB.">\">".$UB." (".$EMailB.")</OPTION>");
							else $pmc_email = $EMailB;
						}
						$DbLink->clean_results();
						?>
					</TD>
				</TR>
				<?php
				}
				?>
				<TR>
					<TD ALIGN=CENTER>
						<INPUT TYPE=button VALUE="<?php echo(A_SHEET4_3); ?>" onClick="for (var i = 0; i < document.forms['MailForm'].elements['SendToBan[]'].options.length; i++) {document.forms['MailForm'].elements['SendToBan[]'].options[i].selected=true;}">
						&nbsp;<INPUT TYPE=button VALUE="<?php echo(A_SHEET4_12); ?>" onClick="for (var i = 0; i < document.forms['MailForm'].elements['SendToBan[]'].options.length; i++) {document.forms['MailForm'].elements['SendToBan[]'].options[i].selected=false;}">
						</SELECT>
						<INPUT TYPE=hidden NAME=pmc_email VALUE="<?php echo($pmc_email); ?>">
					</TD>
				</TR>
		<?php
		if (isset($pmc_email))
		{
		?>
			<TR><TD ALIGN=CENTER>
			Cc: <INPUT TYPE="text" NAME="CarbonCopy" SIZE="35" VALUE="<?php echo($pmc_username." <".$pmc_email.">"); ?>" READONLY>&nbsp;<INPUT TYPE="checkbox" NAME="Ccopy" value="1" checked></TD></TR>
		<?php
		}
	}
	else
	{
	?>
		<TR>
		<TD ALIGN=CENTER CLASS=error><?php echo(A_SHEET1_8); ?><br /><br /><br /><br /></TD>
		</TR>
		<TR>
			<TD ALIGN=CENTER><?php echo(A_SHEET4_2); ?></TD>
		</TR>
	<?php
	}
	?>
				<TR>
					<TD ALIGN=CENTER>
					<?php echo(A_SHEET4_10); ?><br />
						<INPUT TYPE="text" NAME="emails" SIZE="45" MAXLENGTH="500" VALUE="">
					</TD>
				</TR>
				</TABLE>
				</TD>

				<TD></TD>

				<!-- Subject and message -->
				<TD>
				<TABLE BORDER=0 WIDTH=100%>
				<TR>
					<TD VALIGN=MIDDLE ALIGN="<?php echo($CellAlign); ?>"><?php echo(A_SHEET4_4); ?></TD>
					<TD VALIGN=MIDDLE ALIGN="<?php echo($CellAlign); ?>" COLSPAN=2>
						<INPUT TYPE="text" NAME="subject" SIZE="53" VALUE="<?php echo("[".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)."] - in the news"); ?>">
					</TD>
				</TR>
				<TR>
					<TD VALIGN=TOP ALIGN="<?php echo($CellAlign); ?>"><?php echo(A_SHEET4_5); ?></TD>
					<TD VALIGN=MIDDLE ALIGN=CENTER COLSPAN=2>
						<TEXTAREA NAME="message" WRAP="on" COLS="55" ROWS="14"></TEXTAREA>
					</TD>
				</TR>
				<TR><TD>&nbsp;</TD></TR>
				<TR>
					<TD VALIGN=MIDDLE ALIGN="<?php echo($InvCellAlign); ?>"><?php echo(A_SHEET4_11); ?>
				&nbsp;<input type="checkbox" name="sign" value="1" checked></TD>
				<TD VALIGN=MIDDLE ALIGN="<?php echo($CellAlign); ?>">
				<TEXTAREA NAME="signature" WRAP="on" COLS="35" ROWS="4"><?php echo(C_MAIL_GREETING.$eol.$Sender_Name1.$eol.$Chat_URL); ?></TEXTAREA>
					</TD>
					<TD VALIGN=BOTTOM ALIGN="<?php echo($InvCellAlign); ?>">
						<INPUT style="color:#ff0000; font-weight:800" TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET4_6); ?>">
					</TD>
				</TR>
				</TABLE>
				</TD>
			</TR>
			</TABLE>
			</FORM>
		</TD>
	</TR>
	<?php
};
?>
</TABLE>
<?php
?>