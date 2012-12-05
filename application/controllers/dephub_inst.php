<?php
class Dephub_inst extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_inst','inst');
    }
    
    function index(){
        $this->list_inst();
    }
    
    function list_inst(){
        $data['list']=$this->inst->get_all_inst();
        $this->template->display('dephub_inst/list_inst',$data);
    }
    
    function tambah_inst(){
        $this->template->display('dephub_inst/form_add_inst');
    }
    
    function insert_inst(){
        $data['kode_kantor']=$this->input->post('kode');
        $data['nama_singkat']=$this->input->post('singkatan');
        $data['nama_instansi']=$this->input->post('nama');
        $data['password']=$this->input->post('password');
        $this->inst->insert_inst($data);
        redirect(base_url().'dephub_inst');
    }
    
    function edit_inst($id){
        $data['inst']=$this->inst->get_byid_inst($id);
        $this->template->display('dephub_inst/form_edit_inst',$data);
        
    }
    
    function update_inst(){
        $clause=$this->input->post('id');
        $data['kode_kantor']=$this->input->post('kode');
        $data['nama_singkat']=$this->input->post('singkatan');
        $data['nama_instansi']=$this->input->post('nama');
        $password=$this->input->post('password');
        if($password!=''){
            $data['password']=md5($password);
        }
        $this->inst->update_inst($data,$clause);
        redirect(base_url().'dephub_inst');
    }
    
    function delete_inst($id){
        $this->inst->delete_inst($id);
        redirect(base_url().'dephub_inst');
    }
}