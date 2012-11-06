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
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah ditambah '+$data['insert']['categoryname']));
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
        function edit_category($id)
	{       
                $data = array( 'data'=>$this->elib->get_category_by_id($id)
                       );
		$this->template->display_lib('main/elibrary/short_form',$data);

	}
        function do_edit_category()
	{
                $data['update']['categoryname']=  $this->input->post('categoryname');
                $data['update']['idcategory']=  $this->input->post('idcategory');
                $this->elib->update_author($data['update']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah diubah : '+$data['update']['categoryname']));
                        redirect(base_url().'elibrary/admin/list_category');
		
	}
        
        function delete_category($id)
	{
                 if ($this->elib->count_books_by_idcategory($id)>0 ||$this->elib->count_bibliography_by_idcategory($id)>0){
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Kategori tidak berhasil dihapus karena ada buku/file yang terhubung'));
                   redirect(base_url().'elibrary/admin/list_category');
                 }
               else 
               {
                   $this->elib->delete_category($id);
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang berhasil dihapus'));
                   redirect(base_url().'elibrary/admin/list_category');
               }
               
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
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
        function edit_author($id)
	{       
                $data = array( 'data'=>$this->elib->get_author_by_id($id)
                       );
		$this->template->display_lib('main/elibrary/short_form',$data);

	}
        function do_edit_author()
	{
                $data['update']['authorname']=  $this->input->post('authorname');
                $data['update']['idauthor']=  $this->input->post('idauthor');
                $this->elib->update_author($data['update']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Pengarang telah diubah : '+$data['update']['authorname']));
                        redirect(base_url().'elibrary/admin/list_author');
		
	}
        function delete_author($id)
	{
                 if ($this->elib->count_books_by_idauthor($id)>0 ||$this->elib->count_bibliography_by_idauthor($id)>0){
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang tidak berhasil dihapus karena ada buku/file yang terhubung'));
                   redirect(base_url().'elibrary/admin/list_author');
                 }
               else 
               {
                   $this->elib->delete_author($id);
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang berhasil dihapus'));
                   redirect(base_url().'elibrary/admin/list_author');
               }
               
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
