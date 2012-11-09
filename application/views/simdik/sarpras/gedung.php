
<h4>Daftar Gedung</h4>

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
                <div class="btn-group" data-toggle="buttons-radio">
                    <a href='sarpras/gedung/edit_gedung/<?php echo $i+1?>' class='btn'>Edit</a>
                    <a href='sarpras/gedung/delete_gedung/<?php echo $i+1?>' class='btn' onclick="return confirm('Apakah anda yakin ingin menghapus?');">Delete</a>
                    <a href='sarpras/kamar/list_kamar_gedung/<?php echo $i+1?>' class='btn'>Lihat Kamar</a>
                </div>
            </td>
        <?php }?>
    </tbody>
</table>

<div class="form-actions">
    <a href="sarpras/gedung/add_gedung" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>