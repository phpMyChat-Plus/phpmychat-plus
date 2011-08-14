<?php
# hi_IN translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.59
# Language: Hindi (Devanagari) / मानक हिन्दी (in your lang) // ex: Romanian / Română
# Translator: SanSar <ghoriwala@gmail.com>
# Last file update: 11.08.2011

// Class strings localization
define("L_DAY", "दिवस");
define("L_MONTH", "माह");
define("L_YEAR", "वर्ष");
define("L_PREV", "पिछला");
define("L_NEXT", "अगले");
define("L_REF_CAL", "ताज़ा कैलेंडर ...");
define("L_CHK_VAL", "मूल्य की जाँच करें");
define("L_SEL_LANG", "भाषा चुनें");
define("L_SEL_ICON", "चुनें चिह्न");
define("L_SEL_DATE", "तिथि का चयन करें");
define("L_ERR_SEL", "आपका चयन मान्य नहीं है");
define("L_NOT_ALLOWED", "यह तारीख करने के लिए चुना जा अनुमति नहीं है");
define("L_DATE_BEFORE", "%s से पहले एक तिथि का चयन करें");
define("L_DATE_AFTER", "%s के बाद एक तिथि का चयन करें");
define("L_DATE_BETWEEN", "%s और %s\\nके बीच किसी दिनांक का चयन करें");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "जनवरी");
define("L_FEB", "फरवरी");
define("L_MAR", "मार्च");
define("L_APR", "अप्रैल");
define("L_MAY", "मई");
define("L_JUN", "जून");
define("L_JUL", "जुलाई");
define("L_AUG", "अगस्त");
define("L_SEP", "सितम्बर");
define("L_OCT", "अक्तूबर");
define("L_NOV", "नवम्बर");
define("L_DEC", "दिसम्बर");
// Months Short Names
define("L_S_JAN", "ज");
define("L_S_FEB", "फ");
define("L_S_MAR", "मा");
define("L_S_APR", "अ");
define("L_S_MAY", "मई");
define("L_S_JUN", "जू");
define("L_S_JUL", "जु");
define("L_S_AUG", "अ");
define("L_S_SEP", "सि");
define("L_S_OCT", "अक");
define("L_S_NOV", "न");
define("L_S_DEC", "द");
// Week days Long Names
define("L_MON", "सोमवार");
define("L_TUE", "मंगलवार");
define("L_WED", "बुधवार");
define("L_THU", "गुरुवार");
define("L_FRI", "शुक्रवार");
define("L_SAT", "शनिवार");
define("L_SUN", "रविवार");
// Week days Short Names
define("L_S_MON", "स");
define("L_S_TUE", "म");
define("L_S_WED", "ब");
define("L_S_THU", "ग");
define("L_S_FRI", "शु");
define("L_S_SAT", "श");
define("L_S_SUN", "र");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B, %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "hi_IN"); // en_US format of your language

// Set the HI specific date/time format:
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "hi_IN.UTF-8", "hin-hin.UTF-8", "hin", "Hindi.UTF-8");
} else {
setlocale(LC_ALL, "hi_IN.UTF-8", "hin.UTF-8", "ind.UTF-8", "Hindi.UTF-8");
}
?>