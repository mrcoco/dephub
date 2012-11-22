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
        $this->db->where(array('tahun_program'=>$thn,'tipe'=>3));
        $this->db->or_where('tipe',1);
        $this->db->or_where('tipe',2);
        $program = $this->db->get('program'); 
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return array();
        }
    }
    
    function get_program($thn){
        $program = $this->db->get_where('program',array('tahun_program'=>$thn,'tipe'=>3));
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return array();
        }
    }
    
    function get_program_by_parent($parent,$thn){
        $program = $this->db->get_where('program',array('tahun_program'=>$thn,'tipe'=>3,'parent'=>$parent));
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return array();
        }
    }
    
    function get_program_by_id($id){
        $program = $this->db->get_where('program',array('id'=>$id,'tipe'=>3));
        if($program->num_rows()==1){
            return $program->row_array();
        }else{
            return FALSE;
        }
    }
    
    
    
    function get_diklat($thn){
        $program = $this->db->get_where('program',array('tipe'=>2));
        if($program->num_rows()>0){
            return $program->result_array();
        }else{
            return array();
        }
    }
    
    function get_diklat_by_id($id){
        $program = $this->db->get_where('program',array('id'=>$id,'tipe'=>2));
        if($program->num_rows()==1){
            return $program->row_array();
        }else{
            return FALSE;
        }
    }
    
    function get_kategori(){
        $this->db->where('tipe','1');
        $hasil=$this->db->get('program');
        if($hasil->num_rows()>0){
            return $hasil->result_array();
        }else{
            return array();
        }
    }
    
    function get_kategori_id($id){
        $this->db->where('id',$id);
        $this->db->where('tipe','1');
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
        return $this->db->insert_id();
    }
    
    function insert_materi_diklat($data){
        $this->db->insert_batch('materi_diklat',$data);
    }
    
    function insert_program($data){
        $this->db->insert('program',$data);
        return $this->db->insert_id();
    }
    
    function update_diklat($clause,$data){
        $this->db->where('id',$clause);
        $this->db->update('program',$data);
    }
    
    function update_program($clause,$data){
        $this->db->where('id',$clause);
        $this->db->update('program',$data);
    }
    
    function delete_diklat($id){
        $this->db->where('id',$id);
        $this->db->delete('program');
    }
    
    function delete_kategori($id){
        $this->db->where('id',$id);
        $this->db->delete('program');
    }
    
    function delete_program($id){
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
    
    function get_list_pendidikan(){
        $temp=$this->db->get('tingkatdik')->result_array();
        $retval = array(-1=>'-- pilih --');
        foreach($temp as $t){
            $retval[$t['id']]=$t['tingkatdik'];
        }
        return $retval;
    }
    
    function get_pangkat_gol(){
        $temp=$this->db->get('golongan')->result_array();
        $retval = array(-1=>'-- pilih --');
        foreach($temp as $t){
            $retval[$t['id']]=$t['golongan'].'-'.$t['pangkat'];
        }
        return $retval;
    }
    
    function get_all_materi(){
        return $this->db->get('materi')->result_array();
    }
    
    function get_materi($id){
        return $this->db->get_where('materi',array('id'=>$id))->row_array();
    }
    
    function insert_materi($data){
        $this->db->insert('materi',$data);
    }
    
    function update_materi($id,$data){
        $this->db->where('id',$id);
        $this->db->update('materi',$data);
    }
    
    function delete_materi($id){
        $this->db->where('id',$id);
        $this->db->delete('materi');
    }
    
    function get_pengajar($id){
        return $this->db->get_where('pengajar',array('id_materi'=>$id))->result_array();
    }
    
    function insert_pengajar($data){
        //cek apakah sudah ada
        $tes=$this->db->get_where('pengajar',$data);
        if($tes->num_rows()==0){
            $this->db->insert('pengajar',$data);
            return true;
        }else{
            return false;
        }
    }
    
    function delete_pengajar($clause){
        $this->db->where($clause);
        $this->db->delete('pengajar');
        return true;
    }
    
    function get_materi_diklat($id){
        $this->db->join('materi','materi.id=materi_diklat.id_materi');
        return $this->db->get_where('materi_diklat',array('id_diklat'=>$id))->result_array();
    }
    
    function delete_materi_diklat($id){
        $this->db->where('id_diklat',$id);
        $this->db->delete('materi_diklat');
    }
}

/* End of file course.php */
/* Location: ./application/models/course.php */