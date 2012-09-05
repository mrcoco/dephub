<?php
class Schedule extends Penyelenggaraan_Controller{
    
    protected $thn_default;
    
    function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }
    
    public function index(){
	$this->daftar_diklat();

    }

    function daftar_diklat($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
	$data['sub_title']='Daftar Diklat Tahun '.$thn;
        $data['kategori']=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($data['kategori'] as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('simdik/penyelenggaraan/daftar_diklat',$data);
    }
    
    function buat_schedule($id){
        $data['program']=$this->rnc->get_program_by_id($id);
        $this->template->display('simdik/penyelenggaraan/schedule_diklat',$data);
//        $this->load->view('simdik/penyelenggaraan/schedule_diklat',$data);
    }
}
