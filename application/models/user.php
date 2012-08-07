<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {
    public $table_user='user';


    function __construct() {
	parent::__construct();
    }

    function get_login_info($username){
	$this->db->where('id',$username);
	return $this->db->get($this->table_user);
    }
}

/* End of file user.php */
/* Location: ./application/models/user.php */