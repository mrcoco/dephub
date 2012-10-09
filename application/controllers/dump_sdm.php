<?php
class Dump_sdm extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    
    function index($page=1){
        $sdm = $this->load->database('sdm',TRUE);
        
        $golongan=$sdm->get('golongan')->result_array();
        $data['golongan']=array();
        foreach($golongan as $g){
            $data['golongan'][$g['kodegolong']]['golongan']=$g['golongan'];
            $data['golongan'][$g['kodegolong']]['pangkat']=$g['pangkat'];
        }
        
        $agama=$sdm->get('agama')->result_array();
        $data['agama']=array();
        foreach($agama as $a){
            $data['agama'][$a['kodeagama']]=$a['agama'];
        }
        
        $provinsi=$sdm->get('provinsi')->result_array();
        $data['provinsi']=array();
        foreach($provinsi as $p){
            $data['provinsi'][$p['kodeprovin']]=$p['namaprovin'];
        }
        
        $tingkatdik=$sdm->get('tingkatdik')->result_array();
        $data['tingkatdik']=array();
        foreach($tingkatdik as $p){
            $data['tingkatdik'][$p['kodetindik']]=$p['tingkatdik'];
        }
        
        $unit_kerja=$sdm->get('unitkerja')->result_array();
        $unit_kerja_laut=$sdm->get('unitkerja_laut')->result_array();
        
        $data['unit_kerja']=array();
        foreach($unit_kerja as $u1){
            $data['unit_kerja'][$u1['kodeunit']]=trim($u1['namapenuh']);
        }
        foreach($unit_kerja_laut as $u2){
            $data['unit_kerja'][$u2['kodeunit']]=trim($u2['namapenuh']);
        }
        
        $data['num'] = $sdm->get('pegawai')->num_rows();
        $data['offset']=($page-1)*8000;
        $data['pegawai']=$sdm->get('pegawai',8000,$data['offset'])->result_array();
        $this->load->view('dump_sdm',$data);
    }
    
    function kursus2(){
//        $sdm = $this->load->database('sdm',TRUE); 
        echo $this->db->get_where('history_pelatihan')->num_rows();
    }
    
    function kursus($page=1){
        $sdm = $this->load->database('sdm',TRUE); 
        $per_page=1000;
        $offset=($page-1)*$per_page;
        $num_rows=$this->db->count_all('cv_peserta');
        
        $peserta=$this->db->get('cv_peserta',$per_page,$offset)->result_array();
        $array_history=array();
        $i=0;
        
        foreach($peserta as $p){
            //query kursus dari nip si ini
            $kursus=$sdm->get_where('kursus',array('nip'=>$p['nip']))->result_array();
            
            foreach($kursus as $k){
                    $array_history[$i]['id']=$p['id'];
                    $array_history[$i]['nip']=$p['nip'];
                    if($k['namakursus']==''){
                        $k['namakursus']='-';
                    }
                    $array_history[$i]['nama_kursus']=$k['namakursus'];
                    if($k['tahun']==''){
                        $k['tahun']='-';
                    }
                    $array_history[$i]['tahun']=$k['tahun'];
                    $i++;
            }
        }
        $this->db->close();
        $data['offset']=$offset;
        $data['cur_page']=$page;
        $data['num_page']=ceil($num_rows/$per_page);
        $data['array']=$array_history;
        $this->load->view('dump_sdm2',$data);
    }
    
    function getcsv(){
        header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"my-data.csv\"");
        $data=stripcslashes($_REQUEST['csv_text']);
        echo $data;
    }
    
    function dompdf(){
        $this->load->helper('pdfexport');
        $html=$this->load->view('tes_pdf','',true);
        pdf_create($html, 'Tes');
    }
}
