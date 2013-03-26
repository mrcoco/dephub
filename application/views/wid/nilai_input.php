<h2><?php echo $materi['judul'] ?></h2>
<h3><?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?></h3>
<?php
    if($this->uri->segment(1)=='program'){
        $this->load->view('sidebar/subnav_nilai');$link='program';
    }else{
        $link='wid/nilai';        
    }
?>
<?php if($list_komponen){ ?>
<table class="table table-bordered table-condensed table-striped" width="100%">
    <thead>
    <tr>
        <th>Unsur</th>
        <th>Bobot</th>
        <th>Aksi</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list_komponen as $l){?>
    <tr>
        <td><?php echo $l['nama_komponen']?></td>
        <td><?php echo $l['bobot']?>%</td>
        <td>
            <?php if($l['status']){ ?>
            <a class="btn btn-small" href="<?php echo $link ?>/upload_nilai/<?php echo $materi['id'].'/'.$program['id'].'/'.$l['id']?>">
                <i class="icon-edit"></i> Perbarui nilai
            </a>
                <?php }else{ ?>
            <a class="btn btn-small btn-primary" href="<?php echo $link ?>/upload_nilai/<?php echo $materi['id'].'/'.$program['id'].'/'.$l['id']?>">
                <i class="icon-plus-sign icon-white"></i> Masukkan nilai
            </a>
                <?php } ?>
        </td>
        <td><?php 
            if($l['status']){
                echo 'Anda sudah memasukkan nilai peserta';
            }else{
                echo 'Anda belum memasukkan nilai peserta';
            }
            ?>
        </td>
    </tr>
    <?php }?>
    </tbody>
</table>
<?php }else{ ?>
Tidak ada unsur penilaian
<?php } ?>
