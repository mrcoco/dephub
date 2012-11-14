<form action="<?php echo base_url()?>materi/update" method="post">
    <input type="hidden" name="id" value="<?php echo $materi['id']?>"/>
    Judul materi : <input type="text" name="judul" value="<?php echo $materi['judul']?>"/>
    <br/>
    Deskripsi :
    <br/>
    <?php echo $this->editor->textarea('deskripsi',$materi['deskripsi'])?>
    <br/>
    <input type="submit" value="Simpan"/>
</form>
