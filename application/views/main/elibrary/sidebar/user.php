<?php
if($this->uri->segment(3)=='type'){
$t=$this->uri->segment(4);
}
else $t='bukan kategori';
?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li><?php echo 'Administrator'; ?></li>
        <li class="divider"></li>
        <li ><a href="<?php echo site_url("elibrary/admin/upload"); ?>"><i class="icon-upload"></i> Upload</a></li>
        <li ><a href="<?php echo site_url("elibrary/admin"); ?>">Admin</a></li>
        
        
    </ul>
</div>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu</li>
        <li ><a href="site/dashboard/library">Home</a></li><!--
        <li><a href="#">Riwayat</a></li>
        <li><a href="#">Favorit</a></li>-->
        <li class="nav-header">Perpustakaan Digital</li>
        
        <li <?php if($t=='') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/"); ?>"><i class="icon-book <?php if($t=='') echo 'icon-white'; ?>"></i>Semua File</a></li>
        <li <?php if($t=='dokumen') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/dokumen"); ?>"><i class="icon-file <?php if($t=='dokumen') echo 'icon-white'; ?>"></i>File Dokumen</a></li>
        <li <?php if($t=='video') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/video"); ?>"><i class="icon-film <?php if($t=='video') echo 'icon-white'; ?>"></i>File Video</a></li>
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
