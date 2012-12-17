<?php
class Dephub_inst extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_inst','inst');
    }
    
    function index(){
        $this->list_inst();
    }
    
    function list_inst(){
        $data['title']='Daftar Instansi';
        $data['list']=$this->inst->get_all_inst();
        $this->template->display('dephub_inst/list_inst',$data);
    }
    
    function tambah_inst(){
        $data['title']='Tambah Instansi';
        $this->template->display('dephub_inst/form_add_inst',$data);
    }
    
    function insert_inst(){
        if($_POST['password']!=$_POST['password_konf']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Password tidak sama.'));
            redirect(base_url().'dephub_inst/tambah_inst');
        }
        $data['kode_kantor']=$this->input->post('kode');
        $data['nama_singkat']=$this->input->post('singkatan');
        $data['nama_instansi']=$this->input->post('nama');
        $data['password']=md5($this->input->post('password'));
        $this->inst->insert_inst($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Instansi telah ditambahkan.'));
        redirect(base_url().'dephub_inst');
    }
    
    function edit_inst($id){
        $data['title']='Ubah Instansi';
        $data['inst']=$this->inst->get_byid_inst($id);
        if(!$data['inst']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Instansi tidak ditemukan.'));
            redirect(base_url().'dephub_inst/tambah_inst');
        }
        $this->template->display('dephub_inst/form_edit_inst',$data);
        
    }
    
    function update_inst(){
        $clause=$this->input->post('id');
        if($_POST['password']!=$_POST['password_konf']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Password tidak sama.'));
            redirect(base_url().'dephub_inst/edit_inst'.$clause);
        }
        $data['kode_kantor']=$this->input->post('kode');
        $data['nama_singkat']=$this->input->post('singkatan');
        $data['nama_instansi']=$this->input->post('nama');
        $password=$this->input->post('password');
        if($password!=''){
            $data['password']=md5($password);
        }
        $this->inst->update_inst($data,$clause);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Instansi telah diubah.'));
        redirect(base_url().'dephub_inst');
    }
    
    function delete_inst($id){
        $this->inst->delete_inst($id);
        $data['inst']=$this->inst->get_byid_inst($id);
        if(!$data['inst']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Instansi tidak ditemukan.'));
            redirect(base_url().'dephub_inst/tambah_inst');
        }
        redirect(base_url().'dephub_inst');
    }
}