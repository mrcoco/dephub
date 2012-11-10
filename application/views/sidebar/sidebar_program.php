<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li><a href="<?php echo base_url()?>program/view_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Detail Program</a></li>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
        <li><a href="<?php echo base_url()?>program/edit_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Ubah Program</a></li>
        <?php } ?>
        <?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==2){ ?>
        <li><a href="<?php echo base_url()?>program/schedule_program/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Ubah Jadwal</a></li>
        <li><a href="<?php echo base_url()?>program/approve/<?php echo $program['id']?>"><i class="icon icon-chevron-right"></i> Terima Peserta</a></li>
        <?php } ?>
        <li class="divider"></li>
        <li class="nav-header">Evaluasi Diklat</li>
        <li><a href="#"><i class="icon icon-chevron-right"></i> Feedback</a></li>
    </ul>
</div>
