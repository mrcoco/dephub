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
        $id=$this->input->post('id');
        
        for($i=0;$i<count($id);$i++){
            $reg['id_peserta']=$id[$i];
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
    
    function list_instansi(){
        $list_instansi=$this->slng->getall_instansi();
        $array_list=array();
        $n=0;
        foreach($list_instansi as $l){
            $array_list[$n]=$l['nama_instansi'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function get_kode_instansi($nama){
        $nama=  str_replace('%20', ' ', $nama);
        echo $this->slng->getkode_instansi($nama);
    }
    
    function get_cv_peserta($kodekantor){
        $list_peserta=$this->slng->get_peserta($kodekantor);
        $array_list=array();
        $n=0;
        foreach($list_peserta as $l){
            $array_list[$n]=$l['nip'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function get_data_peserta($nip){
        $data_peserta=$this->slng->get_data_peserta($nip);
        echo json_encode($data_peserta);
    }
}
