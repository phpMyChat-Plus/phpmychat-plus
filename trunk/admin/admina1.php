<?php
// Member profiles page by Ciprian

if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

#if (!C_CHAT_EXTRAS)
#{
?>
<P CLASS=title><?php echo("Mod under development...") ; ?></P>
<?php
#}
#else
#{
#}
?>