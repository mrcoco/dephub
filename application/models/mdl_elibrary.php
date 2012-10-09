<?php
class Mdl_elibrary extends CI_Model{
	
    function __construct() {
	parent::__construct();
        $this->load->helper('file');
    }
    /**
     * CRUD elibrary
     */
    function get_category() {
	
	}
    function insert_category(){
	}
    function update_category(){
	}
    function delete_category(){
	}
	
        function get_bibliography_by_id($id) {
            $bibliography = $this->db->get_where('elib_bibliography',array('id'=>$id)); 
            
                return $bibliography->result_array();
            
	}
        
	function get_bibliography_by_title($title) {
            $bibliography = $this->db->get_where('elib_bibliography',array('title'=>$title)); 
            
                return $bibliography->result_array();
            
		
	}
	function get_bibliography_by_category($category) {
		$bibliography = $this->db->get_where('elib_bibliography','category','$category'); 
            
                return $bibliography->result_array();
            
        }
	
	function get_bibliography_by_type($type) {
          
		$this->db->where('type',$type);
                $bibliography = $this->db->get_where('elib_bibliography'); 

                    return $bibliography->result_array();

                }
	
	function getall_bibliography() {
		
		$bibliography = $this->db->get('elib_bibliography'); 
                return $bibliography->result_array();
                
	}
	
	function insert_bibliography($data){
	$this->db->insert('elib_bibliography',$data);
	}
	function update_bibliography($data) {
            $this->db->where('id',$data['id']);
            $this->db->update('elib_bibliography',$data);
            
            
	}
	function delete_bibliography($id){
            $this->db->where('id',$id);
            
            $this->db->delete('elib_bibliography');
            
	}
	function search_bibliography_by_title_or_author($string){
            $this->db->like('title', $string); 
            //$this->db->or_like('author', $string);
            $bibliography= $this->db->get('elib_bibliography');
            return $bibliography->result_array();
            
        }
        function search_bibliography_by_author(){
            
            
        }
	function get_anggota(){
	}
	function insert_anggota(){
	}
	function update_anggota(){
	}
	function delete_anggota(){
	}
	
	function get_userrole(){
	}
	function insert_userrole(){
	}
	function update_userrole(){
	}
	function delete_userrole(){
	}
}

/* End of file mdl_elibrary.php */
/* Location: ./application/models/mdl_elibrary.php */