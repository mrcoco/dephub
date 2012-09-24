<?php

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}

	function index()
	{
		$data = array('bibliography' => $this->elib->getall_bibliography(),'error'=>array('error' => ' ' ));
		$this->template->display('main/elibrary/dashboard', $data);
                
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

	
}
?>