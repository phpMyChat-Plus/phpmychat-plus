<?php
// Search panel by Digioz Multimedia.
// This sheet is diplayed when the admin wants to search the database for registered users

// Credit for this goes to Pete Soheil <webmaster@digioz.com>
if ($_SESSION["adminlogged"] != "1") exit(); // added by Bob Dickow for security.

// If form is submitted update values in the database

if (isset($FORM_SEND) && $FORM_SEND == 7)
{
  while(list($name,$value) = each($_GET))
  {
           $$name = $value;
  };
  while(list($name,$value) = each($_POST))
  {
           $$name = $value;
  };

  $conn = mysql_connect(C_DB_HOST, C_DB_USER, C_DB_PASS) or die ('<center>Error: Could Not Connect To Database.');
  mysql_select_db(C_DB_NAME)or die('Could Not Connect To Database.');

  if($searchCategory == 1 && $searchTerm != "")
  {
    // create query for 1
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE (username LIKE '%".$searchTerm."%' OR firstname LIKE '%".$searchTerm."%' OR lastname LIKE '%".$searchTerm."%') AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
    //echo $query;
  }
  elseif($searchCategory == 2 && $searchTerm != "")
  {
    // create query for 2
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE ip LIKE '%".$searchTerm."%' AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  elseif($searchCategory == 3 && $searchTerm != "")
  {
    // create query for 3
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE perms LIKE '%".$searchTerm."%' AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  elseif($searchCategory == 4 && $searchTerm != "")
  {
    // create query for 4
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE email LIKE '%".$searchTerm."%' AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  elseif($searchCategory == 5 && $searchTerm != "")
  {
    // create query for 5
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE gender='".$searchTerm."' AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  elseif($searchCategory == 6 && $searchTerm != "")
  {
    // create query for 6
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE description LIKE '%".$searchTerm."%' AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  elseif($searchCategory == 7 && $searchTerm != "")
  {
    // create query for 7
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE (favlink LIKE '%".$searchTerm."%' OR favlink1 LIKE '%".$searchTerm."%' OR website LIKE '%".$searchTerm."%') AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  elseif($searchCategory == 8 && $searchTerm != "")
  {
    // create query for 8
    $sql = "SELECT username,firstname,lastname,country,email,perms,ip,gender FROM c_reg_users WHERE (username LIKE '%".$searchTerm."%' OR firstname LIKE '%".$searchTerm."%' OR lastname LIKE '%".$searchTerm."%' OR country LIKE '%".$searchTerm."%' OR website LIKE '%".$searchTerm."%' OR ip LIKE '%".$searchTerm."%' OR perms LIKE '%".$searchTerm."%' OR email LIKE '%".$searchTerm."%' OR slang LIKE '%".$searchTerm."%' OR description LIKE '%".$searchTerm."%' OR favlink LIKE '%".$searchTerm."%' OR favlink1 LIKE '%".$searchTerm."%') AND email NOT LIKE '%@bot.com%' AND email NOT LIKE '%@quote.com%';";
  }
  else
  {
    // Means forgot to specify a search term
    echo "<table bgcolor=white align=center border=0><tr><td><b>".A_SEARCH_23."!</b></td></tr></table>";
    exit;
  }

   //echo $query;
   $query = mysql_query($sql) or die("Cannot query the database.<br />" . mysql_error());
   //mysql_query($query)or die("Could not execute search query!");

   // Display search result on screen
   echo "<table align=center border=\"1\" cellpadding=\"1\" cellspacing=\"0\" width=\"800\" bordercolor=\"#C0C0C0\" CLASS=table>";
   echo "<tr align=\"center\"><td><b>".A_SEARCH_13."</b></td><td><b>".A_SEARCH_14."</b></td><td><b>".A_SEARCH_15."</b></td><td><b>".A_SEARCH_16."</b></td><td><b>".A_SEARCH_6."</b></td><td><b>".A_SEARCH_18."</b></td><td><b>".A_SEARCH_19."</b></td><td><b>".A_SEARCH_20."</b></td></tr>";

   while($result = mysql_fetch_array($query))
   {
       $s_username = stripslashes($result["username"]);
       $s_firstname = stripslashes($result["firstname"]);
       $s_lastname = stripslashes($result["lastname"]);
       $s_country = stripslashes($result["country"]);
       $s_email = stripslashes($result["email"]);
       $s_perms = stripslashes($result["perms"]);
       $s_ip = stripslashes($result["ip"]);
       $s_gender = stripslashes($result["gender"]);

       if($s_gender == "1")
       {
         $s_gender = "M";
       }
       elseif($s_gender == "2")
       {
         $s_gender = "F";
       }
       elseif($s_gender == "0")
       {
         $s_gender = "U";
       }

       echo "<tr align=\"center\" bgcolor=\"#FFFFFF\"><td width=100>$s_username</td><td>$s_firstname</td><td>$s_lastname</td><td>$s_country</td><td><a href=\"mailto:$s_email\">$s_email</a></td><td>$s_perms</td><td>$s_ip</td><td align=center>$s_gender</td></tr>";
   }

echo "</table><br />";
}

?>

<P CLASS=title><?php echo (A_SEARCH_1) ; ?></P>

<FORM ACTION="<?php echo("$From?$URLQueryBody"); ?>" METHOD="POST" AUTOCOMPLETE="" NAME="Form7">
		<INPUT TYPE=hidden NAME="From" value="<?php echo($From); ?>">
		<INPUT TYPE=hidden NAME="pmc_username" value="<?php echo(htmlspecialchars(stripslashes($pmc_username))); ?>">
		<INPUT TYPE=hidden NAME="pmc_password" value="<?php echo($pmc_password); ?>">
		<INPUT TYPE=hidden NAME="FORM_SEND" value="7">
<table align="center" width="300" CLASS=table>
<tr>
    <td nowrap="nowrap"><b><?php echo A_SEARCH_21; ?>:</b></td>
    <td width="1%"><input name="searchTerm" type="text" size="20"></td>
</tr>
<tr>
    <td bgcolor="#9B9DFF"><b><?php echo A_SEARCH_22; ?>:</b></td>
    <td bgcolor="#9B9DFF">
        <select name="searchCategory">
                <option value="8"><?php echo (A_SEARCH_2) ; ?>
                <option value="1"><?php echo (A_SEARCH_3) ; ?>
                <option value="2"><?php echo (A_SEARCH_4) ; ?>
                <option value="3"><?php echo (A_SEARCH_5) ; ?>
                <option value="4"><?php echo (A_SEARCH_6) ; ?>
                <option value="5"><?php echo (A_SEARCH_7) ; ?>
                <option value="6"><?php echo (A_SEARCH_8) ; ?>
                <option value="7"><?php echo (A_SEARCH_9) ; ?>
        </select>

    </td></tr>
<tr>
    <td></td><td align="center"><input type="submit" name="submit_type" value="<?php echo (A_SEARCH_10) ; ?>"></td>
</tr>
</table>
</form>

<table align="center" width="500" CLASS=table>
<tr>
    <td>
    <b>*</b> <?php echo (A_SEARCH_11) ; ?><br />
    <b>*</b> <?php echo (A_SEARCH_12) ; ?><br />
</tr>
</table>
<?php
?>