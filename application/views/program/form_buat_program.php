<script type="text/javascript">
    $().ready(function() {    
        var container = $('div.alert');
        var validator = $("#form1").validate({
            errorLabelContainer: container,
            errorContainer: $(container),
            rules: {
                name: "required",
                tahun_program: "required"
            },
            messages: {
                name: "Nama wajib diisi!",
                tahun_program: "Tahun program wajib diisi!"
            }

        });
        $(".cancel").click(function() {
            validator.resetForm();
        });
    });
    $(function(){
        $('#tgl_mulai').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#tgl_akhir').datepicker({
            format: 'yyyy-mm-dd'
        });
    });
</script>
<div class="alert alert-error fade in none">
    <h4>Error!</h4>
</div>
<form method="post" id="form1" action="program/insert_program" class="form-horizontal">
    <input type="hidden" name="parent" value="<?php echo $pil_diklat['id']?>"/>
    <fieldset>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#pelaksanaan" data-toggle="tab">Pelaksanaan</a></li>
            <li><a href="#pelaksana" data-toggle="tab">Pelaksana dan Fasilitator</a></li>
            <li><a href="#sarpras" data-toggle="tab">Sarana dan Prasarana</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="control-group">
                    <label class="control-label" for="input01">Angkatan</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" title="Anda belum memasukkan angkatan" name="angkatan" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input02">Tahun Program</label>
                    <div class="controls">
                        <input type="text" class="input-mini" id="input02" name="tahun_program" />
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksanaan">
                <div class="control-group">
                    <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
                    <div class="controls">
                        <input type="text" name="tanggal_mulai"  placeholder="Tahun-Bulan-Tanggal" id="tgl_mulai"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_akhir">Tanggal Selesai</label>
                    <div class="controls">
                        <input type="text" name="tanggal_akhir" placeholder="Tahun-Bulan-Tanggal" id="tgl_akhir"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Lama Pendidikan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('lama_pendidikan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cara Pelaksanaan Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksanaan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pelaksanaan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tempat') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksana">
                <div class="control-group">
                    <label class="control-label">Pelaksana Penanggung Jawab Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksana') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fasilitator</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('fasilitator') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="sarpras">
                <div class="control-group">
                    <label class="control-label">Ruang kelas</label>
                    <div class="controls">
                        <?php echo form_dropdown('kelas',$kelas)?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Asrama</label>
                    <div class="controls">
                        <?php foreach($asrama as $a){?>
                        <input type="checkbox" name="asrama[]" value="<?php echo $a['id']?>"/> <?php echo $a['nama']?> <br/>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" class="btn btn-primary btn-large" value="Simpan"/>
            <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
        </div>
    </fieldset>
</form>
