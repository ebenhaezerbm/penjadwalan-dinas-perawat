<?php

class M_Pendidikan extends CI_Model {
	
	public function get_pendidikan()
	{
		$this->db->order_by( 'ID', 'desc' );
		return $this->db->get( 'tb_pendidikan' )->result();
	}

	public function get_pendidikan_by_id($id)
	{
		$this->db->where( 'ID', $id );
		return $this->db->get( 'tb_pendidikan' )->row();
	}

	public function get_pendidikan_by_slug($slug)
	{
		$this->db->where( 'slug', $slug );
		return $this->db->get( 'tb_pendidikan' )->row();
	}

	public function insert_pendidikan($data)
	{
		$this->db->insert( 'tb_pendidikan', $data );
		return $this->db->insert_id();
	}

	public function update_pendidikan($id, $data)
	{
		$this->db->where( 'ID', $id );
		return $this->db->update( 'tb_pendidikan', $data );
	}

	public function delete_pendidikan($id)
	{
		$this->db->where( 'ID', $id );
		return $this->db->delete( 'tb_pendidikan' );
	}
}

