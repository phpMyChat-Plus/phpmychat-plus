<?php
mysql_query("
ALTER TABLE ".$t_ban_users."
			ADD reason varchar(100) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE ALLOW_ENTRANCE_SOUND ALLOW_ENTRANCE_SOUND enum('0','1','2','3') NOT NULL default '1',
			CHANGE INSTALL_DATE INSTALL_DATE date NOT NULL default '0000-00-00',
			CHANGE COLOR_CDC1 COLOR_CD8 VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC2 COLOR_CD9 VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC3 COLOR_CA VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC4 COLOR_CA1 VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC5 COLOR_CA2 VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC6 COLOR_CM VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC7 COLOR_CM1 VARCHAR(25) NOT NULL,
			ADD COLOR_CM2 VARCHAR(25) NOT NULL default '' AFTER COLOR_CM1,
			ADD CHAT_BOOT enum('0','1') NOT NULL default '1',
			ADD WELCOME_SOUND varchar(255) NOT NULL default 'sounds/hello.wav',
			ADD WORLDTIME enum('0','1','2') NOT NULL default '2',
			ADD UPD_CHECK enum('0','1') NOT NULL default '1',
			ADD QUOTE enum('0','1') NOT NULL default '1',
			ADD QUOTE_TIME tinyint(1) NOT NULL default '5',
			ADD QUOTE_COLOR varchar(25) NOT NULL default 'brown',
			ADD QUOTE_PATH varchar(255) NOT NULL default 'files/quotes/quotes.txt',
			ADD HIDE_ADMINS enum('0','1') NOT NULL default '0',
			ADD HIDE_MODERS enum('0','1') NOT NULL default '0',
			ADD LAST_SAVED_ON datetime NOT NULL default '0000-00-00 00:00:00',
			ADD LAST_SAVED_BY varchar(30) NOT NULL default 'installer (upgrade)',
			ADD CHAT_SYSTEM enum('standalone','phpnuke','phpbb') NOT NULL default 'standalone',
			ADD NUKE_BB_PATH varchar(255) NOT NULL default '',
			ADD CHAT_NAME varchar(255) NOT NULL default '',
			ADD ENGLISH_FORMAT enum('UK','US') NOT NULL default 'UK',
			ADD FLAGS_3D enum('0','1') NOT NULL default '1',
			ADD ALLOW_REGISTER enum('0','1') NOT NULL default '1';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			ENTRANCE_SOUND = 'sounds/chimeup.wav',
			CMDS = '<br />/away /buzz /demote /dice /dice2 /dice3 /high /img /mr<br />/room /size /sort /topic /wisp',
			MODS = '<br />Advanced Admin, Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8',
			COLOR_CD2 = 'tomato',
			COLOR_CD3 = 'dimgray',
			COLOR_CD4 = 'indigo',
			COLOR_CD7 = 'white',
			COLOR_CD8 = 'magenta',
			COLOR_CD9 = 'blueviolet',
			COLOR_CA = 'red',
			COLOR_CA1 = 'crimson',
			COLOR_CA2 = 'orangered',
			COLOR_CM = 'blue',
			COLOR_CM1 = 'mediumblue',
			COLOR_CM2 = 'royalblue',
			WELCOME_SOUND = 'sounds/hello.wav',
			QUOTE_COLOR = 'brown',
			QUOTE_PATH = 'files/quotes/quotes.txt',
			LAST_SAVED_ON = NOW(),
			CHAT_SYSTEM = 'standalone',
			CHAT_NAME = 'My WonderfulWorldWide Chat'
	WHERE ID='0';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			LOGO_IMG = './images/icon.gif'
	WHERE ID='0' AND LOGO_IMG = '''./images/icon.gif''';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			LOGO_OPEN = './'
	WHERE ID='0' AND LOGO_OPEN = '''./''';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			LOGO_ALT = 'MyChat based on phpMyChat plus'
	WHERE ID='0' AND LOGO_ALT = '''MyChat based on phpMyChat plus''';
", $conn);
mysql_query("
ALTER TABLE ".$t_lurkers."
			ADD username varchar(30) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE ".$t_messages."
			CHANGE pm_read pm_read VARCHAR(19) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE ".$t_reg_users."
			ADD id int(11) NOT NULL default '0' FIRST,
			ADD cid int(11) NOT NULL auto_increment after id,
			ADD s_question enum('0','1','2','3','4') NOT NULL default '0',
			ADD s_answer varchar(64) NOT NULL default '',
			ADD PRIMARY KEY (cid),
			ADD UNIQUE KEY username (username);
", $conn);
mysql_query("
UPDATE ".$t_reg_users." SET
			password='3901e4a6c3d27909afef4c22f8337da8',
			description = 'I am a Robot originally called Alice. I am proud to be the first Artificial Intelligence on the net! Please test my capabilities as you wish! To start a public conversation with me just type \"hello myname\" in the room I am active in, to stop the conversation type \"bye myname\" or \"myname> bye\". But we can also talk in private - just click on my name whenever you need a shoulder to cry on :p Ohhh... I wish to express my gratitude to Roy, Popeye and Ciprian for making me available for chatting in here. :)',
			email = 'bot@bot.com',
			slang = 'English, German',
			favlink = 'http://www.alicebot.org/documentation/',
			favlink1 = 'http://sourceforge.net/forum/?group_id=43190',
			avatar = './images/avatars/bot_avatar.gif'
	WHERE email='bot@bot.bot.com';
", $conn);
mysql_query("
INSERT INTO ".$t_reg_users." VALUES ('', '', 'Random_Quote', '1', 'ef93e0948b007826a1a7a49a17b72a59', 'Random Quote', 'phpMyChat - Plus', 'WorldWideWeb', '', 'quote@quote.com', '0', 'admin', '', 1130763311, '-No tracking IP-', '1', '0', './images/avatars/avatar56.gif', 'I am a virtual user, added here to post random quotes at my admin`s will. Ohhh... I wish to express my gratitude to Ciprian for making me available for enlighting you in here. :)', 'http://sourceforge.net/projects/phpmychat', 'http://ciprianmp.com/plus', 'English (any actually)', 'limegreen', './images/avatars/quote_avatar.gif', '0', '');
", $conn);
mysql_query("
ALTER TABLE ".$t_users."
			ADD email varchar(64) NOT NULL default '';
", $conn);
mysql_query("
UPDATE ".$t_users." u LEFT JOIN c_reg_users r
			ON u.username = r.username
			SET u.email='bot@bot.com'
			WHERE r.email = 'bot@bot.com';
", $conn);
?>