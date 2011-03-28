<?php
//*********************************************************
// The php calendar component
// written by TJ @triconsole
//
// add on: translation  implemented - default is English en_US
//	- thanks ciprianmp
//
// version 3.41-loc (27 March 2011)

//bug fixed: Incorrect next month display show on 'February 2008'
//	- thanks Neeraj Jain for bug report
//
//bug fixed: Incorrect month comparable on calendar_form.php line 113
// - thanks Djenan Ganic, Ian Parsons, Jesse Davis for bug report
//
//add on: date on calendar form change upon textbox in datepicker mode
//add on: validate date enter from dropdown and textbox
//
//bug fixed: Calendar path not valid when select date from dropdown
// - thanks yamba for bug report
//
//adjust: add new function setWidth and deprecate getDayNum function
//
//bug fixed: year combo box display not correct when extend its value
//	- thanks Luiz Augusto for bug report
//
//fixed on date and month value return that is not leading by '0'
//
//adjust: change php short open tag (<?=) to normal tag (<?php)
//  - thanks Michael Lynch
//
//add on: getMonthNames() function to make custom month names on each language
//  - thanks Jean-Francois Harrington
//
//add on: button close on datepicker on the top-right corner of calendar
//  - thanks denis
//
//bug fixed: hide javascript alert when default date not defined
//	- thanks jon-b
//
//bug fixed: incorrect layout when select part of date
//	- thanks simonzebu (I just got what you said  :) )
//
//bug fixed: not support date('N') for php version lower 5.0.1 so change to date('w') instead
//  - thanks simonzebu, Kamil, greensilver for bug report
//  - thanks Paul for the solution
//
//add on: setHeight() function to set the height of iframe container of calendar
//	- thanks Nolochemcial
//
//add on: startMonday() function to set calendar display first day of week on Monday
//
//bug fixed: don't display year when not in year interval
//
//bug fixed: day combobox not update when select date from calendar
//	- thanks ciprianmp
//
//add on: disabledDay() function to let the calendar disabled on specified day
//  - thanks Jim R.
//
//bug fixed: total number of days startup incorrect
//  - thanks Francois du Toit, ciprianmp
//
//add on: setAlignment() and setDatePair() function
//  - thanks for ciprianmp and many guys guiding this :)
//
//bug fixed: the header of calendar look tight when day's header more then 2 characters, this can be adjusted by increasing width on calendar.css [#calendar-body td div { width: 15px; }]
//	- thanks ciprianmp
//
//********************************************************

if((defined("L_LANG") && L_LANG != "en_US" && L_LANG != "L_LANG") || isset($lang) && $lang != "en_US") include_once("lang/calendar.".(isset($lang) ? $lang : L_LANG).".php");
include_once("lang/localization.lib.php");

if(file_exists("plugins/calendar/calendar.js"))
{
?>
<script language="javascript" src="plugins/calendar/calendar.js"></script>
<?php
}
elseif(file_exists("calendar.js"))
{
?>
<script language="javascript" src="calendar.js"></script>
<?php
}

class tc_calendar{
	var $icon;
	var $objname;
	var $txt = L_SEL_ICON; //display when no calendar icon found or set up
	var $date_format = 'd F Y'; //format of date show in panel if $show_input is false
	var $year_display_from_current = 30;
	var $date_picker;
	var $path = '';
	var $day = 00;
	var $month = 00;
	var $year = 0000;
	var $width = 150;
	var $height = 205;
	var $year_start;
	var $year_end;
	var $startMonday = FIRST_DAY;
	var $date_allow1;
	var $date_allow2;
	var $show_not_allow = false;
	var $auto_submit = false;
	var $form_container;
	var $target_url;
	var $show_input = true;
	var $dsb_days = array(); //collection of days to disabled
	var $zindex = 1;
	var $v_align = "bottom";
	var $h_align = "right";
	var $line_height = 18; //for vertical align offset
	var $date_pair1 = "";
	var $date_pair2 = "";
	var $date_pair_value = "";
	var $hl = L_LANG;

	//calendar constructor
	function tc_calendar($objname, $date_picker = false, $show_input = true){
		$this->objname = $objname;
		//$this->year_display_from_current = 50;
		$this->date_picker = $date_picker;

		//set default year display from current year
		$thisyear = date('Y');
		$this->year_start = $thisyear-$this->year_display_from_current;
		$this->year_end = $thisyear+$this->year_display_from_current;

		$this->show_input = $show_input;
	}

	//check for leapyear
	function is_leapyear($year){
    	return ($year % 4 == 0) ?
    		!($year % 100 == 0 && $year % 400 <> 0)	: false;
    }

	//get the total day of each month in year
    function total_days($month,$year){
    	$days = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		if($month > 0 && $year > 0){
	    	return ($month == 2 && $this->is_leapYear($year)) ? 29 : $days[$month-1];
		}else return 31;
    }

	//Deprecate since v1.6
	function getDayNum($day){
		$headers = $this->getDayHeaders();
		return isset($headers[$day]) ? $headers[$day] : 0;
	}

	//get the day headers start from sunday till saturday
	function getDayHeaders(){
		if($this->startMonday){
			return array("1"=>s_mon, "2"=>s_tue, "3"=>s_wed, "4"=>s_thu, "5"=>s_fri, "6"=>s_sat, "7"=>s_sun);
		}else{
			return array("7"=>s_sun, "1"=>s_mon, "2"=>s_tue, "3"=>s_wed, "4"=>s_thu, "5"=>s_fri, "6"=>s_sat);
		}
	}

	function setIcon($icon){
		$this->icon = $icon;
	}

	function setPicture($a){
		$this->icon = $a;
	}

	function setText($txt){
		$this->txt = $txt;
	}

	//-----------------------------------------------------------
	//input the date format according to php date format
	// for example: 'd F y' or 'Y-m-d'
	//-----------------------------------------------------------
	function setDateFormat($format){
		$this->date_format = $format;
	}

	//set default selected date
	function setDate($day, $month, $year){
		$this->day = $day;
		$this->month = $month;
		$this->year = $year;
	}

	function setDateYMD($date){
		list($year, $month, $day) = explode("-", $date, 3);
		$this->day = $day;
		$this->month = $month;
		$this->year = $year;
	}

	//specified location of the calendar_form.php
	function setPath($path){
		$last_char = substr($path, strlen($path)-1, strlen($path));
		if($last_char != "/") $path .= "/";
		$this->path = $path;
	}

	function writeScript(){
		$this->writeHidden();

		//check whether it is a date picker
		if($this->date_picker){
//			echo("<span style=\"position: relative; z-index: $this->zindex;\">");
			echo("<div style=\"position: relative; z-index: $this->zindex; float: left;\">");

			if($this->show_input){
				if($this->hl){
					$to_replace = array("%"," ",".","年","日");
					$order = str_replace($to_replace,"",L_CAL_FORMAT);
					if(strpos($order,"d") == 0) $this->writeDay();
					elseif(strpos($order,"B") == 0) $this->writeMonth();
					elseif(strpos($order,"Y") == 0) $this->writeYear();
					if(strpos($order,"d") == 1) $this->writeDay();
					elseif(strpos($order,"B") == 1) $this->writeMonth();
					elseif(strpos($order,"Y") == 1) $this->writeYear();
					if(strpos($order,"d") == 2) $this->writeDay();
					elseif(strpos($order,"B") == 2) $this->writeMonth();
					elseif(strpos($order,"Y") == 2) $this->writeYear();
				}else{
					$this->writeDay();
					$this->writeMonth();
					$this->writeYear();
				}
			}else{
				echo(" <a href=\"javascript:toggleCalendar('".$this->objname."');\">");
				$this->writeDateContainer();
				echo("</a>");
			}

			echo(" <a href=\"javascript:toggleCalendar('".$this->objname."');\" onMouseOver=\"window.status='".sprintf(L_CLICK,L_LINKS_15).".'; return true\" title=\"".sprintf(L_CLICK,L_LINKS_15)."\">");
			if(is_file($this->icon)){
				echo("<img src=\"".$this->icon."\" id=\"tcbtn_".$this->objname."\" name=\"tcbtn_".$this->objname."\" border=\"0\" align=\"absmiddle\" alt=\"".sprintf(L_CLICK,L_LINKS_15)."\"/>");
			}else echo($this->txt);
			echo("</a>");

			$this->writeCalendarContainer();

//			echo("</span>");
			echo("</div>");
		}else{
			$this->writeCalendarContainer();
		}
	}

	function writeCalendarContainer(){
		$params = array();
		$params[] = "objname=".$this->objname;
		$params[] = "selected_day=".$this->day;
		$params[] = "selected_month=".$this->month;
		$params[] = "selected_year=".$this->year;
		$params[] = "year_start=".$this->year_start;
		$params[] = "year_end=".$this->year_end;
		$params[] = "dp=".(($this->date_picker) ? 1 : 0);
		$params[] = "mon=".$this->startMonday;
		$params[] = "da1=".$this->date_allow1;
		$params[] = "da2=".$this->date_allow2;
		$params[] = "sna=".$this->show_not_allow;
		$params[] = "aut=".$this->auto_submit;
		$params[] = "frm=".$this->form_container;
		$params[] = "tar=".$this->target_url;
		$params[] = "inp=".$this->show_input;
		$params[] = "fmt=".$this->date_format;
		$params[] = "dis=".implode(",", $this->dsb_days);
		$params[] = "pr1=".$this->date_pair1;
		$params[] = "pr2=".$this->date_pair2;
		$params[] = "prv=".$this->date_pair_value;
		$params[] = "pth=".$this->path;
		$params[] = "hl=".$this->hl;

		$paramStr = (sizeof($params)>0) ? "?".implode("&", $params) : "";

		if($this->date_picker){
			$div_display = "hidden";
			$div_position = "absolute";

			$line_height = $this->line_height;

			if(is_file($this->icon)){
				$img_attribs = getimagesize($this->icon);
				$line_height = $img_attribs[1]+2;
			}
			
			$div_align = "";
			
			//adjust alignment
			switch($this->v_align){
				case "top":
					$div_align .= "bottom:".$line_height."px;";
					break;
				case "bottom":
				default:
					$div_align .= "top:".$line_height."px;";
					
			}
			
			switch($this->h_align){
				case "left":
					$div_align .= "left:0px;";
					break;
				case "right":
				default:
					$div_align .= "right:0px;";
					
			}
			
		}else{
			$div_display = "visible";
			$div_position = "relative";
			$div_align = "";
		}

		//write the calendar container
//		echo("<div id=\"div_".$this->objname."\" style=\"position:".$div_position.";visibility:".$div_display.";z-index:10000;".$div_align."\" class=\"div_calendar calendar-border\">");
//		echo("<IFRAME id=\"".$this->objname."_frame\" src=\"".$this->path."calendar_form.php".$paramStr."\" frameBorder=\"0\" scrolling=\"no\" allowtransparency=\"true\" width=\"100%\" height=\"100%\"></IFRAME>");
		echo("<div id=\"div_".$this->objname."\" style=\"position:".$div_position.";visibility:".$div_display.";z-index:100;".$div_align."\" class=\"div_calendar calendar-border\">");
		echo("<IFRAME id=\"".$this->objname."_frame\" src=\"".$this->path."calendar_form.php".$paramStr."\" frameBorder=\"0\" scrolling=\"no\" allowtransparency=\"true\" width=\"100%\" height=\"100%\" style=\"z-index: 100;\"></IFRAME>");
		echo("</div>");
	}

	//write the select box of days
	function writeDay(){
		$total_days = $this->total_days($this->month, $this->year);

		echo("<select name=\"".$this->objname."_day\" id=\"".$this->objname."_day\" onChange=\"javascript:tc_setDay('".$this->objname."', this[this.selectedIndex].value);\" class=\"tcday\">");
		echo("<option value=\"00\">".L_DAY."</option>");
		for($i=1; $i<=$total_days; $i++){
			$selected = ((int)$this->day == $i) ? " selected" : "";
			echo("<option value=\"".str_pad($i, 2 , "0", STR_PAD_LEFT)."\"$selected>$i</option>");
		}
		echo("</select> ");
	}

	//write the select box of months
	function writeMonth(){
		echo("<select name=\"".$this->objname."_month\" id=\"".$this->objname."_month\" onChange=\"javascript:tc_setMonth('".$this->objname."', this[this.selectedIndex].value);\" class=\"tcmonth\">");
		echo("<option value=\"00\">".L_MONTH."</option>");

		$monthnames = $this->getMonthNames();
		for($i=1; $i<=sizeof($monthnames); $i++){
			$selected = ((int)$this->month == $i) ? " selected" : "";
			echo("<option value=\"".str_pad($i, 2, "0", STR_PAD_LEFT)."\"$selected>".$monthnames[$i-1]."</option>");
		}
		echo("</select> ");
	}

	//write the year textbox
	function writeYear(){
		//echo("<input type=\"textbox\" name=\"".$this->objname."_year\" id=\"".$this->objname."_year\" value=\"$this->year\" maxlength=4 size=5 onBlur=\"javascript:tc_setYear('".$this->objname."', this.value, '$this->path');\" onKeyPress=\"javascript:if(yearEnter(event)){ tc_setYear('".$this->objname."', this.value, '$this->path'); return false; }\"> ");
		echo("<select name=\"".$this->objname."_year\" id=\"".$this->objname."_year\" onChange=\"javascript:tc_setYear('".$this->objname."', this[this.selectedIndex].value);\" class=\"tcyear\">");
		echo("<option value=\"0000\">".L_YEAR."</option>");


		$year_start = $this->year_start;
		$year_end = $this->year_end;

		//check year to be select in case of date_allow is set
		  if(!$this->show_not_allow && ($this->date_allow1 || $this->date_allow2)){
			if($this->date_allow1 && $this->date_allow2){
				$da1Time = strtotime($this->date_allow1);
				$da2Time = strtotime($this->date_allow2);

				if($da1Time < $da2Time){
					$year_start = date('Y', $da1Time);
					$year_end = date('Y', $da2Time);
				}else{
					$year_start = date('Y', $da2Time);
					$year_end = date('Y', $da1Time);
				}
			}elseif($this->date_allow1){
				//only date 1 specified
				$da1Time = strtotime($this->date_allow1);
				$year_start = date('Y', $da1Time);
			}elseif($this->date_allow2){
				//only date 2 specified
				$da2Time = strtotime($this->date_allow2);
				$year_end = date('Y', $da2Time);
			}
		  }

//		for($i=$year_start; $i<=$year_end; $i++){ // current year bottom
		for($i=$year_end; $i>=$year_start; $i--){ // current year up
			$selected = ((int)$this->year == $i) ? " selected" : "";
			echo("<option value=\"$i\"$selected>$i</option>");
		}
		echo("</select> ");
	}

	//write hidden components
	function writeHidden(){
		echo("<input type=\"hidden\" name=\"".$this->objname."\" id=\"".$this->objname."\" value=\"".$this->getDate()."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_dp\" id=\"".$this->objname."_dp\" value=\"".$this->date_picker."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_year_start\" id=\"".$this->objname."_year_start\" value=\"".$this->year_start."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_year_end\" id=\"".$this->objname."_year_end\" value=\"".$this->year_end."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_mon\" id=\"".$this->objname."_mon\" value=\"".$this->startMonday."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_da1\" id=\"".$this->objname."_da1\" value=\"".$this->date_allow1."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_da2\" id=\"".$this->objname."_da2\" value=\"".$this->date_allow2."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_sna\" id=\"".$this->objname."_sna\" value=\"".$this->show_not_allow."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_aut\" id=\"".$this->objname."_aut\" value=\"".$this->auto_submit."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_frm\" id=\"".$this->objname."_frm\" value=\"".$this->form_container."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_tar\" id=\"".$this->objname."_tar\" value=\"".$this->target_url."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_inp\" id=\"".$this->objname."_inp\" value=\"".$this->show_input."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_fmt\" id=\"".$this->objname."_fmt\" value=\"".$this->date_format."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_dis\" id=\"".$this->objname."_dis\" value=\"".implode(",", $this->dsb_days)."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_pr1\" id=\"".$this->objname."_pr1\" value=\"".$this->date_pair1."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_pr2\" id=\"".$this->objname."_pr2\" value=\"".$this->date_pair2."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_prv\" id=\"".$this->objname."_prv\" value=\"".$this->date_pair_value."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_pth\" id=\"".$this->objname."_pth\" value=\"".$this->path."\">");
		echo("<input type=\"hidden\" name=\"".$this->objname."_hl\" id=\"".$this->objname."_hl\" value=\"".$this->hl."\">");
	}

	//set width of calendar
	//---------------------------
	// Deprecated since version 2.9
	// Auto sizing is applied
	//---------------------------
	function setWidth($width){
		if($width) $this->width = $width;
	}

	//set height of calendar
	//---------------------------
	// Deprecated since version 2.9
	// Auto sizing is applied
	//---------------------------
	function setHeight($height){
		if($height) $this->height = $height;
	}

	function setYearInterval($start, $end){
		if($start < $end){
			$this->year_start = $start;
			$this->year_end = $end;
		}else{
			$this->year_start = $end;
			$this->year_end = $start;
		}
	}

	function setYearSelect($a, $b){
		if($a < $b){
			$this->year_start = $a;
			$this->year_end = $b;
		}else{
			$this->year_start = $b;
			$this->year_end = $a;
		}
	}

	function getMonthNames(){
		return array(l_january, l_february, l_march, l_april, l_may, l_june, l_july, l_august, l_september, l_october, l_november, l_december);
	}

	function startMonday($flag){
		$this->startMonday = $flag;
	}

	function dateAllow($from = "", $to = "", $show_not_allow = true){
		$time_from = strtotime($from);
		$time_to = strtotime($to);

		if($time_from > 0 && $time_to > 0){
			//both set
			if($time_from <= $time_to){
				$this->date_allow1 = $from;
				$this->date_allow2 = $to;

				//get years from allow date
				$year_allow1 = date('Y', $time_from);
				$year_allow2 = date('Y', $time_to);
			}else{
				$this->date_allow1 = $to;
				$this->date_allow2 = $from;

				//get years from allow date
				$year_allow1 = date('Y', $time_to);
				$year_allow2 = date('Y', $time_from);
			}

			//setup year_start and year_end, display in dropdown
			if($this->year_start && $year_allow1 < $this->year_start) $this->year_start = $year_allow1;
			if($this->year_end && $year_allow2 < $this->year_end) $this->year_end = $year_allow2;

		}elseif($time_from > 0){
			$this->date_allow1 = $from;

			//get year from allow date
			$year_allow1 = date('Y', $time_from);

			//setup year start, display in dropdown
			if($this->year_start && $year_allow1 < $this->year_start) $this->year_start = $year_allow1;

			//setup year end from year start
			if(!$this->year_end) $this->year_end = $this->year_start + $this->year_display_from_current;

		}elseif($time_to > 0){
			$this->date_allow2 = $to;

			//get year from allow date
			$year_allow2 = date('Y', $time_to);

			//setup year end, display in dropdown
			if($this->year_end && $year_allow2 < $this->year_end) $this->year_end = $year_allow2;

			//setup year start from year end
			if(!$this->year_start) $this->year_start = $this->year_end - $this->year_display_from_current;
		}

		$this->show_not_allow = $show_not_allow;
	}

	function autoSubmit($auto, $form_name, $target = ""){
		$this->auto_submit = $auto;
		$this->form_container = $form_name;
		$this->target_url = $target;
	}

	function getDate(){
		return str_pad($this->year, 4, "0", STR_PAD_LEFT)."-".str_pad($this->month, 2, "0", STR_PAD_LEFT)."-".str_pad($this->day, 2, "0", STR_PAD_LEFT);
	}

	function showInput($flag){
		$this->show_input = $flag;
	}

	function utf_conv($iso,$charset,$what)
	{
		if(function_exists('iconv')) $what = iconv($iso,$charset,$what);
		return $what;
	}

	function writeDateContainer(){
		if($this->day && $this->month && $this->year){
#			if($this->hl) $dd = strftime(L_CAL_FORMAT, mktime(0,0,0,$this->month,$this->day,$this->year));
			if($this->hl) $dd = stristr(PHP_OS,"win") ? utf_conv(WIN_DEFAULT,'utf-8',strftime(L_CAL_FORMAT, mktime(0,0,0,$this->month,$this->day,$this->year))) : strftime(L_CAL_FORMAT, mktime(0,0,0,$this->month,$this->day,$this->year));
			else $dd = date($this->date_format, mktime(0,0,0,$this->month,$this->day,$this->year));
		}
		else $dd = L_SEL_DATE;

		echo("<span id=\"divCalendar_".$this->objname."_lbl\" class=\"date-tccontainer\">$dd</span>");
	}

	//------------------------------------------------------
	// This function disable day column as specified value
	// day values : Sun, Mon, Tue, Wed, Thu, Fri, Sat
	//------------------------------------------------------
	function disabledDay($day){
		$day = strtolower($day); //make it not case-sensitive
		if(in_array($day, $this->dsb_days) === false)
			$this->dsb_days[] = $day;
	}
	
	function setAlignment($h_align, $v_align){
		$this->h_align = $h_align;
		$this->v_align = $v_align;
	}
	
	function setDatePair($calendar_name1, $calendar_name2, $pair_value = "0000-00-00 00:00:00"){
		if($calendar_name1 != $this->objname){
			$this->date_pair1 = $calendar_name1;
			if($pair_value != "0000-00-00 00:00:00")
				$this->date_pair_value = $pair_value;
		}elseif($calendar_name2 != $this->objname){
			$this->date_pair2 = $calendar_name2;
			if($pair_value != "0000-00-00 00:00:00")
				$this->date_pair_value = $pair_value;
		}
	}

}
?>