<script>
    function edit_kat(nama,parent,id){
        $('#edit').modal({show:true});
        $('#edit').find('input:text').val(nama);
        $('#edit').find('select').val(parent);
        $('#edit').find('input:hidden').val(id);
    }
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<?php $this->lib_perencanaan->print_tree_kategori($kategori); ?>
<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 3) { ?>
    <a class="btn btn-primary" data-toggle="modal" href="#tambah"><i class="icon-plus-sign icon-white"></i> Tambah</a>
<?php } ?>

    <div class="modal hide" id="tambah">
        <form action="<?php echo base_url() ?>diklat/insert_kategori" method="post">
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
        </form>
    </div>

    <div class="modal hide" id="edit">
        <form action="<?php echo base_url() ?>diklat/update_kategori" method="post">
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
        </form>
    </div>
  