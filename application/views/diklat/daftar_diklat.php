<script type="text/javascript">
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
    function add_diklat(){
        var par=$('#dik').find('select').val();
        window.location.href='<?php echo base_url() ?>diklat/buat_diklat/'+par;
    }
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<div class="row">
    <div class="span8">
<?php if($program){ ?>
        <table width="100%" class="table-striped table-condensed table">
            <?php $this->lib_perencanaan->print_tree_table($program)?>
        </table>
<?php }else{?>
Tidak ada data
<?php } ?>
    </div>
<?php if ($this->session->userdata('id_role') == 1 || $this->session->userdata('id_role') == 3) { ?>
    <div class="span3 well">
        <div id="dik">
            <h3>Tambah Diklat</h3>
            <label>Kategori</label>
            <?php echo form_dropdown('parentdiklat', $pil_kategori) ?>
            <a class="btn btn-primary" href="javascript:add_diklat()">Buat diklat</a>
        </div>
        <hr />
        <form action="<?php echo base_url() ?>diklat/insert_kategori" method="post">
            <h3>Tambah Kategori</h3>
            <label>Nama kategori</label>
            <input type="text" name="nama"/>
            <label>Kategori induk</label>
            <?php echo form_dropdown('parent', $pil_kategori) ?>
            <input class="btn btn-primary" type="submit" value="Simpan kategori"/>
        </form>
    </div>    
<?php } ?>
</div>
<div class="form-actions">
    <a class="btn btn-success" href="<?php echo base_url()?>diklat/cetak_jadwal">Cetak Jadwal</a>
</div>    
<form action="<?php echo base_url() ?>diklat/insert_kategori" method="post">
<div class="modal hide" id="tambah">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button>
            <h3>Tambah Kategori</h3>
        </div>
        <div class="modal-body">
            <table>
                <tr>
                    <td>Nama kategori</td>
                    <td>: <input type="text" name="nama"/></td>
                </tr>
                <tr>
                    <td>Kategori induk</td>
                    <td>: <?php echo form_dropdown('parent', $pil_kategori) ?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan kategori"/>
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
                    <td>Nama kategori</td>
                    <td>: <input type="text" name="nama"/><input type="hidden" name="id"/></td>
                </tr>
                <tr>
                    <td>Kategori induk</td>
                    <td>: <?php echo form_dropdown('parent', $pil_kategori) ?></td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <input class="btn btn-primary" type="submit" value="Simpan kategori"/>
        </div>
</div>
</form>