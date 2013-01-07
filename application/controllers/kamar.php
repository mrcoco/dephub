<?php

class Kamar extends CI_Controller {

    private $limit = 200;

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_sarpras', 'spr');
    }

    function index() {
        $this->list_kamar();
    }

    function list_kamar($offset = 0) {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        if (empty($offset))
            $offset = 0;
        $data['sub_title'] = 'Daftar Kamar';

        $var = $this->spr->get_kamar($offset)->result_array();
        $data['list'] = $var;
		
		$var2 = $this->spr->get_kamar_status($offset)->result_array();
		$data['status'] = $var2;
		
        $var3 = $this->spr->get_pemakaian_kamar_detail('kamar')->result_array();
		$data['pemakaian'] = $var3;
		
        $this->template->display('kamar/list_kamar', $data);
    }

	function list_kamar_gedung($offset=0)
    {
	if(empty ($offset)) $offset=0;
        $gedung=$this->spr->get_gedung($offset)->row_array();
	$data['sub_title']='Daftar Kamar di Gedung '.$gedung['nama'];

		$var = $this->spr->get_kamar_gedung($offset)->result_array();
        $data['list']=$var;
		
		$var2 = $this->spr->get_kamar_status($offset)->result_array();
		$data['status'] = $var2;
		
        $var3 = $this->spr->get_pemakaian_kamar_detail()->result_array();
		$data['pemakaian'] = $var3;
		
	$this->template->display('kamar/list_kamar',$data);
    }
	
	function list_kamar_detail($id_kamar)
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Detail Kamar';

        $var = $this->spr->get_pemakaian_kamar_detail("group",$id_kamar)->result_array();
		$data['pemakaian'] = $var;
		
	$this->template->display('kamar/ajax_kamar_detail',$data);
    }

    function add_kamar() {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk memasukkan data kamar yg belum ada di database
        if (empty($id))
            $id = '';
        $data['sub_title'] = 'Tambah Kamar';
        $var['id'] = '';
        $var['nama'] = '';
        $var['nama_kamar'] = '';
        $var['lantai'] = '';
        $var['sayap'] = '';
        $var['nomor'] = '';
        $var['bed'] = '';
        $var['status'] = '';
        $var['gedung'] = $id;
        $data['kamar'] = $var;
		$data['type']='add';
        $this->template->display('kamar/form_kamar', $data);
    }

    function add_kamar_process() {
        //process penambahan kamar
        //$reg=$_POST;
        //$reg['id']=$this->spr->count_kamar('')+1;
        $this->spr->insert_kamar($_POST);

        //masukkan checklist
        $data = array('id_kamar' => $_POST['id']);
        $this->spr->insert_check_list_asrama($data);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('kamar telah ditambahkan'));
        redirect(base_url() . 'kamar');
    }

    function edit_kamar($id) {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk edit data kamar
        $data['sub_title'] = 'Ubah Kamar';
		$data['type']='edit';
        $var = $this->spr->get_kamar($id)->result_array();
        $data['kamar'] = $var[0];
        //var_dump($data['kamar']);
        $this->template->display('kamar/form_kamar', $data);
    }

    function edit_kamar_process() {
        //process penyimpanan data kamar
        $this->spr->update_kamar($_POST['id'], $_POST);
		
		//die(var_dump($_POST));
        $this->session->set_flashdata('msg', $this->editor->alert_ok('kamar telah diubah'));
        redirect(base_url() . 'kamar');
    }

    function delete_kamar($id) {
        //process menghapus kamar
        $this->spr->delete_kamar($id);

        $this->spr->delete_check_list_asrama($id);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('kamar telah dihapus'));
        redirect(base_url() . 'kamar');
    }

}
