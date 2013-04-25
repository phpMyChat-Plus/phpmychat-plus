<?php
// File : chinese_simplified/localized.config.php - plus version （17.02.2013 - rev.1）
// Translated by clouds_music <clouds.music@gmail.com>
// Do not use ' but use ’ instead （utf-8 edit bug）

//Configuration Global used variables
define("A_CONFSAVE", "储存变更的设定");
define("A_CONFOPTIONAL", "可选的");
define("A_CONFREQUIRED", "需要");
define("A_CONFNOTSEND", "不传送");
define("A_CONFSEND", "传送");
define("A_CONFUNRESTRICT", "无限制");
define("A_CONFRESTRICT", "仅限");
define("A_CONFHIDE", "隐藏");
define("A_CONFSHOW", "显示");
define("A_CONFHINT", "提示：%s");
define("A_CONFIMPORTANT", "重要的是：%s");
define("A_CONFNOTE", "注：%s");
define("A_CONFHERE", "点击这里"); //Click here
define("A_CONFWIDTH", "宽");
define("A_CONFHEIGHT", "高");
define("A_CONFPX", "px."); #pixels
define("A_CONFBOT", "BOT");
define("A_CONFRDQ", "随机引用");

//Navigation Menu
define("A_CONF_0", "一般设定");
define("A_CONF_1", "聊天服务器数据");
define("A_CONF_2", "语言");
define("A_CONF_3", "业主数据");
define("A_CONF_4", "注册");
define("A_CONF_5", "功能");
define("A_CONF_6", "时序");
define("A_CONF_7", "打开附表");

define("A_CONF_26", "界面");
define("A_CONF_8", "登录版面");
define("A_CONF_9", "室及外观");
define("A_CONF_10", "颜色");
define("A_CONF_11", "音效设定");
define("A_CONF_12", "脏话");
define("A_CONF_13", "上传管理");

define("A_CONF_14", "特色与外挂");
define("A_CONF_15", "私人讯息");
define("A_CONF_16", "机器人设定");
define("A_CONF_17", "指令");
define("A_CONF_18", "多媒体");
define("A_CONF_19", "快速功能表");
define("A_CONF_20", "头像 & Gravatars");
define("A_CONF_21", "日志外挂");
define("A_CONF_22", "潜水外挂");
define("A_CONF_23", "随机引用");
define("A_CONF_24", "隐身控制");
define("A_CONF_25", "生日外挂");

define("A_CONF_27", "帮助和支援");
define("A_CONF_28", "下载网页");
define("A_CONF_29", "镜像网页");
define("A_CONF_30", "项目页");
define("A_CONF_31", "项目SVN页");
define("A_CONF_32", "支援组页面");
define("A_CONF_33", "阅读 %s 发行 附注"); //%s = version //Read %s Release notes
define("A_CONF_35", "%s 下载"); //%s = version
define("A_CONF_36", "线上常见问题");
define("A_CONF_37", "试试我的伺服器");
define("A_CONF_38", "提交您的 反馈"); //Submit your feedback
define("A_CONF_39", "愿意捐赠？");
define("A_CONF_40", "发行日期:\\n%s"); //%s = date
define("A_CONF_41", "Plus 开发人员: %s"); //%s = developer name
define("A_CONF_42", "Big thanks to all the contributors\\nto the phpHeaven Team work\\nand the phpMyChat groups on\\nYahoo！ and Sourceforge.\\n\\nThank you for using our work！");
define("A_CONF_43", "这是什么？");
define("A_CONF_44", "关于 Plus");

define("A_CONF_46", "首页");
define("A_CONF_46a", "滚动家");
define("A_CONF_47", "储存");
define("A_CONF_47a", "跳转到保存按键按钮");

//Content - Errors Success
define("A_CONF_ERR_1", "组态设定已成功更改！");
define("A_CONF_ERR_2", "Don’t forget to change remotely the name of %s directory to %s<br />（and set its attributes to <b>777</b>）"); // %s = folder names （old|new）
define("A_CONF_ERR_3", "下载 %s 更新的，从 %s。"); //%s = version | here （url）
define("A_CONF_ERR_4", "下载 %s 更新的"); //%s = version
define("A_CONF_ERR_5", "上次最后储存这些设定 on %s by %s！");  //%s = date | admin username //These settings were last saved on %s by %s
define("A_CONF_ERR_6", "您必须输入一个用户名，为你的 %s！"); //%s = Bot/Quote word （defined on lines 23 and 24）
define("A_CONF_ERR_7", "只允许这些额外的字符：");
define("A_CONF_ERR_8", "空格，逗号或反斜线 （\\） 不允许。<br />检查该语法 %s 的名称 %s！"); //%s = Bot/Quote word | （Bot/Quote names）
define("A_CONF_ERR_9", "发现不能使用的字，在 随机引用 的用户名里 %s %s！"); //%s = Bot/Quote word | （Bot/Quote names） //Banished word found in the %s name %s！
define("A_CONF_ERR_10", "这是随机引用的名称 %s %s 已被注册。<br />请选择另一个名称！！"); //%s = Bot/Quote word | （Bot/Quote names） //The name of your %s %s is already registered.<br />Choose another name！
define("A_CONF_ERR_11", "如果更改此设置，同时也有用户登录，您的所有用户必须重新载入他们的浏览器或退出并重新登录。如果您启用/禁用此，将被自动发送到所有房间的一个公告。");

//Content - Title
define("A_CONFTITLE_0", "设定页面");
define("A_CONFTITLE_1", "配置选项");
define("A_CONFTITLE_2", "当前设定");

//Content - Chat Server Data
define("A_CONFCONTENT_1", "在服务器上启用自动在线更新检查。");
define("A_CONFCONTENT_2", "这个脚本可以自动检查新版本： ciprianmp.com/latest/ 或 svn.sourceforge.net！");
define("A_CONFCONTENT_3", "启用统计的信息在聊天室。");
define("A_CONFCONTENT_4", "如果您的服务器的带宽确实有限，或您发现您的服务器超载，您应禁用这个外挂！");
define("A_CONFCONTENT_5", "旧邮件清理时间。");
define("A_CONFCONTENT_7", "不活动的用户在房间的自动启动时间。");
define("A_CONFCONTENT_8", "此自动引导功能，强迫用户活跃在房间。如果他们想成为潜伏的，他们应该只使用潜伏页。管理员，主持人和离开用户不会被启动。");
define("A_CONFCONTENT_10", "删除此时段内不活跃注册用户帐户 （0 永远不会）。");

//Content - Languages
define("A_CONFCONTENT_12", "用于聊天室的预设语言。");
define("A_CONFCONTENT_12a", "语言国旗选择器");
define("A_CONFCONTENT_13", "英文格式（标志和日期和时间格式）。");
define("A_CONFCONTENT_13a", "英语区域设置格式");
define("A_CONFCONTENT_14", "允许用户选择一个可用的语言译本。");
define("A_CONFCONTENT_14_1", "仅预设");
define("A_CONFCONTENT_14_2", "所有可用的");
define("A_CONFCONTENT_15", "国旗的图像类型。");
define("A_CONFCONTENT_15a", "国旗格式");
define("A_CONFCONTENT_15b", "2D （老）");
define("A_CONFCONTENT_15c", "3D （新）");

//Content - Owner data
define("A_CONFCONTENT_16", "要发送电子邮件标题，输入管理员的真实姓名（或聊天的名称）。");
define("A_CONFCONTENT_17", "输入管理员的电子邮件在发送电子邮件标题。");
define("A_CONFCONTENT_18", "这信箱也用在接受新用户注册的通知。");
define("A_CONFCONTENT_19", "输入您的聊天网址在发送电子邮件标题。");
define("A_CONFCONTENT_20", "输入您的电子邮件的预设结尾问候语。");
define("A_CONFCONTENT_21", "这仅用于管理员发送电子邮件表格 \"".A_MENU_4."\"。"); //This is used only by admins in the \"".A_MENU_4."\" sheet.
define("A_CONFCONTENT_22", "公共聊天服务器名称，你想在网络上称为。");
define("A_CONFCONTENT_23", "LOGO 图片路径。");
define("A_CONFCONTENT_23_1", "隐藏 LOGO");
define("A_CONFCONTENT_23_2", "显示 LOGO");
define("A_CONFCONTENT_24", "LOGO 的图像显示（允许绝对或相对路径） - 例如 http://path_to_the_image.jpg 或 ./../path_to_the_image.jpg");
define("A_CONFCONTENT_25", "（path_to_the_image.jpg 可以是任何可访问图像/从网上 - .jpg，.gif，.bmp，.png）");
define("A_CONFCONTENT_26", "网站 被打开网址（在新窗口打开）。");
define("A_CONFCONTENT_27", "LOGO 在鼠标悬停要显示的文字 （ALT/TITLE 属性）。");

//Content - Registration
define("A_CONFCONTENT_28", "让注册用于您的聊天系统。");
define("A_CONFCONTENT_29", "禁用此唯一的，如果你想手动添加注册用户，或阅读 <a href=#reg_hint class=\"ChatLink\">提示</a> 使其自动等待您的批准下文。");
define("A_CONFCONTENT_30", "需要注册才能加入聊天。");
define("A_CONFCONTENT_31", "注册和设定档上需要填姓氏和名字。");
define("A_CONFCONTENT_32", "自动生成密码（并通过电子邮件发送到新的注册用户）。");
define("A_CONFCONTENT_33", "生成和通过电子邮件发送密码的长度。");
define("A_CONFCONTENT_34", "新注册用户发送帐户的详细资料。");
define("A_CONFCONTENT_35", "新用户注册传送帐户的详细资料（通知）给管理员。");
define("A_CONFCONTENT_37", "到这最好的设置，如果你想控制谁注册和进入您的聊天室：");
define("A_CONFCONTENT_38", "允许注册用于您的聊天室：");
define("A_CONFCONTENT_39", "需要注册加入聊天：如果 %s 设置，只有注册用户才能够登录到聊天室"); // %s = Required
define("A_CONFCONTENT_41", "产生密码并发电子邮件给新注册用户：");
define("A_CONFCONTENT_42", "传送新注册用户帐户的详细资料：");
define("A_CONFCONTENT_43", "传送新用户注册帐户的详细资料（通知）给管理员：");
define("A_CONFCONTENT_44", "因此，用户将选择自己所需的数据，将生成一个随机密码，但用户将不会收到电子邮件与密码，所以他仍然无法登录;他只会得到有关未决注册的通知邮件。");
define("A_CONFCONTENT_45", "在同一时间，管理员将收到 <u>2 电子邮件</u>：");
define("A_CONFCONTENT_46", "1。 是一份登记数据，用于管理员的将来参考（如用户忘记密码时）。这总是以英文发送邮件；");
define("A_CONFCONTENT_47", "2。 是电子邮件，其中包含新创建的帐户的随机密码和其余的资料（此电子邮件已经准备要发送/转发给用户，如果该帐户被批准）。此电子邮件编写将选择于登记用户语言。");
define("A_CONFCONTENT_48", "该管理员验证谁是这个人，用户提供了什么资料。如果他决定批准该用户帐户，管理员只会有第二封电子邮件转发到该用户的电子邮件（电子邮件地址已经被格式化审批）。另一种方法是去 \"".L_REG_4."\" 和发送电子邮件登录到该用户的电子邮件资料。或者，管理员甚至可以用该名称/密码登录在“编辑个人资料” 形成和调整/修改资料/密码。"); //%s = tab name
define("A_CONFCONTENT_50", "不要忘记放你正确的管理员电子邮件 %s，以完成以上所有这些工作）。同时要考虑到非公开（限制性，私人），这些设置会变成您的聊天服务器。如果你忽略了未能验证和批准帐户，用户也许就放弃不回来了。"); //%s = here （url）

//Content - Functionality
define("A_CONFCONTENT_53", "启用驱逐功能，并定义这延迟到它。");
define("A_CONFCONTENT_54", "0 = 已禁用，任意整数 = 驱逐天数");
define("A_CONFCONTENT_55", "驱逐类型。");
define("A_CONFCONTENT_56", "禁止 IP 和用户名同时进行或仅用 IP。");
define("A_CONFCONTENT_57", "- 第一个选项将禁止从一个共享IP的用户名，被禁止的用户来时非常有用，从一个共享的IP地址或父母控制之用 （例如：当一个共享的电脑 / 访问点是一个孩子使用）；");
define("A_CONFCONTENT_58", "- 第二个选项将禁止所有的用户名试图登录来自同一个 IP（更有效）。");
define("A_CONFCONTENT_59", "通过IP和用户名");
define("A_CONFCONTENT_60", "仅根据IP");
define("A_CONFCONTENT_61", "在邮件中使用图形表情符号。");
define("A_CONFCONTENT_62", "没有表情图");
define("A_CONFCONTENT_63", "显示表情图");
define("A_CONFCONTENT_64", "保持邮件中的 HTML tags。");
define("A_CONFCONTENT_65", "<b>简单</b>：保持粗体，斜体和下划线标记；<b>没有</b>：无保留");
define("A_CONFCONTENT_66", "简单");
define("A_CONFCONTENT_67", "没有");
define("A_CONFCONTENT_68", "显示丢弃的 HTML tags。");
define("A_CONFCONTENT_69", "移除废弃的 tags");
define("A_CONFCONTENT_70", "显示废弃的 tags");
define("A_CONFCONTENT_71", "启用发布链路保护通过打开链接在一个弹出窗口中。");
define("A_CONFCONTENT_72", "假如 启用，一个额外的窗口将被打开 与所有张贴的链接列表在一个用户的讯息。此选项可以保证额外的保护您的聊天室。");
define("A_CONFCONTENT_73", "直接从聊天中打开链接");
define("A_CONFCONTENT_74", "打开链接在一个弹出窗口");
define("A_CONFCONTENT_75", "默认消息滚动顺序。");
define("A_CONFCONTENT_76", "（仅适用于 \"non-H\" 浏览器 -  IE 或 Firefox 以外的其他）");
define("A_CONFCONTENT_77", "这些用户也可以使用 \"/order\" 命令来改变滚动顺序。");
define("A_CONFCONTENT_78", "最后在上面");
define("A_CONFCONTENT_79", "最后在底部");
define("A_CONFCONTENT_80", "进入聊室首先显示的讯息的默认数量。");
define("A_CONFCONTENT_81", "从来没有设置这 <b>\"0\"</b>；你可以将它设置到最低 <b>\"1\"</b> 但你必须启用至少一个 <b>接下来的两个设置</b>。<br />如果你想保留两集 \"通知\" 和 \"显示\"，这里的值<b>必须至少有 \"2\"</b>。");
define("A_CONFCONTENT_82", "用户还可以使用 /show \"n\" 或 /last \"n\" 命令来查看不同的数量。");
define("A_CONFCONTENT_83", "显示每个用户在聊天室的 进入/退出 的通知。");
define("A_CONFCONTENT_84", "没有通知");
define("A_CONFCONTENT_85", "通知房间");
define("A_CONFCONTENT_86", "显示欢迎词，当用户进入聊天室。");
define("A_CONFCONTENT_87", "没有欢迎讯息");
define("A_CONFCONTENT_88", "显示欢迎讯息");
define("A_CONFCONTENT_89", "说明/求助里 表情符号的每行数量。");
define("A_CONFCONTENT_90", "smilie_popup 表情符号的每行数量。");
define("A_CONFCONTENT_91", "显示帮助弹出聊天规则上的交谈礼仪（聊天的规则）。");
define("A_CONFCONTENT_92", "隐藏礼仪");
define("A_CONFCONTENT_93", "显示礼仪");
define("A_CONFCONTENT_94", "离开连结类型。");
define("A_CONFCONTENT_96", "Exit 链接");
define("A_CONFCONTENT_97", "离开 滚动门");
define("A_CONFCONTENT_95", "\"".A_CONFCONTENT_96."\" 代表原出口链路，\"".A_CONFCONTENT_97."\" 一扇门的形象代表门滚动。");
define("A_CONFCONTENT_98", "设置你希望你的用户可以使用注册/登录。");
define("A_CONFCONTENT_99", "这是默认的字符集：%s 登录测试，这不会破坏你聊天室的布局/功能。"); //%s = list of allowed characters
define("A_CONFCONTENT_101", "不允许这些字符，他们会破坏登录后聊天页面：惊叹号，斜线，反斜线，逗号，空格，单引号和双引号和 方形（盒）括号 （<b>! / \ , ' \" [ ]</b>）。");
define("A_CONFCONTENT_102", "虽然他们不会打破任何东西，它似乎 / ; 不能禁止从正在使用的登录名。$ 符号尚未被深深测试，但它也应避免，因为它通常为PHP变量。");

//Content - Timings
define("A_CONFCONTENT_103", "在状态栏上的时区偏移和世界时间。");
define("A_CONFCONTENT_104", "- 聊天服务器的时间和所需的位置之间的差异 （小时 - 整数）");
define("A_CONFCONTENT_105", "例如：如果我的伺服器托管在美国 - CST（-6），但聊天是在布加勒斯特位于罗马尼亚的社区 - EET（+2），我可能想显示我的罗马尼亚用户在正确的时间聊天。对于这一点，我必须将此值设置为8。也不允许负值。");
define("A_CONFCONTENT_106", "编辑 \"lib/worldtime.lib.php\" 添加您自己的城市（经络） - 仅适用于世界时间模式！");
define("A_CONFCONTENT_107", "服务器时间（标准）");
define("A_CONFCONTENT_108", "在聊天室只有世界时间（新）");
define("A_CONFCONTENT_109", "世界时间在首页及聊天室");
define("A_CONFCONTENT_110", "显示时间戳记在讯息前端。");
define("A_CONFCONTENT_111", "（同时显示服务器时间在状态栏）");
define("A_CONFCONTENT_112", "没有时间戳记在交谈中");
define("A_CONFCONTENT_113", "显示时间戳记在交谈中");
define("A_CONFCONTENT_114", "每次更新之间的默认超时。");
define("A_CONFCONTENT_116", "回访的访客计数器。");
define("A_CONFCONTENT_117", "它将返回一个注册用户多少次算聊天，个人资料页上显示的计数器 - WHOIS弹出查询。");
define("A_CONFCONTENT_118", "没有计数器在资料");
define("A_CONFCONTENT_119", "计算每次登录");
define("A_CONFCONTENT_120", "每小时一个计数");
define("A_CONFCONTENT_121", "每天一个计数");
define("A_CONFCONTENT_122", "每周一个计数");

//Content Chat Schedule
define("A_CONFCONTENT_123", "开放时间安排为您的聊天和会议室。");
define("A_CONFCONTENT_124", "这个 mod 是仍在发展！日程表中的字段已刻意的禁用。。");
define("A_CONFCONTENT_125", "每天的日程：");
define("A_CONFCONTENT_126", "周日时间表：");
define("A_CONFCONTENT_127", "周一时间表：");
define("A_CONFCONTENT_128", "周二时间表：");
define("A_CONFCONTENT_129", "周三时间表：");
define("A_CONFCONTENT_130", "周四时间表：");
define("A_CONFCONTENT_131", "周五时间表：");
define("A_CONFCONTENT_132", "周六时间表：");
define("A_CONFCONTENT_132a", "班");

//Content Login Layout
define("A_CONFCONTENT_133", "填写登入页面的背景。");
define("A_CONFCONTENT_134", "背景未填充");
define("A_CONFCONTENT_135", "填充背景");
define("A_CONFCONTENT_136", "显示背景图像在索引页上。");
define("A_CONFCONTENT_137", "填补房间背景图像，你需要编辑所需的样式和添加 BODY.frame 和 framePreview 属性 \"<b>background-image： url('path_to_the_image');</b>\" （允许绝对或相对路径） - 例如 http://path_to_the_image.jpg 或 ./../path_to_the_image.jpg - 样本在 style12.css.php。可选择，BODY.mainframe 可用于显示图像的背景的信息框架 （但这个图像就要被淘汰了，作出发布的文本浏览）。");
define("A_CONFCONTENT_138", "（path_to_the_image.jpg 可以是任何图像 访问 on/从网上 - .jpg， .gif， .bmp， .png）");
define("A_CONFCONTENT_139", "没有背景图片");
define("A_CONFCONTENT_140", "显示在登入页面");
define("A_CONFCONTENT_141", "图片的路径：");
define("A_CONFCONTENT_142", "显示删除连结在首页。");
define("A_CONFCONTENT_143", "（允许用户删除自己的个人资料）");
define("A_CONFCONTENT_144", "隐藏删除连结");
define("A_CONFCONTENT_145", "显示删除连结");
define("A_CONFCONTENT_146", "显示管理连结于首页。");
define("A_CONFCONTENT_147", "（一个连结打开这个管理面板）");
define("A_CONFCONTENT_148", "隐藏管理连结");
define("A_CONFCONTENT_149", "显示管理连结");
define("A_CONFCONTENT_150", "显示帮助的连结于index页面。");
define("A_CONFCONTENT_151", "隐藏帮助");
define("A_CONFCONTENT_152", "显示帮助");
define("A_CONFCONTENT_153", "启用资讯在index页面。");
define("A_CONFCONTENT_154", "（包含了一些关于聊天的额外功能的详细信息）");
define("A_CONFCONTENT_155", "隐藏资讯");
define("A_CONFCONTENT_156", "S显示资讯");
define("A_CONFCONTENT_157", "显示可用的额外命令。");
define("A_CONFCONTENT_158", "隐藏额外的命令");
define("A_CONFCONTENT_159", "显示额外的命令");
define("A_CONFCONTENT_160", "列出你的额外命令。");
define("A_CONFCONTENT_161", "如果他们是太长的时候，保持 空格分开 并用 / 分割线。");
define("A_CONFCONTENT_162", "显示其他额外的功能/可用的外挂。");
define("A_CONFCONTENT_163", "隐藏额外的功能");
define("A_CONFCONTENT_164", "显示额外的功能");
define("A_CONFCONTENT_165", "列出你的额外的功能/外挂。");
define("A_CONFCONTENT_167", "显示机器人的名称（如果可用）。");
define("A_CONFCONTENT_168", "隐藏机器人的名称");
define("A_CONFCONTENT_169", "显示机器人的名称");
define("A_CONFCONTENT_170", "显示计数器（访问者点击）在index页面。");
define("A_CONFCONTENT_171", "停用计数器");
define("A_CONFCONTENT_172", "显示计数器");
define("A_CONFCONTENT_173", "显示所有者/站长 聊天资讯在index页面（下方的版权连结）。");
define("A_CONFCONTENT_174", "它跟您所输入在注册部分名称/文本 相同");
define("A_CONFCONTENT_175", "管理员名称");
define("A_CONFCONTENT_176", "隐藏所有者");
define("A_CONFCONTENT_177", "显示所有者");
define("A_CONFCONTENT_178", "编辑聊天的安装日期。");

//Content Rooms & Skins
define("A_CONFCONTENT_179", "启用外观 mod 在房间。");
define("A_CONFCONTENT_181", "假如 已禁用，skin1 成为默认（设置在首个公众室上面）。如果 启用，每个房间都可以有它自己的外观。");
define("A_CONFCONTENT_182", "仅默认外观");
define("A_CONFCONTENT_183", "外观 Mod 启用");
define("A_CONFCONTENT_184", "外观预览页");
define("A_CONFCONTENT_185", "供用户选择的房间类型。");
define("A_CONFCONTENT_186", "只有第一个房间 内部公开预设的；");
define("A_CONFCONTENT_187", "所有预设房间，但不能创建房间；");
define("A_CONFCONTENT_188", "所有的房间，及创建新的。");
define("A_CONFCONTENT_189", "只有第一个房间");
define("A_CONFCONTENT_190", "所有预设房间");
define("A_CONFCONTENT_191", "所有及创建新房间");
define("A_CONFCONTENT_192", "第一个公开房间的名称 （also <u>default</u> 假如 0 被选中高于或没有用户的选择从列表中）。");
define("A_CONFCONTENT_193", "虽然禁用是可能的，这第一个房间，在任何时候都应该启用和不受限制。（这也是人们不要从登录页面中选择一个默认的房间。）");
define("A_CONFCONTENT_194", "（适用于所有的公共房间）：如果限制，虽然房间是公开的，只有管理员，超级版主和\"".A_MENU_1."\"表中设置的用户将能够加入这个房间。潜伏页的公共档案馆将不包含任何提交受限房间的职位。");
define("A_CONFCONTENT_195", "第二个公开房间名称。");
define("A_CONFCONTENT_196", "第三个公开房间名称。");
define("A_CONFCONTENT_197", "第四个公开房间名称。");
define("A_CONFCONTENT_198", "第五个公开房间名称。");
define("A_CONFCONTENT_199", "第一个私人房间名称。");
define("A_CONFCONTENT_200", "这是显示在登录时，只有管理员。");
define("A_CONFCONTENT_201", "第二个私人房间名称（同时默认情况下，如果没有选）。");
define("A_CONFCONTENT_203", "第三私人房间名称。");
define("A_CONFCONTENT_204", "这是显示在登录到所有的高级用户（适合\"职员唯一\"房间）。");
define("A_CONFCONTENT_205", "第四私人房间名称。");
define("A_CONFCONTENT_206", "这是显示登录到所有用户的默认（适合\"支援\"房间）。");
define("A_CONFCONTENT_207", "显示默认索引页上的私人房间。");
define("A_CONFCONTENT_208", "并非所有的包房，将显示所有用户的选择（见接下来的两个设置）。");
define("A_CONFCONTENT_209", "此选项只会让<b>管理员</b>看到所有预设的包房，但 <u><b>需要</b></u> 到接下来的两个设置工作。");
define("A_CONFCONTENT_210", "显示默认索引页上的私人房间到版主。");
define("A_CONFCONTENT_211", "提示：版主将只能看到房间8和第9（职员和支援类型）。");
define("A_CONFCONTENT_212", "需要设置 no.1！");
define("A_CONFCONTENT_213", "显示默认索引页上的私人房间到普通用户。");
define("A_CONFCONTENT_214", "非权力用户（包括客人）将只能看到房间9（支援）。");

//Content Colors
define("A_CONFCONTENT_216", "启用 不同颜色名称在用户列表 和/或 文章。");
define("A_CONFCONTENT_219", "斜体权力用户名在用户列表。");
define("A_CONFCONTENT_218", "如果启用，用户可以设置自己的个人色彩，在用户用于他们的用户名列出唯一。<br />如果已禁用，管理员将显示在<a class=\"admin\">红色</a>和主持人在<a class=\"mod\">蓝色</a>（其预设权力颜色在 skins/styleN.css.php），只有\"".A_CONFCONTENT_219."\"启用下。");
define("A_CONFCONTENT_220", "此选项允许您选择显示或没有谁是你聊天的管理员和版主（这不会改变任何权力，它不仅使管理/主持 名称不同或不 - 斜体 - 从普通用户）。");
define("A_CONFCONTENT_221", "这也适用于颜色的名称，显示或管理员在<a class=\"admin\">红色</a>跟主持人在<a class=\"mod\">蓝色</a>（其预设权力颜色在skins/styleN.css.php）or，如果要彩色的名称启用上面，%s and %s（其预设权力颜色选择以下）。"); //%s = red | blue
define("A_CONFCONTENT_224", "不显示斜体/颜色");
define("A_CONFCONTENT_225", "显示斜体/颜色");
define("A_CONFCONTENT_226", "设置权力用户张贴标签的文本。");
define("A_CONFCONTENT_227", "此选项允许您设置权力用户能够张贴标签的文本（粗体，斜体，下划线或它们的任意组合）。.");
define("A_CONFCONTENT_228", "它仅适用于上面的设置，如果设置\"".A_CONFCONTENT_225."\"。只有B，I或/和U允许（不区分大小写）。任何其他字母/字符将不会被保存。值必须用逗号隔开（如果多于一个）。");
define("A_CONFCONTENT_229", "范例：b,i,u （或 b,i 或 b 或 u,b）");
define("A_CONFCONTENT_230", "颜色过滤器在发文。");
define("A_CONFCONTENT_231", "如果启用，所有的用户可以使用任何颜色，如果没有，他们可以使用除下文所载的权力色彩。");
define("A_CONFCONTENT_232", "设置使用的权力颜色由管理员唯一（第一为默认）。");
define("A_CONFCONTENT_233", "这适用于发布消息的颜色为主，但如果颜色名称启用上面，它也将适用于名称颜色。");
define("A_CONFCONTENT_234", "设置权力颜色 只能用于主持人（第一为默认）。");
define("A_CONFCONTENT_236", "管理员也可以使用这些颜色，但其他用户不能。");
define("A_CONFCONTENT_237", "允许游客使用颜色。");
define("A_CONFCONTENT_238", "如果已禁用，未注册的用户在自己的发言上，将只能使用默认颜色在房间。这将鼓励他们注册（希望）。");
define("A_CONFCONTENT_239", "不允许颜色供游客");
define("A_CONFCONTENT_240", "允许颜色供游客");

//Content Sound Settings
define("A_CONFCONTENT_241", "于入口处播放声音。");
define("A_CONFCONTENT_242", "整个房间通知");
define("A_CONFCONTENT_243", "欢迎只有用户");
define("A_CONFCONTENT_244", "通知及欢迎（1&2）");
define("A_CONFCONTENT_245", "在入口处演奏声音的路径（只能用.wav副档名）。");
define("A_CONFCONTENT_246", "范例：sounds/beep.wav（您还可以使用 长/远程 网址）");
define("A_CONFCONTENT_247", "在进入：");
define("A_CONFCONTENT_248", "在欢迎：");
define("A_CONFCONTENT_249", "播放蜂鸣声在 /buzz 命令。");
define("A_CONFCONTENT_250", "（或只是显示[BUZZ]消息，没有任何声音）");
define("A_CONFCONTENT_251", "没有BUZZ的声音");
define("A_CONFCONTENT_252", "播放BUZZ的声音");
define("A_CONFCONTENT_253", "要播放的路径声路径（只能用.wav副档名）。");
define("A_CONFCONTENT_254", "范例：sounds/chimedwn.wav（你也可以使用 长/远程 网址）");

//Content Profanity
define("A_CONFCONTENT_255", "启用脏话过滤。");
define("A_CONFCONTENT_256", "（更换张贴的脏话与下面的字符的话）");
define("A_CONFCONTENT_257", "允许脏话");
define("A_CONFCONTENT_258", "不允许脏话");
define("A_CONFCONTENT_259", "表达式替换脏话。");
define("A_CONFCONTENT_260", "房间名称允许脏话字（避免过滤器）。");
define("A_CONFCONTENT_261", "您必须输入房间的确切名称。<a href=#roomnames class=\"ChatLink\">".A_CONFHERE."</a>检查你的房间名称。");

//Content Private messaging
define("A_CONFCONTENT_263", "启用耳语（私人讯息）系统。");
define("A_CONFCONTENT_264", "如果已禁用，只有公共信息将被允许在聊天张贴。");
define("A_CONFCONTENT_265", "启用弹出耳语（私人信息）系统。");
define("A_CONFCONTENT_266", "如果启用，游客不会接受到弹出的 PMS - 他们必须注册。");
define("A_CONFCONTENT_267", "每个注册用户可以自己配置私敲是否弹出视窗显示。");
define("A_CONFCONTENT_269", "离线的项目经理无论如何将始终显示在弹出（否则，收件人不会被通知新的PMs）。");
define("A_CONFCONTENT_270", "允许用户从数据库中删除自己（收到）项目经理。");
define("A_CONFCONTENT_271", "如果启用，用户将能够选择和删除他们收到的私人讯息。");
define("A_CONFCONTENT_272", "不允许 PM 删除");
define("A_CONFCONTENT_273", "允许 PM 删除");
define("A_CONFCONTENT_274", "多久时间清理未读离线的私人讯息。");
define("A_CONFCONTENT_275", "如果收件人不登录到聊天，在此区间，这些旧型私人邮件被自动删除从数据库中（他们不会被导出到日志归档，所以旧的未读项目经理会丢失）。");

//Content Bots settings
define("A_CONFCONTENT_276", "启用机器人在聊天。");
define("A_CONFCONTENT_277", "以下改变任何的BOT设置之前，请停止机器人，如果它运行在聊天（你将无法踢它出事后，因为它被设置为admin）。");
define("A_CONFCONTENT_278", "启用聊天BOT公开对话。");
define("A_CONFCONTENT_279", "如果禁用此，机器人只会听和用户使用私人信息，在聊天交谈。");
define("A_CONFCONTENT_280", "只有私人机器人");
define("A_CONFCONTENT_281", "公开机器人");
define("A_CONFCONTENT_282", "输入您的BOT想要的名称。");
define("A_CONFCONTENT_283", "：确保BOT是满载之前，请不要更改名称（检查它是否可以在聊天室张贴）： %s ！"); //%s = page name （url）
define("A_CONFCONTENT_284", "你的机器人还没有被正确加载！阅读 \"%s\"");
define("A_CONFCONTENT_285", "BOT状态和维护。");
define("A_CONFCONTENT_286", "如果你的BOT不正常响应（空消息帖子）和/或 BOT 的 ID <> 1，您可能需要重新载入你的机器人。此操作将清空数据库中的的BOT表，并重新加载整个脚本。");
define("A_CONFCONTENT_287", "你的BOT没有装载到资料库中。");
define("A_CONFCONTENT_288", "<a href=\"./bot/botloader.php\" target=\"_blank\">".A_CONFHERE."</a> 到装载它 现在！");
define("A_CONFCONTENT_289", "BOT 的 ID:");
define("A_CONFCONTENT_291", "<a href=\"./bot/botloader.php\" target=\"_blank\" class=\"error\">".A_CONFHERE."</a> 重新加载BOT！");
define("A_CONFCONTENT_292", "输入BOT回应讯息的颜色。");
define("A_CONFCONTENT_293", "输入BOT的头像。");
define("A_CONFCONTENT_294", "只有头像系统启用了它才会显示");
define("A_CONFCONTENT_294a", "BOT头像");
define("A_CONFCONTENT_295", "输入被启动时BOT发布的训息。");
define("A_CONFCONTENT_296", "避免使用 特殊字符 或设置 它们将不会被保存。");
define("A_CONFCONTENT_297", "输入在BOT停止时发布的讯息。");

//Content Commands
define("A_CONFCONTENT_299", "用户可以导出保存 /save 命令讯息的最大数量。");
define("A_CONFCONTENT_300", "0=停用，任何整数=数量 的消息，*=没有限制");
define("A_CONFCONTENT_301", "每个房间（/topic 或 /topic * 命令）启用不同的主题。");
define("A_CONFCONTENT_302", "（或只显示一个默认的，被称为全球主题）");
define("A_CONFCONTENT_303", "默认的主题应该将在的根据 \"%s\" per 每个所需的语言编辑，或添加一个默认的全球主题（覆盖本地化的主题），将它添加到 \"%s\"）。");
define("A_CONFCONTENT_304", "全球主题");
define("A_CONFCONTENT_305", "多重话题");
define("A_CONFCONTENT_306", "输入 /room 命令的表达。");
define("A_CONFCONTENT_307", "举例：<font color=red>房间注意事项：</font> 或 <font color=red>解说员说：</font> 或 <font color=red>看这里：</font> 或 <font color=red>管管说：</font>");
define("A_CONFCONTENT_308", "允许 主持人来使用 /demote 命令。");
define("A_CONFCONTENT_309", "如果设置为第二个选项，主持人就能降级其他主持人 - <font color=red>要非常小心！</font>");
define("A_CONFCONTENT_310", "只有管理员");
define("A_CONFCONTENT_311", "主持人及管理员");
define("A_CONFCONTENT_312", "输入每个掷骰子的最大数量。");
define("A_CONFCONTENT_313", "使用值小于 99。");
define("A_CONFCONTENT_314", "只需要V.2骰子。请注意，增加这个值太大，会导致到你选择多少骰子图像的负载，它可以显示消息（急剧的非IE浏览器的返回延迟）。");
define("A_CONFCONTENT_315", "输入每个扔​​骰子的最大数量（每个模双方骰子V.2）");
define("A_CONFCONTENT_316", "在用户列表的默认排序顺序 （/sort 命令）。");
define("A_CONFCONTENT_317", "用户还可以使用 /sort 命令来改变他们的排序顺序。");
define("A_CONFCONTENT_318", "按进入时间");
define("A_CONFCONTENT_319", "按字母顺序");
define("A_CONFCONTENT_320", "设置的调整发布使用图片的最大尺寸 /img 命令。");
define("A_CONFCONTENT_321", "启用使用者的 /math 数学的命令。");
define("A_CONFCONTENT_322", "此选项允许您张贴使用LaTeX格式MathJax提供的数学公式。");
define("A_CONFCONTENT_323", "这里是一个 <a href=\"http://www.mathjax.org/demos/tex-samples/\" target=\"_blank\">样本页面</a> 从原始mathjax.org网站。你只需要输入/数学和拷贝和粘贴所需的公式的源代码。");
define("A_CONFCONTENT_324", "您还可以使用本地配置文件，通过设置合适的源路径。默认源（SRC）是：<font color=\"blue\"><i>http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML</i></font>");
define("A_CONFCONTENT_325", "插件配置源：");

//Content Multimedia
define("A_CONFCONTENT_326", "启用使用 /video 指令张贴影片（例如YouTube）。");
define("A_CONFCONTENT_327", "如果 已禁用，只有原始视频源的链接将被张贴在聊天；如果 启用，任何用户都可以发布所有用户可以直接在聊天观看视频； 设置以 管理员 将只显示管理员和超级室长张贴的影片，其他用户发布唯一链接到原来的视频源。");
define("A_CONFCONTENT_328", "只有管理员能");
define("A_CONFCONTENT_329", "设置的视频播放器的宽度和高度。");
define("A_CONFCONTENT_330", "启用 the MediaPlayer add-on in chat。");
define("A_CONFCONTENT_331", ">选择正确的格式框架将根据大小（音频 < 视频）。");
define("A_CONFCONTENT_333", "假如 启用，一个有效的流媒体URL也必须在接下来的领域。你可以设置一个静态的 音讯/视频 源或 电台播放器 的流媒体服务器。");
define("A_CONFCONTENT_334", "音讯/收音机");
define("A_CONFCONTENT_335", "视频/电视");
define("A_CONFCONTENT_336", "流媒体的URL路径。");
define("A_CONFCONTENT_336a", "例如（NASA TV 直播站）：<br />http://playlist.yahoo.com/makeplaylist.dll?id=1369080&segment=149773");

//Content Quick Menu
define("A_CONFCONTENT_337", "对管理员定义快速选单。");
define("A_CONFCONTENT_338", "定义主持人快速选单。");
define("A_CONFCONTENT_339", "定义其他用户的快速选单。");
define("A_CONFCONTENT_340a", "保持这些字符： <b>|</b> 在每一行结束时，除了最后一个。");
define("A_CONFCONTENT_340", "清空此复选框以禁用管理员的快速选单。");
define("A_CONFCONTENT_341", "清空此复选框来禁用主持人的快速选单。");
define("A_CONFCONTENT_342", "清空此复选框来禁用一般用户的快速选单。");

//Content Avatars & Gravatars
define("A_CONFCONTENT_343", "启用 头像系统。");
define("A_CONFCONTENT_345", "没有头像");
define("A_CONFCONTENT_346", "使用头像");
define("A_CONFCONTENT_347", "显示变更头像 （个人资料） 按钮在输入栏边。");
define("A_CONFCONTENT_348", "您的头像目录的路径。");
define("A_CONFCONTENT_349", "输入头像号码要显示你定义的文件夹。");
define("A_CONFCONTENT_350", "只有第一 %s 头像将显示给用户。"); //%s = number of avatars
define("A_CONFCONTENT_351", "阿凡达按键");
define("A_CONFCONTENT_351a", "性别");
define("A_CONFCONTENT_352", "使用者预设头像。");
define("A_CONFCONTENT_353", "输入将显示的头像的宽度和高度。");
define("A_CONFCONTENT_354", "通常情况下，一个不错的布局，宽度和高度值应该是平等的。");
define("A_CONFCONTENT_355", "允许用户上传头像，从他们的机器。");
define("A_CONFCONTENT_356", "确保 \"images/avatars\" 跟 \"images/avatars/uploaded\" 文件夹存在，并且他们有公开写入权限 （CHMOD 0777）！");
define("A_CONFCONTENT_357", "不允许上传");
define("A_CONFCONTENT_358", "允许上传");
define("A_CONFCONTENT_359", "显示头像旁边的性别图标。");
define("A_CONFCONTENT_360", "隐藏性别图标");
define("A_CONFCONTENT_361", "显示性别图标");
define("A_CONFCONTENT_362", "启用 GRAVATARS。");
define("A_CONFCONTENT_363", "<a href=#avatars>头像系统</a>还必须启用上面！");
define("A_CONFCONTENT_364", "如果启用，所有客人将作为默认的GRAVATAR头像。");
define("A_CONFCONTENT_365", "让用户决定");
define("A_CONFCONTENT_366", "强制使用 GRAVATARS");
define("A_CONFCONTENT_367", "定义：");
define("A_CONFCONTENT_368", "一个 Gravatar，或 <b>G</b>lobally <b>R</b>ecognized <b>A</b>vatar，是很简单的头像图片后您的网志，您的名字旁边出现时，你对此有何评论的gravatar启用站点。替身帮助确定您的文章在网上论坛，所以为什么不是网志。<br />注册为gravatar.com帐户是免费的，这是一个电子邮件地址。一旦你签署了，你可以上传你的头像图片后不久，你就会开始看到它的gravatar启用网志（包括本聊天）！");
define("A_CONFCONTENT_369", "（阅读更多有关Gravatar的 <a href=\"http://www.gravatar.com\" target=\"_blank\">http://www.gravatar.com</a> 位置。）");
define("A_CONFCONTENT_370", "Gravatar 的高速缓存设置。");
define("A_CONFCONTENT_371", "服务器信息：");
define("A_CONFCONTENT_371a", "如果缓存是启用，确保 \"cache\" 缓存文件夹中存在的聊天根，它具有公开写入权限 （CHMOD 0777）！");
define("A_CONFCONTENT_371b", "在此服务器上缓存不受支持！");
define("A_CONFCONTENT_371c", "无法访问gravatar.com！");
define("A_CONFCONTENT_372", "托管服务器 IP：");
define("A_CONFCONTENT_373", "PHP 服务器版本：");
define("A_CONFCONTENT_374", "allow_url_fopen："); #don't translate！
define("A_CONFCONTENT_375", "allow_url_include："); #don't translate！
define("A_CONFCONTENT_376", "file_get_contents："); #don't translate！
define("A_CONFCONTENT_377", "MySQL 服务器的版本：");
define("A_CONFCONTENT_378", "禁用缓存");
define("A_CONFCONTENT_379", "启用高速缓存");
define("A_CONFCONTENT_380", "缓存期限：");
define("A_CONFCONTENT_381", "Gravatar的准许额定值。");
define("A_CONFCONTENT_382", "上述任何");
define("A_CONFCONTENT_383", "G 额定Gravatar是适合观众与任何类型的所有网站上显示<font color=blue>（建议与默认）</font>。");
define("A_CONFCONTENT_385", "PG 额定Gravatar的可能包含粗鲁的手势，挑衅穿着的个人，较小的粗话，或轻微暴力。");
define("A_CONFCONTENT_386", "R 额定Gravatar的可能含有恶劣的亵渎，激烈的暴力，裸露，或硬药物使用这样的事情。");
define("A_CONFCONTENT_387", "X 额定Gravatar的可能包含铁杆性的的图像或极其令人不安的暴力。");
define("A_CONFCONTENT_388", "动态的默认Gravatar。");
define("A_CONFCONTENT_388a", "动态的Gravatar");
define("A_CONFCONTENT_389", "提示：这将随机返回一个为每个用户的动态图像，没有他们的电子邮件 gravatar.com 帐户。（聊天嘉宾和/或未经注册gravatar.com帐户的用户）。");
define("A_CONFCONTENT_390", "您可以强制显示随机的默认Gravatar<a href=\"#force\">".A_CONFCONTENT_366."</a>同时启用上面！");
define("A_CONFCONTENT_391", "显示用户预设值");
define("A_CONFCONTENT_392", "强制随机预设值");

//Content Logging Mod
define("A_CONFCONTENT_393", "启用聊天/记录。");
define("A_CONFCONTENT_394", "将生成该HTML文件清理/删除对话。完整的版本，可通过管理的高级菜单，在聊天室的额外选项菜单（公共信息）的简短版本。");
define("A_CONFCONTENT_395", "设置您的管理员（全）日志文件夹的名称。");
define("A_CONFCONTENT_396", "原有的 \"logsadmin\" 文件夹，重命名一个很难猜测，您的完整的日志文件夹的名称。");
define("A_CONFCONTENT_397", "这是从不同的公共/用户访问（称为 \"日志\"），其中不包括任何私人/机密数据从您的聊天对话/动作。");
define("A_CONFCONTENT_398", "日誌顯示-非管理員用戶在聊天中。");
define("A_CONFCONTENT_399", "只有聊天記錄是啟用才有效。");

//Content Lurking Mod
define("A_CONFCONTENT_400", "启用聊天潜伏。");
define("A_CONFCONTENT_401", "它将允许非登录人监测在聊天的公开对话和事件。");
define("A_CONFCONTENT_402", "显示潜伏页面在非管理员用户聊天中和登录页面。");
define("A_CONFCONTENT_403", "只有，如果聊天潜伏是启用时。");
define("A_CONFCONTENT_404", "启用 \"".A_MENU_6."\" 在管理面板中。");

//Content Random Quote
define("A_CONFCONTENT_405", "启用引用外挂。");
define("A_CONFCONTENT_406", "更改这些设置，你必须先启用引述模式！");
define("A_CONFCONTENT_407", "引用名称。");
define("A_CONFCONTENT_408", "引用名称颜色。");
define("A_CONFCONTENT_409", "引用头像。");
define("A_CONFCONTENT_410", "引用档案。");
define("A_CONFCONTENT_411", "引用发布频率。");
define("A_CONFCONTENT_412", "您可以生成自己的文件，使用Web资源。该文件必得救到 \"%s\" 目录下。"); //%s = folder name
define("A_CONFCONTENT_413", "引用背景颜色。");

//Content Ghost Control
define("A_CONFCONTENT_414", "控制谁将会在聊天室中可见。");
define("A_CONFCONTENT_415", "如果你启用控制鬼，鬼（无形）的用户也将被隐藏所有公共页面和计数器，除了他们的职位和房间中的命令（消息框架）！");
define("A_CONFCONTENT_416", "您还可以监视鬼\"".A_MENU_8."\"，在连接选项卡上的活动。请注意，鬼仍然能够采取行动像往常一样在聊天中（可以发布公共或私人信息，并且可以使用所有的命令，根据他们的权力）。");
define("A_CONFCONTENT_417", "显示在线管理员");
define("A_CONFCONTENT_418", "隐藏在线管理员（隐身）");
define("A_CONFCONTENT_419", "显示在线主持人");
define("A_CONFCONTENT_420", "隐藏在线主持人（隐身）");
define("A_CONFCONTENT_421", "特别鬼（显示器）：");
define("A_CONFCONTENT_422", "添加用户名，以逗号分隔，没有空格（,）！");
define("A_CONFCONTENT_423", "这些用户别人将不能看到在聊天中（仅在\"".A_MENU_8."\"选项卡），如果他们也是管理员，他们将能够监视所有的聊天室的活动（包括私人讯息！）。我们建议激活这些权力<font color=red>家长控制</font>目的！");
define("A_CONFCONTENT_421a", "惩罚的幽灵（幻影）：");
define("A_CONFCONTENT_423a", "这些用户将不能看到别人在聊天中（仅在\"".A_MENU_8."\"选项卡），他们将无法在聊天室张贴或发送任何事件。我们建议只激活这些用户无法被放逐权力<font color=red>唯一用在用户未能被驱逐</font>!");

//Content Birthday Mod
define("A_CONFCONTENT_424", "需要在注册和设定档设定生日与否。");
define("A_CONFCONTENT_425", "通过电子邮件发送到用户在他们的生日自动问候。");
define("A_CONFCONTENT_426", "如果 启用发送，该脚本将工作只有在聊天页面将访问/加载在发送间隔（默认值=7天）。该时间间隔后，电子邮件草案将关闭！");
define("A_CONFCONTENT_427", "设定您希望问候发送触发时间从午夜何时。");
define("A_CONFCONTENT_428", "允许正值或负值（0=午夜）。");
define("A_CONFCONTENT_429", "此设置是在考虑到服务器的时间，而不是用户的时间，因此它是可能的电子邮件将被发送在（+-）时区偏差。");
define("A_CONFCONTENT_430", "多少天的问候，将会发送。");
define("A_CONFCONTENT_431", "如果没有一个在聊天，也不访问此区间内的聊天页面，贺卡将不能发送了，为庆祝用户的影响将是不一样的。");
define("A_CONFCONTENT_432", "设定发送的内文。");
?>