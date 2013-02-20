<?php
/**
 * Description of perencanaan
 *
 * @author bharata
 */
class Lib_perencanaan {
    protected $CI;
    function __construct() {
	$this->CI=$CI = & get_instance();
        $this->session = $CI->session;
        $this->date = $CI->date;
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
        echo '<ul class="ind"';
//        if($parent==0){echo ' class="tree" id="expList"';}else{echo ' class="tree"';}
        echo '>'."\n";
        foreach($array_kat as $diklat){
            if($diklat['parent']==$parent){
                if($diklat['tipe']==1){
                    echo '<li><h3>'.$diklat['name'];
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
                        echo ' <small class="dropdown"><a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">('.$this->count_diklat($array_kat,$diklat['id']).') <b class="caret"></b></a><ul class="dropdown-menu">';
                        echo '<li><a href="javascript:edit_kat(\''.$diklat['name'].'\','.$diklat['parent'].','.$diklat['id'].')">Ubah Kategori</a></li>';
                        echo '<li><a onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'diklat/delete_kategori/'.$diklat['id'].'">Hapus Kategori</a></li>';
                        echo '<li><a href="javascript:add_subkat('.$diklat['id'].')">Tambah subkategori</a></li>';
                        echo '<li><a href="'.base_url().'diklat/buat_diklat/'.$diklat['id'].'">Buat diklat</a></li>';
                        echo '</ul></small>';
                    }
                    echo '</h3></li>';
                }else if($diklat['tipe']==2){
                    echo '<li><h4><a class="tip" title="Lihat diklat ini" href="'.base_url().'diklat/view_diklat/'.$diklat['id'].'">'.$diklat['name'].'</a>';
                    echo ' <small class="dropdown"><a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">('.$this->count_diklat($array_kat,$diklat['id']).') <b class="caret"></b></a><ul class="dropdown-menu">';
                    echo '<li><a href="'.base_url().'diklat/view_diklat/'.$diklat['id'].'">Lihat diklat</a></li>';
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
                        echo '<li><a href="'.base_url().'diklat/edit_diklat/'.$diklat['id'].'">Edit diklat</a></li>';
                        echo '<li><a onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'diklat/delete_diklat/'.$diklat['id'].'">Hapus diklat</a></li>';
                        echo '<li><a href="'.base_url().'program/buat_program/'.$diklat['id'].'">Buat program</a></li>';
                    }
                    echo '</ul></small></h4></li>';
                }else if($diklat['tipe']==3){
                    echo '<li><h5><a class="tip-right" title="Lihat program ini" href="'.base_url().'program/view_program/'.$diklat['id'].'">Angkatan '.$diklat['angkatan'].'</a>';
//                    echo ' <small class="dropdown"><a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#"><b class="caret"></b></a><ul class="dropdown-menu">';
//                    echo ' <a class="tip" rel="tooltip" title="Lihat program ini" href="'.base_url().'program/view_program/'.$diklat['id'].'"><i class="icon-eye-open"></i></a>';
//                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
//                        echo ' <a class="tip" rel="tooltip" title="Edit program ini" href="'.base_url().'program/edit_program/'.$diklat['id'].'"><i class="icon-edit"></i></a>';
//                        echo ' <a class="tip" rel="tooltip" title="Hapus program ini" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'program/delete_diklat/'.$diklat['id'].'"><i class="icon-remove"></i></a>';
//                    }
                    echo '</h5></li>';
                }
                if($this->count_diklat($array_kat,$diklat['id'])>0){
                $this->print_tree_all($array_kat,$diklat['id']);}
                echo "</li>\n";
            }
        }
        echo "</ul>\n";
    }
    function print_tree_table($thn='',$array_kat,$parent=0,$k=0){
        if($k!=0){$l=$k*20;$p=' style="padding-left:'.$l.'px;"';}else{$p='';}
        $k++;
        foreach($array_kat as $diklat){
            if($diklat['parent']==$parent){
                if($diklat['tipe']==1){
                    echo '<tr class="diklat"><td'.$p.' width="40%"><strong>'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')';
                    echo '</strong>'."\n";
                    echo '</td>';
                    echo '<td>';
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
//                        echo '<td>'.$this->count_diklat($array_kat,$diklat['id']).'</td>';
                        echo '<div class="btn-group">';
                        echo '<a class="btn btn-mini" href="'.base_url().'diklat/buat_diklat/'.$diklat['id'].'">Buat diklat</a>';
                        echo '<a class="btn btn-mini" title="Tambah subkategori" href="javascript:add_subkat('.$diklat['id'].')">Buat Subkategori</a>';
                        echo '<a class="btn btn-mini" href="javascript:edit_kat(\''.$diklat['name'].'\','.$diklat['parent'].','.$diklat['id'].')">Ubah</a>';
                        echo '<a class="btn btn-mini" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'diklat/delete_kategori/'.$diklat['id'].'">Hapus</a>';
                        echo '</div>';
                    }
                    echo '</td></tr>';
                }else if($diklat['tipe']==2){
                    echo '<tr class="diklat"><td'.$p.'><a class="tip-right" title="Klik untuk detail" href="'.base_url().'diklat/view_diklat/'.$diklat['id'].'/'.$thn.'">'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')</a>';
                    echo '</td><td>';
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
//                        echo '<td>'.$this->count_diklat($array_kat,$diklat['id']).'</td>';
//                        echo '<div class="btn-group">';
//                        echo '<a class="btn btn-mini" href="'.base_url().'diklat/edit_diklat/'.$diklat['id'].'">Ubah</a>';
//                        echo '<a class="btn btn-mini" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'diklat/delete_diklat/'.$diklat['id'].'">Hapus</a>';
                        echo '<a class="btn btn-mini" href="'.base_url().'program/buat_program/'.$diklat['id'].'">Buat program</a>';
//                        echo '</div>';
                    }
                    if($diklat['jumlah_peserta']>0){
                        echo ' Kuota peserta '.$diklat['jumlah_peserta'].' orang';
                    }else{
                        echo '-';
                    }
                    echo '</td>';
                    echo '</tr>';
                }else if($diklat['tipe']==3){
                    echo '<tr class="diklat"><td'.$p.'><a class="tip-right" title="Klik untuk detail" href="'.base_url().'program/view_program/'.$diklat['id'].'">';
                    echo '<span class="'.$this->date->warna_tgl($diklat['tanggal_mulai'],$diklat['tanggal_akhir']).'">Angkatan '.$diklat['angkatan'].'</span></a>';
//                        echo '<td>-</td>';
                    echo '</td>';
                    echo '<td>'.$this->date->konversi5($diklat['tanggal_mulai']).' - '.$this->date->konversi5($diklat['tanggal_akhir']);
                    if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){
                        echo '<div class="btn-group hide">';
                        echo '<a class="btn btn-mini" href="'.base_url().'program/edit_program/'.$diklat['id'].'">Ubah</a>';
                        echo '<a class="btn btn-mini" onclick="return confirm(\'Apakah Anda yakin ingin menghapus '.$diklat['name'].'?\')" href="'.base_url().'program/delete_program/'.$diklat['id'].'">Hapus</a>';
                        echo '</div>';
                    }
                    echo '</td>';
                   echo '</tr>';
                 }
                if($this->count_diklat($array_kat,$diklat['id'])>0){
                $this->print_tree_table($thn,$array_kat,$diklat['id'],$k);}
            }
        }
    }
    function print_tree_table_pub($array_kat,$parent=0,$k=0){
        if($k!=0){$l=$k*20;$p=' style="padding-left:'.$l.'px;"';}else{$p='';}
        $k++;
        foreach($array_kat as $diklat){
            if($diklat['parent']==$parent){
                if($diklat['tipe']==1){
                    echo '<tr><td'.$p.' width="50%"><strong>'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')';
                    echo '</strong></td>'."\n";
                    echo '<td></td>';
                    echo '</tr>';
                }else if($diklat['tipe']==2){
                    if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 3) {
                        echo '<tr><td'.$p.'><a class="tip-right" title="Klik untuk detail" href="'.base_url().'site/view_diklat/'.$diklat['id'].'">'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')</td>';
                    }else{
                        echo '<tr><td'.$p.'><a class="tip-right" title="Klik untuk detail" href="'.base_url().'site/view_diklat/'.$diklat['id'].'">'.$diklat['name'].' ('.$this->count_diklat($array_kat,$diklat['id']).')</td>';
                    }
                    if($diklat['jumlah_peserta']>0){
                        echo '<td>Kuota peserta '.$diklat['jumlah_peserta'].' orang</td>';
                    }else{
                        echo '<td>-</td>';
                    }
                    echo '</tr>';
                }else if($diklat['tipe']==3){
                    echo '<tr><td'.$p.'><a class="tip-right" title="Klik untuk detail" href="'.base_url().'site/view_program/'.$diklat['id'].'">';
                    echo '<span class="'.$this->date->warna_tgl($diklat['tanggal_mulai'],$diklat['tanggal_akhir']).'">Angkatan '.$diklat['angkatan'].'</span></a>';
                    echo '<td>'.$this->date->konversi5($diklat['tanggal_mulai']).' - '.$this->date->konversi5($diklat['tanggal_akhir']).'</td>';
                   echo '</tr>';
                 }
                if($this->count_diklat($array_kat,$diklat['id'])>0){
                $this->print_tree_table_pub($array_kat,$diklat['id'],$k);}
            }
        }
    }
    
    function cetak_excel(&$array_keterangan,&$row,$col,$sheet,$array_kat,$parent=0,$nama_parent='',$jumlah_peserta=''){
        $no=1;
        for($i=0;$i<count($array_kat);$i++){
            if($array_kat[$i]['parent']==$parent){
                if($array_kat[$i]['tipe']==3){
                    $data=$array_kat[$i];
                    $sheet->setCellValueByColumnAndRow($col, $row,$no++);
                    $sheet->setCellValueByColumnAndRow($col+1, $row,$nama_parent.' angkatan '.$data['angkatan']);
                    $sheet->setCellValueByColumnAndRow($col+3, $row,$jumlah_peserta);
                    if($data['tanggal_mulai']!=''&&$data['tanggal_akhir']!=''){
                        $this->CI->load->library('date');
                        $sheet->setCellValueByColumnAndRow($col+4, $row,$this->CI->date->konversi5($data['tanggal_mulai']));
                        $sheet->setCellValueByColumnAndRow($col+5, $row,$this->CI->date->konversi5($data['tanggal_akhir']));
                        
                        $arr_date=$this->CI->date->createDateRangeArray($data['tanggal_mulai'],$data['tanggal_akhir']);
                        foreach($arr_date as $a){
                            if(array_key_exists($a, $array_keterangan['jumlah_peserta'])){
                                $array_keterangan['jumlah_peserta'][$a]+=$jumlah_peserta;
                            }else{
                                $array_keterangan['jumlah_peserta'][$a]=$jumlah_peserta;
                            }
                            if(array_key_exists($a, $array_keterangan['jumlah_ruangan'])){
                                $array_keterangan['jumlah_ruangan'][$a]+=1;
                            }else{
                                $array_keterangan['jumlah_ruangan'][$a]=1;
                            }
                        }
                        $date1=  date_create_from_format('Y-m-d',$data['tanggal_mulai']);
                        $date2=  date_create_from_format('Y-m-d',$data['tanggal_akhir']);
                        $hari = date_diff($date1, $date2, true)->format('%d')+1;
                        $sheet->setCellValueByColumnAndRow($col+2, $row,$hari);
                        //cetak ke samping
                        $idx_hari_mulai = date_format($date1,'z');
                        $idx_hari_selesai = date_format($date2,'z');
                        
                        //ngijoin cell, rumusnya kolom=$idx_hari+6
                        $sheet->mergeCellsByColumnAndRow($idx_hari_mulai+6, $row, $idx_hari_selesai+6, $row);
                        $style_aktif = array( 
                            'fill' => array( 
                                'type' => PHPExcel_Style_Fill::FILL_SOLID, 
                                'color' => array('rgb'=>$this->gen_hexcolor($parent))
                                )
                            );
                        $sheet->getStyleByColumnAndRow(($idx_hari_mulai+6), $row)->applyFromArray($style_aktif);
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
                $this->cetak_excel($array_keterangan,$row, $col, $sheet, $array_kat,$array_kat[$i]['id'],$array_kat[$i]['name'],$array_kat[$i]['jumlah_peserta']);
            }
        }
        return $row;
    }
    
    function gen_hexcolor($parent){
        $array_hex=array(10=>'A',11=>'B',12=>'C',13=>'D',14=>'E',15=>'F');
        $rgb='';
        for($i=16;$i<22;$i++){
            $x=($parent*$i)%16;
            if($x>9){
                $x=$array_hex[$x];
            }
            $rgb.=$x;
        }
        return $rgb;
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

