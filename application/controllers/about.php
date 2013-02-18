<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
            $this->profil();
	}
	function profil($id=1)
	{
            $this->load->model('mdl_administrator','adm');
            $data['profil']=$this->adm->get_profil();
            $data['about']=$this->adm->get_profil_id($id);
	    $data['title']=$data['about']['judul'];
	    $this->template->display('about/index',$data);
	}
        function pengajar(){
            $this->load->model('mdl_penyelenggaraan','slng');
            $data['sub_title']='Daftar Pengajar';
            $data['list']=$this->slng->getall_pembicara_int();
            $this->template->display('about/list_pembicara_int',$data);
        }
        function detail_pegawai($id){
            $this->load->model('mdl_penyelenggaraan','slng');
            $this->load->model('mdl_perencanaan','rnc');
            //menampilkan data detail pegawai
            $data_pegawai=$this->slng->get_data_pegawai_id($id);
            $data['header']='Detail data '.$data_pegawai['nama'];
            foreach($data_pegawai as $key=>$item){
                if($key!='foto'){
                    if($item==''){
                        $item='-';
                    }
                }else{
                    if($item==''){
                        $item=base_url().'assets/public/foto/nopic.jpg';
                    }
                }
                $data['pegawai'][$key]=$item;
            }
            $data['arr_pendidikan']=$this->rnc->get_list_pendidikan();
            $data['arr_pendidikan'][0]="Tidak ada data";
            $data['pangkat']=$this->rnc->get_pangkat_gol();
            $data['history']=$this->slng->get_history($id);
            $this->load->view('pegawai/ajax_detail_pegawai',$data);
        }
        function materi_pengajar($id,$thn=''){
            if($thn==''){$thn=date('Y');}
            $this->load->model('mdl_wid','wid');
            $data['materi']=$this->wid->get_materi_peg($id);
            foreach ($data['materi'] as $m) {
                $jam=$this->wid->get_hours_peg($id,$m['id']);
                $data['total_jam'][$m['id']]=0;
                foreach($jam as $j){
                    $data['total_jam'][$m['id']]+=$this->date->hitung_jam($j['jam_mulai'],$j['jam_selesai']);
                }
            }
            $data['pegawai']=$this->wid->get_detail_peg($id);
//            print_r($data['pegawai']);
            $this->load->view('about/materi_pengajar',$data);
        }
}

/* End of file about.php */
/* Location: ./application/controllers/about.php */