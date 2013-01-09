<script>
$(function() {
    $( ".slider" ).slider({
        value: 80,
        min: 60,
        max: 100,
        step: 1,
        slide: function( event, ui ) {
            $(this).siblings(".skor").val(ui.value );
            $(this).siblings(".skor2").text(ui.value );
        }
    });
    $( ".skor" ).val( $( ".slider" ).slider( "value" ) );
});
</script>
<p align="center" class="lead">
    Evaluasi Kinerja Penyelenggaraan<br/>
    <?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?>
</p>
<form action="pes/front/insert_feedback_diklat" method="post" class="form-horizontal">
<input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
<?php foreach($kategori as $kat){ ?>
    <div id="<?php echo $kat['id_kategori'] ?>">
        <h4><?php echo $kat['nama_kategori'] ?></h4>
        <?php if(isset($pertanyaan[$kat['id_kategori']])){ ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="25%">Bahan Evaluasi</th>
                    <th width="45%">Evaluasi (geser slider ke arah yang Anda inginkan)</th>
                    <th width="25%">Saran Konstruktif</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($pertanyaan[$kat['id_kategori']] as $tanya){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $tanya['pertanyaan'] ?></td>
                    <td>
                        Nilai : <span class="skor2"></span>
<!--                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="100">Baik Sekali</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="90">Baik</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="80">Cukup</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="70">Kurang</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="60">Kurang Sekali</label>-->
                        <input type="hidden" class="skor" name="<?php echo $tanya['id_pertanyaan'] ?>"/>
                        <div class="slider"></div>
                        <span>Kurang Sekali</span>
                        <span class="pull-right">Baik sekali</span>
                    </td>
                    <?php if($i==2){ ?>
                    <td rowspan="<?php echo count($pertanyaan[$kat['id_kategori']]) ?>"><textarea name="saran_<?php echo $kat['id_kategori'] ?>" style="width:90%;height:90%"></textarea></td>
                    <?php } ?> 
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <?php }else{ ?>
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                    <th>Feedback Anda</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><textarea name="saran_<?php echo $kat['id_kategori'] ?>"  class="input-xxlarge" rows="3"></textarea></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
    </div>
<?php } ?>
    <div class="form-actions">
        <input type="submit" onclick="return confirm('Apakah Anda yakin telah mengisi seluruh evaluasi diklat?')" class="btn btn-primary btn-large" value="Simpan"/>
        <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
    </div>
</form>