<form action="<?php echo base_url()?>inst/front/login_process" method="post">
    Instansi : <?php echo form_dropdown('instansi',$ins,'','id="instansi"')?>
    <br/>
    Password : <input type="password" name="password"/>
    <br/>
    <input type="submit" value="login"/>
</form>
