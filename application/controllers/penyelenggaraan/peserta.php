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
class Peserta extends Penyelenggaraan_Controller{
    
    protected $thn;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
        $this->list_peserta();
    }
    
    function list_peserta($id_program=-1){
        $data['sub_title']='List Peserta Diklat';
        $data['list']=$this->slng->getall_peserta($id_program);
        $list_program = $this->rnc->get_program($this->thn);
        $data['id_program']=$id_program;
        $data['pil_program']=array(-1=>'Semua Program');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        $this->template->display('simdik/penyelenggaraan/list_peserta',$data);
    }
    
    function registrasi(){
        $data['sub_title']='Registrasi Diklat';
        $list_program = $this->rnc->get_program($this->thn);
        $data['pil_program']=array(-1=>'Pilih diklat');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        $this->template->display('simdik/penyelenggaraan/registrasi',$data);
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
        }
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Peserta telah ditambahkan'));
        redirect(base_url().'penyelenggaraan/peserta/list_peserta');
    }
    
    function toggle_status($status){
        if($status=='accept'){
            $data['status']='accept';
        }else{
            $data['status']='daftar';
        }
        $clause['id_peserta']=$this->input->post('id_peserta');
        $clause['id_program']=$this->input->post('id_program');
        $this->slng->toggle_status($clause,$data);
    }
    
}
