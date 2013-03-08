<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<form class="well span3 autowidth" action="<?php echo base_url()?>inst/front/login_process" method="post">
  <label>Instansi</label>
  <?php echo form_dropdown('instansi',$ins,'','id="instansi"')?>
  <label>Password</label>
  <input type="password" name="password" placeholder="Masukkan password"><br />
  <button class="btn btn-primary" type="submit">Login</button>
</form>
<br style="clear: both" />
<div clas="row">
    <a href="<?php echo base_url() ?>"><i class="icon-arrow-left"></i> Kembali ke Manajemen Diklat</a>
</div>
