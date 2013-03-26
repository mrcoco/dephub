<h2><?php echo $diklat['name'] . ' Angkatan '.$program['angkatan'] ?></h2>
<h3>Pilih Materi untuk Penilaian</h3>
<?php if($materi){ ?>
<ul>
<?php foreach($materi as $m){?>
    <li>
        <a href="<?php echo base_url('program/nilai_item/'.$m['id'].'/'.$program['id']) ?>">
            <?php echo $m['judul'] ?>
        </a>
    </li>
<?php } ?>
</ul>
<?php }else{ ?>
Tidak ada materi
<?php } ?>
