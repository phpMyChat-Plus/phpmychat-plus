<?php
mysql_query("
ALTER TABLE ".$t_ban_users."
			CHANGE ip ip varchar(30) NOT NULL default '',
			ADD country_code varchar(3) NOT NULL default '',
			ADD country_name varchar(100) NOT NULL default '';

ALTER TABLE ".$t_config."
			CHANGE GRAVATARS_DYNAMIC_DEF GRAVATARS_DYNAMIC_DEF enum('mm','identicon','monsterid','wavatar','retro') default 'monsterid',
			ADD USE_FLAGS enum('0','1') NOT NULL default '1',
			ADD SHOW_FLAGS enum('0','1') NOT NULL default '1';

UPDATE ".$t_config." SET
			CHAT_SYSTEM = 'standalone',
			ALLOW_TEXT_COLORS = '1'
	WHERE ID='0';

ALTER TABLE ".$t_lurkers."
			CHANGE ip ip varchar(30) NOT NULL default '',
			ADD country_code varchar(3) NOT NULL default '',
			ADD country_name varchar(100) NOT NULL default '';

ALTER TABLE ".$t_reg_users."
			CHANGE ip ip varchar(30) NOT NULL default '',
			ADD country_code varchar(3) NOT NULL default '',
			ADD country_name varchar(100) NOT NULL default '',
			ADD use_sounds enum('0','1') NOT NULL default '1';

UPDATE ".$t_reg_users."SET
			use_sounds='0'
	WHERE email='bot@bot.com';

UPDATE ".$t_reg_users." SET
			use_sounds='0'
	WHERE email='quote@quote.com';

ALTER TABLE ".$t_stats."
			ADD ip varchar(30) NOT NULL default '',
			ADD country_code varchar(3) NOT NULL default '',
			ADD country_name varchar(100) NOT NULL default '';

ALTER TABLE ".$t_users."
			CHANGE ip ip varchar(30) NOT NULL default '',
			ADD country_code varchar(3) NOT NULL default '',
			ADD country_name varchar(100) NOT NULL default '';
", $conn);
?>