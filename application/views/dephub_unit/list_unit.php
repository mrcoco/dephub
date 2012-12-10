<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>No</td>
            <td>Kode</td>
            <td>Nama</td>
            <td>Instansi</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no=1?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $l['kode']?></td>
            <td><?php echo $l['nama_unit']?></td>
            <td><?php echo array_key_exists($l['kode_inst'], $inst)?$inst[$l['kode_inst']]:'' ?></td>
            <td>
                <a class="btn btn-mini" href="<?php echo base_url()?>dephub_unit/edit_unit/<?php echo $l['id']?>"><i class="icon-edit"></i> Ubah</a> 
                <a class="btn btn-mini btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus unit kerja <?php echo $l['nama_unit'] ?> ')"
                   href="<?php echo base_url()?>dephub_unit/delete_unit/<?php echo $l['id']?>"><i class="icon-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="<?php echo base_url()?>dephub_unit/tambah_unit" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>