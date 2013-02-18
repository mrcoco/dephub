
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table id="list" width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="3%">No</th>
            <th width="50%">Judul</th>
            <th width="20%">Diperbarui</th>
            <th width="27%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if($berita){ $i=1;
        foreach($berita as $a) {?>
        <tr>
            <td><?php echo $i++; ?>
            <td><a href='berita/view/<?php echo $a['id']?>' class='tip-right' title="klik untuk lihat"><?php echo $a['judul'] ?></a></td>
            <td><?php echo $this->date->konversi5($a['tanggal']).', '.$a['waktu'] ?></td>
            <td>
                <a href='berita/view/<?php echo $a['id']?>' class='btn btn-mini'><i class="icon-zoom-in"></i> Lihat</a>
                <a href="berita/edit_berita/<?php echo $a['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                <a href="berita/delete_berita/<?php echo $a['id']?>"  class="btn btn-danger btn-mini"
                onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $a['judul'] ?>?')">
                    <i class="icon-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php }        
        }else{?>
        <tr>
            <td colspan="4">Tidak ada data</td>
        </tr>
        <?php } ?>    
    </tbody>
</table>

<div class="form-actions">
    <a href="berita/add_berita" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Tambah</a>
</div>