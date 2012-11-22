<?php
class Mdl_pes extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    
    function get_diklat_pes($kode){
        $this->db->where('id_peserta',$kode);
        $this->db->join('program','registrasi.id_diklat=program.id');
        return $this->db->get('registrasi')->result_array();
    }
    
    function login_pes($data){
        $this->db->where($data);
        return $this->db->get('pegawai');
    }
    
    
    function get_detail_pes($kode){
        $this->db->where('id',$kode);
        return $this->db->get('pegawai')->result_array();
    }
}