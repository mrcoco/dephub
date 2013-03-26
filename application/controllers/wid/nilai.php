<?php

if (!defined('BASEPATH'))exit('No direct script access allowed');
class nilai extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_wid','wid');
        $this->thn_def = date('Y');
    }

    function index($thn='') {
        
        if($thn==''){$thn=$this->thn_def;}
        $id=$this->session->userdata('id_wid');
        $tahun=$this->wid->get_thn_wid($id);
        if($tahun){
            foreach ($tahun as $t) {
                $data['tahun'][]=$t['tahun_program'];
            }
        }
        $data['title']='Info Pengajar';
        $data['materi']=$this->wid->get_materi_wid($id);
        $materi=array();
        foreach($data['materi'] as $m){
            $materi[$m['id_materi']]=$m;
            $data['diklat'][$m['id_materi']]=$this->wid->get_diklat_materi($m['id_materi']);
            foreach($data['diklat'][$m['id_materi']] as $d){
                $data['program'][$d['id']]=$this->wid->get_program_wid($id,$d['id'],$thn);
            }
        }
        foreach ($data['materi'] as $m) {
            $jam=$this->wid->get_hours_wid(array('id_pembicara'=>$id,'id_materi'=>$m['id']));
            $data['total_jam'][$m['id']]=0;
            foreach($jam as $j){
                $data['total_jam'][$m['id']]+=$this->date->hitung_jam($j['jam_mulai'],$j['jam_selesai']);
            }
        }
        $data['all_diklat']=$this->wid->get_diklat_wid($id);
        foreach($data['all_diklat'] as $a){
            $data['a_materi'][$a['id_diklat']][]=$materi[$a['id_materi']];
        }
        $this->template->display_wid('wid/nilai_materi',$data);
    }
    
    function item($id_materi,$id_program){
        $data['materi']=$this->rnc->get_materi($id_materi);
        $data['program']=$this->rnc->get_program_by_id($id_program);
        $data['sidebar']='sidebar_nilai';
        $data['title']='Unsur Penilaian';
        $data['list_komponen']=$this->wid->get_komponen_penilaian($id_materi,$id_program);
        $data['tot']=$this->wid->tot_bobot_penilaian($id_materi,$id_program);
        $data['indeks']['id_materi']=$id_materi;
        $data['indeks']['id_program']=$id_program;
        $this->template->display_wid('wid/nilai_item',$data);
    }
    
    function item_insert(){
        $id_materi=$this->input->post('id_materi');
        $id_program=$this->input->post('id_program');
        $item_komponen = $this->input->post('item');
        $bobot_komponen = $this->input->post('bobot');
        $ins_batch = array();
        for($i=0;$i<count($item_komponen);$i++){
            if($item_komponen[$i]!=""){
                $ins_batch[$i]=array(
                    'id_program'=>$id_program,
                    'id_materi'=>$id_materi,
                    'nama_komponen'=>$item_komponen[$i],
                    'bobot'=>$bobot_komponen[$i],
                );
            }
        }
        $this->wid->insert_komponen_penilaian($id_materi,$id_program,$ins_batch);
//        redirect(base_url().'wid/nilai/item/'.$id_materi.'/'.$id_program);
        redirect($this->input->post('redirect_url'));
    }
    function item_hapus(){
        $data['id_program']=$this->input->post('id_program');
        $data['id_materi']=$this->input->post('id_materi');
        $data['id']=$this->input->post('id_komponen');
        echo $this->wid->hapus_komponen($data);
    }
    
    function input($id_materi,$id_program){
        $data['materi']=$this->rnc->get_materi($id_materi);
        $data['program']=$this->rnc->get_program_by_id($id_program);
        $data['sidebar']='sidebar_nilai';
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['title']='Pengumpulan Nilai';
        $data['list_komponen']=$this->wid->get_komponen_penilaian($id_materi,$id_program);
        for($i=0;$i<count($data['list_komponen']);$i++){
            $data['list_komponen'][$i]['status']=$this->wid->cek_status_pengumpulan($data['list_komponen'][$i]['id']);
        }
        $this->template->display_wid('wid/nilai_input',$data);
    }
    
    function upload_nilai($id_materi,$id_program,$id_komponen){
        $data['title']='Pengumpulan Nilai';
        $data['materi']=$this->rnc->get_materi($id_materi);
        $data['program']=$this->rnc->get_program_by_id($id_program);
        $data['komponen']=$this->wid->get_nama_komponen($id_komponen);
        $data['sidebar']='sidebar_nilai';
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $this->template->display_wid('wid/form_upload_nilai',$data);
    }
    
    function insert(){
        $id_materi=$this->input->post('id_materi');
        $id_program=$this->input->post('id_program');
        $id_komponen=$this->input->post('id_komponen');
        $id_wid=$this->session->userdata('id_wid');
        
        $config['upload_path'] = './assets/public/upload_nilai';
        $config['allowed_types'] = 'xlsx|xls';
        
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('file_nilai')){
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('msg',$this->editor->alert_error('Upload gagal, '.  $error));
            redirect($this->input->post('fail_url'));
        }
        $data = $this->upload->data();
        $file = './assets/public/upload_nilai/'.$data['file_name'];
        $this->load->library('excel');
        $obj_reader = PHPExcel_IOFactory::load($file);
        $sheet = $obj_reader->getSheet();
        $exist = true;
        $row = 9;
        $batch = array();
        $array_id_peserta = array(); //array nip untuk where pas ngupdate
        while($exist){
            $curcell = $sheet->getCellByColumnAndRow(0,$row);
            $val = $curcell->getValue();
            if ($val == '') {
                $exist = false;
            } else {
                
                $cellnip = $sheet->getCellByColumnAndRow(1,$row);
                $nip = trim($cellnip->getValue());
                
                $pegawai = $this->slng->get_data_pegawai_nip($nip);
                
                $id_peserta=$pegawai['id'];
                $array_id_peserta[] = $pegawai['id'];
                
                $cellnilai = $sheet->getCellByColumnAndRow(3,$row);
                $nilai = $cellnilai->getCalculatedValue();
                
                $cellket = $sheet->getCellByColumnAndRow(4,$row);
                $ket = $cellket->getValue();
                if(!$ket){$ket="";}
                
                $batch[]=array(
                    'id_komponen'=>$id_komponen,
                    'id_pengajar'=>$id_wid,
                    'id_peserta'=>$id_peserta,
                    'nilai'=>$nilai,
                    'keterangan'=>$ket
                );
                $row++;
            }
        }
        $this->wid->insert_nilai($id_komponen,$id_wid,$batch,$array_id_peserta);
        redirect($this->input->post('redirect_url'));
    }
    
    function gen_form($id_materi,$id_program,$id_komponen){
        $this->load->library('excel');
        $thn=$this->thn_def;
        $data['materi']=$this->rnc->get_materi($id_materi);
        $data['program']=$this->rnc->get_program_by_id($id_program);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['komponen']=$this->wid->get_nama_komponen($id_komponen);
        $data['list']=$this->slng->get_status_accept($id_program,$thn);
        
        $this->excel->setActiveSheetIndex(0);
        $this->excel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(9);
        $sheet = $this->excel->getActiveSheet();
        $sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4)->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_PORTRAIT);
    
        $col=0;
        $row=1;
        
        $isi = 'Form Nilai';
        $sheet->setCellValueByColumnAndRow($col, $row, $isi);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 4, $row);
        
        $row++;
        $isi = 'Diklat : '.$data['diklat']['name'];
        $sheet->setCellValueByColumnAndRow($col, $row, $isi);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 4, $row);
        
        $row++;
        $isi = 'Angkatan : '.$data['program']['angkatan'];
        $sheet->setCellValueByColumnAndRow($col, $row, $isi);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 4, $row);
        
        $row++;
        $isi = 'Materi : '.$data['materi']['judul'];
        $sheet->setCellValueByColumnAndRow($col, $row, $isi);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 4, $row);
        
        $row++;
        $isi = 'Komponen penilaian : '.$data['komponen']['nama_komponen'];
        $sheet->setCellValueByColumnAndRow($col, $row, $isi);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 4, $row);
        
        $row+=3;
        $sheet->setCellValueByColumnAndRow($col, $row, 'No');
        $sheet->setCellValueByColumnAndRow($col+1, $row, 'NIP');
        $sheet->setCellValueByColumnAndRow($col+2, $row, 'Nama');
        $sheet->setCellValueByColumnAndRow($col+3, $row, 'Nilai');
        $sheet->setCellValueByColumnAndRow($col+4, $row, 'Ket.');
        
        $row++;
        $no=1;
        foreach($data['list'] as $l){
            $sheet->setCellValueByColumnAndRow($col, $row, $no);
            $sheet->setCellValueByColumnAndRow($col+1, $row,$l['nip']." ");
            $sheet->setCellValueByColumnAndRow($col+2, $row, $l['nama']);
            $no++;
            $row++;
        }
        
        $filename = 'form nilai '.$data['komponen']['nama_komponen'].' '.$data['program']['id'].'.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
    }
    
    function view($id_materi,$id_program,$print=""){
        $thn=  $this->thn_def;
        $data['materi']=$this->rnc->get_materi($id_materi);
        $data['program']=$this->rnc->get_program_by_id($id_program);
        $data['sidebar']='sidebar_nilai';
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['title']='Daftar Nilai Peserta';
        $data['list_komponen']=$this->wid->get_komponen_penilaian($id_materi,$id_program);
        $data['nilai'] = array();
        foreach($data['list_komponen'] as $l){
            $res = $this->wid->get_nilai_peserta($l['id']);
            $data['nilai'][$l['id']]=array();
            foreach($res as $r){
                $data['nilai'][$l['id']][$r['id_peserta']]=$r['nilai'];
            }
        }
        $data['list_peserta']=$this->slng->get_terima_peserta($id_program,$thn);
        
        if($print=="print"){
            $data['judul']='PENDIDIKAN DAN PELATIHAN '.strtoupper($data['diklat']['name']).'<br />
                KEMENTERIAN PERHUBUNGAN ANGKATAN '.$data['program']['angkatan'].' TAHUN '.$data['program']['tahun_program'];
            $this->load->helper('pdfexport_helper.php');
            $data['htmView'] = $this->load->view('wid/nilai_print',$data,TRUE);
            $filename='Nilai Peserta '.$data['diklat']['name'].' Ang '.$data['program']['angkatan'].' Materi '.$data['materi']['id'];
            pdf_create($data['htmView'],$filename);                                                                    
        }else{
            $this->template->display_wid('wid/nilai_view',$data);
        }
    }

}
/* End of file nilai.php */
/* Location: ./application/controllers/nilai.php */