<script>
    function edit(nama,id){
        $('#post_nama_kategori').val(nama);
        $('#post_id_kategori').val(id);
    }
</script>
<form action="<?php echo base_url()?>feedback/insert_kategori" method="post">
    Tambah Kategori : <input type="text" name="kategori"/> <input type="submit" value="Tambah"/>
</form>

<form action="<?php echo base_url()?>feedback/update_kategori" method="post">
    <input type="hidden" name="id_kategori" id="post_id_kategori"/>
    Edit Kategori : <input type="text" name="kategori" id="post_nama_kategori"/> <input type="submit" value="Simpan"/>
</form>

<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Kategori</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no=1?>
        <?php foreach($list as $l){?>
        <tr>
            <td><?php echo $no++?></td>
            <td><?php echo $l['nama_kategori']?></td>
            <td>
                <a href="javascript:edit('<?php echo $l['nama_kategori']?>',<?php echo $l['id_kategori']?>)">Edit</a> | 
                <a onclick="return confirm('Apakah anda yakin untuk menghapus kategori ini?')" href="<?php echo base_url()?>feedback/delete_kategori/<?php echo $l['id_kategori']?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
