<?php if ($this->uri->segment(3)=='list_category') {
    $item='categoryname';
    $id='idcategory';
    $edit='elibrary/admin/edit_category/';
    $delete='elibrary/admin/delete_category/';
}
else if ($this->uri->segment(3)=='list_author') {
    $item='authorname';
    $id='idauthor';
    $edit='elibrary/admin/edit_author/';
    $delete='elibrary/admin/delete_author/';
}
else if ($this->uri->segment(3)=='list_user') {
    $item='nama';
    $id='id';
    $edit='#';
    $delete='#';
}
?>
                        <div class="row-fluid">
                            <?php $this->session->flashdata('msg'); ?>
                        </div>  
<table class="table table-condensed table-striped">
    <th width="65%">Kategori</th>
    <?php if ($this->uri->segment(3)!='list_user'){?><th width="35%">Aksi</th><?php }?>
    
<?php foreach ($list as $number => $n):?>
<tr><td><?php echo $list[$number][$item];?> </td><td>
                                        
        <a href="<?php echo site_url().$edit.$list[$number][$id];?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
        <?php if ($this->uri->segment(3)!='list_user'){?><a href="<?php echo site_url().$delete.$list[$number][$id];?>" class="btn btn-danger btn-mini" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="icon-trash"></i> Hapus
                                        </a><?php }?>
                                    </td></tr>
<?php endforeach; ?>
</table>
<p><?php echo $links; ?></p>


