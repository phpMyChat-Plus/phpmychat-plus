<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE EN_ROOM1 EN_ROOM1 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM2 EN_ROOM2 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM3 EN_ROOM3 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM4 EN_ROOM4 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM5 EN_ROOM5 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM6 EN_ROOM6 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM7 EN_ROOM7 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM8 EN_ROOM8 enum('0','1','2') NOT NULL default '1',
			CHANGE EN_ROOM9 EN_ROOM9 enum('0','1','2') NOT NULL default '1',
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
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			CMDS = '/away /buzz /demote /dice /dice2 /dice3 /high /img /math /mr<br />/room /size /sort /topic /utube /video /wisp',
			MODS = 'Advanced Admin, (GR)Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8, Birthdays, MathJax',
	WHERE ID='0';
", $conn);
mysql_query("
ALTER TABLE ".$t_stats."
			ADD maths_posted smallint(5) NOT NULL DEFAULT '0';
", $conn);
?>