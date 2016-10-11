<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Pendidikan extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_Pendidikan');

		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s: tidak boleh kosong ...');
		$this->form_validation->set_message('is_unique', '%s: sudah terdaftar ...');
	}

	public function index()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Daftar Jenjang Pendidikan';
		$data['section']	= 'pendidikan';
		$data['template']	= 'pendidikan.php';

		$data['pendidikan'] = $this->m_Pendidikan->get_pendidikan();

		$this->load->view( 'index', $data );
	}

	public function add_pendidikan()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Tambah Jenjang Pendidikan';
		$data['section']	= 'add-pendidikan';
		$data['template']	= 'add-pendidikan.php';

		$this->load->view( 'index', $data );
	}

	public function edit_pendidikan($id)
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Edit Jenjang Pendidikan';
		$data['section']	= 'edit-pendidikan';
		$data['template']	= 'edit-pendidikan.php';

		$data['pendidikan'] = $this->m_Pendidikan->get_pendidikan_by_id($id);

		$this->load->view( 'index', $data );
	}

	public function insert_pendidikan()
	{
		$this->form_validation->set_rules( 'slug', 'slug', 'required|is_unique[tb_pendidikan.slug]' );

		if( $this->form_validation->run() ) {
			$input['slug'] = $this->input->post('slug');
			$input['name'] = $this->input->post('name');

			$this->session->set_flashdata(
				array(
						'messages'	=> 'Success. View Jenjang Pendidikan',
						'type'		=> 'success'
					)
			);

			$ID = $this->m_Pendidikan->insert_pendidikan( $input );
			redirect( base_url('c_Pendidikan/edit_pendidikan/'.$ID) );
		} else {
			$this->session->set_flashdata(
				array(
						'messages' => validation_errors(),
						'type' => 'danger'
					)
			);

			redirect( base_url('c_Pendidikan/add_pendidikan') );
		}
	}

	public function update_pendidikan()
	{
		$this->form_validation->set_rules( 'ID', 'ID', 'required' );
		
		$id = $this->input->post('ID');

		if( $this->form_validation->run() ) {
			$update['slug'] = $this->input->post('slug');
			$update['name'] = $this->input->post('name');

			$this->session->set_flashdata(
				array(
						'messages'	=> 'Success. View Jenjang Pendidikan',
						'type'		=> 'success'
					)
			);

			$this->m_Pendidikan->update_pendidikan( $id, $update );

			redirect( base_url('c_Pendidikan/edit_pendidikan/'.$id) );
		} else {
			$this->session->set_flashdata(
				array(
						'messages' => validation_errors(),
						'type' => 'danger'
					)
			);

			redirect( base_url('c_Pendidikan/edit_pendidikan/'.$id) );
		}
	}

	public function delete_pendidikan($id){
		$this->m_Pendidikan->delete_pendidikan($id);
		
		$this->session->set_flashdata( 
			array(
					'messages' => 'Data berhasil dihapus',
					'type' => 'success'
			)
		);
		
		redirect( base_url('c_Pendidikan') );
	}
}