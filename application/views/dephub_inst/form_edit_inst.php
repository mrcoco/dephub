<form action="<?php echo base_url() ?>dephub_inst/update_inst" method="post">
    <input type="hidden" name="id" value="<?php echo $inst['id']?>">
    Kode kantor : <input type="text" name="kode" value="<?php echo $inst['kode_kantor'] ?>"/>
    <br/>
    Nama instansi : <input type="text" name="nama" value="<?php echo $inst['nama_instansi'] ?>"/>
    <br/>
    Singkatan : <input type="text" name="singkatan" value="<?php echo $inst['nama_singkat'] ?>"/>
    <br/>
    Password login : <input type="password" name="password"/>
    <br/>
    Konfirmasi Password : <input type="password" name="password_konf"/>
    <br/>
    <input type="submit" value="Simpan"/>
</form>
