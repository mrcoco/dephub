<?php
class User extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_user','usr');
        $this->load->model('mdl_penyelenggaraan','slng');
    }
    
    function index(){
        $this->list_user();
    }
    
    function list_user(){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        $data['sub_title']='Daftar User Manajemen Diklat';
        $data['list']=$this->usr->get_list_user();
        $data['role']=$this->usr->nama_role();
        //var_dump($data['role']);
        $this->template->display('user/list_user',$data);
    }
    
    function manage_user(){
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
        $data['sub_title']='Daftar Pegawai Transportasi';
        $this->template->display('user/manage_user',$data);
    }
    
    function list_pegawai_ajax($page=1,$filter=''){
        //melist pegawai, pake paging dan ada filter berdasarkan instansi
        $data['role']=$this->usr->nama_role();
        $data['cur_page']=$page;
        $data['per_page']=25;
        $data['filter']= str_replace('%20', ' ', $filter);
        $data['offset']=($data['cur_page']-1)*$data['per_page'];
        $data['array']=$this->slng->get_role_pegawai($data['per_page'],$data['offset'],$data['filter']);
        $data['num_res']=$this->slng->count_pegawai($filter);
        $data['num_page']=ceil($data['num_res']/$data['per_page']);
        echo $this->load->view('user/ajax_list_pegawai',$data,true);
    }
    function update_status($jenis,$id){
        $this->usr->update_role($jenis,$id);
        return 1;
    }
    function update_user(){
        extract($_POST);
//        if($password){
//            if($password==$password2){
//                $data['password']=md5($password);
//            }else{
//                $this->session->set_flashdata('msg',$this->editor->alert_error('Konfirmasi password tidak sesuai'));
//                redirect(base_url('user/edit_user'));
//            }
//        }
        $data['username']=$username;
        if($_FILES['foto']['size']){
            $user=$this->usr->get_user_by_id($id);
            $filename=$user['nip'];
            $config['file_name']=$filename;
            $config['overwrite']=TRUE;
            $config['upload_path'] = 'assets/public/foto/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']	= '200';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload', $config);
            if ( !$this->upload->do_upload('foto'))
            {
                $error = $this->upload->display_errors('','');
                $this->session->set_flashdata('msg',$this->editor->alert_error($error));
                redirect(base_url('user/edit_user'));
            }else{
                $file_data=$this->upload->data();
                $data['foto']=$filename.$file_data['file_ext'];
            }
        }
        $this->usr->update_user($id,$data);
        $this->session->set_flashdata('msg',$this->editor->alert_ok('Akun telah diubah'));
        redirect(base_url('user/edit_user'));
    }
    function delete_user($id){
        $this->usr->delete($id);
        $this->session->set_flashdata('msg',$this->editor->alert_warning('User role telah dihapus'));
        redirect(base_url('user'));
    }
    function edit_user(){
        $data['sub_title']='Ubah Akun User';
        $id=$this->session->userdata('id');
        $data['user']=$this->usr->get_user_by_id($id);
        if($data['user']['foto']==''){
            $data['user']['foto']='nopic.jpg';
        }

//        print_r($data['user']);
        $this->template->display('user/edit',$data);
    }
}
