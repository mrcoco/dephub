<?php

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}

	function index()
	{
                $string=$this->input->post('search');
                $data = array('bibliography' => $this->elib->search_bibliography_by_title_or_author($string));
                
		$this->template->display_lib('main/elibrary/search-result', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
}
?>