<?php
/* --------------------------------------------------------------------------------
   Define the frameset to be used depending on the javascript version implemened in
   the bowser.
   This library is called by the 'chat/lib/index.lib.php' script
   -------------------------------------------------------------------------------- */

// Fix some security holes
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();

require("./config/config.lib.php");

$U1 = urlencode(stripslashes($U));
$R1 = urlencode(stripslashes($R));
$botcontrol ="botfb/$R.txt";
$DbLink = new DB;
	$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$BOT_NAME'");
	list($BR) = $DbLink->next_record();

// ** Define the Frameset for the chat depending on the browser capacities for DHTML **

// With DHTML : 3 imbricated framesets to have a true hidden frame for the loader (fix for a NN4+ bug)
if ($Ver1 == "H")
{
	?>
	<FRAMESET COLS="100%,*,*" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) window.location = '<?php echo("$From?L=$L&Ver=$Ver&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N&Reload=NNResize"); ?>';">

		<!-- Visible framesets -->
		<FRAMESET COLS="*,190" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
                        <!-- Régler ROWS="40,*,x" pour modifier les tailles des frames, 40,*,50 est typique. -->
                        <!-- Le premier numéro a rapport au format de la frame sur le haut, le dernier numéro de la large de ce du bas. -->
                        <!-- 50,*,65 marche bien si on emploit les smiles au-dessous de la frame au bas de l'ecran -->
<?php
if ((isset($dropdownmsga) && $status == "a") || (isset($dropdownmsgm) && $status == "m") || isset($dropdownmsg))
{
	if (file_exists($botcontrol) || $BR !=  "")
  {
?>
			<FRAMESET ROWS="38,*,60" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
<?php
	}
	else
	{
?>
			<FRAMESET ROWS="25,*,60" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
<?php
	}
}
else
{
	if (file_exists($botcontrol) || $BR !=  "")
  {
?>
			<FRAMESET ROWS="38,*,35" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
<?php
	}
	else
	{
?>
			<FRAMESET ROWS="25,*,35" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
<?php
	}
}
?>
         		        <!-- chat\banner.php est le nom d'un fichier qui define la frame supérieuse. -->
				<FRAME SRC="<?php echo($ChatPath); ?>banner.php?<?php echo("L=$L"); ?>" NAME="banner" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="NO">
				<FRAME SRC="<?php echo($ChatPath); ?>blank.php?<?php echo("L=$L"); ?>" NAME="messages" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3">
				<FRAME SRC="<?php echo($ChatPath); ?>input.php?<?php echo("From=$From&Ver=$Ver&L=$L&U=$U1&R=$R1&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT$AddPwd2Url"); ?>" NAME="input" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO" NORESIZE>
			</FRAMESET>
			<FRAMESET ROWS="80,*,40" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
				<FRAME SRC="<?php echo($ChatPath); ?>exit.php?<?php echo("From=$From&Ver=$Ver&L=$L&U=$U1&R=$R1&T=$T"); ?>" NAME="exit" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=3 MARGINHEIGHT=3 SCROLLING="NO">
				<FRAME SRC="<?php echo($ChatPath); ?>usersH.php?<?php echo("From=$From&L=$L&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N"); ?>" NAME="users" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=3 MARGINHEIGHT=3 NORESIZE>
				<FRAME SRC="<?php echo($ChatPath); ?>link.php?<?php echo("R=$R1"); ?>" NAME="link" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
			</FRAMESET>
		</FRAMESET>

		<!-- Hidden frame for the input work when something has been sent -->
		<FRAME SRC="<?php echo($ChatPath); ?>blank.php?<?php echo("L=$L"); ?>" NAME="input_sent" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINHEIGHT="0" MARGINWIDTH="0" SCROLLING="NO">

		<!-- Hidden frame for the loader -->
		<FRAME SRC="<?php echo($ChatPath); ?>loader.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T&D=$D&N=$N&ST=$ST&NT=$NT$AddPwd2Url&First=1"); ?>" NAME="loader" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINHEIGHT="0" MARGINWIDTH="0" SCROLLING="NO">
	</FRAMESET>
	<?php
}

// Without DHTML : 2 imbricated framesets
else
{
	?>
	<FRAMESET COLS="*,190" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) window.location = '<?php echo("$From?L=$L&Ver=$Ver&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N&Reload=NNResize"); ?>';">
<?php
if ((isset($dropdownmsga) && $status == "a") || (isset($dropdownmsgm) && $status == "m") || isset($dropdownmsg))
{
	if (file_exists($botcontrol) || $BR !=  "")
  {
?>
			<FRAMESET ROWS="38,*,55"BORDER="0">
<?php
	}
	else
	{
?>
			<FRAMESET ROWS="25,*,55"BORDER="0">
<?php
	}
}
else
{
	if (file_exists($botcontrol) || $BR !=  "")
  {
?>
			<FRAMESET ROWS="38,*,35" BORDER="0">
<?php
	}
	else
	{
?>
			<FRAMESET ROWS="25,*,35"BORDER="0">
<?php
	}
}
?>
         		        <!-- chat\banner.php est le nom d'un fichier qui define la frame supérieuse. -->
      <FRAME SRC="<?php echo($ChatPath); ?>banner.php?<?php echo("L=$L"); ?>" NAME="banner" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="NO">
			<FRAME SRC="<?php echo($ChatPath); ?>messagesL.php?<?php echo("From=$From&L=$L&U=$U1&R=$R1&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT$AddPwd2Url"); ?>" NAME="messages" MARGINWIDTH=3 MARGINHEIGHT=3>
			<FRAME SRC="<?php echo($ChatPath); ?>input.php?<?php echo("From=$From&Ver=$Ver&L=$L&U=$U1&R=$R1&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT$AddPwd2Url"); ?>" NAME="input" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO" NORESIZE>
		</FRAMESET>
		<FRAMESET ROWS="80,*,50" BORDER=0>
			<FRAME SRC="<?php echo($ChatPath); ?>exit.php?<?php echo("From=$From&Ver=$Ver&L=$L&U=$U1&R=$R1&T=$T"); ?>" NAME="exit" MARGINWIDTH=3 MARGINHEIGHT=3 SCROLLING="NO">
			<FRAME SRC="<?php echo($ChatPath); ?>usersL.php?<?php echo("From=$From&L=$L&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N"); ?>" NAME="users" MARGINWIDTH=3 MARGINHEIGHT=3 NORESIZE>
			<FRAME SRC="<?php echo($ChatPath); ?>link.php?<?php echo("R=$R1"); ?>" NAME="link" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
		</FRAMESET>
	</FRAMESET>
	<?php
}

?>