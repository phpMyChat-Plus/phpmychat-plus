<?php
// Banished Users panel
// This sheet is diplayed when the admin wants to modify the list of banished users

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// The admin has required an action to be done
if (isset($FORM_SEND) && $FORM_SEND == 2)
{
	// A registred user have to be deleted ?
	$DELETE_MODE = (stripslashes($submit_type) == A_SHEET2_7)? 1:0;

	// Get the list of the users
	$DbLink->query("SELECT username FROM ".C_BAN_TBL);
	$users = Array();
	while (list($username) = $DbLink->next_record())
	{
		$ban_users[] = $username;
	};
	$DbLink->clean_results();

	for (reset($ban_users); $username=current($ban_users); next($ban_users))
	{
		$usrHash = md5($username);
		$VarName = "user_".$usrHash;
		if (!isset($$VarName)) continue;
		// Remove banishment
		if ($DELETE_MODE)
		{
			$VarName = "delete_".$usrHash;
			if (isset($$VarName))
			{
				$uuu = addslashes($username);
				$DbLink->query("DELETE FROM ".C_BAN_TBL." WHERE username='$uuu'");
				// Optimize the registered users table when a MySQL DB is used
				$DbLink->optimize(C_BAN_TBL);
			}
		}
		// Modify list of banished rooms for an user
		else
		{
			$VarName = "rooms_".$usrHash; $rrr = $$VarName;
			$VarName = "until_".$usrHash; $ttt = $$VarName;
			$VarName = "old_rooms_".$usrHash; $old_rrr = $$VarName;
			$VarName = "old_until_".$usrHash; $old_ttt = $$VarName;
			$VarName = "reason_".$usrHash; $reas = $$VarName;
			$VarName = "old_reason_".$usrHash; $old_reas = $$VarName;
			if ($rrr == $old_rrr && $ttt == $old_ttt && $reas == $old_reas) continue;
			$AddUntil = ($ttt == "forever" ? ", ban_until='2222222222'" : "");
			$uuu = addslashes($username);
			$DbLink->query("UPDATE ".C_BAN_TBL." SET rooms='$rrr'".$AddUntil.",reason='$reas' WHERE username='$uuu'");

			// banish the user if he's currently chatting
			if ($rrr == "*")
			{
				$DbLink->query("UPDATE ".C_USR_TBL." SET status='b' WHERE username='$uuu'");
			}
			else
			{
				$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$uuu' LIMIT 1");
				$in_room = ($DbLink->num_rows() != 0);
				if ($in_room)
				{
					list($room) = $DbLink->next_record();
					$DbLink->clean_results();
					if (room_in(addslashes($room), $rrr, $Charset)) $DbLink->query("UPDATE ".C_USR_TBL." SET status='b' WHERE username='$uuu'");
				}
				else
				{
					$DbLink->clean_results();
				};
			};
		};
	};
};

// Remove banishment of users when necessary (time for banishment expire or no room)
$ToCheck = "rooms = ''";
if (!isset($FORM_SEND)) $ToCheck = "ban_until < ".time()." OR ".$ToCheck;
$DbLink->query("DELETE FROM ".C_BAN_TBL." WHERE ".$ToCheck);
?>

<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
// Function to dinamically switch pages
function jump_Page()
{
valJump=(document.PageSelect.PageJump.options[document.PageSelect.PageJump.selectedIndex].text - 1) * 10;
document.location = '<?php echo("$From?$URLQueryBody_MoveLinks&startReg="); ?>'+valJump;
}
// -->
</SCRIPT>

<P CLASS=title><?php echo(A_SHEET2_1); ?></P>

<TABLE ALIGN=CENTER BORDER=0 CELLPADDING=3 CLASS=table>

<?php
// Ensure at least one banished user exist
$DbLink->query("SELECT COUNT(*) FROM ".C_BAN_TBL." LIMIT 1");
list($count_BanUsers) = $DbLink->next_record();
$DbLink->clean_results();
if ($count_BanUsers != 0)
{
?>
<!-- Banished users form -->
<TR>
	<TD ALIGN=CENTER>
		<FORM ACTION="<?php echo("$From?$URLQueryBody"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="Form2">
		<INPUT TYPE=hidden NAME="From" value="<?php echo($From); ?>">
		<INPUT TYPE=hidden NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
		<INPUT TYPE=hidden NAME="pmc_password" value="<?php echo($pmc_password); ?>">
		<INPUT TYPE=hidden NAME="sortBy" value="<?php echo($sortBy); ?>">
		<INPUT TYPE=hidden NAME="sortOrder" value="<?php echo($sortOrder); ?>">
		<INPUT TYPE=hidden NAME="startReg" value="<?php echo($startReg); ?>">
		<INPUT TYPE=hidden NAME="FORM_SEND" value="2">
		<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=1 WIDTH=100%>
		<TR CLASS=tabtitle>
			<TD VALIGN=CENTER ALIGN=CENTER>
				&nbsp;
			</TD>
			<TD VALIGN=CENTER ALIGN="<?php echo($CellAlign); ?>">
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=username"); if ($sortBy == "username") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET1_2); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=ip"); if ($sortBy == "ip") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET2_2); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER CLASS=tabtitle>
				<?php echo(A_SHEET2_3)?> *
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER CLASS=tabtitle>
				<?php echo(A_SHEET2_4)?>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER CLASS=tabtitle>
				<?php echo(A_SHEET2_9)?>
			</TD>
		</TR>

		<?php
		function special_char($str,$lang)
		{
			return ($lang ? htmlentities($str) : htmlspecialchars($str));
		}

		$lastPage_startReg = floor(($count_BanUsers - 1) / 10) * 10;
		if ($startReg > $lastPage_startReg) $startReg = $lastPage_startReg;
		if (C_DB_TYPE == "mysql") $limits = " LIMIT $startReg,10";
		elseif (C_DB_TYPE == "pgsql") $limits = " LIMIT 10 OFFSET $startReg";
		else $limits = "";

		$DbLink->query("SELECT username,latin1,ip,rooms,ban_until,reason FROM ".C_BAN_TBL." ORDER BY $sortBy $sortOrder".$limits);
		while (list($username,$Latin1,$ip,$rooms,$until,$reason) = $DbLink->next_record())
		{
			$usrHash = md5($username);
			?>
			<TR>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<INPUT TYPE="hidden" NAME="user_<?php echo($usrHash)?>" VALUE="1">
					<INPUT type=checkbox name="delete_<?php echo($usrHash)?>" value="1">
				</TD>
				<TD VALIGN=CENTER ALIGN="<?php echo($CellAlign); ?>">
					<?php echo(special_char($username,$Latin1)); ?>
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<?php echo($ip); ?>
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<INPUT type=text name="rooms_<?php echo($usrHash)?>" value="<?php echo(stripslashes(htmlspecialchars($rooms)))?>" SIZE="30">
					<INPUT type="hidden" name="old_rooms_<?php echo($usrHash)?>" value="<?php echo(htmlspecialchars($rooms))?>">
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<SELECT name="until_<?php echo($usrHash)?>">
						<?php
						 // banished users for more than one year -> forever
						$ForeverVal = time() + (60 * 60 * 24 * 365);
						if ($until > $ForeverVal)
						{
							?>
							<OPTION value="forever" SELECTED><?php echo(A_SHEET2_5); ?></OPTION>
							<?php
						}
						else
						{
							?>
							<OPTION value="date" SELECTED><?php echo(date("M j, Y - h:i a",$until + C_TMZ_OFFSET*60*60)); ?></OPTION>
							<OPTION value="forever"><?php echo(A_SHEET2_5); ?></OPTION>
							<?php
						};
						?>
					</SELECT>
					<INPUT type="hidden" name="old_until_<?php echo($usrHash)?>" value="<?php echo($until > $ForeverVal ? "forever" : "date")?>">
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<INPUT type=text name="reason_<?php echo($usrHash)?>" value="<?php echo(stripslashes(htmlspecialchars($reason)))?>" size="15">
					<INPUT type="hidden" name="old_reason_<?php echo($usrHash)?>" value="<?php echo(htmlspecialchars($reason))?>">
				</TD>
			</TR>
			<?php
		};
		$DbLink->clean_results();
		?>
		<TR>
			<TD VALIGN=CENTER ALIGN=CENTER COLSPAN=6>
				<FONT size=-1>* <?php echo(A_SHEET2_6)?></FONT>
			</TD>
		</TR>
		<TR><TD>&nbsp;</TD></TR>
		<TR>
			<TD VALIGN=CENTER ALIGN=CENTER COLSPAN=5>
				<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET2_7); ?>">
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET1_7); ?>">
			</TD>
		</TR>
		</TABLE>
		</FORM>

		<!-- Navigation cells at the footer -->
		<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=0 CLASS="tabletitle" WIDTH=100%>
		<TR>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=70 HEIGHT=20 CLASS=tabtitle>
			<?php
			if ($startReg > 0)
			{
				$downReg = $startReg - 10;
				if ($downReg < 0) $downReg = "0";
				?>
				&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks&startReg=0"); ?>"><IMG SRC="images/admin/<?php echo($BeginGif); ?>" HEIGHT=20 WIDTH=21 BORDER=0></A>
				&nbsp;&nbsp;&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks&startReg=$downReg"); ?>"><IMG SRC="images/admin/<?php echo($DownGif); ?>" HEIGHT=20 WIDTH=20 BORDER=0></A>
				<?php
			}
			else
			{
				echo("&nbsp");
			};
			?>
			</TD>
			<TD ALIGN=CENTER VALIGN=CENTER HEIGHT=20 CLASS=tabtitle>
				<SPAN CLASS="small">
				<?php
				$PageNum = ceil(($startReg + 1) / 10);
				$PagesCount = ceil($count_BanUsers / 10);
				if ($L == "hungarian") echo(sprintf(A_PAGE_CNT,$PageNum,$PagesCount)."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;$count_BanUsers ".mb_convert_case(A_MENU_21,MB_CASE_LOWER,$Charset));
				else echo(sprintf(A_PAGE_CNT,$PageNum,$PagesCount)."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;$count_BanUsers ".(($count_BanUsers == 1) ? mb_convert_case(A_MENU_21,MB_CASE_LOWER,$Charset) : mb_convert_case(A_MENU_2,MB_CASE_LOWER,$Charset)));
				?>
				</SPAN>
			</TD>
				<?php
			if ($PagesCount > 1)
			{
			?>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER HEIGHT=20 CLASS=tabtitle>
			<?php
			print "<form name=\"PageSelect\">\n";
			print "<select name=\"PageJump\" onChange=\"jump_Page()\">\n";
				$i=1;
				while ($i <= $PagesCount)
				{
			        print "<option value=\"$i\"";
					if ($i==$PageNum) print " selected";
					print ">$i</option>\n";
		        $i++;
				}
		        print "</select>\n</form>\n";
			?>
			</TD>
			<?php
			}
				?>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER WIDTH=70 HEIGHT=20 CLASS=tabtitle>
			<?php
			if ($startReg < $lastPage_startReg)
			{
				$upReg = $startReg + 10;
				?>
				&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks&startReg=$upReg"); ?>"><IMG SRC="images/admin/<?php echo($UpGif); ?>" HEIGHT=20 WIDTH=20 BORDER=0></A>
				&nbsp;&nbsp;&nbsp;<A HREF="<?php echo("$From?$URLQueryBody_MoveLinks&startReg=$lastPage_startReg"); ?>"><IMG SRC="images/admin/<?php echo($EndGif); ?>" HEIGHT=20 WIDTH=21 BORDER=0></A>
				<?php
			}
			else
			{
				echo("&nbsp");
			};
			?>
			</TD>
		</TR>
		</TABLE>
	</TD>
</TR>

<?php
}
else
{
?>

<TR>
	<TD ALIGN=CENTER CLASS=error><?php echo(A_SHEET2_8); ?></TD>
</TR>

<?php
};
?>

</TABLE>

<?php
?>