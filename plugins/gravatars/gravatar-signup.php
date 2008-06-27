<?php
/*
Plugin Name: Gravatar Signup
Version: 1.6.3
Plugin URI: http://txfx.net/code/wordpress/gravatar-signup/
Description: Allows commenters to sign up for a gravatar by clicking a checkbox and filling in a desired password
Author: Mark Jaquith
Author URI: http://txfx.net/
*/

/*  Copyright 2005-2006  Mark Jaquith (email: mark.gpl@txfx.net)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/


/* ---------------------------------------------------- */
/* You may edit the $gravatar_signup_text string to     */
/* reword it to your liking                             */
/* ---------------------------------------------------- */
function show_gravatar_signup($post_id=0) {
	global $gravatar_signup_printed, $user_email;

	get_currentuserinfo();

	$comment_author_email = is_email($user_email) ? $user_email : trim(stripslashes($_COOKIE['comment_author_email_'.COOKIEHASH]));

	if ( $gravatar_signup_printed )
		return $post_id;

/* START EDITING */
$gravatar_signup_text = <<<_EOF

<script language="Javascript" type="text/javascript">
function gravatarCheckBox(isChecked) {
if (isChecked){
document.getElementById('gravatarsignup').style.display = 'block';
} else {
document.getElementById('gravatarsignup').style.display = 'none';
}
}
</script>

	<p style="clear:both;">
        <input style="width:auto;" name="get_gravatar" id="get_gravatar" value="get_gravatar" type="checkbox" onclick="gravatarCheckBox(checked);" />
        <label for="get_gravatar">Sign me up for a free Gravatar!</label>
	</p>

	<div id="gravatarsignup" style="display: none;">
	<p>Provide a valid e-mail address, input your desired password below, and submit your comment.  You will get an e-mail allowing you to access your free Gravatar account and upload an image that will appear next to your comments!<br /><br />
	 <label for="gravatar_password">Desired Password (required)</label> <input name="gravatar_password" id="gravatar_password" class="textarea" value="" size="28" tabindex="5" type="password" />
	</p>
	</div>
_EOF;
/* STOP EDITING */

	if ( strlen($comment_author_email) < 7 ) {
		echo $gravatar_signup_text;
		$gravatar_signup_printed = true;
		return $post_id;
		}

	if ( !user_has_gravatar($comment_author_email) ) {
		echo $gravatar_signup_text;
		$gravatar_signup_printed = true;
		}

return $post_id;
}

function run_gravatar_signup() {
	global $user_ID, $user_email;

	get_currentuserinfo();

	if ( $user_ID && is_email($user_email) )
		gravatar_signup($user_email, $_POST['gravatar_password']);
	elseif ( is_email($_POST['email']) )
		gravatar_signup($_POST['email'], $_POST['gravatar_password']);

}




/* compatibility with PHP versions older than 4.3 */
if ( !function_exists('file_get_contents') ) {
	function file_get_contents($file) {
		$file = file($file);
		return !$file ? false : implode('', $file);
	}
}

/* returns TRUE if the user has a gravatar.  Defaults to FALSE if an error is encountered */
function user_has_gravatar($email) {

	$email = md5($email);

	// open file for reading
	$filename = ABSPATH . "wp-content/plugins/gravatar-signup/gravatar-cache.txt";
	if ( file_exists($filename) ) {
		if ( filesize($filename) > 0 ) {
			if ( $file = @fopen($filename, "r") ) {
				$contents = @fread($file, filesize($filename));
				fclose($file);
				if ( stristr($contents, $email) )
					return true;
			} else {
				echo "Error: gravatar-cache.txt is not readable!<br />";
			}
		} 
	} else {
		echo "Error: gravatar-cache.txt does not exist!<br />";
	}

	//new method
	$rest_uri = 'http://gravatar.com/info/md5/' . $email;
	$the_file = @file_get_contents($rest_uri);

	if ( strpos($the_file, '<code>200</code>') !== FALSE ) {
		if ( file_exists($filename) ) {
			$file = @fopen($filename, "a");
			if ( $written = @fwrite($file, "\n".$email) )
				fclose($file);
			else
				echo "Error: gravatar-cache.txt is not writable!<br />";
		}
		return true;
	}
return false;
}

/* Signs a user up for a gravatar */
function gravatar_signup($email, $password) {

	if ( !class_exists('Snoopy') )
		require_once(ABSPATH . 'wp-includes/class-snoopy.php');

	$signup = 'http://gravatar.com/signup.php';
	$submit = 'http://gravatar.com/email_new_account.php';

	$snoopy = new Snoopy;
	$snoopy->maxredirs = 0;
	$snoopy->referer = $signup;

	$form_vars['email'] = $email;
	$form_vars['password1'] = $password;
	$form_vars['password2'] = $password;

	return $snoopy->submit($submit, $form_vars);
}


/* disable this if you don't want the checkbox inserted automatically into the comment form */
add_action('comment_form', 'show_gravatar_signup');

// starts everything up
if ( $_POST['gravatar_password'] )
	add_action('plugins_loaded', 'run_gravatar_signup');

?>