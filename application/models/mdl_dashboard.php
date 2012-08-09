<?php
/**
 * Description of course
 *
 * @author Administrator
 */
class Mdl_dashboard extends CI_Model{
    private $table_program='program';
    private $table_info='info';

    function __construct() {
	parent::__construct();
	$this->db_elearning=$this->load->database('elearning');
    }
    /**
     * CRUD Course
     */

    function get_all()
    {
	return $this->db->get($this->table_program);
    }

    function get_info()
    {
	return $this->db->get($this->table_info);
    }

    function get_course_moodle()
    {
	$this->db_elearning->limit(10);
	$this->db_elearning->where_not_in('id',1);
	return $this->db_elearning->get('course');
    }

    function get_category_top()
    {
	$this->db_elearning->where('parent',0);
	return $this->db_elearning->get('course_categories');
    }

    function get_category_child($var)
    {
	$this->db_elearning->where('parent',$var);
	return $this->db_elearning->get('course_categories');
    }
}

/* End of file course.php */
/* Location: ./application/models/course.php */