<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_User extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_User');

		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s: tidak boleh kosong ...');
		$this->form_validation->set_message('is_unique', '%s: sudah terdaftar ...');
	}

	public function index()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Edit User';
		$data['section']	= 'edit-user';
		$data['template']	= 'edit-user.php';

		$this->load->view( 'index', $data );
	}

	public function logout()
	{
		$this->session->unset_userdata('user');
		$this->session->set_flashdata(
				array(
						'messages' => 'You have been logout. Please log in.',
						'type' => 'success'
					)
			);
		redirect( base_url('Login') );
	}
}