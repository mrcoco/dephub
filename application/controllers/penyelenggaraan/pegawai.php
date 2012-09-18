<?php
class Pegawai extends Penyelenggaraan_Controller{
    
    protected $thn;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
        $this->list_pegawai();
    }
    
    function list_pegawai_awal(){
        //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
        $data['sub_title']='List Pegawai';
        $this->template->display('simdik/penyelenggaraan/list_pegawai',$data);
    }
    
    //function list_pegawai($page=1,$filter='all')
    function list_pegawai($page=1,$filter=''){
        //melist pegawai, pake paging dan ada filter berdasarkan instansi
        $data['cur_page']=$page;
        $data['per_page']=25;
        $data['filter']=$filter;
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
        $data['array']=$this->slng->get_pegawai($data['per_page'],$data['offset'],$data['filter']);
        $data['num_res']=$this->slng->count_pegawai($filter);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
        echo $this->load->view('simdik/penyelenggaraan/ajax_list_pegawai',$data,true);
        
//        $data['sub_title']='List Pegawai Diklat';
//        $data['list']=$this->slng->get_pegawai_list(1,10);
//        $list_program = $this->rnc->get_program($this->thn);
//        $data['id_program']=$id_program;
//        $data['pil_program']=array(-1=>'Semua Program');
//        foreach($list_program as $program){
//            $data['pil_program'][$program['id']]=$program['name'];
//        }
//        $this->template->display('simdik/penyelenggaraan/list_pegawai',$data);
    }
    
    function detail_pegawai($id){
        //menampilkan data detail pegawai
        $this->load->library('date');
        $data_pegawai=$this->slng->get_data_pegawai_id($id);
        $data['header']='Detail data '.$data_pegawai['nama'];
        foreach($data_pegawai as $key=>$item){
            $data['pegawai'][$key]=$item;
        }
        $this->load->view('simdik/penyelenggaraan/ajax_detail_pegawai',$data);
    
    }
    
    function tambah_pegawai(){
        //menampilkan form untuk memasukkan data pegawai yg belum ada di database
        $data['sub_title']='Penambahan Peserta';
        $list_program = $this->rnc->get_program($this->thn);
        $data['pil_program']=array(-1=>'Pilih diklat');
        foreach($list_program as $program){
            $data['pil_program'][$program['id']]=$program['name'];
        }
        $this->template->display('simdik/penyelenggaraan/add_pegawai',$data);
    }
    
    function tambah_pegawai_process(){
        //process penambahan pegawai
    }
    
    function edit_pegawai($id){
        //menampilkan form untuk edit data pegawai
    }
    
    function edit_pegawai_process(){
        //process penyimpanan data pegawai
    }
    
    function delete_process($id){
        //process menghapus 
    }    
    
}
