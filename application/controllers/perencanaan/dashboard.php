<?php
/**
 * Description of perencanaan
 *
 * @author irhamnurhalim
 */
class Dashboard extends Perencanaan_Controller{

    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }
    
    public function index(){
        $this->home();
        
    }
    
    function home($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
        $this->load->library('lib_perencanaan');
	$data['title']='Bidang Perencanaan';
        $data['kategori']=$this->rnc->get_kategori();
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('main/perencanaan/index',$data);
    }
    
    function buat_diklat(){
        $this->load->library('editor');
        $data['title']='Bidang Perencanaan';
        $kategori=$this->rnc->get_kategori();
        $data['pil_kategori']=array();
        foreach($kategori as $k){
            $data['pil_kategori'][$k['id']]=$k['name'];
        }
        $this->template->display('main/perencanaan/form_buat_diklat',$data);
    }
}
/* End of file dashboard.php */
/* Location: ./application/controllers/perencanaan/dashboard.php */