<?php
# vi_VN translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Vietnamese
# Translator: Marshall <hellomarshal_lookatme@yahoo.com.vn>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Ngày");
define("L_MONTH", "Tháng");
define("L_YEAR", "Năm");
define("L_PREV", "Trước");
define("L_NEXT", "Tiếp");
define("L_REF_CAL", "Refreshing Calendar...");
define("L_SEL_LANG", "Chọn Ngôn Ngữ");
define("L_SEL_ICON", "Chọn Icon");
define("L_SEL_DATE", "Chọn Ngày");
define("L_ERR_SEL", "Your selection is not valid");
define("L_NOT_ALLOWED", "This date is not allowed to be selected");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Tháng 1");
define("L_FEB", "Tháng 2");
define("L_MAR", "Tháng 3");
define("L_APR", "Tháng 4");
define("L_MAY", "Tháng 5");
define("L_JUN", "Tháng 6");
define("L_JUL", "Tháng 7");
define("L_AUG", "Tháng 8");
define("L_SEP", "Tháng 9");
define("L_OCT", "Tháng 10");
define("L_NOV", "Tháng 11");
define("L_DEC", "Tháng 12");
// Months Short Names
define("L_S_JAN", "Tháng 1");
define("L_S_FEB", "Tháng 2");
define("L_S_MAR", "Tháng 3");
define("L_S_APR", "Tháng 4");
define("L_S_MAY", "Tháng 5");
define("L_S_JUN", "Tháng 6");
define("L_S_JUL", "Tháng 7");
define("L_S_AUG", "Tháng 8");
define("L_S_SEP", "Tháng 9");
define("L_S_OCT", "Tháng 10");
define("L_S_NOV", "Tháng 11");
define("L_S_DEC", "Tháng 12");
// Week days Long Names
define("L_MON", "Thứ hai");
define("L_TUE", "Thứ ba");
define("L_WED", "Thứ tư");
define("L_THU", "Thứ năm");
define("L_FRI", "Thứ sáu");
define("L_SAT", "Thứ bảy");
define("L_SUN", "Chủ nhật");
// Week days Short Names
define("L_S_MON", "Hai");
define("L_S_TUE", "Ba");
define("L_S_WED", "Tư");
define("L_S_THU", "Năm");
define("L_S_FRI", "Sáu");
define("L_S_SAT", "Bảy");
define("L_S_SUN", "CN");

// Windows encoding
define("WIN_DEFAULT", "windows-1258");

// Set the VN specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "viet nam.UTF-8", "viet nam");
} else {
setlocale(LC_ALL, "vi_VN.UTF-8", "vnd_vnd.UTF-8", "vie_vie.UTF-8");
}
?>