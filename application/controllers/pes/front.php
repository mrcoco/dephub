<?php
class Front extends CI_Controller{
    function __construct() {
        parent::__construct();
        //buat ngilangin data session sebelumnya
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_sarpras','spr');
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

    function feedback_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
	$data['sub_title']='Feedback Diklat';
        $this->template->display_pes('pes/feedback_diklat',$data);
    }
    
    function schedule_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
	$data['sub_title']='Jadwal Diklat';
        $this->template->display_pes('pes/schedule_diklat',$data);
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
        $this->template->display('pes/login_form',$data);
    }
    
    
    function login_process(){
        $data['username']=$this->input->post('username');
        $data['password']=md5($this->input->post('password'));
        $res=$this->pes->login_pes($data)->num_rows();
        $peserta=$this->pes->login_pes($data)->row_array();
        if($res>0){
            $data_session=array(
                'nama_pes'=>$peserta['nama'],
                'id_pes'=>$peserta['id'],
                'is_login_pes'=>true
            );
            $this->session->set_userdata($data_session);
            redirect(base_url().'pes/front/info_peserta');
        }else{
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
        if($data['program']){
            $this->template->display_pes('pes/add_feedback_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'pes/detail_diklat/'.$id);                    
        }
    }

    function insert_feedback_diklat(){
        $id_program=$this->input->post('id_program');
        $program=$this->rnc->get_program_by_id($id_program);
        $this->pes->insert_feedback_diklat($_POST);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah ditambahkan'));
        redirect(base_url().'pes/front/detail_diklat/'.$program['parent']);        
    }
    function add_feedback_pembicara($id){
        
        $data['sub_title']='Evaluasi Pembicara';
        $data['program']=$this->rnc->get_program_by_id($id);
        if($data['program']){
            $this->template->display_pes('pes/add_feedback_pembicara',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'pes/detail_diklat/'.$id);                    
        }
    }

    function insert_feedback_pembicara(){
        $id_program=$this->input->post('id_program');
        $program=$this->rnc->get_program_by_id($id_program);
        $this->pes->insert_feedback_diklat($_POST);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah ditambahkan'));
        redirect(base_url().'pes/front/detail_diklat/'.$program['parent']);        
    }

    function edit_feedback_diklat($id_feedback){
        $data['sub_title']='Ubah Evaluasi Penyelenggaraan';

        $data_feedback = $this->pes->get_feedback_diklat($id_feedback);
        if($data_feedback){
            $data['id']=$data_feedback['id'];
            $data['id_progam']=$data_feedback['id_program'];
            $data['program']=$this->pes->get_diklat_by_id($data['id_progam']);

            $data['manfaat']=$data_feedback['manfaat'];
            $data['kelebihan_catering']=$data_feedback['kelebihan_catering'];
            $data['kekurangan_catering']=$data_feedback['kekurangan_catering'];
            $data['keterangan']=$data_feedback['keterangan'];
            $this->template->display('simdik/perencanaan/form_edit_feedback_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Feedback tidak ditemukan'));
            redirect(base_url().'perencanaan/dashboard');                    
        }

    }

    function update_feedback_diklat(){

        $clause=$this->input->post('id');

        $data['id_program']=$this->input->post('id_program');


        $this->pes->update_feedback_diklat($data,$clause);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah diubah'));
        redirect(base_url().'perencanaan/feedback/display_feedback_diklat/'.$clause);        
    }

    function delete_feedback_diklat($id){
        if($id){
            $this->pes->delete_feedback_diklat($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Feedback/evaluasi telah dihapus'));
            redirect(base_url().'perencanaan/diklat/detail_diklat/'.$id);        
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Feedback tidak ditemukan'));
            redirect(base_url().'perencanaan/dashboard');
        }
    }

    function display_feedback_diklat($id){
        $this->load->library('editor');
        $data['sub_title']='Hasil Evaluasi Penyelenggaraan';
        $data_feedback = $this->pes->get_feedback_diklat($id);
        if($data_feedback){
            $data['id']=$data_feedback['id'];
            $data['id_progam']=$data_feedback['id_program'];
            $data['program']=$this->pes->get_diklat_by_id($data['id_progam']);
            $this->template->display('simdik/perencanaan/display_feedback_diklat',$data);
        }else{      
            $this->session->set_flashdata('msg',$this->editor->alert_error('Belum ada feedback/evaluasi yang dimasukkan'));
            redirect(base_url().'perencanaan/diklat/detail_diklat/'.$id);        
        }
    }
    function ajax_get_form_pemateri_pembimbing($id) {
        //query nama, id, dan jenis pembicara & pendamping
        $data['qry_pemateri'] = $this->slng->get_pemateri($id);
        $data['qry_pendamping'] = $this->slng->get_pendamping($id);
        echo $this->load->view('pes/ajax_pemateri', $data, TRUE);
    }
    function schedule_program($id) {
        $data['sidebar']=true;
        $data['program'] = $this->rnc->get_program_by_id($id);
        $data['ang']=$this->pes->get_program_pes($this->session->userdata('id_pes'),$data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);

        $pil_materi = $this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pil_materi'][-1] = '-- Pilih Materi --';
        foreach ($pil_materi as $p) {
            $data['pil_materi'][$p['id_materi']] = $p['judul'];
        }

        $pil_kelas = $this->spr->get_kelas_by_size($data['diklat']['jumlah_peserta'])->result_array();

        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }

        $data['schedule'] = $this->slng->get_schedule($id);

        $json_array = array();
        if (count($data['schedule']) != 0) {
            //proses json
            $i = 0;
            foreach ($data['schedule'] as $item) {
                $i++;
                $isi['id'] = $i;
                $isi['start'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_mulai']);
                $isi['end'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_selesai']);
                if ($item['jenis'] == 'non materi')
                    $isi['title'] = $item['nama_kegiatan'];
                else
                    $isi['title'] = $data['pil_materi'][$item['id_materi']];
                $json_array[] = $isi;
            }
            $data['id_max'] = $i;
        }else {
            $data['id_max'] = 1;
        }
        $data['id'] = $id;
        $data['sub_title'] = 'Jadwal Tentative';
        $data['data_json'] = $json_array;
        $this->template->display_pes('pes/schedule_program', $data);
    }
    
}
