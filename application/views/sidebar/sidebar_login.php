<div class="well">
    <h4>LOGIN</h4>
    <p>
        <?php echo form_open(base_url().'site/login'); ?>
        <input type="text" name="usr" placeholder="username/nip" class="input-medium"/>
        <input type="password" name="password" placeholder="password" class="input-medium"/>
        <input type="submit" class="btn btn-primary" name="submit" value="Login" />
        <?php echo form_close(); ?>
</div>