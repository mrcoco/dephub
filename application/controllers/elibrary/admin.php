<?php

/*
tambah kategori, author, edit role anggota
 */
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->library('pagination');
	}
        

        function index()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function add_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/short_form');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function do_add_category()
	{
                $data['insert']['categoryname']=  $this->input->post('categoryname');
                $this->elib->insert_category($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah ditambah'+$data['insert']['categoryname']));
                        redirect(base_url().'elibrary/admin/list_category');
		
	}
        
        function list_category()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_author";
                $config["total_rows"]=$this->elib->count_category();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_category_pagination($config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/list',$data);
                
                
	}
        function edit_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/short_form');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function add_author()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/short_form');
		
	}
        function do_add_author()
	{
                $data['insert']['authorname']=  $this->input->post('authorname');
                $this->elib->insert_author($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Pengarang telah ditambah'+$data['insert']['authorname']));
                        redirect(base_url().'elibrary/admin/list_author');
		
	}
        function list_author()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_author";
                $config["total_rows"]=$this->elib->count_author();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_author_pagination($config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/list',$data);
                
                
	}
        function edit_author()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/short_form');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function list_user()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_user";
                $config["total_rows"]=$this->elib->count_user();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_user($config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/list',$data);   
		
	}
        function edit_user()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
}       
?>
