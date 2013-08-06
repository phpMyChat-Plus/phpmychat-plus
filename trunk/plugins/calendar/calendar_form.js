// JavaScript Document

var ccWidth = 0;
var ccHeight = 0;

function setValue(){
	var f = document.calendarform;
	var date_selected = padString(f.selected_year.value, 4, "0") + "-" + padString(f.selected_month.value, 2, "0") + "-" + padString(f.selected_day.value, 2, "0");

	//not use for now
	//toggle = typeof(toggle) != 'undefined' ? toggle : true;

	if(typeof(window.parent.setValue) == "function")
		window.parent.setValue(f.objname.value, date_selected);
	else alert(l_err_noset);
}

function unsetValue(){
	var f = document.calendarform;
	f.selected_day.value = "00";
	f.selected_month.value = "00";
	f.selected_year.value = "0000";

	setValue();

	this.loading();
	//f.submit();
}

function restoreValue(){
	var f = document.calendarform;
	var date_selected = padString(f.selected_year.value, 4, "0") + "-" + padString(f.selected_month.value, 2, "0") + "-" + padString(f.selected_day.value, 2, "0");

	if(typeof(window.parent.updateValue) == "function")
	window.parent.updateValue(f.objname.value, date_selected);
}

function selectDay(d){
	var f = document.calendarform;
	f.selected_day.value = d.toString();
	f.selected_month.value = f.m[f.m.selectedIndex].value;
	f.selected_year.value = f.y[f.y.selectedIndex].value;

	setValue();

	this.loading();
	f.submit();

	submitNow(f.selected_day.value, f.selected_month.value, f.selected_year.value);
}

function hL(E, mo){
	//clear last selected
	if(document.getElementById("select")){
		var selectobj = document.getElementById("select");
		selectobj.Id = "";
	}

	while (E.tagName!="TD"){
		E=E.parentElement;
	}

	E.Id = "select";
}

function selectMonth(m){
	var f = document.calendarform;
	f.selected_month.value = m;
}

function selectYear(y){
	var f = document.calendarform;
	f.selected_year.value = y;
}

function move(m, y){
	var f = document.calendarform;
	f.m.value = m;
	f.y.value = y;

	this.loading();
	f.submit();
}

function today(){
	var f = document.calendarform;
	f.m.value = this.today_month;
	f.y.value = this.today_year;

	this.loading();
	f.submit();
}

function closeMe(){
	window.parent.toggleCalendar(this.obj_name);
}

function padString(stringToPad, padLength, padString) {
	if (stringToPad.length < padLength) {
		while (stringToPad.length < padLength) {
			stringToPad = padString + stringToPad;
		}
	}else {}
/*
	if (stringToPad.length > padLength) {
		stringToPad = stringToPad.substring((stringToPad.length - padLength), padLength);
	} else {}
*/
	return stringToPad;
}

function loading(){
	if(this.ccWidth > 0 && this.ccHeight > 0){
		var ccobj = getObject('calendar-container');

		ccobj.style.width = this.ccWidth+'px';
		ccobj.style.height = this.ccHeight+'px';
	}

	document.getElementById('calendar-container').innerHTML = "<div id=\"calendar-body\"><div class=\"refresh\"><div align=\"center\" class=\"txt-container\">"+l_ref_cal+"</div></div></div>";
	adjustContainer();
}

function submitCalendar(){
	this.loading();
	document.calendarform.submit();
}

function getObject(item){
	if(window.mmIsOpera) return(document.getElementById(item));
	if(document.all) return(document.all[item]);
	if(document.getElementById) return(document.getElementById(item));
	if(document.layers) return(document.layers[item]);
	return(false);
}

function adjustContainer(){
	var tc_obj = getObject('calendar-page');
	//var tc_obj = frm_obj.contentWindow.getObject('calendar-page');
	if(tc_obj != null){
		var div_obj = window.parent.document.getElementById('div_'+obj_name);

		if(tc_obj.offsetWidth > 0 && tc_obj.offsetHeight > 0){
			div_obj.style.width = tc_obj.offsetWidth+'px';
			div_obj.style.height = tc_obj.offsetHeight+'px';
			//alert(div_obj.style.width+','+div_obj.style.height);

			var ccsize = getObject('calendar-container');
			this.ccWidth = ccsize.offsetWidth;
			this.ccHeight = ccsize.offsetHeight;
		}
	}
}

function getCalendarParam(name){
	var f = document.calendarform;
	var obj_name = f.objname.value;

	if(window.parent.document.getElementById(obj_name+"_"+name) != null){
		return window.parent.document.getElementById(obj_name+"_"+name).value;
	}else return "";
}

function processTooltips(){
	var ttd = myJSONParse(getCalendarParam("ttd"));
	var ttt = myJSONParse(decodeURIComponent(getCalendarParam("ttt")));

	//yearly recursive
	for (var key in ttd[2]) {
		if (ttd[2].hasOwnProperty(key)) {
			this_date = new Date(ttd[2][key]*1000);
			this_date_str = pad(current_year, 4, "0")+''+pad(this_date.getMonth()+1, 2, "0")+''+pad(this_date.getDate(), 2, "0");
			this_tooltip = typeof(ttt[2][key]) != "undefined" ? ttt[2][key] : "";

			if((this_tooltip.substring(0,1) == '"' && this_tooltip.substring(this_tooltip.length-1) == '"') || (this_tooltip.substring(0,1) == "'" && this_tooltip.substring(this_tooltip.length-1) == "'")){
				this_tooltip = this_tooltip.substring(1, this_tooltip.length-1);
				this_tooltip = replaceAll("&#10;", String.fromCharCode(10), this_tooltip);
			}

			if(this_tooltip != ""){
				var date_obj = document.getElementById(this_date_str);
				if(date_obj != null){
					var obj_list = date_obj.getElementsByTagName("div");
					if(obj_list[0] != null){
						//check if tooltip is already existed
						var spn_obj = obj_list[0].getElementsByTagName("span");

						if(spn_obj[0] != null){
							var alt_txt = spn_obj[0].getAttribute("alt");
							alt_txt += String.fromCharCode(10)+this_tooltip;
							spn_obj[0].setAttribute("alt", alt_txt);
							spn_obj[0].setAttribute("title", alt_txt);
							spn_obj[0].onclick = function() {showTitle(this);};
						}else{
							var info_obj = document.createElement("span");
							info_obj.setAttribute("alt", this_tooltip);
							info_obj.setAttribute("title", this_tooltip);
							info_obj.onclick = function() {showTitle(this);};
							info_obj.className = "calendartooltip";

							obj_list[0].insertBefore(info_obj, null);
						}
					}
				}
			}
		}
	}

	//monthly recursive
	for (var key in ttd[1]) {
		if (ttd[1].hasOwnProperty(key)) {
			this_date = new Date(ttd[1][key]*1000);
			this_date_str = pad(current_year, 4, "0")+''+pad(current_month, 2, "0")+''+pad(this_date.getDate(), 2, "0");
			this_tooltip = typeof(ttt[1][key]) != "undefined" ? ttt[1][key] : "";

			if((this_tooltip.substring(0,1) == '"' && this_tooltip.substring(this_tooltip.length-1) == '"') || (this_tooltip.substring(0,1) == "'" && this_tooltip.substring(this_tooltip.length-1) == "'")){
				this_tooltip = this_tooltip.substring(1, this_tooltip.length-1);
				this_tooltip = replaceAll("&#10;", String.fromCharCode(10), this_tooltip);
			}

			if(this_tooltip != ""){
				var date_obj = document.getElementById(this_date_str);
				if(date_obj != null){
					var obj_list = date_obj.getElementsByTagName("div");
					if(obj_list[0] != null){
						//check if tooltip is already existed
						var spn_obj = obj_list[0].getElementsByTagName("span");

						if(spn_obj[0] != null){
							var alt_txt = spn_obj[0].getAttribute("alt");
							alt_txt += String.fromCharCode(10)+this_tooltip;
							spn_obj[0].setAttribute("alt", alt_txt);
							spn_obj[0].setAttribute("title", alt_txt);
							spn_obj[0].onclick = function() {showTitle(this);};
						}else{
							var info_obj = document.createElement("span");
							info_obj.setAttribute("alt", this_tooltip);
							info_obj.setAttribute("title", this_tooltip);
							info_obj.onclick = function() {showTitle(this);};
							info_obj.className = "calendartooltip";

							obj_list[0].insertBefore(info_obj, null);
						}
					}
				}
			}
		}
	}

	//no recursive
	for (var key in ttd[0]) {
		if (ttd[0].hasOwnProperty(key)) {
			this_date = new Date(ttd[0][key]*1000);
			this_date_str = pad(this_date.getFullYear(), 4, "0")+''+pad(this_date.getMonth()+1, 2, "0")+''+pad(this_date.getDate(), 2, "0");
			this_tooltip = typeof(ttt[0][key]) != "undefined" ? ttt[0][key] : "";

			if((this_tooltip.substring(0,1) == '"' && this_tooltip.substring(this_tooltip.length-1) == '"') || (this_tooltip.substring(0,1) == "'" && this_tooltip.substring(this_tooltip.length-1) == "'")){
				this_tooltip = this_tooltip.substring(1, this_tooltip.length-1);
				this_tooltip = replaceAll("&#10;", String.fromCharCode(10), this_tooltip);
			}

			if(this_tooltip != ""){
				var date_obj = document.getElementById(this_date_str);
				if(date_obj != null){
					var obj_list = date_obj.getElementsByTagName("div");
					if(obj_list[0] != null){
						//check if tooltip is already existed
						var spn_obj = obj_list[0].getElementsByTagName("span");

						if(spn_obj[0] != null){
							var alt_txt = spn_obj[0].getAttribute("alt");
							alt_txt += String.fromCharCode(10)+this_tooltip;
							spn_obj[0].setAttribute("alt", alt_txt);
							spn_obj[0].setAttribute("title", alt_txt);
							spn_obj[0].onclick = function() {showTitle(this);};
						}else{
							var info_obj = document.createElement("span");
							info_obj.setAttribute("alt", this_tooltip);
							info_obj.setAttribute("title", this_tooltip);
							info_obj.onclick = function() {showTitle(this);};
							info_obj.className = "calendartooltip";

							obj_list[0].insertBefore(info_obj, null);
						}
					}
				}
			}
		}
	}
}

function pad(n, width, z) {
	z = z || '0';
	n = n + '';
	return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
}

function replaceAll(find, replace, str) {
	return str.replace(new RegExp(find, 'g'), replace);
}

function myJSONParse(d){
	//only array is assume for now
	if(d != "" && d.length > 2){
		var tmp_d = d.substring(2, d.length-2);
		var v = tmp_d.split("],[");
		for(i=0; i<v.length; i++){
			var s = v[i];
			if(s == "")
				v[i] = new Array();
			else v[i] = s.split(",");
		}
	}else v = new Array();

	return v;
}

function showTitle(obj){
	alert(obj.getAttribute("title"));
}

window.onload = function(){
	window.parent.setDateLabel('obj_name');
	//adjustContainer();
	setTimeout("adjustContainer()", 1000);
	restoreValue();
	processTooltips();
};