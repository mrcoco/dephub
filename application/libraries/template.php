<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of template
 *
 * @author Administrator
 */
class Template {
    protected $ci;

    // Constructor
    function __construct() {
        $this->_ci = &get_instance();
    }

    // Default Template
    function display($template, $data = null) {
        if(isset($data['title'])){
            $data['_title']=$data['title'];
        }else{
            $data['_title'] = $this->_ci->session->userdata('detail');
        }
        $data['_header'] = $this->_ci->load->view('template/header', $data, true);
        if($this->_ci->session->userdata('is_login')){
            $data['_menu'] = $this->_ci->load->view('template/menubar', $data, true);
        }
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('/template/main.php', $data);
    }
    
    function display_with_sidebar($template,$sidebar, $data = null) {
        if(isset($data['title'])){
            $data['_title']=$data['title'];
        }else{
            $data['_title'] = $this->_ci->session->userdata('detail');
        }
        $data['_header'] = $this->_ci->load->view('template/header', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('sidebar/sidebar_'.$sidebar, $data, true);
        if($this->_ci->session->userdata('is_login')){
            $data['_menu'] = $this->_ci->load->view('template/menubar', $data, true);
        }
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('/template/main.php', $data);
    }
    
    function display_lib($template, $data = null) {
        $data['_sidebar'] = $this->_ci->load->view('elibrary/sidebar', $data, true);            
        if(isset($data['title'])){
            $data['_title']=$data['title'];
        }else{
            $data['_title'] = 'E-library';
        }
        $data['_header'] = $this->_ci->load->view('template/header', $data, true);
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $this->_ci->load->view('/template/main.php', $data);
    }
}

/* End of file main.php */
/* Location: ./application/libraries/main.php */