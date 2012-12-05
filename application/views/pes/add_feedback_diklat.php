<script type="text/javascript">
$().ready(function() {    
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
    Evaluasi Kinerja Penyelenggaraan<br/>
    <?php echo $diklat['name'].' Tahun '.$program['tahun_program'].' Angkatan '.$program['angkatan'] ?>
</p>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#kurikulum" data-toggle="tab">Kurikulum Diklat</a></li>
    <li><a href="#sarpras" data-toggle="tab">Sarana & Prasarana Diklat</a></li>
    <li><a href="#penyelenggaraan" data-toggle="tab">Penyelenggaraan Diklat</a></li>
    <li><a href="#manfaat" data-toggle="tab">Manfaat dari Program Diklat</a></li>
    <li><a href="#catering" data-toggle="tab">Pemakanan/Catering</a></li>
</ul>
<form id="form1" action="pes/front/insert_feedback_diklat" method="post" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
        <div class="tab-content">
            <div class="tab-pane active" id="kurikulum">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Bahan Evaluasi</th>
                            <th width="45%">Evaluasi</th>
                            <th width="25%">Saran Konstruktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a.</td>
                            <td>Mata Pelajaran</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="1a" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="1a" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="1a" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="1a" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="1a" value="60">Kurang Sekali</label>
                            </td>
                            <td rowspan="5"><textarea name="saran_kurikulum" style="width:90%;height:90%"></textarea></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>Jam Pelajaran</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="1b" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="1b" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="1b" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="1b" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="1b" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Kualitas Pembelajaran di Kelas</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="1c" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="1c" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="1c" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="1c" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="1c" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>Kualitas Bahan Ajar</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="1d" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="1d" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="1d" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="1d" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="1d" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>Kualitas Evaluasi Pembelajaran<br/>(Ujian Kelulusan Diklat)</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="1e" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="1e" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="1e" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="1e" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="1e" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="sarpras">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Bahan Evaluasi</th>
                            <th width="45%">Evaluasi</th>
                            <th width="25%">Saran Konstruktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a.</td>
                            <td>Toilet</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2a" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2a" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2a" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2a" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2a" value="60">Kurang Sekali</label>
                            </td>
                            <td rowspan="12"><textarea name="saran_sarpras" style="width:90%;height:90%"></textarea></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>ATK Diklat</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2b" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2b" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2b" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2b" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2b" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Asrama Diklat</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2c" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2c" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2c" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2c" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2c" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>Gedung Olahraga</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2d" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2d" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2d" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2d" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2d" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>Tempat Ibadah</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2e" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2e" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2e" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2e" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2e" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>f.</td>
                            <td>Kamar</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2f" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2f" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2f" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2f" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2f" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>g.</td>
                            <td>Ruang kelas</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2g" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2g" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2g" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2g" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2g" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>h.</td>
                            <td>Lab Komputer</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2h" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2h" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2h" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2h" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2h" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>i.</td>
                            <td>Lab Bahasa</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2i" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2i" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2i" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2i" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2i" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>j.</td>
                            <td>Perpustakaan</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2j" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2j" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2j" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2j" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2j" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>k.</td>
                            <td>Koperasi</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2k" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2k" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2k" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2k" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2k" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>l.</td>
                            <td>Fasilitas Internet</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="2l" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="2l" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="2l" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="2l" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="2l" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="penyelenggaraan">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="25%">Bahan Evaluasi</th>
                            <th width="45%">Evaluasi</th>
                            <th width="25%">Saran Konstruktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a.</td>
                            <td>Efektifitas penyelenggaraan</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3a" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3a" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3a" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3a" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3a" value="60">Kurang Sekali</label>
                            </td>
                            <td rowspan="8"><textarea name="saran_penyelenggaraan" style="width:90%;height:90%"></textarea></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>Kesesuaian pelaksanaan program dengan rencana awal</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3b" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3b" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3b" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3b" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3b" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Kesiapan Panitia</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3c" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3c" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3c" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3c" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3c" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>Administrasi Diklat</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3d" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3d" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3d" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3d" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3d" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>Pelayanan Terhadap peserta</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3e" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3e" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3e" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3e" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3e" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>f.</td>
                            <td>Kebersihan Lingkungan Diklat</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3f" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3f" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3f" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3f" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3f" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>g.</td>
                            <td>Manfaat dari program Diklat</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3g" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3g" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3g" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3g" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3g" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>f.</td>
                            <td>Keamanan Lingkungan Diklat</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="3h" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="3h" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="3h" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="3h" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="3h" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="manfaat">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="5">MANFAAT DARI PROGRAM DIKLAT DI KANTOR ANDA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="5"><textarea name="manfaat"  class="input-xxlarge" rows="3"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="catering">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">EVALUASI DAN SARAN UNTUK CATERING</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Evaluasi</td>
                            <td>
                                <label class="radio inline"><input type="radio" name="catering" value="100">Baik Sekali</label>
                                <label class="radio inline"><input type="radio" name="catering" value="90">Baik</label>
                                <label class="radio inline"><input type="radio" name="catering" value="80">Cukup</label>
                                <label class="radio inline"><input type="radio" name="catering" value="70">Kurang</label>
                                <label class="radio inline"><input type="radio" name="catering" value="60">Kurang Sekali</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Saran</td>
                            <td><textarea name="saran_catering"  class="input-xxlarge" rows="3"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" onclick="return confirm('Apakah Anda yakin telah mengisi seluruh evaluasi diklat?')" class="btn btn-primary btn-large" value="Simpan"/>
            <input type="button" class="btn btn-large" value="Cancel" onclick="history.go(-1)" />
        </div>
    </fieldset>
</form>