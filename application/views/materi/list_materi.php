<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="55%">Judul</th>
            <th width="40%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <tr>
                <td><?php echo ($i + 1) ?></td>
                <td><a class="tip-right" title="Klik untuk detail" href="materi/view/<?php echo $list[$i]['id'] ?>"><?php echo $list[$i]['judul'] ?></a></td>
                <td>
                    <a href="materi/assign/<?php echo $list[$i]['id'] ?>" class="btn btn-mini"><i class="icon-user"></i> Assign Dosen</a>
                    <a href="materi/edit/<?php echo $list[$i]['id'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                    <a href="materi/delete/<?php echo $list[$i]['id'] ?>"  class="btn btn-mini btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $list[$i]['judul'] ?>?')">
                        <i class="icon-trash"></i> Hapus</a>
                </td>
            <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="materi/tambah" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
