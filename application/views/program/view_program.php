<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $diklat['name'] . ' Angkatan '.$program['angkatan'] ?></h2>
<?php if($this->session->userdata('id_role')==1 || $this->session->userdata('id_role')==3){?>
<div class="well-small">
    <a href="<?php echo base_url()?>program/edit_program/<?php echo $program['id'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
    <a href="<?php echo base_url()?>program/delete_program/<?php echo $program['id'] ?>" class="btn btn-mini btn-danger"
       onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $program['name'] ?>?')">
        <i class="icon-trash"></i> Hapus</a>
</div>
<?php } ?>
<table class="table table-striped">
    <tbody>
        <tr>
            <th width="30%">Tahun Program</th><td><?php echo $program['tahun_program'] ?></td>
        </tr>
        <tr>
            <th>Tanggal Pelaksanaan</th><td><?php echo $this->date->konversi5($program['tanggal_mulai']) ?> s/d <?php echo $this->date->konversi5($program['tanggal_akhir']) ?></td>
        </tr>
        <tr>
        <tr>
            <th>Jumlah Peserta</th><td><?php echo $diklat['jumlah_peserta'] ?></td>
        </tr>
        <tr>
            <?php if($diklat['syarat_usia']==-1||$diklat['syarat_usia']==0){
                $diklat['syarat_usia']='tidak ada';
            }?>
            <th>Syarat Usia</th><td><?php echo $diklat['syarat_usia'] ?></td>
        </tr>
        <tr>
            <?php if($diklat['syarat_masa_kerja']==-1||$diklat['syarat_masa_kerja']==0){
                $diklat['syarat_masa_kerja']='tidak ada';
            }?>
            <th>Syarat Masa Kerja</th><td><?php echo $diklat['syarat_masa_kerja'] ?></td>
        </tr>
        <tr>
            <th>Syarat Pendidikan</th>
            <td>
            <?php if($diklat['syarat_pendidikan']>0){
                echo $pil_pangkat[$diklat['syarat_pendidikan']];
            }else{
                echo 'tidak ada';
            }?>
            </td>
        </tr>
        <tr>
            <th>Syarat Pangkat/Gol</th>
            <td>
            <?php if($diklat['syarat_pangkat_gol']>0){
                echo $pil_pangkat[$diklat['syarat_pangkat_gol']];
            }else{
                echo 'tidak ada';
            }?>
            </td>
        </tr>
        <tr>
            <th>Kelas</th>
            <td>
            <?php if($program['kelas']>0){
                if(array_key_exists($program['kelas'], $kelas)){
                    echo $kelas[$program['kelas']];
                }else{
                    echo 'Kelas tidak valid karena perubahan jumlah peserta';
                }
            }else{
                echo 'tidak ada';
            }?>
            </td>
        </tr>
        <tr>
            <th>Alokasi asrama</th>
            <td>
            <?php if($pil_asrama){?>
                <ul>
                <?php foreach($pil_asrama as $as){?>
                <li><?php echo $as?></li>
                <?php }?>
                </ul>
            <?php }else{
                echo 'tidak ada';
            }?>
            </td>
        </tr>
        <tr>
            <th>Materi</th>
            <td>
                <ul>
                <?php foreach($materi as $m){?>
                    <li><a target="_blank" class="tip-right" title="Klik untuk detail" href="materi/view/<?php echo $m['id'] ?>"><?php echo $m['judul']?></a></li>
                <?php }?>
                </ul>
            </td>
        </tr>
        <tr>
            <th>Deskripsi Singkat</th><td><?php echo $diklat['deskripsi'] ?></td>
        </tr>
        <tr>
            <th>Tujuan Kurikuler</th><td><?php echo $diklat['tujuan'] ?></td>
        </tr>
        <tr>
            <th>Indikator Keluaran</th><td><?php echo $diklat['indikator'] ?></td>
        </tr>
        </tr>
            <th>Lama Pendidikan</th><td><?php echo $program['lama_pendidikan'] ?></td>
        </tr>
        <tr>
            <th>Tempat Pelaksanaan</th><td><?php echo $program['tempat'] ?></td>
        </tr>
        <tr>
            <th>Cara Pelaksanaan Kegiatan</th><td><?php echo $program['pelaksanaan'] ?></td>
        </tr>
        <tr>
            <th>Pelaksana Penanggung Jawab Kegiatan</th><td><?php echo $program['pelaksana'] ?></td>
        </tr>
        <tr>
            <th>Fasilitator</th><td><?php echo $program['fasilitator'] ?></td>
    </tbody>
</table>