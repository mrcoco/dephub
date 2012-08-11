<?php

/**
 * Description of dashboard
 *
 * @author irhamnurhalim
 */
class Dashboard extends Sarpras_Controller {
    public function index()
    {
	$data['sub_title']='Dashboard';
	$var = $this->mdl_sarpras->get_asrama()->result_array();

	$i=0;
	$this->table->set_empty('&nbsp');
	$this->table->set_heading(
		array('data'=>'No','width'=>5),
		array('data'=>'No Kamar','width'=>70),
		array('data'=>'Asrama','width'=>20),
		array('data'=>'Lantai','width'=>20),
		array('data'=>'Kanan/Kiri','width'=>20),
		array('data'=>'Bed','width'=>20),
		array('data'=>'Keterangan')
		);
	foreach($var as $row)
	{
	    $this->table->add_row(
		    ++$i,
		    $row['nomor'],
		    $row['asrama'],
		    $row['lantai'],
		    $row['sayap'],
		    $row['bed'],
		    ''
		    );
	}
	$this->table->set_template(array('table_open'  => '<table class="table table-stripped table-condensed table-bordered">'));
	$data['list_kamar']=$this->table->generate();
	$this->template->display('simdik/sarpras/dashboard',$data);
    }
}
