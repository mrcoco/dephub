<h2><?php echo $program['name'] ?></h2>
<div class="well-small">
<a href="perencanaan/dashboard/edit_diklat/<?php echo $program['id'] ?>"><i class="icon-edit"></i>Ubah</a>
<a href="perencanaan/dashboard/delete_diklat/<?php echo $program['id'] ?>"
   onclick="return confirm('Apakah Anda yakin ingin menghapus Diklat <?php echo $program['name']?>?')">
    <i class="icon-trash"></i>Hapus</a>
</div>
<div>Kategori : <?php echo $pil_kategori[$program['parent']] ?></div>
<div>Tanggal mulai : <?php echo $program['tanggal_mulai'] ?></div>
<div>Tanggal akhir : <?php echo $program['tanggal_akhir'] ?></div>
<div>Deskripsi : <?php echo $program['deskripsi'] ?></div>
<div>Tujuan : <?php echo $program['tujuan'] ?></div>
<div>Indikator : <?php echo $program['indikator'] ?></div>
<div>Pelaksanaan : <?php echo $program['pelaksanaan'] ?></div>
<div>Lama pendidikan : <?php echo $program['lama_pendidikan'] ?></div>
<div>Persyaratan : <?php echo $program['persyaratan'] ?></div>
<div>Materi : <?php echo $program['materi'] ?></div>
<div>Pelaksana : <?php echo $program['pelaksana'] ?></div>
<div>Fasilitator : <?php echo $program['fasilitator'] ?></div>
<div>Jumlah peserta : <?php echo $program['jumlah_peserta'] ?></div>
<div>Tempat : <?php echo $program['tempat'] ?></div>
<div>Tahun : <?php echo $program['tahun_program'] ?></div>
