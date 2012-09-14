<?php
class Mdl_penyelenggaraan extends CI_Model{
       
    function getall_peserta($id_program){
        if($id_program!=-1){
            $this->db->where('registrasi.id_program',$id_program);
        }
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
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
    
    function insert_dosen_tamu($data){
        //insert data ke tabel dosen tamu
        $this->db->insert('dosen_tamu',$data);
        $id=$this->db->query('select LAST_INSERT_ID() as id')->row()->id;
        
        //insert data ke tabel pembicara
        $pembicara=array('id_tabel'=>$id,'jenis'=>3);
        $this->db->insert('pembicara',$pembicara);
    }
    
    function getall_dosen_tamu(){
        return $this->db->get_where('dosen_tamu')->result_array();
    }
    
    function get_dosen_tamu($id){
        $data = $this->db->get_where('dosen_tamu',array('id'=>$id));
        if($data->num_rows()==1){
            return $data->row_array();
        }else{
            return FALSE;
        }
    }
    
    function update_dosen_tamu($id,$data){
        $this->db->where('id',$id);
        $this->db->update('dosen_tamu',$data);        
    }
    
    function delete_dosen_tamu($id){
        $this->db->where('id',$id);
        $this->db->delete('dosen_tamu');
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
        $query=$this->db->get_where('pegawai',array('instansi'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->result_array();
        }
    }
    
    function get_data_peserta($param){
        $query=$this->db->get_where('pegawai',array('nip'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->row_array();
        }
    }
    
    function get_data_peserta_id($param){
        $query=$this->db->get_where('pegawai',array('id'=>$param));
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->row_array();
        }
    }
    
    function get_history($id){
        return $this->db->get_where('history_pelatihan',array('id_peserta'=>$id))->result_array();
    }
    
    function getall_pembicara_int(){
        
    }
    
    function get_pembicara_int($id){
        
    }
    
    function get_pegawai_pembicara($per_page,$offset,$filter){
        $str_query='select tb_pegawai.id,nama, nip, jenis from tb_pegawai left join (select * from tb_pembicara where jenis!=3) as tb_p on tb_pegawai.id=tb_p.id_tabel';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%" or nip like "%'.$filter.'%")';
        }
        $str_query.= ' limit '.$offset.', '.$per_page;
        return $this->db->query($str_query)->result_array();
    }
    
    function count_pegawai_pembicara($filter){
        $str_query='select count(tb_pegawai.id) as num from tb_pegawai left join (select * from tb_pembicara where jenis!=3) as tb_p on tb_pegawai.id=tb_p.id_tabel';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%" or nip like "%'.$filter.'%")';
        }
        return $this->db->query($str_query)->row()->num;
    }
    
    function update_pembicara($jenis,$id){
        if($jenis!=0){
            //cek id udah ada blom? klo udah update, klo blom insert
            $this->db->where('id_tabel',$id);
            $this->db->where('jenis',1);
            $this->db->or_where('jenis',2);
            $num=$this->db->get('pembicara')->num_rows();
            if($num==0){
                //insert
                $data=array('id_tabel'=>$id,'jenis'=>$jenis);
                $this->db->insert('pembicara',$data);
            }else{
                //update
                $data=array('jenis'=>$jenis);
                $this->db->where('id_tabel',$id);
                $this->db->update('pembicara',$data);
            }
        }else{
            $this->db->where('id_tabel',$id);
            $this->db->delete('pembicara');
        }
    }
}
