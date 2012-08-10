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
<p align="center" class="lead">Saran/Evaluasi Peserta <?php echo strtoupper($program['name']) ?></p>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#kurikulum" data-toggle="tab">Kurikulum Diklat</a></li>
    <li><a href="#sarpras" data-toggle="tab">Sarana & Prasarana Diklat</a></li>
    <li><a href="#penyelenggaraan" data-toggle="tab">Penyelenggaraan Diklat</a></li>
    <li><a href="#manfaat" data-toggle="tab">Manfaat dari Program Diklat</a></li>
    <li><a href="#catering" data-toggle="tab">Pemakanan/Catering</a></li>
</ul>
<form id="form1" action="perencanaan/dashboard/insert_feedback_sarpras" method="post" class="form-horizontal">
    <fieldset>
        <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
        <div class="tab-content">
            <div class="tab-pane active" id="kurikulum">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="24%">Bahan Evaluasi</th>
                            <th width="24%">Kekurangan/Kelemahan</th>
                            <th width="24%">Alasan</th>
                            <th width="24%">Saran Konstruktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a.</td>
                            <td>Mata Pelajaran</td>
                            <td><textarea name="1a1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1a2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1a3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>Jam Pelajaran</td>
                            <td><textarea name="1b1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1b2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1b3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Kualitas Pembelajaran di Kelas</td>
                            <td><textarea name="1c1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1c2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1c3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>Kualitas Bahan Ajar</td>
                            <td><textarea name="1d1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1d2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1d3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>Kualitas Evaluasi Pembelajaran<br/>(Ujian Kelulusan Diklat)</td>
                            <td><textarea name="1e1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1e2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="1e3" cols="50" rows="2"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="sarpras">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="24%">Bahan Evaluasi</th>
                            <th width="24%">Kekurangan/Kelemahan</th>
                            <th width="24%">Alasan</th>
                            <th width="24%">Saran Konstruktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a.</td>
                            <td>Toilet (sebutkan lokasinya)</td>
                            <td><textarea name="2a1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2a2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2a3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>ATK Diklat (sebutkan apa)</td>
                            <td><textarea name="2b1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2b2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2b3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Asrama Diklat (sebutkan di asrama mana, A/B)</td>
                            <td><textarea name="2c1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2c2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2c3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>Gedung Olahraga</td>
                            <td><textarea name="2d1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2d2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2d3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>Tempat Ibadah</td>
                            <td><textarea name="2e1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2e2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2e3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>f.</td>
                            <td>Kamar (No berapa, di asrama mana)</td>
                            <td><textarea name="2f1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2f2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2f3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>g.</td>
                            <td>Ruang kelas (sebutkan kelas mana)</td>
                            <td><textarea name="2g1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2g2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2g3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>h.</td>
                            <td>Lab Komputer</td>
                            <td><textarea name="2h1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2h2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2h3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>i.</td>
                            <td>Lab Bahasa</td>
                            <td><textarea name="2i1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2i2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2i3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>j.</td>
                            <td>Perpustakaan</td>
                            <td><textarea name="2j1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2j2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2j3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>k.</td>
                            <td>Koperasi</td>
                            <td><textarea name="2k1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2k2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2k3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>l.</td>
                            <td>Fasilitas Internet</td>
                            <td><textarea name="2l1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2l2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="2l3" cols="50" rows="2"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="penyelenggaraan">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="4%">No</th>
                            <th width="24%">Bahan Evaluasi</th>
                            <th width="24%">Kekurangan/Kelemahan</th>
                            <th width="24%">Alasan</th>
                            <th width="24%">Saran Konstruktif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>a.</td>
                            <td>Efektifitas penyelenggaraan</td>
                            <td><textarea name="3a1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3a2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3a3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>b.</td>
                            <td>Kesesuaian pelaksanaan program dengan rencana awal</td>
                            <td><textarea name="3b1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3b2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3b3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>c.</td>
                            <td>Kesiapan Panitia</td>
                            <td><textarea name="3c1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3c2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3c3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>d.</td>
                            <td>Administrasi Diklat</td>
                            <td><textarea name="3d1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3d2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3d3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>e.</td>
                            <td>Pelayanan Terhadap peserta</td>
                            <td><textarea name="3e1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3e2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3e3" cols="50" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>f.</td>
                            <td>Kebersihan Lingkungan Diklat</td>
                            <td><textarea name="3f1" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3f2" cols="50" rows="2"></textarea></td>
                            <td><textarea name="3f3" cols="50" rows="2"></textarea></td>
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
                            <th width="4%">No</th>
                            <th width="24%">Bahan Evaluasi</th>
                            <th width="72%">Evaluasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>&nbsp</td>
                            <td>Kelebihan</td>
                            <td colspan="3"><textarea name="kelebihan_catering"  class="input-xxlarge" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td>&nbsp</td>
                            <td>Kekurangan</td>
                            <td colspan="3"><textarea name="kekurangan_catering"  class="input-xxlarge" rows="2"></textarea></td>
                        </tr>
                        <tr>
                            <td colspan="2">Keterangan</td>
                            <td colspan="3"><textarea name="keterangan"  class="input-xxlarge" rows="2"></textarea></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary btn-large">Simpan</button>
        </div>
    </fieldset>
</form>