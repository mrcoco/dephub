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
		$this->template->display_lib('main/elibrary/type-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function daftar($id=-1){
            if($id==-1){
		$data = array('bibliography' => $this->elib->getall_bibliography());
            }else{
		$data = array('bibliography' => $this->elib->get_bibliography_by_type($id));
            }
		$this->template->display_lib('main/elibrary/type-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
//
//	function text(){
//		$data = array('bibliography' => $this->elib->get_bibliography_by_type(1));
//		$this->template->display_lib('main/elibrary/type-view', $data);
//	}
//	function lain(){
//		$data = array('bibliography' => $this->elib->get_bibliography_by_type(0));
//		$this->template->display_lib('main/elibrary/type-view', $data);
//	}
//	function semua(){
//		$data = array('bibliography' => $this->elib->getall_bibliography());
//		$this->template->display_lib('main/elibrary/type-view', $data);
//	}
        function delete_bibliography($id){
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['bibliography']){
                //unlink($data['bibliography']['location']); 
                $this->elib->delete_bibliography($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/type');                    
            }
            
        }
        
        
}
?>