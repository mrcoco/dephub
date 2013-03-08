<h2><?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?></h2>
<?php foreach($materi as $m){ ?>
<br/><h4><?php echo $m['judul'] ?></h4>
    <table width="400px" class="table-striped">
        <tr>
            <th width="300px"></th>
            <th></th>
        </tr>
        <?php foreach($pemateri[$m['id']] as $pm){ ?>
        <?php foreach($pengajar as $pg){ ?>
            <?php if($pg['id']==$pm['id_pembicara']){ ?>
            <tr>
                <td>
                    <?php if($pg['nama_peg']!=''){echo $pg['nama_peg']; }  else {echo $pg['nama_dostam'];} ?>
                </td>
                <td>
                    <?php if($this->editor->cek_fdb_pengajar($program['id'],$m['id'],$pg['id'],$this->session->userdata('id_pes'))>0){ ?>
                    <a class="btn btn-mini" href="program/feedback_result_pengajar/<?=$program['id'] ?>/<?=$m['id']?>/<?=$pg['id']?>">
                        Lihat Feedback
                    </a>
                    <?php }else{ ?>
                    <span class="label label-important">Belum diisi</span>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        <?php } ?>
        <?php } ?>
    </table>
<?php } ?>