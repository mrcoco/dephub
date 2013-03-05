<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
    
    function item_nilai($id_materi){
        $data['title']='Unsur Penilaian';
        $this->template->display_wid('wid/nilai_item',$data);
    }

}

/* End of file nilai.php */
/* Location: ./application/controllers/nilai.php */
?>