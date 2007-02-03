<?php

// Check for swear words in the message if necessary
if (C_NO_SWEAR == 1)
{
	include("./lib/swearing.lib.php");
	$Cmd[1] = checkwords($Cmd[1], false);
};

 global $botpath;
         $botpath = "botfb/" .$U ;         // file is in DIR "botfb" and called "usersname"

                             // This writes a file to the HD to record user to highlight.

if (file_exists ($botpath))                            // checks to see if user file exists.
      {
      	unlink ($botpath);                             // if it does delete it.
      }
else {	                                              // if it does NOT write it.
       clearstatcache () ;

          $fp = fopen($botpath, "a") ;                // file will be writen.
             fputs($fp, stripslashes($Cmd[1]));                // and will include the userName to HighLight.
          fclose($fp) ;
     };

$IsCommand = true;
$RefreshMessages = true;
$First = 1;
?>