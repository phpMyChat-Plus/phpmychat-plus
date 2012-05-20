<?php
// File : chinese_simplified/localized.admin.php - plus version (29.04.2012 - rev.17)
// Original file by clouds_music <clouds.music@gmail.com>
// Do not use ' ; use ’ instead (utf-8 edit bug)

// extra header for charset
$Charset = "utf-8";

// medium font size in pt.
$FontSize = 10;

// Top frame
define("A_MENU_0", "管理 用于 %s");
define("A_MENU_1", "注册用户");
define("A_MENU_11", "注册用户");
define("A_MENU_2", "放逐用户");
define("A_MENU_21", "放逐用户");
define("A_MENU_3", "清除聊天室");
define("A_MENU_4", "传送邮件");
define("A_MENU_5", "设定");
define("A_MENU_6", "聊天纪录");
define("A_MENU_7", "搜寻");
define("A_MENU_8", "连接");
define("A_MENU_9", "日志归档");
define("A_MENU_1a", "资料");
define("A_MENU_2a", "统计");
define("A_MOD_DEV", "MOD下的发展");
define("A_LOGOUT", "登出");

// Frame for registered users
define("A_SHEET1_1", "注册用户的名单和他们的权限");
define("A_SHEET1_2", "使用者名称");
define("A_SHEET1_3", "权限属性");
define("A_SHEET1_4", "主持聊天室");
define("A_SHEET1_5", "主持聊天室 用逗号分割 (，) 不带空格。");
define("A_SHEET1_6", "移除已勾选者");
define("A_SHEET1_7", "更新");
define("A_SHEET1_8", "除了你自己的 登记用户。");
define("A_SHEET1_9", "驱逐区选中的配置文件");
define("A_SHEET1_10", "现在，您已经移动您的选择到 ’".A_MENU_2."’ 表。");
define("A_SHEET1_11", "上次登录");
define("A_SHEET1_12", "驱逐的原因（可选）");
define("A_SHEET1_13", "允许的客房");
define("A_SHEET1_14", "所有不受限制");
define("A_SHEET1_15", "所有受限制");
define("A_SHEET1_16", "那个指定房间限制应被激活在这 ’".A_MENU_5."’ 表。");
define("A_USER", "一般使用者");
define("A_MODER", "室长");
define("A_TOPMOD", "超级室长");
define("A_ADMIN", "管理员");
define("A_PAGE_CNT", "页 %s 属于 %s");

// Frame for banished users
define("A_SHEET2_1", "被驱逐的用户和有关房间名单");
define("A_SHEET2_2", "IP");
define("A_SHEET2_3", "有关的室");
define("A_SHEET2_4", "直到");
define("A_SHEET2_5", "没有结束");
define("A_SHEET2_6", "房间由逗号分离，不用的空间()，如果少于4有， ’<B>*</B>’ 标志从所有房间驱逐。");
define("A_SHEET2_7", "删除选中被放逐用户(们)");
define("A_SHEET2_8", "没有被驱逐的用户。");
define("A_SHEET2_9", "原因 (可选)");

// Frame for cleaning rooms
define("A_SHEET3_1", "现有房间名单");
define("A_SHEET3_2", "移除一个 \"非-预设\" 房间，也将删除所有主持人<br />在这个房间的地位。");
define("A_SHEET3_3", "移除选定的房间");
define("A_SHEET3_4", "没有可以移除的房间。");
define("A_SHEET3_5", "您还没有作出任何选择。请至少选择一个，从以下列表中的空间。");

// Frame for sending mails
define("A_SHEET4_0", "您没有设置管理员电子邮件 ’".A_MENU_5."’ 页。");
define("A_SHEET4_1", "传送邮件");
define("A_SHEET4_2", "到：");
define("A_SHEET4_3", "选择全部");
define("A_SHEET4_4", "主题：");
define("A_SHEET4_5", "讯息：");
define("A_SHEET4_6", "现在发送！");
define("A_SHEET4_7", "所有的电子邮件已发送。");
define("A_SHEET4_8", "发送邮件时出现内部错误。");
define("A_SHEET4_9", "地址信息，主题或邮件缺少内容！");
define("A_SHEET4_10", "添加电子邮件，以逗号(，)分隔无空格");
define("A_SHEET4_11", "署名");
define("A_SHEET4_12", "取消全选");
define("A_SHEET4_13", "放所有收件人在这 <b>’密件副本’ (Bcc)</b> 栏位");

// Frame for configuration
define("A_SHEET5_0", "您的当前安装的版本是 %s");
define("A_SHEET5_1", "有一个新的版本发布 (%s)！");

//Chat Extras
define("A_EXTR_DSBL", "禁用聊天附加功能") ;
define("A_REFRESH_MSG", "刷新信息") ;
define("A_MSG_DEL", "删除") ;
define("A_POST_TIME", "发表于") ;
define("A_FROM_TO", "从 > 到") ;
define("A_FROM", "从") ;
define("A_CHTEX_ROOM", "房间") ;
define("A_CHTEX_MSG", "讯息") ;

//Save chat 日志
define("A_CHAT_LOGS_1", "IP日志的连接到 %s");
define("A_CHAT_LOGS_2", "聊天记录存档已被禁用");
define("A_CHAT_LOGS_3", "打开聊天的IP日志页");
define("A_CHAT_LOGS_4", "重置聊天的IP日志文件");
define("A_CHAT_LOGS_5", "这将归档并且重新设置聊天IP纪录文件！\\n");
define("A_CHAT_LOGS_6", "全部聊天记录存档");
define("A_CHAT_LOGS_7", "显示公共的聊天记录存档部分");
define("A_CHAT_LOGS_8", "这将删除所有文件和文件夹\\n储存在这 %s 文件夹！\\n"); // year
define("A_CHAT_LOGS_9", "删除全部 %s 日志"); // year
define("A_CHAT_LOGS_10", "删除一年");
define("A_CHAT_LOGS_11", "这将删除所有文件\\n储存在这 %s 文件夹！\\n"); // month/year
define("A_CHAT_LOGS_12", "(只有公众的)");
define("A_CHAT_LOGS_13", "删除一个月");
define("A_CHAT_LOGS_14", "这将删除 %s 档案！\\n"); // day.php file
define("A_CHAT_LOGS_15", "删除此日志");
define("A_CHAT_LOGS_16", "阅读 %s 日志"); // day month year
define("A_CHAT_LOGS_17", "公共聊天记录存档");
define("A_CHAT_LOGS_18", "(只有公共)");
define("A_CHAT_LOGS_19", "\\n这是不可恢复的...\\n你确定？");
define("A_CHAT_LOGS_20", "显示完整的聊天记录存档部分");
define("A_CHAT_LOGS_21", "返回页首");
define("A_CHAT_LOGS_22", "归档日志文件");
define("A_CHAT_LOGS_23", "生成于 %s"); // Generated on "date"
define("A_CHAT_LOGS_24", "压缩所有 %s 成一个 zip归档的日志"); // date
define("A_CHAT_LOGS_25", "这将建立一个具有所有日志的zip\\n储存在这 %s 文件夹！\\n"); // month/year
define("A_CHAT_LOGS_26", "\\n你确定？");
define("A_CHAT_LOGS_27", "ZIP 压缩文件");
define("A_CHAT_LOGS_28", "下载 %s");
define("A_CHAT_LOGS_29", "删除这个 zip");
define("A_CHAT_LOGS_30", "IP 文件");
define("A_CHAT_LOGS_31", "总计大小 %s %s");
define("A_CHAT_LOGS_32", "文件");
define("A_CHAT_LOGS_33", "文件夹");
define("A_CHAT_LOGS_34", "%s 成功删除： %s");
define("A_CHAT_LOGS_35", "%s 成功创建： %s");
define("A_CHAT_LOGS_36", "%s 不存在： %s");
define("A_CHAT_LOGS_37", "%s 无法删除： %s");
define("A_CHAT_LOGS_38", "%s 无法创建： %s");
define("A_CHAT_LOGS_39", "%s 写入受保护： %s");
define("A_CHAT_LOGS_40", "储存档案时发生的错误： %s"); // filename

//Admin Search Page
define("A_SEARCH_1", "聊天室搜寻页");
define("A_SEARCH_2", "所有类别");
define("A_SEARCH_3", "姓名");
define("A_SEARCH_4", "IP 地址");
define("A_SEARCH_5", "权限");
define("A_SEARCH_6", "电子邮件");
define("A_SEARCH_7", "性别");
define("A_SEARCH_8", "简介");
define("A_SEARCH_9", "链接");
define("A_SEARCH_10", "搜寻");
define("A_SEARCH_11", "权限的分类，选项 <b>ad</b>，<b>mod</b> 女 或 <b>u</b>。");
define("A_SEARCH_12", "用于 性别分类，选项： <b>0</b> 秘密，<b>1</b> 男，<b>2</b> 女 或 <b>3</b> 夫妇。");
define("A_SEARCH_13", "用户名");
define("A_SEARCH_14", "名字");
define("A_SEARCH_15", "姓氏");
define("A_SEARCH_16", "国家");
define("A_SEARCH_18", "权限");
define("A_SEARCH_19", "IP");
define("A_SEARCH_20", "性别");
define("A_SEARCH_21", "搜寻字词");
define("A_SEARCH_22", "搜索项");
define("A_SEARCH_23", "请提供一个搜索词，然后再试一次！");
define("A_SEARCH_24", "没有符合条件的数据。请细化您的搜索。");
define("A_SEARCH_25", "主持人这个用户");
define("A_SEARCH_26", "用户选定隐藏信息，在公开的个人资料。请确保 她/他 的隐私安全！");
define("A_SEARCH_27", "显示当前的月份");
define("A_SEARCH_28", "显示所有生日者");

// Connected users Page
define("A_LURKING_1", "连接的用户和潜水用户") ;
define("A_LURKING_2", "潜水禁用") ;

// Statistics Page
define("A_STATS_1", "聊天统计页");
define("A_STATS_2", "数据收集开始 %s"); //date
define("A_STATS_3", "总体统计数据（所有时间）");
define("A_STATS_4", "详细的统计 (最后 %s 天的活动)"); //number of days
define("A_STATS_5", "统计禁用");
define("A_STATS_6", "最大%s"); //Top 10 或 Top 5
?>