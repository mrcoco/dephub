<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perencanaan
 *
 * @author irhamnurhalim
 */
class Diklat extends Perencanaan_Controller{
    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index(){
	$this->daftar_diklat();

    }

    function daftar_kategori(){
        $this->load->library('lib_perencanaan');
	$data['sub_title']='Daftar Kategori Diklat';
        $data['kategori']=$this->rnc->get_kategori();
        $data['pil_kategori']=array(0=>'-');
        foreach($data['kategori'] as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display_dik('simdik/perencanaan/daftar_kategori',$data,TRUE);
    }
    
    function buat_kategori(){
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array(0=>'-');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display_dik('simdik/perencanaan/form_buat_kategori',$data,TRUE);
    }
    
    function edit_kategori($id){
        $data['edit_kategori']=$this->rnc->get_kategori_id($id);
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array(0=>'-');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display_dik('simdik/perencanaan/form_edit_kategori',$data,TRUE);
    }
    
    function insert_kategori(){
        $data['parent']=$this->input->post('parent');
        $data['name']=$this->input->post('nama');
        $data['tahun_program']='0000';
        $this->rnc->insert_kategori($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Kategori telah ditambahkan'));
        redirect(base_url().'perencanaan/diklat/daftar_kategori');
    }
    
    function daftar_diklat($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $data['thn']=$thn;
        $this->load->library('lib_perencanaan');
	$data['sub_title']='Daftar Diklat Tahun '.$thn;
        $data['program']=$this->rnc->get_all_program($thn);
	$this->template->display_dik('simdik/perencanaan/daftar_diklat',$data,TRUE);
    }

    function detail_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['feedback'] = $this->rnc->get_feedback_sarpras_program($id);
	$data['sub_title']='Detail Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        $this->load->library('lib_perencanaan');
        $this->load->library('date');
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        if($data['program']){
            $this->template->display_dik('simdik/perencanaan/detail_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'administrator/dashboard');                    
        }
    }

    function buat_diklat($pil_kat=-1){
        $this->load->library('editor');
	$data['sub_title']='Buat Diklat Baru';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        $data['pil_kat']=$pil_kat;
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display('simdik/perencanaan/form_buat_diklat',$data);
    }

    function insert_diklat(){
        $data['name']=$this->input->post('name');
        $data['parent']=$this->input->post('kategori');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tujuan']=$this->input->post('tujuan');
        $data['indikator']=$this->input->post('indikator');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['materi']=$this->input->post('materi');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        $data['jumlah_peserta']=$this->input->post('jumlah_peserta');
        $data['tempat']=$this->input->post('tempat');
        $data['tahun_program']=$this->input->post('tahun_program');
        $data['syarat_usia']=$this->input->post('syarat_usia');
        $data['syarat_masa_kerja']=$this->input->post('syarat_masa_kerja');
        $data['syarat_pendidikan']=$this->input->post('syarat_pendidikan');
        $data['syarat_pangkat_gol']=$this->input->post('syarat_pangkat_gol');
        
        $this->rnc->insert_diklat($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Diklat telah ditambahkan'));
	redirect(base_url().'administrator/dashboard');
    }

    function edit_diklat($id){
        $data['id']=$id;
        $data['program']=$this->rnc->get_program_by_id($id);
        $this->load->library('editor');
	$data['sub_title']='Ubah Diklat';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        if($data['program']){
            $this->template->display_dik('simdik/perencanaan/form_edit_diklat',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'administrator/dashboard');                    
        }
    }

    function update_diklat(){
        $clause=$this->input->post('id');

        $data['name']=$this->input->post('name');
        $data['parent']=$this->input->post('kategori');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['tujuan']=$this->input->post('tujuan');
        $data['indikator']=$this->input->post('indikator');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['deskripsi']=$this->input->post('deskripsi');
        $data['materi']=$this->input->post('materi');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        $data['jumlah_peserta']=$this->input->post('jumlah_peserta');
        $data['tempat']=$this->input->post('tempat');
        $data['tahun_program']=$this->input->post('tahun_program');
        $data['syarat_usia']=$this->input->post('syarat_usia');
        $data['syarat_masa_kerja']=$this->input->post('syarat_masa_kerja');
        $data['syarat_pendidikan']=$this->input->post('syarat_pendidikan');
        $data['syarat_pangkat_gol']=$this->input->post('syarat_pangkat_gol');
        
        $this->rnc->update_diklat($clause,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Diklat telah diubah'));
	redirect(base_url().'perencanaan/diklat/detail_diklat/'.$clause);
    }

    function delete_diklat($id){
        if($id){
            $this->rnc->delete_diklat($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Diklat telah dihapus'));
            redirect(base_url().'administrator/dashboard');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'administrator/dashboard');
        }
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
//        //kategori diklat prajabatan, id nya 1
//        $parent=1;
//        $sheet->mergeCellsByColumnAndRow($col, $row, ($col+5), $row);
//        $sheet->setCellValueByColumnAndRow($col, $row,'DIKLAT PRAJABATAN');
//        $sheet->getStyleByColumnAndRow($col, $row)
//                    ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//            $sheet->getStyleByColumnAndRow($col, $row)
//                    ->getFont()->setBold(true);
//        
//        //cetak program dibawah kategori prajab
//        $no=0;
//        foreach($arr_program as $data){
//            if($data['parent']==$parent){
//                $no++;
//                $row++;
//                $sheet->setCellValueByColumnAndRow($col, $row,$no);
//                $sheet->setCellValueByColumnAndRow($col+1, $row,$data['name']);
//                $sheet->setCellValueByColumnAndRow($col+3, $row,$data['jumlah_peserta']);
//                $sheet->setCellValueByColumnAndRow($col+4, $row,$data['tanggal_mulai']);
//                $sheet->setCellValueByColumnAndRow($col+5, $row,$data['tanggal_akhir']);
//                $date1=  date_create_from_format('Y-m-d',$data['tanggal_mulai']);
//                $date2=  date_create_from_format('Y-m-d',$data['tanggal_akhir']);
//                $hari = date_diff($date1, $date2, $absolute)->format('%d');
//                $sheet->setCellValueByColumnAndRow($col+2, $row,$hari);
//                //cetak ke samping
//                $idx_hari_mulai = date_format($date1,'z');
//                $idx_hari_selesai = date_format($date2,'z');
//                
//                //ngijoin cell, rumusnya kolom=$idx_hari+6
//                for($idx=$idx_hari_mulai;$idx<=$idx_hari_selesai;$idx++){
//                    $style_aktif = array( 
//                        'fill' => array( 
//                            'type' => PHPExcel_Style_Fill::FILL_SOLID, 
//                            'color' => array('rgb'=>'00FF00')
//                            )
//                        );
//                    $sheet->getStyleByColumnAndRow(($idx+6), $row)->applyFromArray($style_aktif);
//                }
//            }
//        }    
//        

        
        $filename = 'jadwal pelatihan.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
    }
    
}
