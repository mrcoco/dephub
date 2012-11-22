<?php
class Front extends CI_Controller{
    function __construct() {
        parent::__construct();
        //buat ngilangin data session sebelumnya
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_unit','unit');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn_def = date('Y');
    }
    
    function index(){
        if(!$this->session->userdata('is_login_unit')){
            $data_session=array(
                'nama_unit',
                'kode_unit',
                'is_login_unit'
            );
            $this->session->unset_userdata($data_session);
            $this->session->sess_destroy();
            $this->login_form();
        }else{
            $this->list_pendaftar();
        }
    }
    
    function login_form(){
        $data['title']='Login unit';
        $instansi=$this->slng->getall_instansi();
        $data['ins']=array();
        $data['ins'][-1]='--Pilih Instansi--';
        foreach($instansi as $i){
            $data['ins'][$i['kode_kantor']]=$i['nama_instansi'];
        }
        $this->template->display('unit/login_form',$data);
    }
    
    function ajax_load_unit($parent){
        $ret=$this->unit->get_list_unit($parent);
        echo json_encode($ret);
    }
    
    function json_unit_pegawai($kodeunit){
        $list_peserta=$this->slng->get_peserta_unit($kodeunit);
        $array_list=array();
        $n=0;
        foreach($list_peserta as $l){
            $array_list[$n]=$l['nip'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function ajax_cek_daftar($id_diklat,$nip_pegawai,$thn){
//        echo current_url().'<br/>';
//        echo $nip_pegawai;
        if($this->slng->get_one_peserta($id_diklat,$nip_pegawai,$thn)==0){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    function ajax_detail_peserta($id){
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
        $data['arr_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pangkat']=$this->rnc->get_pangkat_gol();
        $this->load->view('pegawai/ajax_detail_peserta',$data);
    }
    
    function ajax_history_pelatihan($id){
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
    
    function json_data_pegawai($nip){
        $data_peserta=$this->slng->get_data_peserta($nip);
        $tmtpns = date_create_from_format('Y-m-d', $data_peserta['tmtpns']);
        $tgl_lhr = date_create_from_format('Y-m-d', $data_peserta['tanggal_lahir']);
        $data_peserta['masa_kerja']=date('Y')-date_format($tmtpns,'Y');
        $data_peserta['usia']=date('Y')-date_format($tgl_lhr,'Y');
        echo json_encode($data_peserta);
    }
    
    function login_process(){
        $data['nama_unit']=$this->input->post('unit');
        $data['password_unit']=md5($this->input->post('password'));
        $res=$this->unit->login_unit($data);
        if($res>0){
            $data_session=array(
                'nama_unit'=>$data['nama_unit'],
                'kode_unit'=>$this->unit->get_kode_unit($data['nama_unit']),
                'is_login_unit'=>true
            );
            $this->session->set_userdata($data_session);
            redirect(base_url().'unit/front/list_pendaftar');
        }else{
            redirect(base_url().'unit/front');
        }
    }
    
    function list_pendaftar($thn=''){
        if($thn=''){
            $thn=$this->thn_def;
        }
        $data['title']='List pendaftar';
        $data['pendaftar']=$this->unit->get_peserta_by_unit($this->session->userdata('kode_unit'));
        $diklat=$this->rnc->get_diklat($thn);
        foreach($diklat as $d){
            $data['diklat'][$d['id']]=$d['name'];
        }
        //var_dump($data['pendaftar'][0]);
        $this->template->display_unit('unit/list_pendaftar',$data);
    }
    
    function pil_registrasi($thn=''){
        if($thn=''){
            $thn=$this->thn_def;
        }
        $data['title']='Pilih Diklat';
        $diklat=$this->rnc->get_diklat($thn);
        foreach($diklat as $d){
            $data['diklat'][$d['id']]=$d['name'];
        }
        $this->template->display_unit('unit/pil_registrasi',$data);
    }
    
    function registrasi($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['id_diklat']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['arr_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pangkat']=$this->rnc->get_pangkat_gol();
        $data['sub_title']='Registrasi Diklat '.$data['program']['name'];
        
        $this->template->display_unit('unit/registrasi',$data);
        
    }
    
    function registrasi_proses(){
        $id_diklat=$this->input->post('id_diklat');
        $id=$this->input->post('id');
        $tahun=$this->input->post('tahun');
        $reg_batch=array();
        for($i=0;$i<count($id);$i++){
            $reg['id_peserta']=$id[$i];
            $reg['id_diklat']=$id_diklat;
            $reg['status']='daftar';
            $reg['tahun_daftar']=$tahun;
            $reg_batch[]=$reg;
        }
        $this->slng->insert_registrasi_batch($reg_batch);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Peserta telah ditambahkan'));
        redirect(base_url().'unit/front');
    }
    
    function logout(){
        //buat ngilangin data session sebelumnya
        $data_session=array(
            'nama',
            'id_role',
            'is_login'
        );
	$this->session->unset_userdata($data_session);
	$this->session->sess_destroy();
        redirect(base_url().'unit/front');
    }
}
