<?php
class Mdl_elibrary extends CI_Model{
	
    function __construct() {
	parent::__construct();
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
		
	}
	function get_bibliography_by_title($title) {
	$bibliography = $this->db->get_where('elib_bibliography',array('title'=>$title)); 
        if($bibliography->num_rows()>0){
            return $bibliography->result_array();
        }else{
            return FALSE;
        }
		
	}
	function get_bibliography_by_category($category) {
		$bibliography = $this->db->get_where('elib_bibliography','category','$category'); 
        if($bibliography->num_rows()>0){
            return $bibliography->result_array();
        }else{
            return FALSE;
        }
	}
	
	function get_bibliography_by_type($type) {
          
		$this->db->where('type',$type);
	$bibliography = $this->db->get_where('elib_bibliography'); 
        if($bibliography->num_rows()>0){
            return $bibliography->result_array();
        }else{
            return FALSE;
        }
	}
	
	function getall_bibliography() {
		
		$bibliography = $this->db->get('elib_bibliography'); 
        if($bibliography->num_rows()>0){
            return $bibliography->result_array();
        }else{
            return FALSE;
        }
	}
	
	function insert_bibliography($data){
	$this->db->insert('elib_bibliography',$data);
	}
	function update_bibliography() {
	}
	function delete_bibliography(){
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