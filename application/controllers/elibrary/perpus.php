<?php
//tambah buku, edit buku
class Perpus extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}
        
        function input(){
            $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
            $this->template->display_lib('main/elibrary/form_buku', $data);
            
        }
        function do_input(){
            $data = array(
                            'category'=>$this->elib->get_category(),
                            'author'=>$this->elib->get_author()
                            );
			$data['insert']['title']=$this->input->post('title');
			$data['insert']['keterangan']=$this->input->post('keterangan');
                        $data['insert']['tags']=$this->input->post('tags');
                        $data['insert']['edition']=$this->input->post('edition');
                        $data['insert']['frequency']=$this->input->post('frequency');
                        $data['insert']['issnisbn']=$this->input->post('issnisbn');
                        $data['insert']['publisher']=$this->input->post('publisher');
                        $data['insert']['publisherplace']=$this->input->post('publisherplace');
                        $data['insert']['stock']=$this->input->post('stock');
                        $data['insert']['digital']=$this->input->post('digital');
                        
                        $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
                        $data['insert']['idcategory']=$category['idcategory'];
                        $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
                        $data['insert']['idauthor']=$author['idauthor'];
                        
			$this->elib->insert_books($data['insert']);
                        $this->session->set_flashdata('msg',$this->editor->alert_ok('Buku telah ditambah'+$data['insert']['title']));
                        redirect(base_url().'elibrary/type');
//			$this->template->display_lib('main/elibrary/upload_success', $data);
        }

}
?>