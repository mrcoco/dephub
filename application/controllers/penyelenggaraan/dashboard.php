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
        $this->home();
    }
    
    function home(){
        
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
            echo 'sukses<br/>';
        }
        
    }
}
