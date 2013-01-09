<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form class="form-horizontal" action="<?php echo base_url('user/update_user') ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
  <fieldset>
    <div class="control-group">
      <label class="control-label" for="username">Username</label>
      <div class="controls">
        <input type="text" name="username" value="<?php echo $user['username'] ?>" id="username">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="pass">Password</label>
      <div class="controls">
        <input type="password" name="password" id="pass">
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="pass2">Konfirmasi Password</label>
      <div class="controls">
        <input type="password" name="password2" id="pass2">
      </div>
    </div>
  </fieldset>
    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Simpan" />
    </div>
</form>