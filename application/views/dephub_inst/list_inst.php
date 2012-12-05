<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Singkatan</td>
            <td>Nama lengkap</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no=1?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $l['kode_kantor']?></td>
            <td><?php echo $l['nama_singkat']?></td>
            <td><?php echo $l['nama_instansi']?></td>
            <td>
                <a href="<?php echo base_url()?>dephub_inst/edit_inst/<?php echo $l['id']?>">Edit</a> | 
                <a onclick="return confirm('Apakah anda yakin untuk menghapus instansi <?php echo $l['nama_singkat'] ?> ')" href="<?php echo base_url()?>dephub_inst/delete_inst/<?php echo $l['id']?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="<?php echo base_url()?>dephub_inst/tambah_inst" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>