<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE GRAVATARS_DYNAMIC_DEF GRAVATARS_DYNAMIC_DEF enum('mm','identicon','monsterid','wavatar','retro') default 'monsterid',
			CHANGE EN_ROOM1 EN_ROOM1 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM2 EN_ROOM2 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM3 EN_ROOM3 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM4 EN_ROOM4 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM5 EN_ROOM5 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM6 EN_ROOM6 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM7 EN_ROOM7 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM8 EN_ROOM8 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM9 EN_ROOM9 enum('0','1','2') NOT NULL default '1',
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
			CMDS = '/away /buzz /demote /dice /dice2 /dice3 /high /img /math /mr<br />/room /size /sort /topic /utube /video /wisp',
			MODS = 'Advanced Admin, (GR)Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8, Birthdays, MathJax',
			QUICKA = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/bot start|\r\n/bot stop|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/video url_to_video|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKM = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/video url_to_video|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s'
	WHERE ID='0';

ALTER TABLE ".$t_reg_users."
			ADD birthday date default NULL,
			ADD show_bday enum('0','1') NOT NULL default '1',
			ADD show_age enum('0','1') NOT NULL default '1',
			ADD bday_email_sent int(11) NOT NULL default '0';

ALTER TABLE ".$t_stats."
			ADD vids_posted smallint(5) NOT NULL DEFAULT '0',
			ADD maths_posted smallint(5) NOT NULL DEFAULT '0';
", $conn);
?>