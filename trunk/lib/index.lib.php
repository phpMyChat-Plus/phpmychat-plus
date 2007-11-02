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
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Get the names and values for vars posted from the form bellow
if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

if (!isset($L) && isset($_COOKIE["CookieLang"])) $L = $_COOKIE["CookieLang"]; 

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();

require("./${ChatPath}config/config.lib.php");
require("./${ChatPath}lib/release.lib.php");
require("./${ChatPath}localization/languages.lib.php");
if (!isset($L) || $L == "") $L = C_LANGUAGE;
require("./${ChatPath}localization/".$L."/localized.chat.php");
require("./${ChatPath}lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}lib/clean.lib.php");
include("./${ChatPath}lib/get_IP.lib.php");

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

// Get the relative path to the script that called this one
if (!isset($PHP_SELF)) $PHP_SELF = $_SERVER["PHP_SELF"];
$Action = basename($PHP_SELF);
$From = urlencode(ereg_replace("[^/]+/","../",$ChatPath).$Action);

// For translations with a real iso code
if (!isset($FontFace)) $FontFace = "";
// For others translations
$DisplayFontMsg = !(isset($U) && $U != "");

// Translate to html special characters, and entities if message was sent with a latin 1 charset
$Latin1 = ($Charset != "utf-8");
function special_char($str,$lang)
{
	return addslashes($lang ? htmlentities(stripslashes($str)) : htmlspecialchars(stripslashes($str)));
};

// Ensure a room ($what) is include in a rooms list ($in)
function room_in($what, $in)
{
	$rooms = explode(",",$in);
	for (reset($rooms); $room_name=current($rooms); next($rooms))
	{
		if (strcasecmp($what, $room_name) == 0) return true;
	};
	return false;
};



/*********** PART I ***********/

// Define the message to display if user comes here because he has been kicked
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
			if ($Reason == "") $Error = L_REG_18;
			else $Error = sprintf(L_REG_18a, $Reason);
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
		if (!empty($user_password) && (empty($PWD_Hash) || $PWD_Hash != $user_password))
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
		// Ghost Control mod by Ciprian
		$DbLink->query("SELECT status FROM ".C_USR_TBL." WHERE username='$U' AND room='$E' LIMIT 1");
		if ($DbLink->num_rows() != 0);
		{
			list($statusu) = $DbLink->next_record();
			$DbLink->clean_results();
		}
		$DbLink->query("DELETE FROM ".C_USR_TBL." WHERE username='$U' AND room='$E'");
				if (isset($EN) && (!C_HIDE_ADMINS || (C_HIDE_ADMINS && $status != "a" && $status != "t")) && (!C_HIDE_MODERS || (C_HIDE_MODERS && $status != "m")))
				{
						$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($EN, '$E', 'SYS exit', '', ".time().", '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1)."\")', '', '')");
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
	elseif (trim($U) == "" || ereg("[\, \']", stripslashes($U)))
	{
		$Error = L_ERR_USR_16a;
	}
	elseif (C_NO_SWEAR && checkwords($U, true))
	{
		$Error = L_ERR_USR_18;
	}
	else
	{
		$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$U' LIMIT 1");
		$Nb = $DbLink->num_rows();
		// If the same nick is already in use and the user is not registered deny access
		if($Nb != 0 && $pmc_password == "" && !isset($PWD_Hash))
		{
			$Error = L_ERR_USR_1;
			$DbLink->clean_results();
		}
		else
		{
			list($room) = $DbLink->next_record();
			$DbLink->clean_results();
			$DbLink->query("SELECT password,perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
			$reguser = ($DbLink->num_rows() != 0);
			if ($reguser) list($user_password,$perms,$rooms) = $DbLink->next_record();
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
						if (md5(stripslashes($pmc_password)) != $user_password && (!isset($PWD_Hash) || $PWD_Hash != $user_password)) $Error = L_ERR_USR_4;
					}
					if (!isset($Error)) $DbLink->query("UPDATE ".C_REG_TBL." SET reg_time=".time()." WHERE username='$U'");
				}
				// If users isn't a registered one and phpMyChat require registration deny access
				else if (C_REQUIRE_REGISTER)
				{
					$Error = L_ERR_USR_14;
				}
			}

			// The var bellow is set to 1 when a registered user is allowed to log using a nick
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
	$DbLink->query("SELECT perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
	$reguser = ($DbLink->num_rows() != 0);
	if ($reguser) list($perms,$rooms) = $DbLink->next_record();
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
		else if (trim($R3) == "" || ereg("[,\]", stripslashes($R3)))
		{
			$Error = L_ERR_ROM_1;
		}
		// Check for swear words in room name
		else if(C_NO_SWEAR && checkwords($R3, true))
		{
			$Error = L_ERR_ROM_2;
		}
		// Ensure there is no existing room with the same name but a different type...
		else
		{
			// ...among reserved name for private/public (default) rooms
			$ToCheck = ($T == "1" ? $DefaultPrivateRooms : $DefaultChatRooms);
			for ($i = 0; $i < count($ToCheck); $i++)
			{
				if (strcasecmp($R3,$ToCheck[$i]) == "0")
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
			$ToCheck = ($T == "1" ? $DefaultChatRooms : $DefaultPrivateRooms);
			for ($i = 0; $i < count($ToCheck); $i++)
			{
				if (strcasecmp($R3,$ToCheck[$i]) == "0") $register_room = false;
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
					if (strcasecmp(stripslashes($R3), $roomTab[$i]) == 0)
					{
						$roomTab[$i] = "";
						$changed = true;
						break;
					};
				};
				if ($changed)
				{
					$mod_rooms = str_replace(",,",",",ereg_replace("^,|,$","",implode(",",$roomTab)));
					$UpdLink->query("UPDATE ".C_REG_TBL." SET rooms='".addslashes($mod_rooms)."' WHERE username='".addslashes($mod_un)."'");
					$UpdLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE room='$R3' AND username='".addslashes($mod_un)."'");
				};
				unset($roomTab);
			};
			$DbLink->clean_results();

			// Update the current user status for the room to be created in registered users table
			$changed = false;
			if (!room_in(stripslashes($R3), $rooms))
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
					if (strcasecmp(stripslashes($R2), $roomTab[$i]) == 0)
					{
						$roomTab[$i] = "";
						$changed = true;
						break;
					};
				};
				if ($changed)
				{
					$mod_rooms = str_replace(",,",",",ereg_replace("^,|,$","",implode(",",$roomTab)));
					$UpdLink->query("UPDATE ".C_REG_TBL." SET rooms='".addslashes($mod_rooms)."' WHERE username='".addslashes($mod_un)."'");
					$UpdLink->query("UPDATE ".C_USR_TBL." SET status='r' WHERE room='$R2' AND username='".addslashes($mod_un)."'");
				};
				unset($roomTab);
			};
			$DbLink->clean_results();

			// Update the current user status for the room to be created in registered users table
			$changed = false;
			if (!room_in(stripslashes($R2), $rooms))
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
		$R = (isset($R0) && $R0 != "")? $R0 : $R1;
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
	if (!isset($PWD_Hash)) $PWD_Hash = (isset($reguser) && $reguser ?  md5(stripslashes($pmc_password)) : "");
	if (!isset($sort_order)) $sort_order = isset($CookieUserSort) ? $CookieUserSort : C_USERS_SORT_ORD;

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
				$status = (room_in(stripslashes($R), $rooms) || room_in("*", $rooms) ? "m" : "r");
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
	
	// Udpates the IP address and the last log. time of the user in the regsistered users table if necessary
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
if ((!C_HIDE_ADMINS || (C_HIDE_ADMINS && $status != "a" && $status != "t")) && (!C_HIDE_MODERS || (C_HIDE_MODERS && $status != "m")))
{
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ('$type', '".addslashes($room)."', 'SYS exit', '', '$current_time', '', 'sprintf(L_EXIT_ROM, \"".special_char($U,$Latin1)."\")', '', '')");
// next line WELCOME SOUND feature altered for compatibility with /away command R Dickow:
  $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '', '$current_time', '', 'stripslashes(sprintf(L_ENTER_ROM, \"".special_char($U,$Latin1)."\"))', '', '')");
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
				$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS welcome', '', '$current_time_plus', '$U', 'sprintf(WELCOME_MSG)', '', '')");
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
if ((!C_HIDE_ADMINS || (C_HIDE_ADMINS && $statusu != "a" && $status != "t")) && (!C_HIDE_MODERS || (C_HIDE_MODERS && $statusu != "m")))
{
// next line WELCOME SOUND feature altered for compatibility with /away command R Dickow:
   $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS enter', '', '$current_time', '', 'stripslashes(sprintf(L_ENTER_ROM, \"".special_char($U,$Latin1)."\"))', '', '')");
}

		if (C_WELCOME)
		{
			// Delete old welcome messages sent to the current user
			$DbLink->query("DELETE FROM ".C_MSG_TBL." WHERE username LIKE 'SYS welcome' AND address = '$U'");
			// Insert a new welcome message in the messages table
			$current_time_plus = $current_time + 1;	// ensures the welcome msg is the last one
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS welcome', '', '$current_time_plus', '$U', 'sprintf(WELCOME_MSG)', '', '')");
		};
	};

	// Delete invite messages sent to the user for the room he will enter in
	$DbLink->query("SELECT m_time FROM ".C_MSG_TBL." WHERE username='SYS inviteTo' AND address='$U' AND room='$R'");
	if($DbLink->num_rows() != 0)
	{
		$DelLink = new DB;
		while(list($sent_time) = $DbLink->next_record())
		{
			$DelLink->query("DELETE FROM ".C_MSG_TBL." WHERE m_time='$sent_time' AND (username='SYS inviteFrom' OR (username='SYS inviteTo' AND address='$U'))");
		};
	};
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
	<HTML>
	<HEAD>
	<TITLE><?php echo((C_CHAT_NAME != "") ? C_CHAT_NAME." - ".APP_NAME : APP_NAME); ?></TITLE>
	<LINK REL="SHORTCUT ICON" HREF="<?php echo($ChatPath); ?>favicon.ico">
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
// Display & remove the server time in the status bar
<?php
function utf8_substr($str,$start)
{
   preg_match_all("/./su", $str, $ar);

   if(func_num_args() >= 3) {
       $end = func_get_arg(2);
       return join("",array_slice($ar[0],$start,$end));
   } else {
       return join("",array_slice($ar[0],$start));
   }
}
?> 
// Returns the days in the status bar
function get_day(time,plus)
{
		monday = " <?php echo(utf8_substr(L_MON, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		tuesday = " <?php echo(utf8_substr(L_TUE, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		wednesday = " <?php echo(utf8_substr(L_WED, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		thursday = " <?php echo(utf8_substr(L_THU, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		friday = " <?php echo(utf8_substr(L_FRI, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		saturday = " <?php echo(utf8_substr(L_SAT, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		sunday = " <?php echo(utf8_substr(L_SUN, 0, ($L == 'vietnamese') ? '8' : '3')); ?>";
		dayN = time.getDay();
		day = dayN + plus;
		is_day = "";
		if (day == 1 || day == 8) is_day = monday;
		if (day == 2) is_day = tuesday;
		if (day == 3) is_day = wednesday;
		if (day == 4) is_day = thursday;
		if (day == 5) is_day = friday;
		if (day == 6) is_day = saturday;
		if (day == 0 || day == 7) is_day = sunday;
		return is_day;
}
// Calculates the European Daylight savings from 2006 to 2011
	function timedst_eu()
	{
		timedsteu = 0;
		timenow = <?php echo(time()); ?>;
		if ((timenow > 1174784400 && timenow < 1193533199) || (timenow > 1206838800 && timenow < 1224982799) || (timenow > 1238288400 && timenow < 1256432399) || (timenow > 1269997200 && timenow < 1288486799) || (timenow > 1301187600 && timenow < 1319936399)) timedsteu = 1;
		return timedsteu;
	}
// Calculates the US Daylight savings from 2006 to 2011
	function timedst_usa()
	{
		timedstusa = 0;
		timenow = <?php echo(time()); ?>;
		if ((timenow > 1173578400 && timenow < 1194141599) || (timenow > 1205028000 && timenow < 1225591199) || (timenow > 1236477600 && timenow < 1257040799) || (timenow > 1268532000 && timenow < 1289095199) || (timenow > 1299981600 && timenow < 1320544799)) timedstusa = 1;
		return timedstusa;
	}
// Calculates the Sydney Daylight savings from 2007 to 2010
	function timedst_syd()
	{
		timedstsyd = 0;
		timenow = <?php echo(time()); ?>;
		if ((timenow > 1193536799 && timenow < 1207450800) || (timenow > 1223171999 && timenow < 1238900400) || (timenow > 1254621599 && timenow < 1270341000)) timedstsyd = 1;
		return timedstsyd;
	}
// Display & remove the server time at the status bar
	function clock(gap)
	{
		cur_date = new Date();
		calc_date = new Date(cur_date - gap);
		calc_hours = calc_date.getHours();
		calc_minutes = calc_date.getMinutes();
		calc_seconds = calc_date.getSeconds();
		if (calc_hours < 10) calc_hours = "0" + calc_hours;
		if (calc_minutes < 10) calc_minutes = "0" + calc_minutes;
		if (calc_seconds < 10) calc_seconds = "0" + calc_seconds;
		calc_time = calc_hours + ":" + calc_minutes + ":" + calc_seconds<?php echo((C_WORLDTIME >= 1) ? ' + get_day(calc_date,0)' : ''); ?>;
		<?php if (C_WORLDTIME >= 1)
		{
		?>
		cur_gapGMT = cur_date.getTimezoneOffset()/60;
		cur_hoursGMT = cur_date.getHours()+cur_gapGMT;
		cur_hoursGMT_DST_EU = cur_hoursGMT+timedst_eu();
		cur_hoursGMT_DST_USA = cur_hoursGMT+timedst_usa();
		cur_hoursGMT_DST_SYD = cur_hoursGMT+timedst_syd();
		cur_hoursLON = cur_hoursGMT_DST_EU;
		dayLON = "";
		if (cur_hoursLON < 0) { cur_hoursLON = 24 + cur_hoursLON; dayLON = get_day(cur_date,-1) }
		else dayLON = get_day(cur_date);
		if (cur_hoursLON < 10) cur_hoursLON = "0" + cur_hoursLON;
		cur_timeLON =cur_hoursLON + ":" + calc_minutes + dayLON;
		cur_hoursNYC = cur_hoursGMT_DST_USA - 5;
		dayNYC = "";
		if (cur_hoursNYC < 0) { cur_hoursNYC = 24 + cur_hoursNYC; if (cur_hoursLON - cur_hoursNYC < 0) dayNYC = get_day(cur_date,-1); }
		if (cur_hoursNYC < 10) cur_hoursNYC = "0" + cur_hoursNYC;
		cur_timeNYC = cur_hoursNYC + ":" + calc_minutes + dayNYC;
		cur_hoursPAR = cur_hoursGMT_DST_EU + 1;
		dayPAR = "";
		if (cur_hoursPAR < 0) cur_hoursPAR = 24 + cur_hoursPAR;
		if (cur_hoursPAR > 23) { cur_hoursPAR = cur_hoursPAR - 24; if (cur_hoursPAR - cur_hoursLON < 0) dayPAR = get_day(cur_date,1); }
		if (cur_hoursPAR < 10) cur_hoursPAR = "0" + cur_hoursPAR;
		cur_timePAR = cur_hoursPAR + ":" + calc_minutes + dayPAR;
		cur_hoursBUC = cur_hoursGMT_DST_EU + 2;
		dayBUC = "";
		if (cur_hoursBUC > 23) { cur_hoursBUC = cur_hoursBUC - 24; if (cur_hoursBUC - cur_hoursLON < 0) dayBUC = get_day(cur_date,1); }
		if (cur_hoursBUC < 10) cur_hoursBUC = "0" + cur_hoursBUC;
		cur_timeBUC = cur_hoursBUC + ":" + calc_minutes + dayBUC;
		cur_hoursTYO = cur_hoursGMT + 9;
		dayTYO = "";
		if (cur_hoursTYO > 23) { cur_hoursTYO = cur_hoursTYO - 24; if (cur_hoursTYO - cur_hoursLON < 0) dayTYO = get_day(cur_date,1); }
		if (cur_hoursTYO < 10) cur_hoursTYO = "0" + cur_hoursTYO;
		cur_timeTYO = cur_hoursTYO + ":" + calc_minutes + dayTYO;
		cur_hoursSYD = cur_hoursGMT_DST_SYD + 10;
		daySYD = "";
		if (cur_hoursSYD > 23) { cur_hoursSYD = cur_hoursSYD - 24; if (cur_hoursSYD - cur_hoursLON < 0) daySYD = get_day(cur_date,1); }
		if (cur_hoursSYD < 10) cur_hoursSYD = "0" + cur_hoursSYD;
		cur_timeSYD = cur_hoursSYD + ":" + calc_minutes + daySYD;
		<?php
		}
		?>
		WORLD_TIME = <?php echo((C_WORLDTIME >= 1) ? '" " + "(NYC: " + cur_timeNYC + " | LON: " + cur_timeLON + " | PAR: " + cur_timePAR + " | BUC: " + cur_timeBUC + " | TYO: " + cur_timeTYO + " | SYD: " + cur_timeSYD + ")"' : '""'); ?>;
		window.status = "<?php echo(L_SVR_TIME); ?>" + calc_time + WORLD_TIME;

		clock_disp = setTimeout('clock(' + gap + ')', 1000);
	}
// Stops the clock in the status bar
	function stop_clock()
	{
		clearTimeout(clock_disp);
		window.status = '';
	}
// Calculates the gap between the server and the local date
	function calc_gap(serv_date)
	{
		server_date = new Date(serv_date);
		local_date = new Date();
		return local_date - server_date;
	}

	<?php
		$CorrectedDate = mktime(date("G") + C_TMZ_OFFSET,date("i"),date("s"),date("m"),date("d"),date("Y"));
		?>
		gap = calc_gap("<?php echo(date("F d, Y H:i:s", $CorrectedDate)); ?>");
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
			is_smilie_popup = window.open("smilie_popup.php?<?php echo("L=$L"); ?>","smilie_popup","bottom=0,right=0,width=300,height=300,scrollbars=yes,resizable=yes,status=yes,toolbar=no,menubar=no,directories=no,location=no");
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
// -->
	</SCRIPT>
	<SCRIPT TYPE="text/javascript" LANGUAGE="javascript1.1">
	<!--
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
	// -->
	</SCRIPT>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript1.2">
	<!--
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
	}

	// Quick validation of the message or the command submited at the input frame
	function validateSubmission()
	{
		inputFrameForm = window.frames['input'].window.document.forms['MsgForm'];

		// Submission looks like a command?
		isCmd = ((inputFrameForm.elements['M'].value.substring(0,1) == '/') || (inputFrameForm.elements['M'].value.substring(0,2) == ': '));
		// RegExp to quick check for valid commands
		re = /^\/(!$|announce .+|ban .+|clear$|help$|\?$ .+|ignore|invite .+|join .+|kick .+|me .+|msg .+|to .+|notify$|order$|sort$|profile$|promote|quit|exit|bye|refresh|save|show|last|size|timestamp$|whois .+|mr .+|away|demote .+|high|img .+|room .+|topic .+|wisp .+|whisp .+|buzz|bot|dice|([1-9][0-9]?d)|([1-9][0-9]?d[1-9][0-9]?)|d([1-9][0-9]?[0-9]?)([t])([1-9][0-9]?)|d([1-9][0-9]?[0-9]?))/i;
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
	}
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
	Release: phpMyChat Plus 1.91-�6
	� 2005-2007 Ciprian Murariu (ciprianmp@yahoo.com)
	Based on phpMyChat 0.14.6-dev (also called 0.15.0)
	� 2000-2007 The phpHeaven Team (http://www.phpheaven.net/)
	-->
	<META NAME="description" CONTENT="phpMyChat">
	<META NAME="keywords" CONTENT="phpMyChat">
	<?php
	if ($icon) echo("<LINK REL=\"SHORTCUT ICON\" HREF=\"${ChatPath}favicon.ico\">\n");

	// For translations with an explicit charset (not the 'x-user-defined' one)
	if (!isset($FontName)) $FontName = "";
	?>
	<LINK REL="stylesheet" HREF="<?php echo($ChatPath); ?>config/start_page.css.php?<?php echo("Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
	<SCRIPT TYPE="text/javascript" LANGUAGE="javascript">
	<!--
         <?
	if (eregi("firefox", $_SERVER['HTTP_USER_AGENT'])){ ?>
		var NS4 = "H";
		var IE4 = "H";
		var ver4 = "H";
	<?
	}
	else{ ?>
		var NS4 = (document.layers) ? 1 : 0;
		var IE4 = ((document.all) && (parseInt(navigator.appVersion)>=4)) ? 1 : 0;
		var ver4 = (NS4 || IE4) ? "H" : "L";
	<?
}
?>

	// Will update the "Ver" field in the form below according to the javascript abilities of
	// the browser the users surf with
	function defineVerField()
	{
		if (document.images && ver4 == 'L')
			document.forms['Params'].elements['Ver'].value = 'M';	// js1.1 enabled browser
		else document.forms['Params'].elements['Ver'].value = ver4;
	}

	// will check the cookie settings of the client
function getCookie(name) {
  var cookies = document.cookie;
  var start = cookies.indexOf(name + '=');
  if (start == -1) return null;
  var len = start + name.length + 1;
  var end = cookies.indexOf(';',len);
  if (end == -1) end = cookies.length;
  return unescape(cookies.substring(len,end));
}

function set_Cookie(name, value, expires, path, domain, secure) {
  value = escape(value);
  expires = (expires) ? ';expires=' + expires.toGMTString() :'';
  path    = (path)    ? ';path='    + path                  :'';
  domain  = (domain)  ? ';domain='  + domain                :'';
  secure  = (secure)  ? ';secure'                           :'';
  document.cookie =
    name + '=' + value + expires + path + domain + secure;
}

function deleteCookie(name, path, domain) {
  var expires = ';expires=Thu, 01-Jan-70 00:00:01 GMT';
  (path)    ? ';path='    + path                  : '';
  (domain)  ? ';domain='  + domain                : '';

  if (getCookie(name))
    document.cookie = name + '=' + expires + path + domain;
}
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
  }
}

// Open the tutorial popup
	function tutorial_popup()
	{
		window.focus();
		tutorial_popupWin = window.open("<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver="); ?>"+ver4,"tutorial_popup","width=700,height=800,resizable=yes,scrollbars=yes,toolbar=yes,menubar=yes,status=yes");
		tutorial_popupWin.focus();
	}

	// Open the users popup according to the DHTML capacities of the browser
	function users_popup()
	{
		window.focus();
		users_popupWin = window.open("<?php echo($ChatPath); ?>users_popup"+ver4+".php?<?php echo("From=$From&L=$L"); ?>","users_popup_<?php echo(md5(uniqid(""))); ?>","width=230,height=300,resizable=yes,scrollbars=yes,status=yes");
		users_popupWin.focus();
	}

	// Open popups for registration stuff
	function reg_popup(name)
	{
		window.focus();
		url = "<?php echo($ChatPath); ?>" + name + ".php?L=<?php echo($L); ?>&Link=1";
		pop_width = (name != 'admin'? 400:820);
		pop_height = ((name != 'deluser' && name != 'pass_reset') ? (name != 'admin'? 640:550):260);
		param = "width=" + pop_width + ",height=" + pop_height + ",resizable=yes,scrollbars=yes";
		name += "_popup";
		window.open(url,name,param);
	}

	// The three functions bellow allows to ensure an unique choice among rooms
	function reset_R0()
	{
		<?php
		if (C_VERSION == 2)
		{
			?>
			document.forms['Params'].elements['R1'].options[0].selected = true;
			document.forms['Params'].elements['R2'].options[0].selected = true;
			document.forms['Params'].elements['T'].options[0].selected = true;
			document.forms['Params'].elements['R3'].value = '';
			<?php
		}
		?>
	}

	function reset_R1()
	{
		document.forms['Params'].elements['R0'].options[0].selected = true;
		document.forms['Params'].elements['R2'].options[0].selected = true;
		document.forms['Params'].elements['T'].options[0].selected = true;
		document.forms['Params'].elements['R3'].value = '';
	}

	function reset_R2()
	{
		document.forms['Params'].elements['R0'].options[0].selected = true;
		document.forms['Params'].elements['R1'].options[0].selected = true;
		document.forms['Params'].elements['T'].options[1].selected = true;
		document.forms['Params'].elements['R3'].value = '';
	}

	function reset_R3()
	{
		document.forms['Params'].elements['R0'].options[0].selected = true;
		document.forms['Params'].elements['R1'].options[0].selected = true;
		document.forms['Params'].elements['R2'].options[0].selected = true;
	}
	// -->
	</SCRIPT>
	<?php

} // end of send_headers function;



/*********** 'layout' FUNCTION ***********/

/* ----------------------------------------------------------------------------------
   The layout function draw the initial table/form. It will define three way to go
   into the chat (the $Ver et $Ver1 var) dependent of the browser capacities:
   - those that accept DHTML will use "H" (for highest) named scripts, the others
    	will run "L" (for lowest) named scripts;
   - all browsers will be able to use a color input box and a picker to choose
    	messages colors in the chat/input.php script - Color Input Box mod by Ciprian.
   ---------------------------------------------------------------------------------- */

function layout($Err, $U, $R, $T, $C, $status)
{
	global $DbLink;
	global $ChatPath, $From, $Action, $L;
	global $Charset, $CellAlign, $Align, $DisplayFontMsg, $FontPack, $FontName;
	global $AvailableLanguages;
	global $DefaultChatRooms;
	global $DefaultPrivateRooms;
	if ($Err) global $Error;
	?>

<TABLE ALIGN="center" CELLPADDING=5 CLASS="ChatBody"><TR><TD CLASS="ChatBody">
<CENTER>
<FORM ACTION="<?php echo("$Action"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="Params" onSubmit="defineVerField(); return isCookieEnabled()">
<SPAN CLASS="ChatTitle"><?php if (C_SHOW_LOGO) echo(APP_LOGO); ?><br /><?php  echo((C_CHAT_NAME != "") ? C_CHAT_NAME."<br /><SPAN CLASS=ChatP3>- ".APP_NAME." (".APP_VERSION.APP_MINOR.") -</SPAN>" : APP_NAME." (".APP_VERSION.APP_MINOR.")"); ?></SPAN>
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
<A HREF="<?php echo($ChatPath); ?>tutorial_popup.php?<?php echo("L=$L&Ver=L"); ?>" onClick="tutorial_popup(); return false" CLASS="ChatLink" TARGET="_blank" onMouseOver="window.status='<?php echo(L_TUTORIAL); ?>.'; return true;" title="<?php echo(L_TUTORIAL); ?>"><?php echo(L_TUTORIAL); ?></A>
</P>
<?php
}
?>
<P CLASS="ChatP1">
<?php
if (C_MSG_DEL == 1) $hours =  L_HOUR; else $hours = L_HOURS;
if (C_USR_DEL == 1) $mins = L_MIN; else $mins = L_MINS;
 echo(sprintf(L_WEL_1,C_MSG_DEL,$hours));
if(C_CHAT_BOOT)
{
 echo("<br />".sprintf(L_WEL_2,C_USR_DEL,$mins).".");
}
	?>
</P>
<?php
$DefaultRoomFound = 0;
// Ghost Control mod by Ciprian
$Hide = (C_HIDE_ADMINS) ? " AND ((u.status != 'a' AND u.status != 't') OR u.email = 'bot@bot.com')" : "";
$Hide .= (C_HIDE_MODERS ? " AND u.status !='m'" : "");
if($DbLink->query("SELECT DISTINCT u.username FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room".$Hide." AND m.type = 1"))
{
	$Nb = $DbLink->num_rows();
	$link = " <A HREF=\"${ChatPath}users_popupL.php?From=$From&L=$L\" CLASS=\"ChatLink\" onClick=\"users_popup(); return false\" TARGET=\"_blank\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_11).".'; return true;\" title='".sprintf(L_CLICK,L_LINKS_11)."'>";
	echo("<P CLASS=\"ChatP1\">".L_CUR_1." ".($Nb != 1 ? L_CUR_1a." ".$link.$Nb." ".L_USERS."</A>" : L_CUR_1b." ".$link.$Nb." ".L_USER."</A>")." ".L_CUR_2.".");
}
$DbLink->clean_results();
if (C_CHAT_LURKING && (C_SHOW_LURK_USR || $status == "a" || $status == "t"))
{
$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
@mysql_select_db(C_DB_NAME,$handler);
$timeout = "15";
$closetime = $time-($timeout);
$result = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<'$closetime'",$handler);
$result = @mysql_query("SELECT DISTINCT ip,browser FROM ".C_LRK_TBL."",$handler);
$online_users = @mysql_numrows($result);
@mysql_close();
$lurklink = " <A HREF=\"lurking.php?L=$L&D=10\" CLASS=\"ChatLink\" TARGET=\"_blank\" onMouseOver=\"window.status='".L_LURKING_1.".'; return true;\" title='".L_LURKING_1."'>";
echo("<br />".L_CUR_1." ".($online_users != 1 ? L_CUR_1a.$lurklink.$online_users." ".L_LURKERS."</A>." : L_CUR_1b.$lurklink.$online_users." ".L_LURKER."</A>."));
}
?>
</P>
<?php
if(isset($Error))
{
	echo("<P CLASS=\"ChatError\">$Error</P>");
}
if (!isset($Ver)) $Ver = "L";
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
		?>
		<TR CLASS="ChatCell">
			<TD COLSPAN=2 ALIGN="CENTER" CLASS="ChatCell">
				<SPAN CLASS="ChatFlags">
				<?php
				$i = 0;
				while(list($key, $name) = each($AvailableLanguages))
				{
					$i++;
					if ($name == "english" && C_ENGLISH_FORMAT == "US")
					{
						if(C_FLAGS_3D) $flag = "flag_us.gif";
						else $flag = "flag_us0.gif";
						$FLAG_NAME = L_LANG_ENUS;
					}
					else
					{
						if(C_FLAGS_3D) $flag = "flag.gif";
						else $flag = "flag0.gif";
						if ($name == "argentinian_spanish") $FLAG_NAME = L_LANG_AR;
						elseif ($name == "dutch") $FLAG_NAME = L_LANG_NL;
						elseif ($name == "english") $FLAG_NAME = L_LANG_ENUK;
						elseif ($name == "french") $FLAG_NAME = L_LANG_FR;
						elseif ($name == "german") $FLAG_NAME = L_LANG_DE;
						elseif ($name == "italian") $FLAG_NAME = L_LANG_IT;
						elseif ($name == "romanian") $FLAG_NAME = L_LANG_RO;
						elseif ($name == "spanish") $FLAG_NAME = L_LANG_ES;
						elseif ($name == "swedish") $FLAG_NAME = L_LANG_SV;
						elseif ($name == "turkish") $FLAG_NAME = L_LANG_TR;
						elseif ($name == "vietnamese") $FLAG_NAME = L_LANG_VI;
						else $FLAG_NAME = ucwords(str_replace("_"," ",$name));
					}
					if ($name == $L)
					{
						$FLAG_OVER = $FLAG_NAME." (".L_SELECTED.")";
						$FLAG_STATUS = $FLAG_OVER;
					}
					else
					{
						$FLAG_OVER = $FLAG_NAME;
						if ($L=="turkish") $FLAG_STATUS = $FLAG_NAME." ".L_SWITCH;
						else $FLAG_STATUS = L_SWITCH." ".$FLAG_NAME;
					}
					if ($name != $L) echo("<A HREF=\"$Action?L=${name}\" onMouseOver=\"window.status='".$FLAG_STATUS.".'; return true;\" Title=\"".$FLAG_OVER."\">");
					echo("<IMG SRC=\"${ChatPath}localization/${name}/images/".$flag."\" onMouseOver=\"window.status='".$FLAG_STATUS.".'; return true;\" BORDER=0 ALT=\"".$FLAG_OVER."\" Title=\"".$FLAG_OVER."\">");
					if ($name != $L) echo("</A>");
					echo("&nbsp;");
					if ($i % 15 == 0) echo ("<br />");
				};
				unset($AvailableLanguages);
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
				<INPUT TYPE="text" NAME="U" SIZE=11 MAXLENGTH=15 VALUE="<?php echo(htmlspecialchars(urldecode($U))); ?>" CLASS="ChatBox">
			</TD>
		</TR>
		<TR CLASS="ChatCell">
			<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_REG_1); ?> :</TD>
			<TD VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP">
				<INPUT TYPE="password" NAME="pmc_password" SIZE=11 MAXLENGTH=16 CLASS="ChatBox">
				<?php if (!C_REQUIRE_REGISTER) echo("&nbsp;(<U>".L_REG_7."</U>)"); ?>
				<br/><A HREF="<?php echo($ChatPath); ?>pass_reset.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('pass_reset'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_PASS_7); ?>.'; return true;" title="<?php echo(L_PASS_7); ?>"><?php echo(L_PASS_7); ?></A>
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
									<A HREF="<?php echo($ChatPath); ?>register.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('register'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_3); ?>.'; return true;" title="<?php echo(L_REG_3); ?>"><?php echo(L_REG_3); ?></A>
					| 	
				<?php
				}
				else if (!C_ALLOW_REGISTER)
				{ ?>
				<SPAN CLASS="ChatError">
					<?php echo(L_REG_50); ?>
				</SPAN>
				<br />
				<br />
				<?php
				}
				?>
<A HREF="<?php echo($ChatPath); ?>edituser.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('edituser'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_4); ?>.'; return true;" title="<?php echo(L_REG_4); ?>"><?php echo(L_REG_4); ?></A>
				<?php
				if (C_SHOW_DEL_PROF != 0)
				{
					?>
					| <A HREF="<?php echo($ChatPath); ?>deluser.php?L=<?php echo($L); ?>" CLASS="ChatReg" onClick="reg_popup('deluser'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_5); ?>.'; return true;" title="<?php echo(L_REG_5); ?>"><?php echo(L_REG_5); ?></A>
					<?php
				}
				if (C_SHOW_ADMIN != 0)
				{
					?>
					| <A HREF="<?php echo($ChatPath); ?>admin.php?L=<?php echo($L); ?>&Link=1" CLASS="ChatReg" onClick="reg_popup('admin'); return false" TARGET="_blank" onMouseOver="window.status='<?php echo(L_REG_35); ?>.'; return true;" title="<?php echo(L_REG_35); ?>"><?php echo(L_REG_35); ?></A>
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
						if($R != "") $PrevRoom = urldecode($R);
						$DefaultRoomsString = "";
						for($i = 0; $i < count($DefaultChatRooms); $i++)
						{
							$tmpRoom = stripslashes($DefaultChatRooms[$i]);
							$DefaultRoomsString .= ($DefaultRoomsString == "" ? "" : ",").$tmpRoom;
							echo("<OPTION VALUE=\"".htmlspecialchars($tmpRoom)."\"");
							if(strcasecmp($tmpRoom, $PrevRoom) == 0)
							{
								echo(" SELECTED");
								$DefaultRoomFound = 1;
							}
							echo(">".$tmpRoom."</OPTION>");
						}
						?>
					</SELECT>
				</TD>
			</TR>
			<?php
		}
		if (C_VERSION == 2)
		{
			?>
			<TR CLASS="ChatCell">
				<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP"><?php echo(L_SET_8); ?> :</TD>
				<TD VALIGN="TOP" CLASS="ChatCell">
					<SELECT NAME="R1" CLASS="ChatBox" onChange="reset_R1();">
						<OPTION VALUE=""><?php echo(L_SET_7); ?></OPTION>
						<?php
						// Display other public rooms in the drop down list
						$DbLink->query("SELECT DISTINCT room FROM ".C_MSG_TBL." WHERE type = 1 AND room != 'Offline PMs' AND room != '*' AND username NOT LIKE 'SYS %' ORDER BY room");
						while(list($Room) = $DbLink->next_record())
						{
							if (!room_in($Room, $DefaultRoomsString))
							{
								echo("<OPTION VALUE=\"".htmlspecialchars($Room)."\"");
								if(strcasecmp($Room, $PrevRoom) == 0 && !$DefaultRoomFound)
								{
									echo(" SELECTED");
									$DefaultRoomFound = 1;
								}
								echo(">${Room}</OPTION>");
							}
						}
						$DbLink->clean_results();
						?>
					</SELECT>
				</TD>
			</TR>
			<?php
		}
		if (C_VERSION > 0 && C_SHOW_PRIV)
		{
			$DefaultPrivateRoomFound = 0;
			if($R != "") $PrevPrivateRoom = urldecode($R);
			$DbLink->query("SELECT perms,rooms FROM ".C_REG_TBL." WHERE username='$U' LIMIT 1");
			if ($DbLink->num_rows() != 0) $reguser = ($DbLink->num_rows() != 0);
			else $nonreguser = 1;
			if ($reguser) list($perms,$rooms) = $DbLink->next_record();
			$DbLink->clean_results();
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
						$PrevPrivateRoom = "";
						$DefaultPrivateRoomsString = "";
							for($i = 0; $i < count($DefaultPrivateRooms); $i++)
						{
							$tmpPrivateRoom = stripslashes($DefaultPrivateRooms[$i]);
							$DefaultPrivateRoomsString .= ($DefaultPrivateRoomsString == "" ? "" : ",").$tmpPrivateRoom;
							echo("<OPTION VALUE=\"".htmlspecialchars($tmpPrivateRoom)."\"");
							if(strcasecmp($tmpPrivateRoom, $PrevPrivateRoom) == 0)
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
							if(strcasecmp(ROOM8, $PrevPrivateRoom) == 0)
							{
								echo(" SELECTED");
								$DefaultPrivateRoomFound = 1;
							}
							echo(">".ROOM8."</OPTION>");
							echo("<OPTION VALUE=\"".htmlspecialchars(ROOM9)."\"");
							if(strcasecmp(ROOM8, $PrevPrivateRoom) == 0)
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
		if (C_VERSION == 2)
		{
			?>
			<TR CLASS="ChatCell">
				<TD ALIGN="<?php echo($CellAlign); ?>" VALIGN="TOP" CLASS="ChatCell" NOWRAP="NOWRAP">
					<?php echo(L_SET_9." "); ?>
					<SELECT NAME="T" CLASS="ChatBox">
<?php
if((!$T && !$DefaultRoomFound) || (!$T && !$DefaultPrivateRoomFound)) $T = 1;
?>
						<OPTION VALUE="1" <?php if($T && !$DefaultPrivateRoomFound) echo("SELECTED"); ?> <?php if(!$T && $DefaultPrivateRoomFound) echo("DISABLED"); ?>><?php echo(L_SET_10); ?></OPTION>
						<OPTION VALUE="0" <?php if((!$T && !$DefaultRoomFound) || ($T && $DefaultPrivateRoomFound)) echo("SELECTED"); ?>><?php echo(L_SET_11); ?></OPTION>
					</SELECT>
					<?php echo(" ".L_SET_12." :"); ?>
				</TD>
				<TD VALIGN="TOP" CLASS="ChatCell">
					<INPUT TYPE="text" NAME="R3" SIZE=11 MAXLENGTH=14 <?php if(!$DefaultRoomFound && !$DefaultPrivateRoomFound && $R != "") echo("VALUE=\"".htmlspecialchars(urldecode($R))."\""); ?> CLASS="ChatBox" onChange="reset_R3();">
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
		<br /><?php echo(L_SET_18); ?><br />
		<P CLASS="ChatP2">
<?php
if (C_REQUIRE_REGISTER)
{
?>
		<div CLASS="ChatError"><?php echo(L_ERR_USR_14); ?></div>
<?php
}
?>
		<?php echo(L_SET_13." "); ?>
		<INPUT TYPE="submit" VALUE="<?php echo(L_SET_14); ?>" CLASS="ChatBox"> ...
		</P>
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
if (SET_CMDS) echo(INFO_CMDS."<br />");
if (SET_MODS) echo(INFO_MODS."<br />");
if (SET_BOT && C_BOT_CONTROL)
{
		$DbLink->query("SELECT Count(*) FROM ".C_USR_TBL." WHERE username='".C_BOT_NAME."' LIMIT 1");
		list($botinroom) = $DbLink->next_record();
		$DbLink->clean_results();
		if ($botinroom != 0)
		{
			echo(INFO_BOT."<br />");
		}
}
?>
</FONT>
<?php
}
?>
<P>
<?php
if (C_SHOW_COUNTER)
{
	include_once("./${ChatPath}acounter.php");
    $ani_counter = new acounter();
	echo ($ani_counter->create_output("chat_index"));
	$INSTALL_DATE = strftime(L_SHORT_DATE,strtotime(C_INSTALL_DATE));
?>
<font face=Verdana color=yellow size=1><?php echo (sprintf(L_VISITOR_REPORT,$INSTALL_DATE)) ?>.</font>
<?php
}
?>
</P>
<SPAN CLASS="ChatCopy" dir="LTR">
&copy; 2000-<?php echo(date(Y))?> <a HREF="http://phpmychat.sourceforge.net/" TARGET=_blank CLASS="ChatLink" Title="<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_7)); ?>.'; return true">The phpHeaven Team</a><br />
&copy; 2005-<?php echo(date(Y))?> Plus development by <a href="mailto:ciprianmp@yahoo.com?subject=phpMychat%20Plus%20feedback" Title="<?php echo(sprintf(L_CLICK,L_LINKS_9)); ?>" CLASS="ChatLink" onMouseOver="window.status='<?php echo(($L!="turkish") ? sprintf(L_CLICKS,L_LINKS_6,L_DEVELOPER) : sprintf(L_CLICKS,L_DEVELOPER,L_LINKS_6)); ?>.'; return true;">Ciprian M</a>.<br />
Thanks to all the contributors in the <a href="http://groups.yahoo.com/subscribe/phpmychat" CLASS="ChatLink" title="<?php echo(sprintf(L_CLICK,L_LINKS_8)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_8)); ?>.'; return true;" target=_blank>phpMyChat group</a> !<br />
Download this full chat pack from <a href="https://sourceforge.net/project/showfiles.php?group_id=19371&package_id=199435" target=_blank title="<?php echo(sprintf(L_CLICK,L_LINKS_10)); ?>" onMouseOver="window.status='<?php echo(sprintf(L_CLICK,L_LINKS_10)); ?>.'; return true;" CLASS="ChatLink">here</a>
</SPAN>
<?php
if (C_SHOW_OWNER)
{
?>
<br /><SPAN CLASS="ChatCopy" dir="LTR">
Owner of this chat server -
<?php
include_once("./admin/mail4admin.lib.php");
if ($Sender_email)
{
?>
<a href=mailto:<?php echo($Sender_email) ?> CLASS="ChatLink" Title="<?php echo(($L!="turkish") ? sprintf(L_CLICKS,L_LINKS_6,L_OWNER) : sprintf(L_CLICKS,L_OWNER,L_LINKS_6)); ?>" onMouseOver="window.status='<?php echo(($L!="turkish") ? sprintf(L_CLICKS,L_LINKS_6,L_OWNER) : sprintf(L_CLICKS,L_OWNER,L_LINKS_6)); ?>.'; return true"><?php echo(C_ADMIN_NAME) ?></A>
<?php
}
else echo(C_ADMIN_NAME);
?>
</SPAN>
<?php
}
if (!C_SUPPORT_PAID)
{
if (file_exists("${ChatPath}localization/".$L."/images/paypal_donate.gif")) $donation = "${ChatPath}localization/".$L."/images/paypal_donate.gif";
else $donation = "./localization/english/images/paypal_donate.gif";
?>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" name="support" target="_blank">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="image" src=<?php echo($donation); ?> border="0" name="submit" alt="Support with PayPal the development of phpMyChat Plus - it's fast, free and secure! And we'll be grateful to you!" title="Support with PayPal the development of phpMyChat Plus - it's fast, free and secure! And we'll be grateful to you!">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----MIIH4QYJKoZIhvcNAQcEoIIH0jCCB84CAQExggEwMIIBLAIBADCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwDQYJKoZIhvcNAQEBBQAEgYAQ7MmCqtJ2jbW1SVNyQql6hnYQe54kRLuNlg3RYwOAA3gHBkHmLlT+BAcwimM4JNiDziGCjYjxa6/UTKaszeFZKiAVgEZHQ3FejZzBaNLsmHOHz7aGPc2o/u6wTcj/HXJOoiHhMqLSHUPvqWHOBGvLfbx5UE5MtEfIC7WUbAh5XTELMAkGBSsOAwIaBQAwggFdBgkqhkiG9w0BBwEwFAYIKoZIhvcNAwcECHYNINp0Ot9hgIIBOBdAga5niXUVvGTkjWkYdkP9hqj6miA3aYXWJBPrkcJoVQ2TCPp39rOO8z4HysTfp0zucmumyY6lSApo7cV14Y1qTfXNv304blgpq12LJ6yQvTNlQzss4Ov6EUIc5MkYAwnvb17UdkKnUxjkdmIIxdh2xtusrZTR87Ausclsh2Eq8UWVnkLkapS3cNtIXM1jY+UR5KStGZJ3wbQxso2SeIB7GS8H/wI+u9h4S4j4tvPfGbrogh1AO+jXVC07VQwikCl09to3tVt1lRtmwDpzDoIXhuNPJ0U/w/G6kwSAEcNbz0AHV2WECZtu0ONv6lJAtaWACTBjRuuPiAulpH+D3+3L7cZslL23xt3EcWsEjXR8Bop1vrW9DSNrQVilrmYCGPrT/Omd2PRiMh7aQz7nDAMWTbHoXpzHkaCCA4cwggODMIIC7KADAgECAgEAMA0GCSqGSIb3DQEBBQUAMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTAeFw0wNDAyMTMxMDEzMTVaFw0zNTAyMTMxMDEzMTVaMIGOMQswCQYDVQQGEwJVUzELMAkGA1UECBMCQ0ExFjAUBgNVBAcTDU1vdW50YWluIFZpZXcxFDASBgNVBAoTC1BheVBhbCBJbmMuMRMwEQYDVQQLFApsaXZlX2NlcnRzMREwDwYDVQQDFAhsaXZlX2FwaTEcMBoGCSqGSIb3DQEJARYNcmVAcGF5cGFsLmNvbTCBnzANBgkqhkiG9w0BAQEFAAOBjQAwgYkCgYEAwUdO3fxEzEtcnI7ZKZL412XvZPugoni7i7D7prCe0AtaHTc97CYgm7NsAtJyxNLixmhLV8pyIEaiHXWAh8fPKW+R017+EmXrr9EaquPmsVvTywAAE1PMNOKqo2kl4Gxiz9zZqIajOm1fZGWcGS0f5JQ2kBqNbvbg2/Za+GJ/qwUCAwEAAaOB7jCB6zAdBgNVHQ4EFgQUlp98u8ZvF71ZP1LXChvsENZklGswgbsGA1UdIwSBszCBsIAUlp98u8ZvF71ZP1LXChvsENZklGuhgZSkgZEwgY4xCzAJBgNVBAYTAlVTMQswCQYDVQQIEwJDQTEWMBQGA1UEBxMNTW91bnRhaW4gVmlldzEUMBIGA1UEChMLUGF5UGFsIEluYy4xEzARBgNVBAsUCmxpdmVfY2VydHMxETAPBgNVBAMUCGxpdmVfYXBpMRwwGgYJKoZIhvcNAQkBFg1yZUBwYXlwYWwuY29tggEAMAwGA1UdEwQFMAMBAf8wDQYJKoZIhvcNAQEFBQADgYEAgV86VpqAWuXvX6Oro4qJ1tYVIT5DgWpE692Ag422H7yRIr/9j/iKG4Thia/Oflx4TdL+IFJBAyPK9v6zZNZtBgPBynXb048hsP16l2vi0k5Q2JKiPDsEfBhGI+HnxLXEaUWAcVfCsQFvd2A1sxRr67ip5y2wwBelUecP3AjJ+YcxggGaMIIBlgIBATCBlDCBjjELMAkGA1UEBhMCVVMxCzAJBgNVBAgTAkNBMRYwFAYDVQQHEw1Nb3VudGFpbiBWaWV3MRQwEgYDVQQKEwtQYXlQYWwgSW5jLjETMBEGA1UECxQKbGl2ZV9jZXJ0czERMA8GA1UEAxQIbGl2ZV9hcGkxHDAaBgkqhkiG9w0BCQEWDXJlQHBheXBhbC5jb20CAQAwCQYFKw4DAhoFAKBdMBgGCSqGSIb3DQEJAzELBgkqhkiG9w0BBwEwHAYJKoZIhvcNAQkFMQ8XDTA3MTAxODIyNDY1NVowIwYJKoZIhvcNAQkEMRYEFJtoUgLQWY33fDqJHjZlhIxRlDmLMA0GCSqGSIb3DQEBAQUABIGAQguDdGCCcdCYQA+l9M28AB5SlhXbRFyWitkd0hK6/yQ7zWXW6V6mnZvadx/HUEVLnP/K3WU05sydqheujEdkzCLvwE5jr9nP4dOlxsv77eFI1yhW3gCiad474xX99BgMgnpXGVSRD+Psr7sU05BWOYoYf3raMiztZAevSvgyGCU=-----END PKCS7-----
">
</form>
<?php
}
?>
</TD>
</TR>
</TABLE>
<table align="center"><tr>
<?php require("./${ChatPath}search.php"); echo($search); ?>
</tr></table>
</CENTER>
<?php
} // end of the layout function
?>