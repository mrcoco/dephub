<?php

class Type extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->helper('file');
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
        function delete_bibliography($id){
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['bibliography']){
                //unlink($data['bibliography']['location']); 
                
                
                $this->elib->delete_bibliography($id);
                
                $this->template->display('main/elibrary/type-view', $data);
                
            }else{
                $this->template->display('main/elibrary/type-view', $data);
            }
            
        }
}
?>