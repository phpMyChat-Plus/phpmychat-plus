<?php
$C_ROOM_EXT_MUSIC = 1;
$C_ROOM_EXT_PHOTO = 1;
$MUSIC_ROOM1 = '"./../../chat/chat/sounds/Armik - Alone with you.mp3"';
$PHOTO_ROOM1 = '"ymsgr:sendIM?ciprianmp"';
	switch ($R)
	{
	case $ROOM1:
		if ($MUSIC_ROOM1)
		{
			$music = '<bgsound loop="infinite" src=';
			$music .= $MUSIC_ROOM1.'>';
		}
		if ($PHOTO_ROOM1)
		{
			$photo = '<P align="center"><A HREF=';
			$photo .= $PHOTO_ROOM1.' title="Chat with Ciprian now!" onMouseOver="window.status=\'Chat with Ciprian now!\'; return=true" TARGET=_blank> <IMG SRC="http://mail.opi.yahoo.com/online?u=ciprianmp&m=g&t=0" border="0" alt="Chat with Ciprian now!"></A></P>';
		}
		break;
	case $ROOM2:
		if ($MUSIC_ROOM2) $music = '';
		if ($PHOTO_ROOM2) $photo = '';
		break;
	case $ROOM3:
		if ($MUSIC_ROOM3) $music = '';
		if ($PHOTO_ROOM3) $photo = '';
		break;
	case $ROOM4:
		if ($MUSIC_ROOM4) $music = '';
		if ($PHOTO_ROOM4) $photo = '';
		break;
	case $ROOM5:
		if ($MUSIC_ROOM5) $music = '';
		if ($PHOTO_ROOM5) $photo = '';
		break;
	default:
		if ($MUSIC_ROOMS) $music = '';
		if ($PHOTO_ROOMS) $photo = '';
		break;
	}
if ($C_ROOM_EXT_MUSIC) echo($music);
if ($C_ROOM_EXT_PHOTO) echo($photo);
?>