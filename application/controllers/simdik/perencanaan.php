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

    public function index()
    {
	$data['title']='Bidang Perencanaan';
	$this->template->display('main/perencanaan/index',$data);
    }
}
