<?php

/**
 * Description of kelas
 *
 * @author irhamnurhalim
 */
class Kelas extends Sarpras_Controller{
    public function index()
    {
	//$data['sub_title']='Kelas';
	//$this->template->display('simdik/sarpras/kelas',$data);
	redirect('sarpras/kelas/list_kelas');
    }
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_sarpras','spr');
    }

    function pemakaian()
    {

    }
    private $limit=200;
    
    function list_kelas($offset=0)
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Kelas';

	$var = $this->mdl_sarpras->get_check_list_kelas()->result_array();
        $data['list']=$var;
	$this->template->display('simdik/sarpras/kelas',$data);
    }
    
    // function list_kelas($offset=0,$tahun=2012,$bulan=1,$minggu=1,$asrama='A')
    // {
	// if(empty ($offset)) $offset=0;
	// $data['sub_title']='Kelas';

	// generate pagination
	// $data['pagination']=$this->editor->pagination_custom(site_url('sarpras/asrama/list_kelas/'),$this->mdl_sarpras->count_check($tahun,$bulan),  $this->limit);

	// Tabel Monitoring Kelas
	// $this->table->set_empty('&nbsp;');
	// $this->table->add_row(
		// array('data'=>'No','width'=>10,'rowspan'=>2),
		// array('data'=>'Nama Kelas','width'=>10,'rowspan'=>2),
		// array('data'=>'<div align="center">LCD Proyektor</div>','width'=>10,'colspan'=>4),
		// array('data'=>'<div align="center">Sound System</div>','width'=>10,'colspan'=>2),
		// array('data'=>'<div align="center">Meja</div>','width'=>10,'colspan'=>3),
		// array('data'=>'<div align="center">Kursi</div>','width'=>10,'colspan'=>3),
		// array('data'=>'<div align="center">Whiteboard</div>','width'=>10),
		// array('data'=>'<div align="center">Panaboard</div>','width'=>10),
		// array('data'=>'<div align="center">Flipchart</div>','width'=>10)
		// );
	// $this->table->add_row(
		// array('data'=>'Type','width'=>50),
		// array('data'=>'Kondisi','width'=>50),
		// array('data'=>'Jumlah','width'=>50),
		// array('data'=>'Lap Time','width'=>50),
		// array('data'=>'Type','width'=>50),
		// array('data'=>'Kondisi','width'=>50),
		// array('data'=>'Type','width'=>50),
		// array('data'=>'Kondisi','width'=>50),
		// array('data'=>'Jumlah','width'=>50),
		// array('data'=>'Type','width'=>50),
		// array('data'=>'Kondisi','width'=>50),
		// array('data'=>'Jumlah','width'=>50),
		// array('data'=>'Kondisi','width'=>50),
		// array('data'=>'Kondisi','width'=>50),
		// array('data'=>'Kondisi','width'=>50)
		// );
	// $var = $this->mdl_sarpras->get_check_list_kelas($this->limit,$offset,$tahun,$bulan,$minggu)->result_array();
	// $i=$offset;
	// $data['modal_kelas']='';
	// foreach ($var as $row)
	// {
		// $this->table->add_row(
		    // ++$i,
		    // '<div align="center">KELAS '.$row['id_kelas'].
		    // '<br /><a href="#kelas'.$row['id_kelas'].'" data-toggle="modal" class="badge badge-success tip" title="Edit"><i class="icon icon-white icon-edit"></i></a></div>',
		    // $row['l1'],
		    // $row['l2'],
		    // $row['l3'],
		    // $row['l4'],
		    // $row['s1'],
		    // $row['s2'],
		    // $row['m1'],
		    // $row['m2'],
		    // $row['m3'],
		    // $row['k1'],
		    // $row['k2'],
		    // $row['k3'],
		    // $row['wb'],
		    // $row['pb'],
		    // $row['fc']
		    // );
		// $data['modal_kelas'].=$this->editor->modal_kelas($row['id_kelas']);
	// }
	// $this->table->set_template(array('table_open'  => '<table class="table table-condensed table-stripped table-bordered">'));
	// $data['table_kelas']=$this->table->generate();
	// $opt_tahun=$this->mdl_sarpras->get_tahun()->result_array();
	// $data['option_tahun']='';
	// foreach ($opt_tahun as $row_tahun)
	// {
	    // $data['option_tahun'].='<option value="'.$row_tahun['tahun'].'" '.$this->editor->y_selected($row_tahun['tahun']).'>'.$row_tahun['tahun'].'</option>';
	// }
	// $this->template->display('simdik/sarpras/kelas',$data);
    // }

    // function filter()
    // {
	// $uri = $this->uri->segment(4);
	// if($uri=='')
	// {
	    // $uri=0;
	// }
	// $tahun = $this->input->post('tahun');
	// $bulan = $this->input->post('bulan');
	// $minggu = $this->input->post('minggu');
	// $kelas = $this->input->post('kelas');
	// redirect('sarpras/kelas/list_kelas/'.$uri.'/'.$tahun.'/'.$bulan.'/'.$minggu.'/'.$kelas);
    // }
}