<?php
class Feedback extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_feedback','fbk');
    }
    
    function index(){
        $this->list_pertanyaan();
    }
    
    function list_pertanyaan(){
        $kategori=$this->fbk->getall_kategori();
        foreach($kategori as $k){
            $data['kategori'][$k['id_kategori']]=$k['nama_kategori'];
        }
        $data['list']=$this->fbk->getlist_pertanyaan();
        $this->template->display_with_sidebar('feedback/list_pertanyaan','feedback',$data);
    }
    
    function tambah_pertanyaan(){
        $kategori=$this->fbk->getall_kategori();
        $data['kategori'][0]='-- Pilih Kategori --';
        foreach($kategori as $k){
            $data['kategori'][$k['id_kategori']]=$k['nama_kategori'];
        }
        $this->template->display_with_sidebar('feedback/tambah_pertanyaan','feedback',$data);
    }
    
    function insert_pertanyaan(){
        $data['pertanyaan']=$this->input->post('pertanyaan');
        $data['id_kategori']=$this->input->post('id_kategori');
        $this->fbk->insert_pertanyaan($data);
        redirect(base_url().'feedback');
    }
    
    function edit_pertanyaan($id){
        $kategori=$this->fbk->getall_kategori();
        $data['kategori'][0]='-- Pilih Kategori --';
        foreach($kategori as $k){
            $data['kategori'][$k['id_kategori']]=$k['nama_kategori'];
        }
        $data['pertanyaan']=$this->fbk->getbyid_pertanyaan($id);
        $this->template->display_with_sidebar('feedback/edit_pertanyaan','feedback',$data);
    }
    
    function update_pertanyaan(){
        $clause=$this->input->post('id_pertanyaan');
        $data['pertanyaan']=$this->input->post('pertanyaan');
        $data['id_kategori']=$this->input->post('id_kategori');
        $this->fbk->update_pertanyaan($data,$clause);
        redirect(base_url().'feedback');
    }
    
    function delete_pertanyaan($id){
        $this->fbk->delete_pertanyaan($id);
        redirect(base_url().'feedback');
    }
    
    function list_kategori(){
        $data['list']=$this->fbk->getall_kategori();
        $this->template->display_with_sidebar('feedback/list_kategori','feedback',$data);
    }
    
    function insert_kategori(){
        $data['nama_kategori']=  $this->input->post('kategori');
        $this->fbk->insert_kategori($data);
        redirect(base_url().'feedback/list_kategori');
    }
    
    function delete_kategori($id){
        $this->fbk->delete_kategori($id);
        redirect(base_url().'feedback/list_kategori');
    }
    
    function update_kategori(){
        $clause=  $this->input->post('id_kategori');
        $data['nama_kategori']=  $this->input->post('kategori');
        $this->fbk->update_kategori($data,$clause);
        redirect(base_url().'feedback/list_kategori');
    }
}