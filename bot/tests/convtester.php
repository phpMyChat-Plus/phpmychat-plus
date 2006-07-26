<?

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

// Just a basic test to see if the bot is responding well and how fast it is responding.

// Include the guts of the program.
include "../respond.php";

$tests=array(
"hello",
"how are you",
"where do you live",
"do you understand me",
"do you like people",
"have you heard of paul rydell",
"what time is it right now",
"where do you think you are going"
);

ss_timing_start("all");

// For each element in the array to a curl request to talk.php.
for ($x=0;$x<sizeof($tests);$x++){

	// Start the session or get the existing session.
	session_start();
	$myuniqueid=session_id();

	// Timer will let us know how long it took to get our response.
	ss_timing_start("single");

	// Here is where we get the reply.
	$botresponse=reply($tests[$x],$myuniqueid);

	// Stop the timer.
	ss_timing_stop("single");

	// Print the results.
	print "<B>RESPONSE: $botresponse<BR></b>";
	print "<BR><BR>execution time: " . ss_timing_current("single");
	print "<BR>";

}

ss_timing_stop("all");
print "<BR><BR>all execution time: " . ss_timing_current("all");
print "<BR>";

?>