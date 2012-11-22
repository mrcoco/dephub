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
                $this->load->model('mdl_penyelenggaraan','slng');
                
                if(!$this->session->userdata('is_login')||$this->session->userdata('elib_userrole')!=1){ //melarang apabila bukan admin
                redirect(base_url().'elibrary');
                }
	}
        

        function index()
	{
//                $data = array(
//                
//                );
                
                
		$this->template->display_lib('elibrary/admin/admin-page');
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        function add_category()
	{
//                $data = array(
//                
//                );
		$this->template->display_lib('elibrary/admin/short_form');
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        function do_add_category()
	{
                $data['insert']['categoryname']=  $this->input->post('categoryname');
                $this->elib->insert_category($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah ditambah '+$data['insert']['categoryname']));
                        redirect(base_url().'elibrary/admin/list_category');
		
	}
        /*tanpa ajax
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
		$this->template->display_lib('elibrary/admin/list',$data);
                
                
	} */
        function list_category(){
            if($this->session->userdata('elib_userrole')!=1){
                redirect(base_url().'error/error_priv');
            }
            //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
            $data['sub_title']='List Kategori';
            $this->template->display_lib('elibrary/admin/list_category',$data);
        }
        
        function list_category_ajax($page=1,$filter=''){
            if($this->session->userdata('elib_userrole')!=1){
                redirect(base_url().'error/error_priv');
            }
            //melist pegawai, pake paging dan ada filter berdasarkan instansi
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $data['data']=$this->elib->get_category_like($data['filter'],$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_category_like($filter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/admin/ajax_list_category',$data,true);
        }
        function edit_category($id)
	{       
                $data = array( 'data'=>$this->elib->get_category_by(array('idcategory'=>$id))
                       );
		$this->template->display_lib('elibrary/admin/short_form',$data);

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
        function list_author(){
            if($this->session->userdata('elib_userrole')!=1){
                redirect(base_url().'error/error_priv');
            }
            //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
            $data['sub_title']='List Pengarang';
            $this->template->display_lib('elibrary/admin/list_author',$data);
        }
        
        function list_author_ajax($page=1,$filter=''){
            if($this->session->userdata('elib_userrole')!=1){
                redirect(base_url().'error/error_priv');
            }
            //melist pegawai, pake paging dan ada filter berdasarkan instansi
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $data['data']=$this->elib->get_author_like($data['filter'],$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_author_like($filter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/admin/ajax_list_author',$data,true);
        }
        /*function list_author()
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
		$this->template->display_lib('elibrary/admin/list',$data);
    
	}*/
        function edit_author($id)
	{       
                $data = array( 'data'=>$this->elib->get_author_by(array('idauthor'=>$id))
                       );
		$this->template->display_lib('elibrary/admin/short_form',$data);

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
        /*tanpa ajax
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
		$this->template->display_lib('elibrary/admin/list',$data);   
		
	}
        */
        function list_user(){
            if($this->session->userdata('elib_userrole')!=1){
                redirect(base_url().'error/error_priv');
            }
            //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
            $data['sub_title']='List Anggota';
            $this->template->display_lib('elibrary/admin/list_anggota',$data);
        }
        
        function list_user_ajax($page=1,$filter=''){
            if($this->session->userdata('elib_userrole')!=1){
                redirect(base_url().'error/error_priv');
            }
            //melist pegawai, pake paging dan ada filter berdasarkan instansi
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $data['data']=$this->elib->get_user_like($data['filter'],$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_user_like($filter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/admin/ajax_list_anggota',$data,true);
        }
        
        function edit_user($id)
	{
            $data=array('data'=>$this->elib->get_user_by(array('t1.id'=>$id)));
		$this->template->display_lib('elibrary/admin/form_edit_user',$data);
		//$this->load->view('elibrary/user', array('error' => ' ' ));
	}
        function do_edit_user()
	{
            $data['query']=$this->input->post();
            if($this->elib->get_userrole(array('id'=>$data['query']['id']))){
                //update
                $this->elib->update_userrole($data['query']);
                $this->session->set_flashdata('msg',$this->editor->alert_ok('Jenis anggota telah diubah.'));
                redirect(base_url().'elibrary/admin/list_user');
            }
            else {
                $this->elib->insert_userrole($data['query']);
                $this->session->set_flashdata('msg',$this->editor->alert_ok('Jenis anggota telah diubah.'));
                redirect(base_url().'elibrary/admin/list_user');
            }
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
        function list_buku_pinjam(){
            $data['sub_title']='List Buku';
            $this->template->display_lib('elibrary/perpustakaan/list_buku_pinjam',$data);
        }
        
        function list_buku_pinjam_ajax($page=1,$filter=''){
            //melist Peminjaman, pake paging 
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $data['data']=$this->elib->search_books($data['filter'],$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_books_for_search($data['filter']);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/perpustakaan/ajax_list_buku_pinjam',$data,true);
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
        /* tanpa js
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
        } */
        function list_pinjam(){
            $data['sub_title']='List Peminjaman';
            $this->template->display_lib('elibrary/perpustakaan/list_pinjam',$data);
        }
        
        function list_pinjam_ajax($page=1,$filter=''){
            //melist Peminjaman, pake paging 
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $datefilter='= 0000-00-00';
            $data['data']=$this->elib->get_loan_for_list($data['filter'],$datefilter,$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_loan_for_list($data['filter'],$datefilter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/perpustakaan/ajax_list_pinjam',$data,true);
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
        /*tanpa JS
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
         */
         
        function histori_pinjam(){
            $data['sub_title']='Histori Peminjaman';
            $this->template->display_lib('elibrary/perpustakaan/list_pinjam',$data);
        }
        
        function histori_pinjam_ajax($page=1,$filter=''){
            //melist Peminjaman, pake paging 
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $datefilter='!= 0000-00-00';
            $data['data']=$this->elib->get_loan_for_list($data['filter'],$datefilter,$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_loan_for_list($data['filter'],$datefilter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/perpustakaan/ajax_list_pinjam',$data,true);
        }
        /*tanpa js
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
                $this->template->display_lib('elibrary/perpustakaan/list_pesan-2', $data);
            
        }*/
        function list_pesan(){
            $data['sub_title']='List Peminjaman';
            $this->template->display_lib('elibrary/perpustakaan/list_pesan',$data);
        }
        
        function list_pesan_ajax($page=1,$filter=''){
            //melist Peminjaman, pake paging 
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $statusfilter='<= 1';
            $data['data']=$this->elib->get_queue_for_list($data['filter'],$statusfilter,$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_queue_for_list($data['filter'],$statusfilter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/perpustakaan/ajax_list_pesan',$data,true);
        }
        /*tanpa JS
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
            
        }*/
        function histori_pesan(){
            $data['sub_title']='List Peminjaman';
            $this->template->display_lib('elibrary/perpustakaan/list_pesan',$data);
        }
        
        function histori_pesan_ajax($page=1,$filter=''){
            //melist Peminjaman, pake paging 
            $data['cur_page']=$page;
            $data['per_page']=25;
            $data['filter']= str_replace('%20', ' ', $filter);
            $data['offset']=($data['cur_page']-1)*$data['per_page'];
            $statusfilter='> 1';
            $data['data']=$this->elib->get_queue_for_list($data['filter'],$statusfilter,$data['per_page'],$data['offset']);
            $data['num_res']=$this->elib->count_queue_for_list($data['filter'],$statusfilter);
            $data['num_page']=ceil($data['num_res']/$data['per_page']);
            echo $this->load->view('elibrary/perpustakaan/ajax_list_pesan',$data,true);
        }
        function hapus_pesan($id){
            $this->elib->delete_queue($id);
            $pesan='pemesanan no '.$id.' telah dihapus.';
            $this->session->set_flashdata('msg',$this->editor->alert_ok($pesan));
            redirect(base_url().'elibrary/admin/list_pesan'); 
        }
        function pinjam_dari_pesan($id=''){
            
            $data['queue']=$this->elib->get_queue(array('1.id'=>$id),1,0);
            $booksid=$data['queue'][0]['booksid'];
            $data['data']=$this->elib->get_books_by(array('t1.id'=>$booksid));
            
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
        /* ---------- post---------------*/
        function list_post(){
            $config=array();
                $config["base_url"]= base_url()."elibrary/admin/list_post/";
                $config["total_rows"]= $this->elib->count_post();
                $config["per_page"]=20;
                $config["uri_segment"] = 4;
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data = array('data' => $this->elib->get_post(array(),array(),$config["per_page"],$page));
                $data["links"] = $this->pagination->create_links();
                $data['sub_title']='List Post';
                $this->template->display_lib('elibrary/admin/list', $data);
            
            
            
        }
        function create_post(){
            $data['sub_title']='Tambah Post';
            $this->template->display_lib('elibrary/admin/form_post',$data);
        }
        function do_create_post(){
            $data['insert']['title']=$this->input->post('title');
            $data['insert']['creationdate']=date('Y-m-d');
            $data['insert']['modifieddate']=date('Y-m-d');
            $data['insert']['posterid']=$this->session->userdata('id');
            $data['insert']['modifierid']=$this->session->userdata('id');
            $data['insert']['status']=$this->input->post('status');
            $data['insert']['content']=$this->input->post('content');
            $this->elib->insert_post($data['insert']);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Post telah ditambahkan'));
            redirect(base_url().'elibrary/admin');
            
        }
        function edit_post($id){
            //ambil isinya
            $data['sub_title']='Edit Post';
            $where=array('elib_post.id'=>$id);
            $data['data']=$this->elib->get_post($where);
            $data['modifier']=$this->elib->get_user_by(array('t1.id'=>$data['data'][0]['modifierid']));
            $this->template->display_lib('elibrary/admin/form_edit_post',$data);
        }
        function do_edit_post(){
            $data['update']['id']=$this->input->post('id');
            $data['update']['title']=$this->input->post('title');
            $data['update']['modifieddate']=date('Y-m-d');
            $data['update']['modifierid']=$this->session->userdata('id');
            $data['update']['status']=$this->input->post('status');
            $data['update']['content']=$this->input->post('content');
            $this->elib->update_post($data['update']);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Post telah diubah'));
            redirect(base_url().'elibrary/admin');
        }
        
        function do_delete_post($id){
            $data['update']['id']=$id;
            $data['update']['modifieddate']=date('Y-m-d');
            $data['update']['authorid']=$this->session->userdata('id');
            $data['update']['status']=3;
            $this->elib->insert_post($data['insert']);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Post telah ditambahkan'));
        }
}       
?>
