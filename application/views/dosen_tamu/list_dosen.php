<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="35%">Nama</th>
            <th width="35%">Kategori</th>
            <th width="25%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < count($list); $i++) { ?>
            <tr>
                <td><?php echo ($i + 1) ?></td>
                <td><a href="dosen_tamu/detail_dosen/<?php echo $list[$i]['id'] ?>"><?php echo $list[$i]['nama'] ?></a></td>
                <td>
                    <?php echo $list[$i]['is_pns']?'PNS':'Profesional' ?>
                </td>
                <td>
                    <a href="dosen_tamu/edit_dosen/<?php echo $list[$i]['id'] ?>" class="btn"><i class="icon-edit"></i> Ubah</a>
                    <a href="dosen_tamu/delete_dosen/<?php echo $list[$i]['id'] ?>"  class="btn btn-danger"
                    onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $list[$i]['nama'] ?>?')">
                        <i class="icon-trash"></i> Hapus</a>
                </td>
            <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="dosen_tamu/add_dosen" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
