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
	$data['sub_title']='Dashboard';
	$this->template->display('simdik/perencanaan/dashboard',$data);

    }

}
