<?php

/*
tambah kategori, author, edit role anggota
 */
class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->library('pagination');
	}
        

        function index()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function add_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/short_form');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        function do_add_category()
	{
                $data['insert']['categoryname']=  $this->input->post('categoryname');
                $this->elib->insert_category($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah ditambah '+$data['insert']['categoryname']));
                        redirect(base_url().'elibrary/admin/list_category');
		
	}
        
        function list_category()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_author";
                $config["total_rows"]=$this->elib->count_category();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_category_pagination($config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/list',$data);
                
                
	}
        function edit_category($id)
	{       
                $data = array( 'data'=>$this->elib->get_category_by_id($id)
                       );
		$this->template->display_lib('main/elibrary/short_form',$data);

	}
        function do_edit_category()
	{
                $data['update']['categoryname']=  $this->input->post('categoryname');
                $data['update']['idcategory']=  $this->input->post('idcategory');
                $this->elib->update_category($data['update']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah diubah : '+$data['update']['categoryname']));
                        redirect(base_url().'elibrary/admin/list_category');
		
	}
        
        function delete_category($id)
	{
                 if ($this->elib->count_books_by_idcategory($id)>0 ||$this->elib->count_bibliography_by_idcategory($id)>0){
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Kategori tidak berhasil dihapus karena ada buku/file yang terhubung'));
                   redirect(base_url().'elibrary/admin/list_category');
                 }
               else 
               {
                   $this->elib->delete_category($id);
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang berhasil dihapus'));
                   redirect(base_url().'elibrary/admin/list_category');
               }
               
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function list_author()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_author";
                $config["total_rows"]=$this->elib->count_author();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_author_pagination($config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/list',$data);
                
                
	}
        function edit_author($id)
	{       
                $data = array( 'data'=>$this->elib->get_author_by_id($id)
                       );
		$this->template->display_lib('main/elibrary/short_form',$data);

	}
        function do_edit_author()
	{
                $data['update']['authorname']=  $this->input->post('authorname');
                $data['update']['idauthor']=  $this->input->post('idauthor');
                $this->elib->update_author($data['update']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Pengarang telah diubah : '+$data['update']['authorname']));
                        redirect(base_url().'elibrary/admin/list_author');
		
	}
        function delete_author($id)
	{
                 if ($this->elib->count_books_by_idauthor($id)>0 ||$this->elib->count_bibliography_by_idauthor($id)>0){
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang tidak berhasil dihapus karena ada buku/file yang terhubung'));
                   redirect(base_url().'elibrary/admin/list_author');
                 }
               else 
               {
                   $this->elib->delete_author($id);
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang berhasil dihapus'));
                   redirect(base_url().'elibrary/admin/list_author');
               }
               
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
        
        function list_user()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_user";
                $config["total_rows"]=$this->elib->count_user();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_user($config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('main/elibrary/list',$data);   
		
	}
        function edit_user()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('main/elibrary/admin-page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}
/*--------------Administrasi Perpustakaan fisik Mulai----------------------*/
        function input_books(){
            $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
            $this->template->display_lib('main/elibrary/perpustakaan/books_form', $data);
            
        }
        function do_input_books(){
            if(!$this->elib->check_author($stringauthor)){ //Apabila author-nya baru
                        //masukin pengarang baru
                            $authorinsert['authorname']=$stringauthor;
                            $this->elib->insert_author($authorinsert);
                        }
            $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
            $data['insert']['title']=$this->input->post('title');
            $data['insert']['keterangan']=$this->input->post('keterangan');
            $data['insert']['tags']=$this->input->post('tags');
            $data['insert']['edition']=$this->input->post('edition');
            $data['insert']['frequency']=$this->input->post('frequency');
            $data['insert']['issnisbn']=$this->input->post('issnisbn');
            $data['insert']['publisher']=$this->input->post('publisher');
            $data['insert']['publisherplace']=$this->input->post('publisherplace');
            $data['insert']['stock']=$this->input->post('stock');
            $data['insert']['digital']=$this->input->post('digital');

            $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
            $data['insert']['idcategory']=$category['idcategory'];
            $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
            $data['insert']['idauthor']=$author['idauthor'];

            $this->elib->insert_books($data['insert']);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Buku telah ditambah'+$data['insert']['title']));
            redirect(base_url().'elibrary/digital/type');
//			$this->template->display_lib('main/elibrary/upload_success', $data);
        }
        
        
        
        
        function edit_books($id) {

            $data = array('books' => $this->elib->get_books_by_id($id),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>' '
                );
            if($data['books']){
                $this->template->display_lib('main/elibrary/perpustakaan/edit_form', $data);
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/perpustakaan/category');                    
            }
            
        }
        
        function do_edit_books() {
            
			$data['update']['title']=$this->input->post('title');
			$data['update']['keterangan']=$this->input->post('keterangan');
                        $data['update']['tags']=$this->input->post('tags');
                        $data['update']['edition']=$this->input->post('edition');
                        $data['update']['frequency']=$this->input->post('frequency');
                        $data['update']['issnisbn']=$this->input->post('issnisbn');
                        $data['update']['publisher']=$this->input->post('publisher');
                        $data['update']['publisherplace']=$this->input->post('publisherplace');
                        $data['update']['stock']=$this->input->post('stock');
                        $data['update']['digital']=$this->input->post('digital');
                        $data['update']['id']=$this->input->post('id');
                        
                        $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
                        $data['update']['idcategory']=$category['idcategory'];
                        $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
                        $data['update']['idauthor']=$author['idauthor'];
                         
            if($this->elib->update_books($data['update']))
            {
            $data = array('books' => $this->elib->get_books_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data berhasil diubah'
                 );
            
                 $this->session->set_flashdata('msg',$this->editor->alert_ok('Buku telah diubah'));
                 redirect(base_url().'elibrary/perpustakaan/category');
            }
            else {
                $data = array('books' => $this->elib->get_books_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data tidak berhasil diubah');
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File gagal diubah'));
                redirect(base_url().'elibrary/perpustakaan/category');
            }
            
//=======
            
            

        }

        function delete_books($id){
            $data = array('books' => $this->elib->get_books_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['books']){
                //unlink($data['bibliography']['location']); 
                $this->elib->delete_books($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/type');                    
            }
            
        }
        function pinjam(){
            $data='';
            $this->template->display_lib('main/elibrary/perpustakaan/form_pinjam', $data);
            //menampilkan form peminjaman isinya, judul buku (auto complete) NIP, tanggal pinjam,  tanggal harus kembali, banyaknya(default 1)
            
        }
        function do_pinjam(){
            $data=array('insert'=>$this->input->post());
            $this->elib->insert_loan($data['insert']);
            $this->session->set_flashdata('msg',$this->editor->alert_error('Pinjaman telah dimasukkan'));
            redirect(base_url().'elibrary/admin/list_pinjam/'); 
            //menampilkan form peminjaman isinya, judul buku (auto complete) NIP, tanggal pinjam,  tanggal harus kembali, banyaknya(default 1)
            
        }
        function list_pinjam(){
            
            $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_pinjam/";
                $config["total_rows"]=$this->elib->count_loan();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                           
                
                
		 $data = array('loan' => $this->elib->get_loan($config["per_page"],$page));
                 $data["links"] = $this->pagination->create_links();
                $this->template->display_lib('main/elibrary/perpustakaan/list_pinjam', $data);
           
            
            //menampilkan daftar peminjaman, bisa berdasarkan NIP, tanggal peminjaman, tanggal seharusnya kembali, buku
        }
        function kembali($id){
            $data='';
            $this->template->display_lib('main/elibrary/perpustakaan/form_kembali', $data);
            //setelah menekan tombol kembali di list pinjam
            //
        }
        function do_kembali(){
            $data=array('update'=>$this->input->post());
            $this->template->display_lib('main/elibrary/perpustakaan/form_kembali', $data);
            //setelah menekan tombol kembali di list pinjam
            //
        }
        function list_antrian(){
            $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_antrian/";
                $config["total_rows"]=$this->elib->count_queue();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                           
                
                
		 $data = array('queue' => $this->elib->get_queue($config["per_page"],$page));
                 $data["links"] = $this->pagination->create_links();
                $this->template->display_lib('main/elibrary/perpustakaan/list_antrian', $data);
            
        }
        
        
/*--------------Administrasi Perpustakaan Berakhir----------------------*/
/*--------------Administrasi Digital Mulai ----------------------*/
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
		$config['max_size']	= '100000';
                $config['overwrite']    = TRUE;
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
                        $this->template->display_lib('main/elibrary/digital/upload_form', $error);
		}
		else
		{
                        $stringauthor=$this->input->post('authorname');
			 
                        if(!$this->elib->check_author($stringauthor)){ //Apabila author-nya ga ada
                        //masukin pengarang baru
                            $authorinsert['authorname']=$stringauthor;
                            $this->elib->insert_author($authorinsert);
                        }
			$data = array('item' => $this->upload->data(),
                            'category'=>$this->elib->get_category(),
                            'author'=>$this->elib->get_author()
                            );
                        
			$data['insert']['title']=$data['item']['raw_name'];
			
                        $temp=$data['item']['file_ext'];
			if($temp=='.pdf'||$temp='.doc'||$temp='.docx'||$temp='.txt'||$temp='.xls'||$temp='.xlsx') $data['insert']['type']=1; //dokumen
			else if ($temp=='.mp4'||$temp='.mp3'||$temp='.wmv'||$temp='.flv'||$temp='.3gp'||$temp='.mkv'||$temp='.avi') $data['insert']['type']=2;//video
			else if ($temp=='.pptx'||$temp='.ppt') $data['insert']['type']=3; //presentasi
			else  $data['insert']['type']=0; //lain2
			
			$data['insert']['location']='./assets/elibrary/uploads/'.$data['item']['orig_name'];
			$data['insert']['keterangan']=$this->input->post('keterangan');
                        $data['insert']['tags']=$this->input->post('tags');
                        
                        $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
                        $data['insert']['idcategory']=$category['idcategory'];
                        $author=$this->elib->get_id_author_by_name($stringauthor);
                        $data['insert']['idauthor']=$author['idauthor'];
                        
			$this->elib->insert_bibliography($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diupload'));
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
