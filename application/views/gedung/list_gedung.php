
<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>

<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama Gedung</th>
            <th width="70%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="gedung<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="nama"><?php echo $list[$i]['nama'] ?>
            </td>
            <td class="aksi">
                <a href="gedung/edit_gedung/<?php echo $i+1?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                <a href="gedung/delete_gedung/<?php echo $i+1?>"  class="btn btn-danger btn-mini"
                onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $list[$i]['nama'] ?>?')">
                    <i class="icon-trash"></i> Hapus</a>
<!--                <a href='kamar/list_kamar_gedung/<?php echo $i+1?>' class='btn'>Lihat Kamar</a>-->
            </td>
        <?php }?>
    </tbody>
</table>

<div class="form-actions">
    <a href="gedung/add_gedung" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>