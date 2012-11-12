<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $header ?></h3>
</div>
<div class="modal-body">
    <table class="table table-condensed">
        <tr>
            <th colspan="3"><center>DAFTAR RIWAYAT HIDUP</center></th>
        </tr>
        <tr>
            <th width="30%">Nama</th>
            <td><?php echo $pegawai['nama'] ?></td>
            <td rowspan="4" width="77px"><center><img src="<?php echo $pegawai['foto'] ?>" width="75" height="100"/></center></td>
        </tr>
        <tr>
            <th>NIP</th>
            <td><?php echo $pegawai['nip'] ?></td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td><?php echo $pegawai['tempat_lahir'] ?>, <?php echo $this->date->konversi2($pegawai['tanggal_lahir']) ?></td>
        </tr>
        <tr>
            <th>Gol/Pangkat</th>
            <td><?php echo $pil_pangkat[$pegawai['kode_gol']] ?></td>
        </tr>
        <tr>
            <th>NPWP</th>
            <td><?php //echo $pegawai['npwp']  ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo ($pegawai['jenis_kelamin']=='L'?'Laki-Laki':'Perempuan') ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Agama</th>
            <td><?php echo $pegawai['agama'] ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Status Perkawinan</th>
            <td><?php //echo $pegawai['status']  ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Alamat Rumah</th>
            <td><?php echo $pegawai['alamat_rumah'] ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Keterangan Badan</th>
            <td><?php //echo $pegawai['keterangan']  ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Kegemaran (hobby)</th>
            <td><?php //echo $pegawai['hobby']  ?></td>
            <td></td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="pegawai/detail_pegawai_print/<?php echo $pegawai['id'] ?>" class="btn" target="_blank">Download PDF</a>
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>