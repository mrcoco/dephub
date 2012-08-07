<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
	    $data['title']='Sekilas Tentang Pusbang SDM Aparatur Departemen Perhubungan';
	    $this->template->display('main/about/index',$data);
	}

	function visi_misi()
	{
	    $data['title']='Visi dan Misi';
	    $this->template->display('main/about/visi_misi',$data);
	}

	function struktur()
	{
	    $data['title']='Struktur Organisasi';
	    $this->template->display('main/about/struktur',$data);
	}

	function kontak()
	{
	    $data['title']='Kontak';
	    $this->template->display('main/about/kontak',$data);
	}
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */