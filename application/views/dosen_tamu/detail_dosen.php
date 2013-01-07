<div class="row">
    <div class="span12"><?php echo $this->session->flashdata('msg'); ?></div>
</div>
<p align="center" class="lead">Curriculum Vitae Dosen Tamu</p>
<div class="well-small">
    <a href="dosen_tamu/edit_dosen/<?php echo $data['id'] ?>" class="btn btn-mini"><i class="icon-edit"></i> Ubah</a>
    <a href="dosen_tamu/delete_dosen/<?php echo $data['id'] ?>" class="btn btn-danger btn-mini"
       onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $data['nama'] ?>?')">
        <i class="icon-trash"></i> Hapus</a>
</div>
<form action="dosen_tamu/edit_process" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id'] ?>"/>    
    <table class="table table-striped">
        <tr>
            <th width="20%">Nama</th>
            <td>: <?php echo $data['nama'] ?></td>
        </tr>
        <tr>
            <th width="20%">Username</th>
            <td>: <?php echo $data['username'] ?></td>
        </tr>
        <tr>
            <th width="20%">Kategori</th>
            <td>: <?php echo $data['is_pns'] ? 'PNS' : 'Profesional' ?></td>
        </tr>
        <?php if ($data['is_pns']) { ?>
            <tr>
                <th>NIP</th>
                <td>: <?php echo $data['nip'] ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th>TTL</th>
            <td>: <?php echo $data['tempat_lahir'] ?>, <?php echo $this->date->konversi5($data['tanggal_lahir']) ?></td>
        </tr>
        <?php if ($data['is_pns']) { ?>
            <tr>
                <th>Pangkat/Gol</th>
                <td>: <?php echo $pil_pangkat[$data['kode_gol']]?></td>
            </tr>
            <tr>
                <th>Instansi</th>
                <td>: <?php echo $data['instansi'] ?></td>
            </tr>
            <tr>
                <th>Jabatan</th>
                <td>: <?php echo $data['jabatan'] ?></td>
            </tr>
        <?php } ?>
        <tr>
            <th>Alamat rumah</th>
            <td>: <?php echo $data['alamat_rumah'] ?></td>
        </tr>
        <tr>
            <th>Telepon rumah</th>
            <td>: <?php echo $data['tlp_rumah'] ?></td>
        </tr>
        <tr>
            <th>Alamat kantor</th>
            <td>: <?php echo $data['alamat_kantor'] ?></td>
        </tr>
        <tr>
            <th>Telepon kantor</th>
            <td>: <?php echo $data['tlp_kantor'] ?></td>
        </tr>
        <?php if ($data['is_pns']) { ?>
            <tr>
                <th colspan="2">Riwayat Pekerjaan</th>
            </tr>
            <tr>
                <td colspan="2"><ul><?php echo ($data['history_jabatan'] == '') ? 'Belum ada data' : $data['history_jabatan'] ?></ul></td>
            </tr>
        <?php } ?>
        <tr>
            <th colspan="2">Pendidikan</th>
        </tr>
        <tr>
            <td colspan="2">a. Dalam negeri</td>
        </tr>
        <tr>
            <td colspan="2"><ul><?php echo ($data['pendidikan_dn'] == '') ? 'Belum ada data' : $data['pendidikan_dn'] ?></ul></td>
        </tr>
        <tr>
            <td colspan="2">b. Luar negeri</td>
        </tr>
        <tr>
            <td colspan="2"><ul><?php echo ($data['pendidikan_ln'] == '') ? 'Belum ada data' : $data['pendidikan_ln'] ?></ul></td>
        </tr>
        <?php if ($data['is_pns']) { ?>
            <tr>
                <td colspan="2">Riwayat Diklat</td>
            </tr>
            <tr>
                <td colspan="2"><ul><?php echo ($data['history_diklat'] == '') ? 'Belum ada data' : $data['history_diklat'] ?></ul></td>
            </tr>
            <tr>
                <td colspan="2">Riwayat Kursus</td>
            </tr>
            <tr>
                <td colspan="2"><ul><?php echo ($data['history_kursus'] == '') ? 'Belum ada data' : $data['history_kursus'] ?></ul></td>
            </tr>
        <?php } ?>
    </table>
</form>
<div class="form-actions">
    <button class="btn btn-primary" onclick="history.go(-1)"><i class="icon-arrow-left icon-white"></i> Kembali</button>
</div>