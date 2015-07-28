<?php
/* --------------------------------------------------------------------------------
   Define the frameset to be used depending on the javascript version implemened in
   the bowser.
   This library is called by the 'chat/lib/index.lib.php' script
   -------------------------------------------------------------------------------- */

// Fix some security holes
if (!isset($ChatPath)) $ChatPath = "";
if (!is_dir('./'.substr($ChatPath, 0, -1))) exit();

require("./config/config.lib.php");

$U1 = urlencode(stripslashes($U));
$R1 = urlencode(stripslashes($R));
$botcontrol ="botfb/$R.txt";
#$DbLink = new DB;
	$DbLink->query("SELECT room FROM ".C_USR_TBL." WHERE username='$BOT_NAME'");
	list($BR) = $DbLink->next_record();
	$DbLink->clean_results();
#$DbLink->close();

// ** Define the Frameset for the chat depending on the browser capacities for DHTML **

// With DHTML : 3 imbricated framesets to have a true hidden frame for the loader (fix for a NN4+ bug)
if ($Ver1 == "H")
{
	?>
	<FRAMESET COLS="100%,*,*" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) window.location = '<?php echo("$From?L=$L&Ver=$Ver&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N&Reload=NNResize"); ?>';">

		<!-- Visible framesets -->
<?php
if(C_USE_FLAGS && ($status == "a" || $status == "t" || $status == "m" || C_SHOW_FLAGS))
{
?>
		<FRAMESET COLS="*,220" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
<?php
}
else
{
?>
		<FRAMESET COLS="*,190" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
<?php
}
?>
                        <!-- Régler ROWS="40,*,x" pour modifier les tailles des frames, 40,*,50 est typique. -->
                        <!-- Le premier numéro a rapport au format de la frame sur le haut, le dernier numéro de la large de ce du bas. -->
                        <!-- 50,*,65 marche bien si on emploit les smiles au-dessous de la frame au bas de l'ecran -->
<?php
if ((isset($dropdownmsga) && ($status == "a" || $status == "t")) || (isset($dropdownmsgm) && $status == "m") || isset($dropdownmsg))
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
         		        <!-- chat/topic.php est le nom d'un fichier qui define la frame supérieuse. -->
				<FRAME SRC="<?php echo($ChatPath); ?>topic.php?<?php echo("L=$L&R=$R1"); ?>" NAME="topic" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="NO">
				<FRAME SRC="<?php echo($ChatPath); ?>blank.php?<?php echo("L=$L"); ?>" NAME="messages" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="3" MARGINHEIGHT="3">
				<FRAME SRC="<?php echo($ChatPath); ?>input.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT$AddPwd2Url"); ?>" NAME="input" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO" NORESIZE>
			</FRAMESET>
			<?php
			if (C_WMP_STREAM == "" || !C_EN_WMPLAYER) $player = "";
			elseif (C_EN_WMPLAYER == 2) $player = ",200";
			else $player = ",45";
			if(!C_SUPPORT_PAID) $support = ",55";
			else $support = ",30";
			?>
			<FRAMESET ROWS="80,*<?php echo($player.$support); ?>,55" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0">
				<FRAME SRC="<?php echo($ChatPath); ?>exit.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T"); ?>" NAME="exit" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=3 MARGINHEIGHT=3 SCROLLING="NO">
				<FRAME SRC="<?php echo($ChatPath); ?>usersH.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T&D=$D&N=$N$AddPwd2Url"); ?>" NAME="users" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=3 MARGINHEIGHT=3 NORESIZE>
				<?php
				if (C_EN_WMPLAYER && C_WMP_STREAM != "")
				{
				?>
					<FRAME SRC="<?php echo($ChatPath); ?>player.php" NAME="streaming" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
				<?php
				}
				?>
				<FRAME SRC="<?php echo($ChatPath); ?>support.php?<?php echo("R=$R1&L=$L"); ?>" NAME="support" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
				<FRAME SRC="<?php echo($ChatPath); ?>link.php?<?php echo("R=$R1&L=$L"); ?>" NAME="link" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
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
if(C_USE_FLAGS && ($status == "a" || $status == "t" || $status == "m" || C_SHOW_FLAGS))
	{
	?>
		<FRAMESET COLS="*,220" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) window.location = '<?php echo("$From?L=$L&Ver=$Ver&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N&Reload=NNResize"); ?>';">
	<?php
	}
	else
	{
	?>
		<FRAMESET COLS="*,190" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" OnResize="if (document.layers) window.location = '<?php echo("$From?L=$L&Ver=$Ver&U=$U1$AddPwd2Url&R=$R1&T=$T&D=$D&N=$N&Reload=NNResize"); ?>';">
	<?php
	}
if ((isset($dropdownmsga) && ($status == "a" || $status == "t")) || (isset($dropdownmsgm) && $status == "m") || isset($dropdownmsg))
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
         		        <!-- chat/topic.php est le nom d'un fichier qui define la frame supérieuse. -->
      <FRAME SRC="<?php echo($ChatPath); ?>topic.php?<?php echo("L=$L&R=$R1"); ?>" NAME="topic" FRAMEBORDER="0" BORDER="0" FRAMESPACING="0" MARGINWIDTH="0" MARGINHEIGHT="0" SCROLLING="NO">
			<FRAME SRC="<?php echo($ChatPath); ?>messagesL.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT$AddPwd2Url"); ?>" NAME="messages" MARGINWIDTH=3 MARGINHEIGHT=3>
			<FRAME SRC="<?php echo($ChatPath); ?>input.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T&D=$D&N=$N&O=$O&ST=$ST&NT=$NT$AddPwd2Url"); ?>" NAME="input" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO" NORESIZE>
		</FRAMESET>
		<?php
		if (C_WMP_STREAM == "" || !C_EN_WMPLAYER) $player = "";
		elseif (C_EN_WMPLAYER == 2) $player = ",200";
		else $player = ",70";
		if(!C_SUPPORT_PAID) $support = ",55";
		else $support = ",30";
		?>
		<FRAMESET ROWS="80,*<?php echo($player.$support)?>,60" BORDER=0>
			<FRAME SRC="<?php echo($ChatPath); ?>exit.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T"); ?>" NAME="exit" MARGINWIDTH=3 MARGINHEIGHT=3 SCROLLING="NO">
			<FRAME SRC="<?php echo($ChatPath); ?>usersL.php?<?php echo("From=$From&L=$L&Ver=$Ver&U=$U1&R=$R1&T=$T&D=$D&N=$N$AddPwd2Url"); ?>" NAME="users" MARGINWIDTH=3 MARGINHEIGHT=3 NORESIZE>
			<?php
			if (C_EN_WMPLAYER && C_WMP_STREAM != "")
			{
			?>
				<FRAME SRC="<?php echo($ChatPath); ?>player.php" NAME="streaming" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
			<?php
			}
			?>
			<FRAME SRC="<?php echo($ChatPath); ?>support.php?<?php echo("R=$R1&L=$L"); ?>" NAME="support" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
			<FRAME SRC="<?php echo($ChatPath); ?>link.php?<?php echo("R=$R1&L=$L"); ?>" NAME="link" MARGINWIDTH=0 MARGINHEIGHT=0 SCROLLING="NO">
		</FRAMESET>
	</FRAMESET>
	<?php
}
?>