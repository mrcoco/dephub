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
        $str_query='select tb_pegawai.id,nama, nip, jenis from tb_pegawai inner join (select * from tb_pembicara where jenis!=3) as tb_p on tb_pegawai.id=tb_p.id_tabel';
        return $this->db->query($str_query)->result_array();
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
            $where = '(jenis=1 or jenis=2)';
            $this->db->where('id_tabel',$id);
            $this->db->where($where);
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
    
    function ajax_pembicara($jenis){
        if($jenis!=3){
            $str_query='select nama, tb_p.id as id_pembicara, jenis from tb_pegawai inner join (select * from tb_pembicara where jenis!=3) as tb_p on tb_pegawai.id=tb_p.id_tabel where jenis='.$jenis;
            $res=$this->db->query($str_query)->result_array();
        }else{
            $str_query='select nama, tb_p.id as id_pembicara, jenis from tb_dosen_tamu inner join (select * from tb_pembicara where jenis=3) as tb_p on tb_dosen_tamu.id=tb_p.id_tabel';
            $res=$this->db->query($str_query)->result_array();
        }
        $array1=array();
        $array2=array();
        foreach($res as $r){
            $array1[$r['nama']]=$r['id_pembicara'];
            $array2[]=$r['nama'];
        }
        $retval=array(1=>$array1,2=>$array2);
        return $retval;
	}
	
    function getall_pegawai(){
        $str_query='select * from tb_pegawai';
        return $this->db->query($str_query)->result_array();
    }
    
    function get_pegawai($per_page,$offset,$filter){
        $str_query='select * from tb_pegawai';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%" or nip like "%'.$filter.'%")';
        }
        $str_query.= ' limit '.$offset.', '.$per_page;
        return $this->db->query($str_query)->result_array();
    }
    
    function count_pegawai($filter){
        $str_query='select count(tb_pegawai.id) as num FROM tb_pegawai';
        if($filter!=''){
            $str_query.=' where (nama like "%'.$filter.'%" or nip like "%'.$filter.'%")';
        }
        return $this->db->query($str_query)->row()->num;
    }
    
    function get_data_pegawai_id($param){
        $query=$this->db->query('select * from tb_pegawai where id = '.$param);
        //echo $param.'s'.$query->num_rows();
        if($query->num_rows()==0){
            return FALSE;
        }else{
            return $query->row_array();
        }
    }
    
    function insert_pegawai($data_reg){
        $this->db->insert('pegawai',$data_reg);
        return TRUE;
    }
    
    function get_schedule($id){
        return $this->db->get_where('schedule',array('id_program'=>$id))->result_array();
    }
    
    function insert_schedule($data,$materi){
        $this->db->insert('schedule',$data);
        $id=$this->db->query('select LAST_INSERT_ID() as id')->row()->id;
        
        if(count($materi['arr_pembicara'])>0){
            //insert pemateri
            $ins_pemateri=array();
            $x=0;
            foreach($materi['arr_pembicara'] as $a){
                $ins_pemateri[$x]['id_schedule']=$id;
                $ins_pemateri[$x]['id_pembicara']=$a;
                $x++;
            }
            $this->db->insert_batch('pemateri',$ins_pemateri);
        }
       
        if(count($materi['arr_pendamping'])>0){
            //insert pendamping
            $ins_pendamping=array();
            $x=0;
            foreach($materi['arr_pendamping'] as $a){
                $ins_pendamping[$x]['id_schedule']=$id;
                $ins_pendamping[$x]['nama']=$a;
                $x++;
            }
            $this->db->insert_batch('pendamping',$ins_pendamping);
        }

        return true;
    }
    
    function update_waktu($data,$where){
        $this->db->where($where);
        $this->db->update('schedule',$data);
    }
}
