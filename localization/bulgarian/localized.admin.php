<?php
// File : bulgarian/localized.admin.php - plus version (07.07.2008 - rev.13)
// Translation by Peter Petrov <peter.m.petrov@gmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Администриране на %s");
define("A_MENU_1", "Регистрирани");	//plural
define("A_MENU_11", "Регистриран потребител");		//singular
define("A_MENU_2", "Наказани");	//plural
define("A_MENU_21", "Наказан потребител");		//singular
define("A_MENU_3", "Почистване");
define("A_MENU_4", "Поща");
define("A_MENU_5", "Настройки");
define("A_MENU_6", "Екстри");
define("A_MENU_7", "Търсене");
define("A_MENU_8", "Дневник");
define("A_MENU_9", "Архив");
define("A_LOGOUT", "Изход");

// Frame for registered users
define("A_SHEET1_1", "Списък на регистрираните потребители и техния ранг");
define("A_SHEET1_2", "Потребител");
define("A_SHEET1_3", "Ранг");
define("A_SHEET1_4", "Модерирани стаи");
define("A_SHEET1_5", "Модерираните стаи се отделят със запетайка без интервал (,).");
define("A_SHEET1_6", "Заличи избраните профили");
define("A_SHEET1_7", "Промени");
define("A_SHEET1_8", "Няма други регистрирани потребители освен Вас.");
define("A_SHEET1_9", "Лиши от достъп избраните профили");
define("A_SHEET1_10", "Сега трябва да отидете в ’".A_MENU_2."’, за да прецизирате избора си.");
define("A_SHEET1_11", "Последно влизане");
define("A_SHEET1_12", "Причина за лишаване от достъп (не е задължително)");
define("A_USER", "Потребител");
define("A_MODER", "Модератор");
define("A_TOPMOD", "Главен модератор");
define("A_ADMIN", "Администратор");
define("A_PAGE_CNT", "Стр. %s от %s");

// Frame for banished users
define("A_SHEET2_1", "Списък на наказаните потребители и засегнатите стаи");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Засегнати стаи");
define("A_SHEET2_4", "До");
define("A_SHEET2_5", "неопределено");
define("A_SHEET2_6", "Стаите се отделят със запетайка  без интервал (,) ако са по-малко от 4. В противен случай знакът ’<B>*</B>’ лишава от достъп до всички стаи.");
define("A_SHEET2_7", "Амнистирай избраните потребители");
define("A_SHEET2_8", "Няма наказани потребители.");
define("A_SHEET2_9", "Причина (не е задължително)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Списък на съществуващите стаи");
define("A_SHEET3_2", "Почистването на потребителска стая ще премахне и<br />ранга на модераторите й.");
define("A_SHEET3_3", "Почисти избраните стаи");
define("A_SHEET3_4", "Няма стаи за почистване");

// Frame for sending mails
define("A_SHEET4_0", "Не сте посочили администраторски имейл адрес в ’".A_MENU_5."’.");
define("A_SHEET4_1", "Изпращане на писма");
define("A_SHEET4_2", "До:");
define("A_SHEET4_3", "Избери всички");
define("A_SHEET4_4", "Тема:");
define("A_SHEET4_5", "Съобщение:");
define("A_SHEET4_6", "Изпрати!");
define("A_SHEET4_7", "Всички писма са изпратени.");
define("A_SHEET4_8", "Вътрешна грешка при изпращането на писмата.");
define("A_SHEET4_9", "Непопълнен адрес, тема или съобщение!");
define("A_SHEET4_10", "Добавете имейл адреси,<br />разделени със запетайки без интервали (,)");
define("A_SHEET4_11", "Подпис");
define("A_SHEET4_12", "Отмени избора");

// Frame for configuration
define("A_SHEET5_0", "В момента ползвате версия %s");
define("A_SHEET5_1", "Пусната е нова версия (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Eкстрите са забранени") ;
define("A_REFRESH_MSG", "Опресни съобщенията");
define("A_MSG_DEL", "Del");
define("A_POST_TIME", "Пуснато на");
define("A_FROM_TO", "От › До");
define("A_FROM", "От");
define("A_CHTEX_ROOM", "Стая");
define("A_CHTEX_MSG", "Съобщение");

//Save chat logs
define("A_CHAT_LOGS_1", "Дневник на IP влизанията в %s");
define("A_CHAT_LOGS_2", "Архивът е забранен");
define("A_CHAT_LOGS_3", "Виж IP логовете");
define("A_CHAT_LOGS_4", "Опразване на чат IP лог файла");
define("A_CHAT_LOGS_5", "Това ще архивира чат IP лог файла, след което ще го опразни!\\n");
define("A_CHAT_LOGS_6", "Пълен архив на чат логовете");
define("A_CHAT_LOGS_7", "Покажи архивите на общите стаи");
define("A_CHAT_LOGS_8", "Това ще изтрие всички файлове и папки, \\n съхранени в папка %s!\\n"); // year
define("A_CHAT_LOGS_9", "Изтрий всички %s логове"); // year
define("A_CHAT_LOGS_10", "Изтрий година");
define("A_CHAT_LOGS_11", "Това ще изтрие всички файлове\\nсъхранени в папка %s!\\n"); // month/year
define("A_CHAT_LOGS_12", "(само общите такива)");
define("A_CHAT_LOGS_13", "Изтрий месец");
define("A_CHAT_LOGS_14", "Това ще изтрие файла %s!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Изтрий този лог");
define("A_CHAT_LOGS_16", "Прочети %s лога"); // day month year
define("A_CHAT_LOGS_17", "Архив на общите стаи");
define("A_CHAT_LOGS_18", "(само общата такава)");
define("A_CHAT_LOGS_19", "\\nТова не може да се възстанови...\\nСигурен ли сте?");
define("A_CHAT_LOGS_20", "Покажи цялата архивна секция");
define("A_CHAT_LOGS_21", "Към върха");
define("A_CHAT_LOGS_22", "Архивиран лог файл");
define("A_CHAT_LOGS_23", "Създаден на %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Компресирайте всички %s лог файлове в zip архив"); // date
define("A_CHAT_LOGS_25", "Това ще създаде zip файл с всички логове\\nсъхранявани в папка %s!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nСигурни ли сте?");
define("A_CHAT_LOGS_27", "Zip архиви");
define("A_CHAT_LOGS_28", "Свалете %s");
define("A_CHAT_LOGS_29", "Изтрийте този zip");
define("A_CHAT_LOGS_30", "IP архиви");
define("A_CHAT_LOGS_31", "Пълен размер %s %s");
define("A_CHAT_LOGS_32", ""); // small Файл
define("A_CHAT_LOGS_33", ""); // small папка
define("A_CHAT_LOGS_32a", "файл"); // small Файл
define("A_CHAT_LOGS_33b", "Папка"); // small папка
define("A_CHAT_LOGS_34", "Успешно изтриване на %s%s");
define("A_CHAT_LOGS_35", "Успешно създаване на %s%s");
define("A_CHAT_LOGS_36", "%s%s не съществува");
define("A_CHAT_LOGS_37", "Неуспешно изтриване на %s%s");
define("A_CHAT_LOGS_38", "Неуспешно създаване на %s%s");
define("A_CHAT_LOGS_39", "%s%s има защита срещу записване");
define("A_CHAT_LOGS_40", "Грешки станали при записването на файла %s%s");

//Admin Search Page
define("A_SEARCH_1", "Страница за търсене");
define("A_SEARCH_2", "Всички категории");
define("A_SEARCH_3", "Имена");
define("A_SEARCH_4", "IP Адреси");
define("A_SEARCH_5", "Ранг");
define("A_SEARCH_6", "Имейл адрес");
define("A_SEARCH_7", "Пол");
define("A_SEARCH_8", "Описание");
define("A_SEARCH_9", "Връзки");
define("A_SEARCH_10", "Търси");
define("A_SEARCH_11", "За категорията \"Ранг\" възможностите са: <b>ad</b>, <b>mod</b> и <b>u</b>.");
define("A_SEARCH_12", "За категорията \"Пол\" възможностите са: <b>0</b> за непосочен, <b>1</b> за мъжки, <b>2</b> за женски и <b>3</b> за двойка.");
define("A_SEARCH_13", "Потребител");
define("A_SEARCH_14", "Собствено име");
define("A_SEARCH_15", "Фамилия");
define("A_SEARCH_16", "Страна");
define("A_SEARCH_18", "Ранг");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Пол");
define("A_SEARCH_21", "Търсена дума");
define("A_SEARCH_22", "Търси по");
define("A_SEARCH_23", "Моля посочете дума за търсене и опитайте отново");
define("A_SEARCH_24", "Няма данни, удовлетворяващи избрания критерий. Моля прецизирайте заявката.");
define("A_SEARCH_25", "Модерирай този потребител");

// Connected users Page
define("A_LURKING_1", "Участници и зяпачи");
define("A_LURKING_2", "Зяпането - забранено");
?>