<?php

# YouTube PHP class
# used for embedding videos as well as video screenies on web page without single line of HTML code
#
# Dedicated to my beloved brother FILIP. Rest in peace!
#
# by Avram, www.avramovic.info

# php>=5 versions
if (version_compare(PHP_VERSION, '5') >= 0)
{

class YouTube {

	private $id = NULL;

	/**
	 * Constructor
	 *
	 * This is the default constructor which accepts YouTube URL in any of most commonly used forms.
	 *
	 * @access protected
	 * @param string $url YouTube URL in any of most commonly used forms. Can be ommited (defaults to null),
	 *  but you will have to use setID to set ID explicitly
	 * @see setID
	 */

	function __construct($url = null)
	{
		if ($url != null)
		{
			$this->id = YouTube::parseURL($url);
		}
	}

	/**
	 * Set YouTube ID explicitly
	 *
	 * This method sets YouTube ID explicitly. It checks if the ID is in good format. If yes it will set it
	 * and return true, and if not - it will return false
	 *
	 * @access public
	 * @param string $id YouTube ID
	 * @return boolean Whether the ID has been set successfully
	 */

	public function setID($id)
	{
		if (preg_match('/([A-Za-z0-9_-]+)/', $url, $matches))
		{
			$this->id = $id;
			return true;
		}
		else
			return false;
	}

	/**
	 * Get string representation of YouTube ID
	 *
	 * This method returns YouTube video ID if any. Otherwise returns null.
	 *
	 * @access public
	 * @return string YouTube video ID if any, otherwise null
	 */

	public function getID()
	{
		return $this->id;
	}

	/**
	 * Parse YouTube URL and return video ID.
	 *
	 * This method sreturnns YouTube video ID if any. Otherwise returns null.
	 *
	 * @access public
	 * @static
	 * @param string $url URL of YouTube video in any of most commonly used forms
	 * @return string YouTube video ID if any, otherwise null
	 */

	public static function parseURL($url)
	{
		if (preg_match('/watch\?v\=([A-Za-z0-9_-]+)/', $url, $matches))
			return $matches[1];
		else
			return false;
	}

	/**
	 * Get YouTube video HTML embed code
	 *
	 * This method returns HTML code which is used to embed YouTube video in page
	 *
	 * @access public
	 * @param string $url YouTube video URL. If this cannot be parsed it will be used as video ID. It can be omitted
	 * @param integer $width Width of embedded video, in pixels. Defaults to 425
	 * @param integer $height Height of embedded video, in pixels. Defaults to 344
	 * @return string HTML code which is used to embed YouTube video in page
	 */

	public function EmbedVideo($url = null, $width = 425, $height = 344) {
		if ($url == null)
			$videoid = $this->id;
		else
		{
			$videoid = YouTube::parseURL($url);
			if (!$videoid) $videoid = $url;
		}
// Parameter options are:
# rel		=	0 / 1 - hide / show related videos. Default is 1.
# fs		=	0 / 1 - disable/enable fullscreen button (the "allowfullscreen" parameters should also be added in order to display the fs button). Default is 0.
# autoplay	=	0 / 1 - disable/enable autostart. Default is 0.
# loop	=	0 / 1 - disable/enable replay in a loop. Default is 0.
# color1	=	any RGB/Hexa color code - first color of the border, when enabled
# color2	=	any RGB/Hexa color code - first color of the border, when enabled
# border	=	0 / 1 - hide / show a border (frame)
# hl		=	en_US - lang identifier
# iv_load_policy	=	1 / 3 - disable/enable video annotations by default. Default is 1.
# showsearch	=	0 / 1 - disable/enable the search box from displaying when the video is minimized. Note that if the rel parameter is set to 0 then the search box will also be disabled, regardless of the value of showsearch.
# egm	=	0 / 1 - disable/enable "Enhanced Genie Menu". Default is 0. This behavior causes the genie menu (if present) to appear when the user's mouse enters the video display area, as opposed to only appearing when the menu button is pressed
# showinfo	=	0 / 1 - Setting to 0 causes the player to not display information like the video title and rating before the video starts playing. Default is 1.

		# Set the language (if available)
		$hl = substr(L_LANG, 0, 2);
		return '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://www.youtube.com/v/'.$videoid.'&rel=1&fs=1&loop=0&color1=0&color2=0&border=0&hl='.$hl.'&iv_load_policy=3&showsearch=0&showinfo=0"></param><param name="wmode" value="transparent"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$videoid.'&rel=1&fs=1&loop=0&color1=0&color2=0&border=0&hl='.$hl.'&iv_load_policy=3&showsearch=0&showinfo=0" type="application/x-shockwave-flash" wmode="transparent" width="'.$width.'" height="'.$height.'" allowfullscreen="true"></embed></object>';
	}

	/**
	 * Get URL of YouTube video screenshot
	 *
	 * This method returns URL of YouTube video screenshot. It can get one of three screenshots defined by YouTube
	 *
	 * @access public
	 * @param string $url YouTube video URL. If this cannot be parsed it will be used as video ID. It can be omitted
	 * @param integer $imgid Number of screenshot to be returned. It can be 1, 2 or 3
	 * @return string URL of YouTube video screenshot
	 */

	public function GetImgURL($url = null, $imgid = 1) {
		if ($url == null)
			$videoid = $this->id;
		else
		{
			$videoid = YouTube::parseURL($url);
			if (!$videoid) $videoid = $url;
		}

		return "http://img.youtube.com/vi/$videoid/$imgid.jpg";
	}

	/**
	 * Get URL of YouTube video screenshot
	 *
	 * This method returns URL of YouTube video screenshot. It can get one of three screenshots defined by YouTube
	 * DEPRECATED! Use GetImgURL instead.
	 *
	 * @deprecated
	 * @see GetImgURL
	 * @access public
	 * @param string $url YouTube video URL. If this cannot be parsed it will be used as video ID. It can be omitted
	 * @param integer $imgid Number of screenshot to be returned. It can be 1, 2 or 3
	 * @return string URL of YouTube video screenshot
	 */

	public function GetImg($url = null, $imgid = 1)
	{
		return GetImgURL($url, $imgid);
	}

	/**
	 * Get YouTube screenshot HTML embed code
	 *
	 * This method returns HTML code which is used to embed YouTube video screenshot in page
	 *
	 * @access public
	 * @param string $url YouTube video URL. If this cannot be parsed it will be used as video ID
	 * @param integer $imgid Number of screenshot to be returned. It can be 1, 2 or 3
	 * @param string $alt Alternate text of the screenshot
	 * @return string HTML code which embeds YouTube video screenshot
	 */

	public function ShowImg($url = null, $imgid = 1, $alt = 'Video screenshot') {
		return "<img src='".$this->GetImgURL($url, $imgid)."' width='130' height='97' border='0' alt='".$alt."' title='".$alt."' />";
	}
}

}
# php<5 versions
else
{

class YouTube {

	function _GetVideoIdFromUrl($url) {
		$parts = explode('?v=',$url);
		if (count($parts) == 2) {
			$tmp = explode('&',$parts[1]);
			if (count($tmp)>1) {
				return $tmp[0];
			} else {
				return $parts[1];
			}
		} else {
			return $url;
		}
	}

	/*
	function IsVideoUrl($videoid) {
		$videoid = $this->_GetVideoIdFromUrl($videoid);
		return $videoid;
	}
	*/

	function EmbedVideo($videoid,$width = 425,$height = 344) {
		$videoid = $this->_GetVideoIdFromUrl($videoid);

		# Set the language (if available)
		$hl = substr(L_LANG, 0, 2);
		return '<object width="'.$width.'" height="'.$height.'"><param name="movie" value="http://www.youtube.com/v/'.$videoid.'&rel=1&fs=1&loop=0&color1=0&color2=0&border=0&hl='.$hl.'&iv_load_policy=3&showsearch=0&showinfo=0"></param><param name="wmode" value="transparent"></param><param name="allowFullScreen" value="true"></param><embed src="http://www.youtube.com/v/'.$videoid.'&rel=1&fs=1&loop=0&color1=0&color2=0&border=0&hl='.$hl.'&iv_load_policy=3&showsearch=0&showinfo=0" type="application/x-shockwave-flash" wmode="transparent" width="'.$width.'" height="'.$height.'" allowfullscreen="true"></embed></object>';
	}

	function GetImg($videoid,$imgid = 1) {
		$videoid = $this->_GetVideoIdFromUrl($videoid);
		return "http://img.youtube.com/vi/$videoid/$imgid.jpg";
	}

	function ShowImg($videoid,$imgid = 1,$width = 425,$height = 344,$alt = 'Video screenshot') {
		return "<img src='".$this->GetImg($videoid,$imgid)."' width='".$width."' height='".$height."' border='0' alt='".$alt."' title='".$alt."' />";
	}

}

}
?>