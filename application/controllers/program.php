<?php

class Program extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_perencanaan', 'rnc');
        $this->load->model('mdl_sarpras', 'spr');
        $this->load->model('mdl_penyelenggaraan', 'slng');
        $this->load->library('date');
        $this->thn_default=date('Y');
    }
    function kelulusan(){
        if ($this->session->userdata('id_role') == 5 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['id_pegawai'] = $this->input->post('id_peserta');
        $data['id_program'] = $this->input->post('id_program');
        $data['nilai_akhir'] = $this->input->post('nilai_akhir');
        $data['grade'] = $this->input->post('grade');
        $data['predikat'] = $this->input->post('predikat');
        $data['tgl_lulus'] = $this->date->savetgl($this->input->post('tgl_lulus'));
        $data['no_sk'] = $this->input->post('no_sk');
        $data['ket'] = $this->input->post('ket');
        if($_FILES['file_sk']['size']){
            $config['file_name']=$data['no_sk'];
            $config['overwrite']=FALSE;
            $config['upload_path'] = 'assets/public/file/';
            $config['allowed_types'] = 'pdf|doc|docx|ppt|xls|xlsx|pptx|odt|jpg|png|gif';

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('file_sk'))
            {
                $error = $this->upload->display_errors('','');
                $this->session->set_flashdata('msg',$this->editor->alert_error($error));
                redirect(base_url('program/peserta_program/'.$data['id_program']));
            }else{
                $file_data=$this->upload->data();
                $data['file_sk']=$file_data['file_name'];
            }
        }
        if($data['no_sk']){
           $this->slng->insert_alumni($data);
           $this->session->set_flashdata('msg',$this->editor->alert_ok('Data kelulusan telah disimpan'));
        }else{
           $this->session->set_flashdata('msg',$this->editor->alert_error('Anda belum memasukkan nomor SK'));
        }
        redirect(base_url('program/peserta_program/'.$data['id_program']));
    }
    function kelulusan_delete($id_pes,$id_pro){
        if ($this->session->userdata('id_role') == 5 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $alumni=$this->slng->get_alumni($id_pes,$id_pro);
        if($alumni){
            $this->slng->delete_alumni($id_pes,$id_pro);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Data kelulusan telah dihapus'));
            redirect(base_url('program/peserta_program/'.$id_pro));
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Data tidak ditemukan'));
            redirect(base_url('program/peserta_program/'.$id_pro));
        }
    }
    function ajax_kelulusan($id_pes,$id_pro){
        if ($this->session->userdata('id_role') == 5 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program']=$this->rnc->get_program_by_id($id_pro);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['peserta']=$this->slng->get_data_peserta_id($id_pes);
        $alumni=$this->slng->get_alumni($id_pes,$id_pro);
        $this->load->model('mdl_wid','wid');
        $nilai=$this->wid->get_nilai_peserta_id($id_pes,$id_pro);
        if($alumni){
            $data['alumni']=$alumni;
        }else{
            $data['alumni']['nilai_akhir']=  number_format($nilai,2,',','.');
            $data['alumni']['grade']=$this->editor->grading($nilai);
            $data['alumni']['predikat']=$this->editor->predikat($nilai);
            $data['alumni']['tgl_lulus']='';
            $data['alumni']['no_sk']='';
            $data['alumni']['file_sk']='';
            $data['alumni']['ket']='';
        }
//        print_r($data);
        $this->load->view('program/kelulusan_peserta',$data);
    }
    function feedback_result($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
	$data['sub_title']='Rekap Evaluasi Diklat';
        $data['n']=$this->slng->count_feedback_diklat($id);
        $data['result']=$this->slng->feedback_diklat($id);
        $this->load->model('mdl_feedback', 'fdb');
        $data['kategori'] = $this->fdb->getall_kategori();
        $saran=$this->slng->saran_diklat($id);
        foreach($saran as $sar){
            foreach($data['kategori'] as $kat){
                if($sar['id_kategori']==$kat['id_kategori'])
                $data['saran'][$kat['id_kategori']][]=$sar['saran'];
            }
        }
        $this->template->display_with_sidebar('program/feedback_result','program',$data);
    }
    function fr($id){
        $result=$this->slng->feedback_diklat($id);
        $program=$this->rnc->get_program_by_id($id);
        $diklat=$this->rnc->get_diklat_by_id($program['parent']);
        $x=array();
        $y=array();
        foreach($result as $r){
            $x[]=$r['nama_kategori'];
            $y[]=number_format($r['avg(skor)'],2,'.','');
        }
        $this->load->library('jpgraph');
        $this->jpgraph->barchart($x,$y,"Evaluasi ".$diklat['name']." Angkatan ".$program['angkatan']);
    }
    function fr_pem($id){
        $data['pengajar']=$this->slng->get_pembicara_id($_POST['id_pengajar']);
        $data['program']=$this->rnc->get_program_by_id($_POST['id_program']);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['result']=$this->slng->feedback_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->result_array();
        $x=array();
        $y=array();
        foreach($result as $r){
            $x[]=$r['pertanyaan'];
            $y[]=number_format($r['skor'],2,'.','');
        }
        $this->load->library('jpgraph');
        $judul="Evaluasi Pengajar ".$data['diklat']['name']." Angkatan ".$data['program']['angkatan'];
        $this->jpgraph->barchart($x,$y,$judul,'chart.png');
    }
    function cetak_feedback_result($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
	$data['sub_title']='Rekap Evaluasi Diklat';
        $data['n']=$this->slng->count_feedback_diklat($id);
        $data['result']=$this->slng->feedback_diklat($id);
        $this->load->model('mdl_feedback', 'fdb');
        $data['kategori'] = $this->fdb->getall_kategori();
        $saran=$this->slng->saran_diklat($id);
        foreach($saran as $sar){
            foreach($data['kategori'] as $kat){
                if($sar['id_kategori']==$kat['id_kategori'])
                $data['saran'][$kat['id_kategori']][]=$sar['saran'];
            }
        }
        $x=array();
        $y=array();
        foreach($data['result'] as $r){
            $x[]=$r['nama_kategori'];
            $y[]=number_format($r['avg(skor)'],2,'.','');
        }
            $this->load->library('jpgraph');
        $judul="Evaluasi ".$data['diklat']['name']." Angkatan ".$data['program']['angkatan'];
        $data['chart']=$this->jpgraph->barchart($x,$y,$judul,'chart.png');
//        $this->load->view('program/pdf_feedback_result',$data);
        $this->load->helper('pdfexport_helper.php');
        $html = $this->load->view('program/pdf_feedback_result',$data,TRUE);
//        echo $html;
        pdf_create($html,'Hasil Evaluasi');                                                       
    }
    function feedback_pengajar($id){
        $data['sub_title']='Evaluasi Pengajar';
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['pengajar']=$this->slng->get_all_pembicara();
        $data['materi'] = $this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pemateri'] = array();
        $data['cek'] = array();
        foreach ($data['materi'] as $m){
            $data['pemateri'][$m['id']]=$this->rnc->get_pengajar($m['id']);
        }
        $this->template->display_with_sidebar('program/feedback_pengajar','program',$data);
    }
    function feedback_result_pem($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
	$data['sub_title']='Rekap Evaluasi Pengajar';
        $data['result']=$this->slng->feedback_pembicara($id)->row_array();
        $data['saran']=$this->slng->feedback_saran_pembicara($id)->result_array();
        $data['n']=$this->slng->feedback_saran_pembicara($id)->num_rows();
//        echo '<pre>';print_r($data['result']);print_r($data['saran']);echo '</pre>';
        $this->template->display_with_sidebar('program/feedback_result_pembicara','program',$data);
    }
    function feedback_result_pengajar($id,$idm,$idp){
        $data['id']=$id;
        $data['materi'] = $this->rnc->get_materi($idm);
        $data['pengajar']=$this->slng->get_pembicara_id($idp);
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
	$data['sub_title']='Rekap Evaluasi Pengajar';
        $data['result']=$this->slng->feedback_pengajar($id,$idm,$idp)->result_array();
        $data['n_result']=$this->slng->feedback_pengajar($id,$idm,$idp)->num_rows();
        $data['saran']=$this->slng->feedback_saran_pengajar($id,$idm,$idp)->result_array();
        $data['n']=$this->slng->feedback_saran_pengajar($id,$idm,$idp)->num_rows();
        $this->template->display_with_sidebar('program/feedback_result_pengajar','program',$data);
    }
    function cetak_feedback_result_pengajar($id,$idm,$idp){
        $data['id']=$id;
        $data['materi'] = $this->rnc->get_materi($idm);
        $data['pengajar']=$this->slng->get_pembicara_id($idp);
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
	$data['sub_title']='Rekap Evaluasi Pengajar';
        $data['result']=$this->slng->feedback_pengajar($id,$idm,$idp)->result_array();
        $data['n_result']=$this->slng->feedback_pengajar($id,$idm,$idp)->num_rows();
        $data['saran']=$this->slng->feedback_saran_pengajar($id,$idm,$idp)->result_array();
        $data['n']=$this->slng->feedback_saran_pengajar($id,$idm,$idp)->num_rows();
        $this->load->helper('pdfexport_helper.php');
        $x=array();
        $y=array();
        $i=1;
        foreach($data['result'] as $r){
            $x[]=$i++;
            $y[]=number_format($r['skor'],2,'.','');
        }
        $this->load->library('jpgraph');
        $judul="Evaluasi Pengajar".$data['diklat']['name']." Angkatan ".$data['program']['angkatan'];
        $data['chart']=$this->jpgraph->barchart($x,$y,$judul,'chart2.png');
        $html=$this->load->view('program/pdf_feedback_result_pengajar',$data,TRUE);
        pdf_create($html,'Hasil Evaluasi');                                                       
        
    }

    function view_program($id) {
        $this->load->library('date');
        $data['sub_title']="Detail Program";
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
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

        $this->template->display_with_sidebar('program/view_program', 'program', $data);
    }

    function peserta_program($id,$thn=''){
        if ($this->session->userdata('id_role') >2) {
            redirect(base_url() . 'error/error_priv');
        }
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['sub_title']="Daftar Peserta";
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['list']=$this->slng->get_terima_peserta($id,$thn);
        $this->template->display_with_sidebar('program/list_peserta','program',$data);
    }
    function cetak_peserta_ang($id,$thn=''){
        if($this->session->userdata('id_role')>2){
            redirect(base_url().'error/error_priv');
        }
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->helper('pdfexport_helper.php');
        $data['tahun']=$thn;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['judul']='DAFTAR PESERTA '.strtoupper($data['diklat']['name']).'<br />
            KEMENTERIAN PERHUBUNGAN TAHUN '.$data['tahun'].'<br/>ANGKATAN '.$data['program']['angkatan'];
        $data['list']=$this->slng->get_terima_peserta($id,$thn);
        $data['htmView'] = $this->load->view('program/print_list_peserta',$data,TRUE);
//        $this->load->view('program/print_list_peserta',$data);
                      
        pdf_create($data['htmView'],'Peserta '.$data['diklat']['name'].' Angkatan '.$data['program']['angkatan']);                                                                    
    }
    
    function ajax_daftar_peserta($id,$thn=''){
        if($this->session->userdata('id_role')>2){
            redirect(base_url().'error/error_priv');
        }
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['tahun']=$thn;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['list']=$this->slng->get_terima_peserta($id,$thn);
        
        $text = '';
        $text .= 'Berikut ini adalah nama-nama peserta '.$data['diklat']['name'].' Angkatan '.$data['program']['angkatan'].'<br/>';
        $text .='<table class="table table-condensed table-bordered">';
        $i=1;
        $text .= '
                <tr>
                    <th width="5%">No</th>
                    <th width="30%">Nama</th>
                    <th width="20%">NIP</th>
                    <th width="5%">Gol</th>
                    <th width="30%">Unit Kerja</th>
                    <th width="10%">Status</th>
                </tr>
            ';
        foreach($data['list'] as $v){
            $text .='<tr>';
            $text .= '<td>'.$i++.'</td>';
            $text .= '<td>'.$v['nama'].'</td>';
            $text .= '<td>'.$v['nip'].'</td>';
            $text .= '<td>'.$v['golongan'].'</td>';
            $text .= '<td>'.$v['unit_kerja'].'</td>';
            $text .= '<td>'.$this->editor->status($v['status']).'</td>';
            $text .='</tr>';
        }
        $text .= '</table>';
        $data['id']=$id;
        $data['judul']='Daftar Panggilan '.$data['diklat']['name'].' Angkatan '.$data['program']['angkatan'];
        $data['isi']=$text;
        $this->load->view('program/preview_peserta',$data);
    }
    function publish_daftar_peserta(){
        $id=$this->input->post('id');
        $data_post['judul']=$this->input->post('judul');
        $data_post['isi']=$this->input->post('isi');
        $data_post['waktu']=date('H:i');
        $data_post['tanggal']=date('Y-m-d');
        $this->slng->insert_pengumuman($data_post);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Daftar peserta telah di-publish'));
        redirect(base_url().'program/peserta_program/'.$id);
    }
    
    function buat_program($parent,$thn='') {
        if ($this->session->userdata('id_role')>3) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['thn']=$thn;

        $this->load->library('editor');

        $data['program'] = $data['pil_diklat'] = $this->rnc->get_diklat_by_id($parent);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }

        $pil_kelas = $this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();

        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }

        $pil_gedung = $this->spr->get_gedung()->result_array();

        foreach ($pil_gedung as $g) {
            $data['asrama'][] = array('id' => $g['id'], 'nama' => 'Asrama ' . $g['nama']);
        }


        $data['sub_title'] = 'Buat Program Baru';
        $this->template->display_with_sidebar('program/form_buat_program', 'diklat', $data);
    }

    function insert_program() {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }

        $data['angkatan'] = $this->input->post('angkatan');
        $data['parent'] = $this->input->post('parent');
        $data['tipe'] = 3;
        $data['tahun_program'] = $this->input->post('tahun_program');
        $data['tanggal_mulai'] = $this->date->savetgl($this->input->post('tanggal_mulai'));
        $data['tanggal_akhir'] = $this->date->savetgl($this->input->post('tanggal_akhir'));
        $data['lama_pendidikan'] = $this->input->post('lama_pendidikan');
        $data['pelaksanaan'] = $this->input->post('pelaksanaan');
        $data['tempat'] = $this->input->post('tempat');
        $data['pelaksana'] = $this->input->post('pelaksana');
        $data['fasilitator'] = $this->input->post('fasilitator');
        $data['kelas'] = $this->input->post('kelas');

        $id = $this->rnc->insert_program($data);

        //insert penggunaan kelas

        $array_tanggal = $this->date->createDateRangeArray($data['tanggal_mulai'], $data['tanggal_akhir']);
        $batch = array();
        foreach ($array_tanggal as $t) {
            $batch[] = array('id_program' => $id, 'id_kelas' => $data['kelas'], 'tanggal' => $t);
        }
        $this->spr->insert_penggunaan_kelas_batch($batch);

        //insert alokasi asrama
        $asrama_pil = $this->input->post('asrama');
        $batch = array();
        foreach ($asrama_pil as $a) {
            $batch[] = array('id_program' => $id, 'id_asrama' => $a);
        }
        $this->spr->insert_alokasi_asrama_batch($batch);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('Program telah ditambahkan'));
        redirect(base_url() . 'program/view_program/' . $id);
    }

    function edit_program($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['pil_diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $pil_kelas = $this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();
        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }
        $pil_gedung = $this->spr->get_gedung()->result_array();

        foreach ($pil_gedung as $g) {
            $data['asrama'][] = array('id' => $g['id'], 'nama' => 'Asrama ' . $g['nama']);
        }
        $alokasi_asrama = $this->spr->get_alocated_gedung($id);
        $data['pil_asrama'] = array();
        foreach ($alokasi_asrama as $as) {
            $data['pil_asrama'][$as['id_asrama']] = true;
        }


        $data['sub_title'] = 'Revisi Program';
        $this->template->display_with_sidebar('program/form_edit_program', 'program', $data);
    }

    function update_program() {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $clause = $this->input->post('id');
        $data['angkatan'] = $this->input->post('angkatan');
        $data['parent'] = $this->input->post('parent');
        $data['tipe'] = 3;
        $data['tahun_program'] = $this->input->post('tahun_program');
        $data['tanggal_mulai'] = $this->date->savetgl($this->input->post('tanggal_mulai'));
        $data['tanggal_akhir'] = $this->date->savetgl($this->input->post('tanggal_akhir'));
        $data['lama_pendidikan'] = $this->input->post('lama_pendidikan');
        $data['pelaksanaan'] = $this->input->post('pelaksanaan');
        $data['tempat'] = $this->input->post('tempat');
        $data['pelaksana'] = $this->input->post('pelaksana');
        $data['fasilitator'] = $this->input->post('fasilitator');
        $data['kelas'] = $this->input->post('kelas');

        $this->rnc->update_program($clause, $data);

        //insert penggunaan kelas
        $this->spr->delete_penggunaan_kelas($clause);
        $array_tanggal = $this->date->createDateRangeArray($data['tanggal_mulai'], $data['tanggal_akhir']);
        $batch = array();
        foreach ($array_tanggal as $t) {
            $batch[] = array('id_program' => $clause, 'id_kelas' => $data['kelas'], 'tanggal' => $t);
        }
        $this->spr->insert_penggunaan_kelas_batch($batch);


        //insert alokasi asrama
        $batch = array();
        if(isset($_POST['asrama'])){
            $asrama_pil = $this->input->post('asrama');
            foreach ($asrama_pil as $a) {
                $batch[] = array('id_program' => $clause, 'id_asrama' => $a);
            }
        }
        $this->spr->delete_alokasi_asrama($clause);
        if(count($batch)>0){
            $this->spr->insert_alokasi_asrama_batch($batch);
        }
        $this->session->set_flashdata('msg', $this->editor->alert_ok('Data program telah diperbaharui'));
        redirect(base_url() . 'program/view_program/' . $clause);
    }

    function delete_program($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $this->rnc->delete_program($id);
        $this->session->set_flashdata('msg', $this->editor->alert_ok('Program telah dihapus'));
        redirect(base_url() . 'diklat');
    }
    function view_schedule_program($id) {
        $data['id'] = $id;
        $data['sub_title']='Jadwal Program';
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);

        $data['data_schedule'] = $this->slng->get_all_item_schedule_pdf($id);
        
        $data['id_program']=$id;
        $this->template->display_with_sidebar('program/view_schedule_program', 'program', $data);
    }

    
    function schedule_program($id) {
        if ($this->session->userdata('id_role') >2) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);

        $pil_materi = $this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pil_materi'][-1] = '-- Pilih Materi --';
        foreach ($pil_materi as $p) {
            $data['pil_materi'][$p['id_materi']] = $p['judul'];
        }

        $pil_kelas = $this->spr->get_kelas_by_size($data['diklat']['jumlah_peserta'])->result_array();

        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }

        $data['schedule'] = $this->slng->get_schedule($id);

        $json_array = array();
        if (count($data['schedule']) != 0) {
            //proses json
            $i = 0;
            foreach ($data['schedule'] as $item) {
                $i++;
                $isi['id'] = $i;
                $isi['start'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_mulai']);
                $isi['end'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_selesai']);
                if ($item['jenis'] == 'non materi')
                    $isi['title'] = $item['nama_kegiatan'];
                else
                    $isi['title'] = $data['pil_materi'][$item['id_materi']];
                $json_array[] = $isi;
            }
            $data['id_max'] = $i;
        }else {
            $data['id_max'] = 1;
        }
        $data['id'] = $id;
        $data['sub_title'] = 'Ubah Jadwal';
        $data['data_json'] = $json_array;
        $this->template->display_with_sidebar('program/schedule_program', 'program', $data);
    }

    
    function alokasi_kamar($id,$thn=''){
        if ($this->session->userdata('id_role') >2) {
            redirect(base_url() . 'error/error_priv');
        }
        //disini ngelist daftar peserta dulu, terus ada tombol alokasi kamar
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        
        $data['title']='Alokasi Kamar Peserta';
        $data['list']=$this->slng->get_status_accept_order($id,$thn);
        //get list kamar yg dialokasiin
        $alokasi_kamar=$this->slng->get_pemakaian_kamar($id);
        $list_gdung=$this->spr->get_gedung()->result_array();
        
        foreach($list_gdung as $g){
            $gdng[$g['id']]=$g['nama'];
        }
        $data['kamar']['']='-';
        
        foreach($alokasi_kamar as $k){
            $k['id_kamar_asrama']=$gdng[$k['asrama']].$k['nomor'];
            $data['kamar'][$k['id_peserta']]=$k['id_kamar_asrama'];
        }
        $this->template->display_with_sidebar('program/alokasi_kamar', 'program', $data);
    }
    
    function alokasi_kamar_process($id,$thn=''){
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $id_program=$id;
        //$this->slng->clear_pemakaian_kamar($id);
        $peserta=$this->slng->get_status_accept_order($id,$thn);
        if(count($peserta)<=0){
            redirect(base_url().'program/alokasi_kamar/'.$id_program);
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        $alokasi_asrama=$this->spr->get_alocated_gedung($id);
        $in_asrama='(';
        for($i=0;$i<count($alokasi_asrama);$i++){
            $in_asrama.=$alokasi_asrama[$i]['id_asrama'];
            if($i!=count($alokasi_asrama)-1){
                $in_asrama.=', ';
            }
        }
        //generate_range_date
        $this->load->library('date');
        $array_date=$this->date->createDateRangeArray($data['program']['tanggal_mulai'],$data['program']['tanggal_akhir']);
        
        $in_asrama.=')';
        $this->slng->clear_pemakaian_kamar($id);
        $list_kamar_available=$this->slng->get_vacant_kamar_in_date($in_asrama,$data['program']['tanggal_mulai'],$data['program']['tanggal_akhir']);
        
        $batch_ins=array();
        
        $cur_kamar=0;
        $cur_kamar_stok=$list_kamar_available[$cur_kamar]['bed'];
        $prev_jenis_kelamin='';
        while(count($peserta)>0){
            $p = array_pop($peserta);
            $id_peserta=$p['id_peserta'];
            if($cur_kamar_stok>0&&$prev_jenis_kelamin==$p['jenis_kelamin']){
                $id_kamar=$list_kamar_available[$cur_kamar]['id'];
                $prev_jenis_kelamin=$p['jenis_kelamin'];
                $cur_kamar_stok--;
            }else{
                $cur_kamar++;
                $cur_kamar_stok=$list_kamar_available[$cur_kamar]['bed'];
                $prev_jenis_kelamin='';
                $id_kamar=$list_kamar_available[$cur_kamar]['id'];
                $prev_jenis_kelamin=$p['jenis_kelamin'];
                $cur_kamar_stok--;
            }
            foreach($array_date as $a){
                $batch_ins[]=array(
                    'id_kamar_asrama'=>$id_kamar,
                    'id_program'=>$id_program,
                    'id_peserta'=>$id_peserta,
                    'tanggal'=>$a
                );
            }
        }
        $this->slng->insert_alokasi_kamar($batch_ins);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kamar telah dialokasikan'));
        redirect(base_url().'program/alokasi_kamar/'.$id_program);
    }
    
    function print_schedule($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $this->load->library('date');
        $this->load->library('excel');

        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }

        $data_schedule = $this->slng->get_all_item_schedule($id);
        
        if (!$data['program']) {
            $this->session->set_flashdata('msg', $this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url() . 'penyelenggaraan/schedule/daftar_diklat');
        }

        //set date range
        
        $waktu = strtotime($data['program']['tanggal_mulai']);
        if (date('w', $waktu) > 0) {
            $waktu = strtotime("-" . date('w', $waktu) . " day", $waktu);
        }

        
        $tgl_end = strtotime($data['program']['tanggal_akhir']);
        if (date('w', $tgl_end) < 6) {
            $selisih = 6 - date('w', $tgl_end);
            $tgl_end = strtotime("+" . $selisih . " day", $tgl_end);
        }

        $array_tanggal = array();
        $array_idx_tanggal=array();
        $idx = 0;
        while ($waktu <= $tgl_end) {
            $array_tanggal[$idx]['tanggal'] = date('d', $waktu) . ' ' . $this->date->get_month_name(date('m', $waktu)) . ' ' . date('Y', $waktu);
            $array_tanggal[$idx]['hari'] = $this->date->get_day_name(date('N', $waktu));
            $array_idx_tanggal[$array_tanggal[$idx]['tanggal']]=$idx;
            $waktu = strtotime("+1 day", $waktu);
            $idx++;
        }
        
        //set jam
        $array_jam = array();
        $jam = strtotime('05:00');
        $batas_jam = strtotime('21.45');
        while ($jam <= $batas_jam) {
            $nxt = strtotime('+15 minute', $jam);
            $array_jam[] = date('H.i', $jam) . '-' . date('H.i', $nxt);
            $jam = $nxt;
        }

        $num_week = ceil(count($array_tanggal) / 7);


        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Jadwal Pelatihan');
        $this->excel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(9);
        $sheet = $this->excel->getActiveSheet();
        $sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4)->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        

        //bikin header jadwal

        $col = 0;

        $row = 2;
        $judul = strtoupper('Jadwal Tentative ' . $data['program']['name']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();


        $row = 3;
        $judul = strtoupper('Kementrian Perhubungan ' . $data['program']['tahun_program']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();

        $row = 5;
        $judul = $this->date->konversi5($data['program']['tanggal_mulai']) . ' S/D ' . $this->date->konversi5($data['program']['tanggal_akhir']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();


        //print per week
        $row = 8;
        for ($week = 0; $week < $num_week; $week++) {
            $idx_perweek = 7 * $week + 1;
            $idx_maxweek = 7 * $week + 7;

            $col = 1;
            $arr_col_tgl=array();
            for ($idx_perweek; $idx_perweek <= $idx_maxweek; $idx_perweek++) {
                $sheet->setCellValueByColumnAndRow($col, $row, $array_tanggal[$idx_perweek - 1]['tanggal']);
                $sheet->setCellValueByColumnAndRow($col, $row + 1, $array_tanggal[$idx_perweek - 1]['hari']);
                $sheet->getColumnDimensionByColumn($col)->setWidth(23);
                $arr_col_tgl[$array_tanggal[$idx_perweek - 1]['tanggal']]=$col;
                $col++;
            }
            
            $row+=2;
            $col_jam = 0;
            $arr_row_jam=array();
            $sheet->getColumnDimensionByColumn($col_jam)->setAutoSize(true);
            foreach ($array_jam as $j) {
                $sheet->setCellValueByColumnAndRow(0, $row, $j);
                $arr_row_jam[$j]=$row;
                $row++;
            }
            
            foreach($data_schedule as $ds){
                if(array_key_exists($ds['tanggal'], $arr_col_tgl)&&array_key_exists($ds['jam_mulai'], $arr_row_jam)&&array_key_exists($ds['jam_selesai'], $arr_row_jam)){
                    $kol_print=$arr_col_tgl[$ds['tanggal']];
                    $row_mulai = $arr_row_jam[$ds['jam_mulai']];
                    $row_selesai = $arr_row_jam[$ds['jam_selesai']];
                    $sheet->mergeCellsByColumnAndRow($kol_print, $row_mulai, $kol_print, $row_selesai);
                    $isi = $ds['judul_kegiatan']."\n";
                    if($ds['jenis']=='materi'){
                        $isi.='Pengajar : '."\n";
                        if($ds['ada_pembicara']){
                            $no=1;
                            foreach($ds['list_pembicara'] as $p){
                                if($p['nama_peg']!=''){
                                    $isi.=$no++.'. '.$p['nama_peg']."\n";
                                }else{
                                    $isi.=$no++.'. '.$p['nama_dostam']."\n";
                                }
                            }
                        }
                        $isi.='Pendamping : '."\n";
                        if($ds['ada_pendamping']){
                            $no=1;
                            foreach($ds['list_pendamping'] as $p){
                                $isi.=$no++.'. '.$p['nama']."\n";
                            }
                        }
                    }
                    $sheet->setCellValueByColumnAndRow($kol_print, $row_mulai, $isi);
                }
            }
            $row+=2;
        }
        
        
        
        $filename = 'schedule diklat.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
        
    }

    function print_schedule_pdf($id){
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $this->load->library('date');

        $program = $this->rnc->get_program_by_id($id);
        if(!$program){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $diklat = $this->rnc->get_diklat_by_id($program['parent']);

        $data['data_schedule'] = $this->slng->get_all_item_schedule_pdf($id);
        $data['pemateri'] = $this->slng->get_pemateri_program($id);
        $data['judul'] = 'Jadwal '.$diklat['name'].'<br />Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'];
//        $this->load->view('program/pdf_schedule',$data);
        $html=$this->load->view('program/pdf_schedule',$data,true);
        $this->load->helper('pdfexport');
        pdf_landscape($html, 'Jadwal '.$diklat['name'].' '.$program['tahun_program'].' Ang '.$program['angkatan']);
    }
    
    function ajax_pembicara($id_materi) {
        echo json_encode($this->slng->ajax_pembicara_by_materi($id_materi));
    }

    function ajax_save() {
        $this->load->library('date');
        $data_ins['id_program'] = $this->input->post('id_program');
        $data_ins['jam_mulai'] = $this->input->post('jam_mulai');
        $data_ins['jam_selesai'] = $this->input->post('jam_selesai');
        $data_ins['tanggal'] = $this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis'] = $this->input->post('jenis');
        $data_ins['jenis_tempat'] = $this->input->post('jenis_tempat');
        $data_ins['id_ruangan'] = $this->input->post('id_ruangan');
        $data_ins['lokasi'] = $this->input->post('lokasi');
        if ($data_ins['jenis'] == 'non materi') {
            $data_ins['nama_kegiatan'] = $this->input->post('materi');
        } else if ($data_ins['jenis'] == 'materi') {
            $data_ins['id_materi'] = $this->input->post('materi');
        }
        $data_materi['arr_pembicara'] = array();
        $data_materi['arr_pendamping'] = array();
        if ($data_ins['jenis'] == 'materi') {
            $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
            $data_materi['arr_pendamping'] = $this->input->post('pendamping');
        }
        echo $this->slng->insert_schedule($data_ins, $data_materi);
    }

    function ajax_update_waktu() {
        $data_new['jam_mulai'] = $this->input->post('new_start');
        $data_new['jam_selesai'] = $this->input->post('new_end');
        $data_new['tanggal'] = $this->input->post('new_date');

        $data_where['jam_mulai'] = $this->input->post('old_start');
        $data_where['jam_selesai'] = $this->input->post('old_end');
        $data_where['tanggal'] = $this->input->post('old_date');
        $this->slng->update_waktu($data_new, $data_where);
    }

    function ajax_get_data_schedule() {
        $where['jam_mulai'] = $this->input->post('where_start');
        $where['jam_selesai'] = $this->input->post('where_end');
        $where['tanggal'] = $this->input->post('where_date');
        $where['id_program'] = $this->input->post('id_program');
        $retval = $this->slng->get_item_schedule($where);
        echo json_encode($retval);
    }

    function ajax_get_form_pemateri_pembimbing($id) {
        //query nama, id, dan jenis pembicara & pendamping
        $data['qry_pemateri'] = $this->slng->get_pemateri($id);
        $data['qry_pendamping'] = $this->slng->get_pendamping($id);
        echo $this->load->view('program/ajax_pemateri', $data, TRUE);
    }

    function ajax_delete_schedule($id) {
        $this->slng->del_schedule($id);
        echo 'Delete success';
    }

    function ajax_edit_all() {
        $this->load->library('date');

        $data_where['id'] = $this->input->post('idschedule');

        $data_ins['id_program'] = $this->input->post('id_program');
        $data_ins['jam_mulai'] = $this->input->post('jam_mulai');
        $data_ins['jam_selesai'] = $this->input->post('jam_selesai');
        $data_ins['tanggal'] = $this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis'] = $this->input->post('jenis');
        $data_ins['jenis_tempat'] = $this->input->post('jenis_tempat');
        $data_ins['id_ruangan'] = $this->input->post('id_ruangan');
        $data_ins['lokasi'] = $this->input->post('lokasi');
        if ($data_ins['jenis'] == 'non materi') {
            $data_ins['nama_kegiatan'] = $this->input->post('materi');
        } else if ($data_ins['jenis'] == 'materi') {
            $data_ins['id_materi'] = $this->input->post('materi');
        }
        $data_materi['arr_pembicara'] = array();
        $data_materi['arr_pendamping'] = array();
        if ($data_ins['jenis'] == 'materi') {
            $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
            $data_materi['arr_pendamping'] = $this->input->post('pendamping');
        }

        $this->slng->update_schedule($data_ins, $data_materi, $data_where);
        echo json_encode($data_ins);
    }

    function ajax_cek_kelas(){
        $this->load->library('date');
        $data['id_kelas']=$this->input->post('id_ruangan');
        $data['mulai']=$this->date->savetgl($this->input->post('mulai'));
        $data['akhir']=$this->date->savetgl($this->input->post('akhir'));
        $res = $this->spr->cek_kelas($data);
        if($res>0){
            echo 'false';
        }else{
            echo 'true';
        }
    }
    
    function ajax_cek_vacant_kamar(){
        $id_asrama=$this->input->post('id_asrama');
        $id_diklat=$this->input->post('id_diklat');
        $tgl_awal=$this->input->post('tgl_awal');
        $tgl_akhir=$this->input->post('tgl_akhir');
        
        //get info Diklat
        $data=$this->rnc->get_diklat_by_id($id_diklat);
        
        $vacant_kamar=$this->slng->get_vacant_kamar_in_date('('.$id_asrama.')',$tgl_awal,$tgl_akhir);
        $jumlah_kamar_kosong=count($vacant_kamar);
        
        $jumlah_kamar_butuh=ceil($data['jumlah_peserta']/2)+1;
        
        $retval='Jumlah kamar yang dibutuhkan '.$jumlah_kamar_butuh.' dan kamar kosong yang ada '.$jumlah_kamar_kosong.', ';
        if($jumlah_kamar_butuh>$jumlah_kamar_kosong){
            $retval.='dibutuhkan tambahan asrama';
        }else{
            $retval.='asrama mencukupi';
        }
        echo $retval;
    }
    
    function ajax_get_pendamping($like=''){
        $res=$this->slng->get_pegawai(20,0,$like);
        $json=array();
        foreach($res as $r){
            $json[]=$r['nama'];
        }
        echo json_encode($json);
    }
    
    function ajax_cek_pemateri_avail(){
        $data['id_pembicara'] = $this->input->post('id_pembicara');
        $data['jam_mulai'] = $this->input->post('jam_mulai');
        $data['jam_selesai'] = $this->input->post('jam_selesai');
        $data['tanggal']=$this->date->konversi3($this->input->post('tanggal'));
        echo $this->slng->cek_jadwal_pemateri($data);
    }
}
