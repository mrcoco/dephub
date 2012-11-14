<?php
class Error extends CI_Controller{
    function __construct() {
        parent::__construct();
    }
    function index(){
        $this->error_priv();
    }
    function error_priv(){
        $this->template->display('error/error_priv');
    }
}
