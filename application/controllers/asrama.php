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

	$var = $this->spr->get_checklist_item()->result_array();
    $data['item']=$var;
	
	$var2=null;
	$kmr = $this->spr->count_clkamar();
	for($i=1;$i<=$kmr;$i++) {
		$var2[$i] = $this->spr->get_checklist_kamar_kamar($i)->result_array();
	}
    $data['list']=$var2;
	
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
