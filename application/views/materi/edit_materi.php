<p align="center" class="lead"><?php echo $materi['judul']?></p>
<form action="<?php echo base_url()?>materi/update" method="post" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $materi['id']?>"/>
        <div class="control-group">
            <label class="control-label">Judul Materi</label>
            <div class="controls">
                <input type="text" name="judul" value="<?php echo $materi['judul']?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Deskripsi</label>
            <div class="controls">
                <?php echo $this->editor->textarea('deskripsi',$materi['deskripsi'])?>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
        </div>
    </fieldset>
</form>
