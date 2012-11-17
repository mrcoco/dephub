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
                
                $id=$this->session->userdata('id'); //mengambil id pegawai
                $elib_userrole=$this->elib->get_userrole(array('id'=>$id)); //mengambil userrole di elib_userrole
                if($elib_userrole) $this->session->set_userdata('elib_userrole', $elib_userrole[0]['userrole']);  //mengeset userrole ke session
                if(!$this->session->userdata('is_login')||$this->session->userdata('elib_userrole')!=1){ //melarang apabila bukan admin
                redirect(base_url().'elibrary');
                }
	}
        

        function index()
	{
//                $data = array(
//                
//                );
                
                
		$this->template->display_lib('elibrary/admin-page');
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        function add_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('elibrary/short_form');
		//$this->load->view('elibrary/user', array('error' => ' ' ));
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
                
                $data = array('list'=>$this->elib->get_category_by(array(),$config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/list',$data);
                
                
	}
        function edit_category($id)
	{       
                $data = array( 'data'=>$this->elib->get_category_by(array('idcategory'=>$id))
                       );
		$this->template->display_lib('elibrary/short_form',$data);

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
                 if ($this->elib->count_books_by(array('idcategory'=>$id))>0 ||$this->elib->count_bibliography_by(array('idcategory'=>$id))>0){
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Kategori tidak berhasil dihapus karena ada buku/file yang terhubung'));
                   redirect(base_url().'elibrary/admin/list_category');
                 }
               else 
               {
                   $this->elib->delete_category($id);
                   $this->session->set_flashdata('msg',$this->editor->alert_ok('Pengarang berhasil dihapus'));
                   redirect(base_url().'elibrary/admin/list_category');
               }
               
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        
        function list_author()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_author";
                $config["total_rows"]=$this->elib->count_author_by();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_author_by(array(),$config["per_page"], $page)
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/list',$data);
                
                
	}
        function edit_author($id)
	{       
                $data = array( 'data'=>$this->elib->get_author_by(array('idauthor'=>$id))
                       );
		$this->template->display_lib('elibrary/short_form',$data);

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
                 if ($this->elib->count_books_by(array('idauthor'=>$id))>0 ||$this->elib->count_bibliography_by(array('idauthor'=>$id))>0){
                   $this->session->set_flashdata('msg',$this->editor->alert_error('Pengarang tidak berhasil dihapus karena ada buku/file yang terhubung'));
                   redirect(base_url().'elibrary/admin/list_author');
                 }
               else 
               {
                   $this->elib->delete_author($id);
                   $this->session->set_flashdata('msg',$this->editor->alert_ok('Pengarang berhasil dihapus'));
                   redirect(base_url().'elibrary/admin/list_author');
               }
               
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        
        function list_user()
	{
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_user";
                $config["total_rows"]=$this->elib->count_user_by();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;

                $this->pagination->initialize($config);                
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                
                $data = array('list'=>$this->elib->get_user_by(array(),$config["per_page"], $page),
                    'userrole'=>$this->elib->get_userrole()
                );
                $data["links"] = $this->pagination->create_links();
		$this->template->display_lib('elibrary/list',$data);   
		
	}
        function edit_user($id)
	{
            $data=array('data'=>$this->elib->get_user_by(array('t1.id'=>$id)));
		$this->template->display_lib('elibrary/form_edit_user',$data);
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
/*--------------Administrasi Perpustakaan fisik Mulai----------------------*/
        function input_books(){
            $data = array(
                'category'=>$this->elib->get_category_by()
                );
            $this->template->display_lib('elibrary/perpustakaan/books_form', $data);
            
        }
        function do_input_books(){
            $stringauthor=$this->input->post('authorname');
            if(!$this->elib->check_author_by(array('authorname'=>$stringauthor))){ //Apabila author-nya baru
                        //masukin pengarang baru
                            $authorinsert['authorname']=$stringauthor;
                            $this->elib->insert_author($authorinsert);
                        }
            $data = array(
                'category'=>$this->elib->get_category_by()
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

            $category=$this->elib->get_category_by(array('categoryname'=>$this->input->post('categoryname')));
            $data['insert']['idcategory']=$category[0]['idcategory'];
            $author=$this->elib->get_author_by(array('authoname'=>$this->input->post('authorname')));
            $data['insert']['idauthor']=$author[0]['idauthor'];

            $this->elib->insert_books($data['insert']);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Buku telah ditambah '.$data['insert']['title']));
            redirect(base_url().'elibrary/perpustakaan/category');
//			$this->template->display_lib('elibrary/upload_success', $data);
        }
        
        
        
        
        function edit_books($id) {

            $data = array('data' => $this->elib->get_books_by(array('t1.id'=>$id)),
                'category'=>$this->elib->get_category_by(),
                'status'=>' '
                );
            if($data['data']){
                $this->template->display_lib('elibrary/perpustakaan/edit_form', $data);
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
                        
                        $category=$this->elib->get_category_by(array('categoryname'=>$this->input->post('categoryname')));
                        $data['update']['idcategory']=$category[0]['idcategory'];
                        $author=$this->elib->get_author_by(array('authorname'=>$this->input->post('authorname')));
                        $data['update']['idauthor']=$author[0]['idauthor'];
                         
            if($this->elib->update_books($data['update']))
            {
            $data = array('books' => $this->elib->get_books_by(array('t1.id'=>$update['id'])),
                'category'=>$this->elib->get_category_by(),
                'status'=>'Data berhasil diubah'
                 );
            
                 $this->session->set_flashdata('msg',$this->editor->alert_ok('Buku telah diubah'));
                 redirect(base_url().'elibrary/perpustakaan/category');
            }
            else {
                $data = array('books' => $this->elib->get_books_by(array('t1.id'=>$update['id'])),
                'category'=>$this->elib->get_category_by(),
                'status'=>'Data tidak berhasil diubah');
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File gagal diubah'));
                redirect(base_url().'elibrary/perpustakaan/category');
            }
            
//=======
            
            

        }

        function delete_books($id){
            $data = array('data' => $this->elib->get_books_by(array('t1.id'=>$id)));
            $data['sub_title']='Kategori File';
            
            if($data['data']){
                $this->elib->delete_books($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/type');                    
            }
            
        }
        function pinjam($id){ //hanya admin
            $data = array('data' => $this->elib->get_books_by(array('t1.id'=>$id)),
                            'loaned'=>$this->elib->count_loaned_books($id)
                );
            $this->template->display_lib('elibrary/perpustakaan/form_pinjam', $data);
            //menampilkan form peminjaman isinya, judul buku (auto complete) NIP, tanggal pinjam,  tanggal harus kembali, banyaknya(default 1)
            
        }
        function do_pinjam(){
            $data=array('insert'=>$this->input->post());
            $data['insert']['idpegawai']=  $this->elib->get_idpegawai(array('nip'=>$data['insert']['idpegawai']));
            if($data['insert']['idpegawai']>0){
                $this->elib->insert_loan($data['insert']);
                $this->session->set_flashdata('msg',$this->editor->alert_error('Pinjaman telah dimasukkan'));
                redirect(base_url().'elibrary/admin/list_pinjam/'); 
                //menampilkan form peminjaman isinya, judul buku (auto complete) NIP, tanggal pinjam,  tanggal harus kembali, banyaknya(default 1)
            }
            else {
                $this->session->set_flashdata('msg',$this->editor->alert_error('NIP tidak ditemukan'));
                redirect(base_url().'elibrary/admin/pinjam/'.$data['insert']['booksid']); 
            }
            
        }
        function list_pinjam(){
                $filter['1.returndate']='0000-00-00';//filter harus ditambahkan string angka. (misal 1.) karena query join di mdl
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_pinjam/";
                $config["total_rows"]=$this->elib->count_loan($filter);
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                           
                
                
		 $data = array('loan' => $this->elib->get_loan($filter,$config["per_page"],$page));
                 $data["links"] = $this->pagination->create_links();
                $this->template->display_lib('elibrary/perpustakaan/list_pinjam', $data);
           
            
            //menampilkan daftar peminjaman, bisa berdasarkan NIP, tanggal peminjaman, tanggal seharusnya kembali, buku
        }
        function kembali($id){
            
            
            $data=array('data'=>$this->elib->get_loan(array('1.id'=>$id),1,0));
            $this->template->display_lib('elibrary/perpustakaan/form_kembali', $data);
            //setelah menekan tombol kembali di list pinjam
            //
        }
        function do_kembali(){
            //harus diurus tentang pesanan yang ada.cari queue yang berhubungan dengan booksidnya dan status-nya belum
            $booksid=$this->input->post('booksid');          
            $books=$this->elib->get_books_by(array('t1.id'=>$booksid));
            $sisa=$books[0]['stock']-$this->elib->count_loaned_books($booksid);
            if($sisa<=0){
            $data['queue']=$this->elib->get_queue_for_kembali(array('booksid'=>$booksid,'status'=>0),1,0);
            //urutkan berdasar tanggal.  ambil yang pertama, dan tandai available date-nya
            $this->elib->update_queue(array('id'=>$data['queue'][0]['id'],'availabledate'=>date('Y-m-d'),'status'=>4)); 
            $masuk='masuk';
            }
            $data['update']['id']=$this->input->post('id');
            $data['update']['returndate']=$this->input->post('returndate');
            $this->elib->update_loan($data['update']);
            $pesan=$masuk.'peminjaman no '.$data['update']['id'].' telah dikembalikan.';
            $this->session->set_flashdata('msg',$this->editor->alert_ok($pesan));
            
            redirect(base_url().'elibrary/admin/list_pinjam'); 
        }
        function histori_pinjam(){
                 $filter['1.returndate !=']='0000-00-00';
                 
                //filter harus ditambahkan string angka. (misal 1.) karena query join di mdl
                $config=array();
                $config["base_url"]= base_url()."elibrary/admin/histori_kembali/";
                $config["total_rows"]=$this->elib->count_loan($filter);
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
		 $data = array('loan' => $this->elib->get_loan($filter,$config["per_page"],$page));
                 $data["links"] = $this->pagination->create_links();
                $this->template->display_lib('elibrary/perpustakaan/histori_pinjam', $data);
        }
        function list_pesan(){
            $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_pesan/";
                $config["total_rows"]=$this->elib->count_queue();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $filter=array('status <='=>1);
		 $data = array('queue' => $this->elib->get_queue($filter,$config["per_page"],$page));
                 $data["links"] = $this->pagination->create_links();
                $this->template->display_lib('elibrary/perpustakaan/list_pesan', $data);
            
        }
        function histori_pesan(){
            $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_pesan/";
                $config["total_rows"]=$this->elib->count_queue();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $filter=array('status >'=>1);
		$data = array('queue' => $this->elib->get_queue($filter,$config["per_page"],$page));
                $data["links"] = $this->pagination->create_links();
                $this->template->display_lib('elibrary/perpustakaan/list_pesan', $data);
            
        }
        function hapus_pesan($id){
            $this->elib->delete_queue($id);
            $pesan='pemesanan no '.$id.' telah dihapus.';
            $this->session->set_flashdata('msg',$this->editor->alert_ok($pesan));
            redirect(base_url().'elibrary/admin/list_pesan'); 
        }
        function pinjam_dari_pesan($id=''){
            
            $data['queue']=$this->elib->get_queue(array('1.id'=>$id),1,0);
            $data['data']=$this->elib->get_books_by(array('t1.id'=>$data['queue'][0]['booksid']));
            $data['data'][0]['pinjam']=$this->elib->count_loaned_books($booksid);
            $this->template->display_lib('elibrary/perpustakaan/form_pinjam_dari_pesan', $data);
            
        }
        function do_pinjam_dari_pesan(){
            $data=array('insert'=>$this->input->post());
            $data['insert']['idpegawai']=  $this->elib->get_idpegawai(array('nip'=>$data['insert']['idpegawai']));
            if($data['insert']['idpegawai']>0){
                $this->elib->insert_loan($data['insert']);
                $queue['id']=$data['insert']['idqueue'];
                $queue['status']=1; 
                $this->elib->update_queue($queue);//mengupdate bahwa queue yang disini diubah jadi sudah.
                $this->session->set_flashdata('msg',$this->editor->alert_error('Pinjaman telah dimasukkan'));
                redirect(base_url().'elibrary/admin/list_pinjam/'); 
                //menampilkan form peminjaman isinya, judul buku (auto complete) NIP, tanggal pinjam,  tanggal harus kembali, banyaknya(default 1)
            }
            else {
                $this->session->set_flashdata('msg',$this->editor->alert_error('NIP tidak ditemukan'));
                redirect(base_url().'elibrary/admin/pinjam/'.$data['insert']['booksid']); 
            }
            
        }
        
/*--------------Administrasi Perpustakaan Berakhir----------------------*/
/*--------------Administrasi Digital Mulai ----------------------*/
        
        
        function edit_bibliography($id) {

            $data = array('data' => $this->elib->get_bibliography_by(array('t1.id'=>$id)),
                'category'=>$this->elib->get_category_by(),
                'status'=>' '
                );
            if($data['data']){
                $this->template->display_lib('elibrary/digital/edit_form', $data);
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/digital/type');                    
            }

        }
        
        function do_edit_bibliography() {
            $update['id']=$this->input->post('id');
            $update['title']=$this->input->post('title');
            $category=$this->elib->get_category_by(array('categoryname'=>$this->input->post('categoryname')));
            $update['idcategory']=$category[0]['idcategory'];
            $author=$this->elib->get_author_by(array('authorname'=>$this->input->post('authorname')));
            $update['idauthor']=$author[0]['idauthor'];
            $update['keterangan']=$this->input->post('keterangan');

            $update['tags']=$this->input->post('tags');
            if($this->elib->update_bibliography($update))
            {
            $data = array('bibliography' => $this->elib->get_bibliography_by(array('t1.id'=>$update['id'])),
                'category'=>$this->elib->get_category_by(),
                'status'=>'Data berhasil diubah'
                 );
                          
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diubah'));
                redirect(base_url().'elibrary/digital/type');
            }
            else {
                $data = array('bibliography' => $this->elib->get_bibliography_by_id($update['id']),
                'category'=>$this->elib->get_category_by(),
                'status'=>'Data tidak berhasil diubah');
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File gagal diubah'));
                redirect(base_url().'elibrary/digital/type');
            }
            
        }
        
        

        function delete_bibliography($id){
            $data = array('data' => $this->elib->get_bibliography_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['data']){
                //unlink($data['bibliography']['location']); 
                $this->elib->delete_bibliography($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/digital/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/digital/type');                    
            }
            
        }
        /* ---------- autocomplete---------------*/
        
}       
?>
