<?php
class Front extends CI_Controller{
    function __construct() {
        parent::__construct();
        //buat ngilangin data session sebelumnya
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_sarpras','spr');
        $this->load->model('mdl_feedback','fdb');
        $this->load->model('mdl_pes','pes');
        $this->thn_def = date('Y');
    }
    
    function index(){
        if(!$this->session->userdata('is_login_pes')){
            $data_session=array(
                'nama_unit',
                'kode_unit',
                'is_login_pes'
            );
            $this->session->unset_userdata($data_session);
            $this->session->sess_destroy();
            $this->login_form();
        }else{
            $this->info_peserta();
        }
    }
    
    function info_peserta(){
        $id=$this->session->userdata('id_pes');
        $data['title']='Info peserta';
        $data['diklat']=$this->pes->get_diklat_pes($id);
        for($i=0;$i<sizeof($data['diklat']);$i++){
            $pro=$this->rnc->get_program_by_id($data['diklat'][$i]['id_program']);
            $data['diklat'][$i]['angkatan']=$pro['angkatan'];
        }
        $data['history']=$this->slng->get_history($id);
        $this->template->display_pes('pes/info',$data);
    }
    function detail_peserta(){
        $id=$this->session->userdata('id_pes');
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
        $this->template->display_pes('pes/detail',$data);
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
        $this->template->display_pes('pes/detail_diklat',$data);
    }
    
    function sarpras_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
	$data['sub_title']='Laporan Sarpras Diklat';
        $this->template->display_pes('pes/sarpras_diklat',$data);
    }
    
    function login_form(){
        $data['title']='Login Peserta';
        $this->template->display_pes('pes/login_form',$data);
    }
    
    
    function login_process(){
        $data['username']=$this->input->post('username');
        $data['password']=$this->input->post('password');
        $res=$this->pes->login_pes($data)->num_rows();
        if($res>0){
			$peserta=$this->pes->login_pes($data)->row_array();
            $data_session=array(
                'nama_pes'=>$peserta['nama'],
                'id_pes'=>$peserta['id'],
                'is_login_pes'=>true
            );
            $this->session->set_userdata($data_session);
            redirect(base_url().'pes/front/info_peserta');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Maaf, login gagal. Silakan coba lagi'));
            redirect(base_url().'pes/front');
        }
    }
    
    
    function logout(){
        //buat ngilangin data session sebelumnya
        $data_session=array(
                'nama_pes',
                'id_pes',
                'is_login_pes'
            );
	$this->session->unset_userdata($data_session);
	$this->session->sess_destroy();
        redirect(base_url().'pes/front');
    }
    function add_feedback_diklat($id){        
        $data['sub_title']='Evaluasi Kinerja Penyelenggaraan';
        
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['semua'] = $this->fdb->getlist_pertanyaan();
        $data['kategori'] = $this->fdb->getall_kategori();
        $data['pertanyaan']=array();
        foreach($data['semua'] as $t){
            foreach($data['kategori'] as $k){
                if($t['id_kategori']==$k['id_kategori']){
                    $data['pertanyaan'][$k['id_kategori']][]=$t;
                }
            }
        }
        if($data['program']){
            $this->template->display_pes('pes/add_feedback_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'pes/detail_diklat/'.$id);                    
        }
    }

    function insert_feedback_diklat(){       
        $id_peserta=$this->session->userdata('id_pes');
        $semua = $this->fdb->getlist_pertanyaan();
        $kategori = $this->fdb->getall_kategori();
        $program=$this->rnc->get_program_by_id($_POST['id_program']);
        $data['id_program']=$_POST['id_program'];
        foreach($semua as $tanya){
            if(isset($_POST[$tanya['id_pertanyaan']])){
                $data['id_peserta']=$id_peserta;
                $data['id_kategori']=$tanya['id_kategori'];
                $data['id_pertanyaan']=$tanya['id_pertanyaan'];
                $data['skor']=$_POST[$tanya['id_pertanyaan']];
                $this->fdb->insert_feedback_diklat($data);
            }
        }
        $saran=array();
        $saran['id_program']=$_POST['id_program'];
        foreach($kategori as $kat){
            if($_POST['saran_'.$kat['id_kategori']]){
                $saran['id_kategori']=$kat['id_kategori'];
                $saran['saran']=$_POST['saran_'.$kat['id_kategori']];
                $this->fdb->insert_saran_diklat($saran);
            }
        }
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah ditambahkan'));
        redirect(base_url().'pes/front/detail_diklat/'.$program['parent']);        
    }
    function feedback_pengajar($id){
        $data['sub_title']='Evaluasi Pengajar';
        $data['sidebar']=true;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['id_program']=$id;
        $data['feedback_diklat']=false;
        if($this->fdb->cek_feedback_diklat($data['id_program'],$this->session->userdata('id_pes'))==0)
        $data['feedback_diklat']=true;
        $data['pengajar']=$this->slng->get_all_pembicara();
        $data['materi'] = $this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pemateri'] = array();
        $data['cek'] = array();
        foreach ($data['materi'] as $m){
            $data['pemateri'][$m['id']]=$this->rnc->get_pengajar($m['id']);
        }
        $this->template->display_pes('pes/feedback_pengajar',$data);
    }
    function add_feedback_pengajar(){
        $data['sub_title']='Evaluasi Pengajar';
        if(!$_POST){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Pengajar atau Materi tidak ditemukan'));
            redirect(base_url().'pes');                    
        }
        $data['materi'] = $this->rnc->get_materi($_POST['id_materi']);
        $data['pengajar']=$this->slng->get_pembicara_id($_POST['id_pengajar']);
        $data['pertanyaan'] = $this->fdb->getlist_pertanyaan_pengajar();
        $data['program']=$this->rnc->get_program_by_id($_POST['id_program']);
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        if($data['pengajar'] && $data['materi']){
            $this->template->display_pes('pes/add_feedback_pengajar',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Pengajar atau Materi tidak ditemukan'));
            redirect(base_url().'pes/detail_diklat/'.$id);                    
        }
    }

    function insert_feedback_pengajar(){
        $id_peserta=$this->session->userdata('id_pes');
        $id_program=$this->input->post('id_program');
        $program=$this->rnc->get_program_by_id($id_program);
        $semua = $this->fdb->getlist_pertanyaan_pengajar();
        $data['id_program']=$_POST['id_program'];
        $data['id_pengajar']=$_POST['id_pengajar'];
        $data['id_materi']=$_POST['id_materi'];
        $saran['id_program']=$_POST['id_program'];
        $saran['id_pengajar']=$_POST['id_pengajar'];
        $saran['id_materi']=$_POST['id_materi'];
        $saran['saran']=$_POST['saran'];
        if($_POST['saran'])
        $this->fdb->insert_saran_pengajar($saran);
        foreach($semua as $tanya){
            if(isset($_POST[$tanya['id_pertanyaan']])){
                $data['id_peserta']=$id_peserta;
                $data['id_pertanyaan']=$tanya['id_pertanyaan'];
                $data['skor']=$_POST[$tanya['id_pertanyaan']];
                $this->fdb->insert_feedback_pengajar($data);
            }
        }
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah ditambahkan'));
        redirect(base_url().'pes/front/detail_diklat/'.$program['parent']);        
    }

    function ajax_get_form_pemateri_pembimbing($id) {
        //query nama, id, dan jenis pembicara & pendamping
        $data['qry_pemateri'] = $this->slng->get_pemateri($id);
        $data['qry_pendamping'] = $this->slng->get_pendamping($id);
        echo $this->load->view('pes/ajax_pemateri', $data, TRUE);
    }
    function schedule_program($id) {
        $data['title']='Jadwal Program';
        $data['sidebar']=true;
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
        $data['feedback_diklat']=false;
        if($this->fdb->cek_feedback_diklat($data['id_program'],$this->session->userdata('id_pes'))==0)
        $data['feedback_diklat']=true;
        $this->template->display_pes('pes/schedule_program',$data);
    }
    
}
