<?php
// This is an example of what may be done to include phpMyChat into an
// existing web page, regardless of its name.
// You can also include such a file in a frameset.

// Lines below must be at the top of your file because 'index.lib.php'
// sets headers and cookies.
$ChatPath = "";		// relative path to chat dir, empty value if this
					// file is in the same dir than the chat;
require("./${ChatPath}lib/index.lib.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Charset == "windows-1256") ? "RTL" : "LTR"); ?>">

<HEAD>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
window.name="login";
// Display & remove the server time in the status bar
// Returns the days in the status bar
function get_day(time,plus)
{
		monday = " <?php echo(utf8_encode(L_MON)) ?>";
		tuesday = " <?php echo(utf8_encode(L_TUE)) ?>";
		wednesday = " <?php echo(utf8_encode(L_WED)) ?>";
		thursday = " <?php echo(utf8_encode(L_THU)) ?>";
		friday = " <?php echo(utf8_encode(L_FRI)) ?>";
		saturday = " <?php echo(utf8_encode(L_SAT)) ?>";
		sunday = " <?php echo(utf8_encode(L_SUN)) ?>";
		dayN = time.getDay();
		day = dayN + plus;
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
	function time_dst()
	{
		timedst = 0;
		timenow = <?php echo(time()); ?>;
		if ((timenow > 1174784400 && timenow < 1193533199) || (timenow > 1206838800 && timenow < 1224982799) || (timenow > 1238288400 && timenow < 1256432399) || (timenow > 1269997200 && timenow < 1288486799) || (timenow > 1301187600 && timenow < 1319936399)) timedst = 60;
		return timedst;
	}
// Calculates the US Daylight savings from 2006 to 2011
	function time_utc()
	{
		timeutc = 0;
		timenow = <?php echo(time()); ?>;
		if ((timenow > 1173578400 && timenow < 1194141599) || (timenow > 1205028000 && timenow < 1225591199) || (timenow > 1236477600 && timenow < 1257040799) || (timenow > 1268532000 && timenow < 1289095199) || (timenow > 1299981600 && timenow < 1320544799)) timeutc = 60;
		return timeutc;
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
		calc_time = calc_hours + ":" + calc_minutes + ":" + calc_seconds<?php echo((C_WORLDTIME) ? ' + get_day(calc_date,0)' :''); ?>;
		cur_gapGMT = cur_date.getTimezoneOffset()/60;
		cur_hoursGMT = cur_date.getHours()+cur_gapGMT;
		cur_gapGMT_DST = (cur_date.getTimezoneOffset()+time_dst())/60;
		cur_hoursGMT_DST = cur_date.getHours()+cur_gapGMT_DST;
		cur_hoursLON = cur_hoursGMT;
		dayLON = "";
		if (cur_hoursLON < 0) { cur_hoursLON = 24 + cur_hoursLON; dayLON = get_day(cur_date,-1) }
		else dayLON = get_day(cur_date);
		if (cur_hoursLON < 10) cur_hoursLON = "0" + cur_hoursLON;
		cur_timeGMT =cur_hoursLON + ":" + calc_minutes + dayLON;
		cur_gapGMT_UTC = (cur_date.getTimezoneOffset()+time_utc())/60;
		cur_hoursGMT_UTC = cur_date.getHours()+cur_gapGMT_UTC;
		cur_hoursNYC = cur_hoursGMT_UTC - 5;
		dayNYC = "";
		if (cur_hoursNYC < 0) { cur_hoursNYC = 24 + cur_hoursNYC; if (cur_hoursLON - cur_hoursNYC < 0) dayNYC = get_day(cur_date,-1); }
		if (cur_hoursNYC < 10) cur_hoursNYC = "0" + cur_hoursNYC;
		cur_timeNYC = cur_hoursNYC + ":" + calc_minutes + dayNYC;
		cur_hoursPAR = cur_hoursGMT_DST + 1;
		dayPAR = "";
		if (cur_hoursPAR < 0) cur_hoursPAR = 24 + cur_hoursPAR;
		if (cur_hoursPAR > 23) { cur_hoursPAR = cur_hoursPAR - 24; if (cur_hoursPAR - cur_hoursLON < 0) dayPAR = get_day(cur_date,1); }
		if (cur_hoursPAR < 10) cur_hoursPAR = "0" + cur_hoursPAR;
		cur_timePAR = cur_hoursPAR + ":" + calc_minutes + dayPAR;
		cur_hoursBUC = cur_hoursGMT_DST + 2;
		dayBUC = "";
		if (cur_hoursBUC > 23) { cur_hoursBUC = cur_hoursBUC - 24; if (cur_hoursBUC - cur_hoursLON < 0) dayBUC = get_day(cur_date,1); }
		if (cur_hoursBUC < 10) cur_hoursBUC = "0" + cur_hoursBUC;
		cur_timeBUC = cur_hoursBUC + ":" + calc_minutes + dayBUC;
		cur_hoursTYO = cur_hoursGMT + 9;
		dayTYO = "";
		if (cur_hoursTYO > 23) { cur_hoursTYO = cur_hoursTYO - 24; if (cur_hoursTYO - cur_hoursLON < 0) dayTYO = get_day(cur_date,1); }
		if (cur_hoursTYO < 10) cur_hoursTYO = "0" + cur_hoursTYO;
		cur_timeTYO = cur_hoursTYO + ":" + calc_minutes + dayTYO;
		cur_hoursSYD = cur_hoursGMT + 10;
		daySYD = "";
		if (cur_hoursSYD > 23) { cur_hoursSYD = cur_hoursSYD - 24; if (cur_hoursSYD - cur_hoursLON < 0) daySYD = get_day(cur_date,1); }
		if (cur_hoursSYD < 10) cur_hoursSYD = "0" + cur_hoursSYD
		cur_timeSYD = cur_hoursSYD + ":" + calc_minutes + daySYD;;
		WORLD_TIME = <?php echo((C_WORLDTIME) ? '" " + "(NYC: " + cur_timeNYC + " | LON: " + cur_timeGMT + " | PAR: " + cur_timePAR + " | BUC: " + cur_timeBUC + " | TYO: " + cur_timeTYO + " | SYD: " + cur_timeSYD + ")"' : ''); ?>;
		window.status = "<?php echo(utf8_encode(L_SVR_TIME)); ?>" + calc_time + WORLD_TIME;

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
	if (C_WORLDTIME == 2)
	{
		$CorrectedDate = mktime(date("G") + C_TMZ_OFFSET,date("i"),date("s"),date("m"),date("d"),date("Y"));
		?>
		gap = calc_gap("<?php echo(date("F d, Y H:i:s", $CorrectedDate)); ?>");
		clock(gap);
		<?php
	}
	?>
//-->
</SCRIPT>
<?php
// You can put html head statements right after the "<HEAD>" tag.

// Both values are boolean. See explanations in 'index.lib.php' file.
send_headers(1,1);
?>
</HEAD>
<BODY>
	<CENTER>
<?php
// If nothing other than phpMyChat is loaded in this page, or if you want
// to have the same background color as phpMyChat for the whole page,
// you have to modify the BODY tag to '<BODY CLASS="ChatBody">'
// You can put html statements right after the "<BODY>" tag or add
// php code here.

$Is_Error = (isset($Error));

if (isset($_COOKIE))
{
	if (isset($_COOKIE["CookieUsername"])) $CookieUsername = $_COOKIE["CookieUsername"];
	if (isset($_COOKIE["CookieRoom"])) $CookieRoom = $_COOKIE["CookieRoom"];
	if (isset($_COOKIE["CookieRoomType"])) $CookieRoomType = $_COOKIE["CookieRoomType"];
	if (isset($_COOKIE["CookieColor"])) $CookieColor = $_COOKIE["CookieColor"];
	if (isset($_COOKIE["CookieStatus"])) $CookieStatus = $_COOKIE["CookieStatus"];
};
$Username = (isset($CookieUsername) ? $CookieUsername : "");
$Room_name = (isset($CookieRoom) ? $CookieRoom : "");
$Room_type = (isset($CookieRoomType) ? $CookieRoomType : "");
$Color = (isset($CookieColor) ? $CookieColor : "");
$Status = (isset($CookieStatus) ? $CookieStatus : "");

layout($Is_Error,$Username,$Room_name,$Room_type,$Color,$Status);

// You can add php code here, or add html statements before the "</BODY>" tag.
?>
</CENTER>
</BODY>
</HTML>
<?php
// The following line is required
$DbLink->close();
?>