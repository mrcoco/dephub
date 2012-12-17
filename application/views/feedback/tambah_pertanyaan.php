<form class="form-horizontal" action="<?php echo base_url()?>feedback/insert_pertanyaan" method="post">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Pertanyaan</label>
            <div class="controls">
                <input type="text" name="pertanyaan"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Kategori</label>
            <div class="controls">
                <?php echo form_dropdown('id_kategori', $kategori)?>
            </div>
        </div>
    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Simpan"/>
    </div>
    </fieldset>
</form>
