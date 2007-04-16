<?php
// Get the names and values for vars sent by index.lib.php
if (isset($HTTP_GET_VARS))
{
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
};

// Get the names and values for post vars
if (isset($HTTP_POST_VARS))
{
	while(list($name,$value) = each($HTTP_POST_VARS))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Fix some security issues
if ((empty($From) || trim($From) == '')
	|| (empty($U) || trim($U) == '')
	|| (empty($R) || trim($R) == '')
	|| (empty($Ver) || empty($L) || empty($N))
	|| (!isset($T) || !isset($D) || !isset($O) || !isset($ST) || !isset($NT))
	|| !is_dir("./localization/".$L))
{
	exit();
}

// Added for Skin mod
if (isset($HTTP_COOKIE_VARS["CookieRoom"])) $R = urldecode($HTTP_COOKIE_VARS["CookieRoom"]);

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
require("./lib/clean.lib.php");

header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
set_magic_quotes_runtime(0);

$U = urldecode($U);
$R = urldecode($R);

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset == "iso-8859-1");
function special_char($str,$lang)
{
	return addslashes($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
};

$DbLink = new DB;


// ** Updates user info in connected users tables and fix some security issues **
// Fixed a security issue thanks to SeazoN
if (C_REQUIRE_REGISTER && (!isset($PWD_Hash) || $PWD_Hash == ''))
{
	exit(); // hack attack
}
else if (isset($PWD_Hash) && $PWD_Hash != '')
{
	$DbLink->query(	'SELECT ' . C_USR_TBL . '.room, ' . C_USR_TBL . '.status, ' . C_USR_TBL. '.ip'
					. ' FROM ' . C_USR_TBL . ', ' . C_REG_TBL
					. ' WHERE ' . C_USR_TBL . '.username = \'' . $U . '\''
					.   ' AND ' . C_REG_TBL . '.username = \'' . $U . '\''
					.   ' AND ' . C_REG_TBL . '.password = \'' . $PWD_Hash . '\''
					. ' LIMIT 1');
}
else // C_REQUIRE_REGISTER == 0 && $PWD_Hash is empty
{
	$DbLink->query('SELECT username FROM ' . C_REG_TBL . ' WHERE username = \'' . $U . '\' LIMIT 1');
	if ($DbLink->num_rows() == 0)
	{
		$DbLink->query('SELECT room, status, ip FROM ' . C_USR_TBL . ' WHERE username = \'' . $U . '\' LIMIT 1');
	}
	else
	{
		$DbLink->clean_results();
		$DbLink->close();
		exit(); // hack attack
	}
}
// End of SeazoN Fix
if ($DbLink->num_rows() != 0)
{
	list($room, $status, $knownIp) = $DbLink->next_record();
	$DbLink->clean_results();
	$kicked = 0;
	// Security issue
	include("./lib/get_IP.lib.php");
	if ($knownIp != $IP)
	{
		$kicked = 5;
	}
	// Update users info
	if ($room != stripslashes($R))	// Same nick in another room
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1)."\")', '', '')");
		$kicked = 3;
	}
	elseif ($status == "k")			// Kicked by a moderator or the admin.
	{
		$kicked = 1;
	}
	elseif ($status == "d")			// The admin just deleted the room
	{
		$kicked = 2;
	}
	elseif ($status == "b")			// Banished by a moderator or the admin.
	{
		$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS exit', '', ".time().", '', 'sprintf(L_BANISHED, \"".special_char($U,$Latin1)."\")', '', '')");
		$kicked = 4;
	};
	if ($kicked > 0)
	{
		// Kick the user from the current room
		$kickedUrl	= ($kicked < 5)
					? "$From?L=$L&U=".urlencode(stripslashes($U))."&E=".urlencode(stripslashes($R))."&KK=$kicked"
					: "$From?L=$L";
		?>
		<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
		<!--
		window.parent.window.location = '<?php echo($kickedUrl); ?>';
		// -->
		</SCRIPT>
		<?php
		$DbLink->close();
		exit;
	}
}
else
{
	$DbLink->clean_results();
	// Fix a security issue
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	window.parent.window.location = '<?php echo("$From?L=$L"); ?>';
	// -->
	</SCRIPT>
	<?php
	$DbLink->close();
	exit;
};

// Extended two fields for Private Message Popup and room_from by Ciprian
// ** Send formated messages to the message table **
include("bot/respond.php");
function AddMessage($M, $T, $R, $U, $C, $Private, $Read, $RF)
{
if (C_BOT_CONTROL && C_BOT_PUBLIC && $Private == "")
{
	//--Bot Control Popeye
$botpath = "botfb/" . $U . ".txt" ;
$botcontrol ="botfb/$R.txt";
	if(file_exists($botcontrol))
	{
		if (file_exists ($botpath) || eregi(C_BOT_NAME, $M))
		{
			include "lib/bot.lib.php";
		}
	}
}
//---End Bot Control
	global $DbLink;
	global $Latin1;
	global $status;
	global $Read;

	// Text formating tags
	if(C_HTML_TAGS_KEEP == "none")
	{
		if(C_HTML_TAGS_SHOW == 0)
		{
			// eliminates every HTML like tags
			$M = ereg_replace("<[^>]+>", "", $M);
		}
		else
		{
			// or keep it without effect
			$M = str_replace("<", "&lt;", $M);
			$M = str_replace(">", "&gt;", $M);
		}
	}
	else
	{
		// then C_HTML_TAGS_KEEP == "simple", we keep U, B and I tags
		$M = str_replace("<", "&lt;", $M);
		$M = str_replace(">", "&gt;", $M);

		if(function_exists("preg_match"))
		{
			while(preg_match("/&lt;([ubi]?)&gt;(.*?)&lt;(\/\\1)&gt;/i",$M))
			{
				$M = preg_replace("/&lt;([ubi]?)&gt;(.*?)&lt;(\/\\1)&gt;/i","<\\1>\\2<\\3>",$M);
			}
			if(C_HTML_TAGS_SHOW == 0)
			{
				$M = preg_replace("/&lt;\/?[ubi]?&gt;/i","",$M);
			}
		}
	}

	// URL
	$M = eregi_replace('([[:space:]]|^)(www[.])', '\\1http://\\2', $M); // no prefix (www.myurl.ext)
	// Word wrap fix by Alexander Eisele <xaex@mail.ru>
	if (!preg_match_all("((http://|https://|ftp ://|mailto:)[^ ]+)", $M, $pmatch))
	{
		$M = wordwrap($M, 40, " ", 1);
	}
	$prefix = '(http|https|ftp|telnet|news|gopher|file|wais)://';
  $pureUrl = '([[:alnum:]/\n+-=%&:_.~?]+[#[:alnum:]+-_~]*)';
//	$M = eregi_replace($prefix . $pureUrl, '<a href="\\1://\\2" title="Click to open link" onMouseOver="window.status=\'Click to open link.\'; return true" target="_blank">\\1://\\2</a>', $M);
       $purl="";
       for ($x=0; $x<count($pmatch[0]); $x++)
       {
       		$purl .= "||".$pmatch[0][$x];
       }

       $M = eregi_replace($prefix.$pureUrl, '<a href="links.php?xxx='.urlencode($purl).'" title="Click to open links window" onMouseOver="window.status=\'Click to open links window.\'; return true" target="_blank"></a>', $M);

	// e-mail addresses
	$M = eregi_replace('([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](fo|g|l|m|mes|o|op|pa|ro|seum|t|u|v|z)?)', '<a href="mailto:\\1" title="Send email" onMouseOver="window.status=\'Send email.\'; return true">\\1</a>', $M);

	// Smilies
	if (C_USE_SMILIES == 1)
	{
		include("./lib/smilies.lib.php");
		Check4Smilies($M,$SmiliesTbl);
		unset($SmiliesTbl);
	};

	// transform ISO-8859-1 special characters
	if ($Latin1)
	{
		global $MsgTo;
		ereg("(.*)(".$MsgTo."(&gt;)?)(.*)",$M,$Regs);
		if ($MsgTo != "" && ($Regs[1] == "" && $Regs[4] == "")) $Regs[4] = $M;
		if (!ereg("&[[:alnum:]]{1,10};",$Regs[1]) && !ereg("&[[:alnum:]]{1,10};",$Regs[4]))
		{
			for ($i = 1; $i <= 4; $i++)
			{
				if (($i != 1 && $i != 4) || $Regs[$i] == "") continue;
				$part = $Regs[$i];
				$part = htmlentities($part);
				$part = str_replace("&lt;", "<", $part);
				$part = str_replace("&gt;", ">", $part);
				$part = str_replace("&amp;lt;", "&lt;", $part);
				$part = str_replace("&amp;gt;", "&gt;", $part);
				$part = str_replace("&quot;","\"", $part);
				$part = ereg_replace("&amp;(#[[:digit:]]{2,5};)", "&\\1", $part);
				$Regs[$i] = $part;
			}
			$M = $Regs[1].$Regs[2].$Regs[4];
		}
	}

// Color Sniffer scripting safe mode filter by Alexander Eisele <xaex@mail.ru> & Ciprian
$C = str_replace("<", "&lt;", $C);
$C = str_replace(">", "&gt;", $C);
$C = str_replace("\"", "&quot;", $C);
$C = str_replace("x3c", "&lt;", $C);
$C = str_replace("x3e", "&gt;", $C);

$CC = array("","black","dimgray","gray","darkgray","silver","lightgrey","gainsboro","whitesmoke","ghostwhite","white","slategray","lightslategray","midnightblue","navy","darkblue","darkslateblue","mediumblue","blue","steelblue","royalblue","cornflowerblue","dodgerblue","deepskyblue","lightskyblue","skyblue","lightsteelblue","lightblue","powderblue","paleturquoise","lightcyan","aliceblue","azure","mintcream","darkslategray","cadetblue","teal","darkcyan","lightseagreen","darkturquoise","mediumturquoise","turquoise","aqua","cyan","mediumaquamarine","aquamarine","darkolivegreen","olive","olivedrab","darkkhaki","darkgreen","green","forestgreen","seagreen","mediumseagreen","darkseagreen","mediumspringgreen","springgreen","palegreen","honeydew","limegreen","lime","lightgreen","lawngreen","chartreuse","greenyellow","yellowgreen","indigo","purple","darkmagenta","darkviolet","darkorchid","mediumorchid","orchid","violet","plum","thistle","blueviolet","mediumpurple","slateblue","mediumslateblue","lavender","mediumvioletred","magenta","fuchsia","deeppink","palevioletred","hotpink","lightpink","pink","mistyrose","lavenderblush","maroon","darkred","firebrick","crimson","red","orangered","tomato","indianred","lightcoral","salmon","darksalmon","lightsalmon","coral","darkorange","orange","sandybrown","darkgoldenrod","goldenrod","gold","yellow","khaki","palegoldenrod","lemonchiffon","cornsilk","lightgoldenrodyellow","beige","lightyellow","ivory","rosybrown","saddlebrown","brown","sienna","chocolate","peru","tan","burlywood","wheat","navajowhite","peachpuff","moccasin","bisque","blanchedalmond","papayawhip","antiquewhite","linen","oldlace","seashell","floralwhite","snow");

if (trim($C)!="")
{
	if (!in_array($C, $CC))
	{
		$C="lime";
	}
}

	//Color's Power Filter Mod by Ciprian
	if (isset($HTTP_COOKIE_VARS["CookieColor"]) && (!isset($C))) $C = $HTTP_COOKIE_VARS["CookieColor"];
	//Registered colorname to use for text color by Ciprian
	else
	{
		$DbLink->query("SELECT colorname FROM ".C_REG_TBL." WHERE username = '$U' LIMIT 1");
		if ($DbLink->num_rows() != 0 && (!isset($C)))
		{
	    list($C) = $DbLink->next_record();
		}
	}
	if (!COLOR_ALLOW_GUESTS && $status == "u") $C = '';
	if (COLOR_FILTERS)
	{
		if (!isset($C))
		{
			if ($status == "a") $C = COLOR_CA;
			elseif ($status == "m") $C = COLOR_CM;
		}
		elseif ($C != '')
		{
			// Red colors are reserved to the admin
			if ((strcasecmp($C, COLOR_CA) == 0 || strcasecmp($C, COLOR_CA1) == 0 || strcasecmp($C, COLOR_CA2) == 0) && $C != "" && $status != "a")
			{
				if ($status == "m")
				{
					$C = COLOR_CM; //default moderator's color
				}
				else
				{
					$C = '';	//default color
				}
			}
			// Blue colors are reserved to a moderator for the current room
			elseif ((strcasecmp($C, COLOR_CM) == 0 || strcasecmp($C, COLOR_CM1) == 0 || strcasecmp($C, COLOR_CM2) == 0) && $C != "" && $status != "a" && $status != "m")
			{
				$C = '';	//default color
			}
		}
	};
		include_once("./lib/swearing.lib.php");
		if (checkwords($C, true)) $C = '';		//if user is using a swear word (defined in swearing.lib.php), the font color will resets to default. this is to keep your database as well as our computer clean of swearing (no swear into your cookies on your local computer).
		if (isset($C) && $C != '')
		{
			if (strcasecmp($C, COLOR_CD) != 0)
			{
				$M = "<FONT COLOR=\"".$C."\">".$M."</FONT>";
				setcookie("CookieColor", $C, time() + 60*60*24*365);        // cookie expires in one year
			}
		}
	$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '".addslashes($U)."', '$Latin1', ".time().", '$Private', '".addslashes($M)."', '$Read', '$RF')");
};

	// ** Define the default color that will be used for messages **
	//Color's Power Filter Mod by Ciprian
		$DbLink->query("SELECT colorname FROM ".C_REG_TBL." WHERE username = '$U' LIMIT 1");
		if ($DbLink->num_rows() != 0 && (!isset($C)))
		{
	    list($colorname) = $DbLink->next_record();
		}
	if (isset($HTTP_COOKIE_VARS["CookieColor"]) && (!isset($C))) $C = $HTTP_COOKIE_VARS["CookieColor"];
	//Registered colorname to use for text color by Ciprian
	elseif (isset($colorname) && (!isset($C))) $C = $colorname;
	if (!COLOR_ALLOW_GUESTS && $status == "u") $C = '';
	if (COLOR_FILTERS)
	{
		if (!isset($C))
		{
			if ($status == "a") $C = COLOR_CA;
			elseif ($status == "m") $C = COLOR_CM;
		}
		elseif ($C != '')
		{
			// Red colors are reserved to the admin
			if ((strcasecmp($C, COLOR_CA) == 0 || strcasecmp($C, COLOR_CA1) == 0 || strcasecmp($C, COLOR_CA2) == 0) && $C != "" && $status != "a")
			{
				if ($status == "m")
				{
					$ErrorC = COL_ERROR_BOX_MODA;
					setcookie("CookieColor", "", time());        // delete power color cookie
					$C = COLOR_CM; //default moderator's color
				}
				else
				{
					$ErrorC = COL_ERROR_BOX_USRA;
					setcookie("CookieColor", "", time());        // delete power color cookie
					$C = '';	//default color
				}
			}
			// Blue colors are reserved to a moderator for the current room
			elseif ((strcasecmp($C, COLOR_CM) == 0 || strcasecmp($C, COLOR_CM1) == 0 || strcasecmp($C, COLOR_CM2) == 0) && $C != "" && $status != "a" && $status != "m")
			{
					$ErrorC = COL_ERROR_BOX_USRM;
					setcookie("CookieColor", "", time());        // delete power color cookie
					$C = '';	//default color
			}
		}
	};

// ** Test for online commands and swear words **
$IsCommand = false;
$RefreshMessages = false;
$IsPopup = false;
$IsM = false;

if (isset($M) && trim($M) != "" && ereg("^\/", $M)) include("./lib/commands.lib.php");

if (isset($M) && ereg("^\/", $M) && !($IsCommand) && !isset($Error)) $Error = L_BAD_CMD;

if (isset($M) && trim($M) != "" && (!isset($M0) || ($M != $M0)) && !($IsCommand || isset($Error)))
{
	if (C_NO_SWEAR && $R != C_NO_SWEAR_ROOM1 && $R != C_NO_SWEAR_ROOM2 && $R != C_NO_SWEAR_ROOM3 && $R != C_NO_SWEAR_ROOM4)
	{
		include("./lib/swearing.lib.php");
		if (checkwords($C, true)) $C = '';		//if user is using a swear word (defined in swearing.lib.php), the font color will resets to default. this is to keep your database as well as our computer clean of swearing (no swear into your cookies on your local computer).
		$M = checkwords($M, false);
	}
// Bob Dickow Custom code for /away command modification:

   $DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$U'");

   if ($DbLink->num_rows() != 0)
   {
     list($awaystat) = $DbLink->next_record();
   }
   $DbLink->clean_results();

   if ($awaystat == '1') {
     $Msg = sprintf(L_BACK . C_UPDTUSRS, special_char($U,$Latin1));
     $Msg = " <B>$Msg</B>";
     $awaystat = '0';
     AddMessage(stripslashes($M), $T, $R, $U, $C, "", "", $RF);
     $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', '".addslashes($U)."', '$Latin1', ".time().", '$Private', '".addslashes($Msg)."', '', '$RF')");
     $DbLink->query("UPDATE ".C_USR_TBL." SET awaystat='0' WHERE username='$U'");
   } else {
     AddMessage(stripslashes($M), $T, $R, $U, $C, "", "", $RF);
   }
// END Bob Dickow custom code for /away command modification.
	$RefreshMessages = true;
}

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE>Input frame</TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
<!--
// Get the position for the help popup
if (window.parent.NS4) document.captureEvents(Event.MOUSEDOWN);
document.onmousedown = window.parent.displayLocation;
// -->

	// Open popup for administration menu
	function adm_popup()
	{
		window.focus();
		url = "<?php echo($ChatPath); ?>admin.php?L=<?php echo($L); ?>&Link=1";
		param = "width=820,height=550,resizable=yes,scrollbars=yes";
		window.open(url,"admin_popup",param);
	}
</SCRIPT>
</HEAD>

<BODY CLASS="frame" <?php if (!$IsPopup) echo("onLoad=\"if (window.focus) window.parent.get_focus();\""); ?>>
<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0>
<TR>
	<!-- Input form  -->
	<TD valign=top align=left nowrap="nowrap">
	<?php
	// Define the way posted values will be handled according to the javascript abilities
	// of the browser
	if ($Ver == "H")
	{
		$action = "handle_inputH.php";
		$target = "input_sent";
	}
	else
	{
		$action = "input.php";
		$target = "_self";
	};
	?>
	<FORM NAME="MsgForm" ACTION="<?php echo($action); ?>" METHOD="POST" AUTOCOMPLETE="OFF" TARGET="<?php echo($target); ?>" onSubmit="return window.parent.validateSubmission();">
		<INPUT TYPE="hidden" NAME="From" VALUE="<?php echo($From); ?>">
		<INPUT TYPE="hidden" NAME="Ver" VALUE="<?php echo($Ver); ?>">
		<INPUT TYPE="hidden" NAME="L" VALUE="<?php echo($L); ?>">
		<INPUT TYPE="hidden" NAME="U" VALUE="<?php echo(htmlspecialchars(stripslashes(urlencode($U)))); ?>">
		<INPUT TYPE="hidden" NAME="R" VALUE="<?php echo(htmlspecialchars(stripslashes(urlencode($R)))); ?>">
		<INPUT TYPE="hidden" NAME="T" VALUE="<?php echo($T); ?>">
		<INPUT TYPE="hidden" NAME="D" VALUE="<?php echo($D); ?>">
		<INPUT TYPE="hidden" NAME="N" VALUE="<?php echo($N); ?>">
		<INPUT TYPE="hidden" NAME="O" VALUE="<?php echo($O); ?>">
		<INPUT TYPE="hidden" NAME="ST" VALUE="<?php echo($ST); ?>">
		<INPUT TYPE="hidden" NAME="NT" VALUE="<?php echo($NT); ?>">
		<INPUT TYPE="hidden" NAME="PWD_Hash" VALUE="<?php echo(isset($PWD_Hash) ? $PWD_Hash : ''); ?>">

		<!-- Ignored users list -->
		<INPUT TYPE="hidden" NAME="Ign" VALUE="<?php echo(isset($Ign) ? htmlspecialchars(stripslashes($Ign)) : ""); ?>">

		<!-- Last sent message or command (will be used for the '/!' command) -->
		<INPUT TYPE="hidden" NAME="M0" VALUE="<?php echo(isset($M) ? htmlspecialchars(stripslashes($M)) : ""); ?>">

		<A HREF="help_popup.php?<?php echo("L=$L&Ver=$Ver"); ?>" onClick="window.parent.help_popup(); return false" TARGET="_blank" onmouseover="document.images['helpImg'].src = window.parent.imgHelpOn.src" onmouseout="document.images['helpImg'].src = window.parent.imgHelpOff.src" title="<?php echo(L_HLP); ?>"><IMG NAME="helpImg" SRC="images/helpOff.gif" WIDTH=30 HEIGHT=20 BORDER=0 ALT="<?php echo(L_HLP); ?>" onMouseOver="window.status='Open the Help page.'; return true" onClick="document.forms['MsgForm'].elements['M'].focus();"></A>&nbsp;

		<?php
		// Get the value to put in the message box : preceding M0 field value for /! command,
		// preceding entry if it was an erroneous command, else nothing;
		$ValM = $IsM ? $M0 : "";
		if (isset($Error) && !($IsCommand)) $ValM = $M;
		?>
		<INPUT TYPE="text" NAME="M" SIZE="50" MAXLENGTH="299" VALUE="<?php echo(htmlspecialchars(stripslashes($ValM))); ?>">

		<!-- Addressee that will be filled when the user click on a nick at the users frame -->
		<INPUT TYPE="hidden" NAME="MsgTo" VALUE="">

<?php
// Color Input Select mod by Alexander Eisele <xaex@mail.ru> & Ciprian
// Drop down list of colors
$ColorList = COLORLIST;
if (COLOR_FILTERS)
{
	if (!COLOR_ALLOW_GUESTS && $status == "u")
	{
		$ColorList = '"",'.COLOR_CD.'';
	}
	elseif (COLOR_ALLOW_GUESTS && $status != "a" && $status != "m")
	{
		if (COLOR_CA != "") $ColorList = eregi_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = eregi_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = eregi_replace('"'.COLOR_CA2.'",', "", $ColorList);
		if (COLOR_CM != "") $ColorList = eregi_replace('"'.COLOR_CM.'",', "", $ColorList);
		if (COLOR_CM1 != "") $ColorList = eregi_replace('"'.COLOR_CM1.'",', "", $ColorList);
		if (COLOR_CM2 != "") $ColorList = eregi_replace('"'.COLOR_CM2.'",', "", $ColorList);
	}
	elseif ($status == "m")
	{
		if (COLOR_CA != "") $ColorList = eregi_replace('"'.COLOR_CA.'",', "", $ColorList);
		if (COLOR_CA1 != "") $ColorList = eregi_replace('"'.COLOR_CA1.'",', "", $ColorList);
		if (COLOR_CA2 != "") $ColorList = eregi_replace('"'.COLOR_CA2.'",', "", $ColorList);
	}
}
else
{
	if (!COLOR_ALLOW_GUESTS && $status == "u")
	{
		$ColorList = '"",'.COLOR_CD.'';
	}
}
$ColorList = eregi_replace('"', "", $ColorList);
$CC = explode(",", $ColorList);
			echo("<SELECT NAME=\"C\">\n");
			while(list($ColorNumber1, $ColorCode) = each($CC))
			{
				// Red color is reserved to the admin or a moderator for the current room
				if ($ColorCode != "" && $ColorCode != COLOR_CD) echo("<OPTION style=\"background-color:".$ColorCode."; color:".COLOR_CD."\" VALUE=\"".$ColorCode."\"");
				else echo("<OPTION style=\"background-color:".COLOR_CD."; color:".COLOR_CD."\" VALUE=\"".$ColorCode."\"");
				if ($C == $ColorCode) echo(" SELECTED");
				if ($ColorCode != "" && $ColorCode != COLOR_CD && $ColorCode != COLOR_CA && $ColorCode != COLOR_CM && $ColorCode != $colorname) echo(">".$ColorCode."</OPTION>");
				elseif ($ColorCode == $colorname && $ColorCode != "") echo(">".$ColorCode." (profile color)</OPTION>");
				elseif ($ColorCode == COLOR_CA) echo(COLOR_FILTERS ? ">".$ColorCode." (admin's color)</OPTION>" : ">".$ColorCode."</OPTION>");
				elseif ($ColorCode == COLOR_CM) echo(COLOR_FILTERS ? ">".$ColorCode." (moder's color)</OPTION>" : ">".$ColorCode."</OPTION>");
				elseif ($ColorCode == "") echo(">Null (default)</OPTION>");
				else echo(">".COLOR_CD." (room's color)</OPTION>");
			}
			echo("\n</SELECT>\n");
?>
		<INPUT TYPE="hidden" NAME="sent" VALUE="0">
		<INPUT TYPE="submit" NAME="sendForm" VALUE=<?php echo(L_OK); ?> onClick="document.forms['MsgForm'].elements['M'].focus();">
</TD>
</TR>
<TR>
<TD valign=top align=left nowrap="nowrap">
<?php
// Avatar System Start.
	if (C_USE_AVATARS && C_AVA_PROFBUTTON)
	{
    $DbLink->query("SELECT * FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
    if ($DbLink->num_rows() != 0)
    {
      $Cmd2Send = "'profile',''";
?>
<A HREF="#" onClick="window.parent.runCmd(<?php echo($Cmd2Send); ?>); return false;" TARGET="_blank" onmouseover="document.images['launchProfimage'].src = window.parent.ProfimageOn.src" onmouseout="document.images['launchProfimage'].src = window.parent.ProfimageOff.src" title="<?php echo(L_SEL_NEW_AV); ?>"><IMG name="launchProfimage" SRC="images/avatarbuttonroll.gif" WIDTH=25 HEIGHT=25 BORDER=0 ALT="<?php echo(L_SEL_NEW_AV); ?>" onMouseOver="window.status='<?php echo(L_SEL_NEW_AV); ?>'; return true;"></A>&nbsp;
<?php
    }
           $DbLink->clean_results();
	}
$DbLink->close(); // Avatar: moved down from earlier in file.
// Avatar System End.
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
function inputDropMsg()
{
	window.focus();
        selInd = document.forms['MsgForm'].quicknote.selectedIndex;
        window.document.forms['MsgForm'].elements['M'].value = window.document.forms['MsgForm'].quicknote.options[selInd].value;
        window.document.forms['MsgForm'].quicknote.selectedIndex = 0;
};
// -->
</SCRIPT>
<?php
// use the following line for admins only to get a quicknote drop menu:
// if (isset($dropdownmsg) && ($status == "a")) {
// or use the following line version if you want moderators to get a drop menu too.
// if (isset($dropdownmsg) && ($status == "a" || $status == "m")) {
// or use the following line version if you want everybody to have access to it:
$qnotelabel = "".L_QUICK."";
 if (isset($dropdownmsga) && $status == "a") {
  print "<select name=\"quicknote\" onChange=\"inputDropMsg()\">";
       print "<option value=\"\">$qnotelabel</option>\n";
	foreach ($dropdownmsga as $msg) {
	   $msg = sprintf ("$msg","$U");
           print "<option value=\"$msg\">$msg</option>\n";
        }
}
 elseif (isset($dropdownmsgm) && $status == "m") {
  print "<select name=\"quicknote\" onChange=\"inputDropMsg()\">";
       print "<option value=\"\">$qnotelabel</option>\n";
	foreach ($dropdownmsgm as $msg) {
	   $msg = sprintf ("$msg","$U");
           print "<option value=\"$msg\">$msg</option>\n";
        }
}
else {
 if (isset($dropdownmsg)) {
  print "<select name=\"quicknote\" onChange=\"inputDropMsg()\">";
       print "<option value=\"\">$qnotelabel</option>\n";
	foreach ($dropdownmsg as $msg) {
	   $msg = sprintf ("$msg","$U");
           print "<option value=\"$msg\">$msg</option>\n";
       }
		}
	}
        print "</select>";
?>
&nbsp;&nbsp;
<?php
if (C_USE_SMILIES == 1)
{
?>
		<A HREF="<?php echo($ChatPath); ?>smilie_popup.php?L=<?php echo($L); ?>" onClick="window.parent.smilie_popup(); return false" TARGET="_blank" onClick="document.forms['MsgForm'].elements['M'].focus();" onMouseOver="window.status='Open the Smilies Gallery.'; return true" title="Smilie Gallery" ><img src="images/smilies/smile42.gif" border=0></A>&nbsp;
<?php
}
if ($status == "a")
{
?>
		<A HREF="<?php echo($ChatPath); ?>admin.php?L=<?php echo($L); ?>&Link=1" CLASS="ChatReg" onClick="adm_popup(); return false" onMouseOver="window.status='Administration panel.'; return true" TARGET="_blank"><?php echo(L_REG_35); ?></A>&nbsp;
<?php
}
// Settings bellow should be the same as in lib/commands/buzz.php.
 //if ($status == "a") // use this  to show buzz list only to administrators
if (($status == "m") OR ($status == "a")) // use this to show buzz list to both admins and moderators.
//if (($status == "m") OR ($status == "a") OR ($status == "r")) // use this to show buzz list to admins, moderators and registered users. Guests can't use it.
{
?>
		<A HREF="<?php echo($ChatPath); ?>buzz_popup.php?L=<?php echo($L); ?>" onClick="window.parent.buzz_popup(); return false" CLASS="ChatReg" onClick="document.forms['MsgForm'].elements['M'].focus();" onMouseOver="window.status='Open the Buzzes Gallery.'; return true" title="Buzzes Gallery" TARGET="_blank"><?php echo(L_BUZZ); ?></A>&nbsp;
<?php
}
?>
</TD>
<td align=right><span style="background-color:yellow; color:blue; font-weight:600"><?php echo($U); ?></span></td>
</FORM>
</TR>
</TABLE>

<?php

// ** Refresh the messages frame if necessary **
if($RefreshMessages)
{
	$Tmp = isset($Ign) ? "&Ign=".urlencode(stripslashes($Ign)) : "";
	$First = isset($First) ? $First : 0;
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	<?php
	if ($Ver == "H")
	{
		if ($First) echo("window.parent.frames['messages'].window.document.close();\n\twindow.parent.connect = 0;\n");
		?>
		if (window.parent.connect == 0)
		{
			window.parent.refresh_query = "<?php echo("From=".urlencode($From)."&L=$L&U=".urlencode(stripslashes($U)).(isset($PWD_Hash) ? '&PWD_Hash=' . $PWD_Hash : '')."&R=".urlencode(stripslashes($R))."&T=$T&D=$D&N=$N&ST=$ST&NT=$NT".$Tmp."&First=$First"); ?>";
			window.parent.force_refresh();
		};
		<?php
	}
	else
	{
		?>
		window.parent.frames['messages'].window.location = 'messagesL.php?<?php echo("From=".urlencode($From)."&L=$L&U=".urlencode(stripslashes($U)).(isset($PWD_Hash) ? '&PWD_Hash=' . $PWD_Hash : '')."&R=".urlencode(stripslashes($R))."&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT".$Tmp); ?>';
		<?php
	};
	?>
	// -->
	</SCRIPT>
	<?php
};

// ** Display a JavaScript alert box with the error message if necessary **
if(isset($Error))
{
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	document.forms['MsgForm'].elements['M'].select();
	alert("<?php echo(str_replace("\\\\n","\\n",addslashes($Error))); ?>");
	// -->
	</SCRIPT>
	<?php
}

// ** Display a JavaScript alert box with the error message if necessary, but send the message anyway (resets the color for Color mod bye Ciprian) **
if(isset($ErrorC))
{
	?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	alert("<?php echo(str_replace("\\\\n","\\n",addslashes($ErrorC))); ?>");
	document.forms['MsgForm'].elements['M'].focus();
	// -->
	</SCRIPT>
	<?php
}

// ** Put JavaScript instructions that commands may have set
if (isset($jsTbl))
{
	for (reset($jsTbl); $jsInst=current($jsTbl); next($jsTbl))
	{
		echo("$jsInst\n");
	};
	unset($jsTbl);
}
?>
</BODY>

</HTML>