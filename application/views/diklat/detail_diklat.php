<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $program['name'] ?></h2>
<?php if($this->session->userdata('id_role')==1||$this->session->userdata('id_role')==3){ ?>
<div class="well-small">
    <a href="program/buat_program/<?php echo $program['id'] ?>" class="btn btn-mini"><i class="icon-plus"></i> Buka program</a>
    <a href="diklat/edit_diklat/<?php echo $program['id'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
    <a href="diklat/delete_diklat/<?php echo $program['id'] ?>" class="btn btn-mini btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $program['name'] ?>?')"><i class="icon-trash"></i> Hapus</a>
</div>
<?php } ?>
<table class="table table-striped">
    <tbody>
        <tr>
            <th width="30%">Kategori Program</th><td><?php echo $pil_kategori[$program['parent']] ?></td>
        </tr>
        <tr>
            <th>Jumlah peserta</th><td><?php echo $program['jumlah_peserta'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_usia']==-1||$program['syarat_usia']==0){
                $program['syarat_usia']='tidak ada';
            }?>
            <th>Syarat Usia</th><td><?php echo $program['syarat_usia'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_masa_kerja']==-1||$program['syarat_masa_kerja']==0){
                $program['syarat_masa_kerja']='tidak ada';
            }?>
            <th>Syarat Masa Kerja</th><td><?php echo $program['syarat_masa_kerja'] ?></td>
        </tr>
        <tr>
            <th>Syarat Pendidikan</th>
            <td>
            <?php if($program['syarat_pendidikan']>0){
                echo $pil_pendidikan[$program['syarat_pendidikan']];
            }else{
                echo 'tidak ada';
            }?>
            </td>
        </tr>
        <tr>
            <th>Syarat Pangkat/Gol</th>
            <td>
            <?php if($program['syarat_pangkat_gol']>0){
                echo $pil_pangkat[$program['syarat_pangkat_gol']];
            }else{
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
            <th>Deskripsi Singkat</th><td><?php echo $program['deskripsi'] ?></td>
        </tr>
        <tr>
            <th>Tujuan Kurikuler</th><td><?php echo $program['tujuan'] ?></td>
        </tr>
        <tr>
            <th>Indikator Keluaran</th><td><?php echo $program['indikator'] ?></td>
        </tr>
    </tbody>
</table>