<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Jabatan extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_Jabatan');

		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s: tidak boleh kosong ...');
		$this->form_validation->set_message('is_unique', '%s: sudah terdaftar ...');
	}

	public function index()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Daftar Jabatan';
		$data['section']	= 'jabatan';
		$data['template']	= 'jabatan.php';

		$occupation 		= $this->m_Jabatan->get_jabatan();
		$jabatan = [];
		if( $occupation ){
			foreach ($occupation as $key => $value) {
				$array = (array) $value;
				$count = $this->m_Jabatan->count_jabatan($array['slug']);
				$array['count'] = $count;
				$jabatan[] = (object) $array;
			}
		}

		$data['jabatan'] 	= $jabatan;

		$this->load->view( 'index', $data );
	}

	public function add_jabatan()
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Tambah Jabatan';
		$data['section']	= 'add-jabatan';
		$data['template']	= 'add-jabatan.php';

		$this->load->view( 'index', $data );
	}

	public function edit_jabatan($id)
	{
		$data['message']	= $this->session->flashdata('messages');
		$data['type']		= $this->session->flashdata('type');

		$data['title']		= 'Edit Jabatan';
		$data['section']	= 'edit-jabatan';
		$data['template']	= 'edit-jabatan.php';

		$data['jabatan'] 	= $this->m_Jabatan->get_jabatan_by_id($id);

		$this->load->view( 'index', $data );
	}

	public function insert_jabatan()
	{
		$this->form_validation->set_rules( 'slug', 'slug', 'required|is_unique[tb_jabatan.slug]' );

		if( $this->form_validation->run() ) {
			$input['slug'] = $this->input->post('slug');
			$input['name'] = $this->input->post('name');

			$this->session->set_flashdata(
				array(
						'messages'	=> 'Success. View Jabatan',
						'type'		=> 'success'
					)
			);

			$ID = $this->m_Jabatan->insert_jabatan( $input );
			redirect( base_url('c_Jabatan/edit_jabatan/'.$ID) );
		} else {
			$this->session->set_flashdata(
				array(
						'messages' => validation_errors(),
						'type' => 'danger'
					)
			);

			redirect( base_url('c_Jabatan/add_jabatan') );
		}
	}

	public function update_jabatan()
	{
		$this->form_validation->set_rules( 'ID', 'ID', 'required' );
		
		$id = $this->input->post('ID');

		if( $this->form_validation->run() ) {
			$update['slug'] = $this->input->post('slug');
			$update['name'] = $this->input->post('name');

			$this->session->set_flashdata(
				array(
						'messages'	=> 'Success. View Jabatan',
						'type'		=> 'success'
					)
			);

			$this->m_Jabatan->update_jabatan( $id, $update );

			redirect( base_url('c_Jabatan/edit_jabatan/'.$id) );
		} else {
			$this->session->set_flashdata(
				array(
						'messages' => validation_errors(),
						'type' => 'danger'
					)
			);

			redirect( base_url('c_Jabatan/edit_jabatan/'.$id) );
		}
	}

	public function delete_jabatan($id){
		$this->m_Jabatan->delete_jabatan($id);
		
		$this->session->set_flashdata( 
			array(
					'messages' => 'Data berhasil dihapus',
					'type' => 'success'
			)
		);
		
		redirect( base_url('c_Jabatan') );
	}
}