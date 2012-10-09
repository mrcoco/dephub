<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}

	function index()
	{
		$this->template->display('main/elibrary/upload_form', array('error' => ' ' ));
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './assets/elibrary/uploads/'; 
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|ppt|pptx|xls|xlsx|pdf|jpeg|pdf|';
		$config['max_size']	= '10000';
                $config['overwrite']    = TRUE;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        $this->template->display('main/elibrary/upload_form', $error);
		}
		else
		{
			 
			$data = array('upload_data' => $this->upload->data());
			$datainsert['title']=$data['upload_data']['orig_name'];
			//$datainsert['category']=$this->input->post('category');
			if($data['upload_data']['file_ext']=='.pdf') $datainsert['type']=1;
			else if ($data['upload_data']['file_ext']=='.mp4') $datainsert['type']=2;
			else if ($data['upload_data']['file_ext']=='.pptx') $datainsert['type']=3;
			else if ($data['upload_data']['file_ext']=='.docx') $datainsert['type']=4;
			$datainsert['imageurl']=$this->input->post('imageurl');
			$datainsert['location']='./assets/elibrary/uploads/'.$data['upload_data']['orig_name'];
			$datainsert['keterangan']=$this->input->post('keterangan');
			$this->elib->insert_bibliography($datainsert);
			$this->template->display('main/elibrary/upload_success', $data);
		}
	}
	function upload_again(){
               
		$this->template->display('main/elibrary/upload_form');
	}
}
?>