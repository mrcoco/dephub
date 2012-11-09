<?php echo doctype(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />

        <link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet" />


        <title>LAPORAN CV PEGAWAI</title>

    </head>
    <body>
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
    <th>Pangkat</th>
    <td><?php echo $pegawai['pangkat'] ?></td>
</tr>
<tr>
    <th>Golongan</th>
    <td><?php echo $pegawai['golongan'] ?></td>
    <td></td>
</tr>
<tr>
    <th>NPWP</th>
    <td><?php //echo $pegawai['npwp']   ?></td>
    <td></td>
</tr>
<tr>
    <th>Jenis Kelamin</th>
    <td><?php echo $pegawai['jenis_kelamin'] ?></td>
    <td></td>
</tr>
<tr>
    <th>Agama</th>
    <td><?php echo $pegawai['agama'] ?></td>
    <td></td>
</tr>
<tr>
    <th>Status Perkawinan</th>
    <td><?php //echo $pegawai['status']   ?></td>
    <td></td>
</tr>
<tr>
    <th>Alamat Rumah</th>
    <td><?php echo $pegawai['alamat_rumah'] ?></td>
    <td></td>
</tr>
<tr>
    <th>Keterangan Badan</th>
    <td><?php //echo $pegawai['keterangan']   ?></td>
    <td></td>
</tr>
<tr>
    <th>Kegemaran (hobby)</th>
    <td><?php //echo $pegawai['hobby']   ?></td>
    <td></td>
</tr>
</table>
        
</html>
