<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<?php echo form_open_multipart(base_url('user/update_user'),'class="form-horizontal"');?>
    <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
  <fieldset>
    <div class="control-group">
      <label class="control-label" for="pp"></label>
      <div class="controls">
          <p><img src="assets/public/foto/<?php echo $user['foto'] ?>" height="100"/></p>
            <?php echo $user['nama'] ?>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="pp2">Foto 3x4</label>
      <div class="controls">
        <input type="file" name="foto" id="pp2" />
        <p>Jenis file: jpg, png, gif</p>
      </div>
    </div>
<!--    <div class="control-group">
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
    </div>-->
  </fieldset>
    <div class="form-actions">
        <input class="btn btn-primary" type="submit" value="Simpan" />
    </div>
</form>