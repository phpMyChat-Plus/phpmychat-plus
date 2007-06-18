<?php
/* ------------------------------------------------------------------------------------
	This script is called when something has been sent at the 'input' frame for DHTML
	enabled browsers (then the 'input' frame itself is not reloaded)
   ------------------------------------------------------------------------------------ */

// Get the names and values for vars sent by index.lib.php
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for post vars
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
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
if (isset($_COOKIE["CookieRoom"])) $R = urldecode($_COOKIE["CookieRoom"]);

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
$M = str_replace("\"", "&quot;", $M);
$M = str_replace("'","&#39;", $M);
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
		if(!C_HTML_TAGS_SHOW)
		{
			// eliminates every HTML like tags
			$M = ereg_replace("<[^>]+>", "", $M);
			$M = ereg_replace("x3c", "", $M);
			$M = ereg_replace("x3e", "", $M);
			$M = ereg_replace("\"", "", $M);
			$M = ereg_replace("\'","", $M);
		}
		else
		{
			// or keep it without effect
			$M = str_replace("<", "&lt;", $M);
			$M = str_replace(">", "&gt;", $M);
			$M = str_replace("x3c", "&lt;", $M);
			$M = str_replace("x3e", "&gt;", $M);
			$M = str_replace("\"", "&quot;", $M);
			$M = str_replace("\'","&#39;", $M);
		}
	}
	else
	{
		// then C_HTML_TAGS_KEEP == "simple", we keep U, B and I tags
		$M = str_replace("<", "&lt;", $M);
		$M = str_replace(">", "&gt;", $M);
		$M = str_replace("x3c", "&lt;", $M);
		$M = str_replace("x3e", "&gt;", $M);
		$M = str_replace("\"", "&quot;", $M);
		$M = str_replace("\'","&#39;", $M);

		if(function_exists("preg_match"))
		{
			while(preg_match("/&lt;([ubi]?)&gt;(.*?)&lt;(\/\\1)&gt;/i",$M))
			{
				$M = preg_replace("/&lt;([ubi]?)&gt;(.*?)&lt;(\/\\1)&gt;/i","<\\1>\\2<\\3>",$M);
			}
			if(!C_HTML_TAGS_SHOW)
			{
				$M = preg_replace("/&lt;\/?[ubi]?&gt;/i","",$M);
			}
		}
	}

	// URL
	$M = eregi_replace('([[:space:]]|^)(www[.])', '\\1http://\\2', $M); // no prefix (www.myurl.ext)
	$M = eregi_replace('([[:space:]]|^)(ftp[.])', '\\1ftp://\\2', $M); // no prefix (ftp.myurl.ext)
	// Word wrap fix by Alexander Eisele <xaex@xaex.de>
	if (!preg_match_all("((http://|https://|ftp://|mailto:)[^ ]+)", $M, $pmatch))
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
	if (C_USE_SMILIES)
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

// Color Sniffer scripting safe mode filter by Alexander Eisele <xaex@xeax.de> & Ciprian
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
	if (isset($_COOKIE["CookieColor"]) && (!isset($C))) $C = $_COOKIE["CookieColor"];
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
	if (isset($_COOKIE["CookieColor"]) && (!isset($C))) $C = $_COOKIE["CookieColor"];
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
// Bob Dickow Custom code for /away command modification - modified by Ciprian for Plus behaviour.:

   $DbLink->query("SELECT awaystat FROM ".C_USR_TBL." WHERE username='$U'");

   if ($DbLink->num_rows() != 0)
   {
     list($awaystat) = $DbLink->next_record();
   }
   $DbLink->clean_results();

   if ($awaystat == '1') {
     $Msg = "sprintf(L_BACK, \"".special_char($U,$Latin1)."\")";
     $time_back = time() - 1;
     $awaystat = '0';
     $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS away', '$Latin1', '$time_back', '$U', '".addslashes($Msg)."', '', '$RF')");
     $DbLink->query("UPDATE ".C_USR_TBL." SET awaystat='0' WHERE username='$U'");
   }
   AddMessage(stripslashes($M), $T, $R, $U, $C, "", "", $RF);
// END Bob Dickow custom code for /away command modification - modified by Ciprian for Plus behaviour..
	$RefreshMessages = true;
}

$DbLink->close();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE>Hidden Input frame</TITLE>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
<!--
if (typeof(window.parent.frames['input']) != 'undefined'
	&& typeof(window.parent.frames['input'].window.document.forms['MsgForm']) != 'undefined'
	&& window.parent.frames['input'].window.document.forms['MsgForm'].elements['sent'] != '0')
{

	/* Udate the Form at the 'input' frame */
	with (window.parent.frames['input'].window.document.forms['MsgForm'])
	{
		elements['D'].value = "<?php echo($D); ?>";
		elements['N'].value = "<?php echo($N); ?>";
		elements['O'].value = "<?php echo($O); ?>";
		elements['ST'].value = "<?php echo($ST); ?>";
		elements['NT'].value = "<?php echo($NT); ?>";
		elements['Ign'].value = "<?php echo(isset($Ign) ? htmlspecialchars(stripslashes($Ign)) : ""); ?>";
		elements['M0'].value = "<?php echo(isset($M) ? htmlspecialchars(stripslashes($M)) : ""); ?>";

		// Get the value to put in the message box : previous M0 field value for /! command,
		// previous entry if it was an erroneous command, else nothing;
		<?php
		$ValM = $IsM ? $M0 : "";
		if (isset($Error) && !($IsCommand)) $ValM = $M;
		?>
		elements['M'].value = "<?php echo(htmlspecialchars(stripslashes($ValM))); ?>";
		elements['C'].value = "<?php echo($C); ?>";
		elements['MsgTo'].value = "";
		elements['sent'].value = "0";

		if (document.all) elements['sendForm'].disabled = false;
	};

	<?php
	if ($RefreshMessages)
	{
		$Tmp = (isset($Ign) && $Ign != "") ? "&Ign=".urlencode(stripslashes($Ign)) : "";
		$First = isset($First) ? $First : 0;
		?>
		/* Refresh the message frame or append messages to it */
		<?php
		if ($First) echo("window.parent.frames['messages'].window.document.close();\n\twindow.parent.connect = 0;\n");
		?>
		if (window.parent.connect == 0)
		{
			window.parent.refresh_query = "<?php echo("From=".urlencode($From)."&L=$L&U=".urlencode(stripslashes($U)).(isset($PWD_Hash) ? '&PWD_Hash=' . $PWD_Hash : '')."&R=".urlencode(stripslashes($R))."&T=$T&D=$D&N=$N&ST=$ST&NT=$NT".$Tmp."&First=$First"); ?>";
			window.parent.force_refresh();
		};
		<?php
	};

	if(isset($Error))
	{
		?>
		/* Display a JavaScript alert box with the error message */
		window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].select();
		alert("<?php echo(utf8_encode(str_replace("\\\\n","\\n",addslashes($Error)))); ?>");
		<?php
	};
	?>

	<?php
// ** Display a JavaScript alert box with the error message if necessary, but send the message anyway (resets the color for Color mod bye Ciprian) **
if(isset($ErrorC))
{
	?>
	alert("<?php echo(utf8_encode(str_replace("\\\\n","\\n",addslashes($ErrorC)))); ?>");
	window.parent.frames['input'].window.document.forms['MsgForm'].elements['M'].focus();
	<?php
};
	$posted_var_list = "From=$From&Ver=$Ver&L=$L&U=$U&R=$R&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT";
	if (isset($PWD_Hash) && $PWD_Hash != "") $posted_var_list .= "&PWD_Hash=$PWD_Hash";
	$posted_var_list .= "&dummy=".uniqid("");	// Force reload from the server (not from the cache)

	if (isset($status) && $status == "m")
	{
		?>
		/* Add the mod's color when the user has been promoted to moderator */
		if (!window.parent.isModerator)
		{
			window.parent.frames['input'].window.location.replace("input.php?<?php echo($posted_var_list); ?>");
			window.parent.isModerator = 1;
		}
		<?php
	}
	elseif (!isset($status) || $status != "a")
	{
		?>
		/* Remove the mod's color when the user has became a 'simple user */
		if (window.parent.isModerator)
		{
			window.parent.frames['input'].window.location.replace("input.php?<?php echo($posted_var_list); ?>");
			window.parent.isModerator = 0;
		}
		<?php
	};
	?>
};

// -->
</SCRIPT>
</HEAD>

<BODY>
<?php
// Display JavaScript instructions that commands may have set
if (isset($jsTbl))
{
	for (reset($jsTbl); $jsInst=current($jsTbl); next($jsTbl))
	{
		echo("$jsInst\n");
	};
	unset($jsTbl);
}
else
{
	echo("\t<!-- Not a blank document ;) -->\n");
};
?>
</BODY>

</HTML>