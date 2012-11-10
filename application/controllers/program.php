<?php
class Program extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_perencanaan','rnc');
    }
    
    function view_program($id){
        $this->load->library('date');
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $data['materi']=$this->rnc->get_materi_diklat($data['program']['parent']);
        $this->template->display_with_sidebar('program/view_program','program',$data);
    }
    
    function buat_program($parent){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $this->load->library('editor');
	
        $data['pil_diklat']=$this->rnc->get_diklat_by_id($parent);
        
        
        $data['sub_title']='Buat Program Baru di Diklat '.$data['pil_diklat']['name'];
        $this->template->display('program/form_buat_program',$data);
    }
    
    function insert_program(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $data['angkatan']=$this->input->post('angkatan');
        $data['parent']=$this->input->post('parent');
        $data['tipe']=3;
        $data['tahun_program']=$this->input->post('tahun_program');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['tempat']=$this->input->post('tempat');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        
        $id=$this->rnc->insert_program($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Program telah ditambahkan'));
        redirect(base_url().'program/view_program/'.$id);
    }
    
    function edit_program($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['pil_diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        
        $data['sub_title']='Edit Program '.$data['pil_diklat']['name'].' Angkatan '.$data['program']['angkatan'];
        $this->template->display_with_sidebar('program/form_edit_program','program',$data);
    }
    
    function update_program(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $clause = $this->input->post('id');
        $data['angkatan']=$this->input->post('angkatan');
        $data['parent']=$this->input->post('parent');
        $data['tipe']=3;
        $data['tahun_program']=$this->input->post('tahun_program');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['tempat']=$this->input->post('tempat');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        
        $this->rnc->update_program($clause,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Data program telah diperbaharui'));
        redirect(base_url().'diklat');
    }
    
    function delete_program($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $this->rnc->delete_program($id);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Program telah dihapus'));
        redirect(base_url().'diklat');
    }
    
    function schedule_program($id){
        
    }
    
    function approve($id){
        
    }
}
