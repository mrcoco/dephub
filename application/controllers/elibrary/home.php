<?php
class Home extends CI_Controller{
    function index(){
        $this->template->display_lib('elibrary/index');
    }
}
