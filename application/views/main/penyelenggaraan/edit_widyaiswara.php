<p align="center" class="lead">Curriculum Vitae Pengajar/Penceramah</p>
<form action="penyelenggaraan/dashboard/edit_process" method="POST">
<input type="hidden" name="id" value="<?php echo $data['id']?>"/>    
<table class="table table-striped table-condensed">
    <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?php echo $data['nama'] ?>"/></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td><input type="text" name="nip" value="<?php echo $data['nip'] ?>"/></td>
    </tr>
    <tr>
        <td>Tempat Tanggal Lahir</td>
        <td><input type="text" name="tempat" value="<?php echo $data['tempat_lahir'] ?>"/>, <input type="text" id="date" name="tanggal" value="<?php echo $data['tanggal_lahir'] ?>"/></td>
    </tr>
    <tr>
        <td>Pangkat/Gol</td>
        <td><input type="text" name="pangkat" value="<?php echo $data['pangkat'] ?>"/>/<input type="text" name="gol" value="<?php echo $data['pangkat'] ?>"/></td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td><textarea name="instansi"><?php echo $data['instansi'] ?></textarea></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td><textarea name="jabatan"><?php echo $data['jabatan'] ?></textarea></td>
    </tr>
    <tr>
        <td colspan="2">Pendidikan</td>
    </tr>
    <tr>
        <td>a. Dalam negeri</td>
        <td><textarea name="dn"><?php echo $data['pendidikan_dn'] ?></textarea></td>
    </tr>
    <tr>
        <td>b. Luar negeri</td>
        <td><textarea name="ln"><?php echo $data['pendidikan_ln'] ?></textarea></td>
    </tr>
    <tr>
        <td>Alamat rumah</td>
        <td><textarea name="alamat_rumah"><?php echo $data['alamat_rumah'] ?></textarea></td>
    </tr>
    <tr>
        <td>Telepon rumah</td>
        <td><input type="text" name="tlp_rumah" value="<?php echo $data['tlp_rumah'] ?>"/></td>
    </tr>
    <tr>
        <td>Alamat kantor</td>
        <td><textarea name="alamat_kantor"><?php echo $data['alamat_kantor'] ?></textarea></td>
    </tr>
    <tr>
        <td>Telepon kantor</td>
        <td><input type="text" name="tlp_kantor" value="<?php echo $data['tlp_kantor'] ?>"/></td>
    </tr>
</table>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>