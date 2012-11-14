<?php
class Program extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_sarpras','spr');
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->library('date');
    }
    
    function view_program($id){
        $this->load->library('date');
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $data['materi']=$this->rnc->get_materi_diklat($data['program']['parent']);
        $pil_kelas=$this->spr->get_kelas_by_size($data['diklat']['jumlah_peserta'])->result_array();
        $data['kelas']=array(0=>'-');
        foreach($pil_kelas as $k){
            $data['kelas'][$k['id']]=$k['nama'];
        }
        $pil_gedung=$this->spr->get_gedung()->result_array();
        
        foreach($pil_gedung as $g){
            $data['asrama'][$g['id']]='Asrama '.$g['nama'];
        }
        $alokasi_asrama = $this->spr->get_alocated_gedung($id);
        $data['pil_asrama']=array();
        foreach($alokasi_asrama as $as){
            $data['pil_asrama'][]=$data['asrama'][$as['id_asrama']];
        }
        
        $this->template->display_with_sidebar('program/view_program','program',$data);
    }
    
    function buat_program($parent){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $this->load->library('editor');
	
        $data['program']=$data['pil_diklat']=$this->rnc->get_diklat_by_id($parent);
        
        $pil_kelas=$this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();
        
        $data['kelas']=array(-1=>'-- Pilih Kelas --');
        foreach($pil_kelas as $k){
            $data['kelas'][$k['id']]=$k['nama'];
        }
        
        $pil_gedung=$this->spr->get_gedung()->result_array();
        
        foreach($pil_gedung as $g){
            $data['asrama'][]=array('id'=>$g['id'],'nama'=>'Asrama '.$g['nama']);
        }
        
        
        $data['sub_title']='Buat Program Baru di Diklat '.$data['pil_diklat']['name'];
        $this->template->display_with_sidebar('program/form_buat_program','diklat',$data);
    }
    
    function insert_program(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $data['angkatan']=$this->input->post('angkatan');
        $data['parent']=$this->input->post('parent');
        $data['tipe']=3;
        $data['tahun_program']=$this->input->post('tahun_program');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['tempat']=$this->input->post('tempat');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        $data['kelas']=$this->input->post('kelas');
        
        $id=$this->rnc->insert_program($data);
        
        //insert penggunaan kelas
        
        $array_tanggal = $this->date->createDateRangeArray($data['tanggal_mulai'],$data['tanggal_akhir']);
        $batch = array();
        foreach($array_tanggal as $t){
            $batch[]=array('id_program'=>$id,'id_kelas'=>$data['kelas'],'tanggal'=>$t);
        }
        $this->spr->insert_penggunaan_kelas_batch($batch);
        
        //insert alokasi asrama
        $asrama_pil = $this->input->post('asrama');
        $batch = array();
        foreach($asrama_pil as $a){
            $batch[]=array('id_program'=>$id,'id_asrama'=>$a);
        }
        $this->spr->insert_alokasi_asrama_batch($batch);
        
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Program telah ditambahkan'));
        redirect(base_url().'program/view_program/'.$id);
    }
    
    function edit_program($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['program']=$this->rnc->get_program_by_id($id);
        $data['pil_diklat']=$this->rnc->get_diklat_by_id($data['program']['parent']);
        $pil_kelas=$this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();
        $data['kelas']=array(-1=>'-- Pilih Kelas --');
        foreach($pil_kelas as $k){
            $data['kelas'][$k['id']]=$k['nama'];
        }
        $pil_gedung=$this->spr->get_gedung()->result_array();
        
        foreach($pil_gedung as $g){
            $data['asrama'][]=array('id'=>$g['id'],'nama'=>'Asrama '.$g['nama']);
        }
        $alokasi_asrama = $this->spr->get_alocated_gedung($id);
        $data['pil_asrama']=array();
        foreach($alokasi_asrama as $as){
            $data['pil_asrama'][$as['id_asrama']]=true;
        }
        
        
        $data['sub_title']='Edit Program '.$data['pil_diklat']['name'].' Angkatan '.$data['program']['angkatan'];
        $this->template->display_with_sidebar('program/form_edit_program','program',$data);
    }
    
    function update_program(){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $clause = $this->input->post('id');
        $data['angkatan']=$this->input->post('angkatan');
        $data['parent']=$this->input->post('parent');
        $data['tipe']=3;
        $data['tahun_program']=$this->input->post('tahun_program');
        $data['tanggal_mulai']=$this->input->post('tanggal_mulai');
        $data['tanggal_akhir']=$this->input->post('tanggal_akhir');
        $data['lama_pendidikan']=$this->input->post('lama_pendidikan');
        $data['pelaksanaan']=$this->input->post('pelaksanaan');
        $data['tempat']=$this->input->post('tempat');
        $data['pelaksana']=$this->input->post('pelaksana');
        $data['fasilitator']=$this->input->post('fasilitator');
        $data['kelas']=$this->input->post('kelas');
        
        $this->rnc->update_program($clause,$data);
        
        //insert penggunaan kelas
        $this->spr->delete_penggunaan_kelas($clause);
        $array_tanggal = $this->date->createDateRangeArray($data['tanggal_mulai'],$data['tanggal_akhir']);
        $batch = array();
        foreach($array_tanggal as $t){
            $batch[]=array('id_program'=>$clause,'id_kelas'=>$data['kelas'],'tanggal'=>$t);
        }
        $this->spr->insert_penggunaan_kelas_batch($batch);
        
        
        //insert alokasi asrama
        $asrama_pil = $this->input->post('asrama');
        $batch = array();
        foreach($asrama_pil as $a){
            $batch[]=array('id_program'=>$clause,'id_asrama'=>$a);
        }
        $this->spr->delete_alokasi_asrama($clause);
        $this->spr->insert_alokasi_asrama_batch($batch);
        
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Data program telah diperbaharui'));
        redirect(base_url().'program/view_program/'.$clause);
    }
    
    function delete_program($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $this->rnc->delete_program($id);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Program telah dihapus'));
        redirect(base_url().'diklat');
    }
    
    function schedule_program($id){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        $data['program']=$this->rnc->get_program_by_id($id);
        $pil_materi=$this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pil_materi'][-1]='-- Pilih Materi --';
        foreach($pil_materi as $p){
            $data['pil_materi'][$p['id_materi']]=$p['judul'];
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
                if($item['jenis']=='libur')
                    $isi['title'] = $item['nama_kegiatan'];
                else
                    $isi['title'] = $data['pil_materi'][$item['id_materi']];
                $json_array[] = $isi;
            }
            $data['id_max'] = $i;
        }else{
            $data['id_max'] = 1;
        }
        $data['id']=$id;
        $data['sub_title']='Jadwal Tentative';
        $data['data_json'] = $json_array;
        $this->template->display_with_sidebar('program/schedule_program','program',$data);
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
        if($data_ins['jenis']=='libur'){
            $data_ins['nama_kegiatan'] = $this->input->post('materi');
        }else if($data_ins['jenis']=='materi'){
            $data_ins['id_materi'] = $this->input->post('materi');
        }
        $data_materi=array();
        if($data_ins['jenis']=='materi'){
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
        if($data_ins['jenis']=='libur'){
            $data_ins['nama_kegiatan'] = $this->input->post('materi');
        }else if($data_ins['jenis']=='materi'){
            $data_ins['id_materi'] = $this->input->post('materi');
        }
        $data_materi=array();
        if($data_ins['jenis']=='materi'){
            $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
            $data_materi['arr_pendamping'] = $this->input->post('pendamping');
        }
        
        $this->slng->update_schedule($data_ins, $data_materi, $data_where);
        echo json_encode($data_ins);
    }
}
