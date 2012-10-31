<?php
/**
 * Description of asrama
 *
 * @author irhamnurhalim
 */
class Asrama extends Sarpras_Controller {
    private $limit=200;
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_sarpras','spr');
    }
    
    public function index($offset=0)
    {
	redirect('sarpras/asrama/list_asrama/0/'.date('Y').'/'.date('m').'/1/1');
    }

    function list_asrama($offset=0,$tahun=2012,$bulan=1,$minggu=1,$asrama='1')
    {
	if(empty ($offset)) $offset=0;
	$data['sub_title']='Asrama';

	// generate pagination
	$data['pagination']=$this->editor->pagination_custom(site_url('sarpras/asrama/list_asrama/'),$this->mdl_sarpras->count_check($tahun,$bulan),  $this->limit);

	// Tabel Monitoring Asrama
	$this->table->set_empty('&nbsp;');
	$this->table->add_row(
		array('data'=>'No','width'=>10,'rowspan'=>2),
		array('data'=>'Lokasi (Kamar)','width'=>10,'rowspan'=>2),
		array('data'=>'<div align="center">Lampu</div>','width'=>10,'colspan'=>5),
		array('data'=>'<div align="center">Toilet</div>','width'=>10,'colspan'=>5),
		array('data'=>'<div align="center">AC</div>','width'=>10,'colspan'=>2),
		array('data'=>'<div align="center">Fasilitas Lain</div>','width'=>10,'rowspan'=>2),
		array('data'=>'<div align="center">Kebersihan</div>','width'=>10,'rowspan'=>2),
		array('data'=>'<div align="center">Keterangan</div>','width'=>10,'rowspan'=>2)
		);
	$this->table->add_row(
		array('data'=>'TL-E 22W','width'=>50),
		array('data'=>'TL-D 18W','width'=>50),
		array('data'=>'PL-C 14W','width'=>50),
		array('data'=>'PL-C 13W','width'=>50),
		array('data'=>'LP Bel','width'=>50),
		array('data'=>'SHO','width'=>50),
		array('data'=>'CLO','width'=>50),
		array('data'=>'JE-S','width'=>50),
		array('data'=>'WAS','width'=>50),
		array('data'=>'EX-F','width'=>50),
		array('data'=>'REM','width'=>50),
		array('data'=>'BAT','width'=>50)
		);
	$var = $this->mdl_sarpras->get_check_list_asrama($this->limit,$offset,$tahun,$bulan,$minggu)->result_array();
	$i=$offset;
	$data['modal_kamar']='';
	foreach ($var as $row)
	{
	    $kamar=$this->mdl_sarpras->get_asrama($row['id_kamar'])->row();
	    if($kamar->asrama == $asrama)
	    {
		$this->table->add_row(
		    ++$i,
		    '<div align="center">KAMAR '.
			$this->mdl_sarpras->get_asrama($row['id_kamar'])->row()->nomor.
		    '<br /><a href="#kamar'.$row['id_kamar'].'" data-toggle="modal" class="badge badge-success tip" title="Edit"><i class="icon icon-white icon-edit"></i></a></div>',
		    $this->mon($row['lampu1']),
		    $this->mon($row['lampu2']),
		    $this->mon($row['lampu3']),
		    $this->mon($row['lampu4']),
		    $this->mon($row['lampu5']),
		    $this->mon($row['toilet1']),
		    $this->mon($row['toilet2']),
		    $this->mon($row['toilet3']),
		    $this->mon($row['toilet4']),
		    $this->mon($row['toilet5']),
		    $this->mon($row['ac1']),
		    $this->mon($row['ac2']),
		    $this->mon($row['lain_lain']),
		    $this->mon($row['kebersihan']),
		    $this->mon($row['keterangan'])
		    );
		$data['modal_kamar'].=$this->editor->modal_kamar($row['id_kamar']);
	    }

	}
	$this->table->set_template(array('table_open'  => '<table class="table table-condensed table-stripped table-bordered">'));
	$data['table_asrama']=$this->table->generate();
	$opt_tahun=$this->mdl_sarpras->get_tahun()->result_array();
	$data['option_tahun']='';
	foreach ($opt_tahun as $row_tahun)
	{
	    $data['option_tahun'].='<option value="'.$row_tahun['tahun'].'" '.$this->editor->y_selected($row_tahun['tahun']).'>'.$row_tahun['tahun'].'</option>';
	}
	$this->template->display('simdik/sarpras/asrama',$data);
    }

    function filter()
    {
	$uri = $this->uri->segment(4);
	if($uri=='')
	{
	    $uri=0;
	}
	$tahun = $this->input->post('tahun');
	$bulan = $this->input->post('bulan');
	$minggu = $this->input->post('minggu');
	$asrama = $this->input->post('asrama');
	redirect('sarpras/asrama/list_asrama/'.$uri.'/'.$tahun.'/'.$bulan.'/'.$minggu.'/'.$asrama);
    }

    protected function mon($var)
    {
	if($var=='ok')
	{
	    return '<span style="color:green">'.$var.'</span>';
	} else if($var==''){
	    return '';
	} else {
	    return '<a href="#alert" title="Klik untuk melihat laporan" rel="tooltip"><span style="color:red"><img src="assets/img/alert.png" /></span></a>';
	}
    }
}
