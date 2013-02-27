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
                
            $data['queue']=array();
            $data['post']=array();
            if($this->session->userdata('is_login')){ //tidak diproses notifikasi bila tidak login
                $id=$this->session->userdata('id'); //mengambil id pegawai
                $elib_userrole=$this->elib->get_userrole(array('id'=>$id)); //mengambil userrole di elib_userrole
                if($elib_userrole) $this->session->set_userdata('elib_userrole', $elib_userrole[0]['userrole']);  //mengeset userrole ke session
               $data['filter_queue']=array('1.idpegawai'=>$this->session->userdata('id'),'1.status'=>1);
               $data['queue']=$this->elib->get_queue($data['filter_queue']);
            }
            $where=array('elib_post.status'=>2);
            $like=array();
            $data['post']=$this->elib->get_post($where);
            $this->template->display_lib('elibrary/index',$data);
        }
        function info(){
                $where=array('elib_post.status !='=>0,'elib_post.status !='=>3);
                $config=array();
                $config["base_url"]= base_url()."elibrary/digital/info/";
                $config["total_rows"]= $this->elib->count_post($where);
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data = array('data' => $this->elib->get_post($where,array(),$config["per_page"],$page));
                $data["links"] = $this->pagination->create_links();
                $data['sub_title']='List Post';
                $this->template->display_lib('elibrary/list', $data);
        }
        function info_view($id){
            
            $where=array('elib_post.id'=>$id);
            $data['data']=$this->elib->get_post($where);
            $data['sub_title']='Informasi'.$data['data'][0]['creationdate'];
            $this->template->display_lib('elibrary/info_view',$data);
        }
        
        function login(){
            $usr=$this->input->post('usr');
            $pwd=$this->input->post('password');
            $this->load->library('access');
            $login_result=$this->access->login($usr,$pwd);
            if($login_result){
                $nama=ucwords(strtolower($this->session->userdata('nama')));
                $this->session->set_flashdata('msg', $this->editor->alert_ok('Selamat datang '.$nama));
                
            }else{
                $this->session->set_flashdata('msg', $this->editor->alert_error('Maaf, login gagal. Silakan dicoba lagi.'));
            }
            redirect(base_url().'elibrary');
        }
        function logout(){
            $this->load->library('access');
            $login_result=$this->access->logout();
            redirect(base_url().'elibrary');
        }
	function search()
	{
                    $string=$this->input->post('search');
                    $config=array();//pagination
                    $config["base_url"]= base_url()."elibrary/digital/search/";
                    $config["total_rows"]=$this->elib->count_bibliography_for_search($string);
                    $config["per_page"]=10;
                    $config["uri_segment"] = 5;
                    $this->pagination->initialize($config);                
                    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                    $data = array('data' => $this->elib->search_bibliography($string,$config["per_page"],$page),
                        'data2' => $this->elib->search_books($string,$config["per_page"],$page)); //query search db
                    
                    $data["links"] = $this->pagination->create_links();
                    $config["total_rows"]=$this->elib->count_bibliography_for_search($string);
                    $this->pagination->initialize($config);  
                    $data["links2"] = $this->pagination->create_links();
                    $this->template->display_lib('elibrary/digital/search-result', $data);
	}
        function view($id) //Untuka menampilkan file satuan
	{
                $iduser=$this->session->userdata('id'); //mengambil id pegawai
                $elib_userrole=$this->elib->get_userrole(array('id'=>$iduser)); //mengambil userrole di elib_userrole
                if($elib_userrole)$this->session->set_userdata('elib_userrole', $elib_userrole[0]['userrole']);  //mengeset userrole ke session
                
                $data = array('data' => $this->elib->get_bibliography_by(array('t1.id'=>$id)));
                
		$this->template->display_lib('elibrary/digital/single_view', $data);
		
                
	}
        function viewer() //untuk menampilkan view dengan g docs
	{
                $id=$this->input->post('id');
                $data = array('data' => $this->elib->get_bibliography_by(array('t1.id'=>$id)));
                
		$this->template->display_lib('elibrary/digital/pres_view', $data);

	}
        function type($tipe='semua') //disesuaikan tipe file apakah video, pres, keterangan tipe ada di elib_filetype -> jenis (0=lain, 1=dkumen, 2=video, 3=presentasi)
	{
                $config=array();
                
                
                if($tipe=='semua')
                    {//pagination
                    $config["base_url"]= base_url()."elibrary/digital/type/semua/";
                    $config["total_rows"]=$this->elib->count_bibliography_by();
                    $config["per_page"]=20;
                    $config["uri_segment"] = 5;
                    $this->pagination->initialize($config);                
                    $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                    $data = array('data' => $this->elib->get_bibliography_by(array(),$config["per_page"],$page),'sub_title'=>'Daftar File');
                    $data["links"] = $this->pagination->create_links();
                    
                    $this->template->display_lib('elibrary/digital/type-view', $data);
                    return 0;
                    }
                else if($tipe=='lain')//penyesuaian
                {$jenis=0;$config["base_url"]= base_url()."elibrary/digital/type/lain/";}
                else if($tipe=='dokumen')
                {$jenis=1;$config["base_url"]= base_url()."elibrary/digital/type/dokumen/";}
                else if($tipe=='multimedia')
                {$jenis=2;$config["base_url"]= base_url()."elibrary/digital/type/multimedia/";}
                else if($tipe=='presentasi')
                {$jenis=3;$config["base_url"]= base_url()."elibrary/digital/type/presentasi/";}
                //pagination
                $config["total_rows"]=$this->elib->count_bibliography_by(array('t4.jenis'=>$jenis));
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                
                $data = array('data' => $this->elib->get_bibliography_by(array('t4.jenis'=>$jenis),$config["per_page"],$page),'sub_title'=>'Daftar File '.$tipe);//query
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/digital/type-view', $data);
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        
        function category($idcategory='') //kelompok file berdasarkan file, keterangan category di elib_category
	{
                if($idcategory==''){
                    $data = array(
                    'category'=>$this->elib->get_category_by()
                );
                    $this->template->display_lib('elibrary/digital/index_digital', $data);
                }
                else{
                $config=array();
                
                $config["base_url"]= base_url()."elibrary/digital/category/".$idcategory."/";
                $config["total_rows"]=$this->elib->count_bibliography_by(array('t1.idcategory'=>$idcategory));
                $config["per_page"]=20;
                $config["uri_segment"] = 5;
                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;
                           
                $data=array('data'=>$this->elib->get_bibliography_by(array('t1.idcategory'=>$idcategory),$config["per_page"],$page), //query untuk file
                            'category'=> $this->elib->get_category_by(array('idcategory'=>$idcategory))
                        );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/digital/category-view', $data);
                }
	}
        
        function upload()
	{
                $id=$this->session->userdata('id'); //mengambil id pegawai
                $elib_userrole=$this->elib->get_userrole(array('id'=>$id)); //mengambil userrole di elib_userrole
                $this->session->set_userdata('elib_userrole', $elib_userrole[0]['userrole']);  //mengeset userrole ke session
                
            if(!$this->session->userdata('is_login')||($this->session->userdata('elib_userrole')!=1 && $this->session->userdata('elib_userrole')!=2)){ //melarang apabila bukan admin
                redirect(base_url().'elibrary');
            }    
                $data = array(
                'category'=>$this->elib->get_category_by(),'sub_title'=>'Upload File'
                );
		$this->template->display_lib('elibrary/digital/upload_form', $data);
		
	}
        function do_upload()
	{
            if(!$this->session->userdata('is_login')||($this->session->userdata('elib_userrole')!=1 && $this->session->userdata('elib_userrole')!=2)){ //melarang apabila bukan admin
                redirect(base_url().'elibrary');
        }
		$config['upload_path'] = './assets/elibrary/uploads/'; 
		$config['allowed_types'] = 'mp4|gif|jpg|png|doc|docx|ppt|pptx|xls|xlsx|pdf|jpeg|pdf|mp3|wmv';
		$config['max_size']	= '100000';
                $config['overwrite']    = TRUE;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload()) //jika tidak upload gagal
		{
			$error = $this->upload->display_errors();
                        $this->session->set_flashdata('msg',$this->editor->alert_error($error));
                        redirect(base_url().'elibrary/digital/type'); 
                        
		}
		else
		{
                        $stringauthor=$this->input->post('authorname');
			 
                        if(!$this->elib->check_author_by(array('authorname'=>$stringauthor))){ //Apabila author-nya ga ada
                        //masukin pengarang baru
                            $authorinsert['authorname']=$stringauthor;
                            $this->elib->insert_author($authorinsert);
                        }
			$data = array('item' => $this->upload->data(),
                            'category'=>$this->elib->get_category_by(),
                            );
                        
			$data['insert']['title']=$data['item']['raw_name'];
			
                        $temp=$data['item']['file_ext'];
			$data['insert']['type']=$this->elib->get_idfile_by_filetype($temp); //lain2
			
			$data['insert']['location']='./assets/elibrary/uploads/'.$data['item']['orig_name'];
			$data['insert']['keterangan']=$this->input->post('keterangan');
                        $data['insert']['tags']=$this->input->post('tags');
                        $data['insert']['iduploader']=$nama=ucwords(strtolower($this->session->userdata('id')));
                        $dateTime = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
                        $dt= $dateTime->format("Y-m-d");//;
                        $data['insert']['uploaddate']=$dt;
                        
                        $category=$this->elib->get_category_by(array('categoryname'=>$this->input->post('categoryname')));
                        $data['insert']['idcategory']=$category[0]['idcategory'];
                        $author=$this->elib->get_author_by(array('authorname'=>$stringauthor));
                        $data['insert']['idauthor']=$author[0]['idauthor'];
                        
			$this->elib->insert_bibliography($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diupload'));
			$this->template->display_lib('elibrary/digital/upload_success', $data);
                 
		}
	}
        function autocomplete(){
	
            $term = $this->input->post('term',TRUE);

            if (strlen($term) < 3) return 0;

            $rows = $this->elib->get_autocomplete_author(array('keyword' => $term));

            $json_array = array();
            foreach ($rows as $row)
                     array_push($json_array, $row->authorname);

            echo json_encode($json_array);
        }
    
}
?>