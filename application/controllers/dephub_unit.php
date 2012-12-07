<?php
class Dephub_unit extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_unit','unt');
        $this->load->model('mdl_inst','inst');
    }
    
    function index(){
        $this->list_unit();
    }
    
    function list_unit(){
        $data['list']=$this->unt->get_all_unit();
        $data['inst']=$this->inst->get_array_inst();
        
        $this->template->display('dephub_unit/list_unit',$data);
    }
    
    function tambah_unit(){
        $data['inst']=$this->inst->get_array_inst();
        $this->template->display('dephub_unit/form_add_unit',$data);
    }
    
    function insert_unit(){
        $data['nama_unit']=$this->input->post('nama');
        $data['kode']=$this->input->post('kode');
        $data['kode_inst']=$this->input->post('kode_inst');
        $data['password_unit']=md5($this->input->post('password'));
        $this->unt->insert_unit($data);
        redirect(base_url().'dephub_unit');
    }
    
    function edit_unit($id){
        $data['inst']=$this->inst->get_array_inst();
        $data['unit']=$this->unt->get_byid_unit($id);
        $this->template->display('dephub_unit/form_edit_unit',$data);
    }
    
    function update_unit(){
        $clause=$this->input->post('id');
        $data['nama_unit']=$this->input->post('nama');
        $data['kode']=$this->input->post('kode');
        $data['kode_inst']=$this->input->post('kode_inst');
        $password_unit=$this->input->post('password');
        if($password_unit!=''){
            $data['password_unit']=md5($password_unit);
        }
        $this->unt->update_unit($data,$clause);
        redirect(base_url().'dephub_unit');
    }
    
    function delete_unit($id){
        $this->unt->del_unit($id);
        redirect(base_url().'dephub_unit');
    }
}
