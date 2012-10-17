<?php
class Mdl_sarpras extends CI_Model {

    private $table_program = 'program';
    private $table_asrama = 'sarpras_kamar';
    private $table_kelas = 'sarpras_kelas';
    private $table_pemakaian_asrama = 'sarpras_pemakaian_kamar';
    private $table_pemakaian_kelas = 'sarpras_pemakaian_kelas';
    private $table_check_list_asrama = 'sarpras_checklist_kamar';
    private $table_check_list_kelas = 'sarpras_checklist_kelas';
    private $table_type = 'sarpras_type';

    function __construct() {
	parent::__construct();
    }

    /*     * *********
     * Program *
     * ********* */

    function get_program($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_program);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_program);
	}
    }

    /*     * ********
     * Asrama *
     * ******** */

    function get_asrama($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_asrama);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_asrama);
	}
    }

    function insert_asrama($data) {
	$this->db->insert($this->table_asrama, $data);
	return $this->db->insert_id();
    }

    function update_asrama($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_asrama, $data);
    }

    function delete_pemakaian_asrama($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_asrama);
    }

    // Check List Asrama
    //------------------
    function count_check($tahun,$bulan)
    {
	$this->db->where('tahun', $tahun);
	$this->db->where('bulan', $bulan);
	$this->db->group_by('id_kamar');
	return $this->db->get($this->table_check_list_asrama)->num_rows();
    }
    function get_check_list_asrama($limit=20,$offset=0,$tahun=2012,$bulan=12,$minggu=1) {
	$this->db->where('tahun', $tahun);
	$this->db->where('bulan', $bulan);
	$this->db->where('minggu', $minggu);
	$this->db->group_by('id_kamar');
	return $this->db->get($this->table_check_list_asrama,$limit,$offset);
    }

    function update_check_list_asrama($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_check_list_asrama, $data);
    }

    function insert_check_list_asrama($data) {
	$this->db->insert($this->table_check_list_asrama, $data);
	return $this->db->insert_id();
    }

    function get_tahun()
    {
	$this->db->group_by('tahun');
	return $this->db->get($this->table_check_list_asrama);
    }

    // Pemakaian Kamar
    //----------------
    function get_pemakaian_kamar($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_pemakaian_asrama);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_pemakaian_asrama);
	}
    }

    function insert_pemakaian_kamar($data) {
	$this->db->insert($this->table_pemakaian_asrama, $data);
	return $this->db->insert_id();
    }

    function update_pemakaian_kamar($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_pemakaian_asrama, $data);
    }

    function delete_pemakaian_kamar($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_pemakaian_asrama);
    }

    /*********
     * Kelas *
     *********/

    function get_kelas($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_kelas);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_kelas);
	}
    }

    function insert_kelas($data) {
	$this->db->insert($this->table_kelas, $data);
	return $this->db->insert_id();
    }

    function update_kelas($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_kelas, $data);
    }

    function delete_kelas($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_kelas);
    }

    // Check List Kelas
    //-----------------
    
    function get_check_list_kelas($limit=20,$offset=0,$tahun=2012,$bulan=12,$minggu=1) {
	$this->db->where('tahun', $tahun);
	$this->db->where('bulan', $bulan);
	$this->db->where('minggu', $minggu);
	$this->db->group_by('id_kelas');
	return $this->db->get($this->table_check_list_kelas,$limit,$offset);
    }
    
    /*
    function get_check_list_kelas($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_check_list_kelas);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_check_list_kelas);
	}
    }
     * 
     */

    function update_check_list_kelas($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_check_list_kelas, $data);
    }

    function insert_check_list_kelas($data) {
	$this->db->insert($this->table_check_list_kelas, $data);
	return $this->db->insert_id();
    }

    // Type Prasarana
    //---------------
    function get_type($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_type);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_type);
	}
    }

    function update_type($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_type, $data);
    }

    // Pemakaian Kelas
    //----------------
    function get_pemakaian_kelas($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_pemakaian_kelas);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_pemakaian_kelas);
	}
    }

    function insert_pemakaian_kelas($data) {
	$this->db->insert($this->table_pemakaian_kelas, $data);
	return $this->db->insert_id();
    }

    function update_pemakaian_kelas($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_pemakaian_kelas, $data);
    }

    function delete_pemakaian_kelas($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_pemakaian_kelas);
    }

    function clear() {
	$this->db->query('TRUNCATE TABLE  `tb_sarpras_kamar`');
	$this->db->query('TRUNCATE TABLE  `tb_sarpras_checklist_kamar`');
	$this->db->query('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0');
	$this->db->query('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0');
	$this->db->query('SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'TRADITIONAL\'');
	$this->db->query('SET SQL_MODE=@OLD_SQL_MODE');
	$this->db->query('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS');
	$this->db->query('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS');
	return TRUE;
    }

}

/* End of file mdl_sarpras.php */
/* Location: ./application/models/mdl_sarpras.php */