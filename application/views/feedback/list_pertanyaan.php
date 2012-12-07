<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>No</td>
            <td>Pertanyaan</td>
            <td>Kategori</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no=1?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $l['pertanyaan']?></td>
            <td><?php echo $kategori[$l['id_kategori']]?></td>
            <td>
                <a href="<?php echo base_url()?>feedback/edit_pertanyaan/<?php echo $l['id_pertanyaan']?>">Edit</a> | 
                <a onclick="return confirm('Apakah anda yakin untuk menghapus pertanyaan ini?')" href="<?php echo base_url()?>feedback/delete_pertanyaan/<?php echo $l['id_pertanyaan']?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="<?php echo base_url()?>feedback/tambah_pertanyaan" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
