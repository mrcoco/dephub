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
        $data['feedback'] = $this->rnc->get_feedback_sarpras_program($id);
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
        $data['program']=$this->rnc->get_diklat_by_id($id);
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
        $this->load->library('editor');
	$data['sub_title']='Edit Data Diklat';
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
        $data['sub_title']='Registrasi Diklat '.$data['program']['name'];
        $this->template->display_with_sidebar('diklat/registrasi','diklat',$data);
        
    }
    
    function registrasi_proses(){
        $id_diklat=$this->input->post('id_diklat');
        $id=$this->input->post('id');
        
        $reg_batch=array();
        for($i=0;$i<count($id);$i++){
            $reg['id_peserta']=$id[$i];
            $reg['id_diklat']=$id_diklat;
            $reg['status']='daftar';
            $reg_batch[]=$reg;
        }
        $this->slng->insert_registrasi_batch($reg_batch);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Peserta telah ditambahkan'));
        redirect(base_url().'diklat/alokasi_peserta/'.$id_diklat);
    }
    
    function alokasi_peserta($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['program']=$this->rnc->get_diklat_by_id($id);
        $data['sub_title']='List Pendaftar Diklat '.$data['program']['name'];
        $data['list']=$this->slng->getall_peserta($id);
        $this->template->display_with_sidebar('diklat/list_peserta','diklat',$data);
    }
    
    function ajax_toggle_status($status){
        if($status==1){
            $data['status']='accept';
        }if($status==2){
            $data['status']='waiting';
        }else if($status==0){
            $data['status']='daftar';
        }
        $clause['id_peserta']=$this->input->post('id_peserta');
        $clause['id_program']=$this->input->post('id_program');
        $this->slng->toggle_status($clause,$data);
    }
    
    function delete_diklat($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
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
        
        $this->lib_perencanaan->cetak_excel($row,$col,$sheet,$arr_program);
        
        $filename = 'jadwal pelatihan.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
        
    }
}