<div class="row">
    <div class="span12">
	<div class="alert">
	    <div class="alert-heading">Informasi</div>
	    <p>
		<?php echo $info; ?>
	    </p>
	</div>
    </div>

    <div class="span12">
	<?php echo form_open('administrator/info/update');?>
	<?php echo $this->editor->textarea('info', $info); ?>
	<div class="form-actions">
	    <input type="submit" class="btn btn-primary" name="info" value="Update"/>
	</div>
    </div>
</div>