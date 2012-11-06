<?php if($this->uri->segment(3)=='add_category'){
    $item="categoryname";
    $label="Kategori";
    } 
    else if($this->uri->segment(3)=='add_author') {
        $item="authorname";
        $label="Pengarang";
    }?>

<?php   if($item=="categoryname") echo form_open_multipart('elibrary/admin/do_add_category');
        else if ($item="authorname") echo form_open_multipart('elibrary/perpustakaan/do_add_author');
?>
<?php echo $label;?><input type="text" name="<?php echo $item;?>">
<input type="submit" value="Simpan" />
</form>