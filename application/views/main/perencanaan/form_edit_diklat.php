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
</script>
<div class="alert alert-error fade in none">
    <h4>Error!</h4>
</div>
<form id="form1" method="post" action="perencanaan/dashboard/update_diklat" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id" value="<?php echo $program['id'] ?>"/>
        <legend>Form Pengubahan Diklat</legend>
        <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
            <li><a href="#tujuan" data-toggle="tab">Tujuan dan Indikator</a></li>
            <li><a href="#pelaksanaan" data-toggle="tab">Pelaksanaan</a></li>
            <li><a href="#peserta" data-toggle="tab">Peserta</a></li>
            <li><a href="#pelaksana" data-toggle="tab">Pelaksana dan Fasilitator</a></li>
            <li><a href="#materi" data-toggle="tab">Materi</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="overview">
                <div class="control-group">
                    <label class="control-label" for="input01">Nama Program</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" name="name" value="<?php echo $program['name'] ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input02">Tahun Program</label>
                    <div class="controls">
                        <input type="text" class="input-mini" id="input02" name="tahun_program" value="<?php echo $program['tahun_program'] ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="kategori">Kategori Program</label>
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
            <div class="tab-pane" id="pelaksanaan">
                <div class="control-group">
                    <label class="control-label" for="tgl_mulai">Tanggal Mulai</label>
                    <div class="controls">
                        <input type="date" name="tanggal_mulai" id="tgl_mulai" value="<?php echo $program['tanggal_mulai'] ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="tgl_mulai">Tanggal Selesai</label>
                    <div class="controls">
                        <input type="date" name="tanggal_akhir" id="tgl_selesai" value="<?php echo $program['tanggal_akhir'] ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Lama Pendidikan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('lama_pendidikan',$program['lama_pendidikan']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Cara Pelaksanaan Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksanaan',$program['pelaksanaan']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Tempat Pelaksanaan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('tempat',$program['tempat']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="peserta">
                <div class="control-group">
                    <label class="control-label" for="jml_pes">Jumlah Peserta</label>
                    <div class="controls">
                        <div class="input-append">
                            <input type="text" class="input-mini" id="jml_pes" name="jumlah_peserta" value="<?php echo $program['jumlah_peserta'] ?>" /><span class="add-on">orang</span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Pesyaratan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pesyaratan',$program['persyaratan']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="pelaksana">
                <div class="control-group">
                    <label class="control-label">Pelaksana Penanggung Jawab Kegiatan</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('pelaksana',$program['pelaksana']) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Fasilitator</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('fasilitator',$program['fasilitator']) ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="materi">
                <div class="control-group">
                    <label class="control-label">Materi Diklat</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('materi',$program['materi']) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn">Ulangi</button>
        </div>
    </fieldset>
</form>
