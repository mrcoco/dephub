<?php

class Schedule extends Penyelenggaraan_Controller {

    protected $thn_default;

    function __construct() {
        parent::__construct();
        $this->thn_default = date('Y');
        $this->load->model('mdl_perencanaan', 'rnc');
        $this->load->model('mdl_penyelenggaraan', 'slng');
    }

    public function index() {
        $this->daftar_diklat();
    }

    function daftar_diklat($thn = '') {
        if ($thn == '') {
            $thn = $this->thn_default;
        }
        $this->load->library('lib_perencanaan');
        $data['sub_title'] = 'Daftar Diklat Tahun ' . $thn;
        $data['kategori'] = $this->rnc->get_kategori();
        $data['pil_kategori'] = array();
        foreach ($data['kategori'] as $k) {
            $data['pil_kategori'][$k['id']] = $k['name'];
        }
        $data['program'] = $this->rnc->get_program($thn);
        $this->template->display('simdik/penyelenggaraan/daftar_diklat', $data);
    }

    function buat_schedule($id) {
        $this->load->library('date');
        $data['program'] = $this->rnc->get_program_by_id($id);
        if (!$data['program']) {
            $this->session->set_flashdata('msg', $this->editor->alert_error('Diklat tidak ditemukan'));
            redirect(base_url() . 'penyelenggaraan/schedule/daftar_diklat');
        }

        $data['schedule'] = $this->slng->get_schedule($id);

        $json_array = array();
        if (count($data['schedule']) != 0) {
            //proses json
            $i = 1;
            foreach ($data['schedule'] as $item) {
                $isi['id'] = $i;
                $isi['start'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_mulai']);
                $isi['end'] = $this->date->extract_date($item['tanggal'] . ' ' . $item['jam_selesai']);
                $isi['title'] = $item['materi'];
                $json_array[] = $isi;
                $i++;
            }
        }

        $data['id_max'] = $i - 1;
        $data['data_json'] = $json_array;
        $this->template->display('simdik/penyelenggaraan/schedule_diklat', $data);
    }

    function print_schedule($id) {
        $this->load->library('date');
        $this->load->library('excel');

        $data['program'] = $this->rnc->get_program_by_id($id);

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
            $selisih = 7 - date('w', $tgl_end);
            $tgl_end = strtotime("+" . $selisih . " day", $tgl_end);
        }

        $array_tanggal = array();
        $array_idx_tanggal=array();
        $idx = 0;
        while ($waktu < $tgl_end) {
            $array_tanggal[$idx]['tanggal'] = date('d', $waktu) . ' ' . $this->date->get_month_name(date('m', $waktu)) . ' ' . date('Y', $waktu);
            $array_tanggal[$idx]['hari'] = $this->date->get_day_name(date('N', $waktu));
            $array_idx_tanggal[$array_tanggal[$idx]['tanggal']]=$idx;
            $waktu = strtotime("+1 day", $waktu);
            $idx++;
        }


        //set jam
        $array_jam = array();
        $jam = strtotime('00:00');
        $batas_jam = strtotime('23.45');
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
        $sheet->getStyleByColumnAndRow($col, $row, $col + 7, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row, $col + 7, $row)->getFont()->setSize(12)->setBold();


        $row = 3;
        $judul = strtoupper('Kementrian Perhubungan ' . $data['program']['tahun_program']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row, $col + 7, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row, $col + 7, $row)->getFont()->setSize(12)->setBold();

        $row = 5;
        $judul = $this->date->konversi5($data['program']['tanggal_mulai']) . ' S/D ' . $this->date->konversi5($data['program']['tanggal_akhir']);
        $sheet->setCellValueByColumnAndRow($col, $row, $judul);
        $sheet->mergeCellsByColumnAndRow($col, $row, $col + 7, $row);
        $sheet->getStyleByColumnAndRow($col, $row, $col + 7, $row)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $sheet->getStyleByColumnAndRow($col, $row, $col + 7, $row)->getFont()->setSize(12)->setBold();


        //print per week
        $row = 8;
        for ($week = 0; $week < $num_week; $week++) {
            $idx_perweek = 7 * $week + 1;
            $idx_maxweek = 7 * $week + 7;

            $col = 1;
            for ($idx_perweek; $idx_perweek <= $idx_maxweek; $idx_perweek++) {
                $sheet->setCellValueByColumnAndRow($col, $row, $array_tanggal[$idx_perweek - 1]['tanggal']);
                $sheet->setCellValueByColumnAndRow($col, $row + 1, $array_tanggal[$idx_perweek - 1]['hari']);
                $sheet->getColumnDimensionByColumn($col)->setAutoSize(true);
                $col++;
            }

            $row+=2;
            $col_jam = 0;
            $sheet->getColumnDimensionByColumn($col_jam)->setAutoSize(true);
            foreach ($array_jam as $j) {
                $sheet->setCellValueByColumnAndRow(0, $row, $j);
                $row++;
            }
            $row+=2;
        }

        //insert schedule ke excel
        $data['schedule'] = $this->slng->get_schedule_pemateri($id);
        

        $filename = 'jadwal pelatihan.xlsx'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="' . $filename . '"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        $obj_writer = new PHPExcel_Writer_Excel2007($this->excel);
        $obj_writer->save('php://output');
    }

    function ajax_pembicara($jenis) {
        echo json_encode($this->slng->ajax_pembicara($jenis));
    }

    function ajax_save() {
        $this->load->library('date');
        $data_ins['id_program'] = $this->input->post('id_program');
        $data_ins['jam_mulai'] = $this->input->post('jam_mulai');
        $data_ins['jam_selesai'] = $this->input->post('jam_selesai');
        $data_ins['tanggal'] = $this->date->konversi3($this->input->post('tanggal'));
        $data_ins['jenis'] = $this->input->post('jenis');
        $data_ins['materi'] = $this->input->post('materi');

        $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
        $data_materi['arr_pendamping'] = $this->input->post('pendamping');

        $this->slng->insert_schedule($data_ins, $data_materi);
    }

    function ajax_update_waktu() {
        $data_new['jam_mulai'] = $this->input->post('new_start');
        $data_new['jam_selesai'] = $this->input->post('new_end');
        $data_new['tanggal'] = $this->input->post('new_date');

        $data_where['jam_mulai'] = $this->input->post('old_start');
        $data_where['jam_selesai'] = $this->input->post('old_end');
        $data_where['tanggal'] = $this->input->post('old_date');
        $data_where['materi'] = $this->input->post('title');
        $data_where['id_program'] = $this->input->post('id_program');
        $this->slng->update_waktu($data_new, $data_where);
    }

    function ajax_get_data_schedule() {
        $where['jam_mulai'] = $this->input->post('where_start');
        $where['jam_selesai'] = $this->input->post('where_end');
        $where['tanggal'] = $this->input->post('where_date');
        $where['materi'] = $this->input->post('title');
        $where['id_program'] = $this->input->post('id_program');
        $retval = $this->slng->get_item_schedule($where);
        echo json_encode($retval);
    }

    function ajax_get_form_pemateri_pembimbing($id) {
        //query nama, id, dan jenis pembicara & pendamping
        $data['qry_pemateri'] = $this->slng->get_pemateri($id);
        $data['qry_pendamping'] = $this->slng->get_pendamping($id);
        echo $this->load->view('simdik/penyelenggaraan/ajax_pemateri', $data, TRUE);
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
        $data_ins['materi'] = $this->input->post('materi');

        $data_materi['arr_pembicara'] = $this->input->post('id_pembicara');
        $data_materi['arr_pendamping'] = $this->input->post('pendamping');

        $this->slng->update_schedule($data_ins, $data_materi, $data_where);
        echo json_encode($data_ins);
    }

}
