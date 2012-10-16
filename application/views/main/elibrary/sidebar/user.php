<?php
$t=$this->uri->segment(4);
?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li><?php echo 'admin'; ?></li>
        <li class="divider"></li>
        <li><a href="#">Edit Profil</a></li>
        <li><a href="site/dashboard/library/">Logout</a></li>
    </ul>
</div>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu</li>
        <li ><a href="#">Home</a></li>
        <li><a href="#">Riwayat</a></li>
        <li><a href="#">Favorit</a></li>
        <li ><a href="<?php echo site_url("elibrary/upload"); ?>">Upload</a></li>
        <li class="nav-header">Kategori file</li>
        <li <?php if($t=='-1') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/type/daftar/-1"); ?>"><i class="icon-folder-open <?php if($t=='-1') echo 'icon-white'; ?>"></i> Semua</a></li>
        <li <?php if($t=='1') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/type/daftar/1"); ?>"><i class="icon-file <?php if($t=='1') echo 'icon-white'; ?>"></i> Text</a></li>
        <li <?php if($t=='2') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/type/daftar/2"); ?>"><i class="icon-film <?php if($t=='2') echo 'icon-white'; ?>"></i> Video</a></li>
        <li <?php if($t=='3') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/type/daftar/3"); ?>"><i class="icon-picture <?php if($t=='3') echo 'icon-white'; ?>"></i> Presentation</a></li>
        <li <?php if($t=='4') echo 'class="active"'; ?>><a href="<?php echo site_url("elibrary/type/daftar/4"); ?>"><i class="icon-book <?php if($t=='4') echo 'icon-white'; ?>"></i> Lain-lain</a></li>
        <li class="divider"></li>
        <li><a href="#">Peraturan</a></li>
        <li><a href="#">Tentang E-library</a></li>
    </ul>
</div>
