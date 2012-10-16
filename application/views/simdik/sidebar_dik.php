<?php
//$t=$this->uri->segment(4);
if($id!=-1){
?>
<div class="well sidemenu">
    <ul class="nav nav-list">
        <li class="nav-header">Menu Diklat</li>
        <li><a href="perencanaan/diklat/detail_diklat/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Detail Diklat</a></li>
        <li><a href="penyelenggaraan/schedule/buat_schedule/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Ubah Jadwal</a></li>
        <li><a href="penyelenggaraan/peserta/registrasi"><i class="icon icon-chevron-right"></i> Registrasi Peserta</a></li>
        <li><a href="penyelenggaraan/peserta/list_peserta/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Terima Peserta</a></li>
        <li class="divider"></li>
        <li><a href="perencanaan/feedback/form_feedback_sarpras/<?php echo $id ?>"><i class="icon icon-chevron-right"></i> Feedback</a></li>
    </ul>
</div>
<?php } ?>