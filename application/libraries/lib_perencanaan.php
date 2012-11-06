<?php
/**
 * Description of perencanaan
 *
 * @author bharata
 */
class Lib_perencanaan {
    
    function print_tree_kategori($array_kat,$parent=0){
        echo '<ul>';
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                echo '<li>'.$array_kat[$i]['name'].' [<a href="'.base_url().'perencanaan/diklat/edit_kategori/'.$array_kat[$i]['id'].'">Edit</a> | <a href="'.base_url().'perencanaan/diklat/buat_diklat/'.$array_kat[$i]['id'].'">Buat program</a>]</li>';
                $this->print_tree_kategori($array_kat,$array_kat[$i]['id']);
            }
        }
        echo '</ul>';
    }
    
    function print_tree_all($array_kat,$parent=0){
        echo '<ul>';
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                if($array_kat[$i]['tahun_program']!='0000'){
                    echo '<li><a href="'.base_url().'perencanaan/diklat/detail_diklat/'.$array_kat[$i]['id'].'">'.$array_kat[$i]['name'].'</a></li>';
                }else{
                    echo '<li>'.$array_kat[$i]['name'].'</li>';
                }
                $this->print_tree_all($array_kat,$array_kat[$i]['id']);
            }
        }
        echo '</ul>';
    }
    
    function cetak_excel(&$row,$col,$sheet,$array_kat,$parent=0){
        $no=1;
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                if($array_kat[$i]['tahun_program']!='0000'){
                    $data=$array_kat[$i];
                    $sheet->setCellValueByColumnAndRow($col, $row,$no++);
                    $sheet->setCellValueByColumnAndRow($col+1, $row,$data['name']);
                    $sheet->setCellValueByColumnAndRow($col+3, $row,$data['jumlah_peserta']);
                    if($data['tanggal_mulai']!=''&&$data['tanggal_akhir']!=''){
                        $sheet->setCellValueByColumnAndRow($col+4, $row,$data['tanggal_mulai']);
                        $sheet->setCellValueByColumnAndRow($col+5, $row,$data['tanggal_akhir']);
                        $date1=  date_create_from_format('Y-m-d',$data['tanggal_mulai']);
                        $date2=  date_create_from_format('Y-m-d',$data['tanggal_akhir']);
                        $hari = date_diff($date1, $date2, true)->format('%d');
                        $sheet->setCellValueByColumnAndRow($col+2, $row,$hari);
                        //cetak ke samping
                        $idx_hari_mulai = date_format($date1,'z');
                        $idx_hari_selesai = date_format($date2,'z');

                        //ngijoin cell, rumusnya kolom=$idx_hari+6
                        for($idx=$idx_hari_mulai;$idx<=$idx_hari_selesai;$idx++){
                            $style_aktif = array( 
                                'fill' => array( 
                                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 
                                    'color' => array('rgb'=>'00FF00')
                                    )
                                );
                            $sheet->getStyleByColumnAndRow(($idx+6), $row)->applyFromArray($style_aktif);
                        }
                    }
                }else{
                    $sheet->mergeCellsByColumnAndRow($col, $row, ($col+5), $row);
                    $sheet->setCellValueByColumnAndRow($col, $row,$array_kat[$i]['name']);
                    $sheet->getStyleByColumnAndRow($col, $row)
                        ->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
                    $sheet->getStyleByColumnAndRow($col, $row)
                            ->getFont()->setBold(true);
                }
                $row++;
                $this->cetak_excel($row, $col, $sheet, $array_kat,$array_kat[$i]['id']);
            }
        }
    }
    
    function overview($array,$id,$field){
        if(count($array)>0){
            foreach($array as $data){
                if($data['id']==$id){
                    return $data[$field];
                }
            }
        }
    }
    function print_child_feedback($array,$id_program,$kiri,$kanan,$kelas){
        if($array){
            $no=1;
            foreach($array as $data){
                if($data['id_program']==$id_program){
                    echo $kiri.'<a href="perencanaan/feedback/display_feedback_sarpras/'.$data['id'].'"><i class="icon-list-alt"></i> 
                            Feedback '.$no.'
                        </a>'.$kanan.'
                        ';
                    $no++;
                }
            }
        }
    }
    function print_child_schedule($array,$parent,$kiri,$kanan,$kelas){
        if($array){
            foreach($array as $data){
                if($data['parent']==$parent){
                    echo $kiri.'<a href="penyelenggaraan/schedule/buat_schedule/'.$data['id'].'" class="'.$kelas.'">
                            '.$data['name'].'
                        </a>'.$kanan.'
                        ';
                }
            }
        }
    }
    function print_child_pub($array,$parent,$kiri,$kanan,$kelas){
        if($array){
            foreach($array as $data){
                if($data['parent']==$parent){
                    echo $kiri.'
                            '.$data['name'].'
                        '.$kanan.'
                        ';
                }
            }
        }
    }
}

