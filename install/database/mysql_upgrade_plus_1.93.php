<?php
mysql_query("
ALTER TABLE ".$t_config."
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
			QUICKA = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/bot start|\r\n/bot stop|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/video url_to_video|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKM = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/video url_to_video|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s'
	WHERE ID='0';
", $conn);
mysql_query("
ALTER TABLE ".$t_reg_users."
			ADD birthday date default NULL,
			ADD show_bday enum('0','1') NOT NULL default '1',
			ADD show_age enum('0','1') NOT NULL default '1',
			ADD bday_email_sent int(11) NOT NULL default '0';
", $conn);
mysql_query("
ALTER TABLE ".$t_stats."
			ADD vids_posted smallint(5) NOT NULL DEFAULT '0';
", $conn);
?>