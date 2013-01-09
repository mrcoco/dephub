<table class="table table-condensed table-striped">
    <th width="65%">Kategori</th>
    <th width="35%">Aksi</th>

<?php foreach ($category as $number => $n):?>
    <tr><td><?php echo $category[$number]['categoryname'];?></td> <td><a class="btn" href="<?php echo base_url()."elibrary/perpustakaan/category/".$category[$number]['idcategory']?>">Telusuri</a> </td></tr>
                            <?php endforeach; ?>
                                
</table>

