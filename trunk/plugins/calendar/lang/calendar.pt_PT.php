﻿<?php
# pt_PT translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 3.3
# Language: Portuguese (Portugal) / Português (Portugal)
# Translator: Developer Tuga <developer.tuga@gmail.com>
# Last file update: 07.03.2011

// Class strings localization
define("L_DAY", "Dia");
define("L_MONTH", "Mês");
define("L_YEAR", "Ano");
define("L_PREV", "Anterior");
define("L_NEXT", "Seguinte");
define("L_REF_CAL", "A actualizar o calendário...");
define("L_CHK_VAL", "Verifica o valor");
define("L_SEL_LANG", "Seleccione Língua");
define("L_SEL_ICON", "Seleccione Icon");
define("L_SEL_DATE", "Seleccione Data");
define("L_ERR_SEL", "A sua escolha não é válida");
define("L_NOT_ALLOWED", "Esta data não pode ser seleccionada");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "janeiro");
define("L_FEB", "fevereiro");
define("L_MAR", "março");
define("L_APR", "abril");
define("L_MAY", "maio");
define("L_JUN", "junho");
define("L_JUL", "julho");
define("L_AUG", "agosto");
define("L_SEP", "setembro");
define("L_OCT", "outubro");
define("L_NOV", "novembro");
define("L_DEC", "dezembro");
// Months Short Names
define("L_S_JAN", "jan");
define("L_S_FEB", "fev");
define("L_S_MAR", "mar");
define("L_S_APR", "abr");
define("L_S_MAY", "mai");
define("L_S_JUN", "jun");
define("L_S_JUL", "jul");
define("L_S_AUG", "ago");
define("L_S_SEP", "set");
define("L_S_OCT", "out");
define("L_S_NOV", "nov");
define("L_S_DEC", "dez");
// Week days Long Names
define("L_MON", "segunda");
define("L_TUE", "terça");
define("L_WED", "quarta");
define("L_THU", "quinta");
define("L_FRI", "sexta");
define("L_SAT", "sábado");
define("L_SUN", "domingo");
// Week days Short Names
define("L_S_MON", "seg");
define("L_S_TUE", "ter");
define("L_S_WED", "qua");
define("L_S_THU", "qui");
define("L_S_FRI", "sex");
define("L_S_SAT", "sáb");
define("L_S_SUN", "dom");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "pt_PT"); // en_US format of your language

// Set the PT specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "pt-PT.UTF-8", "pt-pt", "Portuguese");
} else {
setlocale(LC_ALL, "pt_PT.UTF-8", "por.UTF-8", "por_por.UTF-8", "Portuguese.UTF-8");
}
?>