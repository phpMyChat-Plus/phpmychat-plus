<?php

/******************************************************************************
*                                                                             *
* This library will try to get the most probable IP address of an user. It is *
*   based on a the free of use 'identifier' script written by Marc Meurrens   *
*                          (http://www.cgsa.net/php)                          *
*                                                                             *
******************************************************************************/

// Get some headers that may contain the IP address
#$SimpleIP = (isset($REMOTE_ADDR) ? $REMOTE_ADDR : getenv("REMOTE_ADDR"));
$SimpleIP = (isset($REMOTE_ADDR) ? $REMOTE_ADDR : $_SERVER['REMOTE_ADDR']);

$TrueIP = (isset($HTTP_X_FORWARDED_FOR) ? $HTTP_X_FORWARDED_FOR : getenv("HTTP_X_FORWARDED_FOR"));
if ($TrueIP == "") $TrueIP = (isset($HTTP_X_FORWARDED) ? $HTTP_X_FORWARDED : getenv("HTTP_X_FORWARDED"));
if ($TrueIP == "") $TrueIP = (isset($HTTP_FORWARDED_FOR) ? $HTTP_FORWARDED_FOR : getenv("HTTP_FORWARDED_FOR"));
if ($TrueIP == "") $TrueIP = (isset($HTTP_FORWARDED) ? $HTTP_FORWARDED : getenv("HTTP_FORWARDED"));
$GetProxy = ($TrueIP == "" ? "0" : "1");

if ($GetProxy == "0")
{
	$TrueIP = (isset($HTTP_VIA) ? $HTTP_VIA : getenv("HTTP_VIA"));
	if ($TrueIP == "") $TrueIP = (isset($HTTP_X_COMING_FROM) ? $HTTP_X_COMING_FROM : getenv("HTTP_X_COMING_FROM"));
	if ($TrueIP == "") $TrueIP = (isset($HTTP_COMING_FROM) ? $HTTP_COMING_FROM : getenv("HTTP_COMING_FROM"));
	if ($TrueIP != "") $GetProxy = "2";
};

if ($TrueIP == $SimpleIP) $GetProxy = "0";
$PROXY = false;

// Return the true IP if found, else the proxy IP with a 'p' at the begining
switch ($GetProxy)
{
	case '0':
		// True IP without proxy
		$IP = $SimpleIP;
		break;
	case '1':
#		$b = preg_match("/^([0-9]{1,3}\.){3,3}[0-9]{1,3}/", $TrueIP, $IP_array);
/*		if ($b && (count($IP_array)>0))
		{
			// True IP behind a proxy
			$IP = $IP_array[0];
		}
		else
		{
			// Proxy IP
			$IP = "p".$SimpleIP;
			$PROXY = true;
		};
*/		break;
	case '2':
		// Proxy IP
		$IP = "p".$SimpleIP;
		$PROXY = true;
};

if(!function_exists("validator"))
{
	include("./lib/validator.lib.php");
	$IP_array = validator($GetProxy == "1" ? $TrueIP : $SimpleIP,'ip');
}

if(is_array($IP_array))
{
	// True IP behind a proxy
	if(count($IP_array)>1)
	{
		$IP = $IP_array[0];
	}
	elseif(!in_array("IPv6Loc", $IP_array))
	{
		// Proxy IP
		$IP = "p".$SimpleIP;
		$PROXY = true;
	};

	// GeoIP mode for country flags
	if (!class_exists("GeoIP")) include_once("plugins/countryflags/geoip.inc");
	
	if(in_array("IPv4", $IP_array))
	{
		$gi = geoip_open("plugins/countryflags/GeoIP.dat",GEOIP_STANDARD);
		$COUNTRY_CODE = geoip_country_code_by_addr($gi, ltrim($IP, "p"));
	}
	elseif(in_array("IPv6", $IP_array))
	{
		$gi6 = geoip_open("plugins/countryflags/GeoIPv6.dat",GEOIP_STANDARD);
		$COUNTRY_CODE = geoip_country_code_by_addr_v6($gi6, ltrim($IP, "p"));
	}
}
if (empty($COUNTRY_CODE))
{
	if ($PROXY && !in_array("IPv6Loc", $IP_array)) $COUNTRY_CODE = "A1";
	else
	{
		$COUNTRY_CODE = "LAN";
		$COUNTRY_NAME = "Other/LAN";
	}
}

if ($COUNTRY_CODE != "LAN") $COUNTRY_NAME = $gi->GEOIP_COUNTRY_NAMES[$gi->GEOIP_COUNTRY_CODE_TO_NUMBER[$COUNTRY_CODE]];
if ($PROXY && $COUNTRY_CODE != "A1") $COUNTRY_NAME .= " (Proxy Server)";
//Close GeoIP databases
//if(isset($gi) && $gi != "") geoip_close($gi);
//if(isset($gi6) && $gi6 != "") geoip_close($gi6);
?>