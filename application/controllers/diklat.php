<?php
class Diklat extends CI_Controller{
    
    protected $thn_default;
    
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->thn_default=date('Y');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_penyelenggaraan','slng');
    }
    function index(){
        $this->daftar_diklat();
    }
        
    function daftar_diklat($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['thn']=$thn;
        $this->load->library('lib_perencanaan');
        $data['sub_title']='Daftar Diklat dan Program Tahun '.$thn;
        $data['program']=$this->rnc->get_all_program($thn);
        
        $data['kategori']=$this->rnc->get_kategori();
        $data['pil_kategori']=array(0=>'-');
        foreach($data['kategori'] as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        
        $this->template->display('diklat/daftar_diklat',$data);
    }
    
    function view_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
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
        $this->template->display_with_sidebar('diklat/detail_diklat','diklat',$data);
    }
    
    function view_list_program($id,$thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
	$data['sub_title']='Daftar Program Diklat Dibuka';
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $list_program=$this->rnc->get_program_by_parent($id,$thn);
        foreach($list_program as $p){
            $data['list_program'][$p['id']]=$data['program']['name'].' Angkatan '.$p['angkatan'].' '.$p['tahun_program'];
        }
        $this->template->display_with_sidebar('diklat/view_list_program','diklat',$data);
    }
    
    function buat_diklat($pil_kat){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $this->load->library('editor');
	
        $kat=$this->rnc->get_kategori_id($pil_kat);
        if(!$kat){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Kategori tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }

        $kategori=$this->rnc->get_kategori();
        $data['pil_kat']=$pil_kat;
        
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        
        $pil_materi=$this->rnc->get_all_materi();
        $data['materi']=array();

        foreach($pil_materi as $p){
            $data['materi'][]=$p['judul'];
        }
        
        $data['sub_title']='Buat Diklat Baru di Kategori '.$data['pil_kategori'][$pil_kat];
        $this->template->display('diklat/form_buat_diklat',$data);
    }
    
    function insert_diklat(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $data['name']=$this->input->post('name');
        $data['parent']=$this->input->post('kategori');
        $data['tipe']=2;
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tujuan']=$this->input->post('tujuan');
        $data['indikator']=$this->input->post('indikator');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tahun_program']='0000';
        $data['jumlah_peserta']=$this->input->post('jumlah_peserta');
        $data['syarat_usia']=$this->input->post('syarat_usia');
        $data['syarat_masa_kerja']=$this->input->post('syarat_masa_kerja');
        $data['syarat_pendidikan']=$this->input->post('syarat_pendidikan');
        $data['syarat_pangkat_gol']=$this->input->post('syarat_pangkat_gol');
        
        $id=$this->rnc->insert_diklat($data);
        $materi = $this->input->post('materi');
        $pil_materi=$this->rnc->get_all_materi();
        $list = array();
        foreach($pil_materi as $p){
            $list[$p['judul']]=$p['id'];
        }
        $batch=array();
        foreach($materi as $m){
            if(array_key_exists($m, $list)){
                $batch[]=array('id_diklat'=>$id,'id_materi'=>$list[$m]);
            }
        }
        $this->rnc->insert_materi_diklat($batch);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Diklat telah ditambahkan'));
        redirect(base_url().'diklat/view_diklat/'.$id);
    }
    
    function edit_diklat($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $this->load->library('editor');
	$data['sub_title']='Ubah Detail Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $pil_materi=$this->rnc->get_all_materi();
        $data['listmateri']=array();

        foreach($pil_materi as $p){
            $data['listmateri'][]=$p['judul'];
        }
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $data['materi']=$this->rnc->get_materi_diklat($id);
        $this->template->display_with_sidebar('diklat/form_edit_diklat','diklat',$data);
    }
    
    function update_diklat(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $clause=$this->input->post('id');
        
        $data['name']=$this->input->post('name');
        $data['parent']=$this->input->post('kategori');
        $data['tipe']=2;
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tujuan']=$this->input->post('tujuan');
        $data['indikator']=$this->input->post('indikator');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tahun_program']='0000';
        $data['jumlah_peserta']=$this->input->post('jumlah_peserta');
        $data['syarat_usia']=$this->input->post('syarat_usia');
        $data['syarat_masa_kerja']=$this->input->post('syarat_masa_kerja');
        $data['syarat_pendidikan']=$this->input->post('syarat_pendidikan');
        $data['syarat_pangkat_gol']=$this->input->post('syarat_pangkat_gol');
        
        $this->rnc->update_diklat($clause,$data);
        $this->rnc->delete_materi_diklat($clause);
        $materi = $this->input->post('materi');
        $pil_materi=$this->rnc->get_all_materi();
        $list = array();
        foreach($pil_materi as $p){
            $list[$p['judul']]=$p['id'];
        }
        $batch=array();
        foreach($materi as $m){
            if(array_key_exists($m, $list)){
                $batch[]=array('id_diklat'=>$clause,'id_materi'=>$list[$m]);
            }
        }
        $this->rnc->insert_materi_diklat($batch);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Diklat telah diubah'));
	redirect(base_url().'diklat/view_diklat/'.$clause);
    }
    
    function registrasi($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['id_diklat']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['arr_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pangkat']=$this->rnc->get_pangkat_gol();
        $data['sub_title']='Registrasi '.$data['program']['name'];
        $this->template->display_with_sidebar('diklat/registrasi','diklat',$data);
        
    }
    
    function registrasi_proses(){
        $id_diklat=$this->input->post('id_diklat');
        $id=$this->input->post('id');
        $tahun=$this->input->post('tahun');
        $reg_batch=array();
        for($i=0;$i<count($id);$i++){
            $reg['id_peserta']=$id[$i];
            $reg['id_diklat']=$id_diklat;
            $reg['status']='daftar';
            $reg['tahun_daftar']=$tahun;
            $reg_batch[]=$reg;
        }
        $this->slng->insert_registrasi_batch($reg_batch);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Peserta telah ditambahkan'));
        redirect(base_url().'diklat/terima_peserta/'.$id_diklat);
    }
    
    function terima_peserta($id,$thn=''){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['tahun']=$thn;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['sub_title']='Pendaftar '.$data['program']['name'];
        $data['list']=$this->slng->getall_peserta($id,$thn);
        
        
        $pil_angkatan=$this->rnc->get_program_by_parent($id,$this->thn_default);
        $data['pil_angkatan'][-1]='---';
        foreach($pil_angkatan as $p){
            $data['pil_angkatan'][$p['id']]='Angkt. '.$p['angkatan'];
        }
        $this->template->display_with_sidebar('diklat/list_peserta','diklat',$data);
    }
    
    function cetak_daftar_peserta($id,$thn=''){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->helper('pdfexport_helper.php');
        $data['tahun']=$thn;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['judul']='DAFTAR CALON PESERTA '.strtoupper($data['program']['name']).'<br />
            KEMENTERIAN PERHUBUNGAN TAHUN '.$data['tahun'].'<br/>';
        $data['list']=$this->slng->getall_peserta($id,$thn);
        $data['htmView'] = $this->load->view('diklat/print_list_peserta',$data,TRUE);
//        $this->load->view('diklat/print_list_peserta',$data);
                      
        pdf_create($data['htmView'],'Pendaftar '.$data['program']['name']);                                                                    
    }
    
    function publish_daftar_peserta($id,$thn=''){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        if($thn==''){
            $thn=$this->thn_default;
        }
        $pil_angkatan=$this->rnc->get_program_by_parent($id,$this->thn_default);
        foreach($pil_angkatan as $p){
            $data['pil_angkatan'][$p['id']]='Angkatan '.$p['angkatan'];
        }
        $data['tahun']=$thn;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        $data['list']=$this->slng->getall_peserta_by_angkatan($id,$thn);
        
        $text = '';
        $text .= 'Berikut ini adalah nama-nama peserta diklat dari masing-masing angkatan : <br/>';
        foreach($data['list'] as $key => $val){
            if($key>0){
            $text .= $data['pil_angkatan'][$key].'<br/>';
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
            foreach($val as $v){
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
            }
        }
        $data_post['judul']='DAFTAR PANGGILAN '.$data['program']['name'];
        $data_post['isi']=$text;
        $data_post['waktu']=date('H:i');
        $data_post['tanggal']=date('Y-m-d');
        $this->slng->insert_pengumuman($data_post);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Daftar peserta telah di-publish'));
        redirect(base_url().'diklat/terima_peserta/'.$id);
    }
    
    function alokasi_kamar_program($id,$thn=''){
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        //ngelist program yg ada di diklat ini
        if($thn==''){
            $thn=$this->thn_default;
        }
	$data['sub_title']='Pilih Program Untuk Alokasi Kamar';
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $list_program=$this->rnc->get_program_by_parent($id,$thn);
        foreach($list_program as $p){
            $data['list_program'][$p['id']]=$data['program']['name'].' Angkatan '.$p['angkatan'].' '.$p['tahun_program'];
        }
        $this->template->display_with_sidebar('diklat/alokasi_kamar_program','diklat',$data);
    }
    
    function ajax_cek_daftar($id_diklat,$nip_pegawai,$thn){
//        echo current_url().'<br/>';
//        echo $nip_pegawai;
        if($this->slng->get_one_peserta($id_diklat,$nip_pegawai,$thn)==0){
            echo 'true';
        }else{
            echo 'false';
        }
    }
    
    function ajax_toggle_status($status){
        if($status==1){
            $data['status']='accept';
        }if($status==2){
            $data['status']='waiting';
        }else if($status==0){
            $data['status']='daftar';
            $data['id_program']='';
        }
        $clause['id_peserta']=$this->input->post('id_peserta');
        $clause['id_diklat']=$this->input->post('id_diklat');
        $this->slng->toggle_status($clause,$data);
    }
    
    function ajax_update_angkatan(){
        
        $max_peserta = $this->input->post('max_peserta');
        $data['id_program']=$this->input->post('id_program');
        $clause['id_peserta']=$this->input->post('id_peserta');
        $clause['id_diklat']=$this->input->post('id_diklat');
        //get status peserta
        $status=$this->slng->get_status($clause);
        //pengecekan jumlah pendaftar di angkatan yg dipilih
        if($status=='accept'){
            $num_pendaftar = $this->slng->hitung_peserta($data['id_program']);
            if($num_pendaftar<$max_peserta){
                $this->slng->toggle_status($clause,$data);
                echo true;
            }else{
                echo false;
            }
        }else if($status=='waiting'){
            $this->slng->toggle_status($clause,$data);
            echo true;
        }
    }
    
    function delete_diklat($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $this->rnc->delete_diklat($id);
        $this->session->set_flashdata('msg',$this->editor->alert_warning('Diklat telah dihapus'));
        redirect(base_url().'diklat');
    }
    
    function insert_kategori(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['parent']=$this->input->post('parent');
        $data['name']=$this->input->post('nama');
        $data['tahun_program']='0000';
        $data['tipe']='1';
        $this->rnc->insert_kategori($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah ditambahkan'));
        redirect(base_url().'diklat');
    }
    
    function update_kategori(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['parent']=$this->input->post('parent');
        $data['name']=$this->input->post('nama');
        $where=$this->input->post('id');
        $this->rnc->update_diklat($where,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah diubah'));
        redirect(base_url().'diklat');
    }
    
    function delete_kategori($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $kat=$this->rnc->get_kategori_id($id);
        if(!$kat){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Kategori tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $this->rnc->delete_kategori($id);
        $this->session->set_flashdata('msg',$this->editor->alert_warning('Diklat telah dihapus'));
        redirect(base_url().'diklat');
    }
    
    function cetak_jadwal($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        
        $this->load->library('date');
        $this->load->library('excel');
        $this->load->library('lib_perencanaan');
        $this->load->model('mdl_sarpras','spr');
        
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Jadwal '.$thn);
        $this->excel->getDefaultStyle()->getFont()->setName('Times New Roman');
        $sheet = $this->excel->getActiveSheet();
        $sheet->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        
        //bikin judul file
        $col=0;
        $row=1;
        $judul = 'RENCANA JADWAL PELAKSANAAN PENDIDIKAN DAN PELATIHAN '.$thn;
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        
        $row=2;
        $judul = 'PUSAT PENGEMBANGAN SDM APARATUR PERHUBUNGAN';
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        
        $row=3;
        $judul = 'Jl. Raya Parung Bogor KM. 26 Kemang - Bogor';
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        
        //buat header tabel
        $row=6;
        $sheet->getColumnDimensionByColumn($col)->setWidth(5);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 1, $row+1);
        
        $judul='NAMA DIKLAT';
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->getColumnDimensionByColumn($col+1)->setAutoSize(true);
        
        $sheet->mergeCellsByColumnAndRow($col+2, $row, $col + 2, $row+1);
        $judul='JUMLAH HARI';
        $sheet->setCellValueByColumnAndRow($col+2, $row, $judul);
        $sheet->getColumnDimensionByColumn($col+2)->setAutoSize(true);
        
        $sheet->mergeCellsByColumnAndRow($col+3, $row, $col + 3, $row+1);
        $judul='JUMLAH PESERTA';
        $sheet->setCellValueByColumnAndRow($col+3, $row, $judul);
        $sheet->getColumnDimensionByColumn($col+3)->setAutoSize(true);
        
        $sheet->mergeCellsByColumnAndRow($col+4, $row, $col + 4, $row+1);
        $judul='TGL MULAI';
        $sheet->setCellValueByColumnAndRow($col+4, $row, $judul);
        $sheet->getColumnDimensionByColumn($col+4)->setAutoSize(true);
        
        $sheet->mergeCellsByColumnAndRow($col+5, $row, $col + 5, $row+1);
        $judul='TGL SELESAI';
        $sheet->setCellValueByColumnAndRow($col+5, $row, $judul);
        $sheet->getColumnDimensionByColumn($col+5)->setAutoSize(true);
        
        $arr_minggu=array();
        
        //print kalender ke samping
        $col=6;
        for($i=1;$i<=12;$i++){
            $num_days = cal_days_in_month(CAL_GREGORIAN, $i, $thn);
            $col_akhir = $col + $num_days;
            $sheet->mergeCellsByColumnAndRow($col, $row, ($col_akhir-1), $row);
            $sheet->getStyleByColumnAndRow($col, $row)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $sheet->getStyleByColumnAndRow($col, $row)
                    ->getFont()->setBold(true);
            $judul=$this->date->get_month_name($i);
            $sheet->setCellValueByColumnAndRow($col, $row, $judul);
            $m=1;
            for($j=$col;$j<$col_akhir;$j++){
                
                $str_tgl = $m.'-'.$i.'-'.$thn;
                $obj_date = date_create_from_format('d-n-Y',$str_tgl);
                
                $nama_hari = date_format($obj_date, 'D');
                
                $sheet->getColumnDimensionByColumn($j)->setWidth(2);
                $sheet->setCellValueByColumnAndRow($j, $row+1,$m);
                $sheet->getStyleByColumnAndRow($j, $row+1)->getFont()->setSize(5)->setName('Arial');
                
                if($nama_hari=='Sun'){
                    $arr_minggu[]=$j;
                    $style_minggu = array( 
                        'fill' => array( 
                            'type' => PHPExcel_Style_Fill::FILL_SOLID, 
                            'color' => array('rgb'=>'FF0000')
                            )
                        );
                    $sheet->getStyleByColumnAndRow($j, $row+1)->applyFromArray($style_minggu);
                }
                
                $m++;
            }
            $col = $col_akhir;
        }
        
        //mencetak data per diklat
        $absolute=true;
        $row=8;
        $col=0;
        $arr_tree=array();
        $arr_program=$this->rnc->get_all_program($thn);
        
        $row=$this->lib_perencanaan->cetak_excel($row,$col,$sheet,$arr_program);
        
        $row_keterangan=$row+1;
        $col=1;
        
        //mencetak header keterangan  samping kiri
        
        //mencetak header total jumlah peserta
        $sheet->mergeCellsByColumnAndRow($col, $row_keterangan, $col+2, $row_keterangan);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan)
                ->getFont()->setBold(true);
        $sheet->setCellValueByColumnAndRow($col, $row_keterangan, 'Jumlah Total Peserta');
        
        //Mencetak header kapasitas kamar
        $sheet->mergeCellsByColumnAndRow($col, $row_keterangan+1, $col+1, $row_keterangan+1);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+1)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+1)
                ->getFont()->setBold(true);
        $sheet->setCellValueByColumnAndRow($col, $row_keterangan+1, 'Total Kapasitas Kamar');
        $num_kamar=$this->spr->count_bed();
        $sheet->setCellValueByColumnAndRow($col+2, $row_keterangan+1, $num_kamar);
        //Mencetak header sisa kamar
        $sheet->mergeCellsByColumnAndRow($col, $row_keterangan+2, $col+2, $row_keterangan+2);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+2)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+2)
                ->getFont()->setBold(true);
        $sheet->setCellValueByColumnAndRow($col, $row_keterangan+2, 'Sisa Kamar');
        
        //Mencetak header kebutuhan kelas
        $sheet->mergeCellsByColumnAndRow($col, $row_keterangan+3, $col+2, $row_keterangan+3);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+3)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+3)
                ->getFont()->setBold(true);
        $sheet->setCellValueByColumnAndRow($col, $row_keterangan+3, 'Jumlah Kebutuhan Kelas');
        
        //Mencetak header kapasitas kelas
        $sheet->mergeCellsByColumnAndRow($col, $row_keterangan+4, $col+1, $row_keterangan+4);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+4)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+4)
                ->getFont()->setBold(true);
        $sheet->setCellValueByColumnAndRow($col, $row_keterangan+4, 'Kapasitas Kelas');
        $num_kelas=$this->spr->count_all_kelas();
        $sheet->setCellValueByColumnAndRow($col+2, $row_keterangan+4, $num_kelas);
        
        //Mencetak header sisa kelas
        $sheet->mergeCellsByColumnAndRow($col, $row_keterangan+5, $col+2, $row_keterangan+5);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+5)
                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $sheet->getStyleByColumnAndRow($col, $row_keterangan+5)
                ->getFont()->setBold(true);
        $sheet->setCellValueByColumnAndRow($col, $row_keterangan+5, 'Jumlah Sisa Kelas');
        
        //Mecetak keterangan ke samping
        
        //Menyiapkan data-data
        $thn=date('Y');
        $tgl_1 =  date_create_from_format('Y-m-d',$thn.'-01-01');
        $tgl_31 = date_create_from_format('Y-m-d',$thn.'-12-31');
        
        
        $idx_tgl_1=date_format($tgl_1,'z');
        $idx_tgl_31=date_format($tgl_31,'z');
        
        $col_awal=$idx_tgl_1+6;
        $col_akhir=$idx_tgl_31+6;
        
        $arr_program=$this->rnc->get_all_program($this->thn_default);
//        foreach($arr_program as $a){
//            
//        }
//        die();
//        
//        for($col_now=$col_awal;$col_now<=$col_akhir;$col_now++){
//            
//        }
        
        
        //cetak ke file
        $filename = 'jadwal pelatihan.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
        
    }
}