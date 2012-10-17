<?php

class Type extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->helper('file');
	}

	function index($tipe='')
	{
                if($tipe=='')
                    $data = array('bibliography' => $this->elib->getall_bibliography());
                else if($tipe=='lain')
                    $data = array('bibliography' => $this->elib->get_bibliography_by_type(0));
                else if($tipe=='dokumen')
                    $data = array('bibliography' => $this->elib->get_bibliography_by_type(1));
                else if($tipe=='video')
                    $data = array('bibliography' => $this->elib->get_bibliography_by_type(2));
                else if($tipe=='presentasi')
                    $data = array('bibliography' => $this->elib->get_bibliography_by_type(3));
                
		$this->template->display_lib('main/elibrary/type-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

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