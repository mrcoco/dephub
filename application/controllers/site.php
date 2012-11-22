<?php
class Site extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->front();
    }
    
    function front(){
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_administrator','adm');
        $data['title']='Sistem Informasi Manajemen Diklat';
        $data['data_post'] = $this->slng->load_pengumuman();
        $data['about'] = $this->adm->get_profil();
        if($this->session->userdata('is_login')){
            $this->template->display('site/front_view',$data);
        }else{
            $this->template->display_with_sidebar('site/front_view','login',$data);
        }
    }
    
    function login(){
        $usr=$this->input->post('usr');
        $pwd=md5($this->input->post('password'));
        $this->load->library('access');
        $login_result=$this->access->login($usr,$pwd);
        if($login_result){
            $nama=ucwords(strtolower($this->session->userdata('nama')));
            $this->session->set_flashdata('msg', $this->editor->alert_ok('Selamat datang '.$nama));
        }else{
            $this->session->set_flashdata('msg', $this->editor->alert_error('Maaf, login gagal. Silakan dicoba lagi.'));
        }
        redirect(base_url().'site');
    }
    
    function email() {
	$data['title'] = 'E-Mail';
	$this->template->display('site/email', $data);
    }
    
    function error(){
        $data['msg']='Halaman tidak ditemukan';
        $this->template->display('site/error', $data);
    }
    
    function logout(){
        $this->load->library('access');
        $login_result=$this->access->logout();
        redirect(base_url().'site');
    }
}
