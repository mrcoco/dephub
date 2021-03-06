<?php
class Site extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_perencanaan', 'rnc');
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_sarpras', 'spr');
        $this->thn_default=date('Y');
        $this->limit_post=8;
    }
    
    function index(){
        $this->front();
    }
    
    function front($thn=''){
        $data['title']='Sistem Informasi Manajemen Diklat';
        $data['lim']=$this->limit_post;
        $data['data_post'] = $this->slng->load_pengumuman(0,$data['lim']);
        $data['active']=1;
        if($thn==''){
            $data['active']=0;
            $thn=$this->thn_default;
        }
        $data['thn']=$thn;
        $data['num_post'] = $this->slng->count_pengumuman();
        $data['program']=$this->rnc->get_all_program($thn);
        $data['thn_program']=$this->rnc->get_thn_program();
        $this->template->display_with_sidebar('site/front_view','login',$data);
    }
    function news($offset=0){
        $data['title']='Arsip Berita dan Pengumuman';
        $data['offset']=$offset;
        $data['num_post'] = $this->slng->count_pengumuman();
        $data['lim']=$this->limit_post;
        $data['data_post'] = $this->slng->load_pengumuman($offset,$data['lim']);
        $this->template->display_with_sidebar('site/news','login',$data);
    }
       
    function ajax_filter_alumni($page=1){
        $data['cur_page']=$page;
        $data['per_page']=25;
//        $data['filter']= str_replace('%20', ' ', $filter);
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
//        if(isset($_GET)){
            $saring=$_GET;
//        }
        $data['array']=$this->slng->get_filter_alumni($saring,$data['per_page'],$data['offset']);
        $data['num_res']=$this->slng->get_filter_alumni($saring);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
//        print_r($data['array']);
        $this->load->view('site/ajax_list_alumni',$data);
    }
    
    function login(){
        $usr=$this->input->post('usr');
        $pwd=$this->input->post('password');
        $this->load->library('access');
        $login_result=$this->access->login($usr,$pwd);
        if($login_result){
            $nama=ucwords(strtolower($this->session->userdata('nama')));
            $this->session->set_flashdata('msg', $this->editor->alert_ok('Selamat datang '.$nama));
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Username atau password salah'));
        }
        redirect(base_url().'site');
    }
    
    function kal_diklat(){
        $data['title']='Kalender Diklat';
        $this->template->display_with_sidebar('site/kal_diklat','login',$data);
    }
    function print_jadwal($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
        $data['program']=$this->rnc->get_all_program($thn);
        $data['thn_program']=$this->rnc->get_thn_program();
        $this->load->helper('pdfexport_helper.php');
        $data['judul']='Jadwal Diklat Tahun '.$thn;              
        $data['htmView'] = $this->load->view('site/print_jadwal',$data,TRUE);
//        $this->load->view('site/print_jadwal',$data);
        pdf_create($data['htmView'],$data['judul']);                                                                    
    }
    
    function view_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'site');
        }
	$data['sub_title']='Detail Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        $this->load->library('lib_perencanaan');
        $this->load->library('date');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $data['materi']=$this->rnc->get_materi_diklat($id);
        $this->template->display_with_sidebar('site/detail_diklat','login',$data);
    }

    function view_program($id) {
        $this->load->library('date');
        $data['sub_title']="Detail Program";
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'site');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['pil_pendidikan'] = $this->rnc->get_list_pendidikan();
        $data['pil_pangkat'] = $this->rnc->get_pangkat_gol();
        $data['materi'] = $this->rnc->get_materi_diklat($data['program']['parent']);
        $pil_kelas = $this->spr->get_kelas_by_size($data['diklat']['jumlah_peserta'])->result_array();
        $data['kelas'] = array(0 => '-');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }
        $pil_gedung = $this->spr->get_gedung()->result_array();

        foreach ($pil_gedung as $g) {
            $data['asrama'][$g['id']] = 'Asrama ' . $g['nama'];
        }
        $alokasi_asrama = $this->spr->get_alocated_gedung($id);
        $data['pil_asrama'] = array();
        foreach ($alokasi_asrama as $as) {
            $data['pil_asrama'][] = $data['asrama'][$as['id_asrama']];
        }

        $this->template->display_with_sidebar('site/view_program', 'login', $data);
    }

    function json_event() {
	
	$i = 0;
        $cal=$this->rnc->get_program(date('Y'));
        $diklat=$this->rnc->get_diklat(date('Y'));
        $nama_diklat=array();
        foreach($diklat as $d){
            $nama_diklat[$d['id']]=$d['name'];
        }
        
	if (count($cal)== 0) {
	    $data[0]['id'] = '';
	    $data[0]['title'] = '';
	    $data[0]['start'] = '';
	    $data[0]['end'] = '';
	    $data[0]['url'] = '';
	} else {
	    foreach ($cal as $row) {
		$data[$i]['id'] = $row['id'];
                if(array_key_exists($row['parent'], $nama_diklat)){
                    $data[$i]['title'] =$nama_diklat[$row['parent']].' angkatan '.$row['angkatan'];
                    $data[$i]['start'] = $row['tanggal_mulai'];
                    $data[$i]['end'] = $row['tanggal_akhir'];
                    if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 3) {
                            $data[$i]['url'] = base_url().'program/view_program/' . $row['id'];
                    }else{
                            $data[$i]['url'] = base_url().'site/view_program/' . $row['id'];
                    }
                    $i++;
                }else{
                    echo $row['id'].'-';
                }
	    }
	}
	$data['output'] = $data;
	$this->load->view('site/cal_event',$data);
    }
    
    function email() {
	$data['title'] = 'E-Mail';
	$this->template->display('site/email', $data);
    }
    
    function error(){
        $data['msg']='Halaman tidak ditemukan';
        $this->template->display('site/error', $data);
    }
    
    function logout(){
        $this->load->library('access');
        $login_result=$this->access->logout();
        redirect(base_url().'site');
    }
	
    function list_kamar($offset = 0) {
        if (empty($offset))
            $offset = 0;
        $data['sub_title'] = 'Daftar Kamar';

        $var = $this->spr->get_kamar($offset)->result_array();
        $data['list'] = $var;
		
		$var2 = $this->spr->get_kamar_status($offset)->result_array();
		$data['status'] = $var2;
		
        $var3 = $this->spr->get_pemakaian_kamar_detail('kamar')->result_array();
		$data['pemakaian'] = $var3;
		
		$var4 = $this->spr->get_checklist_item()->result_array();
		$data['item']=$var4;
		
		$var5=null;
		foreach($var as $i) {
			$var5[$i['id']] = $this->spr->get_checklist_kamar_kamar($i['id'])->result_array();
		}
		$data['checklist']=$var5;
		
        $this->template->display('site/list_kamar', $data);
    }
	
    function list_kelas($offset = 0) {
        if (empty($offset))
            $offset = 0;
        $data['sub_title'] = 'Daftar Kelas';

        $var = $this->spr->get_kelas($offset)->result_array();
        $data['list'] = $var;
		
        $var2 = $this->spr->get_pemakaian_kelas_detail()->result_array();
		$data['pemakaian'] = $var2;
		
        $this->template->display('site/list_kelas', $data);
    }
}
