<?php

class Mdl_wid extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_materi_wid($kode) {
        $this->db->where('id_pembicara', $kode);
        $this->db->join('materi', 'pengajar.id_materi=materi.id');
        return $this->db->get('pengajar')->result_array();
    }

    function get_materi_peg($kode) {
        $this->db->where('id_tabel', $kode);
        $this->db->join('pengajar', 'pembicara.id=pengajar.id_pembicara');
        $this->db->join('materi', 'pengajar.id_materi=materi.id');
        return $this->db->get('pembicara')->result_array();
    }

    function get_program_wid($kode, $parent, $thn) {
        $this->db->group_by('program.id');
        $this->db->where('id_pembicara', $kode);
        $this->db->where('program.parent', $parent);
        $this->db->where('program.tahun_program', $thn);
        $this->db->join('schedule', 'schedule.id=pemateri.id_schedule');
        $this->db->join('program', 'program.id=schedule.id_program');
        return $this->db->get('pemateri')->result_array();
    }

    function get_thn_wid($kode) {
        $this->db->select('program.tahun_program');
        $this->db->group_by('program.tahun_program');
        $this->db->where('id_pembicara', $kode);
        $this->db->join('schedule', 'schedule.id=pemateri.id_schedule');
        $this->db->join('program', 'program.id=schedule.id_program');
        return $this->db->get('pemateri')->result_array();
    }

    function get_hours_wid($where) {
        $this->db->where($where);
        $this->db->join('schedule', 'schedule.id=pemateri.id_schedule');
        return $this->db->get('pemateri')->result_array();
    }

    function get_hours_peg($id, $id_materi) {
        $this->db->where('id_tabel', $id);
        $this->db->join('pemateri', 'pembicara.id=pemateri.id_pembicara');
        $this->db->join('schedule', 'schedule.id=pemateri.id_schedule');
        return $this->db->get('pembicara')->result_array();
    }

    function get_schedule_wid($kode, $thn) {
        $year = "tanggal BETWEEN '$thn-01-01' AND '$thn-12-31'";
        $this->db->where($year);
        $this->db->where('id_pembicara', $kode);
        $this->db->join('schedule', 'schedule.id=pemateri.id_schedule');
        $this->db->order_by('tanggal', 'asc');
        $this->db->order_by('jam_mulai', 'asc');
        $arr_schedule = $this->db->get('pemateri')->result_array();
        $data_schedule = array();
        for ($i = 0; $i < count($arr_schedule); $i++) {
            //format tulisan tanggal
            $this->load->library('date');
            $arr_schedule[$i]['date'] = $arr_schedule[$i]['tanggal'];
            $arr_schedule[$i]['tanggal'] = $this->date->konversi5($arr_schedule[$i]['tanggal']);
            //format jam mulai
            $jam_mulai = strtotime($arr_schedule[$i]['jam_mulai']);
            $arr_schedule[$i]['jam_mulai'] = date('H.i', $jam_mulai);
            //format jam akhir
            $jam_selesai = strtotime($arr_schedule[$i]['jam_selesai']);
            $arr_schedule[$i]['jam_selesai'] = date('H.i', $jam_selesai);

            //mengisi judul kegiatan
            if ($arr_schedule[$i]['jenis'] == 'non materi') {
                $arr_schedule[$i]['judul_kegiatan'] = $arr_schedule[$i]['nama_kegiatan'];
                $arr_schedule[$i]['ada_pembicara'] = false;
                $arr_schedule[$i]['ada_pendamping'] = false;
            } else {
                $arr_schedule[$i]['judul_kegiatan'] = $this->db->get_where('materi', array('id' => $arr_schedule[$i]['id_materi']))->row()->judul;

                //mengambil data pemateri dengan id schedule $arr_schedule[$i]['id']
                $str_qry_pembicara = 'SELECT tb_pembicara.id, tb_pegawai.nama as nama_peg, tb_dosen_tamu.nama as nama_dostam from tb_pembicara 
                left join tb_pegawai on (id_tabel = tb_pegawai.id AND (jenis =1 OR jenis =2))
                left join tb_dosen_tamu ON (id_tabel = tb_dosen_tamu.id AND (jenis =3)) inner join tb_pemateri on tb_pembicara.id=tb_pemateri.id_pembicara
                where tb_pemateri.id_schedule=' . $arr_schedule[$i]['id'];
                $nama_dosen = $this->db->query($str_qry_pembicara)->result_array();
                if (count($nama_dosen) > 0) {
                    $arr_schedule[$i]['ada_pembicara'] = true;
                    $arr_schedule[$i]['list_pembicara'] = $nama_dosen;
                } else {
                    $arr_schedule[$i]['ada_pembicara'] = false;
                }
                //mengambil lokasi kelas
                if ($arr_schedule[$i]['jenis_tempat'] == 'kelas') {
                    $this->db->where('id', $arr_schedule[$i]['id_ruangan']);
                    $data_kelas = $this->db->get('sarpras_kelas')->row_array();
                    $arr_schedule[$i]['nama_ruangan'] = $data_kelas['nama'];
                }

                //mengambil data pendamping
                $list_pendamping = $this->db->get_where('pendamping', array('id_schedule' => $arr_schedule[$i]['id']))->result_array();
                if (count($list_pendamping) > 0) {
                    $arr_schedule[$i]['ada_pendamping'] = true;
                    $arr_schedule[$i]['list_pendamping'] = $list_pendamping;
                } else {
                    $arr_schedule[$i]['ada_pendamping'] = false;
                }
            }
        }
        return $arr_schedule;
    }

    function get_diklat_materi($kode) {
        $this->db->where('id_materi', $kode);
        $this->db->join('program', 'program.id=materi_diklat.id_diklat');
        return $this->db->get('materi_diklat')->result_array();
    }

    function get_diklat_wid($kode) {
        $this->db->where('id_pembicara', $kode);
        $this->db->join('materi', 'pengajar.id_materi=materi.id');
        $this->db->join('materi_diklat', 'materi_diklat.id_materi=materi.id');
        $this->db->join('program', 'program.id=materi_diklat.id_diklat');
        return $this->db->get('pengajar')->result_array();
    }

    function login_wid($data) {
        $this->load->helper('ldap_helper');
        if (auth($data['username'], $data['password'])) {
            $this->db->where('username', $data['username']);
            $result = $this->db->get('pegawai')->num_rows();
            $this->db->where('username',$data['username']);
            if ($result > 0) {
                $this->db->join('pembicara', 'pembicara.id_tabel=pegawai.id');
                $result=$this->db->get('pegawai')->row_array();
            } else {
                $this->db->join('pembicara', 'pembicara.id_tabel=dosen_tamu.id');
                $result=$this->db->get('dosen_tamu')->row_array();
            }
            if($result){
               return $result; 
            }else{
                return false;
            }
        } else {
            return false;
        }
    }

    function get_detail_pes($kode) {
        $this->db->where('id', $kode);
        return $this->db->get('pegawai')->result_array();
    }

    function get_detail_peg($kode) {
        $this->db->where('id', $kode);
        return $this->db->get('pegawai')->row_array();
    }

    function insert_feedback_pembicara($data) {
        $this->db->insert('feedback_pembicara', $data);
    }

    function insert_feedback_diklat($data) {
        $this->db->insert('feedback_diklat', $data);
    }

    function update_feedback_diklat($data, $clause) {
        $this->db->where('id', $clause);
        $this->db->update('feedback_diklat', $data);
    }

    function get_feedback_diklat($id) {
        $data = $this->db->get_where('feedback_diklat', array('id' => $id));
        if ($data->num_rows() == 1) {
            return $data->row_array();
        } else {
            return FALSE;
        }
    }

    function get_feedback_diklat_program($id) {
        $feedback = $this->db->get_where('feedback_diklat', array('id_program' => $id));
        if ($feedback->num_rows() > 0) {
            return $feedback->result_array();
        } else {
            return FALSE;
        }
    }

    function delete_feedback_diklat($id) {
        $this->db->where('id', $clause);
        $this->db->delete('feedback_diklat');
    }

    function hapus_komponen($data){
        $this->db->where($data);
        $this->db->delete('komponen_penilaian');
        return true;
    }
    function insert_komponen_penilaian($id_materi,$id_program,$batch){
        foreach($batch as $b){
            $this->db->where(array('id_materi'=>$id_materi,'id_program'=>$id_program,'nama_komponen'=>$b['nama_komponen']));
            $res = $this->db->get('komponen_penilaian');
            if($res->num_rows()>0){
                //udah ada, update
                $data = $res->row_array();
                $this->db->where('id',$data['id']);
                $this->db->update('komponen_penilaian',$b);
            }else{
                $this->db->insert('komponen_penilaian',$b);
            }
        }
    }
    
    function get_komponen_penilaian($id_materi,$id_program){
        //hapus data yang sudah ada
        $this->db->where(array('id_materi'=>$id_materi,'id_program'=>$id_program));
        return $this->db->get('komponen_penilaian')->result_array();
    }
    function tot_bobot_penilaian($id_materi,$id_program){
        $this->db->select('sum(bobot) as tot');
        $this->db->where(array('id_materi'=>$id_materi,'id_program'=>$id_program));
        $res=$this->db->get('komponen_penilaian')->row_array();
        if(!$res['tot']){$res['tot']=0;}
        return $res['tot'];
    }
    
    function get_nama_komponen($id_komponen){
        $this->db->where(array('id'=>$id_komponen));
        return $this->db->get('komponen_penilaian')->row_array();
    }
    
    function insert_nilai($id_komponen,$id_wid,$batch,$array_id_peserta){
        //hapus nilai sebelumnya
        if(count($array_id_peserta)){
            $in = '('.implode($array_id_peserta,',').')';
            $this->db->where('id_peserta in '.$in);
        }
        $this->db->where('id_komponen',$id_komponen);
        $this->db->where('id_pengajar',$id_wid);
        $this->db->delete('nilai_peserta');
        
        $this->db->insert_batch('nilai_peserta',$batch);
    }
    
    function get_nilai_peserta($id_komponen){
//        SELECT id_peserta, AVG( nilai ) , id_komponen
//FROM  `tb_nilai_peserta` 
//GROUP BY id_komponen, id_peserta
//WHERE id_komponen=$id_komponen
        $this->db->select('id_peserta');
        $this->db->select('AVG(nilai) as nilai');
        $this->db->where('id_komponen',$id_komponen);
        $this->db->group_by('id_peserta');
        return $this->db->get('nilai_peserta')->result_array();
    }
    function get_nilai_peserta_id($id_peserta,$id_program){
        $this->db->select('id');
        $this->db->where('id_program',$id_program);
        $list=$this->db->get('komponen_penilaian')->result_array();
        $list_komponen=array();
        foreach($list as $l){
            $list_komponen[]=$l['id'];
        }
//        SELECT id_peserta, AVG( nilai ) , id_komponen
//FROM  `tb_nilai_peserta` 
//GROUP BY id_komponen, id_peserta
//WHERE id_komponen=$id_komponen
        $this->db->select('AVG(nilai) as nilai');
        $this->db->where('id_peserta',$id_peserta);
        $this->db->where_in('id_komponen', $list_komponen);
        $res=$this->db->get('nilai_peserta')->row_array();
        if($res['nilai']){
            return $res['nilai'];
        }else{
            return '(belum ada)';
        }
    }
    
    function cek_status_pengumpulan($id_komponen){
        $this->db->distinct();
        $this->db->select('id_pengajar');
        $this->db->where('id_komponen',$id_komponen);
        $this->db->where('id_pengajar',$this->session->userdata('id_wid'));
        $res = $this->db->get('nilai_peserta')->num_rows();
        if($res>0){
            return true;
        }else{
            return false;
        }
    }
}