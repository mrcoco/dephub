<?php

class Program extends CI_Controller {

    function __construct() {
        parent::__construct();
        if (!$this->session->userdata('is_login')) {
            redirect(base_url());
        }
        $this->load->model('mdl_perencanaan', 'rnc');
        $this->load->model('mdl_sarpras', 'spr');
        $this->load->model('mdl_penyelenggaraan', 'slng');
        $this->load->library('date');
    }

    function view_program($id) {
        $this->load->library('date');
        $data['sub_title']="Detail Program";
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $data['pil_pendidikan'] = $this->rnc->get_list_pendidikan();
        $data['pil_pangkat'] = $this->rnc->get_pangkat_gol();
        $data['materi'] = $this->rnc->get_materi_diklat($data['program']['parent']);
        $pil_kelas = $this->spr->get_kelas_by_size($data['diklat']['jumlah_peserta'])->result_array();
        $data['kelas'] = array(0 => '-');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }
        $pil_gedung = $this->spr->get_gedung()->result_array();

        foreach ($pil_gedung as $g) {
            $data['asrama'][$g['id']] = 'Asrama ' . $g['nama'];
        }
        $alokasi_asrama = $this->spr->get_alocated_gedung($id);
        $data['pil_asrama'] = array();
        foreach ($alokasi_asrama as $as) {
            $data['pil_asrama'][] = $data['asrama'][$as['id_asrama']];
        }

        $this->template->display_with_sidebar('program/view_program', 'program', $data);
    }

    function buat_program($parent) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }

        $this->load->library('editor');

        $data['program'] = $data['pil_diklat'] = $this->rnc->get_diklat_by_id($parent);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }

        $pil_kelas = $this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();

        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }

        $pil_gedung = $this->spr->get_gedung()->result_array();

        foreach ($pil_gedung as $g) {
            $data['asrama'][] = array('id' => $g['id'], 'nama' => 'Asrama ' . $g['nama']);
        }


        $data['sub_title'] = 'Buat Program Baru di Diklat ' . $data['pil_diklat']['name'];
        $this->template->display_with_sidebar('program/form_buat_program', 'diklat', $data);
    }

    function insert_program() {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }

        $data['angkatan'] = $this->input->post('angkatan');
        $data['parent'] = $this->input->post('parent');
        $data['tipe'] = 3;
        $data['tahun_program'] = $this->input->post('tahun_program');
        $data['tanggal_mulai'] = $this->date->savetgl($this->input->post('tanggal_mulai'));
        $data['tanggal_akhir'] = $this->date->savetgl($this->input->post('tanggal_akhir'));
        $data['lama_pendidikan'] = $this->input->post('lama_pendidikan');
        $data['pelaksanaan'] = $this->input->post('pelaksanaan');
        $data['tempat'] = $this->input->post('tempat');
        $data['pelaksana'] = $this->input->post('pelaksana');
        $data['fasilitator'] = $this->input->post('fasilitator');
        $data['kelas'] = $this->input->post('kelas');

        $id = $this->rnc->insert_program($data);

        //insert penggunaan kelas

        $array_tanggal = $this->date->createDateRangeArray($data['tanggal_mulai'], $data['tanggal_akhir']);
        $batch = array();
        foreach ($array_tanggal as $t) {
            $batch[] = array('id_program' => $id, 'id_kelas' => $data['kelas'], 'tanggal' => $t);
        }
        $this->spr->insert_penggunaan_kelas_batch($batch);

        //insert alokasi asrama
        $asrama_pil = $this->input->post('asrama');
        $batch = array();
        foreach ($asrama_pil as $a) {
            $batch[] = array('id_program' => $id, 'id_asrama' => $a);
        }
        $this->spr->insert_alokasi_asrama_batch($batch);

        $this->session->set_flashdata('msg', $this->editor->alert_ok('Program telah ditambahkan'));
        redirect(base_url() . 'program/view_program/' . $id);
    }

    function edit_program($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['pil_diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);
        $pil_kelas = $this->spr->get_kelas_by_size($data['pil_diklat']['jumlah_peserta'])->result_array();
        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }
        $pil_gedung = $this->spr->get_gedung()->result_array();

        foreach ($pil_gedung as $g) {
            $data['asrama'][] = array('id' => $g['id'], 'nama' => 'Asrama ' . $g['nama']);
        }
        $alokasi_asrama = $this->spr->get_alocated_gedung($id);
        $data['pil_asrama'] = array();
        foreach ($alokasi_asrama as $as) {
            $data['pil_asrama'][$as['id_asrama']] = true;
        }


        $data['sub_title'] = 'Edit Program ' . $data['pil_diklat']['name'] . ' Angkatan ' . $data['program']['angkatan'];
        $this->template->display_with_sidebar('program/form_edit_program', 'program', $data);
    }

    function update_program() {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $clause = $this->input->post('id');
        $data['angkatan'] = $this->input->post('angkatan');
        $data['parent'] = $this->input->post('parent');
        $data['tipe'] = 3;
        $data['tahun_program'] = $this->input->post('tahun_program');
        $data['tanggal_mulai'] = $this->date->savetgl($this->input->post('tanggal_mulai'));
        $data['tanggal_akhir'] = $this->date->savetgl($this->input->post('tanggal_akhir'));
        $data['lama_pendidikan'] = $this->input->post('lama_pendidikan');
        $data['pelaksanaan'] = $this->input->post('pelaksanaan');
        $data['tempat'] = $this->input->post('tempat');
        $data['pelaksana'] = $this->input->post('pelaksana');
        $data['fasilitator'] = $this->input->post('fasilitator');
        $data['kelas'] = $this->input->post('kelas');

        $this->rnc->update_program($clause, $data);

        //insert penggunaan kelas
        $this->spr->delete_penggunaan_kelas($clause);
        $array_tanggal = $this->date->createDateRangeArray($data['tanggal_mulai'], $data['tanggal_akhir']);
        $batch = array();
        foreach ($array_tanggal as $t) {
            $batch[] = array('id_program' => $clause, 'id_kelas' => $data['kelas'], 'tanggal' => $t);
        }
        $this->spr->insert_penggunaan_kelas_batch($batch);


        //insert alokasi asrama
        $batch = array();
        if(isset($_POST['asrama'])){
            $asrama_pil = $this->input->post('asrama');
            foreach ($asrama_pil as $a) {
                $batch[] = array('id_program' => $clause, 'id_asrama' => $a);
            }
        }
        $this->spr->delete_alokasi_asrama($clause);
        if(count($batch)>0){
            $this->spr->insert_alokasi_asrama_batch($batch);
        }
        $this->session->set_flashdata('msg', $this->editor->alert_ok('Data program telah diperbaharui'));
        redirect(base_url() . 'program/view_program/' . $clause);
    }

    function delete_program($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $this->rnc->delete_program($id);
        $this->session->set_flashdata('msg', $this->editor->alert_ok('Program telah dihapus'));
        redirect(base_url() . 'diklat');
    }

    function schedule_program($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }
        $data['diklat'] = $this->rnc->get_diklat_by_id($data['program']['parent']);

        $pil_materi = $this->rnc->get_materi_diklat($data['program']['parent']);
        $data['pil_materi'][-1] = '-- Pilih Materi --';
        foreach ($pil_materi as $p) {
            $data['pil_materi'][$p['id_materi']] = $p['judul'];
        }

        $pil_kelas = $this->spr->get_kelas_by_size($data['diklat']['jumlah_peserta'])->result_array();

        $data['kelas'] = array(-1 => '-- Pilih Kelas --');
        foreach ($pil_kelas as $k) {
            $data['kelas'][$k['id']] = $k['nama'];
        }

        $data['schedule'] = $this->slng->get_schedule($id);

        $json_array = array();
        if (count($data['schedule']) != 0) {
            //proses json
            $i = 0;
            foreach ($data['schedule'] as $item) {
                $i++;
                $isi['id'] = $i;
                $isi['start'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_mulai']);
                $isi['end'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_selesai']);
                if ($item['jenis'] == 'non materi')
                    $isi['title'] = $item['nama_kegiatan'];
                else
                    $isi['title'] = $data['pil_materi'][$item['id_materi']];
                $json_array[] = $isi;
            }
            $data['id_max'] = $i;
        }else {
            $data['id_max'] = 1;
        }
        $data['id'] = $id;
        $data['sub_title'] = 'Jadwal Tentative';
        $data['data_json'] = $json_array;
        $this->template->display_with_sidebar('program/schedule_program', 'program', $data);
    }

    function print_schedule($id) {
        if ($this->session->userdata('id_role') == 2 || $this->session->userdata('id_role') == 4) {
            redirect(base_url() . 'error/error_priv');
        }
        $this->load->library('date');
        $this->load->library('excel');

        $data['program'] = $this->rnc->get_program_by_id($id);
        if(!$data['program']){
            $this->session->set_flashdata('msg',$this->editor->alert_error('Program tidak ditemukan'));
            redirect(base_url().'diklat/daftar_diklat/');
        }

        $data_schedule = $this->slng->get_all_item_schedule($id);
        
        if (!$data['program']) {
            $this->session->set_flashdata('msg', $this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url() . 'penyelenggaraan/schedule/daftar_diklat');
        }

        //set date range
        
        $waktu = strtotime($data['program']['tanggal_mulai']);
        if (date('w', $waktu) > 0) {
            $waktu = strtotime("-" . date('w', $waktu) . " day", $waktu);
        }

        
        $tgl_end = strtotime($data['program']['tanggal_akhir']);
        if (date('w', $tgl_end) < 6) {
            $selisih = 6 - date('w', $tgl_end);
            $tgl_end = strtotime("+" . $selisih . " day", $tgl_end);
        }

        $array_tanggal = array();
        $array_idx_tanggal=array();
        $idx = 0;
        while ($waktu <= $tgl_end) {
            $array_tanggal[$idx]['tanggal'] = date('d', $waktu) . ' ' . $this->date->get_month_name(date('m', $waktu)) . ' ' . date('Y', $waktu);
            $array_tanggal[$idx]['hari'] = $this->date->get_day_name(date('N', $waktu));
            $array_idx_tanggal[$array_tanggal[$idx]['tanggal']]=$idx;
            $waktu = strtotime("+1 day", $waktu);
            $idx++;
        }
        
        //set jam
        $array_jam = array();
        $jam = strtotime('05:00');
        $batas_jam = strtotime('21.45');
        while ($jam <= $batas_jam) {
            $nxt = strtotime('+15 minute', $jam);
            $array_jam[] = date('H.i', $jam) . '-' . date('H.i', $nxt);
            $jam = $nxt;
        }

        $num_week = ceil(count($array_tanggal) / 7);


        $this->excel->setActiveSheetIndex(0);
        $this->excel->getActiveSheet()->setTitle('Jadwal Pelatihan');
        $this->excel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(9);
        $sheet = $this->excel->getActiveSheet();
        $sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4)->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
        

        //bikin header jadwal

        $col = 0;

        $row = 2;
        $judul = strtoupper('Jadwal Tentative ' . $data['program']['name']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();


        $row = 3;
        $judul = strtoupper('Kementrian Perhubungan ' . $data['program']['tahun_program']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();

        $row = 5;
        $judul = $this->date->konversi5($data['program']['tanggal_mulai']) . ' S/D ' . $this->date->konversi5($data['program']['tanggal_akhir']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();


        //print per week
        $row = 8;
        for ($week = 0; $week < $num_week; $week++) {
            $idx_perweek = 7 * $week + 1;
            $idx_maxweek = 7 * $week + 7;

            $col = 1;
            $arr_col_tgl=array();
            for ($idx_perweek; $idx_perweek <= $idx_maxweek; $idx_perweek++) {
                $sheet->setCellValueByColumnAndRow($col, $row, $array_tanggal[$idx_perweek - 1]['tanggal']);
                $sheet->setCellValueByColumnAndRow($col, $row + 1, $array_tanggal[$idx_perweek - 1]['hari']);
                $sheet->getColumnDimensionByColumn($col)->setWidth(23);
                $arr_col_tgl[$array_tanggal[$idx_perweek - 1]['tanggal']]=$col;
                $col++;
            }
            
            $row+=2;
            $col_jam = 0;
            $arr_row_jam=array();
            $sheet->getColumnDimensionByColumn($col_jam)->setAutoSize(true);
            foreach ($array_jam as $j) {
                $sheet->setCellValueByColumnAndRow(0, $row, $j);
                $arr_row_jam[$j]=$row;
                $row++;
            }
            
            foreach($data_schedule as $ds){
                if(array_key_exists($ds['tanggal'], $arr_col_tgl)&&array_key_exists($ds['jam_mulai'], $arr_row_jam)&&array_key_exists($ds['jam_selesai'], $arr_row_jam)){
                    $kol_print=$arr_col_tgl[$ds['tanggal']];
                    $row_mulai = $arr_row_jam[$ds['jam_mulai']];
                    $row_selesai = $arr_row_jam[$ds['jam_selesai']];
                    $sheet->mergeCellsByColumnAndRow($kol_print, $row_mulai, $kol_print, $row_selesai);
                    $isi = $ds['judul_kegiatan']."\n";
                    if($ds['jenis']=='materi'){
                        $isi.='Pembicara : '."\n";
                        if($ds['ada_pembicara']){
                            $no=1;
                            foreach($ds['list_pembicara'] as $p){
                                if($p['nama_peg']!=''){
                                    $isi.=$no++.'. '.$p['nama_peg']."\n";
                                }else{
                                    $isi.=$no++.'. '.$p['nama_dostam']."\n";
                                }
                            }
                        }
                        $isi.='Pendamping : '."\n";
                        if($ds['ada_pendamping']){
                            $no=1;
                            foreach($ds['list_pendamping'] as $p){
                                $isi.=$no++.'. '.$p['nama']."\n";
                            }
                        }
                    }
                    $sheet->setCellValueByColumnAndRow($kol_print, $row_mulai, $isi);
                }
            }
            $row+=2;
        }
        
        
        
        $filename = 'schedule diklat.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
        

//        //menghitung awal minggu
//        $idx_hari_awal = date('w',strtotime($data['program']['tanggal_mulai']));
//        $time_awal_minggu = strtotime ( '-'.$idx_hari_awal.'day' , strtotime ( $data['program']['tanggal_mulai'] ) ) ;
//        $awal_minggu = date ( 'Y-m-d' , $time_awal_minggu );
//        
//        //menghitung akhir minggu
//        $idx_hari_akhir = date('w',strtotime($data['program']['tanggal_akhir']));
//        $time_akhir_minggu = strtotime ( '+'.(6-$idx_hari_awal).'day' , strtotime ( $data['program']['tanggal_akhir'] ) ) ;
//        $akhir_minggu = date ( 'Y-m-d' , $time_akhir_minggu );
//        
//        $arr_tanggal = $this->date->createDateRangeArray($awal_minggu, $akhir_minggu);
//        
//
//        $this->excel->setActiveSheetIndex(0);
//        $this->excel->getActiveSheet()->setTitle('Jadwal Pelatihan');
//        $this->excel->getDefaultStyle()->getFont()->setName('Times New Roman')->setSize(9);
//        $sheet = $this->excel->getActiveSheet();
//        $sheet->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4)->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
//
//
//        //bikin header jadwal
//
//        $col = 0;
//
//        $row = 2;
//        $judul = strtoupper('Jadwal Tentative ' . $data['program']['name']);
//        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
//        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
//        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();
//
//
//        $row = 3;
//        $judul = strtoupper('Kementrian Perhubungan ' . $data['program']['tahun_program']);
//        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
//        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
//        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();
//
//        $row = 5;
//        $judul = $this->date->konversi5($data['program']['tanggal_mulai']) . ' S/D ' . $this->date->konversi5($data['program']['tanggal_akhir']);
//        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
//        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
//        $sheet->getStyleByColumnAndRow($col, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
//        $sheet->getStyleByColumnAndRow($col, $row)->getFont()->setSize(12)->setBold();
//
//        //print harinya
//        
//        
//        
//
//
//        $filename = 'schedule diklat.xlsx'; //save our workbook as this file name
//        header('Content-Type: application/vnd.ms-excel'); //mime type
//        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
//        header('Cache-Control: max-age=0'); //no cache
//
//        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
//        $obj_writer->save('php://output');
    }

    function ajax_pembicara($id_materi) {
        echo json_encode($this->slng->ajax_pembicara_by_materi($id_materi));
    }

    function ajax_save() {
        $this->load->library('date');
        $data_ins['id_program'] = $this->input->post('id_program');
        $data_ins['jam_mulai'] = $this->input->post('jam_mulai');
        $data_ins['jam_selesai'] = $this->input->post('jam_selesai');
        $data_ins['tanggal'] = $this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis'] = $this->input->post('jenis');
        $data_ins['jenis_tempat'] = $this->input->post('jenis_tempat');
        $data_ins['id_ruangan'] = $this->input->post('id_ruangan');
        $data_ins['lokasi'] = $this->input->post('lokasi');
        if ($data_ins['jenis'] == 'non materi') {
            $data_ins['nama_kegiatan'] = $this->input->post('materi');
        } else if ($data_ins['jenis'] == 'materi') {
            $data_ins['id_materi'] = $this->input->post('materi');
        }
        $data_materi['arr_pembicara'] = array();
        $data_materi['arr_pendamping'] = array();
        if ($data_ins['jenis'] == 'materi') {
            $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
            $data_materi['arr_pendamping'] = $this->input->post('pendamping');
        }
        echo $this->slng->insert_schedule($data_ins, $data_materi);
    }

    function ajax_update_waktu() {
        $data_new['jam_mulai'] = $this->input->post('new_start');
        $data_new['jam_selesai'] = $this->input->post('new_end');
        $data_new['tanggal'] = $this->input->post('new_date');

        $data_where['jam_mulai'] = $this->input->post('old_start');
        $data_where['jam_selesai'] = $this->input->post('old_end');
        $data_where['tanggal'] = $this->input->post('old_date');
        $this->slng->update_waktu($data_new, $data_where);
    }

    function ajax_get_data_schedule() {
        $where['jam_mulai'] = $this->input->post('where_start');
        $where['jam_selesai'] = $this->input->post('where_end');
        $where['tanggal'] = $this->input->post('where_date');
        $where['id_program'] = $this->input->post('id_program');
        $retval = $this->slng->get_item_schedule($where);
        echo json_encode($retval);
    }

    function ajax_get_form_pemateri_pembimbing($id) {
        //query nama, id, dan jenis pembicara & pendamping
        $data['qry_pemateri'] = $this->slng->get_pemateri($id);
        $data['qry_pendamping'] = $this->slng->get_pendamping($id);
        echo $this->load->view('program/ajax_pemateri', $data, TRUE);
    }

    function ajax_delete_schedule($id) {
        $this->slng->del_schedule($id);
        echo 'Delete success';
    }

    function ajax_edit_all() {
        $this->load->library('date');

        $data_where['id'] = $this->input->post('idschedule');

        $data_ins['id_program'] = $this->input->post('id_program');
        $data_ins['jam_mulai'] = $this->input->post('jam_mulai');
        $data_ins['jam_selesai'] = $this->input->post('jam_selesai');
        $data_ins['tanggal'] = $this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis'] = $this->input->post('jenis');
        $data_ins['jenis_tempat'] = $this->input->post('jenis_tempat');
        $data_ins['id_ruangan'] = $this->input->post('id_ruangan');
        $data_ins['lokasi'] = $this->input->post('lokasi');
        if ($data_ins['jenis'] == 'non materi') {
            $data_ins['nama_kegiatan'] = $this->input->post('materi');
        } else if ($data_ins['jenis'] == 'materi') {
            $data_ins['id_materi'] = $this->input->post('materi');
        }
        $data_materi['arr_pembicara'] = array();
        $data_materi['arr_pendamping'] = array();
        if ($data_ins['jenis'] == 'materi') {
            $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
            $data_materi['arr_pendamping'] = $this->input->post('pendamping');
        }

        $this->slng->update_schedule($data_ins, $data_materi, $data_where);
        echo json_encode($data_ins);
    }

}