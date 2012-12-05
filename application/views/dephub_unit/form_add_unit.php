<form action="<?php echo base_url()?>dephub_unit/insert_unit" method="post">
Instansi : <?php echo form_dropdown('kode_inst',$inst) ?>
<br/>
Kode unit : <input type="text" name="kode"/>
<br/>
Nama unit : <input type="text" name="nama"/>
<br/>
Password login : <input type="password" name="password"/>
<br/>
Konfirmasi Password : <input type="password" name="password_konf"/>
<br/>
<input type="submit" value="Buat"/>
</form>
