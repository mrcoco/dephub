<?php
class Setting extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_administrator','adm');
        if($this->session->userdata('id_role')!=1){
            redirect(base_url().'error/error_priv');
        }
    }
    
    function info_pusbang(){
        
    }
    
    function list_priviledge(){
        
    }
    
    function assign_priviledge(){
        
    }
}
