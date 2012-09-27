<?php echo doctype(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />
        <title>LAPORAN CV PEGAWAI</title>

    </head>
    <body>
    <center><img src="
        <?php 
        if($pegawai['nama']!='')
            echo $pegawai['foto'];
        else
            echo "assets/public/foto/nopic.jpg";
        ?>
        " width="75" height="100"/></center>
    <center><h1>DAFTAR RIWAYAT HIDUP</h1></center>
        <table width="100%" border="1" cellspacing="0">
    <tr>
        <td width="30%">Nama</td>
        <td><?php echo $pegawai['nama'] ?></td>
</tr>
<tr>
    <td>NIP</td>
    <td><?php echo $pegawai['nip'] ?></td>
</tr>
<tr>
    <td>Tempat Tanggal Lahir</td>
    <td><?php echo $pegawai['tempat_lahir'] ?>, <?php echo $this->date->konversi2($pegawai['tanggal_lahir']) ?></td>
</tr>
<tr>
    <td>Pangkat</td>
    <td><?php echo $pegawai['pangkat'] ?></td>
</tr>
<tr>
    <td>Golongan</td>
    <td><?php echo $pegawai['golongan'] ?></td>
</tr>
<tr>
    <td>NPWP</td>
    <td><?php //echo $pegawai['npwp']   ?></td>
</tr>
<tr>
    <td>Jenis Kelamin</td>
    <td><?php echo $pegawai['jenis_kelamin'] ?></td>
</tr>
<tr>
    <td>Agama</td>
    <td><?php echo $pegawai['agama'] ?></td>
</tr>
<tr>
    <td>Status Perkawinan</td>
    <td><?php //echo $pegawai['status']   ?></td>
</tr>
<tr>
    <td>Alamat Rumah</td>
    <td><?php echo $pegawai['alamat_rumah'] ?></td>
</tr>
<tr>
    <td>Keterangan Badan</td>
    <td><?php //echo $pegawai['keterangan']   ?></td>
</tr>
<tr>
    <td>Kegemaran (hobby)</td>
    <td><?php //echo $pegawai['hobby']   ?></td>
</tr>
</table>
        
        <br/>

<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="7" align="center">Pendidikan di dalam dan luar negeri</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="10%">Tingkatan</th>
        <th width="15%">Nama Pendidikan</th>
        <th width="10%">Jurusan</th>
        <th width="10%">STTB</th>
        <th width="25%">Tempat</th>
        <th width="25%">Nama Sekolah</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

        <br/>

<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Kursus/latihan di dalam dan di luar negeri</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="25%">Nama kursus/latihan</th>
        <th width="10%">Lamanya</th>
        <th width="10%">Tahun ijazah</th>
        <th width="25%">Tempat</th>
        <th width="25%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

        <br/>

<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Diklat jabatan / penjenjangan</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="25%">Nama diklat</th>
        <th width="10%">Dari</th>
        <th width="10%">Sampai</th>
        <th width="25%">Tempat</th>
        <th width="25%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

        <br/>

<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Diklat jabatan / penjenjangan</th>
    </tr>
    <tr>
        <th width="5%" rowspan="2">No</th>
        <th width="25%" rowspan="2">Pangkat</th>
        <th width="10%" rowspan="2">Golongan</th>
        <th width="10%" rowspan="2">Gaji Pokok</th>
        <th width="50%" colspan="2">Surat Keputusan</th>
    </tr>
    <tr>
        <th>Pejabat</th>
        <th>No dan tanggal</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="7" align="center">Pengalaman jabatan / pekerjaan</th>
    </tr>
    <tr>
        <th width="5%" rowspan="2">No</th>
        <th width="25%" rowspan="2">Pengalaman</th>
        <th width="10%" rowspan="2">Mulai dan sampai</th>
        <th width="10%" rowspan="2">Golongan</th>
        <th width="10%" rowspan="2">Gaji Pokok</th>
        <th width="25%" colspan="2">Surat Keputusan</th>
    </tr>
    <tr>
        <th>Pejabat</th>
        <th>No dan tanggal</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>

        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="4" align="center">Pengalaman jabatan / pekerjaan</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="40%">Nama bintang</th>
        <th width="15%">Tahun</th>
        <th width="40%">Nama negara / instansi yang memberi</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="5" align="center">Kunjungan ke luar negeri</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="20%">Negara</th>
        <th width="30%">Tujuan</th>
        <th width="15%">Lamanya</th>
        <th width="30%">Yang membiayai</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="7" align="center">Istri / suami</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="20%">Nama</th>
        <th width="15%">Tempat lahir</th>
        <th width="15%">Tanggal lahir</th>
        <th width="15%">Tanggal menikah</th>
        <th width="15%">Pekerjaan</th>
        <th width="15%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="7" align="center">Anak</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="20%">Nama</th>
        <th width="15%">Jenis Kelamin</th>
        <th width="15%">Tempat lahir</th>
        <th width="15%">Tanggal lahir</th>
        <th width="15%">Pekerjaan</th>
        <th width="15%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>



        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="5" align="center">Orang tua</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="20%">Nama</th>
        <th width="15%">Tanggal lahir</th>
        <th width="30%">Pekerjaan</th>
        <th width="30%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>



        <br/>

<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="5" align="center">Mertua</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="20%">Nama</th>
        <th width="15%">Tanggal lahir</th>
        <th width="30%">Pekerjaan</th>
        <th width="30%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Saudara</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="20%">Nama</th>
        <th width="10%">Jenis kelamin</th>
        <th width="15%">Tanggal lahir</th>
        <th width="20%">Pekerjaan</th>
        <th width="30%">Keterangan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Semasa mengikuti pendidikan pada slte ke bawah</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="25%">Nama organisasi</th>
        <th width="15%">Kedudukan</th>
        <th width="15%">Dari tahun sampai</th>
        <th width="15%">Tempat</th>
        <th width="25%">Nama pimpinan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>



        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Semasa mengikuti pendidikan pada perguruan tinggi</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="25%">Nama organisasi</th>
        <th width="15%">Kedudukan</th>
        <th width="15%">Dari tahun sampai</th>
        <th width="15%">Tempat</th>
        <th width="25%">Nama pimpinan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="6" align="center">Sesudah selesai pendidikan atau selama menjadi pegawai</th>
    </tr>
    <tr>
        <th width="5%">No</th>
        <th width="25%">Nama organisasi</th>
        <th width="15%">Kedudukan</th>
        <th width="15%">Dari tahun sampai</th>
        <th width="15%">Tempat</th>
        <th width="25%">Nama pimpinan</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>


        <br/>


<table width="100%"  border="1" cellspacing="0">
    <tr>
        <th colspan="5" align="center">Keterangan lain-lain</th>
    </tr>
    <tr>
        <th width="5%" rowspan="2">No</th>
        <th width="60%" rowspan="2">Nama keterangan</th>
        <th width="25%" colspan="2">Surat keterangan</th>
        <th width="10%" rowspan="2">Tanggal</th>
    </tr>
    <tr>
        <th>Pejabat</th>
        <th>Nomor</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table>
        
</html>
