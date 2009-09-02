<?php
//the way I have things set up, $Cmd[3] is equivalent to the number of rolls (dice) specified by the user and $Cmd[1] is equivalent to the number of sides per die.
if($Cmd[1]<=100 && ($Cmd[3]<=MAX_ROLLS || $Cmd[3] == ''))
{
 	if ($Cmd[3] == '')
	{
		$Cmd[3] = MAX_ROLLS;
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
	$temp1 = ($Cmd[3] != MAX_ROLLS) ? "t".$Cmd[3] : "";
	$What = "/d".$Cmd[1].$temp1." (".$Cmd[3]."*".$Cmd[1]." = max ".$Cmd[3]*$Cmd[1].")"; 
	$M = addslashes($nums)."<img src=images/arrowr.gif>&nbsp;<b><font color=red>".$sum."</font></b>&nbsp;<img src=images/tick.gif alt=\"".$What."\" title=\"".$What."\">";

	//add the command HTML into the messages table
  $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice3', '', '".time()."', '$U', '".stripslashes($M)."', '', '')");
}
else
{
  $Error = DICE3_WRONG;
}

$IsCommand = true;
$RefreshMessages = true;
?>