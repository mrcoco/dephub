<h2>Form Edit User</h2>
<table class="table table-condensed table-striped">
<tr><td>Nama</td><td>: <?php echo $data[0]['nama']?> </td></tr>
<tr><td>NIP</td><td>: <?php echo $data[0]['nip']?> </td></tr>
<tr><td>Jabatan</td><td>: <?php echo $data[0]['jabatan']?> </td></tr>
<tr><td>Jenis Anggota</td><td>: <?php switch($data[0]['userrole']){
    case 0:echo 'Anggota Biasa';break;
    case 1:echo 'Administrator/Petugas Perpustakaan';break;
    case 1:echo 'Uploader';break;
}
?></td></tr>
</table>
<?php echo form_open_multipart('elibrary/admin/do_edit_user');?>
<input type="hidden" name="id" value="<?php echo $data[0]['id']?>" />
<button type="submit" class="btn" name="userrole" value="1">Jadikan Petugas Perputakaan</button>
<button type="submit" class="btn" name="userrole" value="2">Jadikan Uploader</button>
<button type="submit" class="btn" name="userrole" value="0">Jadikan Anggota biasa</button>
<input type="button" class="btn" value="Cancel" onclick="history.go(-1)"/>
</form>