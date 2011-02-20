<?php
// File : russian/localized.admin.php - plus version (01.08.2009 - rev.15)
// Russian translation by Viktor <vikt81@mail.ru>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "Администрирование для %s");
define("A_MENU_1", "Зарегистрированные пользователи");
define("A_MENU_11", "Зарегистрированный пользователь");
define("A_MENU_2", "Забаненные пользователи");
define("A_MENU_21", "Забаненный пользователь");
define("A_MENU_3", "Очистить комнаты");
define("A_MENU_4", "E-Mail");
define("A_MENU_5", "Конфигурация");
define("A_MENU_6", "Дополнения чата");
define("A_MENU_7", "Поиск");
define("A_MENU_8", "Подключения");
define("A_MENU_9", "Архив логов");
define("A_MENU_1a", "Профили");
define("A_MENU_2a", "Статистика");
define("A_MOD_DEV", "Мод в стадии разработки");
define("A_LOGOUT", "Выход из системы");

// Frame for registered users
define("A_SHEET1_1", "Список зарегистрированных пользователей и их права доступа");
define("A_SHEET1_2", "Имя пользователя");
define("A_SHEET1_3", "Права доступа");
define("A_SHEET1_4", "Модерируемые комнаты");
define("A_SHEET1_5", "Модерируемые комнаты разделены запятой (,) без пробелов.");
define("A_SHEET1_6", "Удалить отмеченные профили");
define("A_SHEET1_7", "Выбрать");
define("A_SHEET1_8", "Кроме вас, нет зарегистрированных пользователей.");
define("A_SHEET1_9", "Забанить отмеченные профили");
define("A_SHEET1_10", "Теперь вы должны переместиться в ’".A_MENU_2."’ список, чтобы уточнить свой выбор.");
define("A_SHEET1_11", "Последний раз был");
define("A_SHEET1_12", "Причина бана (дополнительно)");
define("A_SHEET1_13", "Разрешенные комнаты");
define("A_SHEET1_14", "Все незарегистрированные");
define("A_SHEET1_15", "Все зарегистрированные");
define("A_SHEET1_16", "Ограничения указанных комнат должно быть активизировано в ’".A_MENU_5."’ списке.");
define("A_USER", "Пользователь");
define("A_MODER", "Модератор");
define("A_TOPMOD", "Главный модератор");
define("A_ADMIN", "Администратор");
define("A_PAGE_CNT", "Страница %s из %s");

// Frame for banished users
define("A_SHEET2_1", "Список забаненных пользователей и озабоченные комнаты");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "Озабоченные комнаты");
define("A_SHEET2_4", "До");
define("A_SHEET2_5", "незакончено");
define("A_SHEET2_6", "Комнаты разделены запятыми без пробелов (,) если есть меньше чем 4, еще ’<B>*</B>’ значит банятся из всех комнат.");
define("A_SHEET2_7", "Разбанить отмеченных пользователей");
define("A_SHEET2_8", "Нет забаненных пользователей.");
define("A_SHEET2_9", "Причина (необязательно)");

// Frame for cleaning rooms
define("A_SHEET3_1", "Список существующих комнат");
define("A_SHEET3_2", "Очистка \"non-default\" комнаты также удалит всех модераторов<br />этой комнаты.");
define("A_SHEET3_3", "Очистить выбранные комнаты");
define("A_SHEET3_4", "Нет комнат для очистки.");
define("A_SHEET3_5", "Вы не сделали никакого выбора. Выберите комнаты из списка ниже.");

// Frame for sending mails
define("A_SHEET4_0", "Вы не установили E-Mail администратора в ’".A_MENU_5."’ список.");
define("A_SHEET4_1", "Отправить e-mail");
define("A_SHEET4_2", "Кому:");
define("A_SHEET4_3", "Выбрать все");
define("A_SHEET4_4", "Тема:");
define("A_SHEET4_5", "Сообщение:");
define("A_SHEET4_6", "Послать сейчас!");
define("A_SHEET4_7", "Все e-mail успешно отправлены.");
define("A_SHEET4_8", "Внутренняя ошибка отправки почты.");
define("A_SHEET4_9", "Адрес(а), тема или сообщение отсутствует!");
define("A_SHEET4_10", "Добавленные E-Mail, должны быть разделены запятыми без пробелов (,)");
define("A_SHEET4_11", "Подпись:");
define("A_SHEET4_12", "Снять выделение со всех");

// Frame for configuration
define("A_SHEET5_0", "Установленная версия %s");
define("A_SHEET5_1", "Вышла новая версия (%s)!");

//Chat Extras
define("A_EXTR_DSBL", "Дополнения чата отключены") ;
define("A_REFRESH_MSG", "Регенерировать сообщение") ;
define("A_MSG_DEL", "Удалить") ;
define("A_POST_TIME", "Отправленные на") ;
define("A_FROM_TO", "От › Кому") ;
define("A_FROM", "От") ;
define("A_CHTEX_ROOM", "Комната") ;
define("A_CHTEX_MSG", "Сообщение") ;

//Save chat logs
define("A_CHAT_LOGS_1", "Логи IP подключений к %s");
define("A_CHAT_LOGS_2", "Архив чата отключен");
define("A_CHAT_LOGS_3", "Открыть страницу IP логов");
define("A_CHAT_LOGS_4", "Сбросить файл IP логов чата");
define("A_CHAT_LOGS_5", "Архивация и сброс файла IP логов чата!\\n");
define("A_CHAT_LOGS_6", "Полный архив логов чата");
define("A_CHAT_LOGS_7", "Показать секцию архива публичного канала");
define("A_CHAT_LOGS_8", "Это удалит все файлы и папки\\nсохраненные в %s папке!\\n"); // year
define("A_CHAT_LOGS_9", "Удалить все %s логи"); // year
define("A_CHAT_LOGS_10", "Удалить год");
define("A_CHAT_LOGS_11", "Это удалит всей файлы\\nсохраненные в %s папке!\\n"); // month/year
define("A_CHAT_LOGS_12", "(только публичные)");
define("A_CHAT_LOGS_13", "Удалить месяц");
define("A_CHAT_LOGS_14", "Это удалит %s файл!\\n"); // day.php file
define("A_CHAT_LOGS_15", "Удалить этот лог");
define("A_CHAT_LOGS_16", "Читать %s лог"); // day month year
define("A_CHAT_LOGS_17", "Архив публичных логов чата");
define("A_CHAT_LOGS_18", "(только публичный)");
define("A_CHAT_LOGS_19", "\\nЭто необратимо...\\nВы уверены?");
define("A_CHAT_LOGS_20", "Показать полную секцию архива чата");
define("A_CHAT_LOGS_21", "Перейти наверх");
define("A_CHAT_LOGS_22", "Заархивированный файл логов");
define("A_CHAT_LOGS_23", "Сгенерирован %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "Архивировать все %s логи в zip архив"); // date
define("A_CHAT_LOGS_25", "Это создаст zip со всеми логами\\nсохраненный в %s папку!\\n"); // month/year
define("A_CHAT_LOGS_26", "\\nВы уверены?");
define("A_CHAT_LOGS_27", "ZIP архивы");
define("A_CHAT_LOGS_28", "Скачать %s");
define("A_CHAT_LOGS_29", "Удалить этот zip");
define("A_CHAT_LOGS_30", "IP архивы");
define("A_CHAT_LOGS_31", "Размер %s %s");
define("A_CHAT_LOGS_32", "Файл");
define("A_CHAT_LOGS_33", "Папка");
define("A_CHAT_LOGS_34", "%s успешно удален: %s");
define("A_CHAT_LOGS_35", "%s успешно создан: %s");
define("A_CHAT_LOGS_36", "%s не существует: %s");
define("A_CHAT_LOGS_37", "%s невозможно удалить: %s");
define("A_CHAT_LOGS_38", "%s невозможно создать: %s");
define("A_CHAT_LOGS_39", "%s защищен от записи: %s");
define("A_CHAT_LOGS_40", "Произошедшие ошибки сохранены в файл: %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "Страница поиска чат-комнаты");
define("A_SEARCH_2", "Все категории");
define("A_SEARCH_3", "Имена");
define("A_SEARCH_4", "IP адреса");
define("A_SEARCH_5", "Права доступа");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "Пол");
define("A_SEARCH_8", "Описание");
define("A_SEARCH_9", "Ссылки");
define("A_SEARCH_10", "Поиск");
define("A_SEARCH_11", "Для поиска по категории <b>Права доступа</b>, используются опции <b>ad</b> (администратор), <b>mod</b> (модератор) или <b>u</b> (пользователь).");
define("A_SEARCH_12", "Для поиска по категории <b>Пол</b>, используются опции: <b>0</b> - бесполые существа, <b>1</b> - мужчины, <b>2</b> - женщины или <b>3</b> - пары (М+Ж).");
define("A_SEARCH_13", "Имя пользователя");
define("A_SEARCH_14", "Имя");
define("A_SEARCH_15", "Фамилия");
define("A_SEARCH_16", "Страна");
define("A_SEARCH_18", "Право доступа");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "Пол");
define("A_SEARCH_21", "Поиск по дате");
define("A_SEARCH_22", "Поиск по");
define("A_SEARCH_23", "Напишите запрос и попробуйте снова!");
define("A_SEARCH_24", "Ничего не найдено по вашему запросу. Уточните свой запрос.");
define("A_SEARCH_25", "Модерировать этого пользователя");

// Connected users Page
define("A_LURKING_1", "Подключенные пользователи и скрытие") ;
define("A_LURKING_2", "Скрытие отключено") ;

// Statistics Page
define("A_STATS_1", "Страница статистики чата");
define("A_STATS_2", "Сбор данных начат %s"); //date
define("A_STATS_3", "Полная статистика (За все время)");
define("A_STATS_4", "Детальная статистика (Прошлые %s дни активности)"); //number of days
define("A_STATS_5", "Статистика отключена");
define("A_STATS_6", "Топ %s"); //Top 10 or Top 5
?>