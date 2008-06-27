/* ***************************************************************
**     Stuff for displaying connection state in "H" version     **
**************************************************************** */

// Images & misc vars
imgConnectOff = new Image(13,13); imgConnectOff.src = path2Chat + 'images/connectOff.gif';
imgConnectOn = new Image(13,13); imgConnectOn.src = path2Chat + 'images/connectOn.gif';
imgConnectErr = new Image(13,13); imgConnectErr.src = path2Chat + 'images/connectError.gif';
imgConnect = new Image(13,13);
var leaveChat = false;
var connect = 0;
var imgCon_disp = null;

// Tries to connect and to reconnect once if the first connection failed.
// Also modifies the 'connection status' icon at the exit frame.
function Connecting(numTry)
{
	if (imgCon_disp) clearTimeout(imgCon_disp);
	connect = numTry;
	if (numTry == 1 || numTry == 2)
	{
		imgConnect.src = imgConnectOn.src;
	}
	else if (numTry == 3)
	{
		imgConnect.src = imgConnectErr.src;
	};

	if (document.all)
	{
		window.frames['exit'].window.document.all['ConState'].src = imgConnect.src;
	}
	else if (document.images)
	{
		window.frames['exit'].window.document.images['ConState'].src = imgConnect.src;
	}
	else return;

	if (numTry < 3)
	{
		numTry = numTry + 1;
		imgCon_disp = setTimeout('Connecting(' + numTry + ')', 30000);
	}
	else
	{
		clearTimeout(imgCon_disp);
		connect = 0;
	};
};

// Kill the timeout defined in the 'Connecting' function to reconnect once if the first
// connection failed, and set the 'connection status' icon to 'done' in the exit frame.
function ConnectDone()
{
	connect = 0;
	if (imgCon_disp) clearTimeout(imgCon_disp);

	if (document.all)
	{
		if (window.frames['exit'].window.document.all['ConState']) window.frames['exit'].window.document.all['ConState'].src = imgConnectOff.src;
	}
	else if (document.images)
	{
		if (window.frames['exit'].window.document.images['ConState']) window.frames['exit'].window.document.images['ConState'].src = imgConnectOff.src;
	}
	else return;
};

// Used when the user click on the 'connection status' icon in the exit frame.
function reConnect()
{
	if (connect != 1 && connect != 2)
	{
		Connecting(1);
		force_refresh();
		with (window.parent.frames['input'].window.document.forms['MsgForm'])
		{
			elements['sent'].value				= '0';
			if (document.all)
				elements['sendForm'].disabled	= false;
		}
	};
};