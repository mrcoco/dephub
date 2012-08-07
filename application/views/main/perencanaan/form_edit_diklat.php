Form Pembuatan Diklat Baru
<form method="post" action="perencanaan/dashboard/insert_diklat">
    <div>Nama : <input type="text" name="name" value="<?php echo $program['name'] ?>"/></div>
    <div>Kategori : <?php echo form_dropdown('kategori', $pil_kategori, $program['parent']) ?></div>
    <div>Tanggal mulai : <input type="date" name="tanggal_mulai" value="<?php echo $program['tanggal_mulai'] ?>"/></div>
    <div>Tanggal selesai : <input type="date" name="tanggal_akhir" value="<?php echo $program['tanggal_akhir'] ?>"/></div>
    <div>Deskripsi : <?php echo $this->editor->textarea('deskripsi',$program['deskripsi']) ?></div>
    <div>Tujuan : <?php echo $this->editor->textarea('tujuan') ?></div>
    <div>Indikator : <?php echo $this->editor->textarea('indikator') ?></div>
    <div>Pelaksanaan : <?php echo $this->editor->textarea('pelaksanaan') ?></div>
    <div>Lama pendidikan : <?php echo $this->editor->textarea('lama_pendidikan') ?></div>
    <div>Persyaratan : <?php echo $this->editor->textarea('persyaratan') ?></div>
    <div>Materi : <?php echo $this->editor->textarea('materi') ?></div>
    <div>Pelaksana : <?php echo $this->editor->textarea('pelaksana') ?></div>
    <div>Fasilitator : <?php echo $this->editor->textarea('fasilitator') ?></div>
    <div>Jumlah peserta : <input type="text" name="jumlah_peserta"/></div>
    <div>Tempat : <?php echo $this->editor->textarea('tempat') ?></div>
    <div>Tahun program : <input type="text" name="tahun_program"/></div>
    <div><input type="submit" value="Simpan"></div>
</form>
