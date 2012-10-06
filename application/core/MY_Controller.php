<?php
/**
 * Core controller login
 * @author irhamnurhalim
 */

/*
 * Perencanaan
 */
class Perencanaan_Controller extends CI_Controller{
    function __construct() {
	parent::__construct();
	$this->load->library('access');
//	if(!$this->access->is_perencanaan() && !$this->access->is_login()){
//	    $this->session->set_flashdata('msg',$this->editor->alert_error('<strong>Perhatian!</strong> Anda belum login. Silakan klik tombol Login di atas untuk masuk ke aplikasi'));
//	    redirect('site/dashboard/diklat');
//	}
	$this->load->model('mdl_perencanaan');
    }

    function is_perencanaan(){
	return $this->access->is_perencanaan();
    }
}

/*
 * Penyelenggaraan
 */

class Penyelenggaraan_Controller extends CI_Controller{
    function __construct() {
	parent::__construct();
	$this->load->library('access');
//	if(!$this->access->is_penyelenggaraan() && !$this->access->is_login()){
//	    $this->session->set_flashdata('msg',$this->editor->alert_error('<strong>Perhatian!</strong> Anda belum login. Silakan klik tombol Login di atas untuk masuk ke aplikasi'));
//	    redirect('site/dashboard/diklat');
//	}
	$this->load->model('mdl_penyelenggaraan');
    }

    function is_penyelenggaraan(){
	return $this->access->is_penyelenggaraan();
    }
}

/*
 * Sarana dan Prasarana
 */

class Sarpras_Controller extends CI_Controller{
    function __construct() {
	parent::__construct();
	$this->load->library('access');
//	if(!$this->access->is_sarpras() && !$this->access->is_login()){
//	    $this->session->set_flashdata('msg',$this->editor->alert_error('<strong>Perhatian!</strong> Anda belum login. Silakan klik tombol Login di atas untuk masuk ke aplikasi'));
//	    redirect('site/dashboard/diklat');
//	}
	$this->load->model('mdl_sarpras');
    }

    function is_sarpras(){
	return $this->access->is_sarpras();
    }
}


/*
 * Administrator
 */

class Administrator_Controller extends CI_Controller{
    function __construct() {
	parent::__construct();
	$this->load->library('access');
//	if(!$this->access->is_administrator() && !$this->access->is_login()){
//	    $this->session->set_flashdata('msg',$this->editor->alert_error('<strong>Perhatian!</strong> Anda belum login. Silakan klik tombol Login di atas untuk masuk ke aplikasi'));
//	    redirect('site/dashboard/diklat');
//	}
	$this->load->model('mdl_administrator');
    }

    function is_administrator(){
	return $this->access->is_administrator();
    }
}

class MY_Controller extends CI_Controller {
    function __construct() {
	parent::__construct();
    }
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */