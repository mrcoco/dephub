<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
	
<table width="100%" id="list" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
            <th>Kapasitas</th>
            <th>Meja Kursi</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
           </tr>
    </thead>
    
    <tbody>
        <?php for($i=0;$i<count($list);$i++) {?>
        <tr>
			<td><?php echo $i+1 ?></td>
			<td><?php echo $list[$i]['nama'] ?></td>
			<td><?php echo $list[$i]['kapasitas'] ?></td>
			<td><?php echo $list[$i]['mejakursi'] ?></td>
			<td><?php echo $list[$i]['kondisi'] ?></td>
			<td><?php echo $list[$i]['keterangan'] ?></td>
			<td>
				<a href="kelas/edit_kelas/<?php echo $list[$i]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                <a href="kelas/delete_kelas/<?php echo $list[$i]['id']?>"  class="btn btn-danger btn-mini"
                onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $list[$i]['nama'] ?>?')">
                    <i class="icon-trash"></i> Hapus</a>
			</td>
		</tr>
        <?php }?>
    </tbody>
</table>

<div class="form-actions">
    <a href="kelas/add_kelas" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>
	