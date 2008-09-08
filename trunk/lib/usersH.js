/* ******************************************************************
**     Collapsible Rooms for IE & NN 4+ Browsers (DHTML stuff)     **
**          Based on the 'Expandable Outlines' script from         **
**             WebReference (http://webreference.com/)             **
****************************************************************** */

/* Define some vars */
NS4 = (document.layers) ? 1 : 0;
IE4 = ((document.all) && (parseInt(navigator.appVersion)>=4)) ? 1 : 0;
ver4 = (NS4 || IE4) ? 1 : 0;

var usersFrame = null;
var exitFrame = null;

var isExpanded = false;
var opened_room = new Array;
var rooms_number = 0;
var opened_rooms_number = 0;
var Y = null;

bigOpened = new Image(13,13); bigOpened.src = path2Chat + 'images/open_big.gif';
bigClosed = new Image(13,13); bigClosed.src = path2Chat + 'images/closed_big.gif';
Opened = new Image(9,9); Opened.src = path2Chat + 'images/open.gif';
Closed = new Image(9,9); Closed.src = path2Chat + 'images/closed.gif';


/* Misc. functions used to alter memory of room's status (opened/closed) */
function ResetRoomTable()
{
	for (var test in opened_room)
	{
		opened_room[test] = (opened_room[test] == 1 ? "+" : "-");
	};
};

function CheckRoomState(room)
{
	if (opened_room[room])
	{
		opened_room[room] = (opened_room[room] == "+" ? 1 : -1);
		return opened_room[room];
	}
	else return 0;
};

function CleanRoom()
{
	temp = new Array();
	for (var test in opened_room)
	{
		if (opened_room[test] == 1 || opened_room[test] == -1) temp[test] = opened_room[test];
	};
	opened_room = temp;
	temp = null;
};

function ModifyRoomState(room, action)
{
	opened_room[room] = (action == "add" ? 1 : -1);
};


/* Main functions for collapsible rooms */

// Get the ID of the first collapsible room;
function getIndex(el)
{
	ind = null;
	for (i=0; i<usersFrame.document.layers.length; i++)
	{
		whichEl = usersFrame.document.layers[i];
		if (whichEl.id == el) {
			ind = i;
			break;
		};
	};
	return ind;
};

// Position layers under NN4+;
function arrange()
{
	if (usersFrame.firstInd != null)
	{
		nextY = usersFrame.document.layers[usersFrame.firstInd].pageY + usersFrame.document.layers[usersFrame.firstInd].document.height;
		for (i=usersFrame.firstInd+1; i<usersFrame.document.layers.length; i++)
		{
			whichEl = usersFrame.document.layers[i];
			if (whichEl.visibility != 'hide') {
				whichEl.pageY = nextY;
				nextY += whichEl.document.height;
			}
		}
	}
}

// Define the state of the big +/- icon
function big_icon()
{
	if (rooms_number == 0) return;
	bigImg = (NS4) ? exitFrame.document.images['imEx_big'] : exitFrame.document.images.item('imEx_big');
	if (opened_rooms_number == rooms_number)
	{
		isExpanded = true;
		bigImg.src = bigOpened.src;
	}
	else if (isExpanded)
	{
		isExpanded = false;
		bigImg.src = bigClosed.src;
	};
};

// Collapse/expand rooms (depends on rooms' status before the page reloads) each time the web page is loaded;
function initIt()
{
	if (!ver4) return;
	ResetRoomTable();
	var parentEl_tab = new Array();
	opened_rooms_number = 0;
	if (NS4)
	{
		for (i=0; i<usersFrame.document.layers.length; i++)
		{
			whichEl = usersFrame.document.layers[i];
			if (whichEl.id.indexOf('Parent') != -1) parentEl = whichEl;
			if (whichEl.id.indexOf('Child') != -1) {
				currentID = whichEl.id.substring(5);
				roomState = CheckRoomState(whichEl.id);
				if (roomState == 1 || (roomState == 0 && ChildNb[currentID] < 10)) {
					opened_rooms_number++;
					whichEl.visibility = 'show';
					if (!parentEl_tab[parentEl.id]) {
						parentEl_tab[parentEl.id] = 1;
						parentEl.document.images['imEx'].src = Opened.src;
					};
				} else {
					whichEl.visibility = 'hide';
				};
			};
		};
		arrange();
	}
	else
	{
		divColl = usersFrame.document.all.tags('DIV');
		for (i=0; i<divColl.length; i++)
		{
			whichEl = divColl(i);
			if (whichEl.className == 'parent') parentEl = whichEl;
			if (whichEl.className == 'child') {
				currentID = whichEl.id.substring(5);
				roomState = CheckRoomState(whichEl.id);
				if (roomState == 1 || (roomState == 0 && ChildNb[currentID] < 10)) {
					opened_rooms_number++;
					whichEl.style.display = 'block';
					if (!parentEl_tab[parentEl.id]) {
						parentEl_tab[parentEl.id] = 1;
						parentEl.all.tags('IMG').item('imEx').src = Opened.src;
					};
				} else {
					whichEl.style.display = 'none';
				};
			};
		};
	};
	parentEl_tab = null;
	ChildNb = null;
	CleanRoom();
	big_icon();
};

// Collapse/expand a room when the user require for it and store this status;
function expandIt(el)
{
	if (!ver4) return;
	if (IE4)
	{
		whichEl = usersFrame.document.all('Child' + el);
		whichIm = usersFrame.event.srcElement;
		if (whichEl.style.display == 'none') {
			opened_rooms_number++;
			whichEl.style.display = 'block';
			whichIm.src = Opened.src;
			ModifyRoomState(whichEl.id, 'add');
		} else {
			opened_rooms_number--;
			whichEl.style.display = 'none';
			whichIm.src = Closed.src;
			ModifyRoomState(whichEl.id, 'del');
		};
	}
	else
	{
		whichEl = usersFrame.document.layers['Child' + el];
		whichIm = usersFrame.document.layers['Parent' + el].document.images['imEx'];
		if (whichEl.visibility == 'hide') {
			opened_rooms_number++;
			whichEl.visibility = 'show';
			whichIm.src = Opened.src;
			ModifyRoomState(whichEl.id, 'add');
		} else {
			opened_rooms_number--;
			whichEl.visibility = 'hide';
			whichIm.src = Closed.src;
			ModifyRoomState(whichEl.id, 'del');
		};
		arrange();
	};
	big_icon();
	if (window.frames['input'] && window.frames['input'].window.document.forms['MsgForm'].elements['M'])
		window.frames['input'].window.document.forms['MsgForm'].elements['M'].focus();
};

// Collapse/expand all rooms when the user require for it and store the status of each of the rooms;
function expandAll()
{
	if (!ver4) return;
	newSrc_big = (isExpanded) ? bigClosed.src : bigOpened.src;
	newSrc = (isExpanded) ? Closed.src : Opened.src;
	what = (isExpanded) ? 'del' : 'add';
	opened_rooms_number = (isExpanded) ? 0 : rooms_number;

	if (NS4)
	{
		exitFrame.document.images['imEx_big'].src = newSrc_big;
		if (usersFrame.firstInd != null) {
			if (usersFrame.document.layers.length) {
				for (i=usersFrame.firstInd; i<usersFrame.document.layers.length; i++)
				{
					whichEl = usersFrame.document.layers[i];
					if (whichEl.id.indexOf('Parent') != -1
						&& typeof(whichEl.document.images['imEx']) != 'undefined')
						whichEl.document.images['imEx'].src = newSrc;
					if (whichEl.id.indexOf('Child') != -1) {
						whichEl.visibility = (isExpanded) ? 'hide' : 'show';
						ModifyRoomState(whichEl.id, what);
					};
				};
			};
			arrange();
			if (isExpanded) usersFrame.scrollTo(0,usersFrame.document.layers[usersFrame.firstInd].pageY);
		};
	}
	else
	{
		divColl = usersFrame.document.all.tags('DIV');
		for (i=0; i<divColl.length; i++)
		{
			if (divColl(i).className == 'child') {
				divColl(i).style.display = (isExpanded) ? 'none' : 'block';
				ModifyRoomState(divColl(i).id, what);
			};
		};
		exitFrame.document.images.item('imEx_big').src = newSrc_big;
		imColl = usersFrame.document.images.item('imEx');
		if (imColl)
		{
			for (i=0; i<imColl.length; i++)
			{
				imColl(i).src = newSrc;
			}
			if(!imColl.length) usersFrame.document.imEx.src = newSrc;
		};
	};
	isExpanded = !isExpanded;
	if (window.frames['input'] && window.frames['input'].window.document.forms['MsgForm'].elements['M'])
		window.frames['input'].window.document.forms['MsgForm'].elements['M'].focus();
};