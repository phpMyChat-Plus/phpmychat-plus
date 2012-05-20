<?php
// File : chinese_simplified/localized.chat.php - plus version (02.01.2011 - rev.45)
// Original file (China) by clouds_music <clouds.music@gmail.com>
// Do not use ' but use ’ instead (utf-8 edit bug)

// extra header for Charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// welcome page
define("L_TUTORIAL", "聊天帮助手册");

define("L_WEL_1", " %s %s 后聊天内容将删除");
define("L_WEL_2", " %s %s 后不活动的用户将断线");

define("L_CUR_1", "这里");
define("L_CUR_1a", "目前");
define("L_CUR_1b", "目前");
define("L_CUR_2", "在这里聊天");
define("L_CUR_3", "目前在这聊天系统的使用者");
define("L_CUR_4", "在私人房间中的使用者");
define("L_CUR_5", "目前潜水的用户<br />(监测此页)：");

define("L_SET_1", "请设置 ...");
define("L_SET_2", "用户名称");
define("L_SET_3", "每个视窗显示的讯息则数");
define("L_SET_4", "更新频率");
define("L_SET_5", "选择一个聊天房间 ...");
define("L_SET_6", "预设公开房间");
define("L_SET_7", "请选择 ...");
define("L_SET_8", "自设公开房间");
define("L_SET_9", "创建您自己的");
define("L_SET_10", "公开");
define("L_SET_11", "私人");
define("L_SET_12", "房间");
define("L_SET_13", "设定好，请进来");
define("L_SET_14", "聊天");
define("L_SET_15", "预设的私人房间");
define("L_SET_16", "由用户创建的私人房间");
define("L_SET_17", "选择你的头像");
define("L_SET_18", "收藏此页到我的最爱：按 \"Ctrl+D\"。");
define("L_SET_19", "记住我");

define("L_SRC", "免费可得");

define("L_SEC", "秒");
define("L_SECS", "秒");
define("L_MIN", "分");
define("L_MINS", "分钟");
define("L_HOUR", "时");
define("L_HOURS", "小时");

// registration stuff:
define("L_REG_1", "密码");
define("L_REG_2", "帐户管理");
define("L_REG_3", "注册");
define("L_REG_4", "编辑个人资料");
define("L_REG_5", "删除用户");
define("L_REG_6", "用户注册");
define("L_REG_7", "注册会员才能记忆密码");
define("L_REG_8", "电子邮件");
define("L_REG_9", "您已成功注册。");
define("L_REG_10", "返回");
define("L_REG_11", "编辑");
define("L_REG_12", "修改用户简介");
define("L_REG_13", "删除用户");
define("L_REG_14", "登入");
define("L_REG_15", "登入");
define("L_REG_16", "更新");
define("L_REG_17", "您的个人资料已成功更新。");
define("L_REG_18", "你被聊天室主持人踢出聊天室。");
define("L_REG_18a", "您已被这个房间的主持人踢出了房间。<br />原因： %s");
define("L_REG_19", "你真的确定要移除吗？");
define("L_REG_20", "是");
define("L_REG_21", "您已成功删除。");
define("L_REG_22", "否");
define("L_REG_25", "关闭");
define("L_REG_30", "名字");
define("L_REG_31", "姓氏");
define("L_REG_32", "网址");
define("L_REG_33", "在公开信息显示 e-mail地址");
define("L_REG_34", "编辑用户资料");
define("L_REG_35", "管理");
define("L_REG_36", "居住地/国家");
define("L_REG_37", "<span class=\"error\"> * </span> 号的栏位必需填写。");
define("L_REG_39", "这个聊天室已经被系统管理员移除。");
define("L_REG_43", "秘密");
define("L_REG_44", "夫妇");
define("L_REG_45", "性别");
define("L_REG_46", "男");
define("L_REG_47", "女");
define("L_REG_48", "未指定的");
define("L_REG_49", "需要注册！");
define("L_REG_50", "注册暂停！");

// e-mail validation stuff
define("L_EMAIL_VAL_1", "您进入聊天的设置");
define("L_EMAIL_VAL_2", "欢迎使用云月楼聊天系统。");
define("L_EMAIL_VAL_Err", "内部错误，请联系管理员： <a href=\"mailto:%s\">%s</a>。");
define("L_EMAIL_VAL_Done", "您的密码已经发送到您的电子邮件地址。<br />在登录页面您可以自行更改密码 \"".L_REG_4."\"。");
define("L_EMAIL_VAL_PENDING_Done", "您的注册资料已提交审查。");
define("L_EMAIL_VAL_PENDING_Done1", "由管理员批准您的帐户后，您将收到您的密码。");
define("L_EMAIL_VAL_3", " %s 您的注册等待确认"); //chat name
define("L_EMAIL_VAL_31", "恭喜！您的登记资料进行了审查和批准！");
define("L_EMAIL_VAL_32", "这是您的注册数据 %s 在 %s："); //chat name at chaturl
define("L_EMAIL_VAL_4", "你刚才注册的这个帐户 %s 在 %s："); //chat name at chaturl
define("L_EMAIL_VAL_41", "你刚才更改的重要帐户信息 %s 在 %s （帐户的影响：%s）。"); //chat name at chaturl (username)
define("L_EMAIL_VAL_5", "您的 - %s - 帐户细节为 %s"); //username - chatname
define("L_EMAIL_VAL_51", "您的 - %s - 帐户更新详细资料为 %s"); //username - chatname
define("L_EMAIL_VAL_6", "注册于： %s");
define("L_EMAIL_VAL_61", "更新于： %s");
define("L_EMAIL_VAL_7", "以下是您 %s 更新帐户信息："); //username
define("L_EMAIL_VAL_8", "储存此电子邮件供日后参考。\n请也使它安全和不共享这些数据。\n感谢您的加入！享受！");
define("L_EMAIL_VAL_81", "您可以更改密码，在登录页面 \"".L_REG_4."\"。");

// admin stuff
define("L_ADM_1", "%s 不再是这个房间的主持人。");
define("L_ADM_2", "你不再是注册用户。");

// error messages
define("L_ERR_USR_1", "这个使用者姓名已经有人使用，请选择另外一个名字。");
define("L_ERR_USR_2", "您必须输入一个使用者姓名。");
define("L_ERR_USR_3", "这个使用者姓名已经被注册，<br />请输入密码或选择另外一个名字。");
define("L_ERR_USR_4", "你输入的密码错误。");
define("L_ERR_USR_5", "你必需输入使用者姓名。");
define("L_ERR_USR_6", "你必需输入密码。");
define("L_ERR_USR_7", "你必需输入电子信箱地址。");
define("L_ERR_USR_8", "你必需输入正确的电子信箱地址。");
define("L_ERR_USR_9", "这个使用者名称已经有人使用。");
define("L_ERR_USR_10", "使用者名称或密码错误。");
define("L_ERR_USR_11", "你必需是系统管理员。");
define("L_ERR_USR_12", "你是系统管理员所以你不能移除你自己。");
define("L_ERR_USR_13", "要创建自己的房间，你必须注册。");
define("L_ERR_USR_14", "聊天之前你必须先注册。");
define("L_ERR_USR_15", "您必须输入您的全名。");
define("L_ERR_USR_16", "只允许这些额外的字符：\\n".$REG_CHARS_ALLOWED."\\n空白，逗号或倒斜线 (\\) 不能使用。\\n检查语法。");
define("L_ERR_USR_16a", "只允许这些额外的字符：<br />".$REG_CHARS_ALLOWED."<br />空白，逗号或倒斜线 (\\) 不能使用。请检查输入内容。");
define("L_ERR_USR_17", "这个室不存在，并且您不允许创造一个。");
define("L_ERR_USR_18", "在您的用户名找到不能使用的词。");
define("L_ERR_USR_19", "您不能同时在超过一个室。");
define("L_ERR_USR_20", "您已经被踢出您在聊天的聊天室。");
define("L_ERR_USR_20a", "您已经被踢出您在聊天的聊天室。<br />原因： %s");
define("L_ERR_USR_21", "您在这个房间持续没有发言 ".C_USR_DEL." ".((C_USR_DEL == "1") ? "".L_MIN."" : "".L_MINS."")."，<br />因此您从聊天房间被断线了。");
define("L_ERR_USR_22", "此命令不能用于\\n您使用的浏览器 (IE 引擎)。");
define("L_ERR_USR_23", "要加入一间私人聊天房间您必须登入。");
define("L_ERR_USR_24", "要创造您自己的私人聊天房间您必须登入。");
define("L_ERR_USR_25", "只有管理员能使用 ".$COLORNAME." 颜色！<br />不要设定使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CA2."，".COLOR_CM."，".COLOR_CM1." 或 ".COLOR_CM2."。<br />这些被预留给权限用户！");
define("L_ERR_USR_26", "只有管理员跟室长能使用 ".$COLORNAME." 颜色！<br />不要设定使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CA2."，".COLOR_CM."，".COLOR_CM1." 或 ".COLOR_CM2."。<br />这些被预留给权限用户！");
define("L_ERR_USR_27", "您不能与你自己密谈。\\n请记住这点...\\n现在选择不同的用户名。");
define("L_ERR_USR_28", "您的进入 %s 被限制了！<br />请选择一间不同的房间。");
define("L_ERR_ROM_1", "聊天室名称不能有逗号或倒斜线(\\)。");
define("L_ERR_ROM_2", "在您想要创建的房间名字里发现了不能用的词。");
define("L_ERR_ROM_3", "这个聊天室的名字已经被已存在的公开聊天室所使用。");
define("L_ERR_ROM_4", "聊天室的名字错误。");

// users frame or popup
define("L_EXIT", "离开聊天室");
define("L_DETACH", "展开用户名单");
define("L_EXPCOL_ALL", "展开/叠起所有");
define("L_CONN_STATE", "连接状态");
define("L_CHAT", "聊天");
define("L_USER", "用户");
define("L_USERS", "用户");
define("L_LURKER", "潜水");
define("L_LURKERS", "潜水者");
define("L_NO_USER", "没有使用者");
define("L_ROOM", "房间");
define("L_ROOMS", "聊天室");
define("L_EXPCOL", "展开/叠起 房间");
define("L_BEEP", "响铃/不响铃 用户进入时");
define("L_PROFILE", "显示头像");
define("L_NO_PROFILE", "没有头像");

// input frame
define("L_HLP", "求助");
define("L_MODERATOR", "%s 现在是这个房间的一位主持人。");
define("L_KICKED", "%s 已经被踢出聊天室。");
define("L_KICKED_REASON", "%s 已经被踢出聊天室。(原因： %s)");
define("L_KICKED_ALL", "已经被踢出所有房间。");
define("L_KICKED_ALL_REASON", "已经被踢出所有房间。(原因： %s)");
define("L_BANISHED", "%s 顺利地被驱逐了。");
define("L_BANISHED_REASON", "%s 顺利地被驱逐了。(原因： %s)");
define("L_ANNOUNCE", "公告");
define("L_INVITE", "%s 请您加入到他/她 <a href=\"#\" onClick=\"window.parent.runCmd('%s','%s')\">%s</a> 房间。");
define("L_INVITE_REG", "你必须注册才能进入这个房间。");
define("L_INVITE_DONE", "已发送到您的邀请 %s。");
define("L_OK", "送出");
define("L_BUZZ", "嗡鸣声 库");
define("L_BAD_CMD", "指令错误，这是无效的指令！");
define("L_ADMIN", "%s 已经是系统管理员！");
define("L_IS_MODERATOR", "%s 已经是聊天室主持人！");
define("L_NO_MODERATOR", "这个指令只有聊天室的主人可以使用。");
define("L_NONEXIST_USER", "%s 现在不在这个聊天室。");
define("L_NONREG_USER", "%s 没有注册。");
define("L_NONREG_USER_IP", "他的IP是： %s。");
define("L_NO_KICKED", "%s 是系统管理员或聊天室主人，你不能踢除他。");
define("L_NO_BANISHED", "%s 是聊天室主持人或管理员不能被驱逐。");
define("L_SVR_TIME", "系统时间：");
define("L_NO_SAVE", "没有保存的讯息！");
define("L_NO_ADMIN", "只有管理员可以使用此命令。");
define("L_NO_REG_USER", "你必须先注册，聊天才能使用此命令。");

// help popup
define("L_HELP_TIT_1", "表情符号");
define("L_HELP_TIT_2", "讯息的正文格式");
define("L_HELP_FMT_1", "在发送的讯息中你可以使用粗体，斜体和底线的超文本标记语言卷标 来表示 &lt;B&gt; &lt;/B&gt;，&lt;I&gt; &lt;/I&gt; 或 &lt;U&gt; &lt;/U&gt; 标签。<br />例如： 使用　，&lt;B&gt;讯息&lt;/B&gt; 将会出现 <B>讯息</B>。");
define("L_HELP_FMT_2", "如果讯息是 电子信箱地址 或 URL 你不需要特别写任何 标签。系统将会自己帮助你加上。");
define("L_HELP_TIT_3", "指令");
define("L_HELP_NOTE", "所有命令必须用英文下指令！");
define("L_HELP_MSG", "讯息");
define("L_HELP_MSGS", "讯息");
define("L_HELP_ROOM", "房间");
define("L_HELP_BUZZ", "~声音的名称");
define("L_HELP_BUZZ1", "嗡鸣声...");
define("L_HELP_REASON", "原因");
define("L_HELP_MR", "%s 先生");
define("L_HELP_MS", "%s 小姐");
define("L_HELP_CMD_0", "{} 代表一个必需的设置，[] 一个可选择使用的设置。");
define("L_HELP_CMD_1a", "设置的邮件数量显示。最小和默认是 5。");
define("L_HELP_CMD_1b", "刷新的消息帧，显示了N的最新消息，最小和预设 5。");
define("L_HELP_CMD_2a", "修改邮件列表刷新延迟（秒）。<br />如果n未指定或小于 3，没有刷新和10S之间的切换刷新。");
define("L_HELP_CMD_2b", "修改消息和用户列表刷新延迟（秒）。<br />如果n未指定或小于 3，没有刷新和10S之间的切换刷新。");
define("L_HELP_CMD_3", "反转消息的顺序（不是在所有的浏览器）。");
define("L_HELP_CMD_4", "加入另一个房间，创建它，如果它不存在，如果你允许。<br />n 设 0 为私人或者 1 为公开，假如没有设定默认为 1。");
define("L_HELP_CMD_5", "显示一个可选的消息后离开聊天。");
define("L_HELP_CMD_6", "忽略避免来自用户的消息显示，如果指定了昵称。<br />设置移除一个被忽略用户时  \"-\" 跟昵称 同时指定。<br />指定移除所有被忽略用户时用 \"-\" 但不指定昵称。<br />不使用任何选项，该命令弹出一个窗口，显示所有被忽略的昵称。");
define("L_HELP_CMD_7", "召回前面键入的文本（命令或消息）。");
define("L_HELP_CMD_8", "显示/隐藏 消息之前的时间。");
define("L_HELP_CMD_9", "从聊天的用户踢离开聊天室。此命令只能由那个房间的主持人或管理员使用。<br />可选，[".L_HELP_REASON."] 显示踢的原因（任何想要的文字）。<br />如果选项是使用 *，该命令将踢出所有没有特别权力的聊天用户 （只有游客和注册用户）。这是有用的，当服务器连接有问题，所有的人都应该重新载入他们聊天。在第二种情况下，[".L_HELP_REASON."] 建议让用户知道为什么，他们已经被踢出。");
define("L_HELP_CMD_10", "发送悄悄话给指定的用户 （其他用户将无法看到悄悄话）。");
define("L_HELP_CMD_11", "显示指定用户的资料。");
define("L_HELP_CMD_12", "弹出式窗口的 编辑用户的个人资料。");
define("L_HELP_CMD_13", "切换用户 进入/离开 当前房间的通知显示与否。");
define("L_HELP_CMD_14", "允许当前房间的管理员或主持人，升级 另一名注册用户到同一房间的主持人。");
define("L_HELP_CMD_15", "清除消息框，只显示最后5个消息。");
define("L_HELP_CMD_16", "保存到一个HTML文件的最后n个消息（通知的除外）。如果没有指定n，将考虑所有可用的讯息。");
define("L_HELP_CMD_17", "允许管理员在聊天室发送给所有用户公告。");
define("L_HELP_CMD_18", "邀请在其他房间使用者加入你所在的一个聊天室里");
define("L_HELP_CMD_19", "允许一个房间的主持人或管理员 \"驱逐\" 由管理员定义用户的禁入房间时间。<br />以后可以驱逐使用者在其它房间里聊天，比这一个他插入并使用 * 设置驱逐 \"永远\" 一个用户从整个聊天系统。<br />可选，[".L_HELP_REASON."] 显示驱逐的原因（任何想要的文字）。");
define("L_HELP_CMD_20", "描述你在做什么，不一定指自己。");
define("L_HELP_CMD_21", "公布房间和用户当谁尝试向您发送讯息<br />告知这时你是远离计算机。如果你想回来聊天，只要开始打字。");
define("L_HELP_CMD_22", "发送蜂鸣声，并选择性显示消息，在当前的房间。<br />用法：<br />- 旧的用法： \"/buzz\" 或 \"/buzz 讯息显示\" - 这播放的默认声音蜂鸣声在管理面板中定义；<br />- 衍生用途： \"/buzz ".L_HELP_BUZZ."\" 或 \"/buzz ".L_HELP_BUZZ." 讯息显示\" - 这是播放 声音名称.wav 档案 从 plus/sounds 声音活页夹； 请注意符号 \"~\" 在第二个字开始使用，这是声音文件的名称，不带扩展名 .wav (只允许 .wav 扩展名)。<br />依预设，这是一个 主持人/管理员 命令。");
define("L_HELP_CMD_23", "发送 <i>私语</i>（悄悄话）。该消息将送达目的地，无论用户在哪个房间。如果用户没有上线或已设置离开，你会被通知。");
define("L_HELP_CMD_24", "这个命令改变当前房间的话题。尽量不覆盖其他用户的话题。使用的重要课题。<br />默认情况下，这是 主持人/管理员 命令。<br />使用 \"/topic reset\" 命令 当前的话题将被删除并重置为预设的话题。<br />可选择，\"/topic * {}\" 或 \"/topic * reset\" 在所有的房间做同样的话题 (全聊天系统相同话题或回复为系统预设的话题)。"); 
define("L_HELP_CMD_25", "一个随机/赌运气的数字骰子游戏。<br />用法： /dice 或 /dice [n];<br />n可以采取任何值 <b>介于 1 到 %s</b> (它代表骰子数量)。如果没有数字输入，将使用默认的最大骰子。");
define("L_HELP_CMD_26", "这是一个比较复杂的版本属于这个 /dice 命令。<br />用法： /{n1}d[n2] 或 /{n1}d;<br />n1可以采取任何值 <b>介于 1 到 %s</b> (它代表了每次抛出的骰子数目)。<br />n2可以采取任何值 <b>介于 1 到 %s</b> (它代表了每个芯片的边数)。");
define("L_HELP_CMD_27", "它用高亮突出了一个特定的用户信息，以方便您阅读整个谈话。<br />用法： /high {用户} 或按 <img src=./images/highlightOff.gif> 在大厅用户名字右边 (在房间/用户列表)");
define("L_HELP_CMD_28", "它允许张贴 <i>一个单幅图像</i> 做为讯息。<br />用法：图片是在互联网上和任何人可以自由访问的。不要使用需要登录的网页。<br />必须输入完整的图像链接！ 例如 <b>/img&nbsp;http://ciprianmp.com/images/CIPRIAN.jpg</b><br />允许副档名： .jpg .bmp .gif .png。链接是区分大小写！<br />提示：输入 /img 然后是一个空格，并贴上 URL 在输入框中; 从网路取得图片网址的方法： 右键点击图片，内容，就会显示整个位址/URL (有时需要向下滚动) 并复制/粘贴在 /img 后面<br />不要使用自己电脑上的图片，它只会破坏聊天窗口！！！");
define("L_HELP_CMD_29", "第二个命令将允许当前房间的管理员或主持人，降级同房间以前晋升的另一名主持人到一般注册用户。<br />这 * 选项将用户从所有的房间降级。");
define("L_HELP_CMD_30", "这第二个命令 不同于 /me 但它会显示您的相应的标题，根据您的个人资料性别<br />例如 * ".sprintf(L_HELP_MR, "Ciprian")."正在看电视 或 * ".sprintf(L_HELP_MS, "Dana")." 很高兴。");
define("L_HELP_CMD_31", "改变用户列表中的排序：入口时间或按字母顺序排列。");
define("L_HELP_CMD_32", "这是第三个（角色扮演）版本的滚动骰子。<br />用法： /d{n1}[tn2] 或 /d{n1};<br />n1可以采取任何值 <b>1 到100 之间</b> (它代表了每个芯片的边数) ;<br />n2可以采取任何值 <b>介于 1 到 %s</b> (它代表了每次扔滚动骰子的数量)。");
define("L_HELP_CMD_33", "改变聊天讯息字体到用户选择的大小 (允许值 n： <b>7 跟 15 之间</b>); 这个 /size 命令 将复位为默认值的字体大小 (<b>".$FontSize."</b>)。");
define("L_HELP_CMD_34", "这将允许用户指定文字讯息的一个方向 (ltr = 从左到右，rtl = 从右到左)。");
define("L_HELP_CMD_35", "它允许张贴<i>一个视频</i> 或 <i>一个音频文件</i> 在一次小型的Flash播放器。<br />用法：只要贴上媒体源的URL！ 例如 <b>/video&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />您系统上需要安装 Shockwave Flash 播放器。链接是区分大小写！<br />提示：输入 //video 后跟一个空格，并贴上 URL 在输入框中。");
define("L_HELP_CMD_35a", "第二条命令只适用于具有 YouTube.com 的视频源。<br />例如 <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b>");
define("L_HELP_CMD_36", "它允许张贴 <i>一个YouTube影片</i> 在一次小型的Flash播放器。<br />用法：只需贴上要播放的来源网址！ 例如 <b>/tube&nbsp;http://www.youtube.com/watch?v=ypAvUNiZG5k</b><br />您需要在系统上安装 Shockwave Flash 播放器。链接是区分大小写的！<br />提示：输入 /tube 后跟一个空格，再粘贴 URL 到发言框中。");
define("L_HELP_CMD_37", "它允许张贴 <i>MathJax 方程式/公式</i> 在聊天中。<br />用法：只需将其粘贴在 TeX 或 MathML (原始) 代码！例如 <b>/math&nbsp;\sqrt{3x-1}+(1+x)^2</b><br />对于更多的代码样本和说明去： <a href=\"http://www.mathjax.org/demos/\" target=\"_blank\">http://www.mathjax.org/demos</a>。右键单击公式获取代码。<br />提示：输入 /math 其次是空格 代码 粘贴到框中。");
define("L_HELP_CMD_VAR", "别名(变种)： %s"); // a list of English and/or translated alternatives for each command
define("L_HELP_ETIQ_1", "交谈礼仪");
define("L_HELP_ETIQ_2", "我们的网站，希望保持友好的社会和乐趣，所以请坚持以下指导原则。如果你不遵守这些规则，我们的聊天主持人之一的，可以引导你聊天。<br /><br />谢谢你，");
define("L_HELP_ETIQ_3", "我们的交谈礼仪指引");
define("L_HELP_ETIQ_4", "<li>请勿 \"打广告\" 聊天打字废话或随机字母。</li>
<li>不要使用 aLtErnAtiNg 交替的字符。</li>
<li>保持 CAPS 的使用降到最低，因为它被认为是喊叫。</li>
<li>请记住，我们聊天的用户，来自世界各地的，最有可能的，你会遇到不同信仰的人，请善待这些人要有礼貌。</li>
<li>请勿对其他成员直接的亵渎。其实，尽量避开明确的使用 亵渎 和/或 脏话。</li>
<li>不要call其它成员他们的真实姓名，他们可能不明白。而是使用他们的绰号。</li>");

// messages frame
define("L_NO_MSG", "这个聊天室目前没有任何讯息 ...");
define("L_TODAY_DWN", "今天传送的信息下面开始");
define("L_TODAY_UP", "昨天传送的信息下面开始");

// message colors
$TextColors = array("黑" => "#000000",
				"红" => "#FF0000",
				"绿" => "#009900",
				"蓝" => "#0000FF",
				"紫" => "#9900FF",
				"深红" => "#990000",
				"深绿" => "#006600",
				"深蓝" => "#000099",
				"咖啡" => "#996633",
				"水蓝" => "#006699",
				"粉红" => "#FF6600");

// ignored popup
define("L_IGNOR_TIT", "忽略");
define("L_IGNOR_NON", "没有被忽略的使用者");

// whois popup
define("L_WHOIS_ADMIN", "系统管理员");
define("L_WHOIS_OWNER", "所有者");
define("L_WHOIS_TOPMOD", "超级室长");
define("L_WHOIS_MODER", "聊天室室长");
define("L_WHOIS_MODERS", "室长");
define("L_WHOIS_OTHERS", "其他用户");
define("L_WHOIS_USER", "用户");
define("L_WHOIS_GUEST", "访客");
define("L_WHOIS_REG", "注册的");
define("L_WHOIS_BOT", "机器人");

// Notification messages of user entrance/exit
define("ENTER_ROM", "%s 进入这个聊天室。");
define("L_EXIT_ROM", "%s 离开这个聊天室。");
if ((ALLOW_ENTRANCE_SOUND == "1" || ALLOW_ENTRANCE_SOUND == "3") && ENTRANCE_SOUND) define("L_ENTER_ROM", ENTER_ROM.L_ENTER_SND);
else define("L_ENTER_ROM", ENTER_ROM);
define("L_ENTER_ROM_NOSOUND", ENTER_ROM);

// Clean mod/fix by Ciprian
define("L_BOOT_ROM", "%s 从这个闲置的房间已自动启动。");
define("L_CLOSED_ROM", "%s 关闭了浏览器。");

// Text for /away command notification string:
define("L_AWAY", "%s 标记为离开...");
define("L_BACK", "%s 又回来了！");

// Quick Menu mod
define("L_QUICK", "快速选单");

// Topic Banner mod
define("L_TOPIC", "已经设置话题到：");
define("L_TOPIC_RESET", "已经重置这个话题");
define("L_HELP_TOP", "话题至少要有两个词");
define("L_BANNER_WELCOME", "欢迎到 %s！");
define("L_BANNER_TOPIC", "话题：");
define("L_DEFAULT_TOPIC_1", "欢迎光临云月楼音乐聊天系统！");

// Img cmd mod
define("L_PIC", "张贴图片");
define("L_PIC_RESIZED", "调整到");
define("L_HELP_IMG", "张贴图像的完整路径");
define("L_NO_IMAGE", "这不是一个公共的远程图像的一个有效的网址。\\n再次尝试！");

// Demote command by Ciprian
define("L_IS_NO_MOD_ALL", "%s 不再是任何这个聊天室的主持人。");
define("L_IS_NO_MODERATOR", "%s 不再是这个聊天室的主持人。");
define("L_ERR_IS_ADMIN", "%s 是这里的管理员！\\n你不能改变他的权限。");

// Info mod by Ciprian - displays a list of all the features & mods, including Bot's name, on the welcome page
define("INFO_CMDS", "提供额外的命令：");
define("INFO_MODS", "额外的功能/可用 MODS：");
define("INFO_BOT", "我们提供的BOT：");

// Profile mod
define("L_PRO_1", "使用语言");
define("L_PRO_1a", "语言");
define("L_PRO_2", "最爱连结 1");
define("L_PRO_3", "最爱连结 2");
define("L_PRO_4", "简介");
define("L_PRO_5", "图片 网址");
define("L_PRO_6", "名称/文本颜色");

// Avatar mod
define("L_AVATAR", "头像");
define("L_ERR_AV", "网址无效或不存在的主机。");
define("L_TITLE_AV", "您当前的头像：");
define("L_CHG_AV", "点击 \"".L_REG_16."\" 在个人资料表格<br />来储存您的头像。");
define("L_SEL_NEW_AV", "选择一个新的头像");
define("L_EX_AV", "例如");
define("L_URL_AV", "网址：");
define("L_EXPL_AV", "(输入网址，然后按Enter键 查看)");
define("L_CANCEL", "取消");
define("L_AVA_REG", "你必须先注册\\n才能来改变你的头像图标");
define("L_SEL_NEW_AV_CONFIRM", "当这种档案形式不能提交。\\n目前指向的虚拟化身，将会失去\\到目前为止！\\n\\n你确定？");

// PlusBot bot mod (based on Alice bot)
define("BOT_TIPS", "提示： 我们的机器人是公开活跃在这个房间。若要机器人开始说话，打字输入 <b>hello ".C_BOT_NAME."</b>。谈话结束，打字输入： <b>bye ".C_BOT_NAME."</b>。(私人： /to <b>".C_BOT_NAME."</b> 讯息)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIV_TIPS", "提示： 我们的机器人是公开活跃在 %s 房间。你只能通过点击它的名字和私下用悄悄话跟机器人交谈。(指令： /wisp <b>".C_BOT_NAME."</b> 讯息)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_PRIVONLY_TIPS", "提示： 我们的机器人是不公开活跃。通过点击它的名字，你只能跟机器人私下谈。(指令： /to <b>".C_BOT_NAME."</b> 讯息 或 /wisp <b>".C_BOT_NAME."</b> 讯息)"); //make sure your translation don't go too long here; it must fit to one line on the banner (under topic)
define("BOT_STOP_ERROR", "机器人是在这个房间里没有运行！");
define("BOT_START_ERROR", "在这个房间的机器人已在运行！");
define("BOT_DISABLED_ERROR", "机器人已被禁用从管理面板！");

// Dice v.1, v.2 and v.3 modes
define("DICE_RESULTS", "滚动骰子，结果是：");
define("DICE_WRONG", "你必须选择你想滚多少骰子\\n(选择一个介于1和 ".MAX_ROLLS.")。\\n只需键入/dice 滚动所有的 ".MAX_ROLLS." 骰子。");
define("DICE2_WRONG", "第二个值介于1和 ".MAX_ROLLS."。\\n留下它空白到使用全部 ".MAX_ROLLS." dice\\n(例如 /".MAX_DICES."d 或 /".MAX_DICES."d".MAX_ROLLS.")。");
define("DICE2_WRONG1", "第一个值介于1和 ".MAX_DICES."。\\n(例如 /".MAX_DICES."d 或 /".MAX_DICES."d".MAX_ROLLS.")。");
define("DICE3_WRONG", "第一（d）值介于1和 100。\\n第二个（t）值介于1和 ".MAX_ROLLS."。\\n留下它空白到使用全部 ".MAX_ROLLS." 骰子\\n(例如 /d50 或 /d100t".MAX_ROLLS.")。");

// Private Message Popup mod by Ciprian
define("L_REG_POPUP", "打开弹出窗口私人讯息");
define("L_REG_POPUP_NOTE", "您必须禁用弹出窗口阻止程序！( 关闭快显封锁程式 )");
define("L_PRIV_POST_MSG", "发送悄悄话！");
define("L_PRIV_MSG", "收到新的悄悄话！");
define("L_PRIV_MSGS", "收到新的私人讯息 %s 则！");
define("L_PRIV_MSGSa", "这里是前10条消息！<br />使用底部的连结看到其余的。");
define("L_PRIV_MSG1", "从：");
define("L_PRIV_MSG2", "房间：");
define("L_PRIV_MSG3", "到：");
define("L_PRIV_MSG4", "留言：");
define("L_PRIV_MSG5", "发表于：");
define("L_PRIV_REPLY", "回覆");
define("L_PRIV_READ", "请按下 ’".L_REG_25."’ 按钮标记为所有的文章已读！");
define("L_PRIV_POPUP", "您可以随时 停用 /重新启用 这个弹出的功能<br />在编辑个人资料");
define("L_PRIV_POPUP1", "简介</a> (只有注册用户)");
define("L_NOT_ONLINE", "%s 现在不在线上。");
define("L_PRIV_NOT_ONLINE", "%s 现在不在线上，\\n但登录后，仍然会收到您的消息。");
define("L_PRIV_NOT_INROOM", "%s 是不在这个房间。\\n如果您仍然希望向用户密语这条，\\使用这个命令： /wisp %s 留言内容。");
define("L_PRIV_AWAY", "%s 标记为离开，\\n但仍然会收到您的留言\\n当他回到电脑前时。");
define("PM_DISABLED_ERROR", "耳语（私人讯息）\\在此聊天已被禁用。");
define("L_NEXT_PAGE", "前往下一页");
define("L_NEXT_READ", "阅读 下一个 %s"); // message / 10 messages
define("L_ROOM_ALL", "所有房间");
define("L_PRIV_NO_MSGS", "没有收到的私人讯息");
define("L_PRIV_READ_MSG", "收到 1 则私人讯息"); //singular
define("L_PRIV_READ_MSGS", "收到 %s 则的私人讯息"); //plural
define("L_PRIV_MSGS_NEW", "新");
define("L_PRIV_MSGS_READ", "阅读");
define("L_PRIV_MSG6", "状态：");
define("L_PRIV_RELOAD", "重新载入网页");
define("L_PRIV_MARK_ALL", "全部标记为已读");
define("L_PRIV_MARK_SEL", "标记选定为已读");
define("L_PRIV_REMOVE", "删除检查项目管理");
define("L_PRIV_PM", "(私人)");
define("L_PRIV_WISP", "(耳语)");

// Color Input Box mod by Ciprian
define("L_ENABLED", "启用");
define("L_DISABLED", "禁用");
define("L_COLOR_HEAD_SETTINGS", "在此服务器上的当前设置：");
define("L_COLOR_HEAD_SETTINGSa", "预设的色彩：");
define("L_COLOR_HEAD_SETTINGSb", "预设的色彩：");
define("L_COL_HELP_TITLE", "颜色选择器");
define("L_COL_HELP_SUB1", "使用：");
define("L_COL_HELP_P1", "编辑您的个人资料（您的用户名颜色相同的颜色），您可以选择自己的默认颜色。你仍然可以使用任何其他颜色。要改变从一个随机使用您的默认颜色，你有一次选择默认的颜色 (空值) - 它是在选择列表中的第一个。");
define("L_COL_HELP_SUB2", "提示：");
define("L_COL_HELP_P2", "<u>色彩范围</u><br />根据您的浏览器/操作系统功能，它是可能的，有的颜色不会呈现。只有16种颜色的名称是由W3C的HTML4.0标准的支持：");
define("L_COL_HELP_P2a", "如果一个用户声称，他不能看到你所选的颜色，这意味着他很可能使用的是旧的浏览器。");
define("L_COL_HELP_SUB3", "设置定义在这个聊天室：");
define("L_COL_HELP_P3", "<u>级别使用颜色的权限</u>：<br />1。管理员可以使用任何颜色。<br />管理员的默认颜色 <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>。<br />2。版主可以使用任何颜色，但不能用 <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN> 跟 <SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>。<br />用于版主的默认颜色是 <SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN>。<br />3。其他用户可以使用任何颜色，但不能用 <SPAN style=\"color:".COLOR_CA."\">".COLOR_CA."</SPAN>，<SPAN style=\"color:".COLOR_CA1."\">".COLOR_CA1."</SPAN>，<SPAN style=\"color:".COLOR_CM."\">".COLOR_CM."</SPAN> 跟 <SPAN style=\"color:".COLOR_CM1."\">".COLOR_CM1."</SPAN>。");
define("L_COL_HELP_P3a", "默认颜色为 <u><SPAN style=\"color:".COLOR_CD."\">".COLOR_CD."</SPAN></u>。<br /><br /><u>技术性的东西</u>: 这些颜色已经被系统管理员定义在管理面板。<br />如果出现任何错误，或者如果有什么你不喜欢默认的颜色，你应该联系<b>管理员</b> 首先，没有在房间里的其他用户。:-)");
define("L_COL_HELP_USER_STATUS", "您的状态");
define("L_COL_TUT", "在聊天室中使用彩色文字");
define("L_NULL", "空值");
define("L_NULL_F", ""); // feminine word, if it's the case
define("L_ROOM_COLOR", "房间的颜色");
define("L_PRO_COLOR", "配置文件的颜色");

// Alert messages on errors for Color Input Box mod by Ciprian
define("COL_ERROR_BOX_MODA", "只有管理员可以使用 ".COLOR_CA." 颜色！\\n\\n你的文字颜色将重置为 ".COLOR_CM."！\\n\\n请选择其他颜色。");
define("COL_ERROR_BOX_USRA", "只有管理员可以使用 ".COLOR_CA." 颜色！\\n\\n不要尝试使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CM." 或 ".COLOR_CM1."。\\n\\n这些是保留给超级用户！\\n\\n你的文字颜色将重置为 ".COLOR_CD."！\\n\\n请选择其他颜色。");
define("COL_ERROR_BOX_USRM", "你必须是一个主持人才能使用 ".COLOR_CM." 颜色！\\n\\n不要尝试使用 ".COLOR_CA."，".COLOR_CA1."，".COLOR_CM." 或 ".COLOR_CM1."。\\n\\n这些是保留给超级用户！\\n\\n你的文字颜色将重置为 ".COLOR_CD."！\\n\\n请选择其他颜色。");

//Welcome message to be displayed on login
define("L_WELCOME_MSG", "欢迎来到我们的聊天。请遵守纯净礼仪，一边聊天：<I>尝试愉快和礼貌</I>。");
if ((ALLOW_ENTRANCE_SOUND == "2" || ALLOW_ENTRANCE_SOUND == "3") && WELCOME_SOUND) define("WELCOME_MSG", L_WELCOME_MSG.L_WELCOME_SND);
else define("WELCOME_MSG", L_WELCOME_MSG);
define("WELCOME_MSG_NOSOUND", L_WELCOME_MSG);

// Send alert to users in chat when important settings are changed in admin panel
define("L_RELOAD_CHAT", "此服务器的设置，已被改变了。为了避免发生故障，请重新加载浏览器 (按F5键或退出，并重新进入聊天)。");

//Size command error by Ciprian
define("L_ERR_SIZE", "字体大小的值只能是\\n空的（进行复位）或7至15");

// Password reset form by Ciprian
define("L_PASS_0", "密码重置表");
define("L_PASS_1", "密码提示问题");
define("L_PASS_2", "你的第一部车子是什么品牌？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_3", "你的第一个宠物是什么名字？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_4", "你最喜爱的饮料是什么牌子？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_5", "你的出生日期是什么？"); // Don't change this question! Just translate it! And keep it short!
define("L_PASS_6", "密码提示答案");
define("L_PASS_7", "重设密码");
define("L_PASS_8", "您的密码已成功重置");
define("L_PASS_9", "请用您的新密码进入聊天");
define("L_PASS_10", "请用您的新密码进入聊天： %s");
define("L_PASS_11", "欢迎回到我们的聊天服务器！");
define("L_PASS_12", "选择你的问题 ...");
define("L_ERR_PASS_1", "错误的用户名。选择你的。");
define("L_ERR_PASS_2", "错误的电子邮件，再试一次！");
define("L_ERR_PASS_3", "不对的密码提示问题。<br />答复到如下所示的那个！");
define("L_ERR_PASS_4", "错误的密码提示答案。再试一次！");
define("L_ERR_PASS_5", "您未设置您私有/密码提示。");
define("L_ERR_PASS_6", "你还没有设置您的私人/密码提示。<br />你不可能使用这个形式。请与管理员联系！");

// admin stuff - added for administrators promotions/demotions in admin panel - by Ciprian
define("L_ADM_3", "%s 已成为这个聊天室的管理员。");
define("L_ADM_4", "%s 不再是这个聊天室的管理员。");

// Open Schedule by Ciprian
define("L_DAILY", "每日");
define("L_ALWAYS", "永远");
define("L_OPEN", "打开");
define("L_CLOSED", "关闭");
define("L_OPEN_PUB", "开放到公众");
define("L_CLOSED_PUB", "封闭到公众");

// Links popup page by Alex
define("L_LINKS_1", "发布链接");
define("L_LINKS_2", "在这里，你可以访问发布的链接");

// Javascript Status/title messages on links/images mouseover
define("L_CLICKS", "点击这里 %s %s");
define("L_CLICK", "点击这里 %s");
define("L_LINKS_3", "打开链接");
define("L_LINKS_4", "打开作者的网站");
define("L_LINKS_5", "插入这个笑脸");
define("L_LINKS_6", "联系");
define("L_LINKS_7", "访问phpMyChat-Plus主页");
define("L_LINKS_8", "加入phpMyChat小组");
define("L_LINKS_9", "发送您的脸书"); 
define("L_LINKS_10", "下载 phpMyChat-Plus");
define("L_LINKS_11", "查看谁在聊天");
define("L_LINKS_12", "打开聊天的登录页面");
define("L_LINKS_13", "播放这个声音"); // can also be translated as "to play this sound"
define("L_LINKS_14", "使用此命令");
define("L_LINKS_15", "打开");
define("L_LINKS_16", "笑脸图库");
define("L_LINKS_17", "升序排序");
define("L_LINKS_18", "降序排序");
define("L_LINKS_19", "设置/修改您的全球认证肖像");
define("L_LINKS_20", "发布方程式"); //方程式
define("L_SWITCH", "切换到 %s"); // 例如 “切换到意大利" (鼠标停留的国旗国家 / 语言切换)
define("L_SELECTED", "现在设定"); // 例如 "French - selected" (Country Flags mouseover / Language switching)
define("L_SELECTED_F", ""); // feminine word, if it's the case
define("L_NOT_SELECTED", "未选择");
define("L_NOT_SELECTED_F", ""); // feminine word, if it's the case
define("L_EMAIL_1", "发送电子邮件");
define("L_FULLSIZE_PIC", "打开全尺寸图片");
define("L_PRIVACY", "阅读我们的隐私政策");
define("L_AUTHOR", "作者"); //Phrase will look like this: L_CLICK." ".L_LINKS_6." ".L_AUTHOR == Click here - to contact - the author
define("L_DEVELOPER", "此聊天室的开发人员"); //same here
define("L_OWNER", "此聊天室的所有者"); //same here
define("L_TRANSLATOR", "译者"); //same here

// Counter on login
define("L_VISITOR_REPORT", "... 开设日 %s 后访问人数");

// Status bar messages
define("L_JOIN_ROOM", "加入这个房间");
define("L_USE_NAME", "使用这个用户名");
define("L_USE_NAME1", "此用户名的地址");
define("L_WHSP", "悄悄话");
define("L_SEND_WHSP", "传送一个悄悄话");
define("L_SEND_PM_1", "传送留言");
define("L_SEND_PM_2", "传送一个私人讯息");
define("L_HIGHLIGHT", "高亮/取消-高亮");
define("L_HIGHLIGHT_SB", "高亮/取消-高亮 该用户的帖子");

//Lurking frame popup
define("L_LURKING_2", "潜伏页面");
define("L_LURKING_3", "是潜伏");
define("L_LURKING_4", "加入了");
define("L_LURKING_5", "未知");

// Extra options by Ciprian
define("L_EXTRA_OPT", "额外选项");
define("L_ARCHIVE", "打开纪录");
define("L_SOUNDFIX_IE_1", "IE 声音修正档");
define("L_SOUNDFIX_IE_2", "下载 IE 声音修正档");
define("L_LURKING_1", "打开潜伏的页");
define("L_REG_BRB", "广检(需要先注册)");
define("L_DEL_BYE", "不要等待我...");
define("L_EXTRA_PRIV1", "读取留言");
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
define("L_S_MON", "一");
define("L_S_TUE", "二");
define("L_S_WED", "三");
define("L_S_THU", "四");
define("L_S_FRI", "五");
define("L_S_SAT", "六");
define("L_S_SUN", "日");

// Localized date format
// Set the CN specific date/time format
if (stristr(PHP_OS,'win')) {
setlocale(LC_ALL, "zh-cn.UTF-8", "Chinese.UTF-8", "zh-cn", "Chinese_China");
} else {
setlocale(LC_ALL, "zh_CN.UTF-8", "Chinese.UTF-8");
}
define("L_LANG", "zh_CN");
// Set the first day of the week in your language (0 for Sunday, 1 for Monday)
define("FIRST_DAY", "1");
define("L_CAL_FORMAT", "%Y年%B%d日");
define("ISO_DEFAULT", "ISO2022_CN_GB");
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
define("L_LONG_DATE", "%Y年%-m月%-d日(%A)"); //Change this to your local desired format (keep the short form)
define("L_LONG_DATETIME", "%Y年%-m月%-d日(%A) %H:%M:%S"); //Change this to your local desired format (keep the long form)
}

if(!defined("L_DAY")) define("L_DAY", "日");
if(!defined("L_MONTH")) define("L_MONTH", "月");
if(!defined("L_YEAR")) define("L_YEAR", "年");

// Chat Activity displayed on remote web pages
define("LOGIN_LINK", "<A HREF='".C_CHAT_URL."?L=".$L."' TITLE='".sprintf(L_CLICK,L_LINKS_12)."' onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_12)."。'; return true;\" TARGET=_blank>");
define("NB_USERS_IN", "使用者".LOGIN_LINK."聊天</A>在这个时候。");
define("USERS_LOGIN", "这个时段1个用户在 ".LOGIN_LINK."聊天</A>。");
define("NO_USER", "这个时段没有人 ".LOGIN_LINK."聊天</A>。");
define("L_PRIV_REPLY_LOGIN", "登录到聊天，如果你想 ".LOGIN_LINK."发表回覆</A> 任何上面列出的未读项目经理");

// Language names
define("L_LANG_AR", "阿根廷 西班牙");
define("L_LANG_BG", "保加利亚语 - 西里尔文");
define("L_LANG_BR", "葡萄牙语（巴西）");
define("L_LANG_CA", "加泰罗尼亚");
define("L_LANG_CNS", "简体中文"); // Chinese simplified
define("L_LANG_CNT", "繁体中文"); // Chinese traditional
define("L_LANG_CZ", "捷克文");
define("L_LANG_DA", "丹麦文");
define("L_LANG_DE", "德文");
define("L_LANG_EN", "英文"); // 仅管理面板
define("L_LANG_ENUK", "英国英文"); // 英国的格式和标志
define("L_LANG_ENUS", "美国英文"); // 美国的格式和标志
define("L_LANG_ES", "西班牙");
define("L_LANG_FA", "波斯文");
define("L_LANG_FI", "芬兰文");
define("L_LANG_FR", "法文");
define("L_LANG_GR", "希腊文");
define("L_LANG_HE", "希伯来文");
define("L_LANG_HI", "印度文 (梵文)");
define("L_LANG_HU", "匈牙利");
define("L_LANG_ID", "印度尼西亚（印度尼西亚文）");
define("L_LANG_IT", "意大利");
define("L_LANG_JA", "日语（汉字）");
define("L_LANG_KA", "格鲁吉亚语");
define("L_LANG_NB", "挪威文 (Bokmål)");
define("L_LANG_NN", "新挪威语 (Nynorsk)");
define("L_LANG_NE", "尼泊尔文");
define("L_LANG_NL", "荷兰文");
define("L_LANG_PL", "波兰文");
define("L_LANG_PT", "葡萄牙文");
define("L_LANG_RO", "罗马尼亚文");
define("L_LANG_RU", "俄文 - Cyrillic");
define("L_LANG_SK", "斯洛伐克文");
define("L_LANG_SRC", "塞尔维亚 - Cyrillic");
define("L_LANG_SRL", "塞尔维亚 - 拉丁");
define("L_LANG_SV", "瑞典文");
define("L_LANG_TH", "泰文");
define("L_LANG_TR", "土耳其文");
define("L_LANG_UK", "乌克兰 - Cyrillic");
define("L_LANG_UR", "Urdu 乌尔都语");
define("L_LANG_VI", "越南文");
define("L_LANG_YO", "约鲁巴语"); //尼日利亚和刚果语

// Skins preview page
define("L_SKINS_TITLE", "外观风格预览");
define("L_SKINS_TITLE1", "外观风格 %s 到 %s 预览"); // Skins 1 to 4 preview
define("L_SKINS_AV", "可用外观风格");
define("L_SKINS_NONAV", "还有没有定义外观风格在这 \"skins\" 数据夹");
define("L_SKINS_COPY", "&copy;%s 外观风格来自 %s");

// Swap image titles by Ciprian
define("L_GEN_ICON", "性别图示");

// Ghost mode by Ciprian
define("L_GHOST", "幽灵");
define("L_SUPER_GHOST", "超级幽灵");
define("L_NO_GHOST", "可见的");

// Sorting options by Ciprian
define("L_ASC", "递增");
define("L_DESC", "递减");

// Returning visitors counter on profiles by Ciprian
define("L_LOGIN_COUNT", "总访问量");

// Gravatar from email mod by Ciprian
define("L_GRAV_USE", "使用的全球认证肖像");

// Uploader mod by Ciprian
define("L_UPLOAD", "上传 %s");
define("L_UPLOAD_IMG", "图档");
define("L_UPLOAD_SND", "声音档");
define("L_UPLOAD_FLS", "档案");
define("L_UPLOAD_SUCCESS", "%s 顺利的上传 %s。");
define("L_FILES_TITLE", "上传管理");

// Room restriction mod by Ciprian
define("L_RESTRICTED", "限会员");
define("L_RESTRICTED_ROM", "%s 从这个房间已经被成功地限制。");

// OpenID login mod by Ciprian
define("L_OPID_SIGN", "登入到一个 OpenID");
define("L_OPID_REG", "导入您的OpenID个人资料");

// Support buttons
define("L_SUPP_WARN", "您已选择到自由开发作者捐献\\n".APP_NAME." 通过捐赠给开发者。\\n感谢您的支持！\\n\\n注：收款人不是这个聊天室的主人。\\n请输入金额在下一页。\\n\\n继续？");
define("L_SUPP_ALT", "通过 PayPal 支助 ".APP_NAME." 的发展 - 它是快速，自由和安全的！");

// Video & Audio & Youtube cmds (Embevi & YouTube player class)
define("L_AUDIO", "音讯档案发布人");
define("L_VIDEO", "视讯发布人");
define("L_HELP_VIDEO", "张贴的视频或音频源的完整路径");
define("L_NO_VIDEO", "不能嵌入的 URL。\\n这是不是一个有效的URL，接受公众的视频或音频源\\n请再试！");
define("L_ORIG_VIDEO", "打开原始的来源网站");

// Birthday mod - by Ciprian
define("L_PRO_7", "出生日期");
define("L_PRO_8", "显示生日在个人资料公开信息");
define("L_PRO_9", "显示年龄在个人资料公开信息");
define("L_PRO_10", "年龄");
define("L_PRO_11", "%1\$d 年，%2\$d 月 和 %3\$d 日");
define("L_DOB_TIT_1", "生日列表");
$L_DOB_SUBJ = "%s 生日快乐！";

// MathJax (MathML/TeX) formulas rendering in chat - by Ciprian
define("L_EQUATION", "方程式");
define("L_MATH", "%s 来自 %s"); //e.g. "Equation posted by username" (defined above); the word "Equation" will render as a url to show popup with the posted formulas
?>