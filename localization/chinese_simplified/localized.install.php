<?php
// File : chinese_simplified/localized.install.php - plus version (07.06.2009 - rev.7)
// Original file for Plus version by clouds_music <clouds.music@gmail.com>
// Do not use ' ; use ’ istead (utf-8 edit bug)

define("L_BTN1", "下一页");
define("L_BTN2", "取消");
define("L_BTN3", "返回");
define("L_BTN4", "刷新");
define("L_BTN5", "完成");
define("L_BTN6", "跳过");
define("L_CONN_ERROR", "FTP的主机地址错误！<br />请返回，并检查您的FTP主机位址。");
define("L_LOGIN_ERROR", "登入验证失败！<br />请返回，并检查您的登入使用者名称和密码。");
define("L_FTP_NAME", "FTP 用户名空白未填！");
define("L_FTP_PASS", "FTP 密码 空白未填！");
define("L_DB_NOCONNECT", "无法连接到数据库！");
define("L_DB_HINT1", "数据库 %s 不存在，并且我不能创建它！");
define("L_PASS_ERROR1", "你没有填写管理员名称。<br />请返回并选用一个名称到您的管理员帐户！");
define("L_PASS_ERROR2", "你必须填写密码栏位。<br />请返回并键入相同的密码两次！");
define("L_PASS_ERROR3", "密码和验证密码不符合。<br />请返回并重新输入密码！");
define("L_FILE_ERROR1", "不能 CHMOD 这档案");
define("L_FILE_ERROR2", "");
define("L_FOLD_ERROR1", "不能 CHMOD 这资料夹");
define("L_FOLD_ERROR2", "");
define("L_INST_FOR", "安装 for %s");
define("L_INST_VER", "版本:");
define("L_INST_SETUP", "安装 -");
define("L_INST_PAG_OF", "页面 %s of %s");
define("L_P0_HINT1", "欢迎到我们的安装程序 %s。");
define("L_P0_HINT2", "请输入你的FTP登入资料。");
define("L_P1_HINT1", "此设置将引导您完成安装过程。<br />请选择您的安装类型。");
define("L_P1_HINT2", "Please select what type of installation is this:");
define("L_P1_HINT3", "你提供的 FTP -数据，似乎是错误的。 安装程序无法继续。请返回并纠正错误。这些是错误的:");
define("L_P2_HINT1", "现在，我们检查了 phpMyChat 配置。必须改变一个档案 (\"config/config.lib.php\") 在此服务器上。");
define("L_P2_HINT2", "那个 config 档案无法写入。 请让它可写入，使用任何FTP程序（如Total Commander）连接到您的服务器和应用 CHMOD 666 to \"config.lib.php\" 档案在 config 资料夹)。 如果你不知道如何做到这一点，或是如果你不喜欢改变这个文件的权限，请填写下面的表格，然后按一下 \"".L_BTN1."\"。");
define("L_P2_HINT3", "注意：如果您要改变您这个文件的权限，请点击 \"".L_BTN4."\" 按钮后 chmod 操作，为了让安装程序知道该文件是可写的！");
define("L_P2_HINT4", "这个文件 \"config/config.lib.php\" 是可写入的。 请填好这张表格的值，将被直接存储在文件中。");
define("L_P3_HINT1", "回到前一页，改变值。如果安装程序无法创建数据库，请自己创建它。");
define("L_P3_HINT2", "这里是你的配置结果，需要自行复制贴到 \"config/config.lib.php\" 档案。 请从下面的讯息框选择所有文字，将它复制并贴到您喜欢的文本编辑器 (例如. Notepad++)。 将该文件储存为 config.lib.php (确保类型是所有类型，不是纯文字文件) 并把文件上传到您的 ftp-server 上 \"config\" 目录中。");
define("L_P3_HINT3", "然后，你必须创建一个管理员帐户，就能访问 phpMyChat 的后台管理面板。");
define("L_P3_HINT4", "您的 \"config/config.lib.php\" - 档案:");
define("L_P3_HINT5", "无法打开 \"config/config.lib.php\" 编写！");
define("L_P3_HINT6", "回到前一页，改变值。这个文件是无法写入的。");
define("L_P3_HINT7", "现在，你必须创建一个管理员帐户，就能访问后台管理phpMyChat的面板。");
define("L_P3_HINT8", "您的变更已储存。");
define("L_P3_HINT9", "附注：此用户帐户拥有后台管理面板及聊天室的所有管理及使用权限！");
define("L_P3_BTN1", "选择全部");
define("L_P4_HINT1", "你的主要管理员帐户已创建。");
define("L_P4_HINT2", "你准备好登陆管理面板和改变你phpMyChat SEVER的设置。也有一些其他选项，帮助您管理聊天室，用户，信息和其它更多的。利用现有的设定连结，以便随时访问管理面板
。");
define("L_P4_HINT3", "已完成安装过程。 点击 \"".L_BTN5."\" 跳转到聊天的登录页面或关闭此窗口，离开这个安装程序。");
define("L_P4_HINT4", "安装脚本已经 chmoded 你所需要的文件，并删除这个安装脚本了。 请确定该文件 \"install/install.php\" 已从您的Web服务器被删除！ 如果没有，请自行删除它。");
define("L_P1_OP01", "新安装");
define("L_P1_OP02", "升级从 %s");
define("L_P1_OP03", "资料库没有变动");
define("L_P0_FORM1", "FTP 主机地址");
define("L_P0_FORM2", "FTP 用户名称");
define("L_P0_FORM3", "FTP 密码");
define("L_P0_FORM4", "FTP 根目录路径（相对）");
define("L_P2_FORM01", "资料库-主机 用于 phpMyChat host");
define("L_P2_FORM02", "资料库-用户名 用于 phpMyChat");
define("L_P2_FORM03", "资料库-密码 用于 phpMyChat");
define("L_P2_FORM04", "资料库-名称 用于 phpMyChat");
define("L_P2_FORM05", "数据库类型");
define("L_P2_FORM06", "表头 用于讯息");
define("L_P2_FORM07", "表头 用于使用者在聊天");
define("L_P2_FORM08", "表头 用于注册使用者");
define("L_P2_FORM09", "表头 用于封禁用户");
define("L_P2_FORM10", "表头 用于组态");
define("L_P2_FORM11", "表头 用于潜水者");
define("L_P2_FORM12", "重命名你的管理员logs文件夹");
define("L_P2_FORM13", "如果您打算使用集成模块 phpMyChat PHPNuke的或PHPBB，configuration 配置表必须调用 \"c_config\" 跟 table for registered users 必须调用 \"c_reg_users\"！");
define("L_P2_FORM14", "选择一个难以猜测到的名字！");
define("L_P2_FORM15", "您的聊天服务器的名称");
define("L_P2_FORM16", "统计表");
define("L_P3_FORM1", "管理员帐户的名称");
define("L_P3_FORM2", "管理员帐户的密码");
define("L_P3_FORM3", "验证密码");
define("L_P3_FORM4", "联络姓名 用于电子邮件");
define("L_P3_FORM5", "联络地址 用于电子邮件");
define("L_P3_FORM6", "聊天网址 用于电子邮件");
define("L_P4_FORM1", "开启管理面板");
define("L_P4_FORM2", "可选，你还可以安装一个bot(机器人，虚拟用户)到您的聊天室，因此它可以增加一些乐趣在你的聊天室。 可以做到这一点，但是这是最佳时间来做这件事。 如果你点击下面的链接，请不要阻止脚本在新的弹出窗口中运行
！");
define("L_P4_FORM3", "安装 Bot");
?>