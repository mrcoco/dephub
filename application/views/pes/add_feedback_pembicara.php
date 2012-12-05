<script type="text/javascript">
var list_pengajar;
$(document).ready(function(){
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
    var container = $('div.alert');
    var validator = $("#form1").validate({
            errorLabelContainer: container,
            errorContainer: $(container),
            rules: {
            },
            messages: {
            }
    });
    $(".cancel").click(function() {
            validator.resetForm();
    });
});
</script>
<div class="alert alert-error fade in none">
    <h4>Error!</h4>
</div>
<p align="center" class="lead">
    Evaluasi Pengajar<br/>
    <?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?>
</p>
<form id="form1" action="pes/front/insert_feedback_pengajar" method="post" class="form-horizontal">
    <fieldset>
        <div class="control-group">
            <label class="control-label">Materi</label>
            <div class="controls">
                <?php echo form_dropdown('id_materi', $mat,'','class="input-xlarge"') ?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Pengajar</label>
            <div class="controls">
                <?php echo form_dropdown('id_pembicara', $key_pembicara,'','class="input-xlarge"') ?>
<!--                <input type="text" name="id_pembicara" id="pengajar" placeholder="Masukkan nama pengajar"/>-->
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Tanggal</label>
            <div class="controls">
                <input type="text" name="tanggal" class="datepicker" placeholder="tgl-bulan-tahun"/>
            </div>
        </div>
        
        <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
        <input type="hidden" name="id_diklat" value="<?php echo $diklat['id'] ?>"/>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="45%">Bahan Evaluasi</th>
                        <th width="50%">Evaluasi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>a.</td>
                        <td>Penguasaan materi</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="a" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="a" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="a" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="a" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="a" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>b.</td>
                        <td>Sistimatika penyajian</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="b" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="b" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="b" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="b" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="b" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>c.</td>
                        <td>Kemampuan menyajikan</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="c" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="c" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="c" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="c" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="c" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>d.</td>
                        <td>Ketepatan waktu, kehadiran dan cara menyajikan</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="d" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="d" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="d" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="d" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="d" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>e.</td>
                        <td>Penggunaan metode dan sarana diklat</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="e" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="e" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="e" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="e" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="e" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>f.</td>
                        <td>Sikap dan perilaku</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="f" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="f" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="f" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="f" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="f" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>g.</td>
                        <td>Cara menjawab pertanyaan peserta</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="g" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="g" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="g" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="g" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="g" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>h.</td>
                        <td>Penggunaan bahasa</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="h" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="h" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="h" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="h" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="h" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                        <td>i.</td>
                        <td>Pemberian motivasi kepada peserta</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="i" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="i" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="i" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="i" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="i" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>j.</td>
                        <td>Pencapaian tujuan instruksional</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="j" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="j" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="j" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="j" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="j" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>k.</td>
                        <td>Kerapian berpakaian</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="k" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="k" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="k" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="k" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="k" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                    <tr>
                        <td>l.</td>
                        <td>Kerjasama antar widyaiswara (dalam tim)</td>
                        <td>
                            <label class="radio inline"><input type="radio" name="l" value="100">Baik Sekali</label>
                            <label class="radio inline"><input type="radio" name="l" value="90">Baik</label>
                            <label class="radio inline"><input type="radio" name="l" value="80">Cukup</label>
                            <label class="radio inline"><input type="radio" name="l" value="70">Kurang</label>
                            <label class="radio inline"><input type="radio" name="l" value="60">Kurang Sekali</label>
                        </td>
                    </tr>
                </tbody>
            </table>
        <div class="control-group">
            <label class="control-label">Saran</label>
            <div class="controls">
                <textarea name="saran" class="input-xxlarge"></textarea>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" onclick="return confirm('Apakah Anda yakin telah mengisi seluruh evaluasi pengajar?')" class="btn btn-primary btn-large" value="Simpan"/>
            <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
        </div>
    </fieldset>
</form>