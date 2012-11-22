<form action="<?php echo base_url()?>elibrary/admin/do_edit_post" method="post" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Judul Post</label>
            <div class="controls">
                <input value="<?php echo $data[0]['title'];?>" type="text" name="title"/>
                <input value="<?php echo $data[0]['id'];?>" type="hidden" name="id"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Isi</label>
            <div class="controls">
                <?php echo $this->editor->textarea('content',$data[0]['content'])?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Status post</label>
            <div class="controls">
                <select name="status">
                    <option <?php if($data[0]['status']==0) echo 'selected="selected"';?> value="0">Draft</option>
                    <option <?php if($data[0]['status']==1) echo 'selected="selected"';?> value="1">Dipublikasikan</option>
                    <option <?php if($data[0]['status']==2) echo 'selected="selected"';?> value="2">Penting</option>
                </select>
            </div>
        </div>
        <div class="control-group">
                <label class="control-label">Pembuat</label>
                <div class="controls">
                    <?php echo $data[0]['nama'];?>
                </div>
        </div>
        <div class="control-group">
                <label class="control-label">Pengubah terakhir</label>
                <div class="controls">
                    <?php echo $modifier[0]['nama'];?>
                </div>
        </div>
        <div class="control-group">
                <label class="control-label">Dibuat Tanggal</label>
                <div class="controls">
                    <?php echo $data[0]['creationdate'];?>
                </div>
        </div>
        <div class="control-group">
                <label class="control-label">Dimodifikasi Tanggal</label>
                <div class="controls">
                    <?php echo $data[0]['modifieddate'];?>
                </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <a class="btn btn-danger" href="<?php echo base_url()?>elibrary/admin/do_delete_post/<?php echo $data[0]['id'];?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
            <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
            
        </div>
    </fieldset>
</form>