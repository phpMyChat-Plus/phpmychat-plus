<?php
  // Added for bot Roy Worley   17/01/04 9:59PM

  // UpDated for bot Roy Worley   7/7/05 1:24AM

global $uid ;                   // WORKS  it is to keep the bot on a topic per user


 function botmemory($U)                             // This writes a file to the HD to keep bot talking to different users.
       {
       	 $usrname =" : " .$U ;
         $botpath = "botfb/" .$U. ".txt"  ;         // file is in DIR "botfb" and called "usersname.txt"
         $fp = fopen($botpath, "a") ;               // file will be writen to if user types a trigger word
         fputs($fp, $usrname);                      // BUT only the existence of file (or not) is used.
         fclose($fp) ;
       }

         $numselects=0;                              // This doesn't seem to work either
  global $botpath;
    $botpath = "botfb/" .$U. ".txt" ;             // Made this global so I can delete user file when they don't want to talk to bot anymore.

 // Include the guts of the program. respond.php at top of handle_inputH.php
        function bottalk(&$botmess, $R)
        {            // $botmess is phpMyChat $M

				 // Start the session or get the existing session.
         global $U,$myuniqueid,$uid;                                            // it worked when I simplified the origional bot page not here though.
         $uid = $U;

         session_register($U);
         session_name($uid);
         session_id($U) ;                                         // Get the Session name
         $myuniqueid = session_id();

           mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or
               die("could not connect");                          // open "bot" DB connection
           mysql_select_db(C_DB_NAME);

              $botresponse=replybotname($botmess, $myuniqueid, C_BOT_NAME);    // Get bot's response from respond.php
          		$BOT = C_BOT_NAME;
              //Format response for phpMyChat DB
              $D1 = ereg_replace("[\r]|[\n]|\t", " ",$botresponse->response) ;
              $D1 = "<FONT COLOR=".C_BOT_FONT_COLOR."><I>".$myuniqueid  . "> " . $D1 . "</I></FONT>";
              $D1 = trim($D1) ;
              global $numselects;
              $DR = addslashes($D1);
              //." NumSelect = ".$numselects;

  // Open and Write it to phpMyChat DB
              mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS)or
              die("Could not connect");
              mysql_select_db(C_DB_NAME) ;
              $mytime = time() + 2;                    // Add 5 secs to bot time, seperates it in the DB better.
              mysql_query("INSERT INTO ".C_MSG_TBL." VALUES ('1', '$R', '$BOT', '1', '$mytime', '', '$DR', '', '')") ;
        }              // End of function

                       // set and execute the above function via an if statment WORKS

if (C_BOT_PUBLIC)
{
     if (file_exists ($botpath))                            // checks to see if user .txt file exists.
      {                                                     // if it does continues to talk to bot
          clearstatcache () ;
          global $M;
          global $botmess;
          $botmess = eregi_replace(C_BOT_NAME, "", $M);
            bottalk(&$botmess, $R);
      }
     elseif (eregi(C_BOT_NAME, $M))                          // Looks for "BOT NAME" in $M (typed in INPUT)  WORKS
      {
          if (!file_exists ($botpath)) botmemory($U);                                     // starts conversation with BOT if none already.
          global $M;
          global $botmess;
          $botmess = eregi_replace(C_BOT_NAME, "", $M);      // removes the word "BOT NAME" from the input helps the bot to make sense? NEEDS WORK.
          bottalk(&$botmess, $R);
      }
     if (eregi("bye ".C_BOT_NAME, $M) || eregi(C_BOT_NAME."> bye", $M) || eregi(C_BOT_NAME."> bye</FONT>", $M))             // if statment looks for "bye bot" or "bot> bye"
      {
      	if (file_exists ($botpath)) unlink ($botpath);    // it deletes the users file if found (Stops coversation with bot)
      }
}
?>