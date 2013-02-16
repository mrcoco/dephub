<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Berita extends CI_Controller {
        function __construct() {
            parent::__construct();
            if(!$this->session->userdata('is_login')){
                redirect(base_url());
            }
            $this->load->model('mdl_administrator','adm');
        }
	public function index()
	{
            $data['berita']=$this->adm->get_berita();
            $data['sub_title']='Daftar Berita';
	    $this->template->display('berita/list',$data);
	}
	public function view($id)
	{
            $data['berita']=$this->adm->get_berita_id($id);
            $data['sub_title']=$data['berita']['judul'];
	    $this->template->display('berita/view',$data);
	}

	function add_berita()
	{
            $data['sub_title']='Tambah Berita';
	    $this->template->display('berita/add',$data);
	}
	function edit_berita($id)
	{
            $data['berita']=$this->adm->get_berita_id($id);
            if(!$data['berita']){
                $this->session->set_flashdata('msg',$this->editor->alert_error('Berita tidak ditemukan'));
                redirect(base_url().'berita/');
            }
            $data['sub_title']='Ubah berita';
	    $this->template->display('berita/edit',$data);
	}

	function insert_berita()
	{
            $data['judul']=$this->input->post('judul');
            $data['isi']=$this->input->post('isi');
            $data['waktu']=date('H:i');
            $data['tanggal']=date('Y-m-d');
            $this->adm->insert_berita($data);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Berita telah ditambah'));
            redirect(base_url().'berita/');
	}
	function update_berita()
	{
            $clause=$this->input->post('id');
            $data['judul']=$this->input->post('judul');
            $data['isi']=$this->input->post('isi');
            $data['waktu']=date('H:i');
            $data['tanggal']=date('Y-m-d');
            $this->adm->update_berita($clause,$data);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Berita telah diubah'));
            redirect(base_url().'berita/');
	}
        function delete_berita($id){
            $data['berita']=$this->adm->get_berita_id($id);
            if(!$data['berita']){
                $this->session->set_flashdata('msg',$this->editor->alert_error('Berita tidak ditemukan'));
                redirect(base_url().'berita/');
            }
            $this->adm->delete_berita($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Berita telah dihapus'));
            redirect(base_url().'berita/');
        }
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */