<?php $t=$this->uri->segment(2); ?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Feedback Diklat</li>
        <li><a href="<?php echo base_url()?>feedback/list_pertanyaan"><i class="icon icon-chevron-right"></i> Daftar pertanyaan</a></li>
        <!--<li><a href="<?php echo base_url()?>feedback/tambah_pertanyaan"><i class="icon icon-chevron-right"></i> Tambah pertanyaan</a></li>-->
        <li><a href="<?php echo base_url()?>feedback/list_kategori"><i class="icon icon-chevron-right"></i> Daftar kategori</a></li>
    </ul>
    <ul class="nav nav-list">
        <li class="nav-header">Menu Feedback Pengajar</li>
        <li><a href="<?php echo base_url()?>feedback/list_q_pengajar"><i class="icon icon-chevron-right"></i> Daftar pertanyaan</a></li>
    </ul>
</div>