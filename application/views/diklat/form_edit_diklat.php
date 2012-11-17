<script type="text/javascript">
    var pil_materi = <?php echo json_encode($listmateri)?>;
    
    $(document).ready(function() {    
        $('.materi').typeahead({
            'source':pil_materi
        });
        var container = $('div.alert');
        var validator = $("#form1").validate({
            errorLabelContainer: container,
            errorContainer: $(container),
            rules: {
                name: "required"
            },
            messages: {
                name: "Nama wajib diisi!"
            }

        });
        $(".cancel").click(function() {
            validator.resetForm();
        });
        
        $('.add').live('click',function(){
            $('.cont').append('<p><input type="text" class="materi" name="materi[]"/> <span class="btn btn-mini add"><i class="icon-plus"></i> Tambah</span></p>');
            $(this).attr('class','del btn btn-mini btn-danger');
            $(this).html('<i class="icon-remove"></i> Hapus');
            $('.materi').typeahead({
                'source':pil_materi
            });
        });
        
        $('.del').live('click',function(){
            $(this).parent().remove();
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
<p align="center" class="lead"><?php echo $program['name'] ?></p>
<form id="form1" method="post" action="diklat/update_diklat" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $program['id'] ?>"/>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#tujuan" data-toggle="tab">Tujuan dan Indikator</a></li>
            <li><a href="#peserta" data-toggle="tab">Peserta</a></li>
            <li><a href="#materi" data-toggle="tab">Materi</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="control-group">
                    <label class="control-label" for="input01">Nama Diklat</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" name="name" value="<?php echo $program['name'] ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="kategori">Kategori Diklat</label>
                    <div class="controls">
                        <?php echo form_dropdown('kategori', $pil_kategori, $program['parent']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="deskripsi">Deskripsi Singkat</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('deskripsi', $program['deskripsi']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tujuan">
                <div class="control-group">
                    <label class="control-label">Tujuan Kurikuler</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tujuan', $program['tujuan']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Indikator Keluaran</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('indikator', $program['indikator']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="peserta">
                <div class="control-group">
                    <label class="control-label">Jumlah peserta</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="input-mini" name="jumlah_peserta" type="text" value="<?php echo $program['jumlah_peserta'] ?>"/><span class="add-on">orang</span>
                        </div>
                        <span class="help-inline">(maksimum)</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat max usia</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="input-mini" name="syarat_usia" type="text" value="<?php echo $program['syarat_usia'] ?>"/><span class="add-on">tahun</span>
                        </div>
                        <span class="help-inline">(maksimum)</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat masa kerja</label>
                    <div class="controls">
                        <div class="input-append">
                            <input class="input-mini" name="syarat_masa_kerja" type="text" value="<?php echo $program['syarat_masa_kerja'] ?>"/><span class="add-on">tahun</span>
                        </div>
                        <span class="help-inline">(maksimum)</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat pendidikan</label>
                    <div class="controls">
                        <?php echo form_dropdown('syarat_pendidikan',$pil_pendidikan,$program['syarat_pendidikan']) ?>
                        <span class="help-inline">(minimum)</span>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat pangkat/gol</label>
                    <div class="controls">
                        <?php echo form_dropdown('syarat_pangkat_gol',$pil_pangkat,$program['syarat_pangkat_gol']) ?>
                        <span class="help-inline">(minimum)</span>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="materi">
                <div class="control-group">
                    <label class="control-label">Materi Diklat</label>
                    <div class="controls">
                        <div class="cont">
                        <?php foreach($materi as $m){?>
                            <p><input type="text" class="materi" name="materi[]" value="<?php echo $m['judul']?>"/>
                                <span class=" btn btn-mini btn-danger"><i class="icon-remove"></i> Hapus</span>
                            </p>
                        <?php } ?>
                            <p><input type="text" class="materi" name="materi[]"/>
                                <span class="btn btn-mini add"><i class="icon-plus"></i> Tambah</span>
                            </p>
                        </div>
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
