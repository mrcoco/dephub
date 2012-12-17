<p class="lead">
    <?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?>
</p>

        <table width="100%" class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Waktu</td>
                    <td>Kegiatan</td>
                    <td>Tempat</td>
                    <td>Pengajar</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $cur_tgl='';
                    $rowspan=array();
                //menghitung yg perlu di rowspan
                foreach($data_schedule as $d) {
                    if($cur_tgl==$d['tanggal']){
                        $rowspan[$d['tanggal']]++;
                    }else{
                        $rowspan[$d['tanggal']]=1;
                        $cur_tgl=$d['tanggal'];
                    }
                }
                
                ?>
                <?php foreach($data_schedule as $d) {?>
                <tr>
                    <?php if(array_key_exists($d['tanggal'], $rowspan)){?>
                    <td rowspan="<?php echo $rowspan[$d['tanggal']]?>"><?php echo $d['tanggal']?></td>
                    <?php unset($rowspan[$d['tanggal']])?>
                    <?php }?>
                    <td><?php echo $d['jam_mulai']?>-<?php echo $d['jam_selesai']?></td>
                    <td><?php echo $d['judul_kegiatan']?></td>
                    <td><?php 
                        if($d['jenis_tempat']=='kelas'){ 
                            echo $d['nama_ruangan'];
                        }else{
                            if($d['lokasi']==0||$d['lokasi']==''){
                                $d['lokasi']='-';
                            }
                            echo $d['lokasi'];
                        }
                        
                    ?>
                    </td>
                    <td>
                        <?php if($d['ada_pembicara']){?>
                            <?php   
                            foreach($d['list_pembicara'] as$l){
                                if($l['nama_peg']!=''){
                                    echo $l['nama_peg'] .'<br/>';
                                }else{
                                    echo $l['nama_dostam'] .'<br/>';
                                }
                            } 
                            ?>
                        <?php } else { ?>
                        -
                        <?php } ?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo base_url() ?>program/print_schedule_pdf/<?php echo $program['id'] ?>">Cetak Jadwal PDF</a>
</div>
