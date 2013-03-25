<h2><?php echo $materi['judul'] ?></h2>
<h3><?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?></h3>
<input type="hidden" name="id_materi" value="<?php echo $materi['id'] ?>" />
<input type="hidden" name="id_program" value="<?php echo $program['id'] ?>" />
<table class="table-bordered table-condensed table-striped" width="100%">
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
            <a class="btn btn-small" href="wid/nilai/upload_nilai/<?php echo $materi['id'].'/'.$program['id'].'/'.$l['id']?>">
                <i class="icon-edit"></i> Perbarui nilai
            </a>
                <?php }else{ ?>
            <a class="btn btn-small btn-primary" href="wid/nilai/upload_nilai/<?php echo $materi['id'].'/'.$program['id'].'/'.$l['id']?>">
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