<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $program['name'] ?></h2>
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
        <tr>
            <td width="20%">Tujuan Kurikuler</td><td><?php echo $program['tujuan'] ?></td>
        </tr>
        <tr>
            <td>Indikator Keluaran</td><td><?php echo $program['indikator'] ?></td>
        </tr>
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
        <tr>
            <td width="20%">Jumlah Peserta</td><td><?php echo $program['jumlah_peserta'] ?></td>
        </tr>
        <tr>
            <td>Persyaratan</td><td><?php echo $program['persyaratan'] ?></td>
        </tr>
        <tr>
            <td width="20%">Pelaksana Penanggung Jawab Kegiatan</td><td><?php echo $program['pelaksana'] ?></td>
        </tr>
        <tr>
            <td>Fasilitator</td><td><?php echo $program['fasilitator'] ?></td>
        </tr>
        <tr>
            <td>Materi</td><td><?php echo $program['materi'] ?></td>
        </tr>
        <tr>
            <td>Feedback Sarana Prasarana</td>
            <td>
                <ul class="unstyled">
                <?php $this->lib_perencanaan->print_child_feedback($feedback, $program['id'], '<li>', '</li>', '')
                ?>
                </ul>
            </td>
        </tr>
    </tbody>
</table>