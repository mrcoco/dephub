<?php
class Mdl_sarpras extends CI_Model {

    private $table_program = 'program';
    private $table_asrama = 'sarpras_kamar';
    private $table_alokasi_asrama = 'sarpras_alokasi_asrama';
    private $table_kelas = 'sarpras_kelas';
    private $table_gedung = 'sarpras_gedung';
    private $table_kamar = 'sarpras_kamar';
    private $table_kamar_status = 'sarpras_kamar_status';
    private $table_pemakaian_asrama = 'sarpras_pemakaian_kamar';
    private $table_pemakaian_kelas = 'sarpras_pemakaian_kelas';
    //private $table_check_list_asrama = 'sarpras_checklist_kamar';
    private $table_check_list_kelas = 'sarpras_checklist_kelas';
    private $table_type = 'sarpras_type';
	private $table_checklist_kamar_item = 'sarpras_checklist_kamar_item';
	private $table_checklist_kamar = 'sarpras_checklist_kamar';
	

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
    // function count_check()
    // {
	// return $this->db->get($this->table_check_list_asrama)->num_rows();
    // }
	
    // function get_check_list_asrama($limit=20,$offset=0) {
	// $this->db->group_by('id_kamar');
	// return $this->db->get($this->table_check_list_asrama,$limit,$offset);
	// }
    
    // function get_check_list_asrama($var=NULL) {
	// if ($var == NULL) {
	    // return $this->db->get($this->table_check_list_asrama);
	// } else {
	    // $this->db->where('id', $var);
	    // return $this->db->get($this->table_check_list_asrama);
	// }
    // }

    // function update_check_list_asrama($var, $data) {
	// $this->db->where('id', $var);
	// return $this->db->update($this->table_check_list_asrama, $data);
    // }

    // function insert_check_list_asrama($data) {
	// $this->db->insert($this->table_check_list_asrama, $data);
	// return $this->db->insert_id();
    // }
	
    // function delete_check_list_asrama($var) {
	// $this->db->where('id_kamar', $var);
	// return $this->db->delete($this->table_check_list_asrama);
    // }

    // function get_tahun()
    // {
	// $this->db->group_by('tahun');
	// return $this->db->get($this->table_check_list_asrama);
    // }
	
	//----------------------------------------------item-----------------------------------------------------
	function get_checklist_item($var=NULL) {
	if ($var == NULL) {
	} else {
	    $this->db->where('id', $var);
	}
	    return $this->db->get($this->table_checklist_kamar_item);
    }
	
	function insert_checklist_item($data) {
	$this->db->insert($this->table_checklist_kamar_item, $data);
	return $this->db->insert_id();
    }
	
    function update_checklist_item($id, $data) {
	$this->db->where('id', $id);
	
	return $this->db->update($this->table_checklist_kamar_item, $data);
    }

    function delete_checklist_item($var) {
	$this->db->where('id', $var);
	return $this->db->delete($this->table_checklist_kamar_item);
    }
	
	//----------------------------------------------------checklist kamar-------------------------------------------------
	function get_checklist_kamar_kamar($var=NULL) {
	if ($var == NULL) {
	} else {
	    $this->db->where('id_kamar', $var);
	}
	    return $this->db->get($this->table_checklist_kamar);
    }
	
	function get_checklist_kamar_item($var=NULL) {
	if ($var == NULL) {
	} else {
	    $this->db->where('id_item', $var);
	}
	    return $this->db->get($this->table_checklist_kamar);
    }

    function insert_checklist_kamar($data) {
	$this->db->insert($this->table_checklist_kamar, $data);
	return $this->db->insert_id();
    }

    function update_checklist_kamar($kamar, $item, $data) {
	$this->db->where('id_kamar', $kamar);
	$this->db->where('id_item', $item);
	
	return $this->db->update($this->table_checklist_kamar, $data);
    }

    function delete_checklist_kamar_kamar($var) {
	$this->db->where('id_kamar', $var);
	return $this->db->delete($this->table_checklist_kamar);
    }
	
    function delete_checklist_kamar_item($var) {
	$this->db->where('id_item', $var);
	return $this->db->delete($this->table_checklist_kamar);
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
    
    function get_alocated_gedung($id_program){
        $this->db->where('id_program', $id_program);
        return $this->db->get($this->table_alokasi_asrama)->result_array();
    }
    
    function insert_alokasi_asrama_batch($batch){
        $this->db->insert_batch($this->table_alokasi_asrama,$batch);
    }
    
    function delete_alokasi_asrama($id_program){
        $this->db->where('id_program',$id_program);
        $this->db->delete($this->table_alokasi_asrama);
    }
    
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
	$this->db->select(
	$this->table_kamar.'.id,'.$this->table_gedung.'.nama,nama_kamar,lantai,sayap,nomor,bed,'.$this->table_gedung.'.nama as gedung,'.$this->table_kamar_status.'.status as status'
	);
	$this->db->from($this->table_kamar);
	if ($var == NULL) {
	
	} else {
			$this->db->where($this->table_kamar.'.id', $var);
	}
		$this->db->join($this->table_gedung, $this->table_kamar.'.asrama = '.$this->table_gedung.'.id');
		$this->db->join($this->table_kamar_status, $this->table_kamar.'.status = '.$this->table_kamar_status.'.id');
		
	$this->db->order_by($this->table_kamar.".id", "asc");
    // die(var_dump($this->db->get()->result_array()));
	return $this->db->get();
    }
	
    function get_kamar_gedung($var) {
		$this->db->select(
		$this->table_kamar.'.id,'.$this->table_gedung.'.nama,nama_kamar,lantai,sayap,nomor,bed,'.$this->table_gedung.'.nama as gedung,'.$this->table_kamar_status.'.status as status'
		);
		$this->db->from($this->table_kamar);
		$this->db->where($this->table_kamar.'.asrama', $var);
		$this->db->join($this->table_gedung, $this->table_kamar.'.asrama = '.$this->table_gedung.'.id');
		$this->db->join($this->table_kamar_status, $this->table_kamar.'.status = '.$this->table_kamar_status.'.id');
		$this->db->order_by($this->table_kamar.".id", "asc");
	    return $this->db->get();
    }

    function insert_kamar($data) {
        // $ins['id']=$data['id'];
        // $ins['nama_kamar']=$data['nama_kamar'];
        // $ins['asrama']=$data['asrama'];
        // $ins['lantai']=$data['lantai'];
        // $ins['sayap']=$data['sayap'];
        // $ins['nomor']=$data['nomor'];
        // $ins['bed']=$data['bed'];
        // $ins['status']=$data['status'];
	$this->db->insert($this->table_kamar, $data);
	return $this->db->insert_id();
    }

    function update_kamar($var, $data) {        
        $ins['id']=$data['id'];
        $ins['nama_kamar']=$data['nama_kamar'];
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
    
    function count_kamar($filter=''){
        $str_query='select count(tb_sarpras_kamar.id) as num FROM tb_sarpras_kamar';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%")';
        }
        return $this->db->query($str_query)->row()->num;
    }
    
    function count_bed(){
        $str_query='select sum(tb_sarpras_kamar.bed) as num FROM tb_sarpras_kamar';
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
	} else {
	    $this->db->where('id', $var);
	}
	    return $this->db->get($this->table_kelas);
    }

    function get_kelas_by_size($size){
        $this->db->where('kapasitas >=', $size);
        return $this->db->get($this->table_kelas);
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
    
    function count_all_kelas(){
        return $this->db->count_all($this->table_kelas);
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
		
	    $this->db->where($this->table_check_list_kelas.'.id', $var);
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

    function delete_check_list_kelas($id){
        $this->db->where('id',$id);
        $this->db->delete($this->table_check_list_kelas);
    }
	
	function update_checklist($id, $data){
		// $data2 = array(
               // 'l2' => $data['l2'],
               // 's2' => $data['s2'],
               // 'm2' => $data['m2'],
               // 'wb' => $data['wb'],
               // 'pb' => $data['pb'],
               // 'fc' => $data['fc']
            // );
		$this->db->where('id',$id);
		// die(var_dump($data));

		// $this->db->set('l2',$data['l2']);
		// $this->db->set('s2',$data['s2']);
		// $this->db->set('m2',$data['m2']);
		// $this->db->set('wb',$data['wb']);
		// $this->db->set('pb',$data['pb']);
		// $this->db->set('fc',$data['fc']);
	$this->db->update($this->table_check_list_kelas,$data);
	return true;
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

    function insert_penggunaan_kelas_batch($batch){
        $this->db->insert_batch($this->table_pemakaian_kelas,$batch);
    }
    
    function delete_penggunaan_kelas($clause){
        $this->db->where('id_program',$clause);
        $this->db->delete($this->table_pemakaian_kelas);
    }
    
    //----------------
//    function get_pemakaian_kelas($var=NULL) {
//	if ($var == NULL) {
//	    return $this->db->get($this->table_pemakaian_kelas);
//	} else {
//	    $this->db->where('id', $var);
//	    return $this->db->get($this->table_pemakaian_kelas);
//	}
//    }
//
//    function insert_pemakaian_kelas($data) {
//	$this->db->insert($this->table_pemakaian_kelas, $data);
//	return $this->db->insert_id();
//    }
//
//    function update_pemakaian_kelas($var, $data) {
//	$this->db->where('id', $var);
//	return $this->db->update($this->table_pemakaian_kelas, $data);
//    }
//
//    function delete_pemakaian_kelas($var) {
//	$this->db->where('id', $var);
//	return $this->db->delete($this->table_pemakaian_kelas);
//    }
//
//    function clear() {
//	$this->db->query('TRUNCATE TABLE  `tb_sarpras_kamar`');
//	$this->db->query('TRUNCATE TABLE  `tb_sarpras_checklist_kamar`');
//	$this->db->query('SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0');
//	$this->db->query('SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0');
//	$this->db->query('SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=\'TRADITIONAL\'');
//	$this->db->query('SET SQL_MODE=@OLD_SQL_MODE');
//	$this->db->query('SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS');
//	$this->db->query('SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS');
//	return TRUE;
//    }
    function cek_kelas($data){
        $this->db->where('id_kelas',$data['id_kelas']);
        $this->db->where('tanggal >=',$data['mulai']);
        $this->db->where('tanggal <=',$data['akhir']);
        return $this->db->get('sarpras_pemakaian_kelas')->num_rows();
    }
}

/* End of file mdl_sarpras.php */
/* Location: ./application/models/mdl_sarpras.php */