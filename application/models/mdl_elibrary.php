<?php
class Mdl_elibrary extends CI_Model{
	
    function __construct() {
	parent::__construct();
        $this->load->helper('file');
        
    }
    /**
     * CRUD elibrary
     */
    /*---------- Elib_Category------------*/
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
     function get_category_by_id($id){
         $this->db->select('*');
         $category= $this->db->get_where('elib_category',array('idcategory'=>$id));
         return $category->result_array();
     }
    function insert_category($data){
        $this->db->insert('elib_category',$data);
	}
    function update_category($data){
        
            $this->db->where('idcategory',$data['idcategory']);
            if($this->db->update('elib_category',$data))
                    return true;
            else return false;
        
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
        
        
            $this->db->delete('elib_category', array('idcategory' => $id)); 
        
        
    }

    /*---------- Elib_Bibliography------------*/        
    
        function get_bibliography_by_id($id) {
            $this->db->select('t1.id,t1.uploaddate,t5.nama,t5.nip,t1.title,t3.authorname, t2.categoryname,t4.jenis,t4.filetypename,t1.location,t1.keterangan,t1.tags');
            $this->db->from('elib_bibliography AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','inner');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','inner');
            $this->db->join('elib_filetype AS t4', 't4.id = t1.type','inner');
            $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','inner');
            $this->db->where(array('t1.id'=>$id)); 
            $bibliography = $this->db->get(); 
            
                return $bibliography->result_array();
            
	}
        
	function get_bibliography_by_title($title) {
            $this->db->select('t1.id,t1.uploaddate,t5.nama,t5.nip,t1.title,t3.authorname, t2.categoryname,t4.jenis,t4.filetypename,t1.location,t1.keterangan,t1.tags');
            $this->db->from('elib_bibliography AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','inner');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','inner');
            $this->db->join('elib_filetype AS t4', 't4.id = t1.type','inner');
            $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','inner');
            $this->db->where(array('title'=>$title));
            $bibliography = $this->db->get(); 
            
                return $bibliography->result_array();
            
		
	}
	
	
        function count_bibliography_by_type ($type){
            $this->db->select('t1.id');
            $this->db->from('elib_bibliography AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','inner');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','inner');
            $this->db->join('elib_filetype AS t4', 't4.id = t1.type','inner');
            $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','inner');
            $this->db->where('t4.jenis',$type);
            return $this->db->count_all_results();
            
        }
        function count_bibliography_by_category ($category){
            $this->db->where('category',$category);
            return $this->db->count_all_results("elib_bibliography");
            
        }
        function get_bibliography_by_category($category,$limit,$start) {
            $this->db->select('t1.id,t1.uploaddate,t5.nama,t5.nip,t1.title,t3.authorname, t2.categoryname,t4.jenis,t4.filetypename,t1.location,t1.keterangan,t1.tags');
            $this->db->from('elib_bibliography AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','inner');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','inner');
            $this->db->join('elib_filetype AS t4', 't4.id = t1.type','inner');
            $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','inner');
            $this->db->where(array('elib_bibliography.idcategory'=>$category)); 
            $this->db->limit($limit,$start);
            $bibliography = $this->db->get(); 
            
                return $bibliography->result_array();
            
	}
	function get_bibliography_by_type($jenis,$limit,$start) {
                $this->db->select('t1.id,t1.uploaddate,t5.nama,t5.nip,t1.title,t3.authorname, t2.categoryname,t4.jenis,t4.filetypename,t1.location,t1.keterangan,t1.tags');
                $this->db->from('elib_bibliography AS t1');
                $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','inner');  
                $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','inner');
                $this->db->join('elib_filetype AS t4', 't4.id = t1.type','inner');
                $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','inner');
		$this->db->where('t4.jenis',$jenis);
                $this->db->limit($limit,$start);
                $bibliography = $this->db->get(); 

                    return $bibliography->result_array();

                }
	
	function getall_bibliography() {
		$this->db->select('t1.id,t1.uploaddate,t5.nama,t5.nip,t1.title,t3.authorname, t2.categoryname,t4.jenis,t4.filetypename,t1.location,t1.keterangan,t1.tags');
                $this->db->from('elib_bibliography AS t1');
                $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','inner');  
                $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','inner');
                $this->db->join('elib_filetype AS t4', 't4.id = t1.type','inner');
                $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','inner');
		$bibliography = $this->db->get(); 
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
        function search_bibliography_by_author(){
            
            
        }
        /*---------- Elib_Books------------*/        
        
        function search_books_by_title_or_author($string){
            $this->db->like('title', $string); 
            //$this->db->or_like('author', $string);
            $books= $this->db->get('elib_books');
            return $books->result_array();
            
        }
        
	
        function get_books(){
	}
        function get_books_by_id($id) {
            $this->db->select('*');
            $this->db->from('elib_books AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','left');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','left');
            $this->db->where(array('t1.id'=>$id)); 
            $books = $this->db->get(); 
            
                return $books->result_array();
            
	}
        function get_books_by_category($category,$limit,$start) {
            $this->db->select('*');
            $this->db->from('elib_books AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','left');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','left');
            $this->db->where(array('elib_books.idcategory'=>$category)); 
            $this->db->limit($limit,$start);
            $books = $this->db->get(); 
            
                return $books->result_array();
            
	}
        function count_books_by_category($category){
            
            $this->db->where('category',$category);
            return $this->db->count_all_results("elib_books");

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
        /*---------- User (tb_pegawai dan Elib_user)------------*/        
        public function count_user() {

        return $this->db->count_all("pegawai");

        }

        function get_user($limit,$start){
            $this->db->select('t1.id, t1.nama, t2.userrole'); //t2.userrole : 0 =biasa, 1=admin, 2=uploader(cuma bisa upload)
            $this->db->from('pegawai AS t1');
//            $this->db->order_by("nama", "asc");
            $this->db->join('elib_userrole AS t2', 't1.id = t2.id','inner');
            $this->db->limit($limit,$start);
            $user = $this->db->get();
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
        /*----------------- Elib_author-----------------*/
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
        function get_author_by_id($id) {
        $this->db->select('*');
            $this->db->from('elib_author');
            $this->db->where(array('idauthor'=>$id)); 
            $author = $this->db->get(); 
            return $author->result_array();
	}
        
        function insert_author($data){ // tidak terpakai
        $this->db->insert('elib_author',$data);
	}
        function update_author($data){
            $this->db->where('idauthor',$data['idauthor']);
            if($this->db->update('elib_author',$data))
                    return true;
            else return false;
        }
        
        function check_author($string){
            $this->db->where('authorname',$string); 
            $data=$this->db->get('elib_author');
            if ($data->num_rows() > 0) {
            return true;
            } 
            else return false;

        }
        function count_bibliography_by_idauthor($id){
        $this->db->where("idauthor",$id);
        return $this->db->count_all_results("elib_bibliography");
        
    }
    function count_books_by_idauthor($id){
        $this->db->where("idauthor",$id);
        return $this->db->count_all_results("elib_books");
        
    }
    function delete_author($id){
         $this->db->delete('elib_author', array('idauthor' => $id)); 
    }
    /*--------------peminjaman elib_loan ------------------*/
    function count_loan(){
        return $this->db->count_all("elib_loan");
    }
    function get_loan($limit,$start){
        
        
	$data= $this->db->get('elib_loan',$limit,$start);
        return $data->result_array();
    }
    function get_loan_by($data,$limit,$start){
        $this->db->where($data);
        
        
            
	$data= $this->db->get('elib_loan',$limit,$start);
        return $data->result_array();
    }
    function insert_loan($data){
        $this->db->insert('elib_loan',$data);
    }
    /*--------------antrian peminjaman elib_queue-----------*/
    function count_queue(){
        return $this->db->count_all("elib_queue");
    }
    function get_queue($limit,$start){
        
        
	$data= $this->db->get('elib_queue',$limit,$start);
        return $data->result_array();
    }
    
    /*---- Elib_filetype-----*/
function get_idfile_by_filetype($string){

         $this->db->select('id');
         $file= $this->db->get_where('elib_filetype',array('filetypename'=>$string));
         $row=$file->row();
         if($row)
         return $row->id;
         else return 0;
     }
function get_jenisfile_by_filetype($string){

         $this->db->select('jenis');
         $file= $this->db->get_where('elib_filetype',array('filetypename'=>$string));
         $row=$file->row();
         if($row>0)
         return $row->jenis;
         else return 0;
     }     
}

/* End of file mdl_elibrary.php */
/* Location: ./application/models/mdl_elibrary.php */