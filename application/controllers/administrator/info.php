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
	    $data['info']=$info->row()->diklat_message;
	}
	$this->template->display('simdik/administrator/info',$data);
    }

    function update()
    {
	$info = array(
	    'diklat_message'=>$this->input->post('info')
		);
	$q=$this->mdl_administrator->set_info($info);
	if($q)
	{
	    $this->session->set_flashdata('msg',$this->editor->alert_ok('Informasi Dashboard berhasil diupdate'));
	    redirect('administrator/info');
	}
    }

}

/* End of file info.php */
/* Location: ./application/controllers/administrator/info.php */