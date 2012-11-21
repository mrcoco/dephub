<?php
class Kelas extends CI_Controller{
    
    private $limit=200;
    
    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_sarpras', 'spr');
    }
    
    function index(){
        $this->list_kelas();
    }
    
    function list_kelas($offset=0){
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Kelas';

	$var = $this->spr->get_check_list_kelas()->result_array();
        $data['list']=$var;
	$this->template->display('kelas/list_kelas',$data);
    }
	
	
    function add_kelas() {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk memasukkan data kelas yg belum ada di database
        if (empty($id))
            $id = '';
        $data['sub_title'] = 'Tambah Kamar';
        $var['id'] = '';
        $var['nama'] = '';
        $var['lantai'] = '';
        $var['sayap'] = '';
        $var['nomor'] = '';
        $var['bed'] = '';
        $var['status'] = '';
        $var['gedung'] = $id;
        $data['kelas'] = $var;
        $this->template->display('kelas/form_kelas', $data);
    }

    function add_kelas_process() {
        //process penambahan kelas
        //$reg=$_POST;
        //$reg['id']=$this->spr->count_kelas('')+1;
        $this->spr->insert_check_list_kelas($_POST);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('kelas telah ditambahkan'));
        redirect(base_url() . 'kelas');
    }

    function edit_kelas($id) {
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==3){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk edit data kelas
        $data['sub_title'] = 'Edit Kamar';
        $var = $this->spr->get_check_list_kelas($id)->result_array();
        $data['kelas'] = $var[0];
        //var_dump($data['kelas']);
        $this->template->display('kelas/form_kelas', $data);
    }

    function edit_kelas_process() {
        //process penyimpanan data kelas
        $this->spr->update_check_list_kelas($_POST['id'], $_POST);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('kelas telah diedit'));
        redirect(base_url() . 'kelas');
    }

    function delete_kelas($id) {
        //process menghapus kelas
        $this->spr->delete_check_list_kelas($id);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('kelas telah dihapus'));
        redirect(base_url() . 'kelas');
    }
	
	function update_checklist($id) {
		//update checklist item kelas
		// die(var_dump($_GET));
		$ins['l2']='0';
		$ins['s2']='0';
		$ins['m2']='0';
		$ins['wb']='0';
		$ins['pb']='0';
		$ins['fc']='0';
		foreach(array_keys($_GET) as $var)
		{
			$ins[$var]=$_GET[$var];
		}
		
		// die(var_dump($ins));
        $this->spr->update_checklist($id, $ins);
		
        $this->session->set_flashdata('msg', $this->editor->alert_ok('checklist telah diupdate'));
        redirect(base_url() . 'kelas');
	}
}