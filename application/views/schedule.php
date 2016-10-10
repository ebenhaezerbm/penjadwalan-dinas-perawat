<?php 
	$list = days_of_month(); 
	$total_days = count($list);

	$shift = array( 
		'pagi' => '07.00 - 15.00', 
		'sore' => '15.00 - 23.00', 
		'malam' => '23.00 - 07.00' 
	);

	echo '<pre>';
	
	// $array = array(
	// 	array(
	// 		'ID' => 1,
	// 		'NIP' => '1100116677',
	// 		'shift' => 'pagi',
	// 		'date' => '2016-10-01'
	// 	),
	// 	array(
	// 		'ID' => 2,
	// 		'NIP' => '1100116677',
	// 		'shift' => 'sore',
	// 		'date' => '2016-10-01'
	// 	),
	// 	array(
	// 		'ID' => 3,
	// 		'NIP' => '1100116677',
	// 		'shift' => 'malam',
	// 		'date' => '2016-10-01'
	// 	)
	// );

	// print_r( $perawat );
	// exit();

	$schedule = [];
	// loop perawat
	foreach ($perawat as $key => $value) {
		// loop hari
		for ($day=1; $day <= $total_days; $day++){
			$month = date('n');
			$year = date('Y');

			$time = mktime( 12, 0, 0, $month, $day, $year ); // time in integer
			$date = date( 'Y-m-d', $time );

			$input['date'] = $date;

			$input['shift'] = '';

			// cek schedule perawat sampe dua hari kebelakang
			$last_schedule = get_schedule_two_days_ago($day);
			
			// cari data perawat di jadwal dua hari sebelumnya
			$array_search = searchArray('NIP', $value['NIP'], $last_schedule);
			// cek apakah perawat ada di dalam schedule dua hari ke belakang
			if( $array_search ){
				// cek kalo dua hari ke belakang dia dinas malam hari ini dia libur
				if( isset($array_search[0]['shift']) && isset($array_search[1]['shift']) ){
					if( $array_search[0]['shift'] == $array_search[1]['shift'] ){
						switch ($array_search[0]['shift']) {
							case 'pagi':
								$input['shift'] = 'sore';
								break;
							
							case 'sore':
								$input['shift'] = 'malam';
								break;

							case 'malam':
								$input['shift'] = 'libur';
								break;

							default:
								$input['shift'] = 'pagi';
								break;
						}
					}else{
						$input['shift'] = $array_search[1]['shift'];
					}
				}else{
					$input['shift'] = $array_search[0]['shift'];
				}
			}

			// loop shift
			foreach ($shift as $k => $v) {
				// cek 
				if( $value['occupation'] == 'kru' ){
					// kalo jabatannya kepala ruangan 
					// validasi untuk kepala ruangan hanya boleh 
					// dinas pagi hari dari senen sampe jumat
					if( $k == 'pagi' && false === is_weekday($day) ){
						// prepend data to beginning of array PKI Way
						if( isset($schedule[$day][$k]) && !empty($schedule[$day][$k]) ){
							if( count($schedule[$day][$k]) >= 4 ){
								$last = end($schedule[$day][$k]);
								delete_schedule($last['NIP'], $k, $date);
							}

							$schedule[$day][$k] = prependMDArray($schedule[$day][$k], $value);
						}else{
							$schedule[$day][$k][] = $value;
						}

						$input['shift'] = $k;
					}
				}else{
					// if( $k == 'sore' ){
					// 	print_r( $input );
					// 	exit();
					// }

					// kalo jabtannya bukan kepala ruangan
					if( empty($input['shift']) || $input['shift'] == $k ){
						if( empty($input['shift']) ){
							$input['shift'] = $k;
						}

						if( !isset($schedule[$day]) ){
							$schedule[$day][$k][] = $value;
						}else{
							if( isset($schedule[$day][$k]) ){
								if( count($schedule[$day][$k]) < 4 ){
									$schedule[$day][$k][] = $value;
								}else{
									if( !has_pj_shift($schedule[$day][$k]) && is_pj_shift($value) ){
										$last = end($schedule[$day][$k]);
										delete_schedule($last['NIP'], $k, $date);

										$array_pop = array_pop( $schedule[$day][$k] );

										$array_pop[] = $value;

										$schedule[$day][$k] = $array_pop;
									}else{
										unset($input['shift']);
									}
								}
							}else{
								// cek perawat saat ini udah ada belom dalam daftar dinas untuk hari ini
								if( !in_this_schedule($schedule[$day], $value['NIP']) ){
									$schedule[$day][$k][] = $value;
								}else{
									unset($input['shift']);
								}
							}
						}
					}
				}

				if( isset($input['shift']) && !empty($input['shift']) ){
					$input['NIP'] = $value['NIP'];
					// print_r($input['shift']);
					// exit();
					$ID = insert_schedule($input);
				}
			} // end loop shift

		} // end loop days
	} // end loop perawat

	print_r($schedule);
	exit();
	// buat ngecek
	$views = [];
	if( $schedule ){
		for ($day=1; $day <= $total_days; $day++){
			foreach ($shift as $k => $v) {
				if( isset($schedule[$day][$k]) && !empty($schedule[$day][$k]) ){
					foreach ($schedule[$day][$k] as $key => $value) {
						$views[$day][$k][] = $value['name'];
					}
				}
			}
		}
	}
	print_r($views);
	exit();
	
	$results = [];
	for ($i=0; $i < $total_days; $i++) { 
		$last_record = [];
		foreach ($shift as $key => $value) {
			$member = check_enqueue($key, $i, $perawat, $last_record);
			$results[] = $member;
			if( $member ){
				foreach ($member as $k => $v) {
					$last_record[] = $v;
				}
			}
		}
	}

	// print_r($results);
	// exit();
	if( $results ){
		foreach ($results as $r) {
			// print_r( $r );die();
			echo '<p>';
			foreach ($r as $key => $value) {
				echo (($value['pj_shift']) ? '(' .$value['name']. ')' : $value['name']) . ' ->' . $value['occupation'];
				echo '<br />';
			}
			echo '</p>';
		}
	}
	die();
?>

	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>-</th>
				<?php 
					foreach ($list as $data) {
						echo '<th>' . $data[0];
						echo '<br />';
						echo $data[1];
						echo '</th>';
					}
				?>
			</tr>
		</thead>
		<tbody>
			<?php 
				$i = 0;
				foreach ($shift as $key => $value) {
					echo '<tr>';
					echo '<td>' . $value . '</td>';
					echo '</tr>';
				}
			?>
		</tbody>
	</table>
