<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->template->display('main/elibrary/user', array('error' => ' ' ));
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

	function do_upload()
	{
		$config['upload_path'] = './assets/elibrary/uploads/'; 
		$config['allowed_types'] = 'gif|jpg|png|doc|docx|ppt|pptx|xls|xlsx|pdf|jpeg|pdf|';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->template->display('main/elibrary/user', $error);
			//$this->load->view('main/elibrary/user', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());

			$this->template->display('main/elibrary/upload_success', $data); //$this->load->view('upload_success', $data);
		}
	}
}
?>