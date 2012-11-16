<script>
    function edit_kat(nama,parent,id){
        $('#edit').modal({show:true});
        $('#edit').find('input:text').val(nama);
        $('#edit').find('select').val(parent);
        $('#edit').find('input:hidden').val(id);
    }
    
    function add_subkat(parent){
        $('#tambah').modal({show:true});
        $('#tambah').find('select').val(parent);
    }
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row-fluid">
    <div class="span12">
        <?php $this->lib_perencanaan->print_tree_all($program)?>
    </div>
</div>
<a class="btn btn-primary" href="<?php echo base_url()?>diklat/cetak_jadwal">Cetak Jadwal</a>
<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 3) { ?>
    <a class="btn btn-primary" href="javascript:add_subkat(0)"><i class="icon-plus-sign icon-white"></i> Tambah</a>
<?php } ?>
<form action="<?php echo base_url() ?>diklat/insert_kategori" method="post">
<div class="modal hide" id="tambah">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Tambah Kategori</h3>
        </div>
        <div class="modal-body">
            <table>
                <tr>
                    <td>Parent</td>
                    <td><?php echo form_dropdown('parent', $pil_kategori) ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"/></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Buat kategori"/>
        </div>
</div>
</form>

    <form action="<?php echo base_url() ?>diklat/update_kategori" method="post">
<div class="modal hide" id="edit">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Edit Kategori</h3>
        </div>
        <div class="modal-body">
            <table>
                <tr>
                    <td>Parent</td>
                    <td><?php echo form_dropdown('parent', $pil_kategori) ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama"/><input type="hidden" name="id"/></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Ubah kategori"/>
        </div>
</div>
</form>