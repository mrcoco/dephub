<form action="<?php echo base_url()?>feedback/insert_pertanyaan" method="post">
    Pertanyaan : <input type="text" name="pertanyaan"/>
    <br/>
    Kategori : <?php echo form_dropdown('id_kategori', $kategori)?>
    <br/>
    <input type="submit" value="Buat"/>
</form>
