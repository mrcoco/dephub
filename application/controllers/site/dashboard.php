<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
	parent::__construct();
	$this->load->model('mdl_dashboard');
    }

    public function index() {
	$data['title'] = 'Selamat Datang';
	$this->template->display('main/uc', $data);
    }

    function email() {
	$data['title'] = 'E-Mail';
	$this->template->display('main/dashboard/email', $data);
    }

    function diklat() {
	if ($this->session->userdata('is_login')) {
	    redirect($this->session->userdata('link'));
	} else {
	    $data['title'] = 'Sistem Informasi Manajemen Diklat';
//	    $data['info']=$this->mdl_dashboard->get_info()->row()->diklat_message;
	    $this->template->display('main/dashboard/simdik', $data);
	}
    }

    function event() {
	$cal = $this->mdl_dashboard->get_all()->result_array();
	$i = 0;
	if ($this->mdl_dashboard->get_all()->num_rows() <= 0) {
	    $data[0]['id'] = '';
	    $data[0]['title'] = '';
	    $data[0]['start'] = '';
	    $data[0]['end'] = '';
	    $data[0]['url'] = '';
	} else {
	    foreach ($cal as $row) {
		$data[$i]['id'] = $row['id'];
		$data[$i]['title'] = $row['name'];
		$data[$i]['start'] = $row['tanggal_mulai'];
		$data[$i]['end'] = $row['tanggal_akhir'];
		$data[$i]['url'] = 'login/course_info/' . $row['id'];
		$i++;
	    }
	}
	$this->data['output'] = $data;
	$this->load->view('json_view', $this->data);
    }

    function kalender_diklat() {
	$data['title'] = 'Sistem Informasi Manajemen Diklat';
	$this->template->display('main/uc', $data);
    }

    function library() {
	$data['title'] = 'Perpustakaan';
	$this->template->display('main/uc', $data);
    }

    /*
     * E-Learning
     */

    function elearning() {
	$data['title'] = 'E-Learning';
	$course = $this->mdl_dashboard->get_course_moodle()->result_array();
	$data['content'] = '';
	foreach ($course as $row) {
	    $data['content'].='<h3>' . $row['fullname'] . '</h3>';
	    $data['content'].='<span style="font-size:\'9px\';color:#ccc"><i>Tanggal : ' . date('d M Y', $row['startdate']) . '</i></span>';
	    $data['content'].='<p>' . $row['summary'] . '</p>';
	    $data['content'].='<div align="right"><button class="btn" onclick="window.location=\'elearning/course/view.php?id=' . $row['id'] . '\'">Selengkapnya</button></div>';
	    $data['content'].='<br />';
	}
	$program = $this->mdl_dashboard->get_category_top()->result_array();
	$data['program_diklat'] = '';
	foreach ($program as $row_p) {
	    $sub_prog = $this->mdl_dashboard->get_category_child($row_p['id'])->result_array();
	    $data['program_diklat'].='<li><a href="elearning/course/category.php?id=' . $row_p['id'] . '">' . $row_p['name'] . '</a></li>';
	    $data['program_diklat'].='<ul>';
	    foreach ($sub_prog as $row_p_sub) {
		$data['program_diklat'].='<li><a href="elearning/course/category.php?id=' . $row_p['id'] . '">' . $row_p_sub['name'] . '</a></li>';
	    }
	    $data['program_diklat'].='</ul>';
	}
	$this->template->display('main/elearning/index', $data);
    }

}

/* End of file dashboard.php */
/* Location: ./application/controllers/site/dashboard.php */