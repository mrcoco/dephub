<?php
class Site extends CI_Controller{
    
    function __construct() {
        parent::__construct();
    }
    
    function index(){
        $this->front();
    }
    
    function front(){
        $data['title']='Sistem Informasi Manajemen Diklat';
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
    
    function logout(){
        $this->load->library('access');
        $login_result=$this->access->logout();
        redirect(base_url().'site');
    }
}
