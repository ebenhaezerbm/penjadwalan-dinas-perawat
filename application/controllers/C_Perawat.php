<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Perawat extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_Perawat');
		$this->load->model('m_Jabatan');
		$this->load->model('m_Pendidikan');

		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s: tidak boleh kosong ...');
		$this->form_validation->set_message('is_unique', '%s: sudah terdaftar ...');
	}

	public function index()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Data Perawat';
		$data['section']	= 'all-perawat';
		$data['template']	= 'all-perawat.php';

		$data['perawat'] 	= $this->m_Perawat->get_perawat();

		$this->load->view( 'index', $data );
	}

	public function add_perawat()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Tambah Perawat';
		$data['section']	= 'add-perawat';
		$data['template']	= 'add-perawat.php';

		$data['jabatan'] 	= $this->m_Jabatan->get_jabatan();
		$data['pendidikan'] = $this->m_Pendidikan->get_pendidikan();

		$this->load->view( 'index', $data );
	}

	public function edit_perawat($id)
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Edit Data Perawat';
		$data['section']	= 'edit-perawat';
		$data['template']	= 'edit-perawat.php';

		$data['perawat'] 	= $this->m_Perawat->get_perawat_by_id($id);
		$data['jabatan'] 	= $this->m_Jabatan->get_jabatan();
		$data['pendidikan'] = $this->m_Pendidikan->get_pendidikan();

		$this->load->view( 'index', $data );
	}

	public function insert_perawat()
	{
		$this->form_validation->set_rules( 'nip', 'NIP', 'required|is_unique[tb_perawat.nip]' );

		if( $this->form_validation->run() ) {
			$input['nip'] 				= $this->input->post('nip');
			$input['name'] 				= $this->input->post('name');
			$input['gender'] 			= $this->input->post('gender');
			$input['date_of_birth'] 	= $this->input->post('date_of_birth');
			$input['place_of_birth'] 	= $this->input->post('place_of_birth');
			$input['address'] 			= $this->input->post('address');
			$input['education'] 		= $this->input->post('education');
			$input['occupation'] 		= $this->input->post('occupation');
			$input['phone'] 			= $this->input->post('phone');

			$this->session->set_flashdata(
				array(
						'messages'	=> 'Success! <a href='.base_url('c_Perawat/add_perawat').'>Add New.</a>',
						'type'		=> 'success'
					)
			);

			$ID = $this->m_Perawat->insert_perawat( $input );
			redirect( base_url('c_Perawat/edit_perawat/'.$ID) );
		} else {
			$this->session->set_flashdata(
				array(
						'messages' => validation_errors(),
						'type' => 'danger'
					)
			);

			redirect( base_url('c_Perawat/add_perawat') );
		}
	}

	public function update_perawat()
	{
		$this->form_validation->set_rules( 'ID', 'ID', 'required' );
		
		$id = $this->input->post('ID');

		if( $this->form_validation->run() ) {
			$update['nip'] 				= $this->input->post('nip');
			$update['name'] 			= $this->input->post('name');
			$update['gender'] 			= $this->input->post('gender');
			$update['date_of_birth'] 	= $this->input->post('date_of_birth');
			$update['place_of_birth'] 	= $this->input->post('place_of_birth');
			$update['address'] 			= $this->input->post('address');
			$update['education'] 		= $this->input->post('education');
			$update['occupation'] 		= $this->input->post('occupation');
			$update['phone'] 			= $this->input->post('phone');

			$this->session->set_flashdata(
				array(
						'messages'	=> 'Success! <a href='.base_url('c_Perawat').'>View Perawat.</a>',
						'type'		=> 'success'
					)
			);

			$this->m_Perawat->update_perawat( $id, $update );

			redirect( base_url('c_Perawat/edit_perawat/'.$id) );
		} else {
			$this->session->set_flashdata(
				array(
						'messages' => validation_errors(),
						'type' => 'danger'
					)
			);

			redirect( base_url('c_Perawat/edit_perawat/'.$id) );
		}
	}

	public function delete_perawat($id){
		$this->m_Perawat->delete_perawat($id);
		
		$this->session->set_flashdata( 
			array(
					'messages' => 'Data berhasil dihapus',
					'type' => 'success'
			)
		);
		
		$response = array(
			'redirect' => base_url('c_Perawat') 
		);

		echo json_encode($response);

		exit();
	}
}