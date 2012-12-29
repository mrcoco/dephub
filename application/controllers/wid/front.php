<?php
class Front extends CI_Controller{
    function __construct() {
        parent::__construct();
        //buat ngilangin data session sebelumnya
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_feedback','fdb');
        $this->load->model('mdl_wid','wid');
        $this->load->model('mdl_pes','pes');
        $this->thn_def = date('Y');
    }
    
    function index(){
        if(!$this->session->userdata('is_login_wid')){
            $data_session=array(
                'nama_wid',
                'type',
                'id_peg',
                'id_wid',
                'is_login_wid'
            );
            $this->session->unset_userdata($data_session);
            $this->session->sess_destroy();
            $this->login_form();
        }else{
            $this->info_pengajar();
        }
    }
    
    function info_pengajar(){
        $id=$this->session->userdata('id_wid');
        $data['title']='Info Pengajar';
        $data['materi']=$this->wid->get_materi_wid($id);
        $data['diklat']=array();
        $data['program']=array();
        foreach($data['materi'] as $m){
            $data['diklat'][$m['id_materi']]=$this->wid->get_diklat_materi($m['id_materi']);
            foreach($data['diklat'][$m['id_materi']] as $d){
                $data['program'][$d['id']]=$this->wid->get_program_wid($id,$d['id']);
            }
        }
//        print_r($data['materi']);
//        print_r($data['diklat']);
        $this->template->display_wid('wid/info',$data);
    }
    function detail_pegawai(){
        $id=$this->session->userdata('id_peg');
        $data_pegawai=$this->slng->get_data_pegawai_id($id);
        $data['title']='Detail data '.$data_pegawai['nama'];
        foreach($data_pegawai as $key=>$item){
            if($key!='foto'){
                if($item==''){
                    $item='-';
                }
            }else{
                if($item==''){
                    $item=base_url().'assets/public/foto/nopic.jpg';
                }
            }
            $data['pegawai'][$key]=$item;
        }
        $data['arr_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['arr_pendidikan'][0]="Tidak ada data";
        $data['pangkat']=$this->rnc->get_pangkat_gol();
        $data['history']=$this->slng->get_history($id);
        $this->template->display_wid('wid/detail',$data);
    }
    
    function detail_diklat($id){
        $data['sidebar']=true;
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['ang']=$this->pes->get_program_pes($this->session->userdata('id_pes'),$id);
        $data['id_program']=$data['ang']['id_program'];
        $data['feedback_diklat']=false;
        if($this->fdb->cek_feedback_diklat($data['id_program'],$this->session->userdata('id_pes'))==0)
        $data['feedback_diklat']=true;
	$data['sub_title']='Detail Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        $this->load->library('lib_perencanaan');
        $this->load->library('date');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $data['materi']=$this->rnc->get_materi_diklat($id);
        $this->template->display_wid('pes/detail_diklat',$data);
    }
    
    function feedback_pengajar($id){
        $data['sub_title']='Evaluasi Pengajar';
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['pengajar']=$this->slng->get_all_pembicara();
        $data['materi'] = $this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pemateri'] = array();
        $data['cek'] = array();
        foreach ($data['materi'] as $m){
            $data['pemateri'][$m['id']]=$this->rnc->get_pengajar($m['id']);
        }
        $this->template->display_wid('wid/feedback_pengajar',$data);
    }
    function feedback_result_pengajar($id){
        $data['id']=$id;
        $data['materi'] = $this->rnc->get_materi($_POST['id_materi']);
        $data['pengajar']=$this->slng->get_pembicara_id($_POST['id_pengajar']);
        $data['program']=$this->rnc->get_program_by_id($_POST['id_program']);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
	$data['sub_title']='Rekap Evaluasi Pengajar';
        $data['result']=$this->slng->feedback_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->result_array();
        $data['n_result']=$this->slng->feedback_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->num_rows();
        $data['saran']=$this->slng->feedback_saran_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->result_array();
        $data['n']=$this->slng->feedback_saran_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->num_rows();
        $this->template->display_wid('wid/feedback_result_pengajar',$data);
    }

    function schedule_pengajar(){
        $id=$this->session->userdata('id_wid');
        $data['title']='Jadwal Pengajar';
        $data['data_schedule']=$this->wid->get_schedule_wid($id);
        $jam=$this->wid->get_hours_wid($id);
        $data['total_jam']=0;
        foreach($jam as $j){
            $data['total_jam']+=$this->date->hitung_jam($j['jam_mulai'],$j['jam_selesai']);
        }
        $data['judul']='Jadwal Keseluruhan (Total: '.$data['total_jam'].' jam)';
        $data['link_pdf']='wid/front/schedule_pengajar_print';
//        print_r($data['data_schedule']);
        $this->template->display_wid('wid/schedule_program',$data);
    }
    function schedule_pengajar_print(){
        $this->load->helper('pdfexport');
        $id=$this->session->userdata('id_wid');
        $data['title']='Jadwal Pengajar';
        $data['data_schedule']=$this->wid->get_schedule_wid($id);
        $data['judul']='Jadwal Pengajar - '.$this->session->userdata('nama_wid');
//        print_r($data['data_schedule']);
        $print = $this->load->view('wid/pdf_schedule',$data,true);
        pdf_create($print, $data['judul']);
    }

    function schedule_program($id) {
        $data['title']='Jadwal Program';
        $data['program'] = $this->rnc->get_program_by_id($id);
        $data['ang']=$this->pes->get_program_pes($this->session->userdata('id_pes'),$data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);

        $this->load->library('date');
        $this->load->library('excel');
        $data['data_schedule'] = $this->slng->get_all_item_schedule_pdf($id);
        
        $data['id_program']=$id;
        $data['judul']=$data['diklat']['name'].' Tahun '.$data['program']['tahun_program'].' Angkatan '.$data['program']['angkatan'];
        $data['link_pdf']='program/print_schedule_pdf/'.$id;
        $this->template->display_wid('wid/schedule_program',$data);
    }
    function login_form(){
        $data['title']='Login Pengajar';
        $this->template->display_wid('wid/login_form',$data);
    }
    
    
    function login_process(){
        $data['username']=$this->input->post('username');
        $data['password']=md5($this->input->post('password'));
        $res=$this->wid->login_wid($data)->num_rows();
        $pengajar=$this->wid->login_wid($data)->row_array();
        if($res>0){
            $data_session=array(
                'nama_wid'=>$pengajar['nama'],
                'id_peg'=>$pengajar['id_tabel'],
                'id_wid'=>$pengajar['id'],
                'is_login_wid'=>true
            );
            $this->session->set_userdata($data_session);
//            print_r($this->session->all_userdata());
            redirect(base_url().'wid/front/info_pengajar');
        }else{
            redirect(base_url().'wid/front');
        }
    }
    
    
    function logout(){
        //buat ngilangin data session sebelumnya
        $data_session=array(
                'nama_wid',
                'id_peg',
                'id_wid',
                'is_login_wid'
            );
	$this->session->unset_userdata($data_session);
	$this->session->sess_destroy();
        redirect(base_url().'wid/front');
    }
    
}
