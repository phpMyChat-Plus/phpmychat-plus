<?php
// World time meridians/cities which you want to display in the status bar as reference for your users
// Copyright 2007-2008 - Ciprian Murariu - ciprianmp@yahoo.com

############################################################
##	Usage:														   ##
##	NAME: Meridian time City name - use names shorter than 6 characters (utf-8 chars allowed)	   ##
##	GAP: "0" ("", null), positive or negative [-12 < number < +13] (integers or .5 fractions allowed)	   ##
##	          = timezone off-set = difference between Meridian Local time and UTC (GMT, ZULU) 	   ##
##	DST:  "" (null), "EU", "USA" or "SYD" accepted only 							   ##
##	Put the cities in "gap ascending" order, from -12 to + 13							   ##
##	Note: "UTC" time (Coordinated Universal Time) will be always displayed and is not changeable	   ##
##	          = the UTC (GMT, ZULU)  time and the best reference for users across world		   ##
##	Reference: this script is based on data, facts and figures from http://www.timeanddate.com	   ##
##	                   - look it up it if you want to customize the times below					   ##
############################################################

## Times before GMT (negative GAPS)
// First City / Meridian
define("CITY1_NAME", "NYC"); // New York - EST (USA DST)
define("CITY1_GAP", "-5");
define("CITY1_DST", "USA");

## Times after GMT (null or positive GAPS)
// Second City / Meridian
define("CITY2_NAME", "Lon"); // London - WEDT (EU DST)
define("CITY2_GAP", ""); // or "0"
define("CITY2_DST", "EU");

// Third City / Meridian
define("CITY3_NAME", "Par"); // Paris - CET (EU DST)
define("CITY3_GAP", "1");
define("CITY3_DST", "EU");

// Forth City / Meridian
define("CITY4_NAME", "Buc"); // Bucharest - EET (EU DST)
define("CITY4_GAP", "2");
define("CITY4_DST", "EU");

// Fifth City / Meridian
define("CITY5_NAME", "Tyo"); // Tokyo (no DST)
define("CITY5_GAP", "9");
define("CITY5_DST", "");

// Sixth City / Meridian
define("CITY6_NAME", "Syd"); // Sydney - (EST / AEST DST)
define("CITY6_GAP", "10");
define("CITY6_DST", "SYD");

########################
##	Don't alter the code below!!!	  ##
########################

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

// Returns the days in the status bar
function get_day($time,$plus)
{
	global $L;
		$monday = utf8_substr(L_MON, 0, ($L == 'vietnamese') ? '8' : '3');
		$tuesday = utf8_substr(L_TUE, 0, ($L == 'vietnamese') ? '8' : '3');
		$wednesday = utf8_substr(L_WED, 0, ($L == 'vietnamese') ? '8' : '3');
		$thursday = utf8_substr(L_THU, 0, ($L == 'vietnamese') ? '8' : '3');
		$friday = utf8_substr(L_FRI, 0, ($L == 'vietnamese') ? '8' : '3');
		$saturday = utf8_substr(L_SAT, 0, ($L == 'vietnamese') ? '8' : '3');
		$sunday = utf8_substr(L_SUN, 0, ($L == 'vietnamese') ? '8' : '3');
		$dayN = date("w",$time);
		$day = $dayN + $plus;
		$is_day = "";
		if ($day == 1 || $day == 8) $is_day = $monday;
		if ($day == 2) $is_day = $tuesday;
		if ($day == 3) $is_day = $wednesday;
		if ($day == 4) $is_day = $thursday;
		if ($day == 5) $is_day = $friday;
		if ($day == 6) $is_day = $saturday;
		if ($day == 0 || $day == 7) $is_day = $sunday;
		return $is_day;
}

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
		return $str;
	};
};
if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$Charset,$what)
	{
		if (function_exists('iconv')) $what = iconv($iso, $Charset, $what);
		return $what;
	};
};
// Initialize vars
$dayname = "";
$dayname_plus = "";
$dayname_minus = "";
$dayname_server = "";
// Get daynames set by setlocale
if (eregi("win", PHP_OS))
{
	$dayname = mb_convert_case(utf8_substr(strftime("%a", time() + C_TMZ_OFFSET*60*60), 0, ($L == 'vietnamese') ? '8' : '3'),MB_CASE_TITLE,$Charset);
	$dayname_plus = mb_convert_case(utf8_substr(strftime("%a", time() + 86400 + C_TMZ_OFFSET*60*60), 0, ($L == 'vietnamese') ? '8' : '3'),MB_CASE_TITLE,$Charset);
	$dayname_minus = mb_convert_case(utf8_substr(strftime("%a", time() - 86400 + C_TMZ_OFFSET*60*60), 0, ($L == 'vietnamese') ? '8' : '3'),MB_CASE_TITLE,$Charset);
	$dayname_server = mb_convert_case(utf8_substr(strftime("%a", time() + C_TMZ_OFFSET*60*60), 0, ($L == 'vietnamese') ? '8' : '3'),MB_CASE_TITLE,$Charset);
}
else
{
	$dayname = mb_convert_case(strftime("%a", time() + C_TMZ_OFFSET*60*60),MB_CASE_TITLE,$Charset);
	$dayname_plus = mb_convert_case(strftime("%a", time() + 86400 + C_TMZ_OFFSET*60*60),MB_CASE_TITLE,$Charset);
	$dayname_minus = mb_convert_case(strftime("%a", time() - 86400 + C_TMZ_OFFSET*60*60),MB_CASE_TITLE,$Charset);
	$dayname_server = mb_convert_case(strftime("%a", time() + C_TMZ_OFFSET*60*60),MB_CASE_TITLE,$Charset);
}
if (eregi("win", PHP_OS))
{
// Get daynames set by localization when setlocale fails
	if ($dayname == "") $dayname = mb_convert_case(get_day(time() + C_TMZ_OFFSET*60*60,0),MB_CASE_TITLE,$Charset);
// Convert daynames set by setlocale
	else $dayname = utf_conv(WIN_DEFAULT,$Charset,$dayname);
	if ($dayname_plus == "") $dayname_plus = mb_convert_case(get_day(time() + C_TMZ_OFFSET*60*60,1),MB_CASE_TITLE,$Charset);
	else $dayname_plus = utf_conv(WIN_DEFAULT,$Charset,$dayname_plus);
	if ($dayname_minus == "") $dayname_minus = mb_convert_case(get_day(time() + C_TMZ_OFFSET*60*60,-1),MB_CASE_TITLE,$Charset);
	else $dayname_minus = utf_conv(WIN_DEFAULT,$Charset,$dayname_minus);
	if ($dayname_server == "") $dayname_server = mb_convert_case(get_day(time() + C_TMZ_OFFSET*60*60,0),MB_CASE_TITLE,$Charset);
	else $dayname_server = utf_conv(WIN_DEFAULT,$Charset,$dayname_server);
}
?>

// Returns the day names
function get_day_strf(plus)
{
	is_day = "";
	if (plus == "0") is_day = " <?php echo($dayname);?>";
	else if (plus == "1") is_day = " <?php echo($dayname_plus);?>";
	else if (plus == "-1") is_day = " <?php echo($dayname_minus);?>";
	else if (plus == "2") is_day = " <?php echo($dayname_server);?>";
	return is_day;
};


// Calculates the European Union Daylight savings from 2009 to 2018
function timedst_eu()
{
	timedsteu = 0;
	timenow = <?php echo(time()); ?>;
	if ((timenow > 1238288400 && timenow < 1256432399) || (timenow > 1269997200 && timenow < 1288486799) || (timenow > 1301187600 && timenow < 1319936399) || (timenow > 1332637200 && timenow < 1351385999) || (timenow > 1364691600 && timenow < 1382835599) || (timenow > 1396141200 && timenow < 1414285199) || (timenow > 1427590800 && timenow < 1445734799) || (timenow > 1459040400 && timenow < 1477789199) || (timenow > 1490490000 && timenow < 1509238799) || (timenow > 1521939600 && timenow < 1540688399)) timedsteu = 1;
	return timedsteu;
};

// Calculates the US Daylight savings from 2009 to 2015
function timedst_usa()
{
	timedstusa = 0;
	timenow = <?php echo(time()); ?>;
	if ((timenow > 1236477600 && timenow < 1257040799) || (timenow > 1268532000 && timenow < 1289095199) || (timenow > 1299981600 && timenow < 1320544799) || (timenow > 1331431200 && timenow < 1351994399) || (timenow > 1362880800 && timenow < 1383443999) || (timenow > 1394330400 && timenow < 1414893599) || (timenow > 1425780000 && timenow < 1446343199)) timedstusa = 1;
	return timedstusa;
};

// Calculates the Sydney Daylight savings from 2008 to 2017
function timedst_syd()
{
	timedstsyd = 0;
	timenow = <?php echo(time()); ?>;
	if ((timenow > 1224986400 && timenow < 1238295599) || (timenow > 1256436000 && timenow < 1269745199) || (timenow > 1288490400 && timenow < 1301194799) || (timenow > 1319940000 && timenow < 1332644399) || (timenow > 1351389600 && timenow < 1364698799) || (timenow > 1382839200 && timenow < 1396148399) || (timenow > 1414288800 && timenow < 1427597999) || (timenow > 1445738400 && timenow < 1459047599) || (timenow > 1477792800 && timenow < 1490497199)) timedstsyd = 1;
	return timedstsyd;
};

// Parse the meridian data
function meridian_time(city_name,city_gap,city_dst)
{
	cur_date = new Date();
	calc_date = new Date(cur_date - gap);
	calc_gap = 0 - calc_date.getTimezoneOffset()/60;
	if (city_dst != "")
	{
		if (city_dst == "EU") cur_hoursdst = cur_hoursGMT_DST_EU;
		else if (city_dst == "USA") cur_hoursdst = cur_hoursGMT_DST_USA;
		else if (city_dst == "SYD") cur_hoursdst = cur_hoursGMT_DST_SYD;
	}
	else cur_hoursdst = cur_hoursGMT;
	cur_hours = cur_hoursdst + Math.floor(city_gap);
	cur_minutes = Math.abs(cur_minutes)+((city_gap-Math.floor(city_gap))*60);
	if (cur_minutes >= 60) { cur_minutes = cur_minutes - 60; cur_hours = cur_hours + 1; }
	day = "";
	if (calc_gap < 0)
	{
		if (city_gap < 0)
		{
			if (cur_hours < 0) { cur_hours = 24 + cur_hours; if (cur_hoursGMT < cur_hours) day = get_day_strf("-1"); }
			if (cur_hours > 23) { cur_hours = cur_hours - 24; if (cur_hours > cur_hoursGMT) day = get_day_strf("1"); }
		}
		else
		{
			if (cur_hours < 0) { cur_hours = 24 + cur_hours; if (cur_hours < cur_hoursGMT) day = get_day_strf("1"); }
			if (cur_hours > 23) { cur_hours = cur_hours - 24; }
		}
	}
	else
	{
		if (city_gap < 0)
		{
			if (cur_hours < 0) { cur_hours = 24 + cur_hours; if (cur_hoursGMT < cur_hours) day = get_day_strf("-1"); }
			if (cur_hours > 23) { cur_hours = cur_hours - 24; if (cur_hours > cur_hoursGMT) day = get_day_strf("1"); }
		}
		else
		{
			if (cur_hours < 0) { cur_hours = 24 + cur_hours; }
			if (cur_hours > 23) { cur_hours = cur_hours - 24; if (cur_hours < cur_hoursGMT) day = get_day_strf("1"); }
		}
	}
	if (cur_hours < 10) cur_hours = "0" + cur_hours;
	if (cur_minutes < 10) cur_minutes = "0" + cur_minutes;
	cur_time = cur_hours + ":" + cur_minutes + day;
	meridian = " | " + city_name + ": " + cur_time;
	return meridian;
};

// Display & remove the server time at the status bar
function clock(gap)
{
	var meridian1 = "";
	var meridian2 = "";
	var meridian3 = "";
	var meridian4 = "";
	var meridian5 = "";
	var meridian6 = "";
	var WORLD_TIME = "";
	cur_date = new Date();
	calc_date = new Date(cur_date - gap);
	calc_hours = calc_date.getHours();
	calc_minutes = calc_date.getMinutes();
	calc_seconds = calc_date.getSeconds();
	if (calc_hours < 10) calc_hours = "0" + calc_hours;
	if (calc_minutes < 10) calc_minutes = "0" + calc_minutes;
	if (calc_seconds < 10) calc_seconds = "0" + calc_seconds;
<?php if (C_WORLDTIME == 2)
{
?>
	calc_time = calc_hours + ":" + calc_minutes + ":" + calc_seconds + get_day_strf("2");
<?php
}
else
{
?>
	calc_time = calc_hours + ":" + calc_minutes + ":" + calc_seconds;
<?php
}
?>
	cur_gapGMT = cur_date.getTimezoneOffset()/60;
	cur_hoursGMT = cur_date.getHours()+Math.floor(cur_gapGMT);
//	cur_hoursGMT = cur_date.getHours();
	cur_minutes = cur_date.getMinutes()+(cur_gapGMT-Math.floor(cur_gapGMT))*60;
	if (cur_minutes >= 60) { cur_hoursGMT = cur_hoursGMT + 1; cur_minutes = cur_minutes - 60; }
	cur_hoursGMT_DST_EU = cur_hoursGMT+timedst_eu();
	cur_hoursGMT_DST_USA = cur_hoursGMT+timedst_usa();
	cur_hoursGMT_DST_SYD = cur_hoursGMT+timedst_syd();
// UTC time (GMT default) - DST disabled
	cur_hoursUTC = cur_hoursGMT;
	dayUTC = get_day_strf("0");
	if (cur_minutes >= 60) { cur_minutesUTC = cur_minutes - 60; cur_hoursUTC = cur_hoursUTC + 1; }
	if (calc_gap < 0)
	{
		if (cur_hoursUTC < 0) { cur_hoursUTC = 24 + cur_hoursUTC; dayUTC = get_day_strf("-1") }
		else if (cur_hoursUTC > 23) { cur_hoursUTC = cur_hoursUTC - 24; dayUTC = get_day_strf("0"); }
	}
	else
	{
		if (cur_hoursUTC < 0) { cur_hoursUTC = 24 + cur_hoursUTC; dayUTC = get_day_strf("-1") }
		else if (cur_hoursUTC > 23) { cur_hoursUTC = cur_hoursUTC - 24; dayUTC = get_day_strf("1"); }
	}
	if (cur_hoursUTC < 10) cur_hoursUTC = "0" + cur_hoursUTC;
	if (cur_minutes < 10) cur_minutesUTC = "0" + cur_minutes;
	else cur_minutesUTC = cur_minutes;
	cur_timeUTC = cur_hoursUTC + ":" + cur_minutesUTC + dayUTC;
	meridian_gmt = "UTC: " + cur_timeUTC;
// First Meridian
	var city1_name = "<?php echo((CITY1_NAME && CITY1_NAME != "CITY1_NAME") ? CITY1_NAME : ""); ?>";
	var city1_gap = <?php echo((CITY1_GAP && CITY1_GAP != "CITY1_GAP") ? CITY1_GAP : 0); ?>;
	var city1_dst = "<?php echo((CITY1_DST && CITY1_DST != "CITY1_DST") ? CITY1_DST : ""); ?>";
	if (city1_name != "") meridian1 = meridian_time(city1_name,city1_gap,city1_dst);
// Second Meridian
	var city2_name = "<?php echo((CITY2_NAME && CITY2_NAME != "CITY2_NAME") ? CITY2_NAME : ""); ?>";
	var city2_gap = <?php echo((CITY2_GAP && CITY2_GAP != "CITY2_GAP") ? CITY2_GAP : 0); ?>;
	var city2_dst = "<?php echo((CITY2_DST && CITY2_DST != "CITY2_DST") ? CITY2_DST : ""); ?>";
	if (city2_name != "") meridian2 = meridian_time(city2_name,city2_gap,city2_dst);
// Third Meridian
	var city3_name = "<?php echo((CITY3_NAME && CITY3_NAME != "CITY3_NAME") ? CITY3_NAME : ""); ?>";
	var city3_gap = <?php echo((CITY3_GAP && CITY3_GAP != "CITY3_GAP") ? CITY3_GAP : 0); ?>;
	var city3_dst = "<?php echo((CITY3_DST && CITY3_DST != "CITY3_DST") ? CITY3_DST : ""); ?>";
	if (city3_name != "") meridian3 = meridian_time(city3_name,city3_gap,city3_dst);
// Forth Meridian
	var city4_name = "<?php echo((CITY4_NAME && CITY4_NAME != "CITY4_NAME") ? CITY4_NAME : ""); ?>";
	var city4_gap = <?php echo((CITY4_GAP && CITY4_GAP != "CITY4_GAP") ? CITY4_GAP : 0); ?>;
	var city4_dst = "<?php echo((CITY4_DST && CITY4_DST != "CITY4_DST") ? CITY4_DST : ""); ?>";
	if (city4_name != "") meridian4 = meridian_time(city4_name,city4_gap,city4_dst);
// Fifth Meridian
	var city5_name = "<?php echo((CITY5_NAME && CITY5_NAME != "CITY5_NAME") ? CITY5_NAME : ""); ?>";
	var city5_gap = <?php echo((CITY5_GAP && CITY5_GAP != "CITY5_GAP") ? CITY5_GAP : 0); ?>;
	var city5_dst = "<?php echo((CITY5_DST && CITY5_DST != "CITY5_DST") ? CITY5_DST : ""); ?>";
	if (city5_name != "") meridian5 = meridian_time(city5_name,city5_gap,city5_dst);
// Sixth Meridian
	var city6_name = "<?php echo((CITY6_NAME && CITY6_NAME != "CITY6_NAME") ? CITY6_NAME : ""); ?>";
	var city6_gap = <?php echo((CITY6_GAP && CITY6_GAP != "CITY6_GAP") ? CITY6_GAP : 0); ?>;
	var city6_dst = "<?php echo((CITY6_DST && CITY6_DST != "CITY6_DST") ? CITY6_DST : ""); ?>";
	if (city6_name != "") meridian6 = meridian_time(city6_name,city6_gap,city6_dst);

	WORLD_TIME = <?php echo((C_WORLDTIME >= 1) ? '" (" + meridian_gmt + meridian1 + meridian2 + meridian3 + meridian4 + meridian5 + meridian6 + ")"' : '" (" + meridian_gmt + ")"'); ?>;

	window.status = "<?php echo(L_SVR_TIME); ?>" + calc_time + WORLD_TIME;

	clock_disp = setTimeout('clock(' + gap + ')', 1000);
};

// Display the server time in the input frame
function clock_input(gap)
{
	cur_date = new Date();
	calc_date = new Date(cur_date - gap);
	calc_hours = calc_date.getHours();
	calc_minutes = calc_date.getMinutes();
	calc_seconds = calc_date.getSeconds();
	cur_gapGMT = cur_date.getTimezoneOffset()/60;
	day_calc = get_day_strf("2");
	if (calc_hours < 10) calc_hours = "0" + calc_hours;
	if (calc_minutes < 10) calc_minutes = "0" + calc_minutes;
	if (calc_seconds < 10) calc_seconds = "0" + calc_seconds;
	calc_time = calc_hours + ":" + calc_minutes + ":" + calc_seconds;
	var cur_gapGMT_sign = "";
	if (cur_gapGMT < 0) cur_gapGMT_sign = " +" + Math.abs(cur_gapGMT);
	else if (cur_gapGMT > 0) cur_gapGMT_sign = " -" + Math.abs(cur_gapGMT);

	meridian_gmt = " (UTC" + cur_gapGMT_sign + ")";

	setTimeout('clock_input(' + gap + ')', 1000);
	window.document.forms['MsgForm'].elements['server_clock'].value = day_calc + ", " + calc_time + meridian_gmt;
};

// Stops the clock in the status bar
function stop_clock()
{
	clearTimeout(clock_disp);
	window.status = '';
};

// Calculates the gap between the server and the local date
function calc_gap(serv_date)
{
	server_date = new Date(serv_date);
	local_date = new Date();
	return local_date - server_date;
};

<?php
?>