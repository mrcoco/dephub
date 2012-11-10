<form action="<?php echo base_url()?>materi/insert" method="post">
    Judul materi : <input type="text" name="judul"/>
    <br/>
    Deskripsi :
    <br/>
    <?php echo $this->editor->textarea('deskripsi')?>
    <br/>
    <input type="submit" value="Simpan"/>
</form>
