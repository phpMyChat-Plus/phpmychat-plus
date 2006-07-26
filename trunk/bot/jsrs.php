<?php

/*
    Program E
        Copyright 2002, Paul Rydell

        This file is part of Program E.

        Program E is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    Program E is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with Program E; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

/*
        This script uses code from the JSRS.
        JSRS Javascript Remote Scripting Copyright (C) 2001 by Brent Ashley
*/

session_start();
$myuniqueid=session_id();

include "respond.php";
require("jsrs/jsrsServer.php.inc");

jsrsDispatch("replyjs, envVar");

function replyjs($str1){

        global $myuniqueid;

		$botresponse=reply($str1,$myuniqueid);

        return jsrsArrayToString(array($botresponse->response));

}

?>