<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gedung
 *
 * @author d_frEak
 */
class gedung extends Sarpras_Controller{
    public function index()
    {
	//$data['sub_title']='Kelas';
	//$this->template->display('simdik/sarpras/kelas',$data);
	redirect('sarpras/gedung/list_gedung');
    }
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_sarpras','spr');
    }

    private $limit=200;
    
    
    function list_gedung($offset=0)
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Gedung';

	$var = $this->mdl_sarpras->get_gedung()->result_array();
        $data['list']=$var;
	$this->template->display('simdik/sarpras/gedung',$data);
    }

    function add_gedung()
    {
        //menampilkan form untuk memasukkan data gedung yg belum ada di database
        $data['sub_title']='Tambah Gedung';
        $var['id']=$this->spr->count_gedung('')+1;
        $var['nama']='';
        $data['gedung']=$var;
        $this->template->display('simdik/sarpras/form_gedung',$data);
    
    }
    
    function add_gedung_process()
    {
        //process penambahan gedung
        
        $reg=$_POST;
        $reg['id']=$this->spr->count_gedung('')+1;
        $this->spr->insert_gedung($_POST);
            
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Gedung telah ditambahkan'));
        redirect(base_url().'sarpras/gedung/list_gedung');
    
    }
    
    function edit_gedung($id){
        //menampilkan form untuk edit data gedung
        $data['sub_title']='Edit Gedung';
        $var=$this->spr->get_gedung($id)->result_array();
        $data['gedung']=$var[0];
        $this->template->display('simdik/sarpras/form_gedung',$data);
    }
    
    function edit_gedung_process(){
        //process penyimpanan data gedung
        $this->spr->update_gedung($_POST['id'],$_POST);
            
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Gedung telah diedit'));
        redirect(base_url().'sarpras/gedung/list_gedung');
    }
    
    function delete_gedung($id){
        //process menghapus gedung
        $this->spr->delete_gedung($id);
        
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Gedung telah dihapus'));
        redirect(base_url().'sarpras/gedung/list_gedung');
    }    
}
?>
