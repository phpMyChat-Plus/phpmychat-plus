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
if (isset($_COOKIE["CookieStatus"])) $status = $_COOKIE["CookieStatus"];
if (isset($_COOKIE["CookieUsername"])) $U = $_COOKIE["CookieUsername"];

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./localization/".$L."/localized.admin.php");
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

// avoid server configuration for magic quotes
set_magic_quotes_runtime(0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}

$Latin1 = ($Charset != "utf-8");
function special_char($str,$lang)
{
	return ($lang ? htmlentities($str) : htmlspecialchars($str));
};

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
		return $str;
	}
};

if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};

function room_in($what, $in, $Charset)
{
	$in = explode(",",$in);
	for (reset($in); $room_name=current($in); next($in))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
}
// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(special_char(stripslashes($User),$Latin1)); ?></TITLE>
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
	$DbLink->query("SELECT perms,rooms FROM ".C_REG_TBL." WHERE username='".$U."' LIMIT 1");
	if ($DbLink->num_rows() > 0)
	{
		list($pow_perms,$pow_rooms) = $DbLink->next_record();
		$DbLink->clean_results();
	}
	// Define what can see the current user:
	// - the whole profile including e-mail and IP address if he is admin or moderator of the current room
	//   if this room is one of the default rooms;
	// - e-mail only if the registered user accepted this to be displayed and no IP
	// Define what can see the current user:
	// - the whole profile including e-mail and IP address if he is admin or moderator of the current room
	//   if this room is one of the default rooms;
	if ($status == "a" || $status == "t")
	{
		$power = "all";
	}
	elseif ($status == "m" && (room_in(stripslashes($R),$DefaultChatRooms, $Charset) || room_in("*", $pow_rooms, $Charset) || room_in(stripslashes($R), $pow_rooms, $Charset)))
	{
		$power = "medium";
	}
	else
	{
		$power = "weak";
	};
$DbLink->query("SELECT latin1,firstname,lastname,country,website,email,showemail,perms,rooms,ip,gender,picture,description,favlink,favlink1,slang,colorname,avatar,reg_time,last_login,login_counter,use_gravatar,birthday,show_bday,show_age FROM ".C_REG_TBL." WHERE username='$User' LIMIT 1");
list($Latin1,$firstname,$lastname,$country,$website,$email,$showemail,$perms,$rooms,$ip,$gender,$picture,$description,$favlink,$favlink1,$slang,$colorname,$avatar,$reg_time,$last_login,$login_counter,$use_gravatar,$birthday,$show_bday,$show_age) = $DbLink->next_record();
$my_dobtime = strtotime($birthday);
$DbLink->clean_results();
$DbLink->close();

// ** Get the status of the users
$tag_open = "<I>";
$tag_close = "</I>";
// Special colors for usernames depending on users choise and status
function userColor($type,$colorname)
{
	if (C_ITALICIZE_POWERS)
	{
		if (COLOR_FILTERS)
		{
			if (COLOR_NAMES)
			{
				$color = ($colorname != '' ? $colorname:(($type == 'admin' || $type == 'topmod') ? COLOR_CA:($type == 'moderator' ? COLOR_CM:COLOR_CD)));
				return $color;
			}
			else
			{
				$color = (($type == 'admin' || $type == 'topmod') ? COLOR_CA:($type == 'moderator' ? COLOR_CM:""));
				return $color;
			};
		}
		elseif (COLOR_NAMES)
		{
			$color = ($colorname != '' ? $colorname:COLOR_CD);
			return $color;
		}
		else
		{
			$color = "";
			return $color;
		}
	}
	elseif (COLOR_NAMES)
	{
		$color = ($colorname != '' ? $colorname:(($type == 'admin' || $type == 'topmod' || $type == 'moderator') ? '':COLOR_CD));
		return $color;
	}
	else
	{
		$color = "";
		return $color;
	}
};

if (C_ITALICIZE_POWERS)
{
	switch ($perms)
	{
		case "moderator":
			$roomsTab = explode(",",$rooms);
			for (reset($roomsTab); $room_name=current($roomsTab); next($roomsTab))
			{
				if (strcasecmp(mb_convert_case(stripslashes($R),MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0 || $room_name == "*")
				{
				$color = userColor($perms,$colorname);
				$perms = L_WHOIS_MODER;
					$Found = 1;
					break;
				};
			};
			unset($roomsTab);
			if (!isset($Found))
			{
				$color = userColor($perms,$colorname);
				$perms = L_WHOIS_USER;
				$tag_open = "";
				$tag_close = "";
			}
			break;
		case "admin":
			$color = userColor($perms,$colorname);
			$perms = L_WHOIS_ADMIN;
			if ($power == "medium") $power = "weak";
			break;
		case "topmod":
			$color = userColor($perms,$colorname);
			$perms = L_WHOIS_TOPMOD;
			if ($email == 'bot@bot.com' || $email == 'quote@quote.com') { $perms = L_WHOIS_BOT; $tag_open = ""; $tag_close = ""; }
			if ($power == "medium") $power = "weak";
			break;
		default:
			$color = userColor($perms,$colorname);
			$perms = L_WHOIS_USER;
			$tag_open = "";
			$tag_close = "";
	}
}
else
{
	$color = userColor($perms,$colorname);
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
<?php
if ($email != 'bot@bot.com' && $email != 'quote@quote.com')
{
?>
<span style=color:<?php echo($color); ?>><?php echo($tag_open.special_char(stripslashes($User),$Latin1).$tag_close); ?></span>
<?php
}
else
{
?>
<span style=color:<?php echo($color); ?>><?php echo(special_char(stripslashes($User),$Latin1)); ?></span>
<?php
}
if (C_USE_AVATARS)
{
	if (empty($avatar))	$avatar = C_AVA_RELPATH . C_DEF_AVATAR;
	// Gravatar mod added by Ciprian
	if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && (!isset($use_gravatar) || $use_gravatar)))
	{
		if (eregi(C_AVA_RELPATH, $avatar)) $local_avatar = 1;
		else $local_avatar = 0;
		require("./plugins/gravatars/get_gravatar.php");
	}
?>
<br /><br /><div align="center"><img src="<?php echo($avatar); ?>" width="<?php echo(C_AVA_WIDTH); ?>" height="<?php echo(C_AVA_HEIGHT); ?>" border="0" alt="<?php echo($avatar == $gravatar ? "Gravatar" : L_AVATAR); ?>"></div>
<?php
}
?>
</P>
<TABLE BORDER="0" align="center">
<?php
if ($firstname != "")
{
?>
<TR>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_30); ?>: </TD>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(special_char($firstname,$Latin1)); ?></TD>
</TR>
<?php
}
if ($lastname != "")
{
?>
<TR>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_31); ?>: </TD>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(special_char($lastname,$Latin1)); ?></TD>
</TR>
<?php
}
if ($show_bday && $my_dobtime)
{
	$dob_format = $show_age ? L_LONG_DATE : trim(str_replace(array("%Y.","%Y","(%A)","%A",",","-","年","den"),"",str_replace("  "," ",L_LONG_DATE)));
	$my_dob_time = stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime($dob_format, $my_dobtime)) : strftime($dob_format, $my_dobtime);
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_7); ?>: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo($my_dob_time); ?></TD>
	</TR>
	<?php
}
if ($show_age && $my_dobtime)
{
	include_once('plugins/birthday/age.class.php');
	$my_dob = new DateOfBirth();
	$my_dob->birth_num_year = date('Y',$my_dobtime);
	$my_dob->birth_num_month = date('n',$my_dobtime);
	$my_dob->birth_num_day = date('j',$my_dobtime);
	$my_dob->calculate_age();
	$age = $my_dob->age;
//	echo $my_dob->yy;
	$age_details = sprintf(L_PRO_11,$my_dob->yy,$my_dob->mm,$my_dob->dd);
	$html_age_output = "";
	for ($i=0; $i<strlen($age); $i++) {
		$digit_age_pos = substr($age,$i,1);
		$html_age_output .= "<img src=\"acount/digits/"."$digit_age_pos.gif\" alt=\"".$age_details."\" title=\"".$age_details."\">";
	}
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_10); ?>: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo($html_age_output); ?></TD>
	</TR>
	<?php
}
	if($gender == 4) $gender1 = 'undefined';
	elseif($gender == 1) $gender1 = 'boy';
	elseif($gender == 2) $gender1 = 'girl';
	elseif($gender == 3) $gender1 = 'couple';
	else $gender1 = 'none';
	if ($gender1 != "couple") $ava_width = 14;
	else $ava_width = 28;
	$ava_height = 14;
if ($gender != 0)
{
	$gender = ($gender == 1 ? L_REG_46 : ($gender == 2 ? L_REG_47 : ($gender == 3 ? L_REG_44 : L_REG_43)));
}
else $gender = L_REG_48;
?>
<TR>
	<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_45); ?>: </TD>
	<TD CLASS="whois" nowrap="nowrap"><?php echo($gender); ?>&nbsp;<img src="<?php echo("images/gender_".$gender1.".gif\" width=\"$ava_width\" height=\"$ava_height\" border=\"0\" alt=\"$gender\"") ?>></TD>
</TR>

<?php
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
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_8); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="mailto:<?php echo(htmlspecialchars($email)); ?>" title="<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_EMAIL_1)); ?>.'; return true"><?php echo(htmlspecialchars($email)); ?></A></TD>
	</TR>
	<?php
};

if ($website)
{
	$prefix = (strpos($website,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_REG_32); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="<?php echo($prefix.htmlspecialchars(str_replace("javascript:", "", $website))); ?>" title="<?php echo(sprintf(L_CLICK,L_LINKS_3)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_3)); ?>.'; return true" TARGET="_blank"><?php echo($prefix.htmlspecialchars($website)); ?></A></TD>
	</TR>
	<?php
};

if ($favlink)
{
	$prefix = (strpos($favlink,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_2); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="<?php echo($prefix.htmlspecialchars(str_replace("javascript:", "", $favlink))); ?>" title="<?php echo(sprintf(L_CLICK,L_LINKS_3)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_3)); ?>.'; return true" TARGET="_blank"><?php echo($prefix.htmlspecialchars($favlink)); ?></A></TD>
	</TR>
	<?php
};

if ($favlink1)
{
	$prefix = (strpos($favlink1,"://") ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_3); ?>: </TD>
		<TD nowrap="nowrap"><A HREF="<?php echo($prefix.htmlspecialchars(str_replace("javascript:", "", $favlink1))); ?>" title="<?php echo(sprintf(L_CLICK,L_LINKS_3)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_3)); ?>.'; return true" TARGET="_blank"><?php echo($prefix.htmlspecialchars($favlink1)); ?></A></TD>
	</TR>
	<?php
};
if ($description)
{
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_PRO_4); ?>: </TD>
	</TR>
	<TR>
<?php
if (eregi("<script", $description) || !eregi("mysql", $description))
{
	$description = eregi_replace("javascript", "", $description);
	$description = eregi_replace("mysql", "", $description);
}
	echo("<TD CLASS=\"whois\" colspan=2>".$description."</TD>");
?>
	</TR>
	<?php
};

if ($picture)
{
	$prefix = ((strpos($picture,"://") || $email == 'bot@bot.com' || $email == 'quote@quote.com') ? "" : "http://");
	?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap" colspan=2><center><IMG SRC="<?php echo($prefix.htmlspecialchars($picture)); ?>"></center></TD>
	</TR>
	<?php
};

// visit counter image constructor
if ($login_counter && C_LOGIN_COUNTER)
{
        $html_output = "";
		for ($i=0; $i<strlen($login_counter); $i++) {
            $digit_pos = substr($login_counter,$i,1);
            $html_output .= "<img src=\"acount/digits/"."$digit_pos.gif\" alt=\"".$login_counter."\" title=\"".$login_counter."\">";
        }
?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(L_LOGIN_COUNT); ?>: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo($html_output); ?></TD>
	</TR>
<?php
}
	if ($User == C_BOT_NAME) $last_visit = strftime(L_LONG_DATETIME,$last_login);
	else $last_visit = strftime(L_LONG_DATETIME,$reg_time);
	if(stristr(PHP_OS,'win')) $last_visit = utf_conv(WIN_DEFAULT,$Charset,$last_visit);
?>
	<TR>
		<TD CLASS="whois" nowrap="nowrap"><?php echo(A_SHEET1_11); ?>: </TD>
		<TD CLASS="whois" nowrap="nowrap"><?php echo($last_visit); ?></TD>
	</TR>

<?php
if ($power != "weak" && ($email != 'bot@bot.com' && $email != 'quote@quote.com'))
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
<SPAN CLASS="whois"><?php echo($tag_open.$perms.$tag_close); ?></SPAN>
<?php
if ($quotetext)
{
	?>
	<TR>
		<TD CLASS="whois" colspan=2><?php echo($quotetext); ?></TD>
	</TR>
	<?php
};
?>
<br /><br /><input type="submit" value="<?php echo(L_REG_25)?>" name="Close" onClick="self.close(); return false;">
</CENTER>
</BODY>

</HTML>
<?php

?>