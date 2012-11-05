<?php if ($this->uri->segment(3)=='list_category') {
    $item='categoryname';
}
else if ($this->uri->segment(3)=='list_author') {
    $item='authorname';
}
else if ($this->uri->segment(3)=='list_user') {
    $item='nama';
}
?>
                        <div class="row-fluid">
                            <?php $this->session->flashdata('msg'); ?>
                        </div>  
<table class="table table-condensed table-striped">
    <th width="65%">Kategori</th>
    <th width="35%">Aksi</th>
    
<?php foreach ($list as $number => $n):?>
<tr><td><?php echo $list[$number][$item];?> </td><td>
                                        
                                        <a href="#" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
                                        <a href="#" class="btn btn-danger btn-mini" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                                                <i class="icon-trash"></i> Hapus
                                        </a>
                                    </td></tr>
<?php endforeach; ?>
</table>
<p><?php echo $links; ?></p>


