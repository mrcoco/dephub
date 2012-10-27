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
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function list_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function edit_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function add_author()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function list_author()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function edit_author()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function list_user()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
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
