<script type="text/javascript">
$(function(){
    var validator = $("form").validate({
            rules: {
                nama: "required",
                kode_inst : "required",
                kode : "required",
                password : "required",
                password_konf : "required"
            }

        });
});
</script>
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form class="form-horizontal" action="<?php echo base_url() ?>dephub_unit/insert_unit" method="post">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Instansi</label>
            <div class="controls">
                <?php echo form_dropdown('kode_inst',$inst) ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Kode Unit</label>
            <div class="controls">
                <input type="text" name="kode" class="input-small"/>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Nama Unit</label>
            <div class="controls">
                <input class="input-xlarge" type="text" name="nama"/>
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
