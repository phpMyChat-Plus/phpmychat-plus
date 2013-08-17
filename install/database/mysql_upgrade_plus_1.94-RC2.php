<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE GRAVATARS_DYNAMIC_DEF GRAVATARS_DYNAMIC_DEF enum('mm','identicon','monsterid','wavatar','retro') default 'monsterid';

UPDATE ".$t_config." SET
			CHAT_SYSTEM = 'standalone',
			ALLOW_TEXT_COLORS = '1',
	WHERE ID='0';
", $conn);
?>