<h2><?php echo $program['name'] ?></h2>
<div class="well-small">
    <a href="perencanaan/dashboard/edit_diklat/<?php echo $program['id'] ?>"><i class="icon-edit"></i>Ubah</a>
    <a href="perencanaan/dashboard/delete_diklat/<?php echo $program['id'] ?>"
       onclick="return confirm('Apakah Anda yakin ingin menghapus Diklat <?php echo $program['name'] ?>?')">
        <i class="icon-trash"></i>Hapus</a>
</div>
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
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td width="20%">Tahun Program</td><td><?php echo $program['tahun_program'] ?></td>
                </tr>
                <tr>
                    <td>Kategori Program</td><td><?php echo $pil_kategori[$program['parent']] ?></td>
                </tr>
                <tr>
                    <td>Deskripsi Singkat</td><td><?php echo $program['deskripsi'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="tab-pane" id="tujuan">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td width="20%">Tujuan Kurikuler</td><td><?php echo $program['tujuan'] ?></td>
                </tr>
                <tr>
                    <td>Indikator Keluaran</td><td><?php echo $program['indikator'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="tab-pane" id="pelaksanaan">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td width="20%">Cara Pelaksanaan Kegiatan</td><td><?php echo $program['pelaksanaan'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Mulai</td><td><?php echo $program['tanggal_mulai'] ?></td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td><td><?php echo $program['tanggal_akhir'] ?></td>
                </tr>
                <tr>
                    <td>Lama Pendidikan</td><td><?php echo $program['lama_pendidikan'] ?></td>
                </tr>
                <tr>
                    <td>Tempat Pelaksanaan</td><td><?php echo $program['tempat'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="tab-pane" id="peserta">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td width="20%">Jumlah Peserta</td><td><?php echo $program['jumlah_peserta'] ?></td>
                </tr>
                <tr>
                    <td>Persyaratan</td><td><?php echo $program['persyaratan'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="tab-pane" id="pelaksana">
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td width="20%">Pelaksana Penanggung Jawab Kegiatan</td><td><?php echo $program['pelaksana'] ?></td>
                </tr>
                <tr>
                    <td>Fasilitator</td><td><?php echo $program['fasilitator'] ?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <div class="tab-pane" id="materi">
        <table class="table table-striped">
            <tbody>
            <td>Materi</td><td><?php echo $program['materi'] ?></td>
            </tr>
            </tbody>
        </table>

    </div>
</div>