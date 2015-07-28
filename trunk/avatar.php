<?php

// Get the names and values for vars sent to index.lib.php

if (isset($_GET))
{
	while(list($name,$value) = each($_GET))
	{
		$$name = $value;
	};
};

if (isset($_POST))
{
	while(list($name,$value) = each($_POST))
	{
		$$name = $value;
	};
};

// Fix a security hole
if (isset($L) && !is_dir("./localization/".$L)) exit();

require("./config/config.lib.php");
require("./lib/release.lib.php");
require("./localization/languages.lib.php");
require("./localization/".$L."/localized.chat.php");
require("./lib/database/".C_DB_TYPE.".lib.php");
include("./lib/validator.lib.php");

header("Content-Type: text/html; charset=${Charset}");

// avoid server configuration for magic quotes
if (function_exists('set_magic_quotes_runtime') && version_compare(PHP_VERSION, '5.3.0') < 0) set_magic_quotes_runtime(0);
else ini_set("magic_quotes_runtime", 0);
// Can't turn off magic quotes gpc so just redo what it did if it is on.
if (get_magic_quotes_gpc()) {
	foreach($_GET as $k=>$v)
		$_GET[$k] = stripslashes($v);
	foreach($_POST as $k=>$v)
		$_POST[$k] = stripslashes($v);
	foreach($_COOKIE as $k=>$v)
		$_COOKIE[$k] = stripslashes($v);
}


if (C_ALLOW_UPLOADS && $_POST['action'] == 'image') {
// we first include the upload class, as we will need it here to deal with the uploaded file
include('plugins/uploader/class.upload.php');
function size_readable($size, $retstring = null) {
    // adapted from code at http://aidanlister.com/repos/v/function.size_readable.php
    $sizes = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    if ($retstring === null) { $retstring = '%01.1f %s'; }
    $lastsizestring = end($sizes);
    foreach ($sizes as $sizestring) {
		if ($size < 1024) { break; }
        if ($sizestring != $lastsizestring) { $size /= 1024; }
    }
    if ($sizestring == $sizes[0]) { $retstring = '%01d %s'; } // Bytes aren't normally fractional
    return sprintf($retstring, $size, $sizestring);
}
    // ---------- AVATAR UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['avatar_upload'], L_LANG);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        // yes, the file is on the server
        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->image_resize            = true;
        $handle->image_ratio_y           = true;
        $handle->image_x                 = C_AVA_WIDTH;
		$handle->file_new_name_body = 'avatar_';
		$av_user_name = $User;
		if (stristr(urlencode($av_user_name), "%")) $av_user_name = "encname_".str_replace("%","_",urlencode($av_user_name));
		$handle->file_name_body_add = $av_user_name;
#		$handle->file_name_body_preadd = 'user_';
		$handle->file_safe_name = true;
		if ($From == "edituser.php")
		{
			$handle->file_overwrite = true;
			$handle->file_auto_rename = false;
		}
		else
		{
			$handle->file_overwrite = false;
			$handle->file_auto_rename = true;
		}
		$handle->auto_create_dir = false;
		$handle->dir_auto_chmod = true;
		$handle->dir_chmod = 0777;
		$handle->mime_check = true;
		$handle->mime_magic_check = true;
		$handle->no_script = false;
		$handle->allowed = array('image/*');
		$handle->image_convert = 'gif';
#		$handle->image_bevel = 3;
#		$handle->image_frame = 1;
#		$handle->image_frame_colors = array('#999999',  '#FF0000', '#666666', '#333333', '#000000');
		$handle->Process("./images/avatars/uploaded/");

        // we check if everything went OK
        if ($handle->processed) {
		      $avatar = C_AVA_RELPATH . "uploaded/" . $handle->file_dst_name;
		      unset($url);
		      $avamsgupload = "<P class=\"success\">".sprintf(L_UPLOAD_SUCCESS,$handle->file_src_name." (".size_readable($handle->file_src_size).")",$handle->file_dst_name." (".size_readable(sprintf("%u", filesize($handle->file_dst_pathname))).")")."</P>";
		    } else {
		      $avamsgupload = "<P class=\"error\">".$handle->error."</P>";
		    }
    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        $avamsgupload = "<P class=\"error\">".$handle->error."</P>";
    }

        // we delete the temporary files
        $handle-> Clean();
}

$DbAva = new DB;

// it's a URL string, perhaps.

// parse a avatar image from input url
if (isset($url)) {
    $isok = false;
    if (validator($url,"img")) {  // it's a URL string, perhaps.
       // find out if there is a real computer in the URL:
       $isok = true;
    }
    if ($isok) {
      $avatar = !preg_match("~^(?:f|ht)tps?://~i", $url) ? "http://" . $url : $url;
//	  $avamsgurl = "<P class=\"success\">Remote path correct.</P>";
    } else {
      $avamsgurl = "<P class=\"error\">".L_ERR_AV."</P>";
    }
}

// for display of all the avatars:
if (!isset($From)) $From="avatar.php";
if (!isset($avatarmatch)) $avatarmatch = $avatar;

if (isset($avatar)) {
  $typeit = L_CHG_AV;
 } else {
  $query = "SELECT avatar FROM ".C_REG_TBL." WHERE username='".$User."'";
  $DbAva->query($query);
  list ($avatar) = $DbAva->next_record();
  if (validator($avatar,"img") && (!isset($url))) {  // it's a URL string, perhaps.
    $url = validator($avatar,"img");
  }
  $typeit = "";
}

$DbAva->close();

if (!isset($ORIGAVATAR)) {
    $avatar=$ORIGAVATAR;
    if (validator($avatar,"img")) {  // it's a URL string, perhaps.
      $url = validator($avatar,"img");
    }
}

// For translations with an explicit charset (not the 'x-user-defined' one)
if (!isset($FontName)) $FontName = "";
// Special cache instructions for IE5+
$CachePlus	= "";
#if (ereg("MSIE [56789]", (isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"))) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
if (stripos((isset($HTTP_USER_AGENT)) ? $HTTP_USER_AGENT : getenv("HTTP_USER_AGENT"), "MSIE") !== false) $CachePlus = ", pre-check=0, post-check=0, max-age=0";
$now		= gmdate('D, d M Y H:i:s') . ' GMT';

header("Expires: $now");
header("Last-Modified: $now");
header("Cache-Control: no-cache, must-revalidate".$CachePlus);
header("Pragma: no-cache");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML dir="<?php echo(($Align == "right") ? "RTL" : "LTR"); ?>">

<HEAD>
<TITLE><?php echo(($User != "") ? $User." - ".L_AVATAR : L_AVATAR) ?></TITLE>
<LINK REL="stylesheet" HREF="<?php echo($skin.".css.php?Charset=${Charset}&medium=${FontSize}&FontName=".urlencode($FontName)); ?>" TYPE="text/css">
</HEAD>
<BODY onLoad="if (window.focus) window.focus();" CLASS="frame">
<center>
<table rows="3" width="90%" align="center" BORDER="0" CELLPADDING="2" CLASS="table">
<TR>
<TH COLSPAN=2 CLASS="tabtitle" align="center">
<?php echo(L_TITLE_AV); ?><img border="0" <?php echo("width=\"".C_AVA_WIDTH."\" height=\"".C_AVA_HEIGHT."\" src=\"".$avatar."\">"); ?>
</TH>
</TR>
<tr align="center"><td>
<H5><u><font color="ltblue"><?php echo(L_SEL_NEW_AV); ?></font></u></H5>
<?php
    if (strncasecmp($avatar,"http://",7) == 0) {  // it's a URL string, perhaps.
      $url = $avatar;
    }
?>

<form method="post" autocomplete="" target="_self" />
<?php if (isset($avamsgurl)) echo($avamsgurl); ?>
<font size="2" color="blue">(<?php echo(L_EX_AV); ?>: http://mysite.com/images/mypic.gif)</font>
<br /><font size="2"><?php echo(L_URL_AV); ?></font>
<input type="text" name="url" size="30" limit="255" VALUE="<?php echo($url); ?>">
<br /><font size="1"><i><?php echo(L_EXPL_AV); ?></i></font>
<input type="hidden" name="User" value="<?php echo($User); ?>" />
<input type="hidden" name="L" value="<?php echo($L); ?>" />
<input type="hidden" name="Link" value="<?php echo($Link); ?>" />
<input type="hidden" name="pmc_password" value="<?php echo(stripslashes(($_GET['pmc_password']))); ?>" />
<input type="hidden" name="pmc_username" value="<?php echo($User); ?>" />
</form></td></tr>
<?php
if (C_ALLOW_UPLOADS)
{
?>
<tr align="center"><td>
        <form name="form2" enctype="multipart/form-data" method="post" target="_self" />
			<?php if (isset($avamsgupload)) echo($avamsgupload); ?>
            <input type="hidden" name="action" value="image" />
            <input type="file" size="24" name="avatar_upload" value="" /><br />
            <input type="submit" name="Submit" value="<?php echo(sprintf(L_UPLOAD,L_UPLOAD_IMG)); ?>" />
        </form>
</td></tr>
<?php
}
?>
<tr align="center"><td valign="middle">
<?php
if (C_DEF_AVATAR != "no_avatar.gif") $j = -1;
else $j = 0;
For ($i=$j; $i <= C_NUM_AVATARS; $i++) {
  if ($i == -1) {
    $avatar = C_AVA_RELPATH . "no_avatar.gif";
  } elseif ($i == 0) {
    $avatar = C_AVA_RELPATH . C_DEF_AVATAR;
  } else {
    $avatar = C_AVA_RELPATH . "avatar".$i.".gif";
  }
  $title1=str_replace(C_AVA_RELPATH,"",$avatar);
  $title1=str_replace(".gif","",$title1);
  if ($avatar == $avatarmatch) $title1.=" (".L_SELECTED.")";
  echo "&nbsp;";
?><a href="<?php echo "$From?avatar=$avatar&ORIGAVATAR=$ORIGAVATAR&User=$User&U=$User&L=$L&FORM_SEND=0&LIMIT=$LIMIT&pmc_password=$pmc_password&pmc_username=$User\""; ?> onMouseOver="window.status='<?php echo(L_SEL_NEW_AV); ?>.'; return true;" title="<?php echo($title1); ?>" target="_self"><img src="<?php echo("$avatar"); echo("\" width=\"".C_AVA_WIDTH."\" height=\"".C_AVA_HEIGHT."\""); ?> border="<?php echo(($avatar == $avatarmatch) ? "2" : "0"); ?>"> </a><?php echo " ";
}
?>
</td></tr>
<tr align="center"><td>
<?php echo("<br /><font size=\"-1\">$typeit</font>"); ?>
</td>
</tr></table>
<?php
echo("<a href=\"$From?avatar=$avatarmatch&User=$User&U=$User&L=$L&FORM_SEND=0&LIMIT=$LIMIT&pmc_password=$pmc_password&pmc_username=$User\" onMouseOver=\"window.status='".L_REG_10."'; return true;\" ><br />".L_REG_10."</a>");
?>
</center>
    <script type="text/javascript">

    window.onload = function () {

      function xhr_send(f, e) {
        if (f) {
          xhr.onreadystatechange = function(){
            if(xhr.readyState == 4){
              document.getElementById(e).innerHTML = xhr.responseText;
            }
          }
          xhr.open("POST", "upload.php?action=xhr");
          xhr.setRequestHeader("Cache-Control", "no-cache");
          xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
          xhr.setRequestHeader("X-File-Name", f.name);
          xhr.send(f);
        }
      }

      function xhr_parse(f, e) {
        if (f) {
          document.getElementById(e).innerHTML = "File selected : " + f.name + "(" + f.type + ", " + f.size + ")";
        } else {
          document.getElementById(e).innerHTML = "No file selected!";
        }
      }

      function dnd_hover(e) {
        e.stopPropagation();
        e.preventDefault();
        e.target.className = (e.type == "dragover" ? "hover" : "");  
      }

      var xhr = new XMLHttpRequest();

      if (xhr && window.File && window.FileList) {

        // xhr example
        var xhr_file = null;
        document.getElementById("xhr_field").onchange = function () {
          xhr_file = this.files[0];
          xhr_parse(xhr_file, "xhr_status");
        }
        document.getElementById("xhr_upload").onclick = function (e) {
          e.preventDefault();
          xhr_send(xhr_file, "xhr_result");
        }

        // drag and drop example
        var dnd_file = null; 
        document.getElementById("dnd_drag").style.display = "block";
        document.getElementById("dnd_field").style.display = "none";
        document.getElementById("dnd_drag").ondragover = function (e) {
          dnd_hover(e);
        }
        document.getElementById("dnd_drag").ondragleave = function (e) {
          dnd_hover(e);
        }
        document.getElementById("dnd_drag").ondrop = function (e) {
          dnd_hover(e);
          var files = e.target.files || e.dataTransfer.files;
          dnd_file = files[0];
          xhr_parse(dnd_file, "dnd_status");
        }
        document.getElementById("dnd_field").onchange = function (e) {
          dnd_file = this.files[0];
          xhr_parse(dnd_file, "dnd_status");
        }
        document.getElementById("dnd_upload").onclick = function (e) {
          e.preventDefault();
          xhr_send(dnd_file, "dnd_result");
        }

      }
    }
    </script>
</BODY>
</HTML>