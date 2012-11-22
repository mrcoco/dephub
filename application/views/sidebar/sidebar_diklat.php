<?php $t=$this->uri->segment(2); ?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li <?php if($t=='view_diklat')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/view_diklat/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Detail Diklat</a></li>
        <li <?php if($t=='view_list_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/view_list_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Daftar Program Dibuka</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li <?php if($t=='edit_diklat')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/edit_diklat/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Revisi Diklat</a></li>
        <li <?php if($t=='buat_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/buat_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Buka Program Baru</a></li>
        <li <?php if($t=='registrasi')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/registrasi/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Registrasi Peserta</a></li>
        <li <?php if($t=='terima_peserta')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/terima_peserta/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Penerimaan Peserta</a></li>
        <li <?php if($t=='feedback_result')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/feedback_result/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Rekap Evaluasi Diklat</a></li>
        <?php } ?>
    </ul>
</div>