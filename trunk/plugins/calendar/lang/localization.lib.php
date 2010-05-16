<?php
if (!function_exists('utf_conv'))
{
	function utf_conv($iso,$charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso,$charset,$what);
		return $what;
	};
};

if(file_exists("calendar.".(isset($lang) ? $lang : L_LANG).".php")) require("calendar.".(isset($lang) ? $lang : L_LANG).".php");
if(!defined("L_LANG")) define("L_LANG", "en_US");

// English US format and localization - default strings when the specified translation is not available
if(!defined("L_DAY")) define("L_DAY", "Day");
if(!defined("L_MONTH")) define("L_MONTH", "Month");
if(!defined("L_YEAR")) define("L_YEAR", "Year");
if(!defined("L_PREV")) define("L_PREV", "Previous");
if(!defined("L_NEXT")) define("L_NEXT", "Next");
if(!defined("L_REF_CAL")) define("L_REF_CAL", "Refreshing Calendar...");
if(!defined("L_CHK_VAL")) define("L_CHK_VAL", "Check the value");
if(!defined("L_SEL_LANG")) define("L_SEL_LANG", "Select Language");
if(!defined("L_SEL_ICON")) define("L_SEL_ICON", "Select Icon");
if(!defined("L_SEL_DATE")) define("L_SEL_DATE", "Select Date");
if(!defined("L_ERR_SEL")) define("L_ERR_SEL", "Your selection is not valid");
if(!defined("L_NOT_ALLOWED")) define("L_NOT_ALLOWED", "This date is not allowed to be selected");

// Set the first day of the week in your language
if(!defined("FIRST_DAY")) define("FIRST_DAY", "0"); // 1 for Monday, 0 for Sunday

// Months Long Names
if(!defined("L_JAN")) define("L_JAN", "January");
if(!defined("L_FEB")) define("L_FEB", "February");
if(!defined("L_MAR")) define("L_MAR", "March");
if(!defined("L_APR")) define("L_APR", "April");
if(!defined("L_MAY")) define("L_MAY", "May");
if(!defined("L_JUN")) define("L_JUN", "June");
if(!defined("L_JUL")) define("L_JUL", "July");
if(!defined("L_AUG")) define("L_AUG", "August");
if(!defined("L_SEP")) define("L_SEP", "September");
if(!defined("L_OCT")) define("L_OCT", "October");
if(!defined("L_NOV")) define("L_NOV", "November");
if(!defined("L_DEC")) define("L_DEC", "December");
// Months Short Names
if(!defined("L_S_JAN")) define("L_S_JAN", "Jan");
if(!defined("L_S_FEB")) define("L_S_FEB", "Feb");
if(!defined("L_S_MAR")) define("L_S_MAR", "Mar");
if(!defined("L_S_APR")) define("L_S_APR", "Apr");
if(!defined("L_S_MAY")) define("L_S_MAY", "May");
if(!defined("L_S_JUN")) define("L_S_JUN", "Jun");
if(!defined("L_S_JUL")) define("L_S_JUL", "Jul");
if(!defined("L_S_AUG")) define("L_S_AUG", "Aug");
if(!defined("L_S_SEP")) define("L_S_SEP", "Sep");
if(!defined("L_S_OCT")) define("L_S_OCT", "Oct");
if(!defined("L_S_NOV")) define("L_S_NOV", "Nov");
if(!defined("L_S_DEC")) define("L_S_DEC", "Dec");
// Week days Long Names
if(!defined("L_MON")) define("L_MON", "Monday");
if(!defined("L_TUE")) define("L_TUE", "Tuesday");
if(!defined("L_WED")) define("L_WED", "Wednesday");
if(!defined("L_THU")) define("L_THU", "Thursday");
if(!defined("L_FRI")) define("L_FRI", "Friday");
if(!defined("L_SAT")) define("L_SAT", "Saturday");
if(!defined("L_SUN")) define("L_SUN", "Sunday");
// Week days Short Names
if(!defined("L_S_MON")) define("L_S_MON", "Mon");
if(!defined("L_S_TUE")) define("L_S_TUE", "Tue");
if(!defined("L_S_WED")) define("L_S_WED", "Wed");
if(!defined("L_S_THU")) define("L_S_THU", "Thu");
if(!defined("L_S_FRI")) define("L_S_FRI", "Fri");
if(!defined("L_S_SAT")) define("L_S_SAT", "Sat");
if(!defined("L_S_SUN")) define("L_S_SUN", "Sun");

// Windows encoding
if(!defined("WIN_DEFAULT")) define("WIN_DEFAULT", "windows-1252");
if(!defined("L_CAL_FORMAT")) define("L_CAL_FORMAT", "%d %B %Y");

//	Long Month Names translation tool
	define("l_january", defined('L_JAN') ? L_JAN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1199145600')) : strftime('%B','1199145600')));
	define("l_february", defined('L_FEB') ? L_FEB : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1201824000')) : strftime('%B','1201824000')));
	define("l_march", defined('L_MAR') ? L_MAR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1204329600')) : strftime('%B','1204329600')));
	define("l_april", defined('L_APR') ? L_APR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1207008000')) : strftime('%B','1207008000')));
	define("l_may", defined('L_MAY') ? L_MAY : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1209600000')) : strftime('%B','1209600000')));
	define("l_june", defined('L_JUN') ? L_JUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1212278400')) : strftime('%B','1212278400')));
	define("l_july", defined('L_JUL') ? L_JUL : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1214870400')) : strftime('%B','1214870400')));
	define("l_august", defined('L_AUG') ? L_AUG : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1217548800')) : strftime('%B','1217548800')));
	define("l_september", defined('L_SEP') ? L_SEP : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1220227200')) : strftime('%B','1220227200')));
	define("l_october", defined('L_OCT') ? L_OCT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1222819200')) : strftime('%B','1222819200')));
	define("l_november", defined('L_NOV') ? L_NOV : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1225497600')) : strftime('%B','1225497600')));
	define("l_december", defined('L_DEC') ? L_DEC : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1228089600')) : strftime('%B','1228089600')));
//	Short Month Names translation tool
	define("s_jan", defined('L_S_JAN') ? L_S_JAN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1199145600')) : strftime('%b','1199145600')));
	define("s_feb", defined('L_S_FEB') ? L_S_FEB : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1201824000')) : strftime('%b','1201824000')));
	define("s_mar", defined('L_S_MAR') ? L_S_MAR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1204329600')) : strftime('%b','1204329600')));
	define("s_apr", defined('L_S_APR') ? L_S_APR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1207008000')) : strftime('%b','1207008000')));
	define("s_may", defined('L_S_MAY') ? L_S_MAY : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1209600000')) : strftime('%b','1209600000')));
	define("s_jun", defined('L_S_JUN') ? L_S_JUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1212278400')) : strftime('%b','1212278400')));
	define("s_jul", defined('L_S_JUL') ? L_S_JUL : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1214870400')) : strftime('%b','1214870400')));
	define("s_aug", defined('L_S_AUG') ? L_S_AUG : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1217548800')) : strftime('%b','1217548800')));
	define("s_sep", defined('L_S_SEP') ? L_S_SEP : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1220227200')) : strftime('%b','1220227200')));
	define("s_oct", defined('L_S_OCT') ? L_S_OCT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1222819200')) : strftime('%b','1222819200')));
	define("s_nov", defined('L_S_NOV') ? L_S_NOV : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1225497600')) : strftime('%b','1225497600')));
	define("s_dec", defined('L_S_DEC') ? L_S_DEC : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1228089600')) : strftime('%b','1228089600')));
//	Long Day Names translation tool
	define("l_monday", defined('L_MON') ? L_MON : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270425600')) : strftime('%A','1270425600')));
	define("l_tuesday", defined('L_TUE') ? L_TUE : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270512000')) : strftime('%A','1270512000')));
	define("l_wednesday", defined('L_WED') ? L_WED : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270598400')) : strftime('%A','1270598400')));
	define("l_thursday", defined('L_THU') ? L_THU : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270684800')) : strftime('%A','1270684800')));
	define("l_friday", defined('L_FRI') ? L_FRI : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270771200')) : strftime('%A','1270771200')));
	define("l_saturday", defined('L_SAT') ? L_SAT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270857600')) : strftime('%A','1270857600')));
	define("l_sunday", defined('L_SUN') ? L_SUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270944000')) : strftime('%A','1270944000')));
//	Short Day Names translation tool
	define("s_mon", defined('L_S_MON') ? L_S_MON : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270425600')) : strftime('%a','1270425600')));
	define("s_tue", defined('L_S_TUE') ? L_S_TUE : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270512000')) : strftime('%a','1270512000')));
	define("s_wed", defined('L_S_WED') ? L_S_WED : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270598400')) : strftime('%a','1270598400')));
	define("s_thu", defined('L_S_THU') ? L_S_THU : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270684800')) : strftime('%a','1270684800')));
	define("s_fri", defined('L_S_FRI') ? L_S_FRI : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270771200')) : strftime('%a','1270771200')));
	define("s_sat", defined('L_S_SAT') ? L_S_SAT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270857600')) : strftime('%a','1270857600')));
	define("s_sun", defined('L_S_SUN') ? L_S_SUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270944000')) : strftime('%a','1270944000')));
?>
<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
<!--
//	JS strings
	var l_sel_date = "<?php echo(L_SEL_DATE); ?>";
	var l_not_allowed = "<?php echo(L_NOT_ALLOWED); ?>";
//	Long Month Names
	var l_january = "<?php echo(defined('L_JAN') ? L_JAN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1199145600')) : strftime('%B','1199145600'))); ?>";
	var l_february = "<?php echo(defined('L_FEB') ? L_FEB : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1201824000')) : strftime('%B','1201824000'))); ?>";
	var l_march = "<?php echo(defined('L_MAR') ? L_MAR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1204329600')) : strftime('%B','1204329600'))); ?>";
	var l_april = "<?php echo(defined('L_APR') ? L_APR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1207008000')) : strftime('%B','1207008000'))); ?>";
	var l_may = "<?php echo(defined('L_MAY') ? L_MAY : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1209600000')) : strftime('%B','1209600000'))); ?>";
	var l_june = "<?php echo(defined('L_JUN') ? L_JUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1212278400')) : strftime('%B','1212278400'))); ?>";
	var l_july = "<?php echo(defined('L_JUL') ? L_JUL : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1214870400')) : strftime('%B','1214870400'))); ?>";
	var l_august = "<?php echo(defined('L_AUG') ? L_AUG : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1217548800')) : strftime('%B','1217548800'))); ?>";
	var l_september = "<?php echo(defined('L_SEP') ? L_SEP : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1220227200')) : strftime('%B','1220227200'))); ?>";
	var l_october = "<?php echo(defined('L_OCT') ? L_OCT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1222819200')) : strftime('%B','1220227200'))); ?>";
	var l_november = "<?php echo(defined('L_NOV') ? L_NOV : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1225497600')) : strftime('%B','1225497600'))); ?>";
	var l_december = "<?php echo(defined('L_DEC') ? L_DEC : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%B','1228089600')) : strftime('%B','1228089600'))); ?>";
//	Short Month Names
	var s_jan = "<?php echo(defined('L_S_JAN') ? L_S_JAN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1199145600')) : strftime('%b','1199145600'))); ?>";
	var s_feb = "<?php echo(defined('L_S_FEB') ? L_S_FEB : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1201824000')) : strftime('%b','1201824000'))); ?>";
	var s_mar = "<?php echo(defined('L_S_MAR') ? L_S_MAR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1204329600')) : strftime('%b','1204329600'))); ?>";
	var s_apr = "<?php echo(defined('L_S_APR') ? L_S_APR : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1207008000')) : strftime('%b','1207008000'))); ?>";
	var s_may = "<?php echo(defined('L_S_MAY') ? L_S_MAY : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1209600000')) : strftime('%b','1209600000'))); ?>";
	var s_jun = "<?php echo(defined('L_S_JUN') ? L_S_JUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1212278400')) : strftime('%b','1212278400'))); ?>";
	var s_jul = "<?php echo(defined('L_S_JUL') ? L_S_JUL : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1214870400')) : strftime('%b','1214870400'))); ?>";
	var s_aug = "<?php echo(defined('L_S_AUG') ? L_S_AUG : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1217548800')) : strftime('%b','1217548800'))); ?>";
	var s_sep = "<?php echo(defined('L_S_SEP') ? L_S_SEP : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1220227200')) : strftime('%b','1220227200'))); ?>";
	var s_oct = "<?php echo(defined('L_S_OCT') ? L_S_OCT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1222819200')) : strftime('%b','1222819200'))); ?>";
	var s_nov = "<?php echo(defined('L_S_NOV') ? L_S_NOV : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1225497600')) : strftime('%b','1225497600'))); ?>";
	var s_dec = "<?php echo(defined('L_S_DEC') ? L_S_DEC : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%b','1228089600')) : strftime('%b','1228089600'))); ?>";
//	Long Day Names
	var l_monday = "<?php echo(defined('L_MON') ? L_MON : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270425600')) : strftime('%A','1270425600'))); ?>";
	var l_tuesday = "<?php echo(defined('L_TUE') ? L_TUE : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270512000')) : strftime('%A','1270512000'))); ?>";
	var l_wednesday = "<?php echo(defined('L_WED') ? L_WED : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270598400')) : strftime('%A','1270598400'))); ?>";
	var l_thursday = "<?php echo(defined('L_THU') ? L_THU : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270684800')) : strftime('%A','1270684800'))); ?>";
	var l_friday = "<?php echo(defined('L_FRI') ? L_FRI : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270771200')) : strftime('%A','1270771200'))); ?>";
	var l_saturday = "<?php echo(defined('L_SAT') ? L_SAT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270857600')) : strftime('%A','1270857600'))); ?>";
	var l_sunday = "<?php echo(defined('L_SUN') ? L_SUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%A','1270944000')) : strftime('%A','1270944000'))); ?>";
//	Short Day Names
	var s_mon = "<?php echo(defined('L_S_MON') ? L_S_MON : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270425600')) : strftime('%a','1270425600'))); ?>";
	var s_tue = "<?php echo(defined('L_S_TUE') ? L_S_TUE : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270512000')) : strftime('%a','1270512000'))); ?>";
	var s_wed = "<?php echo(defined('L_S_WED') ? L_S_WED : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270598400')) : strftime('%a','1270598400'))); ?>";
	var s_thu = "<?php echo(defined('L_S_THU') ? L_S_THU : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270684800')) : strftime('%a','1270684800'))); ?>";
	var s_fri = "<?php echo(defined('L_S_FRI') ? L_S_FRI : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270771200')) : strftime('%a','1270771200'))); ?>";
	var s_sat = "<?php echo(defined('L_S_SAT') ? L_S_SAT : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270857600')) : strftime('%a','1270857600'))); ?>";
	var s_sun = "<?php echo(defined('L_S_SUN') ? L_S_SUN : (stristr(PHP_OS,'win') ? utf_conv(WIN_DEFAULT,'utf-8',strftime('%a','1270944000')) : strftime('%a','1270944000'))); ?>";
// -->
</SCRIPT>