<?php
/**
 * Description of course
 *
 * @author Administrator
 */
class Mdl_perencanaan extends CI_Model{
    private $table_program='program';

    function __construct() {
	parent::__construct();
    }
    /**
     * CRUD Course
     */
    
    function get_program($thn){
        $program = $this->db->get_where('program',array('tahun_program'=>$thn))->order_by("id", "asc"); 
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return FALSE;
        }
    }
    
    function get_program_by_id($id){
        $program = $this->db->get_where('program',array('id'=>$id));
        if($program->num_rows()==1){
            return $program->row_array();
        }else{
            return FALSE;
        }
    }
    
    function get_kategori(){
        $kategori = $this->db->get('kategori');
        if($kategori->num_rows()>0){
            return $kategori->result_array();
        }else{
            return FALSE;
        }
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