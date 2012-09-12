<?php
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
    
    function get_history_pelatihan($id){
        $history=$this->slng->get_history($id);
        $data_peserta=$this->slng->get_data_peserta_id($id);
        
        $header='History pelatihan '.$data_peserta['nama'];
        
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
    
    function get_detail_peserta($id){
        $this->load->library('date');
        $data_peserta=$this->slng->get_data_peserta_id($id);
        $data['header']='Detail data '.$data_peserta['nama'];
        foreach($data_peserta as $key=>$item){
            if($key!='foto'){
                if($item==''){
                    $item='-';
                }
            }else{
                if($item==''){
                    $item=base_url().'assets/public/foto/nopic.jpg';
                }
            }
            $data['peserta'][$key]=$item;
        }
        $this->load->view('simdik/penyelenggaraan/ajax_detail_peserta',$data);
    }
}
