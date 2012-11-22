
<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<table width="100%" class="table table-striped table-bordered table-condensed">
    <thead>
        <tr>
            <th width="50%">Judul</th>
            <th width="50%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if($about){
        foreach($about as $a) {?>
        <tr>
            <td><?php echo $a['judul'] ?></td>
            <td>
                <a href='about/profil/<?php echo $a['id']?>' class='btn btn-mini'><i class="icon-zoom-in"></i> Lihat</a>
                <a href="settings/edit_profil/<?php echo $a['id']?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                <a href="settings/delete_profil/<?php echo $a['id']?>"  class="btn btn-danger btn-mini"
                onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $a['judul'] ?>?')">
                    <i class="icon-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php }        
        }else{?>
        <tr>
            <td colspan="2">Tidak ada data</td>
        </tr>
        <?php } ?>    
    </tbody>
</table>

<div class="form-actions">
    <a href="settings/add_profil" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i>Tambah</a>
</div>