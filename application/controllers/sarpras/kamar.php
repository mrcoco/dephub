<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of kamar
 *
 * @author d_frEak
 */
class kamar extends Sarpras_Controller{
    //put your code here
    
    public function index()
    {
	//$data['sub_title']='Kelas';
	//$this->template->display('simdik/sarpras/kelas',$data);
	redirect('sarpras/kamar/list_kamar');
    }
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_sarpras','spr');
    }

    private $limit=200;
    
    
    function list_kamar($offset=0)
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Kamar';

	$var = $this->mdl_sarpras->get_kamar($offset)->result_array();
        $data['list']=$var;
	$this->template->display('simdik/sarpras/kamar',$data);
    }

	function list_kamar_gedung($offset=0)
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Kamar';

	$var = $this->mdl_sarpras->get_kamar_gedung($offset)->result_array();
        $data['list']=$var;
	$this->template->display('simdik/sarpras/kamar',$data);
    }
	
    function add_kamar()
    {
        //menampilkan form untuk memasukkan data kamar yg belum ada di database
	if(empty ($id)) $id='';
        $data['sub_title']='Tambah Kamar';
        $var['id']='';
        $var['nama']='';
        $var['lantai']='';
        $var['sayap']='';
        $var['nomor']='';
        $var['bed']='';
        $var['status']='';
        $var['gedung']=$id;
        $data['kamar']=$var;
        $this->template->display('simdik/sarpras/form_kamar',$data);
    
    }
    
    function add_kamar_process()
    {
        //process penambahan kamar
        
        //$reg=$_POST;
        //$reg['id']=$this->spr->count_kamar('')+1;
        $this->spr->insert_kamar($_POST);
        
		//masukkan checklist
		$data=array('id_kamar'=>$_POST['id']);
		$this->spr->insert_check_list_asrama($data);
        


		
        $this->session->set_flashdata('msg',$this->editor->alert_ok('kamar telah ditambahkan'));
        redirect(base_url().'sarpras/kamar/list_kamar');
    
    }
    
    function edit_kamar($id){
        //menampilkan form untuk edit data kamar
        $data['sub_title']='Edit Kamar';
        $var=$this->spr->get_kamar($id)->result_array();
        $data['kamar']=$var[0];
        //var_dump($data['kamar']);
        $this->template->display('simdik/sarpras/form_kamar',$data);
    }
    
    function edit_kamar_process(){
        //process penyimpanan data kamar
        $this->spr->update_kamar($_POST['id'],$_POST);
            
        $this->session->set_flashdata('msg',$this->editor->alert_ok('kamar telah diedit'));
        redirect(base_url().'sarpras/kamar/list_kamar');
    }
    
    function delete_kamar($id){
        //process menghapus kamar
        $this->spr->delete_kamar($id);
        
		$this->spr->delete_check_list_asrama($id);
		
        $this->session->set_flashdata('msg',$this->editor->alert_ok('kamar telah dihapus'));
        redirect(base_url().'sarpras/kamar/list_kamar');
    }    
}

?>
