<?php
# es_AR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Argentinian Spanish
# Translator: Matias Olivera <matiolivera@yahoo.com>
# Last file update: 01.05.2010

// Class strings localization
define("L_DAY", "Día");
define("L_MONTH", "Mes");
define("L_YEAR", "Año");
define("L_PREV", "Anterior");
define("L_NEXT", "Próximo");
define("L_REF_CAL", "Actualizando Calendario...");
define("L_CHK_VAL", "Verifica el valor");
define("L_SEL_LANG", "Selecciona lenguage");
define("L_SEL_ICON", "Selecciona Icono");
define("L_SEL_DATE", "Selecciona día");
define("L_ERR_SEL", "Tu selección no es válida");
define("L_NOT_ALLOWED", "Este día no puede ser seleccionado");

// Set the first day of the week in your language
define("FIRST_DAY", "0"); // 1 for Monday, 0 for Sunday

// Months Long Names
define("L_JAN", "Enero");
define("L_FEB", "Febrero");
define("L_MAR", "Marzo");
define("L_APR", "Abril");
define("L_MAY", "Mayo");
define("L_JUN", "Junio");
define("L_JUL", "Julio");
define("L_AUG", "Agosto");
define("L_SEP", "Septiembre");
define("L_OCT", "Octubre");
define("L_NOV", "Noviembre");
define("L_DEC", "Diciembre");
// Months Short Names
define("L_S_JAN", "Ene");
define("L_S_FEB", "Feb");
define("L_S_MAR", "Mar");
define("L_S_APR", "Abr");
define("L_S_MAY", "May");
define("L_S_JUN", "Jun");
define("L_S_JUL", "Jul");
define("L_S_AUG", "Ago");
define("L_S_SEP", "Sep");
define("L_S_OCT", "Oct");
define("L_S_NOV", "Nov");
define("L_S_DEC", "Dic");
// Week days Long Names
define("L_MON", "Lunes");
define("L_TUE", "Martes");
define("L_WED", "Miércoles");
define("L_THU", "Jueves");
define("L_FRI", "Viernes");
define("L_SAT", "Sábado");
define("L_SUN", "Domingo");
// Week days Short Names
define("L_S_MON", "Lun");
define("L_S_TUE", "Mar");
define("L_S_WED", "Mié");
define("L_S_THU", "Jue");
define("L_S_FRI", "Vie");
define("L_S_SAT", "Sáb");
define("L_S_SUN", "Dom");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "es_AR");

// Set the AR specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "ESP_ARG.UTF-8", "ESP_ARG");
} else {
setlocale(LC_ALL, "es_AR.UTF-8", "esp_arg.UTF-8");
}
?>