<?php $t=$this->uri->segment(2); ?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Program</li>
        <li><a href="<?php echo base_url()?>diklat/view_diklat/<?php echo $program['parent']?>"><i class="icon icon-chevron-right"></i> Detail Diklat</a></li>
        <li <?php if($t=='view_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/view_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Detail Program</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li <?php if($t=='edit_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/edit_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Revisi Program</a></li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==2){ ?>
        <li <?php if($t=='schedule_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/schedule_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Ubah Jadwal</a></li>
        <li <?php if($t=='alokasi_kamar')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/alokasi_kamar/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Alokasi Kamar</a></li>
        <li <?php if($t=='feedback_result')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/feedback_result/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Rekap Evaluasi Program</a></li>
        <li <?php if($t=='feedback_result_pem')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/feedback_result_pem/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Rekap Evaluasi Pembicara</a></li>
        <?php } ?>
        <li <?php if($t=='peserta_program')echo 'class="active"' ?>><a href="<?php echo base_url()?>program/peserta_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Daftar Peserta</a></li>
    </ul>
</div>
