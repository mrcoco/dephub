<?php

/**
 * Description of config
 *
 * @author irhamnurhalim
 */
class Config extends Administrator_Controller {

    public function index()
    {
	$this->update_link();
    }

    function update_link()
    {
	$this->_set_rules();
	if ($this->form_validation->run() === FALSE) {
	    $data['sub_title'] = 'Pengaturan Situs';
	    $data['action']='administrator/config/update_link';
	    $data['link']['administrator']=$this->mdl_administrator->get_link(4)->row();
	    $data['link']['perencanaan']=$this->mdl_administrator->get_link(1)->row();
	    $data['link']['penyelenggaraan']=$this->mdl_administrator->get_link(2)->row();
	    $data['link']['sarpras']=$this->mdl_administrator->get_link(3)->row();
	    $this->template->display('simdik/administrator/config', $data);
	} else {
	    $var['perencanaan']=array('link'=>$this->input->post('perencanaan'));
	    $var['penyelenggaraan']=array('link'=>$this->input->post('penyelenggaraan'));
	    $var['sarpras']=array('link'=>$this->input->post('sarpras'));
	    $var['administrator']=array('link'=>$this->input->post('administrator'));
	    $q=$this->mdl_administrator->update_link($var);
	    if($var)
	    {
		$this->session->set_flashdata('msg',$this->editor->alert_ok('Link berhasil diperbarui'));
		redirect('administrator/config');
	    } else {
		$this->session->set_flashdata('msg',$this->editor->alert_error('Terjadi kesalahan'));
	    }
	}
    }

    function update_maintenance()
    {
	$this->_set_rules();
	if ($this->form_validation->run() === FALSE) {
	    $data['sub_title'] = 'Pengaturan Situs';
	    $data['action']='administrator/config/update_maintenance';
	    $this->template->display('simdik/administrator/config_maintenance', $data);
	} else {
	    $q=$this->mdl_administrator->update_maintenance($var);
	    if($var)
	    {
		$this->session->set_flashdata('msg',$this->editor->alert_ok('Site is ofline'));
		redirect('administrator/config/update_maintenance');
	    } else {
		$this->session->set_flashdata('msg',$this->editor->alert_error('Terjadi kesalahan'));
	    }
	}
    }

    function _set_rules()
    {
	$this->load->library('form_validation');
	$this->form_validation->set_rules('set','Set','required|trim');
    }

}