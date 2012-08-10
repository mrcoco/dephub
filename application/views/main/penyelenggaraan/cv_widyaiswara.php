<p align="center" class="lead">Curriculum Vitae Pengajar/Penceramah</p>
<form action="penyelenggaraan/dashboard/insert_widyaiswara" method="POST">
    <table class="table table-striped table-condensed">
        <tr>
            <td>Nama</td>
            <td><input type="text" placeholder="Nama" name="nama"/></td>
        </tr>
        <tr>
            <td>NIP</td>
            <td><input type="text" placeholder="NIP" name="nip"/></td>
        </tr>
        <tr>
            <td>Tempat Tanggal Lahir</td>
            <td><input type="text" name="tempat" placeholder="Tempat lahir"/>, <input type="text" id="date" name="tanggal" placeholder="Tahun-Bulan-Tanggal"/></td>
        </tr>
        <tr>
            <td>Pangkat/Gol</td>
            <td><input type="text" name="pangkat" placeholder="Pangkat"/>/<input type="text" placeholder="Golongan" name="gol"/></td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td><textarea name="instansi"></textarea></td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td><textarea name="jabatan"></textarea></td>
        </tr>
        <tr>
            <td colspan="2">Pendidikan</td>
        </tr>
        <tr>
            <td>a. Dalam negeri</td>
            <td><textarea name="dn"></textarea></td>
        </tr>
        <tr>
            <td>b. Luar negeri</td>
            <td><textarea name="ln"></textarea></td>
        </tr>
        <tr>
            <td>Alamat rumah</td>
            <td><textarea name="alamat_rumah"></textarea></td>
        </tr>
        <tr>
            <td>Telepon rumah</td>
            <td><input type="text" name="tlp_rumah"/></td>
        </tr>
        <tr>
            <td>Alamat kantor</td>
            <td><textarea name="alamat_kantor"></textarea></td>
        </tr>
        <tr>
            <td>Telepon kantor</td>
            <td><input type="text" name="tlp_kantor"/></td>
        </tr>
    </table>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn cancel">Ulangi</button>
    </div>
</form>