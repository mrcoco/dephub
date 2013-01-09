<?php
class Mdl_user extends CI_Model{
    function __construct() {
        parent::__construct();
    }
    
    function get_list_user(){
        $this->db->join('role','pegawai.id=role.id_pegawai');
        return $this->db->get('pegawai')->result_array();
    }
    function get_user_by_id($id){
        $this->db->where('id',$id);
        return $this->db->get('pegawai')->row_array();
    }
    function update_user($id,$data){
        $this->db->where('id',$id);
        $this->db->update('pegawai',$data);
    }
    function nama_role(){
        $role =  $this->db->get('list_role')->result_array();
        foreach($role as $r){
            $ret[$r['id']]=$r['nama'];
        }
        return $ret;
    }
    function update_role($jenis,$id){
        if($jenis!=0){
            $this->db->where('id_pegawai',$id);
            $num=$this->db->get('role')->num_rows();
            if($num==0){
                //insert
                $data=array('id_pegawai'=>$id,'id_role'=>$jenis);
                $this->db->insert('role',$data);
            }else{
                //update
                $data=array('id_role'=>$jenis);
                $this->db->where('id_pegawai',$id);
                $this->db->update('role',$data);
            }
        }else{
            $this->db->where('id_pegawai',$id);
            $this->db->delete('role');
        }
    }
    function delete($id){
        $this->db->where('id_pegawai',$id);
        $this->db->delete('role');
    }
}