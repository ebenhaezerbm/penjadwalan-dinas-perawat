<?php

class M_User extends CI_Model {
	
	public function login($username, $password)
	{
		$this->db->where( 'username', $username );
		$this->db->where( 'password', $password );
		return $this->db->get('tb_users')->row();
	}

	public function count_user()
	{
		return $this->db->count_all('tb_users');
	}

	public function create_user($input)
	{
		$this->db->insert( 'tb_users', $input );
	}

	public function get_user_by_id($user_id)
	{
		$this->db->select( 'ID, username, email, display_name as name, role' );
		$this->db->where( 'ID', $user_id );
		return $this->db->get( 'tb_users' )->row();
	}

	public function update_user($user_id, $update)
	{
		$this->db->where( 'ID', $user_id );
		return $this->db->update( 'tb_users', $update );
	}
}

