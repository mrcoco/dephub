<div class="well">
    <h4>Login Manajemen Diklat</h4>
<?php    if(!$this->session->userdata('is_login')){ ?>
    <p>
        <?php echo form_open(base_url().'site/login'); ?>
        <input type="text" name="usr" placeholder="Masukkan NIP/username" class="span2"/>
        <input type="password" name="password" placeholder="Password" class="span2"/>
        <br/>
        <input type="submit" class="btn btn-primary" name="submit" value="Login" />
        <?php echo form_close(); ?>
    </p>
<?php }  ?>
    <br />
        <a href="<?php echo base_url()?>unit"><i class="icon-chevron-right"></i> Login Sebagai Unit</a><br/>
        <a href="<?php echo base_url()?>inst"><i class="icon-chevron-right"></i> Login Sebagai Instansi</a><br/>
        <a href="<?php echo base_url()?>pes"><i class="icon-chevron-right"></i> Login Sebagai Peserta</a><br/>
        <a href="<?php echo base_url()?>wid"><i class="icon-chevron-right"></i> Login Sebagai Pengajar</a><br/>
</div>
