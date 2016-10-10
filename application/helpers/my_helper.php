<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

function prependMDArray($a, $b){
    $result = [];

    $i=0;
    if( is_array($a) && !empty($a) ){
        foreach ($a as $key => $value) {
            if( $i == 0 ){
                $result[] = $b;
            }

            $result[] = $value;
            
            $i++;
        }
    }

    return $result;
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

function is_pj_shift($data){
	if( $data && $data['education'] == 'sarjana' && GetAge($data['start_at']) > 1 ){
		return $data;
	}

	return false;
}

function has_pj_shift($data=false){
	$pj_shift = false;

	if( $data ){
		foreach ($data as $key => $value) {
			if( $value['education'] == 'sarjana' && GetAge($value['start_at']) > 1 ){
				$pj_shift[] = $value;
			}
		}
	}

	return $pj_shift;
}

function get_schedule_by_month($month=false, $year=false, $shift=false, $order='asc'){
	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	if( false === $month ){
		$month = date('n');
	}

	if( false === $year ){
		$year = date('Y');
	}

	$schedule = $CI->m_Solusi->get_schedule_by_month($month, $year, $shift, $order);

	return $schedule;
}

function get_schedule_by_date($date=false, $shift=false, $order='asc'){
	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	if( false === $date ){
		$date = date( 'Y-m-d', now() );
	}

	$schedule = $CI->m_Solusi->get_schedule_by_date($date, $shift, $order);

	return $schedule;
}

function get_schedule_two_days_ago($day=1, $shift=false, $perawat=false, $order='asc'){
	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	$month = date('n');
	$year = date('Y');

	$time = mktime( 12, 0, 0, $month, $day, $year ); // time in integer
	$nowdate = date( 'Y-m-d', $time );
	$two_days_ago = date( 'Y-m-d', strtotime('-2 days', $time) );

	$schedule = $CI->m_Solusi->get_schedule_two_days_ago($perawat, $shift, $nowdate, $two_days_ago, $order);

	return $schedule;
}

function insert_schedule($data){
	if( empty($data) ){
		return false;
	}

	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	$insert_id = $CI->m_Solusi->insert_schedule($data);

	return $insert_id;
}

function update_schedule($id, $data){
	if( empty($data) ){
		return false;
	}

	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	$update_id = $CI->m_Solusi->update_schedule($id, $data);

	return $update_id;
}

function delete_schedule($nip, $shift, $date){
	if( empty($nip) || empty($shift) || empty($date) ){
		return false;
	}

	$CI =& get_instance();
	$CI->load->model('M_Solusi');

	$CI->m_Solusi->delete_schedule($nip, $shift, $date);
}

function in_this_schedule($schedule=false, $perawat){
	if( is_array($schedule) && !empty($schedule) ){
		foreach ($schedule as $shift) {
			if( is_array($shift) && !empty($shift) ){
				foreach ($shift as $key => $value) {
					if( isset($value['NIP']) && !empty($value['NIP']) && $value['NIP'] == $perawat ){
						return true;
					}
				}
			}
		}
	}

	return false;
}