<?php

/********************************************************************
*                                                                   *
*   This library will try to validate and sanitize all user input   *
*    The script is written by Ciprian Murariu for phpMyChat-Plus    *
*         (http://ciprianmp.com/plus, ciprianmp@yahoo.com)          *
*  It uses resources from https://mathiasbynens.be/demo/url-regex   *
*            for preg_match URL validation (@diegoperini)           *
********************************************************************/

function validator($input,$type)
{
	$input = trim($input);
	$output = false;
	$IP_output = array();

	switch ($type)
	{
		case 'email':
			if (version_compare(PHP_VERSION,'5.2.0') >= 0)
			{
				if(filter_var($input, FILTER_VALIDATE_EMAIL)) $output = filter_var($input, FILTER_SANITIZE_EMAIL);
			}
			else
			{
				if(preg_match("/^([0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\\.[a-wyz][a-z](avel|bi|bs|fo|g|ia|l|m|me|mes|o|op|pa|ro|seum|t|to|u|v|z)?)$/i", $input)) $output = $input;
			}
			break;
		case 'url':
			if (version_compare(PHP_VERSION,'5.2.0') >= 0)
			{
				if(filter_var($input, FILTER_VALIDATE_URL)) $output = filter_var($input, FILTER_SANITIZE_URL);
			}
			else
			{
				$input = trim($input, '!"#$%&\'()*+,-./@:;<=>[\\]^_`{|}~');
				if(preg_match('_^(?:(?:https?|ftps?|www)://)(?:\S+(?::\S*)?@)?(?:(?!10(?:\.\d{1,3}){3})(?!127(?:\.\d{1,3}){3})(?!169\.254(?:\.\d{1,3}){2})(?!192\.168(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)(?:\.(?:[a-z\x{00a1}-\x{ffff}0-9]+-?)*[a-z\x{00a1}-\x{ffff}0-9]+)*(?:\.(?:[a-z\x{00a1}-\x{ffff}]{2,})))(?::\d{2,5})?(?:/[^\s]*)?$_iuS', $input)) $output = $input;
			}
			break;
		case 'ip':
			if(preg_match("/^(([01]?[0-9]?[0-9]|2([0-4][0-9]|5[0-5]))\.){3}([01]?[0-9]?[0-9]|2([0-4][0-9]|5[0-5]))$/", $input))
			{
				$b = preg_match("/^([0-9]{1,3}\.){3,3}[0-9]{1,3}/", $input, $IP_output);
				array_push($IP_output, "IPv4");
			}
			elseif(preg_match("/^(((?=(?>.*?(::))(?!.+\3)))\3?|([\dA-F]{1,4}(\3|:(?!$)|$)|\2))(?4){5}((?4){2}|((2[0-4]|1\d|[1-9])?\d|25[0-5])(\.(?7)){3})\z/i", $input, $IP_output))
			{
				array_push($IP_output, "IPv6");
			}
			else array_push($IP_output, "IPv6Loc");
			break;
		case 'img':
			if($input != ""){
				if (!preg_match("~^(?:f|ht)tps?://~i", $input))
				{
					$input = "http://" . $input;
				}
				$params = array('http' => array('method' => 'HEAD'));
				$ctx = stream_context_create($params);
				$fp = @fopen($input, 'rb', false, $ctx);
				if (!$fp) 
	#				return false;  // Problem with url
				$meta = @stream_get_meta_data($fp);
				if ($meta === false)
				{
					@fclose($fp);
	#				return false;  // Problem reading data from url
				}
				$wrapper_data = $meta["wrapper_data"];
				if(is_array($wrapper_data)){
					foreach(array_keys($wrapper_data) as $hh){
						if (substr($wrapper_data[$hh], 0, 19) == "Content-Type: image") // strlen("Content-Type: image") == 19 
						{
							@fclose($fp);
							$output = $input;
						}
					}
				}
				@fclose($fp);
			}
		default:
			$output = addslashes($input);
	}

	if ($type == "ip") return $IP_output;
	else return $output;
}
?>