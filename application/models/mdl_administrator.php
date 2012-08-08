<?php
/**
 * Description of mdl_administrator
 *
 * @author Administrator
 */
class Mdl_administrator extends CI_Model{
    private $table_info='info';

    function __construct() {
	parent::__construct();
    }
    /**
     * CRUD Administrator
     */

    function get_info()
    {
	return $this->db->get($this->table_info);
    }
}

/* End of file mdl_administrator.php */
/* Location: ./application/models/mdl_administrator.php */