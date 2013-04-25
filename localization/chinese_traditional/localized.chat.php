<?php
// File : chinese_traditional/localized.chat.php - plus version (02.01.2011 - rev.45)
// Original file (Taiwan) by clouds_music <clouds.music@gmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "聊天幫助手冊");

define("L_WEL_1", " %s %s 後聊天內容將刪除");
define("L_WEL_2", " %s %s 後不活動的用戶將斷線");

define("L_CUR_1", "這裡");
define("L_CUR_1a", "目前");
define("L_CUR_1b", "目前");
define("L_CUR_2", "在這裡聊天");
define("L_CUR_3", "目前在這聊天系統的使用者");
define("L_CUR_4", "在私人房間中的使用者");
define("L_CUR_5", "目前潛水的用戶<br />(監測此頁)：");

define("L_SET_1", "請設置 ...");
define("L_SET_2", "用戶名稱");
define("L_SET_3", "每個視窗顯示的訊息則數");
define("L_SET_4", "更新頻率");
define("L_SET_5", "選擇一個聊天房間 ...");
define("L_SET_6", "預設公開房間");
define("L_SET_7", "請選擇 ...");
define("L_SET_8", "自設公開房間");
define("L_SET_9", "創建您自己的");
define("L_SET_10", "公開");
define("L_SET_11", "私人");
define("L_SET_12", "房間");
define("L_SET_13", "設定好，請進來");
define("L_SET_14", "聊天");
define("L_SET_15", "預設的私人房間");
define("L_SET_16", "由用戶創建的私人房間");
define("L_SET_17", "選擇你的頭像");
define("L_SET_18", "收藏此頁到我的最愛：按 \"Ctrl+D\"。");
define("L_SET_19", "記住我");

define("L_SRC", "免費可得");

define("L_SEC", "秒");
define("L_SECS", "秒");
define("L_MIN", "分");
define("L_MINS", "分鐘");
define("L_HOUR", "時");
define("L_HOURS", "小時");
define("L_DAY", "天");
define("L_DAYS", "天");

// registration stuff:
define("L_REG_1", "密碼");
define("L_REG_2", "帳戶管理");
define("L_REG_3", "註冊");
define("L_REG_4", "編輯個人資料");
define("L_REG_5", "刪除用戶");
define("L_REG_6", "用戶註冊");
define("L_REG_7", "註冊會員才能記憶密碼");
define("L_REG_8", "電子郵件");
define("L_REG_9", "您已成功註冊。");
define("L_REG_10", "返回");
define("L_REG_11", "編輯");
define("L_REG_12", "修改用戶簡介");
define("L_REG_13", "刪除用戶");
define("L_REG_14", "登入");
define("L_REG_15", "登入");
define("L_REG_16", "更新");
define("L_REG_17", "您的個人資料已成功更新。");
define("L_REG_18", "你被聊天室主持人踢出聊天室。");
define("L_REG_18a", "您已被這個房間的主持人踢出了房間。<br />原因： %s");
define("L_REG_19", "你真的確定要移除嗎？");
define("L_REG_20", "是");
define("L_REG_21", "您已成功刪除。");
define("L_REG_22", "否");
define("L_REG_25", "關閉");
define("L_REG_30", "名字");
define("L_REG_31", "姓氏");
define("L_REG_32", "網址");
define("L_REG_33", "在公開信息顯示 e-mail地址");
define("L_REG_34", "編輯用戶資料");
define("L_REG_35", "管理員控制台");
define("L_REG_36", "居住地/國家");
define("L_REG_37", "<span class=\"error\"> * </span> 號的欄位必需填寫。");
define("L_REG_39", "這個聊天室已經被系統管理員移除。");
define("L_REG_43", "秘密");
define("L_REG_44", "夫婦");
define("L_REG_45", "性別");
define("L_REG_46", "男");
define("L_REG_47", "女");
define("L_REG_48", "未指定的");
define("L_REG_49", "需要註冊！");
define("L_REG_50", "註冊暫停！");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "您進入聊天的設置");
define("L_EMAIL_VAL_2", "歡迎使用雲月樓聊天系統。");
define("L_EMAIL_VAL_Err", "內部錯誤，請聯繫管理員： <a href=\"mailto:%s\">%s</a>。");
define("L_EMAIL_VAL_Done", "您的密碼已經發送到您的電子郵件地址。<br />在登錄頁面您可以自行更改密碼 \"".L_REG_4."\"。");
define("L_EMAIL_VAL_PENDING_Done", "您的註冊資料已提交審查。");
define("L_EMAIL_VAL_PENDING_Done1", "由管理員批准您的帳戶後，您將收到您的密碼。");
define("L_EMAIL_VAL_3", " %s 您的註冊等待確認"); //chat name
define("L_EMAIL_VAL_31", "恭喜！您的登記資料進行了審查和批准！");
define("L_EMAIL_VAL_32", "這是您的註冊數據 %s 在 %s："); //chat name at chaturl
define("L_EMAIL_VAL_4", "你剛才註冊的這個帳戶 %s 在 %s："); //chat name at chaturl
define("L_EMAIL_VAL_41", "你剛才更改的重要帳戶信息 %s 在 %s （帳戶的影響：%s）。"); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "您的 - %s - 帳戶細節為 %s"); //username - chatname
define("L_EMAIL_VAL_51", "您的 - %s - 帳戶更新詳細資料為 %s"); //username - chatname
define("L_EMAIL_VAL_6", "註冊於： %s");
define("L_EMAIL_VAL_61", "更新於： %s");
define("L_EMAIL_VAL_7", "以下是您 %s 更新帳戶信息："); //username
define("L_EMAIL_VAL_8", "儲存此電子郵件供日後參考。\n請也使它安全和不共享這些數據。\n感謝您的加入！享受！");
define("L_EMAIL_VAL_81", "您可以更改密碼，在登錄頁面 \"".L_REG_4."\"。");

// admin stuff
define("L_ADM_1", "%s 不再是這個房間的主持人。");
define("L_ADM_2", "你不再是註冊用戶。");

// error messages
define("L_ERR_USR_1", "這個使用者姓名已經有人使用，請選擇另外一個名字。");
define("L_ERR_USR_2", "您必須輸入一個使用者姓名。");
define("L_ERR_USR_3", "這個使用者姓名已經被註冊，<br />請輸入密碼或選擇另外一個名字。");
define("L_ERR_USR_4", "你輸入的密碼錯誤。");
define("L_ERR_USR_5", "你必需輸入使用者姓名。");
define("L_ERR_USR_6", "你必需輸入密碼。");
define("L_ERR_USR_7", "你必需輸入電子信箱地址。");
define("L_ERR_USR_8", "你必需輸入正確的電子信箱地址。");
define("L_ERR_USR_9", "這個使用者名稱已經有人使用。");
define("L_ERR_USR_10", "使用者名稱或密碼錯誤。");
define("L_ERR_USR_11", "你必需是系統管理員。");
define("L_ERR_USR_12", "你是系統管理員所以你不能移除你自己。");
define("L_ERR_USR_13", "要創建自己的房間，你必須註冊。");
define("L_ERR_USR_14", "聊天之前你必須先註冊。");
define("L_ERR_USR_15", "您必須輸入您的全名。");
define("L_ERR_USR_16", "只允許這些額外的字符：\\n".$REG_CHARS_ALLOWED."\\n空白，逗號或倒斜線 (\\) 不能使用。\\n檢查語法。");
define("L_ERR_USR_16a", "只允許這些額外的字符：<br />".$REG_CHARS_ALLOWED."<br />空白，逗號或倒斜線 (\\) 不能使用。請檢查輸入內容。");
define("L_ERR_USR_17", "這個室不存在，並且您不允許創造一個。");
define("L_ERR_USR_18", "在您的用戶名找到不能使用的詞。");
define("L_ERR_USR_19", "您不能同時在超過一個室。");
define("L_ERR_USR_20", "您已經被踢出您在聊天的聊天室。");
define("L_ERR_USR_20a", "您已經被踢出您在聊天的聊天室。<br />原因： %s");
define("L_ERR_USR_21", "您在這個房間持續沒有發言 ".C_USR_DEL." ".((C_USR_DEL == "1") ? "".L_MIN."" : "".L_MINS."")."，<br />因此您從聊天房間被斷線了。");
define("L_ERR_USR_22", "此命令不能用於\\n您使用的瀏覽器 (IE 引擎)。");
define("L_ERR_USR_23", "要加入一間私人聊天房間您必須登入。");
define("L_ERR_USR_24", "要創造您自己的私人聊天房間您必須登入。");
define("L_ERR_USR_25", "只有管理員能使用 ".$COLORNAME." 顏色！<br />不要設定使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CA2."，".COLOR_CM."，".COLOR_CM1." 或 ".COLOR_CM2."。<br />這些被預留給權限用户！");
define("L_ERR_USR_26", "只有管理員跟室長能使用 ".$COLORNAME." 顏色！<br />不要設定使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CA2."，".COLOR_CM."，".COLOR_CM1." 或".COLOR_CM2."。<br />這些被預留給權限用户！");
define("L_ERR_USR_27", "您不能與你自己密談。\\n請記住這點...\\n現在選擇不同的用戶名。");
define("L_ERR_USR_28", "您的進入 %s 被限制了！<br />請選擇一間不同的房間。");
define("L_ERR_ROM_1", "聊天室名稱不能有逗號或倒斜線(\\)。");
define("L_ERR_ROM_2", "在您想要創建的房間名字裡發現了不能用的詞。");
define("L_ERR_ROM_3", "這個聊天室的名字已經被已存在的公開聊天室所使用。");
define("L_ERR_ROM_4", "聊天室的名字錯誤。");

// users frame or popup
define("L_EXIT", "離開聊天室");
define("L_DETACH", "展開用戶名單");
define("L_EXPCOL_ALL", "展開/疊起所有");
define("L_CONN_STATE", "連接狀態");
define("L_CHAT", "聊天");
define("L_USER", "用戶");
define("L_USERS", "用戶");
define("L_LURKER", "潛水");
define("L_LURKERS", "潛水者");
define("L_NO_USER", "沒有使用者");
define("L_ROOM", "房間");
define("L_ROOMS", "聊天室");
define("L_EXPCOL", "展開/疊起 房間");
define("L_BEEP", "響鈴/不響鈴 用戶進入時");
define("L_PROFILE", "顯示頭像");
define("L_NO_PROFILE", "沒有頭像");

// input frame
define("L_HLP", "求助");
define("L_MODERATOR", "%s 現在是這個房間的一位主持人。");
define("L_KICKED", "%s 已經被踢出聊天室。");
define("L_KICKED_REASON", "%s 已經被踢出聊天室。(原因： %s)");
define("L_KICKED_ALL", "已經被踢出所有房間。");
define("L_KICKED_ALL_REASON", "已經被踢出所有房間。(原因： %s)");
define("L_BANISHED", "%s 順利地被驅逐了。");
define("L_BANISHED_REASON", "%s 順利地被驅逐了。(原因： %s)");
define("L_ANNOUNCE", "公告");
define("L_INVITE", "%s 請您加入到他/她 <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> 房間。");
define("L_INVITE_REG", "你必須註冊才能進入這個房間。");
define("L_INVITE_DONE", "已發送到您的邀請 %s。");
define("L_OK", "送出");
define("L_BUZZ", "嗡鳴聲 庫");
define("L_BAD_CMD", "指令錯誤，這是無效的指令！");
define("L_ADMIN", "%s 已經是系統管理員！");
define("L_IS_MODERATOR", "%s 已經是聊天室主持人！");
define("L_NO_MODERATOR", "這個指令只有聊天室的主人可以使用。");
define("L_NONEXIST_USER", "%s 現在不在這個聊天室。");
define("L_NONREG_USER", "%s 沒有註冊。");
define("L_NONREG_USER_IP", "他的網際協定地址是： %s。");
define("L_NO_KICKED", "%s 是系統管理員或聊天室主人，你不能踢除他。");
define("L_NO_BANISHED", "%s 是聊天室主持人或管理員不能被驅逐。");
define("L_SVR_TIME", "系統時間：");
define("L_NO_SAVE", "沒有保存的訊息！");
define("L_NO_ADMIN", "只有管理員可以使用此命令。");
define("L_NO_REG_USER", "你必須先註冊，聊天才能使用此命令。");

// help popup
define("L_HELP_TIT_1", "表情符號");
define("L_HELP_TIT_2", "訊息的正文格式");
define("L_HELP_FMT_1", "在發送的訊息中你可以使用粗體，斜體和底線的超文本標記語言標籤來表示 &lt;B&gt; &lt;/B&gt;，&lt;I&gt; &lt;/I&gt; 或 &lt;U&gt; &lt;/U&gt; 標籤。<br />例如：使用　，&lt;B&gt;訊息&lt;/B&gt; 將會出現 <B>訊息</B>。");
define("L_HELP_FMT_2", "如果訊息是電子信箱地址或網址，你不需要特別寫任何標籤。系統將會自己幫助你加上。");
define("L_HELP_TIT_3", "指令");
define("L_HELP_NOTE", "所有命令必須用英文下指令！");
define("L_HELP_MSG", "訊息");
define("L_HELP_MSGS", "訊息");
define("L_HELP_ROOM", "房間");
define("L_HELP_BUZZ", "~聲音的名稱");
define("L_HELP_BUZZ1", "嗡鳴聲...");
define("L_HELP_REASON", "原因");
define("L_HELP_MR", "%s 先生");
define("L_HELP_MS", "%s 小姐");
define("L_HELP_CMD_0", "{} 代表一個必需的設置，[] 一個可選擇使用的設置。");
define("L_HELP_CMD_1a", "設置的郵件數量顯示。最小和默認是 5。");
define("L_HELP_CMD_1b", "刷新的消息幀，顯示了N的最新消息，最小和預設 5。");
define("L_HELP_CMD_2a", "修改郵件列表刷新延遲（秒）。<br />如果n未指定或小於 3，沒有刷新和10S之間的切換刷新。");
define("L_HELP_CMD_2b", "修改消息和用戶列表刷新延遲（秒）。<br />如果n未指定或小於 3，沒有刷新和10S之間的切換刷新。");
define("L_HELP_CMD_3", "反轉消息的順序（不是在所有的瀏覽器）。");
define("L_HELP_CMD_4", "加入另一個房間，創建它，如果它不存在，如果你允許。<br />n 設 0 為私人 或者 1 為公開，假如沒有設定默認為 1。");
define("L_HELP_CMD_5", "顯示一個可選的消息後離開聊天。");
define("L_HELP_CMD_6", "忽略避免來自用戶的消息顯示，如果指定了暱稱。<br />設置移除一個被忽略用戶時  \"-\" 跟暱稱 同時指定。<br />指定移除所有被忽略用戶時用 \"-\" 但不指定暱稱。<br />不使用任何選項，該命令彈出一個窗口，顯示所有被忽略的暱稱。");
define("L_HELP_CMD_7", "召回前面鍵入的文本（命令或消息）。");
define("L_HELP_CMD_8", "顯示/隱藏 消息之前的時間。");
define("L_HELP_CMD_9", "從聊天的用戶踢離開聊天室。此命令只能由那個房間的主持人或管理員使用。<br />可選，[".L_HELP_REASON."] 顯示踢的原因（任何想要的文字）。<br />如果選項是使用 *，該命令將踢出所有沒有特別權力的聊天用戶 （只有遊客和註冊用戶）。這是有用的，當服務器連接有問題，所有的人都應該重新載入他們聊天。在第二種情況下，[".L_HELP_REASON."] 建議讓用戶知道為什麼，他們已經被踢出。");
define("L_HELP_CMD_10", "發送悄悄話給指定的用戶 （其他用戶將無法看到悄悄話）。");
define("L_HELP_CMD_11", "顯示指定用戶的資料。");
define("L_HELP_CMD_12", "彈出式窗口的 編輯用戶的個人資料。");
define("L_HELP_CMD_13", "切換用戶 進入/離開 當前房間的通知顯示與否。");
define("L_HELP_CMD_14", "允許當前房間的管理員或主持人，升級 另一名註冊用戶到同一房間的主持人。");
define("L_HELP_CMD_15", "清除消息框，只顯示最後5個消息。");
define("L_HELP_CMD_16", "保存到一個HTML文件的最後n個消息（通知的除外）。如果沒有指定n，將考慮所有可用的訊息。");
define("L_HELP_CMD_17", "允許管理員在聊天室發送給所有用戶公告。");
define("L_HELP_CMD_18", "邀請在其他房間使用者加入你所在的一個聊天室裡");
define("L_HELP_CMD_19", "允許一個房間的主持人或管理員 \"驅逐\" 由管理員定義用戶的禁入房間時間。<br />以後可以驅逐使用者在其他房間裡聊天，比這一個他插入並使用 * 設置驅逐 \"永遠\" 一個用戶從整個聊天系統。<br />（可選），[".L_HELP_REASON."] 顯示驅逐的原因（任何想要的文字）。");
define("L_HELP_CMD_20", "描述你在做什麼，不一定指自己。");
define("L_HELP_CMD_21", "公佈房間和用戶當誰嘗試向您發送訊息<br />告知這時你是遠離電腦。如果你想回來聊天，只要開始打字。");
define("L_HELP_CMD_22", "發送蜂鳴聲，並選擇性顯示消息，在當前的房間。<br />用法：<br />- 舊的用法： \"/buzz\" 或 \"/buzz 訊息顯示\" - 這播放的默認聲音蜂鳴聲在管理面板中定義;<br />- 衍生用途： \"/buzz ".L_HELP_BUZZ."\" 或 \"/buzz ".L_HELP_BUZZ." 訊息顯示\" - 這是播放 聲音名稱.wav 檔案 從 plus/sounds 聲音文件夾; 請注意符號 \"~\" 在第二個字開始使用，這是聲音文件的名稱，不帶擴展名 .wav (只允許 .wav 擴展名)。<br />依預設，這是一個 主持人/管理員 命令。");
define("L_HELP_CMD_23", "發送 <i>私語</i>（悄悄話）。該消息將送達目的地，無論用戶在哪個房間。如果用戶沒有上線或已設置離開，你會被通知。");
define("L_HELP_CMD_24", "這個命令改變當前房間的話題。盡量不覆蓋其他用戶的話題。使用的重要課題。<br />默認情況下，這是 主持人/管理員 命令。<br />使用 \"/topic reset\" 命令 當前的話題將被刪除並重置為預設的話題。<br />可選擇，\"/topic * {}\" 或 \"/topic * reset\" 在所有的房間做同樣的話題 (全聊天系統相同話題或回復為系統預設的話題)。");
define("L_HELP_CMD_25", "一個隨機/賭運氣的數字骰子遊戲。<br />用法： /dice 或 /dice [n];<br />n 可以採取任何值 <b>介於 1 到 %s</b> (它代表骰子數量)。如果沒有數字輸入，將使用默認的最大骰子。");
define("L_HELP_CMD_26", "這是一個比較複雜的版本屬於這個 /dice 命令。<br />用法： /{n1}d[n2] 或 /{n1}d;<br />n1 可以採取任何值 <b>介於 1 到 %s</b> (它代表了每次拋出的骰子數目)。<br />n2 可以採取任何值 <b>介於 1 到 %s</b> (它代表了每個芯片的邊數)。");
define("L_HELP_CMD_27", "它用高亮突出了一個特定的用戶信息，以方便您閱讀整個談話。<br />用法： /high {用戶} 或按 <img src=./images/highlightOff.gif> 在大廳用戶名字右邊 (在房間/用戶列表)"); 
define("L_HELP_CMD_28", "它允許張貼 <i>一個單幅圖像</i> 做為訊息。<br />用法：圖片是在互聯網上和任何人可以自由訪問的。不要使用需要登錄的網頁。<br />必須輸入完整的圖像鏈接！ 例如 <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />允許副檔名： .jpg .bmp .gif .png。鏈接是區分大小寫！<br />提示：輸入 /img 然後是一個空格，並貼上 URL 在輸入框中; 從網路取得圖片網址的方法：右鍵點擊圖片，內容，就會顯示整個位址/URL (有時需要向下滾動) 並複製/粘貼在 /img 後面<br />不要使用自己電腦上的圖片，它只會破壞聊天窗口！！！");
define("L_HELP_CMD_29", "第二個命令將允許當前房間的管理員或主持人，降級同房間以前晉升的另一名主持人到一般註冊用戶。<br />這 * 選項將用戶從所有的房間降級。");
define("L_HELP_CMD_30", "這第二個命令 不同於 /me 但它會顯示您的相應的標題，根據您的個人資料性別<br />例如 * ".sprintf(L_HELP_MR, "Ciprian")." 正在看電視 或 * ".sprintf(L_HELP_MS, "Dana")." 很高興。");
define("L_HELP_CMD_31", "改變用戶列表中的排序：入口時間或按字母順序排列。");
define("L_HELP_CMD_32", "這是第三個（角色扮演）版本的滾動骰子。<br />用法： /d{n1}[tn2] 或 /d{n1};<br />n1 可以採取任何值 <b>1 到 100 之間</b> (它代表了每個芯片的邊數);<br />n2 可以採取任何值 <b>介於 1 到 %s</b> (它代表了每次扔滾動骰子的數量)。");
define("L_HELP_CMD_33", "改變聊天訊息字體到用戶選擇的大小 (允許值 n： <b>7 跟 15 之間</b>); 這個 /size 命令 將復位為默認值的字體大小 (<b>".$FontSize."</b>)。");
define("L_HELP_CMD_34", "這將允許用戶指定文字訊息的一個方向 (ltr = 從左到右，rtl = 從右到左)。");
define("L_HELP_CMD_35", "它允許張貼<i>一個視頻</i> 或 <i>一個音頻文件</i> 在一次小型的Flash播放器。<br />用法：只要貼上媒體源的URL！ 例如 <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />您系統上需要安裝 Shockwave Flash 播放器。鏈接是區分大小寫！<br />提示：輸入 //video 後跟一個空格，並貼上網址在輸入框中。");
define("L_HELP_CMD_35a", "第二條命令只適用於具有 YouTube.com 的視頻源。<br />例如 <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "它允許張貼 <i>一個YouTube影片</i> 在一次小型的Flash播放器。<br />用法：只需貼上要播放的來源網址！ 例如 <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />您需要在系統上安裝 Shockwave Flash 播放器。鏈接是區分大小寫的！<br />提示：輸入 /tube 後跟一個空格，再粘貼 URL 到發言框中。");
define("L_HELP_CMD_37", "它允許張貼 <i>MathJax 方程式/公式</i> 在聊天中。<br />用法：只需將其粘貼在 TeX 或 MathML (原始) 代碼！ 例如 <b>/math&nbsp;\sqrt{3x-1}+(1+x)^2</b><br />對於更多的代碼樣本和說明去： <a href=\"http://www.mathjax.org/demos/\" target=\"_blank\">http://www.mathjax.org/demos</a>。右鍵單擊公式獲取代碼。<br />提示：輸入 /math 其次是空格 代碼 粘貼到框中。");
define("L_HELP_CMD_VAR", "別名(變種)： %s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "交談禮儀");
define("L_HELP_ETIQ_2", "我們的網站，希望保持友好的社會和樂趣，所以請堅持以下指導原則。如果你不遵守這些規則，我們的聊天主持人之一的，可以引導你聊天。<br /><br />謝謝你，");
define("L_HELP_ETIQ_3", "我們的交談禮儀指引");
define("L_HELP_ETIQ_4", "<li>請勿 \"打廣告\" 聊天打字廢話或隨機字母。</li>
<li>不要使用 aLtErnAtiNg 交替的字符。</li>
<li>保持 CAPS 的使用降到最低，因為它被認為是喊叫。</li>
<li>請記住，我們聊天的用戶，來自世界各地的，最有可能的，你會遇到不同信仰的人，請善待這些人要有禮貌。</li>
<li>請勿對其他成員直接的褻瀆。其實，盡量避開明確的使用 褻瀆 和/或 髒話。</li>
<li>不要call其他成員他們的真實姓名，他們可能不明白。而是使用他們的綽號。</li>");

// messages frame
define("L_NO_MSG", "這個聊天室目前沒有任何訊息 ...");
define("L_TODAY_DWN", "今天傳送的信息下面開始");
define("L_TODAY_UP", "昨天傳送的信息下面開始");

// message colors
$TextColors = array("黑" => "#000000",
				"紅" => "#FF0000",
				"綠" => "#009900",
				"藍" => "#0000FF",
				"紫" => "#9900FF",
				"深紅" => "#990000",
				"深綠" => "#006600",
				"深藍" => "#000099",
				"咖啡" => "#996633",
				"水藍" => "#006699",
				"粉紅" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "忽略");
define("L_IGNOR_NON", "沒有被忽略的使用者");

// whois popup
define("L_WHOIS_ADMIN", "系統管理員");
define("L_WHOIS_OWNER", "所有者");
define("L_WHOIS_TOPMOD", "超級室長");
define("L_WHOIS_MODER", "聊天室室長");
define("L_WHOIS_MODERS", "室長");
define("L_WHOIS_OTHERS", "其他用戶");
define("L_WHOIS_USER", "用戶");
define("L_WHOIS_GUEST", "訪客");
define("L_WHOIS_REG", "註冊的");
define("L_WHOIS_BOT", "機器人");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s 進入這個聊天室。");
define("L_EXIT_ROM", "%s 離開這個聊天室。");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s 從這個閒置的房間已自動啟動。");
define("L_CLOSED_ROM", "%s 關閉了瀏覽器。");

// Text for /away command notification string:
define("L_AWAY", "%s 標記為離開...");
define("L_BACK", "%s 又回來了！");

// Quick Menu mod
define("L_QUICK", "快速選單");

// Topic Banner mod
define("L_TOPIC", "已經設置話題到：");
define("L_TOPIC_RESET", "已經重置這個話題");
define("L_HELP_TOP", "話題至少要有兩個詞");
define("L_BANNER_WELCOME", "歡迎到 %s！");
define("L_BANNER_TOPIC", "話題：");
define("L_DEFAULT_TOPIC_1", "歡迎光臨雲月樓世界音樂聊天系統！");

// Img cmd mod
define("L_PIC", "張貼圖片");
define("L_PIC_RESIZED", "調整到");
define("L_HELP_IMG", "張貼圖像的完整路徑");
define("L_NO_IMAGE", "這不是一個公共的遠程圖像的一個有效的網址。\\n再次嘗試！");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s 不再是任何這個聊天室的主持人。");
define("L_IS_NO_MODERATOR", "%s 不再是這個聊天室的主持人。");
define("L_ERR_IS_ADMIN", "%s 是這裡的管理員！\\n你不能改變他的權限。");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "提供額外的命令：");
define("INFO_MODS", "額外的功能/可用外掛：");
define("INFO_BOT", "我們提供的機器人：");

// Profile mod
define("L_PRO_1", "使用語言");
define("L_PRO_1a", "語言");
define("L_PRO_2", "最愛連結 1");
define("L_PRO_3", "最愛連結 2");
define("L_PRO_4", "簡介");
define("L_PRO_5", "圖片 網址");
define("L_PRO_6", "名稱/文本顏色");

// Avatar mod
define("L_AVATAR", "頭像");
define("L_ERR_AV", "網址無效或不存在的主機。");
define("L_TITLE_AV", "您當前的頭像：");
define("L_CHG_AV", "點擊 \"".L_REG_16."\" 在個人資料表格<br />來儲存您的頭像。");
define("L_SEL_NEW_AV", "選擇一個新的頭像");
define("L_EX_AV", "例如");
define("L_URL_AV", "網址：");
define("L_EXPL_AV", "(輸入網址，然後按Enter鍵來查看)");
define("L_CANCEL", "取消");
define("L_AVA_REG", "你必須先註冊\\n才能來改變你的頭像圖標");
define("L_SEL_NEW_AV_CONFIRM", "當這種檔案形式不能提交。\\n目前指向的虛擬化身，將會失去\\到目前為止！\\n\\n你確定？");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "提示：我們的機器人是公開活躍在這個房間。若要機器人開始說話，打字輸入 <b>hello ".C_BOT_NAME."</b>。談話結束，打字輸入： <b>bye ".C_BOT_NAME."</b>。(私人： /to <b>".C_BOT_NAME."</b> 訊息)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "提示：我們的機器人是公開活躍在 %s 房間。你只能通過點擊它的名字和私下用悄悄話跟機器人交談。(指令： /wisp <b>".C_BOT_NAME."</b> 訊息)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "提示：我們的機器人是不公開活躍。通過點擊它的名字，你只能跟機器人私下談。(指令： /to <b>".C_BOT_NAME."</b> 訊息 或 /wisp <b>".C_BOT_NAME."</b> 訊息)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "機器人是在這個房間裡沒有運行！");
define("BOT_START_ERROR", "在這個房間的機器人已在運行！");
define("BOT_DISABLED_ERROR", "機器人已被禁用從管理面板！");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "滾動骰子，結果是：");
define("DICE_WRONG", "你必須選擇你想滾多少骰子\\n(選擇一個介於1和 ".MAX_ROLLS.")。\\n只需鍵入/dice 滾動所有的 ".MAX_ROLLS." 骰子。");
define("DICE2_WRONG", "第二個值介於1和 ".MAX_ROLLS."。\\n留下它空白到使用全部 ".MAX_ROLLS." dice\\n(例如 /".MAX_DICES."d 或 /".MAX_DICES."d".MAX_ROLLS.")。");
define("DICE2_WRONG1", "第一個值介於1和 ".MAX_DICES."。\\n(例如 /".MAX_DICES."d 或 /".MAX_DICES."d".MAX_ROLLS.")。");
define("DICE3_WRONG", "第一（d）值介於1和 100。\\n第二個（t）值介於1和 ".MAX_ROLLS."。\\n留下它空白到使用全部 ".MAX_ROLLS." 骰子\\n(例如 /d50 或 /d100t".MAX_ROLLS.")。");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "打開彈出窗口私人訊息");
define("L_REG_POPUP_NOTE", "您必須禁用彈出窗口阻止程序！( 關閉快顯封鎖程式 )");
define("L_PRIV_POST_MSG", "發送悄悄話！");
define("L_PRIV_MSG", "收到新的悄悄話！");
define("L_PRIV_MSGS", "收到新的私人訊息 %s 則！");
define("L_PRIV_MSGSa", "這裡是前10條消息！<br />使用底部的連結看到其餘的。");
define("L_PRIV_MSG1", "從：");
define("L_PRIV_MSG2", "房間：");
define("L_PRIV_MSG3", "到：");
define("L_PRIV_MSG4", "留言：");
define("L_PRIV_MSG5", "發表於：");
define("L_PRIV_REPLY", "回覆");
define("L_PRIV_READ", "請按下 ’".L_REG_25."’ 按鈕標記為所有的文章已讀！");
define("L_PRIV_POPUP", "您可以隨時 停用 /重新啟用 這個彈出的功能<br />在編輯個人資料");
define("L_PRIV_POPUP1", "簡介</a> (只有註冊用戶)");
define("L_NOT_ONLINE", "%s 現在不在線上。");
define("L_PRIV_NOT_ONLINE", "%s 現在不在線上，\\n但登錄後，仍然會收到您的消息。");
define("L_PRIV_NOT_INROOM", "%s 是不在這個房間。\\n如果您仍然希望向用戶密語這條，\\使用這個命令： /wisp %s 留言內容。");
define("L_PRIV_AWAY", "%s 標記為離開，\\n但仍然會收到您的留言\\n當他回到電腦前時。");
define("PM_DISABLED_ERROR", "耳語（私人訊息）\\在此聊天已被禁用。");
define("L_NEXT_PAGE", "前往下一頁");
define("L_NEXT_READ", "閱讀 下一個 %s"); // message / 10 messages
define("L_ROOM_ALL", "所有房間");
define("L_PRIV_NO_MSGS", "沒有收到的私人訊息");
define("L_PRIV_READ_MSG", "收到 1 則私人訊息"); //singular
define("L_PRIV_READ_MSGS", "收到 %s 則的私人訊息"); //plural
define("L_PRIV_MSGS_NEW", "新");
define("L_PRIV_MSGS_READ", "閱讀");
define("L_PRIV_MSG6", "狀態：");
define("L_PRIV_RELOAD", "重新載入網頁");
define("L_PRIV_MARK_ALL", "全部標記為已讀");
define("L_PRIV_MARK_SEL", "標記選定為已讀");
define("L_PRIV_REMOVE", "刪除檢查項目管理");
define("L_PRIV_PM", "(私人)");
define("L_PRIV_WISP", "(耳語)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "啟用");
define("L_DISABLED", "已禁用");
define("L_COLOR_HEAD_SETTINGS", "在此服務器上的當前設置：");
define("L_COLOR_HEAD_SETTINGSa", "預設的色彩：");
define("L_COLOR_HEAD_SETTINGSb", "預設的色彩：");
define("L_COL_HELP_TITLE", "顏色選擇器");
define("L_COL_HELP_SUB1", "使用：");
define("L_COL_HELP_P1", "編輯您的個人資料（您的用戶名顏色相同的顏色），您可以選擇自己的默認顏色。你仍然可以使用任何其他顏色。要改變從一個隨機使用您的默認顏色，你有一次選擇默認的顏色 (空值) - 它是在選擇列表中的第一個。");
define("L_COL_HELP_SUB2", "提示：");
define("L_COL_HELP_P2", "<u>色彩範圍</u><br />根據您的瀏覽器/操作系統功能，它是可能的，有的顏色不會呈現。只有16種顏色的名稱是由W3C的HTML4.0標準的支持：");
define("L_COL_HELP_P2a", "如果一個用戶聲稱，他不能看到你所選的顏色，這意味著他很可能使用的是舊的瀏覽器。");
define("L_COL_HELP_SUB3", "設置定義在這個聊天室：");
define("L_COL_HELP_P3", "<u>級別使用顏色的權限</u>：<br />1。管理員可以使用任何顏色。<br />管理員的默認顏色 <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>。<br />2。版主可以使用任何顏色，但不能用 <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> 跟 <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>。<br />用於版主的默認顏色是 <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>。<br />3。其他用戶可以使用任何顏色，但不能用 <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>，<SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>，<SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> 跟 <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>。");
define("L_COL_HELP_P3a", "默認顏色為 <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>。<br /><br /><u>技術性的東西</u>：這些顏色已經被系統管理員定義在管理面板。<br />如果出現任何錯誤，或者如果有什麼你不喜歡默認的顏色，你應該聯繫<b>管理員</b> 首先，沒有在房間裡的其他用戶。:-)");
define("L_COL_HELP_USER_STATUS", "您的狀態");
define("L_COL_TUT", "在聊天室中使用彩色文字");
define("L_NULL", "空值");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "房間的顏色");
define("L_PRO_COLOR", "配置文件的顏色");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "只有管理員可以使用 ".COLOR_CA." 顏色！\\n\\n你的文字顏色將重置為 ".COLOR_CM."！\\n\\n請選擇其他顏色。");
define("COL_ERROR_BOX_USRA", "只有管理員可以使用 ".COLOR_CA." 顏色！\\n\\n不要嘗試使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CM." 或 ".COLOR_CM1."。\\n\\n這些是保留給超級用戶！\\n\\n你的文字顏色將重置為 ".COLOR_CD."！\\n\\n請選擇其他顏色。");
define("COL_ERROR_BOX_USRM", "你必須是一個主持人才能使用 ".COLOR_CM." 顏色！\\n\\n不要嘗試使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CM." 或 ".COLOR_CM1."。\\n\\n這些是保留給超級用戶！\\n\\n你的文字顏色將重置為 ".COLOR_CD."！\\n\\n請選擇其他顏色。");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "歡迎來到我們的聊天。請遵守純淨禮儀，一邊聊天：<I>嘗試愉快和禮貌</I>。");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "此服務器的設置，已被改變了。為了避免發生故障，請重新加載瀏覽器 (按F5鍵或退出，並重新進入聊天)。");

//Size command error by Ciprian
define("L_ERR_SIZE", "字體大小的值只能是\\n空的（進行復位）或7至15");

// Password reset form by Ciprian
define("L_PASS_0", "密碼重置表");
define("L_PASS_1", "密碼提示問題");
define("L_PASS_2", "你的第一部車子是什麼品牌？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "你的第一個寵物是什麼名字？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "你最喜愛的飲料是什麼牌子？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "你的出生日期是什麼？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "密碼提示答案");
define("L_PASS_7", "重設密碼");
define("L_PASS_8", "您的密碼已成功重置");
define("L_PASS_9", "請用您的新密碼進入聊天");
define("L_PASS_10", "請用您的新密碼進入聊天： %s");
define("L_PASS_11", "歡迎回到我們的聊天服務器！");
define("L_PASS_12", "選擇你的問題 ...");
define("L_ERR_PASS_1", "錯誤的用戶名。選擇你的。");
define("L_ERR_PASS_2", "錯誤的電子郵件，再試一次！");
define("L_ERR_PASS_3", "不對的密碼提示問題。<br />答復到如下所示的那個！");
define("L_ERR_PASS_4", "錯誤的密碼提示答案。再試一次！");
define("L_ERR_PASS_5", "您未設置您私有/密碼提示。");
define("L_ERR_PASS_6", "你還沒有設置您的私人/密碼提示。<br />您不能使用這種形式。聯繫管理員！");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s 已成為這個聊天室的管理員。");
define("L_ADM_4", "%s 不再是這個聊天室的管理員。");

// Open Schedule by Ciprian
define("L_DAILY", "每日");
define("L_ALWAYS", "永遠");
define("L_OPEN", "打開");
define("L_CLOSED", "關閉");
define("L_OPEN_PUB", "開放到公眾");
define("L_CLOSED_PUB", "封閉到公眾");

// Links popup page by Alex
define("L_LINKS_1", "發布鏈接");
define("L_LINKS_2", "在這裡，你可以訪問發佈的鏈接");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "點擊這裡 %s %s");
define("L_CLICK", "點擊這裡 %s");
define("L_LINKS_3", "打開鏈接");
define("L_LINKS_4", "打開作者的網站");
define("L_LINKS_5", "插入這個笑臉");
define("L_LINKS_6", "聯繫");
define("L_LINKS_7", "訪問phpMyChat-Plus主頁");
define("L_LINKS_8", "加入phpMyChat小組");
define("L_LINKS_9", "發送您的臉書");
define("L_LINKS_10", "下載 phpMyChat-Plus");
define("L_LINKS_11", "查看誰在聊天");
define("L_LINKS_12", "打開聊天的登錄頁面");
define("L_LINKS_13", "播放這個聲音"); // can also be translated as "to play this sound"
define("L_LINKS_14", "使用此命令");
define("L_LINKS_15", "打開");
define("L_LINKS_16", "笑臉圖庫");
define("L_LINKS_17", "升序排序");
define("L_LINKS_18", "降序排序");
define("L_LINKS_19", "設置/修改您的全球認證肖像");
define("L_LINKS_20", "發布方程式"); //方程式
define("L_SWITCH", "切換到 %s"); // 例如 “切換到意大利" (鼠標停留的國旗國家 / 語言切換)
define("L_SELECTED", "現在設定"); // 例如 "French - selected" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "未選擇");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "發送電子郵件");
define("L_FULLSIZE_PIC", "打開全尺寸圖片");
define("L_PRIVACY", "閱讀我們的隱私政策");
define("L_AUTHOR", "作者"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "此聊天室的開發人員"); //same here
define("L_OWNER", "此聊天室的所有者"); //same here
define("L_TRANSLATOR", "譯者"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... 開設日 %s 後訪問人數");

// Status bar messages
define("L_JOIN_ROOM", "加入這個房間");
define("L_USE_NAME", "使用這個用戶名");
define("L_USE_NAME1", "此用戶名的地址");
define("L_WHSP", "悄悄話");
define("L_SEND_WHSP", "傳送一個悄悄話");
define("L_SEND_PM_1", "傳送留言");
define("L_SEND_PM_2", "傳送一個私人訊息");
define("L_HIGHLIGHT", "高亮/取消-高亮");
define("L_HIGHLIGHT_SB", "高亮/取消-高亮 該用戶的帖子");

//Lurking frame popup
define("L_LURKING_2", "潛伏頁面");
define("L_LURKING_3", "是潛伏");
define("L_LURKING_4", "加入了");
define("L_LURKING_5", "未知");

// Extra options by Ciprian
define("L_EXTRA_OPT", "額外選項");
define("L_ARCHIVE", "打開紀錄");
define("L_SOUNDFIX_IE_1", "IE 聲音修正檔");
define("L_SOUNDFIX_IE_2", "下載 IE 聲音修正檔");
define("L_LURKING_1", "打開潛伏的頁");
define("L_REG_BRB", "廣檢(需要先註冊)");
define("L_DEL_BYE", "不要等待我...");
define("L_EXTRA_PRIV1", "讀取留言");
define("L_EXTRA_PRIV2", "新留言");

// Months Long Names
define("L_JAN", "一月");
define("L_FEB", "二月");
define("L_MAR", "三月");
define("L_APR", "四月");
define("L_MAY", "五月");
define("L_JUN", "六月");
define("L_JUL", "七月");
define("L_AUG", "八月");
define("L_SEP", "九月");
define("L_OCT", "十月");
define("L_NOV", "十一月");
define("L_DEC", "十二月");
// Months Short Names
define("L_S_JAN", "1月");
define("L_S_FEB", "2月");
define("L_S_MAR", "3月");
define("L_S_APR", "4月");
define("L_S_MAY", "5月");
define("L_S_JUN", "6月");
define("L_S_JUL", "7月");
define("L_S_AUG", "8月");
define("L_S_SEP", "9月");
define("L_S_OCT", "10月");
define("L_S_NOV", "11月");
define("L_S_DEC", "12月");
// Week days Long Names
define("L_MON", "星期一");
define("L_TUE", "星期二");
define("L_WED", "星期三");
define("L_THU", "星期四");
define("L_FRI", "星期五");
define("L_SAT", "星期六");
define("L_SUN", "星期日");
// Week days Short Names
/*
define("L_S_MON", "一");
define("L_S_TUE", "二");
define("L_S_WED", "三");
define("L_S_THU", "四");
define("L_S_FRI", "五");
define("L_S_SAT", "六");
define("L_S_SUN", "日");
*/
define("L_S_MON", "週一");
define("L_S_TUE", "週二");
define("L_S_WED", "週三");
define("L_S_THU", "週四");
define("L_S_FRI", "週五");
define("L_S_SAT", "週六");
define("L_S_SUN", "週日");

// Set the CN specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "zh-tw.UTF-8", "Chinese.UTF-8", "zh-tw", "Chinese_Taiwan");
} else {
setlocale(LC_ALL, "zh_TW.UTF-8", "Chinese.UTF-8");
}
define("L_LANG", "zh_TW");
// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");
define("L_CAL_FORMAT", "%Y年%B%d日");
define("ISO_DEFAULT", "ISO2022_CN_CNS");
define("WIN_DEFAULT", "utf-8");
if (stristr(PHP_OS,'win'))
{
define("L_SHORT_DATE", "%Y年 %#m月 %#d日 "); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%Y年 %#m月 %#d日 &nbsp;%H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%Y年 %#m月 %#d日 "); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%Y年 %#m月 %#d日 &nbsp;%H:%M:%S"); //Change this to your local desired format (keep the long form)
}
else
{
define("L_SHORT_DATE", "%Y年%-m月%-d日"); //Change this to your local desired format (keep the short form)
define("L_SHORT_DATETIME", "%Y年%-m月%-d日 %H:%M:%S"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATE", "%Y年%-m月%-d日 (%A)"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%Y年%-m月%-d日 (%A) %H:%M:%S"); //Change this to your local desired format (keep the long form)
}

if(!defined("L_DAY")) define("L_DAY", "日");
if(!defined("L_MONTH")) define("L_MONTH", "月");
if(!defined("L_YEAR")) define("L_YEAR", "年");

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12)."。'; return true;\" TARGET=_blank>");
define("NB_USERS_IN", "使用者 ".LOGIN_LINK."聊天</A> 在這個時候。");
define("USERS_LOGIN", "這個時段1個用戶在 ".LOGIN_LINK."聊天</A>。");
define("NO_USER", "這個時段沒有人 ".LOGIN_LINK."聊天</A>。");
define("L_PRIV_REPLY_LOGIN", "登錄到聊天，如果你想 ".LOGIN_LINK."發表回覆</A> 任何上面列出的未讀項目經理");

// Language names
define("L_LANG_AR", "阿根廷 西班牙");
define("L_LANG_BG", "保加利亞語 - 西里爾文");
define("L_LANG_BR", "葡萄牙語（巴西）");
define("L_LANG_CA", "加泰羅尼亞");
define("L_LANG_CNS", "簡體中文"); // Chinese simplified
define("L_LANG_CNT", "繁體中文"); // Chinese traditional
define("L_LANG_CZ", "捷克文");
define("L_LANG_DA", "丹麥文");
define("L_LANG_DE", "德文");
define("L_LANG_EN", "英文"); // 僅管理面板
define("L_LANG_ENUK", "英國英文"); // 英國的格式和標誌
define("L_LANG_ENUS", "美國英文"); // 美國的格式和標誌
define("L_LANG_ES", "西班牙");
define("L_LANG_FA", "波斯文");
define("L_LANG_FI", "芬蘭文");
define("L_LANG_FR", "法文");
define("L_LANG_GR", "希臘文");
define("L_LANG_HE", "希伯來文");
define("L_LANG_HI", "印度文 (梵文)");
define("L_LANG_HU", "匈牙利");
define("L_LANG_ID", "印度尼西亞（印尼文）");
define("L_LANG_IT", "意大利");
define("L_LANG_JA", "日語（漢字）");
define("L_LANG_KA", "格魯吉亞語");
define("L_LANG_NB", "挪威文 (Bokmål)");
define("L_LANG_NN", "新挪威語 (Nynorsk)");
define("L_LANG_NE", "尼泊爾文");
define("L_LANG_NL", "荷蘭文");
define("L_LANG_PL", "波蘭文");
define("L_LANG_PT", "葡萄牙文");
define("L_LANG_RO", "羅馬尼亞文");
define("L_LANG_RU", "俄文 - Cyrillic");
define("L_LANG_SK", "斯洛伐克文");
define("L_LANG_SRC", "塞爾維亞 - Cyrillic");
define("L_LANG_SRL", "塞爾維亞 - 拉丁");
define("L_LANG_SV", "瑞典文");
define("L_LANG_TH", "泰文");
define("L_LANG_TR", "土耳其文");
define("L_LANG_UK", "烏克蘭 - Cyrillic");
define("L_LANG_UR", "Urdu 烏爾都語");
define("L_LANG_VI", "越南文");
define("L_LANG_YO", "約魯巴語"); //尼日利亞和剛果語

// Skins preview page
define("L_SKINS_TITLE", "外觀風格預覽");
define("L_SKINS_TITLE1", "外觀風格 %s 到 %s 預覽"); // Skins 1 to 4 preview
define("L_SKINS_AV", "可用外觀風格");
define("L_SKINS_NONAV", "還有沒有定義外觀風格在這 \"skins\" 資料夾");
define("L_SKINS_COPY", "&copy;%s 外觀風格來自 %s"); 

// Swap image titles by Ciprian
define("L_GEN_ICON", "性別圖示");

// Ghost mode by Ciprian
define("L_GHOST", "幽靈");
define("L_SUPER_GHOST", "超級幽靈");
define("L_NO_GHOST", "可見的");

// Sorting options by Ciprian
define("L_ASC", "遞增");
define("L_DESC", "遞減");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "總訪問量");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "使用的全球認證肖像");

// Uploader mod by Ciprian
define("L_UPLOAD", "上傳 %s");
define("L_UPLOAD_IMG", "圖檔");
define("L_UPLOAD_SND", "聲音檔");
define("L_UPLOAD_FLS", "檔案");
define("L_UPLOAD_SUCCESS", "%s 順利的上傳 %s。");
define("L_FILES_TITLE", "上傳管理");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "限會員");
define("L_RESTRICTED_ROM", "%s 從這個房間已經被成功地限制。");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "登入到一個 OpenID");
define("L_OPID_REG", "導入您的OpenID個人資料");

// Support buttons
define("L_SUPP_WARN", "您已選擇到自由開發作者捐獻\\n".APP_NAME." 通過捐贈給開發者。\\n感謝您的支持！\\n\\n注：收款人不是這個聊天室的主人。\\n請輸入金額在下一頁。\\n\\n繼續？");
define("L_SUPP_ALT", "通過 PayPal 支助 ".APP_NAME." 的發展 - 它是快速，自由和安全的！");

// Video & Audio & Youtube cmds (Embevi & YouTube player class)
define("L_AUDIO", "音訊檔案發布人");
define("L_VIDEO", "視訊發布人");
define("L_HELP_VIDEO", "張貼的視頻或音頻源的完整路徑");
define("L_NO_VIDEO", "不能嵌入的 URL。\\n這是不是一個有效的URL，接受公眾的視頻或音頻源\\n請再試！");
define("L_ORIG_VIDEO", "打開原始的來源網站");

// Birthday mod - by Ciprian
define("L_PRO_7", "出生日期");
define("L_PRO_8", "顯示生日在個人資料公開信息");
define("L_PRO_9", "顯示年齡在個人資料公開信息");
define("L_PRO_10", "年齡");
define("L_PRO_11", "%1\$d 年，%2\$d 月 和 %3\$d 日");
define("L_DOB_TIT_1", "生日列表");
$L_DOB_SUBJ = "%s 生日快樂！";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "方程式");
define("L_MATH", "%s 來自 %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>