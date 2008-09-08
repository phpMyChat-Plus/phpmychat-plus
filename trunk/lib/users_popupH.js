/* ***************************************************************************
**  Collapsible Rooms in users popup for IE & NN 4+ Browsers (DHTML stuff)  **
**        Based on the 'Expandable Outlines' script from WebReference       **
**                         (http://webreference.com/)                       **
*************************************************************************** */

bigOpened = new Image(13,13); bigOpened.src = 'images/open_big.gif';
bigClosed = new Image(13,13); bigClosed.src = 'images/closed_big.gif';
Opened = new Image(9,9); Opened.src = 'images/open.gif';
Closed = new Image(9,9); Closed.src = 'images/closed.gif';

// Positioned element resize bug under NN;
if (NS4) {origWidth = innerWidth; origHeight = innerHeight; };

function reDo()
{
	if (innerWidth != origWidth || innerHeight != origHeight) location.reload(true);
}

if (NS4) onresize = reDo;

// Add styles for positioned layers;
if (ver4) {
	with (document)
	{
		write('<STYLE TYPE=\"text/css\">');
		if (NS4) {
			write('.parent {position:absolute; visibility:visible}');
			write('.child {position:absolute; visibility:visible}');
			write('.regular {position:absolute; visibility:visible}')
		} else {
			write('.child {display:none}')
		};
		write('<\/STYLE>');
	}
}

var isExpanded = false;
var rooms_number = 0;
var opened_rooms_number = 0;


// Get the ID of the first collapsible room;
function getIndex(el)
{
	ind = null;
	for (i=0; i<document.layers.length; i++)
	{
		whichEl = document.layers[i];
		if (whichEl.id == el) {
			ind = i;
			break;
		};
	};
	return ind;
}

// Position layers under NN4+;
function arrange()
{
	if (firstInd != null)
	{
		nextY = document.layers[firstInd].pageY + document.layers[firstInd].document.height;
		for (i=firstInd+1; i<document.layers.length; i++)
		{
			whichEl = document.layers[i];
			if (whichEl.visibility != 'hide') {
				whichEl.pageY = nextY;
				nextY += whichEl.document.height;
			};
		};
	};
}

// Define the state of the big +/- icon
function big_icon()
{
	if (rooms_number == 0) return;
	bigImg = (NS4) ? document.images['imEx_big'] : document.images.item('imEx_big');
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

// Collapse rooms each time the web page is loaded;
function initIt()
{
	if (!ver4) return;
	var parentEl_tab = new Array();
	opened_rooms_number = 0;
	if (NS4)
	{
		for (i=0; i<document.layers.length; i++)
		{
			whichEl = document.layers[i];
			if (whichEl.id.indexOf('Parent') != -1) parentEl = whichEl;
			if (whichEl.id.indexOf('Child') != -1) {
				currentID = whichEl.id.replace(/Child/,'');
				if (ChildNb[currentID] > 10) {
					whichEl.visibility = 'hide';
				} else {
					opened_rooms_number++;
					whichEl.visibility = 'show';
					if (!parentEl_tab[parentEl.id]) {
						parentEl_tab[parentEl.id] = 1;
						parentEl.document.images['imEx'].src = Opened.src;
					};
				};
			};
		};
		arrange();
	} else {
		divColl = document.all.tags('DIV');
		for (i=0; i<divColl.length; i++)
		{
			whichEl = divColl(i);
			if (whichEl.className == 'parent') parentEl = whichEl;
			if (whichEl.className == 'child') {
				currentID = whichEl.id.replace(/Child/,'');
				if (ChildNb[currentID] > 10) {
					whichEl.style.display = 'none';
				} else {
					opened_rooms_number++;
					whichEl.style.display = 'block';
					if (!parentEl_tab[parentEl.id]) {
						parentEl_tab[parentEl.id] = 1;
						parentEl.all.tags('IMG').item('imEx').src = Opened.src;
					};
				};
			};
		};
	};
	parentEl_tab = null;
	ChildNb = null;
	big_icon();
};

// Collapse/expand a room when the user require for it;
function expandIt(el)
{
	if (!ver4) return;
	if (IE4)
	{
		whichEl = document.all(el + 'Child');
		whichIm = event.srcElement;
		if (whichEl.style.display == 'none') {
			opened_rooms_number++;
			whichEl.style.display = 'block';
			whichIm.src = Opened.src;
		} else {
			opened_rooms_number--;
			whichEl.style.display = 'none';
			whichIm.src = Closed.src;
		};
	}
	else
	{
		whichEl = document.layers[el + 'Child'];
		whichIm = document.layers[el + 'Parent'].document.images['imEx'];
		if (whichEl.visibility == 'hide') {
			opened_rooms_number++;
			whichEl.visibility = 'show';
			whichIm.src = Opened.src;
		} else {
			opened_rooms_number--;
			whichEl.visibility = 'hide';
			whichIm.src = Closed.src;
		};
		arrange();
	};
	big_icon();
};

function expandAll()
{
	if (!ver4) return;
	newSrc_big = (isExpanded) ? bigClosed.src : bigOpened.src;
	newSrc = (isExpanded) ? Closed.src : Opened.src;
	opened_rooms_number = (isExpanded) ? 0 : rooms_number;

	if (NS4)
	{
		document.images['imEx_big'].src = newSrc_big;
		if (firstInd != null) {
			if (document.layers.length) {
				for (i=firstInd; i<document.layers.length; i++)
				{
					whichEl = document.layers[i];
					if (whichEl.id.indexOf('Parent') != -1)
						whichEl.document.images['imEx'].src = newSrc;
					if (whichEl.id.indexOf('Child') != -1)
						whichEl.visibility = (isExpanded) ? 'hide' : 'show';
				};
			};
			arrange();
			if (isExpanded) scrollTo(0,document.layers[firstInd].pageY);
		};
	} else {
		divColl = document.all.tags('DIV');
		for (i=0; i<divColl.length; i++)
		{
			if (divColl(i).className == 'child')
				divColl(i).style.display = (isExpanded) ? 'none' : 'block';
		};
		document.images.item('imEx_big').src = newSrc_big;
		imColl = document.images.item('imEx');
		if (imColl) {
			for (i=0; i<imColl.length; i++)
			{
				imColl(i).src = newSrc;
			}
			if(!imColl.length) document.imEx.src = newSrc;
		};
	};
	isExpanded = !isExpanded;
}

onload = initIt;