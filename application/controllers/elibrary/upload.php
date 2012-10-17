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
                $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
		$this->template->display_lib('main/elibrary/upload_form', $data);
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
                        $this->template->display_lib('main/elibrary/upload_form', $error);
		}
		else
		{
			 
			$data = array('upload_data' => $this->upload->data(),
                            'category'=>$this->elib->get_category(),
                            'author'=>$this->elib->get_author()
                            );
			$datainsert['title']=$data['upload_data']['raw_name'];
			//$datainsert['category']=$this->input->post('category');
                        $temp=$data['upload_data']['file_ext'];
			if($temp=='.pdf'||$temp='.doc'||$temp='.docx'||$temp='.txt'||$temp='.xls'||$temp='.xlsx') $datainsert['type']=1; //dokumen
			else if ($temp=='.mp4'||$temp='.mp3'||$temp='.wmv'||$temp='.flv'||$temp='.3gp'||$temp='.mkv'||$temp='.avi') $datainsert['type']=2;//video
			else if ($temp=='.pptx'||$temp='.ppt') $datainsert['type']=3; //presentasi
			else  $datainsert['type']=0; //lain2
			
			$datainsert['location']='./assets/elibrary/uploads/'.$data['upload_data']['orig_name'];
			$datainsert['keterangan']=$this->input->post('keterangan');
                        $datainsert['tags']=$this->input->post('tags');
                        
                        $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
                        $datainsert['idcategory']=$category['idcategory'];
                        $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
                        $datainsert['idauthor']=$author['idauthor'];
                        
			$this->elib->insert_bibliography($datainsert);
			$this->template->display_lib('main/elibrary/upload_success', $data);
		}
	}
	function upload_again(){
                $data = array(
                            'category'=>$this->elib->get_category(),
                            'author'=>$this->elib->get_author());
		$this->template->display_lib('main/elibrary/upload_form',$data);
	}
}
?>