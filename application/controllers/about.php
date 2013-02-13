<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
            $this->profil();
	}
	function profil($id=1)
	{
            $this->load->model('mdl_administrator','adm');
            $data['profil']=$this->adm->get_profil();
            $data['about']=$this->adm->get_profil_id($id);
	    $data['title']=$data['about']['judul'];
	    $this->template->display('about/index',$data);
	}
        function pengajar(){
            $this->load->model('mdl_penyelenggaraan','slng');
            $data['sub_title']='Daftar Pengajar';
            $data['list']=$this->slng->getall_pembicara_int();
            $this->template->display('about/list_pembicara_int',$data);
        }
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */