<?php $t=$this->uri->segment(3); ?>
        <div class="well sidemenu">
            <ul class="nav nav-list">
                <li class="nav-header">Menu Penilaian</li>
                <li <?php if($t=='item')echo 'class="active"' ?>>
                    <a href="wid/nilai/item/<?php echo $materi['id'].'/'.$program['id'] ?>"><i class="icon-chevron-right"></i> Unsur Penilaian</a>
                </li>
                <?php if(isset($program)){ ?>
                <li <?php if($t=='input' || $t=='upload_nilai')echo 'class="active"' ?>>
                    <a href="wid/nilai/input/<?php echo $materi['id'].'/'.$program['id'] ?>"><i class="icon-chevron-right"></i> Pengumpulan Nilai</a>
                </li>
                <li <?php if($t=='view')echo 'class="active"' ?>>
                    <a href="wid/nilai/view/<?php echo $materi['id'].'/'.$program['id'] ?>"><i class="icon-chevron-right"></i> Lihat Daftar Nilai</a>
                </li>
                <?php } ?>
            </ul>
        </div>
