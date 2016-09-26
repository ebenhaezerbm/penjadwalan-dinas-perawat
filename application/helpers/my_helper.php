<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function days_of_month(){
	$dateOfMonth = array();
	$month = date('n'); // 1 through 12
	$year = date('Y'); // Examples: 1999 or 2003

	$list = [];
	for($day=1; $day<=31; $day++)
	{
		// mktime( $hour, $minute, $second, $month, $day, $year ); 
		$time = mktime( 12, 0, 0, $month, $day, $year ); // time in integer
		if ( date('m', $time) == $month ) {
			$data = [];
			$data[] = date( 'D', $time ); 
			// $data[] = date( 'd-m-Y', $time ); 
			$data[] = date( 'j', $time ); 
			$data[] = date( 'N', $time ); 
			$list[] = $data;
		}
	}

	return $list;
}

function is_weekday($year=false, $month=false, $day=6){
	if( false === $year ){
		$year = date('Y');
	}

	if( false === $month ){
		$month = date('n');
	}
	
	$time = mktime( 12, 0, 0, $month, $day, $year ); // time in integer
	
	$day_of_week = date( 'N', $time ); 
	if( $day_of_week >= 6 ){
		return true;
	}

	return false;
}

function searchArray($key='', $value='', $array=array(), $exclude=array()) {
	$results = [];

	if( $array ){
		foreach ($array as $k => $v) {
			
			if ( isset($v[$key]) && $v[$key] === $value && !in_array($v['NIP'], $exclude) ) {
				$results[] = $v;
			}
		}
	}

	return $results;
}

function shuffleArray($array) { 
	if (!is_array($array)) 
		return $array; 

	$keys = array_keys($array); 
	shuffle($keys); 
	$random = array();
	foreach ($keys as $key) { 
		$random[$key] = $array[$key]; 
	}

	return $random;
}

function GetAge($dob="1970-01-01") 
{ 
	$dob = explode("-",$dob); 
	
	$curMonth 	= date("m");
	$curDay 	= date("j");
	$curYear 	= date("Y");
	
	$age = $curYear - $dob[0]; 
	
	if( $curMonth < $dob[1] || ($curMonth == $dob[1] && $curDay < $dob[2]) ) {
		$age--; 
	}

	return $age; 
}

function is_pj_shift($data){
	if( $data && $data->occupation == 'sarjana' && GetAge($data->start_at) > 1 ){
		return $data;
	}

	return false;
}

function get_last_shift($date, $shift='pagi'){
	$members = [];
	
	return $members;
}

function get_candidate( $data, $length_solution=0 ){
	$array = searchArray('pj_shift', true, $data);
	$member[] = $array[0];

	if( $data ){

		foreach ($data as $key => $value) {
			
			if( $array[0]['NIP'] != $value['NIP'] ){
				$value['pj_shift'] = false;
				$member[] = $value;
			}

			if( $length_solution > 0 && count($member) >= $length_solution ){
				break;
			}
		}
	}

	return $member;
}

function check_enqueue( $shift='pagi', $day=1, $data, $last_record=array(), $length_solution=4 ){
	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	$month = date('n');
	$year = date('Y');

	$time = mktime( 12, 0, 0, $month, $day, $year ); // time in integer
	$date = date( 'Y-m-d', $time );
	
	$last_time = mktime( 12, 0, 0, $month, $day-1, $year ); // time in integer
	$last_date = date( 'Y-m-d', $last_time );
	
	$last_shift = $CI->m_Solusi->get_shift_member($shift, $last_date);

	$last_day = $CI->m_Solusi->get_member_of_the_day($last_date);
	
	if( $last_shift ){
		foreach ($last_shift as $key => $value) {
			$last_record[] = $value;
		}
	}

	if( $last_day ){
		foreach ($last_day as $key => $value) {
			$last_record[] = $value;
		}
	}

	$last_ids = [];
	if( $last_record ){
		foreach ($last_record as $key => $value) {
			$last_ids[] = $value['NIP'];
		}
	}

	if( $shift == 'pagi' && false === is_weekday($day) ){
		$kru = searchArray('occupation', 'kru', $data);
		$kru = $kru[0];
		$kru['pj_shift'] = false;
		$member[] = $kru;
	}

	$pp = searchArray('occupation', 'pp', $data, $last_ids);
	if( $pp ){

		foreach ($pp as $key => $value) {
			
			if( GetAge($value['start_at']) >= 1 ){
				$value['pj_shift'] = true;
			}else{
				$value['pj_shift'] = false;
			}

			$member[] = $value;
		}
	}

	$member = get_candidate($member, $length_solution);

	if( $member ){
		foreach ($member as $key => $value) {
			$input['NIP'] = $value['NIP'];
			$input['shift'] = $shift;
			$input['date'] = $date;
			$CI->m_Solusi->insert_solusi($input);
		}
	}

	return $member;
}

