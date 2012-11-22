<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
            $this->profil();
	}
	function profil($id=1)
	{
            $this->load->model('mdl_administrator','adm');
            $data['about']=$this->adm->get_about_id($id);
	    $data['title']=$data['about']['judul'];
	    $this->template->display('about/index',$data);
	}
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */