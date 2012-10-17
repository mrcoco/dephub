<?php

class Perpus extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}
        
        function tambah_buku(){
            
            
        }

}
?>