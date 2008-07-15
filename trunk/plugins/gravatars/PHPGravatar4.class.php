<?php
/*
PHPGravatar - A Gravatar URL generator class specially made for PHP 4 users.
By Ryan Rampersad, daybreakmaster+gravatar@gmail.com
Suggestions, anyone?

2008-6-15) Ready to go for PHP 4 with caching!
============================

Example(s)
  $Gravatar = new PHPGravatar();
  $Gravatar->disableCache(); //optional
  $Gravatar->setCacheLocation("temp/") //optional
  $Gravatar->setEmail("oh.nobody@gmail.com");
  $Gravatar->setSize(100);
  $Gravatar->setRating("pg");
  $Gravatar->setDefault("http://www.gusspickle.com/image/pickles4.jpg");
  echo($Gravatar->get());

============================
The MIT License

Copyright (c) 2008 Ryan Rampersad

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/

  class PHPGravatar
  {
      var $GRAVATAR_BASE = 'http://www.gravatar.com/avatar/%s?s=%d&r=%s&d=%s';
	  var $GRAVATAR_CACHE_LOCATION = 'cache/%s%s_%d.jpg'; // also .png works fine (actually png is the gravatar image type)
      var $GRAVATARS_CACHE_EXPIRE = GRAVATARS_CACHE_EXPIRE;

      var $rating = "g";
      var $size = 80;
      var $email;
      var $email_md5;
      var $default;
      var $cache;
      var $cache_location = "";

       function PHPGravatar()
      {
          $this->size = 80;
          $this->rating = "g";
          // Can urls even be opened? Oh, the elegance.
          $this->cache = (ini_get("allow_url_fopen") == 1 ? true : false);
      }

      /*
       If you don't want to cache the gravatars, call this.
       */
       function disableCache()
      {
          $this->cache = false;
          return $this;
      }

      /*
       The folder for the gravatar might not be located close by. In that case, use this to point the class in the right direction.
       */
       function setCacheLocation($location)
      {
          $this->cache_location = $location;
      }

      /*
       The instructions explain that the md5 string is returned from a lowercase email address.
       This sets both the email address and the md5.
       */
       function setEmail($email)
      {
          $email_lowercase = (string)strtolower($email);
          $this->email = $email_lowercase;
          $this->email_md5 = md5($email_lowercase);
          return $this;
      }

      /*
       The default rating is [g] but it can be any thing.
       The function will only accept ratings that defined in the array otherwise it sets the rating to [g] anyway.
       */
       function setRating($rating = "g")
      {
          $acceptable = array("any", "g", "pg", "r", "x");
          if (in_array(strtolower($rating), $acceptable)) {
              $this->rating = strtolower($rating);
          } else {
              $this->rating = "g";
          }
          return $this;
      }

      /*
       To have a default image, set this.
       */
       function setDefault($image_url)
      {
          $this->default = (string)urlencode($image_url);
          return $this;
      }

      /*
       The largest size Gravatars can be is 512. This will make sure you set it between 1 and 512.
       */
       function setSize($size)
      {
          $s = (int)$size;
          if ($s > 1 && $s < 512) {
              $this->size = $s;
          } else {
              $this->size = 80;
          }
          return $this;
      }

      /*
       To get the Gravatar URL, you call this.
       It will first figure out if there is any thing in cache. If not, it'll download it for you.
       1) If your server does not allow php to download files, it will simply return the gravatar url.
       2) If your cache is fresh it will download the file and it will serve the location of the local copy.
       3) If your cache is old it will check the age, and if it is too old, it will download a new one.
       4) If your cache is old but not too old it will serve the location of the local copy.

       Other notes: The cache filename is md5-size-rating.
       The filepath for the cache file is $this->cache_location . $GRAVATAR_CACHE_LOCATION

       */
       function get()
      {
      		global $user_name;
          // Even if caching is on, it is nice to have this.
          $gravatar_url = (string)sprintf($this->GRAVATAR_BASE, $this->email_md5, $this->size, $this->rating, $this->default);
          // Sets forcing of default Dynamic gravatar
		  if (ALLOW_GRAVATARS == 2 && GRAVATARS_DYNAMIC_DEF_FORCE) $gravatar_url .= '&f=1';

          // Check for the cache. It might be disabled or it might be turned off.
          if ($this->cache) {
              // assemble the localized filename for the cache.
              $filename = '';
              // Make filename.
              $filename = (string)$this->cache_location . sprintf($this->GRAVATAR_CACHE_LOCATION, $user_name, $this->email_md5, $this->size);
              // file exists and file is not older than EXPIRE time.
              if (file_exists($filename) && (filemtime($filename) > strtotime('-' . $this->GRAVATARS_CACHE_EXPIRE . ' days'))) {
                   return $filename;
              }

              //Use php4 function "copy" to get the file and save the file.
              // It could complain sometime...
              if(function_exists('file_put_contents') && file_get_contents($gravatar_url)) @file_put_contents($filename, file_get_contents($gravatar_url));
			  elseif(file($gravatar_url)) @copy($gravatar_url, $filename);

              // If something went wrong, it will still give the URL.
              if (file_exists($filename)) {
                  return $filename;
              } else {
                  return $gravatar_url;
              }

          } else {
              // No caching at all: return url to the Gravatar.
              return $gravatar_url;
          }
      }

      /*
       This function will use $this->get to return an image tag.
       */
       function getTag()
      {
          $image = '<img src="' . $this->get() . '" border=0 width="' . $this->size . '" alt="'.sprintf(L_CLICK,L_LINKS_19).'" />';
          return $image;
      }

  }
?>
