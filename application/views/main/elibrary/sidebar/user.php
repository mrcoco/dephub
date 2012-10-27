<?php
if($this->uri->segment(3)=='type'){
$t=$this->uri->segment(4);
}
else $t='bukan kategori';
?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li><?php echo 'admin'; ?></li>
        <li class="divider"></li>
        <li><a href="#">Edit Profil</a></li>
        <li ><a href="<?php echo site_url("elibrary/digital/upload"); ?>">Upload</a></li>
        <li ><a href="<?php echo site_url("elibrary/admin"); ?>">Admin</a></li>
        <li ><a href="<?php echo site_url("elibrary/perpustakaan"); ?>">Perpustakaan</a></li>
        <li><a href="site/dashboard/library/">Logout</a></li>
        
    </ul>
</div>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu</li>
        <li ><a href="#">Home</a></li>
        <li><a href="#">Riwayat</a></li>
        <li><a href="#">Favorit</a></li>
        <li class="nav-header">Kategori file</li>

        <li <?php if($t=='') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/"); ?>"><i class="icon-book <?php if($t=='') echo 'icon-white'; ?>"></i>Semua</a></li>
        <li <?php if($t=='dokumen') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/dokumen"); ?>"><i class="icon-file <?php if($t=='dokumen') echo 'icon-white'; ?>"></i>Dokumen</a></li>
        <li <?php if($t=='video') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/video"); ?>"><i class="icon-film <?php if($t=='video') echo 'icon-white'; ?>"></i>video</a></li>
        <li <?php if($t=='presentasi') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/presentasi"); ?>"><i class="icon-picture <?php if($t=='presentasi') echo 'icon-white'; ?>"></i>Presentasi</a></li>
        <li <?php if($t=='lain') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/digital/type/lain"); ?>"><i class="icon-book <?php if($t=='lain') echo 'icon-white'; ?>"></i>Lain-Lain</a></li>

        <li class="divider"></li>
        <li><a href="#">Peraturan</a></li>
        <li><a href="#">Tentang E-library</a></li>
    </ul>
</div>
