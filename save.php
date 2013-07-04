<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("config/config.lib.php");
require("lib/release.lib.php");
require("localization/".$L."/localized.chat.php");
require("lib/database/".C_DB_TYPE.".lib.php");

// Avoid server configuration for magic quotes
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

// Get IP address and check for hackers
require("./lib/get_IP.lib.php");
$DbLink = new DB;
$DbLink->query("SELECT count(*) FROM ".C_USR_TBL." WHERE username = '$U' AND ip = '$IP' LIMIT 1");
list($isNotHack) = $DbLink->next_record();
if (!$isNotHack)
{
	$DbLink->close();
	exit();
}
else
{
	$DbLink->clean_results();
}

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset != "utf-8" ? 1 : 0);
function special_char($str,$lang)
{
	return ($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
}

// ** Get messages **

// Define the SQL query (depends on values for ignored users list and on whether to display
// notification messages or not

$CondForQuery = "(username NOT LIKE 'SYS %' OR (address != '' AND (username = 'SYS room' OR username = 'SYS announce' OR username LIKE 'SYS top%'))) AND ";
if (isset($Ign))
{
	$IgnoreList = "'".str_replace(",","','",addslashes(urldecode($Ign)))."'";
	$CondForQuery .= "username NOT IN (${IgnoreList}) AND ";
};
#$CondForQuery .= "(address = ' *' OR (room = '$R' AND (address IN ('$U','') OR username = '$U')) OR (room = '*' AND username NOT LIKE 'SYS %') OR (address != '' AND (username = 'SYS room' OR username = 'SYS image' OR username = 'SYS math' OR username LIKE 'SYS top%' OR username = 'SYS dice1' OR username = 'SYS dice2' OR username = 'SYS dice3')))";
$CondForQuery .= "(address = ' *' OR (room = '$R' AND (address IN ('$U','') OR (username = '$U')) AND username != '".C_QUOTE_NAME."' AND username != '".C_BOT_NAME."'))";

$LimitForQuery = (isset($Limit) && $Limit != "") ? " LIMIT ".$Limit : "";

#$DbLink = new DB;
$DbLink->query("SELECT m_time, username, latin1, address, message FROM ".C_MSG_TBL." WHERE ".$CondForQuery." ORDER BY m_time DESC".$LimitForQuery);

// Format and display new messages
if($DbLink->num_rows() > 0)
{
	$MessagesString = "";
	while(list($Time, $User, $Latin1, $Dest, $Message) = $DbLink->next_record())
	{
		$Message = str_ireplace("L_DEL_BYE",L_DEL_BYE,$Message);
		$Message = str_ireplace("L_REG_BRB",L_REG_BRB,$Message);
		$Message = str_ireplace("L_HELP_MR",sprintf(L_HELP_MR,$User),$Message);
		$Message = str_ireplace("L_HELP_MS",sprintf(L_HELP_MS,$User),$Message);
		$Message = str_ireplace(" COLOR=\"".$COLOR_TB."\"", " COLOR=\"".COLOR_CD."\"",$Message);
		$Message = str_ireplace("...BUZZER...","<img src=\"images/buzz.gif\" alt=\"".L_HELP_BUZZ1."\" title=\"".L_HELP_BUZZ1."\">",$Message);
		$Message = str_ireplace(" src=\""," src=\"http://".$_SERVER['HTTP_HOST'] . str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME'])."",$Message);
		if ($Align == "right") $Message = str_replace("arrowr","arrowl",$Message);
#		if (C_POPUP_LINKS || eregi('target="_blank"></a>',$Message))
		if (C_POPUP_LINKS || stripos($Message,'target="_blank"></a>') !== false)
		{
			$Message = str_replace('target="_blank"></a>','title="'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'" onMouseOver="window.status=\''.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'.\'; return true" target="_blank">'.sprintf(L_CLICKS,L_LINKS_15,L_LINKS_1).'</a>',$Message);
		}
		else $Message = str_replace('target="_blank">','title="'.sprintf(L_CLICK,L_LINKS_3).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_LINKS_3).'.\'; return true" target="_blank">',$Message);

		$Message = str_replace('alt="Send email">','title="'.sprintf(L_CLICK,L_EMAIL_1).'" onMouseOver="window.status=\''.sprintf(L_CLICK,L_EMAIL_1).'.\'; return true">',$Message);

		// Color names in chat
		$colorname_tag = "";
		$colorname_endtag = "";
		if(COLOR_NAMES || C_ITALICIZE_POWERS)
		{
			$DbColor1 = new DB;
			if (isset($User) || isset($Dest))
			{
				$DbColor1->query("SELECT perms,colorname FROM ".C_REG_TBL." WHERE username = '$User' OR username = '$Dest'");
				list($perms_user,$colorname) = $DbColor1->next_record();
				if(COLOR_NAMES && (isset($colorname) && $colorname != "" && strcasecmp($colorname, $COLOR_TB) != 0))
				{
					$colorname_tag = "<FONT color=".$colorname.">";
					unset($colorname);
				}
				elseif(C_ITALICIZE_POWERS)
				{
					if ($perms_user == "admin" || ($perms_user == "topmod" && $User != C_BOT_NAME && $User != C_QUOTE_NAME))
					{
						$colorname_tag = "<FONT color=".COLOR_CA.">";
					}
					
					elseif ($perms_user == "moderator")
					{
						$colorname_tag = "<FONT color=".COLOR_CM.">";
					}
				}
			}
#			$DbColor1->clean_results();
			$DbColor1->close();
		}
		if($colorname_tag != "") $colorname_endtag = "</FONT>";
		$NewMsg = "<P CLASS=\"msg\">";
		$STime = strftime(L_SHORT_DATETIME, $Time + C_TMZ_OFFSET*60*60);
		if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $STime = str_replace(" ","",$STime);
		if ($ST == 1) $NewMsg .= "<SPAN CLASS=\"time\">".$STime."</SPAN> ";
		if ($Dest != " *" && $User != "SYS room" && $User != "SYS image" && $User != "SYS math" && $User != "SYS topic" && $User != "SYS topic reset" && substr($User,0,8) != "SYS dice")
		{
			$User = $colorname_tag."[".special_char($User,$Latin1)."]".$colorname_endtag;
			if ($Dest != "") $Dest = ">".$colorname_tag."[".htmlspecialchars(stripslashes($Dest))."]".$colorname_endtag;
			$NewMsg .= "<B>${User}${Dest}</B> ".$Message."</P>";
		}
		if ($User == "SYS image")
		{
		  $NewMsg .= "<B>".$colorname_tag."[${Dest}]".$colorname_endtag."</B> <FONT class=\"notify\">".L_PIC." ${Dest}:</FONT> <A href=".$Message." onMouseOver=\"window.status='".sprintf(L_CLICK,L_FULLSIZE_PIC).".'; return true\" title=\"".sprintf(L_CLICK,L_FULLSIZE_PIC)."\" target=_blank>".$Message."</A>";
		}
		if ($User == "SYS announce")
		{
			if ($Message == 'L_RELOAD_CHAT') $Message = L_RELOAD_CHAT;
			$NewMsg .= "<SPAN CLASS=\"notify2\">[".L_ANNOUNCE."] ".$Message."</SPAN>";
		}
		if ($User == "SYS room")
		{
 			$NewMsg .= "<SPAN class=\"notify2\"><I>".ROOM_SAYS."</SPAN><SPAN class=\"notify\"> ".$Message."</SPAN></I>";
    	}
		if ($User == "SYS topic")
		{
 			$NewMsg .= "<FONT class=\"notify\">".$Dest." ".L_TOPIC." ".$Message."</FONT>";
		}
		if ($User == "SYS topic reset")
		{
 			$NewMsg .= "<FONT class=\"notify\">".$Dest." ".L_TOPIC_RESET." ".$Message."</FONT>";
		}

		// Separator between messages sent before today and other ones
		if (!isset($day_separator) && date("j", $Time +  C_TMZ_OFFSET*60*60) != date("j", time() +  C_TMZ_OFFSET*60*60))
		{
			$day_separator = "<P CLASS=\"msg\"><SPAN CLASS=\"notify\" style=\"background-color:yellow;\">--------- ".(!$O ? L_TODAY_UP : L_TODAY_DWN)." ---------</SPAN></P>";
		};

		$MessagesString = $NewMsg.((isset($day_separator) && $day_separator != "") ? "\n".$day_separator : "")."\n".$MessagesString;

		if (isset($day_separator)) $day_separator = "";		// Today separator already printed
	};
};

$DbLink->clean_results();
$DbLink->close();


if (isset($MessagesString) && $MessagesString != "")
{
	// Save messages to a file
	header("Content-Type: application/octet-stream");
	header("Content-Disposition: attachment; filename=\"chat_save_".date("mdY").".htm\"");
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
	<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">
	<HEAD>
		<META HTTP-EQUIV="Content-Type" CONTENT="text/html; CHARSET=<?php echo($Charset); ?>">
		<TITLE><?php echo(htmlspecialchars(stripslashes($R))." - ".date("F j, Y")." - ".((C_CHAT_NAME != "") ? C_CHAT_NAME : APP_NAME)); ?></TITLE>
		<STYLE>
		<?php
			if (isset($Charset))
			{
				if (isset($FontName) && $FontName != "")
				{
					?>
					* {font-family: <?php echo($FontName); ?>, sans-serif;}
					<?php
				}
				else
				{
					?>
					* {font-family: helvetica, arial, geneva, sans-serif;}
					<?php
				}
			}
			if (!isset($medium) || $medium == "") $medium = 10;
			?>
			BODY.mainframe
			{
				background-color: <?php echo($COLOR_TB); ?>;
				color: <?php echo(COLOR_CD); ?>;
				font-size: <?php echo($medium); ?>pt;
				font-weight: 400;
				margin: 5px;
				scrollbar-3dlight-color: #00ffff;
				scrollbar-arrow-color: #ffff00;
				scrollbar-base-color: <?php echo($COLOR_BODY); ?>;
				scrollbar-track-color: <?php echo($COLOR_SCROLL_TRACK); ?>;
				scrollbar-darkshadow-color: #0000ff;
				scrollbar-face-color: #37658d;
				scrollbar-highlight-color: #ffff00;
				scrollbar-shadow-color: #808080;
			}

			A
			{
				text-decoration: none;
				color: <?php echo($COLOR_LINK); ?>;
				font-weight: 600;
				cursor:pointer;
			}

			A:hover, A:active
			{
				color: #FF9900;
				text-decoration: none;
				cursor:pointer;
			}

			.msg
			{
				margin-top: 0px;
				margin-bottom: 2px;
				margin-left: <?php #echo($Align == "right" ? "5" : "55"); ?>0px;
				margin-right: <?php #echo($Align == "right" ? "55" : "5"); ?>0px;
				text-indent: 0px;
			}

			.time
			{
				unicode-bidi: embed;
				color: <?php echo(COLOR_CD); ?>;
			}

			.notify
			{
				color: <?php echo($COLOR_BK); ?>;
				font-size: <?php echo($medium); ?>pt;
				font-weight: 600;
			}

			.notify2
			{
				color: #FF0000;
				font-size: <?php echo($medium); ?>pt;
				font-weight: 600;
			}
		</STYLE>
	<BODY CLASS="mainframe">
	<?php
	echo($MessagesString);
	unset($MessagesString);
	?>
	</BODY>
	</HTML>
	<?php
	exit;
}
?>