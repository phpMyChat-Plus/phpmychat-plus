<?php
// Get the names and values for vars sent to this script
if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

// Fix some security holes
if (!isset($ChatPath)) $ChatPath = "";
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();
if (isset($L) && !is_dir("./${ChatPath}localization/".$L)) exit();
if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Sort order by Ciprian
if (!isset($sort_order)) $sort_order = isset($_COOKIE["CookieUserSort"]) ? $_COOKIE["CookieUserSort"] : C_USERS_SORT_ORD;
if ($sort_order) $ordquery = "u.username";
else $ordquery = "u.r_time";

require("./${ChatPath}/lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}/lib/clean.lib.php");

	if ($ShowPrivate)
	{
		// Ghost Control mod by Ciprian
		$Hide = "";
		if (C_HIDE_ADMINS) $Hide .= ($Hide == "") ? " WHERE (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'" : " AND (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'";
		if (C_HIDE_MODERS) $Hide .= ($Hide == "") ? " WHERE u.status != 'm'" : " AND u.status != 'm'";
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = str_replace("username","u.username",C_SPECIAL_GHOSTS);
			$Hide .= ($Hide == "") ? " WHERE u.username != ".$sghosts."" : " AND u.username != ".$sghosts."";
		}
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time FROM ".C_USR_TBL." u ".$Hide." ORDER BY ".$ordquery."";
	}
	else
	{
		// Ghost Control mod by Ciprian
		$Hide = "";
		if (C_HIDE_ADMINS) $Hide .= " AND (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'";
		if (C_HIDE_MODERS) $Hide .=  " AND u.status != 'm'";
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = str_replace("username","u.username",C_SPECIAL_GHOSTS);
			$Hide .= " AND u.username != ".$sghosts."";
		}
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.status FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1 ".$Hide." ORDER BY ".$ordquery."";
	}
	$DbLink = new DB;
	$DbLink->query($query);
	$NbUsers = $DbLink->num_rows();

function display_connected($Private,$Full,$NU,$String1,$String2,$DbLink,$Charset)
{
	$List = "";
	global $DefaultDispChatRooms, $res_init, $disp_note;
	if ($NU > 0)
	{
		if ($Full)
		{
			echo($String1);
			// Restricted rooms mod by Ciprian
			while(list($User,$Latin1,$Room,$RTime,$Status) = $DbLink->next_record())
			{
				if (is_array($DefaultDispChatRooms) && in_array($Room." [R]",$DefaultDispChatRooms))
				{
					$Room .= " [".$res_init."]";
					$disp_note = 1;
				}
				if ($Latin1) $User = htmlentities($User);
				$User = user_status($User,$Status);
				$RTime = $RTime + C_TMZ_OFFSET*60*60;
				$List .= "<tr><td nowrap=\"nowrap\">".$User."</td><td nowrap=\"nowrap\">".$Room."</td><td nowrap=\"nowrap\">".L_LURKING_4." ".strftime(L_SHORT_DATETIME, $RTime)."";
			}
			echo($List);
		}
		else
		{
			echo($String1);
		}
	}
	else
	{
		echo($String2);
	}

	$DbLink->clean_results();
	$DbLink->close();
}
?>