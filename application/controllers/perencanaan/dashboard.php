<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perencanaan
 *
 * @author irhamnurhalim
 */
class Dashboard extends Perencanaan_Controller{
    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index(){
        $this->home();

    }

    function home($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
	$data['title']='Bidang Perencanaan';
        $data['kategori']=$this->rnc->get_kategori();
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('main/perencanaan/index',$data);
    }
    
    function detail_diklat($id){
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['title']='Bidang Perencanaan';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display('main/perencanaan/detail_diklat',$data);
    }
    
    function buat_diklat(){
        $this->load->library('editor');
        $data['title']='Bidang Perencanaan';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display('main/perencanaan/form_buat_diklat',$data);
    }
    
    function insert_diklat(){
        $data['name']=$this->input->post('name');
        $data['parent']=$this->input->post('kategori');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tujuan']=$this->input->post('tujuan');
        $data['indikator']=$this->input->post('indikator');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['persyaratan']=$this->input->post('persyaratan');
        $data['materi']=$this->input->post('materi');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        $data['jumlah_peserta']=$this->input->post('jumlah_peserta');
        $data['tempat']=$this->input->post('tempat');
        $data['tahun_program']=$this->input->post('tahun_program');
        
        $this->rnc->insert_diklat($data);
	redirect('perencanaan/dashboard');        
    }
    
    function edit_diklat($id){
        $data['program']=$this->rnc->get_program_by_id($id);
        $this->load->library('editor');
        $data['title']='Bidang Perencanaan';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display('main/perencanaan/form_edit_diklat',$data);
    }
    
    function update_diklat(){
        $clause=$this->input->post('id');
        
        $data['name']=$this->input->post('name');
        $data['parent']=$this->input->post('kategori');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tujuan']=$this->input->post('tujuan');
        $data['indikator']=$this->input->post('indikator');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['persyaratan']=$this->input->post('persyaratan');
        $data['materi']=$this->input->post('materi');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        $data['jumlah_peserta']=$this->input->post('jumlah_peserta');
        $data['tempat']=$this->input->post('tempat');
        $data['tahun_program']=$this->input->post('tahun_program');
        
        $this->rnc->update_diklat($clause,$data);
	redirect('perencanaan/dashboard/detail_diklat/'.$clause);        
    }
    
    function delete_diklat($id){
        $this->rnc->delete_diklat($id);
	redirect('perencanaan/dashboard');        
    }
}
