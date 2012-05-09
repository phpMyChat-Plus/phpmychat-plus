<?php
$closed = 0;
$sched_dly = ($dly_hrs = floor(($open_dly = ($coall_end = strtotime(C_OPEN_ALL_END)) - ($coall_beg = strtotime(C_OPEN_ALL_BEG)))/3600))." ".($dly_hrs == 1 ? L_HOUR : L_HOURS)." ".($dly_mns = floor(($coall_end - $coall_beg - $dly_hrs*3600)/60))." ".($dly_mns == 1 ? L_MIN : L_MINS)." ".($dly_sds = ($coall_end - $coall_beg - $dly_hrs*3600 - $dly_mns*60))." ".($dly_sds == 1 ? L_SEC : L_SECS);
$sched_sun = ($sun_hrs = floor(($open_sun = ($cosun_end = strtotime(C_OPEN_SUN_END)) - ($cosun_beg = strtotime(C_OPEN_SUN_BEG)))/3600))." ".($sun_hrs == 1 ? L_HOUR : L_HOURS)." ".($sun_mns = floor(($cosun_end - $cosun_beg - $sun_hrs*3600)/60))." ".($sun_mns == 1 ? L_MIN : L_MINS)." ".($sun_sds = ($cosun_end - $cosun_beg - $sun_hrs*3600 - $sun_mns*60))." ".($sun_sds == 1 ? L_SEC : L_SECS);
$sched_mon = ($mon_hrs = floor(($open_mon = ($comon_end = strtotime(C_OPEN_MON_END)) - ($comon_beg = strtotime(C_OPEN_MON_BEG)))/3600))." ".($mon_hrs == 1 ? L_HOUR : L_HOURS)." ".($mon_mns = floor(($comon_end - $comon_beg - $mon_hrs*3600)/60))." ".($mon_mns == 1 ? L_MIN : L_MINS)." ".($mon_sds = ($comon_end - $comon_beg - $mon_hrs*3600 - $mon_mns*60))." ".($mon_sds == 1 ? L_SEC : L_SECS);
$sched_tue = ($tue_hrs = floor(($open_tue = ($cotue_end = strtotime(C_OPEN_TUE_END)) - ($cotue_beg = strtotime(C_OPEN_TUE_BEG)))/3600))." ".($tue_hrs == 1 ? L_HOUR : L_HOURS)." ".($tue_mns = floor(($cotue_end - $cotue_beg - $tue_hrs*3600)/60))." ".($tue_mns == 1 ? L_MIN : L_MINS)." ".($tue_sds = ($cotue_end - $cotue_beg - $tue_hrs*3600 - $tue_mns*60))." ".($tue_sds == 1 ? L_SEC : L_SECS);
$sched_wed = ($wed_hrs = floor(($open_wed = ($cowed_end = strtotime(C_OPEN_WED_END)) - ($cowed_beg = strtotime(C_OPEN_WED_BEG)))/3600))." ".($wed_hrs == 1 ? L_HOUR : L_HOURS)." ".($wed_mns = floor(($cowed_end - $cowed_beg - $wed_hrs*3600)/60))." ".($wed_mns == 1 ? L_MIN : L_MINS)." ".($wed_sds = ($cowed_end - $cowed_beg - $wed_hrs*3600 - $wed_mns*60))." ".($wed_sds == 1 ? L_SEC : L_SECS);
$sched_thu = ($thu_hrs = floor(($open_thu = ($cothu_end = strtotime(C_OPEN_THU_END)) - ($cothu_beg = strtotime(C_OPEN_THU_BEG)))/3600))." ".($thu_hrs == 1 ? L_HOUR : L_HOURS)." ".($thu_mns = floor(($cothu_end - $cothu_beg - $thu_hrs*3600)/60))." ".($thu_mns == 1 ? L_MIN : L_MINS)." ".($thu_sds = ($cothu_end - $cothu_beg - $thu_hrs*3600 - $thu_mns*60))." ".($thu_sds == 1 ? L_SEC : L_SECS);
$sched_fri = ($fri_hrs = floor(($open_fri = ($cofri_end = strtotime(C_OPEN_FRI_END)) - ($cofri_beg = strtotime(C_OPEN_FRI_BEG)))/3600))." ".($fri_hrs == 1 ? L_HOUR : L_HOURS)." ".($fri_mns = floor(($cofri_end - $cofri_beg - $fri_hrs*3600)/60))." ".($fri_mns == 1 ? L_MIN : L_MINS)." ".($fri_sds = ($cofri_end - $cofri_beg - $fri_hrs*3600 - $fri_mns*60))." ".($fri_sds == 1 ? L_SEC : L_SECS);
$sched_sat = ($sat_hrs = floor(($open_sat = ($cosat_end = strtotime(C_OPEN_SAT_END)) - ($cosat_beg = strtotime(C_OPEN_SAT_BEG)))/3600))." ".($sat_hrs == 1 ? L_HOUR : L_HOURS)." ".($sat_mns = floor(($cosat_end - $cosat_beg - $sat_hrs*3600)/60))." ".($sat_mns == 1 ? L_MIN : L_MINS)." ".($sat_sds = ($cosat_end - $cosat_beg - $sat_hrs*3600 - $sat_mns*60))." ".($mon_sds == 1 ? L_SEC : L_SECS);

// Current date & time values
	$CorrectedTime = mktime(date("G") + C_TMZ_OFFSET,date("i"),date("s"),date("m"),date("d"),date("Y"));
	settype($daynow = date('w',$CorrectedTime), "integer");
	settype($timegap = date('O'), "integer");
	$timegap = $timegap/100 + C_TMZ_OFFSET;
	$longdtformat = ($L == "english" ? str_replace("%d of", ((stristr(PHP_OS,'win') ? "%#d" : "%e")."<sup>".date('S',$CorrectedTime))."</sup> of"), L_LONG_DATETIME) : L_LONG_DATETIME);
	$datenow = strftime($longdtformat,$CorrectedTime);
	if(stristr(PHP_OS,'win'))
	{
		$datenow = utf_conv(WIN_DEFAULT,$Charset,$datenow);
		if(strstr($L,"chinese") || strstr($L,"korean") || strstr($L,"japanese")) $datenow = str_replace(" ","",$datenow);
	}
	$datenow .= " (".$timegap.")";
	$timenow = date('H:i:s', $CorrectedTime);

if($open_dly || $open_sun || $open_mon || $open_tue || $open_wed || $open_thu || $open_fri || $open_sat)
{
	if($open_dly && ($CorrectedTime < $coall_beg || $CorrectedTime > $coall_end)) $closed = 1;
	elseif($daynow == 0 && $open_sun && ($CorrectedTime < $cosun_beg || $CorrectedTime > $cosun_end)) $closed = 1;
	elseif($daynow == 1 && $open_mon && ($CorrectedTime < $comon_beg || $CorrectedTime > $comon_end)) $closed = 1;
	elseif($daynow == 2 && $open_tue && ($CorrectedTime < $cotue_beg || $CorrectedTime > $cotue_end)) $closed = 1;
	elseif($daynow == 3 && $open_wed && ($CorrectedTime < $cowed_beg || $CorrectedTime > $cowed_end)) $closed = 1;
	elseif($daynow == 4 && $open_thu && ($CorrectedTime < $cothu_beg || $CorrectedTime > $cothu_end)) $closed = 1;
	elseif($daynow == 5 && $open_fri && ($CorrectedTime < $cofri_beg || $CorrectedTime > $cofri_end)) $closed = 1;
	elseif($daynow == 6 && $open_sat && ($CorrectedTime < $cosat_beg || $CorrectedTime > $cosat_end)) $closed = 1;
}
?>