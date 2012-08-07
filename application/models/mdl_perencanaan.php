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
        $this->db->select('id,name,parent');
        $program = $this->db->get_where('program',array('tahun_program'=>$thn));
        if($program->num_rows()>0){
            return $program->result_array();
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
    
}

/* End of file course.php */
/* Location: ./application/models/course.php */