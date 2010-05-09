<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE ALLOW_VIDEO ALLOW_VIDEO enum('0','1','2') NOT NULL default '1',
			ADD REQUIRE_BDAY enum('0','1') NOT NULL default '0',
			ADD SEND_BDAY_EMAIL enum('0','1') NOT NULL default '0',
			ADD SEND_BDAY_TIME tinyint(1) NOT NULL default '0',
			ADD SEND_BDAY_INTVAL tinyint(1) NOT NULL default '7',
			ADD SEND_BDAY_PATH varchar(255) NOT NULL default 'files/birthday/bday_greetings.txt';
", $conn);
mysql_query("
UPDATE ".$t_config." SET
			MODS = 'Advanced Admin, (GR)Avatars, Smilies Popup, Color Drop Box, Private Popup,<br />Quick Menu, Logs Archive, Lurking, Color names, WorldTime, UTF-8, Birthdays'
	WHERE ID='0';
", $conn);
?>