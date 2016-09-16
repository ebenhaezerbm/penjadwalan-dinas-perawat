<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function days_of_month(){
	$dateOfMonth = array();
	$month = date('n');
	$year = date('Y');

	$list = [];
	for($d=1; $d<=31; $d++)
	{
		$time = mktime( 12, 0, 0, $month, $d, $year ); 
		if ( date('m', $time) == $month ) {
			$data = [];
			$data[] = date( 'D', $time ); 
			// $data[] = date( 'd-m-Y', $time ); 
			$data[] = date( 'j', $time ); 
			$list[] = $data;
		}
	}

	return $list;
}

function searchArray($key='', $value='', $array=array(), $exclude=array()) {
	$results = [];

	if( $array ){
		foreach ($array as $k => $v) {
			if ($v[$key] === $value && !in_array($v['ID'], $exclude)) {
				$results[] = $v;
			}
		}
	}

	return $results;
}

function check_enqueue( $shift='pagi', $data, $last_record=array(), $length_solution=4 ){
	$last_ids = [];
	if( $last_record ){
		foreach ($last_record as $key => $value) {
			$last_ids[] = $value['ID'];
		}
	}

	if( $shift == 'pagi' ){
		$kru = searchArray('occupation', 'kru', $data);
		$member[] = $kru[0];
	}

	$pj_shift = searchArray('occupation', 'pj-shift', $data, $last_ids);
	$member[] = $pj_shift[0];

	$pp = searchArray('occupation', 'pp', $data, $last_ids);
	if( $pp ){
		foreach ($pp as $key => $value) {
			$member[] = $value;

			if( count($member) >= $length_solution ){
				break;
			}
		}
	}

	return $member;
}

