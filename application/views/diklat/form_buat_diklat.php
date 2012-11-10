<script type="text/javascript">
    var pil_materi = <?php echo json_encode($materi)?>;
    
    $(document).ready(function() {    
        $('.materi').typeahead({
            'source':pil_materi
        });
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
        
        $('.add').live('click',function(){
            $('.cont').append('<div class="item"><input type="text" class="materi" name="materi[]"/><span class="add"> Tambah</span></div>');
            $(this).attr('class','del');
            $(this).text(' Hapus');
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
<form method="post" id="form1" action="diklat/insert_diklat" class="form-horizontal">
    <fieldset>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#tujuan" data-toggle="tab">Tujuan dan Indikator</a></li>
            <li><a href="#peserta" data-toggle="tab">Peserta</a></li>
            <li><a href="#materi" data-toggle="tab">Materi</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="control-group">
                    <label class="control-label" for="input01">Nama Program</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" title="Anda belum memasukkan nama" name="name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="kategori">Kategori Program</label>
                    <div class="controls">
                        <?php echo form_input('disp_kategori', $pil_kategori[$pil_kat],'readonly') ?>
                        <?php echo form_hidden('kategori', $pil_kat) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="deskripsi">Deskripsi Singkat</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('deskripsi') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tujuan">
                <div class="control-group">
                    <label class="control-label">Tujuan Kurikuler</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tujuan') ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Indikator Keluaran</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('indikator') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="peserta">
                <div class="control-group">
                    <label class="control-label">Syarat usia</label>
                    <div class="controls">
                        <input type="text" name="syarat_usia"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat masa kerja</label>
                    <div class="controls">
                        <input type="text" name="syarat_masa_kerja"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat pendidikan</label>
                    <div class="controls">
                        <?php echo form_dropdown('syarat_pendidikan',$pil_pendidikan) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Syarat pangkat/gol</label>
                    <div class="controls">
                        <?php echo form_dropdown('syarat_pangkat_gol',$pil_pangkat) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="materi">
                <div class="control-group">
                    <label class="control-label">Materi Diklat</label>
                    <div class="controls">
                        <div class="cont">
                            <div class="item"><input type="text" class="materi" name="materi[]"/><span class="add"> Tambah</span></div>
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
