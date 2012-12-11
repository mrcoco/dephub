<script type="text/javascript">
var list_pengajar;
$(function(){
//    $('#pengajar').focus(function(){
//        $.getJSON('<?php echo base_url()?>pes/front/json_pengajar/'+$('#materi').val(),function(data){
//            list_pengajar=data;
//        }).then(function(){
//            console.log(list_pengajar);
//            $('#pengajar').typeahead();
//            $('#pengajar').data('typeahead').source=list_pengajar;
//        });
//        
//    });
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
<div class="alert alert-error fade in none">
    <h4>Error!</h4>
</div>
<p align="center" class="lead">
    <?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?>
<!--</p>
<p align="center">-->
<br />
    <?php echo $materi['judul'] ?><br />oleh<br />
    <?php if($pengajar['nama_peg']!=''){echo $pengajar['nama_peg']; }  else {echo $pengajar['nama_dostam'];} ?>
</p>
<form action="pes/front/insert_feedback_pengajar" method="post" class="form-horizontal">
        <input type="hidden" name="id_materi" value="<?php echo $materi['id'] ?>"/>
        <input type="hidden" name="id_pengajar" value="<?php echo $pengajar['id'] ?>"/>
        <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
        <input type="hidden" name="id_diklat" value="<?php echo $diklat['id'] ?>"/>
        <?php if(is_array($pertanyaan)){ ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th width="5%">No</th>
                    <th width="50%">Bahan Evaluasi</th>
                    <th width="45%">Evaluasi (geser slider ke arah yang Anda inginkan)</th>
                </tr>
            </thead>
            <tbody>
            <?php $i=1; foreach($pertanyaan as $tanya){ ?>
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td><?php echo $tanya['pertanyaan'] ?></td>
                    <td>
<!--                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="100">Baik Sekali</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="90">Baik</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="80">Cukup</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="70">Kurang</label>
                        <label class="radio inline"><input type="radio" name="<?php echo $tanya['id_pertanyaan'] ?>" value="60">Kurang Sekali</label>-->
                        <input type="hidden" class="skor" name="<?php echo $tanya['id_pertanyaan'] ?>"/>
                        <div class="slider"></div>
                        <span>Kurang Sekali</span>
                        <!--<span class="skor2" style="width:200px;text-align: center;"></span>-->
                        <span class="pull-right">Baik sekali</span>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <table width="100%" class="table table-bordered">
            <thead>
                <tr>
                    <th>Saran Anda kepada pengajar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><textarea name="saran"  class="input-xxlarge" rows="3"></textarea></td>
                </tr>
            </tbody>
        </table>
        <?php } ?>
    <div class="form-actions">
        <input type="submit" onclick="return confirm('Apakah Anda yakin telah mengisi seluruh evaluasi pengajar?')" class="btn btn-primary btn-large" value="Simpan"/>
        <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
    </div>
</form>