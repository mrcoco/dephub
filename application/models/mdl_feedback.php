<?php
class Mdl_feedback extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    function cek_feedback_diklat($id_program,$id_peserta){
        $this->db->where('id_program',$id_program);
        $this->db->where('id_peserta',$id_peserta);
        return $this->db->get('feedback_diklat')->num_rows();
    }
    function cek_feedback_pengajar($id_program,$id_materi,$id_pengajar,$id_peserta){
        $this->db->where('id_materi',$id_materi);
        $this->db->where('id_pengajar',$id_pengajar);
        $this->db->where('id_program',$id_program);
        $this->db->where('id_peserta',$id_peserta);
        return $this->db->get('feedback_pengajar')->num_rows();
    }
    
    function getlist_pertanyaan(){
        $this->db->where('id_kategori !=',0);
        return $this->db->get('feedback_diklat_pertanyaan')->result_array();
    }
    function getlist_pertanyaan_pengajar(){
        $this->db->where('id_kategori',0);
        return $this->db->get('feedback_diklat_pertanyaan')->result_array();
    }
    
    function getlist_pertanyaan_by_kategori($id){
        $this->db->where('id_kategori',$id);
        return $this->db->get('feedback_diklat_pertanyaan')->result_array();
    }
    
    function insert_pertanyaan($data){
        $this->db->insert('feedback_diklat_pertanyaan',$data);
    }
    function insert_feedback_diklat($data){
        $this->db->insert('feedback_diklat',$data);
    }
    function insert_feedback_pengajar($data){
        $this->db->insert('feedback_pengajar',$data);
    }
    function insert_saran_diklat($data){
        $this->db->insert('feedback_saran',$data);
    }
    function insert_saran_pengajar($data){
        $this->db->insert('feedback_saran_pengajar',$data);
    }
    
    function getbyid_pertanyaan($id){
        $this->db->where('id_pertanyaan',$id);
        return $this->db->get('feedback_diklat_pertanyaan')->row_array();
    }
    
    function delete_pertanyaan($clause){
        $this->db->where('id_pertanyaan',$clause);
        $this->db->delete('feedback_diklat_pertanyaan');
    }
    
    function update_pertanyaan($data,$clause){
        $this->db->where('id_pertanyaan',$clause);
        $this->db->update('feedback_diklat_pertanyaan',$data);
    }
    
    function getall_kategori(){
        return $this->db->get('feedback_diklat_kategori')->result_array();
    }
    
    function insert_kategori($data){
        $this->db->insert('feedback_diklat_kategori',$data);
    }
    
    function delete_kategori($id){
        $this->db->where('id_kategori',$id);
        $this->db->delete('feedback_diklat_kategori');
    }
    
    function update_kategori($data,$id){
        $this->db->where('id_kategori',$id);
        $this->db->update('feedback_diklat_kategori',$data);
    }
}