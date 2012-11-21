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
    public function count_category() {
        return $this->db->count_all("elib_category");
        }

     function get_category_by($data=array(),$limit=200,$start=0){
         $this->db->order_by('categoryname','asc');
         $this->db->from('elib_category');
         $this->db->where($data);
         $this->db->limit($limit,$start);
         $result=$this->db->get();
         Return $result->result_array();
     }
     function get_category_like($filter,$limit=200,$start=0){
         $this->db->from('elib_category');
         $this->db->like('categoryname',$filter);
         $this->db->limit($limit,$start);
         $result=$this->db->get();
         Return $result->result_array();
     }
     function count_category_like($filter,$limit=200,$start=0){
         $this->db->like('categoryname',$filter);
         Return $this->db->count_all_results('elib_category');
         
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
       
    function delete_category($id){
        
            $this->db->delete('elib_category', array('idcategory' => $id)); 
    }

    /*---------- Elib_Bibliography------------*/        
    
        function get_bibliography_by($data=array(),$limit=20,$start=0){
            $this->db->select('t1.id,t1.uploaddate,t5.nama,t5.nip,t1.title,t3.authorname, t2.categoryname,t4.jenis,t4.filetypename,t1.location,t1.keterangan,t1.tags');
            $this->db->from('elib_bibliography AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','left');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','left');
            $this->db->join('elib_filetype AS t4', 't4.id = t1.type','left');
            $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','left');
            $this->db->where($data);
            $this->db->limit($limit,$start);
            $bibliography = $this->db->get();
            
            return $bibliography->result_array();
        }
        
        function count_bibliography_by($data=array()){
            $this->db->select('t1.id');
            $this->db->from('elib_bibliography AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','left');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','left');
            $this->db->join('elib_filetype AS t4', 't4.id = t1.type','left');
            $this->db->join('pegawai AS t5', 't5.id = t1.iduploader','left');
            $this->db->where($data);
            return $this->db->count_all_results();
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
        
        function count_bibliography_for_search($string){
                
                
                $this->db->like('elib_bibliography.title', $string); 
                $this->db->or_like('elib_author.authorname',$string);
                $this->db->or_like('elib_bibliography.tags', $string); 
                $this->db->or_like('pegawai.nama', $string); 
                $this->db->from('elib_bibliography');
                $this->db->join('elib_category', 'elib_category.idcategory = elib_bibliography.idcategory','left');  
                $this->db->join('elib_author', 'elib_author.idauthor = elib_bibliography.idauthor','left');
                $this->db->join('elib_filetype', 'elib_filetype.id = elib_bibliography.type','left');
                $this->db->join('pegawai', 'pegawai.id = elib_bibliography.iduploader','left');
                $this->db->like('elib_bibliography.title', $string); 
                $this->db->or_like('elib_author.authorname',$string);
                 return $this->db->count_all_results();
                
        }
	function search_bibliography($string,$limit,$start){
                $this->db->select('elib_bibliography.id,elib_bibliography.uploaddate,pegawai.nama,pegawai.nip,elib_bibliography.title,elib_author.authorname, elib_category.categoryname,elib_filetype.jenis,elib_filetype.filetypename,elib_bibliography.location,elib_bibliography.keterangan,elib_bibliography.tags');
                $this->db->like('elib_bibliography.title', $string); 
                $this->db->or_like('elib_author.authorname',$string);
                $this->db->or_like('elib_bibliography.tags', $string); 
                $this->db->or_like('pegawai.nama', $string); 
                $this->db->from('elib_bibliography');
                $this->db->join('elib_category', 'elib_category.idcategory = elib_bibliography.idcategory','left');  
                $this->db->join('elib_author', 'elib_author.idauthor = elib_bibliography.idauthor','left');
                $this->db->join('elib_filetype', 'elib_filetype.id = elib_bibliography.type','left');
                $this->db->join('pegawai', 'pegawai.id = elib_bibliography.iduploader','left');
                $this->db->limit($limit,$start);
		$bibliography = $this->db->get(); 
                return $bibliography->result_array();
          
            
        }
        function search_bibliography_by_author(){
            
            
        }
        /*---------- Elib_Books------------*/        
        
        function search_books($string,$limit,$start){
            $this->db->select('elib_books.id,elib_books.issnisbn,elib_books.stock,elib_books.title,elib_author.authorname, elib_category.categoryname,elib_books.keterangan,elib_books.tags');
                $this->db->like('elib_books.title', $string); 
                $this->db->or_like('elib_author.authorname',$string);
                $this->db->or_like('elib_books.tags', $string);
                $this->db->or_like('elib_books.issnisbn', $string);
                $this->db->from('elib_books');
                $this->db->join('elib_category', 'elib_category.idcategory = elib_books.idcategory','left');  
                $this->db->join('elib_author', 'elib_author.idauthor = elib_books.idauthor','left');
                
                
                $this->db->limit($limit,$start);
		$books = $this->db->get(); 
                return $books->result_array();
            
        }
        
	function count_books_for_search($string){
                $this->db->from('elib_books');
                $this->db->join('elib_category', 'elib_category.idcategory = elib_books.idcategory','left');  
                $this->db->join('elib_author', 'elib_author.idauthor = elib_books.idauthor','left');
                $this->db->like('elib_books.title', $string); 
                $this->db->or_like('elib_author.authorname',$string);
                $this->db->or_like('elib_books.tags', $string);
                
                return $this->db->count_all_results();
                
        }
        function get_books_by($data=array(),$limit=20,$start=0){
            $this->db->select('t1.*,t2.categoryname,t3.authorname');
            $this->db->from('elib_books AS t1');
            $this->db->join('elib_category AS t2', 't2.idcategory = t1.idcategory','left');  
            $this->db->join('elib_author AS t3', 't3.idauthor = t1.idauthor','left');
            $this->db->where($data); 
            $this->db->limit($limit,$start);
            $books = $this->db->get(); 
            
                return $books->result_array();
	}
        function count_books_by($data=array()){
            $this->db->where($data);
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
        public function count_user_by($data=array()) {
            $this->db->where($data);
        return $this->db->count_all_results("pegawai");

        }
        function get_user_by($data=array(),$limit=20,$start=0){
            $this->db->select('t1.id, t1.nama, t2.userrole,t1.nip,t1.jabatan'); ////t2.userrole : 0 =biasa, 1=admin, 2=uploader(cuma bisa upload)
            $this->db->from('pegawai AS t1');
//            $this->db->order_by("nama", "asc");
            $this->db->join('elib_userrole AS t2', 't1.id = t2.id','left');
            $this->db->limit($limit,$start);
            $this->db->where($data);
            $user = $this->db->get();
            return $user->result_array();
        }
        function get_user_like($filter,$limit=20,$start=0){
            $this->db->select('t1.id, t1.nama, t2.userrole,t1.nip,t1.jabatan'); ////t2.userrole : 0 =biasa, 1=admin, 2=uploader(cuma bisa upload)
            $this->db->from('pegawai AS t1');
            //$this->db->order_by("nama", "asc");
            $this->db->join('elib_userrole AS t2', 't1.id = t2.id','left');
            $this->db->limit($limit,$start);
            if($filter!=''){
                $this->db->like('t1.nip',$filter);
                $this->db->or_like('t1.nama',$filter);
            }
            $user = $this->db->get();
            return $user->result_array();
        }
       public function count_user_like($filter) {
            $this->db->like('nip',$filter);
            $this->db->or_like('nama',$filter);
            return $this->db->count_all_results("pegawai");

        }
	function get_userrole($data=array(),$limit=1,$start=0){
            $this->db->select('userrole');
            $this->db->from('elib_userrole');
            $this->db->where($data);
            $user = $this->db->get();
            return $user->result_array();
	}
	function insert_userrole(){
	}
	function update_userrole(){
	}
	function delete_userrole(){
	}
        function get_idpegawai($data){
            $this->db->select('id');
            $this->db->from('pegawai');
            $this->db->where($data);
            $pegawai=  $this->db->get();
            $row=$pegawai->row();
            return $row->id;
        }
        /*----------------- Elib_author-----------------*/
        function get_author_by($data=array(),$limit=20,$start=0){
            $this->db->select('*');
            $this->db->from('elib_author');
            $this->db->order_by("authorname", "asc");
            $this->db->where($data);
            $this->db->limit($limit,$start);
            $data = $this->db->get(); 
            return $data->result_array();
        }
        function get_author_like($filter,$limit=20,$start=0){
            $this->db->select('*');
            $this->db->from('elib_author');
            
            $this->db->like('authorname',$filter);
            $this->db->limit($limit,$start);
            $data = $this->db->get(); 
            return $data->result_array();
        }
        
        
        public function count_author_by($data=array()) {
            $this->db->where($data);
            return $this->db->count_all_results("elib_author");

        }
        public function count_author_like($filter) {
            $this->db->like('authorname',$filter);
            return $this->db->count_all_results("elib_author");

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
        
        function check_author_by($data){
            $this->db->where($data); 
            $data=$this->db->get('elib_author');
            if ($data->num_rows() > 0) {
            return true;
            } 
            else return false;

        }
    function delete_author($id){
         $this->db->delete('elib_author', array('idauthor' => $id)); 
    }
    /*--------------peminjaman elib_loan ------------------*/
    function count_loan($filter){
        $this->db->select('tb_1.id,tb_2.title,tb_3.nama,tb_3.nip,tb_1.loandate,tb_1.duedate, tb_1.returndate');
        $this->db->from('elib_loan AS tb_1');
        $this->db->join('elib_books AS tb_2','tb_1.booksid=tb_2.id','left');
        $this->db->join('pegawai AS tb_3','tb_1.idpegawai=tb_3.id','left');
        $this->db->where($filter);
        return $this->db->count_all_results();
    }
    function get_loan($filter,$limit,$start){
        
        $this->db->select('tb_1.id,tb_2.title,tb_3.nama,tb_3.nip,tb_1.loandate,tb_1.amount,tb_1.duedate,tb_1.returndate,tb_1.booksid');
        $this->db->from('elib_loan AS tb_1');
        $this->db->join('elib_books AS tb_2','tb_1.booksid=tb_2.id','left');
        $this->db->join('pegawai AS tb_3','tb_1.idpegawai=tb_3.id','left');
        $this->db->where($filter);
        $this->db->limit($limit,$start);
	$data= $this->db->get();
        return $data->result_array();
    }
    function get_loan_for_list($filter='',$wherefilter,$limit=20,$start=0){ 
        $filter='%'.$filter.'%';
        $sql="SELECT `tb_1`.`id`, `tb_2`.`title`, `tb_3`.`nama`, `tb_3`.`nip`, `tb_1`.`loandate`, `tb_1`.`amount`, `tb_1`.`duedate`, `tb_1`.`returndate`, `tb_1`.`booksid` FROM (`tb_elib_loan` AS tb_1) LEFT JOIN `tb_elib_books` AS tb_2 ON `tb_1`.`booksid`=`tb_2`.`id` LEFT JOIN `tb_pegawai` AS tb_3 ON `tb_1`.`idpegawai`=`tb_3`.`id` WHERE `tb_1`.`returndate` ".$wherefilter." AND  (`tb_1`.`id` LIKE ? OR tb_3.nama LIKE ? OR `tb_3`.`nip` LIKE ? OR `tb_2`.`title` LIKE ? OR `tb_1`.`loandate` LIKE ?) LIMIT ?,?";
        return $this->db->query($sql, array( $filter, $filter,$filter,$filter,$filter, $start,$limit))->result_array();
    }
    function count_loan_for_list($filter='',$wherefilter){
        $filter='%'.$filter.'%';
        $sql="SELECT count(tb_1.id) as num FROM (`tb_elib_loan` AS tb_1) LEFT JOIN `tb_elib_books` AS tb_2 ON `tb_1`.`booksid`=`tb_2`.`id` LEFT JOIN `tb_pegawai` AS tb_3 ON `tb_1`.`idpegawai`=`tb_3`.`id` WHERE `tb_1`.`returndate` ". $wherefilter." AND  (`tb_1`.`id` LIKE ? OR tb_3.nama LIKE ? OR `tb_3`.`nip` LIKE ? OR `tb_2`.`title` LIKE ? OR `tb_1`.`loandate` LIKE ?)";
        return $this->db->query($sql,array( $filter, $filter,$filter,$filter,$filter))->row()->num;
        
    }
    function insert_loan($data){
        $this->db->insert('elib_loan',$data);
    }
    function update_loan($data){
        $this->db->where('id',$data['id']);
            if($this->db->update('elib_loan',$data))
                    return true;
            else return false;
    }
    function count_loaned_books($booksid){
        $this->db->select_sum('amount');
        $this->db->from('elib_loan');
        $this->db->where(array('returndate'=>'0000-00-00','booksid'=>$booksid));
        $query= $this->db->get();
        $sum=$query->result_array();
        
        return $sum[0]['amount'];
    }
    /*--------------antrian peminjaman elib_queue-----------*/
    //status di db, 0=belum, 1=sedang, 2.sudah 3.terlambat 4. dihapus
    function count_queue($data=array()){
        $this->db->where($data);
        return $this->db->count_all("elib_queue");
    }
    function get_queue($filter=array(),$limit=1,$start=0){
        $this->db->select('tb_1.id,tb_2.title,tb_3.nama,tb_1.idpegawai,tb_1.status,tb_3.nip,tb_1.queuedate,tb_1.amount,tb_1.availabledate,tb_1.booksid');
        $this->db->from('elib_queue AS tb_1');
        $this->db->join('elib_books AS tb_2','tb_1.booksid=tb_2.id','left');
        $this->db->join('pegawai AS tb_3','tb_1.idpegawai=tb_3.id','left');
        $this->db->where($filter);
        $this->db->limit($limit,$start);
	$data= $this->db->get();
        return $data->result_array();
        
    }
    function get_queue_for_list($filter='',$wherefilter,$limit=20,$start=0){
        $filter='%'.$filter.'%';
        $sql="SELECT `tb_1`.`id`, `tb_2`.`title`, `tb_3`.`nama`, `tb_3`.`nip`, `tb_1`.`queuedate`, `tb_1`.`amount`, `tb_1`.`status`, `tb_1`.`availabledate`, `tb_1`.`booksid` FROM (`tb_elib_queue` AS tb_1) LEFT JOIN `tb_elib_books` AS tb_2 ON `tb_1`.`booksid`=`tb_2`.`id` LEFT JOIN `tb_pegawai` AS tb_3 ON `tb_1`.`idpegawai`=`tb_3`.`id` WHERE `tb_1`.`status` ".$wherefilter." AND  (`tb_1`.`id` LIKE ? OR tb_3.nama LIKE ? OR `tb_3`.`nip` LIKE ? OR `tb_2`.`title` LIKE ? OR `tb_1`.`queuedate` LIKE ?) LIMIT ?,?";
        return $this->db->query($sql, array( $filter, $filter,$filter,$filter,$filter, $start,$limit))->result_array();
    }
     function count_queue_for_list($filter='',$wherefilter,$limit=20,$start=0){
        $filter='%'.$filter.'%';
        $sql="SELECT count(tb_1.id) as num FROM (`tb_elib_queue` AS tb_1) LEFT JOIN `tb_elib_books` AS tb_2 ON `tb_1`.`booksid`=`tb_2`.`id` LEFT JOIN `tb_pegawai` AS tb_3 ON `tb_1`.`idpegawai`=`tb_3`.`id` WHERE `tb_1`.`status` ".$wherefilter." AND  (`tb_1`.`id` LIKE ? OR tb_3.nama LIKE ? OR `tb_3`.`nip` LIKE ? OR `tb_2`.`title` LIKE ? OR `tb_1`.`queuedate` LIKE ?)";
        return $this->db->query($sql,array( $filter, $filter,$filter,$filter,$filter))->row()->num;
    }
    function get_queue_for_kembali($data=array(),$limit=1,$start=0){ //mencari mana yang paling pertama dapat buku
        
        $this->db->where($data);
        $this->db->order_by('queuedate','asc');
	$data= $this->db->get('elib_queue',$limit,$start);
        return $data->result_array();
    }
    function insert_queue($data){
        $this->db->insert('elib_queue',$data);
    }
    function delete_queue($id){ // update queue status sebagai terhapus.
        $data=array('status'=>3);
        $this->db->where('id', $id);
        $this->db->update('elib_queue', $data); 

    }
    function update_queue($data){ // update queue status sebagai terhapus.
        
        $this->db->where('id', $data['id']);
        $this->db->update('elib_queue', $data); 
        
    }
    function get_notifikasi($data){
         $this->db->select('id');
         $this->db->from('elib_queue');
         $this->db->where($data);
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
     
     
     
     /*-- auto complete */
     function get_autocomplete_author($options = array())
    {
	    $this->db->select('authorname');
	    $this->db->like('authorname', $options['keyword'], 'after');
            $this->db->limit(10);
   		$query = $this->db->get('elib_author');
		return $query->result();
    }
    function get_autocomplete_title($options = array())
    {
	    $this->db->select('title');
	    $this->db->like('title', $options['keyword'], 'after');
            $this->db->limit(10);
   		$query = $this->db->get('elib_bibliography');
		return $query->result();
    }
}

/* End of file mdl_elibrary.php */
/* Location: ./application/models/mdl_elibrary.php */