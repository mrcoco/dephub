<?php
class Mdl_inst extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_byid_inst($id){
        $this->db->where('id',$id);
        return $this->db->get('instansi')->row_array();
    }
    
    function get_all_inst(){
        return $this->db->get('instansi')->result_array();
    }
    
    function insert_inst($data){
        $this->db->insert('instansi',$data);
    }
    
    function update_inst($data,$id){
        $this->db->where('id',$id);
        $this->db->update('instansi',$data);
    }
    
    function delete_inst($id){
        $this->db->where('id',$id);
        $this->db->delete('instansi');
    }
    
    function get_array_inst(){
        $array=$this->db->get('instansi')->result_array();
        foreach($array as $a){
            $res[$a['kode_kantor']]=$a['nama_singkat'];
        }
        return $res;
    }
}