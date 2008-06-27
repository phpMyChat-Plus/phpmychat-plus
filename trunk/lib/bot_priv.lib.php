<?php
  // Added for bot Roy Worley   17/01/04 9:59PM
  // UpDated for bot Roy Worley   7/7/05 1:24AM

global $uid ;                   // WORKS  it is to keep the bot on a topic per user

// Added for php4 support of mb functions
if (!function_exists('mb_convert_case'))
{
	function mb_convert_case($str,$type,$Charset)
	{
		if (eregi("TITLE",$type)) $str = ucwords($str);
		elseif (eregi("LOWER",$type)) $str = strtolower($str);
		elseif (eregi("UPPER",$type)) $str = strtoupper($str);
		return $str;
	}
};

 function botmemory($U)   // This writes a file to the HD to keep bot talking to different users.
{
	$usrname =" : ".$U;
	$botpath = "botfb/" .$U. ".txt";	// file is in DIR "botfb" and called "usersname.txt"
	$fp = fopen($botpath, "a");				// file will be writen to if user types a trigger word
	fputs($fp, $usrname);							// BUT only the existence of file (or not) is used.
	fclose($fp);
}

  $numselects=0;	// This doesn't seem to work either
  global $botpath;
  global $Read;
  $botpath = "botfb/".$U.".txt";	// Made this global so I can delete user file when they don't want to talk to bot anymore.

 // Include the guts of the program. respond.php at top of handle_inputH.php
        function bottalk(&$botmess, $R, $UR, $Private, $Read)
        {            // $botmess is phpMyChat $M

				 // Start the session or get the existing session.
         global $U,$T,$myuniqueid,$uid;                                            // it worked when I simplified the origional bot page not here though.
         $uid = $U;

         session_register($U);
         session_name($uid);
         session_id($U) ;                                         // Get the Session name
         $myuniqueid = session_id();

           mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or
           die("could not connect");                          // open "bot" DB connection
				   @mysql_query("SET CHARACTER SET utf8");
				   mysql_query("SET NAMES 'utf8'");
           mysql_select_db(C_DB_NAME);

	              $botresponse=replybotname(stripslashes($botmess), $myuniqueid, C_BOT_NAME);    // Get bot's response from respond.php
          		$BOT = C_BOT_NAME;
              //Format response for phpMyChat DB
              $D1 = ereg_replace("[\r]|[\n]|\t", " ",$botresponse->response);
              $D1 = str_replace("'","&#39;",$D1);

              global $numselects;
              //." NumSelect = ".$numselects;

              $mytime = time() + 2;	// Add 2 secs to bot time, seperates it in the DB better.

if (C_PRIV_POPUP)
{
	$DbLink = new DB;
	$DbLink->query("SELECT allowpopup FROM ".C_REG_TBL." WHERE username = '$U'");
	if($DbLink->num_rows() != 0)
	{
		if ($Read == "New" || $Read == "Old")
		{
			$D1 = "<FONT COLOR=\"".C_BOT_FONT_COLOR."\"><I>(private) " . $D1 . "</I></FONT>" ;
		  mysql_query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE pm_read='New' AND address='$BOT' AND username='$myuniqueid'") ;
			$Readu = "New";
		}
		elseif ($Read == "Neww" || $Read == "Oldw")
		{
			$D1 = "<FONT COLOR=\"".C_BOT_FONT_COLOR."\"><I>(whisper) " . $D1 . "</I></FONT>" ;
			mysql_query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE pm_read='Neww' AND address='$BOT' AND username='$myuniqueid'") ;
			$Readu = "Neww";
		}
	}
	else
	{
		if ($Read == "New" || $Read == "Old")
		{
			$D1 = "<FONT COLOR=\"".C_BOT_FONT_COLOR."\"><I>(private) " . $D1 . "</I></FONT>" ;
		  mysql_query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE pm_read='New' AND address='$BOT' AND username='$myuniqueid'") ;
			$Readu = date("Y-m-d H:i:s");
		}
		elseif ($Read == "Neww" || $Read == "Oldw")
		{
			$D1 = "<FONT COLOR=\"".C_BOT_FONT_COLOR."\"><I>(whisper) " . $D1 . "</I></FONT>" ;
			mysql_query("UPDATE ".C_MSG_TBL." SET pm_read='".date("Y-m-d H:i:s")."' WHERE pm_read='Neww' AND address='$BOT' AND username='$myuniqueid'") ;
			$Readu = date("Y-m-d H:i:s");
		}
	}
	$DbLink->clean_results();
}
              $D1 = trim($D1) ;
              $DR = addslashes($D1);
                  mysql_query("INSERT INTO ".C_MSG_TBL." VALUES ('$T', '$R', '$BOT', '0', '$mytime', '$U', '$DR', '$Readu', '$UR')") ;
}              // End of function

// set and execute the above function via an if statment WORKS
  if (eregi(mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset), mb_convert_case($M,MB_CASE_LOWER,$Charset)) || eregi(mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset), mb_convert_case($Private,MB_CASE_LOWER,$Charset)))
	// Looks for "BOT NAME" in $M (typed in INPUT)  WORKS
	{
      global $M;
      global $botmess;
      global $Charset;
      $botmess = eregi_replace(C_BOT_NAME, "", $M);
//    $botmess = eregi_replace(mb_convert_case(C_BOT_NAME,MB_CASE_LOWER,$Charset), " ", mb_convert_case($M,MB_CASE_LOWER,$Charset));
      if ($R == $UR) $UR = "";
		  bottalk(&$botmess, $R, $UR, $Private, $Read);
		  if (bget("name") == "") bset("name",$uid);
	}
   if (eregi(mb_convert_case("bye ".C_BOT_NAME,MB_CASE_LOWER,$Charset), mb_convert_case($M,MB_CASE_LOWER,$Charset)) || eregi(mb_convert_case(C_BOT_NAME."> bye",MB_CASE_LOWER,$Charset), mb_convert_case($M,MB_CASE_LOWER,$Charset)) || eregi(mb_convert_case(C_BOT_NAME."> bye</FONT>",MB_CASE_LOWER,$Charset), mb_convert_case($M,MB_CASE_LOWER,$Charset)))
	 // if private statment contains "bye botname"
	 {
      	if (file_exists ($botpath)) unlink ($botpath);
		// it deletes the users file if found (Stops coversation with bot)
	 }
?>