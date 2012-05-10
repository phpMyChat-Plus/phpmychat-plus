<?php
// File : chinese_traditional/localized.install.php - plus version (07.06.2009 - rev.7)
// Original file for Plus version by clouds_music <clouds.music@gmail.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

define("L_BTN1", "下一頁");
define("L_BTN2", "取消");
define("L_BTN3", "返回");
define("L_BTN4", "刷新");
define("L_BTN5", "完成");
define("L_BTN6", "跳過");
define("L_CONN_ERROR", "FTP的主機地址錯誤！<br/>請返回，並檢查您的FTP主機位址。");
define("L_LOGIN_ERROR", "登入驗證失敗！<br/>請返回，並檢查您的登入使用者名稱和密碼。");
define("L_FTP_NAME", "FTP 用戶名空白未填！");
define("L_FTP_PASS", "FTP 密碼 空白未填！");
define("L_DB_NOCONNECT", "無法連接到數據庫！");
define("L_DB_HINT1", "數據庫 %s 不存在，並且我不能創建它！");
define("L_PASS_ERROR1", "你沒有填寫管理員名稱。<br/>請返回並選用一個名稱到您的管理員帳戶！");
define("L_PASS_ERROR2", "你必須填寫密碼欄位。<br/>請返回並鍵入相同的密碼兩次！");
define("L_PASS_ERROR3", "密碼和驗證密碼不符合。<br/>請返回並重新輸入密碼！");
define("L_FILE_ERROR1", "不能 CHMOD 這檔案");
define("L_FILE_ERROR2", "");
define("L_FOLD_ERROR1", "不能 CHMOD 這資料夾");
define("L_FOLD_ERROR2", "");
define("L_INST_FOR", "安裝 for %s");
define("L_INST_VER", "版本：");
define("L_INST_SETUP", "安裝 -");
define("L_INST_PAG_OF", "頁面 %s of %s");
define("L_P0_HINT1", "歡迎到我們的安裝程序 %s。");
define("L_P0_HINT2", "請輸入你的FTP登入資料。");
define("L_P1_HINT1", "此設置將引導您完成安裝過程。<br/>請選擇您的安裝類型。");
define("L_P1_HINT2", "Please select what type of installation is this：");
define("L_P1_HINT3", "你提供的 FTP -數據，似乎是錯誤的。 安裝程序無法繼續。請返回並糾正錯誤。這些是錯誤的：");
define("L_P2_HINT1", "現在，我們檢查了 phpMyChat 配置。必須改變一個檔案 (\"config/config.lib.php\") 在此服務器上。");
define("L_P2_HINT2", "那個 config 檔案無法寫入。 請讓它可寫入，使用任何FTP程序（如Total Commander）連接到您的服務器和應用 CHMOD 666 to \"config.lib.php\" 檔案在 config 資料夾)。 如果你不知道如何做到這一點，或是如果你不喜歡改變這個文件的權限，請填寫下面的表格，然後按一下 \"".L_BTN1."\"。");
define("L_P2_HINT3", "注意：如果您要改變您這個文件的權限，請點擊 \"".L_BTN4."\" 按鈕後 chmod 操作，為了讓安裝程序知道該文件是可寫的！");
define("L_P2_HINT4", "這個文件 \"config/config.lib.php\" 是可寫入的。 請填好這張表格的值，將被直接存儲在文件中。");
define("L_P3_HINT1", "回到前一頁，改變值。如果安裝程序無法創建數據庫，請自己創建它。");
define("L_P3_HINT2", "這裡是你的配置結果，需要自行複製貼到 \"config/config.lib.php\" 檔案。 請從下面的訊息框選擇所有文字，將它複製並貼到您喜歡的文本編輯器 (例如. Notepad++)。 將該文件儲存為 config.lib.php (確保類型是所有類型，不是純文字文件) 並把文件上傳到您的 ftp-server 上 \"config\" 目錄中。");
define("L_P3_HINT3", "然後，你必須創建一個管理員帳戶，就能訪問 phpMyChat 的後台管理面板。");
define("L_P3_HINT4", "您的 \"config/config.lib.php\" - 檔案：");
define("L_P3_HINT5", "無法打開 \"config/config.lib.php\" 編寫！");
define("L_P3_HINT6", "回到前一頁，改變值。這個文件是無法寫入的。");
define("L_P3_HINT7", "現在，你必須創建一個管理員帳戶，就能訪問後台管理phpMyChat的面板。");
define("L_P3_HINT8", "您的變更已儲存。");
define("L_P3_HINT9", "附註：此用戶帳戶擁有後台管理面板及聊天室的所有管理及使用權限！");
define("L_P3_BTN1", "選擇全部");
define("L_P4_HINT1", "你的主要管理員帳戶已創建。");
define("L_P4_HINT2", "你準備好登陸管理面板和改變你phpMyChat SEVER的設置。也有一些其他選項，幫助您管理聊天室，用戶，信息和其它更多的。利用現有的設定連結，以便隨時訪問管理面板
。");
define("L_P4_HINT3", "已完成安裝過程。 點擊 \"".L_BTN5."\" 跳轉到聊天的登錄頁面或關閉此窗口，離開這個安裝程序。");
define("L_P4_HINT4", "安裝腳本已經 chmoded 你所需要的文件，並刪除這個安裝腳本了。 請確定該文件 \"install/install.php\" 已從您的Web服務器被刪除！ 如果沒有，請自行刪除它。");
define("L_P1_OP01", "新安裝");
define("L_P1_OP02", "升級從 %s");
define("L_P1_OP03", "資料庫沒有變動");
define("L_P0_FORM1", "FTP 主機地址");
define("L_P0_FORM2", "FTP 用戶名稱");
define("L_P0_FORM3", "FTP 密碼");
define("L_P0_FORM4", "FTP 根目錄路徑（相對）");
define("L_P2_FORM01", "資料庫-主機 用於 phpMyChat host");
define("L_P2_FORM02", "資料庫-用戶名 用於 phpMyChat");
define("L_P2_FORM03", "資料庫-密碼 用於 phpMyChat");
define("L_P2_FORM04", "資料庫-名稱 用於 phpMyChat");
define("L_P2_FORM05", "數據庫類型");
define("L_P2_FORM06", "表頭 用於訊息");
define("L_P2_FORM07", "表頭 用於使用者在聊天");
define("L_P2_FORM08", "表頭 用於註冊使用者");
define("L_P2_FORM09", "表頭 用於封禁用戶");
define("L_P2_FORM10", "表頭 用於組態");
define("L_P2_FORM11", "表頭 用於潛水者");
define("L_P2_FORM12", "重命名你的管理員logs文件夾");
define("L_P2_FORM13", "如果您打算使用集成模塊 phpMyChat PHPNuke的或PHPBB，configuration 配置表必須調用 \"c_config\" 跟 table for registered users 必須調用 \"c_reg_users\"！");
define("L_P2_FORM14", "選擇一個難以猜測到的名字！");
define("L_P2_FORM15", "您的聊天服務器的名稱");
define("L_P2_FORM16", "統計表");
define("L_P3_FORM1", "管理員帳戶的名稱");
define("L_P3_FORM2", "管理員帳戶的密碼");
define("L_P3_FORM3", "驗證密碼");
define("L_P3_FORM4", "聯絡姓名 用於電子郵件");
define("L_P3_FORM5", "聯絡地址 用於電子郵件");
define("L_P3_FORM6", "聊天網址 用於電子郵件");
define("L_P4_FORM1", "開啟管理面板");
define("L_P4_FORM2", "可選，你還可以安裝一個bot(機器人，虛擬用戶)到您的聊天室，因此它可以增加一些樂趣在你的聊天室。 可以做到這一點，但是這是最佳時間來做這件事。 如果你點擊下面的鏈接，請不要阻止腳本在新的彈出窗口中運行
！");
define("L_P4_FORM3", "安裝 Bot");
?>