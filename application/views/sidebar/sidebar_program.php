<?php $t=$this->uri->segment(2); ?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Program</li>
        <li <?php if($t=='view_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/view_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Detail Program</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li <?php if($t=='edit_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/edit_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Revisi Program</a></li>
        <?php } ?>
        <li <?php if($t=='peserta_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/peserta_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Daftar Peserta</a></li>
        <li <?php if($t=='view_schedule_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/view_schedule_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Lihat Jadwal</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==2){ ?>
        <li <?php if($t=='schedule_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/schedule_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Ubah Jadwal</a></li>
        <li <?php if($t=='alokasi_kamar')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/alokasi_kamar/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Alokasi Kamar</a></li>
        <li <?php if($t=='feedback_result')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/feedback_result/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Rekap Evaluasi Program</a></li>
        <li <?php if($t=='feedback_pengajar' || $t=='feedback_result_pengajar')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/feedback_pengajar/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Rekap Evaluasi Pengajar</a></li>
        <?php } ?>
    </ul>
</div>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li><a href="<?php echo base_url()?>diklat/view_diklat/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Detail Diklat</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li <?php if($t=='edit_diklat')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/edit_diklat/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Revisi Diklat</a></li>
        <?php } ?>
        <li <?php if($t=='view_list_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/view_list_program/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Daftar Program Dibuka</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li <?php if($t=='buat_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/buat_program/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Buka Program Baru</a></li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==2){ ?>
        <li <?php if($t=='registrasi')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/registrasi/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Registrasi Peserta</a></li>
        <li <?php if($t=='terima_peserta')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/terima_peserta/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Penerimaan Peserta</a></li>
        <li <?php if($t=='alokasi_kamar_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>diklat/alokasi_kamar_program/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Alokasi Kamar</a></li>
        <?php } ?>
    </ul>
</div>
