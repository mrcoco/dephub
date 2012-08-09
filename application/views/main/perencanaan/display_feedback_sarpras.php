<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<p align="center" class="lead">Saran/Evaluasi Peserta <?php echo strtoupper($program['name']) ?></p>
<div class="well-small">
    <a href="perencanaan/dashboard/edit_feedback_sarpras/<?php echo $program['id'] ?>"><i class="icon-edit"></i>Ubah</a>
    <a href="perencanaan/dashboard/delete_feedback_sarpras/<?php echo $program['id'] ?>"
       onclick="return confirm('Apakah Anda yakin ingin menghapus Evaluasi <?php echo $program['name'] ?>?')">
        <i class="icon-trash"></i>Hapus</a>
</div>
<ul class="nav nav-tabs" id="myTab">
    <li class="active"><a href="#kurikulum" data-toggle="tab">Kurikulum Diklat</a></li>
    <li><a href="#sarpras" data-toggle="tab">Sarana & Prasarana Diklat</a></li>
    <li><a href="#penyelenggaraan" data-toggle="tab">Penyelenggaraan Diklat</a></li>
    <li><a href="#manfaat" data-toggle="tab">Manfaat dari Program Diklat</a></li>
    <li><a href="#catering" data-toggle="tab">Pemakanan/Catering</a></li>
</ul>
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
                    <td><?php echo $f1a[0] ?></td>
                    <td><?php echo $f1a[1] ?></td>
                    <td><?php echo $f1a[2] ?></td>
                </tr>
                <tr>
                    <td>b.</td>
                    <td>Jam Pelajaran</td>
                    <td><?php echo $f1b[0] ?></td>
                    <td><?php echo $f1b[1] ?></td>
                    <td><?php echo $f1b[2] ?></td>
                </tr>
                <tr>
                    <td>c.</td>
                    <td>Kualitas Pembelajaran di Kelas</td>
                    <td><?php echo $f1c[0] ?></td>
                    <td><?php echo $f1c[1] ?></td>
                    <td><?php echo $f1c[2] ?></td>
                </tr>
                <tr>
                    <td>d.</td>
                    <td>Kualitas Bahan Ajar</td>
                    <td><?php echo $f1d[0] ?></td>
                    <td><?php echo $f1d[1] ?></td>
                    <td><?php echo $f1d[2] ?></td>
                </tr>
                <tr>
                    <td>e.</td>
                    <td>Kualitas Evaluasi Pembelajaran<br/>(Ujian Kelulusan Diklat)</td>
                    <td><?php echo $f1e[0] ?></td>
                    <td><?php echo $f1e[1] ?></td>
                    <td><?php echo $f1e[2] ?></td>
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
                    <td><?php echo $f2a[0] ?></td>
                    <td><?php echo $f2a[1] ?></td>
                    <td><?php echo $f2a[2] ?></td>
                </tr>
                <tr>
                    <td>b.</td>
                    <td>ATK Diklat (sebutkan apa)</td>
                    <td><?php echo $f2b[0] ?></td>
                    <td><?php echo $f2b[1] ?></td>
                    <td><?php echo $f2b[2] ?></td>
                </tr>
                <tr>
                    <td>c.</td>
                    <td>Asrama Diklat (sebutkan di asrama mana, A/B)</td>
                    <td><?php echo $f2c[0] ?></td>
                    <td><?php echo $f2c[1] ?></td>
                    <td><?php echo $f2c[2] ?></td>
                </tr>
                <tr>
                    <td>d.</td>
                    <td>Gedung Olahraga</td>
                    <td><?php echo $f2d[0] ?></td>
                    <td><?php echo $f2d[1] ?></td>
                    <td><?php echo $f2d[2] ?></td>
                </tr>
                <tr>
                    <td>e.</td>
                    <td>Tempat Ibadah</td>
                    <td><?php echo $f2e[0] ?></td>
                    <td><?php echo $f2e[1] ?></td>
                    <td><?php echo $f2e[2] ?></td>
                </tr>
                <tr>
                    <td>f.</td>
                    <td>Kamar (No berapa, di asrama mana)</td>
                    <td><?php echo $f2f[0] ?></td>
                    <td><?php echo $f2f[1] ?></td>
                    <td><?php echo $f2f[2] ?></td>
                </tr>
                <tr>
                    <td>g.</td>
                    <td>Ruang kelas (sebutkan kelas mana)</td>
                    <td><?php echo $f2g[0] ?></td>
                    <td><?php echo $f2g[1] ?></td>
                    <td><?php echo $f2g[2] ?></td>
                </tr>
                <tr>
                    <td>h.</td>
                    <td>Lab Komputer</td>
                    <td><?php echo $f2h[0] ?></td>
                    <td><?php echo $f2h[1] ?></td>
                    <td><?php echo $f2h[2] ?></td>
                </tr>
                <tr>
                    <td>i.</td>
                    <td>Lab Bahasa</td>
                    <td><?php echo $f2i[0] ?></td>
                    <td><?php echo $f2i[1] ?></td>
                    <td><?php echo $f2i[2] ?></td>
                </tr>
                <tr>
                    <td>j.</td>
                    <td>Perpustakaan</td>
                    <td><?php echo $f2j[0] ?></td>
                    <td><?php echo $f2j[1] ?></td>
                    <td><?php echo $f2j[2] ?></td>
                </tr>
                <tr>
                    <td>k.</td>
                    <td>Koperasi</td>
                    <td><?php echo $f2k[0] ?></td>
                    <td><?php echo $f2k[1] ?></td>
                    <td><?php echo $f2k[2] ?></td>
                </tr>
                <tr>
                    <td>l.</td>
                    <td>Fasilitas Internet</td>
                    <td><?php echo $f2l[0] ?></td>
                    <td><?php echo $f2l[1] ?></td>
                    <td><?php echo $f2l[2] ?></td>
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
                    <td><?php echo $f3a[0] ?></td>
                    <td><?php echo $f3a[1] ?></td>
                    <td><?php echo $f3a[2] ?></td>
                </tr>
                <tr>
                    <td>b.</td>
                    <td>Kesesuaian pelaksanaan program dengan rencana awal</td>
                    <td><?php echo $f3b[0] ?></td>
                    <td><?php echo $f3b[1] ?></td>
                    <td><?php echo $f3b[2] ?></td>
                </tr>
                <tr>
                    <td>c.</td>
                    <td>Kesiapan Panitia</td>
                    <td><?php echo $f3c[0] ?></textarea></td>
                    <td><?php echo $f3c[1] ?></td>
                    <td><?php echo $f3c[2] ?></td>
                </tr>
                <tr>
                    <td>d.</td>
                    <td>Administrasi Diklat</td>
                    <td><?php echo $f3d[0] ?></td>
                    <td><?php echo $f3d[1] ?></td>
                    <td><?php echo $f3d[2] ?></td>
                </tr>
                <tr>
                    <td>e.</td>
                    <td>Pelayanan Terhadap peserta</td>
                    <td><?php echo $f3e[0] ?></td>
                    <td><?php echo $f3e[1] ?></td>
                    <td><?php echo $f3e[2] ?></td>
                </tr>
                <tr>
                    <td>f.</td>
                    <td>Kebersihan Lingkungan Diklat</td>
                    <td><?php echo $f3f[0] ?></td>
                    <td><?php echo $f3f[1] ?></td>
                    <td><?php echo $f3f[2] ?></td>
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
                    <td colspan="4"><?php echo $manfaat ?></td>
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
                    <td colspan="3"><?php echo $kelebihan_catering ?></td>
                </tr>
                <tr>
                    <td>&nbsp</td>
                    <td>Kekurangan</td>
                    <td colspan="3"><?php echo $kekurangan_catering ?></td>
                </tr>
                <tr>
                    <td colspan="2">Keterangan</td>
                    <td colspan="3"><?php echo $keterangan ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>