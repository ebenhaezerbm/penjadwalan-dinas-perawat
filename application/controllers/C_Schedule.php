<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Schedule extends MY_Controller {

	function __construct()
	{
		parent::__construct();

		$this->load->model('m_Perawat');
		$this->load->model('m_Pendidikan');
		$this->load->model('m_Jabatan');

		$this->load->library('form_validation');
		$this->form_validation->set_message('required', '%s: tidak boleh kosong ...');
		$this->form_validation->set_message('is_unique', '%s: sudah terdaftar ...');
	}

	public function index()
	{
		$data['title']		= 'Jadwal';
		$data['section']	= 'schedule';
		$data['template']	= 'schedule.php';

		$list = days_of_month(); 
		$total_days = count($list);
		$total_shift = 3;
		$index = $total_days * $total_shift;

		$data['perawat'] = $this->m_Perawat->get_perawat();

		$this->load->view( 'index', $data );
	}
}
