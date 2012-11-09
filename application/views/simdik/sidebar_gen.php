<?php
$t=$this->uri->segment(3);
?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li <?php if($t=='daftar_kategori')echo 'class="active"' ?>><a href="perencanaan/diklat/daftar_kategori"><i class="icon icon-chevron-right"></i> Daftar Kategori</a></li>
        <li <?php if($t=='buat_kategori')echo 'class="active"' ?>><a href="perencanaan/diklat/buat_kategori"><i class="icon icon-chevron-right"></i> Tambah Kategori</a></li>
        <li <?php if($t=='daftar_diklat')echo 'class="active"' ?>><a href="perencanaan/diklat/daftar_diklat"><i class="icon icon-chevron-right"></i> Daftar Diklat</a></li>
        <li <?php if($t=='buat_diklat')echo 'class="active"' ?>><a href="perencanaan/diklat/buat_diklat"><i class="icon icon-chevron-right"></i> Tambah Diklat</a></li>
        <li class="divider"></li>
        <li class="nav-header">Menu Registrasi</li>
        <li <?php if($t=='registrasi')echo 'class="active"' ?>><a href="penyelenggaraan/peserta/registrasi"><i class="icon icon-chevron-right"></i> Registrasi Peserta</a></li>
        <li <?php if($t=='list_peserta')echo 'class="active"' ?>><a href="penyelenggaraan/peserta/list_peserta"><i class="icon icon-chevron-right"></i> Terima Peserta</a></li>
    </ul>
</div>