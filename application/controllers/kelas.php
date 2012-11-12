<?php
class Kelas extends CI_Controller{
    
    private $limit=200;
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_sarpras', 'spr');
    }
    
    function index(){
        $this->list_kelas();
    }
    
    function list_kelas($offset=0){
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Kelas';

	$var = $this->spr->get_check_list_kelas()->result_array();
        $data['list']=$var;
	$this->template->display('kelas/list_kelas',$data);
    }
}