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
class Diklat extends Perencanaan_Controller{
    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index(){
	$this->daftar_diklat();

    }

    function daftar_diklat($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
	$data['sub_title']='Daftar Diklat Tahun '.$thn;
        $data['kategori']=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($data['kategori'] as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('simdik/perencanaan/daftar_diklat',$data);
    }

    function detail_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['feedback'] = $this->rnc->get_feedback_sarpras_program($id);
	$data['sub_title']='Detail Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        $this->load->library('lib_perencanaan');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        if($data['program']){
            $this->template->display_dik('simdik/perencanaan/detail_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'administrator/dashboard');                    
        }
    }

    function buat_diklat(){
        $this->load->library('editor');
	$data['sub_title']='Buat Diklat Baru';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display('simdik/perencanaan/form_buat_diklat',$data);
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
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Diklat telah ditambahkan'));
	redirect(base_url().'administrator/dashboard');
    }

    function edit_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $this->load->library('editor');
	$data['sub_title']='Ubah Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        if($data['program']){
            $this->template->display_dik('simdik/perencanaan/form_edit_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'administrator/dashboard');                    
        }
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
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Diklat telah diubah'));
	redirect(base_url().'perencanaan/diklat/detail_diklat/'.$clause);
    }

    function delete_diklat($id){
        if($id){
            $this->rnc->delete_diklat($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Diklat telah dihapus'));
            redirect(base_url().'administrator/dashboard');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'administrator/dashboard');
        }
    }

}
