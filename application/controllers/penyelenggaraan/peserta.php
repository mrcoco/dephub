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
    
    function list_peserta($id=-1){
        $data['sub_title']='List Peserta Diklat';
        $data['list']=$this->slng->getall_peserta($id);
        $list_program = $this->rnc->get_program($this->thn);
        $data['id']=$id;
        $data['id_program']=$id;
        $data['pil_program']=array(-1=>'Semua Program');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        if($data['id']==-1){$gen=TRUE;}else{$gen=FALSE;}
        $this->template->display_dik('simdik/penyelenggaraan/list_peserta',$data,$gen);
    }
    
    function registrasi_dik($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['sub_title']='Registrasi Diklat';
        $data['arr_pendidikan']=array(
                            'SR/SD'=>1,
                            'SLTP'=>2,
                            'SLTA'=>3,
                            'D-1'=>4,
                            'D-2'=>5,
                            'D-3/SARMUD'=>6,
                            'D-4'=>7,
                            'S-1'=>8,
                            'PASCASARJANA'=>9,
                            'DOKTOR'=>10,
                            'SPESIALIS'=>'SPESIALIS'
                            );
        $data['pangkat']=array(
                            'I/a'=>0,'I/b'=>1,'I/c'=>2,'I/d'=>3,
                            'II/a'=>4,'II/b'=>5,'II/c'=>6,'II/d'=>7,
                            'III/a'=>8, 'III/b'=>9, 'III/c'=>10,'III/d'=>11,
                            'IV/a'=>12,'IV/b'=>13,'IV/c'=>14,'IV/d'=>15,'IV/e'=>16
                            );
        $this->template->display_dik('simdik/penyelenggaraan/registrasi_dik',$data);
    }
    function registrasi(){
        $data['sub_title']='Registrasi Diklat';
        $list_program = $this->rnc->get_program($this->thn);
        $data['pil_program']=array(-1=>'Pilih diklat');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        $this->template->display_dik('simdik/penyelenggaraan/registrasi',$data,TRUE);
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
        redirect(base_url().'penyelenggaraan/peserta/list_peserta/'.$id_program);
    }
    
    function toggle_status($status){
        if($status==1){
            $data['status']='accept';
        }if($status==2){
            $data['status']='waiting';
        }else if($status==0){
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
        $tmtpns = date_create_from_format('Y-m-d', $data_peserta['tmtpns']);
        $tgl_lhr = date_create_from_format('Y-m-d', $data_peserta['tanggal_lahir']);
        $data_peserta['masa_kerja']=date('Y')-date_format($tmtpns,'Y');
        $data_peserta['usia']=date('Y')-date_format($tgl_lhr,'Y');
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
