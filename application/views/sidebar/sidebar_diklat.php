<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li><a href="<?php echo base_url()?>diklat/view_diklat/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Detail Diklat</a></li>
        <li><a href="<?php echo base_url()?>diklat/view_list_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Daftar Program Dibuka</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li><a href="<?php echo base_url()?>diklat/edit_diklat/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Ubah Diklat</a></li>
        <li><a href="<?php echo base_url()?>program/buat_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Buka program</a></li>
        <li><a href="<?php echo base_url()?>diklat/registrasi/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Registrasi</a></li>
        <li><a href="<?php echo base_url()?>diklat/alokasi_peserta/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Alokasi peserta</a></li>
        <?php } ?>
        <li class="divider"></li>
        <li class="nav-header">Evaluasi Diklat</li>
        <li><a href="#"><i class="icon icon-chevron-right"></i> Feedback</a></li>
    </ul>
</div>