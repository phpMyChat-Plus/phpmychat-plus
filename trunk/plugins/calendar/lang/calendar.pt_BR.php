<?php
# pt_BR translation for
# PHP-Calendar, DatePicker Calendar class: http://www.triconsole.com/php/calendar_datepicker.php
# Version: 2.30
# Language: Português (Brasil)
# Translator: Jaime Dias ( jaime@jotadias.com.br)
# Last file update: 29.07.2010

// Class strings localization
define("L_DAY", "Dia");
define("L_MONTH", "Mês");
define("L_YEAR", "Ano");
define("L_PREV", "Anterior");
define("L_NEXT", "Próximo");
define("L_REF_CAL", "Atualizando...");
define("L_CHK_VAL", "Verifique data");
define("L_SEL_LANG", "Selecione Idioma");
define("L_SEL_ICON", "Selecione Icon");
define("L_SEL_DATE", "Selecione Data");
define("L_ERR_SEL", "Sua Seleção não é válida");
define("L_NOT_ALLOWED", "Esta data não é permitida ser selecionada");

// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");

// Months Long Names
define("L_JAN", "janneiro");
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
define("L_SAT", "sabado");
define("L_SUN", "domingo");
// Week days Short Names
define("L_S_MON", "seg");
define("L_S_TUE", "ter");
define("L_S_WED", "qua");
define("L_S_THU", "qui");
define("L_S_FRI", "sex");
define("L_S_SAT", "sab");
define("L_S_SUN", "dom");

// Windows encoding
define("WIN_DEFAULT", "windows-1252");
define("L_CAL_FORMAT", "%d %B %Y");
if(!defined("L_LANG") || L_LANG == "L_LANG") define("L_LANG", "pt_BR"); // en_US format of your language

// Set the US specific date/time format
if (stristr(PHP_OS,"win")) {
setlocale(LC_ALL, "pt-BR.UTF-8", "pt-br", "portuguese");
} else {
setlocale(LC_ALL, "pt_BR.UTF-8", "por.UTF-8", "por_por.UTF-8", "Portuguese.UTF-8");
}
?>