<div class="row">
    <div class="span12">
	<?php echo $this->session->flashdata('msg');?>
    </div>

    <div class="span12">
	<?php echo form_open('administrator/info/update');?>
	<?php echo $this->editor->textarea('info', $info); ?>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary btn-large" value="Simpan"/>
        </div>
	<?php echo form_close();?>
    </div>
</div>