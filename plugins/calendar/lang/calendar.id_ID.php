<?php
# id_ID translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Indonesian - Bahasa
# Translator: Hendriyo <hendriyo@gmail.com>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Hari");
define("L_MONTH", "Bulan");
define("L_YEAR", "Tahun");
define("L_PREV", "Sebelumnya");
define("L_NEXT", "Lanjutan");
define("L_REF_CAL", "Refreshing Kalender...");
define("L_SEL_LANG", "Pilih Bahasa");
define("L_SEL_ICON", "Pilih Ikon");
define("L_SEL_DATE", "Pilih Tanggal");
define("L_ERR_SEL", "Pilihan Anda tidak valid");
define("L_NOT_ALLOWED", "Tanggal ini tidak boleh dipilih");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "Januari");
define("L_FEB", "Februari");
define("L_MAR", "Maret");
define("L_APR", "April");
define("L_MAY", "Mei");
define("L_JUN", "Juni");
define("L_JUL", "Juli");
define("L_AUG", "Agustus");
define("L_SEP", "September");
define("L_OCT", "Oktober");
define("L_NOV", "November");
define("L_DEC", "Desember");
// Months Short Names
define("L_S_JAN", "Jan");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Apr");
define("L_S_MAY", "Mei");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Agust");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Okt");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Des");
// Week days Long Names
define("L_MON", "Senin");
define("L_TUE", "Selasa");
define("L_WED", "Rabu");
define("L_THU", "Kamis");
define("L_FRI", "Jumat");
define("L_SAT", "Sabtu");
define("L_SUN", "Minggu");
// Week days Short Names
define("L_S_MON", "Sen");
define("L_S_TUE", "Sel");
define("L_S_WED", "Rabu");
define("L_S_THU", "Kamis");
define("L_S_FRI", "Jumat");
define("L_S_SAT", "Sabtu");
define("L_S_SUN", "Minggu");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");

// Set the ID specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "IND_IND.UTF-8", "IND_IND", "indonesian.UTF-8", "indonesian"); // For Windows servers
} else {
setlocale(LC_ALL, "id_ID.UTF-8", "id_ID", "ind.UTF-8", "ind_ind.UTF-8"); // For Unix/FreeBSD servers
}
?>