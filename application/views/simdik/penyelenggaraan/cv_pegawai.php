<?php echo doctype(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="<?php echo base_url(); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta charset="utf-8" />

        <link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet" />


        <title>Pusat Pengembangan SDM Aparatur Perhubungan</title>

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

<table class="table table-condensed table-striped table-bordered">
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


<table class="table table-condensed table-striped table-bordered">
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


<table class="table table-condensed table-striped table-bordered">
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


<table class="table table-condensed table-striped table-bordered">
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



<table class="table table-condensed table-striped table-bordered">
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



<table class="table table-condensed  table-striped table-bordered">
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




<table class="table table-condensed  table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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





<table class="table table-condensed table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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





<table class="table table-condensed table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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




<table class="table table-condensed table-striped table-bordered">
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

</body>
</html>