Upload Nilai Komponen <?php echo $komponen['nama_komponen']?>
<br/>
<a href="wid/nilai/gen_form/<?php echo $materi['id'] ?>/<?php echo $program['id'] ?>/<?php echo $komponen['id'] ?>">Download Form Pengisian Nilai</a>
<br/>
<?php echo $this->session->flashdata('msg');?>
<?php echo form_open_multipart('wid/nilai/insert')?>
<input type="hidden" name="id_materi" value="<?php echo $materi['id'] ?>"/>
<input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
<input type="hidden" name="id_komponen" value="<?php echo $komponen['id'] ?>"/>
<?php echo form_upload('file_nilai')?>
<br/>
<input type="submit" value="upload"/>
<?php echo form_close()?>
