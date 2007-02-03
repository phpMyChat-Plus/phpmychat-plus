<?php
$count = "1";
$count2 = "1";

//the way I have things set up, $Cmd[3] is equivalent to the number of rolls specified by the user.
if($Cmd[1]<=100 && ($Cmd[3]<=MAX_ROLLS || $Cmd[3] == ''))
{
 	if ($Cmd[3] == '')
  {
  	$Cmd[3].= MAX_ROLLS;
	}
	//loop for the number of rolls specified
	for($counter=0;$counter<$Cmd[3];$counter++)
	{
		$Dice = rand(1,$Cmd[1]); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.

		//build a string of HTML to output to the browser
		if($nums==""){
			$nums = " <img src=images/dice/$Dice.gif>";
			}
		else{
			$nums=$nums." <img src=images/dice/$Dice.gif>";
			}
		$sum = $sum+$Dice;
	}
	$M = "<font size = -2 color = green>".addslashes($nums);
	$M .= " (sum = ".$sum.", max/dice ".$Cmd[1].")</font></b>&nbsp;<img src=images/tick.gif>";

	//add the command HTML into the messages table
  $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice3', '', '".time()."', '$U', '$M', '', '')");
}
else
{
  $Error = DICE3_WRONG;
}

$IsCommand = true;
$RefreshMessages = true;
?>