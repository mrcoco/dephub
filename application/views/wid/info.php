<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<p>
<?php if(isset($tahun)){ ?>
    Pilih tahun : 
    <?php foreach($tahun as $t){ ?>
    <a href="<?php echo base_url('wid/front/info_pengajar/'.$t) ?>"><?php echo $t ?></a> |
    <?php } ?>
<?php } ?>
</p>
<?php if($materi){ ?>
<?php foreach($materi as $m){ ?>
<h3><?php echo $m['judul'] ?> <small>(Total <?php echo $total_jam[$m['id']] ?> jam)</small></h3>
    <table class="table-striped table-condensed table">
        <?php foreach($diklat[$m['id']] as $d){ ?>
            <?php if($program[$d['id']]){ ?>
            <?php foreach($program[$d['id']] as $p){ ?>
                <tr>
                    <td width="200px"><?php echo $d['name'] ?> Angkatan <?php echo $p['angkatan']; ?></td>
                    <td width="250px">
                        <?php echo $this->date->konversi5($p['tanggal_mulai']).' - '.$this->date->konversi5($p['tanggal_akhir']) ?>
                    </td>
                    <td>
                    <form style="margin:0;" class="form-inline" action="wid/front/feedback_result_pengajar/<?php echo $p['id_program'] ?>" method="POST">
                        <a class="btn btn-mini" href="wid/front/schedule_program/<?php echo $p['id_program'] ?>">Jadwal program</a>
                        <?php if($this->editor->cek_fdb_pengajar($p['id_program'],$m['id'],$this->session->userdata('id_wid'))>0){ ?>
                        <input type="hidden" name="id_program" value="<?php echo $p['id_program'] ?>"/>
                        <input type="hidden" name="id_materi" value="<?php echo $m['id'] ?>"/>
                        <input type="hidden" name="id_pengajar" value="<?php echo $this->session->userdata('id_wid') ?>"/>
                        <input type="submit" class="btn btn-mini" value="Hasil Evaluasi" />
                        <?php }else{ ?>
                        <span class="label label-important">Evaluasi belum diisi</span>
                        <?php } ?>
                    </form>
                    </td>
                </tr>
            <?php } ?>
            <?php }else{?>
                <tr>
                    <td><?php echo $d['name'] ?></td>
                    <td colspan="2">Tidak ada program tahun ini</td>
                </tr>
            <?php } ?>
        <?php } ?>
    </table>
<?php } ?>
<?php }else{ ?>
    Anda tidak ditugasi memberikan materi
<?php } ?>