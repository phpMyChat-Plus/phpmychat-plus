<?php
mysql_query("
ALTER TABLE ".$t_config."
			ADD ALLOW_GRAVATARS enum('0','1','2') NOT NULL default '1',
			ADD GRAVATARS_CACHE enum('0','1') NOT NULL default '1',
			ADD GRAVATARS_CACHE_EXPIRE tinyint(1) NOT NULL default '7',
			ADD GRAVATARS_RATING enum('G','PG','R','X','ANY') NOT NULL default 'G',
			ADD GRAVATARS_DYNAMIC_DEF enum('identicon','monsterid','wavatar') default 'monsterid',
			ADD GRAVATARS_DYNAMIC_DEF_FORCE enum('0','1') NOT NULL default '0';
", $conn);
?>