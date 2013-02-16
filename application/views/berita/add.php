<form action="<?php echo base_url()?>berita/insert_berita" method="post" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Judul Berita</label>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="judul"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Isi Berita</label>
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
