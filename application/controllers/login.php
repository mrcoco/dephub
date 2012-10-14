<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
	parent::__construct();
	$this->load->library('access');
	$this->load->library('editor');
    }

    function auth() {
	$this->load->library('form_validation');
	$this->load->helper('form');
	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	$this->form_validation->set_rules('token', 'token', 'callback_check_login');

	if ($this->form_validation->run() === FALSE) {
	    redirect('site/dashboard/diklat');
	} else {
//	    $this->session->set_flashdata('msg', '<div class="alert alert-success fade in" id="login_success">Login berhasil</div>');
	    redirect($this->session->userdata('link'));
	}
    }

    function logout() {
	$this->access->logout();
	redirect('site/dashboard/diklat');
    }

    function check_login() {
	$username = $this->input->post('username', TRUE);
	$password = $this->input->post('password', TRUE);

	$login = $this->access->login($username, $password);
	if ($login) {
	    return TRUE;
	} else {
	    $this->session->set_flashdata('msg', '<div class="alert alert-error fade in"><button class="close" data-dismiss="alert">x</button>Password yang Anda masukkan salah!</div>');
	    return FALSE;
	}
    }

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */