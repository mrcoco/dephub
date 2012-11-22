<form action="<?php echo base_url()?>settings/insert_profil" method="post" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Judul Profil</label>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="judul"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Deskripsi</label>
            <div class="controls">
                <?php echo $this->editor->textarea('isi')?>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
        </div>
    </fieldset>
</form>
