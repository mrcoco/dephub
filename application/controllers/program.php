<?php
class Program extends CI_Controller{
    function __construct() {
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_sarpras','spr');
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
        $this->template->display_with_sidebar('program/view_program','program',$data);
    }
    
    function buat_program($parent){
        if($this->session->userdata('id_role')==2||$this->session->userdata('id_role')==4){
            redirect(base_url().'error/error_priv');
        }
        
        $this->load->library('editor');
	
        $data['pil_diklat']=$this->rnc->get_diklat_by_id($parent);
        $pil_kelas=$this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();
        $data['kelas']=array(-1=>'-- Pilih Kelas --');
        foreach($pil_kelas as $k){
            $data['kelas'][$k['id']]=$k['nama'];
        }
        
        $data['sub_title']='Buat Program Baru di Diklat '.$data['pil_diklat']['name'];
        $this->template->display('program/form_buat_program',$data);
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
        
    }
    
    function approve($id){
        
    }
}
