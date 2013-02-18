<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Preview Pengumuman</h3>
</div>
<div class="modal-body">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $id?>"/>
        <h3>Judul</h3>
        <div>
            <input type="text" class="input-xxlarge" name="judul" value="<?php echo $judul?>"/>
        </div>
        <br />
        <h3>Isi</h3>
        <div>
            <?php echo $this->editor->textarea('isi',$isi)?>
        </div>
    </fieldset>
</div>
<div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Ok, Publish"/>
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>