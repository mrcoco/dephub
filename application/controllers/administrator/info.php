<?php
/**
 * Description of info
 *
 * @author irhamnurhalim
 */
class Info extends Administrator_Controller{
    public function index()
    {
	$data['sub_title']='Informasi Umum';
	$info=$this->mdl_administrator->get_info();
	if($info->num_rows() <= 0)
	{
	    $data['info']='';
	} else {
	    $data['info']=$info->row()->info;
	}
	$this->template->display('simdik/administrator/info',$data);
    }

    function update()
    {
    }

}

/* End of file info.php */
/* Location: ./application/controllers/administrator/info.php */