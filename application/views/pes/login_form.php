<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form class="well span3" action="<?php echo base_url()?>pes/front/login_process" method="post">
  <label>Username</label>
  <input type="text" name="username" placeholder="Masukkan NIP/username">
  <label>Password</label>
  <input type="password" name="password" placeholder="Masukkan password"><br />
  <button class="btn btn-primary" type="submit">Login</button>
</form>
<br style="clear: both" />
<div clas="row">
    <a href="<?php echo base_url() ?>"><i class="icon-arrow-left"></i> Kembali ke Manajemen Diklat</a>
</div>