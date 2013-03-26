<?php $t=$this->uri->segment(2); ?>
    <ul class="nav nav-tabs">
        <li <?php if($t=='nilai_item')echo 'class="active"' ?>>
            <a href="program/nilai_item/<?php echo $materi['id'].'/'.$program['id'] ?>">Unsur Penilaian</a>
        </li>
        <?php if(isset($program)){ ?>
        <li <?php if($t=='nilai_input' || $t=='upload_nilai')echo 'class="active"' ?>>
            <a href="program/nilai_input/<?php echo $materi['id'].'/'.$program['id'] ?>">Pengumpulan Nilai</a>
        </li>
        <li <?php if($t=='nilai_view')echo 'class="active"' ?>>
            <a href="program/nilai_view/<?php echo $materi['id'].'/'.$program['id'] ?>">Lihat Daftar Nilai</a>
        </li>
        <?php } ?>
    </ul>