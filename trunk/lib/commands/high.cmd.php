<?php
// Check for swear words in the message if necessary
if (C_NO_SWEAR)
{
	include("./lib/swearing.lib.php");
	$Cmd[2] = checkwords($Cmd[2], false, $Charset);
};

 global $highpath;
         $highpath = "botfb/" .$U ;         // file is in DIR "botfb" and called "usersname"

                             // This writes a file to the botfb folder, to remember the user to highlight.

if (file_exists ($highpath))                            // checks to see if user file exists.
{
    @unlink ($highpath);                             // if it does delete it.
}
else
{	                                              // if it does NOT write it.
    clearstatcache () ;

    if($fp = @fopen($highpath, "a"))              // file will be writen.
	{
        @fputs($fp, stripslashes($Cmd[2]));                // and will include the userName to HighLight.
        @fclose($fp) ;
	}
};

$IsCommand = true;
$RefreshMessages = true;
$First = 1;
?>