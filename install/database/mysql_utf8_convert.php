<?php
mysql_query("
ALTER DATABASE ".$dbname." DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_bot CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_bots CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_conversationlog CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_dstore CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_gmcache CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_gossip CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_patterns CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_templates CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_thatindex CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE bot_thatstack CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_ban_users." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_config." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_lurkers." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_messages." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_reg_users." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_stats." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
mysql_query("
ALTER TABLE ".$t_users." CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
", $conn);
?>