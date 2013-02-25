<?php
class Dephub_unit extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        if ($this->session->userdata('id_role') != 1 && $this->session->userdata('id_role') != 5) {
            redirect(base_url() . 'error/error_priv');
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
        $data['title']='Daftar Unit Kerja';
        $this->template->display('dephub_unit/list_unit',$data);
    }
    
    function tambah_unit(){
        $data['title']='Tambah Unit Kerja';
        $data['inst']=$this->inst->get_array_inst();
        $this->template->display('dephub_unit/form_add_unit',$data);
    }
    
    function insert_unit(){
        if($_POST['password']!=$_POST['password_konf']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Password tidak sama.'));
            redirect(base_url().'dephub_unit/tambah_unit');
        }
        $data['nama_unit']=$this->input->post('nama');
        $data['kode']=$this->input->post('kode');
        $data['kode_inst']=$this->input->post('kode_inst');
        $data['password_unit']=md5($this->input->post('password'));
        $this->unt->insert_unit($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Unit telah ditambahkan.'));
        redirect(base_url().'dephub_unit');
    }
    
    function edit_unit($id){
        $data['title']='Ubah Unit Kerja';
        $data['inst']=$this->inst->get_array_inst();
        $data['unit']=$this->unt->get_byid_unit($id);
        if(!$data['unit']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Unit tidak ditemukan.'));
            redirect(base_url().'dephub_unit');
        }
        $this->template->display('dephub_unit/form_edit_unit',$data);
    }
    
    function update_unit(){
        $clause=$this->input->post('id');
        if($_POST['password']!=$_POST['password_konf']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Password tidak sama.'));
            redirect(base_url().'dephub_unit/edit_unit/'.$clause);
        }
        $data['nama_unit']=$this->input->post('nama');
        $data['kode']=$this->input->post('kode');
        $data['kode_inst']=$this->input->post('kode_inst');
        $password_unit=$this->input->post('password');
        if($password_unit!=''){
            $data['password_unit']=md5($password_unit);
        }
        $this->unt->update_unit($data,$clause);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Unit telah diubah.'));
        redirect(base_url().'dephub_unit');
    }
    
    function delete_unit($id){
        $this->unt->del_unit($id);
        $data['unit']=$this->unt->get_byid_unit($id);
        if(!$data['unit']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Unit tidak ditemukan.'));
            redirect(base_url().'dephub_unit');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Unit telah dihapus.'));
            redirect(base_url().'dephub_unit');
        }
    }
}
