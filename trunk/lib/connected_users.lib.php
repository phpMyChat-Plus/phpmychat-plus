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
#if (ereg("SELECT|UNION|INSERT|UPDATE",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge
if (preg_match("/SELECT|UNION|INSERT|UPDATE/i",$_SERVER["QUERY_STRING"])) exit();  //added by Bob Dickow for extra security NB Kludge

// Sort order by Ciprian
if (!isset($sort_order)) $sort_order = isset($_COOKIE["CookieUserSort"]) ? $_COOKIE["CookieUserSort"] : C_USERS_SORT_ORD;
if ($sort_order) $ordquery = "u.username";
else $ordquery = "u.r_time";

require("./${ChatPath}/lib/database/".C_DB_TYPE.".lib.php");
require("./${ChatPath}/lib/clean.lib.php");

	$Hide = "";
	if (C_SPECIAL_GHOSTS != "")
	{
		$sghosts = "";
		$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
	}
	if ($ShowPrivate)
	{
		// Ghost Control mod by Ciprian
		if ($status != "a" && $status != "t")
		{
			if (C_HIDE_ADMINS) $Hide .= ($Hide == "") ? " WHERE (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'" : " AND (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'";
			if (C_HIDE_MODERS) $Hide .= ($Hide == "") ? " WHERE u.status != 'm'" : " AND u.status != 'm'";
			if (C_SPECIAL_GHOSTS != "")
			{
				$sghosts = str_replace("username","u.username",C_SPECIAL_GHOSTS);
				$Hide .= ($Hide == "") ? " WHERE u.username != ".$sghosts."" : " AND u.username != ".$sghosts."";
			}
		}
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.ip, u.country_code, u.country_name FROM ".C_USR_TBL." u".$Hide." ORDER BY ".$ordquery."";
	}
	else
	{
		// Ghost Control mod by Ciprian
		if ($status != "a" && $status != "t")
		{
			if (C_HIDE_ADMINS) $Hide .= " AND (u.status != 'a' OR u.username = '".C_BOT_NAME."') AND u.status != 't'";
			if (C_HIDE_MODERS) $Hide .=  " AND u.status != 'm'";
			if (C_SPECIAL_GHOSTS != "")
			{
				$sghosts = str_replace("username","u.username",C_SPECIAL_GHOSTS);
				$Hide .= " AND u.username != ".$sghosts."";
			}
		}
		$query = "SELECT DISTINCT u.username, u.latin1, u.room, u.r_time, u.status, u.ip, u.country_code, u.country_name  FROM ".C_USR_TBL." u, ".C_MSG_TBL." m WHERE u.room = m.room AND m.type = 1".$Hide." ORDER BY ".$ordquery."";
	}
	$DbLink = new DB;
	$DbLink->query($query);
	$NbUsers = $DbLink->num_rows();

function display_connected($Private,$Full,$NU,$String1,$String2,$DbLink,$Charset)
{
	global $L;
	$List = "";
	global $DefaultDispChatRooms, $res_init, $disp_note, $status;
	if ($NU > 0)
	{
		echo($String1);
		if ($Full)
		{
			// GeoIP mode for country flags
			if(C_USE_FLAGS && ($status == "a" || $status == "t" || $status == "m" || C_SHOW_FLAGS))
			{
				if (!class_exists("GeoIP")) include("plugins/countryflags/geoip.inc");
				if(!isset($gi)) $gi = geoip_open("plugins/countryflags/GeoIP.dat",GEOIP_STANDARD);
			}
			// Restricted rooms mod by Ciprian
			while(list($User,$Latin1,$Room,$RTime,$StatusU,$IP,$COUNTRY_CODE,$COUNTRY_NAME) = $DbLink->next_record())
			{
				if (is_array($DefaultDispChatRooms) && in_array($Room." [R]",$DefaultDispChatRooms))
				{
					$Room .= " [".$res_init."]";
					$disp_note = 1;
				}
				if ($Latin1) $User = htmlentities($User);
				if($status == "a" || $status == "t")
				{
					$ghost = 0;
					$superghost = 0;
					$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
					$sghosts = str_replace(" AND username != ",",",$sghosts);
					if (($sghosts != "" && ghosts_in($User, $sghosts, $Charset)) || (C_HIDE_MODERS && $StatusU == "m") || (C_HIDE_ADMINS && ($StatusU == "a" || $StatusU == "t")))
					{
						if ($StatusU == "a" || $StatusU == "t") $superghost = 1;
						else $ghost = 1;
					}
				}
				$user_not = $User;
				$User = user_status($User,$StatusU,$ghost,$superghost,$status);
				$RTime = strftime(L_SHORT_DATETIME, $RTime + C_TMZ_OFFSET*60*60);
				if(stristr(PHP_OS,'win') && (strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese"))) $RTime = str_replace(" ","",$RTime);

				// GeoIP mode for country flags
				$show_ip = "";
				if(C_USE_FLAGS && ($status == "a" || $status == "t" || $status == "m" || C_SHOW_FLAGS) && $user_not != C_BOT_NAME)
				{
					if(!isset($COUNTRY_CODE) || $COUNTRY_CODE == "")
					{
						$COUNTRY_CODE = geoip_country_code_by_addr($gi, ltrim($IP,"p"));
						// GeoIP mode for country flags
						if (empty($COUNTRY_CODE))
						{
							$COUNTRY_CODE = "LAN";
							$COUNTRY_NAME = "Other/LAN";
						}
						if ($COUNTRY_CODE != "LAN") $COUNTRY_NAME = $gi->GEOIP_COUNTRY_NAMES[$gi->GEOIP_COUNTRY_CODE_TO_NUMBER[$COUNTRY_CODE]];
						if ($PROXY || substr($IP, 0, 1) == "p") $COUNTRY_NAME .= " (Proxy Server)";
					}
					$c_flag = "&nbsp;<img src=\"./plugins/countryflags/flags/".strtolower($COUNTRY_CODE).".gif\" alt=\"".$COUNTRY_NAME."\" title=\"".$COUNTRY_NAME."\" border=\"0\">&nbsp;(".$COUNTRY_CODE.")";
					if($status == "a" || $status == "t") $show_ip = "</td><td nowrap=\"nowrap\">".$IP.$c_flag;
					elseif(C_SHOW_FLAGS || $status == "m") $show_ip = "</td><td nowrap=\"nowrap\">".$c_flag;
				}
				$List .= "<tr><td nowrap=\"nowrap\">".$User."</td><td nowrap=\"nowrap\">".$Room."</td><td nowrap=\"nowrap\">".L_LURKING_4." ".$RTime.$show_ip;
				// GeoIP Country flags initialization
				unset($User);
				unset($Room);
				unset($RTime);
				unset($IP);
				unset($COUNTRY_CODE);
				unset($COUNTRY_NAME);
				unset($c_flag);
			}
			echo($List);
			// GeoIP mode for country flags
#			if(isset($gi) && $gi != "") geoip_close($gi);
#			if(isset($gi6) && $gi6 != "") geoip_close($gi6);
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