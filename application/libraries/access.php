<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * @author irhamnurhalim
 */
class Access {

    /**
     * Constructor
     */
    public $info;

    function __construct() {
	$this->CI = & get_instance();
	$auth = $this->CI->config->item('auth');
	$this->CI->load->library('session');
	$this->CI->load->helper('cookie');
	$this->CI->load->model('user');
	$this->user = & $this->CI->user;
    }

    /*
     * Cek Login user
     */

    function login($username, $password) {
	$result = $this->user->get_login_info($username)->row();
	if ($username == 4) {
	    $this->info = 'administrator';
	} else if ($username == 1) {
	    $this->info = 'perencanaan';
	} else if ($username == 2) {
	    $this->info = 'penyelenggaraan';
	} else if ($username == 3) {
	    $this->info = 'sarpras';
	}
	if ($result) {
	    $password = md5($password);
	    if ($password === $result->password) {
		// Start Session
		$sess = array(
		    'user_id' => $username,
		    'is_login' => TRUE,
		    'login_info' => $username,
		    $this->info => TRUE,
		    'detail' => $result->name,
		    'link' => $result->link
		);
		$this->CI->session->set_userdata($sess);
		return TRUE;
	    }
	}
	return FALSE;
    }

    /*
     * Cek is login
     */

    function is_perencanaan() {
	return (($this->CI->session->userdata('perencanaan')) ? TRUE : FALSE);
    }

    function is_penyelenggaraan() {
	return (($this->CI->session->userdata('penyelenggaraan')) ? TRUE : FALSE);
    }

    function is_sarpras() {
	return (($this->CI->session->userdata('sarpras')) ? TRUE : FALSE);
    }

    function is_administrator() {
	return (($this->CI->session->userdata('administrator')) ? TRUE : FALSE);
    }

    function is_login() {
	return (($this->CI->session->userdata('is_login')) ? TRUE : FALSE);
    }

    /*
     * Logout
     */

    function logout() {
	$data = array(
	    'user_id',
	    'user_name',
	    'is_login',
	    'login_info',
	    $this->info,
	    'detail',
	    'link'
	);
	$this->CI->session->unset_userdata($data);
	$this->CI->session->sess_destroy();
    }

}

/* End of file access.php */
/* Location: ./application/libraries/access.php */