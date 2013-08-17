<?php
mysql_query("
ALTER TABLE ".$t_ban_users."
			ADD reason varchar(100) NOT NULL default '';

ALTER TABLE ".$t_config."
			CHANGE GRAVATARS_DYNAMIC_DEF GRAVATARS_DYNAMIC_DEF enum('mm','identicon','monsterid','wavatar','retro') default 'monsterid',
			CHANGE LANGUAGE LANGUAGE varchar(40) NOT NULL default 'english',
			CHANGE CHAT_URL CHAT_URL varchar(100) NOT NULL default 'Your server/chat URL here',
			CHANGE ALLOW_ENTRANCE_SOUND ALLOW_ENTRANCE_SOUND enum('0','1','2','3') NOT NULL default '1',
			CHANGE ROOM_SAYS ROOM_SAYS varchar(255) NOT NULL default 'Attention Room:',
			CHANGE INSTALL_DATE INSTALL_DATE date NOT NULL default '0000-00-00',
			CHANGE COLOR_CD1 ROOM_SKIN1 tinyint(1) NOT NULL default '1',
			CHANGE COLOR_CD2 ROOM_SKIN2 tinyint(1) NOT NULL default '2',
			CHANGE COLOR_CD3 ROOM_SKIN3 tinyint(1) NOT NULL default '3',
			CHANGE COLOR_CD4 ROOM_SKIN4 tinyint(1) NOT NULL default '4',
			CHANGE COLOR_CD5 ROOM_SKIN5 tinyint(1) NOT NULL default '5',
			CHANGE COLOR_CD6 ROOM_SKIN6 tinyint(1) NOT NULL default '6',
			CHANGE COLOR_CD7 ROOM_SKIN7 tinyint(1) NOT NULL default '7',
			CHANGE COLOR_CDC1 ROOM_SKIN8 tinyint(1) NOT NULL default '8',
			CHANGE COLOR_CDC2 ROOM_SKIN9 tinyint(1) NOT NULL default '9',
			CHANGE COLOR_CDC3 COLOR_CA VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC4 COLOR_CA1 VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC5 COLOR_CA2 VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC6 COLOR_CM VARCHAR(25) NOT NULL,
			CHANGE COLOR_CDC7 COLOR_CM1 VARCHAR(25) NOT NULL,
			CHANGE EN_ROOM1 EN_ROOM1 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM2 EN_ROOM2 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM3 EN_ROOM3 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM4 EN_ROOM4 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM5 EN_ROOM5 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM6 EN_ROOM6 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM7 EN_ROOM7 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM8 EN_ROOM8 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM9 EN_ROOM9 enum('0','1','2') NOT NULL default '1',
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
			ADD ALLOW_REGISTER enum('0','1') NOT NULL default '1',
			ADD DISP_GENDER enum('0','1') NOT NULL default '0',
			ADD SPECIAL_GHOSTS varchar(255) NOT NULL default '',
			ADD FILLED_LOGIN enum('0','1') NOT NULL default '0',
			ADD BACKGR_IMG enum('0','1') NOT NULL default '0',
			ADD BACKGR_IMG_PATH varchar(255) NOT NULL default '',
			ADD POPUP_LINKS enum('0','1') NOT NULL default '0',
			ADD ITALICIZE_POWERS enum('0','1') NOT NULL default '1',
			ADD MAIL_GREETING varchar(255) NOT NULL default 'Best regards,',
			ADD PM_KEEP_DAYS tinyint(1) NOT NULL default '30',
			ADD ALLOW_PM_DEL enum('0','1') NOT NULL default '1',
			ADD LOGIN_COUNTER enum('0','1','60','1440','10080') NOT NULL default '60',
			ADD ALLOW_GRAVATARS enum('0','1','2') NOT NULL default '1',
			ADD GRAVATARS_CACHE enum('0','1') NOT NULL default '1',
			ADD GRAVATARS_CACHE_EXPIRE tinyint(1) NOT NULL default '7',
			ADD GRAVATARS_RATING enum('G','PG','R','X','ANY') NOT NULL default 'G',
			ADD GRAVATARS_DYNAMIC_DEF enum('identicon','monsterid','wavatar') default 'monsterid',
			ADD GRAVATARS_DYNAMIC_DEF_FORCE enum('0','1') NOT NULL default '0',
			ADD ALLOW_UPLOADS enum('0','1') NOT NULL default '0',
			ADD RES_ROOM1 enum('0','1') NOT NULL default '0',
			ADD RES_ROOM2 enum('0','1') NOT NULL default '0',
			ADD RES_ROOM3 enum('0','1') NOT NULL default '0',
			ADD RES_ROOM4 enum('0','1') NOT NULL default '0',
			ADD RES_ROOM5 enum('0','1') NOT NULL default '0',
			ADD EN_STATS enum('0','1') NOT NULL default '0',
			ADD ALLOW_VIDEO enum('0','1','2') NOT NULL default '1',
			ADD VIDEO_WIDTH smallint(1) NOT NULL default '425',
			ADD VIDEO_HEIGHT smallint(1) NOT NULL default '344',
			ADD REQUIRE_BDAY enum('0','1') NOT NULL default '0',
			ADD SEND_BDAY_EMAIL enum('0','1') NOT NULL default '0',
			ADD SEND_BDAY_TIME tinyint(1) NOT NULL default '0',
			ADD SEND_BDAY_INTVAL tinyint(1) NOT NULL default '7',
			ADD SEND_BDAY_PATH varchar(255) NOT NULL default 'files/birthday/bday_greetings.txt',
			ADD EN_WMPLAYER enum('0','1','2') NOT NULL default '0',
			ADD WMP_STREAM varchar(255) default NULL,
			ADD OPEN_ALL_BEG time NOT NULL default '00:00:00',
			ADD OPEN_ALL_END time NOT NULL default '00:00:00',
			ADD OPEN_SUN_BEG time NOT NULL default '00:00:00',
			ADD OPEN_SUN_END time NOT NULL default '00:00:00',
			ADD OPEN_MON_BEG time NOT NULL default '00:00:00',
			ADD OPEN_MON_END time NOT NULL default '00:00:00',
			ADD OPEN_TUE_BEG time NOT NULL default '00:00:00',
			ADD OPEN_TUE_END time NOT NULL default '00:00:00',
			ADD OPEN_WED_BEG time NOT NULL default '00:00:00',
			ADD OPEN_WED_END time NOT NULL default '00:00:00',
			ADD OPEN_THU_BEG time NOT NULL default '00:00:00',
			ADD OPEN_THU_END time NOT NULL default '00:00:00',
			ADD OPEN_FRI_BEG time NOT NULL default '00:00:00',
			ADD OPEN_FRI_END time NOT NULL default '00:00:00',
			ADD OPEN_SAT_BEG time NOT NULL default '00:00:00',
			ADD OPEN_SAT_END time NOT NULL default '00:00:00',
			ADD ALLOW_TEXT_COLORS enum('0','1') NOT NULL default '1',
			ADD TAGS_POWERS set('b','i','u') default NULL,
			ADD ALLOW_MATH enum('0','1') NOT NULL default '0',
			ADD SRC_MATH varchar(255) NOT NULL default 'http://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS-MML_HTMLorMML';

UPDATE ".$t_config." SET
			ENTRANCE_SOUND = 'sounds/chimeup.wav',
			CMDS = '/away /buzz /demote /dice /dice2 /dice3 /high /img /math /mr<br />/room /size /sort /topic /utube /video /wisp',
			MODS = 'Advanced Admin, (GR)Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8, Birthdays, MathJax',
			ROOM_SKIN1 = '1',
			ROOM_SKIN2 = '2',
			ROOM_SKIN3 = '3',
			ROOM_SKIN4 = '4',
			ROOM_SKIN5 = '5',
			ROOM_SKIN6 = '6',
			ROOM_SKIN7 = '7',
			ROOM_SKIN8 = '8',
			ROOM_SKIN9 = '9',
			COLOR_CA = 'red',
			COLOR_CA1 = 'crimson',
			COLOR_CA2 = 'orangered',
			COLOR_CM = 'blue',
			COLOR_CM1 = 'mediumblue',
			COLOR_CM2 = 'royalblue',
			QUICKA = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/bot start|\r\n/bot stop|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/video url_to_video|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKM = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/video url_to_video|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			NUM_AVATARS = '80',
			REG_CHARS_ALLOWED = 'a-zA-Z0-9_.-@#$%^&*()=<>?~{}|`:',
			WELCOME_SOUND = 'sounds/hello.wav',
			QUOTE_COLOR = 'brown',
			QUOTE_PATH = 'files/quotes/quotes.txt',
			LAST_SAVED_ON = NOW(),
			CHAT_SYSTEM = 'standalone',
			CHAT_NAME = 'My WonderfulWorldWide Chat',
			DISP_GENDER = '0',
			FILLED_LOGIN = '0',
			BACKGR_IMG = '0',
			POPUP_LINKS = '0'
	WHERE ID='0';

UPDATE ".$t_config." SET
			LOGO_IMG = 'images/icon.gif'
	WHERE ID='0' AND LOGO_IMG = '''./images/icon.gif''';

UPDATE ".$t_config." SET
			LOGO_OPEN = './'
	WHERE ID='0' AND LOGO_OPEN = '''./''';

UPDATE ".$t_config." SET
			LOGO_ALT = 'MyChat based on phpMyChat-Plus'
	WHERE ID='0' AND LOGO_ALT = '''MyChat based on phpMyChat plus''';

ALTER TABLE ".$t_lurkers."
			ADD username varchar(30) NOT NULL default '',
			ADD status varchar(1) NOT NULL default '';

ALTER TABLE ".$t_messages."
			CHANGE pm_read pm_read VARCHAR(19) NOT NULL default '';

ALTER TABLE ".$t_reg_users."
			CHANGE latin1 latin1 tinyint(1) NOT NULL default '0',
			CHANGE gender gender tinyint(1) NOT NULL default '0',
			ADD id int(11) NOT NULL default '0' FIRST,
			ADD cid int(11) NOT NULL auto_increment after id,
			ADD s_question enum('0','1','2','3','4') NOT NULL default '0',
			ADD s_answer varchar(64) NOT NULL default '',
			ADD last_login int(11) NOT NULL default '0',
			ADD login_counter bigint(20) NOT NULL default '0',
			ADD use_gravatar enum('0','1') NOT NULL default '0',
			ADD join_room varchar(5) NOT NULL default '',
			ADD birthday date default NULL,
			ADD show_bday enum('0','1') NOT NULL default '1',
			ADD show_age enum('0','1') NOT NULL default '1',
			ADD bday_email_sent int(11) NOT NULL default '0',
			ADD PRIMARY KEY (cid),
			ADD UNIQUE KEY username (username);

UPDATE ".$t_reg_users." SET
			latin1='0',
			password='3901e4a6c3d27909afef4c22f8337da8',
			perms='topmod',
			description = 'I am a Robot originally called <a href=http://www.alicebot.org/documentation/ target=_blank>Alice</a>.  I am proud to be the first Artificial Intelligence on the net! Please test my capabilities as you wish! To start a public conversation with me just type \"hello myname\" in the room I am active in, to stop the conversation type \"bye myname\" or \"myname> bye\". But we can also talk in private - just click on my name whenever you need a shoulder to cry on :p Ohhh... I wish to express my gratitude to Roy, Popeye and <a href=http://www.ciprianmp.com/plus/ target=_blank>Ciprian</a>  for making me available for chatting in here. :)',
			email = 'bot@bot.com',
			slang = 'English, German',
			favlink = 'http://www.alicebot.org/documentation/',
			favlink1 = 'http://sourceforge.net/forum/?group_id=43190',
			avatar = 'images/avatars/bot_avatar.gif'
	WHERE email='bot@bot.bot.com';

INSERT INTO ".$t_reg_users." VALUES ('', '', 'Random_Quote', '0', 'ef93e0948b007826a1a7a49a17b72a59', 'Random Quote', 'phpMyChat - Plus', 'WorldWideWeb', '', 'quote@quote.com', '0', 'admin', '', 1130763311, '-No tracking IP-', '1', '0', 'images/avatars/avatar56.gif', 'I am a virtual user, added here to post random quotes at my admin�s will. Ohhh... I wish to express my gratitude to <a href=http://www.ciprianmp.com/plus/ target=_blank>Ciprian</a> for making me available for enlighting you in here. :)', 'http://sourceforge.net/projects/phpmychat', 'http://ciprianmp.com/plus', 'English (any actually)', 'limegreen', 'images/avatars/quote_avatar.gif', '0', '', '', '', '', '', '', '', '', '');

UPDATE ".$t_reg_users." SET latin1='0' WHERE latin1='1';

CREATE TABLE IF NOT EXISTS ".$t_stats." (
  stat_date date NOT NULL,
  room varchar(30) DEFAULT NULL,
  username varchar(30) DEFAULT NULL,
  reguser enum('0','1') NOT NULL DEFAULT '0',
  last_in int(11) NOT NULL DEFAULT '0',
  seconds_in int(11) NOT NULL DEFAULT '0',
  longest_in int(11) NOT NULL DEFAULT '0',
  last_away int(11) NOT NULL DEFAULT '0',
  seconds_away int(11) NOT NULL DEFAULT '0',
  longest_away int(11) NOT NULL DEFAULT '0',
  times_away tinyint(4) NOT NULL DEFAULT '0',
  logins smallint(5) NOT NULL DEFAULT '0',
  posts_sent smallint(5) NOT NULL DEFAULT '0',
  pms_sent smallint(5) NOT NULL DEFAULT '0',
  cmds_used smallint(5) NOT NULL DEFAULT '0',
  profile_viewed smallint(5) NOT NULL DEFAULT '0',
  profiles_checked smallint(5) NOT NULL DEFAULT '0',
  imgs_posted smallint(5) NOT NULL DEFAULT '0',
  urls_posted smallint(5) NOT NULL DEFAULT '0',
  emails_posted smallint(5) NOT NULL DEFAULT '0',
  swears_posted smallint(5) NOT NULL DEFAULT '0',
  smilies_posted smallint(5) NOT NULL DEFAULT '0',
  bans_rcvd tinyint(4) NOT NULL DEFAULT '0',
  bans_sent tinyint(4) NOT NULL DEFAULT '0',
  kicks_rcvd tinyint(4) NOT NULL DEFAULT '0',
  kicks_sent tinyint(4) NOT NULL DEFAULT '0',
  vids_posted smallint(5) NOT NULL DEFAULT '0',
  maths_posted smallint(5) NOT NULL DEFAULT '0'
) ".$engine."=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE ".$t_users."
			ADD email varchar(64) NOT NULL default '';

UPDATE ".$t_users." u LEFT JOIN ".$t_reg_users." r
			ON u.username = r.username
			SET u.email='bot@bot.com'
			WHERE r.email = 'bot@bot.com';
", $conn);
?>