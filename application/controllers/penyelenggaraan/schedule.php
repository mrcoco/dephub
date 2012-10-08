<?php
class Schedule extends Penyelenggaraan_Controller{
    
    protected $thn_default;
    
    function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
        $this->load->model('mdl_penyelenggaraan','slng');
    }
    
    public function index(){
	$this->daftar_diklat();

    }

    function daftar_diklat($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
	$data['sub_title']='Daftar Diklat Tahun '.$thn;
        $data['kategori']=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($data['kategori'] as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('simdik/penyelenggaraan/daftar_diklat',$data);
    }
    
    function buat_schedule($id){
        $this->load->library('date');
        $data['program']=$this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'penyelenggaraan/schedule/daftar_diklat');
        }
        
        $data['schedule']=$this->slng->get_schedule($id);
        
        $json_array=array();
        if(count($data['schedule'])!=0){
            //proses json
            $i=1;
            foreach($data['schedule'] as $item){
                $isi['id']=$i;
                $isi['start']=$this->date->extract_date($item['tanggal'].' '.$item['jam_mulai']);
                $isi['end']=$this->date->extract_date($item['tanggal'].' '.$item['jam_selesai']);
                $isi['title']=$item['materi'];
                $json_array[]=$isi;
                $i++;
            }
        }
        
        $data['id_max']=$i-1;
        $data['data_json']=$json_array;
        $this->template->display('simdik/penyelenggaraan/schedule_diklat',$data);
    }
    
    function print_schedule($id){
        $this->load->library('date');
        $data['program']=$this->rnc->get_program_by_id($id);
        
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'penyelenggaraan/schedule/daftar_diklat');
        }
        
        //menghitung jumlah minggu
        $start =  date_create_from_format('Y-m-d', $data['program']['tanggal_mulai']);
        $end = date_create_from_format('Y-m-d', $data['program']['tanggal_akhir']);
        
        $data['week'] = date_format($end, 'W')-date_format($start, 'W')+1;
        
        $data['arr_jam']=array();
        
        $obj_hari_mulai=date_create_from_format('H:i', '00:00');
        $obj_hari_selesai=date_create_from_format('H:i', '23:00');
        $obj_tambah_menit=  date_interval_create_from_date_string('1 hour');
        
        $hasil_add = $obj_hari_mulai;
        while($hasil_add<=$obj_hari_selesai){
            $jam_awal=date_format($hasil_add,'H:i');
            $hasil_add = date_add($hasil_add, $obj_tambah_menit);
            $jam_akhir=date_format($hasil_add,'H:i');
            $data['arr_jam'][] = $jam_awal.'-'.$jam_akhir;
        }
        
        
        $html=$this->load->view('simdik/penyelenggaraan/schedule_print',$data,true);
        
        $this->load->helper('pdfexport');
        pdf_landscape($html, 'Tes');
    }
    
    function ajax_pembicara($jenis){
        echo json_encode($this->slng->ajax_pembicara($jenis));
    }
    
    function ajax_save(){
        $this->load->library('date');
        $data_ins['id_program']=$this->input->post('id_program');
        $data_ins['jam_mulai']=$this->input->post('jam_mulai');
        $data_ins['jam_selesai']=$this->input->post('jam_selesai');
        $data_ins['tanggal']=$this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis']=$this->input->post('jenis');
        $data_ins['materi']=$this->input->post('materi');
        
        $data_materi['arr_pembicara']=$this->input->post('id_pembicara');
        $data_materi['arr_pendamping']=$this->input->post('pendamping');

        $this->slng->insert_schedule($data_ins,$data_materi);
    }
    
    function ajax_update_waktu(){
        $data_new['jam_mulai']=$this->input->post('new_start');
        $data_new['jam_selesai']=$this->input->post('new_end');
        $data_new['tanggal']=$this->input->post('new_date');
        
        $data_where['jam_mulai']=$this->input->post('old_start');
        $data_where['jam_selesai']=$this->input->post('old_end');
        $data_where['tanggal']=$this->input->post('old_date');
        $data_where['materi']=$this->input->post('title');
        $data_where['id_program']=$this->input->post('id_program');
        $this->slng->update_waktu($data_new,$data_where);
    }
    
    function ajax_get_data_schedule(){
        $where['jam_mulai']=$this->input->post('where_start');
        $where['jam_selesai']=$this->input->post('where_end');
        $where['tanggal']=$this->input->post('where_date');
        $where['materi']=$this->input->post('title');
        $where['id_program']=$this->input->post('id_program');
        $retval=$this->slng->get_item_schedule($where);
        echo json_encode($retval);
    }
    
    function ajax_get_form_pemateri_pembimbing($id){
        //query nama, id, dan jenis pembicara & pendamping
        $data['qry_pemateri'] = $this->slng->get_pemateri($id);
        $data['qry_pendamping']=$this->slng->get_pendamping($id);
        echo $this->load->view('simdik/penyelenggaraan/ajax_pemateri',$data,TRUE);
    }
    
    function ajax_delete_schedule($id){
        $this->slng->del_schedule($id);
        echo 'Delete success';
    }
    
    function ajax_edit_all(){
        $this->load->library('date');
        
        $data_where['id']=$this->input->post('idschedule');
        $data_ins['id_program']=$this->input->post('id_program');
        $data_ins['jam_mulai']=$this->input->post('jam_mulai');
        $data_ins['jam_selesai']=$this->input->post('jam_selesai');
        $data_ins['tanggal']=$this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis']=$this->input->post('jenis');
        $data_ins['materi']=$this->input->post('materi');
        
        $data_materi['arr_pembicara']=$this->input->post('id_pembicara');
        $data_materi['arr_pendamping']=$this->input->post('pendamping');
        
        $this->slng->update_schedule($data_ins,$data_materi,$data_where);
        echo json_encode($data_ins);
    }
}
