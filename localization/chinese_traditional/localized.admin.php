<?php
// File : chinese_traditional/localized.admin.php - plus version (29.04.2012 - rev.17)
// Original file by clouds_music <clouds.music@gmail.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "管理 用於 %s");
define("A_MENU_1", "註冊用戶");
define("A_MENU_11", "註冊用戶");
define("A_MENU_2", "放逐用戶");
define("A_MENU_21", "放逐用戶");
define("A_MENU_3", "清除聊天室");
define("A_MENU_4", "傳送郵件");
define("A_MENU_5", "設定");
define("A_MENU_6", "聊天紀錄");
define("A_MENU_7", "搜尋");
define("A_MENU_8", "連接");
define("A_MENU_9", "日誌歸檔");
define("A_MENU_1a", "資料");
define("A_MENU_2a", "統計");
define("A_MOD_DEV", "MOD下的發展");
define("A_LOGOUT", "登出");

// Frame for registered users
define("A_SHEET1_1", "註冊用戶的名單和他們的權限");
define("A_SHEET1_2", "使用者名稱");
define("A_SHEET1_3", "權限屬性");
define("A_SHEET1_4", "主持聊天室");
define("A_SHEET1_5", "主持聊天室 用逗號分割 (，) 不帶空格。");
define("A_SHEET1_6", "移除已勾選者");
define("A_SHEET1_7", "更新");
define("A_SHEET1_8", "除了你自己的 登記用戶。");
define("A_SHEET1_9", "驅逐區選中的配置文件");
define("A_SHEET1_10", "現在，您已經移動您的選擇到 ’".A_MENU_2."’ 表。");
define("A_SHEET1_11", "上次登錄");
define("A_SHEET1_12", "驅逐的原因（可選）");
define("A_SHEET1_13", "允許的客房");
define("A_SHEET1_14", "所有不受限制");
define("A_SHEET1_15", "所有受限制");
define("A_SHEET1_16", "那個指定房間限制應被激活在這 ’".A_MENU_5."’ 表。");
define("A_USER", "一般使用者");
define("A_MODER", "室長");
define("A_TOPMOD", "超級室長");
define("A_ADMIN", "管理員");
define("A_PAGE_CNT", "Page %s of %s");

// Frame for banished users
define("A_SHEET2_1", "被驅逐的用戶和有關房間名單");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "有關的室");
define("A_SHEET2_4", "直到");
define("A_SHEET2_5", "沒有結束");
define("A_SHEET2_6", "房间由逗號分離，不用的空間()，如果少于4有， ’<B>*</B>’ 標誌從所有房間驅逐。");
define("A_SHEET2_7", "刪除選中被放逐 user(s)");
define("A_SHEET2_8", "沒有被驅逐的用戶。");
define("A_SHEET2_9", "原因 (可選)");

// Frame for cleaning rooms
define("A_SHEET3_1", "現有房間名單");
define("A_SHEET3_2", "移除一個 \"non-default\" 房間，也將刪除所有主持人<br />在這個房間的地位。");
define("A_SHEET3_3", "移除選定的房間");
define("A_SHEET3_4", "沒有可以移除的房間。");
define("A_SHEET3_5", "您還沒有作出任何選擇。請至少選擇一個，從以下列表中的空間。");

// Frame for sending mails
define("A_SHEET4_0", "您沒有設置管理員電子郵件 ’".A_MENU_5."’ 頁。");
define("A_SHEET4_1", "傳送郵件");
define("A_SHEET4_2", "到：");
define("A_SHEET4_3", "選擇全部");
define("A_SHEET4_4", "主題：");
define("A_SHEET4_5", "訊息：");
define("A_SHEET4_6", "現在發送！");
define("A_SHEET4_7", "所有的電子郵件已發送。");
define("A_SHEET4_8", "發送郵件時出現內部錯誤。");
define("A_SHEET4_9", "地址信息，主題或郵件缺少內容！");
define("A_SHEET4_10", "添加電子郵件，以逗號(，)分隔無空格");
define("A_SHEET4_11", "署名");
define("A_SHEET4_12", "取消全選");
define("A_SHEET4_13", "放所有收件人在這 <b>’Bcc’</b> 欄位");

// Frame for configuration
define("A_SHEET5_0", "您的當前安裝的版本是 %s");
define("A_SHEET5_1", "有一個新的版本發布 (%s)！");

//Chat Extras
define("A_EXTR_DSBL", "禁用聊天附加功能") ;
define("A_REFRESH_MSG", "刷新信息") ;
define("A_MSG_DEL", "刪除") ;
define("A_POST_TIME", "發表於") ;
define("A_FROM_TO", "從 > 到") ;
define("A_FROM", "從") ;
define("A_CHTEX_ROOM", "房間") ;
define("A_CHTEX_MSG", "訊息") ;

//Save chat 日誌
define("A_CHAT_LOGS_1", "IP日誌的連接到 %s");
define("A_CHAT_LOGS_2", "聊天記錄存檔已被禁用");
define("A_CHAT_LOGS_3", "打開聊天的IP日誌頁");
define("A_CHAT_LOGS_4", "重置聊天的IP日誌文件");
define("A_CHAT_LOGS_5", "這將歸檔並且重新設置聊天IP紀錄文件！\\n");
define("A_CHAT_LOGS_6", "全部聊天記錄存檔");
define("A_CHAT_LOGS_7", "顯示公共的聊天記錄存檔部分");
define("A_CHAT_LOGS_8", "這將刪除所有文件和文件夾\\n儲存在這 %s 文件夾！\\n"); // year
define("A_CHAT_LOGS_9", "刪除全部 %s 日誌"); // year
define("A_CHAT_LOGS_10", "刪除一年");
define("A_CHAT_LOGS_11", "這將刪除所有文件\\n儲存在這 %s 文件夾！\\n"); // month/year
define("A_CHAT_LOGS_12", "(只有公眾的)");
define("A_CHAT_LOGS_13", "刪除一個月");
define("A_CHAT_LOGS_14", "這將刪除 %s 檔案！\\n"); // day.php file
define("A_CHAT_LOGS_15", "刪除此日誌");
define("A_CHAT_LOGS_16", "閱讀 %s 日誌"); // day month year
define("A_CHAT_LOGS_17", "公共聊天記錄存檔");
define("A_CHAT_LOGS_18", "(只有公共)");
define("A_CHAT_LOGS_19", "\\n這是不可恢復的...\\n你確定？");
define("A_CHAT_LOGS_20", "顯示完整的聊天記錄存檔部分");
define("A_CHAT_LOGS_21", "返回頁首");
define("A_CHAT_LOGS_22", "歸檔日誌文件");
define("A_CHAT_LOGS_23", "生成於 %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "壓縮所有 %s 成一個 zip歸檔的日誌"); // date
define("A_CHAT_LOGS_25", "這將建立一個具有所有日誌的zip\\n儲存在這 %s 文件夾！\\n"); // month/year
define("A_CHAT_LOGS_26", "\\n你確定？");
define("A_CHAT_LOGS_27", "ZIP 壓縮文件");
define("A_CHAT_LOGS_28", "下載 %s");
define("A_CHAT_LOGS_29", "刪除這個 zip");
define("A_CHAT_LOGS_30", "IP 文件");
define("A_CHAT_LOGS_31", "總計大小 %s %s");
define("A_CHAT_LOGS_32", "文件");
define("A_CHAT_LOGS_33", "文件夾");
define("A_CHAT_LOGS_34", "%s 成功刪除： %s");
define("A_CHAT_LOGS_35", "%s 成功創建： %s");
define("A_CHAT_LOGS_36", "%s 不存在： %s");
define("A_CHAT_LOGS_37", "%s 無法刪除： %s");
define("A_CHAT_LOGS_38", "%s 無法創建： %s");
define("A_CHAT_LOGS_39", "%s 寫入受保護： %s");
define("A_CHAT_LOGS_40", "儲存檔案時發生的錯誤： %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "聊天室搜尋頁");
define("A_SEARCH_2", "所有類別");
define("A_SEARCH_3", "姓名");
define("A_SEARCH_4", "IP Address");
define("A_SEARCH_5", "權限");
define("A_SEARCH_6", "E-mail");
define("A_SEARCH_7", "性別");
define("A_SEARCH_8", "簡介");
define("A_SEARCH_9", "鏈接");
define("A_SEARCH_10", "搜尋");
define("A_SEARCH_11", "權限的分類，選項 <b>ad</b>，<b>mod</b> 女 或 <b>u</b>。");
define("A_SEARCH_12", "用於 性別分類，選項： <b>0</b> 秘密，<b>1</b> 男，<b>2</b> 女 或 <b>3</b> 夫婦。");
define("A_SEARCH_13", "用戶名");
define("A_SEARCH_14", "名字");
define("A_SEARCH_15", "姓氏");
define("A_SEARCH_16", "國家");
define("A_SEARCH_18", "權限");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "性別");
define("A_SEARCH_21", "搜尋字詞");
define("A_SEARCH_22", "搜索項");
define("A_SEARCH_23", "請提供一個搜索詞，然後再試一次！");
define("A_SEARCH_24", "沒有符合條件的數據。請細化您的搜索。");
define("A_SEARCH_25", "Moderate this user");
define("A_SEARCH_26", "用戶選定隱藏信息，在公開的個人資料。請確保 她/他 的隱私安全！");
define("A_SEARCH_27", "顯示當前的月份");
define("A_SEARCH_28", "顯示所有生日者");

// Connected users Page
define("A_LURKING_1", "連接的用戶和潛水用戶") ;
define("A_LURKING_2", "潛水禁用") ;

// Statistics Page
define("A_STATS_1", "聊天統計頁");
define("A_STATS_2", "數據收集開始 %s"); //date
define("A_STATS_3", "總體統計數據（所有時間）");
define("A_STATS_4", "詳細的統計 (Last %s days of activity)"); //number of days
define("A_STATS_5", "統計禁用");
define("A_STATS_6", "Top %s"); //Top 10 or Top 5
?>