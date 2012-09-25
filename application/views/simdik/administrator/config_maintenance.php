<div class="row">
    <div class="span3">
	<div class="well sidemenu">
	    <ul class="nav nav-list" id="yw3">
		<li class="nav-header"><span>Menu</span></li>
		<li class="<?php
if ($this->uri->segment('3') == '') {
    echo 'active';
}
?>"><a href="administrator/config/"><i class="icon icon-edit"></i> Pengaturan Link</a></li>
		<li class="<?php
if ($this->uri->segment('3') == 'update_maintenance') {
    echo 'active';
}
?>"><a href="administrator/config/update_maintenance"><i class="icon icon-edit"></i> Maintenance</a></li>
		<li class="<?php
		    if ($this->uri->segment('3') == 'update_other') {
			echo 'active';
		    }
?>"><a href="administrator/config/update_other"><i class="icon icon-edit"></i> Lain-Lain</a></li>
	    </ul>
	</div>
    </div>

    <div class="span9">
<?php echo $this->session->flashdata('msg') ?>
	<h3>Maintenance</h3>
	<hr />
<?php echo form_open($action); ?>
	<input type="hidden" name="set" value="ok" />
	<table>
	    <tr>
		<td width="150">Maintenance</td>
		<td><input type="checkbox" name="maintenance" value="0"/></td>
	    </tr>
	    <tr>
		<td>Message</td>
		<td><textarea name="message"></textarea></td>
	    </tr>
	</table>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary btn-large" value="Simpan"/>
            <input type="reset" class="btn btn-large" value="Reset" />
        </div>
<?php echo form_close(); ?>
    </div>
</div>