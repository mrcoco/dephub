<?php
class Pegawai extends CI_Controller{
    
    protected $thn;
    
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('is_login')){
            redirect(base_url());
        }
        $this->load->model('mdl_penyelenggaraan','slng');
        $this->load->model('mdl_perencanaan','rnc');
        $this->thn = date('Y');
    }
    
    function index(){
        $this->list_pegawai();
    }
    
    function list_pegawai(){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //beentuknya kaya approve2 gitu, yg di list adalah list pegawai yg belum menjadi widyaiswara/non-widyaiswara
        $data['sub_title']='List Pegawai';
        $this->template->display('pegawai/list_pegawai',$data);
    }
    
    //function list_pegawai($page=1,$filter='all')
    function list_pegawai_ajax($page=1,$filter=''){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //melist pegawai, pake paging dan ada filter berdasarkan instansi
        $data['cur_page']=$page;
        $data['per_page']=25;
        $data['filter']= str_replace('%20', ' ', $filter);
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
        $data['array']=$this->slng->get_pegawai($data['per_page'],$data['offset'],$data['filter']);
        $data['num_res']=$this->slng->count_pegawai($filter);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
        echo $this->load->view('pegawai/ajax_list_pegawai',$data,true);
    }
    
    function detail_pegawai($id){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan data detail pegawai
        $this->load->library('date');
        $data_pegawai=$this->slng->get_data_pegawai_id($id);
        $data['header']='Detail data '.$data_pegawai['nama'];
        foreach($data_pegawai as $key=>$item){
            $data['pegawai'][$key]=$item;
        }
        $data_history=$this->slng->get_history($id);

        $data['history']=$data_history;
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $this->load->view('pegawai/ajax_detail_pegawai',$data);
    
    }
    
    function detail_pegawai_print($id){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan data detail pegawai
        $this->load->library('date');
        $this->load->helper('pdfexport_helper.php');
        $data_pegawai=$this->slng->get_data_pegawai_id($id);
        $data['header']='Detail data '.$data_pegawai['nama'];
        foreach($data_pegawai as $key=>$item){
            $data['pegawai'][$key]=$item;
        }
        $data_history=$this->slng->get_history($id);

        $data['history']=$data_history;
        $data['pageTitle'] = "Annual Report";
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $data['htmView'] = $this->load->view('pegawai/cv_pegawai',$data,TRUE);
        //$this->load->view('pegawai/cv_pegawai',$data,TRUE);
                      
        pdf_create($data['htmView'],'detail_pegawai');                                                                    
    }
    
    function tambah_pegawai(){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //menampilkan form untuk memasukkan data pegawai yg belum ada di database
        $data['sub_title']='Penambahan Pegawai';
        $data['pil_pendidikan']=$this->rnc->get_list_pendidikan();
        $data['pil_pangkat']=$this->rnc->get_pangkat_gol();
        $pil_instansi=$this->slng->getall_instansi();
        
        $data['pil_instansi'][-1]='-- Pilih --';
        foreach($pil_instansi as $p){
            $data['pil_instansi'][$p['kode_kantor']]=$p['nama_instansi'];
        }
        $this->template->display('pegawai/add_pegawai',$data);
    }
    
    function tambah_pegawai_process(){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        //process penambahan pegawai
        foreach($_POST as $key => $val){
            $data[$key]=$this->input->post($key);
        }
        $this->slng->insert_pegawai($data);
        
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Pegawai telah ditambahkan'));
        redirect(base_url().'pegawai');
    }
    
    function edit_pegawai($id){
    }
    
    function edit_pegawai_process(){
    }
    
    function delete_process($id){
    }
    
    function json_list_pegawai($kodekantor){
        $list_peserta=$this->slng->get_peserta($kodekantor);
        $array_list=array();
        $n=0;
        foreach($list_peserta as $l){
            $array_list[$n]=$l['nip'];
            $n++;
        }
        echo json_encode($array_list);
    }
    
    function json_data_pegawai($nip){
        $data_peserta=$this->slng->get_data_peserta($nip);
        $tmtpns = date_create_from_format('Y-m-d', $data_peserta['tmtpns']);
        $tgl_lhr = date_create_from_format('Y-m-d', $data_peserta['tanggal_lahir']);
        $data_peserta['masa_kerja']=date('Y')-date_format($tmtpns,'Y');
        $data_peserta['usia']=date('Y')-date_format($tgl_lhr,'Y');
        echo json_encode($data_peserta);
    }
    
    function ajax_detail_peserta($id){
        $this->load->library('date');
        $data_peserta=$this->slng->get_data_peserta_id($id);
        $data['header']='Detail data '.$data_peserta['nama'];
        foreach($data_peserta as $key=>$item){
            if($key!='foto'){
                if($item==''){
                    $item='-';
                }
            }else{
                if($item==''){
                    $item=base_url().'assets/public/foto/nopic.jpg';
                }
            }
            $data['peserta'][$key]=$item;
        }
        $this->load->view('pegawai/ajax_detail_peserta',$data);
    }
    
    function ajax_history_pelatihan($id){
        $history=$this->slng->get_history($id);
        $data_peserta=$this->slng->get_data_peserta_id($id);
        
        $header='History pelatihan '.$data_peserta['nama'];
        
        if(count($history)==0){
            $data='Tidak ada data history pelatihan';
        }else{
            $data='<ul>';
            foreach($history as $h){
                $data.='<li>'.$h['tahun'].' : '.$h['nama_pelatihan'].'</li>';
            }
            $data.='</ul>';
        }
        $text = '<div class="modal-header">
                    <h3>'.$header.'</h3>
                </div>
                <div class="modal-body">'.$data.'</div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>';
        echo $text;
    }
}
