<div class="row-fluid">
    <?php if($this->session->userdata('is_login')){ ?>
    <div>
    <a href="berita/" class="btn btn-mini btn-primary"><i class="icon-arrow-left icon-white"></i> Kembali</a>
    <a href="berita/edit_berita/<?php echo $berita['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
    <a href="berita/delete_berita/<?php echo $berita['id']?>"  class="btn btn-danger btn-mini"
    onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $berita['judul'] ?>?')">
        <i class="icon-trash"></i> Hapus</a>
    </div>
    <?php } ?>
        <h5><small><?php echo $this->date->konversi5($berita['tanggal']).', '.$berita['waktu'] ?></small></h5>
        <?php echo $berita['isi'] ?>
</div>