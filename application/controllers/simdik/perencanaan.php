<<<<<<< HEAD
<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perencanaan
 *
 * @author irhamnurhalim
 */
class Perencanaan extends Perencanaan_Controller{
    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }
    
    public function index(){
        $this->home();
        
    }
    
    function home($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
	$data['title']='Bidang Perencanaan';
        $data['kategori']=$this->rnc->get_kategori();
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('main/perencanaan/index',$data);
    }
}
