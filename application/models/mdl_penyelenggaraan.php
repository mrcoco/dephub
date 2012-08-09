<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mdl_penyelenggaraan
 *
 * @author bharata
 */
class Mdl_penyelenggaraan extends CI_Model{
    //put your code here
    function insert_peserta($data_peserta){
        if($this->db->insert('peserta',$data_peserta)){
            unset($data_peserta['tanggal_lahir']);
            $query=$this->db->get_where('peserta',$data_peserta);
            if($query->num_rows()==1){
                $idv=$query->row_array();
                return $idv['id'];
            }else{
                return FALSE;
            }
        }else{
            return FALSE;
        }
    }
    function insert_registrasi($data_reg){
        $this->db->insert('registrasi',$data_reg);
    }
}
