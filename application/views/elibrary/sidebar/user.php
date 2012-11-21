<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <?php
if($this->uri->segment(3)=='type'){
$t=$this->uri->segment(4);
}
else $t='bukan kategori';

$nama=ucwords(strtolower($this->session->userdata('nama')));
?>
<?php  if($this->session->userdata('is_login')) {//logged in?>
    <div class="well sidemenu">
        <ul class="nav nav-list">
            <li><?php echo 'Selamat datang '.$nama; ?></li>
            <li class="divider"></li>
            <?php  if($this->session->userdata('elib_userrole')==1) {//administrator?>
            <li ><a href="<?php echo site_url("elibrary/admin"); ?>">Admin</a></li>
            <?php }?>
            <li ><a href="<?php echo site_url("elibrary/digital/upload"); ?>"><i class="icon-upload"></i> Upload</a></li>
            <li><a href="<?php echo site_url("elibrary/digital/logout"); ?>">Logout</a></li>
        </ul>
    </div>

<?php } else { //login form?>
    <div class="well">
        <h4>LOGIN</h4>
        <p>
            <?php echo form_open(base_url().'elibrary/digital/login'); ?>
            <input type="text" name="usr" placeholder="username/nip" class="input-medium"/>
            <input type="password" name="password" placeholder="password" class="input-medium"/>
            <input type="submit" class="btn btn-primary" name="submit" value="Login" />
            <?php echo form_close(); ?>
    </div>
<?php }?>


<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu</li>
        <li ><a href="elibrary">Home</a></li><!--
        <li><a href="#">Riwayat</a></li>
        <li><a href="#">Favorit</a></li>-->
        <li class="nav-header">Perpustakaan Digital</li>
        
        <li <?php if($t=='semua') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/semua"); ?>"><i class="icon-book <?php if($t=='') echo 'icon-white'; ?>"></i>Semua File</a></li>
        <li <?php if($t=='dokumen') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/dokumen"); ?>"><i class="icon-file <?php if($t=='dokumen') echo 'icon-white'; ?>"></i>File Dokumen</a></li>
        <li <?php if($t=='multimedia') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/multimedia"); ?>"><i class="icon-film <?php if($t=='multimedia') echo 'icon-white'; ?>"></i>File Multimedia</a></li>
        <li <?php if($t=='presentasi') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/presentasi"); ?>"><i class="icon-picture <?php if($t=='presentasi') echo 'icon-white'; ?>"></i>File Presentasi</a></li>
        <li <?php if($t=='lain') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/lain"); ?>"><i class="icon-book <?php if($t=='lain') echo 'icon-white'; ?>"></i>File Lain-Lain</a></li>
        <li><a href="elibrary/digital/category">File Kategorial</a></li>
        <li class="nav-header">Perpustakaan Fisik</li>
        <li ><a href="<?php echo site_url("elibrary/perpustakaan"); ?>">Buku Kategorial</a></li>
        
<!--        <li class="divider"></li>
        <li><a href="#">Peraturan</a></li>
        <li><a href="#">Tentang E-library</a></li>-->
    </ul>
</div>
