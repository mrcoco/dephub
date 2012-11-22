<p align="center" class="lead"><?php echo $about['judul']?></p>
<form action="<?php echo base_url()?>settings/update_profil" method="post" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $about['id']?>"/>
        <div class="control-group">
            <label class="control-label">Judul Profil</label>
            <div class="controls">
                <input type="text" class="input-xxlarge" name="judul" value="<?php echo $about['judul']?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Deskripsi</label>
            <div class="controls">
                <?php echo $this->editor->textarea('isi',$about['isi'])?>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
        </div>
    </fieldset>
</form>
