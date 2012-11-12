<?php
class Mdl_penyelenggaraan extends CI_Model{
       
    function getall_peserta($id_diklat){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_diklat',$id_diklat);
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
    
    function insert_registrasi_batch($data_reg){
        $this->db->insert_batch('registrasi',$data_reg);
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
            $str_query='select nama, nip, tb_p.id as id_pembicara, jenis from tb_pegawai inner join (select * from tb_pembicara where jenis!=3) as tb_p on tb_pegawai.id=tb_p.id_tabel where jenis='.$jenis;
            $res=$this->db->query($str_query)->result_array();
            $array1=array();
            $array2=array();
            foreach($res as $r){
                $array1[$r['nip'].'-'.$r['nama']]=$r['id_pembicara'];
                $array2[]=$r['nip'].'-'.$r['nama'];
            }
        }else{
            $str_query='select nama, tb_p.id as id_pembicara, jenis from tb_dosen_tamu inner join (select * from tb_pembicara where jenis=3) as tb_p on tb_dosen_tamu.id=tb_p.id_tabel';
            $res=$this->db->query($str_query)->result_array();
            $array1=array();
            $array2=array();
            foreach($res as $r){
                $array1[$r['nama']]=$r['id_pembicara'];
                $array2[]=$r['nama'];
            }
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
	
    function update_pegawai($var, $data) {
		$this->db->where('id', $var);
		return $this->db->update('tb_pegawai', $data);
    }
	
    function delete_pegawai($var) {
		$this->db->where('id', $var);
		return $this->db->delete('tb_pegawai');
    }
    
    function get_schedule($id){
        return $this->db->get_where('schedule',array('id_program'=>$id))->result_array();
    }
    
    function get_schedule_pemateri($id){
        
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
    
    function get_item_schedule($where){
        $this->db->where($where);
        return $this->db->get('schedule')->row_array();
    }
    
    function get_all_pembicara(){
        $str_qry_pembicara='SELECT tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam from tb_pembicara 
            left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
            left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3))';
        return $this->db->query($str_qry_pembicara)->result_array();
    }
    
    function get_data_schedule_by_id($id){
        //query data dari tb_schedule
        //masing2 data di cek jenisnya
        //klo jenisnya materi, query nama pematerinya
        
        
        $str_qry_pembicara='SELECT materi, tb_pembicara.jenis as jenis_dosen, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam FROM 
                    tb_schedule LEFT JOIN ((tb_pemateri JOIN tb_pembicara ON tb_pemateri.id_pembicara = tb_pembicara.id) 
                    LEFT JOIN tb_pegawai ON ( id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
                    LEFT JOIN tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3))) ON ( id_schedule = tb_schedule.id)
                    WHERE id_program ='.$id;
        $arr_pembicara = $this->db->query($str_qry_pembicara)->result_array();
        
        $str_qry_acara='SELECT DISTINCT tb_schedule.jenis as jenis, materi,tanggal, jam_mulai, jam_selesai FROM 
                    tb_schedule LEFT JOIN ((tb_pemateri JOIN tb_pembicara ON tb_pemateri.id_pembicara = tb_pembicara.id) 
                    LEFT JOIN tb_pegawai ON ( id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
                    LEFT JOIN tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3))) ON ( id_schedule = tb_schedule.id)
                    WHERE id_program ='.$id;
        $arr_res = $this->db->query($str_qry_acara)->result_array();
        
        $str_qry_pendamping='SELECT nama FROM 
                    tb_schedule LEFT JOIN tb_pendamping on tb_schedule.id=tb_pendamping.id_schedule
                    WHERE id_program ='.$id;
        $arr_pendamping = $this->db->query($str_qry_pendamping)->result_array();
        
        for($i=0;$i<count($arr_res);$i++){
            $jam_mulai = strtotime($arr_res[$i]['jam_mulai']);
            $jam_mulai_next = strtotime('+15 minute', $jam_mulai);
            $arr_res[$i]['jam_mulai']=date('H.i', $jam_mulai) . '-' . date('H.i', $jam_mulai_next);
            
            $jam_selesai = strtotime($arr_res[$i]['jam_selesai']);
            $jam_selesai_next = strtotime('-15 minute', $jam_selesai);
            $arr_res[$i]['jam_selesai']=date('H.i', $jam_selesai_next) . '-' . date('H.i', $jam_selesai);
            
            $tgl = strtotime($arr_res[$i]['tanggal']);
            $arr_res[$i]['tanggal']=date('d', $tgl) . ' ' . $this->date->get_month_name(date('m', $tgl)) . ' ' . date('Y', $tgl);
            
            if($arr_res[$i]['jenis']=='materi'){
                $arr_res[$i]['pembicara']=array();
                foreach($arr_pembicara as $ap){
                    if($ap['materi']==$arr_res[$i]['materi']){
                        if($ap['nama_peg']!=''){
                            $arr_res[$i]['pembicara'][]=$ap['nama_peg'];
                        }else{
                            $arr_res[$i]['pembicara'][]=$ap['nama_dostam'];
                        }
                    }
                }
                $arr_res[$i]['pendamping']=array();
                foreach($arr_pendamping as $ap){
                    $arr_res[$i]['pendamping'][]=$ap['nama'];
                }
            }
            
        }
        return $arr_res;
    }
    
    function get_pemateri($id){
        $this->db->join('pembicara','pembicara.id=pemateri.id_pembicara');
        $pemateri=$this->db->get_where('pemateri',array('id_schedule'=>$id))->result_array();
        for($i=0;$i<count($pemateri);$i++){
            if($pemateri[$i]['jenis']!=3){
                $tb='pegawai';
                $data=$this->db->get_where($tb,array('id'=>$pemateri[$i]['id_tabel']))->row_array();
                $pemateri[$i]['nama']=$data['nip'].'-'.$data['nama'];
            }else{
                $tb='dosen_tamu';
                $data=$this->db->get_where($tb,array('id'=>$pemateri[$i]['id_tabel']))->row_array();
                $pemateri[$i]['nama']=$data['nama'];
            }
            
        }
        return $pemateri;
    }
    
    function get_pendamping($id){
        return $this->db->get_where('pendamping',array('id_schedule'=>$id))->result_array();
    }
    
    function del_schedule($id){
        $this->db->where('id_schedule',$id);
        $this->db->delete('pendamping');
        
        $this->db->where('id_schedule',$id);
        $this->db->delete('pemateri');
        
        $this->db->where('id',$id);
        $this->db->delete('schedule');
    }
    
    function update_schedule($data,$materi,$where){
        //update schedule
        $this->db->where($where);
        $this->db->update('schedule',$data);
        
        $this->db->where('id_schedule',$where['id']);
        $this->db->delete('pendamping');
        
        $this->db->where('id_schedule',$where['id']);
        $this->db->delete('pemateri');
        
        $id=$where['id'];
        
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
}
