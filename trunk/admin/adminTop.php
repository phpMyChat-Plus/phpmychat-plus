<?php

if (!$_SESSION["adminlogged"]) exit(); // added by Bob Dickow for security.

// Remove some var from the url query
$URLQueryTop = "L=$L&pmc_username=".urlencode($pmc_username)."&pmc_password=$pmc_password";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(L_REG_35." - ".(C_CHAT_NAME != "" ? C_CHAT_NAME." - ".APP_NAME : APP_NAME)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>

<BODY>
<TABLE ALIGN=RIGHT BORDER=0 CELLPADDING=1 CELLSPACING=0 CLASS="menu">
<TR>
	<TD ALIGN=LEFT VALIGN=top NOWRAP="NOWRAP" CLASS="menuTitle" colspan=5>
		<IMG SRC="images/selColor.gif" WIDTH=1><?php echo(sprintf(A_MENU_0,APP_NAME)."\n"); ?>
	</TD>
	<TD ALIGN=LEFT VALIGN=top WIDTH=1500 CLASS="menuTitle">
		<IMG SRC="images/selColor.gif" WIDTH=1>
	</TD>
	<TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=1"); ?>" TARGET="_parent"<?php if ($sheet == "1") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_1); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
	<TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=2"); ?>" TARGET="_parent"<?php if ($sheet == "2") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_2); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
	<TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=a1"); ?>" TARGET="_parent"<?php if ($sheet == "a1") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_1a); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
	<TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=3"); ?>" TARGET="_parent"<?php if ($sheet == "3") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_3); ?></A>&nbsp;
	</TD>
	<?php
	include('./admin/mail4admin.lib.php');
	if (isset($MailFunctionOn))
	{
		$ReqVar = (strstr($Sender_email,"@") && $Sender_email != "" && $Sender_email != "your@email.com") ? "" : "&ReqVar=1";
		?>
		<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
		<TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
			&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=4".$ReqVar); ?>" TARGET="_parent"<?php if ($sheet == "4") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_4); ?></A>&nbsp;
		</TD>
		<?php
	};
	?>
</TR>
<TR>
       <TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=5"); ?>" TARGET="_parent"<?php if ($sheet == "5") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_5); ?></A>&nbsp;
	</TD>
	<TD ALIGN=CENTER NOWRAP="NOWRAP">
		<IMG SRC="images/selColor.gif" WIDTH=1><a href="logout.php" onClick="top.close();"><?php echo (A_LOGOUT) ?></a>
	</TD>
    <TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
	<TD ALIGN=LEFT VALIGN=bottom WIDTH=1500 CLASS="menuTitle" colspan=2>
		<IMG SRC="images/selColor.gif" WIDTH=1>
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
    <TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=6"); ?>" TARGET="_parent"<?php if ($sheet == "6") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_6); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
    <TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=8"); ?>" TARGET="_parent"<?php if ($sheet == "8") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_8); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
	<TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=a2"); ?>" TARGET="_parent"<?php if ($sheet == "a2") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_2a); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
    <TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=9"); ?>" TARGET="_parent"<?php if ($sheet == "9") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_9); ?></A>&nbsp;
	</TD>
	<TD WIDTH=1><IMG SRC="images/selColor.gif" WIDTH=1></TD>
    <TD ALIGN=CENTER NOWRAP="NOWRAP" CLASS="thumbIndex">
		&nbsp;<A HREF="<?php echo("$From?$URLQueryTop&sheet=7"); ?>" TARGET="_parent"<?php if ($sheet == "7") echo(" CLASS=\"selected\""); ?>><?php echo(A_MENU_7); ?></A>&nbsp;
	</TD>
</TR>
</TABLE>
</BODY>
</HTML>
<?php
exit();
?>