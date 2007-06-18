<?php
// Get the names and values for vars sent by input.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=${Charset}");

$Latin1 = ($Charset == "utf-8");
function special_char($str,$lang)
{
	return ($lang ? htmlentities($str) : htmlspecialchars($str));
};

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(special_char(stripslashes($U),$Latin1)); ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
<!--
// Put the focus at the message box in the input frame
function put_focus()
{
	if (typeof(window.opener.window) == 'undefined'
		|| typeof(window.opener.window.document) != 'object')
		return;
	if (window.opener.window.document.title == "Hidden Input frame")
		targetFrame = window.opener.window.parent.frames['input'].window;
	else
		targetFrame = window.opener.window;

	with (targetFrame)
	{
		focus();
		if (document.forms['MsgForm'] && document.forms['MsgForm'].elements['M'])
			document.forms['MsgForm'].elements['M'].focus();
	};
};
// -->
</SCRIPT>
</HEAD>

<BODY CLASS="frame" onUnload="if (window.opener && !window.opener.closed) put_focus();">
<CENTER>

<?php
$DbLink = new DB;
$DbLink->query("SELECT latin1,firstname,lastname,country,website,email,showemail,perms,rooms,ip,gender,picture,description,favlink,favlink1,slang,colorname,avatar FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
list($Latin1,$firstname,$lastname,$country,$website,$email,$showemail,$perms,$rooms,$ip,$gender,$picture,$description,$favlink,$favlink1,$slang,$colorname,$avatar) = $DbLink->next_record();
$DbLink->clean_results();
$DbLink->close();

// ** Get the status of the users
$tag_open = "<I>";
$tag_close = "</I>";
switch ($perms)
{
	case "moderator":
		$roomsTab = explode(",",$rooms);
		for (reset($roomsTab); $room_name=current($roomsTab); next($roomsTab))
		{
			if (strcasecmp(stripslashes($R), $room_name) == 0)
			{
				$perms = L_WHOIS_MODER;
				$Found = 1;
				break;
			};
		};
		unset($roomsTab);
		if (!isset($Found))
		{
			$perms = L_WHOIS_USER;
			$tag_open = "";
			$tag_close = "";
		}
		break;
	case "admin":
		$perms = L_WHOIS_ADMIN;
		if ($power == "medium") $power = "weak";
		break;
	default:
		$perms = L_WHOIS_USER;
		$tag_open = "";
		$tag_close = "";
}

// Random Quote mod by Ciprian
if (C_QUOTE)
{
		$quotecolor = C_QUOTE_COLOR; // change to the font size of your choice
		$quotes = file(C_QUOTE_PATH);
		$quote = rand(0, sizeof($quotes)-1);
		$quotetext = "<div class=quote><font color=$QUOTE_FONT_COLOR>".C_QUOTE_NAME.":<br /></font>";
		if($quotecolor != "") $quotetext .= "<font color=$quotecolor>";
		$quotetext .= $quotes[$quote];
		if($quotecolor != "") $quotetext .= "</font>";
		$quotetext .= "</div>";
		$quotetext = ereg_replace("\r\n", "", $quotetext);
}
?>
<P CLASS="title">
<span style=color:<?php echo($colorname); ?>><?php echo($tag_open.special_char(stripslashes($U),$Latin1).$tag_close); ?></span>
<?php
if (C_USE_AVATARS)
{
if (empty($avatar)) $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
?>
<br /><br /><img src="<?php echo($avatar); ?>" height="<?php echo(C_AVA_WIDTH); ?>" width="<?php echo(C_AVA_HEIGHT); ?>" border="0" alt="Avatar">
<?php
}
?>
</P>
<TABLE BORDER=0>
<?php
if ($firstname != "" || $lastname !="")
{
?>
<TR>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_30); ?>: </TD>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(special_char($firstname,$Latin1)); ?></TD>
</TR>
<TR>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_31); ?>: </TD>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(special_char($lastname,$Latin1)); ?></TD>
</TR>
<?php
}
if ($gender != "0")
{
	$gender = ($gender == "1" ? L_REG_46 : L_REG_47);
	?>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_45); ?>: </TD>
	<TD CLASS="whois" nowrap="nowrap"><?php echo($gender); ?></TD>
	<?php
};

if ($country)
{
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_36); ?>: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(special_char($country,$Latin1)); ?></TD>
	</TR>
	<?php
};

if ($slang)
{
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_1); ?>: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(special_char($slang,$Latin1)); ?></TD>
	</TR>
	<?php
};

if ($showemail || ($power != "weak" && $email != 'bot@bot.com' && $email != 'quote@quote.com'))
{
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap">e-mail: </TD>
		<TD nowrap="nowrap"><A HREF="mailto:<?php echo(htmlspecialchars($email)); ?>" title="Send email" onMouseOver="window.status='Send email.'; return true"><?php echo(htmlspecialchars($email)); ?></A></TD>
	</TR>
	<?php
};

if ($website)
{
	$prefix = (strpos($website,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_32); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="<?php echo($prefix.htmlspecialchars(str_replace("javascript:", "", $website))); ?>" title="Click to open link" onMouseOver="window.status='Click to open link.'; return true" TARGET="_blank"><?php echo($prefix.htmlspecialchars($website)); ?></A></TD>
	</TR>
	<?
};

if ($favlink)
{
	$prefix = (strpos($favlink,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_2); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="<?php echo($prefix.htmlspecialchars(str_replace("javascript:", "", $favlink))); ?>" title="Click to open link" onMouseOver="window.status='Click to open link.'; return true" TARGET="_blank"><?php echo($prefix.htmlspecialchars($favlink)); ?></A></TD>
	</TR>
	<?
};

if ($favlink1)
{
	$prefix = (strpos($favlink1,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_3); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="<?php echo($prefix.htmlspecialchars(str_replace("javascript:", "", $favlink1))); ?>" title="Click to open link" onMouseOver="window.status='Click to open link.'; return true" TARGET="_blank"><?php echo($prefix.htmlspecialchars($favlink1)); ?></A></TD>
	</TR>
	<?
};
if ($description)
{
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_4); ?>: </TD>
	</TR>
	<TR>
		<TD CLASS="whois" colspan=2><?php echo(htmlspecialchars($description)); ?></TD>
	</TR>
	<?
};

if ($picture)
{
//	$prefix = (strpos($picture,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap" colspan=2><center><IMG SRC="<?php echo($prefix.htmlspecialchars($picture)); ?>"></center></TD>
	</TR>
	<?
};

if ($power != "weak")
{
	if (substr($ip, 0, 1) == "p") $ip = substr($ip, 1)." (proxy)";
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap">IP: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo($ip); ?></TD>
	</TR>
	<?php
};
?>
</TABLE>
<br />
<SPAN CLASS="whois"><?php echo("> ${tag_open}${perms}${tag_close} <"); ?></SPAN>

<?php
if ($quotetext)
{
	?>
	<TR>
		<TD CLASS="whois" colspan=2><?php echo($quotetext); ?></TD>
	</TR>
	<?
};
?>
</CENTER>
</BODY>

</HTML>
<?php

?>