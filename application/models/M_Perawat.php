<?php

class M_Perawat extends CI_Model {
	
	public function get_perawat($limit=false, $offset=false)
	{
		$this->db->order_by( 'id', 'desc' );
		
		if( $limit ){
			$this->db->limit($limit, $offset);
		}

		return $this->db->get( 'tb_perawat' )->result_array();
	}

	public function count_perawat(){
		return $this->db->count_all('tb_perawat');
	}

	public function get_perawat_by_id($id)
	{
		$this->db->where( 'ID', $id );
		
		return $this->db->get( 'tb_perawat' )->row();
	}

	public function insert_perawat($data)
	{
		$this->db->insert( 'tb_perawat', $data );
		
		return $this->db->insert_id();
	}

	public function update_perawat($id, $data)
	{
		$this->db->where( 'ID', $id );
		
		return $this->db->update( 'tb_perawat', $data );
	}

	public function delete_perawat($id)
	{
		$this->db->where( 'ID', $id );
		
		return $this->db->delete( 'tb_perawat' );
	}
}

