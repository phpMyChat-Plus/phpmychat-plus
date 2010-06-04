<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE LANGUAGE LANGUAGE varchar(40) NOT NULL default 'english',
			CHANGE ROOM_SAYS ROOM_SAYS varchar(255) NOT NULL default 'Attention Room:',
			CHANGE COLOR_CD1 ROOM_SKIN1 tinyint(1) NOT NULL default '1',
			CHANGE COLOR_CD2 ROOM_SKIN2 tinyint(1) NOT NULL default '2',
			CHANGE COLOR_CD3 ROOM_SKIN3 tinyint(1) NOT NULL default '3',
			CHANGE COLOR_CD4 ROOM_SKIN4 tinyint(1) NOT NULL default '4',
			CHANGE COLOR_CD5 ROOM_SKIN5 tinyint(1) NOT NULL default '5',
			CHANGE COLOR_CD6 ROOM_SKIN6 tinyint(1) NOT NULL default '6',
			CHANGE COLOR_CD7 ROOM_SKIN7 tinyint(1) NOT NULL default '7',
			CHANGE COLOR_CD8 ROOM_SKIN8 tinyint(1) NOT NULL default '8',
			CHANGE COLOR_CD9 ROOM_SKIN9 tinyint(1) NOT NULL default '9',
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
			ADD WMP_STREAM varchar(255) default NULL;
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			CMDS = '/away /buzz /demote /dice /dice2 /dice3 /high /img /mr<br />/room /size /sort /topic /utube /video /wisp',
			MODS = 'Advanced Admin, (GR)Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8, Birthdays',
			ROOM_SKIN1 = '1',
			ROOM_SKIN2 = '2',
			ROOM_SKIN3 = '3',
			ROOM_SKIN4 = '4',
			ROOM_SKIN5 = '5',
			ROOM_SKIN6 = '6',
			ROOM_SKIN7 = '7',
			ROOM_SKIN8 = '8',
			ROOM_SKIN9 = '9',
			QUICKA = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/bot start|\r\n/bot stop|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKM = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			NUM_AVATARS = '80',
			REG_CHARS_ALLOWED = 'a-zA-Z0-9_.-@#$%^&*()=<>?~{}|`:',
			FILLED_LOGIN = '0',
			BACKGR_IMG = '0',
			POPUP_LINKS = '0'
	WHERE ID='0';
", $conn);
mysql_query("
ALTER TABLE ".$t_lurkers."
			ADD status varchar(1) NOT NULL default '';
", $conn);
mysql_query("
ALTER TABLE ".$t_reg_users."
			CHANGE latin1 latin1 tinyint(1) NOT NULL default '0',
			CHANGE gender gender tinyint(1) NOT NULL default '0',
			ADD last_login int(11) NOT NULL default '0',
			ADD login_counter bigint(20) NOT NULL default '0',
			ADD use_gravatar enum('0','1') NOT NULL default '0',
			ADD join_room varchar(5) NOT NULL default '',
			ADD birthday date default NULL,
			ADD show_bday enum('0','1') NOT NULL default '1',
			ADD show_age enum('0','1') NOT NULL default '1',
			ADD bday_email_sent int(11) NOT NULL default '0';
", $conn);
mysql_query("
UPDATE ".$t_reg_users."	SET
			latin1='0',
			perms='topmod'
	WHERE email='bot@bot.com';
", $conn);
mysql_query("
UPDATE ".$t_reg_users." SET
			latin1='0'
			perms='topmod'
	WHERE email='quote@quote.com';
", $conn);
mysql_query("
UPDATE ".$t_reg_users." SET latin1='0' WHERE latin1='1';
", $conn);
mysql_query("
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
  vids_posted smallint(5) NOT NULL DEFAULT '0'
) TYPE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
", $conn);
?>