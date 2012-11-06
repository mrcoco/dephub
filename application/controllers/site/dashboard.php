<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    protected $thn_default;

    function __construct() {
	parent::__construct();
        $this->thn_default = date('Y');
        $this->thn = date('Y');
	$this->load->model('mdl_dashboard');
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index($thn='') {
	$data['title'] = 'Selamat Datang';
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['thn']=$thn;
        $this->load->library('lib_perencanaan');
	$data['sub_title']='Daftar Diklat Tahun '.$thn;
        $data['program']=$this->rnc->get_all_program($thn);
	$this->template->display_pub('main/dashboard/daftar_diklat', $data);
    }

    function email() {
	$data['title'] = 'E-Mail';
	$this->template->display('main/dashboard/email', $data);
    }

    function diklat() {
	if ($this->session->userdata('is_login')) {
	    redirect($this->session->userdata('link'));
	} else {
	    $data['title'] = 'Sistem Informasi Manajemen Diklat';
	    $data['info']=$this->mdl_dashboard->get_info()->row()->diklat_message;
	    $this->template->display_pub('main/dashboard/simdik', $data);
	}
    }
    function info_diklat($id) {
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['feedback'] = $this->rnc->get_feedback_sarpras_program($id);
	$data['sub_title']='Detail Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        $this->load->library('lib_perencanaan');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        if($data['program']){
            $this->template->display_pub('simdik/detail_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'site/dashboard/diklat');                    
        }
    }
    function registrasi(){
        $data['sub_title']='Registrasi Diklat';
        $list_program = $this->rnc->get_program($this->thn);
        $data['pil_program']=array(-1=>'Pilih diklat');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        $this->template->display_pub('simdik/registrasi',$data);
    }
    
    function registrasi_proses(){
        $id_program=$this->input->post('program');
        $id=$this->input->post('id');
        
        for($i=0;$i<count($id);$i++){
            $reg['id_peserta']=$id[$i];
            $reg['id_program']=$id_program;
            $reg['status']='daftar';
            $this->slng->insert_registrasi($reg);
        }
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Peserta telah ditambahkan'));
        redirect(base_url().'site/dashboard/diklat');
    }
    function list_instansi(){
        $list_instansi=$this->slng->getall_instansi();
        $array_list=array();
        $n=0;
        foreach($list_instansi as $l){
            $array_list[$n]=$l['nama_instansi'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function get_kode_instansi($nama){
        $nama=  str_replace('%20', ' ', $nama);
        echo $this->slng->getkode_instansi($nama);
    }
    
    function get_cv_peserta($kodekantor){
        $list_peserta=$this->slng->get_peserta($kodekantor);
        $array_list=array();
        $n=0;
        foreach($list_peserta as $l){
            $array_list[$n]=$l['nip'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function get_data_peserta($nip){
        $data_peserta=$this->slng->get_data_peserta($nip);
        echo json_encode($data_peserta);
    }
    
    function get_history_pelatihan($id){
        $history=$this->slng->get_history($id);
        $data_peserta=$this->slng->get_data_peserta_id($id);
        
        $header='History pelatihan '.$data_peserta['nama'];
        
        if(count($history)==0){
            $data='Tidak ada data history pelatihan';
        }else{
            $data='<ul>';
            foreach($history as $h){
                $data.='<li>'.$h['tahun'].' : '.$h['nama_pelatihan'].'</li>';
            }
            $data.='</ul>';
        }
        $text = '<div class="modal-header">
                    <h3>'.$header.'</h3>
                </div>
                <div class="modal-body">'.$data.'</div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>';
        echo $text;
    }
    
    function get_detail_peserta($id){
        $this->load->library('date');
        $data_peserta=$this->slng->get_data_peserta_id($id);
        $data['header']='Detail data '.$data_peserta['nama'];
        foreach($data_peserta as $key=>$item){
            if($key!='foto'){
                if($item==''){
                    $item='-';
                }
            }else{
                if($item==''){
                    $item=base_url().'assets/public/foto/nopic.jpg';
                }
            }
            $data['peserta'][$key]=$item;
        }
        $this->load->view('simdik/penyelenggaraan/ajax_detail_peserta',$data);
    }

    function event() {
	$cal = $this->mdl_dashboard->get_all()->result_array();
	$i = 0;
	if ($this->mdl_dashboard->get_all()->num_rows() <= 0) {
	    $data[0]['id'] = '';
	    $data[0]['title'] = '';
	    $data[0]['start'] = '';
	    $data[0]['end'] = '';
	    $data[0]['url'] = '';
	} else {
	    foreach ($cal as $row) {
		$data[$i]['id'] = $row['id'];
		$data[$i]['title'] = $row['name'];
		$data[$i]['start'] = $row['tanggal_mulai'];
		$data[$i]['end'] = $row['tanggal_akhir'];
		$data[$i]['url'] = 'site/dashboard/info_diklat/' . $row['id'];
		$i++;
	    }
	}
	$this->data['output'] = $data;
	$this->load->view('json_view', $this->data);
    }

    function kalender_diklat() {
	$data['title'] = 'Sistem Informasi Manajemen Diklat';
	$this->template->display('main/uc', $data);
    }

    function library() {
	$data['user']='blm';
            $this->template->display_lib('main/elibrary/index', $data);

    }

    /*
     * E-Learning
     */

    function elearning() {
	$data['title'] = 'E-Learning';
	$course = $this->mdl_dashboard->get_course_moodle()->result_array();
	$data['content'] = '';
	foreach ($course as $row) {
	    $data['content'].='<h3>' . $row['fullname'] . '</h3>';
	    $data['content'].='<span style="font-size:\'9px\';color:#ccc"><i>Tanggal : ' . date('d M Y', $row['startdate']) . '</i></span>';
	    $data['content'].='<p>' . $row['summary'] . '</p>';
	    $data['content'].='<div align="right"><button class="btn" onclick="window.location=\'elearning/course/view.php?id=' . $row['id'] . '\'">Selengkapnya</button></div>';
	    $data['content'].='<br />';
	}
	$program = $this->mdl_dashboard->get_category_top()->result_array();
	$data['program_diklat'] = '';
	foreach ($program as $row_p) {
	    $sub_prog = $this->mdl_dashboard->get_category_child($row_p['id'])->result_array();
	    $data['program_diklat'].='<li><a href="elearning/course/category.php?id=' . $row_p['id'] . '">' . $row_p['name'] . '</a></li>';
	    $data['program_diklat'].='<ul>';
	    foreach ($sub_prog as $row_p_sub) {
		$data['program_diklat'].='<li><a href="elearning/course/category.php?id=' . $row_p['id'] . '">' . $row_p_sub['name'] . '</a></li>';
	    }
	    $data['program_diklat'].='</ul>';
	}
	$this->template->display('main/elearning/index', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/site/dashboard.php */