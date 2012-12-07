<form action="<?php echo base_url()?>dephub_unit/update_unit" method="post">
    <input type="hidden" name="id" value="<?php echo $unit['id']?>"/>
    Instansi : <?php echo form_dropdown('kode_inst',$inst,$unit['kode_inst']) ?>
    <br/>
    Kode unit : <input type="text" name="kode" value="<?php echo $unit['kode']?>"/>
    <br/>
    Nama unit : <input type="text" name="nama" value="<?php echo $unit['nama_unit']?>"/>
    <br/>
    Password login : <input type="password" name="password"/>
    <br/>
    Konfirmasi Password : <input type="password" name="password_konf"/>
    <br/>
    <input type="submit" value="Buat"/>
</form>
