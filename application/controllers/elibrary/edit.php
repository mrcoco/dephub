<?php

class Edit extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}

	function index()
	{
		$this->template->display_lib('main/elibrary/edit_page');
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

	function bibliography($id) {
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>' '
                );
            $this->template->display_lib('main/elibrary/edit_form', $data);
        }
        
        function edit_bibliography() {
            $update['id']=$this->input->post('id');
            $update['title']=$this->input->post('title');
            $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
            $update['idcategory']=$category['idcategory'];
            $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
            $update['idauthor']=$author['idauthor'];
            $update['keterangan']=$this->input->post('keterangan');
            $update['tags']=$this->input->post('tags');
            if($this->elib->update_bibliography($update))
            {
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data berhasil diubah'
                 );
            }
            else {
                $data = array('bibliography' => $this->elib->get_bibliography_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data tidak berhasil diubah');
            }
            $this->template->display_lib('main/elibrary/edit_form', $data);
        }
}
?>