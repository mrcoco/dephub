<div class="well sidemenu">
    <ul class="nav nav-list">
        <li><?php echo 'admin'; ?></li>
        <li class="divider"></li>
        <li><a href="#">Edit Profil</a></li>
        <li ><a href="<?php echo site_url("elibrary/upload"); ?>">Upload</a></li>
        <li ><a href="<?php echo site_url("elibrary/admin"); ?>">Upload</a></li>
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
        <li ><a href="<?php echo site_url("elibrary/type/index/dokumen"); ?>"><i class="icon-file icon-white"></i>Kategori Dokumen</a></li>
        <li><a href="<?php echo site_url("elibrary/type/index/video"); ?>"><i class="icon-film"></i>Kategori video</a></li>
        <li><a href="<?php echo site_url("elibrary/type/index/presentasi"); ?>"><i class="icon-picture"></i>Kategori Presentasi</a></li>
        <li><a href="<?php echo site_url("elibrary/type/index/lain"); ?>"><i class="icon-book"></i>Kategori Lain-Lain</a></li>
        <li class="divider"></li>
        <li><a href="#">Peraturan</a></li>
        <li><a href="#">Tentang E-library</a></li>
    </ul>
</div>
