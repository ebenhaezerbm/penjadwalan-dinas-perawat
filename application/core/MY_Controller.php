<?php

class MY_Controller extends CI_Controller
{
	protected $user;
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('M_User');
		
		$user	= $this->session->userdata('user');
		if( !$user )
		{ 
			redirect(base_url('login'));
		}
		// $this->m_User->get_user_by_id($user['ID']);
	}
	
	protected function _get_pagination_common_config()
	{
		$config["per_page"] 		= 5;
		$config["full_tag_open"] 	= '<ul class="pagination" style="width: 100%;">';
		$config["full_tag_close"] 	= "</ul>";
		$config["num_tag_open"] 	= "<li>";
		$config["num_tag_close"] 	= "</li>";
		$config["cur_tag_open"] 	= '<li class="active"><a href="">';
		$config["cur_tag_close"] 	= "</a></li>";
		$config["prev_link"] 		= '&laquo;';
		$config["prev_tag_open"] 	= '<li>';
		$config["prev_tag_close"] 	= "</li>";
		$config["next_link"] 		= '&raquo;';
		$config["next_tag_open"] 	= '<li>';
		$config["next_tag_close"] 	= "</li>";
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li>';
		$config['last_tag_close'] 	= '</li>';
		$config['first_link'] 		= 'Start';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';

		return $config;
	}
}

