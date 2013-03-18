<h2><?php echo $materi['judul'] ?></h2>
<h3><?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?></h3>
<input type="hidden" name="id_materi" value="<?php echo $materi['id'] ?>" />
<input type="hidden" name="id_program" value="<?php echo $program['id'] ?>" />
<table class="table-bordered table-condensed table-striped" width="100%">
    <thead>
    <tr>
        <th>Unsur</th>
        <th>Bobot</th>
        <th>Input Nilai</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($list_komponen as $l){?>
    <tr>
        <td><?php echo $l['nama_komponen']?></td>
        <td><?php echo $l['bobot']?>%</td>
        <td>
            <a href="wid/nilai/upload_nilai/<?php echo $materi['id'] ?>/<?php echo $program['id'] ?>/<?php echo $l['id']?>">
                <?php 
                if($l['status']){
                    echo 'Update nilai';
                }else{
                    echo 'Input nilai';
                }
                ?>
            </a>
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