<?php
class Mdl_sarpras extends CI_Model {

    private $table_program = 'program';
    private $table_asrama = 'sarpras_kamar';
    private $table_kelas = 'sarpras_kelas';
    private $table_gedung = 'sarpras_gedung';
    private $table_kamar = 'sarpras_kamar';
    private $table_kamar_status = 'sarpras_kamar_status';
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
    function count_check()
    {
	return $this->db->get($this->table_check_list_asrama)->num_rows();
    }
	
    // function get_check_list_asrama($limit=20,$offset=0) {
	// $this->db->group_by('id_kamar');
	// return $this->db->get($this->table_check_list_asrama,$limit,$offset);
	// }
    
    function get_check_list_asrama($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_check_list_asrama);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_check_list_asrama);
	}
    }

    function update_check_list_asrama($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_check_list_asrama, $data);
    }

    function insert_check_list_asrama($data) {
	$this->db->insert($this->table_check_list_asrama, $data);
	return $this->db->insert_id();
    }
	
    function delete_check_list_asrama($var) {
	$this->db->where('id_kamar', $var);
	return $this->db->delete($this->table_check_list_asrama);
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

    /**********
     * Gedung *
     **********/
    
    function get_gedung($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_gedung);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_gedung);
	}
    }

    function insert_gedung($data) {
	$this->db->insert($this->table_gedung, $data);
	return $this->db->insert_id();
    }

    function update_gedung($var, $data) {
	$this->db->where('id', $var);
	return $this->db->update($this->table_gedung, $data);
    }

    function delete_gedung($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_gedung);
    }
    
    function count_gedung($filter){
        $str_query='select count(tb_sarpras_gedung.id) as num FROM tb_sarpras_gedung';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%")';
        }
        return $this->db->query($str_query)->row()->num;
    }
    
    /**********
     * Kamar *
     **********/
    
    function get_kamar($var=NULL) {
	if ($var == NULL) {
            $this->db->select(
            $this->table_kamar.'.id,'.$this->table_gedung.'.nama,lantai,sayap,nomor,bed,'.$this->table_gedung.'.nama as gedung,'.$this->table_kamar_status.'.status as status'
            );
            $this->db->from($this->table_kamar);
            $this->db->join($this->table_gedung, $this->table_kamar.'.asrama = '.$this->table_gedung.'.id');
            $this->db->join($this->table_kamar_status, $this->table_kamar.'.status = '.$this->table_kamar_status.'.id');
            
            //var_dump($this->db->get()->result_array());
	    return $this->db->get();
	} else {
            $this->db->select(
            $this->table_kamar.'.id,'.$this->table_gedung.'.nama,lantai,sayap,nomor,bed,'.$this->table_gedung.'.nama as gedung,'.$this->table_kamar_status.'.status as status'
            );
            $this->db->from($this->table_kamar);
			$this->db->where($this->table_kamar.'.id', $var);
            $this->db->join($this->table_gedung, $this->table_kamar.'.asrama = '.$this->table_gedung.'.id');
            $this->db->join($this->table_kamar_status, $this->table_kamar.'.status = '.$this->table_kamar_status.'.id');
	    return $this->db->get();
	}
    }
	
	
    function get_kamar_gedung($var) {
		$this->db->select(
		$this->table_kamar.'.id,'.$this->table_gedung.'.nama,lantai,sayap,nomor,bed,'.$this->table_gedung.'.nama as gedung,'.$this->table_kamar_status.'.status as status'
		);
		$this->db->from($this->table_kamar);
		$this->db->where($this->table_kamar.'.asrama', $var);
		$this->db->join($this->table_gedung, $this->table_kamar.'.asrama = '.$this->table_gedung.'.id');
		$this->db->join($this->table_kamar_status, $this->table_kamar.'.status = '.$this->table_kamar_status.'.id');
	    return $this->db->get();
    }

    function insert_kamar($data) {
        $ins['id']=$data['id'];
        $ins['asrama']=$data['asrama'];
        $ins['lantai']=$data['lantai'];
        $ins['sayap']=$data['sayap'];
        $ins['nomor']=$data['nomor'];
        $ins['bed']=$data['bed'];
        $ins['status']=$data['status'];
	$this->db->insert($this->table_kamar, $ins);
	return $this->db->insert_id();
    }

    function update_kamar($var, $data) {        
        $ins['id']=$data['id'];
        $ins['asrama']=$data['asrama'];
        $ins['lantai']=$data['lantai'];
        $ins['sayap']=$data['sayap'];
        $ins['nomor']=$data['nomor'];
        $ins['bed']=$data['bed'];
        $ins['status']=$data['status'];
	$this->db->where('id', $var);
	return $this->db->update($this->table_kamar, $ins);
    }

    function delete_kamar($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_kamar);
    }
	
    function delete_kamar_gedung($var) {
	$this->db->where('asrama', $var);
	return $this->db->delete($this->table_kamar);
    }
    
    function count_kamar($filter){
        $str_query='select count(tb_sarpras_kamar.id) as num FROM tb_sarpras_kamar';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%")';
        }
        return $this->db->query($str_query)->row()->num;
    }
    
    function generate_checklist_kamar($id,$var)
    {
        $this->load->model('mdl_sarpras');
	// generator
        for($j=0;$j<12;$j++)
        {
            for($k=0;$k<4;$k++)
            {
                $data_check_list=array(
                    'id_kamar'=>$id
                );
                $this->mdl_sarpras->insert_check_list_kelas($data_check_list);
            }
        }
    }
	
	//status kamar
    function get_kamar_status($var=NULL) {
	if ($var == NULL) {
	    return $this->db->get($this->table_kamar_status);
	} else {
	    $this->db->where('id', $var);
	    return $this->db->get($this->table_kamar_status);
	}
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

    function get_kelas_by_size($size){
        $this->db->where('kapasitas >=', $size);
        return $this->db->get($this->table_kelas);
    }
    
    function insert_kelas($data) {
	$this->db->insert($this->table_kelas, $data);
	return $this->db->insert_id();
    }

    function insert_penggunaan_kelas_batch($batch){
        $this->db->insert_batch('penggunaan_kelas',$batch);
    }
    
    function delete_penggunaan_kelas($clause){
        $this->db->where('id_program',$clause);
        $this->db->delete('penggunaan_kelas');
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
    
    // function get_check_list_kelas($limit=20,$offset=0) {
	// $this->db->group_by('id_kelas');
	// return $this->db->get($this->table_check_list_kelas,$limit,$offset);
    // }
    
    function get_check_list_kelas($var=NULL) {
	if ($var == NULL) {
		$this->db->select(
		$this->table_check_list_kelas.'.id,id_kelas,l1,l2,l3,l4,s1,s2,m1,m2,m3,k1,k2,k3,wb,pb,fc,'.$this->table_kelas.'.nama as nama'
		);
		$this->db->from($this->table_check_list_kelas);
		$this->db->join($this->table_kelas, $this->table_check_list_kelas.'.id_kelas = '.$this->table_kelas.'.id');
		
	    return $this->db->get();
	} else {$this->db->select(
		$this->table_check_list_kelas.'.id,id_kelas,l1,l2,l3,l4,s1,s2,m1,m2,m3,k1,k2,k3,wb,pb,fc,'.$this->table_kelas.'.nama as nama'
		);
		$this->db->from($this->table_check_list_kelas);
		
	    $this->db->where('id', $var);
	    $this->db->join($this->table_kelas, $this->table_check_list_kelas.'.id_kelas = '.$this->table_kelas.'.id');
		
	    return $this->db->get();
	}
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