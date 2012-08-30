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
    
    function getall_peserta($id_program){
        if($id_program!=-1){
            $this->db->where('registrasi.id_program',$id_program);
        }
        $this->db->join('cv_peserta','registrasi.id_peserta=cv_peserta.id');
        return $this->db->get('registrasi')->result_array();
    }
    
    function toggle_status($clause,$data){
        $this->db->where($clause);
        $this->db->update('registrasi',$data);
    }
    
    function insert_registrasi($data_reg){
        $this->db->insert('registrasi',$data_reg);
        return TRUE;
    }
    
    function insert_widyaiswara($data){
        $this->db->insert('widyaiswara',$data);
    }
    
    function getall_widyaiswara(){
        return $this->db->get_where('widyaiswara')->result_array();
    }
    
    function get_widyaiswara($id){
        $data = $this->db->get_where('widyaiswara',array('id'=>$id));
        if($data->num_rows()==1){
            return $data->row_array();
        }else{
            return FALSE;
        }
    }
    
    function update_widyaiswara($id,$data){
        $this->db->where('id',$id);
        $this->db->update('widyaiswara',$data);        
    }
    
    function delete_widyaiswara($id){
        $this->db->where('id',$id);
        $this->db->delete('widyaiswara');
    }
    
    function getall_instansi(){
        return $this->db->get('instansi')->result_array();
    }
    
    function getkode_instansi($param){
        $query=$this->db->get_where('instansi',array('nama_instansi'=>$param));
        if($query->num_rows()==0){
            return -1;
        }else{
            return $query->row()->kode_kantor;
        }
    }
    
    function get_peserta($param){
        $query=$this->db->get_where('cv_peserta',array('instansi'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->result_array();
        }
    }
    
    function get_data_peserta($param){
        $query=$this->db->get_where('cv_peserta',array('nip'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->row_array();
        }
    }
}
