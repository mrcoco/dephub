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
class Dashboard extends Perencanaan_Controller{
    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index(){
        //$this->load->library('lib_perencanaan');
	$data['title']='Bidang Perencanaan';
        $data['kategori']=$this->rnc->get_kategori();
        $data['program']=$this->rnc->get_program($this->thn_default);
	$this->template->display('main/perencanaan/index',$data);
    }
}
