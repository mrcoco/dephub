<p class="lead">
    <?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?>
</p>
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
            <form class="searchform" action="pes/front/add_feedback_pengajar" method="POST">
                <td>
                    <?php if($pg['nama_peg']!=''){echo $pg['nama_peg']; }  else {echo $pg['nama_dostam'];} ?>
                </td>
                <td>
                    <?php if($this->editor->cek_fdb_pengajar($program['id'],$m['id'],$pg['id'],$this->session->userdata('id_pes'))<=0){ ?>
                    <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
                    <input type="hidden" name="id_materi" value="<?php echo $m['id'] ?>"/>
                    <input type="hidden" name="id_pengajar" value="<?php echo $pg['id'] ?>"/>
                    <input type="submit" class="btn btn-mini" value="Isi Feedback"/>
                    <?php }else{ ?>
                    <span class="label label-success">Sudah mengisi</span>
                    <?php } ?>
                </td>
            </form>
            </tr>
            <?php } ?>
        <?php } ?>
        <?php } ?>
    </table>
<?php } ?>