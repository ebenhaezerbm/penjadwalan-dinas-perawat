<?php

class M_Solusi extends CI_Model {
	
	public function get_solusi($month, $year)
	{
		$this->db->where( 'MONTH(date)', $month );
		$this->db->where( 'YEAR(date)', $year );
		$this->db->order_by( 'ID', 'desc' );
		return $this->db->get( 'tb_solusi' )->result_array();
	}

	public function get_shift_member($shift, $date=false)
	{
		$this->db->where( 'shift', $shift );
		if( $date ){
			$this->db->where( 'date', $date );
		}
		return $this->db->get( 'tb_solusi' )->result_array();
	}

	public function get_member_of_the_day($date)
	{
		$this->db->where( 'date', $date );
		return $this->db->get( 'tb_solusi' )->result_array();
	}

	// public function count_solusi(){
	// 	return $this->db->count_all('tb_solusi');
	// }

	// public function get_perawat_by_id($id)
	// {
	// 	$this->db->where( 'ID', $id );
	// 	return $this->db->get( 'tb_solusi' )->row();
	// }

	public function get_schedule_by_month($month, $year, $shift, $order){
		$this->db->where( 'MONTH(date)', $month );
		$this->db->where( 'YEAR(date)', $year );

		if( $shift ){
			$this->db->where( 'shift', $shift );
		}

		$this->db->order_by( 'date', $order );

		return $this->db->get( 'tb_solusi' )->result_array();
	}

	public function get_schedule_by_date($date, $shift, $order){
		$this->db->where( 'date', $date );
		
		if( $shift ){
			$this->db->where( 'shift', $shift );
		}

		$this->db->order_by( 'ID', $order );

		return $this->db->get( 'tb_solusi' )->result_array();
	}

	public function get_schedule_two_days_ago($perawat, $shift, $nowdate, $two_days_ago, $order)
	{
		$this->db->where( array( 
				'date <' => $nowdate, 
				'date >=' => $two_days_ago 
			) );
		
		if( $perawat ){
			$this->db->where( 'NIP', $perawat );
		}

		if( $shift ){
			$this->db->where( 'shift', $shift );
		}

		$this->db->order_by( 'date', $order );

		return $this->db->get( 'tb_solusi' )->result_array();
	}

	public function insert_schedule($data)
	{
		$this->db->insert( 'tb_solusi', $data );

		return $this->db->insert_id();
	}

	public function update_schedule($id, $data)
	{
		$this->db->where( 'ID', $id );

		return $this->db->update( 'tb_solusi', $data );
	}

	public function delete_schedule($nip, $shift, $date)
	{
		$this->db->where( 'NIP', $nip );
		$this->db->where( 'shift', $shift );
		$this->db->where( 'date', $date );

		return $this->db->delete( 'tb_solusi' );
	}

	// public function delete_perawat($id)
	// {
	// 	$this->db->where( 'ID', $id );
	// 	return $this->db->delete( 'tb_solusi' );
	// }
}

