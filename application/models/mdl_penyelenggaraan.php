<?php
class Mdl_penyelenggaraan extends CI_Model{
    
    function delete_alumni($id_pegawai,$id_program){
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->where('id_program',$id_program);
        $this->db->delete('alumni');
    }
    function get_alumni($id_pegawai,$id_program){
        $this->db->where('id_pegawai',$id_pegawai);
        $this->db->where('id_program',$id_program);
        $result=$this->db->get('alumni');
        if($result->num_rows()!=0){
            return $result->row_array();
        }else{
            return FALSE;
        }
    }
    function get_all_alumni($per_page,$offset,$filter){        
        $str_query='SELECT id_pegawai, id_program, nama, nip, tahun_program, angkatan, parent, no_sk, file_sk
            FROM tb_alumni
                    JOIN tb_pegawai ON tb_alumni.id_pegawai=tb_pegawai.id
                    JOIN tb_program ON tb_alumni.id_program=tb_program.id';
        if($filter!=''){
            $str_query.=" where (nama like '%$filter%'
                or nip like '%$filter%'
                )";
        }
        $str_query.= ' limit '.$offset.', '.$per_page;
        $results=$this->db->query($str_query)->result_array();
        $data=array();
        foreach($results as $result){
            $this->db->select('name');
            $this->db->where('id',$result['parent']);
            $diklat=$this->db->get('program')->row_array();
            $result['diklat']=$diklat['name'];
            $data[]=$result;
        }
        return $data;
    }
    function get_filter_alumni($saring,$per_page='',$offset=''){
        if($saring['diklat']){
            $this->db->select('id');
            $this->db->like('name',$saring['diklat'],'both');
            $diklat=$this->db->get('program')->result_array();
            $id_diklat='(';
            foreach($diklat as $d){
                $id_diklat.=$d['id'].',';
            }
            $id_diklat.='0)';
            $this->db->where("parent IN $id_diklat");
        }
        if($saring['thn']){
            $this->db->where('tahun_program',$saring['thn']);
        }
        if($saring['ang']){
            $this->db->where('angkatan',$saring['ang']);
        }
        if(isset($saring['cari'])){
            $this->db->or_like('nama',$saring['cari']);
            $this->db->or_like('nip',$saring['cari']);
            $this->db->or_like('no_sk',$saring['cari']);
        }
        $this->db->select('alumni.id, id_pegawai, id_program, nama, nip, tahun_program, angkatan, parent, no_sk, file_sk');
        $this->db->join('pegawai','alumni.id_pegawai=pegawai.id');
        $this->db->join('program','alumni.id_program=program.id');
        $this->db->order_by("alumni.id","desc");
        if($per_page!=''){
            $results=$this->db->get('alumni',$per_page,$offset)->result_array();

            $data=array();
            foreach($results as $result){
                $this->db->select('name');
                $this->db->where('id',$result['parent']);
                $diklat=$this->db->get('program')->row_array();
                $result['diklat']=$diklat['name'];
                $data[]=$result;
            }
            return $data;
        }else{
            return $this->db->get('alumni')->num_rows();
        }
    }
    function insert_alumni($data){
        if($this->get_alumni($data['id_pegawai'], $data['id_program'])){
            $this->db->where('id_pegawai',$data['id_pegawai']);
            $this->db->where('id_program',$data['id_program']);
            $this->db->update('alumni',$data);
        }else{
            $this->db->insert('alumni',$data);
        }
    }
    function insert_pengumuman($data){
        $this->db->insert('post',$data);
    }
    
    function load_pengumuman($offset,$lim=10){
        $this->db->order_by('id','desc');
        return $this->db->get('post',$lim,$offset)->result_array();
    }
    function count_pengumuman(){
        return $this->db->get('post')->num_rows();
    }
    function feedback_diklat($id){
        $this->db->select('feedback_diklat.id_kategori, feedback_diklat_kategori.nama_kategori, avg(skor)');
        $this->db->group_by('id_kategori');
        $this->db->where('id_program',$id);
        $this->db->join('feedback_diklat_kategori','feedback_diklat_kategori.id_kategori=feedback_diklat.id_kategori');
        return $this->db->get('feedback_diklat')->result_array();
    }
    function saran_diklat($id){
        $this->db->where('id_program',$id);
        return $this->db->get('feedback_saran')->result_array();
    }
    function count_feedback_diklat($id){
        $this->db->where('id_program',$id);
        return $this->db->get('feedback_diklat')->num_rows();
    }
    function feedback_saran_pembicara($id){
        $str_query='select saran FROM tb_feedback_pembicara WHERE id_program='.$id;
        return $this->db->query($str_query);
    }
    function feedback_saran_pengajar($id_program,$id_materi,$id_pengajar){
        $this->db->select('saran');
        $this->db->where('id_program',$id_program);
        $this->db->where('id_pengajar',$id_pengajar);
        $this->db->where('id_materi',$id_materi);
        return $this->db->get('feedback_saran_pengajar');
    }
    function feedback_pembicara($id){
        $str_query='select AVG(a) as a,AVG(b) as b,AVG(c) as c,AVG(d) as d,AVG(e) as e,AVG(f) as f,AVG(g) as g,
            AVG(h) as h,AVG(i) as i,AVG(j) as j,AVG(k) as k,AVG(l) as l
            FROM tb_feedback_pembicara WHERE id_program='.$id;
        return $this->db->query($str_query);
    }
    function feedback_pengajar($id_program,$id_materi,$id_pengajar){
        $this->db->select('feedback_pengajar.id_pertanyaan, feedback_diklat_pertanyaan.pertanyaan, avg(skor) as skor');
        $this->db->group_by('id_pertanyaan');
        $this->db->where('id_program',$id_program);
        $this->db->where('id_pengajar',$id_pengajar);
        $this->db->where('id_materi',$id_materi);
        $this->db->join('feedback_diklat_pertanyaan','feedback_pengajar.id_pertanyaan=feedback_diklat_pertanyaan.id_pertanyaan');
        return $this->db->get('feedback_pengajar');
    }
    
    function getall_peserta($id_diklat,$thn=''){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_diklat',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        return $this->db->get('registrasi')->result_array();
    }
    
    function getall_peserta_by_angkatan($id_diklat,$thn=''){
        $this->db->order_by('registrasi.id_program','asc');
        $this->db->order_by('registrasi.status','asc');
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_diklat',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        $array=$this->db->get('registrasi')->result_array();
        $arr_angkatan=array();
        foreach($array as $a){
            $arr_angkatan[$a['id_program']][]=$a;
        }
        return $arr_angkatan;
    }
    function get_peserta_ang_stat($id_diklat,$stat,$thn=''){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_program',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('status like',$stat);
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        return $this->db->get('registrasi')->result_array();
    }
    function get_peserta_dik_stat($id_diklat,$stat,$thn=''){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_diklat',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('status like',$stat);
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        return $this->db->get('registrasi')->result_array();
    }
    
    function get_terima_peserta($id_diklat,$thn=''){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_program',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('status !=','daftar');
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        return $this->db->get('registrasi')->result_array();
    }
    
    function get_status_accept($id_diklat,$thn=''){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_program',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('status like','accept');
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        return $this->db->get('registrasi')->result_array();
    }
    
    function get_status_accept_order($id_diklat,$thn=''){
        if($id_diklat!=-1){
            $this->db->where('registrasi.id_program',$id_diklat);
        }
        if($thn!=''){
            $this->db->where('registrasi.tahun_daftar',$thn);
        }
        $this->db->where('status like','accept');
        $this->db->order_by('jenis_kelamin');
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        $this->db->join('golongan','pegawai.kode_gol=golongan.id','left');
        return $this->db->get('registrasi')->result_array();
    }
    
    function get_one_peserta($id_diklat,$nip_pegawai,$thn){
        $this->db->where('pegawai.nip',$nip_pegawai);
        $this->db->where('registrasi.id_diklat',$id_diklat);
        $this->db->where('registrasi.tahun_daftar',$thn);
        $this->db->join('pegawai','registrasi.id_peserta=pegawai.id');
        return $this->db->get('registrasi')->num_rows();
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
    
    function get_peserta_unit($param){
        $query=$this->db->get_where('pegawai',array('kode_unit'=>$param));
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
	
    function del_history($id){
        $this->db->where('id_peserta',$id);
        $this->db->delete('history_pelatihan');
        return TRUE;
    }
    
    function insert_history($data){
        $this->db->insert_batch('history_pelatihan',$data);
        return TRUE;
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
    
    function ajax_pembicara_by_materi($id_materi){
        $str_query="
            select * from tb_pengajar inner join
            (select nama, tb_p.id as id_pembicara, jenis from tb_pegawai inner join (select * from tb_pembicara where jenis!=3) as tb_p on tb_pegawai.id=tb_p.id_tabel
            union
            select nama, tb_p.id as id_pembicara, jenis from tb_dosen_tamu inner join (select * from tb_pembicara where jenis=3) as tb_p on tb_dosen_tamu.id=tb_p.id_tabel)
            as tb_x on tb_pengajar.id_pembicara=tb_x.id_pembicara where id_materi=
            ".$id_materi;
        $res=$this->db->query($str_query)->result_array();
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
    
    function get_role_pegawai($per_page,$offset,$filter){
        $str_query='select * from tb_pegawai left join tb_role on tb_pegawai.id=tb_role.id_pegawai';
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
	
    function get_data_pegawai_nip($param){
        $query=$this->db->query('select * from tb_pegawai where nip = '.$param);
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
    function get_schedule_by_id($id){
        $this->db->where('id',$id);
        $result=$this->db->get('schedule')->row_array();
        if($result['jenis']=='non materi'){
            $result['judul']=$result['nama_kegiatan'];
        }else{
            $result['judul']=$this->db->get_where('materi',array('id'=>$result['id_materi']))->row()->judul;

            $str_qry_pembicara='SELECT tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam from tb_pembicara 
            left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
            left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3)) inner join tb_pemateri on tb_pembicara.id=tb_pemateri.id_pembicara
            where tb_pemateri.id_schedule='.$result['id'];
            $nama_dosen=$this->db->query($str_qry_pembicara)->result_array();
            if(count($nama_dosen)>0){
                $result['ada_pembicara']=true;
                $result['list_pembicara']=$nama_dosen;
            }else{
                $result['ada_pembicara']=false;
            }
        }
        return $result;
    }
    
    function get_schedule_pemateri($id){
        
    }
    function get_pemateri_program($id){
        $this->db->where('id_program',$id);
        $this->db->group_by('id_pembicara');
        $this->db->join('pemateri','pemateri.id_schedule=schedule.id');
        $this->db->join('pembicara','pembicara.id=pemateri.id_pembicara');
        $pemateri=$this->db->get('schedule')->result_array();
        $pengajar=array();
        foreach($pemateri as $p){
            if($p['jenis']!=3){
                $this->db->select('nama, nip, golongan, pangkat, nama_instansi as instansi');
                $this->db->where('pegawai.id',$p['id_tabel']);
                $this->db->join('golongan','pegawai.kode_gol=golongan.id');
                $this->db->join('instansi','pegawai.instansi=instansi.kode_kantor');
                $data=$this->db->get('pegawai')->row_array();
            }else{
                $this->db->select('nama, nip, golongan, instansi');
                $this->db->join('golongan','dosen_tamu.kode_gol=golongan.id');
                $this->db->where('dosen_tamu.id',$p['id_tabel']);
                $data=$this->db->get('dosen_tamu')->row_array();
            }
            $pengajar[]=$data;
            
        }
        return $pengajar;
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
    
    function get_all_item_schedule($where){
        $this->db->where('id_program',$where); 
        $this->db->order_by('tanggal','asc');
        $this->db->order_by('jam_mulai','asc');
        $arr_schedule=$this->db->get('schedule')->result_array();
        $data_schedule=array();
        for($i=0;$i<count($arr_schedule);$i++){
            //format tulisan tanggal
            $this->load->library('date');
            $arr_schedule[$i]['tanggal']=$this->date->konversi5($arr_schedule[$i]['tanggal']);
            //format jam mulai
            $jam_mulai = strtotime($arr_schedule[$i]['jam_mulai']);
            $jam_mulai_next = strtotime('+15 minute', $jam_mulai);
            $arr_schedule[$i]['jam_mulai']=date('H.i', $jam_mulai) . '-' . date('H.i', $jam_mulai_next);
            //format jam akhir
            $jam_selesai = strtotime($arr_schedule[$i]['jam_selesai']);
            $jam_selesai_next = strtotime('-15 minute', $jam_selesai);
            $arr_schedule[$i]['jam_selesai']=date('H.i', $jam_selesai_next) . '-' . date('H.i', $jam_selesai);
            
            //mengisi judul kegiatan
            if($arr_schedule[$i]['jenis']=='non materi'){
                $arr_schedule[$i]['judul_kegiatan']=$arr_schedule[$i]['nama_kegiatan'];
            }else{
                $arr_schedule[$i]['judul_kegiatan']=$this->db->get_where('materi',array('id'=>$arr_schedule[$i]['id_materi']))->row()->judul;
            
                //mengambil data pemateri dengan id schedule $arr_schedule[$i]['id']
                $str_qry_pembicara='SELECT tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam from tb_pembicara 
                left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
                left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3)) inner join tb_pemateri on tb_pembicara.id=tb_pemateri.id_pembicara
                where tb_pemateri.id_schedule='.$arr_schedule[$i]['id'];
                $nama_dosen=$this->db->query($str_qry_pembicara)->result_array();
                if(count($nama_dosen)>0){
                    $arr_schedule[$i]['ada_pembicara']=true;
                    $arr_schedule[$i]['list_pembicara']=$nama_dosen;
                }else{
                    $arr_schedule[$i]['ada_pembicara']=false;
                }
                //mengambil lokasi kelas
                if($arr_schedule[$i]['jenis_tempat']=='kelas'){
                    $this->db->where('id',$arr_schedule[$i]['id_ruangan']);
                    $data_kelas=$this->db->get('sarpras_kelas')->row_array();
                    $arr_schedule[$i]['nama_ruangan']=$data_kelas['nama'];
                }
                
                //mengambil data pendamping
                $list_pendamping=$this->db->get_where('pendamping',array('id_schedule'=>$arr_schedule[$i]['id']))->result_array();
                if(count($list_pendamping)>0){
                    $arr_schedule[$i]['ada_pendamping']=true;
                    $arr_schedule[$i]['list_pendamping']=$list_pendamping;
                }else{
                    $arr_schedule[$i]['ada_pendamping']=false;
                }
            }
        }
        return $arr_schedule;     
    }
    
    function get_all_item_schedule_pdf($where){
        $this->db->where('id_program',$where); 
        $this->db->order_by('tanggal','asc');
        $this->db->order_by('jam_mulai','asc');
        $arr_schedule=$this->db->get('schedule')->result_array();
        $data_schedule=array();
        for($i=0;$i<count($arr_schedule);$i++){
            //format tulisan tanggal
            $this->load->library('date');
            $arr_schedule[$i]['date']=$arr_schedule[$i]['tanggal'];
            $arr_schedule[$i]['tanggal']=$this->date->konversi5($arr_schedule[$i]['tanggal']);
            //format jam mulai
            $jam_mulai = strtotime($arr_schedule[$i]['jam_mulai']);
            $arr_schedule[$i]['jam_mulai']=date('H.i', $jam_mulai);
            //format jam akhir
            $jam_selesai = strtotime($arr_schedule[$i]['jam_selesai']);
            $arr_schedule[$i]['jam_selesai']=date('H.i', $jam_selesai);
            
            //mengisi judul kegiatan
            if($arr_schedule[$i]['jenis']=='non materi'){
                $arr_schedule[$i]['judul_kegiatan']=$arr_schedule[$i]['nama_kegiatan'];
                $arr_schedule[$i]['ada_pembicara']=false;
                $arr_schedule[$i]['ada_pendamping']=false;
            }else{
                $arr_schedule[$i]['judul_kegiatan']=$this->db->get_where('materi',array('id'=>$arr_schedule[$i]['id_materi']))->row()->judul;
            
                //mengambil data pemateri dengan id schedule $arr_schedule[$i]['id']
                $str_qry_pembicara='SELECT tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam from tb_pembicara 
                left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
                left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3)) inner join tb_pemateri on tb_pembicara.id=tb_pemateri.id_pembicara
                where tb_pemateri.id_schedule='.$arr_schedule[$i]['id'];
                $nama_dosen=$this->db->query($str_qry_pembicara)->result_array();
                if(count($nama_dosen)>0){
                    $arr_schedule[$i]['ada_pembicara']=true;
                    $arr_schedule[$i]['list_pembicara']=$nama_dosen;
                }else{
                    $arr_schedule[$i]['ada_pembicara']=false;
                }
                //mengambil lokasi kelas
                if($arr_schedule[$i]['jenis_tempat']=='kelas'){
                    $this->db->where('id',$arr_schedule[$i]['id_ruangan']);
                    $data_kelas=$this->db->get('sarpras_kelas')->row_array();
                    if(count($data_kelas)>0){
                        $arr_schedule[$i]['nama_ruangan']=$data_kelas['nama'];
                    }else{
                        $arr_schedule[$i]['nama_ruangan']='Belum ditentukan';
                    }
                }
                
                //mengambil data pendamping
                $list_pendamping=$this->db->get_where('pendamping',array('id_schedule'=>$arr_schedule[$i]['id']))->result_array();
                if(count($list_pendamping)>0){
                    $arr_schedule[$i]['ada_pendamping']=true;
                    $arr_schedule[$i]['list_pendamping']=$list_pendamping;
                }else{
                    $arr_schedule[$i]['ada_pendamping']=false;
                }
            }
        }
        return $arr_schedule;     
    }
    
    function get_all_pembicara(){
        $str_qry_pembicara='SELECT tb_dosen_tamu.id as id_dostam, tb_pegawai.id as id_peg, tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_pegawai.nip as nip, tb_dosen_tamu.nama as nama_dostam from tb_pembicara 
            left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
            left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3))';
        return $this->db->query($str_qry_pembicara)->result_array();
    }
    function get_pembicara_id($id){
        $str_qry_pembicara='SELECT tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam from tb_pembicara
            left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
            left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3))
            where tb_pembicara.id = '.$id.'
            ';
        return $this->db->query($str_qry_pembicara)->row_array();
    }
    
    function get_pemateri($id){
        $this->db->join('pembicara','pembicara.id=pemateri.id_pembicara');
        $pemateri=$this->db->get_where('pemateri',array('id_schedule'=>$id))->result_array();
        for($i=0;$i<count($pemateri);$i++){
            if($pemateri[$i]['jenis']!=3){
                $tb='pegawai';
                $data=$this->db->get_where($tb,array('id'=>$pemateri[$i]['id_tabel']))->row_array();
            }else{
                $tb='dosen_tamu';
                $data=$this->db->get_where($tb,array('id'=>$pemateri[$i]['id_tabel']))->row_array();
            }
            $pemateri[$i]['nama']=$data['nama'];
            
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
    
    function delete_schedule_program($id_program){
        $this->db->where('id_program',$id_program);
        $list_schedule=$this->db->get('schedule')->result_array();
        foreach($list_schedule as $l){
            $this->del_schedule($l['id']);
        }
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
    
    function hitung_peserta($id_program){
        $this->db->where('id_program',$id_program);
        $this->db->where('status','accept');
        return $this->db->count_all_results('registrasi');
    }
    
    function get_status($clause){
        $this->db->where($clause);
        return $this->db->get('registrasi')->row()->status;
    }
    
    function get_pemakaian_kamar($id){
        $this->db->select('id_peserta, id_kamar_asrama, asrama, nomor');
        $this->db->group_by('id_peserta');
        $this->db->distinct();
        $this->db->join('sarpras_kamar','sarpras_pemakaian_kamar.id_kamar_asrama=sarpras_kamar.id');
        $this->db->where('id_program',$id);
        
        return $this->db->get('sarpras_pemakaian_kamar')->result_array();
    }
    
    function clear_pemakaian_kamar($id){
        $this->db->where('id_program',$id);
        $this->db->delete('sarpras_pemakaian_kamar');
    }
    
    function get_vacant_kamar_in_date($in_asrama,$tgl_awal,$tgl_akhir){
        $str_query='SELECT * 
                FROM tb_sarpras_kamar
                WHERE tb_sarpras_kamar.id NOT 
                IN (

                SELECT DISTINCT tb_sarpras_kamar.id
                FROM tb_sarpras_kamar
                LEFT JOIN tb_sarpras_pemakaian_kamar ON tb_sarpras_kamar.id = tb_sarpras_pemakaian_kamar.id_kamar_asrama
                WHERE tanggal
                BETWEEN  \''.$tgl_awal.'\'
                AND  \''.$tgl_akhir.'\'
                GROUP BY tb_sarpras_kamar.id
                ) and asrama in '.$in_asrama.'
            ';
        //echo $str_query;
        return $this->db->query($str_query)->result_array();
    }
    
    function insert_alokasi_kamar($batch_data){
        $this->db->insert_batch('sarpras_pemakaian_kamar',$batch_data);
    }
    
    function cek_jadwal_pemateri($data){
        $str_query = "SELECT * 
                FROM tb_schedule
                INNER JOIN tb_pemateri ON tb_schedule.id = tb_pemateri.id_schedule
                WHERE id_pembicara =".$data['id_pembicara']."
                AND tanggal =  '".$data['tanggal']."'
                AND (
                '".$data['jam_mulai']."'
                BETWEEN jam_mulai
                AND jam_selesai
                OR  '".$data['jam_selesai']."'
                BETWEEN jam_mulai
                AND jam_selesai
            )"
        ;
        $retval = $this->db->query($str_query)->num_rows();
        if($retval>0){
            return false;
        }else{
            return true;
        }
    }
}
