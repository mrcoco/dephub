<html>
    <head>
<style>
    table{
        border: 1px #000 solid;
        border-left: 0;
    }
    td, th{
        border-left: 1px #000 solid;
        border-top: 1px #000 solid;
    }
</style>
    </head>
    <body>
<h1 align="center">
    <?php echo $title ?>
</h1>
        <table width="100%" cellspacing="0" align="center" cellpadding="3">
            <thead>
                <tr>
                    <td>Tanggal</td>
                    <td>Waktu</td>
                    <td>Kegiatan</td>
                    <td>Tempat</td>
                    <td>Rekan Pengajar</td>
                    <td>Pendamping</td>
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
                <?php
                foreach($data_schedule as $d) {
                    $pelaksanaan=strtotime($d['date']);
                    $sekarang=strtotime(date('Y-m-d'));
                    if(($pelaksanaan>=$sekarang) || $lalu){?>
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
                                if($l['nama_peg']!=$this->session->userdata('nama_wid')){
                                    if($l['nama_peg']!=''){
                                        echo $l['nama_peg'] .'<br/>';
                                    }else{
                                        echo $l['nama_dostam'] .'<br/>';
                                    }
                                }
                            } 
                            ?>
                        <?php } else { ?>
                        -
                        <?php } ?>
                    </td>
                    <td>
                        <?php if($d['ada_pendamping']){?>
                            <?php   
                            foreach($d['list_pendamping'] as $lp){
                                echo $lp['nama'] .'<br/>';
                            } 
                            ?>
                        <?php } else { ?>
                        -
                        <?php } ?>
                    </td>
                </tr>
                <?php } }?>
            </tbody>
        </table>
    </body>
</html>
