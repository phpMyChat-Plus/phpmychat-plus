<?php
mysql_query("
ALTER TABLE ".$t_config."
			CHANGE ALLOW_VIDEO ALLOW_VIDEO enum('0','1','2') NOT NULL default '1';
", $conn);
?>