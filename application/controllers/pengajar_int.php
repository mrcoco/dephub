<?php
class Pengajar_int extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
        $this->view_list();
    }
    
    function view_list(){
        if($this->session->userdata('id_role')>2){
            redirect(base_url().'error/error_priv');
        }
        $data['list']=$this->slng->getall_pembicara_int();
        $this->template->display('pembicara_int/list_pembicara_int',$data);
    }
    
    function add_pengajar(){
        if($this->session->userdata('id_role')>2){
            redirect(base_url().'error/error_priv');
        }
        
        //bentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
        $data['sub_title']='Daftar Pegawai Transportasi';
        $this->template->display('pembicara_int/add_pembicara_int',$data);
    }
    
    function ajax_list($page,$filter=''){
        $data['cur_page']=$page;
        $data['per_page']=25;
        $data['filter']=$filter;
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
        $data['array']=$this->slng->get_pegawai_pembicara($data['per_page'],$data['offset'],$data['filter']);
        $data['num_res']=$this->slng->count_pegawai_pembicara($filter);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
        echo $this->load->view('pembicara_int/ajax_list',$data,true);
    }
    
    function update_status($jenis,$id){
        $this->slng->update_pembicara($jenis,$id);
        return 1;
    }
}