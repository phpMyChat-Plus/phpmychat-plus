<?php
// Registered Users panel
// This sheet is diplayed when the admin wants to modify perms for registered users
// or remove the profiles of some of them

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.
  while(list($name,$value) = each($_GET))
  {
           $$name = $value;
  };

// The admin has required an action to be done
if (isset($FORM_SEND) && $FORM_SEND == 1)
{
	// A registred user have to be deleted or banished?
	$DELETE_MODE = (stripslashes($submit_type) == A_SHEET1_6)? 1:0;
	$BANISH_MODE = (stripslashes($submit_type) == A_SHEET1_9)? 1:0;

	// Get the list of the users
	$DbLink->query("SELECT username,perms,join_room FROM ".C_REG_TBL." WHERE email != 'bot@bot.com' AND email != 'quote@quote.com' AND username != '$pmc_username'");
	$users = Array();
	while (list($username, $perms, $join_room) = $DbLink->next_record())
	{
		$users[] = $username;
	}
	$DbLink->clean_results();

	for (reset($users); $username=current($users); next($users))
	{
		$usrHash = md5($username);
		$VarName = "user_".$usrHash;
		if (!isset($$VarName)) continue;
		// Delete a profile after having sent a message to the user if he is connected
		if ($DELETE_MODE)
		{
			$VarName = "selected_".$usrHash;
			if (isset($$VarName))
			{
				$uuu = addslashes($username);
				$DbLink->query("DELETE FROM ".C_REG_TBL." WHERE username='$uuu'");
				$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$uuu' LIMIT 1");
				$in_room = ($DbLink->num_rows() != 0);
				if ($in_room)
				{
					list($room) = $DbLink->next_record();
					$DbLink->clean_results();
					$DbLink->query("SELECT type FROM ".C_MSG_TBL." WHERE room='".addslashes($room)."' LIMIT 1");
					list($type) = $DbLink->next_record();
					$DbLink->clean_results();
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='u' WHERE username='$uuu'");
					$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$type', '".addslashes($room)."', 'SYS delreg', '', ".time().", '$uuu', 'L_ADM_2', '', '')");
				};
				// Optimize the registered users table when a MySQL DB is used
				$DbLink->optimize(C_REG_TBL);
			};
		}
		// Banish an user
		elseif ($BANISH_MODE)
		{
			$VarName = "reason"; $reason = $$VarName;
			$VarName = "selected_".$usrHash;
			if (isset($$VarName))
			{
				$uuu = addslashes($username);
				$DbLink->query("SELECT latin1,ip FROM ".C_REG_TBL." WHERE username='$uuu' LIMIT 1");
				list($Latin1, $IP) = $DbLink->next_record();
				$DbLink->clean_results();
				$DbLink->query("SELECT count(*) FROM ".C_BAN_TBL." WHERE username='$uuu' LIMIT 1");
				list($Nb) = $DbLink->next_record();
				$DbLink->clean_results();
				if ($Nb == "0")
				{
					$Until = time() + round(C_BANISH * 60 * 60 * 24);
					if ($Until > 2222222222) $Until = "2222222222";
					$DbLink->query("INSERT INTO ".C_BAN_TBL." VALUES ('$uuu','$Latin1','$IP','*','$Until','$reason')");
				}
				elseif ($reason != "")
				{
					$DbLink->query("UPDATE ".C_BAN_TBL." SET reason = '$reason' where username='$uuu'");
				}
				$Warning = A_SHEET1_10;
			};
		}
		// Modify perms for a registered user and send him a message if he is connected
		else
		{
			$VarName = "perms_".$usrHash; $ppp = $$VarName;
			$VarName = "rooms_".$usrHash; $rrr = $$VarName;
			$VarName = "join_room_".$usrHash; $join_rrr = $$VarName;
			$VarName = "old_perms_".$usrHash; $old_ppp = $$VarName;
			$VarName = "old_rooms_".$usrHash; $old_rrr = $$VarName;
			$VarName = "old_join_room_".$usrHash; $old_join_rrr = $$VarName;
			if ($ppp == $old_ppp && $rrr == $old_rrr && $join_rrr == $old_join_rrr) continue;
			$uuu = addslashes($username);
			$DbLink->query("UPDATE ".C_REG_TBL." SET perms='$ppp', rooms='$rrr', join_room='$join_rrr' WHERE username='$uuu'");
			$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$uuu' LIMIT 1");
			$in_room = ($DbLink->num_rows() != 0);
			if ($in_room)
			{
				list($room) = $DbLink->next_record();
				$DbLink->clean_results();

				// Find the changes in moderated rooms list
				if ($ppp != $old_ppp)
				{
					if ($ppp == 'user')
						$diff_rooms = explode(",", $old_rrr);
					else
						$diff_rooms = explode(",", $rrr);
				}
				else
				{
					$old_rooms_Tab = explode(",",$old_rrr);
					$new_rooms_Tab = explode(",",$rrr);
					$diff_rooms_Tab = array();
					for (reset($old_rooms_Tab); $room2Check=current($old_rooms_Tab); next($old_rooms_Tab))
					{
						if ($room2Check == "") continue;
						if (!room_in($room2Check, $rrr, $Charset)) $diff_rooms_Tab[] = $room2Check;
					}
					for (reset($new_rooms_Tab); $room2Check=current($new_rooms_Tab); next($new_rooms_Tab))
					{
						if ($room2Check == "") continue;
						if (!room_in($room2Check, $old_rrr, $Charset)) $diff_rooms_Tab[] = $room2Check;
					}
					unset($old_rooms_Tab);
					unset($new_rooms_Tab);

					if (count($diff_rooms_Tab) > 0)
						$diff_rooms = str_replace(",,",",",ereg_replace("^,|,$","",implode(",",$diff_rooms_Tab)));
					unset($diff_rooms_Tab);
				}

				// Send a message to the user if he chats into one of the 'diff' rooms
				if (room_in(addslashes($room), $diff_rooms, $Charset) || room_in("*", $rrr, $Charset) || room_in("*", $diff_rooms, $Charset) || (($ppp == 'admin') || ($old_ppp == 'admin')) || (($ppp == 'topmod') || ($old_ppp == 'topmod')))
				{
					if ($ppp == 'admin')// user becomes user for the room he chats into
					{
						$status = "a";
						$messagead = "sprintf(L_ADM_3, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
					}
					elseif ($ppp == 'topmod')// user becomes user for the room he chats into
					{
						$status = "t";
						if($old_ppp != 'admin') $messagead = "sprintf(L_ADM_3, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
					}
					elseif ($ppp == 'moderator' && (room_in(addslashes($room), $rrr, $Charset) || room_in("*", $rrr, $Charset)))	// user becomes moderator for the room he chats into
					{
						$status = "m";
						$message = "sprintf(L_MODERATOR, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
						if ($old_ppp == 'admin' || $old_ppp == 'topmod') $messagead = "sprintf(L_ADM_4, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
					}
					elseif ($ppp == 'user')// user becomes user for the room he chats into
					{
						$status = "r";
						if ($old_ppp == 'moderator') $message = "sprintf(L_ADM_1, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
						if ($old_ppp == 'admin' || $old_ppp == 'topmod') $messagead = "sprintf(L_ADM_4, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
					}
					else // user becomes user for the room he chats into
					{
						$status = "r";
						$message = "sprintf(L_ADM_1, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
						if ($old_ppp == 'admin' || $old_ppp == 'topmod') $messagead = "sprintf(L_ADM_4, \"".addslashes(htmlspecialchars(stripslashes($uuu)))."\")";
					};
					$DbLink->query("UPDATE ".C_USR_TBL." SET status='$status' WHERE username='$uuu'");
					$DbLink->query("SELECT type FROM ".C_MSG_TBL." WHERE room='".addslashes($room)."' LIMIT 1");
					list($type) = $DbLink->next_record();
					$DbLink->clean_results();
					if (isset($message)) $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$type', '".addslashes($room)."', 'SYS promote', '', ".time().", '', '$message', '', '')");
					if (isset($messagead)) $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$type', '*', 'SYS promote', '', ".time().", '', '$messagead', '', '')");
				};
			}
			else
			{
				$DbLink->clean_results();
			};
		};
	};
};

// Remove profiles of users that have not been chatting for a time > C_REG_DEL
if (!isset($FORM_SEND) && C_REG_DEL != 0) $DbLink->query("DELETE FROM ".C_REG_TBL." WHERE reg_time < ".(time() - C_REG_DEL * 60 * 60 * 24)." AND perms != 'admin' AND perms != 'topmod' AND perms != 'moderator'");

// Remove moderator status if no room is specified
$DbLink->query("UPDATE ".C_REG_TBL." SET perms='user' WHERE perms='moderator' AND rooms=''");
?>

<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
<!--
// Ensure an user for who a room name is entered have moderator status
function reset_perms(user)
{
	if (document.all) {
		var1 = document.all["perms_" + user];
		var2 = document.all["rooms_" + user];
	} else if (document.forms['Form1'].elements) {
		var1 = document.forms['Form1'].elements["perms_" + user];
		var2 = document.forms['Form1'].elements["rooms_" + user];
	} else {
		return;
	}
	i = (var2.value == '' ? 0:1);
	var1.options[i].selected = true;
}

// Function to dinamically switch pages
function jump_Page()
{
valJump=(document.PageSelect.PageJump.options[document.PageSelect.PageJump.selectedIndex].text - 1) * 10;
document.location = '<?php echo("$From?$URLQueryBody_MoveLinks&startReg="); ?>'+valJump;
}
// -->
</SCRIPT>
<P CLASS=title><?php echo(A_SHEET1_1); ?></P>
<?php
if (isset($Warning) && $Warning != "") echo("<P CLASS=\"success\">$Warning</SPAN></P><br />\n");
?>
<TABLE ALIGN=CENTER BORDER=0 CELLPADDING=3 CLASS="table">
<?php
// Ensure at least one registered user exist (except the logged in administrator) before displaying the modify status
$DbLink->query("SELECT COUNT(*) FROM ".C_REG_TBL." WHERE email != 'bot@bot.com' AND email != 'quote@quote.com' AND username != '$pmc_username' LIMIT 1");
list($count_RegUsers) = $DbLink->next_record();
$DbLink->clean_results();
if ($count_RegUsers != 0)
{
?>
<!-- Registered users form -->
<TR>
	<TD ALIGN=CENTER>
		<FORM ACTION="<?php echo("$From?$URLQueryBody"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="Form1">
		<INPUT TYPE=hidden NAME="From" value="<?php echo($From); ?>">
		<INPUT TYPE=hidden NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
		<INPUT TYPE=hidden NAME="pmc_password" value="<?php echo($pmc_password); ?>">
		<INPUT TYPE=hidden NAME="sortBy" value="<?php echo($sortBy); ?>">
		<INPUT TYPE=hidden NAME="sortOrder" value="<?php echo($sortOrder); ?>">
		<INPUT TYPE=hidden NAME="startReg" value="<?php echo($startReg); ?>">
		<INPUT TYPE=hidden NAME="FORM_SEND" value="1">
		<TABLE BORDER=0 CELLPADDING=5 CELLSPACING=1 WIDTH=100%>
		<TR CLASS=tabtitle>
			<TD VALIGN=CENTER ALIGN=CENTER>
				&nbsp;
			</TD>
			<TD VALIGN=CENTER ALIGN="<?php echo($CellAlign); ?>">
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=username"); if ($sortBy == "username") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET1_2); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=login_counter"); if ($sortBy == "login_counter") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(L_LOGIN_COUNT); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=reg_time"); if ($sortBy == "reg_time") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET1_11); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=ip"); if ($sortBy == "ip") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET2_2); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=perms"); if ($sortBy == "perms") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET1_3); ?></A>
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER CLASS=tabtitle>
				<?php echo(A_SHEET1_4)?> *
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER CLASS=tabtitle>
				<A HREF="<?php echo("$From?$URLQueryBody_SortLinks&sortBy=join_room"); if ($sortBy == "join_room") echo("&sortOrder=$New_sortOrder"); ?>"><?php echo(A_SHEET1_13); ?></A> **
			</TD>
		</TR>

		<?php
		function special_char($str,$lang)
		{
			return ($lang ? htmlentities($str) : htmlspecialchars($str));
		}

		$lastPage_startReg = floor(($count_RegUsers - 1) / 10) * 10;
		if ($startReg > $lastPage_startReg) $startReg = $lastPage_startReg;
		if (C_DB_TYPE == "mysql") $limits = " LIMIT $startReg,10";
		elseif (C_DB_TYPE == "pgsql") $limits = " LIMIT 10 OFFSET $startReg";
		else $limits = "";

		$DbLink->query("SELECT username,latin1,perms,rooms,reg_time,ip,login_counter,join_room FROM ".C_REG_TBL." WHERE email != 'bot@bot.com' AND email != 'quote@quote.com' AND username != '$pmc_username' ORDER BY $sortBy $sortOrder".$limits);
		$bannished_user = "";
		$bannished_ip = "";
		$DbLinkban = new DB;
		while (list($username,$Latin1,$perms,$rooms,$lastTime,$IP,$login_counter,$join_room) = $DbLink->next_record())
		{
	   $DbLinkban->query("SELECT username,reason FROM ".C_BAN_TBL." WHERE username='$username' LIMIT 1");
	   list($Nb,$reason) = $DbLinkban->next_record();
	   $DbLinkban->clean_results();
	   if ($reason != "") $reason = " (".L_HELP_REASON.": ".$reason.")";
	   if ($Nb) $bannished_user = "&nbsp;<img src=images/bannished.gif alt='".A_MENU_21.$reason."' title='".A_MENU_21.$reason."'>";
	   $DbLinkban->query("SELECT ip,reason FROM ".C_BAN_TBL." WHERE ip='$IP' LIMIT 1");
	   list($NbIP,$reasonIP) = $DbLinkban->next_record();
	   $DbLinkban->clean_results();
	   if ($reasonIP != "") $reasonIP = " (".L_HELP_REASON.": ".$reasonIP.")";
	   if ($NbIP) $bannished_ip = "&nbsp;<img src=images/bannished.gif alt='".A_MENU_21.$reasonIP."' title='".A_MENU_21.$reasonIP."'>";
		// Restricted rooms mod by Ciprian
		$enab_init = utf8_substr(L_ENABLED, 0, ($L == 'serbian_latin') ? '2' : '1');
		$disab_init = utf8_substr(L_DISABLED, 0, ($L == 'serbian_latin') ? '2' : '1');
		$res_init = utf8_substr(L_RESTRICTED, 0, 1);
			$usrHash = md5($username);
			?>
			<TR>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<INPUT TYPE="hidden" NAME="user_<?php echo($usrHash)?>" VALUE="1">
					<INPUT type=checkbox name="selected_<?php echo($usrHash)?>" value="1">
				</TD>
				<TD VALIGN=CENTER ALIGN="<?php echo($CellAlign); ?>">
					<B><?php echo(special_char($username,$Latin1)."".$bannished_user);?></B>
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<FONT size=-2><?php echo($login_counter);?></FONT>
				</TD>
				<TD VALIGN=CENTER ALIGN="<?php echo($CellAlign); ?>">
					<FONT size=-2><?php echo(date("M j, Y - h:i a",$lastTime + C_TMZ_OFFSET*60*60));?></FONT>
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<FONT size=-2><?php echo($IP."".$bannished_ip); ?></FONT>
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<SELECT name="perms_<?php echo($usrHash)?>">
						<OPTION value="user"<?php if($perms=="user") echo(" SELECTED")?>><?php echo(A_USER)?></OPTION>
						<OPTION value="moderator"<?php if($perms=="moderator") echo(" SELECTED")?>><?php echo(A_MODER)?></OPTION>
						<OPTION value="topmod"<?php if($perms=="topmod") echo(" SELECTED")?>><?php echo(A_TOPMOD)?></OPTION>
						<OPTION value="admin"<?php if($perms=="admin") echo(" SELECTED")?>><?php echo(A_ADMIN)?></OPTION>
					</SELECT>
					<INPUT type="hidden" name="old_perms_<?php echo($usrHash)?>" value="<?php echo($perms)?>">
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<INPUT type=text name="rooms_<?php echo($usrHash)?>" value="<?php echo(stripslashes(htmlspecialchars($rooms)))?>" SIZE="15" onChange="reset_perms('<?php echo($usrHash)?>');">
					<INPUT type="hidden" name="old_rooms_<?php echo($usrHash)?>" value="<?php echo(htmlspecialchars($rooms))?>">
				</TD>
				<TD VALIGN=CENTER ALIGN=CENTER>
					<SELECT name="join_room_<?php echo($usrHash)?>"<?php if($perms=="admin" || $perms=="topmod") echo(" DISABLED")?>>
						<OPTION value=""<?php if($join_room=="") echo(" SELECTED")?>><?php echo(A_SHEET1_14)?></OPTION>
						<OPTION value="*"<?php if($join_room=="*") echo(" SELECTED")?>><?php echo(A_SHEET1_15)?></OPTION>
						<OPTION value="ROOM1"<?php if($join_room=="ROOM1") echo(" SELECTED")?>><?php echo(ROOM1.($EN_ROOM1 ? " [".$enab_init."]" : " [".$disab_init."]").($RES_ROOM1 ? " [".$res_init."]" : ""))?></OPTION>
						<OPTION value="ROOM2"<?php if($join_room=="ROOM2") echo(" SELECTED")?>><?php echo(ROOM2.($EN_ROOM2 ? " [".$enab_init."]" : " [".$disab_init."]").($RES_ROOM2 ? " [".$res_init."]" : ""))?></OPTION>
						<OPTION value="ROOM3"<?php if($join_room=="ROOM3") echo(" SELECTED")?>><?php echo(ROOM3.($EN_ROOM3 ? " [".$enab_init."]" : " [".$disab_init."]").($RES_ROOM3 ? " [".$res_init."]" : ""))?></OPTION>
						<OPTION value="ROOM4"<?php if($join_room=="ROOM4") echo(" SELECTED")?>><?php echo(ROOM4.($EN_ROOM4 ? " [".$enab_init."]" : " [".$disab_init."]").($RES_ROOM4 ? " [".$res_init."]" : ""))?></OPTION>
						<OPTION value="ROOM5"<?php if($join_room=="ROOM5") echo(" SELECTED")?>><?php echo(ROOM5.($EN_ROOM5 ? " [".$enab_init."]" : " [".$disab_init."]").($RES_ROOM5 ? " [".$res_init."]" : ""))?></OPTION>
					</SELECT>
					<INPUT type="hidden" name="old_join_room_<?php echo($usrHash)?>" value="<?php echo($join_room)?>">
				</TD>
			</TR>
			<?php
		$bannished_user = "";
		$bannished_ip = "";
		};
		$DbLink->clean_results();
		?>
		<TR>
			<TD VALIGN=CENTER ALIGN=CENTER COLSPAN=8>
				<FONT size=-1>
					* <?php echo(A_SHEET1_5)?><br />
					** <?php echo(A_SHEET1_16)?><br />
					[<?php echo($enab_init)?>] = <?php echo(L_ENABLED)?>; [<?php echo($disab_init)?>] = <?php echo(L_DISABLED)?>; [<?php echo($res_init)?>] = <?php echo(L_RESTRICTED)?>.
				</FONT>
			</TD>
		</TR>
		<TR><TD>&nbsp;</TD></TR>
		<TR>
			<TD VALIGN=CENTER ALIGN=CENTER COLSPAN=6>
				<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET1_6); ?>">
				<br /><br />
				<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET1_9); ?>"><br />
				<?php echo(A_SHEET1_12); ?>: <INPUT TYPE="text" NAME="reason" VALUE="">
			</TD>
			<TD VALIGN=CENTER ALIGN=CENTER>
				<INPUT TYPE="submit" NAME="submit_type" VALUE="<?php echo(A_SHEET1_7); ?>">
			</TD>
		</TR>
		</TABLE>
		</FORM>
		<!-- Navigation cells at the footer -->
		<FORM name="PageSelect">
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
				$PagesCount = ceil($count_RegUsers / 10);
				if ($L == "hungarian") echo(sprintf(A_PAGE_CNT,$PageNum,$PagesCount)."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;$count_RegUsers ".mb_convert_case(A_MENU_11,MB_CASE_LOWER,$Charset));
				else echo(sprintf(A_PAGE_CNT,$PageNum,$PagesCount)."&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;$count_RegUsers ".(($count_RegUsers == 1) ? mb_convert_case(A_MENU_11,MB_CASE_LOWER,$Charset) : mb_convert_case(A_MENU_1,MB_CASE_LOWER,$Charset)));
				?>
				</SPAN>
				</TD>
				<?php
			if ($PagesCount > 1)
			{
			?>
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN=CENTER HEIGHT=20 CLASS=tabtitle>
			<?php
			print "<select name=\"PageJump\" onChange=\"jump_Page()\">\n";
				$i=1;
				while ($i <= $PagesCount)
				{
			        print "<option value=\"$i\"";
					if ($i==$PageNum) print " selected";
					print ">$i</option>\n";
		        $i++;
				}
		        print "</select>\n";
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
		</FORM>
	</TD>
</TR>
<?php
}
else
{
?>
<TR>
	<TD ALIGN=CENTER CLASS=error><?php echo(A_SHEET1_8); ?></TD>
</TR>
<?php
};
?>
</TABLE>
<?php
?>