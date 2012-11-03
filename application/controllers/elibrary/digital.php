<?php

class Digital extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->library('pagination');
	}
        function index(){
            redirect(base_url().'elibrary/digital/type');
        }
	function search()
	{
                $string=$this->input->post('search');
                $data = array('bibliography' => $this->elib->search_bibliography_by_title_or_author($string));
                
		$this->template->display_lib('main/elibrary/digital/search-result', $data);
		
                
	}
        function view($id) //buat nampilin satuan
	{
                
                $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
                
		$this->template->display_lib('main/elibrary/digital/single_view', $data);
		
                
	}
        
        function upload()
	{
                $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
		$this->template->display_lib('main/elibrary/digital/upload_form', $data);
		
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
                        $this->template->display_lib('main/elibrary/digital/upload_form', $error);
		}
		else
		{
			 
			$data = array('item' => $this->upload->data(),
                            'category'=>$this->elib->get_category(),
                            'author'=>$this->elib->get_author()
                            );
			$datainsert['title']=$data['item']['raw_name'];
			//$datainsert['category']=$this->input->post('category');
                        $temp=$data['item']['file_ext'];
			if($temp=='.pdf'||$temp='.doc'||$temp='.docx'||$temp='.txt'||$temp='.xls'||$temp='.xlsx') $datainsert['type']=1; //dokumen
			else if ($temp=='.mp4'||$temp='.mp3'||$temp='.wmv'||$temp='.flv'||$temp='.3gp'||$temp='.mkv'||$temp='.avi') $datainsert['type']=2;//video
			else if ($temp=='.pptx'||$temp='.ppt') $datainsert['type']=3; //presentasi
			else  $datainsert['type']=0; //lain2
			
			$datainsert['location']='./assets/elibrary/uploads/'.$data['item']['orig_name'];
			$datainsert['keterangan']=$this->input->post('keterangan');
                        $datainsert['tags']=$this->input->post('tags');
                        
                        $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
                        $datainsert['idcategory']=$category['idcategory'];
                        $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
                        $datainsert['idauthor']=$author['idauthor'];
                        
			$this->elib->insert_bibliography($datainsert);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diupload'));
//                        redirect(base_url().'elibrary/daftar');
			$this->template->display_lib('main/elibrary/digital/upload_success', $data);
		}
	}
        
        function edit_bibliography($id) {

            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>' '
                );
            if($data['bibliography']){
                $this->template->display_lib('main/elibrary/digital/edit_form', $data);
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/digital/type');                    
            }

        }
        
        function do_edit_bibliography() {
            $update['id']=$this->input->post('id');
            $update['title']=$this->input->post('title');
            $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
            $update['idcategory']=$category['idcategory'];
            $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
            $update['idauthor']=$author['idauthor'];
            $update['keterangan']=$this->input->post('keterangan');

            $update['tags']=$this->input->post('tags');
            if($this->elib->update_bibliography($update))
            {
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data berhasil diubah'
                 );
                          
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diubah'));
                redirect(base_url().'elibrary/digital/type');
            }
            else {
                $data = array('bibliography' => $this->elib->get_bibliography_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data tidak berhasil diubah');
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File gagal diubah'));
                redirect(base_url().'elibrary/digital/type');
            }
            
        }
        
        function type($tipe='')
	{
                $config=array();
                
                
                if($tipe=='')
                    {$data = array('bibliography' => $this->elib->getall_bibliography());
                    $data["links"]='';
                    $this->template->display_lib('main/elibrary/digital/type-view', $data);
                    return 0;
                    }
                else if($tipe=='lain')
                {$typenumber=0;$config["base_url"]= base_url()."elibrary/digital/type/lain/";}
                else if($tipe=='dokumen')
                {$typenumber=1;$config["base_url"]= base_url()."elibrary/digital/type/dokumen/";}
                else if($tipe=='video')
                {$typenumber=2;$config["base_url"]= base_url()."elibrary/digital/type/video/";}
                else if($tipe=='presentasi')
                {$typenumber=3;$config["base_url"]= base_url()."elibrary/digital/type/presentasi/";}
                
                $config["total_rows"]=$this->elib->count_bibliography_by_type($typenumber);
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                
                $data = array('bibliography' => $this->elib->get_bibliography_by_type($typenumber,$config["per_page"],$page));
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/digital/type-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function category()
	{
                if(!$this->input->post('category')){
                    $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
                    $this->template->display_lib('main/elibrary/digital/index_digital', $data);
                }
                else{
                $config=array();
                $category=$this->elib->get_id_category_by_name($this->input->post('category'));
                
                $config["total_rows"]=$this->elib->count_bibliography_by_category($category);
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                           
                $data=array('bibliography'=>$this->elib->get_bibliography_by_category($category,$config["per_page"],$page),
                            'category'=> $this->input->post('category')
                        );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/digital/category-view', $data);
                }
	}

        function delete_bibliography($id){
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['bibliography']){
                //unlink($data['bibliography']['location']); 
                $this->elib->delete_bibliography($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/digital/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/digital/type');                    
            }
            
        }
}
?>