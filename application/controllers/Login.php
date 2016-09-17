<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('m_User');

        $this->load->library('form_validation');
        $this->form_validation->set_message('required', '%s: tidak boleh kosong ...');
        $this->form_validation->set_message('is_unique', '%s: sudah terdaftar ...');
    }

    public function index() {
        $data['message'] = $this->session->flashdata('messages');
        $data['type'] = $this->session->flashdata('type');

        $data['title'] = 'Administrator Login';
        $data['section'] = 'login';
        $data['template'] = 'page-login.php';

        $this->load->view('page-login', $data);
    }

    public function validate_user() {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $query = $this->m_User->login($username, $password);

        if ($query != NULL) {
            $login = array(
                'ID' => $query->ID,
                'username' => $query->username,
                'user_role' => $query->role,
                'user_group' => $query->group,
            );

            $this->session->set_userdata('user', $login);

            redirect(base_url());
        } else {
            $this->session->set_flashdata(
                array(
                    'messages' => 'Invalid username or password!',
                    'type' => 'danger',
                )
            );

            redirect(base_url('Login'));
        }
    }
}