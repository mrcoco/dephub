
<h4>Daftar Kamar</h4>

<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="5%">ID</th>
            <th width="15%">Asrama</th>
            <th width="5%">Lantai</th>
            <th width="10%">Sayap</th>
            <th width="5%">Nomor</th>
            <th width="5%">Bed</th>
            <th width="25%">Status</th>
            <th width="25%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr class="gedung<?php echo $list[$i]['id'] ?>">
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="id"><?php echo $list[$i]['id'] ?></td>
            <td class="asrama"><?php echo $list[$i]['nama'] ?></td>
            <td class="lantai"><?php echo $list[$i]['lantai'] ?></td>
            <td class="sayap"><?php echo $list[$i]['sayap'] ?></td>
            <td class="nomor"><?php echo $list[$i]['nomor'] ?></td>
            <td class="bed"><?php echo $list[$i]['bed'] ?></td>
			<td class="status"><?php echo $list[$i]['status'] ?></td>
            <td class="aksi">
                <div class="btn-group" data-toggle="buttons-radio">
                    <a href='kamar/edit_kamar/<?php echo $list[$i]['id']?>' class='btn'>Edit</a>
                    <a href='kamar/delete_kamar/<?php echo $list[$i]['id']?>' class='btn' onclick="return confirm('Apakah anda yakin ingin menghapus?');">Delete</a>
                </div>
            </td>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a href="kamar/add_kamar" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>
