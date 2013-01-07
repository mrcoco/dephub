<?php
class Mdl_user extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_list_user(){
        $this->db->join('role','pegawai.id=role.id_pegawai');
        return $this->db->get('pegawai')->result_array();
    }
    
    function nama_role(){
        $role =  $this->db->get('list_role')->result_array();
        foreach($role as $r){
            $ret[$r['id']]=$r['nama'];
        }
        return $ret;
    }
    
}