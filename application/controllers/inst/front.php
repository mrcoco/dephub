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
        if(!$this->session->userdata('is_login_inst')){
            $data_session=array(
                'nama_inst',
                'kode_kantor',
                'is_login_inst'
            );
            $this->session->unset_userdata($data_session);
            $this->session->sess_destroy();
            $this->login_form();
        }else{
            $this->list_pendaftar();
        }
    }
    
    function login_form(){
        $data['title']='Login Instansi';
        $instansi=$this->slng->getall_instansi();
        $data['ins']=array();
        $data['ins'][-1]='--Pilih Instansi--';
        foreach($instansi as $i){
            $data['ins'][$i['kode_kantor']]=$i['nama_instansi'];
        }
        $this->template->display('inst/login_form',$data);
    }
    
    function login_process(){
        $data['kode_kantor']=$this->input->post('instansi');
        $data['password']=md5($this->input->post('password'));
        $res=$this->unit->login_inst($data);
        if($res>0){
            $data_session=array(
                'nama_inst'=>$this->unit->get_instansi($data['kode_kantor']),
                'kode_kantor'=>$data['kode_kantor'],
                'is_login_inst'=>true
            );
            $this->session->set_userdata($data_session);
            redirect(base_url().'inst/front/list_pendaftar');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Maaf, login gagal. Silakan coba lagi'));
            redirect(base_url().'inst/front');
        }
    }
    
    function list_pendaftar(){
        if($_GET){
            extract($_GET);
        }else{
            $thn=$this->thn_def;
            $id_diklat='';
        }
        $data['tahun'][$thn]=$thn;
        $data['diklat']['']='semua';
        $tahun=$this->unit->get_thn_by_inst($this->session->userdata('kode_kantor'));
        foreach($tahun as $t){
            $data['tahun'][$t['tahun_daftar']]=$t['tahun_daftar'];
            $data['diklat'][$t['id_diklat']]=$t['name'];
        }
        $data['thn']=$thn;
        $data['id_diklat']=$id_diklat;
        $data['title']='Tabel Pendaftar '.$thn;
        $data['pendaftar']=$this->unit->get_accepted_peserta_by_inst($this->session->userdata('kode_kantor'),$thn,$id_diklat);
                
        $program=$this->rnc->get_program($thn);
        //var_dump($program);
        
        $data['program']=array();
        foreach($program as $p){
            $data['program'][$p['id']]='Angkatan '.$p['angkatan'];
        }
//        print_r($data['pendaftar']);
        $this->template->display_inst('inst/list_pendaftar',$data);
    }
    
    function logout(){
        //buat ngilangin data session sebelumnya
        $data_session=array(
                'nama_inst',
                'kode_kantor',
                'is_login_inst'
            );
	$this->session->unset_userdata($data_session);
	$this->session->sess_destroy();
        redirect(base_url().'inst/front');
    }
    
    function ajax_cancel(){
        $data['id_program']=NULL;
        $data['status']='daftar';
        $clause['id_diklat']=$this->input->post('id_diklat');
        $clause['id_program']=$this->input->post('id_program');
        $clause['id_peserta']=$this->input->post('id_peserta');
        $this->slng->toggle_status($clause,$data);
        return true;
    }
}
