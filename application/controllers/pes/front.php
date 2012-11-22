<?php
class Front extends CI_Controller{
    function __construct() {
        parent::__construct();
        //buat ngilangin data session sebelumnya
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
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
        $data['program']=$this->pes->get_diklat_pes($id);
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
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['feedback'] = $this->pes->get_feedback_diklat_program($id);
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
        $data['title']='Login peserta';
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
    function add_feedback_diklat($id_program){
        $data['sub_title']='Evaluasi Kinerja Penyelenggaraan';
        $data['program']=$this->rnc->get_diklat_by_id($id_program);
        if($data['program']){
            $this->template->display_pes('pes/add_feedback_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'pes/detail_diklat/'.$id_program);                    
        }
    }

    function insert_feedback_diklat(){
        $data['id_program']=$this->input->post('id_program');
        $this->pes->insert_feedback_diklat($_POST);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah ditambahkan'));
        redirect(base_url().'pes/front/detail_diklat/'.$data['id_program']);        
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
}
