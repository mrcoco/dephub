<?php

class Digital extends CI_Controller {

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
            $this->template->display_lib('elibrary/digital/index_digital', $data);
        }
        
	function search()
	{
                    $string=$this->input->post('search');
                    $config=array();//pagination
                    $config["base_url"]= base_url()."elibrary/digital/search/";
                    $config["total_rows"]=$this->elib->count_bibliography_for_search($string);
                    $config["per_page"]=20;
                    $config["uri_segment"] = 5;
                    $this->pagination->initialize($config);                
                    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                    $data = array('bibliography' => $this->elib->search_bibliography_by_title_or_author($string,$config["per_page"],$page)); //query search db
                    $data["links"] = $this->pagination->create_links();
                    $this->template->display_lib('elibrary/digital/search-result', $data);
		
                
	}
        function view($id) //Untuka menampilkan file satuan
	{
                
                $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
                
		$this->template->display_lib('elibrary/digital/single_view', $data);
		
                
	}
        function viewer() //untuk menampilkan view dengan g docs
	{
                $id=$this->input->post('id');
                $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
                
		$this->template->display_lib('elibrary/digital/pres_view', $data);
		
                
	}
        function type($tipe='semua') //disesuaikan tipe file apakah video, pres, keterangan tipe ada di elib_filetype -> jenis (0=lain, 1=dkumen, 2=video, 3=presentasi)
	{
                $config=array();
                
                
                if($tipe=='semua')
                    {//pagination
                    $config["base_url"]= base_url()."elibrary/digital/type/semua/";
                    $config["total_rows"]=$this->elib->countall_bibliography();
                    $config["per_page"]=20;
                    $config["uri_segment"] = 5;
                    $this->pagination->initialize($config);                
                    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                    $data = array('bibliography' => $this->elib->getall_bibliography($config["per_page"],$page));
                    $data["links"] = $this->pagination->create_links();
                    
                    $this->template->display_lib('elibrary/digital/type-view', $data);
                    return 0;
                    }
                else if($tipe=='lain')//penyesuaian
                {$jenis=0;$config["base_url"]= base_url()."elibrary/digital/type/lain/";}
                else if($tipe=='dokumen')
                {$jenis=1;$config["base_url"]= base_url()."elibrary/digital/type/dokumen/";}
                else if($tipe=='multimedia')
                {$jenis=2;$config["base_url"]= base_url()."elibrary/digital/type/multimedia/";}
                else if($tipe=='presentasi')
                {$jenis=3;$config["base_url"]= base_url()."elibrary/digital/type/presentasi/";}
                //pagination
                $config["total_rows"]=$this->elib->count_bibliography_by_type($jenis);
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                
                $data = array('bibliography' => $this->elib->get_bibliography_by_type($jenis,$config["per_page"],$page));//query
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/digital/type-view', $data);
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        
        function category($idcategory='') //kelompok file berdasarkan file, keterangan category di elib_category
	{
                if($idcategory==''){
                    $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
                    $this->template->display_lib('elibrary/digital/index_digital', $data);
                }
                else{
                $config=array();
                
                $config["base_url"]= base_url()."elibrary/digital/category/".$idcategory."/";
                $config["total_rows"]=$this->elib->count_bibliography_by_category($idcategory);
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                           
                $data=array('bibliography'=>$this->elib->get_bibliography_by_category($idcategory,$config["per_page"],$page), //query untuk file
                            'category'=> $this->elib->get_name_category_by_id($idcategory)
                        );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/digital/category-view', $data);
                }
	}
        
        
}
?>