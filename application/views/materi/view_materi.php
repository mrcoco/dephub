<div id="display_dialog" class="modal hide modal-wide"></div>
<p align="center" class="lead"><?php echo $materi['judul']?></p>
<div class="well-small">
    <a href="materi/assign/<?php echo $materi['id'] ?>" class="btn btn-mini"><i class="icon-user"></i> Assign Dosen</a>
    <a href="materi/edit/<?php echo $materi['id'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
    <a href="materi/delete/<?php echo $materi['id'] ?>"  class="btn btn-mini btn-danger"
    onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $materi['judul'] ?>?')">
        <i class="icon-trash"></i> Hapus</a>
</div>
<table class="table table-striped">
    <tbody>
        <tr>
        <tr>
            <th width="15%">Judul</th>
            <td><?php echo $materi['judul']; ?></td>
        </tr>
            <th>Daftar Dosen</th>
            <td>
                <ol>
                    <?php foreach($pengajar as $p){?>
                    <li>
                            <?php echo $key_pembicara[$p['id_pembicara']]?>
                    </li>
                    <?php } ?>
                </ol>                
            </td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td><?php echo $materi['deskripsi']; ?></td>
        </tr>
    </tbody>
</table>
<div class="form-actions">
    <a href="<?php echo base_url()?>materi/list_materi" class="btn btn-primary"><i class="icon-arrow-left icon-white"></i> Daftar materi</a>
</div>
