<form class="form-horizontal" action="<?php echo base_url() ?>dephub_inst/update_inst" method="post">
    <fieldset>
    <input type="hidden" name="id" value="<?php echo $inst['id']?>">
        <div class="control-group">
            <label class="control-label">Kode Instansi</label>
            <div class="controls">
                <input type="text" name="kode" class="input-small" value="<?php echo $inst['kode_kantor'] ?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Instansi</label>
            <div class="controls">
                <input class="input-xlarge" type="text" name="nama" value="<?php echo $inst['nama_instansi'] ?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Singkatan Instansi</label>
            <div class="controls">
                <input type="text" name="singkatan" value="<?php echo $inst['nama_singkat'] ?>"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password</label>
            <div class="controls">
                <input type="password" id="pass" name="password"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Ulangi Password</label>
            <div class="controls">
                <input type="password" name="password_konf"/>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary" value="Simpan"/>
            <input type="button" class="btn" value="Cancel" onclick="history.go(-1)">
        </div>
    </fieldset>
</form>
