<?php
$t=$this->uri->segment(3);
if($id!=-1){
?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li <?php if($t=='detail_diklat')echo 'class="active"' ?>><a href="perencanaan/diklat/detail_diklat/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Detail Diklat</a></li>
        <li <?php if($t=='edit_diklat')echo 'class="active"' ?>><a href="perencanaan/diklat/edit_diklat/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Ubah Diklat</a></li>
        <li <?php if($t=='buat_schedule')echo 'class="active"' ?>><a href="penyelenggaraan/schedule/buat_schedule/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Ubah Jadwal</a></li>
        <li <?php if($t=='registrasi_dik')echo 'class="active"' ?>><a href="penyelenggaraan/peserta/registrasi_dik/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Registrasi Peserta</a></li>
        <li <?php if($t=='list_peserta')echo 'class="active"' ?>><a href="penyelenggaraan/peserta/list_peserta/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Terima Peserta</a></li>
        <li class="divider"></li>
        <li class="nav-header">Evaluasi Diklat</li>
        <li><a href="perencanaan/feedback/form_feedback_sarpras/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Feedback</a></li>
    </ul>
</div>
<?php } ?>