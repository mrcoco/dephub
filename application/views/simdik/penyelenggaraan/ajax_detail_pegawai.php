<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?php echo $header?></h3>
</div>
<div class="modal-body">
    <table class="table table-condensed">
        <!--
        <tr>
            <td colspan="2"><center><img src="<?php //echo $peserta['foto']?>" width="75" height="100"/></center></td>
        </tr>
        -->
        <tr>
            <th width="30%">Nama</th>
            <td><?php echo $pegawai['nama']?></td>
        </tr>
        <tr>
            <th>NIP</th>
            <td><?php echo $pegawai['nip']?></td>
        </tr>
        <tr>
            <th>Tempat Tanggal Lahir</th>
            <td><?php echo $pegawai['tempat_lahir']?>, <?php echo $this->date->konversi2($pegawai['tanggal_lahir'])?></td>
        </tr>
        <tr>
            <th>Pangkat</th>
            <td><?php echo $pegawai['pangkat']?></td>
        </tr>
        <tr>
            <th>Golongan</th>
            <td><?php echo $pegawai['golongan']?></td>
        </tr>
        <tr>
            <th>Jabatan</th>
            <td><?php echo $pegawai['jabatan']?></td>
        </tr>
        <tr>
            <th>Instansi</th>
            <td><?php echo $pegawai['instansi']?></td>
        </tr>
        <tr>
            <th>Jenis Kelamin</th>
            <td><?php echo $pegawai['jenis_kelamin']?></td>
        </tr>
        <tr>
            <th>Gelar Akademis</th>
            <td><?php echo $pegawai['gelar_akademis']?></td>
        </tr>
        <tr>
            <th>Pendidikan Terakhir</th>
            <td><?php echo $pegawai['pendidikan_terakhir']?></td>
        </tr>
        <tr>
            <th>Unit Kerja</th>
            <td><?php echo $pegawai['unit_kerja']?></td>
        </tr>
        <tr>
            <th>Alamat Rumah</th>
            <td><?php echo $pegawai['alamat_rumah']?></td>
        </tr>
        <tr>
            <th>Agama</th>
            <td><?php echo $pegawai['agama']?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $pegawai['email']?></td>
        </tr>
        <tr>
            <th>Telepon</th>
            <td><?php echo $pegawai['telepon']?></td>
        </tr>
    </table>
</div>
<div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Close</a>
</div>