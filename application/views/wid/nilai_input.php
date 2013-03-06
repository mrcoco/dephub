<h2><?php echo $materi['judul'] ?></h2>
<h3><?php echo $diklat['name'].' Angkatan '.$program['angkatan'] ?></h3>
<form action="wid/nilai/item_insert" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_materi" value="<?php echo $materi['id'] ?>" />
    <input type="hidden" name="id_program" value="<?php echo $program['id'] ?>" />
<table class="table-bordered table-condensed table-striped">
    <tr>
        <th>Unsur</th>
        <th>Bobot</th>
        <th>Upload Nilai</th>
    </tr>
    <tr>
        <td>Makalah</td>
        <td>50%</td>
        <td><input type="file" name="id" /></td>
    </tr>
    <tr>
        <td>UAS</td>
        <td>30%</td>
        <td><input type="file" name="id" /></td>
    </tr>
</table>
<div class="form-actions">
    <a href="#" class="btn">Preview</a>
    <input type="submit" class="btn btn-primary" value="Simpan" />
</div>
</form>