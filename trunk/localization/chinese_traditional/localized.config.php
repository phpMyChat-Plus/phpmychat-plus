<?php
// File : chinese_traditional/localized.config.php - plus version （17.02.2013 - rev.1）
// Translated by clouds_music <clouds.music@gmail.com>
// Do not use ' but use ’ instead （utf-8 edit bug）

//Configuration Global used variables
define("A_CONFSAVE", "儲存變更的設定");
define("A_CONFOPTIONAL", "可選的");
define("A_CONFREQUIRED", "需要");
define("A_CONFNOTSEND", "不傳送");
define("A_CONFSEND", "傳送");
define("A_CONFUNRESTRICT", "無限制");
define("A_CONFRESTRICT", "僅限");
define("A_CONFHIDE", "隱藏");
define("A_CONFSHOW", "顯示");
define("A_CONFHINT", "提示：%s");
define("A_CONFIMPORTANT", "重要的是：%s");
define("A_CONFNOTE", "注：%s");
define("A_CONFHERE", "點擊這裡");
define("A_CONFWIDTH", "寬");
define("A_CONFHEIGHT", "高");
define("A_CONFPX", "px."); #pixels
define("A_CONFBOT", "BOT");
define("A_CONFRDQ", "隨機引用");

//Navigation Menu
define("A_CONF_0", "一般設定");
define("A_CONF_1", "聊天服務器數據");
define("A_CONF_2", "語言");
define("A_CONF_3", "業主數據");
define("A_CONF_4", "註冊");
define("A_CONF_5", "功能");
define("A_CONF_6", "時序");
define("A_CONF_7", "打開附表");

define("A_CONF_26", "界面");
define("A_CONF_8", "登錄版面");
define("A_CONF_9", "室及外觀");
define("A_CONF_10", "顏色");
define("A_CONF_11", "音效設定");
define("A_CONF_12", "髒話");
define("A_CONF_13", "上傳管理");

define("A_CONF_14", "特色與外掛");
define("A_CONF_15", "私人訊息");
define("A_CONF_16", "機器人設定");
define("A_CONF_17", "指令");
define("A_CONF_18", "多媒體");
define("A_CONF_19", "快速功能表");
define("A_CONF_20", "頭像 & Gravatars");
define("A_CONF_21", "日誌外掛");
define("A_CONF_22", "潛水外掛");
define("A_CONF_23", "隨機引用");
define("A_CONF_24", "隱身控制");
define("A_CONF_25", "生日外掛");

define("A_CONF_27", "幫助和支援");
define("A_CONF_28", "下載網頁");
define("A_CONF_29", "鏡像網頁");
define("A_CONF_30", "項目頁");
define("A_CONF_31", "項目SVN頁");
define("A_CONF_32", "支援組頁面");
define("A_CONF_33", "閱讀 %s 發行 附註"); //%s = version //Read %s Release notes
define("A_CONF_35", "%s 下載"); //%s = version
define("A_CONF_36", "線上常見問題");
define("A_CONF_37", "試試我的伺服器");
define("A_CONF_38", "提交您的 反饋"); //Submit your feedback
define("A_CONF_39", "願意捐贈？");
define("A_CONF_40", "發行日期：\\n%s"); //%s = date
define("A_CONF_41", "Plus 開發人員： %s"); //%s = developer name
define("A_CONF_42", "Big thanks to all the contributors\\nto the phpHeaven Team work\\nand the phpMyChat groups on\\nYahoo！ and Sourceforge.\\n\\nThank you for using our work！");
define("A_CONF_43", "這是什麼？");
define("A_CONF_44", "關於 Plus");

define("A_CONF_46", "首頁");
define("A_CONF_46a", "滾動家");
define("A_CONF_47", "儲存");
define("A_CONF_47a", "跳轉到保存按鍵按鈕");

//Content - Errors Success
define("A_CONF_ERR_1", "組態設定已成功更改！");
define("A_CONF_ERR_2", "Don’t forget to change remotely the name of %s directory to %s<br />（and set its attributes to <b>777</b>）"); // %s = folder names （old|new）
define("A_CONF_ERR_3", "下載 %s 更新，%s。"); //%s = version | here （url）
define("A_CONF_ERR_4", "下載 %s 更新"); //%s = version
define("A_CONF_ERR_5", "上次最後儲存這些設定 on %s by %s！");  //%s = date | admin username //These settings were last saved on %s by %s
define("A_CONF_ERR_6", "您必須輸入一個用戶名，為你的 %s！"); //%s = Bot/Quote word
define("A_CONF_ERR_7", "只允許這些額外的字符：");
define("A_CONF_ERR_8", "空格，逗號或反斜線 （\\） 不允許。<br />檢查該語法 %s 的名稱 %s！"); //%s = Bot/Quote word | （Bot/Quote names）
define("A_CONF_ERR_9", "發現不能使用的字，在 隨機引用 的用戶名裡 %s %s！"); //%s = Bot/Quote word | （Bot/Quote names） //Banished word found in the %s name %s！
define("A_CONF_ERR_10", "這是隨機引用的名稱 %s %s 已被註冊。<br />請選擇另一個名稱！"); //%s = Bot/Quote word | （Bot/Quote names） //The name of your %s %s is already registered.<br />Choose another name！
define("A_CONF_ERR_11", "如果更改此設置，同時也有用戶登錄，您的所有用戶必須重新載入他們的瀏覽器或退出並重新登錄。如果您啟用/禁用此，將被自動發送到所有房間的一個公告。");

//Content - Title
define("A_CONFTITLE_0", "設定頁");
define("A_CONFTITLE_1", "配置選項");
define("A_CONFTITLE_2", "當前設定");

//Content - Chat Server Data
define("A_CONFCONTENT_1", "在服務器上啟用自動在線更新檢查。");
define("A_CONFCONTENT_2", "這個腳本可以自動檢查新版本： ciprianmp.com/latest/ 或 svn.sourceforge.net！");
define("A_CONFCONTENT_3", "啟用統計的信息在聊天室。");
define("A_CONFCONTENT_4", "如果您的服務器的帶寬確實有限，或您發現您的服務器超載，您應禁用這個外掛！");
define("A_CONFCONTENT_5", "舊郵件清理時間。");
define("A_CONFCONTENT_7", "不活動的用戶在房間的自動啟動時間。");
define("A_CONFCONTENT_8", "此自動引導功能，強迫用戶活躍在房間。如果他們想成為潛伏的，他們應該只使用潛伏頁。管理員，主持人和離開用戶不會被啟動。");
define("A_CONFCONTENT_10", "刪除此時段內不活躍註冊用戶帳戶 （0 永遠不會）。");

//Content - Languages
define("A_CONFCONTENT_12", "用於聊天室的預設語言。");
define("A_CONFCONTENT_12a", "語言國旗選擇器");
define("A_CONFCONTENT_13", "英文格式（標誌和日期和時間格式）。");
define("A_CONFCONTENT_13a", "英語區域設置格式");
define("A_CONFCONTENT_14", "允許用戶選擇一個可用的語言譯本。");
define("A_CONFCONTENT_14_1", "僅預設");
define("A_CONFCONTENT_14_2", "所有可用的");
define("A_CONFCONTENT_15", "國旗的圖像類型。");
define("A_CONFCONTENT_15a", "國旗格式");
define("A_CONFCONTENT_15b", "2D （老）");
define("A_CONFCONTENT_15c", "3D （新）");

//Content - Owner data
define("A_CONFCONTENT_16", "要發送電子郵件標題，輸入管理員的真實姓名（或聊天的名稱）。");
define("A_CONFCONTENT_17", "輸入管理員的電子郵件在發送電子郵件標題。");
define("A_CONFCONTENT_18", "這信箱也用在接受新用戶註冊的通知。");
define("A_CONFCONTENT_19", "輸入您的聊天網址在發送電子郵件標題。");
define("A_CONFCONTENT_20", "輸入您的電子郵件的預設結尾問候語。");
define("A_CONFCONTENT_21", "這僅用於管理員發送電子郵件表格 \"".A_MENU_4."\"。"); //This is used only by admins in the \"".A_MENU_4."\" sheet.
define("A_CONFCONTENT_22", "公共聊天服務器名稱，你想在網絡上稱為。");
define("A_CONFCONTENT_23", "LOGO 圖片路徑。");
define("A_CONFCONTENT_23_1", "隱藏 LOGO");
define("A_CONFCONTENT_23_2", "顯示 LOGO");
define("A_CONFCONTENT_24", "LOGO 的圖像顯示（允許絕對或相對路徑） - 例如 http://path_to_the_image.jpg 或 ./../path_to_the_image.jpg");
define("A_CONFCONTENT_25", "（path_to_the_image.jpg 可以是任何可訪問圖像/從網上 - .jpg，.gif，.bmp，.png）");
define("A_CONFCONTENT_26", "網站 被打開網址（在新窗口打開）。");
define("A_CONFCONTENT_27", "LOGO 在鼠標懸停要顯示的文字 （ALT/TITLE 屬性）。");

//Content - Registration
define("A_CONFCONTENT_28", "讓註冊用於您的聊天系統。");
define("A_CONFCONTENT_29", "禁用此唯一的，如果你想手動添加註冊用戶，或閱讀 <a href=#reg_hint class=\"ChatLink\">提示</a> 使其自動等待您的批准下文。");
define("A_CONFCONTENT_30", "需要註冊才能加入聊天。");
define("A_CONFCONTENT_31", "註冊和設定檔上需要填姓氏和名字。");
define("A_CONFCONTENT_32", "自動生成密碼（並通過電子郵件發送到新的註冊用戶）。");
define("A_CONFCONTENT_33", "生成和通過電子郵件發送密碼的長度。");
define("A_CONFCONTENT_34", "新註冊用戶發送帳戶的詳細資料。");
define("A_CONFCONTENT_35", "新用戶註冊傳送帳戶的詳細資料（通知）給管理員。");
define("A_CONFCONTENT_37", "到這最好的設置，如果你想控制誰註冊和進入您的聊天室：");
define("A_CONFCONTENT_38", "允許註冊用於您的聊天室：");
define("A_CONFCONTENT_39", "需要註冊加入聊天：如果 %s 設置，只有註冊用戶才能夠登錄到聊天室"); // %s = Required
define("A_CONFCONTENT_41", "產生密碼並發電子郵件給新註冊用戶：");
define("A_CONFCONTENT_42", "傳送新註冊用戶帳戶的詳細資料：");
define("A_CONFCONTENT_43", "傳送新用戶註冊帳戶的詳細資料（通知）給管理員：");
define("A_CONFCONTENT_44", "因此，用戶將選擇自己所需的數據，將生成一個隨機密碼，但用戶將不會收到電子郵件與密碼，所以他仍然無法登錄;他只會得到有關未決註冊的通知郵件。");
define("A_CONFCONTENT_45", "在同一時間，管理員將收到 <u>2 電子郵件</u>：");
define("A_CONFCONTENT_46", "1。 是一份登記數據，用於管理員的將來參考（如用戶忘記密碼時）。這總是以英文發送郵件；");
define("A_CONFCONTENT_47", "2。 是電子郵件，其中包含新創建的帳戶的隨機密碼和其餘的資料（此電子郵件已經準備要發送/轉發給用戶，如果該帳戶被批准）。此電子郵件編寫將選擇於登記用戶語言。");
define("A_CONFCONTENT_48", "該管理員驗證誰是這個人，用戶提供了什麼資料。如果他決定批准該用戶帳戶，管理員只會有第二封電子郵件轉發到該用戶的電子郵件（電子郵件地址已經被格式化審批）。另一種方法是去 \"".L_REG_4."\" 和發送電子郵件登錄到該用戶的電子郵件資料。或者，管理員甚至可以用該名稱/密碼登錄在“編輯個人資料” 形成和調整/修改資料/密碼。"); //%s = tab name
define("A_CONFCONTENT_50", "不要忘記放你正確的管理員電子郵件 %s，以完成以上所有這些工作）。同時要考慮到非公開（限制性，私人），這些設置會變成您的聊天服務器。如果你忽略了未能驗證和批准帳戶，用戶也許就放棄不回來了。"); //%s = here （url）

//Content - Functionality
define("A_CONFCONTENT_53", "啟用驅逐功能，並定義這延遲到它。");
define("A_CONFCONTENT_54", "0 = 已禁用，任意整數 = 驅逐天數");
define("A_CONFCONTENT_55", "驅逐類型。");
define("A_CONFCONTENT_56", "禁止 IP 和用戶名同時進行或僅用 IP。");
define("A_CONFCONTENT_57", "- 第一個選項將禁止從一個共享IP的用戶名，被禁止的用戶來時非常有用，從一個共享的IP地址或父母控制之用 （例如：當一個共享的電腦 / 訪問點是一個孩子使用）；");
define("A_CONFCONTENT_58", "- 第二個選項將禁止所有的用戶名試圖登錄來自同一個 IP（更有效）。");
define("A_CONFCONTENT_59", "通過IP和用戶名");
define("A_CONFCONTENT_60", "僅根據IP");
define("A_CONFCONTENT_61", "在郵件中使用圖形表情符號。");
define("A_CONFCONTENT_62", "沒有表情圖");
define("A_CONFCONTENT_63", "顯示表情圖");
define("A_CONFCONTENT_64", "保持郵件中的 HTML tags。");
define("A_CONFCONTENT_65", "<b>簡單</b>：保持粗體，斜體和下劃線標記；<b>沒有</b>：無保留");
define("A_CONFCONTENT_66", "簡單");
define("A_CONFCONTENT_67", "沒有");
define("A_CONFCONTENT_68", "顯示丟棄的 HTML tags。");
define("A_CONFCONTENT_69", "移除廢棄的 tags");
define("A_CONFCONTENT_70", "顯示廢棄的 tags");
define("A_CONFCONTENT_71", "啟用發布鏈路保護通過打開鏈接在一個彈出窗口中。");
define("A_CONFCONTENT_72", "假如 啟用，一個額外的窗口將被打開 與所有張貼的鏈接列表在一個用戶的訊息。此選項可以保證額外的保護您的聊天室。");
define("A_CONFCONTENT_73", "直接從聊天中打開鏈接");
define("A_CONFCONTENT_74", "打開鏈接在一個彈出窗口");
define("A_CONFCONTENT_75", "默認消息滾動順序。");
define("A_CONFCONTENT_76", "（僅適用於 \"non-H\" 瀏覽器 -  IE 或 Firefox 以外的其他）");
define("A_CONFCONTENT_77", "這些用戶也可以使用 \"/order\" 命令來改變滾動順序。");
define("A_CONFCONTENT_78", "最後在上面");
define("A_CONFCONTENT_79", "最後在底部");
define("A_CONFCONTENT_80", "進入聊室首先顯示的訊息的默認數量。");
define("A_CONFCONTENT_81", "從來沒有設置這 <b>\"0\"</b>；你可以將它設置到最低 <b>\"1\"</b> 但你必須啟用至少一個 <b>接下來的兩個設置</b>。<br />如果你想保留兩集 \"通知\" 和 \"顯示\"，這裡的值<b>必須至少有 \"2\"</b>。");
define("A_CONFCONTENT_82", "用戶還可以使用 /show \"n\" 或 /last \"n\" 命令來查看不同的數量。");
define("A_CONFCONTENT_83", "顯示每個用戶在聊天室的 進入/退出 的通知。");
define("A_CONFCONTENT_84", "沒有通知");
define("A_CONFCONTENT_85", "通知房間");
define("A_CONFCONTENT_86", "顯示歡迎詞，當用戶進入聊天室。");
define("A_CONFCONTENT_87", "沒有歡迎訊息");
define("A_CONFCONTENT_88", "顯示歡迎訊息");
define("A_CONFCONTENT_89", "說明/求助裡 表情符號的每行數量。");
define("A_CONFCONTENT_90", "smilie_popup 表情符號的每行數量。");
define("A_CONFCONTENT_91", "顯示幫助彈出聊天規則上的交談禮儀（聊天的規則）。");
define("A_CONFCONTENT_92", "隱藏禮儀");
define("A_CONFCONTENT_93", "顯示禮儀");
define("A_CONFCONTENT_94", "離開連結類型。");
define("A_CONFCONTENT_96", "Exit 鏈接");
define("A_CONFCONTENT_97", "離開 滾動門");
define("A_CONFCONTENT_95", "\"".A_CONFCONTENT_96."\" 代表原出口鏈路，\"".A_CONFCONTENT_97."\" 一扇門的形象代表門滾動。");
define("A_CONFCONTENT_98", "設置你希望你的用戶可以使用註冊/登錄。");
define("A_CONFCONTENT_99", "這是默認的字符集：%s 登錄測試，這不會破壞你聊天室的佈局/功能。"); //%s = list of allowed characters
define("A_CONFCONTENT_101", "不允許這些字符，他們會破壞登錄後聊天頁面：驚嘆號，斜線，反斜線，逗號，空格，單引號和雙引號和 方形（盒）括號 （<b>! / \ , ' \" [ ]</b>）。");
define("A_CONFCONTENT_102", "雖然他們不會打破任何東西，它似乎 / ; 不能禁止從正在使用的登錄名。$ 符號尚未被深深測試，但它也應避免，因為它通常為PHP變量。");

//Content - Timings
define("A_CONFCONTENT_103", "在狀態欄上的時區偏移和世界時間。");
define("A_CONFCONTENT_104", "- 聊天服務器的時間和所需的位置之間的差異 （小時 - 整數）");
define("A_CONFCONTENT_105", "例如：如果我的伺服器託管在美國 - CST（-6），但聊天是在布加勒斯特位於羅馬尼亞的社區 - EET（+2），我可能想顯示我的羅馬尼亞用戶在正確的時間聊天。對於這一點，我必須將此值設置為8。也不允許負值。");
define("A_CONFCONTENT_106", "編輯 \"lib/worldtime.lib.php\" 添加您自己的城市（經絡） - 僅適用於世界時間模式！");
define("A_CONFCONTENT_107", "服務器時間（標準）");
define("A_CONFCONTENT_108", "在聊天室只有世界時間（新）");
define("A_CONFCONTENT_109", "世界時間在首頁及聊天室");
define("A_CONFCONTENT_110", "顯示時間戳記在訊息前端。");
define("A_CONFCONTENT_111", "（同時顯示服務器時間在狀態欄）");
define("A_CONFCONTENT_112", "沒有時間戳記在交談中");
define("A_CONFCONTENT_113", "顯示時間戳記在交談中");
define("A_CONFCONTENT_114", "每次更新之間的默認超時。");
define("A_CONFCONTENT_116", "回訪的訪客計數器。");
define("A_CONFCONTENT_117", "它將返回一個註冊用戶多少次算聊天，個人資料頁上顯示的計數器 - WHOIS彈出查詢。");
define("A_CONFCONTENT_118", "沒有計數器在資料");
define("A_CONFCONTENT_119", "計算每次登錄");
define("A_CONFCONTENT_120", "每小時一個計數");
define("A_CONFCONTENT_121", "每天一個計數");
define("A_CONFCONTENT_122", "每週一個計數");

//Content Chat Schedule
define("A_CONFCONTENT_123", "開放時間安排為您的聊天和會議室。");
define("A_CONFCONTENT_124", "這個 mod 是仍在發展！日程表中的字段已刻意的禁用。");
define("A_CONFCONTENT_125", "每天的日程：");
define("A_CONFCONTENT_126", "週日時間表：");
define("A_CONFCONTENT_127", "週一時間表：");
define("A_CONFCONTENT_128", "週二時間表：");
define("A_CONFCONTENT_129", "週三時間表：");
define("A_CONFCONTENT_130", "週四時間表：");
define("A_CONFCONTENT_131", "週五時間表：");
define("A_CONFCONTENT_132", "週六時間表：");
define("A_CONFCONTENT_132a", "班");

//Content Login Layout
define("A_CONFCONTENT_133", "填寫登入頁面的背景。");
define("A_CONFCONTENT_134", "背景未填充");
define("A_CONFCONTENT_135", "填充背景");
define("A_CONFCONTENT_136", "顯示背景圖像在索引頁上。");
define("A_CONFCONTENT_137", "填補房間背景圖像，你需要編輯所需的樣式和添加 BODY.frame 和 framePreview 屬性 \"<b>background-image： url('path_to_the_image');</b>\" （允許絕對或相對路徑） - 例如 http://path_to_the_image.jpg 或 ./../path_to_the_image.jpg - 樣本在 style12.css.php。可選擇，BODY.mainframe 可用於顯示圖像的背景的信息框架 （但這個圖像就要被淘汰了，作出發布的文本瀏覽）。");
define("A_CONFCONTENT_138", "（path_to_the_image.jpg 可以是任何圖像 訪問 on/從網上 - .jpg, .gif, .bmp, .png）");
define("A_CONFCONTENT_139", "沒有背景圖片");
define("A_CONFCONTENT_140", "顯示在登入頁面");
define("A_CONFCONTENT_141", "圖片的路徑：");
define("A_CONFCONTENT_142", "顯示刪除連結在首頁。");
define("A_CONFCONTENT_143", "（允許用戶刪除自己的個人資料）");
define("A_CONFCONTENT_144", "隱藏刪除連結");
define("A_CONFCONTENT_145", "顯示刪除連結");
define("A_CONFCONTENT_146", "顯示管理連結於首頁。");
define("A_CONFCONTENT_147", "（一個連結打開這個管理面板）");
define("A_CONFCONTENT_148", "隱藏管理連結");
define("A_CONFCONTENT_149", "顯示管理連結");
define("A_CONFCONTENT_150", "顯示幫助的連結於index頁面。");
define("A_CONFCONTENT_151", "隱藏幫助");
define("A_CONFCONTENT_152", "顯示幫助");
define("A_CONFCONTENT_153", "啟用資訊在index頁面。");
define("A_CONFCONTENT_154", "（包含了一些關於聊天的額外功能的詳細信息）");
define("A_CONFCONTENT_155", "隱藏資訊");
define("A_CONFCONTENT_156", "顯示資訊");
define("A_CONFCONTENT_157", "顯示可用的額外命令。");
define("A_CONFCONTENT_158", "隱藏額外的命令");
define("A_CONFCONTENT_159", "顯示額外的命令");
define("A_CONFCONTENT_160", "列出你的額外命令。");
define("A_CONFCONTENT_161", "如果他們是太長的時候，保持 空格分開 並用 / 分割線。");
define("A_CONFCONTENT_162", "顯示其他額外的功能/可用的外掛。");
define("A_CONFCONTENT_163", "隱藏額外的功能");
define("A_CONFCONTENT_164", "顯示額外的功能");
define("A_CONFCONTENT_165", "列出你的額外的功能/外掛。");
define("A_CONFCONTENT_167", "D顯示機器人的名稱（如果可用）。");
define("A_CONFCONTENT_168", "隱藏機器人的名稱");
define("A_CONFCONTENT_169", "顯示機器人的名稱");
define("A_CONFCONTENT_170", "顯示計數器（訪問者點擊）在index頁面。");
define("A_CONFCONTENT_171", "停用計數器");
define("A_CONFCONTENT_172", "顯示計數器");
define("A_CONFCONTENT_173", "顯示所有者/站長 聊天資訊在index頁面（下方的版權連結）。");
define("A_CONFCONTENT_174", "它跟您所輸入在註冊部分名稱/文本 相同");
define("A_CONFCONTENT_175", "管理員名稱");
define("A_CONFCONTENT_176", "隱藏所有者");
define("A_CONFCONTENT_177", "顯示所有者");
define("A_CONFCONTENT_178", "編輯聊天的安裝日期。");

//Content Rooms & Skins
define("A_CONFCONTENT_179", "啟用外觀 mod 在房間。");
define("A_CONFCONTENT_181", "假如 已禁用，skin1 成為默認（設置在首個公眾室上面）。如果 啟用，每個房間都可以有它自己的外觀。");
define("A_CONFCONTENT_182", "僅默認外觀");
define("A_CONFCONTENT_183", "外觀 Mod 啟用");
define("A_CONFCONTENT_184", "外觀預覽頁");
define("A_CONFCONTENT_185", "供用戶選擇的房間類型。");
define("A_CONFCONTENT_186", "只有第一個房間 內部公開預設的；");
define("A_CONFCONTENT_187", "所有預設房間，但不能創建房間；");
define("A_CONFCONTENT_188", "所有的房間，及創建新的。");
define("A_CONFCONTENT_189", "只有第一個房間");
define("A_CONFCONTENT_190", "所有預設房間");
define("A_CONFCONTENT_191", "所有及創建新房間");
define("A_CONFCONTENT_192", "第一個公開房間的名稱 （also <u>default</u> 假如 0 被選中高於或沒有用戶的選擇從列表中）。");
define("A_CONFCONTENT_193", "雖然禁用是可能的，這第一個房間，在任何時候都應該啟用和不受限制。（這也是人們不要從登錄頁面中選擇一個默認的房間。）");
define("A_CONFCONTENT_194", "（適用於所有的公共房間）：如果限制，雖然房間是公開的，只有管理員，超級版主和\"".A_MENU_1."\"表中設置的用戶將能夠加入這個房間。潛伏頁的公共檔案館將不包含任何提交受限房間的職位。");
define("A_CONFCONTENT_195", "第二個公開房間名稱。");
define("A_CONFCONTENT_196", "第三個公開房間名稱。");
define("A_CONFCONTENT_197", "第四個公開房間名稱。");
define("A_CONFCONTENT_198", "第五個公開房間名稱。");
define("A_CONFCONTENT_199", "第一個私人房間名稱。");
define("A_CONFCONTENT_200", "這是顯示在登錄時，只有管理員。");
define("A_CONFCONTENT_201", "第二個私人房間名稱（同時默認情況下，如果沒有選）。");
define("A_CONFCONTENT_203", "T第三私人房間名稱。");
define("A_CONFCONTENT_204", "這是顯示在登錄到所有的高級用戶（適合\"職員唯一\"房間）。");
define("A_CONFCONTENT_205", "第四私人房間名稱。");
define("A_CONFCONTENT_206", "這是顯示登錄到所有用戶的默認（適合\"支援\"房間）。");
define("A_CONFCONTENT_207", "顯示默認索引頁上的私人房間。");
define("A_CONFCONTENT_208", "並非所有的包房，將顯示所有用戶的選擇（見接下來的兩個設置）。");
define("A_CONFCONTENT_209", "此選項只會讓<b>管理員</b>看到所有預設的包房，但 <u><b>需要</b></u> 到接下來的兩個設置工作。");
define("A_CONFCONTENT_210", "顯示默認索引頁上的私人房間到版主。");
define("A_CONFCONTENT_211", "版主將只能看到房間8和第9（職員和支援類型）。");
define("A_CONFCONTENT_212", "需要設置 no.1！");
define("A_CONFCONTENT_213", "顯示默認索引頁上的私人房間到普通用戶。");
define("A_CONFCONTENT_214", "非權力用戶（包括客人）將只能看到房間9（支援）。");

//Content Colors
define("A_CONFCONTENT_216", "启用 不同颜色名称在用户列表 和/或 文章。");
define("A_CONFCONTENT_219", "斜體權力用戶名在用戶列表。");
define("A_CONFCONTENT_218", "如果启用，用户可以设置自己的个人色彩，在用户用于他们的用户名列出唯一。<br />如果已禁用，管理员将显示在<a class=\"admin\">红色</a>和主持人在<a class=\"mod\">蓝色</a>（其预设权力颜色在 skins/styleN.css.php），只有\"".A_CONFCONTENT_219."\"启用下。");
define("A_CONFCONTENT_220", "此選項允許您選擇顯示或沒有誰是你聊天的管理員和版主（這不會改變任何權力，它不僅使管理/主持 名稱不同或不 - 斜體 - 從普通用戶）。");
define("A_CONFCONTENT_221", "這也適用於顏色的名稱，顯示或管理員在<a class=\"admin\">紅色</a>跟主持人在<a class=\"mod\">藍色</a>（其預設權力顏色在 skins/styleN.css.php）or，如果要彩色的名稱啟用上面，%s and %s（其預設權力顏色選擇以下）。"); //%s = red | blue
define("A_CONFCONTENT_224", "不顯示斜體/顏色");
define("A_CONFCONTENT_225", "顯示斜體/顏色");
define("A_CONFCONTENT_226", "設置權力用戶張貼標籤的文本。");
define("A_CONFCONTENT_227", "此選項允許您設置權力用戶能夠張貼標籤的文本（粗體，斜體，下劃線或它們的任意組合）。");
define("A_CONFCONTENT_228", "它僅適用於上面的設置，如果設置\"".A_CONFCONTENT_225."\"。只有B，I或/和U允許（不區分大小寫）。任何其他字母/字符將不會被保存。值必須用逗號隔開（如果多於一個）。");
define("A_CONFCONTENT_229", "範例：b,i,u （或 b,i 或 b 或 u,b）");
define("A_CONFCONTENT_230", "顏色過濾器在發文。");
define("A_CONFCONTENT_231", "如果啟用，所有的用戶可以使用任何顏色，如果沒有，他們可以使用除下文所載的權力色彩。");
define("A_CONFCONTENT_232", "設置使用的權力顏色由管理員唯一（第一為默認）。");
define("A_CONFCONTENT_233", "這適用於發布消息的顏色為主，但如果顏色名稱啟用上面，它也將適用於名稱顏色。");
define("A_CONFCONTENT_234", "設置權力顏色 只能用於主持人（第一為默認）。");
define("A_CONFCONTENT_236", "管理員也可以使用這些顏色，但其他用戶不能。");
define("A_CONFCONTENT_237", "允許遊客使用顏色。");
define("A_CONFCONTENT_238", "如果已禁用，未註冊的用戶在自己的發言上，將只能使用默認顏色在房間。這將鼓勵他們註冊（希望）。");
define("A_CONFCONTENT_239", "不允許顏色供遊客");
define("A_CONFCONTENT_240", "允許顏色供遊客");

//Content Sound Settings
define("A_CONFCONTENT_241", "於入口處播放聲音。");
define("A_CONFCONTENT_242", "整個房間通知");
define("A_CONFCONTENT_243", "歡迎只有用戶");
define("A_CONFCONTENT_244", "通知及歡迎（1&2）");
define("A_CONFCONTENT_245", "在入口處演奏聲音的路徑（只能用.wav副檔名）。");
define("A_CONFCONTENT_246", "範例：sounds/beep.wav（您還可以使用 長/遠程 網址）");
define("A_CONFCONTENT_247", "在進入：");
define("A_CONFCONTENT_248", "在歡迎：");
define("A_CONFCONTENT_249", "播放蜂鳴聲在 /buzz 命令。");
define("A_CONFCONTENT_250", "（或只是顯示[BUZZ]消息，沒有任何聲音）");
define("A_CONFCONTENT_251", "沒有BUZZ的聲音");
define("A_CONFCONTENT_252", "播放BUZZ的聲音");
define("A_CONFCONTENT_253", "要播放的路徑聲路徑（只能用.wav副檔名）。");
define("A_CONFCONTENT_254", "範例：sounds/chimedwn.wav（你也可以使用 長/遠程 網址）");

//Content Profanity
define("A_CONFCONTENT_255", "啟用髒話過濾。");
define("A_CONFCONTENT_256", "（更換張貼的髒話與下面的字符的話）");
define("A_CONFCONTENT_257", "允許髒話");
define("A_CONFCONTENT_258", "不允許髒話");
define("A_CONFCONTENT_259", "表達式替換髒話。");
define("A_CONFCONTENT_260", "房間名稱允許髒話字（避免過濾器）。");
define("A_CONFCONTENT_261", "您必須輸入房間的確切名稱。<a href=#roomnames class=\"ChatLink\">".A_CONFHERE."</a>檢查你的房間名稱。");

//Content Private messaging
define("A_CONFCONTENT_263", "啟用耳語（私人訊息）系統。");
define("A_CONFCONTENT_264", "如果已禁用，只有公共信息將被允許在聊天張貼。");
define("A_CONFCONTENT_265", "啟用彈出耳語（私人信息）系統。");
define("A_CONFCONTENT_266", "如果啟用，遊客不會接受到彈出的 PMS - 他們必須註冊。");
define("A_CONFCONTENT_267", "每個註冊用戶可以自己配置私敲是否彈出視窗顯示。");
define("A_CONFCONTENT_269", "離線的項目經理無論如何將始終顯示在彈出（否則，收件人不會被通知新的PMs）。");
define("A_CONFCONTENT_270", "允許用戶從數據庫中刪除自己（收到）項目經理。");
define("A_CONFCONTENT_271", "如果啟用，用戶將能夠選擇和刪除他們收到的私人訊息。");
define("A_CONFCONTENT_272", "不允許 PM 刪除");
define("A_CONFCONTENT_273", "允許 PM 刪除");
define("A_CONFCONTENT_274", "多久時間清理未讀離線的私人訊息。");
define("A_CONFCONTENT_275", "如果收件人不登錄到聊天，在此區間，這些舊型私人郵件被自動刪除從數據庫中 （他們不會被導出到日誌歸檔，所以舊的未讀項目經理會丟失）。");

//Content Bots settings
define("A_CONFCONTENT_276", "啟用機器人在聊天。");
define("A_CONFCONTENT_277", "以下改變任何的BOT設置之前，請停止機器人，如果它運行在聊天（你將無法踢它出事後，因為它被設置為admin）。");
define("A_CONFCONTENT_278", "啟用聊天BOT公開對話。");
define("A_CONFCONTENT_279", "如果禁用此，機器人只會聽和用戶使用私人信息，在聊天交談。");
define("A_CONFCONTENT_280", "只有私人機器人");
define("A_CONFCONTENT_281", "公開機器人");
define("A_CONFCONTENT_282", "輸入您的BOT想要的名稱。");
define("A_CONFCONTENT_283", "確保 BOT是滿載之前，請不要更改名稱（檢查它是否可以在聊天室張貼）： %s ！"); //%s = page name （url）
define("A_CONFCONTENT_284", "你的機器人還沒有被正確加載！閱讀 \"%s\".");
define("A_CONFCONTENT_285", "BOT 狀態和維護。");
define("A_CONFCONTENT_286", "如果你的BOT不正常響應（空消息帖子）和/或 BOT 的 ID <> 1，您可能需要重新載入你的機器人。此操作將清空數據庫中的的BOT表，並重新加載整個腳本。");
define("A_CONFCONTENT_287", "你的BOT沒有裝載到資料庫中。");
define("A_CONFCONTENT_288", "<a href=\"./bot/botloader.php\" target=\"_blank\">".A_CONFHERE."</a> 到裝載它 現在！");
define("A_CONFCONTENT_289", "BOT 的 ID：");
define("A_CONFCONTENT_291", "<a href=\"./bot/botloader.php\" target=\"_blank\" class=\"error\">".A_CONFHERE."</a> 重新加載BOT！");
define("A_CONFCONTENT_292", "輸入BOT回應訊息的顏色。");
define("A_CONFCONTENT_293", "輸入BOT的頭像。");
define("A_CONFCONTENT_294", "只有頭像系統啟用了它才會顯示");
define("A_CONFCONTENT_294a", "BOT頭像");
define("A_CONFCONTENT_295", "輸入被啟動時BOT發布的訓息。");
define("A_CONFCONTENT_296", "避免使用 特殊字符 或設置 它們將不會被保存。");
define("A_CONFCONTENT_297", "輸入在BOT停止時發布的訊息。");

//Content Commands
define("A_CONFCONTENT_299", "用戶可以導出保存 /save 命令訊息的最大數量。");
define("A_CONFCONTENT_300", "0=停用，任何整數=數量 的消息，*=沒有限制");
define("A_CONFCONTENT_301", "每個房間（/topic 或 /topic * 命令）啟用不同的主題。");
define("A_CONFCONTENT_302", "（或只顯示一個默認的，被稱為全球主題）");
define("A_CONFCONTENT_303", "默認的主題應該將在的根據 \"%s\" / per 每個所需的語言編輯，或添加一個默認的全球主題（覆蓋本地化的主題），將它添加到 \"%s\"）.");
define("A_CONFCONTENT_304", "全球主題");
define("A_CONFCONTENT_305", "多重話題");
define("A_CONFCONTENT_306", "輸入 /room 命令的表達。");
define("A_CONFCONTENT_307", "舉例：<font color=red>房間注意事項：</font> 或 <font color=red>解說員說：</font> 或 <font color=red>看這裡：</font> 或 <font color=red>管管說：</font>");
define("A_CONFCONTENT_308", "允許 主持人來使用 /demote 命令。");
define("A_CONFCONTENT_309", "如果設置為第二個選項，主持人就能降級其他主持人 - <font color=red>要非常小心！</font>");
define("A_CONFCONTENT_310", "只有管理員");
define("A_CONFCONTENT_311", "主持人及管理員");
define("A_CONFCONTENT_312", "輸入每個擲骰子的最大數量。");
define("A_CONFCONTENT_313", "使用值小於 99。");
define("A_CONFCONTENT_314", "只需要V.2骰子。請注意，增加這個值太大，會導致到你選擇多少骰子圖像的負載，它可以顯示消息（急劇的非IE瀏覽器的返回延遲）。");
define("A_CONFCONTENT_315", "輸入每個扔​​骰子的最大數量（每個模雙方骰子V.2）");
define("A_CONFCONTENT_316", "在用戶列表的默認排序順序 （/sort 命令）。");
define("A_CONFCONTENT_317", "用戶還可以使用 /sort 命令來改變他們的排序順序。");
define("A_CONFCONTENT_318", "按進入時間");
define("A_CONFCONTENT_319", "按字母順序");
define("A_CONFCONTENT_320", "設置的調整發布使用圖片的最大尺寸 /img 命令。");
define("A_CONFCONTENT_321", "啟用使用者的 /math 數學的命令。");
define("A_CONFCONTENT_322", "此選項允許您張貼使用LaTeX格式MathJax提供的數學公式。");
define("A_CONFCONTENT_323", "這裡是一個 <a href=\"http://www.mathjax.org/demos/tex-samples/\" target=\"_blank\">樣本頁面</a> 從原始mathjax.org網站。你只需要輸入/數學和拷貝和粘貼所需的公式的源代碼。");
define("A_CONFCONTENT_324", "您還可以使用本地配置文件，通過設置合適的源路徑。默認源（SRC）是：<font color=\"blue\"><i>http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML</i></font>");
define("A_CONFCONTENT_325", "插件配置源：");

//Content Multimedia
define("A_CONFCONTENT_326", "啟用使用 /video 指令張貼影片（例如YouTube）。");
define("A_CONFCONTENT_327", "如果 已禁用，只有原始視頻源的鏈接將被張貼在聊天；如果 啟用，任何用戶都可以發布所有用戶可以直接在聊天觀看視頻；設置以 管理員 將只顯示管理員和超級室長張貼的影片，其他用戶發布唯一鏈接到原來的視頻源。");
define("A_CONFCONTENT_328", "只有管理員能");
define("A_CONFCONTENT_329", "設置的視頻播放器的寬度和高度。");
define("A_CONFCONTENT_330", "啟用 the MediaPlayer add-on in chat。");
define("A_CONFCONTENT_331", "選擇正確的格式框架將根據大小（音頻 < 視頻）。");
define("A_CONFCONTENT_333", "假如 啟用，一個有效的流媒體URL也必須在接下來的領域。你可以設置一個靜態的 音頻/視頻 源或 電台播放器 的流媒體服務器。");
define("A_CONFCONTENT_334", "音訊/收音機");
define("A_CONFCONTENT_335", "視頻/電視");
define("A_CONFCONTENT_336", "流媒體的URL路徑。");
define("A_CONFCONTENT_336a", "例如（NASA TV 直播站）：<br />http://playlist.yahoo.com/makeplaylist.dll?id=1369080&segment=149773");

//Content Quick Menu
define("A_CONFCONTENT_337", "對管理員定義快速選單。");
define("A_CONFCONTENT_338", "定義主持人快速選單。");
define("A_CONFCONTENT_339", "定義其他用戶的快速選單。");
define("A_CONFCONTENT_340a", "保持這些字符： <b>|</b> 在每一行結束時，除了最後一個。");
define("A_CONFCONTENT_340", "清空此複選框以禁用管理員的快速選單。");
define("A_CONFCONTENT_341", "清空此複選框來禁用主持人的快速選單。");
define("A_CONFCONTENT_342", "清空此複選框來禁用一般用戶的快速選單。");

//Content Avatars & Gravatars
define("A_CONFCONTENT_343", "啟用 頭像系統。");
define("A_CONFCONTENT_345", "沒有頭像");
define("A_CONFCONTENT_346", "使用頭像");
define("A_CONFCONTENT_347", "顯示變更頭像 （輪廓） 按鈕在輸入欄邊。");
define("A_CONFCONTENT_348", "您的頭像目錄的路徑。");
define("A_CONFCONTENT_349", "輸入頭像號碼要顯示你定義的文件夾。");
define("A_CONFCONTENT_350", "只有第一 %s 頭像將顯示給用戶。"); //%s = number of avatars
define("A_CONFCONTENT_351", "頭像按鍵");
define("A_CONFCONTENT_351a", "性別");
define("A_CONFCONTENT_352", "使用者預設頭像。");
define("A_CONFCONTENT_353", "輸入將顯示的頭像的寬度和高度。");
define("A_CONFCONTENT_354", "通常情況下，一個不錯的佈局，寬度和高度值應該是平等的。");
define("A_CONFCONTENT_355", "允許用戶上傳頭像，從他們的機器。");
define("A_CONFCONTENT_356", "確保 \"images/avatars\" 跟 \"images/avatars/uploaded\" 文件夾存在，並且他們有公開寫入權限 （CHMOD 0777）！");
define("A_CONFCONTENT_357", "不允許上傳");
define("A_CONFCONTENT_358", "允許上傳");
define("A_CONFCONTENT_359", "顯示頭像旁邊的性別圖標。");
define("A_CONFCONTENT_360", "隱藏性別圖標");
define("A_CONFCONTENT_361", "顯示性別圖標");
define("A_CONFCONTENT_362", "啟用 GRAVATARS。");
define("A_CONFCONTENT_363", "<a href=#avatars>頭像系統</a>還必須啟用上面！");
define("A_CONFCONTENT_364", "如果啟用，所有客人將作為默認的 GRAVATAR 頭像。");
define("A_CONFCONTENT_365", "讓用戶決定");
define("A_CONFCONTENT_366", "強制使用 GRAVATARS");
define("A_CONFCONTENT_367", "定義：");
define("A_CONFCONTENT_368", "一個 Gravatar，或 <b>G</b>lobally <b>R</b>ecognized <b>A</b>vatar，是很簡單的頭像圖片後您的網誌，您的名字旁邊出現時，你對此有何評論的gravatar啟用站點。替身幫助確定您的文章在網上論壇，所以為什麼不是網誌。<br />註冊為gravatar.com帳戶是免費的，這是一個電子郵件地址。一旦你簽署了，你可以上傳你的頭像圖片後不久，你就會開始看到它的gravatar啟用網誌（包括本聊天）！");
define("A_CONFCONTENT_369", "（閱讀更多有關Gravatar的 <a href=\"http://www.gravatar.com\" target=\"_blank\">http://www.gravatar.com</a> 位置）");
define("A_CONFCONTENT_370", "Gravatar 的高速緩存設置。");
define("A_CONFCONTENT_371", "服務器信息：");
define("A_CONFCONTENT_371a", "如果緩存是啟用，確保 \"cache\" 緩存文件夾中存在的聊天根，它具有公開寫入權限 （CHMOD 0777）！");
define("A_CONFCONTENT_371b", "在此服務器上緩存不支持的！");
define("A_CONFCONTENT_371c", "無法訪問gravatar.com！");
define("A_CONFCONTENT_372", "託管服務器 IP：");
define("A_CONFCONTENT_373", "PHP服務器版本：");
define("A_CONFCONTENT_374", "allow_url_fopen："); #don't translate！
define("A_CONFCONTENT_375", "allow_url_include："); #don't translate！
define("A_CONFCONTENT_376", "file_get_contents："); #don't translate！
define("A_CONFCONTENT_377", "MySQL服務器的版本：");
define("A_CONFCONTENT_378", "禁用緩存");
define("A_CONFCONTENT_379", "啟用高速緩存");
define("A_CONFCONTENT_380", "緩存期限：");
define("A_CONFCONTENT_381", "Gravatar的准許額定值。");
define("A_CONFCONTENT_382", "上述任何");
define("A_CONFCONTENT_383", "G 額定Gravatar是適合觀眾與任何類型的所有網站上顯示<font color=blue>（建議與默認）</font>。");
define("A_CONFCONTENT_385", "PG 額定Gravatar的可能包含粗魯的手勢，挑釁穿著的個人，較小的粗話，或輕微暴力。");
define("A_CONFCONTENT_386", "R 額定Gravatar的可能含有惡劣的褻瀆，激烈的暴力，裸露，或硬藥物使用這樣的事情。");
define("A_CONFCONTENT_387", "X 額定Gravatar的可能包含鐵桿性的的圖像或極其令人不安的暴力。");
define("A_CONFCONTENT_388", "動態的默認Gravatar。");
define("A_CONFCONTENT_388a", "動態的Gravatar");
define("A_CONFCONTENT_389", "提示：這將隨機返回一個為每個用戶的動態圖像，沒有他們的電子郵件gravatar.com帳戶。（聊天嘉賓和/或未經註冊gravatar.com帳戶的用戶）。");
define("A_CONFCONTENT_390", "您可以強制顯示隨機的默認Gravatar<a href=\"#force\">".A_CONFCONTENT_366."</a>同時啟用上面！");
define("A_CONFCONTENT_391", "顯示用戶預設值");
define("A_CONFCONTENT_392", "強制隨機預設值");

//Content Logging Mod
define("A_CONFCONTENT_393", "啟用聊天/記錄。");
define("A_CONFCONTENT_394", "將生成該HTML文件清理/刪除對話。完整的版本，可通過管理的高級菜單，在聊天室的額外選項菜單（公共信息）的簡短版本。");
define("A_CONFCONTENT_395", "設置您的管理員（全）日誌文件夾的名稱。");
define("A_CONFCONTENT_396", "原有的 \"logsadmin\" 文件夾，重命名一個很難猜測，您的完整的日誌文件夾的名稱。");
define("A_CONFCONTENT_397", "這是從不同的公共/用戶訪問（稱為 \"logs\"），其中不包括任何私人/機密數據從您的聊天對話/動作。.");
define("A_CONFCONTENT_398", "日志显示-非管理员用户在聊天中。");
define("A_CONFCONTENT_399", "只有聊天记录是启用才有效。");

//Content Lurking Mod
define("A_CONFCONTENT_400", "啟用聊天潛伏。");
define("A_CONFCONTENT_401", "它將允許非登錄人監測在聊天的公開對話和事件。");
define("A_CONFCONTENT_402", "顯示潛伏頁面在非管理員用戶聊天中和登錄頁面。");
define("A_CONFCONTENT_403", "只有，如果聊天潛伏是啟用時。");
define("A_CONFCONTENT_404", "啟用 \"".A_MENU_6."\" 在管理面板中");

//Content Random Quote
define("A_CONFCONTENT_405", "啟用引用外掛。");
define("A_CONFCONTENT_406", "更改這些設置，你必須先啟用引述模式！");
define("A_CONFCONTENT_407", "引用名稱。");
define("A_CONFCONTENT_408", "引用名稱顏色。");
define("A_CONFCONTENT_409", "引用頭像。");
define("A_CONFCONTENT_410", "引用檔案。");
define("A_CONFCONTENT_411", "引用發布頻率。");
define("A_CONFCONTENT_412", "你可以建立自己的文件，使用Web資源。該文件必得救到 \"%s\" 目錄下。"); //%s = folder name
define("A_CONFCONTENT_413", "引用背景顏色。");

//Content Ghost Control
define("A_CONFCONTENT_414", "控制誰將會在聊天室中可見。");
define("A_CONFCONTENT_415", "如果你啟用控制鬼，鬼（無形）的用戶也將被隱藏所有公共頁面和計數器，除了他們的職位和房間中的命令（消息框架）！");
define("A_CONFCONTENT_416", "您還可以監視鬼\"".A_MENU_8."\"，在連接選項卡上的活動。請注意，鬼仍然能夠採取行動像往常一樣在聊天中（可以發布公共或私人信息，並且可以使用所有的命令，根據他們的權力）。");
define("A_CONFCONTENT_417", "顯示在線管理員");
define("A_CONFCONTENT_418", "隱藏在線管理員（隱身）");
define("A_CONFCONTENT_419", "S顯示在線主持人");
define("A_CONFCONTENT_420", "隱藏在線主持人（隱身）");
define("A_CONFCONTENT_421", "特別鬼（顯示器）：");
define("A_CONFCONTENT_422", "添加用戶名，以逗號分隔，沒有空格（,）！");
define("A_CONFCONTENT_423", "這些用戶別人將不能看到在聊天中（僅在\"".A_MENU_8."\"選項卡），如果他們也是管理員，他們將能夠監視所有的聊天室的活動（包括私人訊息！）。我們建議激活這些權力<font color=red>家長控制</font>目的！");
define("A_CONFCONTENT_421a", "懲罰的幽靈（幻影）：");
define("A_CONFCONTENT_423a", "這些用戶將不能看到別人在聊天中（僅在\"".A_MENU_8."\"選項卡），他們將無法在聊天室張貼或發送任何事件。我們建議只激活這些用戶無法被放逐權力<font color=red>唯一用在用戶未能被驅逐</font>!");

//Content Birthday Mod
define("A_CONFCONTENT_424", "需要在註冊和設定檔設定生日與否。");
define("A_CONFCONTENT_425", "通過電子郵件發送到用戶在他們的生日自動問候。");
define("A_CONFCONTENT_426", "如果 啟用發送，該腳本將工作只有在聊天頁面將訪問/加載在發送間隔（默認值=7天）。該時間間隔後，電子郵件草案將關閉！");
define("A_CONFCONTENT_427", "設定您希望問候發送觸發時間從午夜何時。");
define("A_CONFCONTENT_428", "允許正值或負值（0=午夜）。");
define("A_CONFCONTENT_429", "此設置是在考慮到服務器的時間，而不是用戶的時間，因此它是可能的電子郵件將被發送在（+-）時區偏差。");
define("A_CONFCONTENT_430", "多少天的問候，將會發送。");
define("A_CONFCONTENT_431", "如果沒有一個在聊天，也不訪問此區間內的聊天頁面，賀卡將不能發送了，為慶祝用戶的影響將是不一樣的。");
define("A_CONFCONTENT_432", "設定發送的內文。");
?>