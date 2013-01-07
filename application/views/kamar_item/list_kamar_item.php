<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="10%">Item</th>
            <th width="15%">Kategori</th>
            <th width="5%">Bobot</th>
            <th width="10%">Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
		for($i=0;$i<count($list);$i++) {	
		?>
		<tr>
            <td class="no"><?php echo ($i+1) ?></td>
            <td class="item"><?php echo $list[$i]['item'] ?></td>
            <td class="kategori"><?php echo $list[$i]['kategori'] ?></td>
            <td class="bobot"><?php echo $list[$i]['bobot'] ?></td>
            <td class="status"><?php echo $list[$i]['status'] ?></td>
            <td>
				<a href='kamar_item/edit_kamar_item/<?php echo $list[$i]['id']?>' class='btn btn-mini'><i class="icon-edit"></i> Ubah</a>
                <a href='kamar_item/delete_kamar_item/<?php echo $list[$i]['id']?>' class='btn btn-mini btn-danger'
                   onclick="return confirm('Apakah anda yakin ingin menghapus?');"><i class="icon-remove"></i> Hapus</a>
			</td>
		</tr>
        <?php }?>
    </tbody>
</table>
<div class="form-actions">
    <a href="kamar_item/add_kamar_item" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
