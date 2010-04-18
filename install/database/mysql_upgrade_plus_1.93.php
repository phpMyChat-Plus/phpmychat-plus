<?php
mysql_query("
ALTER TABLE ".$t_config."
			ADD ALLOW_VIDEO enum('0','1','2') NOT NULL default '1',
			ADD VIDEO_WIDTH smallint(1) NOT NULL default '425',
			ADD VIDEO_HEIGHT smallint(1) NOT NULL default '344';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			CMDS = '/away /buzz /demote /dice /dice2 /dice3 /high /img /mr<br />/room /size /sort /topic /utube /video /wisp',
			QUICKA = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/announce I have to go now!|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/bot start|\r\n/bot stop|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is watching TV|\r\n/bye See you around!|\r\n/high user|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/demote %s|\r\n/demote * %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s',
			QUICKM = 'Greetings|\r\nWelcome|\r\nThanks for coming by|\r\nLoL|\r\n:rofl|\r\n/away be right back...|\r\n/away ...I\'m back!|\r\n/buzz|\r\n/buzz ~chimeup|\r\n/me is busy right now!|\r\n/mr is reading|\r\n/bye cyall!|\r\n/high %s|\r\n/join 0 #%s|\r\n/join 1 #%s|\r\n/invite %s|\r\n/img http://www.path_to_image|\r\n/promote %s|\r\n/room Please follow the topic|\r\n/size 12|\r\n/size|\r\n/sort|\r\n/topic |\r\n/topic reset|\r\n/wisp %s Hey, in which room ru?|\r\n/whois %s'
	WHERE ID='0';
", $conn);
mysql_query("
ALTER TABLE ".$t_stats."
			ADD vids_posted smallint(5) NOT NULL DEFAULT '0';
", $conn);
?>