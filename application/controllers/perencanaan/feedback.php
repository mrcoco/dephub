<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of perencanaan
 *
 * @author irhamnurhalim
 */
class Feedback extends Perencanaan_Controller{
    protected $thn_default;
    public function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan','rnc');
    }

    public function index(){
        redirect(base_url().'perencanaan/diklat');                    
    }

    function form_feedback_sarpras($id_program){
        $data['sub_title']='Formulir Evaluasi Penyelenggaraan';
        $data['program']=$this->rnc->get_program_by_id($id_program);
        if($data['program']){
            $this->template->display('simdik/perencanaan/form_feedback_sarpras',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'perencanaan/dashboard');                    
        }
    }

    function insert_feedback_sarpras(){
        $data['id_program']=$this->input->post('id_program');

        $data['1a']=$this->input->post('1a1').'###'.$this->input->post('1a2').'###'.$this->input->post('1a3');
        $data['1b']=$this->input->post('1b1').'###'.$this->input->post('1b2').'###'.$this->input->post('1b3');
        $data['1c']=$this->input->post('1c1').'###'.$this->input->post('1c2').'###'.$this->input->post('1c3');
        $data['1d']=$this->input->post('1d1').'###'.$this->input->post('1d2').'###'.$this->input->post('1d3');
        $data['1e']=$this->input->post('1e1').'###'.$this->input->post('1e2').'###'.$this->input->post('1e3');

        $data['2a']=$this->input->post('2a1').'###'.$this->input->post('2a2').'###'.$this->input->post('2a3');
        $data['2b']=$this->input->post('2b1').'###'.$this->input->post('2b2').'###'.$this->input->post('2b3');
        $data['2c']=$this->input->post('2c1').'###'.$this->input->post('2c2').'###'.$this->input->post('2c3');
        $data['2d']=$this->input->post('2d1').'###'.$this->input->post('2d2').'###'.$this->input->post('2d3');
        $data['2e']=$this->input->post('2e1').'###'.$this->input->post('2e2').'###'.$this->input->post('2e3');
        $data['2f']=$this->input->post('2f1').'###'.$this->input->post('2f2').'###'.$this->input->post('2f3');
        $data['2g']=$this->input->post('2g1').'###'.$this->input->post('2g2').'###'.$this->input->post('2g3');
        $data['2h']=$this->input->post('2h1').'###'.$this->input->post('2h2').'###'.$this->input->post('2h3');
        $data['2i']=$this->input->post('2i1').'###'.$this->input->post('2i2').'###'.$this->input->post('2i3');
        $data['2j']=$this->input->post('2j1').'###'.$this->input->post('2j2').'###'.$this->input->post('2j3');
        $data['2k']=$this->input->post('2k1').'###'.$this->input->post('2k2').'###'.$this->input->post('2k3');
        $data['2l']=$this->input->post('2l1').'###'.$this->input->post('2l2').'###'.$this->input->post('2l3');

        $data['3a']=$this->input->post('3a1').'###'.$this->input->post('3a2').'###'.$this->input->post('3a3');
        $data['3b']=$this->input->post('3b1').'###'.$this->input->post('3b2').'###'.$this->input->post('3b3');
        $data['3c']=$this->input->post('3c1').'###'.$this->input->post('3c2').'###'.$this->input->post('3c3');
        $data['3d']=$this->input->post('3d1').'###'.$this->input->post('3d2').'###'.$this->input->post('3d3');
        $data['3e']=$this->input->post('3e1').'###'.$this->input->post('3e2').'###'.$this->input->post('3e3');
        $data['3f']=$this->input->post('3f1').'###'.$this->input->post('3f2').'###'.$this->input->post('3f3');

        $data['manfaat']=$this->input->post('manfaat');
        $data['kelebihan_catering']=$this->input->post('kelebihan_catering');
        $data['kekurangan_catering']=$this->input->post('kekurangan_catering');
        $data['keterangan']=$this->input->post('keterangan');

        $this->rnc->insert_feedback_sarpras($data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah ditambahkan'));
        redirect(base_url().'perencanaan/diklat/detail_diklat/'.$data['id_program']);        
    }

    function edit_feedback_sarpras($id_feedback){
        $data['sub_title']='Ubah Evaluasi Penyelenggaraan';

        $data_feedback = $this->rnc->get_feedback_sarpras($id_feedback);
        if($data_feedback){
            $data['id']=$data_feedback['id'];
            $data['id_progam']=$data_feedback['id_program'];
            $data['program']=$this->rnc->get_program_by_id($data['id_progam']);
            $data['f1a']=  explode('###', $data_feedback['1a']);
            $data['f1b']=  explode('###', $data_feedback['1b']);
            $data['f1c']=  explode('###', $data_feedback['1c']);
            $data['f1d']=  explode('###', $data_feedback['1d']);
            $data['f1e']=  explode('###', $data_feedback['1e']);

            $data['f2a']=  explode('###', $data_feedback['2a']);
            $data['f2b']=  explode('###', $data_feedback['2b']);
            $data['f2c']=  explode('###', $data_feedback['2c']);
            $data['f2d']=  explode('###', $data_feedback['2d']);
            $data['f2e']=  explode('###', $data_feedback['2e']);
            $data['f2f']=  explode('###', $data_feedback['2f']);
            $data['f2g']=  explode('###', $data_feedback['2g']);
            $data['f2h']=  explode('###', $data_feedback['2h']);
            $data['f2i']=  explode('###', $data_feedback['2i']);
            $data['f2j']=  explode('###', $data_feedback['2j']);
            $data['f2k']=  explode('###', $data_feedback['2k']);
            $data['f2l']=  explode('###', $data_feedback['2l']);

            $data['f3a']=  explode('###', $data_feedback['3a']);
            $data['f3b']=  explode('###', $data_feedback['3b']);
            $data['f3c']=  explode('###', $data_feedback['3c']);
            $data['f3d']=  explode('###', $data_feedback['3d']);
            $data['f3e']=  explode('###', $data_feedback['3e']);
            $data['f3f']=  explode('###', $data_feedback['3f']);

            $data['manfaat']=$data_feedback['manfaat'];
            $data['kelebihan_catering']=$data_feedback['kelebihan_catering'];
            $data['kekurangan_catering']=$data_feedback['kekurangan_catering'];
            $data['keterangan']=$data_feedback['keterangan'];
            $this->template->display('simdik/perencanaan/form_edit_feedback_sarpras',$data);
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Feedback tidak ditemukan'));
            redirect(base_url().'perencanaan/dashboard');                    
        }

    }

    function update_feedback_sarpras(){

        $clause=$this->input->post('id');

        $data['id_program']=$this->input->post('id_program');

        $data['1a']=$this->input->post('1a1').'###'.$this->input->post('1a2').'###'.$this->input->post('1a3');
        $data['1b']=$this->input->post('1b1').'###'.$this->input->post('1b2').'###'.$this->input->post('1b3');
        $data['1c']=$this->input->post('1c1').'###'.$this->input->post('1c2').'###'.$this->input->post('1c3');
        $data['1d']=$this->input->post('1d1').'###'.$this->input->post('1d2').'###'.$this->input->post('1d3');
        $data['1e']=$this->input->post('1e1').'###'.$this->input->post('1e2').'###'.$this->input->post('1e3');

        $data['2a']=$this->input->post('2a1').'###'.$this->input->post('2a2').'###'.$this->input->post('2a3');
        $data['2b']=$this->input->post('2b1').'###'.$this->input->post('2b2').'###'.$this->input->post('2b3');
        $data['2c']=$this->input->post('2c1').'###'.$this->input->post('2c2').'###'.$this->input->post('2c3');
        $data['2d']=$this->input->post('2d1').'###'.$this->input->post('2d2').'###'.$this->input->post('2d3');
        $data['2e']=$this->input->post('2e1').'###'.$this->input->post('2e2').'###'.$this->input->post('2e3');
        $data['2f']=$this->input->post('2f1').'###'.$this->input->post('2f2').'###'.$this->input->post('2f3');
        $data['2g']=$this->input->post('2g1').'###'.$this->input->post('2g2').'###'.$this->input->post('2g3');
        $data['2h']=$this->input->post('2h1').'###'.$this->input->post('2h2').'###'.$this->input->post('2h3');
        $data['2i']=$this->input->post('2i1').'###'.$this->input->post('2i2').'###'.$this->input->post('2i3');
        $data['2j']=$this->input->post('2j1').'###'.$this->input->post('2j2').'###'.$this->input->post('2j3');
        $data['2k']=$this->input->post('2k1').'###'.$this->input->post('2k2').'###'.$this->input->post('2k3');
        $data['2l']=$this->input->post('2l1').'###'.$this->input->post('2l2').'###'.$this->input->post('2l3');

        $data['3a']=$this->input->post('3a1').'###'.$this->input->post('3a2').'###'.$this->input->post('3a3');
        $data['3b']=$this->input->post('3b1').'###'.$this->input->post('3b2').'###'.$this->input->post('3b3');
        $data['3c']=$this->input->post('3c1').'###'.$this->input->post('3c2').'###'.$this->input->post('3c3');
        $data['3d']=$this->input->post('3d1').'###'.$this->input->post('3d2').'###'.$this->input->post('3d3');
        $data['3e']=$this->input->post('3e1').'###'.$this->input->post('3e2').'###'.$this->input->post('3e3');
        $data['3f']=$this->input->post('3f1').'###'.$this->input->post('3f2').'###'.$this->input->post('3f3');

        $data['manfaat']=$this->input->post('manfaat');
        $data['kelebihan_catering']=$this->input->post('kelebihan_catering');
        $data['kekurangan_catering']=$this->input->post('kekurangan_catering');
        $data['keterangan']=$this->input->post('keterangan');

        $this->rnc->update_feedback_sarpras($data,$clause);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Feedback/evaluasi telah diubah'));
        redirect(base_url().'perencanaan/feedback/display_feedback_sarpras/'.$clause);        
    }

    function delete_feedback_sarpras($id){
        if($id){
            $this->rnc->delete_feedback_sarpras($id);
            $this->session->set_flashdata('msg',$this->editor->alert_warning('Feedback/evaluasi telah dihapus'));
            redirect(base_url().'perencanaan/diklat/detail_diklat/'.$id);        
        }else{
            $this->session->set_flashdata('msg',$this->editor->alert_error('Feedback tidak ditemukan'));
            redirect(base_url().'perencanaan/dashboard');
        }
    }

    function display_feedback_sarpras($id){
        $this->load->library('editor');
        $data['sub_title']='Hasil Evaluasi Penyelenggaraan';
        $data_feedback = $this->rnc->get_feedback_sarpras($id);
        if($data_feedback){
            $data['id']=$data_feedback['id'];
            $data['id_progam']=$data_feedback['id_program'];
            $data['program']=$this->rnc->get_program_by_id($data['id_progam']);
            $data['f1a']=  explode('###', $data_feedback['1a']);
            $data['f1b']=  explode('###', $data_feedback['1b']);
            $data['f1c']=  explode('###', $data_feedback['1c']);
            $data['f1d']=  explode('###', $data_feedback['1d']);
            $data['f1e']=  explode('###', $data_feedback['1e']);

            $data['f2a']=  explode('###', $data_feedback['2a']);
            $data['f2b']=  explode('###', $data_feedback['2b']);
            $data['f2c']=  explode('###', $data_feedback['2c']);
            $data['f2d']=  explode('###', $data_feedback['2d']);
            $data['f2e']=  explode('###', $data_feedback['2e']);
            $data['f2f']=  explode('###', $data_feedback['2f']);
            $data['f2g']=  explode('###', $data_feedback['2g']);
            $data['f2h']=  explode('###', $data_feedback['2h']);
            $data['f2i']=  explode('###', $data_feedback['2i']);
            $data['f2j']=  explode('###', $data_feedback['2j']);
            $data['f2k']=  explode('###', $data_feedback['2k']);
            $data['f2l']=  explode('###', $data_feedback['2l']);

            $data['f3a']=  explode('###', $data_feedback['3a']);
            $data['f3b']=  explode('###', $data_feedback['3b']);
            $data['f3c']=  explode('###', $data_feedback['3c']);
            $data['f3d']=  explode('###', $data_feedback['3d']);
            $data['f3e']=  explode('###', $data_feedback['3e']);
            $data['f3f']=  explode('###', $data_feedback['3f']);

            $data['manfaat']=$data_feedback['manfaat'];
            $data['kelebihan_catering']=$data_feedback['kelebihan_catering'];
            $data['kekurangan_catering']=$data_feedback['kekurangan_catering'];
            $data['keterangan']=$data_feedback['keterangan'];
            $this->template->display('simdik/perencanaan/display_feedback_sarpras',$data);
        }else{      
            $this->session->set_flashdata('msg',$this->editor->alert_error('Belum ada feedback/evaluasi yang dimasukkan'));
            redirect(base_url().'perencanaan/diklat/detail_diklat/'.$id);        
        }
    }

}
