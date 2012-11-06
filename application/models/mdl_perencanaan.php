<?php
class Mdl_perencanaan extends CI_Model{
    private $table_program='program';

    function __construct() {
	parent::__construct();
    }
    /**
     * CRUD Course
     */
    
    function get_all_program($thn){
        $this->db->where('tahun_program',$thn);
        $this->db->or_where('tahun_program','0000');
        $program = $this->db->get('program'); 
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return array();
        }
    }
    
    function get_program($thn){
        $this->db->where('tahun_program',$thn);
        $this->db->or_where('tahun_program !=','0000');
        $program = $this->db->get('program'); 
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return array();
        }
    }
    
    function get_program_by_id($id){
        $program = $this->db->get_where('program',array('id'=>$id,'tahun_program !='=>'0000'));
        if($program->num_rows()==1){
            return $program->row_array();
        }else{
            return FALSE;
        }
    }
    
    function get_kategori(){
        $this->db->where('tahun_program','0000');
        $hasil=$this->db->get('program');
        if($hasil->num_rows()>0){
            return $hasil->result_array();
        }else{
            return array();
        }
    }
    
    function get_kategori_id($id){
        $this->db->where('id',$id);
        $this->db->where('tahun_program','0000');
        $hasil=$this->db->get('program');
        if($hasil->num_rows()>0){
            return $hasil->row_array();
        }else{
            return array();
        }
    }
    
    function insert_kategori($data){
        $this->db->insert('program',$data);
    }
    
    function insert_diklat($data){
        $this->db->insert('program',$data);
    }
    
    function update_diklat($clause,$data){
        $this->db->where('id',$clause);
        $this->db->update('program',$data);
    }
    
    function delete_diklat($id){
        $this->db->where('id',$id);
        $this->db->delete('program');
    }
    
    function insert_feedback_sarpras($data){
        $this->db->insert('feedback_sarpras',$data);
    }
    
    function update_feedback_sarpras($data,$clause){
        $this->db->where('id',$clause);
        $this->db->update('feedback_sarpras',$data);
    }
    
    function get_feedback_sarpras($id){
        $data = $this->db->get_where('feedback_sarpras',array('id'=>$id));
        if($data->num_rows()==1){
            return $data->row_array();
        }else{
            return FALSE;
        }
    }
    function get_feedback_sarpras_program($id){
        $feedback = $this->db->get_where('feedback_sarpras',array('id_program'=>$id));
        if($feedback->num_rows()>0){
            return $feedback->result_array();
        }else{
            return FALSE;
        }
    }
    
    function delete_feedback_sarpras($id){
        $this->db->where('id',$clause);
        $this->db->delete('feedback_sarpras');
    }
}

/* End of file course.php */
/* Location: ./application/models/course.php */