<?php
/**
 * Description of dashboard
 *
 * @author irhamnurhalim
 */
class Dashboard extends Administrator_Controller{
    public function index()
    {
	$data['title']=$this->session->userdata('detail');
	$data['sub_title']='Dashboard';
	$this->template->display('simdik/administrator/dashboard',$data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/administrator/dashboard.php */