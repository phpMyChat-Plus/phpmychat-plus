<?php
define("APP_LAST_VERSION", 'v1.8');    				// The latest version number published on sourceforge.net
// Check for application update on sourceforge resource.
require("http://svn.sourceforge.net/viewvc/*checkout*/phpmychat/trunk/lib/update.lib.php");
require("./${ChatPath}lib/release.lib.php");
if (APP_LAST_VERSION == APP_VERSION)
{
?>
	<SCRIPT TYPE="text/javascript" LANGUAGE="JavaScript">
	<!--
	alert("<?php echo('A_SHEET5_0'); ?>");
	// -->
	</SCRIPT>
<?php
}
?>