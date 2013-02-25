<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
    public $table_user='user';


    function __construct() {
	parent::__construct();
    }

    function login($usr,$pwd){
	
        $this->load->helper('ldap_helper');
        
        if(auth($usr,$pwd)){
            $where=array('username'=>$usr,'password'=>md5($pwd));

            $this->db->join('role','pegawai.id=role.id_pegawai','left');
            $res=$this->db->get_where('pegawai',$where);
            
            var_dump($res->num_rows()>0);
            die();
            if($res->num_rows()>0){
                return $res->row_array();
            }else{
                return false;
            }
        }else{
            return false;
        }
        die();
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */