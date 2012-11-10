<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $program['name'] ?></h2>
<?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
<div class="well-small">
    <a href="program/buat_program/<?php echo $program['id'] ?>" class="btn"><i class="icon-plus"></i> Buka program</a>
    <a href="diklat/edit_diklat/<?php echo $program['id'] ?>" class="btn"><i class="icon-edit"></i> Ubah</a>
    <a href="diklat/delete_diklat/<?php echo $program['id'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $program['name'] ?>?')"><i class="icon-trash"></i> Hapus</a>
</div>
<?php } ?>
<table class="table table-striped">
    <tbody>
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
            <td>Lama Pendidikan</td><td><?php echo $program['lama_pendidikan'] ?></td>
        </tr>
        <tr>
            <td>Jumlah peserta</td><td><?php echo $program['jumlah_peserta'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_usia']==-1||$program['syarat_usia']==0){
                $program['syarat_usia']='-';
            }?>
            <td>Syarat Usia</td><td><?php echo $program['syarat_usia'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_masa_kerja']==-1||$program['syarat_masa_kerja']==0){
                $program['syarat_masa_kerja']='-';
            }?>
            <td>Syarat Masa Kerja</td><td><?php echo $program['syarat_masa_kerja'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_pendidikan']==''){
                $program['syarat_pendidikan']='-';
            }?>
            <td>Syarat Pendidikan</td><td><?php echo $pil_pendidikan[$program['syarat_pendidikan']] ?></td>
        </tr>
        <tr>
            <td>Syarat Pangkat/Gol</td><td><?php echo $pil_pangkat[$program['syarat_pangkat_gol']] ?></td>
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