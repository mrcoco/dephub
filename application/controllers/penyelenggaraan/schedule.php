<?php
class Schedule extends Penyelenggaraan_Controller{
    
    protected $thn_default;
    
    function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_penyelenggaraan','slng');
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
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'penyelenggaraan/schedule/daftar_diklat');
        }
        $widyaiswara=$this->slng->getall_widyaiswara();
        $data['autocom_widya']=array();
        foreach($widyaiswara as $w){
            $data['autocom_widya'][]=$w['nama'];
        }
        $data['autocom_widya']=  json_encode($data['autocom_widya']);
//        foreach($widyaiswara as $w){
//            $data['autocom_widya'][$w['id']]=$w['nama'];
//        }
        $this->template->display('simdik/penyelenggaraan/schedule_diklat',$data);
    }
}
