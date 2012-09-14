<?php
class Pembicara_int extends Penyelenggaraan_Controller{
    
    protected $thn;
    
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
	$this->list_pembicara();       
    }
     
    function list_pembicara(){
        //menampilkan daftar pembicara dengan status widyaiswara dan non-widyaiswara
    }
    
    function detail_pembicara($id){
        //menampilkan data detail, sama seperti menampilkan data detail pegawai
    }
    
    function add_pembicara(){
        //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
        $data['sub_title']='List Pegawai';
        $this->template->display('simdik/penyelenggaraan/add_pembicara_int',$data);
    }
    
    function ajax_list($page,$filter=''){
        $data['cur_page']=$page;
        $data['per_page']=25;
        $data['filter']=$filter;
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
        $data['array']=$this->slng->get_pegawai_pembicara($data['per_page'],$data['offset'],$data['filter']);
        $data['num_res']=$this->slng->count_pegawai_pembicara($filter);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
        echo $this->load->view('simdik/penyelenggaraan/ajax_list',$data,true);
    }
    
    function update_status($jenis,$id){
        $this->slng->update_pembicara($jenis,$id);
        return 1;
    }
}
