<?php

class Digital extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('mdl_elibrary', 'elib');
        $this->load->library('pagination');
    }

    function index() {
        $data = array(
            'category' => $this->elib->get_category(),
            'author' => $this->elib->get_author()
        );
        $this->template->display_lib('elibrary/digital/index_digital', $data);
    }

    function search() {
        $string = $this->input->post('search');
        $data = array('bibliography' => $this->elib->search_bibliography_by_title_or_author($string));

        $this->template->display_lib('elibrary/digital/search-result', $data);
    }

    function view($id) { //buat nampilin satuan

        $data = array('bibliography' => $this->elib->get_bibliography_by_id($id));

        $this->template->display_lib('elibrary/digital/single_view', $data);
    }

    function type($tipe = '') {
        $config = array();


        if ($tipe == '') {
            $data = array('bibliography' => $this->elib->getall_bibliography());
            $data["links"] = '';
            $this->template->display_lib('elibrary/digital/type-view', $data);
            return 0;
        } else if ($tipe == 'lain') {
            $typenumber = 0;
            $config["base_url"] = base_url() . "elibrary/digital/type/lain/";
        } else if ($tipe == 'dokumen') {
            $typenumber = 1;
            $config["base_url"] = base_url() . "elibrary/digital/type/dokumen/";
        } else if ($tipe == 'video') {
            $typenumber = 2;
            $config["base_url"] = base_url() . "elibrary/digital/type/video/";
        } else if ($tipe == 'presentasi') {
            $typenumber = 3;
            $config["base_url"] = base_url() . "elibrary/digital/type/presentasi/";
        }

        $config["total_rows"] = $this->elib->count_bibliography_by_type($typenumber);
        $config["per_page"] = 20;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

        $data = array('bibliography' => $this->elib->get_bibliography_by_type($typenumber, $config["per_page"], $page));
        $data["links"] = $this->pagination->create_links();
        $this->template->display_lib('elibrary/digital/type-view', $data);
        //$this->load->view('main/elibrary/user', array('error' => ' ' ));
    }

    function category($idcategory = '') {
        if ($idcategory == '') {
            $data = array(
                'category' => $this->elib->get_category(),
                'author' => $this->elib->get_author()
            );
            $this->template->display_lib('elibrary/digital/index_digital', $data);
        } else {
            $config = array();

            $config["base_url"] = base_url() . "elibrary/digital/category/" . $idcategory . "/";
            $config["total_rows"] = $this->elib->count_bibliography_by_category($idcategory);
            $config["per_page"] = 20;
            $config["uri_segment"] = 5;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(5)) ? $this->uri->segment(5) : 0;

            $data = array('bibliography' => $this->elib->get_bibliography_by_category($idcategory, $config["per_page"], $page),
                'category' => $this->elib->get_name_category_by_id($idcategory)
            );
            $data["links"] = $this->pagination->create_links();
            $this->template->display_lib('elibrary/digital/category-view', $data);
        }
    }

}