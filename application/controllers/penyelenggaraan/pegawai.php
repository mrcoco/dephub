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
    
    function list_pegawai($page=1,$filter='all'){
        //melist pegawai, pake paging dan ada filter berdasarkan instansi
    }
    
    function detail_pegawai($id){
        //menampilkan data detail pegawai
    }
    
    function tambah_pegawai(){
        //menampilkan form untuk memasukkan data pegawai yg belum ada di database
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
