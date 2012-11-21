<?php

//indexing buku
class Perpustakaan extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('mdl_elibrary', 'elib');
        $this->load->library('pagination');

    }

    function index() {
        $data = array(
            'category' => $this->elib->get_category_by()
        );
        $this->template->display_lib('elibrary/perpustakaan/index_perpustakaan', $data);
    }

    function view($id) { //untuk menampilkan keterangan satuan.
        $iduser=$this->session->userdata('id'); //mengambil id pegawai
        $elib_userrole=$this->elib->get_userrole(array('id'=>$iduser)); //mengambil userrole di elib_userrole
        if($elib_userrole) $this->session->set_userdata('elib_userrole', $elib_userrole[0]['userrole']);  //mengeset userrole ke session
                
        $data = array('data' => $this->elib->get_books_by(array('t1.id'=>$id)),
            'loaned' => $this->elib->count_loaned_books($id));

        $this->template->display_lib('elibrary/perpustakaan/single_view', $data);
    }

    function category($idcategory = '') {
        if ($idcategory == '') {
            $data = array(
                'category' => $this->elib->get_category_by()
            );
            $this->template->display_lib('elibrary/perpustakaan/index_perpustakaan', $data);
        } else {
            $config = array();
            $config["base_url"] = base_url() . "elibrary/perpustakaan/category/" . $idcategory . "/";
            $config["total_rows"] = $this->elib->count_books_by(array('idcategory'=>$idcategory));
            $config["per_page"] = 20;
            $config["uri_segment"] = 5;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

            $data = array('data' => $this->elib->get_books_by(array('t1.idcategory'=>$idcategory), $config["per_page"], $page),
                'category' => $this->elib->get_category_by(array('idcategory'=>$idcategory))
            );
            $data["links"] = $this->pagination->create_links();
            $this->template->display_lib('elibrary/perpustakaan/category-view', $data);
        }
    }

    function pesan($id) {
        $data = array('data' => $this->elib->get_books_by(array('t1.id'=>$id)),
            'loaned'=>$this->elib->count_loaned_books($id)
                );
        $this->template->display_lib('elibrary/perpustakaan/form_pesan', $data);
    }
    function do_pesan(){
            $data=array('insert'=>$this->input->post());
            $data['insert']['idpegawai']=($this->session->userdata('id'));
          //  if($data['insert']['idpegawai']>0){
                    $dateTime = new DateTime("now", new DateTimeZone('Asia/Bangkok'));
                    $dt= $dateTime->format("Y-m-d");//;
                $data['insert']['queuedate']=$dt;
                $this->elib->insert_queue($data['insert']);
                $this->session->set_flashdata('msg',$this->editor->alert_ok('Pesanan telah dimasukkan'));
                redirect(base_url().'elibrary/perpustakaan/'); 
                

        }
    public function notifikasi(){
        
    }
    
}