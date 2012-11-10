<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $diklat['name'] . ' Angkatan '.$program['angkatan'] ?></h2>
<?php if($this->session->userdata('id_role')==1 || $this->session->userdata('id_role')==3){?>
<div class="well-small">
    <a href="<?php echo base_url()?>program/edit_program/<?php echo $program['id'] ?>" class="btn"><i class="icon-edit"></i> Ubah</a>
    <a href="<?php echo base_url()?>program/delete_program/<?php echo $program['id'] ?>" class="btn btn-danger"
       onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $program['name'] ?>?')">
        <i class="icon-trash"></i> Hapus</a>
</div>
<?php } ?>
<table class="table table-striped">
    <tbody>
        <tr>
            <td width="20%">Tahun Program</td><td><?php echo $program['tahun_program'] ?></td>
        </tr>
        <tr>
            <td>Deskripsi Singkat</td><td><?php echo $diklat['deskripsi'] ?></td>
        </tr>
        <tr>
            <td width="20%">Tujuan Kurikuler</td><td><?php echo $diklat['tujuan'] ?></td>
        </tr>
        <tr>
            <td>Indikator Keluaran</td><td><?php echo $diklat['indikator'] ?></td>
        </tr>
        <tr>
            <td width="20%">Cara Pelaksanaan Kegiatan</td><td><?php echo $program['pelaksanaan'] ?></td>
        </tr>
        <tr>
            <td>Tanggal Mulai</td><td><?php echo $this->date->konversi5($program['tanggal_mulai']) ?></td>
        </tr>
        <tr>
            <td>Tanggal Selesai</td><td><?php echo $this->date->konversi5($program['tanggal_akhir']) ?></td>
        </tr>
        <tr>
            <td>Lama Pendidikan</td><td><?php echo $program['lama_pendidikan'] ?></td>
        </tr>
        <tr>
            <td>Tempat Pelaksanaan</td><td><?php echo $program['tempat'] ?></td>
        </tr>
        <tr>
            <td width="20%">Jumlah Peserta</td><td><?php echo $diklat['jumlah_peserta'] ?></td>
        </tr>
        <tr>
            <?php if($diklat['syarat_usia']==-1||$diklat['syarat_usia']==0){
                $diklat['syarat_usia']='tidak ada';
            }?>
            <td>Syarat Usia</td><td><?php echo $diklat['syarat_usia'] ?></td>
        </tr>
        <tr>
            <?php if($diklat['syarat_masa_kerja']==-1||$diklat['syarat_masa_kerja']==0){
                $diklat['syarat_masa_kerja']='tidak ada';
            }?>
            <td>Syarat Masa Kerja</td><td><?php echo $diklat['syarat_masa_kerja'] ?></td>
        </tr>
        <tr>
            <td>Syarat Pendidikan</td><td><?php echo $pil_pendidikan[$diklat['syarat_pendidikan']] ?></td>
        </tr>
        <tr>
            <td>Syarat Pangkat/Gol</td><td><?php echo $pil_pangkat[$diklat['syarat_pangkat_gol']] ?></td>
        </tr>
        <tr>
            <td width="20%">Pelaksana Penanggung Jawab Kegiatan</td><td><?php echo $program['pelaksana'] ?></td>
        </tr>
        <tr>
            <td>Fasilitator</td><td><?php echo $program['fasilitator'] ?></td>
        </tr>
        <tr>
            <td>Kelas</td><td><?php echo $kelas[$program['kelas']] ?></td>
        </tr>
        <tr>
            <td>Materi</td>
            <td>
                <ul>
                <?php foreach($materi as $m){?>
                    <li><?php echo $m['judul']?></li>
                <?php }?>
                </ul>
            </td>
        </tr>
    </tbody>
</table>