<h3>Kategori Buku</h3>
<table class="table table-condensed table-striped">
    <th width="65%">Kategori</th>
    <th width="35%">Aksi</th>
<?php echo form_open_multipart('elibrary/digital/category');?>    
<?php foreach ($category as $number => $n):?>
    <tr><td><?php echo $category[$number]['categoryname'];?></td> <td><input type="submit" name="category" value="<?php echo $category[$number]['categoryname'];?>"> </td></tr>
                            <?php endforeach; ?>
                                </form>
</table>