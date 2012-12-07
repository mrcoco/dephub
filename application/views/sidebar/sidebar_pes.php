<?php $t=$this->uri->segment(3); ?>
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li class="nav-header">Menu Program</li>
                <li><a href="pes/front/add_feedback_diklat/<?php echo $ang['id_program'] ?>"><i class="icon-chevron-right"></i> Evaluasi Diklat</a></li>
                <li><a href="pes/front/add_feedback_pengajar/<?php echo $ang['id_program'] ?>"><i class="icon-chevron-right"></i> Evaluasi Pengajar</a></li>
                <li <?php if($t=='schedule_program')echo 'class="active"' ?>>
                    <a href="pes/front/schedule_program/<?php echo $ang['id_program'] ?>"><i class="icon-chevron-right"></i> Jadwal</a>
                </li>
            </ul>
        </div>
