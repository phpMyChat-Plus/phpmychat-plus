<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE GRAVATARS_DYNAMIC_DEF GRAVATARS_DYNAMIC_DEF enum('mm','identicon','monsterid','wavatar','retro') default 'monsterid';

ALTER TABLE ".$t_ban_users."
			CHANGE ip ip varchar(30) NOT NULL default '';

ALTER TABLE ".$t_lurkers."
			CHANGE ip ip varchar(30) NOT NULL default '';

ALTER TABLE ".$t_reg_users."
			CHANGE ip ip varchar(30) NOT NULL default '';

ALTER TABLE ".$t_users."
			CHANGE ip ip varchar(30) NOT NULL default '';

UPDATE ".$t_config." SET
			CHAT_SYSTEM = 'standalone',
			ALLOW_TEXT_COLORS = '1'
	WHERE ID='0';
", $conn);
?>