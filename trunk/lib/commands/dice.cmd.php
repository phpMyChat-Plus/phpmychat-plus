<?php
// Dice 1 command adjusted by Ciprian

// Change settings bellow (to increase the number of dices, change the value in Admin panel)
$show_images = 1;
$show_numbers = 1;
$sides = 6;	// this can take any value - default is 6 (to show images of the dices)

// Don't change the codes bellow
if ($sides > 6) $show_images = 0;
$count = 1;
$sum = 0;
if(($Cmd[1] > '0') && ($Cmd[1] <= MAX_ROLLS))
{
	$MR = $Cmd[1];
	while($count <= $Cmd[1])
	{
		$sums = "";
		$Dice = rand(1,$sides); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.
		if ($show_images) $nums = $nums." <img src=images/dice/nums".$Dice.".gif>"." ";
		if ($count < $Cmd[1] && ($show_images || $show_numbers)) $sums = " + ";
		elseif ($count == $Cmd[1] && ($show_images || $show_numbers)) $sums = " = ";
		if ($show_numbers) $nums = $nums.$Dice." ";
		$nums = $nums.$sums." ";
		$sum = $sum+$Dice;
		$count++;
	};
}
elseif ($Cmd[1] == '')
{
	$MR = MAX_ROLLS;
	while($count <= $MR)
	{
		$sums = "";
		$Dice = rand(1,$sides); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.
		if ($show_images) $nums = $nums." <img src=images/dice/nums".$Dice.".gif>"." ";
		if ($count < $MR && ($show_images || $show_numbers)) $sums = " + ";
		elseif ($count == $MR && ($show_images || $show_numbers)) $sums = " = ";
		if ($show_numbers) $nums = $nums.$Dice." ";
		$nums = $nums.$sums." ";
		$sum = $sum+$Dice;
		$count++;
	};
}
else
{
	$Error = DICE_WRONG;
}
if (!isset($Error))
{
	$M = "<b><font color = red>".addslashes($nums);
	$M .= $sum."</font></b>&nbsp;<img src=images/tick.gif> (".$MR." ".$sides." sided dice = max <font color = red>".$MR*$sides."</font>)";
	$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice1', '', '".time()."', '$U', '$M', '', '')");
}

$IsCommand = true;
$RefreshMessages = true;
?>