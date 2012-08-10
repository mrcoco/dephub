<?php
/**
 * Description of asrama
 *
 * @author irhamnurhalim
 */
class Keluhan extends Sarpras_Controller {

    public function index()
    {
	$data['sub_title']='Laporan Keluhan';
	$this->template->display('simdik/sarpras/keluhan',$data);
    }
}
