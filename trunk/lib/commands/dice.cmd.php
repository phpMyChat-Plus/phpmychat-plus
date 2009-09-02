<?php
// Dice 1 command adjusted by Ciprian

// Change settings below (to increase the number of dice, change the value in Admin panel)
$show_images = 1;
$show_numbers = 1;
$sides = 6;	// this can take any value - default is 6 (to show images of the dice)

// Don't change the codes below
if ($sides > 6) $show_images = 0;
$count = 1;
$sum = 0;
if(($Cmd[2] > '0') && ($Cmd[2] <= MAX_ROLLS))
{
	$MR = $Cmd[2];
	while($count <= $Cmd[2])
	{
		$sums = "";
		$Dice = rand(1,$sides); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.
		if ($show_images) $nums = $nums." <img src=images/dice/nums".$Dice.".gif>"." ";
		if ($count < $Cmd[2] && ($show_images || $show_numbers)) $sums = " + ";
		elseif ($count == $Cmd[2] && ($show_images || $show_numbers)) $sums = " <img src=images/arrowr.gif> ";
		if ($show_numbers) $nums = $nums.$Dice." ";
		$nums = $nums.$sums." ";
		$sum = $sum+$Dice;
		$count++;
	};
}
elseif ($Cmd[2] == '')
{
	$MR = MAX_ROLLS;
	while($count <= $MR)
	{
		$sums = "";
		$Dice = rand(1,$sides); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.
		if ($show_images) $nums = $nums." <img src=images/dice/nums".$Dice.".gif>"." ";
		if ($count < $MR && ($show_images || $show_numbers)) $sums = " + ";
		elseif ($count == $MR && ($show_images || $show_numbers)) $sums = " <img src=images/arrowr.gif> ";
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
	$temp = ($Cmd[2]!=MAX_ROLLS) ? $Cmd[2] : "";
	$What = "/dice".$temp." (".$MR."*".$sides." = ".$MR*$sides.")";
	$M = "<b><font size=-2 color=green>".addslashes($nums)."</font><font color=red>".$sum."</font></b>&nbsp;<img src=images/tick.gif alt=\"".$What."\" title=\"".$What."\">";
	$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice1', '', '".time()."', '$U', '".stripslashes($M)."', '', '')");
}

$IsCommand = true;
$RefreshMessages = true;
?>