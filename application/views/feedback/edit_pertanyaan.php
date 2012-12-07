<form action="<?php echo base_url()?>feedback/update_pertanyaan" method="post">
    <input type="hidden" name="id_pertanyaan" value="<?php echo $pertanyaan['id_pertanyaan']?>"/>
    Pertanyaan : <input type="text" name="pertanyaan" value="<?php echo $pertanyaan['pertanyaan']?>"/>
    <br/>
    Kategori : <?php echo form_dropdown('id_kategori', $kategori,$pertanyaan['id_kategori'])?>
    <br/>
    <input type="submit" value="Buat"/>
</form>
