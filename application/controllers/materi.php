<?php
class Materi extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_penyelenggaraan','slng');
    }
    
    function index(){
        $this->list_materi();
    }
    
    function list_materi(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['sub_title']='Daftar Materi dan Tenaga Pengajar';
        $data['list']=$this->rnc->get_all_materi();
        $this->template->display('materi/list_materi',$data);
    }

    function view($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['materi']=$this->rnc->get_materi($id);
        $data['sub_title']='Detail Materi';
        $data['pengajar']=$this->rnc->get_pengajar($id);
        $pembicara=$this->slng->get_all_pembicara();
        $data['pembicara']=array();
        $data['key_pembicara']=array();
        $data['id']=array();
        foreach($pembicara as $p){
            if($p['nama_peg']!=''){
                $data['pembicara'][]=$p['nama_peg'].' ('.$p['nip'].')';
                $data['peg'][$p['id']]=TRUE;
                $data['id'][$p['id']]=$p['id_peg'];
                $data['key_pembicara'][$p['id']]=$p['nama_peg'].' ('.$p['nip'].')';
            }else{
                $data['pembicara'][]=$p['nama_dostam'].' (Dosen Tamu)';
                $data['peg'][$p['id']]=FALSE;
                $data['id'][$p['id']]=$p['id_dostam'];
                $data['key_pembicara'][$p['id']]=$p['nama_dostam'].' (Dosen Tamu)';
            }
        }
        $this->template->display('materi/view_materi',$data);
    }
    
    function tambah(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['sub_title']='Tambah Materi';
        $this->template->display('materi/tambah_materi',$data);
    }
    
    function insert(){
        $data['judul']=$this->input->post('judul');
        $data['deskripsi']=$this->input->post('deskripsi');
        $this->rnc->insert_materi($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Materi telah ditambahkan'));
        redirect(base_url().'materi');
    }
    
    function edit($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['materi']=$this->rnc->get_materi($id);
        $data['sub_title']='Edit Materi';
        $this->template->display('materi/edit_materi',$data);
    }
    
    function update(){
        $id=$this->input->post('id');
        $data['judul']=$this->input->post('judul');
        $data['deskripsi']=$this->input->post('deskripsi');
        $this->rnc->update_materi($id,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Materi telah diubah'));
        redirect(base_url().'materi');
    }
    
    function delete($id){
        $this->rnc->delete_materi($id);
        $this->session->set_flashdata('msg',$this->editor->alert_warning('Materi telah dihapus'));
        redirect(base_url().'materi');
    }
    
    function assign($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['materi']=$this->rnc->get_materi($id);
        $data['sub_title']='Assign Pengajar';
        $data['pengajar']=$this->rnc->get_pengajar($id);
        $pembicara=$this->slng->get_all_pembicara();
        $data['pembicara']=array();
        $data['key_pembicara']=array();
        $data['id']=array();
        foreach($pembicara as $p){
            if($p['nama_peg']!=''){
                $data['pembicara'][]=$p['nama_peg'].' ('.$p['nip'].')';
                $data['id'][$p['nama_peg'].' ('.$p['nip'].')']=$p['id'];
                $data['key_pembicara'][$p['id']]=$p['nama_peg'].' ('.$p['nip'].')';
            }else{
                $data['pembicara'][]=$p['nama_dostam'];
                $data['id'][$p['nama_dostam']]=$p['id'];
                $data['key_pembicara'][$p['id']]=$p['nama_dostam'];
            }
        }
        $this->template->display('materi/assign_materi',$data);
    }
    
    function ajax_save(){
        $data['id_materi']=$this->input->post('id_materi');
        $data['id_pembicara']=$this->input->post('id_pembicara');
        echo $this->rnc->insert_pengajar($data);        
    }
    
    function ajax_hapus(){
        $data['id_materi']=$this->input->post('id_materi');
        $data['id_pembicara']=$this->input->post('id_pembicara');
        echo $this->rnc->delete_pengajar($data);
    }
}