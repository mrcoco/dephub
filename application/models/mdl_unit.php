<?php
class Mdl_unit extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_instansi($kode){
        $this->db->where('kode_kantor',$kode);
        return $this->db->get('instansi')->row()->nama_instansi;
    }
    
    function get_kode_unit($nama){
        $this->db->where('nama_unit',$nama);
        return $this->db->get('unit_kerja')->row()->kode;
    }
    
    function get_list_unit($parent){
        $this->db->where('kode_inst',$parent);
        $arr= $this->db->get('unit_kerja')->result_array();
        $retarr=array();
        foreach($arr as $a){
            $retarr[]=$a['nama_unit'];
        }
        return $retarr;
    }
    
    function get_peserta_by_unit($kode,$thn=''){
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('pegawai.kode_unit',$kode);
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        return $this->db->get('registrasi')->result_array();
    }
    
    function login_unit($data){
        $this->db->where($data);
        return $this->db->get('unit_kerja')->num_rows();
    }
    
    function login_inst($data){
        $this->db->where($data);
        return $this->db->get('instansi')->num_rows();
    }
    
    function get_accepted_peserta_by_inst($kode,$thn=''){
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('pegawai.instansi',$kode);
        $this->db->where('registrasi.status !=','daftar');
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        return $this->db->get('registrasi')->result_array();
    }
}