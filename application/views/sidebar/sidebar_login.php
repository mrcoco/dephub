<div class="well">
    <h4>LOGIN</h4>
    <p>
        <?php echo form_open(base_url().'site/login'); ?>
        <input type="text" name="usr" placeholder="Masukkan NIP" class="input-medium"/>
        <input type="password" name="password" placeholder="Password" class="input-medium"/>
        <input type="submit" class="btn btn-primary" name="submit" value="Login" />
        <?php echo form_close(); ?>
    </p>
    <a href="<?php echo base_url()?>unit"><i class="icon-chevron-right"></i> Login Unit</a><br/>
    <a href="<?php echo base_url()?>inst"><i class="icon-chevron-right"></i> Login Instansi</a><br/>
    <a href="<?php echo base_url()?>pes"><i class="icon-chevron-right"></i> Login Peserta</a><br/>
</div>
