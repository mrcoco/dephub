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
        $this->db->order_by("categoryname", "asc");
        
	$category= $this->db->get('elib_category');
        return $category->result_array();
	}
     
        public function count_category() {

        return $this->db->count_all("elib_category");

        }
        
     function get_category_pagination($limit,$start) {
            $this->db->order_by("categoryname", "asc");
            $data = $this->db->get('elib_category',$limit,$start); 
            return $data->result_array();
	}
        
     function get_id_category_by_name($nama){
         $this->db->select('idcategory');
         $category= $this->db->get_where('elib_category',array('categoryname'=>$nama));
         $row=$category->row();
         return $row->idcategory;
     }
     function get_name_category_by_id($id){
         $this->db->select('categoryname');
         $category= $this->db->get_where('elib_category',array('idcategory'=>$id));
         $row=$category->row();
         return $row->categoryname;
     }
    function insert_category($data){
        $this->db->insert('elib_category',$data);
	}
    function update_category(){
	}
    function count_bibliography_by_idcategory($id){
        $this->db->where("idcategory",$id);
        return $this->db->count_all_results("elib_bibliography");
        
    }
    function count_books_by_idcategory($id){
        $this->db->where("idcategory",$id);
        return $this->db->count_all_results("elib_books");
        
    }
    function delete_category($id){
        if (count_books_by_idcategory($id)>0 ||count_bibliography_by_idcategory($id)>0){
            //Category tidak bisa di delete karena masih ada buku yang terkoneksi
            return FALSE;
        }
        else {
            $this->db->delete('elib_category', array('id' => $id)); 
            return TRUE;
            //category bisa didelete karena tidak ada buku yang terkoneksi
        }
        
    }
	
        function get_bibliography_by_id($id) {
            $this->db->select('*');
            $this->db->from('elib_bibliography');
            $this->db->join('elib_category', 'elib_category.idcategory = elib_bibliography.idcategory','left');  
            $this->db->join('elib_author', 'elib_author.idauthor = elib_bibliography.idauthor','left');
            $this->db->where(array('elib_bibliography.id'=>$id)); 
            $bibliography = $this->db->get(); 
            
                return $bibliography->result_array();
            
	}
        
	function get_bibliography_by_title($title) {
            $bibliography = $this->db->get_where('elib_bibliography',array('title'=>$title)); 
            
                return $bibliography->result_array();
            
		
	}
	
	
        function count_bibliography_by_type ($type){
            $this->db->where('type',$type);
            return $this->db->count_all("elib_bibliography");
            
        }
        function count_bibliography_by_category ($category){
            $this->db->where('category',$category);
            return $this->db->count_all("elib_bibliography");
            
        }
        function get_bibliography_by_category($category,$limit,$start) {
            $this->db->select('*');
            $this->db->from('elib_bibliography');
            $this->db->join('elib_category', 'elib_category.idcategory = elib_bibliography.idcategory','left');  
            $this->db->join('elib_author', 'elib_author.idauthor = elib_bibliography.idauthor','left');
            $this->db->where(array('elib_bibliography.idcategory'=>$category)); 
            $this->db->limit($limit,$start);
            $bibliography = $this->db->get(); 
            
                return $bibliography->result_array();
            
	}
	function get_bibliography_by_type($type,$limit,$start) {
          
		$this->db->where('type',$type);
                $this->db->limit($limit,$start);
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
            if($this->db->update('elib_bibliography',$data))
                    return true;
            else return false;
            
            
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
        
        function search_books_by_title_or_author($string){
            $this->db->like('title', $string); 
            //$this->db->or_like('author', $string);
            $books= $this->db->get('elib_books');
            return $books->result_array();
            
        }
        function search_bibliography_by_author(){
            
            
        }
	
        function get_books(){
	}
        function get_books_by_id($id) {
            $this->db->select('*');
            $this->db->from('elib_books');
            $this->db->join('elib_category', 'elib_category.idcategory = elib_books.idcategory','left');  
            $this->db->join('elib_author', 'elib_author.idauthor = elib_books.idauthor','left');
            $this->db->where(array('elib_books.id'=>$id)); 
            $books = $this->db->get(); 
            
                return $books->result_array();
            
	}
        function get_books_by_category($category) {
            $this->db->select('*');
            $this->db->from('elib_books');
            $this->db->join('elib_category', 'elib_category.idcategory = elib_books.idcategory','left');  
            $this->db->join('elib_author', 'elib_author.idauthor = elib_books.idauthor','left');
            $this->db->where(array('elib_books.idcategory'=>$category)); 
            $books = $this->db->get(); 
            
                return $books->result_array();
            
	}
	function insert_books($data){
            $this->db->insert('elib_books',$data);
            
	}
	function update_books($data){
            $this->db->where('id',$data['id']);
            if($this->db->update('elib_books',$data))
                    return true;
            else return false;
            
	}
	function delete_books(){
            $this->db->where('id',$id);
            
            $this->db->delete('elib_books');
	}
        public function count_user() {

        return $this->db->count_all("pegawai");

        }

        function get_user($limit,$start){
//            $this->db->order_by("nama", "asc");
            $user = $this->db->get('pegawai',$limit,$start); 
            return $user->result_array();
	}
	
        
	function get_userrole(){
	}
	function insert_userrole(){
	}
	function update_userrole(){
	}
	function delete_userrole(){
	}
        //author
        function get_id_author_by_name($nama){
         $this->db->select('idauthor');
         $author= $this->db->get_where('elib_author',array('authorname'=>$nama));
         $row=$author->row();
         return $row->idauthor;
        }
        public function count_author() {

        return $this->db->count_all("elib_author");

        }
        function get_author() {
        $this->db->order_by("authorname", "asc");
        
	$author= $this->db->get('elib_author');
        return $author->result_array();
	}
        
        function get_author_pagination($limit,$start) {
            $this->db->order_by("authorname", "asc");
            $data = $this->db->get('elib_author',$limit,$start); 
            return $data->result_array();
	}
        
        function insert_author($data){
        $this->db->insert('elib_author',$data);
	}
        
        function check_author($string){
            $this->db->where('authorname',$string); 
            $data=$this->db->get('elib_author');
            if ($data->num_rows() > 0) {
            return true;
            } 
            else return false;

            
        }
}

/* End of file mdl_elibrary.php */
/* Location: ./application/models/mdl_elibrary.php */