<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
        function __construct() {
            parent::__construct();
            $this->load->model('mdl_administrator','adm');
        }
	public function index()
	{
            if(!$this->session->userdata('is_login')){
                redirect(base_url());
            }
            $this->profil();
	}

	function profil()
	{
            $data['about']=$this->adm->get_profil();
            $data['sub_title']='Daftar Profil';
	    $this->template->display('about/profil',$data);
	}

	function add_profil()
	{
            $data['sub_title']='Tambah Profil';
	    $this->template->display('about/add',$data);
	}
	function edit_profil($id)
	{
            $data['about']=$this->adm->get_profil_id($id);
            if(!$data['about']){
                $this->session->set_flashdata('msg',$this->editor->alert_error('Profil tidak ditemukan'));
                redirect(base_url().'settings/profil');
            }
            $data['sub_title']='Edit Profil';
	    $this->template->display('about/edit',$data);
	}

	function insert_profil()
	{
            $data['judul']=$this->input->post('judul');
            $data['isi']=$this->input->post('isi');
            $data['waktu']=date('H:i');
            $data['tanggal']=date('Y-m-d');
            $this->adm->insert_profil($data);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Profil telah ditambah'));
            redirect(base_url().'settings/profil/'.$clause);
	}
	function update_profil()
	{
            $clause=$this->input->post('id');
            $data['judul']=$this->input->post('judul');
            $data['isi']=$this->input->post('isi');
            $this->adm->update_profil($clause,$data);
            $this->session->set_flashdata('msg',$this->editor->alert_ok('Profil telah diubah'));
            redirect(base_url().'settings/profil/'.$clause);
	}
        function delete_profil($id){
            $data['about']=$this->adm->get_profil_id($id);
            if(!$data['about']){
                $this->session->set_flashdata('msg',$this->editor->alert_error('Profil tidak ditemukan'));
                redirect(base_url().'settings/profil');
            }
            $this->adm->delete_profil($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Profil telah dihapus'));
            redirect(base_url().'settings/profil');
        }
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */