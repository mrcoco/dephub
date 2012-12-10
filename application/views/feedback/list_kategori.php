<script type="text/javascript">
    function edit(nama,id){
        $('#edit').modal({show:true});
        $('#post_nama_kategori').val(nama);
        $('#post_id_kategori').val(id);
    }
    function add(){
        $('#add').modal({show:true});
    }
</script>
<form class="form-horizontal" action="<?php echo base_url()?>feedback/insert_kategori" method="post">
    <div id="add" class="modal hide">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Tambah Kategori</h3>
            </div>
            <div class="modal-body">
                Nama Kategori : <input id="addkat" type="text" name="kategori"/>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Simpan"/>
            </div>
    </div>
</form>
<form class="form-horizontal" action="<?php echo base_url()?>feedback/update_kategori" method="post">
    <div id="edit" class="modal hide">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Ubah Kategori</h3>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_kategori" id="post_id_kategori"/>
                Nama Kategori : 
                <input type="text" name="kategori" id="post_nama_kategori"/>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn" data-dismiss="modal">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Simpan"/>
            </div>
    </div>
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
                <a class="btn btn-mini" href="javascript:edit('<?php echo $l['nama_kategori']?>',<?php echo $l['id_kategori']?>)"><i class="icon-edit"></i> Ubah</a>
                <a class="btn btn-mini btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus kategori ini?')"
                   href="<?php echo base_url()?>feedback/delete_kategori/<?php echo $l['id_kategori']?>"><i class="icon-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="javascript:add()" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
