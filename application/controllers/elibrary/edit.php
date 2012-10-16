<?php

class Edit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}

	function index()
	{
		$this->template->display_lib('main/elibrary/edit_page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

	function bibliography($id) {
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
            if($data['bibliography']){
                $this->template->display_lib('main/elibrary/edit_form', $data);
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/type');                    
            }
            
        }
        
        function edit_bibliography() {
            $update['id']=$this->input->post('id');
            $update['title']=$this->input->post('title');
            $update['category']=$this->input->post('category');
            $update['keterangan']=$this->input->post('keterangan');
            $this->elib->update_bibliography($update);           
            $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diubah'));
            redirect(base_url().'elibrary/type');
//            $data = array('bibliography' => $this->elib->get_bibliography_by_id($update['id']));
//            $this->template->display_lib('main/elibrary/type', $data);
        }
}
?>