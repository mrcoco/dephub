<?php
/**
 * Description of dashboard
 *
 * @author irhamnurhalim
 */
class Dashboard extends Administrator_Controller{
    
    protected $thn_default;
    
    function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index()
    {
        $this->daftar_diklat();
    }
    function daftar_diklat($thn=''){
        if($thn==''){
            $thn=$this->thn_default;
        }
	$data['sub_title']='Daftar Diklat Tahun '.$thn;
        $data['program']=$this->rnc->get_program($thn);
	$this->template->display('simdik/administrator/daftar_diklat',$data);
    }


}

/* End of file dashboard.php */
/* Location: ./application/controllers/administrator/dashboard.php */