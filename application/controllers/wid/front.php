<?php
class Front extends CI_Controller{
    function __construct() {
        parent::__construct();
        //buat ngilangin data session sebelumnya
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_feedback','fdb');
        $this->load->model('mdl_wid','wid');
        $this->load->model('mdl_pes','pes');
        $this->thn_def = date('Y');
    }
    
    function index(){
        if(!$this->session->userdata('is_login_wid')){
            $data_session=array(
                'nama_wid',
                'id_jenis',
                'id_peg',
                'id_wid',
                'is_login_wid'
            );
            $this->session->unset_userdata($data_session);
            $this->session->sess_destroy();
            $this->login_form();
        }else{
            $this->info_pengajar();
        }
    }
    
    function info_pengajar($thn=''){
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
        $data['diklat']=array();
        $data['program']=array();
        foreach($data['materi'] as $m){
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
//        print_r($data['materi']);
//        print_r($data['diklat']);
        $this->template->display_wid('wid/info',$data);
    }
    function detail_dosen(){
        $id=$this->session->userdata('id_peg');
        $data['data'] = $this->slng->get_dosen_tamu($id);
        $data['sub_title']='Detail Data '.$data['data']['nama'];
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $this->template->display_wid('wid/detail_dosen',$data);
    }
    function edit_dosen($id){
        $data['data'] = $this->slng->get_dosen_tamu($id);
        $data['kategori']=array(
            -1=>'---Pilih kategori---',
            0=>'Profesional',
            1=>'PNS');
        
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        //parsing data pendidikan dn
        $pnddkn_dn=array();
        $periode_dn=array();
        
        $pendidikan_dn=$data['data']['pendidikan_dn'];
        $pendidikan_dn=str_replace('<li>', '', $pendidikan_dn);
        $pendidikan_dn=str_replace('</li>', ' # ', $pendidikan_dn);
        
        $per_dn=explode('#',$pendidikan_dn);
        $i=0;
        foreach($per_dn as $a){
            if(trim($a)!=''){
                $dn=explode(':',trim($a));
                $pnddkn_dn[$i]=trim($dn[1]);
                $periode_dn[$i]=trim($dn[0]);
                $i++;
            }
        }
        $data['data']['dn']=$pnddkn_dn;
        $data['data']['periode_dn']=$periode_dn;
        
        
        //parsing data pendidikan ln
        $pnddkn_ln=array();
        $periode_ln=array();
        
        $pendidikan_ln=$data['data']['pendidikan_ln'];
        $pendidikan_ln=str_replace('<li>', '', $pendidikan_ln);
        $pendidikan_ln=str_replace('</li>', ' # ', $pendidikan_ln);
        
        $per_ln=explode('#',$pendidikan_ln);
        $i=0;
        foreach($per_ln as $a){
            if(trim($a)!=''){
                $ln=explode(':',trim($a));
                $pnddkn_ln[$i]=trim($ln[1]);
                $periode_ln[$i]=trim($ln[0]);
                $i++;
            }
        }
        $data['data']['ln']=$pnddkn_ln;
        $data['data']['periode_ln']=$periode_ln;
        
        
        //parsing data riwayat pekerjaan
        $data_riwayat=array();
        $data_periode=array();
        
        $riwayat_pekerjaan=$data['data']['history_jabatan'];
        $riwayat_pekerjaan=str_replace('<li>', '', $riwayat_pekerjaan);
        $riwayat_pekerjaan=str_replace('</li>', ' # ', $riwayat_pekerjaan);
        
        $per_riwayat=  explode('#', $riwayat_pekerjaan);
        $i=0;
        foreach($per_riwayat as $a){
            if(trim($a)!=''){
                $riwayat=explode(':',trim($a));
                $data_riwayat[$i]=trim($riwayat[1]);
                $data_periode[$i]=trim($riwayat[0]);
                $i++;
            }
        }
        $data['data']['riwayat']=$data_riwayat;
        $data['data']['periode']=$data_periode;
        
        //parsing data riwayat kursus
        $data_kursus=array();
        $kursus_periode=array();
        
        $riwayat_kursus=$data['data']['history_kursus'];
        $riwayat_kursus=str_replace('<li>', '', $riwayat_kursus);
        $riwayat_kursus=str_replace('</li>', ' # ', $riwayat_kursus);
        
        $per_riwayat=  explode('#', $riwayat_kursus);
        $i=0;
        foreach($per_riwayat as $a){
            if(trim($a)!=''){
                $riwayat=explode(':',trim($a));
                $data_kursus[$i]=trim($riwayat[1]);
                $kursus_periode[$i]=trim($riwayat[0]);
                $i++;
            }
        }
        $data['data']['kursus']=$data_kursus;
        $data['data']['periode_kursus']=$kursus_periode;
        
        //parsing data riwayat diklat
        $data_diklat=array();
        
        $riwayat_diklat=$data['data']['history_diklat'];
        $riwayat_diklat=str_replace('<li>', '', $riwayat_diklat);
        $riwayat_diklat=str_replace('</li>', ' # ', $riwayat_diklat);
        
        $per_riwayat=  explode('#', $riwayat_diklat);
        $i=0;
        foreach($per_riwayat as $a){
            if(trim($a)!=''){
                $data_diklat=$a;
                $i++;
            }
        }
        $data['data']['diklat']=$data_diklat;
        
        $data['sub_title']='Edit Data '.$data['data']['nama'];
        $this->template->display_wid('wid/edit_dosen',$data);
    }
    
    function update_dosen(){
        $clause=$this->input->post('id');
        $data['nama']=$this->input->post('nama');
        $data['username']=$this->input->post('username');
        if($this->input->post('password')!=''){
        $data['password']=md5($this->input->post('password'));}
        $data['is_pns']=$this->input->post('kategori');
        $data['nip']=$this->input->post('nip');
        $data['tempat_lahir']=$this->input->post('tempat');
        $data['tanggal_lahir']=$this->date->savetgl($this->input->post('tanggal'));
        $data['kode_gol']=$this->input->post('kode_gol');
        $data['instansi']=$this->input->post('instansi');
        $data['jabatan']=$this->input->post('jabatan');
        $data['alamat_rumah']=$this->input->post('alamat_rumah');
        $data['tlp_rumah']=$this->input->post('tlp_rumah');
        $data['alamat_kantor']=$this->input->post('alamat_kantor');
        $data['tlp_kantor']=$this->input->post('tlp_kantor');
        
        //mengambil data pendidikan dalam negeri
        $dlm_ngri=$this->input->post('dlm_ngri');
        $periode_dlm_ngri=$this->input->post('periode_dlm_ngri');
        $data['pendidikan_dn']='';
        if(count($dlm_ngri)>0){
            for($i=0;$i<count($dlm_ngri);$i++){
                if($dlm_ngri[$i]==''){
                    $dlm_ngri[$i]='-';
                }
                if($periode_dlm_ngri[$i]==''){
                    $periode_dlm_ngri[$i]='-';
                }
                if($dlm_ngri[$i]!='-'||$periode_dlm_ngri[$i]!='-'){
                    $text = '<li>'.$periode_dlm_ngri[$i].' : '.$dlm_ngri[$i].'</li>';
                    $data['pendidikan_dn'].=$text;
                }
            }
        }
        
        //mengambil data pendidikan luar negeri
        $luar_ngri=$this->input->post('luar_ngri');
        $periode_luar_ngri=$this->input->post('periode_luar_ngri');
        $data['pendidikan_ln']='';
        if(count($luar_ngri)>0){
            for($i=0;$i<count($luar_ngri);$i++){
                if($luar_ngri[$i]==''){
                    $luar_ngri[$i]='-';
                }
                if($periode_luar_ngri[$i]==''){
                    $periode_luar_ngri[$i]='-';
                }
                if($luar_ngri[$i]!='-'||$periode_luar_ngri[$i]!='-'){
                    $text = '<li>'.$periode_luar_ngri[$i].' : '.$luar_ngri[$i].'</li>';
                    $data['pendidikan_ln'].=$text;
                }
            }
        }
        
        //mengambil data history jabatan
        $riwayat_jbtn=$this->input->post('riwayat_jbtn');
        $periode_jbtn=$this->input->post('periode_jbtn');
        $data['history_jabatan']='';
        if(count($riwayat_jbtn)>0){
            for($i=0;$i<count($riwayat_jbtn);$i++){
                if($riwayat_jbtn[$i]==''){
                    $riwayat_jbtn[$i]='-';
                }
                if($periode_jbtn[$i]==''){
                    $periode_jbtn[$i]='-';
                }
                if($riwayat_jbtn[$i]!='-'||$periode_jbtn[$i]!='-'){
                    $text = '<li>'.$periode_jbtn[$i].' : '.$riwayat_jbtn[$i].'</li>';
                    $data['history_jabatan'].=$text;
                }
            }
        }
        
        //mengambil data kursus
        $kursus=$this->input->post('kursus');
        $periode_kursus=$this->input->post('thn_kursus');
        $data['history_kursus']='';
        if(count($kursus)>0){
            for($i=0;$i<count($kursus);$i++){
                if($kursus[$i]==''){
                    $kursus[$i]='-';
                }
                if($periode_kursus[$i]==''){
                    $periode_kursus[$i]='-';
                }
                if($kursus[$i]!='-'||$periode_kursus[$i]!='-'){
                    $text = '<li>'.$periode_kursus[$i].' : '.$kursus[$i].'</li>';
                    $data['history_kursus'].=$text;
                }
            }
        }
        
        //mengambil data diklat
        $diklat=$this->input->post('diklat');
        $data['history_diklat']='';
        if(count($diklat)>0){
            for($i=0;$i<count($diklat);$i++){
                if($diklat[$i]!=''){
                    $text = '<li>'.$diklat[$i].'</li>';
                    $data['history_diklat'].=$text;
                }
            }
        }
        
        $this->slng->update_dosen_tamu($clause,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Data dosen telah diubah'));
        redirect(base_url().'wid/front/detail_dosen/'.$clause);
    }
    function detail_pegawai(){
        $id=$this->session->userdata('id_peg');
        $data_pegawai=$this->slng->get_data_pegawai_id($id);
        $data['title']='Detail data '.$data_pegawai['nama'];
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
        $this->template->display_wid('wid/detail',$data);
    }
    
    function detail_diklat($id){
        $data['sidebar']=true;
        $data['id']=$id;
        $data['program']=$this->rnc->get_diklat_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['ang']=$this->pes->get_program_pes($this->session->userdata('id_pes'),$id);
        $data['id_program']=$data['ang']['id_program'];
        $data['feedback_diklat']=false;
        if($this->fdb->cek_feedback_diklat($data['id_program'],$this->session->userdata('id_pes'))==0)
        $data['feedback_diklat']=true;
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
        $this->template->display_wid('pes/detail_diklat',$data);
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
        $this->template->display_wid('wid/feedback_pengajar',$data);
    }
    function feedback_result_pengajar($id){
        $data['id']=$id;
        $data['materi'] = $this->rnc->get_materi($_POST['id_materi']);
        $data['pengajar']=$this->slng->get_pembicara_id($_POST['id_pengajar']);
        $data['program']=$this->rnc->get_program_by_id($_POST['id_program']);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
	$data['sub_title']='Rekap Evaluasi Pengajar';
        $data['result']=$this->slng->feedback_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->result_array();
        $data['n_result']=$this->slng->feedback_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->num_rows();
        $data['saran']=$this->slng->feedback_saran_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->result_array();
        $data['n']=$this->slng->feedback_saran_pengajar($_POST['id_program'],$_POST['id_materi'],$_POST['id_pengajar'])->num_rows();
        $this->template->display_wid('wid/feedback_result_pengajar',$data);
    }

    function schedule_pengajar($thn=''){
        if($thn==''){$thn=$this->thn_def;}
        $id=$this->session->userdata('id_wid');
        $tahun=$this->wid->get_thn_wid($id);
        foreach ($tahun as $t) {
            $data['tahun'][]=$t['tahun_program'];
        }
        $data['title']='Jadwal Pengajar';
        $data['data_schedule']=$this->wid->get_schedule_wid($id,$thn);
        $jam=$this->wid->get_hours_wid(array('id_pembicara'=>$id));
        $data['total_jam']=0;
        foreach($jam as $j){
            $data['total_jam']+=$this->date->hitung_jam($j['jam_mulai'],$j['jam_selesai']);
        }
        $data['judul']='Jadwal Keseluruhan';
        $data['link_pdf']='wid/front/schedule_pengajar_print';
//        print_r($data['data_schedule']);
        $this->template->display_wid('wid/schedule_program',$data);
    }
    function schedule_pengajar_print(){
        $this->load->helper('pdfexport');
        $id=$this->session->userdata('id_wid');
        $data['title']='Jadwal Pengajar';
        $data['data_schedule']=$this->wid->get_schedule_wid($id);
        $data['judul']='Jadwal Pengajar - '.$this->session->userdata('nama_wid');
        $jam=$this->wid->get_hours_wid(array('id_pembicara'=>$id));
        $data['total_jam']=0;
        foreach($jam as $j){
            $data['total_jam']+=$this->date->hitung_jam($j['jam_mulai'],$j['jam_selesai']);
        }
//        print_r($data['data_schedule']);
        $print = $this->load->view('wid/pdf_schedule',$data,true);
        pdf_create($print, $data['judul']);
    }

    function schedule_program($id) {
        $data['title']='Jadwal Program';
        $data['program'] = $this->rnc->get_program_by_id($id);
        $data['ang']=$this->pes->get_program_pes($this->session->userdata('id_pes'),$data['program']['parent']);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $id_pem=$this->session->userdata('id_wid');
        $jam=$this->wid->get_hours_wid(array('id_pembicara'=>$id_pem,'id_program'=>$id));
        $data['total_jam']=0;
        foreach($jam as $j){
            $data['total_jam']+=$this->date->hitung_jam($j['jam_mulai'],$j['jam_selesai']);
        }

        $this->load->library('date');
        $this->load->library('excel');
        $data['data_schedule'] = $this->slng->get_all_item_schedule_pdf($id);
        
        $data['id_program']=$id;
        $data['judul']=$data['diklat']['name'].' Tahun '.$data['program']['tahun_program'].' Angkatan '.$data['program']['angkatan'];
        $data['link_pdf']='program/print_schedule_pdf/'.$id;
        $this->template->display_wid('wid/schedule_program',$data);
    }
    function login_form(){
        $data['title']='Login Pengajar';
        $this->template->display_wid('wid/login_form',$data);
    }
    
    
    function login_process(){
//        $data['jenis']=$this->input->post('jenis');
        $data['username']=$this->input->post('username');
        $data['password']=$this->input->post('password');
        $res=$this->wid->login_wid($data)->num_rows();
        if($res>0){
			$pengajar=$this->wid->login_wid($data)->row_array();
            $data_session=array(
                'nama_wid'=>$pengajar['nama'],
                'id_jenis'=>$pengajar['jenis'],
                'id_peg'=>$pengajar['id_tabel'],
                'id_wid'=>$pengajar['id'],
                'is_login_wid'=>true
            );
            $this->session->set_userdata($data_session);
//            print_r($this->session->all_userdata());
            redirect(base_url().'wid/front/info_pengajar');
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Maaf, login gagal. Silakan coba lagi'));
            redirect(base_url().'wid/front');
        }
    }
    
    
    function logout(){
        //buat ngilangin data session sebelumnya
        $data_session=array(
                'nama_wid',
                'id_jenis',
                'id_peg',
                'id_wid',
                'is_login_wid'
            );
	$this->session->unset_userdata($data_session);
	$this->session->sess_destroy();
        redirect(base_url().'wid/front');
    }
    
}
