<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dashboard
 *
 * @author bharata
 */
class Dashboard extends Penyelenggaraan_Controller{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('mdl_penyelenggaraan','slng');
    }
    
    function index(){
        $this->home();
    }
    
    function home(){
        
    }
}
