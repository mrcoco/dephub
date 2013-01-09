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
	$this->CI->load->library('session');
	$this->CI->load->model('user');
	$this->user = & $this->CI->user;
    }

    /*
     * Cek Login user
     */

    function login($username, $password) {
        $result=$this->user->login($username,$password);
        
        if($result){
            $data_session=array(
                'id',
                'nama',
                'id_role',
                'is_login'
            );
            $this->CI->session->unset_userdata($data_session);
            $this->CI->session->sess_destroy();
            $break_nama=  explode(' ', $result['nama']);
            $data_session=array(
                'id'=>$result['id'],
                'nama'=> ucfirst(strtolower($break_nama[0])),
                'id_role'=>$result['id_role'],
                'is_login'=>true
            );
            $this->CI->session->set_userdata($data_session);
            return true;
        }else{
            return false;
        }
    }

    /*
     * Logout
     */

    function logout() {
	$data_session=array(
            'nama',
            'id_role',
            'is_login'
        );
	$this->CI->session->unset_userdata($data_session);
	$this->CI->session->sess_destroy();
    }

}

/* End of file access.php */
/* Location: ./application/libraries/access.php */