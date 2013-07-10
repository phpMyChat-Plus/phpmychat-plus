<?php
/* ----------------------------------------------------------------------------------
   This is the main library called by the start screen of phpMyChat. It contains:
   - the common work at the beginning;
   - all what have to be done once the user has submit the form (part I);
   - the 'send_headers' function that is used.... to send some HTTP headers and
		to define the <HEAD> part of the starting page;
   - the 'layout' function that creates the start page.

   The mains PHP variables used inside this script are:
   - $L -> the current language;
   - $Charset -> the name of the charset associated to the current language;
   - $Ver -> the JavaScript abilities of the browser of the user ('H' when DHTML
		enabled, 'M' when JavaScript1.1, 'L' else).
   - $U -> the login nick of the user;
   - $pmc_password -> the password of the user in clear mode;
   - $PWD_Hash -> the md5 hash of '$pmc_password';
   - $N -> the number of messages to be shown each time the 'messages' frame is
		reloaded;
   - $D -> the timeout between each update of the 'messages' frame;
   - $T -> the type of the room the user wants to enter in;
   - $R0 -> the name of the default public room the user wants to enter in (not
		defined if he doesn't choose to enter one of the default public rooms);
   - $R1 -> the name of the 'other created' public room the user wants to enter in (not
		defined if he doesn't choose to enter one of the 'other' public rooms);
   - $R2 -> the name of the default private room the user wants to enter in (not
		defined if he doesn't choose to enter one of the default private rooms);
   - $R3 -> the name of the room the user wants to create (not defined if he
		doesn't choose to create a room);
   - $E -> the name of the room the user just leaves. When $E is defined, the $EN
		boolean variable may also be defined and requires this script to insert
		an exit message to the 'messages' table;
   - $Reload -> when the user runs some specific actions inside the chat (he uses
		the '/join' command, clicks on a room name at the 'users' frame or resizes
		the window for the browser inside netscape 4+), this variable is defined
		to skip some tests that aren't necessary;
   - $perms -> permission level of the user for the room he wants to enter in.
   ---------------------------------------------------------------------------------- /*



/*********** COMMON WORK ***********/

// Get the names and values for vars sent to index.lib.php
if (isset($_GET))
{
	// Prevent any possible XSS attacks via $_GET.
	foreach ($_GET as $check_url) {
		if (!is_array($check_url)) {
			$check_url = str_replace("\"", "", $check_url);
			if ((preg_match("/<[^>]*script*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*object*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*iframe*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*applet*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*meta*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*style*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*form*\"?[^>]*>/i", $check_url)) || (preg_match("/\([^>]*\"?[^)]*\)/i", $check_url)) ||
				(preg_match("/\"/i", $check_url))) {
			die ();
			}
		}
	}
	unset($check_url);
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for vars posted from the form below
if (isset($_POST))
{
	// Prevent any possible XSS attacks via $_POST.
	foreach ($_POST as $check_url) {
		if (!is_array($check_url)) {
			$check_url = str_replace("\"", "", $check_url);
			if ((preg_match("/<[^>]*script*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*object*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*iframe*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*applet*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*meta*\"?[^>]*>/i", $check_url)) || (preg_match("/<[^>]*style*\"?[^>]*>/i", $check_url)) ||
				(preg_match("/<[^>]*form*\"?[^>]*>/i", $check_url)) || (preg_match("/\([^>]*\"?[^)]*\)/i", $check_url)) ||
				(preg_match("/\"/i", $check_url))) {
			die ();
			}
		}
	}
	unset($check_url);
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (isset($_COOKIE["CookieHash"])) $RemMe = $_COOKIE["CookieHash"];
else unset($RemMe);
if (isset($RemMe) && isset($_COOKIE["CookieUsername"]) && $_COOKIE["CookieUsername"] != urlencode(stripslashes($U))) unset($RemMe);
if (isset($_COOKIE["CookieBeep"])) $CookieBeep = $_COOKIE["CookieBeep"];

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}lib/release.lib.php");
require("./${ChatPath}localization/languages.lib.php");
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}lib/clean.lib.php");
include("./${ChatPath}lib/get_IP.lib.php");

// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
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

// Get the relative path to the script that called this one
if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER["SCRIPT_NAME"];
$Action = basename($PHP_SELF);
#$From = urlencode(ereg_replace("[^/]+/","../",$ChatPath).$Action);
$From = urlencode(preg_replace("#[^/]+/#","../",$ChatPath).$Action);

// For translations with a real iso code
if (!isset($FontFace)) $FontFace = "";
// For others translations
$DisplayFontMsg = !(isset($U) && $U != "");

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset != "utf-8" ? 1 : 0);
function special_char($str,$lang)
{
	return addslashes($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
};

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
/*
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
*/
		if (stripos($type,"TITLE") !== false) $str = ucwords($str);
		elseif (stripos($type,"LOWER") !== false) $str = strtolower($str);
		elseif (stripos($type,"UPPER") !== false) $str = strtoupper($str);
		return $str;
	};
};

if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};

if (!function_exists("utf8_substr"))
{
	function utf8_substr($str,$start)
	{
	   preg_match_all("/./su", $str, $ar);
	   if(func_num_args() >= 3) {
	       $end = func_get_arg(2);
	       return join("",array_slice($ar[0],$start,$end));
	   } else {
	       return join("",array_slice($ar[0],$start));
	   }
	};
};

// Ensure a room ($what) is include in a rooms list ($in)
function room_in($what, $in, $Charset)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($room_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	};
	return false;
};

// Ghost Control mod by Ciprian
function ghosts_in($what, $in, $Charset)
{
	$ghosts = explode(",",$in);
	for (reset($ghosts); $ghost_name=current($ghosts); next($ghosts))
	{
		if (strcasecmp(mb_convert_case($what,MB_CASE_LOWER,$Charset), mb_convert_case($ghost_name,MB_CASE_LOWER,$Charset)) == 0) return true;
	}
	return false;
};

function remote_file_exists ($url)
{
/*
	Return error codes:
	1 = Invalid URL host
	2 = Unable to connect to remote host
*/
	$head = "";
	$url_p = parse_url ($url);

	if (isset ($url_p["host"]))
	{ $host = $url_p["host"]; }
	else
	{ return 1; }

	if (isset ($url_p["path"]))
	{ $path = $url_p["path"]; }
	else
	{ $path = ""; }

	$fp = @fsockopen ($host, 80, $errno, $errstr, 20);
	if (!$fp)
	{ return 2; }
	else
	{
		$parse = parse_url($url);
		$host = $parse['host'];

		@fputs($fp, "HEAD ".$url." HTTP/1.1\r\n");
		@fputs($fp, "HOST: ".$host."\r\n");
		@fputs($fp, "Connection: close\r\n\r\n");
		$headers = "";
		while (!feof ($fp))
		{ $headers .= @fgets ($fp, 128); }
	}
	@fclose ($fp);
	$arr_headers = explode("\n", $headers);
	$return = false;
	if (isset ($arr_headers[0]))
	{ $return = strpos ($arr_headers[0], "404") === false; }
	return $return;
}

/*********** PART I ***********/

// Define the message to display if user comes here because he has been kicked
$Reason = "";
$Reason_all = "";
$DbLink = new DB;
$DbLink->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE 'sprintf(L_KICKED_REASON, \"".$U."\", %' AND m_time>".(time()-30)." LIMIT 1");
	$kickeduser = (list($message) = $DbLink->next_record());
	$DbLink->clean_results();
	// The user has been kicked for a reason
	if ($kickeduser)
{
	$Reason = trim($message,"sprintf(L_KICKED_REASON, \".$U.\", ");
	$Reason = trim($Reason,"\")");
}
$DbLink->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE 'sprintf(L_KICKED_ALL_REASON, \"%' AND m_time>".(time()-30)." LIMIT 1");
	$kickeduser_all = (list($message) = $DbLink->next_record());
	$DbLink->clean_results();
	// The user has been kicked for a reason
	if ($kickeduser_all)
{
	$Reason_all = trim(str_replace("sprintf(L_KICKED_ALL_REASON, \"", "", $message));
	$Reason_all = trim($Reason_all,"\")");
}
$DbLink->query("SELECT message FROM ".C_MSG_TBL." WHERE message LIKE 'sprintf(L_BANISHED_REASON, \"".$U."\", %' AND m_time>".(time()-30)." LIMIT 1");
	$banisheduser = (list($message) = $DbLink->next_record());
	$DbLink->clean_results();
	// The user has been kicked for a reason
	if ($banisheduser)
{
	$Reason = trim($message,"sprintf(L_BANISHED_REASON, \".$U.\", ");
	$Reason = trim($Reason,"\")");
}
if (isset($KK))
{
	switch ($KK)
	{
		case '1':
			if ($Reason == "" && $Reason_all == "") $Error = L_REG_18;
			elseif ($Reason != "") $Error = sprintf(L_REG_18a, $Reason);
			elseif ($Reason_all != "") $Error = sprintf(L_REG_18a, $Reason_all);
			break;
		case '2':
			$Error = L_REG_39;
			break;
		case '3':
			$Error = L_ERR_USR_19;
			break;
		case '4':
			if ($Reason == "") $Error = L_ERR_USR_20;
			else $Error = sprintf(L_ERR_USR_20a, $Reason);
			break;
		default:
	};
};


// Fix some security issues
if (isset($Reload))
{
	$isHacking = false;
	if (($Reload == 'JoinCmd')
	 	&& (empty($E) || empty($Ver) || empty($L) || empty($U) || (empty($R0) && empty($R1) && empty($R2) && empty($R3)) || empty($D)))
	{
		$isHacking = true;
	}
	else if (($Reload == 'NNResize')
	 	&& (empty($Ver) || empty($L) || empty($U) || empty($R) || empty($T) || empty($D) || empty($N)))
	{
		$isHacking = true;
	}
	else
	{
		$DbLink->query("SELECT password FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
		list($user_password) = $DbLink->next_record();
		$DbLink->clean_results();
		if (!empty($user_password) &&  $RemMe != $user_password && (empty($PWD_Hash) || $PWD_Hash != $user_password))
			$isHacking = true;
		unset($user_password);
	}

	if ($isHacking)
	{
		unset($Reload);
		if (isset($U)) unset($U);
		if (isset($PWD_Hash)) unset($PWD_Hash);
		if (isset($T)) unset($T);
		if (isset($R)) unset($R);
		if (isset($R0)) unset($R0);
		if (isset($R1)) unset($R1);
		if (isset($R2)) unset($R2);
		if (isset($R3)) unset($R3);
		if (isset($E)) unset($E);
		if (isset($RemMe)) unset($RemMe);
		if (isset($RM)) unset($RM);
		$Error = L_ERR_USR_10;
	}
}

// Removes user from users table and if necessary add a notication message for him
if(isset($E) && $E != "")
{
	// Fix a security issue
	$DbLink->query("SELECT COUNT(*) FROM " . C_USR_TBL . " WHERE username='$U' AND ip='$IP' AND room='$E'");
	list($isHacking) = $DbLink->next_record();
	$isHacking = 1 - $isHacking;
	$DbLink->clean_results();
	if ($isHacking)
	{
		// HACKERS Atack !!!
		unset($E);
		if (isset($U)) unset($U);
		if ($BT) $Error = L_ERR_USR_21;
		else $Error = L_ERR_USR_10;
	}
	else
	{
		$DbLink->query("SELECT status FROM ".C_USR_TBL." WHERE username='$U' AND room='$E' LIMIT 1");
		if ($DbLink->num_rows() != 0);
		{
			list($statusu) = $DbLink->next_record();
			$DbLink->clean_results();
		}
		$DbLink->query("DELETE FROM ".C_USR_TBL." WHERE username='$U' AND room='$E'");
		// Ghost Control mod by Ciprian
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
		}
		if (($sghosts != "" && ghosts_in(stripslashes($U), $sghosts, $Charset)) || (C_HIDE_ADMINS && ($statusu == "a" || $statusu == "t")) || (C_HIDE_MODERS && $statusu == "m"))
		{
		}
		elseif (isset($EN))
		{
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($EN, '$E', 'SYS exit', '$Latin1', ".time().", '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1)."\")', '', '')");
			if(C_EN_STATS)
			{
				$curtime = time();
				$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($curtime-last_away), longest_away=IF($curtime-last_away < longest_away, longest_away, $curtime-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$E' AND username='$U' AND last_away!='0'");
				$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($curtime-last_in), longest_in=IF($curtime-last_in < longest_in, longest_in, $curtime-last_in), last_in='' WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$E' AND username='$U' AND last_in!='0'");
			}
		}
	}
}

// If no room is specified but the main form has been posted, define the room to enter
// in as the first among default ones
if ((isset($Form_Send) && $Form_Send) && ((!C_VERSION || ((!isset($R0) || $R0 == "") && (!isset($R1) || $R1 == "") && (!isset($R2) || $R2 == "") && (!isset($R3) || $R3 == ""))))) $R0 = $DefaultChatRooms[0];

// Optimize some of the tables when the user logs in
if(isset($U) && (isset($N) && $N != ""))
{
	$DbLink->optimize(C_MSG_TBL);
	$DbLink->optimize(C_USR_TBL);
	$DbLink->optimize(C_REG_TBL);
	$DbLink->optimize(C_BAN_TBL);
	$DbLink->optimize(C_CFG_TBL);
	$DbLink->optimize(C_LRK_TBL);
	$DbLink->optimize(C_STS_TBL);
}

//**	Ensures the nick is a valid one except if the frameset is reloaded because of the
//		NN4+ resize bug or because the user runs a join command.	**
if(!isset($Reload) && isset($U) && (isset($N) && $N != ""))
{
	$relog = false;
	if (C_NO_SWEAR) include("./${ChatPath}lib/swearing.lib.php");
	// Check for no nick entered in
	if ($U == "")
	{
		$Error = L_ERR_USR_2;
	}
	// Check for invalid characters or empty nick
#	elseif (trim($U) == "" || ereg("[\, \']", stripslashes($U)))
	elseif (trim($U) == "" || preg_match("/[ |,|'|\\\\]/", $U))
	{
		$Error = L_ERR_USR_16a;
	}
	// Check for swear words in the nick
	elseif (C_NO_SWEAR && checkwords($U, true, $Charset))
	{
		$Error = L_ERR_USR_18;
	}
	else
	{
		$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$U' LIMIT 1");
		$Nb = $DbLink->num_rows();
		// If the same nick is already in use and the user is not registered deny access
		if($Nb != 0 && $pmc_password == "" && $RemMe != $pmc_password && !isset($PWD_Hash))
		{
			$Error = L_ERR_USR_1;
			$DbLink->clean_results();
		}
		else
		{
			list($room) = $DbLink->next_record();
			$DbLink->clean_results();
			$DbLink->query("SELECT password,perms,rooms,allowpopup,last_login,login_counter,join_room FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
			$reguser = ($DbLink->num_rows() != 0);
			if ($reguser) list($user_password,$perms,$rooms,$allowpopupu,$last_login,$login_counter,$join_room) = $DbLink->next_record();
			else $join_room = "";
			$DbLink->clean_results();

			if (!(isset($E) && $E != ""))
			{
				// Check for password if the nick exist in registered users table
				if ($reguser)
				{
					if ($pmc_password == "" && !isset($PWD_Hash))
					{
						$Error = L_ERR_USR_3;
					}
					else
					{
						if (md5(stripslashes($pmc_password)) != $user_password && $RemMe != $user_password && (!isset($PWD_Hash) || $PWD_Hash != $user_password)) $Error = L_ERR_USR_4;
					}
					if (!isset($Error))
					{
						// This will count only the registered user returning to chat
						if ((time() - $last_login > C_LOGIN_COUNTER * 60) || $last_login = "")
						{
							$login_counter = $login_counter + 1;
							$DbLink->query("UPDATE ".C_REG_TBL." SET reg_time=".time().", last_login=".time().", login_counter=".$login_counter." WHERE username='$U'");
						}
						else $DbLink->query("UPDATE ".C_REG_TBL." SET reg_time=".time()." WHERE username='$U'");
						if(isset($remember) && $pmc_password != $user_password && $RemMe != md5(stripslashes($pmc_password)) && $pmc_password != "")
						{
							setcookie("CookieHash", md5(stripslashes($pmc_password)), time() + 60*60*24*365);	// cookie expires in one year
						}
						elseif(!isset($remember) && !isset($RM))
						{
							setcookie("CookieHash", '', time());        // cookie expires now
						}
					}
				}
				// If users isn't a registered one and phpMyChat require registration deny access
				else if (C_REQUIRE_REGISTER)
				{
					$Error = L_ERR_USR_14;
				}
				elseif(isset($remember))
				{
					setcookie("CookieHash", '', time());        // cookie expires now
				}
			}

			// The var below is set to 1 when a registered user is allowed to log using a nick
			// that already exist in the users table
			$relog = ($Nb != 0 && !isset($Error));

			$CookieUsername = urlencode(stripslashes($U));
			setcookie("CookieUsername", $CookieUsername, time() + 60*60*24*365);        // cookie expires in one year
		}
	}
}

// **	Get perms of the user if the script is called by a join command	**
if (isset($Reload) && $Reload == "JoinCmd")
{
	$DbLink->query("SELECT perms,rooms,allowpopup,join_room FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	$reguser = ($DbLink->num_rows() != 0);
	if ($reguser) list($perms,$rooms,$allowpopupu,$join_room) = $DbLink->next_record();
	$DbLink->clean_results();
};


// ** Ensure the user is not banished from the room he wants to enter in **
if(!isset($Error) && (isset($N) && $N != "") && !isset($Reload))
{
	if (C_BANISH != "0" && (!isset($perms) || ($perms != "admin" && $perms != "topmod")))
	{
		include("./${ChatPath}lib/banish.lib.php");
		if ($IsBanished)
		{
			if ($Reason == "") $Error = L_ERR_USR_20;
			else $Error = sprintf(L_ERR_USR_20a, $Reason);
		}
	};
};


// **	Ensures the user can create a room and the room name is a valid one (bypassed test
//		when the frameset is reloaded because of the NN4+ resize bug).	**
if(!isset($Error) && (isset($R3) && $R3 != ""))
{
	// Skipped when the script is called by a join command.
	if (!isset($Reload))
	{
		// User is not registered -> Deny room creation
		if (!$reguser)
		{
			$Error = $T ? L_ERR_USR_13 : L_ERR_USR_24;
		}
		// Check for invalid characters or empty room name
#		elseif (trim($R3) == "" || ereg("[,\]", stripslashes($R3)))
		elseif (trim($R3) == "" || preg_match("/[,|'|\\\\]/", $R3))
		{
			$Error = L_ERR_ROM_1;
		}
		// Check for swear words in room name
		else if(C_NO_SWEAR && checkwords($R3, true, $Charset))
		{
			$Error = L_ERR_ROM_2;
		}
		// Ensure there is no existing room with the same name but a different type...
		else
		{
			// ...among reserved name for private/public (default) rooms
			$ToCheck = ($T ? $DefaultPrivateRooms : $DefaultChatRooms);
			for ($i = 0; $i < count($ToCheck); $i++)
			{
				if (strcasecmp(mb_convert_case($R3,MB_CASE_LOWER,$Charset), mb_convert_case($ToCheck[$i],MB_CASE_LOWER,$Charset)) == "0")
				{
					$Error = (!$T ? L_ERR_ROM_3." (".$R3.")" : L_ERR_ROM_4." (".$R3.")");
					break;
				};
			};
			unset($ToCheck);

			// ...among other rooms created by users
			if (!isset($Error))
			{
				$T1 = 1 - $T;
				$DbLink->query("SELECT count(*) FROM ".C_MSG_TBL." WHERE room = '$R3' AND type = '$T1' LIMIT 1");
				list($Nb) = $DbLink->next_record();
				$DbLink->clean_results();
				if($Nb != 0) $Error = (!$T ? L_ERR_ROM_3." (".$R3.")" : L_ERR_ROM_4." (".$R3.")");
			};
		};
	};

	// Define the user status
	if (!isset($Error))
	{
		$register_room = true;
		// If the name of the room to be created is a reserved one for private/public (default) rooms,
		// status will be 'user'. Skipped when the script is called by a join command.
		if (!isset($Reload))
		{
			$ToCheck = ($T ? $DefaultChatRooms : $DefaultPrivateRooms);
			for ($i = 0; $i < count($ToCheck); $i++)
			{
				if (strcasecmp(mb_convert_case($R3,MB_CASE_LOWER,$Charset), mb_convert_case($ToCheck[$i],MB_CASE_LOWER,$Charset)) == "0") $register_room = false;
			};
			unset($ToCheck);
		};

		// If room name is the same than one of an existing room containing "true" messages
		// (not only notifications of users entrance/exit) or containing only "system"
		// message but an other user is already logged in, status will be 'user'
		if ($register_room)
		{
			$DbLink->query("SELECT Count(*) FROM ".C_MSG_TBL." WHERE room='$R3' AND username NOT LIKE 'SYS %' LIMIT 1");
			list($count) = $DbLink->next_record();
			$register_room = ($count == "0");
			$DbLink->clean_results();
		};

		if ($register_room)
		{
			$DbLink->query("SELECT count(*) FROM ".C_USR_TBL." WHERE room='$R3' AND username != '$U' LIMIT 1");
			list($anybody) = $DbLink->next_record();
			$register_room = ($anybody == 0);
			$DbLink->clean_results();
		};

		if ($register_room)
		{
			// If an other registered user is already moderator for the room to be created but
			// there is no "true" message in this room then set his status to user for this room
			$UpdLink = new DB;
			$DbLink->query("SELECT username,rooms FROM ".C_REG_TBL." WHERE perms = 'moderator' AND username != '$U'");
			while (list($mod_un,$mod_rooms) = $DbLink->next_record())
			{
				$changed = false;
				$roomTab = explode(",",$mod_rooms);
				for ($i = 0; $i < count($roomTab); $i++)
				{
					if (strcasecmp(mb_convert_case(stripslashes($R3),MB_CASE_LOWER,$Charset), mb_convert_case($roomTab[$i],MB_CASE_LOWER,$Charset)) == 0)
					{
						$roomTab[$i] = "";
						$changed = true;
						break;
					};
				};
				if ($changed)
				{
#					$mod_rooms = str_replace(",,",",",ereg_replace("^,|,$","",implode(",",$roomTab)));
					$mod_rooms = str_replace(",,", ",", preg_replace("/^,|,$/","",implode(",",$roomTab)));
					$UpdLink->query("UPDATE ".C_REG_TBL." SET rooms='".addslashes($mod_rooms)."' WHERE username='".addslashes($mod_un)."'");
					$UpdLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE room='$R3' AND username='".addslashes($mod_un)."'");
				};
				unset($roomTab);
			};
			$UpdLink->close();
			$DbLink->clean_results();

			// Update the current user status for the room to be created in registered users table
			$changed = false;
			if (!room_in(stripslashes($R3), $rooms, $Charset))
			{
				if ($rooms != "") $rooms .= ",";
				$rooms .= stripslashes($R3);
				$changed = true;
			}
			if ($perms == "user" || $perms == "")
			{
				$perms = "moderator";
				$changed = true;
			}
			if (($changed) && ($perms != "admin") && ($perms != "topmod"))
			{
				$DbLink->query("UPDATE ".C_REG_TBL." SET perms='$perms', rooms='".addslashes($rooms)."' WHERE username='$U'");
			}
		}
	}
}

if(!isset($Error) && (isset($R2) && $R2 != ""))
{
	// Skipped when the script is called by a join command.
	if (!isset($Reload))
	{
		// User is not registered -> Deny room creation
		if (!$reguser)
		{
			$Error = L_ERR_USR_23;
		}
		// Ensure there is no existing room with the same name but a different type...
	};

	// Define the user status
	if (!isset($Error))
	{
		$register_room = true;
		// If room name is the same than one of an existing room containing "true" messages
		// (not only notifications of users entrance/exit) or containing only "system"
		// message but an other user is already logged in, status will be 'user'
		if ($register_room)
		{
			$DbLink->query("SELECT Count(*) FROM ".C_MSG_TBL." WHERE room='$R2' AND username NOT LIKE 'SYS %' LIMIT 1");
			list($count) = $DbLink->next_record();
			$register_room = ($count == "0");
			$DbLink->clean_results();
		};

		if ($register_room)
		{
			$DbLink->query("SELECT count(*) FROM ".C_USR_TBL." WHERE room='$R2' AND username != '$U' LIMIT 1");
			list($anybody) = $DbLink->next_record();
			$register_room = ($anybody == 0);
			$DbLink->clean_results();
		};

		if ($register_room)
		{
			// If an other registered user is already moderator for the room to be created but
			// there is no "true" message in this room then set his status to user for this room
			$UpdLink = new DB;
			$DbLink->query("SELECT username,rooms FROM ".C_REG_TBL." WHERE perms = 'moderator' AND username != '$U'");
			while (list($mod_un,$mod_rooms) = $DbLink->next_record())
			{
				$changed = false;
				$roomTab = explode(",",$mod_rooms);
				for ($i = 0; $i < count($roomTab); $i++)
				{
					if (strcasecmp(mb_convert_case(stripslashes($R2),MB_CASE_LOWER,$Charset), mb_convert_case($roomTab[$i],MB_CASE_LOWER,$Charset)) == 0)
					{
						$roomTab[$i] = "";
						$changed = true;
						break;
					};
				};
				if ($changed)
				{
#					$mod_rooms = str_replace(",,",",",ereg_replace("^,|,$","",implode(",",$roomTab)));
					$mod_rooms = str_replace(",,", ",", preg_replace("/^,|,$/","",implode(",",$roomTab)));
					$UpdLink->query("UPDATE ".C_REG_TBL." SET rooms='".addslashes($mod_rooms)."' WHERE username='".addslashes($mod_un)."'");
					$UpdLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE room='$R2' AND username='".addslashes($mod_un)."'");
				};
				unset($roomTab);
			};
			$UpdLink->close();
			$DbLink->clean_results();

			// Update the current user status for the room to be created in registered users table
			$changed = false;
			if (!room_in(stripslashes($R2), $rooms, $Charset))
			{
				if ($rooms != "") $rooms .= ",";
				$rooms .= stripslashes($R2);
				$changed = true;
			}
			if ($perms == "user" || $perms == "")
			{
				$perms = "moderator";
				$changed = true;
			}
			if (($changed) && ($perms != "admin") && ($perms != "topmod"))
			{
				$DbLink->query("UPDATE ".C_REG_TBL." SET perms='$perms', rooms='".addslashes($rooms)."' WHERE username='$U'");
			}
		}
	}
}

// **	Ensures the user has no restrictions to the room he chooses to enter, create or join - Rooms Restriction mod by Ciprian
if(!isset($Error) && ((isset($R0) && $R0 != "") || (isset($R1) && $R1 != "") || (isset($R2) && $R2 != "") || (isset($R3) && $R3 != "") || isset($RES)))
{
	if ($join_room == "*" || $perms == "admin" || $perms == "topmod" || ($perms == "moderator" && (room_in(stripslashes(isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : $R1))), $rooms, $Charset) || room_in("*", $rooms, $Charset)))) $restriction = 0;
	elseif ((isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : $R1))) == ROOM1 && $EN_ROOM1 && $RES_ROOM1 && $join_room != "ROOM1") $restriction = 1;
	elseif ((isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : $R1))) == ROOM2 && $EN_ROOM2 && $RES_ROOM2 && $join_room != "ROOM2") $restriction = 1;
	elseif ((isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : $R1))) == ROOM3 && $EN_ROOM3 && $RES_ROOM3 && $join_room != "ROOM3") $restriction = 1;
	elseif ((isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : $R1))) == ROOM4 && $EN_ROOM4 && $RES_ROOM4 && $join_room != "ROOM4") $restriction = 1;
	elseif ((isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : $R1))) == ROOM5 && $EN_ROOM5 && $RES_ROOM5 && $join_room != "ROOM5") $restriction = 1;
	if ($restriction || $RES)
	{
		$Error = sprintf(L_ERR_USR_28,(isset($R0) ? $R0 : (isset($R2) ? $R2 : (isset($R3) ? $R3 : (isset($R1) ? $R1 : $E)))));
		setcookie("CookieRoom", '', time());        // cookie expires in one year
	}
}


// ** Enter the chat **
if(!isset($Error) && (isset($N) && $N != ""))
{
	if(isset($R2) && $R2 != "")
	{
		$R = $R2;
	}
	elseif(isset($R3) && $R3 != "")
	{
		$R = $R3;
	}
	elseif (!isset($R))		// $R is set when the frameset is reloaded because of the NN4+ resize bug.
	{
		$T = 1;
		$R = (isset($R0) && $R0 != "") ? $R0 : $R1;
	};

	$CookieRoom = urlencode(stripslashes($R));
	setcookie("CookieRoom", $CookieRoom, time() + 60*60*24*365);        // cookie expires in one year
	setcookie("CookieRoomType", $T, time() + 60*60*24*365);        // cookie expires in one year
	if (isset($_COOKIE))
	{
		if (isset($_COOKIE["CookieMsgOrder"])) $CookieMsgOrder = $_COOKIE["CookieMsgOrder"];
		if (isset($_COOKIE["CookieUserSort"])) $CookieUserSort = $_COOKIE["CookieUserSort"];
		if (isset($_COOKIE["CookieShowTimestamp"])) $CookieShowTimestamp = $_COOKIE["CookieShowTimestamp"];
		if (isset($_COOKIE["CookieNotify"])) $CookieNotify = $_COOKIE["CookieNotify"];
	};
	if (!isset($O)) $O = isset($CookieMsgOrder) ? $CookieMsgOrder : C_MSG_ORDER;
	if (!isset($ST)) $ST = isset($CookieShowTimestamp) ? $CookieShowTimestamp : C_SHOW_TIMESTAMP;
	if (!isset($NT)) $NT = isset($CookieNotify) ? $CookieNotify : C_NOTIFY;
	if (!isset($sort_order)) $sort_order = isset($CookieUserSort) ? $CookieUserSort : C_USERS_SORT_ORD;
	if (!isset($PWD_Hash)) $PWD_Hash = (isset($reguser) && $reguser ? (isset($RemMe) ? $RemMe : md5(stripslashes($pmc_password))) : "");

	// Define the user status to be put in the users table if necessary. Skipped when the
	// frameset is reloaded because of the NN4+ resize bug.
	if (!isset($Reload) || $Reload != "NNResize")
	{
		if (!isset($perms)) $perms = ((isset($reguser) && $reguser) ? "" : "noreg");
		switch ($perms)
		{
			case 'admin':
				$status = "a";
				break;
			case 'topmod':
				$status = "t";
				break;
			case 'moderator':
				$status = (room_in(stripslashes($R), $rooms, $Charset) || room_in("*", $rooms, $Charset) ? "m" : "r");
				break;
			case 'noreg':
				$status = "u";
				break;
			default:
				$status = "r";
		};
	};

	// Color Input Box mod by Ciprian - it will add the status to the curent cookie for the color_popup
	setcookie("CookieStatus", $status, time() + 60*60*24*365);        // cookie expires in one year

	// Udpates the IP address and the last log. time of the user in the registered users table if necessary
	if (isset($reguser) && $reguser) $DbLink->query("UPDATE ".C_REG_TBL." SET reg_time='".time()."', ip='$IP' WHERE username='$U'");

	// In the case of a registered user that logs again...
	// ...in the same room update his logging time and update his IP address;
	// ...in another room kick him from the other room, put a notification message of
	// 		exit for this room, update the users table and put a notification message of
	// 		entrance for the room he log in.
	$current_time = time();
	if (isset($relog) && $relog)
	{
		if (stripslashes($R) == $room)
		{
// modified by R Dickow for /away command:
			$DbLink->query("UPDATE ".C_USR_TBL." SET u_time='$current_time', ip='$IP', awaystat='0' WHERE username='$U'");
// end R Dickow /away modification.
		}
		else
		{
			$DbLink->query("SELECT type FROM ".C_MSG_TBL." WHERE room='".addslashes($room)."' LIMIT 1");
			list($type) = $DbLink->next_record();
			$DbLink->clean_results();
			// Ghost Control mod by Ciprian
			if (C_SPECIAL_GHOSTS != "")
			{
				$sghosts = "";
				$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
				$sghosts = str_replace(" AND username != ",",",$sghosts);
			}
			if (($sghosts != "" && ghosts_in(stripslashes($U), $sghosts, $Charset)) || (C_HIDE_ADMINS && ($status == "a" || $status == "t")) || (C_HIDE_MODERS && $status == "m"))
			{
			}
			else
			{
				$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$type', '".addslashes($room)."', 'SYS exit', '$Latin1', '$current_time', '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1)."\")', '', '')");
			// next line WELCOME SOUND feature altered for compatibility with /away command R Dickow:
				if(isset($CookieBeep) && $CookieBeep) $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '$Latin1', '$current_time', '', 'stripslashes(sprintf(L_ENTER_ROM, \"".special_char($U,$Latin1)."\"))', '', '')");
				else $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '$Latin1', '$current_time', '', 'stripslashes(sprintf(L_ENTER_ROM_NOSOUND, \"".special_char($U,$Latin1)."\"))', '', '')");
				if(C_EN_STATS)
				{
					$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_away=seconds_away+($current_time-last_away), longest_away=IF($current_time-last_away < longest_away, longest_away, $current_time-last_away), last_away='' WHERE (stat_date=FROM_UNIXTIME(last_away,'%Y-%m-%d') OR stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d')) AND room='$room' AND username='$U' AND last_away!='0'");
					$DbLink->query("UPDATE ".C_STS_TBL." SET seconds_in=seconds_in+($current_time-last_in), longest_in=IF($current_time-last_in < longest_in, longest_in, $current_time-last_in), last_in='' WHERE stat_date=FROM_UNIXTIME(last_in,'%Y-%m-%d') AND room='$room' AND username='$U' AND last_in!='0'");
					$DbLink->query("SELECT room FROM ".C_STS_TBL." WHERE stat_date='".date("Y-m-d")."' AND username='$U' AND room='$R'");
					if ($DbLink->num_rows() != 0)
					{
						$DbLink->query("UPDATE ".C_STS_TBL." SET logins=logins+1,last_in='$current_time' WHERE stat_date='".date("Y-m-d")."' AND room='$R' AND username='$U'");
					}
					else $DbLink->query("INSERT INTO ".C_STS_TBL." VALUES ('".date("Y-m-d")."', '$R', '$U', '$reguser', '$current_time', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");
				}
			}
// modified by R Dickow for /away command:
			$DbLink->query("UPDATE ".C_USR_TBL." SET room='$R',u_time='$current_time', status='$status', ip='$IP', awaystat='0' WHERE username='$U'");
// end R Dickow /away modification.

			if (C_WELCOME)
			{
				// Delete old welcome messages sent to the current user
				$DbLink->query("DELETE FROM ".C_MSG_TBL." WHERE username LIKE 'SYS welcome' AND address = '$U'");
				// Insert a new welcome message in the messages table
				$current_time_plus = $current_time + 1;	// ensures the welcome msg is the last one
				if(isset($CookieBeep) && $CookieBeep) $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS welcome', '$Latin1', '$current_time_plus', '$U', 'sprintf(WELCOME_MSG)', '', '')");
				else $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS welcome', '$Latin1', '$current_time_plus', '$U', 'sprintf(WELCOME_MSG_NOSOUND)', '', '')");
			};
		};
	}
	// In the case of an user that logs again in the same room because of the resize bug of NN4+
	// update his logging time and his IP address
	elseif (isset($Reload) && $Reload == "NNResize")
	{
		$DbLink->query("UPDATE ".C_USR_TBL." SET room='$R',u_time='$current_time', ip='$IP' WHERE username='$U'");
	}
	// For all other case of users entering in, set user infos. in users table and put a
	// notification message of entrance in the messages table
	else
	{
		$DbLink->query("INSERT INTO ".C_USR_TBL." VALUES ('$R', '$U', '$Latin1', '$current_time', '$status', '$IP', '0', '$current_time', '$email')");
		// Ghost Control mod by Ciprian
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
		}
		if (($sghosts != "" && ghosts_in(stripslashes($U), $sghosts, $Charset)) || (C_HIDE_ADMINS && ($status == "a" || $status == "t")) || (C_HIDE_MODERS && $status == "m"))
		{
		}
		else
		{
			// next line WELCOME SOUND feature altered for compatibility with /away command R Dickow:
			if(isset($CookieBeep) && $CookieBeep) $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '$Latin1', '$current_time', '', 'stripslashes(sprintf(L_ENTER_ROM, \"".special_char($U,$Latin1)."\"))', '', '')");
			else $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '$Latin1', '$current_time', '', 'stripslashes(sprintf(L_ENTER_ROM_NOSOUND, \"".special_char($U,$Latin1)."\"))', '', '')");
			if(C_EN_STATS)
			{
				$DbLink->query("SELECT room FROM ".C_STS_TBL." WHERE stat_date='".date("Y-m-d")."' AND username='$U' AND room='$R'");
				if ($DbLink->num_rows() != 0)
				{
					$DbLink->query("UPDATE ".C_STS_TBL." SET logins=logins+1,last_in='$current_time' WHERE stat_date='".date("Y-m-d")."' AND room='$R' AND username='$U'");
				}
				else $DbLink->query("INSERT INTO ".C_STS_TBL." VALUES ('".date("Y-m-d")."', '$R', '$U', '$reguser', '$current_time', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '')");
			}
		}

		if (C_WELCOME)
		{
			// Delete old welcome messages sent to the current user
			$DbLink->query("DELETE FROM ".C_MSG_TBL." WHERE username LIKE 'SYS welcome' AND address = '$U'");
			// Insert a new welcome message in the messages table
			$current_time_plus = $current_time + 1;	// ensures the welcome msg is the last one
			if(isset($CookieBeep) && $CookieBeep) $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS welcome', '', '$current_time_plus', '$U', 'sprintf(WELCOME_MSG)', '', '')");
			else $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS welcome', '$Latin1', '$current_time_plus', '$U', 'sprintf(WELCOME_MSG_NOSOUND)', '', '')");
		};
	};

	// Delete invite messages sent to the user for the room he will enter in
	$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE username='SYS inviteTo' AND address='$U' AND room='$R'");
	if($DbLink->num_rows() != 0)
	{
#		$DelLink = new DB;
		while(list($sent_time) = $DbLink->next_record())
		{
			$DbLink->query("DELETE FROM ".C_MSG_TBL." WHERE m_time='$sent_time' AND (username='SYS inviteFrom' OR (username='SYS inviteTo' AND address='$U'))");
		};
#		$DelLink->close();
#		$DbLink->close();
	};
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
	<HTML>
	<HEAD>
	<TITLE><?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME); ?></TITLE>
	<LINK REL="SHORTCUT ICON" HREF="<?php echo($ChatPath); ?>favicon.ico">
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
	<!--
<?php
	// Display & remove the server time in the status bar
	include_once("./${ChatPath}lib/worldtime.lib.php");
	$CorrectedTime = mktime(date("G") + C_TMZ_OFFSET,date("i"),date("s"),date("m"),date("d"),date("Y"));
?>
	gap = calc_gap("<?php echo(date("F d, Y H:i:s", $CorrectedTime)); ?>");
	clock(gap);

	// Automatically submit a command
	function runCmd(CmdName,infos)
	{
		if (window.frames['input'] && window.frames['input'].window.document.forms['MsgForm'])
		{
			var inputForm = window.frames['input'].window.document.forms['MsgForm'];
			if (infos != "") infos = " " + infos;
			inputForm.elements['M'].value = "/" + CmdName + infos;
			inputForm.elements['sent'].value = '1';
			if (document.all) inputForm.elements['sendForm'].disabled = true;
			inputForm.submit();
		};
	};

	// Misc vars
	var is_ignored_popup = null;
	var path2Chat = "<?php echo($ChatPath); ?>";

	<?php
	if ($Ver == "H")
	{
		?>
		// Forced reload of the loader frame, function called by the input frame
		var time4LastLoadedMsg = null;
		var time4LastCheckedUser = null;
		var refresh_query = "<?php echo("From=$From&L=$L&U=".urlencode(stripslashes($U))."&R=".urlencode(stripslashes($R))."&T=$T&D=$D&N=$N&ST=$ST&NT=$NT&First=1"); ?>";
		function force_refresh()
		{
			query = refresh_query + "&LastLoad=" + time4LastLoadedMsg + "&LastCheck=" + time4LastCheckedUser;
			window.frames['loader'].window.location.replace("loader.php?" + query);
		}
		<?php
	}
	else
	{
		?>
		ver4 = false;
		<?php
	};
	?>

	// Launch the help popup
	var is_help_popup = null;

	function help_popup()
	{
		if (is_help_popup && !is_help_popup.closed)
		{
			is_help_popup.focus();
		}
		else
		{
			var scrTop = mouseY-400;
			var scrLeft = mouseX-<?php echo($Align == "right" ? "610" : "10"); ?>;
			var scrPos = "top=" + scrTop + ",screenY=" + scrTop + ",left=" + scrLeft + ",screenX=" + scrLeft + ",";
			is_help_popup = window.open("help_popup.php?<?php echo("L=$L&Ver=$Ver"); ?>","help_popup",scrPos + "width=600,height=350,status=yes,scrollbars=yes,resizable=yes");
		};
	};

	// Smilie Popup mod by Ciprian
	// Launch the Smilie tabel popup
	var is_smilie_popup = null;

	function smilie_popup()
	{
		if (is_smilie_popup && !is_smilie_popup.closed)
		{
			is_smilie_popup.focus();
		}
		else
		{
			is_smilie_popup = window.open("smilie_popup.php?<?php echo("L=$L"); ?>","smilie_popup","bottom=0,right=0,width=350,height=350,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no");
		};
	};

	// Buzzes Popup mod by Ciprian
	// Launch the Buzzes Gallery popup
	var is_buzz_popup = null;

	function buzz_popup()
	{
		if (is_buzz_popup && !is_buzz_popup.closed)
		{
			is_buzz_popup.focus();
		}
		else
		{
			is_buzz_popup = window.open("buzz_popup.php?<?php echo("L=$L"); ?>","buzz_popup","bottom=0,right=0,width=550,height=440,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no");
		};
	};

	// Private Message Popup mod by Ciprian
	// Launch the popup window on PM
	var is_send_popup = null;
	var is_priv_popup = null;

	function send_popup(user)
	{
		if ((!is_send_popup || is_send_popup.closed) && (!is_priv_popup || is_priv_popup.closed))
		{
			is_send_popup = window.open("send_popup.php?L=<?php echo($L); ?>","send_popup","width=430,height=140,scrollbars=yes,resizable=no,status=yes,toolbar=no,menubar=no,directories=no,location=no");
			var msgbox = window.frames['input'].window.document.forms['MsgForm'].elements['M'];
				var oldStr = msgbox.value;
				if (oldStr == "" || oldStr.substring(0,1) != " ") oldStr = " " + oldStr;
				msgbox.value = user + oldStr;
		};
	};

	// Birthday Popup mod by Ciprian
	// Launch the Birthday list popup
	var is_bday_popup = null;

	function bday_popup()
	{
		if (is_bday_popup && !is_bday_popup.closed)
		{
			is_bday_popup.focus();
		}
		else
		{
			is_bday_popup = window.open('<?php echo("./${ChatPath}bday_popup.php?L=$L"); ?>','bday_popup','bottom=0,right=0,width=650,height=450,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no');
		};
	};

	// Logs Popup mod by Ciprian
	// Launch the Public Archive popup
	var is_logs_popup = null;

	function logs_popup()
	{
		if (is_logs_popup && !is_logs_popup.closed)
		{
			is_logs_popup.focus();
		}
		else
		{
			is_logs_popup = window.open('<?php echo("./${ChatPath}logs.php?L=$L"); ?>','logs_popup','bottom=0,right=0,width=650,height=450,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no');
		};
	};

	// Open the tutorial popup
	function tutorial_popup()
	{
		window.focus();
		tutorial_popupWin = window.open("<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver="); ?>"+ver4,"tutorial_popup","width=700,height=800,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,directories=no,status=yes,location=no");
		tutorial_popupWin.focus();
	};

	// Open the users popup according to the DHTML capacities of the browser
	function users_popup()
	{
		window.focus();
		users_popupWin = window.open("<?php echo($ChatPath); ?>users_popup"+ver4+".php?<?php echo("From=$From&L=$L"); ?>","users_popup_<?php echo(md5(uniqid(""))); ?>","width=230,height=300,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,directories=no,status=yes,location=no");
		users_popupWin.focus();
	};

	// Open popups for registration stuff
	function reg_popup(name,uname)
	{
		if (name == "register") var u_name = "&U=";
		else var u_name = "&pmc_username=";
		if (name == "admin") var link = "&Link=1";
		else var link = "";
		window.focus();
		url = '<?php echo("${ChatPath}"); ?>' + name + '<?php echo(".php?L=$L"); ?>' + u_name + uname + link;
		pop_width = (name != 'admin'? 470:830);
		pop_height = ((name != 'deluser' && name != 'pass_reset') ? (name != 'admin'? 640:580):260);
		param = "width=" + pop_width + ",height=" + pop_height + ",resizable=yes,scrollbars=yes";
		if (name == "pm_manager") param = param + ",status=yes";
		name += "_popup";
		window.open(url,name,param);
	};

	// Privacy Policy Popup mod by Ciprian
	// Launch the Privacy Policy popup
	var is_privacy_popup = null;

	function privacy_popup()
	{
		if (is_privacy_popup && !is_privacy_popup.closed)
		{
			is_privacy_popup.focus();
		}
		else
		{
			is_privacy_popup = window.open("privacy.html","privacy_popup","bottom=0,right=0,width=600,height=400,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no");
		};
	};

	// MathJax Equation Popup mod by Ciprian
	// Launch the Equation window popup
	var is_math_popup = null;

	function math_popup()
	{
		if (is_math_popup && !is_math_popup.closed)
		{
			is_math_popup.focus();
		}
		else
		{
			is_math_popup = window.open("math_popup.php","math_popup","bottom=0,right=0,width=730,height=600,scrollbars=yes,resizable=yes,status=no,toolbar=no,menubar=no,directories=no,location=no");
		};
	};

	// Misc vars
	imgHelpOff = new Image(30,20); imgHelpOff.src = path2Chat + "localization/<?php echo($L); ?>/images/helpOff.gif";
	imgHelpOn = new Image(30,20); imgHelpOn.src = path2Chat + "localization/<?php echo($L); ?>/images/helpOn.gif";
	ProfimageOff = new Image(25,25); ProfimageOff.src = path2Chat + "images/avatarbuttonroll.gif";
	ProfimageOn = new Image(25,25); ProfimageOn.src = path2Chat + "images/avatarbutton.gif";

	// Put the nick of the user who was clicked on in the messages or the users frames
	// to the message box in the input frame;
	function userClick(user,privMsg,uname)
	{
		if (window.frames['input'] && window.frames['input'].window.document.forms['MsgForm'].elements['MsgTo'])
		{
			var msgbox = window.frames['input'].window.document.forms['MsgForm'].elements['M'];
			if (privMsg)
			{
				window.frames['input'].window.document.forms['MsgForm'].elements['MsgTo'].value = user;
				var oldStr = msgbox.value;
				if (oldStr == "" || oldStr.substring(0,1) != " ") oldStr = " " + oldStr;
				msgbox.value = "/to " + user + oldStr;
			}
			else
			{
				if (msgbox.value == "") msgbox.value = user;
				else msgbox.value += " " + user;
				if ((user != uname) && (msgbox.value == user)) msgbox.value += "> ";
			};
			msgbox.focus();
		};
	};

	function userClick2(user,privMsg)
	{
		if (window.frames['input'] && window.frames['input'].window.document.forms['MsgForm'].elements['MsgTo'])
		{
			var msgbox = window.frames['input'].window.document.forms['MsgForm'].elements['M'];
			if (privMsg)
			{
				window.frames['input'].window.document.forms['MsgForm'].elements['MsgTo'].value = user;
				var oldStr = msgbox.value;
				if (oldStr == "" || oldStr.substring(0,1) != " ") oldStr = " " + oldStr;
				msgbox.value = "/wisp " + user + oldStr;
			}
			else
			{
				if (msgbox.value == "") msgbox.value = user;
				else msgbox.value += " " + user;
				if (msgbox.value == user) msgbox.value += "> ";
			};
			msgbox.focus();
		};
	};
	// Define the moderator status for color power/limitations;
	isModerator = <?php echo((isset($status) && ($status == "m")) ? 1 : 0); ?>;

	// Set the focus to the message box at the input frame;
	function get_focus()
	{
		window.frames['input'].window.focus();
		window.frames['input'].window.document.forms['MsgForm'].elements['M'].focus();
	};

	// Get the position for the help popup
	var mouseX = 0;
	var mouseY = 0;

	function displayLocation(e)
	{
		if (ver4)
		{
			if (IE4) e = window.frames['input'].window.event;
			mouseX = e.screenX;
			mouseY = e.screenY;
		}
		return;
	};

	// Quick validation of the message or the command submited at the input frame
	function validateSubmission()
	{
		inputFrameForm = window.frames['input'].window.document.forms['MsgForm'];

		// Submission looks like a command?
		isCmd = ((inputFrameForm.elements['M'].value.substring(0,1) == '/') || (inputFrameForm.elements['M'].value.substring(0,2) == ': '));
<?php
if (file_exists("./localization/".$L."/localized.cmds.php"))
{
	require("./localization/".$L."/localized.cmds.php");

	// DO NOT ALTER THE LINE BELOW!
	$TrsCmds =
	(L_CMD_ANNOUNCE != "" && L_CMD_ANNOUNCE != "L_CMD_ANNOUNCE" ? str_replace(","," .+|",L_CMD_ANNOUNCE)." .+|" : "").
	(L_CMD_BAN != "" && L_CMD_BAN != "L_CMD_BAN" ? str_replace(","," .+|",L_CMD_BAN)." .+|" : "").
	(L_CMD_CLEAR != "" && L_CMD_CLEAR != "L_CMD_CLEAR" ? str_replace(",","$|",L_CMD_CLEAR)."$|" : "").
	(L_CMD_HELP != "" && L_CMD_HELP != "L_CMD_HELP" ? str_replace(",","$|",L_CMD_HELP)."$|" : "").
	(L_CMD_IGNORE != "" && L_CMD_IGNORE != "L_CMD_IGNORE" ? str_replace(",","|",L_CMD_IGNORE)."|" : "").
	(L_CMD_INVITE != "" && L_CMD_INVITE != "L_CMD_INVITE" ? str_replace(","," .+|",L_CMD_INVITE)." .+|" : "").
	(L_CMD_JOIN != "" && L_CMD_JOIN != "L_CMD_JOIN" ? str_replace(","," .+|",L_CMD_JOIN)." .+|" : "").
	(L_CMD_KICK != "" && L_CMD_KICK != "L_CMD_KICK" ? str_replace(","," .+|",L_CMD_KICK)." .+|" : "").
	(L_CMD_ME != "" && L_CMD_ME != "L_CMD_ME" ? str_replace(","," .+|",L_CMD_ME)." .+|" : "").
	(L_CMD_MSG != "" && L_CMD_MSG != "L_CMD_MSG" ? str_replace(","," .+|",L_CMD_MSG)." .+|" : "").
	(L_CMD_NOTIFY != "" && L_CMD_NOTIFY != "L_CMD_NOTIFY" ? str_replace(",","$|",L_CMD_NOTIFY)."$|" : "").
	(L_CMD_ORDER != "" && L_CMD_ORDER != "L_CMD_ORDER" ? str_replace(",","$|",L_CMD_ORDER)."$|" : "").
	(L_CMD_SORT != "" && L_CMD_SORT != "L_CMD_SORT" ? str_replace(",","$|",L_CMD_SORT)."$|" : "").
	(L_CMD_PROFILE != "" && L_CMD_PROFILE != "L_CMD_PROFILE" ? str_replace(",","$|",L_CMD_PROFILE)."$|" : "").
	(L_CMD_PROMOTE != "" && L_CMD_PROMOTE != "L_CMD_PROMOTE" ? str_replace(",","|",L_CMD_PROMOTE)."|" : "").
	(L_CMD_QUIT != "" && L_CMD_QUIT != "L_CMD_QUIT" ? str_replace(",","|",L_CMD_QUIT)."|" : "").
	(L_CMD_REFRESH != "" && L_CMD_REFRESH != "L_CMD_REFRESH" ? str_replace(",","|",L_CMD_REFRESH)."|" : "").
	(L_CMD_SAVE != "" && L_CMD_SAVE != "L_CMD_SAVE" ? str_replace(",","|",L_CMD_SAVE)."|" : "").
	(L_CMD_SHOW != "" && L_CMD_SHOW != "L_CMD_SHOW" ? str_replace(",","|",L_CMD_SHOW)."|" : "").
	(L_CMD_SIZE != "" && L_CMD_SIZE != "L_CMD_SIZE" ? str_replace(",","|",L_CMD_SIZE)."|" : "").
	(L_CMD_TIMESTAMP != "" && L_CMD_TIMESTAMP != "L_CMD_TIMESTAMP" ? str_replace(",","$|",L_CMD_TIMESTAMP)."$|" : "").
	(L_CMD_WHOIS != "" && L_CMD_WHOIS != "L_CMD_WHOIS" ? str_replace(","," .+|",L_CMD_WHOIS)." .+|" : "").
	(L_CMD_DEMOTE != "" && L_CMD_DEMOTE != "L_CMD_DEMOTE" ? str_replace(","," .+|",L_CMD_MR)." .+|" : "").
	(L_CMD_AWAY != "" && L_CMD_AWAY != "L_CMD_AWAY" ? str_replace(",","|",L_CMD_AWAY)."|" : "").
	(L_CMD_DEMOTE != "" && L_CMD_DEMOTE != "L_CMD_DEMOTE" ? str_replace(","," .+|",L_CMD_DEMOTE)." .+|" : "").
	(L_CMD_HIGH != "" && L_CMD_HIGH != "L_CMD_HIGH" ? str_replace(",","|",L_CMD_HIGH)."|" : "").
	(L_CMD_IMG != "" && L_CMD_IMG != "L_CMD_IMG" ? str_replace(","," .+|",L_CMD_IMG)." .+|" : "").
	(L_CMD_ROOM != "" && L_CMD_ROOM != "L_CMD_ROOM" ? str_replace(","," .+|",L_CMD_ROOM)." .+|" : "").
	(L_CMD_TOPIC != "" && L_CMD_TOPIC != "L_CMD_TOPIC" ? str_replace(","," .+|",L_CMD_TOPIC)." .+|" : "").
	(L_CMD_WISP != "" && L_CMD_WISP != "L_CMD_WISP" ? str_replace(","," .+|",L_CMD_WISP)." .+|" : "").
	(L_CMD_BUZZ != "" && L_CMD_BUZZ != "L_CMD_BUZZ" ? str_replace(",","|",L_CMD_BUZZ)."|" : "").
	(L_CMD_BOT != "" && L_CMD_BOT != "L_CMD_BOT" ? str_replace(",","|",L_CMD_BOT)."|" : "").
	(L_CMD_LTR != "" && L_CMD_LTR != "L_CMD_LTR" ? str_replace(",","|",L_CMD_LTR)."|" : "").
	(L_CMD_RTL != "" && L_CMD_RTL != "L_CMD_RTL" ? str_replace(",","|",L_CMD_RTL)."|" : "").
	(L_CMD_DICE != "" && L_CMD_DICE != "L_CMD_DICE" ? str_replace(",","|",L_CMD_DICE)."|" : "").
	(L_CMD_VIDEO != "" && L_CMD_VIDEO != "L_CMD_VIDEO" ? str_replace(","," .+|",L_CMD_VIDEO)." .+|" : "").
	(L_CMD_UTUBE != "" && L_CMD_UTUBE != "L_CMD_UTUBE" ? str_replace(","," .+|",L_CMD_UTUBE)." .+|" : "").
	(L_CMD_MATH != "" && L_CMD_MATH != "L_CMD_MATH" ? str_replace(","," .+|",L_CMD_MATH)." .+|" : "");
	if ($TrsCmds != "") $TrsCmds = rtrim("|".$TrsCmds,"|");
}
?>

		// RegExp to quick check for valid commands
		re = /^\/(!$|announce .+|ban .+|clear$|help$|\?$|ignore|invite .+|join .+|kick .+|boot .+|me .+|msg .+|to .+|notify$|order$|sort$|profile$|promote|quit|exit|bye|refresh|reload|recall$|save|export|show|last|size|timestamp$|whois .+|about .+|mr .+|away|demote .+|high|img .+|room .+|topic .+|wisp .+|whisp .+|vid .+|video .+|play .+|tube .+|utube .+|youtube .+|math .+|buzz|bot|rtl|ltr|dice|([1-9][0-9]?d)|([1-9][0-9]?d[1-9][0-9]?)|d([1-9][0-9]?[0-9]?)([t])([1-9][0-9]?)|d([1-9][0-9]?[0-9]?)<?php echo($TrsCmds != "" && $TrsCmds != "TrsCmds" ? $TrsCmds : ""); ?>)/i;
		re1 = /^:( .+)/i;

		// Ensure the message box isn't empty
		if (inputFrameForm.elements['M'].value == '')
		{
			inputFrameForm.elements['M'].focus();
			return false;
		}
		// It looks like a command but's not a valid one -> display error message
		else if (isCmd && !re.test(inputFrameForm.elements['M'].value) && !re1.test(inputFrameForm.elements['M'].value))
		{
			inputFrameForm.elements['M'].select();
			alert("<?php echo(str_replace("\"","\\\"",L_BAD_CMD)); ?>");
			return false;
		}
		// It doesn't look like a command -> it's a message, then ensure a message
		// isn't currently being submitted...
		else if (!isCmd && inputFrameForm.elements['sent'].value == '1')
		{
			inputFrameForm.elements['M'].focus();
			return false;
		}
		// ... and that the same message hasn't been submitted the last time
 		else if (!isCmd && inputFrameForm.elements['M'].value == inputFrameForm.elements['M0'].value)
		{
			inputFrameForm.elements['M'].value = '';
			inputFrameForm.elements['M'].focus();
			return false;
		}
		// All the tests have been succesfully passed -> submit the from
		else
		{
			inputFrameForm.elements['sent'].value = '1';
			if (document.all) inputFrameForm.elements['sendForm'].disabled = true;
			return true;
		};
	};
	// -->
	</SCRIPT>
	<?php
	if ($Ver == "H")
	{
		?>
		<SCRIPT SRC="<?php echo($ChatPath); ?>lib/usersH.js" TYPE="text/javascript" LANGUAGE="JavaScript1.2"></SCRIPT>
		<SCRIPT SRC="<?php echo($ChatPath); ?>lib/connectStateH.js" TYPE="text/javascript" LANGUAGE="JavaScript1.2"></SCRIPT>
		<?php
	};
	$Ver1 = ($Ver == "H" ? $Ver : "L");
	$AddPwd2Url = ($PWD_Hash != "" ? "&PWD_Hash=$PWD_Hash" : "");
	include("./${ChatPath}lib/frameset_def.lib.php");
	?>
	</HTML>
	<?php
	$DbLink->close();
	exit;

} // end of entering the chat work


/*********** 'send_headers' FUNCTION ***********/

/* ------------------------------------------------------------------------------------------
   The send_headers function add lines at the head part of your html file.

   $title var allows to show "phpMyChat" as the title for your window when sets to 1/true.
   $icon var allows to set phpMyChat icon as the icon for favorites when sets to 1/true.
   --------------------------------------------------------------------------------------- */

function send_headers($title, $icon)
{
	global $ChatPath, $From, $L;
	global $Charset, $FontName, $FontSize;

	if ($title)
	{
		if(C_CHAT_NAME != "") echo("\t" . '<TITLE>' . C_CHAT_NAME . ' - ' . APP_NAME . '</TITLE>' . "\n");
		else echo("\t" . '<TITLE>' . APP_NAME . '</TITLE>' . "\n");
	}
	?>
	<!--
	The lines below are usefull for debugging purpose, please do not remove them!
	Release: phpMyChat-Plus 1.94-RC2
	© 2005-2013 Ciprian Murariu (ciprianmp@yahoo.com)
	Based on phpMyChat 0.14.6-dev (also called 0.15.0)
	© 2000-2005 The phpHeaven Team (http://www.phpheaven.net/)
	-->
	<META NAME="description" CONTENT="phpMyChat">
	<META NAME="keywords" CONTENT="phpMyChat, Plus">
	<?php
	if ($icon) echo("<LINK REL=\"SHORTCUT ICON\" HREF=\"${ChatPath}favicon.ico\">\n");

	// For translations with an explicit charset (not the 'x-user-defined' one)
	if (!isset($FontName)) $FontName = "";
	?>
	<LINK REL="stylesheet" HREF="<?php echo($ChatPath); ?>skins/start_page.css.php?<?php echo("Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
	<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
	<!--
    <?php
#	if (eregi("MSIE|firefox|opera", $_SERVER['HTTP_USER_AGENT'])){
	if (preg_match("/(MSIE|firefox|opera)/i", $_SERVER['HTTP_USER_AGENT'])){
	?>
		var NS4 = 1;
		var IE4 = 1;
		var ver4 = "H";
	<?php
	}
	else{
	?>
		var NS4 = (document.layers) ? 1 : 0;
		var IE4 = ((document.all) && (parseInt(navigator.appVersion)>=4)) ? 1 : 0;
		var ver4 = (NS4 || IE4) ? "H" : "L";
	<?php
	}
	?>

	// Will update the "Ver" field in the form below according to the javascript abilities of
	// the browser the users surf with
	function defineVerField()
	{
		if (document.images && ver4 == 'L')
			document.forms['Params'].elements['Ver'].value = 'M';	// js1.1 enabled browser
		else document.forms['Params'].elements['Ver'].value = ver4;
	};

	// will check the cookie settings of the client
function getCookie(name) {
  var cookies = document.cookie;
  var start = cookies.indexOf(name + '=');
  if (start == -1) return null;
  var len = start + name.length + 1;
  var end = cookies.indexOf(';',len);
  if (end == -1) end = cookies.length;
  return unescape(cookies.substring(len,end));
};

function set_Cookie(name, value, expires, path, domain, secure) {
  value = escape(value);
  expires = (expires) ? ';expires=' + expires.toGMTString() :'';
  path    = (path)    ? ';path='    + path                  :'';
  domain  = (domain)  ? ';domain='  + domain                :'';
  secure  = (secure)  ? ';secure'                           :'';
  document.cookie =
    name + '=' + value + expires + path + domain + secure;
};

function deleteCookie(name, path, domain) {
  var expires = ';expires=Thu, 01-Jan-70 00:00:01 GMT';
  (path)    ? ';path='    + path                  : '';
  (domain)  ? ';domain='  + domain                : '';

  if (getCookie(name))
    document.cookie = name + '=' + expires + path + domain;
};

function isCookieEnabled() {
  if (document.all) {
    if (!navigator.cookieEnabled) {
      alert('Your browser\'s privacy is curently set\nto block all cookies on your computer.\nFor a proper behaviour of this chat,\n(as for most of the sites on the WEB)\nplease enable cookies (a "High" level would be enough)\n-> Tools / Options / Privacy Settings.\nOr just add our site to your Trusted Sites list.\n-> Tools / Options / Security.\n\nYou must also allow popups!');
      return true;
    }
    else return true;
  }
  else {
    set_Cookie('temp','temp');
    var temp = getCookie('temp');
    if (!temp) {
      alert('Your browser\'s privacy is curently set\nto block all cookies on your computer.\nFor a proper behaviour of this chat,\n(as for most of the sites on the WEB)\nplease enable cookies (a "High" level would be enough)\n-> Tools / Options / Privacy Settings.\nOr just add our site to your Trusted Sites list.\n-> Tools / Options / Security.\n\nYou must also allow popups!');
      return true;
    }
    else return true;
  };
};

	// Open the tutorial popup
	function tutorial_popup()
	{
		window.focus();
		tutorial_popupWin = window.open("<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver="); ?>"+ver4,"tutorial_popup","width=700,height=800,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,directories=no,status=yes,location=no");
		tutorial_popupWin.focus();
	};

	// Open the users popup according to the DHTML capacities of the browser
	function users_popup()
	{
		window.focus();
		users_popupWin = window.open("<?php echo($ChatPath); ?>users_popup"+ver4+".php?<?php echo("From=$From&L=$L"); ?>","users_popup_<?php echo(md5(uniqid(""))); ?>","width=230,height=300,resizable=yes,scrollbars=yes,toolbar=no,menubar=no,directories=no,status=yes,location=no");
		users_popupWin.focus();
	};

	// Open popups for registration stuff
	function reg_popup(name,uname)
	{
		if (name == "register") var u_name = "&U=";
		else var u_name = "&pmc_username=";
		if (name == "admin") var link = "&Link=1";
		else var link = "";
		window.focus();
		url = '<?php echo("${ChatPath}"); ?>' + name + '<?php echo(".php?L=$L"); ?>' + u_name + uname + link;
		pop_width = (name != 'admin'? 470:830);
		pop_height = ((name != 'deluser' && name != 'pass_reset') ? (name != 'admin'? 640:580):260);
		param = "width=" + pop_width + ",height=" + pop_height + ",resizable=yes,scrollbars=yes";
		name += "_popup";
		window.open(url,name,param);
	};

	// Privacy Policy Popup mod by Ciprian
	// Launch the Privacy Policy popup
	var is_privacy_popup = null;

	function privacy_popup()
	{
		if (is_privacy_popup && !is_privacy_popup.closed)
		{
			is_privacy_popup.focus();
		}
		else
		{
			is_privacy_popup = window.open("privacy.html","privacy_popup","bottom=0,right=0,width=600,height=400,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no");
		};
	};

	// The three functions below allows to ensure an unique choice among rooms
	function reset_R0()
	{
		<?php
		if (C_VERSION == 2)
		{
			?>
			if (document.forms['Params'].elements['R1']) document.forms['Params'].elements['R1'].options[0].selected = true;
			if (document.forms['Params'].elements['R2']) document.forms['Params'].elements['R2'].options[0].selected = true;
			if (document.forms['Params'].elements['T']) document.forms['Params'].elements['T'].options[0].selected = true;
			if (document.forms['Params'].elements['R3']) document.forms['Params'].elements['R3'].value = '';
			<?php
		}
		?>
	};

	function reset_R1()
	{
		if (document.forms['Params'].elements['R0']) document.forms['Params'].elements['R0'].options[0].selected = true;
		if (document.forms['Params'].elements['R2']) document.forms['Params'].elements['R2'].options[0].selected = true;
		if (document.forms['Params'].elements['T']) document.forms['Params'].elements['T'].options[0].selected = true;
		if (document.forms['Params'].elements['R3']) document.forms['Params'].elements['R3'].value = '';
	};

	function reset_R2()
	{
		if (document.forms['Params'].elements['R0']) document.forms['Params'].elements['R0'].options[0].selected = true;
		if (document.forms['Params'].elements['R1']) document.forms['Params'].elements['R1'].options[0].selected = true;
		if (document.forms['Params'].elements['T']) document.forms['Params'].elements['T'].options[1].selected = true;
		if (document.forms['Params'].elements['R3']) document.forms['Params'].elements['R3'].value = '';
	};

	function reset_R3()
	{
		if (document.forms['Params'].elements['R0']) document.forms['Params'].elements['R0'].options[0].selected = true;
		if (document.forms['Params'].elements['R1']) document.forms['Params'].elements['R1'].options[0].selected = true;
		if (document.forms['Params'].elements['R2']) document.forms['Params'].elements['R2'].options[0].selected = true;
	};
	// -->
	</SCRIPT>
	<?php

} // end of send_headers function;

/*********** 'layout' FUNCTION ***********/

/* ----------------------------------------------------------------------------------
   The layout function draw the initial table/form. It will define three ways to go
   into the chat (the $Ver et $Ver1 var) dependent of the browser capacities:
   - those that accept DHTML will use "H" (for highest) named scripts, the others
    	will run "L" (for lowest) named scripts;
   - all browsers will be able to use a color input box and a picker to choose
    	messages colors in the chat/input.php script - Color Input Box mod by Ciprian.
   ---------------------------------------------------------------------------------- */

function layout($Err, $U, $R, $T, $C, $status, $RemMe)
{
	global $DbLink;
	global $ChatPath, $From, $Action, $L, $RES, $Ver;
	global $Charset, $CellAlign, $Align, $DisplayFontMsg, $FontPack, $FontName;
	global $AvailableLanguages;
	global $DefaultChatRooms, $DefaultDispChatRooms;
	global $DefaultPrivateRooms;
	if ($Err) global $Error;
	require("${ChatPath}search.php");
	$show_search = !C_SEARCH_PAID;
	$show_donation = !C_SUPPORT_PAID;
	if (!isset($Ver) || $Ver == "") $Ver = "H";

/*	UNDER DEVELOPMENT for scheduling chat hours - already in admin
	// Include the schedule library
	include("./${ChatPath}lib/schedule.lib.php");

	echo($open_dly." | ".$open_sun." | ".$sched_sun." | ".$daynow." | ".$datenow." | ".$closed." | ".$timenow);
*/

?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo(str_replace("sr_CS","sr_RS",str_replace("es_AR","es_ES",L_LANG))); ?>/all.js#xfbml=1&appId=49226597181";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<TABLE ALIGN="center" CELLPADDING=5 CLASS="ChatBody">
<TR>
<TD CLASS="ChatBody">
<CENTER>
<FORM ACTION="<?php echo("$Action"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="Params" onSubmit="defineVerField(); return isCookieEnabled();">
<SPAN CLASS="ChatTitle"><?php if (C_SHOW_LOGO) echo(APP_LOGO); ?><br /><?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME."<br /><SPAN CLASS=ChatP3><SPAN dir=\"LTR\">- ".APP_NAME." (".APP_VERSION.APP_MINOR.") -</SPAN>" : "<SPAN dir=\"LTR\">".APP_NAME." (".APP_VERSION.APP_MINOR.")"); ?></SPAN></SPAN>
<?php
// Msg for translations with no real iso code
if (isset($FontPack) && $FontPack != "" && file_exists($ChatPath."localization/${L}/${FontPack}"))
{
	if (!isset($Error) && $DisplayFontMsg) echo("<P CLASS=\"ChatError\">This translation of ".APP_NAME." requires <A HREF=\"${ChatPath}localization/${L}/${FontPack}\" CLASS=\"ChatFonts\" title=\"" . str_replace('"', '', $FontName) . "\">these font faces</A></P>");
}
if (C_SHOW_TUT)
{
?>
<P>
<A HREF="<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver=$Ver"); ?>" onClick="tutorial_popup(); return false" CLASS="ChatLink" TARGET="_blank" onMouseOver="window.status='<?php echo(L_TUTORIAL); ?>.'; return true;" title="<?php echo(L_TUTORIAL); ?>"><?php echo(L_TUTORIAL); ?></A>
</P>
<?php
}
?>
<P CLASS="ChatP1">
<?php
if (C_MSG_DEL == "1") $hours =  L_HOUR; else $hours = L_HOURS;
if (C_USR_DEL == "1") $mins = L_MIN; else $mins = L_MINS;
 echo(sprintf(L_WEL_1,C_MSG_DEL,$hours));
if(C_CHAT_BOOT)
{
 echo(",<br />".sprintf(L_WEL_2,C_USR_DEL,$mins));
}
 echo(".");
	?>
</P>
<?php
$DefaultRoomFound = 0;
// Ghost Control mod by Ciprian
$Hide = "";
if (C_HIDE_ADMINS) $Hide .= " AND (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'";
if (C_HIDE_MODERS) $Hide .=  " AND u.status !='m'";
if (C_SPECIAL_GHOSTS != "")
{
	$sghosts = str_replace("username","u.username",C_SPECIAL_GHOSTS);
	$Hide .= " AND u.username != ".$sghosts."";
}

if($DbLink->query("SELECT DISTINCT u.username FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1".$Hide.""))
{
	$Nb = $DbLink->num_rows();
	$link = " <A HREF=\"${ChatPath}users_popup".$Ver1.".php?From=$From&L=$L\" CLASS=\"ChatLink\" onClick=\"users_popup(); return false\" TARGET=\"_blank\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_11).".'; return true;\" title='".sprintf(L_CLICK,L_LINKS_11)."'>";
	echo("<P CLASS=\"ChatP1\">".L_CUR_1." ".($Nb != 1 ? L_CUR_1a." ".$link.$Nb." ".L_USERS."</A>" : L_CUR_1b." ".$link.$Nb." ".L_USER."</A>")." ".L_CUR_2.".");
	$DbLink->clean_results();
}
if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $status == "a" || $status == "t"))
{
/*
	$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
	@mysql_query("SET CHARACTER SET utf8");
	@mysql_query("SET NAMES 'utf8'");
	@mysql_select_db(C_DB_NAME,$handler);
	$delete = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
	$result = @mysql_query("SELECT DISTINCT ip,browser,username FROM ".C_LRK_TBL.$Hide1."",$handler);
	$online_users = @mysql_numrows($result);
	@mysql_close();
*/
	$timeout = "15";
#	$closetime = time() + C_TMZ_OFFSET*60*60 - $timeout;
	$closetime = time() - $timeout;
	// Ghost Control mod by Ciprian
	$Hide1 = "";
	$online_users = 0;
	if (C_HIDE_ADMINS) $Hide1 .= ($Hide1 == "") ? " WHERE status != 'a' AND status != 't'" : " AND status != 'a' AND status != 't'";
	if (C_HIDE_MODERS) $Hide1 .= ($Hide1 == "") ? " WHERE status != 'm'" : " AND status != 'm'";
	if (C_SPECIAL_GHOSTS != "") $Hide1 .= ($Hide1 == "") ?  " WHERE username != ".C_SPECIAL_GHOSTS."" : " AND username != ".C_SPECIAL_GHOSTS."";
	$DbLink->query("DELETE FROM ".C_LRK_TBL." WHERE time<'".$closetime."'");
	$DbLink->query("SELECT DISTINCT ip,browser,username FROM ".C_LRK_TBL.$Hide1);
	$online_users = $DbLink->num_rows();
	$lurklink = " <A HREF=\"lurking.php?L=$L&D=10\" CLASS=\"ChatLink\" TARGET=\"_blank\" onMouseOver=\"window.status='".L_LURKING_1.".'; return true;\" title='".L_LURKING_1."'>";
	echo("<br />".L_CUR_1." ".($online_users != 1 ? L_CUR_1a.$lurklink.$online_users." ".L_LURKERS."</A>." : L_CUR_1b.$lurklink.$online_users." ".L_LURKER."</A>."));
}

$copy_break = 0;
if (!strstr($search,"9362782527650497") || !isset($search)) $copy_break = 1;
if ($show_donation)
{
	$pptype = "big";
	require("${ChatPath}lib/support.lib.php");
	if ((intval($ppbutton) < 3620000 || (intval($ppbutton) > 3627000 && intval($ppbutton) != 7148858 && intval($ppbutton) != 7148805 && (intval($ppbutton) < 7988359 || intval($ppbutton) > 7988406))) && $ppbutton != "KYVK6TQWY4MXJ" && $ppbutton != "QN9TYKJ49BM7S" && $ppbutton != "RJK6MGRQVAJY2" && $ppbutton != "ZCXGTP265VU6S" && $ppbutton != "MGBHACRT5F4RE" && $ppbutton != "6HRWUGAN73NPS" && $ppbutton != "WDA8GUU9GGSTS" && $ppbutton != "T9MP68SK7HBKQ" && $ppbutton != "DBH7XN4YA7A2J" && $ppbutton != "BTHKH33JLGLTN" && $ppbutton != "9HQJX5TAPJ33A" && $ppbutton != "YJD5RVSDH55GA" && $ppbutton != "KLSRD9WFZH984" && $ppbutton != "2K6JTW959U66A" && $ppbutton != "6JNU4L83BSTN2" && $ppbutton != "JW4A2MMTLXYSU" && $ppbutton != "RQ3GHM7HSY95Q" && $ppbutton != "8C5WYJSNYG5BY" && $ppbutton != "DLBFN422X69WG" && $ppbutton != "T2BQZSP33V2KA") $copy_break = 1;
}
?>
</P>
<?php
if(isset($Error))
{
	echo("<P CLASS=\"ChatError\">$Error</P>");
}
?>
<INPUT TYPE="hidden" NAME="Ver" VALUE="<?php echo($Ver); ?>">
<INPUT TYPE="hidden" NAME="Form_Send" VALUE="1">
<INPUT TYPE="hidden" NAME="L" VALUE="<?php echo($L); ?>">
<INPUT TYPE="hidden" NAME="N" VALUE="<?php echo(C_MSG_NB); ?>">
<INPUT TYPE="hidden" NAME="D" VALUE="<?php echo(C_MSG_REFRESH); ?>">

<TABLE BORDER=0 CELLPADDING=3 CLASS="ChatTable">
<TR CLASS="ChatCell">
	<TD ALIGN="CENTER" CLASS="ChatCell">
		<TABLE BORDER=0 CLASS="ChatTable">
		<?php
		// Display flags if necessary
		if (C_MULTI_LANG)
		{
				$disp_flags = "";
				$i = 0;
				while(list($key, $langname) = each($AvailableLanguages))
				{
					$i++;
					if ($langname == "english" && C_ENGLISH_FORMAT == "US")
					{
						if(C_FLAGS_3D) $flag = "flag_us.gif";
						else $flag = "flag_us0.gif";
						if(L_ORIG_LANG_ENUS != "L_ORIG_LANG_ENUS") $FLAG_NAME = L_ORIG_LANG_ENUS.($langname != $L && L_LANG_ENUS != "L_LANG_ENUS" ? "/".L_LANG_ENUS : "");
					}
					else
					{
						if(C_FLAGS_3D) $flag = "flag.gif";
						else $flag = "flag0.gif";
						if ($langname == "argentinian_spanish" && L_ORIG_LANG_AR != "L_ORIG_LANG_AR") $FLAG_NAME = L_ORIG_LANG_AR.($langname != $L && L_LANG_AR != "L_LANG_AR" ? "/".L_LANG_AR : "");
						elseif ($langname == "bulgarian" && L_ORIG_LANG_BG != "L_ORIG_LANG_BG") $FLAG_NAME = L_ORIG_LANG_BG.($langname != $L && L_LANG_BG != "L_LANG_BG" ? "/".L_LANG_BG : "");
						elseif ($langname == "brazilian_portuguese" && L_ORIG_LANG_BR != "L_ORIG_LANG_BR") $FLAG_NAME = L_ORIG_LANG_BR.($langname != $L && L_LANG_BR != "L_LANG_BR" ? "/".L_LANG_BR : "");
						elseif ($langname == "catalan" && L_ORIG_LANG_CA != "L_ORIG_LANG_CA") $FLAG_NAME = L_ORIG_LANG_CA.($langname != $L && L_LANG_CA != "L_LANG_CA" ? "/".L_LANG_CA : "");
						elseif ($langname == "chinese_simplified" && L_ORIG_LANG_CNS != "L_ORIG_LANG_CNS") $FLAG_NAME = L_ORIG_LANG_CNS.($langname != $L && L_LANG_CNS != "L_LANG_CNS" ? "/".L_LANG_CNS : "");
						elseif ($langname == "chinese_traditional" && L_ORIG_LANG_CNT != "L_ORIG_LANG_CNT") $FLAG_NAME = L_ORIG_LANG_CNT.($langname != $L && L_LANG_CNT != "L_LANG_CNT" ? "/".L_LANG_CNT : "");
						elseif ($langname == "czech" && L_ORIG_LANG_CZ != "L_ORIG_LANG_CZ") $FLAG_NAME = L_ORIG_LANG_CZ.($langname != $L && L_LANG_CZ != "L_LANG_CZ" ? "/".L_LANG_CZ : "");
						elseif ($langname == "danish" && L_ORIG_LANG_DA != "L_ORIG_LANG_DA") $FLAG_NAME = L_ORIG_LANG_DA.($langname != $L && L_LANG_DA != "L_LANG_DA" ? "/".L_LANG_DA : "");
						elseif ($langname == "dutch" && L_ORIG_LANG_NL != "L_ORIG_LANG_NL") $FLAG_NAME = L_ORIG_LANG_NL.($langname != $L && L_LANG_NL != "L_LANG_NL" ? "/".L_LANG_NL : "");
						elseif ($langname == "english" && L_ORIG_LANG_ENUK != "L_ORIG_LANG_ENUK") $FLAG_NAME = L_ORIG_LANG_ENUK.($langname != $L && L_LANG_ENUK != "L_LANG_ENUK" ? "/".L_LANG_ENUK : "");
						elseif ($langname == "french" && L_ORIG_LANG_FR != "L_ORIG_LANG_FR") $FLAG_NAME = L_ORIG_LANG_FR.($langname != $L && L_LANG_FR != "L_LANG_FR" ? "/".L_LANG_FR : "");
						elseif ($langname == "georgian" && L_ORIG_LANG_KA != "L_ORIG_LANG_KA") $FLAG_NAME = L_ORIG_LANG_KA.($langname != $L && L_LANG_KA != "L_LANG_KA" ? "/".L_LANG_KA : "");
						elseif ($langname == "german" && L_ORIG_LANG_DE != "L_ORIG_LANG_DE") $FLAG_NAME = L_ORIG_LANG_DE.($langname != $L && L_LANG_DE != "L_LANG_DE" ? "/".L_LANG_DE : "");
						elseif ($langname == "greek" && L_ORIG_LANG_GR != "L_ORIG_LANG_GR") $FLAG_NAME = L_ORIG_LANG_GR.($langname != $L && L_LANG_GR != "L_LANG_GR" ? "/".L_LANG_GR : "");
						elseif ($langname == "hebrew" && L_ORIG_LANG_HE != "L_ORIG_LANG_HE") $FLAG_NAME = L_ORIG_LANG_HE.($langname != $L && L_LANG_HE != "L_LANG_HE" ? "/".L_LANG_HE : "");
						elseif ($langname == "hindi" && L_ORIG_LANG_HI != "L_ORIG_LANG_HI") $FLAG_NAME = L_ORIG_LANG_HI.($langname != $L && L_LANG_HI != "L_LANG_HI" ? "/".L_LANG_HI : "");
						elseif ($langname == "hungarian" && L_ORIG_LANG_HU != "L_ORIG_LANG_HU") $FLAG_NAME = L_ORIG_LANG_HU.($langname != $L && L_LANG_HU != "L_LANG_HU" ? "/".L_LANG_HU : "");
						elseif ($langname == "indonesian" && L_ORIG_LANG_ID != "L_ORIG_LANG_ID") $FLAG_NAME = L_ORIG_LANG_ID.($langname != $L && L_LANG_ID != "L_LANG_ID" ? "/".L_LANG_ID : "");
						elseif ($langname == "italian" && L_ORIG_LANG_IT != "L_ORIG_LANG_IT") $FLAG_NAME = L_ORIG_LANG_IT.($langname != $L && L_LANG_IT != "L_LANG_IT" ? "/".L_LANG_IT : "");
						elseif ($langname == "japanese" && L_ORIG_LANG_JA != "L_ORIG_LANG_JA") $FLAG_NAME = L_ORIG_LANG_JA.($langname != $L && L_LANG_JA != "L_LANG_JA" ? "/".L_LANG_JA : "");
						elseif ($langname == "nepali" && L_ORIG_LANG_NE != "L_ORIG_LANG_NE") $FLAG_NAME = L_ORIG_LANG_NE.($langname != $L && L_LANG_NE != "L_LANG_NE" ? "/".L_LANG_NE : "");
						elseif ($langname == "norwegian_bokmal" && L_ORIG_LANG_NB != "L_ORIG_LANG_NB") $FLAG_NAME = L_ORIG_LANG_NB.($langname != $L && L_LANG_NB != "L_LANG_NB" ? "/".L_LANG_NB : "");
						elseif ($langname == "norwegian_nynorsk" && L_ORIG_LANG_NN != "L_ORIG_LANG_NN") $FLAG_NAME = L_ORIG_LANG_NN.($langname != $L && L_LANG_NN != "L_LANG_NN" ? "/".L_LANG_NN : "");
						elseif ($langname == "persian" && L_ORIG_LANG_FA != "L_ORIG_LANG_FA") $FLAG_NAME = L_ORIG_LANG_FA.($langname != $L && L_LANG_FA != "L_LANG_FA" ? "/".L_LANG_FA : "");
						elseif ($langname == "polish" && L_ORIG_LANG_PL != "L_ORIG_LANG_PL") $FLAG_NAME = L_ORIG_LANG_PL.($langname != $L && L_LANG_PL != "L_LANG_PL" ? "/".L_LANG_PL : "");
						elseif ($langname == "portuguese" && L_ORIG_LANG_PT != "L_ORIG_LANG_PT") $FLAG_NAME = L_ORIG_LANG_PT.($langname != $L && L_LANG_PT != "L_LANG_PT" ? "/".L_LANG_PT : "");
						elseif ($langname == "romanian" && L_ORIG_LANG_RO != "L_ORIG_LANG_RO") $FLAG_NAME = L_ORIG_LANG_RO.($langname != $L && L_LANG_RO != "L_LANG_RO" ? "/".L_LANG_RO : "");
						elseif ($langname == "russian" && L_ORIG_LANG_RU != "L_ORIG_LANG_RU") $FLAG_NAME = L_ORIG_LANG_RU.($langname != $L && L_LANG_RU != "L_LANG_RU" ? "/".L_LANG_RU : "");
						elseif ($langname == "serbian_latin" && L_ORIG_LANG_SRL != "L_ORIG_LANG_SRL") $FLAG_NAME = L_ORIG_LANG_SRL.($langname != $L && L_LANG_SRL != "L_LANG_SRL" ? "/".L_LANG_SRL : "");
						elseif ($langname == "serbian_cyrillic" && L_ORIG_LANG_SRC != "L_ORIG_LANG_SRC") $FLAG_NAME = L_ORIG_LANG_SRC.($langname != $L && L_LANG_SRC != "L_LANG_SRC" ? "/".L_LANG_SRC : "");
						elseif ($langname == "slovak" && L_ORIG_LANG_SK != "L_ORIG_LANG_SK") $FLAG_NAME = L_ORIG_LANG_SK.($langname != $L && L_LANG_SK != "L_LANG_SK" ? "/".L_LANG_SK : "");
						elseif ($langname == "spanish" && L_ORIG_LANG_ES != "L_ORIG_LANG_ES") $FLAG_NAME = L_ORIG_LANG_ES.($langname != $L && L_LANG_ES != "L_LANG_ES" ? "/".L_LANG_ES : "");
						elseif ($langname == "swedish" && L_ORIG_LANG_SV != "L_ORIG_LANG_SV") $FLAG_NAME = L_ORIG_LANG_SV.($langname != $L && L_LANG_SV != "L_LANG_SV" ? "/".L_LANG_SV : "");
						elseif ($langname == "thai" && L_ORIG_LANG_TH != "L_ORIG_LANG_TH") $FLAG_NAME = L_ORIG_LANG_TH.($langname != $L && L_LANG_TH != "L_LANG_TH" ? "/".L_LANG_TH : "");
						elseif ($langname == "turkish" && L_ORIG_LANG_TR != "L_ORIG_LANG_TR") $FLAG_NAME = L_ORIG_LANG_TR.($langname != $L && L_LANG_TR != "L_LANG_TR" ? "/".L_LANG_TR : "");
						elseif ($langname == "ukrainian" && L_ORIG_LANG_UK != "L_ORIG_LANG_UK") $FLAG_NAME = L_ORIG_LANG_UK.($langname != $L && L_LANG_UK != "L_LANG_UK" ? "/".L_LANG_UK : "");
						elseif ($langname == "urdu" && L_ORIG_LANG_UR != "L_ORIG_LANG_UR") $FLAG_NAME = L_ORIG_LANG_UR.($langname != $L && L_LANG_UR != "L_LANG_UR" ? "/".L_LANG_UR : "");
						elseif ($langname == "vietnamese" && L_ORIG_LANG_VI != "L_ORIG_LANG_VI") $FLAG_NAME = L_ORIG_LANG_VI.($langname != $L && L_LANG_VI != "L_LANG_VI" ? "/".L_LANG_VI : "");
						elseif ($langname == "yoruba" && L_ORIG_LANG_YO != "L_ORIG_LANG_YO") $FLAG_NAME = L_ORIG_LANG_YO.($langname != $L && L_LANG_YO != "L_LANG_YO" ? "/".L_LANG_YO : "");
						else
						{
							$FLAG_NAME = str_replace("_"," ",$langname);
							$FLAG_NAME = mb_convert_case($FLAG_NAME,MB_CASE_TITLE,$Charset);
						}
					}
					if ($langname == $L)
					{
						$FLAG_OVER = $FLAG_NAME." (".L_SELECTED.")";
						$FLAG_STATUS = $FLAG_OVER;
					}
					else
					{
						$FLAG_OVER = $FLAG_NAME;
						$FLAG_STATUS = sprintf(L_SWITCH,$FLAG_NAME);
					}
					if ($langname != $L) $disp_flags .= "<A HREF=\"$Action?L=${name}\" onMouseOver=\"window.status='".$FLAG_STATUS.".'; return true;\" Title=\"".$FLAG_OVER."\">";
					$disp_flags .= "<IMG SRC=\"${ChatPath}localization/${name}/images/".$flag."\" onMouseOver=\"window.status='".$FLAG_STATUS.".'; return true;\" BORDER=0 ALT=\"".$FLAG_OVER."\" Title=\"".$FLAG_OVER."\">";
					if ($langname != $L) $disp_flags .= "</A>";
					if ($i % 11 == 0) $disp_flags .= "<br />";
					else $disp_flags .= "&nbsp;";
				};
				unset($AvailableLanguages);
				?>
		<TR CLASS="ChatCell">
			<TD COLSPAN=2 ALIGN="CENTER" CLASS="ChatCell">
				<SPAN CLASS="ChatFlags">
				<?php
					echo rtrim($disp_flags, '&nbsp;');
				?>
				</SPAN>
			</TD>
		</TR>
		<?php
		};

		// Horizontal alignement for cells topic
		$CellAlign = ($Align == "right" ? "RIGHT" : "LEFT");
		?>
		<TR CLASS="ChatCell">
			<TH COLSPAN=2 CLASS="ChatTabTitle"><?php echo(L_SET_1); ?></TH>
		</TR>
		<TR CLASS="ChatCell">
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_2); ?> :</TD>
			<TD VALIGN="TOP" CLASS="ChatCell">
				<INPUT TYPE="text" NAME="U" SIZE=11 MAXLENGTH=15 VALUE="<?php echo(htmlspecialchars(stripslashes($U))); ?>" CLASS="ChatBox">
			</TD>
		</TR>
		<TR CLASS="ChatCell">
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :</TD>
			<TD VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP">
				<INPUT TYPE="password" NAME="pmc_password" SIZE=11 MAXLENGTH=16 VALUE="<?php echo($RemMe ? $RemMe : ""); ?>" CLASS="ChatBox">
				<INPUT TYPE="checkbox" NAME="remember" alt="<?php echo(L_SET_19); ?>" title="<?php echo(L_SET_19); ?>"<?php echo($RemMe ? " checked" : "")?>>
				<?php if (!C_REQUIRE_REGISTER) echo("&nbsp;(<U>".L_REG_7."</U>)"); ?>
				<br /><A HREF="<?php echo($ChatPath); ?>pass_reset.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('pass_reset','<?php echo(urlencode(stripslashes($U))); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_PASS_7); ?>.'; return true;" title="<?php echo(L_PASS_7); ?>"><?php echo(L_PASS_7); ?></A>
			</TD>
		</TR>
		<TR CLASS="ChatCell">
			<TH COLSPAN=2 CLASS="ChatTabTitle"><?php echo(L_REG_2); ?></TH>
		</TR>
		<TR CLASS="ChatCell">
			<TD ALIGN="center" COLSPAN=2 CLASS="ChatCell">
				<?php
				if (C_REQUIRE_REGISTER && C_ALLOW_REGISTER)
				{ ?>
				<SPAN CLASS="ChatError">
					<?php echo(L_REG_49); ?>
				</SPAN>
				<br />
				<?php
				}
				if (C_ALLOW_REGISTER)
				{ ?>
				<br />
					<A HREF="<?php echo($ChatPath); ?>register.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('register','<?php echo(urlencode(stripslashes($U))); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_3); ?>.'; return true;" title="<?php echo(L_REG_3); ?>"><?php echo(L_REG_3); ?></A>
					|
				<?php
				}
				else
				{ ?>
				<SPAN CLASS="ChatError">
					<?php echo(L_REG_50); ?>
				</SPAN>
				<br />
				<br />
				<?php
				}
				?>
				<A HREF="<?php echo($ChatPath); ?>edituser.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('edituser','<?php echo(urlencode(stripslashes($U))); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_4); ?>.'; return true;" title="<?php echo(L_REG_4); ?>"><?php echo(L_REG_4); ?></A>
				<?php
				if (C_SHOW_DEL_PROF != 0)
				{
					?>
					| <A HREF="<?php echo($ChatPath); ?>deluser.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('deluser','<?php echo(urlencode(stripslashes($U))); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_5); ?>.'; return true;" title="<?php echo(L_REG_5); ?>"><?php echo(L_REG_5); ?></A>
					<?php
				}
				if (C_SHOW_ADMIN != 0)
				{
					?>
					| <A HREF="<?php echo($ChatPath); ?>admin.php?L=<?php echo($L); ?>&Link=1" CLASS="ChatReg" onClick="reg_popup('admin','<?php echo(urlencode(stripslashes($U))); ?>'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_35); ?>.'; return true;" title="<?php echo(L_REG_35); ?>"><?php echo(L_REG_35); ?></A>
					<?php
				}
				?>
			</TD>
		</TR>
		<?php
		if (C_VERSION > 0)
		{
			?>
			<TR CLASS="ChatCell">
				<TD COLSPAN=2 CLASS="ChatCell">&nbsp;</TD>
			</TR>
			<TR CLASS="ChatCell">
				<TH COLSPAN=2 CLASS="ChatTabTitle"><?php echo(L_SET_5); ?></TH>
			</TR>
			</TABLE>
			<TABLE BORDER=0 CLASS="ChatTable">
			<TR CLASS="ChatCell">
				<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_6); ?> :</TD>
				<TD VALIGN="TOP" CLASS="ChatCell">
					<SELECT NAME="R0" CLASS="ChatBox" onChange="reset_R0();">
						<OPTION VALUE=""><?php echo(L_SET_7); ?></OPTION>
						<?php
						// Display default public rooms in the drop down list
						$PrevRoom = "";
						if($R != "" && !(isset($RES) && $RES)) $PrevRoom = urldecode($R);
						$DefaultRoomsString = "";
						$disp_note = 0;
						for($i = 0; $i < count($DefaultChatRooms); $i++)
						{
							$tmpRoom = stripslashes($DefaultChatRooms[$i]);
							$tmpDispRoom = $tmpRoom;
							if (is_array($DefaultDispChatRooms) && in_array($tmpRoom." [R]",$DefaultDispChatRooms))
							{
								$res_init = utf8_substr(L_RESTRICTED, 0, 1);
								$tmpDispRoom .= " [".$res_init."]";
								$disp_note = 1;
							}
							$DefaultRoomsString .= ($DefaultRoomsString == "" ? "" : ",").$tmpRoom;
							echo("<OPTION VALUE=\"".htmlspecialchars($tmpRoom)."\"");
							if(strcasecmp(mb_convert_case($tmpRoom,MB_CASE_LOWER,$Charset), mb_convert_case($PrevRoom,MB_CASE_LOWER,$Charset)) == 0)
							{
								echo(" SELECTED");
								$DefaultRoomFound = 1;
							}
							echo(">".$tmpDispRoom."</OPTION>");
						}
						?>
					</SELECT>
				</TD>
			</TR>
			<?php
		}
		if (C_VERSION == 2)
		{
			$created_rooms = "";
			// Display other public rooms in the drop down list
			$DbLink->query("SELECT DISTINCT room FROM ".C_MSG_TBL." WHERE type = 1 AND room != 'Offline PMs' AND room != '*' AND username NOT LIKE 'SYS %' ORDER BY room");
			while(list($Room) = $DbLink->next_record())
			{
				if (!room_in($Room, $DefaultRoomsString, $Charset))
				{
					$created_rooms .= "<OPTION VALUE=\"".htmlspecialchars($Room)."\"";
					if(strcasecmp(mb_convert_case($Room,MB_CASE_LOWER,$Charset), mb_convert_case($PrevRoom,MB_CASE_LOWER,$Charset)) == 0 && !$DefaultRoomFound)
					{
						$created_rooms .= " SELECTED";
						$DefaultRoomFound = 1;
					}
					$created_rooms .= ">${Room}</OPTION>";
				}
			}
			$DbLink->clean_results();
			if ($created_rooms != "")
			{
			?>
			<TR CLASS="ChatCell">
				<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_8); ?> :</TD>
				<TD VALIGN="TOP" CLASS="ChatCell">
					<SELECT NAME="R1" CLASS="ChatBox" onChange="reset_R1();">
						<OPTION VALUE=""><?php echo(L_SET_7); ?></OPTION>
						<?php
							echo($created_rooms);
						?>
					</SELECT>
				</TD>
			</TR>
			<?php
			}
		}
		if (C_VERSION > 0 && C_SHOW_PRIV)
		{
			$DefaultPrivateRoomFound = 0;
			$PrevPrivateRoom = "";
			if($R != "" && !(isset($RES) && $RES)) $PrevPrivateRoom = urldecode($R);
			$DbLink->query("SELECT perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
			if ($DbLink->num_rows() != 0) $reguser = ($DbLink->num_rows() != 0);
			else $nonreguser = 1;
			if ($reguser) list($perms,$rooms) = $DbLink->next_record();
			$DbLink->clean_results();
			if ($DefaultPrivateRooms != NULL)
			{
				if ($perms == "admin" || $perms == "topmod")
				{
				?>
				<TR CLASS="ChatCell">
					<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_15); ?> :</TD>
					<TD VALIGN="TOP" CLASS="ChatCell">
						<SELECT NAME="R2" CLASS="ChatBox" onChange="reset_R2();">
							<OPTION VALUE=""><?php echo(L_SET_7); ?></OPTION>
							<?php
							// Display default private rooms in the drop down list
							$DefaultPrivateRoomsString = "";
								for($i = 0; $i < count($DefaultPrivateRooms); $i++)
							{
								$tmpPrivateRoom = stripslashes($DefaultPrivateRooms[$i]);
								$DefaultPrivateRoomsString .= ($DefaultPrivateRoomsString == "" ? "" : ",").$tmpPrivateRoom;
								echo("<OPTION VALUE=\"".htmlspecialchars($tmpPrivateRoom)."\"");
								if(strcasecmp(mb_convert_case($tmpPrivateRoom,MB_CASE_LOWER,$Charset), mb_convert_case($PrevPrivateRoom,MB_CASE_LOWER,$Charset)) == 0)
								{
									echo(" SELECTED");
									$DefaultPrivateRoomFound = 1;
								}
								echo(">".$tmpPrivateRoom."</OPTION>");
							}
							?>
						</SELECT>
					</TD>
				</TR>
				<?php
				}
				elseif ($perms == "moderator" && C_SHOW_PRIV_MOD)
				{
				?>
				<TR CLASS="ChatCell">
					<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_15); ?> :</TD>
					<TD VALIGN="TOP" CLASS="ChatCell">
						<SELECT NAME="R2" CLASS="ChatBox" onChange="reset_R2();">
							<OPTION VALUE=""><?php echo(L_SET_7); ?></OPTION>
								<?php
								echo("<OPTION VALUE=\"".htmlspecialchars(ROOM8)."\"");
								if(strcasecmp(mb_convert_case(ROOM8,MB_CASE_LOWER,$Charset), mb_convert_case($PrevPrivateRoom,MB_CASE_LOWER,$Charset)) == 0)
								{
									echo(" SELECTED");
									$DefaultPrivateRoomFound = 1;
								}
								echo(">".ROOM8."</OPTION>");
								echo("<OPTION VALUE=\"".htmlspecialchars(ROOM9)."\"");
								if(strcasecmp(mb_convert_case(ROOM8,MB_CASE_LOWER,$Charset), mb_convert_case($PrevPrivateRoom,MB_CASE_LOWER,$Charset)) == 0)
								{
									echo(" SELECTED");
									$DefaultPrivateRoomFound = 1;
								}
								echo(">".ROOM9."</OPTION>");
							?>
						</SELECT>
					</TD>
				</TR>
				<?php
				}
				elseif (C_SHOW_PRIV_USR)
				{
				?>
				<TR CLASS="ChatCell">
					<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_15); ?> :</TD>
					<TD VALIGN="TOP" CLASS="ChatCell">
						<SELECT NAME="R2" CLASS="ChatBox" onChange="reset_R2();">
							<OPTION VALUE=""><?php echo(L_SET_7); ?></OPTION>
							<?php
								echo("<OPTION VALUE=\"".htmlspecialchars(ROOM9)."\"");
								if(strcasecmp(ROOM9, $PrevPrivateRoom) == 0)
								{
									echo(" SELECTED");
									$DefaultPrivateRoomFound = 1;
								}
								echo(">".ROOM9."</OPTION>");
							?>
						</SELECT>
					</TD>
				</TR>
				<?php
				}
			}
		}
		if($disp_note) echo("<tr class=\"ChatError\"><td align=right colspan=2><font size=-2>[".$res_init."] = ".L_RESTRICTED.".</font></td></tr>");
		if (C_VERSION == 2)
		{
			if((!$T && !$DefaultRoomFound) || (!$T && !$DefaultPrivateRoomFound)) $T = 1;
			?>
			<TR CLASS="ChatCell">
				<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP" COLSPAN=2>
					<?php echo(L_SET_9." "); ?>
					<SELECT NAME="T" CLASS="ChatBox">
						<OPTION VALUE="1" <?php if($T && !$DefaultPrivateRoomFound) echo("SELECTED"); ?> <?php if(!$T && $DefaultPrivateRoomFound) echo("DISABLED"); ?>><?php echo(L_SET_10); ?></OPTION>
						<OPTION VALUE="0" <?php if((!$T && !$DefaultRoomFound) || ($T && $DefaultPrivateRoomFound)) echo("SELECTED"); ?>><?php echo(L_SET_11); ?></OPTION>
					</SELECT>
					<?php echo(L_SET_12.":"); ?>
					<INPUT TYPE="text" NAME="R3" SIZE=11 MAXLENGTH=14 <?php if(!$DefaultRoomFound && !$DefaultPrivateRoomFound && $R != "" && !$RES) echo("VALUE=\"".htmlspecialchars(urldecode($R))."\""); ?> CLASS="ChatBox" onChange="reset_R3();">
				</TD>
			</TR>
			<?php
		}
		if (C_VERSION == 1)
		{
			?>
		<INPUT TYPE="hidden" NAME="T" VALUE="0" <?php if((!$T && !$DefaultRoomFound) || ($T && $DefaultPrivateRoomFound)) echo("SELECTED"); ?>>
			<?php
		}
		?>
		</TABLE>
		<TR CLASS="ChatP2"><TD align="center">
<?php
if (C_REQUIRE_REGISTER)
{
?>
		<div CLASS="ChatError"><?php echo(L_ERR_USR_14); ?></div>
<?php
}
?>
		<?php echo(L_SET_13." "); ?>
		 ... <INPUT TYPE="submit" NAME="submit" VALUE="<?php echo(L_SET_14); ?>" CLASS="ChatBox">
		<br /><br /><FONT SIZE=-1><?php echo(L_SET_18); ?></FONT><br />
		</TD></TR>
	</TD>
</TR>
</TABLE>
</FORM>
<?php
if (C_SHOW_INFO)
{
?>
<FONT COLOR=yellow SIZE=-1>
<?php
// Info on welcome page about cmds, mods and bot. Edit lib/info.lib.php to add more infos about your chat features
if (SET_CMDS) echo("<span style=\"color:orange\">".INFO_CMDS."</span><br />".CMDS.".<br />");
if (SET_MODS) echo("<span style=\"color:orange\">".INFO_MODS."</span><br />".MODS.".<br />");
if (SET_BOT && C_BOT_CONTROL)
{
		$DbLink->query("SELECT Count(*) FROM ".C_USR_TBL." WHERE username='".C_BOT_NAME."' LIMIT 1");
		list($botinroom) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($botinroom != 0)
		{
			echo("<span style=\"color:orange\">".INFO_BOT."</span> <u>".C_BOT_NAME."</u>.<br />");
		}
}
?>
</FONT>
<?php
}
?>
<?php
echo("<P>");
if (C_SHOW_COUNTER)
{
	include_once("./${ChatPath}acounter.php");
    $ani_counter = new acounter();
	echo ($ani_counter->create_output("chat_index"));
	$INSTALL_DATE = strftime(L_SHORT_DATE,strtotime(C_INSTALL_DATE));
	if(stristr(PHP_OS,'win'))
	{
		$INSTALL_DATE = utf_conv(WIN_DEFAULT,$Charset,$INSTALL_DATE);
		if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $INSTALL_DATE = str_replace(" ","",$INSTALL_DATE);
	}
?>
<font face=Verdana color=yellow size=1><?php echo (sprintf(L_VISITOR_REPORT,$INSTALL_DATE)) ?>.</font>
<?php
echo("</P>");
}
?>
<SPAN CLASS="ChatCopy" dir="LTR">
<?php
$sflogo = "http://sflogo.sourceforge.net/sflogo.php?group_id=19371&type=10";
?>
&copy; 2000-2005 <a HREF="http://sourceforge.net/projects/phpmychat/" TARGET=_blank CLASS="ChatLink" Title="<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>.'; return true">The phpHeaven Team</a><br />
&copy; 2005-<?php echo(date('Y'))?> Plus development by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" Title="<?php echo(sprintf(L_CLICK,L_LINKS_9)); ?>" CLASS="ChatLink" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_DEVELOPER)); ?>.'; return true;">Ciprian M</a>.<br />
Thanks to all the contributors in the <a href="http://groups.yahoo.com/subscribe/phpmychat" CLASS="ChatLink" title="<?php echo(sprintf(L_CLICK,L_LINKS_8)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_8)); ?>.'; return true;" target=_blank>phpMyChat group</a> !<br />
Download this full chat pack from <a href="http://sourceforge.net/projects/phpmychat/files/phpMyChat_Plus/" target=_blank title="<?php echo(APP_NAME." ".L_SRC." Sorceforge.net!\n".sprintf(L_CLICK,L_LINKS_10)); ?>" onMouseOver="window.status='<?php echo(APP_NAME." ".L_SRC." Sorceforge.net!"); ?>'; return true;" CLASS="ChatLink"><img src="<?php echo((remote_file_exists($sflogo) === true || is_file($sflogo) || file_exists($sflogo)) ? $sflogo : "./${ChatPath}images/sflogo.gif"); ?>" border=0 width="80" height="15" /></a>
</SPAN>
<?php
if (C_SHOW_OWNER)
{
?>
<br /><SPAN CLASS="ChatCopy" dir="LTR">
Owner of this chat server -<b>
<?php
include_once("admin/mail4admin.lib.php");
#if (!eregi("Your name",C_ADMIN_NAME) && C_ADMIN_NAME != "") $Owner_name = C_ADMIN_NAME;
if (stripos(C_ADMIN_NAME,"Your name") === false && C_ADMIN_NAME != "") $Owner_name = C_ADMIN_NAME;
else $Owner_name = L_LURKING_5;
if (strstr($Sender_email,"@") && $Sender_email != "" && $Sender_email != "your@email.com")
{
	$Owner_email = $Sender_email;
?>
	<a href="mailto:<?php echo($Owner_email) ?>?subject=Contact%20from%20[<?php echo(C_CHAT_NAME != "" ? C_CHAT_NAME : APP_NAME) ?>]%20Login%20Page" CLASS="ChatLink" Title="<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_OWNER)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICKS,L_LINKS_6,L_OWNER)); ?>.'; return true"><?php echo($Owner_name); ?></A>
<?php
}
else echo($Owner_name);
?>
</b></SPAN>
<?php
}
?>
<br /><SPAN CLASS="ChatCopy" dir="LTR"><a HREF="privacy.html" onClick="privacy_popup(); return false" TARGET=_blank CLASS="ChatLink" Title="<?php echo(sprintf(L_CLICK,L_PRIVACY)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_PRIVACY)); ?>'; return true">Our Privacy Policy</a>
</SPAN><br />
<div class="fb-like" data-href="https://www.facebook.com/pages/phpMyChat-Plus/112950852062055" data-send="true" data-layout="button_count" data-show-faces="false" data-font="tahoma"></div>
<?php
	if ($show_donation)
	{
	?>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="support" target="_blank" onSubmit="return confirm('<?php echo(L_SUPP_WARN); ?>');">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="<?php echo($ppbutton); ?>">
		<input type="image" style="background-color: transparent;" src="<?php echo($donate); ?>" border="0" name="donate" alt="<?php echo($ppalt."&#10;".L_SUPP_ALT); ?>" title="<?php echo($ppalt."&#10;".L_SUPP_ALT); ?>" onMouseOver="window.status='<?php echo($ppalt); ?>'; return true;">
		</form>
	<?php
	}
	?>
</TD>
</TR>
</TABLE>
<?php
	if ($show_search) echo($search);
	if ($copy_break)
	{
		?>
		<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
		<!--
			alert('This phpMyChat-Plus server (<?php echo($_SERVER['SERVER_ADDR']); ?>) has been hacked by the owner (<?php echo(C_ADMIN_NAME." - ".C_ADMIN_EMAIL); ?>).\n\nAll the Chat functions and features have been disabled due to Copyright Infringement!\n\nThis work is licensed under the\n"Creative Commons Attribution-Noncommercial-No Derivative Works 3.0 Unported License".\n\nPlease contact the developer at "ciprianmp at yahoo dot com" in order to make it legal!');
			window.location.replace("http://creativecommons.org/licenses/by-nc-nd/3.0/");
		// -->
		</SCRIPT>
	<?php
	}
}; // end of the layout function
?>