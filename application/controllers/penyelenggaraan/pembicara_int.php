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
     
    function list_pembicara($page=1,$filter=""){
        //menampilkan daftar pembicara dengan status widyaiswara dan non-widyaiswara
    }
    
    function detail_pembicara($id){
        //menampilkan data detail, sama seperti menampilkan data detail pegawai
    }
    
    function add_pembicara($page=1,$filter=""){
        //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
    }
}
