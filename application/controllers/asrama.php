<?php
class Asrama extends CI_Controller{
    
    private $limit=200;
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_sarpras', 'spr');
    }
    
    function index(){
        $this->list_asrama();
    }
    
    function list_asrama($offset=0){
	if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        if(empty ($offset)) $offset=0;
	$data['sub_title']='Check List Prasarana Asrama';

	$var = $this->spr->get_check_list_asrama()->result_array();
        $data['list']=$var;
	$this->template->display('asrama/list_asrama',$data);
    }
    
    function filter(){
	$uri = $this->uri->segment(3);
	if($uri=='')
	{
	    $uri=0;
	}
	$asrama = $this->input->post('asrama');
	redirect('asrama/list_asrama/'.$uri.'/'.$asrama);
    }

    protected function mon($var){
	if($var=='ok')
	{
	    return '<span style="color:green">'.$var.'</span>';
	} else if($var==''){
	    return '';
	} else {
	    return '<a href="#alert" title="Klik untuk melihat laporan" rel="tooltip"><span style="color:red"><img src="assets/img/alert.png" /></span></a>';
	}
    }
}
