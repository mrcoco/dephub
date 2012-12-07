<?php
class Mdl_feedback extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function getlist_pertanyaan(){
        return $this->db->get('feedback_diklat_pertanyaan')->result_array();
    }
    
    function getlist_pertanyaan_by_kategori($id){
        $this->db->where('id_kategori',$id);
        return $this->db->get('feedback_diklat_pertanyaan')->result_array();
    }
    
    function insert_pertanyaan($data){
        $this->db->insert('feedback_diklat_pertanyaan',$data);
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