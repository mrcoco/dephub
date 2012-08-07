<?php
/**
 * Description of perencanaan
 *
 * @author irhamnurhalim
 */
class Dashboard extends Perencanaan_Controller{

    public function index()
    {
	$data['title']='Bidang Perencanaan';
	$this->template->display('simdik/perencanaan/dashboard',$data);
    }
}
/* End of file dashboard.php */
/* Location: ./application/controllers/perencanaan/dashboard.php */