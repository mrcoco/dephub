<script type="text/javascript">
    function edit_gedung(nama,id){
        $('#edit').modal({show:true});
        $('#edit').find('input:text').val(nama);
        $('#edit').find('input:hidden').val(id);
    }
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>

<table width="100%" id="list" class="table table-striped table-bordered table-condensed">
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
                <a href='kamar/list_kamar_gedung/<?php echo $i+1?>' class='btn btn-mini'><i class="icon-zoom-in"></i> Lihat Kamar</a>
<!--                <a href="gedung/edit_gedung/<?php echo $list[$i]['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>-->
                <a href="javascript:edit_gedung('<?php echo $list[$i]['nama']?>',<?php echo $list[$i]['id']?>)" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                <a href="gedung/delete_gedung/<?php echo $list[$i]['id']?>"  class="btn btn-danger btn-mini"
                onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $list[$i]['nama'] ?>?')">
                    <i class="icon-trash"></i> Hapus</a>
            </td>
		</tr>
        <?php }?>
    </tbody>
</table>

<div class="form-actions">
    <a href="gedung/add_gedung" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>
    <form action="<?php echo base_url()?>gedung/edit_gedung_process" method="post">
<div class="modal hide" id="edit">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Edit Gedung</h3>
        </div>
        <div class="modal-body">
            <p>Nama Gedung :</p>
            <p><input type="text" name="nama"/><input type="hidden" name="id"/></p>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan"/>
        </div>
</div>
</form>