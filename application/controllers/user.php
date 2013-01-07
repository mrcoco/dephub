<?php
class User extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        $this->load->model('mdl_user','usr');
        $this->load->model('mdl_penyelenggaraan','slng');
    }
    
    function index(){
        $this->list_user();
    }
    
    function list_user(){
        $data['list']=$this->usr->get_list_user();
        $data['role']=$this->usr->nama_role();
        //var_dump($data['role']);
        $this->template->display('user/list_user',$data);
    }
    
    function manage_user(){
        $data['sub_title']='Daftar Pegawai Transportasi';
        $this->template->display('user/manage_user',$data);
    }
    
    function list_pegawai_ajax($page=1,$filter=''){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //melist pegawai, pake paging dan ada filter berdasarkan instansi
        $data['role']=$this->usr->nama_role();
        $data['cur_page']=$page;
        $data['per_page']=25;
        $data['filter']= str_replace('%20', ' ', $filter);
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
        $data['array']=$this->slng->get_role_pegawai($data['per_page'],$data['offset'],$data['filter']);
        $data['num_res']=$this->slng->count_pegawai($filter);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
        echo $this->load->view('user/ajax_list_pegawai',$data,true);
    }
}
