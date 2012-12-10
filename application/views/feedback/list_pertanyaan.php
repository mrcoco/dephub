<script type="text/javascript">
    function edit(nama,parent,id){
        $('#edit').modal({show:true});
        $('#edit').find('input:text').val(nama);
        $('#edit').find('select').val(parent);
        $('#edit').find('input:hidden').val(id);
    }
    
    function add(parent){
        $('#tambah').modal({show:true});
        $('#tambah').find('select').val(parent);
    }
</script>
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
                <a class="btn btn-mini" href="javascript:edit('<?php echo $l['pertanyaan']?>',<?php echo $l['id_kategori']?>,<?php echo $l['id_pertanyaan']?>)"><i class="icon-edit"></i> Ubah</a>
                <a class="btn btn-mini btn-danger" onclick="return confirm('Apakah anda yakin untuk menghapus pertanyaan ini?')"
                   href="<?php echo base_url()?>feedback/delete_pertanyaan/<?php echo $l['id_pertanyaan']?>"><i class="icon-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<div class="form-actions">
    <a href="javascript:add(0)" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>
<form action="<?php echo base_url() ?>feedback/insert_pertanyaan" method="post">
<div class="modal hide" id="tambah">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Tambah Pertanyaan</h3>
        </div>
        <div class="modal-body">
            <table>
                <tr>
                    <td>Pertanyaan</td>
                    <td>: <input type="text" name="pertanyaan"/></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>: <?php echo form_dropdown('id_kategori', $kategori)?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan"/>
        </div>
</div>
</form>

<form action="<?php echo base_url() ?>feedback/update_pertanyaan" method="post">
<div class="modal hide" id="edit">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Ubah Pertanyaan</h3>
        </div>
        <div class="modal-body">
        <input type="hidden" name="id_pertanyaan"/>
            <table>
                <tr>
                    <td>Pertanyaan</td>
                    <td>: <input type="text" name="pertanyaan"/></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>: <?php echo form_dropdown('id_kategori', $kategori)?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan"/>
        </div>
</div>
</form>
