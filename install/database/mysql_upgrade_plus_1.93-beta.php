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
			ADD RES_ROOM5 enum('0','1') NOT NULL default '0';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			CMDS = '/away /buzz /demote /dice /dice2 /dice3 /high /img /mr<br />/room /size /sort /topic /wisp',
			MODS = 'Advanced Admin, (GR)Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8',
			ROOM_SKIN1 = '1',
			ROOM_SKIN2 = '2',
			ROOM_SKIN3 = '3',
			ROOM_SKIN4 = '4',
			ROOM_SKIN5 = '5',
			ROOM_SKIN6 = '6',
			ROOM_SKIN7 = '7',
			ROOM_SKIN8 = '8',
			ROOM_SKIN9 = '9',
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
			ADD join_room varchar(5) NOT NULL default '';
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
?>