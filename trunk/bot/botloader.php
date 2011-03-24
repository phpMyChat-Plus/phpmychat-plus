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
 * Bot loading
 *
 * Contains the HTML interface for loading the AIML files in the MySQL database
 * @author Paul Rydell
 * @copyright 2002
 * @version 0.0.8
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @package Loader
 */

/**
* The general preferences and database details.
*/
$ChatPath = "../";
$BotPath = "./";
include_once("${ChatPath}config/config.lib.php");
require_once("${BotPath}dbprefs.php");

/**
* Contains the actual functions used in this file to load the AIML files into MySQL.
*/
require_once("${BotPath}botloaderfuncs.php");

ss_timing_start("all");
empty_tables();

print "<b><font size='3' color='black'>When this script is done running you should see \"<font color='red'>DONE LOADING</font>\".</b><br />\n
<font color='green'><b>Note:</b> If the script times out it is probably because your PHP is running in safe mode. If this is the case use the file <a href=\"botloaderinc.php\">botloaderinc.php</a> to load your AIML files one by one.<br />\n
Another reason might be that your timeout php setting is set too low. In this case, you sould split the aiml files in smaller pieces (keep the AIML header and footer in all the splitted pieces).</font><br />\n
<font color='red'><b>Important:</b> If you need to run/reload this file again, you must empty/truncate all the tables starting with \"bot_\" in your database, otherwise the bot will be broken.</font><br />\n<br />\n<b><font color='blue'>Process started! </font><font color='red'>Please wait...</font></b></font><br />\n";

$fp = "";

$templatesinserted=0;
$patternsinserted=0;

$depth = array();
$whaton = "";

$pattern = "";
$topic = "";
$that = "";
$template = "";

$startupwhich = "";
$splitterarray = array();
$inputarray = array();
$genderarray = array();
$personarray = array();
$person2array = array();

loadstartup();
makesubscode();

print "<font size='3' color='RED'><b>DONE LOADING</B><br /></font>\n";
print "<font size='3' color='BLUE'>Inserted $templatesinserted categories into database</font><br />\n";
print "<font size='3' color='BLUE'>Inserted $patternsinserted sentences into database</font><br /><br />\n";
print "<font size='3' color='RED'><b>WARNING!</b> You should either delete or rename the botloader.php and botloaderinc.php scripts, otherwise people may be able to abuse your server.</b></font>\n";
print "<p><font size='3' color='BLACK'><a href='talk.php'>Click here to talk to the bot</a></p></font>\n";

print "<br />";

ss_timing_stop("all");
print "<br /><br /><font size='3' color='BLACK'>execution time: " . ss_timing_current("all");
$avgts = round($templatesinserted/ss_timing_current("all"));
$avgtm = round($templatesinserted/((ss_timing_current("all"))/60));
print "<br /><font size='3' color='BLACK'>Templates per second=$avgts<br />";
print "<font size='3' color='BLACK'>Templates per minute=$avgtm<br />";
$avgps = round($patternsinserted/ss_timing_current("all"));
$avgpm = round($patternsinserted/((ss_timing_current("all"))/60));
print "<font size='3' color='BLACK'>Patterns per second=$avgps<br />";
print "<font size='3' color='BLACK'>Patterns per minute=$avgpm<br />";
?>