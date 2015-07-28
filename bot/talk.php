<?php

/*
    Program E
	Copyright 2002, Paul Rydell

	This file is part of Program E.

	Program E is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    Program E is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Program E; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/**
 * HTML chat interface
 *
 * Contains the script that outputs the HTML interface for chatting
 * @author Paul Rydell
 * @copyright 2002
 * @version 0.0.8
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package Interpreter
 * @subpackage Responder
 */


/**
* Include the guts of the program.
*/
session_start();
$myuniqueid=session_id();
?>
	<html>
	<head>
	<title>Sample talk to Program E page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<LINK REL="stylesheet" HREF="../skins/style1.css.php?Charset=uft-8&medium=10" TYPE="text/css">
	</head>
	<body class="frame" onload="document.forms['form1'].elements['input'].focus();">
	<p align="left" class="title">Sample talk to Program E page</font></b></p>
<?php
include "respond_talk.php";
if (isset($_POST['input'])){

	$numselects=0;

	// Start the session or get the existing session.

	// Here is where we get the reply.
	$botresponse=replybotname($_POST['input'],$myuniqueid,$_POST['botname']);

	// Include a form so they can say more. Note the hidden part for people that do not have trans sid on but want non-cookie users to be able to use the system.
	?>
	<p><form name="form1" method="post" action="talk.php">
	<input type="hidden" name="<?php echo(session_name()); ?>" value="<?php echo($uid); ?>">
	<input type="hidden" name="botname" value="<?php echo($_POST['botname']); ?>">
	<input type="hidden" name="debug" value="<?php echo($_POST['debug']); ?>">
	<b>Talk to:</b> <select name="botname" disabled><option value="<?php echo($_POST['botname']); ?>"><?php echo($_POST['botname']); ?></option></select><br />
		<b>Input:</b> <input type="text" name="input" size="55">
		<input type="submit" name="Submit" value="Submit"><br /><br />
		<b>Display debug data:</b> 
		<input type="radio" name="debug" value="0" default <?php if(!$_POST['debug']) echo("checked=\"checked\""); ?>> Off <input type="radio" name="debug" value="1" <?php if($_POST['debug']) echo("checked=\"checked\""); ?>> On</p>
	</form>
<?php
	// Print the results.
	print("<p><table class=\"msg2\"><tr><td><b><font color=\"orange\">Your input:</font></b></td><td><b><font color=\"blue\"> ".$_POST['input']."</font></b></td></tr>");
	print("<tr><td><b><font color=\"green\">".$_POST['botname']." response:</font></b></td><td><b><font color=\"red\"> ".$botresponse->response."</font></b></td></tr></table></p>");
	print("<b><font color=\"yellow\">Execution time:</font> " . $botresponse->timer."<br /></b>");
	if ($debug)
	{
		print("<b><font color=\"yellow\">Numselects:</font> ".$numselects);
		print("<br /><font color=\"yellow\">Session:</font> ".$myuniqueid);
		print("<br /><font color=\"yellow\">Inputs:</font> ");
		print_r($botresponse->inputs);
		print("<br /><font color=\"yellow\">Paterns:</font> ");
		print_r($botresponse->patternsmatched);
		if ($botresponse->errors)
		{
			print("<br /><font color=\"red\">Errors:</font> ");
			print_r($botresponse->errors);
		}
	}
}
else {

	$availbots=array();

	// Get all the names of our bots.
	$query="select botname from bot_bots";

    $selectcode = mysql_query($query);

    if ($selectcode){
        if(!mysql_numrows($selectcode)){
        }
        else{
            while ($q = mysql_fetch_array($selectcode)){
                $availbots[]=$q[0];
            }
        }
    }

	?>
	<form name="form1" method="post" action="talk.php">
	<input type="hidden" name="debug" value="<?php echo($_POST['debug']); ?>">
	<b>Talk to:</b> <select name="botname">
	<?php
	foreach ($availbots as $onebot){
		print "<option value=\"$onebot\">$onebot</option>";
	}
	?>
	</select><br />
		<b>Input:</b> <input type="text" name="input" size="55">
		<input type="submit" name="Submit" value="Submit"><br /><br />
		<b>Display debug data:</b> 
		<input type="radio" name="debug" value="0" default <?php if(!$_POST['debug']) echo("checked=\"checked\""); ?>> Off <input type="radio" name="debug" value="1" <?php if($_POST['debug']) echo("checked=\"checked\""); ?>> On
	</form>
	<?php
}
?>
</body>
</html>
<?php
?>