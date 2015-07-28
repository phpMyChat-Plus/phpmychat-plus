<?php

//-------------------------------------------------------------
//  user-online 1.1 || http://www.phpwelt.de
//  Copyright (C) 2000 Mike Rübsamen <mtr@phpwelt.de>
//  This Software is distributed under the GNU General Public
//  License.
//--------------------------------------------------------------

//Please change the path of the include file, if necessary
include("config/config.lib.php");

//DO NOT CHANGE ANYTHING BELOW!!!

//Declaration of Parameters
require("./lib/get_IP.lib.php");		// Set the $IP var
#$ip = getenv('REMOTE_ADDR');
$browser = getenv('HTTP_USER_AGENT');

//Timeout to delete Lurkers in Seconds after they left the page
$timeout = 15;

//Database-Connect
$handler = @mysql_connect(C_DB_HOST,C_DB_USER,C_DB_PASS);
@@mysql_query("SET CHARACTER SET utf8");
@mysql_query("SET NAMES 'utf8'"); 
@mysql_select_db(C_DB_NAME,$handler);

// Ghost Control mod by Ciprian
$Hide1 = "";
if ($status != "a" && $status != "t")
{
	if (C_HIDE_ADMINS) $Hide1 .= ($Hide1 == "") ? " WHERE status != 'a' AND status != 't'" : " AND status != 'a' AND status != 't'";
	if (C_HIDE_MODERS) $Hide1 .= ($Hide1 == "") ? " WHERE status != 'm'" : " AND status != 'm'";
	if (C_SPECIAL_GHOSTS != "") $Hide1 .= ($Hide1 == "") ?  " WHERE username != ".C_SPECIAL_GHOSTS."" : " AND username != ".C_SPECIAL_GHOSTS."";
}

//Database-Commands
$check = @mysql_query("SELECT DISTINCT username,ip,browser FROM ".C_LRK_TBL." WHERE username='$U'",$handler);
if (@mysql_numrows($check) > 0)
{
	$update = @mysql_query("UPDATE ".C_LRK_TBL." SET time='".time()."',country_code='$COUNTRY_CODE',country_name='$COUNTRY_NAME' WHERE username='$U' AND ip='$IP' AND browser='$browser'",$handler);
}
else
{
	$insert = @mysql_query("INSERT INTO ".C_LRK_TBL." VALUES ('".time()."','$IP','$browser','$file','$U','$status','$COUNTRY_CODE','$COUNTRY_NAME')",$handler);
}
$delete = @mysql_query("DELETE FROM ".C_LRK_TBL." WHERE time<='".(time() - $timeout)."'",$handler);
$result = @mysql_query("SELECT DISTINCT ip,browser,username,status,country_code,country_name FROM ".C_LRK_TBL.$Hide1." ORDER BY username ASC",$handler);
$online_users = @mysql_numrows($result);
@mysql_close();

?>
<hr /><table border=1 cellspacing=1 cellpadding=1 class=table><tr>
	<td><?php echo(L_CUR_5)?></td>
	<td align="center" style="vertical-align:middle">
	<font size="4" color="#6666ff"><b>&nbsp;<?php echo($online_users); ?>&nbsp;</font></b></td>
</tr></table>
<?php
if ($online_users && ($status == "a" || $status == "t"))
{
?>
<table border=1 width=98% cellspacing=0 cellpadding=1 class="table">
<?php
// GeoIP mode for country flags
$c_flag = "";
if(C_USE_FLAGS && ($status == "a" || $status == "t" || $status == "m" || C_SHOW_FLAGS))
{
	if (!class_exists("GeoIP")) include("plugins/countryflags/geoip.inc");
	if(!isset($gi)) $gi = geoip_open("plugins/countryflags/GeoIP.dat",GEOIP_STANDARD);
}
while($data = @mysql_fetch_array($result))
{
	$COUNTRY_CODE = $data[country_code];
	$COUNTRY_NAME = $data[country_name];
	if(C_USE_FLAGS && ($status == "a" || $status == "t" || $status == "m" || C_SHOW_FLAGS))
	{
		// GeoIP mode for country flags
		if(!isset($COUNTRY_CODE) || $COUNTRY_CODE == "")
		{
			$COUNTRY_CODE = geoip_country_code_by_addr($gi, ltrim($data[ip],"p"));
			if (empty($COUNTRY_CODE))
			{
				$COUNTRY_CODE = "LAN";
				$COUNTRY_NAME = "Other/LAN";
			}
			if ($COUNTRY_CODE != "LAN") $COUNTRY_NAME = $gi->GEOIP_COUNTRY_NAMES[$gi->GEOIP_COUNTRY_CODE_TO_NUMBER[$COUNTRY_CODE]];
			if ($PROXY || substr($data[ip], 0, 1) == "p") $COUNTRY_NAME .= " (Proxy Server)";
		}
		$c_flag = "&nbsp;<img src=\"./plugins/countryflags/flags/".strtolower($COUNTRY_CODE).".gif\" alt=\"".$COUNTRY_NAME."\" title=\"".$COUNTRY_NAME."\" border=\"0\">&nbsp;(".$COUNTRY_CODE.")";
	}
	if ($data[username] == "Guest") $data[username] = L_LURKING_5;
	if($status == "a" || $status == "t")
	{
		if (C_SPECIAL_GHOSTS != "")
		{
			$sghosts = "";
			$sghosts = str_replace("'","",C_SPECIAL_GHOSTS);
			$sghosts = str_replace(" AND username != ",",",$sghosts);
		}
		$ghost = 0;
		$superghost = 0;
		if (($sghosts != "" && ghosts_in($data[username], $sghosts, $Charset)) || (C_HIDE_MODERS && $data[status] == "m") || (C_HIDE_ADMINS && ($data[status] == "a" || $data[status] == "t")))
		{
			if ($data[status] == "a" || $data[status] == "t") $superghost = 1;
			else $ghost = 1;
		}
	}
	$User = user_status($data[username],$data[status],$ghost,$superghost,$status);
	echo("<tr><td>".$User."</td>");
	echo("<td nowrap=\"nowrap\">".$data[ip].$c_flag."</td>");
	echo("<td width=\"100%\">".$data[browser]."</td></tr>");
	// GeoIP Country flags initialization
	unset($User);
	unset($data[ip]);
	unset($data[country_code]);
	unset($data[country_name]);
	unset($c_flag);
}
// GeoIP mode for country flags
#if(isset($gi) && $gi != "") geoip_close($gi);
#if(isset($gi6) && $gi6 != "") geoip_close($gi6);
?>
</table>
<?php
}
?>
