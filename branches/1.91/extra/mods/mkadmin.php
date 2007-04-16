<!-- php script to make any phpMyChat user an Administrator -->
<!-- or create a new Administrator -->
<!-- V2.0 by Bob Dickow, June 1, 2003    -->
<!-- see options for your customization below, especially $multiple_admins. -->
<!-- Voire les options ci-dessous, notament '$multiple_admins' et
     aussi $Security. Mettre le script das votre chat/ et lancer-le avec
     votre browser. -->
<html>
<head>
<title>Create phpMyChat Administrator</title>
</head>
<body>
<?
/* Place this script in chat/ root directory, then run from a browser  */
/* ******************************************************************** */
/* ***  SECURITY FEATURE... Set $Security to false to run normally:  */
/* ******************************************************************** */
$Security = true;
if ($Security == true) {
  print "Security enabled. Execution halted."; 
  exit();  // added to prevent unauthorized use. Remove to run normally.
}
/* ******************************************************************** */
  require("./config/config.lib.php");
  $L = C_LANGUAGE; // modify for your choice of language.
  require("./localization/".$L."/localized.chat.php");
  require("./lib/release.lib.php");
  require("./lib/database/".C_DB_TYPE.".lib.php");

/*****************************************************/
  $multiple_admins = 1; // set to true to enable creation of multiple administrators.
  // however, THIS is NOT recommended. phpMyChat is designed for a single admin user.
/*****************************************************/
  $DbLink = new DB;

  function oops($msgstr) {
  
    global $DbLink;
    
    echo($msgstr);
    echo("<BR><BR><a href=\"mkadmin.php\">Let's do that again</a>");
    $DbLink->close();
    exit();
  }

  if (isset($HTTP_GET_VARS))
  {
	while(list($name,$value) = each($HTTP_GET_VARS))
	{
		$$name = $value;
	};
  };
  if (isset($pwd)) $pwd = stripslashes($pwd);
  if (isset($user)) $user = stripslashes($user);
  if ($Cancel == "Cancel") oops("<BR>Account setup canceled by user.");

  if (($user == "") AND ($pwd != "")) {
    $userxtra = "You need to specify a user name!";
  } else {
    if (($user != "") AND ($pwd == "")) {
      $pwdxtra = "You need to specify a password!";  
    }
  }
  if (($user == "") AND ($pwd == "") AND ($OK == "OK")) {
    $userxtra = "Please fill in the user field";
    $pwdxtra = "Please fill in the password field";
  }

  if (($user=="") || ($pwd == "")) {  // First run of the script, no params sent.
    print ("<h3>Welcome to ".APP_NAME." Admin Creator</h3>");
    print ("<h4>A 'Quick & Dirty' phpMyChat utility by Bob Dickow</h4><br>");
    print ("How to use:<BR><BR>Enter your desired Administrator username and password below.");
    print ("<BR><BR>If this user exists and no other Administrator exists, it will be set to Administrator status.");
    print ("<BR><BR>If this user does not exist and no other Administrator exists, a new admin entry with the name and password you indicate on this page will be created.");
    print ("<BR><BR>If an admin account exists with no username, this account will be given the name you provide on this page.<BR>");
    $DbLink->query("SELECT username, perms FROM ".C_REG_TBL);
    if ($DbLink->num_rows() > 0) {
      print ("<BR>Current Registered Users:<table width=\"50%\" border=\"0\">");
      print ("<tr><td>USER:&nbsp;</td><td>PERMS:&nbsp;</td></tr>");
      while (list($username,$perms) = $DbLink->next_record()) {
        echo ("<tr><td>&nbsp;$username</td><td>&nbsp;$perms</td></tr>");
      }
      print ("</table>");
    } else {
      echo ("<BR><B>No user accounts exist at all!</B><BR>");
    }
    ?>
    <br><form ACTION="mkadmin.php" METHOD="GET" NAME="Params">
    User (10 characters): <input name="user" maxlength="10" value="<?php echo($user); ?>" size="20"><?php echo("&nbsp;&nbsp;".$userxtra); ?>
    <br>Password (16 characters): <input name="pwd" maxlength="16" value="<?php echo($pwd); ?>" limit=9 size="20"><?php echo("&nbsp;&nbsp;".$pwdxtra); ?><br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <INPUT TYPE="submit" NAME="OK" VALUE="OK">&nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" NAME="Cancel" VALUE="Cancel">
    </form>
    <?php
  } else {  // form entries sent, check for admins and process

    $DbLink->query("SELECT username,email FROM ".C_REG_TBL." WHERE perms='admin' LIMIT 1");
    $num = $DbLink->num_rows();
    list($adminuser, $email) = $DbLink->next_record();

    if (($adminuser == "") || ($multiple_admins == true) OR ($num == 0)) {  // ok to bump up the perms status or create a new user.

      $DbLink->query("SELECT username,password FROM ".C_REG_TBL." WHERE username='$user' LIMIT 1");
      list($chatuser, $user_password) = $DbLink->next_record();

      if ($chatuser == "") { // create a new record.
        echo ("<h4>Define a new Administrator record for $user<br>(password=$pwd)</h4>");

        if ($Save == "OK") {
          include("./lib/get_IP.lib.php");
          $PWD_Hash = md5($pwd);
          $Latin1 = ($Charset == "iso-8859-1");

          $DbLink->query("INSERT INTO ".C_REG_TBL." VALUES ('', '', '$user', '$Latin1', '$PWD_Hash', '$FIRSTNAME', '$LASTNAME', '$COUNTRY', '$WEBSITE', '$EMAIL', '$SHOWEMAIL', 'admin', '',".time().", '$IP', '$GENDER', '$allowpopup', '$PICTURE', '$DESCRIPTION', '$FAVLINK', '$FAVLINK1', '$SLANG', '$COLORNAME', '$AVATARURL')");

          oops("<BR>Account setup proceding");
        } else {
          echo ("<br>Please fill in the information fields below:");
          ?>
          <FORM ACTION="mkadmin.php" METHOD="GET" NAME="Params">
          <INPUT TYPE="hidden" NAME="user" VALUE="<?php echo($user); ?>">
          <INPUT TYPE="hidden" NAME="pwd" VALUE="<?php echo($pwd); ?>">
	  <TABLE BORDER=0 CELLPADDING=3 CLASS="table">
	  <TR>
	  <TD ALIGN="CENTER">
 		<TABLE BORDER=0>
		<TR>
			<TH COLSPAN=2></TH>
		</TR>
		<TR><TD>&nbsp;</TD></TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>Your desired admin username :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="user" SIZE=11 MAXLENGTH=10 VALUE="<?php echo($user); ?>" >
							</TD>
		</TR>
					<TR>
				<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>your desired admin password :</TD>
				<TD VALIGN="TOP">
					<INPUT TYPE="text" NAME="pwd" SIZE=11 MAXLENGTH=16 VALUE="<?php echo($pwd); ?>" >
									</TD>
			</TR>
					<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>firstname :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FIRSTNAME" SIZE=11 MAXLENGTH=64 VALUE="" >
							</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>lastname :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="LASTNAME" SIZE=11 MAXLENGTH=64 VALUE="">
							</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_REG_45); ?> :</TD>
			<TD VALIGN="TOP">
				<SELECT name="GENDER">
				<OPTION value="1" <?php if ($GENDER==1) echo ("selected=\"selected\"")?>><?php echo(L_REG_46)?></OPTION>
				<OPTION value="2" <?php if ($GENDER==2) echo ("selected=\"selected\"")?>><?php echo(L_REG_47)?></OPTION>
				<OPTION value="0" <?php if ($GENDER==0 || $GENDER=="") echo ("selected=\"selected\"")?>><?php echo(L_REG_48)?></OPTION>
				</SELECT>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>spoken languages :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="COUNTRY" SIZE=11 MAXLENGTH=64 VALUE="" >
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>WEB :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="WEBSITE" SIZE=11 MAXLENGTH=64 VALUE="" >
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP>your e-mail :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="EMAIL" SIZE=11 MAXLENGTH=64 VALUE="" >
							</TD>
		</TR>
		<TR>
			<TD COLSPAN=2 ALIGN="center">
				<INPUT type="checkbox" name="SHOWEMAIL" value="1" CHECKED>
				&nbsp;show e-mail in public information			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_1); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="SLANG" SIZE=25 MAXLENGTH=64 VALUE="<?php if (isset($SLANG)) echo(htmlspecialchars(stripslashes($SLANG))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_2); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($FAVLINK)) echo(htmlspecialchars(stripslashes($FAVLINK))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_3); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="FAVLINK1" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($FAVLINK1)) echo(htmlspecialchars(stripslashes($FAVLINK1))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_4); ?> :</TD>
			<TD VALIGN="TOP">
				<TEXTAREA NAME="DESCRIPTION" COLS=27 ROWS=5 WRAP=ON<?php if ($done) echo(" READONLY"); ?>><?php if (isset($DESCRIPTION)) echo(htmlspecialchars(stripslashes($DESCRIPTION))); ?></TEXTAREA>
			</TD>
		</TR>
		<TR>
			<TD ALIGN="RIGHT" VALIGN="TOP" NOWRAP="NOWRAP"><?php echo(L_PRO_5); ?> :</TD>
			<TD VALIGN="TOP">
				<INPUT TYPE="text" NAME="PICTURE" SIZE=25 MAXLENGTH=255 VALUE="<?php if (isset($PICTURE)) echo(htmlspecialchars(stripslashes($PICTURE))); ?>"<?php if ($done) echo(" READONLY"); ?>>
			</TD>
		</TR>
		</TABLE>
		<P>
				<INPUT TYPE="submit" NAME="Save" VALUE="OK">&nbsp;&nbsp;&nbsp;<INPUT TYPE="submit" NAME="Cancel" VALUE="Cancel">
         
	  </TD>
          </TR>
          </TABLE>
          </FORM>
          <?php
        }
      } else {
          if ($user_password == md5($pwd)) {
            echo ("<BR>Attempting to promote $user...");
            if ($adminuser == $user) {
              oops ("<BR>Huh? $user is already an Administrator!");
            } else { // Go ahead and promote.

               $DbLink->query("UPDATE ".C_REG_TBL." SET perms='admin' WHERE username='$user'"); 
               oops("<br>User $user promoted successfully to Administrator.");
            }
          } else {
            oops("<BR>Incorrect password for user $user.");
          }
      }
    } else {
        if (($num == 1) and ($adminuser == "")) {
          echo ("<BR>There was an administrator account, but the username field was empty.<BR>");
          echo ("<BR>Updating existing admin account with supplied values.<BR>");
          $PWD_Hash = md5($pwd);
          $DbLink->query("UPDATE ".C_REG_TBL." SET username='$user', password='$PWD_Hash' WHERE perms='admin'");
          echo ("<BR><BR>Execution complete. A new admin account ($user) is now installed.");        
        } else {
          echo ("<BR>Sorry, you'll have to talk to an Administrator<br>first, because only one Administrator is allowed.<br>");
          oops("<BR>...$adminuser (<a href=\"mailto:$email\">$email</a>) is currently an Administrator.");
        }
    }
  }
  $DbLink->close();
?>
<BR>
<H4><B>To prevent unauthorized use, be sure to remove this<BR> 
script from your chat/ folder or alternatively set variable<BR>
$security to true when finished.</B></H4> 
</body>
</html>
