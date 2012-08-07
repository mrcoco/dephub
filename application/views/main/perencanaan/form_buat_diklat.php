Form Pembuatan Diklat Baru
<form method="post" action="">
    <div>Nama : <input type="text" name="name"/></div>
    <div>Kategori : <?php echo form_dropdown('kategori', $pil_kategori) ?></div>
    <div>Tanggal mulai : <input type="date" name="tanggal_mulai"/></div>
    <div>Tanggal selesai : <input type="date" name="tanggal_akhir"/></div>
    <div>Deskripsi : <?php echo $this->editor->textarea('deskripsi') ?></div>
    <div>Tujuan : <?php echo $this->editor->textarea('tujuan') ?></div>
    <div>Indikator : <?php echo $this->editor->textarea('indikator') ?></div>
    <div>Pelaksanaan : <?php echo $this->editor->textarea('pelaksanaan') ?></div>
    <div>Lama pendidikan : <?php echo $this->editor->textarea('lama_pendidikan') ?></div>
    <div>Persyaratan : <?php echo $this->editor->textarea('persyaratan') ?></div>
    <div>Materi : <?php echo $this->editor->textarea('materi') ?></div>
    <div>Pelaksana : <?php echo $this->editor->textarea('pelaksana') ?></div>
</form>
