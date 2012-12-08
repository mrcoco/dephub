<?php

class Gedung extends CI_Controller {

    private $limit = 200;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_sarpras', 'spr');
    }

    function index() {
        $this->list_gedung();
    }

    function list_gedung($offset = 0) {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        
        if (empty($offset))
            $offset = 0;
        $data['sub_title'] = 'Daftar Gedung';

        $var = $this->spr->get_gedung()->result_array();
        $data['list'] = $var;
		
        $var2 = $this->spr->get_pemakaian_kamar_detail('group')->result_array();
		$data['pemakaian'] = $var2;
		// die(var_dump($var2));
		
        $var3 = $this->spr->get_kamar_simple()->result_array();
		$data['kamar'] = $var3;
		
        $this->template->display('gedung/list_gedung', $data);
    }

    function add_gedung() {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk memasukkan data gedung yg belum ada di database
        $data['sub_title'] = 'Tambah Gedung';
        $var['id'] = $this->spr->count_gedung('') + 1;
        $var['nama'] = '';
		$data['type']='add';
        $data['gedung'] = $var;
        $this->template->display('gedung/form_gedung', $data);
    }

    function add_gedung_process() {
        //process penambahan gedung

        $reg = $_POST;
        $reg['id'] = $this->spr->count_gedung('') + 1;
        $this->spr->insert_gedung($_POST);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('Gedung telah ditambahkan'));
        redirect(base_url() . 'gedung');
    }

    function edit_gedung($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk edit data gedung
        $data['sub_title']='Edit Gedung';
		$data['type']='edit';
        $var=$this->spr->get_gedung($id)->result_array();
        $data['gedung']=$var[0];
        $this->template->display('gedung/form_gedung',$data);
    }
    
    function edit_gedung_process(){
        //process penyimpanan data gedung
        $this->spr->update_gedung($_POST['id'],$_POST);
            
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Gedung telah diedit'));
        redirect(base_url().'gedung/list_gedung');
    }
    function delete_gedung($id){
        
		$var = $this->spr->get_kamar_gedung($id)->result_array();
		//delete checklist kelas
			//print_r($var);
		foreach ($var as $row)
		{
			$this->spr->delete_check_list_asrama($row['id']);
		}
		
        //process menghapus gedung
        $this->spr->delete_gedung($id);
		
		//delete kelas
		$this->spr->delete_kamar_gedung($id);
        
		
		
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Gedung telah dihapus'));
        redirect(base_url().'gedung/list_gedung');
    } 
}