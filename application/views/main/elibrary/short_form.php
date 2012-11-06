<?php if($this->uri->segment(3)=='add_category'){
    $item="categoryname";
    $label="Kategori";
    $fungsi='add_c';
    $data[0][$item]='';
    $id="id";
    $data[0][$id]='';
    } 
    else if($this->uri->segment(3)=='edit_author') {
        $item="authorname";
        $id="idauthor";
        $label="Pengarang";
        $fungsi='edit_a';
    }
    else if ($this->uri->segment(3)=='edit_category')
        {$item="categoryname";
        $label="Kategori";
        $id="idcategory";
        $fungsi='edit_c';}
    ?>

<?php   if($fungsi=="add_c") {echo "<h3>Tambah Kategori</h3>";echo form_open_multipart('elibrary/admin/do_add_category');}
        else if ($fungsi="edit_a") {echo "<h3>Ubah Pengarang</h3>";echo form_open_multipart('elibrary/perpustakaan/do_edit_author/'+$data[0][$id]);}
        else if ($fungsi="edit_c") {echo "<h3>Ubah Kategori</h3>";echo form_open_multipart('elibrary/perpustakaan/do_edit_category/'+$data[0][$id]);}
?>
<?php echo $label;?><input type="text" name="<?php echo $item;?>" value="<?php echo $data[0][$item];?>">
<input type="hidden" name="<?php echo $id;?>" value="<?php echo $data[0][$id];?>">
<input type="submit" value="Simpan" />
</form>