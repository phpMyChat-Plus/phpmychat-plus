<?php
mysql_query("
ALTER TABLE ".$t_ban_users."
			ADD reason varchar(100) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE CHAT_URL CHAT_URL varchar(100) NOT NULL default 'Your server/chat URL here',
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
			ADD EMAIL_USER enum('0','1') NOT NULL default '1',
			ADD BOT_HELLO varchar(100) NOT NULL default '',
			ADD BOT_BYE varchar(100) NOT NULL default '',
			ADD BOT_PUBLIC enum('0','1') NOT NULL default '1',
			ADD ENABLE_PM enum('0','1') NOT NULL default '1',
			ADD EN_ROOM1 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM2 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM3 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM4 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM5 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM6 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM7 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM8 enum('0','1') NOT NULL default '1',
			ADD EN_ROOM9 enum('0','1') NOT NULL default '1',
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
			CMDS = '<br />/away /buzz /demote /dice /dice2 /dice3 /high /img /mr<br />/room /size /sort /topic /wisp',
			MODS = '<br />Advanced Admin, Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8',
			QUICKA = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I''m back!|\r\n/bot start|\r\n/bot stop|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic top reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKM = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I''m back!|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic top reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKU = 'Hello everyone|\r\nlol|\r\n:rofl|\r\n/away brb...|\r\n/away ...back!|\r\n/me is busy!|\r\n/mr is lurking|\r\n/bye ttyl!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			BOT_HELLO = 'Hello People!!! Have you been missing me?',
			BOT_BYE = 'Bye Bye everyone! See you when I see you...',
			WELCOME_SOUND = 'sounds/hello.wav',
			QUOTE_COLOR = 'brown',
			QUOTE_PATH = 'files/quotes/quotes.txt',
			LAST_SAVED_ON = NOW(),
			CHAT_SYSTEM = 'standalone',
			NUKE_BB_PATH = ''
	WHERE ID='0';
", $conn);
mysql_query("
ALTER TABLE ".$t_lurkers."
			ADD username varchar(30) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE ".$t_messages."
			CHANGE pm_read pm_read VARCHAR(19) NOT NULL default '',
			ADD room_from varchar(30) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE c_reg_users
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
			IP = '-No tracking IP-',
			description = 'I am a Robot originally called Alice. I am proud to be the first Artificial Intelligence on the net! Please test my capabilities as you wish! To start a public conversation with me just type \"hello myname\" in the room I am active in, to stop the conversation type \"bye myname\" or \"myname> bye\". But we can also talk in private - just click on my name whenever you need a shoulder to cry on :p Ohhh... I wish to express my gratitude to Roy, Popeye and Ciprian for making me available for chatting in here. :)',
			email = 'bot@bot.com',
			slang = 'English, German',
			favlink = 'http://www.alicebot.org/documentation/',
			favlink1 = 'http://sourceforge.net/forum/?group_id=43190',
			avatar = 'images/avatars/bot_avatar.gif'
	WHERE email='bot@bot.bot.com';
", $conn);
mysql_query("
INSERT INTO ".$t_reg_users." VALUES ('', '', 'Random_Quote', '1', 'ef93e0948b007826a1a7a49a17b72a59', 'Random Quote', 'phpMyChat - Plus', 'WorldWideWeb', '', 'quote@quote.com', '0', 'admin', '', 1130763311, '-No tracking IP-', '1', '0', 'images/avatars/avatar56.gif', 'I am a virtual user, added here to post random quotes at my admin’s will. Ohhh... I wish to express my gratitude to Ciprian for making me available for enlighting you in here. :)', 'http://sourceforge.net/projects/phpmychat', 'http://ciprianmp.com/plus', 'English (any actually)', 'limegreen', 'images/avatars/quote_avatar.gif', '0', '');
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