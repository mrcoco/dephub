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
class Pegawai extends Penyelenggaraan_Controller{
    
    protected $thn;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
        $this->list_pegawai();
    }
    
    function list_pegawai($id_program=-1){
        $data['sub_title']='List Pegawai Diklat';
        $data['list']=$this->slng->getall_pegawai($id_program);
        $list_program = $this->rnc->get_program($this->thn);
        $data['id_program']=$id_program;
        $data['pil_program']=array(-1=>'Semua Program');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        $this->template->display('simdik/penyelenggaraan/list_pegawai',$data);
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
            $reg['id_pegawai']=$id[$i];
            $reg['id_program']=$id_program;
            $reg['status']='daftar';
            $this->slng->insert_registrasi($reg);
        }
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Pegawai telah ditambahkan'));
        redirect(base_url().'penyelenggaraan/pegawai/list_pegawai');
    }
    
    function toggle_status($status){
        if($status=='accept'){
            $data['status']='accept';
        }else{
            $data['status']='daftar';
        }
        $clause['id_pegawai']=$this->input->post('id_pegawai');
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
    
    function get_cv_pegawai($kodekantor){
        $list_pegawai=$this->slng->get_pegawai($kodekantor);
        $array_list=array();
        $n=0;
        foreach($list_pegawai as $l){
            $array_list[$n]=$l['nip'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function get_data_pegawai($nip){
        $data_pegawai=$this->slng->get_data_pegawai($nip);
        echo json_encode($data_pegawai);
    }
    
    function get_history_pelatihan($id){
        $history=$this->slng->get_history($id);
        $data_pegawai=$this->slng->get_data_pegawai_id($id);
        
        $header='History pelatihan '.$data_pegawai['nama'];
        
        if(count($history)==0){
            $data='Tidak ada data history pelatihan';
        }else{
            $data='<ul>';
            foreach($history as $h){
                $data.='<li>'.$h['tahun'].' : '.$h['nama_pelatihan'].'</li>';
            }
            $data.='</ul>';
        }
        $text = '<div class="modal-header">
                    <h3>'.$header.'</h3>
                </div>
                <div class="modal-body">'.$data.'</div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>';
        echo $text;
    }
}
