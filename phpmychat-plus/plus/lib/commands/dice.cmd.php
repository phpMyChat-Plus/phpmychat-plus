<?php
$count = "1";
$sum = "0";
if(($Cmd[1] > '0') && ($Cmd[1] <= MAX_ROLLS))
    {
       while($count <= $Cmd[1])
         {
	   $Dice = rand(1,6); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.

           $nums = $nums." <img src=images/nums".$Dice.".gif>"." ";       // slash this line to turn OFF images
           $nums = $nums." ".$Dice." ";                                    // slash this line to turn OFF text
					 $sum = $sum+$Dice;
           $count++;
         };
			$M = "<font size = -2 color = red>".addslashes($nums);
			$M .= " (sum = ".$sum.")</font></b>&nbsp;<img src=images/tick.gif>";
      $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice1', '', '".time()."', '$U', '$M', '')");
		}
 	elseif ($Cmd[1] == '')
     {
       $MR.= MAX_ROLLS;
       while($count <= $MR)
         {
	   $Dice = rand(1,6); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.

           $nums = $nums." <img src=images/nums".$Dice.".gif>"." ";       // slash this line to turn OFF images
           $nums = $nums." ".$Dice." ";                                    // slash this line to turn OFF text
					 $sum = $sum+$Dice;
           $count++;
         };
			$M = "<font size = -2 color = red>".addslashes($nums);
			$M .= " (sum = ".$sum.")</font></b>&nbsp;<img src=images/tick.gif>";
      $DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice1', '', '".time()."', '$U', '$M', '')");
 		}
    else
		       {
		       	  $Error = DICE_WRONG;
		       }


$IsCommand = true;
$RefreshMessages = true;
?>