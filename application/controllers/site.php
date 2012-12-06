<?php
class Site extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_perencanaan','rnc');
    }
    
    function index(){
        $this->front();
    }
    
    function front(){
        $this->load->model('mdl_penyelenggaraan','slng');
        $data['title']='Sistem Informasi Manajemen Diklat';
        $data['data_post'] = $this->slng->load_pengumuman();
        $this->template->display_with_sidebar('site/front_view','login',$data);
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
    
    function json_event() {
	
	$i = 0;
        $cal=$this->rnc->get_program(date('Y'));
        $diklat=$this->rnc->get_diklat(date('Y'));
        $nama_diklat=array();
        foreach($diklat as $d){
            $nama_diklat[$d['id']]=$d['name'];
        }
	if (count($cal)== 0) {
	    $data[0]['id'] = '';
	    $data[0]['title'] = '';
	    $data[0]['start'] = '';
	    $data[0]['end'] = '';
	    $data[0]['url'] = '';
	} else {
	    foreach ($cal as $row) {
		$data[$i]['id'] = $row['id'];
		$data[$i]['title'] =$nama_diklat[$row['parent']].' angkatan '.$row['angkatan'];
		$data[$i]['start'] = $row['tanggal_mulai'];
		$data[$i]['end'] = $row['tanggal_akhir'];
		$data[$i]['url'] = base_url().'program/view_program/' . $row['id'];
		$i++;
	    }
	}
	$data['output'] = $data;
	$this->load->view('site/cal_event',$data);
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
