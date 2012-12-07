<div class="well">
    <h4>Login Manajemen Diklat</h4>
<?php    if(!$this->session->userdata('is_login')){ ?>
    <p>
        <?php echo form_open(base_url().'site/login'); ?>
        <input type="text" name="usr" placeholder="Masukkan NIP" class="input-medium"/>
        <input type="password" name="password" placeholder="Password" class="input-medium"/>
        <input type="submit" class="btn btn-primary" name="submit" value="Login" />
        <?php echo form_close(); ?>
    </p>
<?php }  ?>
        <a href="<?php echo base_url()?>unit"><i class="icon-chevron-right"></i> Login Sebagai Unit</a><br/>
        <a href="<?php echo base_url()?>inst"><i class="icon-chevron-right"></i> Login Sebagai Instansi</a><br/>
        <a href="<?php echo base_url()?>pes"><i class="icon-chevron-right"></i> Login Sebagai Peserta</a><br/>
</div>
