<form class="well span3" action="<?php echo base_url()?>inst/front/login_process" method="post">
  <label>Instansi</label>
  <?php echo form_dropdown('instansi',$ins,'','id="instansi"')?>
  <label>Password</label>
  <input type="password" name="password" placeholder="Masukkan password">
  <button class="btn btn-primary" type="submit">Login</button>
</form>