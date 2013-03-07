<script>
    $(function(){
            $( ".datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: "dd-mm-yy"
        }).attr('autocomplete','off');
    })
</script>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>
        Kelulusan Peserta <?php echo $diklat['name'] . ' Angkatan ' . $program['angkatan']; ?>
    </h3>
</div>
<div class="modal-body">
    <h4><?php echo $peserta['nama'].' ('.$peserta['nip'].')' ?></h4>
    <br />
    <fieldset>
        <input type="hidden" name="id_peserta" value="<?php echo $peserta['id']?>"/>
        <input type="hidden" name="id_program" value="<?php echo $program['id']?>"/>
        <table>
            <tr>
                <td width="40%"><label for="nilai">Nilai Akhir</label></td>
                <td><input type="text" class="input-small" id="nilai" name="nilai_akhir" value="<?php echo $alumni['nilai_akhir'];?>"/></td>
            </tr>
            <tr>
                <td><label for="grade">Grade</label></td>
                <td><input type="text" class="input-small" id="grade" name="grade" value="<?php echo $alumni['grade'];?>"/></td>
            </tr>
            <tr>
                <td><label for="predikat">Predikat</label></td>
                <td><input type="text" id="predikat" name="predikat" value="<?php echo $alumni['predikat'];?>"/></td>
            </tr>
            <tr>
                <td><label for="tgl_lulus">Tanggal Kelulusan</label></td>
                <td>
                    <input type="text" placeholder="tgl-bln-thn" id="tgl_lulus" name="tgl_lulus" class="datepicker"
                           value="<?php if($alumni['tgl_lulus'])echo $this->date->konversi1($alumni['tgl_lulus']) ?>"/>
                </td>
            </tr>
            <tr>
                <td><label for="no_sk">Nomor Surat</label></td>
                <td><input type="text" id="no_sk" name="no_sk" value="<?php echo $alumni['no_sk'];?>"/></td>
            </tr>
            <tr>
                <td><label for="file_sk">File Surat</label></td>
                <td>
                    <?php if($alumni['file_sk']){?>
                    <a href="assets/public/file/<?=$alumni['file_sk'] ?>" target="_blank"><?=$alumni['file_sk'] ?></a><br />
                    <?php } ?>
                    <input type="file" id="file_sk" name="file_sk"/>
                </td>
            </tr>
            <tr>
                <td><label for="ket">Keterangan</label></td>
                <td><textarea id="file_sk" name="ket"><?=$alumni['ket'] ?></textarea></td>
            </tr>
        </table>
    </fieldset>
</div>
<div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Simpan"/>
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>