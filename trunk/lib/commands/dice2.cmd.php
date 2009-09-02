<?php
$count = 1;
$count2 = 1;
$sum = 0;
$sides = 6;
if ($Cmd[1]<=MAX_DICES)
{
	if(($Cmd[3] <= MAX_ROLLS) || ($Cmd[3] == ''))
	{
	 	if ($Cmd[3] == '')
		{
		   $Cmd[3].= MAX_ROLLS;
		}
		if((($Cmd[1]<=2) && ($Cmd[3]<=$sides)) || ($Cmd[3]<=1) || (($Cmd[1]<=3) && ($Cmd[3]<=4)) || (($Cmd[1]<=4) && ($Cmd[3]<=3)) || (($Cmd[1]<=5) && ($Cmd[3]<=2)))
 		{
			while($count2 <= $Cmd[1])
			{
			while($count <= $Cmd[3])
			{
					$Dice = rand(1,$sides); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.

			  $nums = $nums." <img src=images/dice/nums".$Dice.".gif>"." ";       // slash this line to turn OFF images
			  $nums = $nums." ".$Dice." ";                                    // slash this line to turn OFF text
			  if($count < $Cmd[3])
			  {
			  $nums = $nums."";
				}
						$sum = $sum+$Dice;
			  $count++;
			};

				// Alter the html tags in the line below to format your text as you want.
			if($count2 < $Cmd[1])
			{
			  $nums = $nums." <img src=images/arrowr.gif>&nbsp&nbsp&nbsp";
					}
		   $count2++;
		   $count = 1;
		  }
			$temp = ($Cmd[3]*$Cmd[1])*$sides;
			$temp1 = ($Cmd[3] != MAX_ROLLS) ? $Cmd[3] : "";
			$What = "/".$Cmd[1]."d".$temp1." (".$Cmd[1]."*".$Cmd[3]."*".$sides." = max ".$temp.")"; 
			$M = "<b><font size=-2 color=blue>".addslashes($nums)."</font>&nbsp;<img src=images/arrowr.gif>&nbsp;<font color=red>".$sum."</font></b>&nbsp;<bdo dir=ltr><img src=images/tick.gif alt=\"".$What."\" title=\"".$What."\"></bdo>";
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice2', '', '".time()."', '$U', '".stripslashes($M)."', '', '')");
		}
		else
		{
		  while($count2 <= $Cmd[1])
		  {
		    while($count <= $Cmd[3])
		    {
			  $Dice = rand(1,$sides); // first number is the LOWEST one it will use, second is the HIGHEST number it will use.

		           $nums = $nums." <img src=images/dice/nums".$Dice.".gif>"." ";       // slash this line to turn OFF images
		           $nums = $nums." ".$Dice." ";                                    // slash this line to turn OFF text
									if($count < $Cmd[3])
									{
		           				$nums = $nums."";
									}
							 $sum = $sum+$Dice;
		           $count++;
		     };

		     // Alter the html tags in the line below to format your text as you want.
		     if($count2 < $Cmd[1])
		     {
		       $nums = $nums." <img src=images/arrowd.gif><br />";
				 }
		       $count2++;
		       $count = 1;
		   }

     	// Alter the html tags in the line below to format your text as you want.
			$temp = ($Cmd[3]*$Cmd[1])*$sides;
			$temp1 = ($Cmd[3] != MAX_ROLLS) ? $Cmd[3] : "";
			$What = "/".$Cmd[1]."d".$temp1." (".$Cmd[1]."*".$Cmd[3]."*".$sides." = max ".$temp.")"; 
			$M = "<b><font size=-2 color=blue>".addslashes($nums)."</font><img src=images/arrowr.gif>&nbsp;<font color=red>".$sum."</font></b>&nbsp;<bdo dir=ltr><img src=images/tick.gif alt=\"".$What."\" title=\"".$What."\"></bdo>";
			$DbLink->query("INSERT INTO ".C_MSG_TBL." VALUES ($T, '$R', 'SYS dice2', '', '".time()."', '$U', '".stripslashes($M)."', '', '')");
		}
	}
	else
	{
	  $Error = DICE2_WRONG;
	}
}
else
{
	$Error = DICE2_WRONG1;
}
$IsCommand = true;
$RefreshMessages = true;
?>