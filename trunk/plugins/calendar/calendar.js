var hideCalendarTimer = new Array();

function calendarTimer(objname){
	this.objname = objname;
	this.timers = new Array();
}

function toggleCalendar(objname, auto_hide, hide_timer){
	var div_obj = getTCCalendarObject('div_'+objname);
	if(div_obj != null){
		if (div_obj.style.visibility=="hidden") {
		  div_obj.style.visibility = 'visible';
		  getTCCalendarObject(objname+'_frame').contentWindow.adjustContainer();

		  //auto hide if inactivities with calendar after open
		  if(auto_hide){
			  if(hide_timer < 3000) hide_timer = 3000; //put default 3 secs
			  prepareHide(objname, hide_timer);
		  }
		}else{
		  div_obj.style.visibility = 'hidden';
		}
	}
}

function showCalendar(objname){
	var div_obj = getTCCalendarObject('div_'+objname);
	if(div_obj != null){
		div_obj.style.visibility = 'visible';
		getTCCalendarObject(objname+'_frame').contentWindow.adjustContainer();
	}
}

function hideCalendar(objname){
	var focusing = getTCCalendarObject(objname+'_frame').contentWindow.calendarform.fcs.value;
	if(focusing == 0){
		var div_obj = getTCCalendarObject('div_'+objname);
		if(div_obj != null){
			div_obj.style.visibility = 'hidden';
		}
	}else{
		//still focus, another hide timer
		prepareHide(objname, getTCCalendarObject(objname+'_frame').contentWindow.calendarform.hdt.value);
	}
}

function prepareHide(objname, timeout){
	cancelHide(objname);

	var timer = setTimeout(function(){ hideCalendar(objname) }, timeout);

	var found = false;
	for(i=0; i<this.hideCalendarTimer.length; i++){
		if(this.hideCalendarTimer[i].objname == objname){
			found = true;
			this.hideCalendarTimer[i].timers[this.hideCalendarTimer[i].timers.length] = timer;
		}
	}

	if(!found){
		var obj = new calendarTimer(objname);
		obj.timers[obj.timers.length] = timer;

		this.hideCalendarTimer[this.hideCalendarTimer.length] = obj;
	}
}

function cancelHide(objname){
	for(i=0; i<this.hideCalendarTimer.length; i++){
		if(this.hideCalendarTimer[i].objname == objname){
			var timers = this.hideCalendarTimer[i].timers;
			for(n=0; n<timers.length; n++){
				clearTimeout(timers[n]);
			}
			this.hideCalendarTimer[i].timers = new Array();
			break;
		}
	}
}

function setValue(objname, d, submt){
	//compare if value is changed
	var changed = (getTCCalendar(objname) != d) ? true : false;

	var date_array = getDateSplit(d, "-");
	if(changed && isDateAllow(objname, date_array[2], date_array[1], date_array[0]) && checkSpecifyDate(objname, date_array[2], date_array[1], date_array[0])){
		updateValue(objname, d);

		var dp = getTCCalendar(objname+"_dp");
		if(dp) hideCalendar(objname);

		checkPairValue(objname, d);

		//calling calendar_onchanged script
		if(getTCCalendar(objname+"_och") != "") calendar_onchange(objname);

		if(typeof(submt) == "undefined") submt = true;

		if(submt){
			var date_array = getTCCalendar(objname).split("-");

			tc_submitDate(objname, date_array[2], date_array[1], date_array[0]);
		}
	}
}

function updateValue(objname, d){
	setTCCalendar(objname, d);

	var dp = getTCCalendar(objname+"_dp");
	if(dp == true){
		var date_array = d.split("-");

		var inp = getTCCalendar(objname+"_inp");
		if(inp == true){
			setTCCalendar(objname+"_day", padString(date_array[2].toString(), 2, "0"));
			setTCCalendar(objname+"_month", padString(date_array[1].toString(), 2, "0"));
			setTCCalendar(objname+"_year", padString(date_array[0].toString(), 4, "0"));

			//check for valid day
			tc_updateDay(objname, date_array[0], date_array[1], date_array[2]);
		}else{
			var dateTxt = l_sel_date;
			if(date_array[0] > 0 && date_array[1] > 0 && date_array[2] > 0){
				//update date pane
				var myDate = new Date();
				myDate.setFullYear(date_array[0],(date_array[1]-1),date_array[2]);
				var dateFormat = getTCCalendar(objname+"_fmt");

				dateTxt = myDate.format(dateFormat);
			}

			getTCCalendarObject("divCalendar_"+objname+"_lbl").style.whiteSpace="pre"; //text no wrap on white space
			//Digitizer
			getTCCalendarObject("divCalendar_"+objname+"_lbl").innerHTML = convertDigitIn(objname, dateTxt);

			var lobj = getTCCalendarObject("divCalendar_"+objname+"_lbl");
			if(lobj != null){
				lobj.style.whiteSpace="pre"; //text no wrap on white space
				//Digitizer
				lobj.innerHTML = convertDigitIn(objname, dateTxt);
				//update day name
				if(d != "0000-00-00"){
					lobj.setAttribute("title", new Date(d).format('l'));
				}else lobj.setAttribute("title", "");
			}
		}
	}
}

function tc_submitDate(objname, dvalue, mvalue, yvalue){
	var obj = getTCCalendarObject(objname+'_frame');
	var params = new Array();

	addToArray(params, "objname="+objname.toString());
	addToArray(params, "selected_day="+dvalue);
	addToArray(params, "selected_month="+mvalue);
	addToArray(params, "selected_year="+yvalue);

	var year_start = getTCCalendar(objname+'_year_start');
	if(year_start != "") addToArray(params, "year_start="+year_start);

	var year_end = getTCCalendar(objname+'_year_end');
	if(year_end != "") addToArray(params, "year_end="+year_end);

	var dp = getTCCalendar(objname+'_dp');
	if(dp != "") addToArray(params, "dp="+dp);

	var da1 = getTCCalendar(objname+'_da1');
	if(da1 != "") addToArray(params, "da1="+da1);

	var da2 = getTCCalendar(objname+'_da2');
	if(da2 != "") addToArray(params, "da2="+da2);

	var sna = getTCCalendar(objname+'_sna');
	if(sna != "") addToArray(params, "sna="+sna);

	var aut = getTCCalendar(objname+'_aut');
	if(aut != "") addToArray(params, "aut="+aut);

	var frm = getTCCalendar(objname+'_frm');
	if(frm != "") addToArray(params, "frm="+frm);

	var tar = getTCCalendar(objname+'_tar');
	if(tar != "") addToArray(params, "tar="+tar);

	var inp = getTCCalendar(objname+'_inp');
	if(inp != "") addToArray(params, "inp="+inp);

	var fmt = getTCCalendar(objname+'_fmt');
	if(fmt != "") addToArray(params, "fmt="+fmt);

	var dis = getTCCalendar(objname+'_dis');
	if(dis != "") addToArray(params, "dis="+dis);

	var pr1 = getTCCalendar(objname+'_pr1');
	if(pr1 != "") addToArray(params, "pr1="+pr1);

	var pr2 = getTCCalendar(objname+'_pr2');
	if(pr2 != "") addToArray(params, "pr2="+pr2);

	var prv = getTCCalendar(objname+'_prv');
	if(prv != "") addToArray(params, "prv="+prv);

	var path = getTCCalendar(objname+'_pth');
	if(path != "") addToArray(params, "path="+path);

	var spd = getTCCalendar(objname+'_spd');
	if(spd != "") addToArray(params, "spd="+spd);

	var spt = getTCCalendar(objname+'_spt');
	if(spt != "") addToArray(params, "spt="+spt);

	var och = getTCCalendar(objname+'_och');
	if(och != "") addToArray(params, "och="+och);

	var str = getTCCalendar(objname+'_str');
	if(str != "") addToArray(params, "str="+str);

	var rtl = getTCCalendar(objname+'_rtl');
	if(rtl != "") addToArray(params, "rtl="+rtl);

	var wks = getTCCalendar(objname+'_wks');
	if(wks != "") addToArray(params, "wks="+wks);

	var int = getTCCalendar(objname+'_int');
	if(int != "") addToArray(params, "int="+int);

	var hid = getTCCalendar(objname+'_hid');
	if(hid != "") addToArray(params, "hid="+hid);

	var hdt = getTCCalendar(objname+'_hdt');
	if(hdt != "") addToArray(params, "hdt="+hdt);

	var tmz = getTCCalendar(objname+'_tmz');
	if(tmz != "") addToArray(params, "tmz="+tmz);
	
	var thm = getTCCalendar(objname+'_thm');
	if(thm != "") addToArray(params, "thm="+thm);

	var hl = getTCCalendar(objname+'_hl');
	if(hl != "") addToArray(params, "hl="+hl);

	//Digitizer
	var dig = getTCCalendar(objname+'_dig');
	if(dig != "") addToArray(params, "dig="+dig);

	var param_str = params.join("&");

	obj.src = path+"calendar_form.php?"+param_str;

	obj.contentWindow.submitNow(dvalue, mvalue, yvalue);
}

function tc_setDMY(objname, dvalue, mvalue, yvalue){
	setTCCalendar(objname, yvalue + "-" + mvalue + "-" + dvalue);
	tc_submitDate(objname, dvalue, mvalue, yvalue);
}

function tc_setDay(objname, dvalue){
	var obj = getTCCalendarObject(objname);
	var date_array = obj.value.split("-");
	var d = obj.value;

	//check if date is not allow to select
	if(!isDateAllow(objname, dvalue, date_array[1], date_array[0]) || !checkSpecifyDate(objname, dvalue, date_array[1], date_array[0])){
		//alert(l_not_allowed);
		restoreDate(objname);
	}else{
		if(isDate(dvalue, date_array[1], date_array[0])){
			tc_setDMY(objname, dvalue, date_array[1], date_array[0]);
		}else getTCCalendarObject(objname+"_day").selectedIndex = date_array[2];
	}

	checkPairValue(objname, obj.value);

	//compare if value is changed
	var changed = (getTCCalendar(objname) != d) ? true : false;

	//calling calendar_onchanged script
	if(getTCCalendar(objname+"_och") != "" && changed) calendar_onchange(objname);
}

function tc_setMonth(objname, mvalue){
	var obj = getTCCalendarObject(objname);
	var date_array = obj.value.split("-");
	var d = obj.value;

	//check if date is not allow to select
	if(!isDateAllow(objname, date_array[2], mvalue, date_array[0]) || !checkSpecifyDate(objname, date_array[2], mvalue, date_array[0])){
		//alert(l_not_allowed);
		restoreDate(objname);
	}else{
		if(getTCCalendar(objname+'_dp') && getTCCalendar(objname+'_inp')){
			//update 'day' combo box
			date_array[2] = tc_updateDay(objname, date_array[0], mvalue, date_array[2]);
		}

		if(isDate(date_array[2], mvalue, date_array[0])){
			tc_setDMY(objname, date_array[2], mvalue, date_array[0]);
		}else getTCCalendarObject(objname+"_month").selectedIndex = date_array[1];
	}

	checkPairValue(objname, obj.value);

	//compare if value is changed
	var changed = (getTCCalendar(objname) != d) ? true : false;

	//calling calendar_onchanged script
	if(getTCCalendar(objname+"_och") != "" && changed) calendar_onchange(objname);
}

function tc_setYear(objname, yvalue){
	var obj = getTCCalendarObject(objname);
	var date_array = obj.value.split("-");
	var d = obj.value;

	//check if date is not allow to select
	if(!isDateAllow(objname, date_array[2], date_array[1], yvalue) || !checkSpecifyDate(objname, date_array[2], date_array[1], yvalue)){
		//alert(l_not_allowed);
		restoreDate(objname);
	}else{
		if(getTCCalendar(objname+'_dp') && getTCCalendar(objname+'_inp')){
			//update 'day' combo box
			date_array[2] = tc_updateDay(objname, yvalue, date_array[1], date_array[2]);
		}

		if(isDate(date_array[2], date_array[1], yvalue)){
			tc_setDMY(objname, date_array[2], date_array[1], yvalue);
		}else setTCCalendar(objname+"_year", date_array[0]);
	}

	checkPairValue(objname, obj.value);

	//compare if value is changed
	var changed = (getTCCalendar(objname) != d) ? true : false;

	//calling calendar_onchanged script
	if(getTCCalendar(objname+"_och") != "" && changed) calendar_onchange(objname);
}

function yearEnter(e){
	var characterCode;

	if(e && e.which){ //if which property of event object is supported (NN4)
		e = e;
		characterCode = e.which; //character code is contained in NN4's which property
	}else{
		e = event;
		characterCode = e.keyCode; //character code is contained in IE's keyCode property
	}

	if(characterCode == 13){
		//if Enter is pressed, do nothing
		return true;
	}else return false;
}

function isInteger(s){
	var i;
    for (i = 0; i < s.length; i++){
        // Check that current character is number.
        var c = s.charAt(i);
        if (((c < "0") || (c > "9"))) return false;
    }
    // All characters are numbers.
    return true;
}

function stripCharsInBag(s, bag){
	var i;
    var returnString = "";
    // Search through string's characters one by one.
    // If character is not in bag, append to returnString.
    for (i = 0; i < s.length; i++){
        var c = s.charAt(i);
        if (bag.indexOf(c) == -1) returnString += c;
    }
    return returnString;
}

function is_leapYear(year){
	return (year % 4 == 0) ?
		!(year % 100 == 0 && year % 400 != 0)	: false;
}

function daysInMonth(month, year){
	var days = new Array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	return (month == 2 && year > 0 && is_leapYear(year)) ? 29 : days[month-1];
}

function isDate(strDay, strMonth, strYear){
	return true;
}

function isDateAllow(objname, strDay, strMonth, strYear){
	var da1 = getTCCalendar(objname+"_da1");
	var da2 = getTCCalendar(objname+"_da2");

	strDay = parseInt(parseFloat(strDay));
	strMonth = parseInt(parseFloat(strMonth));
	strYear = parseInt(parseFloat(strYear));

	if(strDay>0 && strMonth>0 && strYear>0){
		var this_date = new Date(strYear, strMonth-1, strDay);

		if(da1 != "" && da2 != ""){
			da1_arr = getDateSplit(da1, "-");
			da1_date = new Date(da1_arr[0], (da1_arr[1]-1), da1_arr[2]);
			da2_arr = getDateSplit(da2, "-");
			da2_date = new Date(da2_arr[0], (da2_arr[1]-1), da2_arr[2]);
			var dateFormat = getTCCalendar(objname+"_fmt");
			var da1Str = da1_date.format(dateFormat);
			var da2Str = da2_date.format(dateFormat);

			if(da1_date<=this_date && da2_date>=this_date){
				return true;
			}else{
				alert(sprintf(l_date_between, da1Str, da2Str));
				return false;
			}
		}else if(da1 != ""){
			da1_arr = getDateSplit(da1, "-");
			da1_date = new Date(da1_arr[0], (da1_arr[1]-1), da1_arr[2]);
			if(da1_date<=this_date){
				return true;
			}else{
				alert(sprintf(l_date_after, da1Str));
				return false;
			}
		}else if(da2 != ""){
			da2_arr = getDateSplit(da2, "-");
			da2_date = new Date(da2_arr[0], (da2_arr[1]-1), da2_arr[2]);
			if(da2_date>=this_date){
				return true;
			}else{
				alert(sprintf(l_date_before, da2Str));
				return false;
			}
		}
	}

	return true; //always return true if date not completely set
}

function restoreDate(objname){
	//get the store value
	var storeValue = getTCCalendar(objname);
	var storeArr = storeValue.split('-', 3);

	//set them
	setTCCalendar(objname+'_day', storeArr[2]);
	setTCCalendar(objname+'_month', storeArr[1]);
	setTCCalendar(objname+'_year', storeArr[0]);
}

//----------------------------------------------------------------
// javascript date format function thanks to Jacob Wright
// http://jacwright.com/projects/javascript/date_format
// updated 2/8/2013 with an addition from Haravikk
// MIT Licensed!
// some modifications to match the calendar script
//----------------------------------------------------------------

// Simulates PHP's date function
Date.prototype.format = function(format) {
    var returnStr = '';
    var replace = Date.replaceChars;

    for (var i = 0; i < format.length; i++) {
		var curChar = format.charAt(i);
		if (i - 1 >= 0 && format.charAt(i - 1) == "\\") {
            returnStr += curChar;
        }
        else if (replace[curChar]) {
            returnStr += replace[curChar].call(this);
        } else if (curChar != "\\"){
            returnStr += curChar;
        }
    }
    return returnStr;
};

Date.replaceChars = {
	shortMonths: [s_jan, s_feb, s_mar, s_apr, s_may, s_jun, s_jul, s_aug, s_sep, s_oct, s_nov, s_dec],
	longMonths: (l_genitive == 1 ? [l_januaryg, l_februaryg, l_marchg, l_aprilg, l_mayg, l_juneg, l_julyg, l_augustg, l_septemberg, l_octoberg, l_novemberg, l_decemberg] : [l_january, l_february, l_march, l_april, l_may, l_june, l_july, l_august, l_september, l_october, l_november, l_december]),
	shortDays: [s_sun, s_mon, s_tue, s_wed, s_thu, s_fri, s_sat],
	longDays: [l_sunday, l_monday, l_tuesday, l_wednesday, l_thursday, l_friday, l_saturday],

    // Day
    d: function() { return (this.getDate() < 10 ? '0' : '') + this.getDate(); },
    D: function() { return Date.replaceChars.shortDays[this.getDay()]; },
    j: function() { return this.getDate(); },
    l: function() { return Date.replaceChars.longDays[this.getDay()]; },
    N: function() { return this.getDay() + 1; },
    S: function() { return (this.getDate() % 10 == 1 && this.getDate() != 11 ? 'st' : (this.getDate() % 10 == 2 && this.getDate() != 12 ? 'nd' : (this.getDate() % 10 == 3 && this.getDate() != 13 ? 'rd' : 'th'))); },
    w: function() { return this.getDay(); },
    z: function() { var d = new Date(this.getFullYear(),0,1); return Math.ceil((this - d) / 86400000); }, // Fixed now
    // Week
    W: function() { var d = new Date(this.getFullYear(), 0, 1); return Math.ceil((((this - d) / 86400000) + d.getDay() + 1) / 7); }, // Fixed now
    // Month
    F: function() { return Date.replaceChars.longMonths[this.getMonth()]; },
    m: function() { return (this.getMonth() < 9 ? '0' : '') + (this.getMonth() + 1); },
    M: function() { return Date.replaceChars.shortMonths[this.getMonth()]; },
    n: function() { return this.getMonth() + 1; },
    t: function() { var d = new Date(); return new Date(d.getFullYear(), d.getMonth(), 0).getDate() }, // Fixed now, gets #days of date
    // Year
    L: function() { var year = this.getFullYear(); return (year % 400 == 0 || (year % 100 != 0 && year % 4 == 0)); },   // Fixed now
    o: function() { var d  = new Date(this.valueOf());  d.setDate(d.getDate() - ((this.getDay() + 6) % 7) + 3); return d.getFullYear();}, //Fixed now
    Y: function() { return this.getFullYear(); },
    y: function() { return ('' + this.getFullYear()).substr(2); },
    // Time
    a: function() { return this.getHours() < 12 ? 'am' : 'pm'; },
    A: function() { return this.getHours() < 12 ? 'AM' : 'PM'; },
    B: function() { return Math.floor((((this.getUTCHours() + 1) % 24) + this.getUTCMinutes() / 60 + this.getUTCSeconds() / 3600) * 1000 / 24); }, // Fixed now
    g: function() { return this.getHours() % 12 || 12; },
    G: function() { return this.getHours(); },
    h: function() { return ((this.getHours() % 12 || 12) < 10 ? '0' : '') + (this.getHours() % 12 || 12); },
    H: function() { return (this.getHours() < 10 ? '0' : '') + this.getHours(); },
    i: function() { return (this.getMinutes() < 10 ? '0' : '') + this.getMinutes(); },
    s: function() { return (this.getSeconds() < 10 ? '0' : '') + this.getSeconds(); },
    u: function() { var m = this.getMilliseconds(); return (m < 10 ? '00' : (m < 100 ? '0' : '')) + m; },
    // Timezone
    e: function() { return "Not Yet Supported"; },
    I: function() {
        var DST = null;
            for (var i = 0; i < 12; ++i) {
				var d = new Date(this.getFullYear(), i, 1);
				var offset = d.getTimezoneOffset();

				if (DST === null) DST = offset;
				else if (offset < DST) { DST = offset; break; }
				else if (offset > DST) break;
            }
            return (this.getTimezoneOffset() == DST) | 0;
        },
    O: function() { return (-this.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(this.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(this.getTimezoneOffset() / 60)) + '00'; },
    P: function() { return (-this.getTimezoneOffset() < 0 ? '-' : '+') + (Math.abs(this.getTimezoneOffset() / 60) < 10 ? '0' : '') + (Math.abs(this.getTimezoneOffset() / 60)) + ':00'; }, // Fixed now
    T: function() { var m = this.getMonth(); this.setMonth(0); var result = this.toTimeString().replace(/^.+ \(?([^\)]+)\)?$/, '$1'); this.setMonth(m); return result;},
    Z: function() { return -this.getTimezoneOffset() * 60; },
    // Full Date/Time
    c: function() { return this.format("Y-m-d\\TH:i:sP"); }, // Fixed now
    r: function() { return this.toString(); },
    U: function() { return this.getTime() / 1000; }
};

function padString(stringToPad, padLength, padString) {
	if (stringToPad.length < padLength) {
		while (stringToPad.length < padLength) {
			stringToPad = padString + stringToPad;
		}
	}
	return stringToPad;
}

//Digitizer
function convertDigitIn(objname, enDigit){
	var digIn = getTCCalendar(objname+"_dig");

	if(digIn == 1){
		var newValue = "";

		for (var i=0; i<enDigit.length; i++){
			var ch = enDigit.charCodeAt(i);

			if (ch>=48 && ch<=57){
				var newChar = ch+l_utf_digit;
				newValue = newValue+String.fromCharCode(newChar);
			}
		else newValue = newValue+String.fromCharCode(ch);
		}
		return newValue;
	}
	else return enDigit;
}

//Digitizer frame
function toggleDigitsFrame(objname){
	var s_digIn = getTCCalendar(objname+"_dig");
	var digIn = (s_digIn == 1) ? 0 : 1;

	var f = getTCCalendarObject(objname+'_frame');

	f.contentWindow.calendarform.dig.value = digIn;
	f.contentWindow.loading();
	f.contentWindow.calendarform.submit();

	setTCCalendar(objname+"_dig", digIn);

	//toggle dropdown if not in datepicker mode
	if(getTCCalendar(objname+'_inp')){
		if(getTCCalendarObject(objname+'_day') != null){
			var obj = getTCCalendarObject(objname+'_day');
			for (var i=0; i<obj.length; i++){
				//retrieve option value
				var val = obj.options[i].value;
				if(val != "00"){
					var obj_txt = convertDigitIn(objname, val);
					obj.options[i].text = obj_txt;
				}
			}
		}
		if(getTCCalendarObject(objname+'_year') != null){
			var obj = getTCCalendarObject(objname+'_year');
			for (var i=0; i<obj.length; i++){
				//retrieve option value
				var val = obj.options[i].value;
				if(val != "0000"){
					var obj_txt = convertDigitIn(objname, val);
					obj.options[i].text = obj_txt;
				}
			}
		}
	}

	//toggle digit icon
	if(getTCCalendarObject(objname+'_digicon') != null){
		var obj = getTCCalendarObject(objname+'_digicon');
		obj.src = getTCCalendarObject(objname+'_pth').value+"images/digit_"+((digIn == 1) ? "ar" : "hi")+".gif";
		obj.alt = (digIn == 1) ? l_arabic : l_indic;
		obj.title = (digIn == 1) ? l_arabic : l_indic;
	}

	var dp = getTCCalendar(objname);
	updateValue(objname, dp);
}

function tc_updateDay(objname, yearNum, monthNum, daySelected){
	var totalDays = (monthNum > 0 && yearNum > 0) ? daysInMonth(monthNum, yearNum) : ((monthNum > 0) ? daysInMonth(monthNum, 2008) : 31);

	var dayObj = getTCCalendarObject(objname+"_day");
	if(dayObj.options[0].value == 0 || dayObj.options[0].value == "")
		dayObj.length = 1;
	else dayObj.length = 0;

	for(d=1; d<=totalDays; d++){
		var newOption = document.createElement("OPTION");

		newOption.text = d;
		newOption.value = d;
		if(l_use_ymd_drop == 1) newOption.text+=l_day;

		//Digitizer
		dayObj.options[d] = new Option(convertDigitIn(objname, newOption.text), padString(newOption.value, 2, "0"));
	}

	if(daySelected > totalDays)
		dayObj.value = padString(totalDays, 2, "0");
	else dayObj.value = padString(daySelected, 2, "0");

	checkSpecifyDateDisabled(objname, daySelected, monthNum, yearNum);

	return dayObj.value;
}

function checkPairValue(objname, d){
	var dp1 = getTCCalendar(objname+"_pr1");
	var dp2 = getTCCalendar(objname+"_pr2");

	var this_value = getTCCalendar(objname);

	var this_dates = getDateSplit(this_value, "-");
	var this_time = new Date(this_dates[0], this_dates[1]-1, this_dates[2]).getTime()/1000;

	//implementing dp2
	if(dp1 != "" && getTCCalendarObject(dp1) != null){ //imply to date_pair1
		//set date pair value to date selected
		setTCCalendar(dp1+"_prv", d);

		var dp1_value = getTCCalendar(dp1);
		var dp1_dates = getDateSplit(dp1_value, "-");
		var dp1_time = new Date(dp1_dates[0], dp1_dates[1]-1, dp1_dates[2]).getTime()/1000;

		if(this_time < dp1_time || this_value == "0000-00-00"){
			//set self date pair value to null
			setTCCalendar(objname+"_prv", "");

			tc_submitDate(dp1, "00", "00", "0000");
		}else{
			tc_submitDate(dp1, dp1_dates[2], dp1_dates[1], dp1_dates[0]);
		}
	}

	//implementing dp1
	if(dp2 != "" && getTCCalendarObject(dp2) != null){ //imply to date_pair2
		//set date pair value to date selected
		setTCCalendar(dp2+"_prv", d);

		var dp2_value = getTCCalendar(dp2);
		var dp2_dates = getDateSplit(dp2_value, "-");
		var dp2_time = new Date(dp2_dates[0], dp2_dates[1]-1, dp2_dates[2]).getTime()/1000;

		if(this_time > dp2_time || this_value == "0000-00-00"){
			//set self date pair value to null
			setTCCalendar(objname+"_prv", "");

			tc_submitDate(dp2, "00", "00", "0000");
		}else{
			tc_submitDate(dp2, dp2_dates[2], dp2_dates[1], dp2_dates[0]);
		}
	}
}

function checkSpecifyDateDisabled(objname, strDay, strMonth, strYear){
	var dd = getTCCalendarObject(objname+"_day");
	var mm = getTCCalendarObject(objname+"_month");
	var yy = getTCCalendarObject(objname+"_year");
	var disyear = false;

	for (i=0; i<yy.options.length; i++){
		if (yy.options[i].value == "0000"){
		}else{
			var atty = document.createAttribute("class");
			atty.value = "drop_year";
			yy.options[i].setAttributeNode(atty);
		}
	}

	if(parseInt(parseFloat(strYear)) > 0 || (parseInt(parseFloat(strYear)) > 0 && parseInt(parseFloat(strMonth)) > 0)){
		var spd = urldecode(getTCCalendar(objname+"_spd"));
		var spt = getTCCalendar(objname+"_spt");
		var dis = getTCCalendar(objname+"_dis");
		var da1 = getTCCalendar(objname+"_da1");
		var da2 = getTCCalendar(objname+"_da2");
		var sp_dates;
		var Day, Month, Year;
		var found = false;
		var dismonth = false;
		var disday = false;
		var class_drop;

		if(typeof(JSON) != "undefined"){
			sp_dates = JSON.parse(spd);
		}else{
			sp_dates = myJSONParse(spd);
		}

		if(da1 != "" && da2 != ""){
			var dp1_dates = getDateSplit(da1, "-");
			var da1_date = new Date(dp1_dates[0], dp1_dates[1]-1, dp1_dates[2]);
			var mo1 = da1_date.getMonth()+1;
			var dp2_dates = getDateSplit(da2, "-");
			var da2_date = new Date(dp2_dates[0], dp2_dates[1]-1, dp2_dates[2]) ;
			var mo2 = da2_date.getMonth()+1;
		}else if(da1 != ""){
			var dp1_dates = getDateSplit(da1, "-");
			var da1_date = new Date(dp1_dates[0], dp1_dates[1]-1, dp1_dates[2]) ;
			var mo1 = da1_date.getMonth()+1;
		}else if(da2 != ""){
			var dp2_dates = getDateSplit(da2, "-");
			var da2_date = new Date(dp2_dates[0], dp2_dates[1]-1, dp2_dates[2]) ;
			var mo2 = da2_date.getMonth()+1;
		}

		if(parseInt(parseFloat(strYear)) > 0 && parseInt(parseFloat(strMonth)) > 0){
			for (var i=1; i<dd.options.length; i++){
				Day = padString(i.toString(), 2, "0");
				da_date = new Date(strYear, strMonth-1, Day);

				if(da1 != "" && da2 != ""){
					if(da1_date<=da_date && da2_date>=da_date){
					}else{
						found = true;
					}
				}else if(da1 != ""){
					if(da1_date<=da_date){
					}else{
						found = true;
					}
				}else if(da2 != ""){
					if(da2_date>=da_date){
					}else{
						found = true;
					}
				}

				if(!found){
					for (var key in sp_dates[2]) {
					  if (sp_dates[2].hasOwnProperty(key)) {
						var this_date_arr = getDateSplit(sp_dates[2][key], "-");
						var this_date = new Date(this_date_arr[0], this_date_arr[1]-1, this_date_arr[2]);
						if(this_date.getDate() == parseInt(parseFloat(Day)) && (this_date.getMonth()+1) == parseInt(parseFloat(strMonth))){
							found = true;
							break;
						}
					  }
					}
				}

				if(!found){
					for (var key in sp_dates[1]) {
					  if (sp_dates[1].hasOwnProperty(key)) {
						var this_date_arr = getDateSplit(sp_dates[1][key], "-");
						var this_date = new Date(this_date_arr[0], this_date_arr[1]-1, this_date_arr[2]);
						if(this_date.getDate() == parseInt(parseFloat(Day))){
							found = true;
							break;
						}
					  }
					}
				}

				if(!found){
					var choose_date = new Date(strYear, strMonth-1, Day);
					var choose_time = choose_date.getTime()/1000;

					for (var key in sp_dates[0]) {
						if (sp_dates[0].hasOwnProperty(key)) {
							if(choose_time == sp_dates[0][key]){
								found = true;
								break;
							}
						}
					}
				}

				switch(spt){
					case "0":
					default:
						//date is disabled
						if(found){
							disday = true;
							class_drop = "drop_dis";
						}else{
							disday = false;
							class_drop = "drop_wday";
						}
						break;
					case "1":
						//other dates are disabled
						if(!found){
							disday = true;
							class_drop = "drop_dis";
						}else{
							disday = false;
							class_drop = "drop_wday";
						}
						break;
				}

				//check disable day sun - sat
				if(dis != ""){
					var dis_arr = dis.split(",");
					var choose_date = new Date(strYear, strMonth-1, Day);
					var chk_num = choose_date.getDay();
					for(var j=0; j<dis_arr.length; j++){
						switch(dis_arr[j]){
							case "sun":
								if(chk_num==0){
									disday = true;
								}
								break;
							case "mon":
								if(chk_num==1){
									disday = true;
								}
								break;
							case "tue":
								if(chk_num==2){
									disday = true;
									class_drop = "drop_dis";
								}
								break;
							case "wed":
								if(chk_num==3){
									disday = true;
									class_drop = "drop_dis";
								}
								break;
							case "thu":
								if(chk_num==4){
									disday = true;
									class_drop = "drop_dis";
								}
								break;
							case "fri":
								if(chk_num==5){
									disday = true;
									class_drop = "drop_dis";
								}
								break;
							case "sat":
								if(chk_num==6){
									disday = true;
								}
								break;
						}
					}
				}

				if(da_date.getDay() == 0){
					class_drop = "drop_sun";
				}else if(da_date.getDay() == 6){
					class_drop = "drop_sat";
				}


				if(disday){
					dd.options[i].disabled = "disabled";
					disday = false;
				}else{
					dd.options[i].disabled = "";
				}
				found = false;
				var att = document.createAttribute("class");
				att.value = class_drop;
				dd.options[i].setAttributeNode(att);
			}
		}
	}

	for (var k=1; k<mm.options.length; k++){
		Month = padString(k.toString(), 2, "0");

		if(parseInt(parseFloat(strYear)) > 0){			
			mo_date = new Date(strYear, Month-1, "01");

			if(da1 != "" && da2 != ""){
				if(da1_date<=mo_date && da2_date>=mo_date){
				}else if((da1_date>mo_date && mo1 == parseInt(parseFloat(Month))) || (da2_date<mo_date && mo2 == parseInt(parseFloat(Month)))){
				}else{
					dismonth = true;
				}
			}else if(da1 != ""){
				if(da1_date<=mo_date){
				}else if(da1_date>mo_date && mo1 == parseInt(parseFloat(Month))){
				}else{
					dismonth = true;
				}
			}else if(da2 != ""){
				if(da2_date>=mo_date){
				}else if(da2_date<mo_date && mo2 == parseInt(parseFloat(Month))){
				}else{
					dismonth = true;
				}
			}

			if(dismonth){
				mm.options[k].disabled = "disabled";
				class_drop = "drop_dis";
				dismonth = false;
			}
			else{
				mm.options[k].disabled = "";
				class_drop = "drop_mnth";
			}
		}else{
			mm.options[k].disabled = "";
			class_drop = "drop_mnth";
		}
		var attm = document.createAttribute("class");
		attm.value = class_drop;
		mm.options[k].setAttributeNode(attm);
	}

	//Set/Reset style for select objects
	if (dd.value == "00"){
		dd.style.backgroundColor="white";
		dd.style.color="black";
	}else{
		var ddStyle = getComputedStyle(dd.options[dd.selectedIndex], null)
		dd.style.backgroundColor=ddStyle.backgroundColor;
		dd.style.color=ddStyle.color;
		dd.options[0].style.backgroundColor="white";
		dd.options[0].style.color="black";
	}
	if (mm.value == "00"){
		dd.style.backgroundColor="white";
		dd.style.color="black";
		mm.style.backgroundColor="white";
		mm.style.color="black";
	}else{
		var mmComputedStyle = getComputedStyle(mm.options[mm.selectedIndex], null)
		mm.style.backgroundColor=mmComputedStyle.backgroundColor;
		mm.options[0].style.backgroundColor="white";
		mm.options[0].style.color="black";
	}
	if (yy.value == "0000"){
		dd.style.backgroundColor="white";
		dd.style.color="black";
		mm.style.backgroundColor="white";
		mm.style.color="black";
		yy.style.backgroundColor="white";
		yy.style.color="black";
	}else{
		var yyComputedStyle = getComputedStyle(yy.options[yy.selectedIndex], null)
		yy.style.backgroundColor=yyComputedStyle.backgroundColor;
		yy.options[0].style.backgroundColor="white";
		yy.options[0].style.color="black";
	}
}

function checkSpecifyDate(objname, strDay, strMonth, strYear){
	if(parseInt(parseFloat(strDay)) > 0 && parseInt(parseFloat(strMonth)) > 0 && parseInt(parseFloat(strYear)) > 0){
		var spd = urldecode(getTCCalendar(objname+"_spd"));
		var spt = getTCCalendar(objname+"_spt");
		var dis = getTCCalendar(objname+"_dis");
		var da1 = getTCCalendar(objname+"_da1");
		var da2 = getTCCalendar(objname+"_da2");
		var da_date = new Date(strYear, strMonth-1, strDay);

		var sp_dates;

		if(typeof(JSON) != "undefined"){
			sp_dates = JSON.parse(spd);
		}else{
			sp_dates = myJSONParse(spd);
		}

		var found = false;

		if(da1 != "" && da2 != ""){
			var dp1_dates = getDateSplit(da1, "-");
			var da1_date = new Date(dp1_dates[0], dp1_dates[1]-1, dp1_dates[2]) ;
			var dp2_dates = getDateSplit(da2, "-");
			var da2_date = new Date(dp2_dates[0], dp2_dates[1]-1, dp2_dates[2]) ;
			if(da1_date<=da_date && da2_date>=da_date){
			}else{
				found = true;
			}
		}else if(da1 != ""){
			var dp1_dates = getDateSplit(da1, "-");
			var da1_date = new Date(dp1_dates[0], dp1_dates[1]-1, dp1_dates[2]) ;
			if(da1_date<=da_date){
			}else{
				found = true;
			}
		}else if(da2 != ""){
			var dp2_dates = getDateSplit(da2, "-");
			var da2_date = new Date(dp2_dates[0], dp2_dates[1]-1, dp2_dates[2]) ;
			if(da2_date>=da_date){
			}else{
				found = true;
			}
		}

		if(!found){
			for (var key in sp_dates[2]) {
				if (sp_dates[2].hasOwnProperty(key)) {
					var this_date_arr = getDateSplit(sp_dates[2][key], "-");
					var this_date = new Date(this_date_arr[0], this_date_arr[1]-1, this_date_arr[2]);
					if(this_date.getDate() == parseInt(parseFloat(strDay)) && (this_date.getMonth()+1) == parseInt(parseFloat(strMonth))){
						found = true;
						break;
					}
				}
			}
		}

		if(!found){
			for (var key in sp_dates[1]) {
			  if (sp_dates[1].hasOwnProperty(key)) {
				var this_date_arr = getDateSplit(sp_dates[1][key], "-");
				var this_date = new Date(this_date_arr[0], this_date_arr[1]-1, this_date_arr[2]);
				if(this_date.getDate() == parseInt(parseFloat(strDay))){
					found = true;
					break;
				}
			  }
			}
		}

		if(!found){
			var choose_date = new Date(strYear, strMonth-1, strDay);
			var choose_time = choose_date.getTime()/1000;

			for (var key in sp_dates[0]) {
				if (sp_dates[0].hasOwnProperty(key)) {
					if(choose_time == sp_dates[0][key]){
						found = true;
						break;
					}
				}
			}
		}

		switch(spt){
			case 0:
			default:
				//date is disabled
				if(found){
					alert(l_not_allowed); //alert(msg_disabled); var msg_disabled = "You cannot choose this date. Date is disabled";
					return false;
				}else{
					//check disable day sun - sat
					if(dis != ""){
						var dis_arr = dis.split(",");
						var choose_date = new Date(strYear, strMonth-1, strDay);
						var chk_num = choose_date.getDay();
						for(i=0; i<dis_arr.length; i++){
							switch(dis_arr[i]){
								case "sun":
									if(chk_num==0){
										alert(l_not_allowed);
										return false;
									}
									break;
								case "mon":
									if(chk_num==1){
										alert(l_not_allowed);
										return false;
									}
									break;
								case "tue":
									if(chk_num==2){
										alert(l_not_allowed);
										return false;
									}
									break;
								case "wed":
									if(chk_num==3){
										alert(l_not_allowed);
										return false;
									}
									break;
								case "thu":
									if(chk_num==4){
										alert(l_not_allowed);
										return false;
									}
									break;
								case "fri":
									if(chk_num==5){
										alert(l_not_allowed);
										return false;
									}
									break;
								case "sat":
									if(chk_num==6){
										alert(l_not_allowed);
										return false;
									}
									break;
							}
						}
					}
				}
				break;
			case 1:
				//other dates are disabled
				if(!found){
					alert(l_not_allowed);
					return false;
				}
				break;
		}
		return true;
	}else{
		//not a completed date, so return true
		return true;
	}
}

function urldecode (str) {
	return decodeURIComponent((str + '').replace(/\+/g, '%20'));
}

function calendar_onchange(objname){
	//you can modify or replace the code below
	var fc = getTCCalendar(objname+"_och");
	eval(urldecode(fc));
}

function focusCalendar(objname){
	var obj = getTCCalendarObject("container_"+objname);
	if(obj != null){
		obj.style.zIndex = 999;
	}
}

function unFocusCalendar(objname, zidx){
	var obj = getTCCalendarObject("container_"+objname);
	if(obj != null){
		obj.style.zIndex = zidx;
	}
}

function myJSONParse(d){
	//only array is assume for now
	if(d != "" && d.length > 2){
		var tmp_d = d.substring(2, d.length-2);
		var v = tmp_d.split("],[");
		for(i=0; i<v.length; i++){
			var s = v[i];
			if(s == ""){
				v[i] = new Array();
			}else{
				var arr = s.split(",");
				for(j=0; j<arr.length; j++){
					var first_char = arr[j].charAt(0);
					var last_char = arr[j].charAt(arr[j].length-1);
					if((first_char == '"' && last_char == '"') || (first_char == "'" && last_char == "'")){
						arr[j] = arr[j].substring(1, arr[j].length-1);
					}
				}
				v[i] = arr;
			}
		}
	}else v = new Array();

	return v;
}

//add trim function
String.prototype.trim=function(){return this.replace(/^\s+|\s+$/g, '');};

function addToArray(arr, data){
	if(arr instanceof Array){
		arr[arr.length] = data;
		return arr;
	}else return null;
}

function getTCCalendarObject(id){
	var obj = document.getElementById(id);
	return (typeof(obj) != "object") ? null : obj;
}

function getTCCalendar(id){
	var obj = getTCCalendarObject(id);
	if(obj != null){
		return obj.value.trim();
	}else return "";
}

function setTCCalendar(id, val){
	var obj = getTCCalendarObject(id);
	if(obj != null){
		obj.value = val;
	}
}

function getDateSplit(date, delim){
	return date.split(delim);
}

function setDateLabel(objname){
	var lbl = getTCCalendarObject("divCalendar_"+objname+"_lbl");
	if(lbl != null){
		var d = getTCCalendarObject(objname).value;
		var dateTxt = l_sel_date;

		if(d != "0000-00-00"){
			var date_array = getDatesplit(d, "-");

			var myDate = new Date();
			myDate.setFullYear(date_array[0],(date_array[1]-1),date_array[2]);
			var dateFormat = getTCCalendarObject(objname+"_fmt").value;

			dateTxt = myDate.format(dateFormat);
		}
		lbl.style.whiteSpace="pre";
		//Digitizer
		lbl.innerHTML = convertDigitIn(objname, dateTxt);
	}
}

function sprintf(){
   if (!arguments || arguments.length < 1 || !RegExp)
   {
      return;
   }
   var str = arguments[0];
   var re = /([^%]*)%('.|0|\x20)?(-)?(\d+)?(\.\d+)?(%|b|c|d|u|f|o|s|x|X)(.*)/;
   var a = b = [], numSubstitutions = 0, numMatches = 0;
   while (a = re.exec(str))
   {
      var leftpart = a[1], pPad = a[2], pJustify = a[3], pMinLength = a[4];
      var pPrecision = a[5], pType = a[6], rightPart = a[7];

      numMatches++;
      if (pType == '%')
      {
         subst = '%';
      }
      else
      {
         numSubstitutions++;
         if (numSubstitutions >= arguments.length)
         {
            alert('Error! Not enough function arguments (' + (arguments.length - 1)
               + ', excluding the string)\n'
               + 'for the number of substitution parameters in string ('
               + numSubstitutions + ' so far).');
         }
         var param = arguments[numSubstitutions];
         var pad = '';
                if (pPad && pPad.substr(0,1) == "'") pad = leftpart.substr(1,1);
           else if (pPad) pad = pPad;
         var justifyRight = true;
                if (pJustify && pJustify === "-") justifyRight = false;
         var minLength = -1;
                if (pMinLength) minLength = parseInt(pMinLength);
         var precision = -1;
                if (pPrecision && pType == 'f')
                   precision = parseInt(pPrecision.substring(1));
         var subst = param;
         switch (pType)
         {
         case 'b':
            subst = parseInt(param).toString(2);
            break;
         case 'c':
            subst = String.fromCharCode(parseInt(param));
            break;
         case 'd':
            subst = parseInt(param) ? parseInt(param) : 0;
            break;
         case 'u':
            subst = Math.abs(param);
            break;
         case 'f':
            subst = (precision > -1)
             ? Math.round(parseFloat(param) * Math.pow(10, precision))
              / Math.pow(10, precision)
             : parseFloat(param);
            break;
         case 'o':
            subst = parseInt(param).toString(8);
            break;
         case 's':
            subst = param;
            break;
         case 'x':
            subst = ('' + parseInt(param).toString(16)).toLowerCase();
            break;
         case 'X':
            subst = ('' + parseInt(param).toString(16)).toUpperCase();
            break;
         }
         var padLeft = minLength - subst.toString().length;
         if (padLeft > 0)
         {
            var arrTmp = new Array(padLeft+1);
            var padding = arrTmp.join(pad?pad:" ");
         }
         else
         {
            var padding = "";
         }
      }
      str = leftpart + padding + subst + rightPart;
   }
   return str;
}