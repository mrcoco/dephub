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
    function get_profil()
    {
	return $this->db->get('about')->result_array();
    }
    function get_profil_id($id)
    {
	$this->db->where('id',$id);
	return $this->db->get('about')->row_array();
    }
    function insert_profil($data){
        $this->db->insert('about',$data);
        return $this->db->insert_id();
    }
    function update_profil($clause,$data){
        $this->db->where('id',$clause);
        $this->db->update('about',$data);
    }
    function delete_profil($clause,$data){
        $this->db->where('id',$clause);
        $this->db->delete('about');
    }
    function get_berita()
    {
        $this->db->order_by('tanggal','desc');
        $this->db->order_by('waktu','desc');
	return $this->db->get('post')->result_array();
    }
    function get_berita_id($id)
    {
	$this->db->where('id',$id);
	return $this->db->get('post')->row_array();
    }
    function insert_berita($data){
        $this->db->insert('post',$data);
        return $this->db->insert_id();
    }
    function update_berita($clause,$data){
        $this->db->where('id',$clause);
        $this->db->update('post',$data);
    }
    function delete_berita($clause,$data){
        $this->db->where('id',$clause);
        $this->db->delete('post');
    }
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