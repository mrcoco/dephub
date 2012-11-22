
                        <div class="row-fluid">
                            <?php echo $this->session->flashdata('msg'); ?>
                        </div>   
                            <?php if($this->uri->segment(3)=='add_category'){
    $item="categoryname";
    $label="Kategori";
    $fungsi='add_c';
    $data[0][$item]='';
    $id="id";
    $data[0][$id]='';
    $action="elibrary/admin/do_add_category/";
    } 
    else if($this->uri->segment(3)=='edit_author') {
        $item="authorname";
        $id="idauthor";
        $label="Pengarang";
        $fungsi='edit_a';
        $action="elibrary/admin/do_edit_author/";
    }
    else if ($this->uri->segment(3)=='edit_category')
        {$item="categoryname";
        $label="Kategori";
        $id="idcategory";
        $fungsi='edit_c';
        $action="elibrary/admin/do_edit_category/";
        }
    ?>


<?php   if($fungsi=="add_c") {echo "<h3>Tambah Kategori</h3>";}
        else if ($fungsi="edit_a") {echo "<h3>Ubah Pengarang</h3>";}
        else if ($fungsi="edit_c") {echo "<h3>Ubah Kategori</h3>";}
?>
<form action="<?php echo site_url($action);echo '/'.$data[0][$id];?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<table>
    <tr><td width="40%"><?php echo $label;?></td><td>: <input type="text" name="<?php echo $item;?>" value="<?php echo $data[0][$item];?>"></td></tr>
    <input type="hidden" name="<?php echo $id;?>" value="<?php echo $data[0][$id];?>">
    <tr><td ><input type="submit" value="Simpan" /></td></tr>
</table>
</form>