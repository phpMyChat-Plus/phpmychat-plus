<?php
mysql_query("
UPDATE ".$t_config." SET
			CHAT_SYSTEM = 'standalone',
			ALLOW_TEXT_COLORS = '1',
	WHERE ID='0';
", $conn);
?>