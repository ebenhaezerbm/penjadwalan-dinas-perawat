<?php

class M_Jabatan extends CI_Model {
	
	public function get_jabatan()
	{
		$this->db->order_by( 'ID', 'desc' );
		return $this->db->get( 'tb_jabatan' )->result();
	}

	public function count_jabatan($title)
	{
		$this->db->where( 'occupation', $title );
		return $this->db->count_all_results('tb_perawat');
	}

	public function get_jabatan_by_id($id)
	{
		$this->db->where( 'ID', $id );
		return $this->db->get( 'tb_jabatan' )->row();
	}

	public function get_jabatan_by_slug($slug)
	{
		$this->db->where( 'slug', $slug );
		return $this->db->get( 'tb_jabatan' )->row();
	}

	public function insert_jabatan($data)
	{
		$this->db->insert( 'tb_jabatan', $data );
		return $this->db->insert_id();
	}

	public function update_jabatan($id, $data)
	{
		$this->db->where( 'ID', $id );
		return $this->db->update( 'tb_jabatan', $data );
	}

	public function delete_jabatan($id)
	{
		$this->db->where( 'ID', $id );
		return $this->db->delete( 'tb_jabatan' );
	}
}

