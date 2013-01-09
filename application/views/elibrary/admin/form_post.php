<form action="<?php echo base_url()?>elibrary/admin/do_create_post" method="post" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Judul Post</label>
            <div class="controls">
                <input type="text" name="title"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Isi</label>
            <div class="controls">
                <?php echo $this->editor->textarea('content')?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Status post</label>
            <div class="controls">
                <select name="status">
                    <option value="0">Draft</option>
                    <option value="1">Dipublikasikan</option>
                    <option value="2">Penting</option>
                </select>
                <table>
                    <tr><td>Draft</td> <td>: Belum dipublikasikan </td><tr/>
                    <tr><td>Dipublikasi </td> <td>: Sudah Dipublikasikan dan akan tampil di halaman depan </td></tr>
                    <tr><td>Penting </td> <td>: Info terakhir yang penting akan ditampilkan di halaman depan. </td></tr>
                    
                </table>
                    
                
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
        </div>
    </fieldset>
</form>