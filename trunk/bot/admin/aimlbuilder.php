<?php
/***************************************************************************
 *				  
 *               aimlbuilder util for Program E Database                               
 *			     --------------------
 *   Version      : beta 0,01 
 *   copyright	  : (C) 2006  Pierre McCarragher 
 *   email		  : waterboy@divesitenet.com
 *   Sourceforge  : http://sourceforge.net/projects/nukeai/
 *   Homepage     : www.divesitenet.com
 *
 *  This file is part of NukeAI and uses code from Program E 
 *  IP and copyright is retained by the authors of
 *  all three systems in their respective contributions.
 *
 ***************************************************************************/

/***************************************************************************
 *
 *   This program is free software; you can redistribute it and/or modify
 *   it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation; either version 2 of the License, or
 *   (at your option) any later version.
 *
 ***************************************************************************/
 


if (isset($_GET['question']) || isset($_POST['question']))
{
    $question = (isset($_GET['question'])) ? $_GET['question'] : stripslashes($_POST['question']);
}
if (isset($_GET['that']) || isset($_POST['that']))
{
    $that = (isset($_GET['that'])) ? $_GET['that'] : stripslashes($_POST['that']);
}
if (isset($_GET['answer1']) || isset($_POST['answer1']))
{
    $answer1 = (isset($_GET['answer1'])) ? $_GET['answer1'] : stripslashes($_POST['answer1']);
}
if (isset($_GET['answer2']) || isset($_POST['answer2']))
{
    $answer2 = (isset($_GET['answer2'])) ? $_GET['answer2'] : stripslashes($_POST['answer2']);
}
if (isset($_GET['answer3']) || isset($_POST['answer3']))
{
    $answer3 = (isset($_GET['answer3'])) ? $_GET['answer3'] : stripslashes($_POST['answer3']);
}
if (isset($_GET['answer4']) || isset($_POST['answer4']))
{
    $answer4 = (isset($_GET['answer4'])) ? $_GET['answer4'] : stripslashes($_POST['answer4']);
}
if (isset($_GET['answer5']) || isset($_POST['answer5']))
{
    $answer5 = (isset($_GET['answer5'])) ? $_GET['answer5'] : stripslashes($_POST['answer5']);
}
if (isset($_GET['answer6']) || isset($_POST['answer6']))
{
    $answer6 = (isset($_GET['answer6'])) ? $_GET['answer6'] : stripslashes($_POST['answer6']);
}
if (isset($_GET['common_answer']) || isset($_POST['common_answer']))
{
    $common_answer = (isset($_GET['common_answer'])) ? $_GET['common_answer'] : stripslashes($_POST['common_answer']);
}
if (isset($_GET['start_new']) || isset($_POST['start_new']))
{
    $start_new = (isset($_GET['start_new'])) ? $_GET['start_new'] : $_POST['start_new'];
}
if (isset($_GET['filename']) || isset($_POST['filename']))
{
    $filename = (isset($_GET['filename'])) ? $_GET['filename'] : $_POST['filename'];
}
if (empty($filename)) $filename = "export.aiml";

if (!empty ($question) && (!empty ($that) || !empty ($answer1) || !empty ($answer2) || !empty ($answer3) || !empty ($answer4) || !empty ($answer5) || !empty ($answer6) || !empty ($common_answer) )) 
{
    // add the output to the file
	$l_xmlfile = fopen ('output.aiml', ($start_new) ? 'w' : 'a') ;
	fwrite ($l_xmlfile, "\n<category>\n") ; 
    fwrite ($l_xmlfile, "<pattern>" . strtoupper(stripslashes($question)) . "</pattern>\n");
if (!empty($that))    fwrite ($l_xmlfile, "<that>" . strtoupper(stripslashes($that)) . "</that>\n");
    fwrite ($l_xmlfile, "<template>\n");
if (!empty ($answer1) || !empty ($answer2) || !empty ($answer3) || !empty ($answer4) || !empty ($answer5) || !empty ($answer6))    fwrite ($l_xmlfile, "<random>\n");
if (!empty($answer1))    fwrite ($l_xmlfile, "<li>".stripslashes($answer1)."</li>\n");
if (!empty($answer2))    fwrite ($l_xmlfile, "<li>".stripslashes($answer2)."</li>\n");
if (!empty($answer3))    fwrite ($l_xmlfile, "<li>".stripslashes($answer3)."</li>\n");
if (!empty($answer4))    fwrite ($l_xmlfile, "<li>".stripslashes($answer4)."</li>\n");
if (!empty($answer5))    fwrite ($l_xmlfile, "<li>".stripslashes($answer5)."</li>\n");
if (!empty($answer6))    fwrite ($l_xmlfile, "<li>".stripslashes($answer6)."</li>\n");
if (!empty ($answer1) || !empty ($answer2) || !empty ($answer3) || !empty ($answer4) || !empty ($answer5) || !empty ($answer6))    fwrite ($l_xmlfile, "</random>\n");
if (!empty($common_answer))    fwrite ($l_xmlfile, stripslashes($common_answer)."\n");
    fwrite ($l_xmlfile, "</template>\n");
    fwrite ($l_xmlfile, "</category>\n");
	fclose ($l_xmlfile) ;
}

if (isset($_POST['Save_AIML']))
{
	$r_xmlfile = fopen ($iai_root_path . 'output.aiml', 'r') ;
	$w_xmlfile = fopen ($iai_root_path . $filename, 'w') ;
    
	fwrite ($w_xmlfile, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n") ; 
	fwrite ($w_xmlfile, "<aiml version=\"1.0\">\n") ; 

	while ($data = fread($r_xmlfile, 4096))
	{
    	fwrite ($w_xmlfile, $data) ; 
    }    
    
	fwrite ($w_xmlfile, "\n</aiml>") ; 


        
    
}
if (isset($_GET['question']) || isset($_POST['question']))
{
    $question = (isset($_GET['question'])) ? $_GET['question'] : $_POST['question'];
}
echo "<p>";
echo "Each question should have at least 2 answers!<br/>";
echo "Checking Start new file will cause whatever is in output.txt to be overwritten! So make sure you've saved any important stuff as an aiml file before starting a new file.";
echo "</p>";

echo "<form name=\"form1\" method=\"post\" action=\"aimlbuilder.php\">";
echo "<table width=\"100%\" cellspacing=\"1\" cellpadding=\"4\" border=\"0\" align=\"center\" class=\"forumline\">";
echo "	  <tr><th class=\"thHead\" align=\"left\" colspan=\"2\">Question (Pattern)</th></tr>";
echo "    <tr><td class=\"row1\">Question (Pattern):</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"question\" value=\"$question\"></td></tr>";
echo "    <tr><th class=\"thHead\" align=\"left\" colspan=\"2\">That (optionally, if the input is an answer to a previous topic)</th></tr>";
echo "    <tr><td class=\"row1\">Topic (That):</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"that\" value=\"$that\"></td></tr>";
echo "    <tr><th class=\"thHead\" align=\"left\" colspan=\"2\">Random Answers (only one answer will be returned by bot):</th></tr>";
echo "    <tr><td class=\"row1\">Random Answer1:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"answer1\" value=\"$answer1\"></td></tr>";
echo "    <tr><td class=\"row1\">Random Answer2:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"answer2\" value=\"$answer2\"></td></tr>";
echo "    <tr><td class=\"row1\">Random Answer3:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"answer3\" value=\"$answer3\"></td></tr>";
echo "    <tr><td class=\"row1\">Random Answer4:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"answer4\" value=\"$answer4\"></td></tr>";
echo "    <tr><td class=\"row1\">Random Answer5:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"answer5\" value=\"$answer5\"></td></tr>";
echo "    <tr><td class=\"row1\">Random Answer6:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"answer6\" value=\"$answer6\"></td></tr>";
echo "    <tr><th class=\"thHead\" align=\"left\" colspan=\"2\">Common Answer (added at the end of the random answer):</th></tr>";
echo "    <tr><td class=\"row1\">Common Answer:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"common_answer\" value=\"$common_answer\"></td></tr>";
echo "    <tr><td class=\"row3\">Start new file:</td><td class=\"row3\"><input type=\"Checkbox\" name=\"start_new\"></td></tr>";
echo "    <tr><td colspan=\"2\" align=\"center\" class=\"row3\"><input type=\"submit\" name=\"Submit\" value=\"Submit\"></td></tr>";
echo "</table>";
echo "<br />";
echo "<table width=\"100%\" cellspacing=\"1\" cellpadding=\"4\" border=\"0\" align=\"center\" class=\"forumline\">";
echo "	  <tr><th class=\"thHead\" align=\"center\" colspan=\"2\">Working Output</th></tr>";
echo "    <tr><td class=\"row3\" align=\"center\" colspan=\"2\"><a href=\"output.aiml\">Temporary Output so far</a></td></tr>";
echo "    <tr><td class=\"row3\" align=\"center\" colspan=\"2\"><a href=\"$filename\">Exported Aiml file</a></td></tr>";
echo "    <tr><td class=\"row1\">Exported filename:</td><td class=\"row2\"><input type=\"text\" size=\"60\" name=\"filename\" value=\"$filename\"></td></tr>";
echo "    <tr><td align=\"center\" class=\"row3\" colspan=\"2\"><input type=\"submit\" name=\"Save_AIML\" value=\"Save_AIML\"></td></tr>";
echo "</table>";
echo "</form>";
?>