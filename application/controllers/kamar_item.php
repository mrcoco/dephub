<?php

class Kamar_item extends CI_Controller {

    private $limit = 200;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_sarpras', 'spr');
    }

    function index() {
        $this->list_kamar_item();
    }

    function list_kamar_item($offset = 0) {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        if (empty($offset))
            $offset = 0;
        $data['sub_title'] = 'Pemakaian Kamar';

        $var = $this->spr->get_kamaritem($offset)->result_array();
        $data['list'] = $var;
		
		
        $this->template->display('kamar_item/list_kamar_item', $data);
    }

	function list_kamar_item_gedung($offset=0)
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Kamar';

	$var = $this->spr->get_kamar_item_gedung($offset)->result_array();
        $data['list']=$var;
		
	$var2 = $this->spr->get_kamar_item_status($offset)->result_array();
	$data['status'] = $var2;
	
	$this->template->display('kamar_item/list_kamar_item',$data);
    }
	
    function add_kamar_item() {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk memasukkan data kamar_item yg belum ada di database
        if (empty($id))
            $id = '';
        $data['sub_title'] = 'Tambah Item Kamar';
		$data['type']= 'add';
        $var['id'] = '';
        $var['item'] = '';
        $var['kategori'] = '';
        $var['bobot'] = '';
        $var['status'] = '';
		$data['item']=$var;
		
		
        $this->template->display('kamar_item/form_kamar_item', $data);
    }

    function add_kamar_item_process() {
        //process penambahan kamar_item
        //$reg=$_POST;
        //$reg['id']=$this->spr->count_kamar_item('')+1;
        $this->spr->insert_kamaritem($_POST);

        $var = $this->spr->get_kamar()->result_array();
        $var1 = $this->spr->get_kamaritem_item()->result_array();
		
		foreach($var as $i)
		{
			$data['id_kamar']=$i['id'];
			$data['id_item']=$var1[0]['id'];
			$this->spr->insert_checklist_kamar($data);
		}

	
        $this->session->set_flashdata('msg', $this->editor->alert_ok('item kamar telah ditambahkan'));
        redirect(base_url() . 'kamar_item');
    }
	
	function generate_checklist(){
		
	}

    function edit_kamar_item($id) {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk edit data kamar_item
        $data['sub_title'] = 'Edit Item Kamar';
		$data['type']='edit';
        $var = $this->spr->get_kamaritem($id)->result_array();
        $data['item'] = $var[0];
        // die(var_dump($data['item']));
        $this->template->display('kamar_item/form_kamar_item', $data);
    }

    function edit_kamar_item_process() {
        //process penyimpanan data kamar_item
        $this->spr->update_kamaritem($_POST['id'], $_POST);
		
		//die(var_dump($_POST));
        $this->session->set_flashdata('msg', $this->editor->alert_ok('item kamar telah diedit'));
        redirect(base_url() . 'kamar_item');
    }

    function delete_kamar_item($id) {
        //process menghapus kamar_item
        $this->spr->delete_kamaritem($id);
		$this->spr->delete_checklist_kamar_item($id);
        $this->session->set_flashdata('msg', $this->editor->alert_ok('item kamar telah dihapus'));
        redirect(base_url() . 'kamar_item');
    }

}
