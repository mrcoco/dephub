<div class="row">
    <div class="span9"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<h2><?php echo $program['name'] ?></h2>
<div class="well-small">
    <a href="perencanaan/diklat/edit_diklat/<?php echo $program['id'] ?>" class="btn"><i class="icon-edit"></i> Ubah</a>
    <a href="perencanaan/diklat/delete_diklat/<?php echo $program['id'] ?>" class="btn btn-danger"
       onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $program['name'] ?>?')">
        <i class="icon-trash"></i> Hapus</a>
</div>
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
            <td width="20%">Jumlah Peserta</td><td><?php echo $program['jumlah_peserta'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_usia']==-1){
                $program['syarat_usia']='tidak ada';
            }?>
            <td>Syarat Usia</td><td><?php echo $program['syarat_usia'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_masa_kerja']==-1){
                $program['syarat_masa_kerja']='tidak ada';
            }?>
            <td>Syarat Masa Kerja</td><td><?php echo $program['syarat_masa_kerja'] ?></td>
        </tr>
        <tr>
            <?php if($program['syarat_pendidikan']==''){
                $program['syarat_pendidikan']='tidak ada';
            }?>
            <td>Syarat Pendidikan</td><td><?php echo $program['syarat_pendidikan'] ?></td>
        </tr>
        <tr>
            <?php $pil_pangkat=array(
                            ''=>'tidak ada',
                            'I/a'=>'Juru Muda - I/a','I/b'=>'Juru Muda Tkt. 1 - I/b','I/c'=>'Juru - I/c','I/d'=>'Juru Tkt. 1 - I/d',
                            'II/a'=>'Pengatur Muda - II/a','II/b'=>'Pengatur Muda Tkt. 1 - II/b','II/c'=>'Pengatur - II/c','II/d'=>'Pengatur Tkt. 1 - II/d',
                            'III/a'=>'Penata Muda - III/a', 'III/b'=>'Penata Muda Tkt. 1 - III/b', 'III/c'=>'Penata - III/c','III/d'=>'Penata - III/d',
                            'IV/a'=>'Pembina - IV/a','IV/b'=>'Pembina Tkt. 1 - IV/b','IV/c'=>'Pembina Utama Muda - IV/c','IV/d'=>'Pembina Utama Madya - IV/d','IV/e'=>'Pembina Utama - IV/e'
                            );
                        ?>
            <td>Syarat Pangkat/Gol</td><td><?php echo $pil_pangkat[$program['syarat_pangkat_gol']] ?></td>
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
                <a href="perencanaan/feedback/form_feedback_sarpras/<?php echo $program['id'] ?>"><i class="icon-plus-sign"></i> Tambah</a>
                <ul class="unstyled">
                <?php $this->lib_perencanaan->print_child_feedback($feedback, $program['id'], '<li>', '</li>', '')
                ?>
                </ul>
            </td>
        </tr>
    </tbody>
</table>