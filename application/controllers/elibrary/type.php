<?php

class Type extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}

	function index()
	{
		$data = array('bibliography' => $this->elib->getall_bibliography());
		$this->template->display('main/elibrary/type-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

	function text(){
		$data = array('bibliography' => $this->elib->get_bibliography_by_type(1));
		$this->template->display('main/elibrary/type-view', $data);
	}
	function lain(){
		$data = array('bibliography' => $this->elib->get_bibliography_by_type(0));
		$this->template->display('main/elibrary/type-view', $data);
	}
	function semua(){
		$data = array('bibliography' => $this->elib->getall_bibliography());
		$this->template->display('main/elibrary/type-view', $data);
	}
}
?>