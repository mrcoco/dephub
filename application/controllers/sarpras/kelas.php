<?php

/**
 * Description of kelas
 *
 * @author irhamnurhalim
 */
class Kelas extends Sarpras_Controller{
    public function index()
    {
	$data['sub_title']='Kelas';
	$this->template->display('simdik/sarpras/kelas',$data);
    }

    function pemakaian()
    {

    }
}