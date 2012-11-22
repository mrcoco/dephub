
    <table class="table table-condensed">
        <tr>
            <th width="30%">Nama</th>
            <td><?php echo $pegawai['nama'] ?></td>
            <td rowspan="4" width="77px"><center><img src="<?php echo $pegawai['foto'] ?>" width="75" height="100"/></center></td>
        </tr>
        <tr>
            <th width="30%">Username</th>
            <td><?php echo $pegawai['username'] ?></td>
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
            <td><?php echo $pangkat[$pegawai['kode_gol']] ?></td>
            <td></td>
        </tr>
        <tr>
            <th>Pendidikan terakhir</th>
            <td><?php echo $arr_pendidikan[$pegawai['kode_pendidikan']] ?></td>
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
            <th>Alamat Rumah</th>
            <td><?php echo $pegawai['alamat_rumah'] ?></td>
            <td></td>
        </tr>
    </table>
<div class="form-actions">
    <a href="pegawai/detail_pegawai_print/<?php echo $pegawai['id'] ?>" class="btn btn-success">Cetak PDF</a>
</div>