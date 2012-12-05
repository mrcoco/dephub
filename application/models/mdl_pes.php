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
    function get_program_pes($id_pes,$id_diklat){
        $this->db->where('id_peserta',$id_pes);
        $this->db->where('id_diklat',$id_diklat);
        $this->db->join('program','registrasi.id_program=program.id');
        return $this->db->get('registrasi')->row_array();
    }
    
    function login_pes($data){
        $this->db->where($data);
        return $this->db->get('pegawai');
    }
    
    
    function get_detail_pes($kode){
        $this->db->where('id',$kode);
        return $this->db->get('pegawai')->result_array();
    }
    function insert_feedback_pembicara($data){
        $this->db->insert('feedback_pembicara',$data);
    }
    function insert_feedback_diklat($data){
        $this->db->insert('feedback_diklat',$data);
    }
    
    function update_feedback_diklat($data,$clause){
        $this->db->where('id',$clause);
        $this->db->update('feedback_diklat',$data);
    }
    
    function get_feedback_diklat($id){
        $data = $this->db->get_where('feedback_diklat',array('id'=>$id));
        if($data->num_rows()==1){
            return $data->row_array();
        }else{
            return FALSE;
        }
    }
    function get_feedback_diklat_program($id){
        $feedback = $this->db->get_where('feedback_diklat',array('id_program'=>$id));
        if($feedback->num_rows()>0){
            return $feedback->result_array();
        }else{
            return FALSE;
        }
    }
    
    function delete_feedback_diklat($id){
        $this->db->where('id',$clause);
        $this->db->delete('feedback_diklat');
    }
}