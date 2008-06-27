<?php
	// Sets the username for the cache filename
	if (isset($User) && $User != "") $user_name = $User."_";
	elseif (isset($OtherUser) && $OtherUser != "") $user_name = $OtherUser."_";
	else $user_name = 'def_';
	if ((!isset($use_gravatar) || !$use_gravatar) && GRAVATARS_DYNAMIC_DEF == "") $user_name = 'def_';
	if (eregi("win", PHP_OS) && stristr(urlencode($user_name), "%")) $user_name = "enc_";

	// Sets the email for the gravatar link
	if ((!isset($email) || $email == "") && (isset($user_name) && $user_name != 'def_') && GRAVATARS_DYNAMIC_DEF != "") $email = $user_name."@".$user_name.".com";

	// Sets the default Dynamic Gravatar
	if (ALLOW_GRAVATARS == 2 || (ALLOW_GRAVATARS == 1 && $local_avatar)) $dynamic_def = GRAVATARS_DYNAMIC_DEF;
	
	//  $pAvatar->setCacheLocation("temp/"); //optional
	# php>=5 versions
	if (version_compare(phpversion(),'4.4.0','>='))
	{
	 	include_once('PHPGravatar.class.php');
	}
	# php<5 versions
	else
	{
	 	include_once('PHPGravatar4.class.php');
	}

	$pAvatar = new PHPGravatar();
	if (!GRAVATARS_CACHE || (ALLOW_GRAVATARS == 1 && ((isset($use_gravatar) && !$use_gravatar) || (isset($USE_GRAV) && !$USE_GRAV))) || (ALLOW_GRAVATARS == 2 && (isset($USE_GRAV) && !$USE_GRAV))) $pAvatar->disableCache();
	$pAvatar->setEmail($email);
	$pAvatar->setSize(C_AVA_WIDTH);
	$pAvatar->setRating(GRAVATARS_RATING);
	$pAvatar->setDefault(isset($dynamic_def) ? $dynamic_def : $avatar);
	$gravatar = $pAvatar->get();

if ($gravatar != "")
{
	$avatar = $gravatar;
	$gravatarTag = $pAvatar->getTag();
}
?>