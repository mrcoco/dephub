<div class="row">
    <div class="span3">
	<div class="well">
	    <ul class="nav nav-list" id="yw3">
		<li class="nav-header"><span>Menu</span></li>
		<li class="<?php if ($this->uri->segment('3') == '') {
    echo 'active';
} ?>"><a href="administrator/config/"><i class="icon icon-edit"></i> Pengaturan Link</a></li>
		<li class="<?php if ($this->uri->segment('3') == 'update_maintenance') {
    echo 'active';
} ?>"><a href="administrator/config/update_maintenance"><i class="icon icon-edit"></i> Maintenance</a></li>
		<li class="<?php if ($this->uri->segment('3') == 'update_other') {
    echo 'active';
} ?>"><a href="administrator/config/update_other"><i class="icon icon-edit"></i> Lain-Lain</a></li>
	    </ul>
	</div>
    </div>

    <div class="span9">
	<?php echo $this->session->flashdata('msg')?>
	<h3>Link User</h3>
	<hr />
<?php echo form_open($action); ?>
	<input type="hidden" name="set" value="ok" />
	<table>
	    <tr>
		<td width="150">Administator</td>
		<td><input type="text" name="administrator" value="<?php echo $link['administrator']->link?>"/></td>
	    </tr>
	    <tr>
		<td width="150">Perencanaan</td>
		<td><input type="text" name="perencanaan" value="<?php echo $link['perencanaan']->link?>" /></td>
	    </tr>
	    <tr>
		<td width="150">Penyelenggaraan</td>
		<td><input type="text" name="penyelenggaraan" value="<?php echo $link['penyelenggaraan']->link?>" /></td>
	    </tr>
	    <tr>
		<td width="150">Sarana & Prasarana</td>
		<td><input type="text" name="sarpras" value="<?php echo $link['sarpras']->link?>" /></td>
	    </tr>
	</table>
	<div class="form-actions">
	    <input type="submit" name="submit" value="Update" class="btn btn-primary" />
	</div>
<?php echo form_close(); ?>
    </div>
</div>