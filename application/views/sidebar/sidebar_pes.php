<?php $t=$this->uri->segment(3); ?>
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li class="nav-header">Menu Program</li>
                <?php if($feedback_diklat){ ?>
                <li><a href="pes/front/add_feedback_diklat/<?php echo $id_program ?>"><i class="icon-chevron-right"></i> Evaluasi Diklat</a></li>
                <?php }else{ ?>
                <li><i class="icon-chevron-right"></i> Evaluasi Diklat <span class="label label-success">sudah</span></li>
                <?php } ?>
                <li><a href="pes/front/feedback_pengajar/<?php echo $id_program ?>"><i class="icon-chevron-right"></i> Evaluasi Pengajar</a></li>
                <li <?php if($t=='schedule_program')echo 'class="active"' ?>>
                    <a href="pes/front/schedule_program/<?php echo $id_program ?>"><i class="icon-chevron-right"></i> Jadwal Program</a>
                </li>
            </ul>
        </div>
