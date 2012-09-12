<?php
class Mdl_administrator extends CI_Model{
    private $table_info='info';
    private $table_user='user';

    function __construct() {
	parent::__construct();
    }
    /**
     * CRUD Administrator
     */

    function get_info()
    {
	return $this->db->get($this->table_info);
    }

    function set_info($data)
    {
	$this->db->where('id',1);
	return $this->db->update($this->table_info,$data);
    }

    function get_link($var)
    {
	$this->db->where('id',$var);
	return $this->db->get($this->table_user);
    }

    function update_link($data)
    {
	$this->db->where('id',1);
	$this->db->update($this->table_user,$data['perencanaan']);
	$this->db->where('id',2);
	$this->db->update($this->table_user,$data['penyelenggaraan']);
	$this->db->where('id',3);
	$this->db->update($this->table_user,$data['sarpras']);
	$this->db->where('id',4);
	$this->db->update($this->table_user,$data['administrator']);
	return TRUE;
    }

    function get_user_info()
    {
	return $this->db->get($this->table_user);
    }

    function validate_password($username,$password)
    {
	$this->db->where('id',$username);
	$q=$this->db->get($this->table_user)->row();
	if($q->password == $password)
	{
	    return TRUE;
	} else {
	    return FALSE;
	}
    }

    function update_password($username,$password)
    {
	$this->db->where('id',$username);
	return $this->db->update($this->table_user,array('password'=>md5($password)));
    }
}

/* End of file mdl_administrator.php */
/* Location: ./application/models/mdl_administrator.php */