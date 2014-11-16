<?php
mysql_query("
ALTER TABLE ".$t_ban_users."
			CHANGE ip ip varchar(30) NOT NULL default '';

ALTER TABLE ".$t_lurkers."
			CHANGE ip ip varchar(30) NOT NULL default '';

ALTER TABLE ".$t_reg_users."
			CHANGE ip ip varchar(30) NOT NULL default '';

ALTER TABLE ".$t_users."
			CHANGE ip ip varchar(30) NOT NULL default '';

", $conn);
?>