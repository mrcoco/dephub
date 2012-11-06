<?php
//indexing buku
class Perpustakaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('mdl_elibrary','elib');
                $this->load->library('pagination');
	}
        function index(){
            $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
            $this->template->display_lib('main/elibrary/perpustakaan/index_perpustakaan', $data);
        }
        function view($id) //buat nampilin satuan
	{
                
                $data = array('books' => $this->elib->get_books_by_id($id));
      
		$this->template->display_lib('main/elibrary/perpustakaan/single_view', $data);
		
                
	}
        function input(){
            $data = array(
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author()
                );
            $this->template->display_lib('main/elibrary/perpustakaan/books_form', $data);
            
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
                        redirect(base_url().'elibrary/digital/type');
//			$this->template->display_lib('main/elibrary/upload_success', $data);
        }
        
        function search()
	{
                $string=$this->input->post('search');
                $data = array('books' => $this->elib->search_books_by_title_or_author($string));
                
		$this->template->display_lib('main/elibrary/perpustakaan/search-result', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
                
	}
        
        
        function edit_books($id) {

            $data = array('books' => $this->elib->get_books_by_id($id),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>' '
                );
            if($data['books']){
                $this->template->display_lib('main/elibrary/perpustakaan/edit_form', $data);
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/perpustakaan/category');                    
            }
            
        }
        
        function do_edit_books() {
            
			$data['update']['title']=$this->input->post('title');
			$data['update']['keterangan']=$this->input->post('keterangan');
                        $data['update']['tags']=$this->input->post('tags');
                        $data['update']['edition']=$this->input->post('edition');
                        $data['update']['frequency']=$this->input->post('frequency');
                        $data['update']['issnisbn']=$this->input->post('issnisbn');
                        $data['update']['publisher']=$this->input->post('publisher');
                        $data['update']['publisherplace']=$this->input->post('publisherplace');
                        $data['update']['stock']=$this->input->post('stock');
                        $data['update']['digital']=$this->input->post('digital');
                        $data['update']['id']=$this->input->post('id');
                        
                        $category=$this->elib->get_id_category_by_name($this->input->post('categoryname'));
                        $data['update']['idcategory']=$category['idcategory'];
                        $author=$this->elib->get_id_author_by_name($this->input->post('authorname'));
                        $data['update']['idauthor']=$author['idauthor'];
                         
            if($this->elib->update_books($data['update']))
            {
            $data = array('books' => $this->elib->get_books_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data berhasil diubah'
                 );
            
                 $this->session->set_flashdata('msg',$this->editor->alert_ok('Buku telah diubah'));
                 redirect(base_url().'elibrary/perpustakaan/category');
            }
            else {
                $data = array('books' => $this->elib->get_books_by_id($update['id']),
                'category'=>$this->elib->get_category(),
                'author'=>$this->elib->get_author(),
                'status'=>'Data tidak berhasil diubah');
                $this->session->set_flashdata('msg',$this->editor->alert_ok('File gagal diubah'));
                redirect(base_url().'elibrary/perpustakaan/category');
            }
            
//=======
            
            

        }
        
        function category()
	{
                $category=$this->elib->get_id_category_by_name($this->input->post('category'));
                           
                $data=array('books'=>$this->elib->get_books_by_category($category),'category'=> $this->input->post('category'));
		$this->template->display_lib('main/elibrary/perpustakaan/category-view', $data);
		//$this->load->view('main/elibrary/user', array('error' => ' ' ));
	}

        function delete_books($id){
            $data = array('books' => $this->elib->get_books_by_id($id));
            $data['sub_title']='Kategori File';
            
            if($data['books']){
                //unlink($data['bibliography']['location']); 
                $this->elib->delete_books($id);
                $this->session->set_flashdata('msg',$this->editor->alert_error('File telah dihapus'));
                redirect(base_url().'elibrary/type');                    
            }else{
                $this->session->set_flashdata('msg',$this->editor->alert_error('File tidak ditemukan'));
                redirect(base_url().'elibrary/type');                    
            }
            
        }
        
}
?>