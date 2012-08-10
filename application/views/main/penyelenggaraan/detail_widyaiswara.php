<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<p align="center" class="lead">Curriculum Vitae Pengajar/Penceramah</p>
<form action="penyelenggaraan/dashboard/edit_process" method="POST">
<input type="hidden" name="id" value="<?php echo $data['id']?>"/>    
<table>
    <tr>
        <td>Nama</td>
        <td>: <?php echo $data['nama'] ?></td>
    </tr>
    <tr>
        <td>NIP</td>
        <td>: <?php echo $data['nip'] ?></td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>: <?php echo $data['tempat_lahir'] ?>/<?php echo $data['tanggal_lahir'] ?></td>
    </tr>
    <tr>
        <td>Pangkat/Gol</td>
        <td>: <?php echo $data['pangkat'] ?>/<?php echo $data['pangkat'] ?></td>
    </tr>
    <tr>
        <td>Instansi</td>
        <td>: <?php echo $data['instansi'] ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>: <?php echo $data['jabatan'] ?></td>
    </tr>
    <tr>
        <td colspan="2">Pendidikan</td>
    </tr>
    <tr>
        <td>a. Dalam negeri</td>
        <td><?php echo $data['pendidikan_dn'] ?></td>
    </tr>
    <tr>
        <td>b. Luar negeri</td>
        <td><?php echo $data['pendidikan_ln'] ?></td>
    </tr>
    <tr>
        <td>Alamat rumah</td>
        <td><?php echo $data['alamat_rumah'] ?></td>
    </tr>
    <tr>
        <td>Telepon rumah</td>
        <td><?php echo $data['tlp_rumah'] ?></td>
    </tr>
    <tr>
        <td>Alamat kantor</td>
        <td><?php echo $data['alamat_kantor'] ?></td>
    </tr>
    <tr>
        <td>Telepon kantor</td>
        <td><?php echo $data['tlp_kantor'] ?></td>
    </tr>
</table>
</form>