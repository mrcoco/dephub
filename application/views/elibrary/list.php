<?php if ($this->uri->segment(3)=='list_category') {
    $item='categoryname';
    $id='idcategory';
    $edit='elibrary/admin/edit_category/';
    $delete='elibrary/admin/delete_category/';
    $label="Kategori";
}
else if ($this->uri->segment(3)=='list_author') {
    $item='authorname';
    $id='idauthor';
    $edit='elibrary/admin/edit_author/';
    $delete='elibrary/admin/delete_author/';
    $label="Pengarang";
}
else if ($this->uri->segment(3)=='list_user') {
    $item='nama';
    $id='id';
    $edit='#';
    $delete='#';
    $label="Anggota";
}
?>
                        <div class="row-fluid">
                            <?php $this->session->flashdata('msg'); ?>
                        </div>  
        <h6>Note: <?php echo $label;?> tidak bisa dihapus apabila masih ada file/buku yang terhubung</h6>
        <table class="table table-condensed table-striped">
            <th width="50%"><?php echo $label;?></th>
            <?php if ($this->uri->segment(3)=='list_user'){ ?>
            <th width="25%">Jenis</th>
            <?php }?>
            <th>Aksi</th>
    
            <?php foreach ($list as $number => $n):?>
            <tr><td><?php echo $list[$number][$item];?> </td>
                <?php if ($this->uri->segment(3)=='list_user'){ ?>
                    <td><?php /*echo 'Anggota biasa';*/if($list[$number]['userrole']==1) echo 'Admin'; else if($list[$number]['userrole']==2) echo "Uploader"; else echo "Anggota Biasa";?></td>
                    
                <?php }?>
                
                
                <td>                                        
                        <a href="<?php echo site_url().$edit.$list[$number][$id];?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                    <?php if ($this->uri->segment(3)!='list_user'){?>
                        <a href="<?php echo site_url().$delete.$list[$number][$id];?>" class="btn btn-danger btn-mini" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                            <i class="icon-trash"></i> Hapus
                        </a><?php }?>
                </td>
            </tr>
            <?php endforeach; ?>

        </table>
<p><?php echo $links; ?></p>


