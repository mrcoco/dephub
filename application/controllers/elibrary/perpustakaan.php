<?php
//indexing buku
class Perpustakaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
	}
        function search()
	{
                $string=$this->input->post('search');
                $data = array('bibliography' => $this->elib->search_books_by_title_or_author($string));
                
		$this->template->display_lib('main/elibrary/search-result', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
                
	}
        
        
        function edit_books($id) {

            $data = array('bibliography' => $this->elib->get_books_by_id($id),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>' '
                );
            if($data['bibliography']){
                $this->template->display_lib('main/elibrary/edit_form', $data);
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/perpustakaan/category');                    
            }
            
//>>>>>>> f95c095cb0ce5bf053a6af135ea10b40ef7bd6b9
        }
        
        function do_edit_books() {
            $update['id']=$this->input->post('id');
            $update['title']=$this->input->post('title');
            $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
            $update['idcategory']=$category['idcategory'];
            $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
            $update['idauthor']=$author['idauthor'];
            $update['keterangan']=$this->input->post('keterangan');
//<<<<<<< HEAD
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
            
//=======
            $this->elib->update_bibliography($update);           
            $this->session->set_flashdata('msg',$this->editor->alert_ok('File telah diubah'));
            redirect(base_url().'elibrary/perpustakaan/category');

        }
        
        function category($category='')
	{
                
                
		$this->template->display_lib('main/elibrary/type-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

        function delete_books($id){
            $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['bibliography']){
                //unlink($data['bibliography']['location']); 
                $this->elib->delete_bibliography($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/type');                    
            }
            
        }
        
}
?>