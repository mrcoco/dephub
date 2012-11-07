<?php
//indexing buku
class Perpustakaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->library('pagination');
	}
        function index(){
            $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
            $this->template->display_lib('main/elibrary/perpustakaan/index_perpustakaan', $data);
        }
        function view($id) //buat nampilin satuan
	{
                
                $data = array('books' => $this->elib->get_books_by_id($id));
      
		$this->template->display_lib('main/elibrary/perpustakaan/single_view', $data);
		
                
	}
        function category($idcategory='')
	{
                if($idcategory==''){
                    $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
                    $this->template->display_lib('main/elibrary/perpustakaan/index_perpustakaan', $data);
                }
                else{
                $config=array();
                
                
                $config["total_rows"]=$this->elib->count_books_by_category($idcategory);
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                           
                $data=array('books'=>$this->elib->get_books_by_category($idcategory,$config["per_page"],$page),
                            'category'=> $this->elib->get_name_category_by_id($idcategory)
                        );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/perpustakaan/category-view', $data);
                }
	}
        function search()
	{
                $string=$this->input->post('search');
                $data = array('books' => $this->elib->search_books_by_title_or_author($string));
                
		$this->template->display_lib('main/elibrary/perpustakaan/search-result', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
                
	}
        function antri_pinjam(){
            $data="";
        $this->template->display_lib('main/elibrary/perpustakaan/antri_pinjam_view', $data);
        }
        
}
?>