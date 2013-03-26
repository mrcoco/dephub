
<h3>
    <?php echo $materi['judul']?><br />
    <?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?>
</h3>
<?php
    if($this->uri->segment(1)=='program'){
        $this->load->view('sidebar/subnav_nilai');$link='program/nilai_view';
    }else{
        $link='wid/nilai/view';        
    }
?>
<?php echo $this->session->flashdata('msg');?>
<?php echo form_open_multipart('wid/nilai/insert')?>
<input type="hidden" name="id_materi" value="<?php echo $materi['id'] ?>"/>
<input type="hidden" name="id_program" value="<?php echo $program['id'] ?>"/>
<input type="hidden" name="id_komponen" value="<?php echo $komponen['id'] ?>"/>
<input type="hidden" name="fail_url" value="<?php echo current_url() ?>"/>
<input type="hidden" name="redirect_url" value="<?php echo $link.'/'.$materi['id'].'/'.$program['id'] ?>"/>
Langkah-langkah mengumpulkan nilai:
<ol>
    <li>Download format pengisian nilai. Klik di sini :
        <a class="btn btn-mini" href="wid/nilai/gen_form/<?php echo $materi['id'] ?>/<?php echo $program['id'] ?>/<?php echo $komponen['id'] ?>">
            <i class="icon-download-alt"></i> Format Pengisian Nilai
        </a>
    </li>
    <li>
        Dengan format tersebut, isilah nilai para peserta
    </li>
    <li>Upload format yang telah berisi nilai para peserta
    </li>
</ol>
<hr/>
<h2>Upload Nilai <?php echo $komponen['nama_komponen']?></h2>
        Upload di sini : <?php echo form_upload('file_nilai')?>
<div class="form-actions">
    <button class="btn btn-primary" type="submit">Simpan</button>
</div>
<?php echo form_close()?>
