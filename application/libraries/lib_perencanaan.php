<?php
/**
 * Description of perencanaan
 *
 * @author bharata
 */
class Lib_perencanaan {
    
    function __construct() {
	$CI = & get_instance();
        $this->session = $CI->session;
    }
    
    function count_diklat($array,$parent){
        $count=0;
        foreach($array as $var){
            if($var['parent']==$parent){
                ++$count;
            }
        }
        return $count;
    }
    
    function print_tree_all($array_kat,$parent=0){
        echo '<ul class="tree">'."\n";
        foreach($array_kat as $diklat){
            if($diklat['parent']==$parent){
                if($diklat['tipe']==1){
                    echo '<li><h3>'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')';
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
                        echo ' <a class="tip" rel="tooltip" title="Edit Kategori" href="javascript:edit_kat(\''.$diklat['name'].'\','.$diklat['parent'].','.$diklat['id'].')"><i class="icon-edit"></i></a>';
                        echo ' <a class="tip" rel="tooltip" title="Hapus Kategori" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'diklat/delete_kategori/'.$diklat['id'].'"><i class="icon-remove"></i></a>';
                        echo ' <a class="tip" rel="tooltip" title="Tambah subkategori" href="javascript:add_subkat('.$diklat['id'].')"><i class="icon-plus-sign"></i></a>';
                        echo ' <a class="tip" rel="tooltip" title="Buat diklat di kategori ini" href="'.base_url().'diklat/buat_diklat/'.$diklat['id'].'"><i class="icon-plus"></i></a>';
                        echo '</h3>';
                    }
                }else if($diklat['tipe']==2){
                    echo '<li><h4>'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')';
                    echo ' <a class="tip" rel="tooltip" title="Lihat diklat ini" href="'.base_url().'diklat/view_diklat/'.$diklat['id'].'"><i class="icon-eye-open"></i></a>';
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
                        echo ' <a class="tip" rel="tooltip" title="Edit diklat ini" href="'.base_url().'diklat/edit_diklat/'.$diklat['id'].'"><i class="icon-edit"></i></a>';
                        echo ' <a class="tip" rel="tooltip" title="Hapus diklat ini" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'diklat/delete_diklat/'.$diklat['id'].'"><i class="icon-remove"></i></a>';
                        echo ' <a class="tip" rel="tooltip" title="Buka program di diklat ini" href="'.base_url().'program/buat_program/'.$diklat['id'].'"><i class="icon-plus"></i></a></h4>';
                    }
                }else if($diklat['tipe']==3){
                    echo '<li><h5> Angkatan '.$diklat['angkatan'];
                    echo ' <a class="tip" rel="tooltip" title="Lihat program ini" href="'.base_url().'program/view_program/'.$diklat['id'].'"><i class="icon-eye-open"></i></a>';
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
                        echo ' <a class="tip" rel="tooltip" title="Edit program ini" href="'.base_url().'program/edit_program/'.$diklat['id'].'"><i class="icon-edit"></i></a>';
                        echo ' <a class="tip" rel="tooltip" title="Hapus program ini" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'program/delete_diklat/'.$diklat['id'].'"><i class="icon-remove"></i></a></h5>';
                    }
                }
                if($this->count_diklat($array_kat,$diklat['id'])>0){
                $this->print_tree_all($array_kat,$diklat['id']);}
                echo "</li>\n";
            }
        }
        echo "</ul>\n";
    }
    
    function cetak_excel(&$row,$col,$sheet,$array_kat,$parent=0,$nama_parent=''){
        $no=1;
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                if($array_kat[$i]['tipe']==3){
                    $data=$array_kat[$i];
                    $sheet->setCellValueByColumnAndRow($col, $row,$no++);
                    $sheet->setCellValueByColumnAndRow($col+1, $row,$nama_parent.' angkatan '.$data['angkatan']);
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
                $this->cetak_excel($row, $col, $sheet, $array_kat,$array_kat[$i]['id'],$array_kat[$i]['name']);
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

