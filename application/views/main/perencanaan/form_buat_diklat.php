<form method="post" action="perencanaan/dashboard/insert_diklat" class="form-horizontal">
    <fieldset>
        <legend>Form Pembuatan Diklat Baru</legend>
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
                    <label class="control-label" for="input01">Nama</label>
                    <div class="controls">
                        <input type="text" class="input-xlarge" id="input01" name="name" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input02">Tahun program</label>
                    <div class="controls">
                        <input type="text" class="input-mini" id="input02" name="tahun_program" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input03">Kategori</label>
                    <div class="controls">
                        <?php echo form_dropdown('kategori', $pil_kategori) ?>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="input04">Deskripsi</label>
                    <div class="controls">
                        <?php echo $this->editor->textarea('deskripsi') ?>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tujuan">
                <div>Tujuan : <?php echo $this->editor->textarea('tujuan') ?></div>
                <div>Indikator : <?php echo $this->editor->textarea('indikator') ?></div>
            </div>
            <div class="tab-pane" id="pelaksanaan">
                <div>Tanggal mulai : <input type="date" name="tanggal_mulai"/></div>
                <div>Tanggal selesai : <input type="date" name="tanggal_akhir"/></div>
                <div>Lama pendidikan : <?php echo $this->editor->textarea('lama_pendidikan') ?></div>
                <div>Cara Pelaksanaan Kegiatan: <?php echo $this->editor->textarea('pelaksanaan') ?></div>
                <div>Tempat : <?php echo $this->editor->textarea('tempat') ?></div>
            </div>
            <div class="tab-pane" id="peserta">
                <div>Jumlah peserta : <input type="text" name="jumlah_peserta"/></div>
                <div>Persyaratan : <?php echo $this->editor->textarea('persyaratan') ?></div>
            </div>
            <div class="tab-pane" id="pelaksana">
                <div>Pelaksana : <?php echo $this->editor->textarea('pelaksana') ?></div>
                <div>Fasilitator : <?php echo $this->editor->textarea('fasilitator') ?></div>
            </div>
            <div class="tab-pane" id="materi">
                <div>Materi : <?php echo $this->editor->textarea('materi') ?></div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn">Ulangi</button>
        </div>
    </fieldset>
</form>
