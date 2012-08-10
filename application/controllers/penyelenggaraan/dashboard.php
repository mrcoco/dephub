<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author bharata
 */
class Dashboard extends Penyelenggaraan_Controller{
    
    protected $thn;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
        
    }
    
    function registrasi(){
        $data['sub_title']='Registrasi Diklat';
        $list_program = $this->rnc->get_program($this->thn);
        $data['pil_program']=array(-1=>'Pilih diklat');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        
        $this->template->display('main/penyelenggaraan/registrasi',$data);
    }
    
    function registrasi_proses(){
        $id_program=$this->input->post('program');
        $instansi=$this->input->post('instansi');
        
        $nama=$this->input->post('nama');
        $nip=$this->input->post('nama');
        $pangkat=$this->input->post('pangkat');
        $gol=$this->input->post('gol');
        $tgl_lahir=$this->input->post('tgl_lahir');
        $jabatan=$this->input->post('jabatan');
        
        for($i=0;$i<count($nama);$i++){
            $peserta['nip']=$nip[$i];
            $peserta['nama']=$nama[$i];
            $peserta['pangkat']=$pangkat[$i];
            $peserta['golongan']=$gol[$i];
            $peserta['tanggal_lahir']=$tgl_lahir[$i];
            $peserta['jabatan']=$jabatan[$i];
            $peserta['id_program']=$id_program;
            $peserta['instansi']=$instansi;
            
            $reg['id_peserta']=$this->slng->insert_peserta($peserta);
            $reg['id_program']=$id_program;
            $reg['status']='daftar';
            $this->slng->insert_registrasi($reg);
<<<<<<< HEAD
=======
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Peserta telah ditambahkan'));
            redirect(base_url().'penyelenggaraan/dashboard/registrasi');
>>>>>>> 2ee36ee6a9f157a8f4c409592ec407a7f8307048
        }
    }
    
    function list_widyaiswara(){
        $data['sub_title']='Daftar Widyaiswara';
        $data['list']=$this->slng->getall_widyaiswara();
        $this->template->display('main/penyelenggaraan/list_widyaiswara',$data);
    }
    
    function detail_widyaiswara($id){
        $data['data'] = $this->slng->get_widyaiswara($id);
        $data['sub_title']='Detail Data '.$data['data']['nama'];
        if($data['data']){
            $this->template->display('main/penyelenggaraan/detail_widyaiswara',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Widyaiswara tidak ditemukan'));
            redirect(base_url().'penyelenggaraan/dashboard/list_widyaiswara');
        }
    }
    
    function add_widyaiswara(){
        $data['sub_title']='Isi Data Widyaiswara';
        $this->template->display('main/penyelenggaraan/cv_widyaiswara',$data);
    }
    
    function insert_widyaiswara(){
        $data['nama']=$this->input->post('nama');
        $data['nip']=$this->input->post('nip');
        $data['tempat_lahir']=$this->input->post('tempat');
        $data['tanggal_lahir']=$this->input->post('tanggal');
        $data['pangkat']=$this->input->post('pangkat');
        $data['golongan']=$this->input->post('gol');
        $data['instansi']=$this->input->post('instansi');
        $data['jabatan']=$this->input->post('jabatan');
        $data['pendidikan_dn']=$this->input->post('dn');
        $data['pendidikan_ln']=$this->input->post('ln');
        $data['alamat_rumah']=$this->input->post('alamat_rumah');
        $data['tlp_rumah']=$this->input->post('tlp_rumah');
        $data['alamat_kantor']=$this->input->post('alamat_kantor');
        $data['tlp_kantor']=$this->input->post('tlp_kantor');
        $data['status']=1;
        $this->slng->insert_widyaiswara($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Widyaiswara telah ditambahkan'));
        redirect(base_url().'penyelenggaraan/dashboard/list_widyaiswara');
    }
    
    function edit_widyaiswara($id){
        $data['data'] = $this->slng->get_widyaiswara($id);
        $data['sub_title']='Edit Data '.$data['data']['nama'];
        if($data['data']){
            $this->template->display('main/penyelenggaraan/edit_widyaiswara',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Widyaiswara tidak ditemukan'));
            redirect(base_url().'penyelenggaraan/dashboard/list_widyaiswara');
        }
    }
    
    function edit_process(){
        $clause=$this->input->post('id');
        $data['nama']=$this->input->post('nama');
        $data['nip']=$this->input->post('nip');
        $data['tempat_lahir']=$this->input->post('tempat');
        $data['tanggal_lahir']=$this->input->post('tanggal');
        $data['pangkat']=$this->input->post('pangkat');
        $data['golongan']=$this->input->post('gol');
        $data['instansi']=$this->input->post('instansi');
        $data['jabatan']=$this->input->post('jabatan');
        $data['pendidikan_dn']=$this->input->post('dn');
        $data['pendidikan_ln']=$this->input->post('ln');
        $data['alamat_rumah']=$this->input->post('alamat_rumah');
        $data['tlp_rumah']=$this->input->post('tlp_rumah');
        $data['alamat_kantor']=$this->input->post('alamat_kantor');
        $data['tlp_kantor']=$this->input->post('tlp_kantor');
        $this->slng->update_widyaiswara($clause,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Widyaiswara telah diubah'));
        redirect(base_url().'penyelenggaraan/dashboard/detail_widyaiswara'.$clause);
    }
    
    function delete_widyaiswara($id){
        
        $data['data'] = $this->slng->get_widyaiswara($id);
        $data['sub_title']='Registrasi Diklat';
        if($data['data']){
            $this->slng->delete_widyaiswara($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Diklat telah dihapus'));
            redirect(base_url().'perencanaan/dashboard/list_widyaiswara');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Widyaiswara tidak ditemukan'));
            redirect(base_url().'penyelenggaraan/dashboard/list_widyaiswara');
        }
    }
}
